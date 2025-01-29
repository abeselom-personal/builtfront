<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

$searginShopClass = '';
if (is_active_sidebar('shop-sidebar-1')) {
    $searginShopClass = 'col-lg-9 mt-30';
} else {
    $searginShopClass = 'col-lg-12 mt-30';
}
get_header('shop');

$shop_banner = seargin_option('enable_shop_breadcrumb', true);
$banner_text_align = seargin_option('banner_default_text_align', 'start');
$shop_breadcrumb_title = seargin_option('shop_breadcrumb_title');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>

<?php if ($shop_banner == true) : ?>
    <div class="breadcrumb shop-breadcrumb pos-rel">
        <div class="container">
            <div class="col-lg-9">
                <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                    <h2 class="breadcrumb__title">
                        <?php if (!empty($shop_breadcrumb_title)) {
                            echo esc_html($shop_breadcrumb_title);
                        } else {
                            esc_html_e('Shop', 'seargin');
                        } ?>
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

    <section class="shop pt-150 pb-170">
        <div class="container">
            <div class="row mt-none-30">
                <div class="<?php echo esc_attr($searginShopClass); ?>">
                    <div class="woocommerce-content-wrap">
                        <div class="woocommerce-toolbar-top ul_li_between mt-none-15">
                            <?php woocommerce_result_count(); ?>
                            <div class="woocommerce-toolbar-top-right ul_li">

                                <!-- Filter -->
                                <?php
                                /**
                                 * Hook: woocommerce_before_shop_loop.
                                 *
                                 * @hooked woocommerce_output_all_notices - 10
                                 * @hooked woocommerce_result_count - 20
                                 * @hooked woocommerce_catalog_ordering - 30
                                 */
                                do_action('woocommerce_before_shop_loop');
                                ?>
                            </div>
                        </div>
                        <div class="woocommerce-content-inner">
                            <div class="products">
                                <?php
                                /**
                                 * Hook: woocommerce_archive_description.
                                 *
                                 * @hooked woocommerce_taxonomy_archive_description - 10
                                 * @hooked woocommerce_product_archive_description - 10
                                 */
                                do_action('woocommerce_archive_description');
                                ?>
                                <?php
                                if (woocommerce_product_loop()) {


                                    woocommerce_product_loop_start();

                                    if (wc_get_loop_prop('total')) {
                                        while (have_posts()) {
                                            the_post();

                                            /**
                                             * Hook: woocommerce_shop_loop.
                                             */
                                            do_action('woocommerce_shop_loop');

                                            wc_get_template_part('content', 'product');
                                        }
                                    }

                                    woocommerce_product_loop_end();

                                    /**
                                     * Hook: woocommerce_after_shop_loop.
                                     *
                                     * @hooked woocommerce_pagination - 10
                                     */
                                    ?>
                                    <div class="pagination_wrap pt-50">
                                        <?php get_template_part('template-parts/post/post-pagination'); ?>
                                    </div>
                                    <?php remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
                                    do_action('woocommerce_after_shop_loop');
                                } else {
                                    /**
                                     * Hook: woocommerce_no_products_found.
                                     *
                                     * @hooked wc_no_products_found - 10
                                     */
                                    do_action('woocommerce_no_products_found');
                                }

                                /**
                                 * Hook: woocommerce_after_main_content.
                                 *
                                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                                 */
                                do_action('woocommerce_after_main_content'); ?>
                            </div>
                            <!-- pagination -->
                        </div>
                    </div>
                </div>
                <?php if (is_active_sidebar('shop-sidebar-1')) { ?>
                    <div class="col-lg-3 mt-30">
                        <div class="shop-sidebar sidebar-area">
                            <?php dynamic_sidebar('shop-sidebar-1') ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
