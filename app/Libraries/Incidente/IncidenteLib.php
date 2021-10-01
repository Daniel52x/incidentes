<?php

namespace App\Libraries\Incidente;
use App\Models\Incidente;
use App\Libraries\Incidente\Protocols\IncidenteProtocol;
use App\Libraries\TipoIncidente\TipoIncidenteLib;
use App\Libraries\Criticidade\CriticidadeLib;
use App\Libraries\Incidente\Exceptions\IncidenteException;

class IncidenteLib
{
    public function insert(IncidenteProtocol $inciProtocol)
    {
        $this->validateCaracteristicasIncidentes($inciProtocol);

        $incidente = Incidente::create([
            'tipo_incidente_id' => $inciProtocol->getTipoIncidente(),
            'criticidade_id' => $inciProtocol->getTipoCriticidade(),
            'titulo' => $inciProtocol->getTitulo(),
            'descricao' => $inciProtocol->getDescricao()
        ]);
        return $incidente->id;
    }

    public function validateTipoIncidente($tipoId){
        $tipoIncidente = new TipoIncidenteLib();
        return $tipoIncidente->validateIdTipoIncidente($tipoId);
    }

    public function validateTipoCriticidade($tipoId){
        $tipoCriticidade = new CriticidadeLib();
        return $tipoCriticidade->validateIdCriticidade($tipoId);
    }

    public function delete(IncidenteProtocol $inciProtocol){
        return Incidente::where('id', $inciProtocol->getId())->delete();
    }

    public function update(IncidenteProtocol $inciProtocol){
        $this->validateCaracteristicasIncidentes($inciProtocol);

        return Incidente::where('id', $inciProtocol->getId())->update([
            'tipo_incidente_id' => $inciProtocol->getTipoIncidente(),
            'criticidade_id' => $inciProtocol->getTipoCriticidade(),
            'titulo' => $inciProtocol->getTitulo(),
            'descricao' => $inciProtocol->getDescricao(),
            'status' => $inciProtocol->getStatus()
        ]);
    }

    public function getAll(){
        $indenteModel = new Incidente();
        return $indenteModel->getAllIncidentes()->toArray();
    }

    public function getById(IncidenteProtocol $inciProtocol){
        $indenteModel = new Incidente();
        $incidente = $indenteModel->getById($inciProtocol->getId());
        return $incidente ? $incidente->toArray() : [];
    }

    private function validateCaracteristicasIncidentes(IncidenteProtocol $inciProtocol){
        if(!$this->validateTipoIncidente($inciProtocol->getTipoIncidente())){
            throw IncidenteException::idTipoIncidenteInvalido();
        }

        if(!$this->validateTipoCriticidade($inciProtocol->getTipoCriticidade())){
            throw IncidenteException::idTipoCriticidadeInvalido();
        }
    }


}


