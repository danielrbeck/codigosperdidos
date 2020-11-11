<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create(
            ['nome' => 'Camiseta polo', 
            'preco'=>100, 
            'estoque' => 4, 
            'categoria_id' =>1]);

        Produto::create(
            ['nome' => 'calça jeans', 
            'preco'=>120, 
            'estoque' => 1, 
            'categoria_id' =>1]);

        Produto::create(
            ['nome' => 'Camisa Manga Longa', 
            'preco'=>100, 
            'estoque' => 1, 
            'categoria_id' =>1]);

        Produto::create(
            ['nome' => 'PC games', 
            'preco'=>200, 
            'estoque' => 4, 
            'categoria_id' =>2]);

        Produto::create(
            ['nome' => 'Impressora', 
            'preco'=>500, 
            'estoque' => 5, 
            'categoria_id' =>6]);

        Produto::create(
            ['nome' => 'Mouse', 
            'preco'=>500, 
            'estoque' => 8, 
            'categoria_id' =>6]);

        Produto::create(
            ['nome' => 'perfume tal', 
            'preco'=>500, 
            'estoque' => 3, 
            'categoria_id' =>3]);

        Produto::create(
            ['nome' => 'Cama de casal', 
            'preco'=>500, 
            'estoque' => 5, 
            'categoria_id' =>4]);

        Produto::create(
            ['nome' => 'Moveis', 
            'preco'=>500, 
            'estoque' => 9, 
            'categoria_id' =>4]);
    }
}
