<?php

namespace Solid\OpenClosed;

use Interfaces\PaymentMethodInterface;

class PayPalPayment implements PaymentMethodInterface
{
    public function processPayment(float $amount): bool
    {
        echo "Processing PayPal payment: $" . $amount . "\n";
        return true;
    }
}
