<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Imovel;
use Illuminate\Http\Request;

class ImovelController extends Controller
{
    public function index($idCidade)
    {
        $cidade = Cidade::find($idCidade);

        $imoveis = Imovel::with(['finalidade', 'fotos'])
            ->where('cidade_id', $idCidade)
            ->paginate(env('PAGINACAO'));

        return view('Site.cidades.imoveis.index', compact('cidade', 'imoveis'));
    }
}
