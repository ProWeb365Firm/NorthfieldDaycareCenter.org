/* Mobile menu toggle for the static Northfield Day Care Center site */
(function () {
  document.addEventListener('click', function (e) {
    var a = e.target.closest && e.target.closest('a.menu-mobile');
    if (!a) return;
    e.preventDefault();
    e.stopImmediatePropagation();
    var block = a.closest('#block-superfish-1') || a.parentNode;
    var open = block.classList.toggle('nfd-open');
    a.setAttribute('aria-expanded', open ? 'true' : 'false');
  }, true);
  document.addEventListener('DOMContentLoaded', function () {
    var a = document.querySelector('a.menu-mobile');
    if (!a) return;
    a.setAttribute('role', 'button');
    a.setAttribute('aria-label', 'Menu');
    a.setAttribute('aria-controls', 'main_menu');
    a.setAttribute('aria-expanded', 'false');
  });
})();
