<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Clinet_Logo extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'int-client-logo';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Clinet Logo', 'xpress-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'xpress-custom-icon';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['seargin_widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logos',
            [
                'label' => esc_html__('Add Logo Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );

        $this->add_control(
            'posX',
            [
                'label' => esc_html__('Parallax', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'step' => 5,
            ]
        );
        $this->add_control(
            'has-bg',
            [
                'label' => esc_html__('Enable Background', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'mt_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .client-section__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'mt_border_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'mt_border_c',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .client-section__item' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'mt_wh_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'xpress-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .client-section__item' => 'min-width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'xpress-core' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .client-section__item' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="client-section__inner d-flex <?php if ($settings['has-bg'] == "yes"): ?> has-bg <?php endif; ?>" <?php if(!empty($settings['posX'])) { ?> data-parallax='{"x": "<?php echo esc_attr($settings['posX']) ?>"}' <?php } ?> >
            <?php
            foreach ($settings['logos'] as $logo):
                ?>
                <div class="client-section__item">
                    <?php echo wp_get_attachment_image($logo['image']['id'], 'thumbnail'); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Clinet_Logo());