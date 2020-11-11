<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        body {
            padding: 20px;
        }
    </style>
    <title>Cadastro Cliente</title>
</head>
<body>
    <main role="main">
        <div class="row">
            <div class="container col-md-8 offset-md-2">
                <div class="card border">
                    <div class="card-header">
                        <div class="card-title">
                            Cadastro de Cliete
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/cliente" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nome">Nome do Cliente</label>
                                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" name="nome"
                                    id="nome" placeholder="Nome do cliente" >
                                    @if ($errors->has('nome'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nome') }}
                                        </div>
                                    @endif

                            </div>
                            <div class="form-group">
                                <label for="idade">Idade do Cliente</label>
                                <input type="number" class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" name="idade"
                                    id="idade" placeholder="Idade do cliente"  pattern="[0-9]">
                                    @if ($errors->has('idade'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('idade') }}
                                        </div>
                                    @endif

                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereco do Clinete</label>
                                <input type="text" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" name="endereco"
                                    id="endereco" placeholder="Endereco do Clinete" >
                                    @if ($errors->has('endereco'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('endereco') }}
                                        </div>
                                    @endif

                            </div>
                            <div class="form-group">
                                <label for="email">E-mail do Cliente</label>
                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                    id="email" placeholder="E-mail do Cliente" >
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif

                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                            <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="card-footer">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/app;js') }}" type="text/javascript"></script>
</body>
</html>