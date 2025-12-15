/**
 * ページ内リンクを滑らかにスクロールする
 */
export function initializeSmoothScroll() {
  const menuLinks = document.querySelectorAll(
    '.p-business-menu__link[href^="#"]',
  );
  menuLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      const href = link.getAttribute("href");
      if (href && href.startsWith("#")) {
        const target = document.getElementById(href.slice(1));
        if (target) {
          e.preventDefault();
          const OFFSET = 40;
          const header = document.querySelector(".js-header");
          let headerHeight = 0;
          if (header && window.getComputedStyle(header).position === "fixed") {
            headerHeight = header.offsetHeight;
          }
          const rect = target.getBoundingClientRect();
          const scrollTop =
            window.pageYOffset || document.documentElement.scrollTop;
          const top = rect.top + scrollTop - headerHeight - OFFSET;
          window.scrollTo({
            top: top,
            behavior: "smooth",
          });
        }
      }
    });
  });
}
