<?php

declare(strict_types=1);

namespace Solid\SingleResponsibility;

class UserRepository
{
    /** @var array<int, User> */
    private array $users = [];

    public function save(User $user): bool
    {
        try {
            if (!$user->isValid()) {
                throw new \InvalidArgumentException('Cannot save invalid user');
            }

            $this->users[] = $user;
            echo "Saving user: " . $user->getName() . "\n";
            return true;
        } catch (\Exception $e) {
            echo "Error saving user: " . $e->getMessage() . "\n";
            return false;
        }
    }

    public function findById(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }

    /**
     * @return array<int, User>
     */
    public function getAll(): array
    {
        return $this->users;
    }

    public function delete(string $email): bool
    {
        foreach ($this->users as $key => $user) {
            if ($user->getEmail() === $email) {
                unset($this->users[$key]);
                return true;
            }
        }
        return false;
    }
}
