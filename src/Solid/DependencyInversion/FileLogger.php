<?php

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface
{
    public function log(string $message): void
    {
        echo "File Log: " . $message . "\n";
    }
}
