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

}
