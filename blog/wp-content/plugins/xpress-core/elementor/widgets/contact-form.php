<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Contact_Form extends Widget_Base
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
        return 'int-contact-form';
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
        return esc_html__('Contact Form', 'xpress-core');
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
            'form_option',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shortcode', [
                'label' => esc_html__('Form Shortcode', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form_option_style',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'label-c',
            [
                'label' => esc_html__('Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-from label' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .contact-from label',
            ]
        );
        $this->add_control(
            'field_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'field-c',
            [
                'label' => esc_html__('Field Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-from .xb--item--field input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .contact-from .xb--item--field textarea' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field-bg-c',
            [
                'label' => esc_html__('Field BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .contact-from .xb--item--field input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .contact-from .xb--item--field textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .contact-from .xb--item--field .nice-select' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'selector' => '{{WRAPPER}} .contact-from .xb--item--field input, 
                                {{WRAPPER}} .contact-from .xb--item--field textarea,
                                {{WRAPPER}} .contact-from .xb--item--field select',
            ]
        );

        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__('Button Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn',
            ]
        );
        $this->start_controls_tabs(
            'btn_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpres-core'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hbtn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpres-core'),
            ]
        );
        $this->add_control(
            'hbtn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbtn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <?php if (!empty($settings['shortcode'])): ?>
        <div class="contact-from">
            <?php echo do_shortcode($settings['shortcode']); ?>
        </div>
    <?php endif; ?>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Contact_Form());