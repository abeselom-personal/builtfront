<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seargin
 */

get_header();

$career_banner = seargin_option('enable_career_breadcrumb', true);
$career_breadcrumb_title = seargin_option('career_breadcrumb_title');
$banner_text_align = seargin_option('banner_default_text_align', 'start');
?>
<?php if ($career_banner == true) : ?>
    <div class="breadcrumb career-banner pos-rel">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 my-auto">
                    <div class="breadcrumb__content text-<?php echo esc_attr($banner_text_align); ?>">
                        <h2 class="breadcrumb__title">
                            <?php
                            if(!empty($career_breadcrumb_title)) {
                                echo esc_html($career_breadcrumb_title);
                            } else {
                                the_title();
                            }
                            ?>
                        </h2>

                        <?php
                        if (function_exists('bcn_display') && $career_banner == true) :?>
                            <div class="breadcrumb-container">
                                <?php bcn_display(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', 'career');


endwhile; // End of the loop.
?>

<?php
get_footer();
