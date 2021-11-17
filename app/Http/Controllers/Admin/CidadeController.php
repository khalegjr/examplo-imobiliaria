<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CidadeRequest;
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

    public function store(CidadeRequest $request)
    {
        $cidade = new Cidade();
        $cidade->nome = $request->nome;

        $cidade->save();

        $request
            ->session()
            ->flash('sucesso', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.index');
    }

    public function destroy($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', 'Cidade excluída com sucesso!');
        return redirect()->route('admin.cidades.index');
    }
}
