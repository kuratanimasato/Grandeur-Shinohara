<?php
get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>

  <div class="container">
    <section class="page-content">
      <div class="entry-content">
        <?php if (have_posts()):
          while (have_posts()):
            the_post(); ?>
            <?php the_content(); ?>   <?php endwhile; endif; ?>
      </div>
    </section>
  </div>
</main>

<?php
get_footer();
