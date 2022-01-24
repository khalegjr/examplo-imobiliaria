<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImovelRequest;
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
    public function index(Request $request)
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
            ->orderBy('cidades.nome', 'asc');

        $cidade_id = $request->cidade_id;
        $titulo = $request->titulo;

        if ($cidade_id) {
            $imoveis->where('cidades.id', $cidade_id);
        }

        if ($titulo) {
            $imoveis->where('titulo', 'like', "%$titulo%");
        }

        $imoveis = $imoveis->get();

        $cidades = Cidade::orderBy('nome')->get();

        return view(
            'Admin.Imovel.index',
            compact('imoveis', 'cidades', 'cidade_id', 'titulo')
        );
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
    public function store(ImovelRequest $request)
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
        $imovel = Imovel::with([
            'cidade',
            'endereco',
            'finalidade',
            'tipo',
            'proximidades',
        ])->find($id);

        return view('Admin.Imovel.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::with([
            'cidade',
            'endereco',
            'finalidade',
            'tipo',
            'proximidades',
        ])->find($id);

        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        $action = route('admin.imoveis.update', $imovel->id);

        return view(
            'Admin.Imovel.form',
            compact(
                'imovel',
                'action',
                'cidades',
                'tipos',
                'finalidades',
                'proximidades'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImovelRequest $request, $id)
    {
        $imovel = Imovel::findOrFail($id);

        DB::beginTransaction();
        $imovel->update($request->all());
        $imovel->endereco->update($request->all());

        if ($request->has('proximidades')) {
            $imovel->proximidades()->sync($request->proximidades);
        }
        DB::Commit();

        $request->session()->flash('sucesso', 'Imóvel atualizado com sucesso!');
        return redirect()->route('admin.imoveis.edit', $imovel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $imovel = Imovel::findOrFail($id);

        // Inicia uma transação
        DB::beginTransaction();

        // Remove o endereço
        $imovel->endereco->delete();

        // Remove o imóvel
        $imovel->delete();

        DB::Commit();

        $request->session()->flash('sucesso', 'Imóvel excluído com sucesso!');
        return redirect()->route('admin.imoveis.index');
    }
}
