<?php

namespace Solid\InterfaceSegregation;

use Interfaces\PrinterInterface;

class SimplePrinter implements PrinterInterface
{

    public function print(): void
    {
        echo "Printing document...\n";
    }
}