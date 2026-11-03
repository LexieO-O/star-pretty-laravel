<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('produtos.index', [
            'produtos' => Produto::orderBy('id')->get(),
        ]);
    }

    public function store(Request $request)
    {
        // aceita "69,90" digitado com vírgula
        $request->merge(['preco' => str_replace(',', '.', (string) $request->input('preco'))]);

        $dados = $request->validate([
            'nome'   => 'required|max:100',
            'preco'  => 'required|numeric|min:0',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // até 2 MB
        ]);

        // sem arquivo escolhido, usa a imagem padrão
        $dados['imagem'] = 'mascote.jpg';

        if ($request->hasFile('imagem')) {
            $arquivo = $request->file('imagem');
            $nomeArquivo = Str::uuid() . '.' . $arquivo->extension();

            // salva em public/img/produtos e guarda "produtos/nome.ext" no banco
            $arquivo->move(public_path('img/produtos'), $nomeArquivo);
            $dados['imagem'] = 'produtos/' . $nomeArquivo;
        }

        Produto::create($dados);

        return redirect()->route('produtos.index');
    }

    public function destroy(Produto $produto)
    {
        // apaga o arquivo enviado (as imagens fixas do projeto não são mexidas)
        if (str_starts_with($produto->imagem, 'produtos/')) {
            File::delete(public_path('img/' . $produto->imagem));
        }

        $produto->delete();

        return redirect()->route('produtos.index');
    }
}
