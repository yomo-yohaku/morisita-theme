/**
 * KVが隠れたら、ヘッダーを表示
 */
export function initializeHeaderBackgroundToggle() {
  const headerElement = document.querySelector(".js-header");
  const scrollTargetElement = document.querySelector(".js-scrollTarget");
  const headerFixedClass = "is-fixed";

  if (!headerElement || !scrollTargetElement) return;

  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0,
  };

  const slideDownKeyframes = {
    transform: "translateY(60px)",
  };

  const slideUpKeyframes = {
    transform: "translateY(0)",
  };

  const animationOptions = {
    duration: 150,
    easing: "ease-out",
    fill: "forwards",
  };

  const showHeader = () => {
    headerElement.classList.add(headerFixedClass);
    headerElement.animate(slideDownKeyframes, animationOptions);
  };

  const hideHeader = () => {
    const closingAnimation = headerElement.animate(
      slideUpKeyframes,
      animationOptions,
    );

    closingAnimation.onfinish = () => {
      headerElement.classList.remove(headerFixedClass);
    };
  };

  const headerVisibilityHandler = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        hideHeader();
      } else {
        showHeader();
      }
    });
  };

  const scrollObserver = new IntersectionObserver(
    headerVisibilityHandler,
    observerOptions,
  );
  scrollObserver.observe(scrollTargetElement);
}
