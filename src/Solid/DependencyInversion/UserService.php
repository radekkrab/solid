<?php

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;
use Solid\SingleResponsibility\User;

class UserService
{
    public function __construct(private readonly  LoggerInterface $logger) {}

    public function registerUser(User $user): bool
    {
        // Логика регистрации
        $this->logger->log("User registered: " . $user->getName());
        return true;
    }
}