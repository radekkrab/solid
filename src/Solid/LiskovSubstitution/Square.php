<?php

declare(strict_types=1);

namespace Solid\LiskovSubstitution;

use Interfaces\ShapeInterface;

class Square implements ShapeInterface
{
    private float $side;

    public function __construct(float $side = 0)
    {
        $this->setSide($side);
    }

    public function setSide(float $side): void
    {
        if ($side < 0) {
            throw new \InvalidArgumentException('Side cannot be negative');
        }
        $this->side = $side;
    }

    public function getSide(): float
    {
        return $this->side;
    }

    public function getArea(): float
    {
        return $this->side * $this->side;
    }

    public function getPerimeter(): float
    {
        return 4 * $this->side;
    }
}
