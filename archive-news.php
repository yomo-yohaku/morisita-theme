<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">NEWS</p>
        <h1 class="c-page-kv__title-ja">お知らせ</h1>
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
          <span class="c-crumbs__text">お知らせ</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<div class="p-news-contents">
  <div class="p-news-container l-container-md">
    <aside class="p-news-menu">
      <div class="p-news-menu__container">
        <h2 class="p-news-menu__title">
          <span class="p-news-menu__title-en">ARCHIVES</span>
          <span class="p-news-menu__title-ja">アーカイブ</span>
        </h2>
        <nav aria-label="目次">
          <ul class="p-news-menu__list">
            <li class="p-news-menu__item p-news-menu__item--all">
              <a class="p-news-menu__link" href="<?php echo esc_url(get_post_type_archive_link('news')); ?>">ALL</a>
            </li>
            <?php
            $years = get_posts(array(
              'post_type' => 'news',
              'numberposts' => -1,
              'post_status' => 'publish',
              'orderby' => 'post_date',
              'order' => 'DESC',
              'fields' => 'post_date'
            ));
            $years_array = array();
            foreach ($years as $post) {
              $year = mysql2date('Y', $post->post_date);
              $years_array[$year] = true;
            }
            $years_array = array_keys($years_array);
            rsort($years_array);
            foreach ($years_array as $year): ?>
              <li class="p-news-menu__item">
                <a class="p-news-menu__link" href="<?php echo esc_url(get_post_type_archive_link('news')) . '?year=' . $year; ?>">
                  <span>
                    <span class="p-news-menu__link-en"><?php echo esc_html($year); ?></span>年
                  </span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </nav>
      </div>
    </aside>

    <main class="p-news">
      <ul class="p-news__list">
        <?php
        $year_query = isset($_GET['year']) && is_numeric($_GET['year']) ? intval($_GET['year']) : null;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 10,
          'paged' => $paged,
        );
        if ($year_query) {
          $args['date_query'] = array(
            array(
              'year' => $year_query,
            )
          );
        }
        $news_query = new WP_Query($args);
        if ($news_query->have_posts()) :
          while ($news_query->have_posts()) : $news_query->the_post();
        ?>
            <li class="p-news__item">
              <article class="p-news__article">
                <a href="<?php the_permalink(); ?>" class="p-news__link">
                  <span class="p-news__date"><?php echo esc_html(get_the_date('Y.m.d')); ?></span>
                  <?php if (get_the_title()): ?>
                    <h3 class="p-news__text"><?php the_title(); ?></h3>
                  <?php endif; ?>
                </a>
              </article>
            </li>
          <?php
          endwhile;
        else:
          ?>
          <li class="p-news__item">
            <article class="p-news__article">
              <span class="p-news__text">現在お知らせはありません。</span>
            </article>
          </li>
        <?php
        endif;
        wp_reset_postdata();
        ?>
      </ul>
      <?php
      // ページネーション
      the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' => __('« 前へ', 'your-theme-textdomain'),
        'next_text' => __('次へ »', 'your-theme-textdomain'),
      ));
      ?>
    </main>
  </div>
</div>

<?php get_footer(); ?>
