<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Criticidade extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('criticidade')->insert([
            [
                'nome' => 'Alta',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Média',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome' => 'Baixa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
