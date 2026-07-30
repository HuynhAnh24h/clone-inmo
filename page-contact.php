<?php
/**
 * Template Name: Contact Page
 */

get_header();
?>

<div class="container py-5 animate-fade-in">
  <h1 class="theme-ct-title">Liên hệ với chúng tôi</h1>
  <p class="theme-ct-subtitle">
    Chúng tôi luôn mong muốn lắng nghe ý kiến từ bạn. Đội ngũ của chúng tôi luôn sẵn sàng hỗ trợ.<br>
    Hãy để lại lời nhắn cho chúng tôi bằng cách điền vào biểu mẫu dưới đây.
  </p>
 
  <div class="row mt-5">
 
    <!-- Form -->
    <div class="col-lg-7 animate-slide-up">
      <form id="contactForm">
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="theme-ct-field" placeholder="Họ và tên" name="name">
          </div>
          <div class="col-md-6">
            <input type="email" class="theme-ct-field" placeholder="Email" name="email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="tel" class="theme-ct-field" placeholder="Số điện thoại" name="phone">
          </div>
          <div class="col-md-6">
            <select class="theme-ct-field" name="subject">
              <option value="" disabled selected>Chủ đề</option>
              <option value="support">Hỗ trợ khách hàng</option>
              <option value="press">KOL & Báo chí</option>
              <option value="business">Hợp tác kinh doanh</option>
              <option value="other">Khác</option>
            </select>
          </div>
        </div>
        <textarea class="theme-ct-field" placeholder="Nội dung tin nhắn" name="message"></textarea>
 
        <button type="submit" class="theme-ct-submit">Gửi tin nhắn</button>
 
        <div id="contactResponse" style="display:none; margin-top: 15px; padding: 10px; border-radius: 8px; font-weight: 500;"></div>

        <p class="theme-ct-disclaimer">
          Trang web này được bảo vệ bởi hCaptcha và tuân theo
          <a href="<?php echo esc_url( home_url( '/chinh-sach-bao-mat/' ) ); ?>">Chính sách bảo mật</a> cũng như <a href="<?php echo esc_url( home_url( '/dieu-khoan-dich-vu/' ) ); ?>">Điều khoản dịch vụ</a> của hCaptcha.
        </p>
      </form>
    </div>
 
    <!-- Sidebar -->
    <div class="col-lg-4 offset-lg-1 mt-5 mt-lg-0 animate-slide-up" style="animation-delay: 0.1s;">
 
      <div class="theme-ct-side-block">
        <p class="theme-ct-side-label">Email</p>
        <p class="mb-1">Chăm sóc khách hàng: <a href="mailto:support@inmoxr.com">support@inmoxr.com</a></p>
        <p class="mb-1">KOL & Báo chí: <a href="mailto:marketing@inmoxr.com">marketing@inmoxr.com</a></p>
        <p class="mb-0">Hợp tác kinh doanh: <a href="mailto:contact@inmoxr.com">contact@inmoxr.com</a></p>
      </div>
 
      <div class="theme-ct-side-block">
        <p class="theme-ct-side-label">Điện thoại</p>
        <p class="mb-1">+1 800-689-8547</p>
        <p class="mb-0"><strong>EST</strong> Thứ 2 – Thứ 6: 09:00 – 17:00</p>
      </div>
 
      <div class="theme-ct-side-block">
        <p class="theme-ct-side-label">Theo dõi chúng tôi</p>
        <div class="theme-ct-social">
          <a href="https://facebook.com/inmo" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://x.com/inmo" target="_blank" aria-label="X"><i class="bi bi-twitter-x"></i></a>
          <a href="https://instagram.com/inmo" target="_blank" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://youtube.com/inmo" target="_blank" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          <a href="https://tiktok.com/@inmo" target="_blank" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>
 
    </div>
 
  </div>
 
</div>

<?php
get_footer();
