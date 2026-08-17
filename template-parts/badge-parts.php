<?php
$categories = get_the_category();
$cat_name = !empty($categories) ? $categories[0]->name : 'お知らせ';
$badge_map = [
  '空室情報'    => 'badge--vacancy',
  'オフィス利用' => 'badge--office',
  'お知らせ'    => 'badge--info',
];
$badge_class = $badge_map[$cat_name] ?? 'badge--info';
?>
<span class="badge <?php echo esc_attr($badge_class); ?>">
  <?php echo esc_html($cat_name); ?>
</span>
