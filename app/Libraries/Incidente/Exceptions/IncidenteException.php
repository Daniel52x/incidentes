<?php

namespace App\Libraries\Incidente\Exceptions;

class IncidenteException extends \Exception
{
    public function __construct($message, $errorCode) {
        parent::__construct($message, $errorCode);
    }

}


