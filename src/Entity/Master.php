<?php

declare(strict_types=1);
namespace App\Entity;


class Master
{
    private string $userInput;

    /**
     * Master constructor.
     * @param Transform $transform
     * @param Capitalize $capitalize
     * @param Logger $logger
     * @param Dashes $dashes
     * @param $userInput
     */
    public function __construct(Transform $transform, Capitalize $capitalize, Logger $logger, Dashes $dashes, $userInput)
    {
        $this->userInput = $transform->transform($userInput);
        $logger->logMsg($userInput);
    }

    public function getInput() {
        return $this->userInput;
    }
}