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
            'titulo' => ['bail', 'require', 'min:3', 'max:100'],
            'cidade_id' => ['bail', 'require', 'integer'],
            'tipo_id' => ['bail', 'require', 'integer'],
            'finalidade_id' => ['bail', 'require', 'integer'],
            'preco' => ['bail', 'require', 'numeric', 'min:0'],
            'dormitorios' => ['bail', 'require', 'integer', 'min:0'],
            'salas' => ['bail', 'require', 'integer', 'min:0'],
            'terreno' => ['bail', 'require', 'integer', 'min:0'],
            'banheiros' => ['bail', 'require', 'integer', 'min:0'],
            'garagens' => ['bail', 'require', 'integer', 'min:0'],
            'descricao' => ['bail', 'nullable', 'string'],
            'rua' => ['bail', 'required', 'min:1' . 'max:100'],
            'numero' => ['bail', 'required', 'string'],
            'complemento' => ['bail', 'nullable', 'string'],
            'bairro' => ['bail', 'required', 'min:3', 'max:50'],
            'cep' => ['bail', 'required', 'string'],
            'proximidades' => ['bail', 'nullable', 'array'],
        ];
    }
}
