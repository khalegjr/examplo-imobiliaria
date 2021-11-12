@extends('Admin.layout.layout')

@section('conteudo-principal')
    <section>
        <table>
            <caption>Lista de Cidades</caption>
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade }}</td>
                        <td>Excluir / Editar</td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há cidades cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection