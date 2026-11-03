@extends('layout')

@section('titulo', 'Star Pretty - Produtos')

@section('conteudo')

<main class="pagina">
    <h1 class="titulo-pagina">Produtos</h1>

    <section class="painel">
        <h2 class="painel-topo">Cadastrar produto:</h2>

        <div class="painel-corpo">
            <form method="POST" action="{{ route('produtos.store') }}" class="auth-form form-produto" enctype="multipart/form-data">
                @csrf

                <div class="campo">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do produto"
                           value="{{ old('nome') }}" class="@error('nome') invalido @enderror">
                    @error('nome') <p class="erro-campo">{{ $message }}</p> @enderror
                </div>

                <div class="campo">
                    <label for="preco">Preço (R$):</label>
                    <input type="text" id="preco" name="preco" inputmode="decimal" placeholder="69,90"
                           value="{{ old('preco') }}" class="@error('preco') invalido @enderror">
                    @error('preco') <p class="erro-campo">{{ $message }}</p> @enderror
                </div>

                <div class="campo">
                    <label for="imagem">Imagem:</label>
                    <input type="file" id="imagem" name="imagem" accept="image/png,image/jpeg,image/webp"
                        class="@error('imagem') invalido @enderror">
                    @error('imagem') <p class="erro-campo">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn-auth btn-rosa btn-cadastrar-produto">Cadastrar</button>
            </form>
        </div>
    </section>

    <section class="painel painel-lista">
        <h2 class="painel-topo">Produtos cadastrados:</h2>

        <div class="painel-corpo">
            <table class="tabela">
                <thead>
                    <tr>
                        <th class="col-produto">Produto</th>
                        <th class="col-preco">Preço</th>
                        <th class="col-acao"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produtos as $produto)
                        <tr>
                            <td class="col-produto">
                                <span class="prod-cel">
                                    <img src="{{ asset('img/' . $produto->imagem) }}" alt="" class="prod-thumb" onerror="this.onerror=null;this.src='{{ asset('img/mascote.jpg') }}';">
                                    <span class="prod-nome">{{ $produto->nome }}</span>
                                </span>
                            </td>
                            <td class="col-preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="col-acao">
                                <form method="POST" action="{{ route('produtos.destroy', $produto) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remover" onclick="return confirm('Excluir este produto?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="lista-vazia">Nenhum produto cadastrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</main>

@endsection
