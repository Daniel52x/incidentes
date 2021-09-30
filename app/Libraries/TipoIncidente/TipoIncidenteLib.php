<?php

namespace App\Libraries\TipoIncidente;
use App\Models\TipoIncidente;

class TipoIncidenteLib
{
    public function getAll()
    {
        return TipoIncidente::select('id', 'nome', 'created_at')->where('status', 1)->get()->toArray();
    }

    public function validateIdTipoIncidente($id){
        return TipoIncidente::where('id', $id)->count() > 0;
    }
}


