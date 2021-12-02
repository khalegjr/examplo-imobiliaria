<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $imovel = Imovel::findOrFail($id);

        $fotos = Foto::where('imovel_id', $id)->get();

        return view('Admin.Imovel.fotos.index', compact('imovel', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $imovel = Imovel::findOrFail($id);

        return view('Admin.Imovel.fotos.form', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idImovel)
    {
        // checar se veio a imagem na requisição e se não houve erro no upload
        if ($request->hasFile('foto') && $request->foto->isValid()) {
            $fotoURL = $request->foto->store("imovel/$idImovel", 'public');

            // Gravando a URL da foto no banco
            $foto = new Foto();
            $foto->url = $fotoURL;
            $foto->imovel_id = $idImovel;
            $foto->save();
        }

        $request->session()->flash('sucesso', 'Foto incluída com sucesso!');
        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
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
