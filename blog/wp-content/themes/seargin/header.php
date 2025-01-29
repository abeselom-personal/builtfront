<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seargin
 */

if(get_post_meta(get_the_ID(), 'seargin_common_meta', true)) {
    $header_meta = get_post_meta(get_the_ID(), 'seargin_common_meta', true);
} else {
    $header_meta = array();
}

if( array_key_exists( 'page_header_disable', $header_meta )) {
    $page_header_disable = $header_meta['page_header_disable'];
} else {
    $page_header_disable = false;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
	<script defer data-domain="builtfront.com" src="https://plausible.io/js/script.js"></script>
	<script type="text/javascript">
		(function(c,l,a,r,i,t,y){
			c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
			t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
			y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
		})(window, document, "clarity", "script", "kva71y8vrd");
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php seargin_scroll_up_btn(); seargin_preloader(); ?>
<div id="page" class="site site_wrapper">
    <div class="seargin-main-wrap">
    <?php
    if($page_header_disable != true){
        Seargin_Helper::seargin_header_template();
    }

    ?>
