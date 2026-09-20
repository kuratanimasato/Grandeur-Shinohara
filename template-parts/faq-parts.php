<?php
$faq_items = array(
  array(
    'question' => '初期費用はどのくらいかかりますか？',
    'answer'   => array(
      '敷金・礼金0円＋フリーレント1ヶ月付きのため、初期費用を大幅に抑えてご入居いただけます。',
      '詳細なお見積もりはサクセス不動産よりご案内いたしますので、まずはお気軽にお問い合わせください。',
    ),
  ),
  array(
    'question' => '内見はいつでも可能ですか？',
    'answer'   => array(
      'はい、現地のご見学や内見のご予約は随時受け付けております。事前にサクセス不動産までご連絡いただけますとスムーズにご案内可能です。',
    ),
  ),
  array(
    'question' => '大家さんに直接ご相談やお問い合わせをすることは可能ですか？',
    'answer'   => array(
      'ご案内や契約手続き、各種ご相談につきましては、すべて仲介のサクセス不動産へ一元化しております。',
      '専門のスタッフが迅速丁寧に対応いたしますので、まずは電話よりお気軽にご連絡ください。',
    ),
  ),
  array(
    'question' => '入居の申し込みや物件に関する問い合わせはどうすればよいですか？',
    'answer'   => array(
      '当物件の入居管理・契約手続き・内見のご案内は、すべて提携不動産会社サクセス不動産へ委託しております。',
      '迅速かつスムーズに対応させていただくため、お電話等はサクセス不動産へ直接ご連絡をお願いいたします。',
    ),
  ),
  array(
    'question' => 'フリーレントについて詳しく教えてください。',
    'answer'   => array(
      '1ヶ月分の家賃が無料となるお得なプランです。',
      '（※1年未満で途中解約される場合は違約金が発生いたします。）',
      '詳細な条件についてはサクセス不動産までお気軽にお問い合わせください。',
    ),
  ),
  array(
    'question' => 'ネット環境や駐車場の空き状況について教えてください。',
    'answer'   => array(
      'インターネット回線につきましては、ご入居者様ご自身での個別の通信契約をお願いしております。',
      '駐車場につきましては建物正面に3台分の駐車スペースをご用意しております。',
      '最新の空き状況につきましてはサクセス不動産までお問い合わせください。',
    ),
  ),
);
?>

<div class="container">
  <div class="faq__wrap">
    <span class="faq__subtitle">FAQ</span>
    <h2 class="faq__title">よくあるご質問</h2>

    <div class="faq__list">
      <?php foreach ( $faq_items as $faq_item ) : ?>
      <div class="faq__item">
        <button class="faq__question" aria-expanded="false" onclick="toggleFaq(this)">
          <span class="faq__q-icon">Q</span>
          <span class="faq__q-text"><?php echo esc_html( $faq_item['question'] ); ?></span>
          <span class="faq__toggle-icon"></span>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">
            <span class="faq__a-icon">A</span>
            <p class="faq__a-text">
              <?php foreach ( $faq_item['answer'] as $answer_index => $answer_line ) : ?>
                <?php echo esc_html( $answer_line ); ?><?php if ( $answer_index < count( $faq_item['answer'] ) - 1 ) : ?><br><?php endif; ?>
              <?php endforeach; ?>
            </p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- SEO（構造化データ） -->
<script type="application/ld+json">
<?php
$faq_schema = array(
  '@context'   => 'https://schema.org',
  '@type'      => 'FAQPage',
  'mainEntity' => array_map(
    static function ( $faq_item ) {
      return array(
        '@type'          => 'Question',
        'name'           => $faq_item['question'],
        'acceptedAnswer' => array(
          '@type' => 'Answer',
          'text'  => implode( ' ', $faq_item['answer'] ),
        ),
      );
    },
    $faq_items
  ),
);
echo wp_json_encode( $faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
?>
</script>
