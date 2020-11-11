@extends('layouts.app', ["currentpage" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos/{{$prod->id}}" method="POST">
                @csrf
                <div class="form-group">

                    <label for="nomeProduto">Nome do Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" value="{{$prod->nome}}"
                        id="nomeProduto" placeholder="Nome do Produto">
                    
                    <label for="estoqueProduto">Estoque</label>
                    <input type="text" class="form-control" name="estoqueProduto" value="{{$prod->estoque}}"
                        id="estoqueProduto" placeholder="Quantidade de Estoque">
                    
                    <label for="precoProduto">Preço</label>
                    <input type="text" class="form-control" name="precoProduto" value="{{$prod->preco}}"
                        id="precoProduto" placeholder="Preço do Produto">
                    
                    <label for="categoriaProduto">Categoria do Produto</label>
                    <select class="custom-select form-control" name="categoriaProduto" id="categoriaProduto"
                        placeholder="Categoria do Produto">
                        <option value="{{$prod->categoria_id}}">{{$cats->find($prod->categoria_id)->nome}}</option>
                        @foreach ($cats as $cat)
                        <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>

                </div>
                <button class="btn btn-primary btn-sm" type="submit">Salvar</button>
            </form>
        </div>
    </div>
@endsection