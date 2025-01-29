<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_CTA extends Widget_Base
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
        return 'int-cta';
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
        return esc_html__('CTA', 'xpress-core');
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
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
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
            'number', [
                'label' => esc_html__('Number', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
        $this->add_control(
            'icon_img',
            [
                'label' => esc_html__('Icon Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
                    '{{WRAPPER}} .xb-icon-img .icon' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-icon-img .icon:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'number_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'number-c',
            [
                'label' => esc_html__('Number Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-cta .xb-item--number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .xb-cta .xb-item--number',
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
                    '{{WRAPPER}} .xb-cta .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .xb-cta .xb-item--content',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="xb-cta">
            <div class="xb-item--inner ul_li_between">
                <div class="xb-icon-img ul_li mt-15">
                    <div class="icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                    </div>
                    <?php if (!empty($settings['avatar']['id'])): ?>
                        <div class="avatar">
                            <?php echo wp_get_attachment_image($settings['avatar']['id'], 'thumbnail'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['number'])): ?>
                    <h3 class="xb-item--number mt-15"><?php echo esc_html($settings['number']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($settings['content'])): ?>
                    <p class="xb-item--content mt-15"><?php echo wp_kses($settings['content'], true); ?></p>
                <?php endif; ?>
                <?php if (!empty($settings['icon_img']['id'])): ?>
                    <div class="xb-item--icon mt-15">
                        <?php echo wp_get_attachment_image($settings['icon_img']['id'], 'thumbnail'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_CTA());