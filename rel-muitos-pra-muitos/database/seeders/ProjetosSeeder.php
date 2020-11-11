<?php

namespace Database\Seeders;

use App\Models\Projeto;
use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projeto::create(['nome' => 'Sistema de alocação de recursos', 'estimativa_horas' => 200]);
        Projeto::create(['nome' => 'Sistema de bibliotecas', 'estimativa_horas' => 1000]);
        Projeto::create(['nome' => 'Sistema de vendar', 'estimativa_horas' => 2000]);
        Projeto::create(['nome' => 'Novo sistema', 'estimativa_horas' => 5000]);
    }
}
