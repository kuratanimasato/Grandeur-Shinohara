<?php
// 公開されている全ての物件（空室）の数を取得
$count_posts = wp_count_posts('property');
$published_posts = intval($count_posts->publish);

if ($published_posts > 0) {
  // アーカイブページへのリンクを取得
  $archive_link = get_post_type_archive_link('property');
  if (!$archive_link) {
      $archive_link = home_url('/property/');
  }
  ?>
  <a href="<?php echo esc_url($archive_link); ?>" class="features__button-link">
    現在募集中のお部屋一覧はこちら

    <!-- 💡 面倒なSVGを、プラグインを活かしてシンプルなアイコンに変更！ -->
    <span class="features-arrow">
      <i class="fas fa-arrow-right"></i>
    </span>
  </a>
  <?php
} else {
  ?>
  <span class="features__button-link" style="background-color: #ccc; cursor: default;">現在満室（募集中の部屋はありません）</span>
  <?php
}
?>
