<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Imóveis Teste</title>
</head>
<body>
    {{-- Menu Topo --}}
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="/" class="brand-logo">Best Imóveis</a>
                <ul class="right">
                    <li>
                        <a href="{{ route('admin.imoveis.index') }}">Imóveis</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.cidades.index') }}">Cidades</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteúdo Principal --}}
    <main class="container">
        @yield('conteudo-principal')
    </main>

   <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        @if (session('sucesso'))
            M.toast({html: "{{ session('sucesso') }}"})
        @endif
    </script>

</body>
</html>