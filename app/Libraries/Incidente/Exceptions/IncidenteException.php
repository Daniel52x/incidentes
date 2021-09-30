<?php

namespace App\Libraries\Incidente\Exceptions;

class IncidenteException extends \Exception
{
    public function __construct($message, $errorCode) {
        parent::__construct($message, $errorCode);
    }

    public static function idTipoIncidenteInvalido(){
        return new self("Tipo incidente não encontrado", 400);
	}

    public static function idTipoCriticidadeInvalido(){
        return new self("Tipo criticidade não encontrado", 400);
	}
}


