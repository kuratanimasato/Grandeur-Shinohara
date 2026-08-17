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
      echo 'お知らせ';
    }
    ?>
  </div>
</div>
<div class="container">
   <?php get_template_part('template-parts/breadcrumb-parts'); ?>
</div>
