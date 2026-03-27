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

    public function processDonation()
    {
        $this->validate([
            'amount' => 'required|numeric|min:1',
            'type' => 'required',
            'firstName' => 'required_unless:isAnonymous,true',
            'email' => 'required_unless:isAnonymous,true|email',
        ]);

        // Integrate with Stripe Cashier / Create Donation Record
        Donation::create([
            'amount' => $this->amount,
            'campaign_name' => $this->type . ($this->recurrence === 'monthly' ? ' (Monthly)' : ''),
            'first_name' => $this->isAnonymous ? 'Anonymous' : $this->firstName,
            'last_name' => $this->isAnonymous ? '' : $this->lastName,
            'email' => $this->isAnonymous ? 'anonymous@zainabcenter.com' : $this->email,
            'status' => 'completed',
        ]);

        $this->currentStep = 3; // Success step
    }

    public function render()
    {
        return view('livewire.donation-flow')->layout('components.layouts.public', ['title' => 'Donate | Zainab Center']);
    }
}
