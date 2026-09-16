<h2 class="features__title features-title">
    グランドールシノハラの特徴
</h2>
<div class="features__wrap">
    <div class="features__box">

        <!-- 特徴1：敷金礼金0＋フリーレント -->
        <div class="features__box-item">
            <picture>
                <source media="(max-width: 767px)"
                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/schedule.svg"
                    type="image/svg+xml">
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/schedule.svg"
                    type="image/svg+xml">
                <img class="features-img"
                    src="<?php echo get_template_directory_uri() ?>/assets/images/schedule.svg"
                    alt="敷金礼金0円＋フリーレント！" width="460" height="300" loading="lazy">
            </picture>
            <div class="features__txt">
                <h3 class="features__box-title">敷金礼金0＋フリーレント！</h3>
                <p class="features__description">
                    敷金・礼金なし＋最初の1ヶ月家賃が無料！まとまった手持ち資金がなくても、すぐに引っ越しをスタートできます。
                </p>
            </div>
        </div>

        <!-- 特徴2：即入居OK！（画像をmovein.svgからshopping.svgへ変更・ALTテキスト修正） -->
        <div class="features__box-item">
            <picture>
                <source media="(max-width: 767px)"
                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/movein.svg"
                    type="image/svg+xml">
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/movein.svg"
                    type="image/svg+xml">
                <img class="features-img"
                    src="<?php echo get_template_directory_uri() ?>/assets/images/movein.svg"
                    alt="審査後、即入居OK！" width="460" height="300" loading="lazy">
            </picture>
            <div class="features__txt">
                <h3 class="features__box-title">即入居OK！</h3>
                <p class="features__description">
                    面倒な手続きもスムーズに。初期費用を抑えつつ、最短距離でスピーディに一人暮らしを開始できます。
                </p>
            </div>
        </div>

        <!-- 特徴3：スーパー・100均至近！（画像をshopping.svgからrenovation.svg/renovation-spへ変更・brタグ除去・ALTテキスト修正） -->
        <div class="features__box-item">
            <picture>
                <source media="(max-width: 767px)"
                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/shopping.svg"
                    type="image/svg+xml">
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/shopping.svg"
                    type="image/svg+xml">
                <img class="features-img"
                    src="<?php echo get_template_directory_uri() ?>/assets/images/shopping.svg"
                    alt="スーパー・100均至近！" width="460" height="300" loading="lazy">
            </picture>
            <div class="features__txt">
                <h3 class="features__box-title">スーパー・100均至近で節約！</h3>
                <p class="features__description">
                    徒歩圏内で買い物が完結。車がなくても生活コストを抑えて、無駄のない暮らしを叶えます。
                </p>
            </div>

        </div>
    </div>
    <div class="features-button">
        <?php echo get_template_part('template-parts/room-feature'); ?>
    </div>
</div>
