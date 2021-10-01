<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Incidente\Protocols\IncidenteProtocol;
use App\Libraries\Incidente\IncidenteLib;
use App\Libraries\Incidente\Exceptions\IncidenteException;
use App\Libraries\Utilitarios\UtilitariosLib;

class Incidente extends Controller
{
    public function insert(Request $request) {
        try {
            $incidenteProtocol = new IncidenteProtocol();
            $incidenteProtocol->setTipoIncidente($request->get('tipo_id_incidente'));
            $incidenteProtocol->setTipoCriticidade($request->get('tipo_id_criticidade'));
            $incidenteProtocol->setTitulo($request->get('titulo'));
            $incidenteProtocol->setDescricao($request->get('descricao'));

            $incidente = new IncidenteLib();
            $idIncidente = $incidente->insert($incidenteProtocol);
            return response(UtilitariosLib::responseSuccess([
                "idIncidente" => $idIncidente
            ]), 200);
        } catch (IncidenteException $e) {
            return response(UtilitariosLib::responseError($e), $e->getCode());
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }

    public function delete(Request $request, $id) {
        try {
            $incidenteProtocol = new IncidenteProtocol();
            $incidenteProtocol->setId($id);

            $incidente = new IncidenteLib();
            $linhasAfetadas = $incidente->delete($incidenteProtocol);
            if($linhasAfetadas <= 0){
                throw new IncidenteException("Não foi possível realizar a exclusão do registro", 400);
            }
            return response(UtilitariosLib::responseSuccess([]), 200);
        } catch (IncidenteException $e) {
            return response(UtilitariosLib::responseError($e), $e->getCode());
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            $incidenteProtocol = new IncidenteProtocol();
            $incidenteProtocol->setId($id);
            $incidenteProtocol->setTipoIncidente($request->get('tipo_id_incidente'));
            $incidenteProtocol->setTipoCriticidade($request->get('tipo_id_criticidade'));
            $incidenteProtocol->setTitulo($request->get('titulo'));
            $incidenteProtocol->setDescricao($request->get('descricao'));
            $incidenteProtocol->setStatus($request->get('status'));

            $incidente = new IncidenteLib();
            $linhasAfetadas = $incidente->update($incidenteProtocol);
            if($linhasAfetadas <= 0){
                throw new IncidenteException("Não foi possível realizar a alteração do registro", 400);
            }

            return response(UtilitariosLib::responseSuccess([]), 200);
        } catch (IncidenteException $e) {
            return response(UtilitariosLib::responseError($e), $e->getCode());
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }

    public function getAll(Request $request) {
        try {
            $incidente = new IncidenteLib();
            return response(UtilitariosLib::responseSuccess(
                $incidente->getAll()
            ), 200);
        } catch (IncidenteException $e) {
            return response(UtilitariosLib::responseError($e), $e->getCode());
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }

    public function getById(Request $request, $id) {
        try {
            $incidenteProtocol = new IncidenteProtocol();
            $incidenteProtocol->setId($id);

            $incidente = new IncidenteLib();
            $dadosIncidentes = $incidente->getById($incidenteProtocol);
            return response(UtilitariosLib::responseSuccess($dadosIncidentes, count($dadosIncidentes) > 0), 200);
        } catch (IncidenteException $e) {
            return response(UtilitariosLib::responseError($e), $e->getCode());
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }
}
