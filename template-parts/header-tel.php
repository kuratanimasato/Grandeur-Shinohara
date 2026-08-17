
<?php
$phone_number = get_theme_mod('phone_number');
if ($phone_number):
  // 💡 リンク発信用にハイフンなしの数字を作る
  $pure_phone_number = str_replace('-', '', $phone_number);
  ?>
  <div class="header-tel-pc">
    <a href="tel:<?php echo esc_attr($pure_phone_number); ?>" class="header-tel-link">
      <i class="fa-solid fa-phone fa-lg tel"></i>
      <span class="header-tel-text"><?php echo esc_html($phone_number); ?></span>
    </a>
  </div>
<?php endif; ?>
