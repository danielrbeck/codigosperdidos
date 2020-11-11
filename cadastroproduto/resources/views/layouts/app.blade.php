<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>

    <style>
        body{
            padding: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }
    </style>
    <title>Cadastro de Produtos</title>
</head>
<body>
    <div class="container">
        @component('component_navbar', ["currentpage" => $currentpage])
        @endcomponent
        <main role="main">
            @hasSection ('body')
                @yield('body')
            @else
                <h3>Body nao encontrado!</h3>
            @endif
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascrip"></script>
    @hasSection ('javascript')
        @yield('javascript')
    @endif
</body>
</html>