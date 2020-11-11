<?php

namespace Database\Seeders;

use App\Models\Desenvolvedor;
use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desenvolvedor::create(['nome' => 'Bernardo', 'cargo' => 'analista pleno']);
        Desenvolvedor::create(['nome' => 'Carlos Arnaldo', 'cargo' => 'analista Senior']);
        Desenvolvedor::create(['nome' => 'Paulo', 'cargo' => 'Programador Jr']);
    }
}
