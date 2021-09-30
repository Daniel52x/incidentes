<?php

namespace App\Libraries\Incidente\Protocols;

use App\Libraries\Incidente\Exceptions\IncidenteProtocolException;

class IncidenteProtocol
{
    private $id;
    private $tipoIncidenteId;
    private $tipoCriticidadeId;
    private $titulo;
    private $descricao;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function getTipoIncidente(){
        return $this->tipoIncidenteId;
    }

    public function getTipoCriticidade(){
        return $this->tipoCriticidadeId;
    }

    public function getTitulo(){
        return $this->titulo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setId($id){
        if(!\is_numeric($id)){
            throw IncidenteProtocolException::idNaoNumerico();
        }
        return $this->id = $id;
    }

    public function setTipoIncidente($id){
        if(!\is_numeric($id)){
            throw IncidenteProtocolException::idTipoIncidenteNaoNumerico();
        }
        return $this->tipoIncidenteId = $id;
    }

    public function setTipoCriticidade($id){
        if(!\is_numeric($id)){
            throw IncidenteProtocolException::idTipoCriticidadeNaoNumerico();
        }
        return $this->tipoCriticidadeId = $id;
    }

    public function setTitulo($titulo){
        $titulo = trim(filter_var($titulo, FILTER_SANITIZE_STRING));
        if(empty($titulo)){
            throw IncidenteProtocolException::tituloVazio();
        }
        return $this->titulo = $titulo;
    }

    public function setDescricao($descricao){
        $descricao = trim(filter_var($descricao, FILTER_SANITIZE_STRING));
        if(empty($descricao)){
            throw IncidenteProtocolException::descricaoVazio();
        }
        return $this->descricao = $descricao;
    }

    public function setStatus($status){
        if(!\is_numeric($status)){
            throw IncidenteProtocolException::statusNaoNumerico();
        }
        return $this->status = $status;
    }
}


