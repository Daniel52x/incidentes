<?php

namespace App\Libraries\Utilitarios;

class UtilitariosLib
{
    public static function responseError(\Exception $e){
        return [
            'status' => false,
            'response' => [
                'error' => $e->getMessage()
            ]
        ];
    }

    public static function responseSuccess($response, $status = true){
        return [
            'status' => $status,
            'response' => $response
        ];
    }
}


