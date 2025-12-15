/**
 * ハンバーガーメニュー
 */
export function initializeHamburgerMenu() {
  const menuButton = document.querySelector(".js-header-menu-button");
  const nav = document.querySelector(".js-header-nav");

  if (!menuButton || !nav) return;

  const PC_BREAKPOINT = 1080;

  menuButton.addEventListener("click", () => {
    nav.classList.toggle("is-active");
    menuButton.classList.toggle("close-button");
  });

  const handleResize = () => {
    if (window.innerWidth >= PC_BREAKPOINT) {
      nav.classList.remove("is-active");
      menuButton.classList.remove("close-button");
    }
  };
  window.addEventListener("resize", handleResize);
  handleResize();
}
