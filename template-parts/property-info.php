<section class="propertyinfo">
  <div class="rooms-title__wrap">
    <h2 class="property-info">敷金・礼金・物件情報など</h2>
  </div>
  <table class="property-info__table">
    <tr>
      <th class="property-name">種類</th>
      <td><?php echo get_field('kinds_item', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">所在地</th>
      <td><?php echo get_field('location', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">交通</th>
      <td><?php echo get_field('traffic', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">家賃</th>
      <td><?php echo get_field('rent', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">敷金</th>
      <td><?php echo get_field('security_deposit', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">礼金</th>
      <td><?php echo get_field('key_money', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">建物構造</th>
      <td><?php echo get_field('building_structure', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">築年</th>
      <td><?php echo get_field('year_construction', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">専有面積</th>
      <td><?php echo get_field('exclusive_occupied_area', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">間取り詳細</th>
      <td><?php echo get_field('floor-plan_details', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">保証会社</th>
      <td><?php echo get_field('guarantor_company', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">住宅保険</th>
      <td><?php echo get_field('homeowners_insurance', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">駐車場</th>
      <td>
        <?php
        $parking = get_field('parking_lot', get_the_ID());
        if (!empty($parking)) {
          foreach ((array)$parking as $label) {
            echo esc_html($label) . '<br>';
          }
        } else {
          echo '情報がありません';
        }
        ?>
      </td>
    </tr>
    <tr>
      <th class="property-name">駐輪場</th>
      <td>
        <?php
        $bicycleparkinglot = get_field('bicycle_parking_lot', get_the_ID());
        if (!empty($bicycleparkinglot)) {
          foreach ((array)$bicycleparkinglot as $label) {
            echo esc_html($label) . '<br>';
          }
        } else {
          echo '情報がありません';
        }
        ?>
      </td>
    </tr>
    <tr>
      <th class="property-name">入居可能時期</th>
      <td>
        <?php echo get_field('move-in_date', get_the_ID()) ?: '情報がありません'; ?>
      </td>
    </tr>
    <tr>
      <th class="property-name">その他費用</th>
      <td>
        <?php echo get_field('other_expenses', get_the_ID()) ?: '情報がありません'; ?>
      </td>
    </tr>
    <tr>
      <th class="property-name">リノベーション</th>
      <td>
        <?php
        $renovation = get_field('renovation', get_the_ID());
        if (!empty($renovation)) {
          foreach ((array)$renovation as $label) {
            echo esc_html($label) . '<br>';
          }
        } else {
          echo '情報がありません';
        }
        ?>
      </td>
    </tr>
    <tr>
      <th class="property-name">設備</th>
      <td><?php echo get_field('equipment', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
    <tr>
      <th class="property-name">条件等</th>
      <td><?php echo get_field('conditions_etc', get_the_ID()) ?: '情報がありません'; ?></td>
    </tr>
  </table>
  <div class="caution">
    <p><span>※</span>
      <?php echo get_field('attention', get_the_ID()) ?: '情報がありません'; ?>
    </p>
  </div>
</section>
