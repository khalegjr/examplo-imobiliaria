@extends('Admin.layout.layout')

@section('conteudo-principal')
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
                            <a href="{{ route('admin.imoveis.edit', $imovel->id) }}">
                                <span><i class="material-icons blue-text text-accent-2">edit</i></span>
                            </a>

                            <form action="{{ route('admin.imoveis.destroy', $imovel->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button style="border: 0; background: transparent;" type="submit">
                                    <span style="cursor: pointer;"><i class="material-icons red-text text-accent-3">delete_forever</i></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há imoveis cadastrados.</td>
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