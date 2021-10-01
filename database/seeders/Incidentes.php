<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Incidentes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('incidente')->insert([
            [
                'tipo_incidente_id' => '1',
                'criticidade_id' => '1',
                'titulo' => 'Teste',
                'descricao' => 'Teste',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tipo_incidente_id' => '2',
                'criticidade_id' => '2',
                'titulo' => 'Teste 2',
                'descricao' => 'Teste 2',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'tipo_incidente_id' => '2',
                'criticidade_id' => '2',
                'titulo' => 'Teste 3',
                'descricao' => 'Teste 3',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
