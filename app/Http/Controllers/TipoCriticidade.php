<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\Criticidade\CriticidadeLib;
use App\Libraries\Utilitarios\UtilitariosLib;
class TipoCriticidade extends Controller
{
    public function getAll(Request $request) {
        try {
            $crit = new CriticidadeLib();
            return response(UtilitariosLib::responseSuccess([
                $crit->getAll()
            ]), 200);
        } catch (\Exception $e) {
            return response(UtilitariosLib::responseError($e), 500);
        }
    }
}
