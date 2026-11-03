<header class="header">
    <a href="{{ route('vitrine') }}" class="logo" aria-label="Star Pretty - página inicial">
        <img src="{{ asset('img/logo-h_trim.png') }}" alt="Star Pretty">
    </a>

    <div class="header-acoes">
        <div class="conta">
            <button type="button" class="icone-btn icone-conta" id="btn-conta"
                    aria-label="Menu" aria-expanded="false" aria-controls="menu-conta">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="dropdown" id="menu-conta" hidden>
                <p class="dropdown-titulo">Menu</p>
                <p class="dropdown-sub">Star Pretty Cosmetics</p>
                <a href="{{ route('vitrine') }}" class="dd-btn dd-btn-preto">Vitrine</a>
                <a href="{{ route('carrinho.index') }}" class="dd-btn dd-btn-rosa">Carrinho</a>
                <a href="{{ route('produtos.index') }}" class="dd-btn dd-btn-preto">Produtos</a>
            </div>
        </div>

        <a href="{{ route('carrinho.index') }}" class="icone-btn icone-carrinho" aria-label="Carrinho">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/>
                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/>
            </svg>
            <span class="badge" id="cart-badge"@if ($qtdCarrinho < 1) hidden @endif>{{ $qtdCarrinho }}</span>
        </a>
    </div>
</header>
