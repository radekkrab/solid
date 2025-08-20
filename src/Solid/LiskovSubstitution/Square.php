<?php

namespace Solid\LiskovSubstitution;

use Solid\LiskovSubstitution\Rectangle;

class Square extends Rectangle
{
    public function setWidth(float $width): void
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight(float $height): void
    {
        $this->width = $height;
        $this->height = $height;
    }
}