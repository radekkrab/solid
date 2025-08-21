<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;

class FileLogger implements LoggerInterface
{
    private string $logFile;

    public function __construct(string $logFile = 'app.log')
    {
        $this->logFile = $logFile;
    }

    /**
     * @param array<string, mixed> $context
     */
    public function log(string $message, array $context = [], string $level = self::LEVEL_INFO): void
    {
        $timestamp = date('Y-m-d H:i:s');
        $contextStr = !empty($context) ? ' | Context: ' . json_encode($context) : '';
        $logEntry = "[{$timestamp}] [{$level}] {$message}{$contextStr}\n";

        file_put_contents($this->logFile, $logEntry, FILE_APPEND | LOCK_EX);
        echo "File Log [{$level}]: {$message}\n";
    }

    /**
     * @param array<string, mixed> $context
     */
    public function debug(string $message, array $context = []): void
    {
        $this->log($message, $context, self::LEVEL_DEBUG);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function info(string $message, array $context = []): void
    {
        $this->log($message, $context, self::LEVEL_INFO);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function warning(string $message, array $context = []): void
    {
        $this->log($message, $context, self::LEVEL_WARNING);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function error(string $message, array $context = []): void
    {
        $this->log($message, $context, self::LEVEL_ERROR);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function critical(string $message, array $context = []): void
    {
        $this->log($message, $context, self::LEVEL_CRITICAL);
    }
}
