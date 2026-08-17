<?php
get_header();

$post_type = (isset($_GET['post_type']) && $_GET['post_type'] === 'blog') ? 'blog' : 'post';
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="news">
      <!-- タイトルセクション（重複を解消） -->
      <div class="<?php echo $post_type === 'blog' ? 'room__wrap' : 'news__wrap'; ?>">
        <h1 class="<?php echo $post_type === 'blog' ? 'room-title' : 'news-title'; ?>">
          <?php
          $title_prefix = $post_type === 'blog' ? 'ブログ：' : '';

          if (is_day()) {
              echo esc_html($title_prefix . get_query_var('year') . '年' . get_query_var('monthnum') . '月' . get_query_var('day') . '日');
          } elseif (is_month()) {
              echo esc_html($title_prefix . get_query_var('year') . '年' . get_query_var('monthnum') . '月');
          } elseif (is_year()) {
              echo esc_html($title_prefix . get_query_var('year') . '年');
          } else {
              echo esc_html($title_prefix);
              wp_title("");
          }
          ?>
        </h1>
      </div>

      <!-- メインコンテンツとサイドバーの2カラムエリア -->
      <div class="wrapper">
        <div class="archive-main" style="width: 100%;">
          <ul class="<?php echo $post_type === 'blog' ? 'room__list' : 'news__list'; ?>">
            <?php
            $paged    = get_query_var('paged') ? get_query_var('paged') : 1;
            $year     = get_query_var('year');
            $monthnum = get_query_var('monthnum');
            $day      = get_query_var('day');

            $args = array(
              'post_type'      => $post_type,
              'posts_per_page' => 10,
              'paged'          => $paged,
              'year'           => $year,
              'monthnum'       => $monthnum,
              'day'            => $day,
            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()): ?>
              <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                <?php if ($post_type === 'blog'): ?>
                  <?php get_template_part('template-parts/loop-blog'); ?>
                <?php else: ?>
                  <?php get_template_part('template-parts/loop-content'); ?>
                <?php endif; ?>
              <?php endwhile; ?>
            <?php else: ?>
              <p><?php echo $post_type === 'blog' ? 'ブログ記事はありません。' : 'お知らせはありません。'; ?></p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
          </ul>

          <!-- ページネーション -->
          <?php if ($the_query->max_num_pages > 1): ?>
          <div class="pagination">
            <?php
            global $wp_rewrite;
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
                'base'      => $paginate_base,
                'format'    => $paginate_format,
                'total'     => $the_query->max_num_pages,
                'mid_size'  => 3,
                'current'   => $paged,
                'prev_text' => '<i class="fa-solid fa-angles-left fa-lg"></i>',
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
