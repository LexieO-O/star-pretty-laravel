@extends('layout')

@section('titulo', 'Star Pretty - Vitrine')

@section('conteudo')

<main class="vitrine-pagina">
    <section class="vitrine">
        @forelse ($produtos as $produto)
            <article class="card">
                <div class="card-img">
                    <img src="{{ asset('img/' . $produto->imagem) }}"
                         alt="{{ $produto->nome }}"
                         onerror="this.onerror=null;this.src='{{ asset('img/mascote.jpg') }}';">

                    <form method="POST" action="{{ route('carrinho.adicionar', $produto) }}" class="add-form">
                        @csrf
                        <button type="submit" class="btn-add" aria-label="Adicionar {{ $produto->nome }} ao carrinho" title="Adicionar ao carrinho">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#0a0b09" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M20 12.5V8a1 1 0 0 0-.3-.7l-2.7-2.7A1 1 0 0 0 16.3 4.3H7.7a1 1 0 0 0-.7.3L4.3 7.3A1 1 0 0 0 4 8v11a2 2 0 0 0 2 2h6.5"/>
                                <path d="M4 8h16"/>
                                <path d="M16 12a4 4 0 0 1-8 0"/>
                                <path d="M18 17v6M15 20h6"/>
                            </svg>
                        </button>
                    </form>
                </div>

                <h3 class="card-nome">{{ $produto->nome }}</h3>
                <p class="card-preco">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            </article>
        @empty
            <p class="admin-vazio">Nenhum produto cadastrado ainda.</p>
        @endforelse
    </section>

    <section class="tutorial">
        <div class="tutorial-video">
            <video id="video-tutorial" preload="metadata" poster="{{ asset('img/poster.jpg') }}">
                <source src="{{ asset('video/tutorial-gyaru.mp4') }}" type="video/mp4">
                Seu navegador não suporta vídeo.
            </video>
        </div>
        <div class="tutorial-texto">
            <h2>Tutorial de<br>Makeup Gyaru</h2>
            <button type="button" class="btn-video" id="btn-video">Assistir Vídeo</button>
        </div>
    </section>
</main>

@endsection
