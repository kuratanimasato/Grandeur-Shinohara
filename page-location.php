<?php
/*
Template Name: Location Page
*/

get_header();
?>
<main class="main">
  <?php get_template_part('template-parts/top-title'); ?>
  <div class="container">
    <?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post();
        ?>
    <section class="access">
      <div class="access-title__wrap">
        <h2 class="access-info"><?php echo strtoupper(get_the_title()); ?></h2>
      </div>
      <div class="location-access">
              <div class="location-access__item">
                <i class="fa-solid fa-location-dot"></i>
                <span class="location-access__text"><?php echo esc_html(get_field('address')); ?></span>
              </div>
              <div class="location-access__item">
                <i class="fa-solid fa-train-subway"></i>
                <span class="location-access__text"><?php echo esc_html(get_field('nearest_station')); ?></span>
              </div>
            </div>
      <div class="gmap-container">
        <div id="gmap">
          <?php echo get_field('google_map_embed'); ?>
        </div>
      </div>
    </section>

    <section class="environment">
      <div class="environment__wrap">
        <h2 class="environment-title">周辺環境</h2>
      </div>
      <div class="environment__list">
        <?php
        $env_types = [
            'supermarket'       => 'スーパーマーケット',
            'convenience_store'  => 'コンビニエンスストア',
            'drugstore'         => 'ドラッグストア',
            'home_center'       => 'ホームセンター',
            'post_office'       => '郵便局'
        ];

        foreach ($env_types as $field_name => $title):
            $content = get_field($field_name);

            if (!empty($content)):
        ?>
           <div class="environment-card">
            <div class="environment-card__body">
              <h3 class="environment-card__title"><?php echo esc_html($title); ?></h3>
              <div class="environment-card__content">
                <?php
                  echo nl2br(esc_html($content));
                ?>
              </div>
            </div>
           </div>
        <?php
            endif;
        endforeach;
        ?>
      </div>
    </section>

    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>

    </div>
    <?php endwhile; ?>
    <?php endif; ?>
</div>
</main>

<?php
get_footer();
