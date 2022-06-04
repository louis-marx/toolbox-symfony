<?php

namespace App\Stripe;

use App\Entity\Purchase;
use App\Repository\PurchaseRepository;

class StripeService
{
    protected $secretKey;
    protected $publicKey;

    public function __construct(string $secretKey, string $publicKey)
    {
        $this->secretKey = $secretKey;
        $this->publicKey = $publicKey;
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function getPaymentIntent(Purchase $purchase)
    {
        \Stripe\Stripe::setApiKey($this->secretKey);

        return \Stripe\PaymentIntent::create(
            [
                'amount' => $purchase->getTotal(),
                'currency' => 'eur',
                'payment_method' => 'pm_card_visa'
            ]
        );
    }
}
