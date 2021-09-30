<?php

namespace App\Libraries\Criticidade;
use App\Models\Criticidade;

class CriticidadeLib
{
    public function getAll()
    {
        return Criticidade::select('id', 'nome', 'created_at')->where('status', 1)->get()->toArray();
    }
}


