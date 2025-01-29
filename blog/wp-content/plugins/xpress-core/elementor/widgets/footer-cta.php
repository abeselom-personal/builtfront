<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Footer_CTA extends Widget_Base
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
        return 'int-footer-cta';
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
        return esc_html__('Footer CTA', 'xpress-core');
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
            'hero_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'avatar',
            [
                'label' => esc_html__('Avatar', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->add_control(
            'mail_label', [
                'label' => esc_html__('Mail Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'mail', [
                'label' => esc_html__('Mail', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_content',
            [
                'label' => esc_html__('Right Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'number_label', [
                'label' => esc_html__('Number Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'number', [
                'label' => esc_html__('Number', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'avatar2',
            [
                'label' => esc_html__('Avatar', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'icon2',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
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
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .footer-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'icon-c',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-icon-img .icon' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-icon-img .icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-bg-c',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-icon-img.style-2 .icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-icon-img.style-2 .icon:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-bg-c-2',
            [
                'label' => esc_html__('Icon 2 BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-icon-img .icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-icon-img .icon:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'label_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'label-c',
            [
                'label' => esc_html__('Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-cta__holder span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .footer-cta__holder span',
            ]
        );
        $this->add_control(
            'number_mail_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'number_mail_color',
            [
                'label' => esc_html__('NUmber & Mail Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-cta__holder h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_mail_typography',
                'selector' => '{{WRAPPER}} .footer-cta__holder h3',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="footer-cta ul_li_between">
            <div class="footer-cta__inner ul_li mt-15">
                <div class="xb-icon-img style-2 ul_li mr-35 mt-15">
                    <?php if (!empty($settings['avatar']['id'])): ?>
                        <div class="avatar">
                            <?php echo wp_get_attachment_image($settings['avatar']['id'], 'thumbnail'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                </div>
                <div class="footer-cta__holder mt-15">
                    <?php if (!empty($settings['mail_label'])): ?>
                    <span><?php echo esc_html($settings['mail_label']); ?></span>
                    <?php endif;
                    if (!empty($settings['mail'])): ?>
                        <h3><?php echo esc_html($settings['mail']); ?></h3>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer-cta__inner ul_li mt-15">
                <div class="footer-cta__holder text-end mt-15">
                    <?php if (!empty($settings['number_label'])): ?>
                        <span><?php echo esc_html($settings['number_label']); ?></span>
                    <?php endif;
                    if (!empty($settings['number'])): ?>
                        <h3><?php echo esc_html($settings['number']); ?></h3>
                    <?php endif; ?>
                </div>
                <div class="xb-icon-img ul_li ml-35 mt-15">
                    <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon2'], ['aria-hidden' => 'true']); ?>
                    </div>
                    <?php if (!empty($settings['avatar2']['id'])): ?>
                        <div class="avatar">
                            <?php echo wp_get_attachment_image($settings['avatar2']['id'], 'thumbnail'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <span class="footer-cta__line"></span>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Footer_CTA());