<?php
/**
 * Template Name: About Page
 */

get_header();
?>

<section class="au-hero animate-fade-in">
  <div class="au-hero__bars" id="heroBars"></div>
  <div class="au-hero__content">
    <h1 class="au-hero__title">ABOUT INMO</h1>
    <p class="au-hero__subtitle">Never Just Glasses</p>
  </div>
  <img class="au-hero__model" src="https://placehold.co/500x700/0a0a0a/2de6a8?text=Model" alt="INMO model">
</section>
 
<!-- ================= BRAND INTRODUCTION ================= -->
<section class="au-section au-intro animate-slide-up">
  <div class="container">
    <h2 class="au-heading">Brand Introduction</h2>
    <p>
      INMO focuses on the research and development of smart glasses, being a pioneer in wireless AR glasses and AI smart glasses,
      as well as a leading company in the global smart glasses category. INMO's self-developed AR glasses include the
      <b>INMO AIR series</b>, which focuses on light office and audio-visual entertainment scenarios, the <b>INMO GO series</b>,
      which focuses on translation scenarios, and the <b>INMO X series</b>, which focuses on photography scenarios.
      All three series feature a lightweight everyday glasses appearance and a wireless integrated design, aiming to create the
      "next generation mobile terminal after smartphones" in the era of the metaverse. The AR glasses developed by INMO are the
      first in China to integrate AI large language models, creating a new scenario of AI + AR that deeply integrates into
      people's daily lives. At the same time, INMO is also the world's first lightweight wireless AR glasses to achieve
      SLAM + 6DoF, creating an entry point and medium for people to enter and experience the metaverse.
    </p>
  </div>
</section>
 
<!-- ================= TECH DIAGRAM ================= -->
<section class="au-section au-section-alt animate-fade-in">
  <div class="container">
    <div class="au-diagram">
      <img src="https://placehold.co/640x420/0c0e0d/2de6a8?text=AI+%2B+AR+Tech+Diagram" alt="AI + AR technology diagram">
      <p class="au-diagram__caption">PIONEER AND LEADER OF WIRELESS AR GLASSES</p>
    </div>
  </div>
</section>
 
<!-- ================= DEVELOPMENT HISTORY ================= -->
<section class="au-section animate-slide-up" id="historySection">
  <div class="container">
    <h2 class="au-heading">Development History</h2>
    <div class="au-timeline" id="timelineWrap"></div>
  </div>
</section>
 
<!-- ================= PATENTS ================= -->
<section class="au-section au-section-alt animate-fade-in">
  <div class="container">
    <h2 class="au-heading">Patents</h2>
    <div class="row g-4" id="patentsWrap"></div>
  </div>
</section>
 
<!-- ================= INDUSTRY AWARDS ================= -->
<section class="au-section animate-slide-up">
  <div class="container">
    <h2 class="au-heading">Industry Awards</h2>
    <div class="row g-4" id="awardsWrap"></div>
  </div>
</section>
 
<!-- ================= FINANCING HISTORY ================= -->
<section class="au-section au-section-alt animate-fade-in">
  <div class="container">
    <h2 class="au-heading">Financing History</h2>
    <div class="au-financing" id="financingWrap"></div>
  </div>
</section>
 
<!-- ================= OUR PRODUCTS ================= -->
<section class="au-section animate-slide-up">
  <div class="container">
    <h2 class="au-heading">Our Products</h2>
    <div class="row g-4" id="productsWrap"></div>
  </div>
</section>
 
<!-- ================= GLOBAL LAYOUT ================= -->
<section class="au-section au-section-alt animate-fade-in">
  <div class="container">
    <h2 class="au-heading">Global Layout</h2>
    <div class="au-map">
      <img src="https://placehold.co/900x420/0c0e0d/1a2420?text=World+Map" alt="World map">
      <div id="pinsWrap"></div>
    </div>
    <div class="au-map-caption">
      <p>Already settled in over 50 cities with offline stores worldwide</p>
      <p>Including large stores such as Tsutaya Electronics in Japan, JD Super Experience Stores, JD Home, and Yulai Fun Trendy Toy Experience Center</p>
    </div>
  </div>
</section>
 
<!-- ================= BRAND VISION ================= -->
<section class="au-section au-vision animate-slide-up">
  <div class="au-vision__bg-text">BRAND</div>
  <div class="container">
    <div class="au-vision__inner">
      <div class="au-vision__text">
        <p class="au-eyebrow">INMO VISION</p>
        <p>
          In the near future, the world of people will become a new world where virtual and real merge, just like in the movie
          "Ready Player One." The three-dimensional world will accelerate its arrival around us, and the reality before your eyes
          will become more colorful due to AR technology. We hope that through INMO's efforts, everyone can create their own unique
          world. World, you are not just an observer, participant, or witness.
        </p>
        <p class="highlight">You should be — A Creator!</p>
        <p style="color:#fff;font-size:1rem;">
          Let's turn the world around you into your exclusive playground!
        </p>
      </div>
      <div class="au-vision__image">
        <img src="https://placehold.co/480x600/06100c/2de6a8?text=CREATOR" alt="INMO vision astronaut">
      </div>
    </div>
  </div>
</section>

<script>
  // ---- hero vertical bars ----
  const heroBars = document.getElementById('heroBars');
  for (let i = 0; i < 24; i++) {
	const span = document.createElement('span');
	heroBars.appendChild(span);
  }
 
  // ---- development history timeline ----
  const historyData = [
	{ date: '2021.01', text: 'From Coolpad Group, Yingmu Technology Co., Ltd. was established' },
	{ date: '2021.05', text: '<b>INMO X</b> series, debut at China Telecom\'s Cloud Network Integration 2.0 launch event' },
	{ date: '2022.04', text: '<b>INMO AR</b> officially delivered, the earliest mass-produced and delivered wireless all-in-one AR smart glasses' },
	{ date: '2022.10', text: '<b>INMO AIR2</b> officially launched, the first domestically produced dual-eye full-color all-in-one AR glasses officially launched' },
	{ date: '2023.04', text: '<b>INMO AIR2</b> officially mass-produced and became the No.1 in sales of the JD XR category' },
	{ date: '2023.09', text: '<b>INMO GO</b> officially launched, the world\'s first mass-produced wireless AR glasses with access to AIGC' },
	{ date: '2024.11', text: '<b>INMO AIR3, INMO GO2, INMO X</b> series AI photo glasses released the first batch of blind orders exceeding 10,000 units' }
  ];
 
  const timelineWrap = document.getElementById('timelineWrap');
  historyData.forEach((h) => {
	const item = document.createElement('div');
	item.className = 'au-timeline__item';
	item.innerHTML = `
	  <div class="au-timeline__text">${h.text}</div>
	  <div class="au-timeline__date">${h.date}</div>
	`;
	timelineWrap.appendChild(item);
  });
 
  // ---- patents ----
  const patentsData = [
	{ num: '100+', label: 'AR FIELD TECHNOLOGY PATENTS', img: 'https://placehold.co/300x300/0f1512/2de6a8?text=AR' },
	{ num: '30+', label: 'PATENTS RELATED TO 5G TECHNOLOGY', img: 'https://placehold.co/300x300/0f1512/6ee7ff?text=5G' },
	{ num: '20+', label: 'MODEL AND DESIGN PATENTS FOR WEARABLE DEVICES', img: 'https://placehold.co/300x300/0f1512/2de6a8?text=GO' },
	{ num: '25+', label: 'TECHNOLOGY PATENTS IN THE FIELD OF AI', img: 'https://placehold.co/300x300/0f1512/6ee7ff?text=AI' }
  ];
  const patentsWrap = document.getElementById('patentsWrap');
  patentsData.forEach((p) => {
	const col = document.createElement('div');
	col.className = 'col-6 col-md-3';
	col.innerHTML = `
	  <div class="au-patent">
		<div class="au-patent__media"><img src="${p.img}" alt="${p.label}"></div>
		<div class="au-patent__num">${p.num}</div>
		<div class="au-patent__label">${p.label}</div>
	  </div>
	`;
	patentsWrap.appendChild(col);
  });
 
  // ---- awards ----
  const awardsData = [
	{ img: 'https://placehold.co/140x140/0c0e0d/e63946?text=CMF', text: "2023 International CMF Design Award. The first smart AR glasses to win a grand prize." },
	{ img: 'https://placehold.co/140x140/0c0e0d/9d4edd?text=MUSE', text: "MUSE Design Awards in the United States Supreme <b>Award/Platinum Award</b>" },
	{ img: 'https://placehold.co/140x140/0c0e0d/2de6a8?text=FBEC', text: "FBEC2023 - Golden Gyroscope Award Annual Outstanding Consumer Hardware Award" },
	{ img: 'https://placehold.co/140x140/0c0e0d/6ee7ff?text=SIVA', text: "2024 SIVA Awards Best AR <b>hardware Award</b>" }
  ];
  const awardsWrap = document.getElementById('awardsWrap');
  awardsData.forEach((a) => {
	const col = document.createElement('div');
	col.className = 'col-6 col-md-3';
	col.innerHTML = `
	  <div class="au-award">
		<div class="au-award__media"><img src="${a.img}" alt="award"></div>
		<div class="au-award__text">${a.text}</div>
	  </div>
	`;
	awardsWrap.appendChild(col);
  });
 
  // ---- financing chart (svg polyline + labeled points) ----
  const financingData = [
	{ round: '2021 Angel Round', desc: '$9M Valuation 37 Interactive Entertainment, Eagle Investment', x: 6, y: 82 },
	{ round: '2021 Pre-A Round', desc: '$40M Valuation Matrix Partners', x: 27, y: 68 },
	{ round: '2022 A Round', desc: '$110M Valuation Chiwei Group', x: 48, y: 50 },
	{ round: '2024 B Round', desc: 'Over $150M Valuation Chuan Development Group, Chenghua Science and Technology Investment', x: 69, y: 28 },
	{ round: '2025 B+ Round', desc: 'Over 7 Valuation', x: 92, y: 8 }
  ];
  const financingWrap = document.getElementById('financingWrap');
 
  const svgPoints = financingData.map(p => `${p.x},${p.y}`).join(' ');
  const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
  svg.setAttribute('viewBox', '0 0 100 90');
  svg.setAttribute('preserveAspectRatio', 'none');
  svg.innerHTML = `
	<polyline points="${svgPoints}" fill="none" stroke="#2de6a8" stroke-width="0.6" vector-effect="non-scaling-stroke"/>
	${financingData.map(p => `<circle cx="${p.x}" cy="${p.y}" r="1.4" fill="#2de6a8"/>`).join('')}
  `;
  financingWrap.appendChild(svg);
 
  financingData.forEach((p) => {
	const point = document.createElement('div');
	point.className = 'au-financing__point';
	point.style.left = p.x + '%';
	point.style.top = (p.y - 14) + '%';
	point.innerHTML = `
	  <div class="au-financing__round">${p.round}</div>
	  <div class="au-financing__desc">${p.desc}</div>
	`;
	financingWrap.appendChild(point);
  });
 
  // ---- products ----
  const productsData = [
	{ name: 'INMO AIR', desc: "The world's first mass-produced consumer grade wireless smart glasses", date: '2022 Apr.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR' },
	{ name: 'INMO AIR2', desc: "The world's first lightweight AR glasses to achieve SLAM + 6DoF spatial interaction", date: '2022 Oct.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR2' },
	{ name: 'INMO GO', desc: "The world's first mass-produced wireless AR glasses integrated with AIGC", date: '2023 Sep.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO' },
	{ name: 'INMO AIR3', desc: "The world's first 1080P all-in-one AR glasses", date: '2024 Nov.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+AIR3' },
	{ name: 'INMO GO2', desc: "The world's first translation glasses equipped with an independent Android system", date: '2024 Nov.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+GO2' },
	{ name: 'INMO X', desc: 'AI+Camera Glasses', date: '2024 Nov.', img: 'https://placehold.co/300x375/0f1512/ffffff?text=INMO+X' }
  ];
  const productsWrap = document.getElementById('productsWrap');
  productsData.forEach((p) => {
	const col = document.createElement('div');
	col.className = 'col-6 col-md-4';
	col.innerHTML = `
	  <div class="au-product">
		<div class="au-product__media"><img src="${p.img}" alt="${p.name}"></div>
		<div class="au-product__name">${p.name}</div>
		<div class="au-product__desc">${p.desc}</div>
		<div class="au-product__date">${p.date}</div>
	  </div>
	`;
	productsWrap.appendChild(col);
  });
 
  // ---- global map pins ----
  const pinsData = [
	{ city: 'New York', x: 22, y: 46, color: '#ff6b81' },
	{ city: 'London', x: 45, y: 42, color: '#ff8fa3' },
	{ city: 'Berlin', x: 50, y: 38, color: '#4dd0e1' },
	{ city: 'Moscow', x: 56, y: 30, color: '#4dabf7' },
	{ city: 'Seoul', x: 80, y: 42, color: '#ff8fa3' },
	{ city: 'Tokyo', x: 85, y: 46, color: '#63e6be' },
	{ city: 'Hong Kong', x: 76, y: 54, color: '#ff8fa3' },
	{ city: 'Taiwan', x: 78, y: 58, color: '#ffa94d' }
  ];
  const pinsWrap = document.getElementById('pinsWrap');
  pinsData.forEach((p) => {
	const pin = document.createElement('span');
	pin.className = 'au-map__pin';
	pin.style.left = p.x + '%';
	pin.style.top = p.y + '%';
	pin.style.background = p.color;
	pin.textContent = p.city;
	pinsWrap.appendChild(pin);
  });
</script>

<?php
get_footer();
