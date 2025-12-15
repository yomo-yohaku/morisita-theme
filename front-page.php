<?php get_header(); ?>

<main>
  <?php
  // フロントページとして設定された固定ページのIDを取得
  $front_page_id = get_option('page_on_front');

  // コピー文を取得 (なければデフォルトを使用)
  $copy_ja = get_field('kv_copy_ja', $front_page_id) ?: "特殊ボルトナット制作の\nプロフェッショナル";
  $copy_en = get_field('kv_copy_en', $front_page_id) ?: 'Special bolt and nut production professionals';

  // コピー文を改行で分割
  $copy_ja_lines = explode("\n", esc_html($copy_ja));
  ?>

  <div class="p-top-kv js-scrollTarget js-kv-splide">
    <div class="splide">
      <div class="splide__track">
        <div class="splide__list">

          <?php
          $slides_output = false; // スライドが出力されたかチェックするフラグ

          // スライドの最大回数 (1から3まで) をループして画像を取得
          for ($i = 1; $i <= 3; $i++) {
            $image = get_field('kv_image_' . $i, $front_page_id);
            $interval = get_field('interval_time_' . $i, $front_page_id) ?: 7000;

            // 画像フィールドが空ではない場合のみ出力
            if (!empty($image['url'])) {
              $slides_output = true;

              // 画像の幅と高さがACFに保存されていれば取得、なければデフォルト値を使用
              $img_width = $image['width'] ?? 3840;
              $img_height = $image['height'] ?? 2496;
          ?>
              <div class="splide__slide" data-splide-interval="<?php echo esc_attr($interval); ?>">
                <div class="splide__slide-amount">
                  <img
                    src="<?php echo esc_url($image['url']); ?>"
                    width="<?php echo esc_attr($img_width); ?>"
                    height="<?php echo esc_attr($img_height); ?>"
                    alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                    decoding="async"
                    class="splide__slide-image" />
                </div>
              </div>
            <?php
            }
          }

          // スライドが一つも登録されていない場合、フォールバックのデフォルト画像を出力
          if (!$slides_output):
            ?>
            <div class="splide__slide" data-splide-interval="7000">
              <div class="splide__slide-amount">
                <img
                  src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/top/kv_01.jpg'); ?>"
                  width="3840"
                  height="2496"
                  alt="デフォルトのKV画像"
                  decoding="async"
                  class="splide__slide-image" />
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

    <div class="p-top-kv__contents">
      <div class="p-top-kv__contents-container l-container-md">
        <div class="p-top-kv__fraction"></div>
        <div class="p-top-kv__copy">
          <?php
          // 日本語コピー文を改行ごとに<span>で囲んで出力
          foreach ($copy_ja_lines as $line) {
            // 空行をスキップし、trim()で前後のスペースを除去
            if (trim($line) !== '') {
              echo '<span>' . trim($line) . '</span>' . "\n";
            }
          }
          ?>
          <span class="p-top-kv__copy-en">
            <?php echo esc_html($copy_en); ?>
          </span>
        </div>
      </div>
    </div>
  </div>

  <section class="p-top-news">
    <div class="p-top-news__container l-container-md">
      <div class="p-top-news__heading">
        <p class="p-top-news__heading-en">NEWS</p>
        <h2 class="p-top-news__heading-ja">お知らせ</h2>
      </div>
      <div class="p-top-news__wrap">
        <?php
        // 最新3件のお知らせを取得
        $news_query = new WP_Query(array(
          'post_type' => 'news',
          'posts_per_page' => 3,
          'post_status' => 'publish'
        ));
        if ($news_query->have_posts()) :
          while ($news_query->have_posts()) : $news_query->the_post(); ?>
            <section class="p-top-news__item">
              <article class="p-top-news__article">
                <a href="<?php the_permalink(); ?>" class="p-top-news__link">
                  <span class="p-top-news__date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
                  <?php if (get_the_title()): ?>
                    <h3 class="p-top-news__text"><?php the_title(); ?></h3>
                  <?php endif; ?>
                </a>
              </article>
            </section>
          <?php
          endwhile;
        else : ?>
          <section class="p-top-news__item">
            <article class="p-top-news__article">
              <span class="p-top-news__text">現在お知らせはありません。</span>
            </article>
          </section>
        <?php
        endif;
        wp_reset_postdata();
        ?>
      </div>
      <a href="<?php echo esc_url(home_url('/news/')); ?>" class="p-top-news__more">VIEW MORE</a>
    </div>
  </section>

  <section class="p-top-business">
    <div class="p-top-business__container l-container-md">
      <figure class="p-top-business__figure">
        <picture>
          <source
            media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/top/image_business_01_pc.jpg'); ?>" />
          <img
            class="p-top-business__image"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/top/image_business_01_sp.jpg'); ?>"
            decoding="async"
            alt=""
            width="600"
            height="400" />
        </picture>
      </figure>

      <div class="p-top-business__contents">
        <div class="p-top-business__labels">
          <p class="p-top-business__label-en">BUSINESS</p>
          <h2 class="p-top-business__label-ja">事業紹介</h2>
        </div>
        <p class="p-top-business__heading">
          <span>高品質な</span>
          <span>ボルトナットで、</span>
          <span>世界を支える。</span>
        </p>
        <p class="p-top-business__lead">
          どんな環境にも、最適なソリューション。<br />
          豊富な経験と技術力で、お客様のニーズに答える製品づくりをしています。
        </p>
      </div>

      <?php
      $business_args = array(
        'post_type'      => 'business',
        'posts_per_page' => 3,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      );
      $business_query = new WP_Query($business_args);
      if ($business_query->have_posts()) : ?>
        <ul class="p-top-business__list">
          <?php while ($business_query->have_posts()) : $business_query->the_post(); ?>
            <li class="p-top-business__item">
              <a class="p-top-business__link" href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
                <span class="p-top-business__link-arrow"></span>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php
      else :
      ?>
        <ul class="p-top-business__list">
          <li class="p-top-business__item">
            <span class="p-top-business__link">事業紹介情報がありません。</span>
          </li>
        </ul>
      <?php
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </section>

  <section class="p-top-product">
    <div class="p-top-product__container">
      <div class="p-top-product__contents l-container-md">
        <div class="p-top-product__labels">
          <p class="p-top-product__label-en">PRODUCT</p>
          <h2 class="p-top-product__label-ja">製品紹介</h2>
        </div>
        <p class="p-top-product__heading">確かな品質と技術力</p>
        <p class="p-top-product__lead">
          高品質・高精度のボルトナットを豊富に取り揃え。<br />
          産業の要として、お客様のニーズに応える製品をお届けします。
        </p>
      </div>
      <div class="p-top-product__slider l-container-md js-top-product-slider">
        <div class="splide">
          <div class="splide__track">
            <ul class="p-top-product__list splide__list">
              <?php
              // productカスタム投稿の最新8件を表示
              $product_args = array(
                'post_type'      => 'product',
                'posts_per_page' => 8,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
              );
              $product_query = new WP_Query($product_args);
              if ($product_query->have_posts()) :
                while ($product_query->have_posts()) : $product_query->the_post();
                  // サムネイル画像
                  $thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
                  // alt属性
                  $alt = get_the_title();
                  // カテゴリー
                  $product_cat = '';
                  $terms = get_the_terms(get_the_ID(), 'product_cat');
                  if ($terms && !is_wp_error($terms)) {
                    $product_cat = $terms[0]->name;
                  }
              ?>
                  <li class="p-top-product-item splide__slide">
                    <a href="<?php the_permalink(); ?>">
                      <figure class="p-top-product-item__amount">
                        <?php if ($thumb): ?>
                          <img
                            src="<?php echo esc_url($thumb); ?>"
                            alt="<?php echo esc_attr($alt); ?>"
                            loading="lazy"
                            decoding="async"
                            width="808"
                            height="539"
                            class="p-top-product-item__image" />
                        <?php else: ?>
                          <img
                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/common/no_image.png'); ?>"
                            alt="NO IMAGE"
                            loading="lazy"
                            decoding="async"
                            width="808"
                            height="539"
                            class="p-top-product-item__image" />
                        <?php endif; ?>
                      </figure>
                      <div class="p-top-product-item__wrap">
                        <?php if ($product_cat): ?>
                          <p class="p-top-product-item__label"><?php echo esc_html($product_cat); ?></p>
                        <?php endif; ?>
                        <p class="p-top-product-item_title">
                          <?php the_title(); ?>
                        </p>
                      </div>
                    </a>
                  </li>
                <?php
                endwhile;
                wp_reset_postdata();
              else : ?>
                <li class="p-top-product-item splide__slide">
                  <div class="p-top-product-item__wrap">
                    <p class="p-top-product-item__label">製品情報がありません。</p>
                  </div>
                </li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="splide__arrows">
            <button
              class="splide__arrow splide__arrow--prev"
              aria-label="前のスライド"></button>
            <button
              class="splide__arrow splide__arrow--next"
              aria-label="次のスライド"></button>
          </div>
        </div>
      </div>
      <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="p-top-product__more">VIEW MORE</a>
    </div>
  </section>

  <div class="p-top-info">
    <div class="l-container-md">
      <ul class="p-top-info__list">
        <li class="p-top-info__item">
          <a href="<?php echo esc_url(home_url('/company/')); ?>" class="p-top-info__link">
            <div class="p-top-info__title">
              <span class="p-top-info__title-en">COMPANY</span>
              <span class="p-top-info__title-ja">会社概要</span>
            </div>
            <div class="p-top-info__description">
              事業内容、経営方針など、当社を深く知っていただくための情報をご紹介します。
              <span class="p-top-info__arrow"></span>
            </div>
          </a>
        </li>
        <li class="p-top-info__item">
          <a href="<?php echo esc_url(home_url('/message/')); ?>" class="p-top-info__link">
            <div class="p-top-info__title">
              <span class="p-top-info__title-en">MESSAGE</span>
              <span class="p-top-info__title-ja">代表挨拶</span>
            </div>
            <div class="p-top-info__description">
              私たちの理念と未来への展望をお伝えします。
              社長からのメッセージをご覧ください。
              <span class="p-top-info__arrow"></span>
            </div>
          </a>
        </li>
        <li class="p-top-info__item">
          <a href="<?php echo esc_url(home_url('/access/')); ?>" class="p-top-info__link">
            <div class="p-top-info__title">
              <span class="p-top-info__title-en">ACCESS</span>
              <span class="p-top-info__title-ja">アクセス</span>
            </div>
            <div class="p-top-info__description">
              本社工場や営業所の所在地、
              詳細な地図と交通手段をご確認いただけます。
              <span class="p-top-info__arrow"></span>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </div>
</main>

<?php get_footer(); ?>
