@extends('Site.layouts.principal')

@section('conteudo-principal')
    <h3>Imóveis disponíveis em {{ $cidade->nome }}</h3>

    <div class="divider"></div>

    <div style="display: flex; flex-wrap: wrap">
        @forelse ($imoveis as $imovel)
            <div class="card" style="width: 290px; margin: 10px;">

                <div class="card-image">
                    @if (count($imovel->fotos) > 0)
                        <img src="{{ asset("storage/{$imovel->fotos[0]->url}") }}" alt="">
                    @endif
                </div>

                <div class="card-content">
                    <p class="card-title">
                        {{ $imovel->titulo }}
                    </p>
                    <p>
                        Finalidade: <strong>{{ $imovel->finalidade->nome }}</strong>
                    </p>

                    <p>
                        Preço: <strong>R$: {{ $imovel->preco }}</strong>
                    </p>
                </div>
            </div>
        @empty
            <p>Não existem imóveis disponíveis nessa cidade no momento.</p>
        @endforelse
    </div>

    <div class="center">
        {{ $imoveis->links('shared.pagination') }}
    </div>
@endsection