<?php
/**
 * Login Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="theme-shopify-login-wrapper">
    <div class="theme-shopify-login-container <?php echo ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) ? 'has-registration' : ''; ?>" style="max-width: 900px; width: 100%;">
        
        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
        <div class="row w-100 m-0">
            <div class="col-md-6 pe-md-5 mb-5 mb-md-0 position-relative">
                <div class="d-none d-md-block position-absolute" style="right: 0; top: 10%; bottom: 10%; width: 1px; background: #eee;"></div>
        <?php else : ?>
            <div style="max-width: 440px; margin: 0 auto;">
        <?php endif; ?>

            <!-- LOGIN FORM -->
            <div class="theme-shopify-login-header">
                <h2 class="theme-shopify-login-title">Đăng nhập</h2>
                <p class="theme-shopify-login-subtitle mb-4">Chào mừng bạn quay trở lại</p>
            </div>

            <form class="woocommerce-form woocommerce-form-login login theme-shopify-login-form" method="post">
                <?php do_action( 'woocommerce_login_form_start' ); ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <label for="username" class="d-none"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text theme-shopify-login-input border-0 bg-light px-4 py-3" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="Email hoặc Tên đăng nhập" style="border-radius: 10px;" />
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-3">
                    <label for="password" class="d-none"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input class="woocommerce-Input woocommerce-Input--text input-text theme-shopify-login-input border-0 bg-light px-4 py-3" type="password" name="password" id="password" autocomplete="current-password" placeholder="Mật khẩu" style="border-radius: 10px;" />
                </p>

                <?php do_action( 'woocommerce_login_form' ); ?>

                <p class="form-row theme-shopify-login-actions mt-4">
                    <?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit theme-shopify-login-btn py-3" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>" style="border-radius: 10px;">Đăng nhập ngay</button>
                </p>

                <div class="theme-shopify-login-options d-flex justify-content-between align-items-center">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme theme-shopify-checkbox mb-0">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" checked /> 
                        <span class="theme-shopify-checkbox-text">Ghi nhớ</span>
                    </label>
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="text-muted text-decoration-none" style="font-size: 13px;">Quên mật khẩu?</a>
                </div>

                <?php do_action( 'woocommerce_login_form_end' ); ?>
            </form>

        <?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
            </div>
            
            <div class="col-md-6 ps-md-5">
            <!-- REGISTER FORM -->
            <div class="theme-shopify-login-header">
                <h2 class="theme-shopify-login-title">Đăng ký</h2>
                <p class="theme-shopify-login-subtitle mb-4">Tạo tài khoản mới</p>
            </div>

            <form method="post" class="woocommerce-form woocommerce-form-register register theme-shopify-login-form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

                <?php do_action( 'woocommerce_register_form_start' ); ?>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-3">
                        <label for="reg_username" class="d-none"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text theme-shopify-login-input border-0 bg-light px-4 py-3" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" placeholder="Tên đăng nhập" style="border-radius: 10px;" />
                    </p>
                <?php endif; ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-3">
                    <label for="reg_email" class="d-none"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text theme-shopify-login-input border-0 bg-light px-4 py-3" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" placeholder="Email của bạn" style="border-radius: 10px;" />
                </p>

                <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide mt-3">
                        <label for="reg_password" class="d-none"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
                        <input type="password" class="woocommerce-Input woocommerce-Input--text input-text theme-shopify-login-input border-0 bg-light px-4 py-3" name="password" id="reg_password" autocomplete="new-password" placeholder="Mật khẩu" style="border-radius: 10px;" />
                    </p>
                <?php endif; ?>

                <?php do_action( 'woocommerce_register_form' ); ?>

                <p class="woocommerce-form-row form-row mt-4">
                    <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                    <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit theme-shopify-login-btn py-3" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" style="background: #111; border-radius: 10px;">Tạo tài khoản</button>
                </p>

                <?php do_action( 'woocommerce_register_form_end' ); ?>
            </form>

            </div>
        </div>
        <?php else : ?>
            </div>
        <?php endif; ?>

    </div>
    
    <div class="theme-shopify-login-footer-text mt-5">
        Bằng cách tiếp tục, bạn đồng ý với <a href="#">Điều khoản dịch vụ</a> của chúng tôi
    </div>

    <div class="theme-shopify-login-bottom-links mt-2">
        <a href="#">Chính sách bảo mật</a>
    </div>
</div>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
