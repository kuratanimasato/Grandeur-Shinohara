<?php
/*
Template Name: Policy Page
*/
get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <section class="policy">
      <?php if (have_posts()): ?>
      <?php while (have_posts()):
          the_post(); ?>
      <?php the_content(); ?>
      <?php endwhile; ?>
      <?php endif; ?>
    </section>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>

<?php
get_footer();