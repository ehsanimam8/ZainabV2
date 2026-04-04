<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Models\Program;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

#[Layout('components.layouts.public')]
class EnrollmentFlow extends Component
{
    public int $step = 1;
    public int $totalSteps = 6;
    
    // Step 1
    #[Validate('required|email')]
    public $email = '';
    public $isReturning = false;

    // Step 2
    public $enrollee_type = 'self'; // 'self' or 'child'
    public $child_first_name = '';
    public $child_last_name = '';
    public $child_dob = '';

    // Step 3
    #[Validate('required', message: 'Please select a program to continue.')]
    public $program_id = null;
    
    // Step 4
    public $self_first_name = '';
    public $self_last_name = '';
    public $self_phone = '';
    public $self_dob = '';
    public $referral_source = '';

    // Step 5
    public $payment_type = 'full';
    
    public function mount()
    {
        if (request()->has('program_id')) {
            $this->program_id = request()->program_id;
        }

        if (request()->has('step')) {
            $this->step = (int) request()->step;
            
            if (request()->has('success') && request()->success == 'true') {
                // If returning from Stripe success, update the most recent pending enrollment
                // Wait, since we don't have the enrollment ID in URL, we could look it up by user email,
                // but since it's just a UI success screen, we can just show step 6.
                $this->step = 6;
            }
        }
    }

    public function handleEmailContinue()
    {
        $this->validateOnly('email');
        
        // Check returning
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $this->isReturning = true;
            $this->self_first_name = $user->first_name;
            $this->self_last_name = $user->last_name;
            $this->self_phone = $user->phone ?? '';
            // If they are returning, we might skip some steps, but for now just pre-fill
        } else {
            $this->isReturning = false;
        }
        
        $this->step = 2;
    }

    public function selectEnrolleeType($type)
    {
        $this->enrollee_type = $type;
    }
    
    public function selectProgram($id)
    {
        $this->program_id = $id;
    }

    public function nextStep()
    {
        if ($this->step == 2 && $this->enrollee_type === 'child') {
            $this->validate([
                'child_first_name' => 'required',
                'child_last_name' => 'required',
                'child_dob' => 'required|date',
            ]);
        }
        
        if ($this->step == 3) {
            $this->validateOnly('program_id');
        }
        
        if ($this->step == 4) {
            $this->validate([
                'self_first_name' => 'required',
                'self_last_name' => 'required',
                'self_phone' => 'required',
                'self_dob' => 'required|date',
            ]);
        }
        
        $this->step++;
    }

    public function prevStep()
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function setPaymentType($type)
    {
        $this->payment_type = $type;
    }

    public function submitEnrollment()
    {
        // Final Validation handled implicitly by passing prior steps
        
        $userForPayment = null;
        $programData = null;

        DB::transaction(function () use (&$userForPayment, &$programData) {
            // 1. Resolve or Create the Parent/Self User account
            $user = User::where('email', $this->email)->first();
            
            if (!$user) {
                $user = User::create([
                    'first_name' => $this->self_first_name,
                    'last_name' => $this->self_last_name,
                    'email' => $this->email,
                    'phone' => $this->self_phone,
                    'password' => Hash::make(Str::random(12)),
                    'metadata' => [
                        'dob' => $this->self_dob,
                        'referral' => $this->referral_source
                    ]
                ]);
                
                // If it's the parent enrolling a child, give them the parent role.
                // Otherwise give them the student role.
                if ($this->enrollee_type === 'child') {
                    $user->assignRole('parent');
                } else {
                    $user->assignRole('student');
                }
            }

            // 2. Identify who the actual student is
            $studentUserId = $user->id;
            
            if ($this->enrollee_type === 'child') {
                // We need to create the child user
                $child = User::create([
                    'first_name' => $this->child_first_name,
                    'last_name' => $this->child_last_name,
                    'email' => strtolower($this->child_first_name) . '.' . time() . '@dependent.local',
                    'password' => Hash::make(Str::random(12)),
                    'metadata' => [
                        'dob' => $this->child_dob,
                        'is_dependent' => true,
                        'parent_id' => $user->id
                    ]
                ]);
                $child->assignRole('student');
                $studentUserId = $child->id;
            }

            Enrollment::create([
                'user_id' => $studentUserId,
                'status' => 'pending',
                'grade' => null,
                'metadata' => [
                    'source' => 'public_flow',
                    'program_id' => $this->program_id,
                    'payment_type' => $this->payment_type
                ]
            ]);
            
            $userForPayment = $user;
            $programData = Program::find($this->program_id);
        });
        
        if ($userForPayment && $programData && $this->payment_type === 'full') {
            // Initiate Stripe Checkout using Cashier
            $costInCents = (int) ($programData->cost * 100) ?: 10000;
            return $userForPayment->checkoutCharge(
                $costInCents,
                'Zainab Center Registration: ' . $programData->name,
                1,
                [
                    'success_url' => route('enroll') . '?step=6&success=true',
                    'cancel_url' => route('enroll') . '?step=4'
                ]
            );
        }
        
        $this->step = 6;
    }

    public function render()
    {
        $programsQuery = Program::active();
        
        // If a program is already pre-selected (via URL or earlier steps), make sure it's included
        if ($this->program_id) {
            $programsQuery->orWhere('id', $this->program_id);
        }

        return view('livewire.enrollment-flow', [
            'programs' => $programsQuery->get()
        ]);
    }
}
