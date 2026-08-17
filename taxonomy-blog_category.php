<?php
/**
 * The template for displaying blog category archives
 *
 * @package grandeur-shinohara
 */

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="news">
      <div class="blog__wrap">
        <h1 class="blog-title">カテゴリ-：<?php single_term_title(); ?></h1>
      </div>
      <div class="blog-archive">
        <div class="archive-main">
          <ul class="blog__list">
            <!-- メインループ -->
            <?php if (have_posts()): ?>
              <?php while (have_posts()):
                the_post(); ?>
                <?php get_template_part('template-parts/loop-blog'); ?>
              <?php endwhile; ?>
            <?php else: ?>
              <p>現在、このカテゴリーにブログ記事はありません。</p>
            <?php endif; ?>
          </ul>
          <?php if (have_posts() && $wp_query->max_num_pages >= 8): ?>
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
                'prev_text' => ' <i class="fa-solid fa-angles-right fa-lg"></i>',
                'next_text' => '<i class="fa-solid fa-angles-right fa-lg"></i>',
              )
            );
            ?>
          </div>
          <?php endif; ?>
        </div>
        <?php get_sidebar('archives'); ?>
      </div>
    </section>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>
<?php
get_footer();
