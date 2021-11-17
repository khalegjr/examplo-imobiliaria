@extends('Admin.layout.layout')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ route('admin.cidades.store') }}" method="post">
            @csrf
            <div class="input-field">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome</label>
            </div>

            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>
@endsection