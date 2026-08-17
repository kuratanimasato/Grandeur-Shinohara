<<<<<<< HEAD
<div class="top-title">
  <div class="top-title__txt">
    <?php
    if (is_page('about')) {
      echo 'オーナー紹介';
    } elseif (is_page('location')) {
      echo 'ロケーション';
    } elseif (is_page('contact')) {
      echo 'お問い合わせ';
    } elseif (is_singular('property')) {
      echo 'お部屋紹介'; // お部屋詳細
    } elseif (is_post_type_archive('property')) {
      echo 'お部屋一覧'; // お部屋一覧
    } elseif (is_page('privacypolicy')) {
      echo 'プライバシーポリシー';
    }
    elseif (is_singular('blog') || get_post_type() === 'blog' || is_post_type_archive('blog') || is_tax('blog_category') || (is_date() && get_post_type() === 'blog')) {
      echo 'ブログ';
    }
    else {
      echo 'お知らせ'; // デフォルト（お知らせの一覧、詳細、お知らせの年別・月別アーカイブなど）
    }
    ?>
  </div>
</div>
<div class="container">
   <?php get_template_part('template-parts/breadcrumb-parts'); ?>
</div>
=======
<?php
get_header();
?>
  <main id="primary" class="site-main">
    <?php if (have_posts()): ?>
      <header class="page-header">
        <?php
        the_archive_title('<h1 class="page-title">', '</h1>');
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
      </header>

      <?php
      while (have_posts()):
        the_post();
        get_template_part('template-parts/content', get_post_type());
      endwhile;
      the_posts_navigation();
    else:
      get_template_part('template-parts/content', 'none');
    endif;
    ?>
  </main>

<?php
get_footer();
