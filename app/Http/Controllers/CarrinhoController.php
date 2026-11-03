<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    // O carrinho fica na sessão: [produto_id => quantidade]

    public function index()
    {
        $carrinho = session('carrinho', []);

        $itens = Produto::whereIn('id', array_keys($carrinho))
            ->orderBy('id')
            ->get()
            ->map(function (Produto $produto) use ($carrinho) {
                $quantidade = $carrinho[$produto->id];

                return [
                    'id'         => $produto->id,
                    'nome'       => $produto->nome,
                    'imagem'     => $produto->imagem,
                    'preco'      => $produto->preco,
                    'quantidade' => $quantidade,
                    'subtotal'   => $produto->preco * $quantidade,
                ];
            });

        return view('carrinho', [
            'itens' => $itens,
            'total' => $itens->sum('subtotal'),
        ]);
    }

    public function adicionar(Request $request, Produto $produto)
    {
        $carrinho = session('carrinho', []);
        $carrinho[$produto->id] = ($carrinho[$produto->id] ?? 0) + 1;
        session(['carrinho' => $carrinho]);

        // chamada AJAX (botão da vitrine): devolve a quantidade para atualizar o ícone
        if ($request->expectsJson()) {
            return response()->json([
                'sucesso'  => true,
                'qtdTotal' => array_sum($carrinho),
            ]);
        }

        return redirect()->route('vitrine');
    }

    public function remover(int $id)
    {
        $carrinho = session('carrinho', []);
        unset($carrinho[$id]);
        session(['carrinho' => $carrinho]);

        return redirect()->route('carrinho.index');
    }
}
