<li id="room-<?php the_ID(); ?>" <?php post_class('room__list__item'); ?>>
  <a href="<?php the_permalink(); ?>">
    <figure class="room-img">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/no-image.svg')); ?>" alt="イメージ画像">
      <?php endif; ?>
    </figure>
  </a>
  <p class="room-tag">
    <?php
    // タームリストを取得
    $terms = get_the_term_list(get_the_ID(), 'property_category', '', ' | ');

    // WP_Error（致命的エラーの原因）でない、かつ空でない場合のみ表示
    if (!is_wp_error($terms) && !empty($terms)) {
        echo $terms;
    } else {
        // エラー時や未設定時のフォールバック（何も出さない場合は空文字でOK）
        echo '物件種別なし';
    }
    ?>
  </p>
</li>
