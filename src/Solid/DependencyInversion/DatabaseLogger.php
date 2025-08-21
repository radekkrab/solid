<?php

declare(strict_types=1);

namespace Solid\DependencyInversion;

use Interfaces\LoggerInterface;

class DatabaseLogger implements LoggerInterface
{
    /** @var array<int, array<string, mixed>> */
    private array $logs = [];

    /**
     * @param array<string, mixed> $context
     */
    public function log(string $message, array $context = [], string $level = self::LEVEL_INFO): void
    {
        $logEntry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'level' => $level,
            'message' => $message,
            'context' => $context
        ];

        $this->logs[] = $logEntry;
        echo "Database Log [{$level}]: {$message}\n";

        // В реальном проекте здесь был бы INSERT в БД
        // $this->pdo->prepare("INSERT INTO logs (timestamp, level, message, context) VALUES (?, ?, ?, ?)")->execute([...]);
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

    /**
     * @return array<int, array<string, mixed>>
     */
    public function getLogs(): array
    {
        return $this->logs;
    }

    public function clearLogs(): void
    {
        $this->logs = [];
    }
}
