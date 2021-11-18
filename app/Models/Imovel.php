<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    /** Define o relacionamento 1-1 entre endereço e imóvel */
    public function endereco()
    {
        return $this->hasOne(Endereco::class);
        /**
         * Por convenção o Eloquent vai procurar na tabela de endereços um campo de chave estrangeira no formato nome_classe_id. No caso seria: imovel_id
         *
         * Caso não siga essa convenção devemos indicar manualmente a chave estrangeira. Nesse caso: $this->hasOne(Endereco::class, 'chave_estrangeira');
         *
         * Também o Eloquent espera que a chave estrangeira aponte para a chave primária da outra tabela. Caso ela aponte para outro campo que não o primário temos que indicar com um terceiro parâmetro: $this->hasOne(Endereco::class, 'chave_estrangeira', 'camṕo_associado');
         */
    }
}
