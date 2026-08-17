<?php
/**
 * The template for displaying blog archive pages
 *
 * @package grandeur-shinohara
 */

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="blog-archive">
      <div class="blog-title__wrap">
        <h2 class="blog-title">
          <?php
              if (is_month()) {
                  $year  = get_query_var('year');
                  $month = get_query_var('monthnum');
                  echo esc_html($year . '年' . $month . '月');
              } elseif (is_year()) {
                  // 年別アーカイブの場合
                  echo esc_html(get_query_var('year') . '年');
              } elseif (is_tax()) {
                  // カスタムタクソノミー（ブログカテゴリーなど）の場合
                  single_term_title();
              } else {
                  // 通常のブログ一覧（デフォルト）の場合
                  echo 'ブログ記事一覧';
              }
              ?>
        </h2>
      </div>
      <div class="blog-wrapper">
        <ul class="blog__list">
          <!-- メインループ -->
          <?php if (have_posts()): ?>
            <?php while (have_posts()):
              the_post(); ?>
                <?php get_template_part('template-parts/loop-blog'); ?>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="no-posts">現在、ブログ記事はありません。</p>
          <?php endif; ?>
        </ul>

        <?php if ($wp_query->max_num_pages >= 1): ?>
        <div class="pagination">
          <?php
          global $wp_rewrite, $wp_query;
          $paginate_base = get_pagenum_link(1);
          if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
            $paginate_format = '';
            $paginate_base = add_query_arg('paged', '%#%');
          } else {
            $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
              user_trailingslashit('page/%#%/', 'paged');
            $paginate_base .= '%_%';
          }
          echo paginate_links(
            array(
              'base' => $paginate_base,
              'format' => $paginate_format,
              'total' => $wp_query->max_num_pages,
              'mid_size' => 3,
              'current' => (get_query_var('paged') ? get_query_var('paged') : 1),
              'prev_text' => '<i class="fa-solid fa-angles-left fa-lg"></i>',
              'next_text' => '<i class="fa-solid fa-angles-right fa-lg"></i>',
            )
          );
          ?>
        </div>
        <?php endif; ?>
      </div> <!-- wrapperの閉じタグ -->
    </section>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div> <!-- containerの閉じタグ -->
</main> <!-- mainの閉じタグ -->

<?php
get_footer();
