document.addEventListener('DOMContentLoaded', () => {

    /* ---------- Menu da conta (dropdown) ---------- */
    const btnConta = document.getElementById('btn-conta');
    const menuConta = document.getElementById('menu-conta');

    if (btnConta && menuConta) {
        const fechar = () => {
            menuConta.hidden = true;
            btnConta.setAttribute('aria-expanded', 'false');
        };

        btnConta.addEventListener('click', (e) => {
            e.stopPropagation();
            const abrir = menuConta.hidden;
            menuConta.hidden = !abrir;
            btnConta.setAttribute('aria-expanded', String(abrir));
        });

        document.addEventListener('click', (e) => {
            if (!menuConta.contains(e.target)) fechar();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') fechar();
        });
    }

    /* ---------- Adicionar ao carrinho (AJAX) ---------- */
    const forms = document.querySelectorAll('.add-form');
    const badge = document.getElementById('cart-badge');

    forms.forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = form.querySelector('.btn-add');
            btn.disabled = true;

            try {
                // form.action é a rota nomeada carrinho.adicionar; o @csrf já vai no FormData
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    body: new FormData(form)
                });
                const data = await response.json();

                if (data.sucesso && badge) {
                    badge.textContent = data.qtdTotal;
                    badge.hidden = data.qtdTotal < 1;
                    badge.classList.remove('pulse');
                    void badge.offsetWidth;
                    badge.classList.add('pulse');

                    const qtdMenu = document.querySelector('.qtd-menu');
                    if (qtdMenu) qtdMenu.textContent = data.qtdTotal;

                    btn.classList.add('added');
                    setTimeout(() => btn.classList.remove('added'), 1200);
                }
                btn.disabled = false;
            } catch (error) {
                console.error('Erro na requisição AJAX:', error);
                form.submit();
            }
        });
    });

    /* ---------- Botão "Assistir Vídeo" ---------- */
    const btnVideo = document.getElementById('btn-video');
    const video = document.getElementById('video-tutorial');

    if (video) {
        video.addEventListener('click', () => {
            video.controls = true;
            video.paused ? video.play().catch(() => {}) : video.pause();
        });
    }

    if (btnVideo && video) {
        btnVideo.addEventListener('click', () => {
            video.scrollIntoView({ behavior: 'smooth', block: 'center' });
            video.controls = true;
            video.play().catch(() => {});
        });
    }
});
