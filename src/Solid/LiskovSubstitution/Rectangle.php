<?php

declare(strict_types=1);

namespace Solid\LiskovSubstitution;

use Interfaces\ShapeInterface;

class Rectangle implements ShapeInterface
{
    protected float $width;
    protected float $height;

    public function __construct(float $width = 0, float $height = 0)
    {
        $this->setWidth($width);
        $this->setHeight($height);
    }

    public function setWidth(float $width): void
    {
        if ($width < 0) {
            throw new \InvalidArgumentException('Width cannot be negative');
        }
        $this->width = $width;
    }

    public function setHeight(float $height): void
    {
        if ($height < 0) {
            throw new \InvalidArgumentException('Height cannot be negative');
        }
        $this->height = $height;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }

    public function getPerimeter(): float
    {
        return 2 * ($this->width + $this->height);
    }
}
