/*
  ┌──────────────────────────────────────────────────────┐
  │  navegar(destino, botaoClicado, isFooter)            │
  │                                                      │
  │  destino      → ID da tela a exibir                  │
  │  botaoClicado → botão que originou a chamada          │
  │  isFooter     → true quando veio do footer mobile    │
  └──────────────────────────────────────────────────────┘
*/
function navegar(destino, botaoClicado, isFooter = false) {

  // 1. Esconde todas as telas
  document.querySelectorAll('.tela').forEach(t => {
    t.classList.remove('visivel');
  });

  // 2. Mostra a tela pedida (se existir)
  const telaAlvo = document.getElementById(destino);
  if (telaAlvo) telaAlvo.classList.add('visivel');

  // 3. Atualiza destaque nos botões
  if (botaoClicado) {
    if (isFooter) {
      // Veio do footer: atualiza footer E as abas do topo
      document.querySelectorAll('#footer .footer-btn').forEach(b => b.classList.remove('ativo'));
      botaoClicado.classList.add('ativo');

      // Espelha na spa-nav do topo (desktop e mobile)
      document.querySelectorAll('.spa-nav .nav-btn').forEach(b => b.classList.remove('ativo'));
      const mapa = {
        'tela-reservas': ['tab-reservas', 'tab-mob-reservas'],
        'tela-quadras':  ['tab-quadras',  'tab-mob-quadras'],
      };
      (mapa[destino] || []).forEach(id => {
        const el = document.getElementById(id);
        if (el) el.classList.add('ativo');
      });

    } else {
      // Veio das abas: atualiza todas as spa-nav
      document.querySelectorAll('.spa-nav .nav-btn').forEach(b => b.classList.remove('ativo'));
      // Ativa todos os botões das abas que correspondam ao mesmo destino
      document.querySelectorAll('.spa-nav .nav-btn').forEach(b => {
        if (b.getAttribute('onclick') && b.getAttribute('onclick').includes(destino)) {
          b.classList.add('ativo');
        }
      });
    }
  }
}

/* ─── FILTRO DE BUSCA ─────────────────────────── */
function filtrarReservas(texto) {
  const termo = texto.toLowerCase();
  document.querySelectorAll('#lista-reservas .reserva-item').forEach(item => {
    const bate = item.dataset.busca.includes(termo);
    item.style.display = bate ? 'flex' : 'none';
  });
}

/* ─── APROVAR RESERVA ─────────────────────────── */
function aprovar(btn) {
  const item  = btn.closest('.reserva-item');
  const badge = item.querySelector('.badge-status');

  badge.textContent = 'Confirmada';
  badge.className   = 'badge-status badge-confirmada';

  btn.closest('.d-flex.gap-2').remove();
}

/* ─── REJEITAR RESERVA ────────────────────────── */
function rejeitar(btn) {
  const item = btn.closest('.reserva-item');

  item.style.transition = 'opacity .3s, transform .3s';
  item.style.opacity    = '0';
  item.style.transform  = 'translateX(20px)';

  setTimeout(() => item.remove(), 300);
}
