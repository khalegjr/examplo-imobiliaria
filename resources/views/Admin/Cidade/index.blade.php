@extends('Admin.layout.layout')

@section('conteudo-principal')
    <section class="section">
        <table class="highlight">
            <caption>Lista de Cidades</caption>
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade->nome }}</td>
                        <td class="right-align">Excluir - Editar</td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há cidades cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{ route('admin.cidades.create') }}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>
@endsection