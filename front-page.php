<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package grandeur-shinohara
 */

get_header();
?>
<main class="main">
  <div class="container">
    <div id="wrapper">
      <div class="swiper-wrap">
        <div class="swiper-container-4">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/livingroom.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/livingroom.jpg" alt="リビングルーム"
                    fetchpriority="high">
                </picture>
              </div>
                <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/livingroom2.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/livingroom2.jpg" alt="リビングルーム2"
                    >
                </picture>
              </div>
                <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/outside.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/outside.jpg" alt="外の風景" >
                </picture>
              </div>
                <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
            </div>
            <div class="swiper-slide">
              <div class="slide-img">
                <picture>
                  <source srcset="<?php echo get_template_directory_uri() ?>/images/exterior.webp" type="image/webp">
                  <img src="<?php echo get_template_directory_uri() ?>/images/exterior.jpg" alt="外観">
                </picture>
              </div>
                <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
            </div>
            <div class="slide-copy1">
              <p class="slide-title"><?php echo esc_html(get_theme_mod('slide_title', '群馬県大泉町の広々ワンルーム！！')); ?>
              </p>
              <p class="slide__title-tow"><?php echo esc_html(get_theme_mod('slide_subtitle', '一人暮らしをより豊かに！')); ?>
              </p>
            </div>
            <div class="slide-copy2">
              <div class="copy2"><a href="https://www.athome.co.jp/ahst/sakusesu.html" target="_blank"
                  rel="noopener noreferrer">
                  <?php echo esc_html(get_theme_mod('company_name', 'サクセス不動産')); ?></a>
              </div>
              <p class="copy-text">内見の際はお気軽にお問い合わせください。</p>
              <div class="top-fastview__tel">
                <?php get_template_part('template-parts/tel-template'); ?>
                <div class="hours-holidays">
                  <p class="hours-holidays__title">営業時間:</p>
                  <p class="hours-holidays__text"><?php echo esc_html(get_theme_mod('business_hours_text', '平日 9:00～17:00')); ?></p>
                  <p class="hours-holidays__text"><?php echo esc_html(get_theme_mod('business_holiday_text', '定休日 水曜日、祭日')); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <section class="concept">
        <div class="concept__wrap">
          <div id="concept">
            <h2 class="concept__title  concept-title"><?php echo esc_html(get_theme_mod('concept_title', '広さで選ぶなら、グランドールシノハラ。')); ?></h2>
            <h3 class="concept__subtitle  concept-subtitle"><?php echo esc_html(get_theme_mod('concept_subtitle', '家賃3万円なのに、ゆったり暮らせる。')); ?></h3>
          </div>
         <div class="concept__text">
           <?php
            $concept_text = get_field('concept_text');
             if ( $concept_text ) {
                echo $concept_text;
             } else {
                 // デフォルトテキスト（管理画面で未入力の場合に表示）
                 ?>
                 <p><strong>■ フリーレントで、引越しの出費をぐっと抑えられます。</strong><br>
                 家賃3万円＋最初の家賃が無料だから<br>手持ちが少なくても新生活を始めやすい。<br>
                 浮いたお金で、まず必要な家具や家電を少しずつ揃えられます。</p>
                 <p><strong>■ 思ったより広い。一人で使うには十分な空間</strong><br>
                 リノベーション済みだからきれいで、荷物を置いてもゆとりがある広さです。</p>
                 <p><strong>■ 徒歩圏内で完結！ 車がなくても生活できる立地</strong><br>
                 スーパー・100均・薬局が歩いて行ける距離。余計な交通費がかかりません。</p>
                 <p style="text-align:left; margin-top: 20px;">
                 <strong>＼ ただいま内見予約受付中！ ／</strong><br>
                 即日入居も可能です。お気軽にお問い合わせください。
                 </p>
                 <?php
             }
             ?>
         </div>
          <div class="concept__heading"></div>
          <div class="concept__image-wrap">
		　<figure>
		  <picture>
			<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/housing-sp.webp" type="image/webp">
			<source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/housing-sp.jpeg" type="image/jpeg">
			<source srcset="<?php echo get_template_directory_uri() ?>/images/housing.webp" type="image/webp">
			<img class="concept__picture-1" src="<?php echo get_template_directory_uri() ?>/images/housing.jpeg"
			  alt="住宅街のイメージ" width="600" height="500" loading="lazy">
		  </picture>
		</figure>
          </div>
        </div>
      </section>
      <section class="features">
        <h2 class="features__title features-title">
          グランドールシノハラの特徴
        </h2>
        <div class="features__wrap">
          <div class="features__box">
            <div class="features__box-item">
			 <picture>
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/schedule-sp.webp" type="image/webp">
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/schedule-sp.jpg" type="image/jpeg">
			  <source srcset="<?php echo get_template_directory_uri() ?>/images/schedule.webp" type="image/webp">
			  <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/schedule.jpg"
				alt="即日入居可のイメージ" width="460" height="300" loading="lazy">
			</picture>
              <div class="features__txt">
				  <h3 class="features__title">🚀審査後、即入居OK！<br>お急ぎの方も大歓迎</h3>
               <p class="features__description">
				   即入居OK！最短距離で新生活へ。<br>面倒な手続きもスムーズに、あなたの一人暮らしをスピーディに開始できます。
				  </p>
              </div>
            </div>
            <div class="features__box-item">
			<picture>
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/shopping-sp.webp" type="image/webp">
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/shopping-sp.jpeg" type="image/jpeg">

			  <source srcset="<?php echo get_template_directory_uri() ?>/images/shopping.webp" type="image/webp">
			  <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/shopping.jpeg"
				alt="商業施設のイメージ" width="460" height="300" loading="lazy">
			</picture>
              <div class="features__txt">
				  <h3 class="features__title">🛒 スーパー・100均至近！<br>「賢く節約」が自然に叶う</h3>
  				<p class="features__description">
				  徒歩圏内で買い物が完結。生活コストを抑えて、ワンランク上の暮らしを叶えます。
				  </p>
              </div>
            </div>
            <div class="features__box-item">
				<picture>
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/renovation-sp.webp" type="image/webp">
			  <source media="(max-width: 767px)" srcset="<?php echo get_template_directory_uri() ?>/images/renovation-sp.jpeg" type="image/jpeg">

			  <source srcset="<?php echo get_template_directory_uri() ?>/images/renovation.webp" type="image/webp">
			  <img class="features-img" src="<?php echo get_template_directory_uri() ?>/images/renovation.jpeg"
				alt="リノベーション済みのイメージ" width="460" height="300" loading="lazy">
			</picture>
              <div class="features__txt">
				  <h3 class="features__title">✨ 職住一体を叶える<br>「広々リノベーション」</h3>
				  	<p class="features__description">
				ワンルームの常識を変える広さ。仕事とプライベートを賢く切り分けられます。
				  </p>
              </div>
            </div>
          </div>
          <div class="features-button">
            <?php echo get_template_part('template-parts/room-feature'); ?>
          </div>
        </div>
      </section>
      <section class="information">
        <h2 class="information-title">お知らせ</h2>
        <?php
          $news_query = new WP_Query([
              'post_type'      => 'post',
              'posts_per_page' => 5,
              'orderby'        => 'date',
              'order'          => 'DESC',
              'ignore_sticky_posts' => 1,
          ]);
          ?>
          <?php if ( $news_query->have_posts() ): ?>
              <ul class="information__list">
                  <?php while ( $news_query->have_posts() ): $news_query->the_post(); ?>
                      <li class="information__list__item">
                          <a href="<?php the_permalink(); ?>">
                              <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time>
                              <?php get_template_part('template-parts/badge-parts'); ?>
                              <p><?php the_title(); ?></p>
                              <span class="arrow"></span>
                          </a>
                      </li>
                  <?php endwhile; ?>
              </ul>
          <?php else: ?>
              <p>現在お知らせはありません。</p>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
      </section>
    </div>
    <section class="contact">
      <?php get_template_part('template-parts/contact-info'); ?>
    </section>
  </div>
</main>

<?php
get_footer();
