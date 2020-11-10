<?php

namespace App\Entity;

class Logger
{
    public function logMsg($massage) {
        $logger = new \Monolog\Logger('logger');
        $logger->info($massage);
    }
}