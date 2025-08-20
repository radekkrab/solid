<?php

namespace Solid\OpenClosed;

use Interfaces\PaymentMethodInterface;

class CreditCardPayment implements PaymentMethodInterface
{

    public function processPayment(float $amount): bool
    {
        echo "Processing credit card payment: $" . $amount . "\n";
        return true;
    }
}