@extends('Site.layouts.principal')

@section('conteudo-principal')
<h2>Lista de cidades</h2>

<section class="section lighten-4 center">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        @foreach ($cidades as $cidade)
            <a href="#">
                <div class="card-panel" style="width: 200px; height: 100%;">
                    <i class="material-icons medium green-text text-lighten-3">
                        room
                    </i>
                    <h4 class="black-text">{{ $cidade->nome }}</h4>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endsection

@section('slider')
    <section class="slider">
        <ul class="slides">
            <li>
                <img src="https://source.unsplash.com/g39p1kDjvSY/1900x600">
                <div class="caption center-align">
                    <h2 style="text-shadow: 2px 2px 8px #333;">Encontre os melhores imóveis da cidade.</h2>
                </div>
            </li>

            <li>
                <img src="https://source.unsplash.com/TiVPTYCG_3E/1900x600">
                <div class="caption left-align">
                    <h2 style="text-shadow: 2px 2px 8px #333;">Melhores imóveis para aluguel.</h2>
                </div>
            </li>

            <li>
                <img src="https://source.unsplash.com/rChFUMwAe7E/1900x600">
                <div class="caption right-align">
                    <h2 style="text-shadow: 2px 2px 8px #333;">Melhores imóveis para venda.</h2>
                </div>
            </li>
        </ul>
    </section>
@endsection