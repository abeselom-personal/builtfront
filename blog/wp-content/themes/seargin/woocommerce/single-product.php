<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

$shop_single_banner = seargin_option('enable_single_product_preadcrumb', true);
$banner_text_align = seargin_option('banner_default_text_align', 'start');
$product_single_breadcrumb_title = seargin_option('product_single_breadcrumb_title');
//seargin_product_single_breadcrumb();
?>

<?php if ($shop_single_banner == true) : ?>
    <div class="breadcrumb shop-single-breadcrumb pos-rel">
        <div class="container">
            <div class="col-lg-9">
                <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                    <h2 class="breadcrumb__title">
                        <?php if(!empty($product_single_breadcrumb_title)){echo esc_html($product_single_breadcrumb_title);}else{ esc_html_e( 'Product Details', 'seargin' );}?>
                    </h2>
                    <?php if (function_exists('bcn_display')) : ?>
                        <div class="breadcrumb-container">
                            <?php bcn_display(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<section class="shop-single-section pt-150 pb-80">
    <div class="container">
		<?php
			/**
			 * woocommerce_before_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 */
			do_action( 'woocommerce_before_main_content' );
		?>

			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>

				<?php wc_get_template_part( 'content', 'single-product' ); ?>

			<?php endwhile; // end of the loop. ?>

		<?php
			/**
			 * woocommerce_after_main_content hook.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' );
		?>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>
	</div>
</section>
<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
