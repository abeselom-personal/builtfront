<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Hero_img extends Widget_Base
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
        return 'int-hero-img';
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
        return esc_html__('Hero Img', 'xpress-core');
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
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'scroll-id', [
                'label' => esc_html__('Scroll Down ID', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'scroll-icon',
            [
                'label' => esc_html__( 'Icon', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
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
            'scroll-bg-c',
            [
                'label' => esc_html__('Scroll Down BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-hero-shape .shape--1' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'animation-hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'animation-bg-c',
            [
                'label' => esc_html__('Animation BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-hero-explore' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="lw-hero-img">
            <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
            <div class="lw-hero-shape">
                <div class="shape shape--1" data-parallax='{"scale" : 0.1}'></div>
            </div>
            <?php if(!empty($settings['scroll-id'])): ?>
            <a href="<?php echo esc_url($settings['scroll-id']); ?>" class="lw-hero-explore scrollspy-btn">
                <div class="scroll-down"></div>
                <span><?php \Elementor\Icons_Manager::render_icon( $settings['scroll-icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
            </a>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Hero_img());