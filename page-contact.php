<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">CONTACT</p>
        <h1 class="c-page-kv__title-ja">お問い合わせ</h1>
      </div>
    </div>
  </div>
</section>

<div class="c-crumbs">
  <div class="l-container-md">
    <nav aria-label="パンくずリスト">
      <ol class="c-crumbs__list">
        <li class="c-crumbs__item c-crumbs__item--home">
          <a class="c-crumbs__link" href="<?php echo esc_url(home_url('/')); ?>">HOME</a>
        </li>
        <li class="c-crumbs__item">
          <span class="c-crumbs__text">お問い合わせ</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-contact">
    <div class="l-container-sm">
      <p class="p-contact__lead">
        ご質問やご相談があれば、以下フォームよりお問い合わせください。
      </p>

      <div class="p-contact-form-wrapper">
        <?php echo do_shortcode('[contact-form-7 id="39132ac" title="お問い合わせフォーム"]'); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
