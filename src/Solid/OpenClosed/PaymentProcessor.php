<?php

declare(strict_types=1);

namespace Solid\OpenClosed;

use Interfaces\PaymentMethodInterface;

class PaymentProcessor
{
    /** @var array<int, array<string, mixed>> */
    private array $processedPayments = [];

    public function process(PaymentMethodInterface $paymentMethod, float $amount): bool
    {
        try {
            if ($amount <= 0) {
                throw new \InvalidArgumentException('Payment amount must be positive');
            }

            $result = $paymentMethod->processPayment($amount);

            if ($result) {
                $this->processedPayments[] = [
                    'method' => get_class($paymentMethod),
                    'amount' => $amount,
                    'timestamp' => date('Y-m-d H:i:s'),
                    'status' => 'success'
                ];
            }

            return $result;
        } catch (\Exception $e) {
            $this->processedPayments[] = [
                'method' => get_class($paymentMethod),
                'amount' => $amount,
                'timestamp' => date('Y-m-d H:i:s'),
                'status' => 'failed',
                'error' => $e->getMessage()
            ];
            throw $e;
        }
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getProcessedPayments(): array
    {
        return $this->processedPayments;
    }

    public function getTotalProcessed(): float
    {
        return array_reduce($this->processedPayments, function ($carry, $payment) {
            return $carry + ($payment['status'] === 'success' ? $payment['amount'] : 0);
        }, 0.0);
    }

    public function getSuccessRate(): float
    {
        if (empty($this->processedPayments)) {
            return 0.0;
        }

        $successful = count(array_filter($this->processedPayments, fn($p) => $p['status'] === 'success'));
        return $successful / count($this->processedPayments) * 100;
    }
}
