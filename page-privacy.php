<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">PRIVACY</p>
        <h1 class="c-page-kv__title-ja">プライバシーポリシー</h1>
      </div>
    </div>
  </div>
</section>

<div class="p-privacy">
  <div class="l-container-sm">

    <?php the_field('privacy_lead'); ?>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_01'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_01'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_02'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_02'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_03'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_03'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_04'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_04'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_05'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_05'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_06'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_06'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_07'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_07'); ?>
      </div>
    </section>

    <section class="p-privacy__section">
      <h2 class="p-privacy__title"><?php the_field('privacy_title_08'); ?></h2>
      <div class="p-privacy__body">
        <?php the_field('privacy_section_08'); ?>
      </div>
    </section>

  </div>
</div>

<?php get_footer(); ?>
