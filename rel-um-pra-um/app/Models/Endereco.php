<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    public function cliente(){
        //nao é necessario por ,'cliente_id', 'id', ele já faz isso seguindo esse padrão
        return $this->belongsTo('App\Models\Cliente', 'cliente_id','id');
    }
}
