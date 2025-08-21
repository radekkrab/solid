<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use Solid\SingleResponsibility\User;
use Solid\SingleResponsibility\UserRepository;
use Solid\SingleResponsibility\EmailService;
use Solid\OpenClosed\CreditCardPayment;
use Solid\OpenClosed\PayPalPayment;
use Solid\OpenClosed\PaymentProcessor;
use Solid\LiskovSubstitution\Rectangle;
use Solid\LiskovSubstitution\Square;
use Solid\InterfaceSegregation\SimplePrinter;
use Solid\InterfaceSegregation\MultifunctionPrinter;
use Solid\DependencyInversion\FileLogger;
use Solid\DependencyInversion\DatabaseLogger;
use Solid\DependencyInversion\UserService;

echo "=== SOLID Principles Demo ===\n\n";

echo "=== Single Responsibility Principle ===\n";
try {
    $user = new User("John Doe", "john@example.com");
    $userRepository = new UserRepository();
    $emailService = new EmailService();

    $userRepository->save($user);
    $emailService->sendWelcomeEmail($user);
    $emailService->sendNotificationEmail($user, "Welcome", "Welcome to our platform!");

    // Демонстрация валидации
    echo "\n--- Validation Demo ---\n";
    try {
        $invalidUser = new User("", "invalid-email");
    } catch (\InvalidArgumentException $e) {
        echo "Validation error: " . $e->getMessage() . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Open/Closed Principle ===\n";
try {
    $paymentProcessor = new PaymentProcessor();
    $creditCard = new CreditCardPayment();
    $paypal = new PayPalPayment();

    $paymentProcessor->process($creditCard, 100.50);
    $paymentProcessor->process($paypal, 75.25);

    // Демонстрация статистики
    echo "\n--- Payment Statistics ---\n";
    echo "Total processed: $" . number_format($paymentProcessor->getTotalProcessed(), 2) . "\n";
    echo "Success rate: " . number_format($paymentProcessor->getSuccessRate(), 1) . "%\n";

    // Демонстрация обработки ошибок
    try {
        $paymentProcessor->process($creditCard, -50.00);
    } catch (\InvalidArgumentException $e) {
        echo "Payment error: " . $e->getMessage() . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Liskov Substitution Principle ===\n";
try {
    $rectangle = new Rectangle(5, 4);
    echo "Rectangle area: " . $rectangle->getArea() . "\n";
    echo "Rectangle perimeter: " . $rectangle->getPerimeter() . "\n";

    $square = new Square(5);
    echo "Square area: " . $square->getArea() . "\n";
    echo "Square perimeter: " . $square->getPerimeter() . "\n";

    // Демонстрация валидации
    try {
        $rectangle->setWidth(-5);
    } catch (\InvalidArgumentException $e) {
        echo "Rectangle validation error: " . $e->getMessage() . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Interface Segregation Principle ===\n";
try {
    $simplePrinter = new SimplePrinter();
    $simplePrinter->print();

    $multifunctionPrinter = new MultifunctionPrinter();
    $multifunctionPrinter->print();
    $multifunctionPrinter->scan();
    $multifunctionPrinter->fax();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Dependency Inversion Principle ===\n";
try {
    $fileLogger = new FileLogger();
    $userServiceWithFile = new UserService($fileLogger);
    $userServiceWithFile->registerUser($user);
    $userServiceWithFile->updateUser($user);
    $userServiceWithFile->deleteUser($user);

    echo "\n--- Database Logger Demo ---\n";
    $databaseLogger = new DatabaseLogger();
    $userServiceWithDb = new UserService($databaseLogger);
    $userServiceWithDb->registerUser($user);

    // Демонстрация разных уровней логирования
    $databaseLogger->debug("Debug message", ['user_id' => 1]);
    $databaseLogger->info("Info message", ['action' => 'login']);
    $databaseLogger->warning("Warning message", ['attempts' => 3]);
    $databaseLogger->error("Error message", ['error_code' => 500]);
    $databaseLogger->critical("Critical error", ['system' => 'database']);

    echo "\n--- Logs from Database Logger ---\n";
    $logs = $databaseLogger->getLogs();
    foreach ($logs as $log) {
        echo "[{$log['level']}] {$log['message']}\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

echo "\n=== Demo Completed Successfully! ===\n";
