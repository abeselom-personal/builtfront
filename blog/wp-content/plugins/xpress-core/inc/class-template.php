<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * seargin Theme Helper
 *
 *
 * @class        seargin_Helper
 * @version      1.0
 * @category 	 Class
 * @author       ThemeTags
 */

if ( ! class_exists( 'seargin_helper' ) ) {
	class seargin_helper {

		/**
		 * [header Template Get]
		 *
		 * @return  [type]  [return description]
		 */
		public static function seargin_get_header_type(){
			$header = ['' => esc_html__( 'Default', 'xpress-core' ) ];
			$headers = get_posts(
				[
					'posts_per_page' => - 1,
					'post_type'      => 'seargin_template',
					'orderby'        => 'name',
					'order'          => 'ASC',
					'meta_query' => array(
						array(
							'key'       => 'seargin_template_type',
							'value'     => 'tf_header_key',
							'compare'   => '='
						)
					)
				]
			);
			foreach ($headers as  $value) {
				$header[$value->ID] = $value->post_title;
			}
			return $header;
		}

		/**
		 * [Render Header Template]
		 *
		 * @param   [type]  $header_style  [$header_style description]
		 *
		 * @return  [type]                 [return description]
		 */
		public static function seargin_render_header($header_style){
			$elementor_instance = Elementor\Plugin::instance();
			return $elementor_instance->frontend->get_builder_content_for_display( $header_style );
		}
	}

	// Instantiate theme
	new seargin_helper();
}