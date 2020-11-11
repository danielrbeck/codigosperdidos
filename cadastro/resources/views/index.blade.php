@extends('layouts.app')

@section('body')
    <div class="jumbotron bg-light border border secondary">
        <div class="row">
            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Produtos</h5>
                        <p class="card-text">
                            Aqui voce cadastra todos seus produtos
                            nao esqueça de cadastrar as categorias e o token
                        </p>
                        <a href="/produtos" class="btn btn-primary">Cadastrar Produtos</a>
                    </div>
                </div>
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Categorias</h5>
                        <p class="card-text">
                            Aqui voce cadastra todos seus categorias
                            nao esqueça do token
                        </p>
                        <a href="/categorias" class="btn btn-primary">Cadastrar Categorias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection