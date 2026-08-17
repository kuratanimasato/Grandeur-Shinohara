<section class="roomplan">
  <div class="rooms-title__wrap">
    <h2 class="room-plan">間取り</h2>
  </div>
  <div class="room-plan__unit">
    <p><?php echo get_field('room_title') ?: '情報がありません'; ?></p>
    <p><?php echo get_field('room_area') ?: '情報がありません'; ?></p>
  </div>

  <?php
  $image = get_field('room_image');
  if ($image): ?>
    <img src="<?php echo esc_url($image['url']); ?>"
         alt="<?php echo esc_attr($image['alt']); ?>">
  <?php else: ?>
    <p>情報がありません</p>
  <?php endif; ?>
</section>
