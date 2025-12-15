<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">ACCESS</p>
        <h1 class="c-page-kv__title-ja">アクセス</h1>
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
          <span class="c-crumbs__text">アクセス</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-access">
    <div class="l-container-sm">
      <div class="p-access__office-wrap">

        <?php
        $args = [
          'post_type'      => 'access',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order title',
          'order'          => 'ASC',
        ];

        $offices = new WP_Query($args);

        if ($offices->have_posts()) :
          while ($offices->have_posts()) : $offices->the_post();

            // データ取得
            $title = get_the_title();
            $address = get_field('office_address');
            $map_iframe_html = get_field('office_map_iframe_html');
            $map_link_url = get_field('office_map_link_url');
        ?>
            <section class="p-access__office-item">
              <div class="p-access__office-contents">
                <div class="p-access__office-info">
                  <h2 class="p-access__office-title"><?php echo esc_html($title); ?></h2>
                  <p class="p-access__office-address">
                    <?php echo nl2br(esc_html($address)); ?>
                  </p>
                </div>
                <a class="p-access__office-link" href="<?php echo esc_url($map_link_url); ?>" target="_blank">GOOGLE MAP</a>
              </div>
              <div class="p-access__office-map">
                <?php
                echo $map_iframe_html;
                ?>
              </div>
            </section>
          <?php
          endwhile;
          wp_reset_postdata();
        else:
          ?>
          <p>拠点情報が登録されていません。</p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
