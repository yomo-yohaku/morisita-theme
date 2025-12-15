/**
 * トップに戻るボタン
 */
export function initializeScrollTop() {
  const scrollTopButton = document.querySelector(".js-scroll-top");
  if (scrollTopButton) {
    scrollTopButton.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }
}
