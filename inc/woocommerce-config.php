<?php

if ( ! function_exists( 'presise_template_loop_product_title' ) ) {
	function presise_template_loop_product_title() {
		echo '<div class="presise_title_wrap">';
		echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
	}

	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'presise_template_loop_product_title', 10 );
}

if ( ! function_exists( 'presise_title_wrap_end' ) ) {
	function presise_title_wrap_end() {
		printf( '</div><!--End Title Wrap-->' );
	}

	add_action( 'woocommerce_after_shop_loop_item', 'presise_title_wrap_end', 15 );
}

if ( ! function_exists( 'presise_show_product_loop_sale_flash' ) ) {

	/**
	 * Get the sale flash for the loop.
	 */
	function presise_show_product_loop_sale_flash() {
		echo '<div class="presise_product_thumb_image">';
		wc_get_template( 'loop/sale-flash.php' );
	}

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'presise_show_product_loop_sale_flash', 10 );
}


if ( ! function_exists( 'presise_product_thumbnail' ) ) {
	function presise_product_thumbnail() {

		global $post, $product;

		$mt_product_thumb = woocommerce_get_product_thumbnail( 'presise_image_square' ); // WPCS: XSS ok.

		if ( $product->is_on_sale() ) {
			printf( '%s</div>', $mt_product_thumb );
		}else{
			printf( '<div class="presise_product_thumb_image">%s</div>', $mt_product_thumb );
		}
	}

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'presise_product_thumbnail', 10 );
}
