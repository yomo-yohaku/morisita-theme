<?php get_header(); ?>

<main id="primary" class="site-main">
  <div class="l-container">

    <?php
    // 固定ページは単一の投稿なので、ループはシンプル
    while (have_posts()) : the_post();
    ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
          <h1 class="entry-title"><?php the_title(); ?></h1>
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
