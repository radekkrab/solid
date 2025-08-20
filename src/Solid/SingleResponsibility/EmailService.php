<?php

namespace Solid\SingleResponsibility;

class EmailService
{
    public function sendWelcomeEmail(User $user): bool
    {
        // Логика отправки email
        echo "Sending welcome email to: " . $user->getEmail() . "\n";
        return true;
    }
}