<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;
use Solid\SingleResponsibility\User;

class UserService
{
    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function registerUser(User $user): bool
    {
        try {
            if (!$user->isValid()) {
                $this->logger->warning('Attempted to register invalid user', [
                    'name' => $user->getName(),
                    'email' => $user->getEmail()
                ]);
                return false;
            }

            // Логика регистрации
            $this->logger->info('User registered successfully', [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'timestamp' => date('Y-m-d H:i:s')
            ]);

            return true;
        } catch (\Exception $e) {
            $this->logger->error('Failed to register user', [
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    public function updateUser(User $user): bool
    {
        $this->logger->info('User updated', [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);
        return true;
    }

    public function deleteUser(User $user): bool
    {
        $this->logger->warning('User deleted', [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);
        return true;
    }
}
