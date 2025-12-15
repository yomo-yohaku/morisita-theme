/**
 * 製品案内詳細 スライダー
 */
export function initializeProductDetailSlider() {
  const el = document.querySelector(".js-product-detail-splide");
  if (!el) return;

  const splide = new Splide(el, {
    pagination: false,
    arrows: false,
  });

  const thumbnails = document.querySelectorAll(
    ".js-product-detail-thumbnails .thumbnail",
  );
  let current;

  thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", () => {
      splide.go(index);
    });
  });

  splide.on("mounted move", () => {
    const thumbnail = thumbnails[splide.index];

    if (thumbnail) {
      if (current) current.classList.remove("is-active");
      thumbnail.classList.add("is-active");
      current = thumbnail;
    }
  });

  splide.mount();
}
