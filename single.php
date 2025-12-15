<?php get_header(); ?>

<main id="primary" class="site-main">
  <div class="l-container">

    <?php
    while (have_posts()) : the_post();
    ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>

          <div class="entry-meta">
            公開日: <?php the_time(get_option('date_format')); ?>
            <?php the_category(', '); // カテゴリ表示
            ?>
          </div>
        </header>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
      </article>
    <?php
    endwhile; // ループ終了
    ?>

  </div>
</main>

<?php get_footer(); ?>
