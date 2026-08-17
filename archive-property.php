<?php
/**
 * 物件数が少ない場合に適したリッチなアーカイブテンプレート
 */
get_header();
?>

<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>

  <div class="container">
    <section class="news">
      <!-- タイトル部分 -->
      <h2 class="room-title">
        <?php
        if (is_year()) {
            echo esc_html(get_query_var('year') . '年のお部屋');
        } elseif (is_month()) {
            echo esc_html(get_query_var('year') . '年' . get_query_var('monthnum') . '月のお部屋');
        } elseif (is_day()) {
            echo esc_html(get_query_var('year') . '年' . get_query_var('monthnum') . '月' . get_query_var('day') . '日のお部屋');
        } else {
            echo '現在募集中のお部屋';
        }
        ?>
      </h2>

      <!-- ループ部分 -->
      <ul class="room__list">
        <?php if (have_posts()): ?>
          <?php while (have_posts()): the_post(); ?>
            <?php get_template_part('template-parts/loop-room'); ?>
          <?php endwhile; ?>
        <?php else: ?>
          <p>現在、募集中のお部屋はありません。</p>
        <?php endif; ?>
      </ul>

      <!-- ページネーション部分 -->
      <?php if ($wp_query->max_num_pages > 1): ?>
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
    </section>

    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div> <!-- containerの閉じタグ -->
</main> <!-- mainの閉じタグ -->

<?php get_footer(); ?>
