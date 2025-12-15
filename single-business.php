<?php get_header(); ?>

<?php
if (have_posts()) : the_post();
  $post_title = get_the_title();
  // KV画像: アイキャッチ画像
  if (has_post_thumbnail()) {
    $kv_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
  } else {
    $kv_image_url = get_template_directory_uri() . '/assets/images/default/kv_default.jpg';
  }
endif;
?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <p class="c-page-kv__labels">
        <span class="c-page-kv__label-en">BUSINESS</span>
        <span class="c-page-kv__label-ja">事業紹介</span>
      </p>
      <h1 class="c-page-kv__title"><?php echo esc_html($post_title); ?></h1>
    </div>

    <div class="c-page-kv__image-wrap">
      <div class="c-page-kv__image-amount">
        <img
          class="c-page-kv__image"
          src="<?php echo esc_url($kv_image_url); ?>"
          width="484"
          height="324"
          alt="<?php echo esc_attr($post_title); ?>"
          decoding="async" />
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
          事業紹介
        </li>
        <li class="c-crumbs__item">
          <span class="c-crumbs__text"><?php echo esc_html($post_title); ?></span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<div class="p-business-contents">
  <div class="p-business-container l-container-md">
    <aside class="p-business-menu">
      <div class="p-business-menu__container">
        <h2 class="p-business-menu__title">
          <span class="p-business-menu__title-en">MENU</span>
          <span class="p-business-menu__title-ja">メニュー</span>
        </h2>
        <nav aria-label="目次">
          <ul class="p-business-menu__list">
            <li class="p-business-menu__item">
              <a class="p-business-menu__link" href="#problem">お客様の課題</a>
            </li>
            <li class="p-business-menu__item">
              <a class="p-business-menu__link" href="#feature">特徴</a>
            </li>
            <li class="p-business-menu__item">
              <a class="p-business-menu__link" href="#flow">納品までの流れ</a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <main class="p-business">
      <section class="p-business-problem">
        <h2
          id="problem"
          class="p-business-problem__title js-p-business-title">
          <span class="p-business-problem__title-en">PROBLEM</span>
          <span class="p-business-problem__title-ja">お客様の課題</span>
        </h2>
        <p class="p-business-problem__lead">
          以下のような課題を私達は解決いたします。
        </p>
        <ul class="p-business-problem__list">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php $problem_item = get_field('problem_item_0' . $i); ?>
            <?php if ($problem_item): ?>
              <li class="p-business-problem__item">
                <?php echo nl2br(esc_html($problem_item));
                ?>
              </li>
            <?php endif; ?>
          <?php endfor; ?>
        </ul>
      </section>
      <section class="p-business-feature">
        <h2
          id="feature"
          class="p-business-feature__title js-p-business-title">
          <span class="p-business-feature__title-en">FEATURE</span>
          <span class="p-business-feature__title-ja">特徴</span>
        </h2>
        <ul class="p-business-feature__list">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php
            $image_id = get_field("feature_image_0{$i}");
            $title = get_field("feature_title_0{$i}");
            $text = get_field("feature_text_0{$i}");

            // タイトルが入力されている場合のみ表示
            if ($title):
            ?>
              <li class="p-business-feature__item">
                <figure class="p-business-feature__figure">
                  <?php
                  if ($image_id) {
                    echo wp_get_attachment_image(
                      $image_id,
                      'medium_large',
                      false,
                      [
                        'class'    => 'p-business-feature__image',
                        'decoding' => 'async',
                        'alt'      => esc_attr($title),
                      ]
                    );
                  }
                  ?>
                </figure>

                <div class="p-business-feature__body">
                  <p class="p-business-feature__body-title">
                    <?php echo esc_html($title); ?>
                  </p>
                  <p class="p-business-feature__body-text">
                    <?php echo nl2br(esc_html($text));
                    ?>
                  </p>
                </div>
              </li>
            <?php endif; ?>
          <?php endfor; ?>
        </ul>
      </section>
      <section class="p-business-flow">
        <h2 id="flow" class="p-business-flow__title js-p-business-title">
          <span class="p-business-flow__title-en">FLOW</span>
          <span class="p-business-flow__title-ja">納品までの流れ</span>
        </h2>
        <ol class="p-business-flow__list">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php
            $title = get_field("flow_title_0{$i}");
            $text = get_field("flow_text_0{$i}");
            $image_id = get_field("flow_image_0{$i}");

            if ($title):
              $num_display = str_pad($i, 2, '0', STR_PAD_LEFT);

              if ($image_id) {
                $image_url = wp_get_attachment_image_url($image_id, 'medium');
              } else {
                $image_url = get_template_directory_uri() . "/assets/images/business/image_flow_{$num_display}.svg";
              }
            ?>
              <li class="p-business-flow__item">
                <div class="p-business-flow__image">
                  <img
                    src="<?php echo esc_url($image_url); ?>"
                    decoding="async"
                    alt="<?php echo esc_attr($title); ?>"
                    width="150"
                    height="150" />
                </div>
                <div class="p-business-flow__body">
                  <div class="p-business-flow__body-title">
                    <p class="p-business-flow__body-title-num"><?php echo $num_display; ?>.</p>
                    <p class="p-business-flow__body-title-text"><?php echo esc_html($title); ?></p>
                  </div>
                  <p class="p-business-flow__body-text">
                    <?php echo nl2br(esc_html($text)); ?>
                  </p>
                </div>
              </li>
            <?php endif; ?>
          <?php endfor; ?>
        </ol>
      </section>
    </main>
  </div>
</div>

<?php get_footer(); ?>
