/**
 * PRODUCT スライダー
 */
export function initializeProductSlider() {
  const selector = ".js-top-product-slider .splide";

  const elements = document.querySelectorAll(selector);
  if (!elements.length) return;

  elements.forEach((el) => {
    const slider = new Splide(el, {
      mediaQuery: "min",
      perPage: 1,
      focus: 0,
      omitEnd: true,
      fixedWidth: "300px",
      gap: 24,
      pagination: false,
      breakpoints: {
        1024: {
          fixedWidth: "404px",
          gap: 32,
        },
      },
    });

    slider.mount();
  });
}
