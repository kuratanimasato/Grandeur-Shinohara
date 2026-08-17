<?php
/**
 * The template for displaying all single blog posts
 *
 * @package grandeur-shinohara
 */
get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <div class="news">
      <div class="wrapper">
        <?php if (have_posts()): ?>
        <?php while (have_posts()):
            the_post(); ?>
        <article <?php post_class('article'); ?>>
          <h2 class="article-ttl"><?php the_title(); ?></h2>
          <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="article-date">
            <?php the_time(get_option('date_format')); ?></time>
          <div>
            <?php the_content(); ?>
          </div>
        </article>
        <?php endwhile; ?>

        <?php endif; ?>
        <?php get_sidebar('archives'); ?>
      </div>
      <div class="pagina">
        <p class="pagena-prew">
          <?php if (get_previous_post_link()): ?>
          <?php previous_post_link('<i class="fa-solid fa-angles-left"></i>%link'); ?>
          <?php else: ?>
          記事がありません
          <?php endif; ?>
        </p>
        <p class="pagena-next">
          <?php if (get_next_post_link()): ?>
          <?php next_post_link('%link <i class="fa-solid fa-angles-right"></i>'); ?>
          <?php else: ?>
          記事がありません
          <?php endif; ?>
        </p>
      </div>
      <a href="<?php echo esc_url(get_post_type_archive_link('blog')); ?>" class="pagena-cat__list">一覧に戻る</a>
    </div>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>
<?php

get_footer();
