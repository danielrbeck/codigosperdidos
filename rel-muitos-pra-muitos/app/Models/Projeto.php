<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    function desenvolvedores(){
        //   ^^nome do campo        modelo  VV             tabela intermediaria    pivot(campos da tabela intermediaria)
        return $this->belongsToMany('App\Models\Desenvolvedor', 'alocacoes')->withPivot('horas_semanais');
    }
}
