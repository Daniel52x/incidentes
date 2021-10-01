<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidente extends Model
{
    use HasFactory;

    protected $table = 'incidente';

    protected $fillable = [
        'tipo_incidente_id',
        'criticidade_id',
        'titulo',
        'descricao',
        'status',
    ];

    public function getAllIncidentes(){
        return $this->select('incidente.id', 'incidente.titulo', 'incidente.descricao', 'c.nome as criticidade', 't.nome as tipo_incidente', 'incidente.status', 'incidente.created_at')
            ->join('criticidade as c', 'c.id', '=', 'incidente.criticidade_id')
            ->join('tipo_incidente as t', 't.id', '=', 'incidente.tipo_incidente_id')
            ->orderBy('incidente.id', 'desc')
            ->get();
    }

    public function getById($id){
        return $this->select('incidente.id', 'incidente.titulo', 'incidente.descricao', 'c.nome as criticidade', 't.nome as tipo_incidente', 'incidente.status', 'incidente.created_at', 'incidente.criticidade_id', 'incidente.tipo_incidente_id')
            ->join('criticidade as c', 'c.id', '=', 'incidente.criticidade_id')
            ->join('tipo_incidente as t', 't.id', '=', 'incidente.tipo_incidente_id')
            ->where('incidente.id', $id)
            ->orderBy('incidente.id', 'desc')
            ->first();
    }

}
