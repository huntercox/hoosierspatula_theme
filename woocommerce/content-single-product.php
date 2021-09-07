<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
			/**
			 * Hook: Woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>

		<?php
			// =============================================
			// Handmade Disclaimer
			// =============================================
				$handmade_disclaimer = get_field('disclaimer_text', 'option');
				if ( !empty($handmade_disclaimer) ):
					echo '<div class="product__disclaimer">';
						echo '<p>'.$handmade_disclaimer.'</p>';
					echo '</div>';
				endif;
		?>


		<?php
			// =============================================
			// Specifications
			// =============================================
				$product_specifications = get_field('product_specifications');

				if ( $product_specifications ):
					echo '<div class="product-specifications__wrapper">';
						echo '<h2 class="product-specifications__heading">Specifications <span class="indicator closed"></span></h2>';

						echo '<div class="product-specifications__content">';
							echo $product_specifications;
						echo '</div>';
					echo '</div>';
				endif;
		?>
	</div>

	<?php
		if ( has_term( 'spatulas', 'product_cat' ) ) :
		// =============================================
		// Spatulas - Photo Gallery
		// =============================================

			$default_spat_gallery = get_field('default_spatulas_photo_gallery', 'option');
			$single_spat_gallery  = get_field('spatula_product_photo_gallery');
			$size = 'gallery';

				if ( $single_spat_gallery ):
					echo '<div class="product__spatula-gallery">';

					foreach( $single_spat_gallery as $image ):
						echo '<div class="product__spatula-gallery_item">';
							echo '<a href="'.$image['url'].'">';
								echo '<img src="'.$image['sizes'][$size].'" />';
							echo '</a>';
						echo '</div>';
					endforeach;

					echo '</div>';

				elseif ( $default_spat_gallery ):
					echo '<div class="product__spatula-gallery">';

					foreach( $default_spat_gallery as $image ):
						echo '<div class="product__spatula-gallery_item">';
							echo '<a href="'.$image['url'].'">';
								echo '<img src="'.$image['sizes'][$size].'" />';
							echo '</a>';
						echo '</div>';
					endforeach;

					echo '</div>';
				else:
					// Do nothing
				endif;

		endif;
	?>


	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>


</div><!-- /.product -->



<?php do_action( 'woocommerce_after_single_product' ); ?>
