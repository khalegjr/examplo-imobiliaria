<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => ['bail', 'required', 'min:3', 'max:100'],
            'cidade_id' => ['bail', 'required', 'integer'],
            'tipo_id' => ['bail', 'required', 'integer'],
            'finalidade_id' => ['bail', 'required', 'integer'],
            'preco' => ['bail', 'required', 'numeric', 'min:0'],
            'dormitorios' => ['bail', 'required', 'integer', 'min:0'],
            'salas' => ['bail', 'required', 'integer', 'min:0'],
            'terreno' => ['bail', 'required', 'integer', 'min:0'],
            'banheiros' => ['bail', 'required', 'integer', 'min:0'],
            'garagens' => ['bail', 'required', 'integer', 'min:0'],
            'descricao' => ['bail', 'nullable', 'string'],
            'rua' => ['bail', 'required', 'min:1' . 'max:100'],
            'numero' => ['bail', 'required', 'string'],
            'complemento' => ['bail', 'nullable', 'string'],
            'bairro' => ['bail', 'required', 'min:3', 'max:50'],
            'cep' => ['bail', 'required', 'string'],
            'proximidades' => ['bail', 'nullable', 'array'],
        ];
    }

    public function attributes()
    {
        return [
            'titulo' => 'Título',
            'cidade_id' => 'Cidade',
            'tipo_id' => 'Tipo de Imóvel',
            'finalidade_id' => 'Finalidade',
            'preco' => 'Preço',
            'dormitorios' => 'Quantidade de Dormitórios',
            'salas' => 'Quantidade de Salas',
            'terreno' => 'Terreno em m²',
            'banheiros' => 'Quantidade de Banheiros',
            'garagens' => 'Vagas na Garagem',
            'descricao' => 'Descrição',
            'rua' => 'Rua',
            'numero' => 'Número',
            'complemento' => 'Complemento',
            'bairro' => 'Bairro',
            'cep' => 'CEP',
            'proximidades' => 'Pontos de interesses nas proximidades',
        ];
    }

    public function messages()
    {
        return [
            'finalidade_id.required' => 'Favor selecione uma opção',
            'titulo.min' =>
                'Favor inserir pelo menos :min caracteres para o :attribute',
        ];
    }
}
