<?php get_header(); ?>

<section class="c-page-kv js-scrollTarget">
  <div class="c-page-kv__container l-container-md">
    <div class="c-page-kv__title-wrap">
      <div class="c-page-kv__title">
        <p class="c-page-kv__title-en">COMPANY</p>
        <h1 class="c-page-kv__title-ja">会社概要</h1>
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
          <span class="c-crumbs__text">会社概要</span>
        </li>
      </ol>
    </nav>
  </div>
</div>

<main>
  <div class="p-company">
    <div class="l-container-sm">
      <div class="p-company__image-amount">
        <picture>
          <source
            media="(min-width: 768px)"
            srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/company/image_01_pc.jpg'); ?>" />
          <img
            class="p-company__image"
            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/company/image_01_sp.jpg'); ?>"
            decoding="async"
            alt=""
            width="680"
            height="452" />
        </picture>
      </div>
      <div class="p-company__info">
        <table class="p-company-table" aria-label="製品仕様詳細">
          <tr class="p-company-table__row">
            <th class="p-company-table__th">会社名</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('company_name'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">所在地</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('location'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">代表者</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('representative'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">設立</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('established_date'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">事業内容</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('business_content'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">資本金</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('capital'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">従業員数</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('employee_count'); ?>
              </div>
            </td>
          </tr>
          <tr class="p-company-table__row">
            <th class="p-company-table__th">連絡先</th>
            <td class="p-company-table__td">
              <div class="p-company-table__body">
                <?php the_field('contact_info'); ?>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>