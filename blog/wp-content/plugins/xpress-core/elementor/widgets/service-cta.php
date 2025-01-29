<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_CTA extends Widget_Base
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
        return 'int-service-cta';
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
        return esc_html__('Service CTA', 'xpress-core');
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
            'icon',
            [
                'label' => esc_html__('Icon Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'text', [
                'label' => esc_html__('Text', 'xpress-core'),
                'type' => Controls_Manager::WYSIWYG,
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
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-service-text' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'text-c',
            [
                'label' => esc_html__('Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-service-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'link-c',
            [
                'label' => esc_html__('Link Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-service-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
                'selector' => '{{WRAPPER}} .bc-service-text',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <?php if(!empty($settings['text'])): ?>
        <div class="bc-service-text ul_li_center">
            <?php echo wp_get_attachment_image($settings['icon']['id'], 'medium'); echo wp_kses($settings['text'], true); ?>
        </div>
        <?php endif; ?>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Service_CTA());