<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    /** A dona do relacionamento é quem NÃO TEM a chave estrangeira.
     *
     * Nesse caso o nome não tem tanta importância na convenção. É bom colocar um nome que faça sentido.
     *
     * Aqui é um relacionamento 1-N (uma cidade tem vários imóveis).
     */
    public function imoveis()
    {
        return $this->hasMany(Imovel::class);
        /** Tem as mesmas convenções do hasOne */
    }
}
