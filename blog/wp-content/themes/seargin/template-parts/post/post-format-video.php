<?php
if ( get_post_meta( $post->ID, 'seargin_video_post_format_meta', true ) ) {
	$video_meta = get_post_meta( $post->ID, 'seargin_video_post_format_meta', true );
} else {
	$video_meta = array();
}

if ( array_key_exists( 'post_video_url', $video_meta ) && ! empty( $video_meta['post_video_url'] ) ) {
	$video_url = $video_meta['post_video_url'];
} else {
	$video_url = '';
}
?>

<?php if ( has_post_thumbnail() ) : ?>
    <div class="post-thumbnail-wrapper">
        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'seargin-large' ) ?>"
             alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">

		<?php if ( $video_url ): ?>
            <a href="<?php echo esc_url( $video_url ); ?>" class="video-icon popup-video">
                <i class="fas fa-play"></i>
            </a>
		<?php endif; ?>

    </div>
<?php endif; ?>