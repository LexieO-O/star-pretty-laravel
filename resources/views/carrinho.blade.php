@extends('layout')

@section('titulo', 'Star Pretty - Carrinho')

@section('conteudo')

<main class="pagina">
    <h1 class="titulo-pagina">Carrinho</h1>

    <section class="painel">
        <h2 class="painel-topo">Seus Pedidos:</h2>

        <div class="painel-corpo">
            @if ($itens->isEmpty())
                <div class="carrinho-vazio">
                    <img src="{{ asset('img/mascote.jpg') }}" alt="" width="140" height="140">
                    <p>Seu carrinho está vazio!</p>
                </div>
            @else
                <table class="tabela">
                    <thead>
                        <tr>
                            <th class="col-produto">Produto</th>
                            <th class="col-qtd">Qtd</th>
                            <th class="col-preco">Preço</th>
                            <th class="col-subtotal">Subtotal</th>
                            <th class="col-acao"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itens as $item)
                            <tr>
                                <td class="col-produto">
                                    <span class="prod-cel">
                                        <img src="{{ asset('img/' . $item['imagem']) }}" alt="" class="prod-thumb" onerror="this.onerror=null;this.src='{{ asset('img/mascote.jpg') }}';">
                                        <span class="prod-nome">{{ $item['nome'] }}</span>
                                    </span>
                                </td>
                                <td class="col-qtd"><span class="qtd-pill">{{ $item['quantidade'] }}</span></td>
                                <td class="col-preco">R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                                <td class="col-subtotal"><strong>R$ {{ number_format($item['subtotal'], 2, ',', '.') }}</strong></td>
                                <td class="col-acao">
                                    <form method="POST" action="{{ route('carrinho.remover', $item['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-remover">Remover</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            <div class="painel-rodape">
                <a href="{{ route('vitrine') }}" class="btn-continuar">
                    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="#fff" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 19V5"/><path d="m13 6-6 6 6 6"/><path d="M7 12h14"/></svg>
                    Continuar Comprando
                </a>
                <p class="total">TOTAL: R$ {{ number_format($total, 2, ',', '.') }}</p>
            </div>
        </div>
    </section>
</main>

@endsection
