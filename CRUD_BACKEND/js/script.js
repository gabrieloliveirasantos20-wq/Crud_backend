// Confirmação antes de excluir
document.addEventListener('click', function (e) {
  const link = e.target.closest('.js-confirm-delete');
  if (!link) return;
  if (!confirm('Tem certeza que deseja excluir este produto?')) {
    e.preventDefault();
  }
});

// Auto-esconder mensagens flash após 4s
setTimeout(() => {
  document.querySelectorAll('.flash').forEach(el => {
    el.style.transition = 'opacity .4s ease';
    el.style.opacity = '0';
    setTimeout(() => el.remove(), 500);
  });
}, 4000);
