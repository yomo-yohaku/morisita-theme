<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="format-detection" content="telephone=no" />

  <!-- favicon/webclipicon -->
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.ico'); ?>" />
  <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/favicon.svg'); ?>" type="image/svg+xml" />
  <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/webclip.png'); ?>" />

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Zen+Kaku+Gothic+New:wght@500;700&display=swap"
    rel="stylesheet" />

  <!-- css -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css" />
  <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri() . '/assets/css/style.css'); ?>" />

  <!-- js -->
  <script
    src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"
    defer></script>
  <script
    src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"
    defer></script>
  <script type="module" src="<?php echo esc_url(get_template_directory_uri() . '/assets/js/main.js'); ?>"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="l-header<?php echo (is_home() || is_front_page()) ? ' l-header--home' : ''; ?> js-header">
    <div class="l-header__container">
      <?php $tag = (is_home() || is_front_page()) ? 'h1' : 'p'; ?>
      <<?php echo $tag; ?> class="l-header__heading">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__heading-link">
          <img
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/logo.svg'); ?>"
            width="247"
            height="74"
            alt="MORISITA Corporation"
            decoding="async"
            class="l-header__heading-image" />
        </a>
      </<?php echo $tag; ?>>

      <div class="l-header__contents">
        <nav
          class="l-header__nav l-header-nav js-header-nav"
          aria-label="ヘッダーナビゲーション">
          <ul class="l-header-nav__list">
            <li
              class="l-header-nav__item l-header-nav-item l-header-nav-item--home">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header-nav-item__link">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">HOME</span>
                  <span class="l-header-nav-item__label-ja">ホーム</span>
                </span>
              </a>
            </li>

            <li class="l-header-nav__item l-header-nav-item">
              <a href="<?php echo esc_url(home_url('/company/')); ?>" class="l-header-nav-item__link">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">COMPANY</span>
                  <span class="l-header-nav-item__label-ja">会社概要</span>
                </span>
              </a>
            </li>

            <li class="l-header-nav__item l-header-nav-item">
              <button
                class="l-header-nav-item__link js-header-nav-button"
                aria-expanded="false"
                aria-controls="business"
                aria-haspopup="true">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">BUSINESS</span>
                  <span class="l-header-nav-item__label-ja">事業紹介</span>
                </span>
              </button>

              <ul
                id="business"
                class="l-header-nav__sub-menu l-header-nav-sub-menu js-header-nav-sub-menu">
                <li class="l-header-nav-sub-menu__item">
                  <a href="<?php echo esc_url(home_url('/business/design/')); ?>" class="l-header-nav-sub-menu__link">
                    <span class="l-header-nav-sub-menu__label">
                      特殊ボルトナットの設計・製造
                    </span>
                  </a>
                </li>
                <li class="l-header-nav-sub-menu__item">
                  <a href="<?php echo esc_url(home_url('/business/order-made/')); ?>" class="l-header-nav-sub-menu__link">
                    <span class="l-header-nav-sub-menu__label">
                      特殊ボルトナットのオーダーメイド
                    </span>
                  </a>
                </li>
                <li class="l-header-nav-sub-menu__item">
                  <a href="<?php echo esc_url(home_url('/business/quality-control/')); ?>" class="l-header-nav-sub-menu__link">
                    <span class="l-header-nav-sub-menu__label">
                      ISO 9001 認証取得の品質管理
                    </span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="l-header-nav__item l-header-nav-item">
              <a href="<?php echo esc_url(home_url('/product/')); ?>" class="l-header-nav-item__link">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">PRODUCT</span>
                  <span class="l-header-nav-item__label-ja">製品紹介</span>
                </span>
              </a>
            </li>

            <li class="l-header-nav__item l-header-nav-item">
              <a href="<?php echo esc_url(home_url('/access/')); ?>" class="l-header-nav-item__link">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">ACCESS</span>
                  <span class="l-header-nav-item__label-ja">アクセス</span>
                </span>
              </a>
            </li>

            <li class="l-header-nav__item l-header-nav-item--contact">
              <a
                href="<?php echo esc_url(home_url('/contact/')); ?>"
                class="l-header-nav-item__link l-header-contact-button">
                <span class="l-header-nav-item__label">
                  <span class="l-header-nav-item__label-en">CONTACT</span>
                  <span class="l-header-nav-item__label-ja">お問い合わせ</span>
                </span>
              </a>
            </li>
          </ul>
        </nav>

        <button
          class="l-header__menu-button l-header-menu-button js-header-menu-button"
          aria-label="メニュー開閉">
          <span class="l-header-menu-button__bar"></span>
          <span class="l-header-menu-button__bar"></span>
          <span class="l-header-menu-button__bar"></span>
        </button>
      </div>
    </div>
  </header>