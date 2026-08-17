<?php
/**
 * Template part for displaying blog posts in a grid layout
 *
 * @package grandeur-shinohara
 */
?>
<li id="blog-<?php the_ID(); ?>"<?php post_class('blog__item'); ?> >
  <a href="<?php the_permalink(); ?>" class="blog__link-thumb">
    <figure class="blog__img">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/no-image.svg')); ?>" alt="イメージ画像">
      <?php endif; ?>
    </figure>
  </a>

  <div class="blog__content">
    <div class="blog__meta-top">
      <!-- 投稿日を表示 -->
      <time class="blog-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
        <?php echo esc_html(get_the_date()); ?>
      </time>
    </div>

    <!-- 記事タイトル -->
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  </div>
