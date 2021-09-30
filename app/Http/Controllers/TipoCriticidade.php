<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\Criticidade\CriticidadeLib;

class TipoCriticidade extends Controller
{
    public function getAll(Request $request) {
        try {
            $crit = new CriticidadeLib();
            return response([
                'status' => true,
                'response' => $crit->getAll()
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
