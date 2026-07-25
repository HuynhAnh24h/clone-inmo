<?php
/**
 * Template Name: Contact Page
 */

get_header();
?>

<div class="container py-5 animate-fade-in">
  <h1 class="ct-title">Contact us</h1>
  <p class="ct-subtitle">
    We'd love to hear from you. Our team is here to help.<br>
    Let your customers get in touch with you by filling out the email form below.
  </p>
 
  <div class="row mt-5">
 
    <!-- Form -->
    <div class="col-lg-7 animate-slide-up">
      <form id="contactForm">
        <div class="row">
          <div class="col-md-6">
            <input type="text" class="ct-field" placeholder="Name" name="name">
          </div>
          <div class="col-md-6">
            <input type="email" class="ct-field" placeholder="Email" name="email">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="tel" class="ct-field" placeholder="Phone number" name="phone">
          </div>
          <div class="col-md-6">
            <select class="ct-field" name="subject">
              <option value="" disabled selected>Subject</option>
              <option value="support">Customer Support</option>
              <option value="press">KOL &amp; Press</option>
              <option value="business">Business</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>
        <textarea class="ct-field" placeholder="Message" name="message"></textarea>
 
        <button type="submit" class="ct-submit">Send message</button>
 
        <p class="ct-disclaimer">
          This site is protected by hCaptcha and the hCaptcha
          <a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a> apply.
        </p>
      </form>
    </div>
 
    <!-- Sidebar -->
    <div class="col-lg-4 offset-lg-1 mt-5 mt-lg-0 animate-slide-up" style="animation-delay: 0.1s;">
 
      <div class="ct-side-block">
        <p class="ct-side-label">Email</p>
        <p class="mb-1">Customer Service: <a href="mailto:support@inmoxr.com">support@inmoxr.com</a></p>
        <p class="mb-1">KOL &amp; Press: <a href="mailto:marketing@inmoxr.com">marketing@inmoxr.com</a></p>
        <p class="mb-0">Business: <a href="mailto:contact@inmoxr.com">contact@inmoxr.com</a></p>
      </div>
 
      <div class="ct-side-block">
        <p class="ct-side-label">Phone</p>
        <p class="mb-1">+1 800-689-8547</p>
        <p class="mb-0"><strong>EST</strong> Mon–Fri: 09:00 – 17:00</p>
      </div>
 
      <div class="ct-side-block">
        <p class="ct-side-label">Follow us</p>
        <div class="ct-social">
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" aria-label="X"><i class="bi bi-twitter-x"></i></a>
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
          <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
        </div>
      </div>
 
    </div>
 
  </div>
 
</div>

<?php
get_footer();
