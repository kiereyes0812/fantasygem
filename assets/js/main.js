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


/* Smooth scroll with fixed header offset */
(function () {
  const headerOffset = 8 + 72; // top strip + header

  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
      const id = a.getAttribute("href");
      if (!id || id === "#") return;

      const el = document.querySelector(id);
      if (!el) return;

      e.preventDefault();
      const y = el.getBoundingClientRect().top + window.pageYOffset - headerOffset;
      window.scrollTo({ top: y, behavior: "smooth" });
    });
  });
})();
