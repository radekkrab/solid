<?php

namespace Solid\InterfaceSegregation;

use Interfaces\FaxInterface;
use Interfaces\PrinterInterface;
use Interfaces\ScannerInterface;

class MultifunctionPrinter implements PrinterInterface, FaxInterface, ScannerInterface
{
    public function print(): void
    {
        echo "Printing document...\n";
    }

    public function scan(): void
    {
        echo "Scanning document...\n";
    }

    public function fax(): void
    {
        echo "Sending fax...\n";
    }
}
