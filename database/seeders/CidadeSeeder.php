<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create(['nome' => 'Campinas']);
        Cidade::create(['nome' => 'São Paulo']);
        Cidade::create(['nome' => 'Belo Horizonte']);
        Cidade::create(['nome' => 'Recife']);
        Cidade::create(['nome' => 'Guaratinguetá']);
        Cidade::create(['nome' => 'General Salgado']);
        Cidade::create(['nome' => 'Santarém']);
    }
}
