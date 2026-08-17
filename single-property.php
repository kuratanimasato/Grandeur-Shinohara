<?php

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
  <?php get_template_part('template-parts/exterior-details'); ?>
    <?php get_template_part('template-parts/room-plan'); ?>
    <?php get_template_part('template-parts/property-info'); ?>
    <?php endwhile; ?>
    <?php else: ?>
    <p>現在募集中のお部屋はありません。</p>
    <?php endif; ?>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>
<?php

get_footer();
