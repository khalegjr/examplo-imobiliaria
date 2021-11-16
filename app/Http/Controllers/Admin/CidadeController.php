<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        //$cidades = ['Campinas', 'São Paulo', 'Salgado', 'Guará'];
        $cidades = Cidade::all();

        return view('Admin.Cidade.index')->with('cidades', $cidades);
    }

    public function create()
    {
        return 'formulário para adicionar uma cidade';
    }
}
