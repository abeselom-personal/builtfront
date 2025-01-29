<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_CTA_V2 extends Widget_Base
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
        return 'int-cta-v2';
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
        return esc_html__('CTA V2', 'xpress-core');
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

        $this->add_control(
            'btn_options',
            [
                'label' => esc_html__('Button Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_label', [
                'label' => esc_html__('Button Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_width',
            [
                'label' => esc_html__('Width', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'barnd_logo_option',
            [
                'label' => esc_html__('Brand Logo', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'logo1', [
                'label' => esc_html__('Logo 1', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo2', [
                'label' => esc_html__('Logo 2', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo3', [
                'label' => esc_html__('Logo 3', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo4', [
                'label' => esc_html__('Logo 4', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo5', [
                'label' => esc_html__('Logo 5', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo6', [
                'label' => esc_html__('Logo 6', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo7', [
                'label' => esc_html__('Logo 7', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo8', [
                'label' => esc_html__('Logo 8', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo9', [
                'label' => esc_html__('Logo 9', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'logo10', [
                'label' => esc_html__('Logo 10', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'shape_option',
            [
                'label' => esc_html__('Shape', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shape', [
                'label' => esc_html__('Shape', 'xpress-core'),
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
            'button_style',
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
        $this->add_control(
            'btn_radius',
            [
                'label' => esc_html__('Border Radius', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpress-core'),
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
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
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpress-core'),
            ]
        );

        $this->add_control(
            'h_btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'border-color: {{VALUE}}',
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

        <div class="bc-cta pos-rel">
            <div class="container">
                <div class="sec-title sec-title--md sec-title--business text-center mb-35">
                    <?php if (!empty($settings['title'])): ?>
                        <h2 class="title text-50"><?php echo wp_kses($settings['title'], true); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($settings['content'])): ?>
                        <p class="text-default"><?php echo wp_kses($settings['content'], true); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <?php if (!empty($settings['btn_label'])): ?>
                    <div class="bc-cta__btn text-center">
                        <a class="xb-btn xb-btn--business btn-black"
                           href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                            <div class="btn-anim-wrap">
                                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="bc-cta-img-wrap">
                    <div class="bc-cta-img scene_1">
                        <?php if (!empty($settings['logo1']['id'])): ?>
                            <div class="shape shape--1">
                                <div class="layer" data-depth="0.2">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo1']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo2']['id'])): ?>
                            <div class="shape shape--2">
                                <div class="layer" data-depth="0.1">
                                    <div class="shape-inner" data-parallax='{"y" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo2']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo3']['id'])): ?>
                            <div class="shape shape--3">
                                <div class="layer" data-depth="0.2">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo3']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo4']['id'])): ?>
                            <div class="shape shape--4">
                                <div class="layer" data-depth="0.1">
                                    <div class="shape-inner" data-parallax='{"y" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo4']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo5']['id'])): ?>
                            <div class="shape shape--5">
                                <div class="layer" data-depth="0.3">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo5']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="bc-cta-img style-2 scene_2">
                        <?php if (!empty($settings['logo6']['id'])): ?>
                            <div class="shape shape--1">
                                <div class="layer" data-depth="0.2">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo6']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo7']['id'])): ?>
                            <div class="shape shape--2">
                                <div class="layer" data-depth="0.1">
                                    <div class="shape-inner" data-parallax='{"y" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo7']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo8']['id'])): ?>
                            <div class="shape shape--3">
                                <div class="layer" data-depth="0.2">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo8']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo9']['id'])): ?>
                            <div class="shape shape--4">
                                <div class="layer" data-depth="0.1">
                                    <div class="shape-inner" data-parallax='{"y" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo9']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                        if (!empty($settings['logo10']['id'])): ?>
                            <div class="shape shape--5">
                                <div class="layer" data-depth="0.2">
                                    <div class="shape-inner" data-parallax='{"x" : 30}'>
                                        <?php echo wp_get_attachment_image($settings['logo10']['id'], 'medium') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                if (!empty($settings['shape']['id'])): ?>
                    <div class="bc-cta__shape">
                        <?php echo wp_get_attachment_image($settings['shape']['id'], 'full') ?>
                    </div>
                <?php endif; ?>
                <div class="bc-cta__dot">
                    <span class="dot dot--1"></span>
                    <span class="dot dot--2"></span>
                    <span class="dot dot--3"></span>
                    <span class="dot dot--4"></span>
                    <span class="dot dot--5"></span>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_CTA_V2());