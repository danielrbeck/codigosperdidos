<?php

use App\Models\Desenvolvedor;
use App\Models\Projeto;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedores as $desenvolvedor) {
        echo "<p>Nome do desenvolvedor:" . $desenvolvedor->nome . "</p>";
        echo "<p>Cargo:" . $desenvolvedor->cargo . "</p>";
        if (count($desenvolvedor->projetos)> 0){
            echo "Projetos:<br>";
            echo "<ul>";
            foreach ($desenvolvedor->projetos as $projeto) {
                echo  "<li>";
                echo "Nome: ". $projeto->nome . " | ";
                echo "Horas: ". $projeto->estimativa_horas . " | ";
                echo "Horas trabalhadas: ". $projeto->pivot->horas_semanais . " | ";
                echo  "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
});


Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $projeto) {
        echo "<p>Nome do Projeto:" . $projeto->nome . "</p>";
        echo "<p>Estimativa de horas:" . $projeto->estimativa_horas . "</p>";

        if (count($projeto->desenvolvedores)> 0){
            echo "Desenvolvedores:<br>";
            echo "<ul>";
            foreach ($projeto->desenvolvedores as $dev) {
                echo  "<li>";
                echo "Nome: ". $dev->nome . " | ";
                echo "Cargo: ". $dev->cargo . " | ";
                echo "Horas trabalhadas: ". $dev->pivot->horas_semanais . " | ";
                echo  "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
});


Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if(isset($projeto)){
        $projeto->desenvolvedores()->attach(1,['horas_semanais'=>50]);
        $projeto->desenvolvedores()->attach([
            2=>['horas_semanais'=>20],
            3=>['horas_semanais'=>30],
        ]);
    }
});

Route::get('/desalocar', function () {
    $projeto = Projeto::find(4);
    if(isset($projeto)){
        $projeto->desenvolvedores()->detach([1,2,3]);
        //$projeto->desenvolvedores()->detach(1);
    }
});