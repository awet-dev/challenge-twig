<?php


namespace App\Entity;


class Dashes implements Transform
{
    public function transform(string $string): string
    {
        // TODO: Implement transform() method.
        $words = explode(" ", $string);
        return implode("-", $words);
    }
}