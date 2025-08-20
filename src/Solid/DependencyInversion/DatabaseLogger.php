<?php

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;

class DatabaseLogger implements LoggerInterface
{

    public function log(string $message): void
    {
        echo "Database Log: " . $message . "\n";
    }
}