<?php

namespace App\Entity;

class Logger
{
    public function logMsg() {
        $logger = new \Monolog\Logger('logger');
        $logger->info("it works");
    }
}