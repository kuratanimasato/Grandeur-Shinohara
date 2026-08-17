<?php
get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>

  <div class="container">
    <section class="page-content">
      <p class="page-contact"> 
　物件・周辺環境についてのお問い合わせ・
ご相談・ご質問に関して大家が回答させていただきます。<br>
「空き状況は？」「スーパーは近い？」など、気になることは以下のフォームからお気軽にご相談ください。
 ※内見予約・お急ぎの方は、サクセス不動産へお電話をお願いします。
</p>
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