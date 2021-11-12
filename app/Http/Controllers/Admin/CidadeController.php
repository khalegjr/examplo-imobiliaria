<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = ['Campinas', 'São Paulo', 'Salgado', 'Guará'];

        return view('Admin.Cidade.index')->with('cidades', $cidades);
    }
}
