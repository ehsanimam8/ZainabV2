<?php

namespace App\Listeners;

use Laravel\Cashier\Events\WebhookReceived;
use App\Models\User;
use App\Jobs\ProcessCommunicationTrigger;

class PaymentEventSubscriber
{
    /**
     * Handle the given event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'invoice.payment_failed') {
            $customerStripeId = $event->payload['data']['object']['customer'];
            $user = User::where('stripe_id', $customerStripeId)->first();
            
            if ($user) {
                dispatch(new ProcessCommunicationTrigger('payment-failed-day-1', $user->id, [
                    'amount_due' => '$' . number_format($event->payload['data']['object']['amount_due'] / 100, 2),
                    'invoice_url' => $event->payload['data']['object']['hosted_invoice_url'] ?? '#',
                ]));
            }
        }

        if ($event->payload['type'] === 'invoice.payment_succeeded') {
            $customerStripeId = $event->payload['data']['object']['customer'];
            $user = User::where('stripe_id', $customerStripeId)->first();
            
            if ($user) {
                dispatch(new ProcessCommunicationTrigger('payment-received', $user->id, [
                    'amount_paid' => '$' . number_format($event->payload['data']['object']['amount_paid'] / 100, 2),
                    'invoice_url' => $event->payload['data']['object']['hosted_invoice_url'] ?? '#',
                ]));
            }
        }
    }
}
