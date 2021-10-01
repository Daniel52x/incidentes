<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\TipoIncidente\TipoIncidenteLib;
use App\Libraries\Utilitarios\UtilitariosLib;

class TipoIncidente extends Controller
{
    public function getAll(Request $request) {
        try {
            $incidente = new TipoIncidenteLib();
            return response(UtilitariosLib::responseSuccess($incidente->getAll()), 200);
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }
}
