<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nome' => 'Roupas']);
        Categoria::create(['nome' => 'Eletronicos']);
        Categoria::create(['nome' => 'Perfumes']);
        Categoria::create(['nome' => 'Moveis']);
        Categoria::create(['nome' => 'Alimentos']);
        Categoria::create(['nome' => 'Informatica']);
    }
}
