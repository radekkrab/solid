<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class EmailService
{
    public function sendWelcomeEmail(User $user): bool
    {
        try {
            if (!$user->isValid()) {
                throw new \InvalidArgumentException('Cannot send email to invalid user');
            }

            echo "Sending welcome email to: " . $user->getEmail() . "\n";
            return true;
        } catch (\Exception $e) {
            echo "Error sending email: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function sendPasswordResetEmail(User $user): bool
    {
        try {
            if (!$user->isValid()) {
                throw new \InvalidArgumentException('Cannot send email to invalid user');
            }

            echo "Sending password reset email to: " . $user->getEmail() . "\n";
            return true;
        } catch (\Exception $e) {
            echo "Error sending password reset email: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function sendNotificationEmail(User $user, string $subject, string $message): bool
    {
        try {
            if (!$user->isValid()) {
                throw new \InvalidArgumentException('Cannot send email to invalid user');
            }

            echo "Sending notification email to: " . $user->getEmail() . " - Subject: {$subject}\n";
            return true;
        } catch (\Exception $e) {
            echo "Error sending notification email: " . $e->getMessage() . "\n";
            return false;
        }
    }
}
