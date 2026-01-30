(function () {
  const btn = document.querySelector("[data-mobile-toggle]");
  const drawer = document.querySelector("[data-mobile-drawer]");

  if (!btn || !drawer) return;

  btn.addEventListener("click", function () {
    const isOpen = drawer.getAttribute("data-open") === "1";
    drawer.setAttribute("data-open", isOpen ? "0" : "1");
    drawer.style.display = isOpen ? "none" : "block";
    btn.setAttribute("aria-expanded", isOpen ? "false" : "true");
  });
})();
