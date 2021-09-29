<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoIncidente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_incidente')->insert([
            [
                'nome' => 'Alarme',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Incidente',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Outros',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
