/**
 * お問い合わせ流れるテキスト
 */
export function initializeFlowingText() {
  const flowingTextOptions = {
    type: "loop", // ループさせる
    arrows: false, // 矢印ボタンを非表示
    pagination: false, // ページネーションを非表示
    drag: false, // ドラッグしない
    gap: "0.25em", // スライド間の余白
    autoWidth: true, // スライド幅を要素に合わせる
    autoScroll: {
      speed: 1, // スクロール速度
      pauseOnHover: false, // カーソルが乗ってもスクロールを停止させない
    },
  };

  document.querySelectorAll(".js-text-flowing").forEach((el) => {
    const list = el.querySelector(".splide__list");
    if (list) {
      const slides = Array.from(list.children);
      // スライドを複製して数を増やす
      if (slides.length === 1) {
        // 画面幅に応じて最低3つになるように複製
        for (let i = 0; i < 2; i++) {
          const clone = slides[0].cloneNode(true);
          list.appendChild(clone);
        }
      }
    }
    new Splide(el, flowingTextOptions).mount(window.splide.Extensions);
  });
}
