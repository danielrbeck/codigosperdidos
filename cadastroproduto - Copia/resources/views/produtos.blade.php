@extends('layouts.app', ["currentpage" => "produtos"])

@section('body')
<div class="card border">
    <div class="card-body">
        
        <div class="card-title">
            <h5>Lista de Produtos:</h5>
            <button type="button" data-toggle="modal" data-target="#dlgProdutos" class="btn btn-sm btn-primary" role="button" onClick="novoProduto()">Novo Produto</button>
            <a href="/produtos/novo" class="btn btn-sm btn-primary">Link pagina novo produto</a>
        </div>
        
        @if (count($prods) > 0)          
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prods as $prod)
                <tr>
                    <td>{{$prod->id}}</td>
                    <td>{{$prod->nome}}</td>
                    <td>{{$prod->estoque}}</td>
                    <td>{{$prod->preco}}</td>
                    <td>{{$cats->find($prod->categoria_id)->nome}}</td>
                    <td>
                        <a href="/produtos/editar/{{$prod->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/produtos/apagar/{{$prod->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

</script>
@endsection