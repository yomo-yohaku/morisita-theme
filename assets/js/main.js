import { initializeHamburgerMenu } from "./component/hamburger-menu.js";
import { initializeDropdownMenu } from "./component/dropdown-menu.js";
import { initializeHeaderBackgroundToggle } from "./component/header-background-toggle.js";
import { initializeKvSlider } from "./slider/kv-slider.js";
import { initializeProductSlider } from "./slider/product-slider.js";
import { initializeProductDetailSlider } from "./slider/product-detail-slider.js";
import { initializeFlowingText } from "./slider/flowing-text.js";
import { initializeGallery } from "./slider/gallery.js";
import { initializeScrollTop } from "./utility/scroll-top.js";
import { initializeSmoothScroll } from "./utility/smooth-scroll.js";
import { initializeTocHighlight } from "./utility/toc-highlight.js";

// 全ての初期化を実行
document.addEventListener("DOMContentLoaded", () => {
  initializeHamburgerMenu();
  initializeDropdownMenu();
  initializeHeaderBackgroundToggle();
  initializeKvSlider();
  initializeProductSlider();
  initializeProductDetailSlider();
  initializeFlowingText();
  initializeGallery();
  initializeScrollTop();
  initializeSmoothScroll();
  initializeTocHighlight();
});
