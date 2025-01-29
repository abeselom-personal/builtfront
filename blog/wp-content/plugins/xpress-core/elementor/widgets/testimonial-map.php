<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Testimonial_Map extends Widget_Base
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
        return 'int-testimonial-map';
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
        return esc_html__('Testimonial Map', 'xpress-core');
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
            'count_number_option',
            [
                'label' => esc_html__('Count Number', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'map', [
                'label' => esc_html__('Map Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
            'dot_1_clr',
            [
                'label' => esc_html__('Dot Color One', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-map__dot .dot' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-map__dot .dot:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'dot_2_clr',
            [
                'label' => esc_html__('Dot Color Two', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-map__dot .dot--2' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .testimonial-map__dot .dot--2:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="testimonial-map">
            <?php echo wp_get_attachment_image($settings['map']['id'], 'full'); ?>
            <div class="testimonial-map__dot">
                <span class="dot dot--1"></span>
                <span class="dot dot--2"></span>
            </div>
        </div>

        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Testimonial_Map());