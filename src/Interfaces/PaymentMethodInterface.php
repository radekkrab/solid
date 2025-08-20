<?php

namespace Interfaces;

interface PaymentMethodInterface
{
    public function processPayment(float $amount): bool;
}
