<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">PRODUCT</p>
        <h1 class="c-page-kv__title-ja">製品紹介</h1>
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
          <span class="c-crumbs__text">製品紹介</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-product">
    <div class="l-container-md">
      <div class="p-product__wrap">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="p-product__block">
              <article class="p-product__article">
                <a href="<?php the_permalink(); ?>" class="p-product__link">
                  <div class="p-product__amount">
                    <?php if (has_post_thumbnail()): ?>
                      <img
                        class="p-product__image"
                        src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                        width="808"
                        height="539"
                        alt="<?php the_title_attribute(); ?>"
                        decoding="async" />
                    <?php else: ?>
                      <img
                        class="p-product__image"
                        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/product/noimage.jpg'); ?>"
                        width="808"
                        height="539"
                        alt="No image"
                        decoding="async" />
                    <?php endif; ?>
                  </div>
                  <div class="p-product__content">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'product_cat');
                    if ($terms && !is_wp_error($terms)):
                      $term_names = array_map(function ($term) {
                        return esc_html($term->name);
                      }, $terms);
                    ?>
                      <p class="p-product__category">
                        <?php echo implode(', ', $term_names); ?>
                      </p>
                    <?php endif; ?>
                    <h2 class="p-product__title"><?php the_title(); ?></h2>
                  </div>
                </a>
              </article>
            </div>
          <?php endwhile;
        else: ?>
          <p>投稿が見つかりませんでした。</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
