<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seargin
 */

get_header();

$archive_layout = seargin_option('archive_layout', 'right-sidebar');
$archive_banner = seargin_option('archive_banner', true);
$banner_text_align = seargin_option('banner_default_text_align', 'start');
?>

    <?php if ($archive_banner == true) : ?>
        <div class="breadcrumb archive-banner pos-rel">
            <div class="container">
                <div class="col-lg-9">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <?php
                        the_archive_title('<h2 class="breadcrumb__title">', '</h2>');
                        ?>
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

    <div id="primary" class="content-area pt-150 pb-150 layout-<?php echo esc_attr($archive_layout); ?>">
        <div class="container">
            <?php
            if ($archive_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div>

<?php
get_footer();
