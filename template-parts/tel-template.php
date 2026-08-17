<?php if ($phone_number = get_theme_mod('phone_number')): ?>
  <?php $pure_phone_number = str_replace('-', '', $phone_number); ?>

  <a href="tel:<?php echo esc_attr($pure_phone_number); ?>" class="front-tel-link">
    <i class="fa-solid fa-phone fa-lg tel"></i>
    <span class="front-tel-text"><?php echo esc_html($phone_number); ?></span>
  </a>
<?php endif; ?>
