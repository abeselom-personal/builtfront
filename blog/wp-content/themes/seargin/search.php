<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Seargin
 */

get_header();

$search_banner = seargin_option('search_banner', true);
$search_layout = seargin_option('search_layout', 'right-sidebar');
$banner_text_align = seargin_option('banner_default_text_align', 'start');
?>

    <?php if ($search_banner == true) : ?>
        <div class="breadcrumb search-banner pos-rel">
            <div class="container">
                <div class="col-lg-9">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <h2 class="breadcrumb__title"><?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'seargin'), '<span>' . get_search_query() . '</span>');
                            ?>
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

    <div id="primary" class="content-area pt-150 pb-150 layout-<?php echo esc_attr($search_layout); ?>">
        <div class="container">
            <?php
            if ($search_layout == 'grid') {
                get_template_part('template-parts/post/post-grid');
            } else {
                get_template_part('template-parts/post/post-sidebar');
            }
            ?>
        </div>
    </div><!-- #primary -->

<?php
get_footer();
