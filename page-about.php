<?php
/**
 * Template Name: About Page
 */

get_header();

$about_hero_title = get_field('about_hero_title') ?: 'VỀ INMO';
$about_hero_subtitle = get_field('about_hero_subtitle') ?: 'Không chỉ là một chiếc kính';
$about_intro_heading = get_field('about_intro_heading') ?: 'GIỚI THIỆU THƯƠNG HIỆU';
$about_intro_text = get_field('about_intro_text') ?: 'INMO tập trung nghiên cứu và phát triển kính thông minh, tự hào là thương hiệu đầu tiên tích hợp công nghệ <b>AR (Thực tế tăng cường)</b> vào <b>kính thông minh không dây</b>. Với vai trò tiên phong, INMO cam kết kiến tạo phong cách sống mới cho <b>Metaverse (Vũ trụ ảo)</b>, phá vỡ mọi giới hạn về không gian và thời gian, trao quyền cho mỗi cá nhân khả năng cảm nhận thế giới và khám phá tương lai.';
$about_vision_heading = get_field('about_vision_heading') ?: 'TẦM NHÌN THƯƠNG HIỆU';
$about_vision_highlight = get_field('about_vision_highlight') ?: 'Bạn sinh ra để trở thành — Một Nhà Sáng Tạo!';
$about_vision_text = get_field('about_vision_text') ?: 'Chúng tôi tin rằng, bất kể bạn là ai hay đến từ đâu, bạn đều có thể bứt phá mọi giới hạn nhờ công nghệ AR. INMO mời bạn cùng đồng hành và tái định nghĩa cách chúng ta nhìn nhận thế giới.';

$diagram_image = get_field('diagram_image') ?: 'https://placehold.co/640x420/0c0e0d/2de6a8?text=AI+%2B+AR+Tech+Diagram';
$diagram_caption = get_field('diagram_caption') ?: 'NHÀ TIÊN PHONG VÀ DẪN ĐẦU VỀ KÍNH AR KHÔNG DÂY';

$history_heading = get_field('history_heading') ?: 'LỊCH SỬ PHÁT TRIỂN';
// HISTORY
$historyData = [];
for($i = 1; $i <= 7; $i++) {
    $d = get_field('history_'.$i.'_date');
    $t = get_field('history_'.$i.'_text');
    if($d || $t) $historyData[] = ['date' => $d, 'text' => $t];
}
if(empty($historyData)) {
    $historyData = [
        [ 'date' => '2021.01', 'text' => 'Công ty TNHH Công nghệ Yingmu được thành lập, tách ra từ Tập đoàn Coolpad.' ],
        [ 'date' => '2021.05', 'text' => 'Kính AR 5G All-in-one đầu tiên, <b>dòng INMO X</b>, ra mắt tại sự kiện Cloud Network Integration 2.0 của China Telecom.' ],
        [ 'date' => '2022.04', 'text' => '<b>INMO AR</b> chính thức được giao hàng, mẫu kính thông minh AR không dây All-in-one được sản xuất và giao hàng sớm nhất.' ],
        [ 'date' => '2022.10', 'text' => '<b>INMO AIR2</b> chính thức ra mắt, mẫu kính AR All-in-one hiển thị đầy đủ màu sắc hai mắt đầu tiên được sản xuất nội địa.' ],
        [ 'date' => '2023.04', 'text' => '<b>INMO AIR2</b> chính thức được sản xuất hàng loạt và vươn lên top 1 doanh số bán hàng trong danh mục XR trên nền tảng JD.' ],
        [ 'date' => '2023.09', 'text' => '<b>INMO GO</b> chính thức ra mắt, kính AR không dây đầu tiên trên thế giới tích hợp AIGC được sản xuất hàng loạt.' ],
        [ 'date' => '2024.11', 'text' => '<b>INMO AIR3, INMO GO2,</b> và dòng kính chụp ảnh AI <b>INMO X</b> phát hành đợt đặt hàng trước vượt mốc 10.000 đơn vị.' ]
    ];
}
$history_xs = [10, 24, 38, 52, 66, 80, 90]; // Fixed layout coords

$patents_heading = get_field('patents_heading') ?: 'BẰNG SÁNG CHẾ';
// PATENTS
$patentsData = [];
for($i = 1; $i <= 4; $i++) {
    $n = get_field('patent_'.$i.'_num');
    $l = get_field('patent_'.$i.'_label');
    $img = get_field('patent_'.$i.'_img');
    if($n || $l) $patentsData[] = ['num' => $n, 'label' => $l, 'img' => $img ?: 'https://placehold.co/300x300/0f1512/2de6a8?text=Patent'];
}
if(empty($patentsData)) {
    $patentsData = [
        [ 'num' => '100+', 'label' => 'SÁNG CHẾ CÔNG NGHỆ LĨNH VỰC AR', 'img' => 'https://placehold.co/300x300/0f1512/2de6a8?text=AR' ],
        [ 'num' => '30+', 'label' => 'SÁNG CHẾ LIÊN QUAN ĐẾN CÔNG NGHỆ 5G', 'img' => 'https://placehold.co/300x300/0f1512/6ee7ff?text=5G' ],
        [ 'num' => '20+', 'label' => 'SÁNG CHẾ KIỂU DÁNG CHO THIẾT BỊ ĐEO', 'img' => 'https://placehold.co/300x300/0f1512/2de6a8?text=GO' ],
        [ 'num' => '25+', 'label' => 'SÁNG CHẾ CÔNG NGHỆ LĨNH VỰC AI', 'img' => 'https://placehold.co/300x300/0f1512/6ee7ff?text=AI' ]
    ];
}

$awards_heading = get_field('awards_heading') ?: 'GIẢI THƯỞNG NGÀNH';
// AWARDS
$awardsData = [];
for($i = 1; $i <= 4; $i++) {
    $t = get_field('award_'.$i.'_text');
    $img = get_field('award_'.$i.'_img');
    if($t) $awardsData[] = ['text' => $t, 'img' => $img ?: 'https://placehold.co/140x140/0c0e0d/e63946?text=Award'];
}
if(empty($awardsData)) {
    $awardsData = [
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/e63946?text=CMF', 'text' => "Giải thưởng Thiết kế CMF Quốc tế 2023. Kính AR thông minh đầu tiên đạt giải thưởng lớn." ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/9d4edd?text=MUSE', 'text' => "Giải thưởng Thiết kế MUSE tại Hoa Kỳ: <b>Giải Thượng hạng / Giải Bạch kim</b>" ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/2de6a8?text=FBEC', 'text' => "FBEC 2023 - Giải thưởng Phần cứng Tiêu dùng Xuất sắc của Năm (Golden Gyroscope)" ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/6ee7ff?text=SIVA', 'text' => "Giải thưởng SIVA 2024: <b>Phần cứng AR xuất sắc nhất</b>" ]
    ];
}

$financing_heading = get_field('financing_heading') ?: 'CỘT MỐC GỌI VỐN';
// FINANCING 
$financingData = [];
for($i = 1; $i <= 5; $i++) {
    $round = get_field('financing_'.$i.'_round');
    $desc = get_field('financing_'.$i.'_desc');
    if($round || $desc) $financingData[] = ['round' => $round, 'desc' => $desc];
}
if(empty($financingData)) {
    $financingData = [
        [ 'round' => '2021 Vòng Thiên Thần', 'desc' => 'Định giá 9 Triệu USD. Đầu tư bởi 37 Interactive Entertainment, Eagle Investment' ],
        [ 'round' => '2021 Vòng Tiền A (Pre-A)', 'desc' => 'Định giá 40 Triệu USD. Đầu tư bởi Matrix Partners' ],
        [ 'round' => '2022 Vòng A', 'desc' => 'Định giá 110 Triệu USD. Đầu tư bởi Chiwei Group' ],
        [ 'round' => '2024 Vòng B', 'desc' => 'Định giá hơn 150 Triệu USD. Đầu tư bởi Chuan Development Group, Chenghua Science and Technology Investment' ],
        [ 'round' => '2025 Vòng B+', 'desc' => 'Định giá hơn 700 Triệu USD.' ]
    ];
}
$financing_coords = [
    ['x' => 12, 'y' => 87, 'h' => 120], 
    ['x' => 30, 'y' => 78, 'h' => 150], 
    ['x' => 50, 'y' => 65, 'h' => 180], 
    ['x' => 70, 'y' => 50, 'h' => 210], 
    ['x' => 90, 'y' => 32, 'h' => 140]
];

$products_heading = get_field('products_heading') ?: 'SẢN PHẨM CỦA CHÚNG TÔI';
// PRODUCTS
$productsData = [];
for($i = 1; $i <= 6; $i++) {
    $n = get_field('product_'.$i.'_name');
    $d = get_field('product_'.$i.'_desc');
    $dt = get_field('product_'.$i.'_date');
    $img = get_field('product_'.$i.'_img');
    if($n) $productsData[] = ['name' => $n, 'desc' => $d, 'date' => $dt, 'img' => $img ?: 'https://placehold.co/300x375/0f1512/ffffff?text=Product'];
}
if(empty($productsData)) {
    $productsData = [
        [ 'name' => 'INMO AIR', 'desc' => "Kính thông minh không dây dành cho người dùng phổ thông đầu tiên trên thế giới được sản xuất hàng loạt", 'date' => 'Tháng 4/2022', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR' ],
        [ 'name' => 'INMO AIR2', 'desc' => "Kính AR siêu nhẹ đầu tiên trên thế giới tích hợp định vị SLAM + tương tác không gian 6DoF", 'date' => 'Tháng 10/2022', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR2' ],
        [ 'name' => 'INMO GO', 'desc' => "Kính AR không dây đầu tiên trên thế giới tích hợp công nghệ trí tuệ nhân tạo tạo sinh (AIGC)", 'date' => 'Tháng 9/2023', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO' ],
        [ 'name' => 'INMO AIR3', 'desc' => "Kính AR All-in-one độ phân giải 1080P đầu tiên trên thế giới", 'date' => 'Tháng 11/2024', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR3' ],
        [ 'name' => 'INMO GO2', 'desc' => "Kính dịch thuật đầu tiên trên thế giới được trang bị hệ điều hành Android độc lập", 'date' => 'Tháng 11/2024', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO2' ],
        [ 'name' => 'INMO X', 'desc' => 'Kính thông minh AI + Camera', 'date' => 'Tháng 11/2024', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+X' ]
    ];
}

$map_heading = get_field('map_heading') ?: 'Hiện diện tại hơn 50 thành phố trên toàn thế giới';
$map_subheading = get_field('map_subheading') ?: 'Hơn 200 điểm phân phối vật lý trên toàn cầu';
$pinsData = [
    [ 'city' => 'New York', 'x' => 22, 'y' => 46, 'color' => '#ff6b81' ],
    [ 'city' => 'London', 'x' => 45, 'y' => 42, 'color' => '#ff8fa3' ],
    [ 'city' => 'Berlin', 'x' => 50, 'y' => 38, 'color' => '#4dd0e1' ],
    [ 'city' => 'Moscow', 'x' => 56, 'y' => 30, 'color' => '#4dabf7' ],
    [ 'city' => 'Seoul', 'x' => 80, 'y' => 42, 'color' => '#ff8fa3' ],
    [ 'city' => 'Tokyo', 'x' => 85, 'y' => 46, 'color' => '#63e6be' ],
    [ 'city' => 'Hong Kong', 'x' => 76, 'y' => 54, 'color' => '#ff8fa3' ],
    [ 'city' => 'Taiwan', 'x' => 78, 'y' => 58, 'color' => '#ffa94d' ]
];
?>

<section class="theme-au-hero">
  <div class="theme-au-hero__bars" id="heroBars"></div>
  <div class="container position-relative h-100 d-flex align-items-center animate-fade-in">
      <div class="theme-au-hero__content">
        <h1 class="theme-au-hero__title"><?php echo wp_kses_post($about_hero_title); ?></h1>
        <p class="theme-au-hero__subtitle"><?php echo wp_kses_post($about_hero_subtitle); ?></p>
      </div>
      <img class="theme-au-hero__model" src="https://placehold.co/500x700/000000/2de6a8?text=Model" alt="INMO model">
  </div>
</section>
 
<!-- ================= BRAND INTRODUCTION ================= -->
<section class="theme-au-section theme-au-intro">
  <div class="container animate-slide-up">
    <h2 class="theme-au-heading"><?php echo wp_kses_post($about_intro_heading); ?></h2>
    <p>
      <?php echo wp_kses_post(nl2br($about_intro_text)); ?>
    </p>
  </div>
</section>
 
<!-- ================= TECH DIAGRAM ================= -->
<section class="theme-au-section theme-au-theme-section-alt">
  <div class="container animate-fade-in">
    <div class="theme-au-diagram">
      <img src="<?php echo esc_url($diagram_image); ?>" alt="AI + AR technology diagram">
      <p class="theme-au-diagram__caption"><?php echo wp_kses_post($diagram_caption); ?></p>
    </div>
  </div>
</section>
 
<!-- ================= DEVELOPMENT HISTORY ================= -->
<section class="theme-au-section" id="historySection" style="padding-top: 20px;">
  <div class="container animate-slide-up">
    <h2 class="theme-au-heading theme-au-heading--history"><?php echo wp_kses_post($history_heading); ?></h2>
    <div class="theme-au-timeline-cluster" id="timelineWrap">
      <div class="theme-au-timeline-cluster__bg"></div>
      <div class="theme-au-timeline-cluster__line"></div>
      <?php foreach($historyData as $idx => $h): ?>
      <div class="theme-au-timeline-item <?php echo $idx % 2 == 0 ? 'item-bottom' : 'item-top'; ?>" style="left: <?php echo esc_attr($h['x'] ?? ($history_xs[$idx] ?? 50)); ?>%;">
          <div class="timeline-dot"></div>
          <div class="timeline-date"><?php echo esc_html($h['date']); ?></div>
          <div class="timeline-connector"></div>
          <div class="timeline-text"><?php echo wp_kses_post($h['text']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= PATENTS ================= -->
<section class="theme-au-section theme-au-theme-section-alt">
  <div class="container animate-fade-in">
    <h2 class="theme-au-heading"><?php echo wp_kses_post($patents_heading); ?></h2>
    <div class="row g-4" id="patentsWrap">
      <?php foreach($patentsData as $p): ?>
      <div class="col-6 col-md-3">
          <div class="theme-au-patent">
              <div class="theme-au-patent__media">
                  <img src="<?php echo esc_url($p['img']); ?>" alt="<?php echo esc_attr($p['label']); ?>">
              </div>
              <div class="theme-au-patent__num"><?php echo esc_html($p['num']); ?></div>
              <div class="theme-au-patent__label"><?php echo esc_html($p['label']); ?></div>
          </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= AWARDS ================= -->
<section class="theme-au-section">
  <div class="container animate-slide-up">
    <h2 class="theme-au-heading"><?php echo wp_kses_post($awards_heading); ?></h2>
    <div class="theme-au-awards-wreath">
        <div class="row g-4 justify-content-center" id="awardsWrap">
          <?php foreach($awardsData as $a): ?>
          <div class="col-6 col-md-3">
              <div class="theme-au-award">
                  <div class="theme-au-award__media">
                      <img src="<?php echo esc_url($a['img']); ?>" alt="award">
                  </div>
                  <div class="theme-au-award__text"><?php echo wp_kses_post($a['text']); ?></div>
              </div>
          </div>
          <?php endforeach; ?>
        </div>
    </div>
  </div>
</section>
 
<!-- ================= FINANCING ================= -->
<section class="theme-au-section theme-au-theme-section-alt">
  <div class="container animate-fade-in">
    <h2 class="theme-au-heading"><?php echo wp_kses_post($financing_heading); ?></h2>
    <div class="theme-au-financing" id="financingWrap">
      <svg viewBox="0 0 1000 500" preserveAspectRatio="none">
        <!-- Smooth upward curve via calculated points -->
        <polyline points="0,460 120,435 300,390 500,325 700,250 900,160 1000,105" fill="none" stroke="#2de6a8" stroke-width="2" />
      </svg>
      <?php foreach($financingData as $idx => $f): 
          $cx = $financing_coords[$idx]['x'] ?? 50;
          $cy = $financing_coords[$idx]['y'] ?? 50;
          $ch = $financing_coords[$idx]['h'] ?? 50;
      ?>
      <div class="theme-au-financing__point" style="left: <?php echo esc_attr($cx); ?>%; top: <?php echo esc_attr($cy); ?>%;">
          <div class="financing-ring"></div>
          <div class="financing-vline" style="height: <?php echo esc_attr($ch); ?>px; top: -<?php echo esc_attr($ch); ?>px;"></div>
          <div class="financing-content" style="top: -<?php echo esc_attr($ch); ?>px;">
             <div class="financing-dot"></div>
             <div class="financing-text">
                 <div class="theme-au-financing__round"><?php echo esc_html($f['round']); ?></div>
                 <div class="theme-au-financing__desc"><?php echo esc_html($f['desc']); ?></div>
             </div>
          </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= PRODUCTS ================= -->
<section class="theme-au-section">
  <div class="container animate-slide-up">
    <h2 class="theme-au-heading"><?php echo wp_kses_post($products_heading); ?></h2>
    <div class="row g-4" id="productsWrap">
      <?php foreach($productsData as $p): ?>
      <div class="col-6 col-md-4">
          <div class="theme-au-product">
              <div class="theme-au-product__media">
                  <img src="<?php echo esc_url($p['img']); ?>" alt="<?php echo esc_attr($p['name']); ?>">
              </div>
              <div class="theme-au-product__name"><?php echo esc_html($p['name']); ?></div>
              <div class="theme-au-product__desc"><?php echo esc_html($p['desc']); ?></div>
              <div class="theme-au-product__date"><?php echo esc_html($p['date']); ?></div>
          </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= GLOBAL MAP ================= -->
<section class="theme-au-section theme-au-theme-section-alt">
  <div class="container animate-fade-in">
    <div class="theme-au-map">
      <img src="https://placehold.co/900x500/0c0e0d/222222?text=Global+Map" alt="Global map">
      <?php foreach($pinsData as $pin): ?>
      <div class="theme-au-map__pin" style="left: <?php echo esc_attr($pin['x']); ?>%; top: <?php echo esc_attr($pin['y']); ?>%;">
        <span style="display:inline-block; width:8px; height:8px; border-radius:50%; background:<?php echo esc_attr($pin['color']); ?>; margin-right:4px;"></span>
        <?php echo esc_html($pin['city']); ?>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="theme-au-map-caption">
      <p><?php echo wp_kses_post($map_heading); ?></p>
      <p><?php echo wp_kses_post($map_subheading); ?></p>
    </div>
  </div>
</section>
 
<!-- ================= VISION ================= -->
<section class="theme-au-section theme-au-vision">
  <div class="theme-au-vision__bg-text"><?php echo esc_html($about_vision_heading); ?></div>
  <div class="container animate-slide-up">
    <div class="theme-au-vision__inner">
      <div class="theme-au-vision__text">
        <div class="theme-au-eyebrow">VISION</div>
        <p class="theme-highlight"><?php echo wp_kses_post($about_vision_highlight); ?></p>
        <p><?php echo wp_kses_post($about_vision_text); ?></p>
      </div>
      <div class="theme-au-vision__image">
        <img src="https://placehold.co/480x600/06100c/2de6a8?text=CREATOR" alt="INMO vision astronaut">
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
