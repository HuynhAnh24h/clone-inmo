<?php
/**
 * Fallback to default archive-product.php for all other product categories
 */

defined( 'ABSPATH' ) || exit;

include get_template_directory() . '/woocommerce/archive-product.php';
