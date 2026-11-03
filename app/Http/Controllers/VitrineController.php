<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class VitrineController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('id')->get();

        return view('vitrine', ['produtos' => $produtos]);
    }
}
