/**
 * ヘッダーナビのドロップダウンメニュー
 */
export function initializeDropdownMenu() {
  const button = document.querySelector(".js-header-nav-button");
  const menu = document.querySelector(".js-header-nav-sub-menu");

  if (!button || !menu) return;

  const toggleMenu = () => {
    const isExpanded = button.getAttribute("aria-expanded") === "true";
    button.setAttribute("aria-expanded", !isExpanded);
    menu.classList.toggle("is-active");
  };

  button.addEventListener("click", (e) => {
    e.stopPropagation();
    toggleMenu();
  });

  document.addEventListener("click", (e) => {
    if (!menu.contains(e.target) && menu.classList.contains("is-active")) {
      button.setAttribute("aria-expanded", "false");
      menu.classList.remove("is-active");
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && menu.classList.contains("is-active")) {
      button.setAttribute("aria-expanded", "false");
      menu.classList.remove("is-active");
    }
  });
}
