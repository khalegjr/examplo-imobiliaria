@extends('Admin.layout.layout')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf

            {{-- Título --}}
            <div class="input-field">
                <input type="text" name="titulo" id="titulo">
                <label for="titulo">Título</label>
            </div>

            {{-- Cidade --}}
            <div class="input-field">
                <select name="cidade_id" id="cidade_id">
                    <option value="" disabled selected>Selecione uma cidade</option>

                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                    @endforeach
                </select>
                <label for="cidade_id">Cídade</label>
            </div>

            {{-- Tipo --}}
            <div class="input-field">
                <select name="tipo_id" id="tipo_id">
                    <option value="" disabled selected>Selecione um tipo de imóvel</option>

                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                    @endforeach
                </select>
                <label for="tipo_id">Tipo de Imóvel</label>
            </div>

            {{-- Finalidade --}}
            <div class="input-field">
                @foreach ($finalidades as $finalidade)
                    <span>
                        <label style="margin-right: 30px">
                            <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap" value="{{ $finalidade->id }}" />
                            <span>{{ $finalidade->nome }}</span>
                        </label>
                    </span>
                @endforeach
            </div>

            {{-- preço dormitórios salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="preco" id="preco" min="0" step="0.50" />
                    <label for="preco">Preço</label>
                </div>

                <div class="input-field col s4">
                    <input type="number" name="dormitorios" id="dormitorios" min="0" />
                    <label for="dormitorios">Quantidades de Dormitórios</label>
                </div>

                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas" min="0" />
                    <label for="salas">Quantidade de Salas</label>
                </div>
            </div>

            {{-- terreno banherios garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="terreno" id="terreno" min="0" step="0.50" />
                    <label for="terreno">Terreno em m²</label>
                </div>

                <div class="input-field col s4">
                    <input type="number" name="banheiros" id="banheiros" min="0" />
                    <label for="banheiros">Quantidades de Banheiros</label>
                </div>

                <div class="input-field col s4">
                    <input type="number" name="garagens" id="garagens" min="0" />
                    <label for="garagens">Vagas na Garagem</label>
                </div>
            </div>

            {{-- Descricao --}}
            <div class="input-field">
                <textarea name="descricao" id="descricao" class="materialize-textarea"></textarea>
                <label for="descricao">Descrição</label>
            </div>

            {{-- Endereço --}}
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="rua" id="rua" />
                    <label for="rua">Rua</label>
                </div>

                <div class="input-field col s2">
                    <input type="text" name="numero" id="numero" />
                    <label for="numero">Número</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="complemento" id="complemento" />
                    <label for="complemento">Complemento</label>
                </div>

                <div class="input-field col s8">
                    <input type="text" name="bairro" id="bairro" />
                    <label for="bairro">Bairro</label>
                </div>

                <div class="input-field col s4">
                    <input type="text" name="cep" id="cep" maxlength="9" />
                    <label for="cep">CEP</label>
                </div>
            </div>

            {{-- Salvar Cancelar --}}
            <div class="right-align">
                <a href="{{ route('admin.imoveis.index') }}" class="btn-flat waves-effect">Cancelar</a>
                
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </section>
@endsection