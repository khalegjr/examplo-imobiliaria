@extends('Admin.layout.layout')

@section('conteudo-principal')
    {{-- Filtro de Pesquisa --}}
    <section class="section">
        <form action="{{ route('admin.imoveis.index') }}" method="GET">
            <div class="row valign-wapper">
                <div class="input-field col s6">
                    <select name="cidade_id" id="cidade">
                        <option value="">Selecione uma cidade</option>

                        @foreach ($cidades as $cidade)
                            <option value="{{ $cidade->id }}" {{ $cidade->id == $cidade_id ? 'selected' : '' }}>
                                {{ $cidade->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="input-field col s6">
                    <input type="text" name="titulo" id="titulo" value="{{ $titulo }}" />
                    <label for="titulo">Título</label>
                </div>

            </div>

            <div class="row right-align">
                <a href="{{ route('admin.imoveis.index') }}" class="btn-flat waves-effect">Exibir Todos</a>
                <button type="submit" class="btn waves-effect waves-light">
                    Pesquisar
                </button>
            </div>
        </form>
    </section>
    
    <hr />

    {{-- Lista de Imóveis --}}
    <section class="section">
        <table class="highlight">
            <caption>Lista de Imóveis</caption>
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($imoveis as $imovel)
                    <tr>
                        <td>{{ $imovel->cidade->nome }}</td>
                        <td>{{ $imovel->endereco->bairro }}</td>
                        <td>{{ $imovel->titulo }}</td>
                        <td class="right-align">
                            {{-- Fotos --}}
                            <a href="{{ route('admin.imoveis.fotos.index', $imovel->id) }}" title="fotos">
                                <span><i class="material-icons green-text text-lighten-1">insert_photo</i></span>
                            </a>

                            {{-- Visualizar --}}
                            <a href="{{ route('admin.imoveis.show', $imovel->id) }}" title="visualizar">
                                <span><i class="material-icons indigo-text text-darken-2">remove_red_eye</i></span>
                            </a>

                            <a href="{{ route('admin.imoveis.edit', $imovel->id) }}" title="editar">
                                <span><i class="material-icons blue-text text-accent-2">edit</i></span>
                            </a>

                            <form action="{{ route('admin.imoveis.destroy', $imovel->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button style="border: 0; background: transparent;" type="submit" title="remover">
                                    <span style="cursor: pointer;"><i class="material-icons red-text text-accent-3">delete_forever</i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há imoveis cadastrados ou imóveis que atendam aos critérios de pesquisa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{ route('admin.imoveis.create') }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection