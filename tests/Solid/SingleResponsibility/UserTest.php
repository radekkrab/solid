<?php

declare(strict_types=1);

namespace Tests\Solid\SingleResponsibility;

use PHPUnit\Framework\TestCase;
use Solid\SingleResponsibility\User;

class UserTest extends TestCase
{
    public function testUserCreationWithValidData(): void
    {
        $user = new User("John Doe", "john@example.com");

        $this->assertEquals("John Doe", $user->getName());
        $this->assertEquals("john@example.com", $user->getEmail());
        $this->assertTrue($user->isValid());
    }

    public function testUserCreationWithEmptyNameThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Name cannot be empty');

        new User("", "john@example.com");
    }

    public function testUserCreationWithInvalidEmailThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid email format: invalid-email');

        new User("John Doe", "invalid-email");
    }

    public function testUserCreationWithWhitespaceNameThrowsException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Name cannot be empty');

        new User("   ", "john@example.com");
    }

    public function testUserIsValidReturnsTrueForValidUser(): void
    {
        $user = new User("John Doe", "john@example.com");
        $this->assertTrue($user->isValid());
    }
}
