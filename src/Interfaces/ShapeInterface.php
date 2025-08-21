<?php

declare(strict_types=1);

namespace Interfaces;

interface ShapeInterface
{
    public function getArea(): float;
    public function getPerimeter(): float;
}
