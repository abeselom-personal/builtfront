<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Pricing extends Widget_Base
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
        return 'int-pricing';
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
        return esc_html__('Pricing', 'xpress-core');
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
                'label' => __('Pricing', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'price',
            [
                'label' => __('Price', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => __('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'pricing_style',
            [
                'label' => esc_html__('Pricing Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => esc_html__('Price Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-pricing .xb-item--price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'price_bg_color',
            [
                'label' => esc_html__('Price BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-pricing .xb-item--price' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'price_bg_hover_color',
            [
                'label' => esc_html__('Price Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-pricing .xb-item--inner:hover .xb-item--price' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .lw-pricing .xb-item--price',
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-pricing .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .lw-pricing .xb-item--title',
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-pricing .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .lw-pricing .xb-item--content',
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="lw-pricing xb-hover-zoom">
            <div class="xb-item--inner">
                <?php if (!empty($settings['image']['id'])): ?>
                    <div class="xb-item--img">
                        <?php echo wp_get_attachment_image($settings['image']['id'], 'medium'); ?>
                    </div>
                <?php endif; ?>
                <div class="xb-item--holder">
                    <?php if (!empty($settings['price'])): ?>
                        <span class="xb-item--price"><?php echo esc_html($settings['price']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['title'])): ?>
                        <h3 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['content'])): ?>
                        <p class="xb-item--content"><?php echo esc_html($settings['content']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Pricing());