<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__data-wrap">
        <p class="c-page-kv__labels">
          <span class="c-page-kv__label-en">NEWS</span>
          <span class="c-page-kv__label-ja">お知らせ</span>
        </p>
        <p class="c-page-kv__data">
          <?php echo esc_html(get_the_date('Y.m.d')); ?>
        </p>
      </div>
      <h1 class="c-page-kv__title"><?php the_title(); ?></h1>
    </div>

    <div class="c-page-kv__image-wrap">
      <div class="c-page-kv__image-amount">
        <?php if (has_post_thumbnail()): ?>
          <?php the_post_thumbnail('large', ['class' => 'c-page-kv__image', 'loading' => 'lazy', 'decoding' => 'async']); ?>
        <?php else: ?>
          <img
            class="c-page-kv__image"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/default/kv_default.jpg'); ?>"
            width="484"
            height="324"
            alt="<?php echo esc_attr(get_the_title()); ?>"
            loading="lazy"
            decoding="async" />
        <?php endif; ?>
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
          <a class="c-crumbs__link" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">お知らせ</a>
        </li>
        <li class="c-crumbs__item">
          <span class="c-crumbs__text">
            <?php the_title(); ?>
          </span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main class="p-news-detail">
  <div class="l-container-sm">
    <article class="p-news-article">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      endif;
      ?>
    </article>

    <nav
      class="p-news-article-pagination"
      aria-label="記事ページネーション">
      <ul class="p-news-article-pagination__list">
        <li class="p-news-article-pagination__item">
          <?php
          $prev_post = get_previous_post();
          if (!empty($prev_post)): ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="p-news-article-pagination__prev" rel="prev">
              PREV
            </a>
          <?php endif; ?>
        </li>
        <li class="p-news-article-pagination__item">
          <?php
          $next_post = get_next_post();
          if (!empty($next_post)): ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="p-news-article-pagination__next" rel="next">
              NEXT
            </a>
          <?php endif; ?>
        </li>
      </ul>
    </nav>
  </div>
</main>

<?php get_footer(); ?>
