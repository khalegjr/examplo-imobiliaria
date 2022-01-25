<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'imoveis';

    protected $fillable = [
        'titulo',
        'terreno',
        'salas',
        'banheiros',
        'dormitorios',
        'garagens',
        'descricao',
        'preco',
        'cidade_id',
        'tipo_id',
        'finalidade_id',
    ];

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

    /** Aqui é o inverso do relacionamento 1-N com cidades, ou seja, o nome volta a ter importância semântica na convenção.
     *
     * Também segue as mesmas convenções do hasOne().
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
        /** belongsTo é quem tem a chave primária */
    }

    /** LEMBRETE
     * O inverso de um relacionamento hasOne é belongsTo
     */

    public function finalidade()
    {
        return $this->belongsTo(Finalidade::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    /** Esse é o método para definição do relacionamento N-N.
     * O nome está no plural pq ele NÂO é usado para definir chaves. Basta chamar o nome do modelo no plural.
     */
    public function proximidades()
    {
        return $this->belongsToMany(
            Proximidade::class,
            'imovel_proximidades'
        )->withTimestamps();
        // só utiliza belogsToMany qdo N-N

        /** A conveção do Eloquent para identificar o nome da tabela intermediária:
         * - Pega o nome dos dois modelos em snake_case singular e ordem alfabética.
         * No caso: imovel_proximidade
         *
         * Caso não siga a convenção de nomes, basta adicionar um segundo parâmetro com o nome da tabela intermediária.
         * $this->belongsToMany(Proximidade::class, 'imovel_proximidades');
         */

        /** A convenção da chave estrangeira da tabela intermediária com relação a ESSE modelo segue o formato:
         * - nome do modelo em snake_case
         * - sufixo _id
         *
         * No caso, espera-se a seguinte chave estrangeira na tabela intermediária: imovel_id
         *
         * Se NÃO estiver seguindo essa convenção podemos passar um terceiro parâmetro com a chave estrangeira referente a ESSE modelo.
         * $this->belongsToMany(Proximidade::class, 'tabela_pivo', 'chave');
         *
         * No mesmo sentido, se a chave estrangeira em relação ao OUTRO modelo não seguir a convenção, podemos alterar passando um quarto parâmetro com a chave estrangeira daquele modelo.
         * $this->belongsToMany(Proximidade::class, 'tabela_pivo', 'chave_desse', 'chave_daquele');
         */

        /** No caso de uma tabela intermediária ter mais campos do que somente as chaves estrangeiras podemos trata-la ainda como uma pivo, sem criar um modelo para ela, mas tem que procurar na documentação como fazer. Ou podemos criar um modelo para ela e fazer dois relacionamentos 1-N, mais simples. Uma terceira forma é criar um modelo específico do tipo pivô, é uma forma mais avançada que deve procurar na documentação. */
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
