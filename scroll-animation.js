function verificarPosicao() {
    var botaoScroll = document.getElementById('botao-scroll');

    if (window.scrollY > 300) {
        botaoScroll.style.opacity = '1';
        botaoScroll.style.pointerEvents = 'auto';
    } else {
        botaoScroll.style.opacity = '0';
        botaoScroll.style.pointerEvents = 'none';
    }
}

window.addEventListener('scroll', verificarPosicao);

verificarPosicao();
