<?php

namespace App\Libraries\Incidente\Exceptions;

class IncidenteProtocolException extends IncidenteException
{
    public function __construct($message, $errorCode) {
        parent::__construct($message, $errorCode);
    }

    public static function idNaoNumerico(){
        return new self("O atributo 'id' precisa ser do tipo int", 400);
	}

    public static function idTipoIncidenteNaoNumerico(){
        return new self("O atributo 'tipo incidente id' precisa ser do tipo int", 400);
	}

    public static function idTipoCriticidadeNaoNumerico(){
        return new self("O atributo 'tipo criticidade id' precisa ser do tipo int", 400);
	}

    public static function tituloVazio(){
        return new self("O atributo 'título' precisa ser preenchido", 400);
	}

    public static function descricaoVazio(){
        return new self("O atributo 'descrição' precisa ser preenchido", 400);
	}

    public static function statusNaoNumerico(){
        return new self("O atributo 'status' precisa ser do tipo int", 400);
	}
}



