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
                                    <source
                                        srcset="<?php echo get_template_directory_uri() ?>/assets/images/livingroom.webp"
                                        type="image/webp">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/livingroom.jpg"
                                        alt="リビングルーム" fetchpriority="high">
                                </picture>
                            </div>
                            <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-img">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri() ?>/assets/images/livingroom2.webp"
                                        type="image/webp">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/livingroom2.jpg"
                                        alt="リビングルーム2">
                                </picture>
                            </div>
                            <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-img">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri() ?>/assets/images/outside.webp"
                                        type="image/webp">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/outside.jpg"
                                        alt="外の風景">
                                </picture>
                            </div>
                            <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
                        </div>
                        <div class="swiper-slide">
                            <div class="slide-img">
                                <picture>
                                    <source
                                        srcset="<?php echo get_template_directory_uri() ?>/assets/images/exterior.webp"
                                        type="image/webp">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/exterior.jpg"
                                        alt="外観">
                                </picture>
                            </div>
                            <p class="fv-caption">※画像は当物件の代表的なお部屋（一例）です。実際のお部屋とは間取りや内装が一部異なる場合があります。</p>
                        </div>
                        <div class="slide-copy1">
                            <p class="slide-title">
                                <?php echo esc_html(get_theme_mod('slide_title', '群馬県大泉町の広々ワンルーム！！')); ?>
                            </p>
                            <p class="slide__title-tow">
                                <?php echo esc_html(get_theme_mod('slide_subtitle', '一人暮らしをより豊かに！')); ?>
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
                                    <p class="hours-holidays__text">
                                        <?php echo esc_html(get_theme_mod('business_hours_text', '平日 9:00～17:00')); ?>
                                    </p>
                                    <p class="hours-holidays__text">
                                        <?php echo esc_html(get_theme_mod('business_holiday_text', '定休日 水曜日、祭日')); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="concept">
                <div class="concept__wrap">
                    <div id="concept">
                        <h2 class="concept__title  concept-title">
                            <?php echo esc_html(get_theme_mod('concept_title', '広さで選ぶなら、グランドールシノハラ。')); ?></h2>
                        <h3 class="concept__subtitle  concept-subtitle">
                            <?php echo esc_html(get_theme_mod('concept_subtitle', '家賃3万円なのに、ゆったり暮らせる。')); ?></h3>
                    </div>
                    <div class="concept__text">
                        <?php
                    $concept_text = get_field('concept_text');
                    if ( $concept_text ) {
                        echo $concept_text;
                    } else {
                        // デフォルトテキスト（管理画面で未入力の場合に表示）
                        ?>
                                <?php
                    }
                    ?>
                    </div>
                    <div class="concept__heading"></div>
                    <div class="concept__image-wrap">
                        　<figure>
                            <picture>
                                <source media="(max-width: 767px)"
                                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/housing-sp.webp"
                                    type="image/webp">
                                <source media="(max-width: 767px)"
                                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/housing-sp.jpeg"
                                    type="image/jpeg">
                                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/housing.webp"
                                    type="image/webp">
                                <img class="concept__picture-1"
                                    src="<?php echo get_template_directory_uri() ?>/assets/images/housing.jpeg"
                                    alt="住宅街のイメージ" width="600" height="500" loading="lazy">
                            </picture>
                        </figure>
                    </div>
                </div>
            </section>
            <section class="features">
                        <?php  echo get_template_part('template-parts/loop-features');?>
                    <div class="features-button">
                        <?php echo get_template_part('template-parts/room-feature'); ?>
                    </div>
                </div>
            </section>
            <section class="information">
                <?php get_template_part('template-parts/loop-information'); ?>
            </section>
        </div>
        <!-- Q&Aセクション -->
        <section class="faq">
            <?php get_template_part('template-parts/faq-parts'); ?>
        </section>
        <section class="contact">
            <?php get_template_part('template-parts/contact-info'); ?>
        </section>
    </div>
</main>

<?php
get_footer();
