@extends('Admin.layout.layout')

@section('conteudo-principal')
    <section class="section">
        <form action="{{ $action }}" method="POST">
            @csrf
            @isset($imovel)
                @method('PUT')
            @endisset

            {{-- Título --}}
            <div class="input-field">
                <input type="text" name="titulo" id="titulo" value=" {{ old('titulo', $imovel->titulo ?? '') }}">
                <label for="titulo">Título</label>
                @error('titulo')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- Cidade --}}
            <div class="input-field">
                <select name="cidade_id" id="cidade_id">
                    <option disabled selected>Selecione uma cidade</option>

                    @foreach ($cidades as $cidade)
                        <option value="{{ $cidade->id }}" {{ old('cidade_id', $imovel->cidade->id ?? '') == $cidade->id ? 'selected' : '' }}>
                            {{ $cidade->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="cidade_id">Cídade</label>
                @error('cidade_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- Tipo --}}
            <div class="input-field">
                <select name="tipo_id" id="tipo_id">
                    <option value="" disabled selected>Selecione um tipo de imóvel</option>

                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('tipo_id', $imovel->tipo->id ?? '') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
                    @endforeach
                </select>
                <label for="tipo_id">Tipo de Imóvel</label>
                @error('tipo_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- Finalidade --}}
            <div class="input-field">
                @foreach ($finalidades as $finalidade)
                    <span>
                        <label style="margin-right: 30px">
                            <input type="radio" name="finalidade_id" id="finalidade_id" class="with-gap" value="{{ $finalidade->id }}" {{ old('finalidade_id', $imovel->finalidade->id ?? '') == $finalidade->id ? 'checked' : '' }} />
                            <span>{{ $finalidade->nome }}</span>
                        </label>
                        
                    </span>
                @endforeach
                @error('finalidade_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- preço dormitórios salas --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="preco" id="preco" min="0" step="0.50" value="{{ old('preco', $imovel->preco ?? '') }}" />
                    <label for="preco">Preço</label>
                    @error('preco')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <input type="number" name="dormitorios" id="dormitorios" min="0" value="{{ old('dormitorios', $imovel->dormitorios ?? '') }}" />
                    <label for="dormitorios">Quantidades de Dormitórios</label>
                    @error('dormitorios')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <input type="number" name="salas" id="salas" min="0" value="{{ old('salas', $imovel->salas ?? '') }}" />
                    <label for="salas">Quantidade de Salas</label>
                    @error('salas')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- terreno banherios garagens --}}
            <div class="row">
                <div class="input-field col s4">
                    <input type="number" name="terreno" id="terreno" min="0" step="0.50" value="{{ old('terreno', $imovel->terreno ?? '') }}" />
                    <label for="terreno">Terreno em m²</label>
                    @error('terreno')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <input type="number" name="banheiros" id="banheiros" min="0" value="{{ old('banheiros', $imovel->banheiros ?? '') }}" />
                    <label for="banheiros">Quantidades de Banheiros</label>
                    @error('banheiros')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <input type="number" name="garagens" id="garagens" min="0" value="{{ old('garagens', $imovel->garagens ?? '') }}" />
                    <label for="garagens">Vagas na Garagem</label>
                    @error('garagens')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- Descricao --}}
            <div class="input-field">
                <textarea name="descricao" id="descricao" class="materialize-textarea">
                    {{ old('descricao', $imovel->descricao ?? '') }}
                </textarea>
                <label for="descricao">Descrição</label>
                @error('descricao')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>

            {{-- Endereço --}}
            {{-- Rua --}}
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="rua" id="rua" value="{{ old('rua', $imovel->endereco->rua ?? '') }}" />
                    <label for="rua">Rua</label>
                    @error('rua')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
                
                {{-- Número --}}
                <div class="input-field col s2">
                    <input type="text" name="numero" id="numero" value="{{ old('numero', $imovel->endereco->numero ?? '') }}" />
                    <label for="numero">Número</label>
                    @error('numero')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                {{-- Complemento --}}
                <div class="input-field col s4">
                    <input type="text" name="complemento" id="complemento" value="{{ old('complemento', $imovel->endereco->complemento ?? '') }}" />
                    <label for="complemento">Complemento</label>
                    @error('complemento')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                {{-- Bairro --}}
                <div class="input-field col s8">
                    <input type="text" name="bairro" id="bairro" value="{{ old('bairro', $imovel->endereco->bairro ?? '') }}" />
                    <label for="bairro">Bairro</label>
                    @error('bairro')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>

                {{-- CEP --}}
                <div class="input-field col s4">
                    <input type="text" name="cep" id="cep" maxlength="9" value="{{ old('cep', $imovel->endereco->cep ?? '') }}" />
                    <label for="cep">CEP</label>
                    @error('cep')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
                </div>
            </div>

            {{-- Proximidades --}}
            <div class="row">
                <div class="input-field col s12">
                    <select name="proximidades[]" id="proximidades" multiple>
                        <option value="" disabled>Selecione os pontos de interesse nas proximidades</option>

                        @foreach ($proximidades as $proximidade)
                            <option value="{{ $proximidade->id }}"
                                @if (old('proximidades'))
                                    {{ in_array($proximidade->id, old('proximidades')) ? 'selected' : '' }}
                                @else
                                    @isset($imovel)
                                        {{ $imovel->proximidades->contains($proximidade->id) ? 'selected' : '' }}
                                    @endisset
                                @endif
                                 >
                                {{ $proximidade->nome }}
                            </option>
                        @endforeach
                    </select>
                    <label for="proximidades">Pontos de interesse nas proximidades</label>
                    @error('proximidades')
                        <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                    @enderror
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