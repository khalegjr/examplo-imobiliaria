<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximidade extends Model
{
    use HasFactory;

    /** No caso de relacionamentos N-N o inverso é a mesma coisa. */
    public function imoveis()
    {
        return $this->belongsToMany(Imovel::class)->withTimestamps();
    }
}
