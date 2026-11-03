<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    public function run(): void
    {
        $produtos = [
            ['nome' => 'Blush Yves Saint Laurent',                     'preco' => 69.90,  'imagem' => 'blush.png'],
            ['nome' => 'Lip Oil E.L.F Glossy',                         'preco' => 45.00,  'imagem' => 'lipoil.png'],
            ['nome' => 'Paleta de Sombras Flower Knows Swan Ballet',   'preco' => 89.90,  'imagem' => 'paleta.png'],
            ['nome' => 'Contorno em Bastão Fenty Beauty',              'preco' => 169.00, 'imagem' => 'contorno.png'],
            ['nome' => 'Pó Translúcido NARS',                          'preco' => 189.00, 'imagem' => 'po_translucido.png'],
            ['nome' => 'Sérum Facial Detox Melu',                      'preco' => 29.00,  'imagem' => 'serum.png'],
        ];

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
