<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Typewriter_About extends Widget_Base
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
        return 'int-typewriter-about';
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
        return esc_html__('Typewriter About', 'xpress-core');
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
            'typewriter_about_option',
            [
                'label' => esc_html__('Typewriter About', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'typewriter',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Typewriter', 'xpress-core'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'typewriters',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
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
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sub-title-arrow-c',
            [
                'label' => esc_html__('Sub Title Arrow Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title--marketing .subtitle::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
            ]
        );

        $this->add_control(
            'cta-box-styl',
            [
                'label' => esc_html__('Title Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sec-title .title',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .sec-title p',
            ]
        );
        $this->add_control(
            'typewriter_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'typewriter_color',
            [
                'label' => esc_html__('Typewriter Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title--marketing .title span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="sec-title sec-title--marketing">
            <?php if (!empty($settings['sub_title'])): ?>
                <span class="subtitle"><?php echo esc_html($settings['sub_title']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
            <h2 class="title"><?php echo wp_kses($settings['title'], true); ?>
                <span class="xb-title--typewriter">
                    <?php
                    foreach ($settings['typewriters'] as $typewriter):
                        ?>
                        <span class="xb-item--text highlight"><?php echo esc_html($typewriter['typewriter']); ?></span>
                    <?php endforeach; ?>
                </span>
            </h2>
            <?php endif; ?>
            <?php if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new Seargin_Typewriter_About());