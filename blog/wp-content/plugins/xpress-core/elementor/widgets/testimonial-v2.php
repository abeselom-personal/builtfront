<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Testimonial_V2 extends Widget_Base
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
        return 'int-testimonial-v2';
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
        return esc_html__('Testimonial V2', 'xpress-core');
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
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'quote_icon',
            [
                'label' => esc_html__('Quote Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'name', [
                'label' => esc_html__('Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'desig', [
                'label' => esc_html__('Designation', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'quote',
            [
                'label' => esc_html__('BG Quote', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'testimonials',
            [
                'label' => esc_html__('Add Testimonial Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_setting',
            [
                'label' => esc_html__('Nav Setting', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__('Show Arrow', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'bg-c',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border-c',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--inner::after' => 'background-color: {{VALUE}}',
                ],
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
                    '{{WRAPPER}} .bc-testimonial .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .bc-testimonial .xb-item--content',
            ]
        );

        $this->add_control(
            'quote_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'quote-c',
            [
                'label' => esc_html__('Quote Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--quote-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'quote_bg-c',
            [
                'label' => esc_html__('Quote BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--quote-icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'name_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'name_color',
            [
                'label' => esc_html__('Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .bc-testimonial .xb-item--name',
            ]
        );
        $this->add_control(
            'desig_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'desig_color',
            [
                'label' => esc_html__('Designation Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--desig' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .bc-testimonial .xb-item--desig',
            ]
        );
        $this->add_control(
            'circle_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'circle_color',
            [
                'label' => esc_html__('Circle BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-testimonial .xb-item--circle' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => esc_html__('Nav Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-carousel-button .xb-swiper-arrow' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_bg_color',
            [
                'label' => esc_html__('Nav BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-carousel-button .xb-swiper-arrow' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav_bg_hvoer_color',
            [
                'label' => esc_html__('Nav Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-carousel-button .xb-swiper-arrow:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="bc-testimonial__inner">
            <div class="bc-service-slider">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($settings['testimonials'] as $testimonial):
                        ?>
                        <div class="swiper-slide bc-testimonial">
                            <div class="xb-item--inner">
                                <?php if (!empty($testimonial['content'])): ?>
                                    <div class="xb-item--content">
                                        <?php echo wp_kses($testimonial['content'], true); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($testimonial['image']['id'])): ?>
                                    <div class="xb-item--img">
                                        <?php echo wp_get_attachment_image($testimonial['image']['id'], 'large'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="xb-item--author">

                                    <?php if (!empty($testimonial['quote_icon']['value']) || !empty($testimonial['quote_icon']['value']['url'])) { ?>
                                        <span class="xb-item--quote-icon"><?php \Elementor\Icons_Manager::render_icon($testimonial['quote_icon'], ['aria-hidden' => 'true']); ?></span>
                                    <?php } ?>
                                    <?php if (!empty($testimonial['name'])): ?>
                                        <h3 class="xb-item--name"><?php echo esc_html($testimonial['name']); ?></h3>
                                    <?php endif; ?>

                                    <?php if (!empty($testimonial['desig'])): ?>
                                        <span class="xb-item--desig"><?php echo esc_html($testimonial['desig']); ?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($testimonial['quote']['id'])): ?>
                                    <div class="xb-item--quote">
                                        <?php echo wp_get_attachment_image($testimonial['quote']['id'], 'medium'); ?>
                                    </div>
                                <?php endif; ?>
                                <span class="xb-item--circle"></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            if ($settings['show_nav'] == true):
                ?>
                <div class="bc-testimonial__carousel bc-carousel-button">
                    <div class="xb-swiper-arrow xb-swiper-arrow-prev"><i class="fal fa-long-arrow-left"></i></div>
                    <div class="xb-swiper-arrow xb-swiper-arrow-next"><i class="fal fa-long-arrow-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Testimonial_V2());