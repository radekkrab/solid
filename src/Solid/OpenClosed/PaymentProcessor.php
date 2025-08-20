<?php

namespace Solid\OpenClosed;

use Interfaces\PaymentMethodInterface;

class PaymentProcessor
{
    public function process(PaymentMethodInterface $paymentMethod, float $amount): bool
    {
        return $paymentMethod->processPayment($amount);
    }

}
