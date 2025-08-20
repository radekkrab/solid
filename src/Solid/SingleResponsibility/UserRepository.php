<?php

namespace Solid\SingleResponsibility;

class UserRepository
{
    public function save(User $user): bool
    {
        // Логика сохранения пользователя в БД
        echo "Saving user: " . $user->getName() . "\n";
        return true;
    }
}