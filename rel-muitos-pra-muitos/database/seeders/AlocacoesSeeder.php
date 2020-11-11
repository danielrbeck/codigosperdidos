<?php

namespace Database\Seeders;

use App\Models\Alocacao;
use Illuminate\Database\Seeder;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alocacao::create(['projeto_id' => 1, 'desenvolvedor_id' => 1, 'horas_semanais' => 11]);
        Alocacao::create(['projeto_id' => 1, 'desenvolvedor_id' => 2, 'horas_semanais' => 13]);
        Alocacao::create(['projeto_id' => 2, 'desenvolvedor_id' => 2, 'horas_semanais' => 24]);
        Alocacao::create(['projeto_id' => 2, 'desenvolvedor_id' => 3, 'horas_semanais' => 35]);
        Alocacao::create(['projeto_id' => 3, 'desenvolvedor_id' => 1, 'horas_semanais' => 16]);
        Alocacao::create(['projeto_id' => 3, 'desenvolvedor_id' => 2, 'horas_semanais' => 17]);
        Alocacao::create(['projeto_id' => 3, 'desenvolvedor_id' => 3, 'horas_semanais' => 5]);
    }
}
