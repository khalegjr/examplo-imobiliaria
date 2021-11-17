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
        return view('Admin.Cidade.form');
    }

    public function store(Request $request)
    {
        $cidade = new Cidade();
        $cidade->nome = $request->nome;

        $cidade->save();

        return redirect()->route('admin.cidades.index');
    }
}
