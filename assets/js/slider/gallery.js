/**
 * 製品紹介ギャラリー
 */
export function initializeGallery() {
  const mainImg = document.querySelector(".p-product-detail-gallery__main img"); // メイン画像
  const thumbsContainer = document.querySelector(
    ".p-product-detail-gallery__thumbs",
  );

  if (!mainImg || !thumbsContainer) return;

  let currentMainSrc = mainImg.getAttribute("src");

  thumbsContainer.addEventListener("click", (e) => {
    // サムネイルラッパー取得
    const clickedWrapper = e.target.closest(
      ".p-product-detail-gallery__thumb-wrapper",
    );
    if (!clickedWrapper) return;

    // 切り替え画像URL
    const newMainSrc = clickedWrapper.dataset.mainSrc;
    if (!newMainSrc) return;

    mainImg.classList.remove("is-active");

    setTimeout(() => {
      // srcを書き換え
      mainImg.setAttribute("src", newMainSrc);
      mainImg.classList.add("is-active");

      currentMainSrc = newMainSrc;
      // サムネイル状態更新
      updateThumbsActiveState(currentMainSrc);
    }, 200);
  });

  /**
   * メイン画像と同じサムネイルを非表示
   * @param {string} activeSrc
   */
  function updateThumbsActiveState(activeSrc) {
    const allWrappers = thumbsContainer.querySelectorAll(
      ".p-product-detail-gallery__thumb-wrapper",
    );
    allWrappers.forEach((wrapper) => {
      // 一致したサムネイルを非表示
      if (wrapper.dataset.mainSrc === activeSrc) {
        wrapper.classList.add("is-hidden");
      } else {
        wrapper.classList.remove("is-hidden");
      }
    });
  }

  // 初期サムネイル非表示
  updateThumbsActiveState(currentMainSrc);
}
