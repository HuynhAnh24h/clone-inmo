<?php
/**
 * Custom Elementor Widget for INMO Product Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class INMO_Elementor_Products_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 */
	public function get_name() {
		return 'inmo_products_grid';
	}

	/**
	 * Get widget title.
	 */
	public function get_title() {
		return esc_html__( 'INMO Product Grid', 'inmo-theme' );
	}

	/**
	 * Get widget icon.
	 */
	public function get_icon() {
		return 'eicon-products';
	}

	/**
	 * Get widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {

		// Content Section
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Cấu hình sản phẩm', 'inmo-theme' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Get all WooCommerce product categories
		$categories = get_terms( array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => false,
		) );
		
		$cat_options = [ '' => esc_html__( 'Tất cả danh mục', 'inmo-theme' ) ];
		if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
			foreach ( $categories as $category ) {
				$cat_options[ $category->slug ] = $category->name;
			}
		}

		$this->add_control(
			'select_category',
			[
				'label' => esc_html__( 'Chọn danh mục', 'inmo-theme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $cat_options,
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => esc_html__( 'Số lượng hiển thị', 'inmo-theme' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 6,
				'min' => 1,
				'max' => 50,
				'step' => 1,
			]
		);

		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Số cột hiển thị (Desktop)', 'inmo-theme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => esc_html__( '2 Cột', 'inmo-theme' ),
					'3' => esc_html__( '3 Cột', 'inmo-theme' ),
					'4' => esc_html__( '4 Cột', 'inmo-theme' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => esc_html__( 'Sắp xếp theo', 'inmo-theme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'date' => esc_html__( 'Ngày tạo', 'inmo-theme' ),
					'price' => esc_html__( 'Giá bán', 'inmo-theme' ),
					'title' => esc_html__( 'Tên sản phẩm', 'inmo-theme' ),
					'rand' => esc_html__( 'Ngẫu nhiên', 'inmo-theme' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Thứ tự sắp xếp', 'inmo-theme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Giảm dần (Mới nhất / Giá cao nhất)', 'inmo-theme' ),
					'ASC' => esc_html__( 'Tăng dần (Cũ nhất / Giá thấp nhất)', 'inmo-theme' ),
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$category = $settings['select_category'];
		$posts_per_page = ! empty( $settings['posts_per_page'] ) ? intval( $settings['posts_per_page'] ) : 6;
		$columns = $settings['columns'];
		$orderby = $settings['orderby'];
		$order = $settings['order'];

		$args = array(
			'post_type'      => 'product',
			'posts_per_page' => $posts_per_page,
			'orderby'        => $orderby,
			'order'          => $order,
		);

		if ( ! empty( $category ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $category,
				),
			);
		}

		$query = new \WP_Query( $args );

		$col_class = 'col-md-4';
		if ( $columns === '2' ) {
			$col_class = 'col-md-6';
		} elseif ( $columns === '4' ) {
			$col_class = 'col-md-3';
		}

		if ( $query->have_posts() ) {
			echo '<div class="container">';
			echo '<div class="row g-4">';
			while ( $query->have_posts() ) {
				$query->the_post();
				global $product;
				$rating = $product->get_average_rating();
				$image_id = $product->get_image_id();
				$image_url = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : wc_placeholder_img_src();
				?>
				<div class="col-12 col-sm-6 <?php echo esc_attr( $col_class ); ?> mb-4">
					<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="pg-archive-product-card">
						<div class="pg-archive-product-media">
							<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
							<?php if ( $rating > 0 ) : ?>
								<span class="pg-archive-product-rating">
									<i class="bi bi-star-fill"></i><?php echo number_format( $rating, 1 ); ?>
								</span>
							<?php endif; ?>
						</div>
						<div class="pg-archive-product-info">
							<h3 class="pg-archive-product-title"><?php echo esc_html( $product->get_name() ); ?></h3>
							<p class="pg-archive-product-price"><?php echo $product->get_price_html(); ?></p>
						</div>
					</a>
				</div>
				<?php
			}
			echo '</div>';
			echo '</div>';
			wp_reset_postdata();
		} else {
			echo '<p class="text-center py-4">' . esc_html__( 'Không tìm thấy sản phẩm nào.', 'inmo-theme' ) . '</p>';
		}
	}
}
