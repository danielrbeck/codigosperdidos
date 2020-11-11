@extends('layouts.app', ["currentpage" => "categorias"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/categorias" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria"
                        id="nomeCategoria" placeholder="Categoria">
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection