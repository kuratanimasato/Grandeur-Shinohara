<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package grandeur-shinohara
 */

?>

<footer class="footer">

  <div class="footer-btn__wrap">
    <div class="footer-btn" id="page-top">
      <div class="footer__tel">
        <?php get_template_part('template-parts/tel-template'); ?>
        <div class="holidays-sp__title">
          <span>営業時間 平日 9:00～17:00</span>
          <span>定休日 水曜日・祭日</span>
        </div>
      </div>
      <button class="close-btn">&times;</button>
    </div>
  </div>

  <?php
  $privacy_url = get_theme_mod( 'my_footer_privacy_url' );
  if ( ! empty( $privacy_url ) ) :
  ?>
    <div class="footer__links">
      <a href="/privacy/" class="footer__link">
        プライバシーポリシー
      </a>
    </div>
  <?php endif; ?>

  <p class="footer__text">
      &copy;<?php echo date('Y'); ?>
      <?php echo esc_html( get_theme_mod( 'my_footer_copyright', 'グランドール・シノハラⅠ' ) ); ?>
  </p>

</footer>

</div> <?php wp_footer(); ?>
</body>

</html>
