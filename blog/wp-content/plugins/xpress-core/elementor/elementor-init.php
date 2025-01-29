<?php
/**
 * All Elementor widget init
 * @package seargin
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if ( !class_exists('Seargin_Elementor_Widget_Init') ){

	class Seargin_Elementor_Widget_Init{
		/*
		* $instance
		* @since 1.0.0
		* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/register',array($this,'_widget_registered'));
			add_action('elementor/editor/after_enqueue_styles',array($this,'editor_style'));
			add_action('elementor/documents/register_controls',array($this,'register_document_controls'));
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'seargin_widgets',
				[
					'title' => __( 'Seargin Addons', 'xpress-core' ),
					'icon' => 'fa fa-plug'
				]
			);
			$elements_manager->add_category(
				'seargin_hf_widgets',
				[
					'title' => __( 'Seargin Header & Footer', 'xpress-core' ),
					'icon' => 'fa fa-plug'
				]
			);
		}
		

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(	
				
				// seargin Theme Widgets
				'hero-one',
				'hero-two',
				'sec-title',
				'feature',
				'cta',
				'service',
				'parallax-image',
				'team',
				'count-number',
				'testimonial-map',
				'testimonial',
				'contact',
				'blog',
				'footer-cta',
				'footer-links',
				'xb-social',
				'about-tab',
				'about-review',
				'service-v2',
				'service-cta',
				'image-banner',
				'portfolio',
				'xb-button',
				'cta-v2',
				'testimonial-v2',
				'testimonial-v3',
				'cta-v3',
				'blog-v2',
				'xb-logo',
				'marquee',
				'feature-v2',
				'typewriter-about',
				'client-logo',
				'service-v3',
				'project',
				'process',
				'team-v2',
				'blog-v3',
				'footer-cta-v2',
				'hero-img',
				'hero-content',
				'hero-shape',
				'service-v4',
				'feature-v3',
				'pricing',
				'project-v2',
				'team-v3',
				'contact-v2',
				'testimonial-v4',
				'blog-v4',
				'about-count',
				'service-v5',
				'team-v4',
				'testimonial-v5',
				'contact-v3',
				'brand',
				'blog-v5',
				'footer-cta-v3',
				'hero-content-v2',
				'hero-img-v2',
				'funfact',
				'service-v6',
				'author-img',
				'testimonial-v6',
				'contact-v4',
				'xb-icon-box',
				'funfact-v2',
				'marquee-v2',
				'xb-video',
				'number-list',
				'career',
				'job-apply',
				'team-v5',
				'team-map',
				'team-info',
				'skills',
				'contact-me',
				'xb-icon-box-v2',
				'pricing-tab',
				'pricing-v2',
				'faq',
				'portfolio-v2',
				'portfolio-info',
				'portfolio-v3',
				'contact-form',

				// header
				'01-header',
				'02-header',
				'03-header',
				'04-header',
				'05-header',
				'06-header',

			);

			$elementor_widgets = apply_filters('seargin_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = SEARGIN_DIR_PATH.'/elementor/widgets/'.$widget.'.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}
		}

		public function editor_style(){
			$cs_icon = plugins_url( 'icons.png', __FILE__ );
			wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .xpress-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
		}

		/**
		 * Register additional document controls.
		 *
		 * @param \Elementor\Core\DocumentTypes\PageBase $document The PageBase document instance.
		 */
		public function register_document_controls( $document ) {

			if ( ! $document instanceof \Elementor\Core\DocumentTypes\PageBase || ! $document::get_property( 'has_elements' ) ) {
				return;
			}

			$document->start_controls_section(
				'body_typography',
				[
					'label' => esc_html__( 'Body Typography', 'xpress-core' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_body_font',
					'selector' => '{{WRAPPER}}',
				]
			);
			$document->add_control(
				'body_color',
				[
					'label' => esc_html__( 'Body Color', 'xpress-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_control(
				'heading_color',
				[
					'label' => esc_html__( 'Heading Color', 'xpress-core' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} h1, h2, h3, h4, h5, h6' => 'color: {{VALUE}}',
					],
				]
			);
			$document->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'page_heading_font',
					'selector' => '{{WRAPPER}} h1, {{WRAPPER}} h2, {{WRAPPER}} h3, {{WRAPPER}} h4, {{WRAPPER}} h5, {{WRAPPER}} h6',
				]
			);

			$document->end_controls_section();
		}
	}

	if ( class_exists('Seargin_Elementor_Widget_Init') ){
		Seargin_Elementor_Widget_Init::getInstance();
	}

}//end if