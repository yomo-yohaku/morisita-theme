<?php get_header(); ?>

<main id="primary" class="site-main">
  <div class="l-container">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <header class="entry-header">
            <h2 class="entry-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="entry-meta">
              公開日: <?php the_time(get_option('date_format')); ?>
            </div>
          </header>
          <div class="entry-summary">
            <?php the_excerpt(); ?>
          </div>
        </article>
      <?php endwhile; ?>

      <nav class="pagination">
        <?php
        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => __('&laquo; 前へ'),
          'next_text' => __('次へ &raquo;'),
        ));
        ?>
      </nav>
    <?php else : ?>
      <p>投稿が見つかりませんでした。</p>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
