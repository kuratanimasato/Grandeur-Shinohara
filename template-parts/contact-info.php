<h2 class="contact-title">お問い合わせ</h2>
<div class="contact-company"><a href="https://www.athome.co.jp/ahst/sakusesu.html" target="_blank"
    rel="noopener noreferrer">
    <?php echo esc_html(get_theme_mod('company_name', 'サクセス不動産')); ?></a></div>
<p class="contact__text">お気軽にお問い合わせください。</p>
<div class="contact__tel">
  <?php if ($phone_number = get_theme_mod('phone_number')): ?>
      <?php $pure_phone_number = str_replace('-', '', $phone_number); ?>

      <a href="tel:<?php echo esc_attr($pure_phone_number); ?>" class="tel-link">
        <i class="fa-solid fa-phone fa-lg tel"></i>
        <span class="tel-text"><?php echo esc_html($phone_number); ?></span>
      </a>
    <?php endif; ?>
</div>
