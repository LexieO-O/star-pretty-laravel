<?php

// Mensagens de validação em português (usadas pelo @error nos formulários)
return [
    'required' => 'O campo :attribute é obrigatório.',
    'numeric'  => 'O campo :attribute deve ser um número (ex.: 69,90).',
    'in'       => 'O valor escolhido para :attribute é inválido.',
    'email'    => 'Informe um e-mail válido.',
    'max' => [
        'string'  => 'O campo :attribute não pode ter mais de :max caracteres.',
        'numeric' => 'O campo :attribute não pode ser maior que :max.',
        'file'     => 'A :attribute não pode ter mais de :max KB.',
    ],
    'min' => [
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'numeric' => 'O campo :attribute deve ser no mínimo :min.',
    ],

    'attributes' => [
        'nome'   => 'nome',
        'preco'  => 'preço',
        'imagem' => 'imagem',
    ],
    'image'    => 'O arquivo de :attribute deve ser uma imagem.',
    'mimes'    => 'A :attribute deve ser um arquivo do tipo: :values.',
    'uploaded' => 'Não foi possível enviar a :attribute (tamanho máximo: 2 MB).',
];
