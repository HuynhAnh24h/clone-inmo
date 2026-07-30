<?php
// Đăng ký Custom Post Types để lưu trữ Form
function inmo_register_crm_post_types() {
    // 1. CPT: Tin nhắn Liên hệ
    $labels_contact = array(
        'name'                  => 'Tin nhắn Liên hệ',
        'singular_name'         => 'Tin nhắn',
        'menu_name'             => 'Tin nhắn Liên hệ',
        'all_items'             => 'Tất cả Tin nhắn',
    );
    $args_contact = array(
        'labels'             => $labels_contact,
        'public'             => false, // Không hiện thị ra ngoài frontend
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-email-alt',
        'supports'           => array( 'title' ),
        'capabilities'       => array(
            'create_posts' => 'do_not_allow', // Không cho tạo bằng tay
        ),
        'map_meta_cap'       => true,
    );
    register_post_type( 'inmo_contact', $args_contact );

    // 2. CPT: Khách nhận mã
    $labels_discount = array(
        'name'                  => 'Đăng ký Nhận mã',
        'singular_name'         => 'Đăng ký',
        'menu_name'             => 'Đăng ký Nhận mã',
        'all_items'             => 'Tất cả Đăng ký',
    );
    $args_discount = array(
        'labels'             => $labels_discount,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-tickets-alt',
        'supports'           => array( 'title' ),
        'capabilities'       => array(
            'create_posts' => 'do_not_allow',
        ),
        'map_meta_cap'       => true,
    );
    register_post_type( 'inmo_discount', $args_discount );
}
add_action( 'init', 'inmo_register_crm_post_types' );

// Tùy chỉnh cột hiển thị cho Tin nhắn Liên hệ
add_filter( 'manage_inmo_contact_posts_columns', 'inmo_set_custom_edit_inmo_contact_columns' );
function inmo_set_custom_edit_inmo_contact_columns( $columns ) {
    $new_columns = array(
        'cb' => $columns['cb'],
        'title' => 'Họ và tên',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'subject' => 'Chủ đề',
        'date' => 'Ngày gửi'
    );
    return $new_columns;
}

add_action( 'manage_inmo_contact_posts_custom_column' , 'inmo_custom_inmo_contact_column', 10, 2 );
function inmo_custom_inmo_contact_column( $column, $post_id ) {
    switch ( $column ) {
        case 'email' :
            echo esc_html( get_post_meta( $post_id, 'email', true ) );
            break;
        case 'phone' :
            echo esc_html( get_post_meta( $post_id, 'phone', true ) );
            break;
        case 'subject' :
            echo esc_html( get_post_meta( $post_id, 'subject', true ) );
            break;
    }
}

// Thêm Meta Box để xem chi tiết tin nhắn (Contact)
add_action( 'add_meta_boxes', 'inmo_add_contact_meta_box' );
function inmo_add_contact_meta_box() {
    add_meta_box( 'inmo_contact_details', 'Chi tiết Tin nhắn', 'inmo_contact_details_callback', 'inmo_contact', 'normal', 'high' );
}
function inmo_contact_details_callback( $post ) {
    $email = get_post_meta( $post->ID, 'email', true );
    $phone = get_post_meta( $post->ID, 'phone', true );
    $subject = get_post_meta( $post->ID, 'subject', true );
    $message = get_post_meta( $post->ID, 'message', true );
    ?>
    <table class="form-table">
        <tr><th style="width: 150px; text-align: left;">Email:</th><td><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></td></tr>
        <tr><th style="width: 150px; text-align: left;">Số điện thoại:</th><td><?php echo esc_html($phone); ?></td></tr>
        <tr><th style="width: 150px; text-align: left;">Chủ đề:</th><td><?php echo esc_html($subject); ?></td></tr>
        <tr><th style="width: 150px; text-align: left; vertical-align: top;">Nội dung:</th><td style="background: #f9f9f9; padding: 10px; border-radius: 5px;"><?php echo nl2br(esc_html($message)); ?></td></tr>
    </table>
    <?php
}

// Thêm Submenu Gửi Email Hàng Loạt
add_action('admin_menu', 'inmo_add_bulk_email_submenu');
function inmo_add_bulk_email_submenu() {
    add_submenu_page(
        'edit.php?post_type=inmo_discount',
        'Gửi Email Hàng Loạt',
        'Phát hành Mã',
        'manage_options',
        'inmo_bulk_email',
        'inmo_bulk_email_page_callback'
    );
}

function inmo_bulk_email_page_callback() {
    ?>
    <div class="wrap">
        <h1>Gửi Email Phát Hành Mã Ưu Đãi</h1>
        <p>Gửi email hàng loạt tới tất cả khách hàng đã đăng ký nhận mã ưu đãi. Hệ thống tự động phân lô (batch) mỗi 50 người để đảm bảo máy chủ không bị quá tải.</p>
        
        <table class="form-table">
            <tr>
                <th scope="row"><label for="bulk_email_subject">Tiêu đề Email</label></th>
                <td>
                    <input name="bulk_email_subject" type="text" id="bulk_email_subject" value="Mã ưu đãi đặc biệt dành cho bạn!" class="regular-text">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="bulk_email_content">Nội dung / Lời dẫn</label></th>
                <td>
                    <textarea name="bulk_email_content" id="bulk_email_content" rows="6" class="large-text">Cảm ơn bạn đã luôn quan tâm tới INMO.

Nhân dịp này, chúng tôi xin gửi tặng bạn một mã ưu đãi đặc biệt: INMO2024

Hãy sử dụng mã này ở bước thanh toán để nhận ngay 10% giảm giá!</textarea>
                </td>
            </tr>
        </table>
        
        <p class="submit">
            <button id="inmo_start_bulk_btn" class="button button-primary button-hero">Bắt đầu Gửi Hàng Loạt</button>
        </p>
        
        <div id="bulk_email_status" style="display:none; background: #fff; border-left: 4px solid #2271b1; padding: 12px; margin-top: 20px; box-shadow: 0 1px 1px rgba(0,0,0,.04);">
            <p><strong>Trạng thái:</strong> <span id="bulk_email_log">Đang chuẩn bị...</span></p>
            <progress id="bulk_email_progress" value="0" max="100" style="width:100%;"></progress>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('#inmo_start_bulk_btn').on('click', function(e) {
            e.preventDefault();
            if(!confirm('Bạn có chắc chắn muốn gửi email cho TẤT CẢ danh sách? (Quá trình này sẽ mất một khoảng thời gian)')) return;
            
            var subject = $('#bulk_email_subject').val();
            var content = $('#bulk_email_content').val();
            
            $('#inmo_start_bulk_btn').prop('disabled', true).text('Đang xử lý...');
            $('#bulk_email_status').show();
            $('#bulk_email_log').text('Đang gửi đợt đầu tiên...');
            
            sendBatch(0, subject, content);
        });
        
        function sendBatch(offset, subject, content) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    action: 'inmo_send_bulk_email_batch',
                    offset: offset,
                    subject: subject,
                    content: content
                },
                success: function(response) {
                    if(response.success) {
                        var data = response.data;
                        $('#bulk_email_log').text('Đã gửi được ' + data.sent + ' / ' + data.total + ' email.');
                        var percent = data.total > 0 ? (data.sent / data.total) * 100 : 100;
                        $('#bulk_email_progress').val(percent);
                        
                        if(data.done) {
                            $('#bulk_email_log').html('<span style="color:green;">Hoàn tất! Đã gửi toàn bộ ' + data.total + ' email thành công.</span>');
                            $('#inmo_start_bulk_btn').text('Gửi xong');
                        } else {
                            // Gửi batch tiếp theo
                            sendBatch(data.next_offset, subject, content);
                        }
                    } else {
                        $('#bulk_email_log').html('<span style="color:red;">Lỗi: ' + response.data + '</span>');
                        $('#inmo_start_bulk_btn').prop('disabled', false).text('Bắt đầu Gửi Hàng Loạt');
                    }
                },
                error: function() {
                    $('#bulk_email_log').html('<span style="color:red;">Lỗi kết nối tới Server. Đã dừng lại.</span>');
                    $('#inmo_start_bulk_btn').prop('disabled', false).text('Thử lại');
                }
            });
        }
    });
    </script>
    <?php
}

// Thêm Submenu Cấu hình SMTP
add_action('admin_menu', 'inmo_add_smtp_submenu');
function inmo_add_smtp_submenu() {
    add_submenu_page(
        'edit.php?post_type=inmo_discount',
        'Cấu hình SMTP',
        'Cấu hình SMTP',
        'manage_options',
        'inmo_smtp_settings',
        'inmo_smtp_settings_page'
    );
}

function inmo_smtp_settings_page() {
    if ( isset( $_POST['inmo_save_smtp'] ) && current_user_can( 'manage_options' ) ) {
        update_option( 'inmo_smtp_email', sanitize_email( $_POST['inmo_smtp_email'] ) );
        update_option( 'inmo_smtp_password', sanitize_text_field( $_POST['inmo_smtp_password'] ) );
        update_option( 'inmo_smtp_from_name', sanitize_text_field( $_POST['inmo_smtp_from_name'] ) );
        echo '<div class="notice notice-success is-dismissible"><p>Đã lưu cấu hình SMTP.</p></div>';
    }

    $email = get_option( 'inmo_smtp_email', '' );
    $password = get_option( 'inmo_smtp_password', '' );
    $from_name = get_option( 'inmo_smtp_from_name', get_bloginfo('name') );
    ?>
    <div class="wrap">
        <h1>Cấu hình Gửi Email (SMTP)</h1>
        <p>Để đảm bảo email gửi đi từ website không bị vào hộp thư Rác (Spam), hãy cấu hình tài khoản Gmail của bạn tại đây.</p>
        <p><strong>Lưu ý:</strong> Mật khẩu bạn nhập ở đây KHÔNG PHẢI là mật khẩu đăng nhập Gmail, mà là <strong>Mật khẩu ứng dụng (App Password)</strong> của Google.<br> <a href="https://myaccount.google.com/apppasswords" target="_blank">Nhấn vào đây để tạo Mật khẩu ứng dụng</a>.</p>
        
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="inmo_smtp_email">Tài khoản Gmail</label></th>
                    <td>
                        <input name="inmo_smtp_email" type="email" id="inmo_smtp_email" value="<?php echo esc_attr($email); ?>" class="regular-text" required placeholder="vidu@gmail.com">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="inmo_smtp_password">Mật khẩu Ứng dụng</label></th>
                    <td>
                        <input name="inmo_smtp_password" type="password" id="inmo_smtp_password" value="<?php echo esc_attr($password); ?>" class="regular-text" required placeholder="xxxx xxxx xxxx xxxx">
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="inmo_smtp_from_name">Tên người gửi hiển thị</label></th>
                    <td>
                        <input name="inmo_smtp_from_name" type="text" id="inmo_smtp_from_name" value="<?php echo esc_attr($from_name); ?>" class="regular-text" required>
                    </td>
                </tr>
            </table>
            <?php submit_button('Lưu cấu hình SMTP', 'primary', 'inmo_save_smtp'); ?>
        </form>
    </div>
    <?php
}

// Hook vào phpmailer_init để ghi đè cấu hình SMTP
add_action( 'phpmailer_init', 'inmo_configure_smtp' );
function inmo_configure_smtp( $phpmailer ) {
    $email = get_option( 'inmo_smtp_email' );
    $password = get_option( 'inmo_smtp_password' );
    $from_name = get_option( 'inmo_smtp_from_name', get_bloginfo('name') );

    if ( !empty($email) && !empty($password) ) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = 'smtp.gmail.com';
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = 465;
        $phpmailer->Username   = $email;
        $phpmailer->Password   = $password;
        $phpmailer->SMTPSecure = 'ssl'; // SSL for port 465
        
        $phpmailer->From       = $email;
        $phpmailer->FromName   = $from_name;
    }
}
