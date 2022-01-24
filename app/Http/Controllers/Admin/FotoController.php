<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FotoRequest;
use App\Models\Foto;
use App\Models\Imovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function store(FotoRequest $request, $idImovel)
    {
        // checar se veio a imagem na requisição e se não houve erro no upload
        if ($request->hasFile('foto') && $request->foto->isValid()) {
            // Pegando o caminho e o mone do arquivo pra salvar no disco
            $fotoURL = $request->foto->hashName("imoveis/$idImovel");

            // Redimensionar a imagem
            $imagem = Image::make($request->foto)->fit(
                env('FOTO_LARGURA'),
                env('FOTO_ALTURA')
            );

            // Salvar a imagem redimensionada no disco
            Storage::disk('public')->put($fotoURL, $imagem->encode());

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
    public function destroy(Request $request, $idImovel, $idFoto)
    {
        $foto = Foto::find($idFoto);

        // Apagar a imagem no disco
        Storage::disk('public')->delete($foto->url);

        // Apagando o registro no BD
        $foto->delete();

        $request->session()->flash('sucesso', 'Foto excluída com sucesso!');
        return redirect()->route('admin.imoveis.fotos.index', $idImovel);
    }
}
