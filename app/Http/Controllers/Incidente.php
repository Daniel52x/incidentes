<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Incidente\Protocols\IncidenteProtocol;
use App\Libraries\Incidente\IncidenteLib;
use App\Libraries\Incidente\Exceptions\IncidenteException;

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
            return response([
                'status' => true,
                'response' => [
                    "idIncidente" => $idIncidente
                ]
            ], 200);
        } catch (IncidenteException $e) {
            return response([
                'status' => false,
                'response' => [
                    'error' => $e->getMessage()
                ]
            ], $e->getCode());
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'response' => [
                    'error' => 'Server Error'
                ]
            ], 500);
        }
    }
}
