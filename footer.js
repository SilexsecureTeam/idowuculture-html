document.addEventListener('DOMContentLoaded', () => {
  const sections = ['page', 'info', 'office'];
  sections.forEach(key => {
    const btn = document.querySelector(`button[data-section="${key}"]`);
    const list = document.querySelector(`ul[data-list="${key}"]`);
    let open = true;

    btn.addEventListener('click', () => {
      open = !open;
      list.style.display = open ? 'block' : 'none';
      btn.innerHTML = open
        ? '<i class="fas fa-chevron-up"></i>'
        : '<i class="fas fa-chevron-down"></i>';
    });
  });
});
