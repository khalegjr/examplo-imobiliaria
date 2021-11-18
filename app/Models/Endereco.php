<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    public function imovel()
    {
        /**
         * Essa é o inverso do relacionamento. O inverso é sempre onde fica a chave primária (chamamos o belongsTo).
         */
        return $this->belongsTo(Imovel::class);
        /**
         * A convenção do ELoquent para identificar a chave estrangeira nesse caso é pegar o nome do método e acrescentar o sufixo _id. Nesse caso: imovel_id
         *
         * Se não segue esse padrão, então, basta adicionar um segundo parâmetro com a chave estrangeira: $this->belongsTo(Imovel::class, 'chave_estrangeira');
         *
         * E, se a chave estrangeira não aponta pra primária, acrescentamos um terceiro parâmetro: $this->belongsTo(Imovel::class, 'chave_estrangeira', 'campo_associado');
         */
    }
}
