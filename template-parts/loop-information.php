<h2 class="information-title" data-label="NEWS">お知らせ</h2>
 <?php
$news_query = new WP_Query([
'post_type'      => 'post',
'posts_per_page' => 5,
'orderby'        => 'date',
'order'          => 'DESC',
'ignore_sticky_posts' => 1,
]);
?>
 <?php if ( $news_query->have_posts() ): ?>
 <ul class="information__list">
     <?php while ( $news_query->have_posts() ): $news_query->the_post(); ?>
     <li class="information__list__item">
         <a href="<?php the_permalink(); ?>">
             <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
             <?php get_template_part('template-parts/badge-parts'); ?>
             <p><?php the_title(); ?></p>
             <span class="arrow"></span>
         </a>
     </li>
     <?php endwhile; ?>
 </ul>
 <?php else: ?>
 <p>現在お知らせはありません。</p>
 <?php endif; ?>
 <?php wp_reset_postdata(); ?>
