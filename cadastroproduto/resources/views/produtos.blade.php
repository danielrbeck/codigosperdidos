@extends('layouts.app', ["currentpage" => "produtos"])

@section('body')

<div class="card border">
  <div class="card-body">
    
    <div class="card-title">
      <h5>Lista de Produtos:</h5>
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#dlgProdutos" onclick="novoProduto()">Novo Produto (adicionar modal na class)</button>
      <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#produtosDlgJQuery" onclick="zerarCamposJQuery()">Novo Produto JQuery</button>
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

<table class="table table-ordered table-hover" id="tabelaProdutosJQuery" name="tabelaProdutosJQuery">
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
    
  </tbody>
</table>

<div class="" id="dlgProdutos" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dlgProdutosLongTitle">Adicionar Novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="/produtos" id="formProdutos" name="formProdutos" class="form-horizontal" method="POST">
        @csrf
        <div class="modal-body">
          
          <div class="form-group">
            
            <label for="nomeProduto" class="control-label">Nome do Produto</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nomeProduto"
              id="nomeProduto" placeholder="Nome do Produto">
            </div>
            
            <label for="estoqueProduto">Estoque</label>
            <div class="input-group">
              <input type="text" class="form-control" name="estoqueProduto"
              id="estoqueProduto" placeholder="Quantidade de Estoque">
            </div>
            
            <label for="precoProduto">Preço</label>
            <div class="input-group">
              <input type="text" class="form-control" name="precoProduto"
              id="precoProduto" placeholder="Preço do Produto">
            </div>
            
            <label for="categoriaProduto">Categoria do Produto</label>
            <div class="input-group">
              <select class="custom-select form-control" name="categoriaProduto" id="categoriaProduto"
              placeholder="Categoria do Produto">
              @foreach ($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->nome}}</option>
              @endforeach
            </select>
          </div>  
          
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary btn-sm" type="submit">Salvar</button>
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" type="cancel" data-dismiss="modal">Cancelar</button>
        </div>
        
      </form>
      
    </div>
  </div>
</div> 


<div class="modal fade" id="produtosDlgJQuery" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="produtosDlgJQueryLongTitle">Adicionar Novo Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form action="/api/produtos" id="formProdutos2" name="formProdutos2" class="form-horizontal" method="POST">
        
        <div class="modal-body">
          <input type="hidden" id="id" class="form-control">
          
          <div class="form-group">
            
            <label for="nomeProduto2" class="control-label">Nome do Produto</label>
            <div class="input-group">
              <input type="text" class="form-control" name="nomeProduto2"
              id="nomeProduto2" placeholder="Nome do Produto">
            </div>            
            
            <label for="estoqueProduto2">Estoque</label>
            <div class="input-group">
              <input type="text" class="form-control" name="estoqueProduto2"
              id="estoqueProduto2" placeholder="Quantidade de Estoque">
            </div>
            
            <label for="precoProduto2">Preço</label>
            <div class="input-group">
              <input type="text" class="form-control" name="precoProduto2"
              id="precoProduto2" placeholder="Preço do Produto">
            </div>
            
            <label for="categoriaProduto2">Categoria do Produto</label>
            <div class="input-group">
              <select class="custom-select form-control" name="categoriaProduto2" id="categoriaProduto2"
              placeholder="Categoria do Produto">
              
              
              
            </select>
          </div>  
          
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary btn-sm" type="submit">Salvar</button>
          <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" type="cancel" data-dismiss="modal">Cancelar</button>
        </div>
        
      </form>
      
    </div>
  </div>
</div> 

@endsection

@section('javascript')
<script type="text/javascript">
  
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':"{{ csrf_token() }}"
    }
  });
  
  function novoProduto(){
    $('#nomeProduto').val('')
    $('#estoqueProduto').val('')
    $('#precoProduto').val('')
    $('#categoriaProduto').val('')
    
  }
  
  function zerarCamposJQuery(){
    $('#nomeProduto2').val('')
    $('#estoqueProduto2').val('')
    $('#precoProduto2').val('')
    $('#categoriaProduto2').val('')
    
  }
  
  function CarregarCategoriasJQuery(){
    $.getJSON('/api/categorias', function(data){
      for(i=0;i<data.length;i++){
        opcao='<option value="'+ data[i].id +'">' + data[i].nome + '</option>';
        $('#categoriaProduto2').append(opcao);
      }
    });
  }
  
  
  
  function montarLinha(produto){
    var linha = "<tr>" + 
      "<td>"+ produto.id +"</td>"+
      "<td>"+ produto.nome +"</td>"+
      "<td>"+ produto.estoque +"</td>"+
      "<td>"+ produto.preco +"</td>"+
      "<td>"+ produto.categoria_id +"</td>"+
      "<td>"+
        '<button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#produtosDlgJQuery" id="'+ produto.id +'" onclick="editarJQuery(' + produto.id + ')"> Editar </btn>'+
          '<button class="btn btn-xs btn-danger" onclick="removerJQuery(' + produto.id + ')"> Apagar </btn>'+
            "</td>"+
            "</tr>";
            return linha;          
          }
          
          function editarJQuery(id){
            $.getJSON('/api/produtos/' + id, function(data){
              $('#nomeProduto2').val(data.nome);
              $('#estoqueProduto2').val(data.estoque);
              $('#precoProduto2').val(data.preco);
              $('#categoriaProduto2').val(data.categoria_id);
              
              
            });
          }
          
          function removerJQuery(id){
            $.ajax({
              type:"DELETE",
              url:"api/produtos/"+ id,
              context: this,
              success: function(){
                console.log('Ta apagado!');
                linhas = $("#tabelaProdutosJQuery>tbody>tr");
                linhaEliminada = linhas.filter( function(i, elemento){
                  return elemento.cells[0].textContent == id;
                });
                if (linhaEliminada){
                  linhaEliminada.remove();
                }
              },
              error: function(error){
                console.log(error);
              }
            })
          }
          
          function carregarProdutosJQuery(){
            $.getJSON('/api/produtos', function(produtos){
              for(i=0;i<produtos.length;i++){
                linha = montarLinha(produtos[i]);
                $('#tabelaProdutosJQuery>tbody').append(linha);
              }    
            });
          }
          
          function criarProdutoNovo(){
            prod = {
              nome: $("#nomeProduto2").val(),
              preco: $("#precoProduto2").val(),
              estoque: $("#estoqueProduto2").val(),
              categoria_id: $("#categoriaProduto2").val()
            };
            
            $.post("/api/produtos", prod, function(data){
              produto = JSON.parse(data);
              linha = montarLinha(produto);
              $('#tabelaProdutosJQuery>tbody').append(linha);
            });
            zerarCamposJQuery();
          };
          
          function salvarAlteracaoProduto(){
            prod = {
              id: $("#id").val(),
              nome: $("#nomeProduto2").val(),
              preco: $("#precoProduto2").val(),
              estoque: $("#estoqueProduto2").val(),
              categoria_id: $("#categoriaProduto2").val()
            };
            $.ajax({
              type:"PUT",
              url:"api/produtos/"+ prod.id,
              context: this,
              data: prod,
              success: function(){
                console.log('salvou!');    
              },
              error: function(error){
                console.log(error);
              }
            });
          }
          
          
          $("#formProdutos2").submit(function(event){
            event.preventDefault();
            if($("#id").val() != ''){
              salvarAlteracaoProduto();
            } else {
              criarProdutoNovo();
            }
            
          });
          
          $(function(){
            CarregarCategoriasJQuery();
            carregarProdutosJQuery();
          });
        </script>
        
        @endsection
        