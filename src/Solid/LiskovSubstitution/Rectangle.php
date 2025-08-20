<?php

namespace Solid\LiskovSubstitution;

class Rectangle
{
    protected float $width;
    protected float $height;

    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}
