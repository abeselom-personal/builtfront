<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Seargin
 */

get_header();

$error_banner      = seargin_option('error_banner', true);
$error_banner_title = seargin_option('error_page_title');
$banner_text_align = seargin_option('banner_default_text_align', 'start');
$error_img = seargin_option('error_img');
$not_found_text     = seargin_option('not_found_text');
$go_back_home       = seargin_option('go_back_home', true);

?>

<?php if($error_banner == true) : ?>
    <div class="breadcrumb error-page-banner pos-rel">
        <div class="container">
            <div class="col-lg-9">
                <div class="breadcrumb__content text-<?php echo esc_attr( $banner_text_align ); ?>">
                    <h2 class="breadcrumb__title">
                        <?php echo esc_html($error_banner_title); ?>
                    </h2>

                    <?php if ( function_exists( 'bcn_display' ) ) :?>
                        <div class="breadcrumb-container">
                            <?php bcn_display();?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

    <div id="primary" class="content-area pt-150 pb-150">
        <div class="container not-found-content">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="contant-wrapper text-center">
                        <div class="error-page__img mb-60">
                            <img src="<?php if(!empty($error_img['url'])){ echo esc_url($error_img['url']);}else{echo esc_url(get_template_directory_uri() . '/assets/img/img_404.png');}?>" alt="<?php esc_attr_e( '404', 'seargin' );?>" />
                        </div>
                        <div class="error-page__content mb-50">
                            <?php
                            if (!empty($not_found_text)) {
                                echo wp_kses( $not_found_text, array(
                                    'a'      => array(
                                        'href'   => array(),
                                        'target' => array()
                                    ),
                                    'strong' => array(),
                                    'small'  => array(),
                                    'span'   => array(),
                                    'p'   => array(),
                                    'h1'   => array(),
                                    'h2'   => array(),
                                    'h3'   => array(),
                                    'h4'   => array(),
                                    'h5'   => array(),
                                    'h6'   => array(),
                                ) );
                            }else {
                                ?>
                                <h2><?php esc_html_e( 'Hi 👋 Sorry We Can’t Find That Page!', 'seargin') ?></h2>
                                <p><?php esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'seargin') ?></p>
                                <?php
                            }
                            ?>

                            <?php if ($go_back_home == true) : ?>
                                <div class="error-page-button">
                                    <a class="xb-btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Go Back Home', 'seargin') ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #primary -->

<?php
get_footer();