<?php

declare(strict_types=1);

namespace App\Entity;

use Monolog\Logger;

class Master
{
    private string $userInput;

    /**
     * Master constructor.
     * @param Transform $transform
     * @param Logger $logger
     * @param $userInput
     */
    public function __construct(Transform $transform, Logger $logger, $userInput)
    {
        $this->userInput = $transform->transform($userInput);
        $logger->info($this->userInput);
    }

    public function getInput() {
        return $this->userInput;
    }
}