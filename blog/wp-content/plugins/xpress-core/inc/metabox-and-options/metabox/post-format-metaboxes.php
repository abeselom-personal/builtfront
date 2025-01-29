<?php
// Video Post Meta
$seargin_video_post_meta = 'seargin_video_post_format_meta';

CSF::createMetabox( $seargin_video_post_meta, array(
	'title'        => esc_html__('Video Post Format Options', 'xpress-core' ),
	'post_type'    => 'post',
	'post_formats' => array('video'),
) );

CSF::createSection( $seargin_video_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'post_video_url',
			'type'  => 'text',
			'title' => esc_html__('Video URL', 'xpress-core' ),
			'desc'    => esc_html__( 'Paste video URL here', 'xpress-core' ),
		),

	)
));

// Audio Post Meta
$seargin_audio_post_meta = 'audio_post_format_meta';

CSF::createMetabox( $seargin_audio_post_meta, array(
	'title'        => esc_html__('Audio Post Format Options', 'xpress-core' ),
	'post_type'    => 'post',
	'post_formats' => array('audio'),
) );

CSF::createSection( $seargin_audio_post_meta, array(
	'fields' => array(

		array(
			'id'    => 'audio_embed_code',
			'type'  => 'code_editor',
			'settings' => array(
				'theme'  => 'monokai',
				'mode'   => 'htmlmixed',
			),
			'title' => esc_html__('Audio Embed Code', 'xpress-core' ),
			'desc'    => esc_html__( 'Paste sound cloud audio embed code here', 'xpress-core' ),
		),

	)
));


// Gallery Post Meta
$seargin_gallery_post_meta = 'gallery_post_format_meta';

CSF::createMetabox( $seargin_gallery_post_meta, array(
	'title'        => esc_html__('Gallery Post Format Options', 'xpress-core' ),
	'post_type'    => 'post',
	'post_formats' => array('gallery'),
) );

CSF::createSection( $seargin_gallery_post_meta, array(
	'fields' => array(

		array(
			'id'          => 'post_gallery_images',
			'type'        => 'gallery',
			'title' => esc_html__('Gallery Images', 'xpress-core' ),
			'add_title'   => esc_html__('Upload Gallery Images', 'xpress-core'),
			'edit_title'  => esc_html__('Edit Gallery Images', 'xpress-core'),
			'clear_title' => esc_html__('Remove Gallery Images', 'xpress-core'),
			'desc'    => esc_html__( 'Upload gallery images from here', 'xpress-core' ),
		),

	)
));