<?php

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

echo "=== Single Responsibility Principle ===\n";
$user = new User("John Doe", "john@example.com");
$userRepository = new UserRepository();
$emailService = new EmailService();

$userRepository->save($user);
$emailService->sendWelcomeEmail($user);

echo "\n=== Open/Closed Principle ===\n";
$paymentProcessor = new PaymentProcessor();
$creditCard = new CreditCardPayment();
$paypal = new PayPalPayment();

$paymentProcessor->process($creditCard, 100.50);
$paymentProcessor->process($paypal, 75.25);

echo "\n=== Liskov Substitution Principle ===\n";
$rectangle = new Rectangle();
$rectangle->setWidth(5);
$rectangle->setHeight(4);
echo "Rectangle area: " . $rectangle->getArea() . "\n";

$square = new Square();
$square->setWidth(5);
echo "Square area: " . $square->getArea() . "\n";

echo "\n=== Interface Segregation Principle ===\n";
$simplePrinter = new SimplePrinter();
$simplePrinter->print();

$multifunctionPrinter = new MultifunctionPrinter();
$multifunctionPrinter->print();
$multifunctionPrinter->scan();
$multifunctionPrinter->fax();

echo "\n=== Dependency Inversion Principle ===\n";
$fileLogger = new FileLogger();
$userServiceWithFile = new UserService($fileLogger);
$userServiceWithFile->registerUser($user);

$databaseLogger = new DatabaseLogger();
$userServiceWithDb = new UserService($databaseLogger);
$userServiceWithDb->registerUser($user);
