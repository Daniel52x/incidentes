<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\TipoIncidente\TipoIncidenteLib;

class TipoIncidente extends Controller
{
    public function getAll(Request $request) {
        try {
            $incidente = new TipoIncidenteLib();
            return response([
                'status' => true,
                'response' => $incidente->getAll()
            ], 200);
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
