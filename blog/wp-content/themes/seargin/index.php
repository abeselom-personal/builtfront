<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seargin
 */

get_header();
$blog_layout = seargin_option('blog_layout', 'right-sidebar');
$enable_banner = seargin_option('blog_banner', true);
$banner_title = seargin_option('blog_title');
$banner_text_align = seargin_option('banner_default_text_align', 'start');

?>

    <?php if ($enable_banner == true) : ?>
        <div class="breadcrumb bg_img blog-banner pos-rel">
            <div class="container">
                <div class="col-lg-9">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <h2 class="breadcrumb__title">
                            <?php echo esc_html($banner_title); ?>
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

    <div id="primary" class="content-area pt-150 pb-150 layout-<?php echo esc_attr($blog_layout); ?>">
        <div class="container">
            <?php
            if ($blog_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
        <?php
        $blog_shape = seargin_option('blog_shape', '');
        if (!empty($blog_shape['shape1']['id']) || !empty($blog_shape['shape2']['id']) || !empty($blog_shape['shape3']['id']) || !empty($blog_shape['shape4']['id']) || !empty($blog_shape['shape5']['id'])): ?>
            <div class="blog__shape">
                <div class="shape shape--1">
                    <?php echo wp_get_attachment_image($blog_shape['shape1']['id'], 'full'); ?>
                </div>
                <div class="shape shape--2">
                    <?php echo wp_get_attachment_image($blog_shape['shape2']['id'], 'full'); ?>
                </div>
                <div class="shape shape--3">
                    <?php echo wp_get_attachment_image($blog_shape['shape3']['id'], 'full'); ?>
                </div>
                <div class="shape shape--4">
                    <?php echo wp_get_attachment_image($blog_shape['shape4']['id'], 'full'); ?>
                </div>
                <div class="shape shape--5">
                    <?php echo wp_get_attachment_image($blog_shape['shape5']['id'], 'full'); ?>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- #primary -->


<?php
get_footer();
