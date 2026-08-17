<?php
/*
Template Name: About Page
*/
get_header();
?>

<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
    <section class="profile">
      <h2 class="profile__title"><?php echo strtoupper(get_the_title()) ?></h2>
      <p class="profile__text">
        <?php the_content(); ?>
      </p>
    </section>
    <?php endwhile; ?>
    <?php endif; ?>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>

<?php
get_footer();
