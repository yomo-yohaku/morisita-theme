<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">MESSAGE</p>
        <h1 class="c-page-kv__title-ja">代表挨拶</h1>
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
          <span class="c-crumbs__text">代表挨拶</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-message">
    <div class="l-container-sm">
      <div class="p-message__inner">
        <div class="p-message__image-amount">
          <picture>
            <source
              media="(min-width: 1080px)"
              srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/message/image_01_pc.jpg'); ?>" />
            <img
              class="p-message__image"
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/message/image_01_sp.jpg'); ?>"
              decoding="async"
              alt=""
              width="680"
              height="456" />
          </picture>
        </div>
        <div class="p-message__body">

          <?php if (get_field('message_title')): ?>
            <div class="p-message__title">
              <?php the_field('message_title'); ?>
            </div>
          <?php endif; ?>

          <?php if (get_field('message_text')): ?>
            <div class="p-message__text">
              <?php the_field('message_text'); ?>
            </div>
          <?php endif; ?>

          <div class="p-message__signature">
            <?php if (get_field('signature_position')): ?>
              <p class="p-message__position"><?php the_field('signature_position'); ?></p>
            <?php endif; ?>

            <?php if (get_field('signature_name')): ?>
              <p class="p-message__name"><?php the_field('signature_name'); ?></p>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>