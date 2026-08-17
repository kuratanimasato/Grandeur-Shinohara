<li class="news__list__item">
  <a href="<?php the_permalink(); ?>">
    <div class="news__list__date">
      <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
      <p><?php the_title(); ?></p>
      <p><?php the_excerpt(); ?></p>
      <span class="arrow-right"></span>
    </div>
  </a>
</li>