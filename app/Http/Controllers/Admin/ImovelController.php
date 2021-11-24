<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cidade;
use App\Models\Finalidade;
use App\Models\Imovel;
use App\Models\Proximidade;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$imoveis = Imovel::with(['cidade', 'endereco'])->get();
        /** Fazendo ordenação a partir de join com uma tabela relacionada, sem usar a relação do model. */
        $imoveis = Imovel::join(
            'cidades',
            'cidades.id',
            '=',
            'imoveis.cidade_id'
        )
            ->join('enderecos', 'enderecos.id', '=', 'imoveis.id')
            ->orderBy('cidades.nome', 'asc')
            ->get();

        return view('Admin.Imovel.index', compact('imoveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.imoveis.store');

        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        return view(
            'Admin.Imovel.form',
            compact('action', 'cidades', 'tipos', 'finalidades', 'proximidades')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
            // -> attach: adiciona
            // -> detach: remove
            // -> sync: ele adiciona mas faz o detach se já existir
            // -> syncWithoutDetaching: faz o mesmo que o attach
        }
        DB::commit();

        $request->session()->flash('sucesso', 'Imovel incluido com sucesso!');

        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
