/**
 * スクロール位置にあわせて目次をハイライトする
 */
export function initializeTocHighlight() {
  const featureTitles = document.querySelectorAll(".js-p-business-title");

  const observerOptions = {
    root: null,
    rootMargin: "-10% 0px -90%",
    threshold: 0,
  };

  const observer = new IntersectionObserver(handleIntersect, observerOptions);

  featureTitles.forEach((title) => {
    observer.observe(title);
  });

  /**
   * 交差したときに呼び出す関数
   * @param {IntersectionObserverEntry[]} entries
   */
  function handleIntersect(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        setActiveMenuLink(entry.target);
      }
    });
  }

  /**
   * 目次の色を変える関数
   * @param {HTMLElement} element
   */
  function setActiveMenuLink(element) {
    const currentActive = document.querySelector(
      ".p-business-menu__link.active",
    );
    if (currentActive) {
      currentActive.classList.remove("active");
    }
    const newActive = document.querySelector(
      `.p-business-menu__link[href='#${element.id}']`,
    );
    if (newActive) {
      newActive.classList.add("active");
    }
  }
}
