<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VitrineController;
use Illuminate\Support\Facades\Route;

// Vitrine
Route::get('/', [VitrineController::class, 'index'])->name('vitrine');

// Carrinho
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('/carrinho/{produto}', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::delete('/carrinho/{id}', [CarrinhoController::class, 'remover'])->whereNumber('id')->name('carrinho.remover');

// Produtos (exercício do slide 48: cadastro, listagem e exclusão)
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
