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

  // ギャラリー画像
  $gallery_image_ids = [];
  if (function_exists('get_field')) {
    for ($i = 1; $i <= 4; $i++) {
      $id = get_field('product_gallery_thumb_0' . $i);
      if ($id) {
        $gallery_image_ids[] = $id;
      }
    }

    // 仕様取得
    $spec_name = get_field('product_name_detail');
    $spec_code = get_field('product_code');
    $spec_material = get_field('product_material');
    $spec_size = get_field('product_size');
    $spec_drive = get_field('product_drive_type');
    $spec_use = get_field('product_use');
    $spec_package = get_field('product_package');
  } else {
    $spec_name = '';
    $spec_code = '';
    $spec_material = '';
    $spec_size = '';
    $spec_drive = '';
    $spec_use = '';
    $spec_package = '';
  }

  $main_image_id = $gallery_image_ids[0] ?? null;
  $all_thumb_ids = $gallery_image_ids;

  $all_image_urls = [];
  foreach ($gallery_image_ids as $id) {
    $all_image_urls[$id] = wp_get_attachment_image_url($id, 'large');
  }

endif;
?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <p class="c-page-kv__labels">
        <span class="c-page-kv__label-en">PRODUCT</span>
        <span class="c-page-kv__label-ja">製品案内</span>
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
          <a class="c-crumbs__link" href="<?php echo esc_url(get_post_type_archive_link('product')); ?>">製品紹介</a>
        </li>
        <li class="c-crumbs__item">
          <span class="c-crumbs__text"><?php the_title(); ?></span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-product-detail">
    <div class="l-container-sm">

      <div class="p-product-detail-gallery js-product-detail-gallery">

        <div class="p-product-detail-gallery__main js-gallery-main">
          <?php
          $main_image_url = $all_image_urls[$main_image_id] ?? '';
          if ($main_image_id && $main_image_url): ?>

            <img
              class="p-product-detail-gallery__image is-active"
              src="<?php echo esc_url($main_image_url); ?>"
              width="484"
              height="324"
              alt="<?php echo esc_attr($post_title); ?>"
              decoding="async" />

          <?php else: ?>
            <p>メイン画像が設定されていません。</p>
          <?php endif; ?>
        </div>

        <div class="p-product-detail-gallery__thumbs">
          <?php
          foreach ($all_thumb_ids as $thumb_id):
            $thumb_url = $all_image_urls[$thumb_id] ?? '';
            $thumb_src = wp_get_attachment_image_url($thumb_id, 'thumbnail');
          ?>
            <div
              class="p-product-detail-gallery__thumb-wrapper"
              data-main-src="<?php echo esc_url($thumb_url); ?>">
              <img
                src="<?php echo esc_url($thumb_src); ?>"
                class="p-product-detail-gallery__thumb"
                decoding="async"
                alt="<?php echo esc_attr($post_title); ?>"
                width="80"
                height="80" />
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <table class="p-product-detail-table" aria-label="製品仕様詳細">

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">製品名</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_name); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">製品コード</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_code); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">材質</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_material); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">サイズ（直径 x 長さ）</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_size); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">ドライブタイプ</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_drive); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">用途</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo nl2br(esc_html($spec_use)); ?></p>
            </div>
          </td>
        </tr>

        <tr class="p-product-detail-table__row">
          <th class="p-product-detail-table__th">パッケージ単位（入数）</th>
          <td class="p-product-detail-table__td">
            <div class="p-product-detail-table__body">
              <p><?php echo esc_html($spec_package); ?></p>
            </div>
          </td>
        </tr>
      </table>

      <div class="p-product-description">
        <?php the_content(); ?>
      </div>

    </div>
  </div>
</main>

<?php get_footer(); ?>
