/**
 * キービジュアルスライダー
 */
export function initializeKvSlider() {
  const DEFAULT_INTERVAL = 7000;
  const KV_SELECTOR = ".js-kv-splide .splide";

  const kvContainer = document.querySelector(".js-kv-splide");
  if (!kvContainer) return;

  function createFractionEl() {
    return `
      <span class="circle">
        <svg viewBox="0 0 64 64" aria-hidden="true">
          <circle class="circle-01" cx="50%" cy="50%" r="31"></circle>
          <circle class="circle-02" cx="50%" cy="50%" r="31"></circle>
        </svg>
      </span>
      <span class="current"></span>
    `;
  }

  function getSlideDelays(slides) {
    return Array.from(
      slides,
      (el) => Number(el.dataset.splideInterval) || DEFAULT_INTERVAL,
    );
  }

  function applyImgTransitionDurations(slides, slideDelays) {
    slides.forEach((slideEl, i) => {
      const img = slideEl.querySelector(".splide__slide-image");
      if (!img) return;
      img.style.transitionProperty = "transform";
      img.style.transitionDuration = `${slideDelays[i]}ms`;
      img.style.transitionTimingFunction = "ease-out";
    });
  }

  function restartCircleAnimation(circleEl, duration) {
    if (!circleEl) return;
    circleEl.setAttribute("stroke-dasharray", "201.056px");
    circleEl.setAttribute("stroke-dashoffset", "201.056px");

    circleEl.style.animation = "none";
    circleEl.style.webkitAnimation = "none";
    void circleEl.getBoundingClientRect();

    circleEl.style.animationName = "splide-circle";
    circleEl.style.animationDuration = `${duration}ms`;
    circleEl.style.animationTimingFunction = "linear";
    circleEl.style.animationFillMode = "both";

    circleEl.style.webkitAnimationName = "splide-circle";
    circleEl.style.webkitAnimationDuration = `${duration}ms`;
    circleEl.style.webkitAnimationTimingFunction = "linear";
    circleEl.style.webkitAnimationFillMode = "both";
  }

  function setSplideInterval(splide, interval) {
    const autoplay = splide.Components?.Autoplay;
    if (autoplay?.setInterval) {
      autoplay.setInterval(interval);
    } else {
      splide.options.interval = interval;
    }
  }

  function initSplideKV() {
    const slides = Array.from(
      document.querySelectorAll(".js-kv-splide .splide__slide"),
    );
    const fractionEl = document.querySelector(
      ".js-kv-splide .p-top-kv__fraction",
    );

    if (!fractionEl || slides.length === 0) {
      console.warn("KV: fraction element or slides not found.");
      return;
    }

    const slideDelays = getSlideDelays(slides);
    applyImgTransitionDurations(slides, slideDelays);

    if (!fractionEl.querySelector(".circle")) {
      fractionEl.insertAdjacentHTML("beforeend", createFractionEl());
    }

    const circle02 = fractionEl.querySelector(".circle-02");
    const current = fractionEl.querySelector(".current");

    const splide = new Splide(KV_SELECTOR, {
      type: "fade",
      rewind: true,
      autoplay: true,
      speed: 1000,
      interval: slideDelays[0],
      arrows: false,
      pagination: false,
      pauseOnHover: false,
      pauseOnFocus: false,
    });

    splide.on("mounted", () => {
      const idx = splide.index || 0;
      if (current) current.textContent = String(idx + 1).padStart(2, "0");
      restartCircleAnimation(circle02, slideDelays[idx]);
      setSplideInterval(splide, slideDelays[idx]);
    });

    splide.on("moved", (newIndex) => {
      if (current) current.textContent = String(newIndex + 1).padStart(2, "0");
      restartCircleAnimation(circle02, slideDelays[newIndex]);
      setSplideInterval(splide, slideDelays[newIndex]);
    });

    splide.on("autoplay:play", () => {
      const idx = splide.index || 0;
      restartCircleAnimation(circle02, slideDelays[idx]);
      setSplideInterval(splide, slideDelays[idx]);
    });

    splide.mount();
  }

  initSplideKV();
}
