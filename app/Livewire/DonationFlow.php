<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Donation;

class DonationFlow extends Component
{
    public $amount;
    public $type = 'General Sadaqah';
    public $recurrence = 'one_time';
    public $isAnonymous = false;

    // Donor info
    public $firstName;
    public $lastName;
    public $email;
    public $phone;

    // Payment details
    public $cardNumber;
    public $expiry;
    public $cvc;

    public $currentStep = 1;

    public function mount()
    {
        if (request()->has('success') && request()->has('donation_id')) {
            $donation = Donation::find(request()->donation_id);
            if ($donation) {
                $donation->update(['status' => 'completed']);
            }
            $this->currentStep = 3;
        }
    }

    public function processDonation()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'type' => 'required',
            'firstName' => 'required_unless:isAnonymous,true',
            'email' => 'required_unless:isAnonymous,true|email',
        ]);

        // Create an initial 'pending' record
        $donation = Donation::create([
            'amount' => $this->amount,
            'campaign_name' => $this->type . ($this->recurrence === 'monthly' ? ' (Monthly)' : ''),
            'first_name' => $this->isAnonymous ? 'Anonymous' : $this->firstName,
            'last_name' => $this->isAnonymous ? '' : $this->lastName,
            'email' => $this->isAnonymous ? 'anonymous@zainabcenter.com' : $this->email,
            'status' => 'pending',
        ]);

        \Stripe\Stripe::setApiKey(config('cashier.secret') ?? config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Sadaqah / Donation: ' . $this->type,
                    ],
                    'unit_amount' => (int) ($this->amount * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donate') . '?step=3&success=true&donation_id=' . $donation->id,
            'cancel_url' => route('donate') . '?step=2',
        ]);

        return redirect($session->url);
    }

    public function render()
    {
        return view('livewire.donation-flow')->layout('components.layouts.public', ['title' => 'Donate | Zainab Center']);
    }
}
