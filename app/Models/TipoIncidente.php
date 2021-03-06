<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIncidente extends Model
{
    use HasFactory;

    protected $table = 'tipo_incidente';

    protected $fillable = [
        'nome',
        'status'
    ];
}
