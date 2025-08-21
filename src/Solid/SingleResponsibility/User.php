<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class User
{
    public function __construct(
        private readonly string $name,
        private readonly string $email
    ) {
        if (empty(trim($name))) {
            throw new \InvalidArgumentException('Name cannot be empty');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format: ' . $email);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function isValid(): bool
    {
        return !empty($this->name) && filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }
}
