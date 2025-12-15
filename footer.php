<div class="c-contact">
  <div class="c-contact__bg">
    <div class="c-contact-bgtxt js-text-flowing splide">
      <div class="c-contact-bgtxt__track splide__track">
        <ul class="c-contact-bgtxt__list splide__list">
          <li class="c-contact-bgtxt__slide splide__slide">COTACT US</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="c-contact__button-wrap">
    <div class="c-contact-button">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-contact-button__link">
        <span class="c-contact-button__text">
          <span class="c-contact-button__text-en">CONTACT</span>
          <span class="c-contact-button__text-ja">お問い合わせ</span>
        </span>
      </a>
    </div>
  </div>
</div>

<footer class="l-footer">
  <div class="l-footer__contents">
    <button
      class="l-footer__scroll-top js-scroll-top"
      aria-label="トップに戻る"></button>
    <div class="l-footer__container l-container-md">
      <div class="l-footer__info">
        <h2 class="l-footer__heading">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="l-footer__heading-link">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/logo_white.svg'); ?>"
              width="247"
              height="74"
              alt="MORISITA Corporation"
              decoding="async"
              class="l-footer__heading-image" />
          </a>
        </h2>
        <address class="l-footer__address">
          <p class="l-footer__address-item --address">
            〒123-4567 東京都春日区青葉町2-11-7
          </p>
          <p class="l-footer__address-item --tel">03-1234-5678</p>
        </address>
        <div class="l-footer__copy">&copy; 2024 MORISITA inc.</div>
      </div>
      <nav
        class="l-footer__nav l-footer-nav"
        aria-label="フッターナビゲーション">
        <ul class="l-footer-nav__list">
          <li class="l-footer-nav__item l-footer-nav__item--home">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="l-footer-nav__link"> HOME </a>
          </li>
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/company/')); ?>" class="l-footer-nav__link">
              会社概要
            </a>
          </li>
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/message/')); ?>" class="l-footer-nav__link">
              代表挨拶
            </a>
          </li>
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/access/')); ?>" class="l-footer-nav__link">
              アクセス
            </a>
          </li>
        </ul>

        <ul class="l-footer-nav__list">
          <li class="l-footer-nav__item--business">
            <a href="<?php echo esc_url(home_url('/business/')); ?>" class="l-footer-nav__link">事業紹介</a>
            <ul class="l-footer-nav__sub-menu l-footer-nav-sub-menu">
              <li class="l-footer-nav-sub-menu__item">
                <a
                  href="<?php echo esc_url(home_url('/business/')); ?>"
                  class="l-footer-nav-sub-menu__link">
                  特殊ボルトナットの設計・製造
                </a>
              </li>
              <li class="l-footer-nav-sub-menu__item">
                <a
                  href="<?php echo esc_url(home_url('/business/')); ?>"
                  class="l-footer-nav-sub-menu__link">
                  特殊ボルトナットのオーダーメイド
                </a>
              </li>
              <li class="l-footer-nav-sub-menu__item">
                <a
                  href="<?php echo esc_url(home_url('/business/')); ?>"
                  class="l-footer-nav-sub-menu__link">
                  ISO 9001 認証取得の品質管理
                </a>
              </li>
            </ul>
          </li>
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/product/')); ?>" class="l-footer-nav__link">
              製品紹介
            </a>
          </li>
        </ul>

        <ul class="l-footer-nav__list">
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="l-footer-nav__link"> お知らせ </a>
          </li>
          <li class="l-footer-nav__item">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="l-footer-nav__link">
              お問い合わせ
            </a>
          </li>
          <li class="l-footer-nav__item">
            <a href="#" class="l-footer-nav__link">
              プライバシーポリシー
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>
