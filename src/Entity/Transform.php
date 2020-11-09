<?php

declare(strict_types=1);

namespace App\Entity;

interface Transform
{
    public function transform(string $string): string;
}