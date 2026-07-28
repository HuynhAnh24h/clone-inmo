<?php
/**
 * Template Name: About Page
 */

get_header();

$about_hero_title = get_field('about_hero_title') ?: 'VỀ INMO';
$about_hero_subtitle = get_field('about_hero_subtitle') ?: 'Không Chỉ Là Kính';
$about_intro_heading = get_field('about_intro_heading') ?: 'Giới Thiệu Thương Hiệu';
$about_intro_text = get_field('about_intro_text') ?: 'INMO tập trung vào việc nghiên cứu và phát triển kính thông minh...';
$about_vision_heading = get_field('about_vision_heading') ?: 'TẦM NHÌN INMO';
$about_vision_text = get_field('about_vision_text') ?: 'Trong tương lai gần, thế giới loài người sẽ trở thành một thế giới mới nơi thực và ảo hòa làm một, giống như trong bộ phim "Ready Player One"...';

// HISTORY
$historyData = [];
for($i = 1; $i <= 7; $i++) {
    $d = get_field('history_'.$i.'_date');
    $t = get_field('history_'.$i.'_text');
    if($d || $t) $historyData[] = ['date' => $d, 'text' => $t];
}
if(empty($historyData)) {
    $historyData = [
        [ 'date' => '2021.01', 'text' => 'From Coolpad Group, Yingmu Technology Co., Ltd. was established' ],
        [ 'date' => '2021.05', 'text' => '<b>INMO X</b> series, debut at China Telecom\'s Cloud Network Integration 2.0 launch event' ],
        [ 'date' => '2022.04', 'text' => '<b>INMO AR</b> officially delivered, the earliest mass-produced and delivered wireless all-in-one AR smart glasses' ],
        [ 'date' => '2022.10', 'text' => '<b>INMO AIR2</b> officially launched, the first domestically produced dual-eye full-color all-in-one AR glasses officially launched' ],
        [ 'date' => '2023.04', 'text' => '<b>INMO AIR2</b> officially mass-produced and became the No.1 in sales of the JD XR category' ],
        [ 'date' => '2023.09', 'text' => '<b>INMO GO</b> officially launched, the world\'s first mass-produced wireless AR glasses with access to AIGC' ],
        [ 'date' => '2024.11', 'text' => '<b>INMO AIR3, INMO GO2, INMO X</b> series AI photo glasses released the first batch of blind orders exceeding 10,000 units' ]
    ];
}

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
        [ 'num' => '100+', 'label' => 'AR FIELD TECHNOLOGY PATENTS', 'img' => 'https://placehold.co/300x300/0f1512/2de6a8?text=AR' ],
        [ 'num' => '30+', 'label' => 'PATENTS RELATED TO 5G TECHNOLOGY', 'img' => 'https://placehold.co/300x300/0f1512/6ee7ff?text=5G' ],
        [ 'num' => '20+', 'label' => 'MODEL AND DESIGN PATENTS FOR WEARABLE DEVICES', 'img' => 'https://placehold.co/300x300/0f1512/2de6a8?text=GO' ],
        [ 'num' => '25+', 'label' => 'TECHNOLOGY PATENTS IN THE FIELD OF AI', 'img' => 'https://placehold.co/300x300/0f1512/6ee7ff?text=AI' ]
    ];
}

// AWARDS
$awardsData = [];
for($i = 1; $i <= 4; $i++) {
    $t = get_field('award_'.$i.'_text');
    $img = get_field('award_'.$i.'_img');
    if($t) $awardsData[] = ['text' => $t, 'img' => $img ?: 'https://placehold.co/140x140/0c0e0d/e63946?text=Award'];
}
if(empty($awardsData)) {
    $awardsData = [
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/e63946?text=CMF', 'text' => "2023 International CMF Design Award. The first smart AR glasses to win a grand prize." ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/9d4edd?text=MUSE', 'text' => "MUSE Design Awards in the United States Supreme <b>Award/Platinum Award</b>" ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/2de6a8?text=FBEC', 'text' => "FBEC2023 - Golden Gyroscope Award Annual Outstanding Consumer Hardware Award" ],
        [ 'img' => 'https://placehold.co/140x140/0c0e0d/6ee7ff?text=SIVA', 'text' => "2024 SIVA Awards Best AR <b>hardware Award</b>" ]
    ];
}

// FINANCING (Keep default for now since coords are hard to edit)
$financingData = [
    [ 'round' => '2021 Angel Round', 'desc' => '$9M Valuation 37 Interactive Entertainment, Eagle Investment', 'x' => 6, 'y' => 82 ],
    [ 'round' => '2021 Pre-A Round', 'desc' => '$40M Valuation Matrix Partners', 'x' => 27, 'y' => 68 ],
    [ 'round' => '2022 A Round', 'desc' => '$110M Valuation Chiwei Group', 'x' => 48, 'y' => 50 ],
    [ 'round' => '2024 B Round', 'desc' => 'Over $150M Valuation Chuan Development Group, Chenghua Science and Technology Investment', 'x' => 69, 'y' => 28 ],
    [ 'round' => '2025 B+ Round', 'desc' => 'Over 7 Valuation', 'x' => 92, 'y' => 8 ]
];

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
        [ 'name' => 'INMO AIR', 'desc' => "The world's first mass-produced consumer grade wireless smart glasses", 'date' => '2022 Apr.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR' ],
        [ 'name' => 'INMO AIR2', 'desc' => "The world's first lightweight AR glasses to achieve SLAM + 6DoF spatial interaction", 'date' => '2022 Oct.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR2' ],
        [ 'name' => 'INMO GO', 'desc' => "The world's first mass-produced wireless AR glasses integrated with AIGC", 'date' => '2023 Sep.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO' ],
        [ 'name' => 'INMO AIR3', 'desc' => "The world's first 1080P all-in-one AR glasses", 'date' => '2024 Nov.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR3' ],
        [ 'name' => 'INMO GO2', 'desc' => "The world's first translation glasses equipped with an independent Android system", 'date' => '2024 Nov.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO2' ],
        [ 'name' => 'INMO X', 'desc' => 'AI+Camera Glasses', 'date' => '2024 Nov.', 'img' => 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+X' ]
    ];
}

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

<section class="theme-au-hero animate-fade-in">
  <div class="theme-au-hero__bars" id="heroBars"></div>
  <div class="theme-au-hero__content">
    <h1 class="theme-au-hero__title"><?php echo esc_html($about_hero_title); ?></h1>
    <p class="theme-au-hero__subtitle"><?php echo esc_html($about_hero_subtitle); ?></p>
  </div>
  <img class="theme-au-hero__model" src="https://placehold.co/500x700/0a0a0a/2de6a8?text=Model" alt="INMO model">
</section>
 
<!-- ================= BRAND INTRODUCTION ================= -->
<section class="theme-au-section theme-au-intro animate-slide-up">
  <div class="container">
    <h2 class="theme-au-heading"><?php echo esc_html($about_intro_heading); ?></h2>
    <p>
      <?php echo nl2br(esc_html($about_intro_text)); ?>
    </p>
  </div>
</section>
 
<!-- ================= TECH DIAGRAM ================= -->
<section class="theme-au-section theme-au-theme-section-alt animate-fade-in">
  <div class="container">
    <div class="theme-au-diagram">
      <img src="https://placehold.co/640x420/0c0e0d/2de6a8?text=AI+%2B+AR+Tech+Diagram" alt="AI + AR technology diagram">
      <p class="theme-au-diagram__caption">PIONEER AND LEADER OF WIRELESS AR GLASSES</p>
    </div>
  </div>
</section>
 
<!-- ================= DEVELOPMENT HISTORY ================= -->
<section class="theme-au-section animate-slide-up" id="historySection">
  <div class="container">
    <h2 class="theme-au-heading">Lịch Sử Phát Triển</h2>
    <div class="theme-au-timeline" id="timelineWrap">
      <?php foreach($historyData as $h): ?>
      <div class="theme-au-timeline__item">
          <div class="theme-au-timeline__text"><?php echo wp_kses_post($h['text']); ?></div>
          <div class="theme-au-timeline__date"><?php echo esc_html($h['date']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= PATENTS ================= -->
<section class="theme-au-section theme-au-theme-section-alt animate-fade-in">
  <div class="container">
    <h2 class="theme-au-heading">Bằng Sáng Chế</h2>
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
 
<!-- ================= INDUSTRY AWARDS ================= -->
<section class="theme-au-section animate-slide-up">
  <div class="container">
    <h2 class="theme-au-heading">Giải Thưởng Ngành</h2>
    <div class="row g-4" id="awardsWrap">
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
</section>
 
<!-- ================= FINANCING HISTORY ================= -->
<section class="theme-au-section theme-au-theme-section-alt animate-fade-in">
  <div class="container">
    <h2 class="theme-au-heading">Lịch Sử Gọi Vốn</h2>
    <div class="theme-au-financing" id="financingWrap">
      <?php
      $svgPoints = [];
      $circles = '';
      foreach($financingData as $p) {
          $svgPoints[] = $p['x'] . ',' . $p['y'];
          $circles .= '<circle cx="' . $p['x'] . '" cy="' . $p['y'] . '" r="1.4" fill="#2de6a8"/>';
      }
      $pointsString = implode(' ', $svgPoints);
      ?>
      <svg viewBox="0 0 100 90" preserveAspectRatio="none">
          <polyline points="<?php echo esc_attr($pointsString); ?>" fill="none" stroke="#2de6a8" stroke-width="0.6" vector-effect="non-scaling-stroke"/>
          <?php echo $circles; ?>
      </svg>
      <?php foreach($financingData as $p): ?>
      <div class="theme-au-financing__point" style="left: <?php echo esc_attr($p['x']); ?>%; top: <?php echo esc_attr($p['y'] - 14); ?>%;">
          <div class="theme-au-financing__round"><?php echo esc_html($p['round']); ?></div>
          <div class="theme-au-financing__desc"><?php echo esc_html($p['desc']); ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
 
<!-- ================= OUR PRODUCTS ================= -->
<section class="theme-au-section animate-slide-up">
  <div class="container">
    <h2 class="theme-au-heading">Sản Phẩm Của Chúng Tôi</h2>
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
 
<!-- ================= GLOBAL LAYOUT ================= -->
<section class="theme-au-section theme-au-theme-section-alt animate-fade-in">
  <div class="container">
    <h2 class="theme-au-heading">Mạng Lưới Toàn Cầu</h2>
    <div class="theme-au-map">
      <img src="https://placehold.co/900x420/0c0e0d/1a2420?text=World+Map" alt="World map">
      <div id="pinsWrap">
        <?php foreach($pinsData as $pin): ?>
        <span class="theme-au-map__pin" style="left: <?php echo esc_attr($pin['x']); ?>%; top: <?php echo esc_attr($pin['y']); ?>%; background: <?php echo esc_attr($pin['color']); ?>;">
            <?php echo esc_html($pin['city']); ?>
        </span>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="theme-au-map-caption">
      <p>Đã có mặt tại hơn 50 thành phố với các cửa hàng ngoại tuyến trên toàn thế giới</p>
      <p>Bao gồm các cửa hàng lớn như Tsutaya Electronics tại Nhật Bản, Cửa hàng trải nghiệm JD Super, JD Home...</p>
    </div>
  </div>
</section>
 
<!-- ================= BRAND VISION ================= -->
<section class="theme-au-section theme-au-vision animate-slide-up">
  <div class="theme-au-vision__bg-text">BRAND</div>
  <div class="container">
    <div class="theme-au-vision__inner">
      <div class="theme-au-vision__text">
        <p class="theme-au-eyebrow"><?php echo esc_html($about_vision_heading); ?></p>
        <p>
          <?php echo nl2br(esc_html($about_vision_text)); ?>
        </p>
        <p class="theme-highlight">Bạn nên là — Một Nhà Sáng Tạo!</p>
        <p style="color:#fff;font-size:1rem;">
          Hãy biến thế giới xung quanh thành sân chơi riêng của bạn!
        </p>
      </div>
      <div class="theme-au-vision__image">
        <img src="https://placehold.co/480x600/06100c/2de6a8?text=CREATOR" alt="INMO vision astronaut">
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
