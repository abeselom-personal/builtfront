<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Testimonial_V4 extends Widget_Base
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
        return 'int-testimonial-v4';
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
        return esc_html__('Testimonial V4', 'xpress-core');
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
            'avatar',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
            'ratting', [
                'label' => esc_html__('Ratting Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'date', [
                'label' => esc_html__('Date', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
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
                    '{{WRAPPER}} .lw-testimonial .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-testimonial .xb-item--inner' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .lw-testimonial .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .lw-testimonial .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .lw-testimonial .xb-item--name',
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
                    '{{WRAPPER}} .lw-testimonial .xb-item--desig' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .lw-testimonial .xb-item--desig',
            ]
        );
        $this->add_control(
            'date_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => esc_html__('Date Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-testimonial .xb-item--date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .lw-testimonial .xb-item--date',
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
                    '{{WRAPPER}} .lw-testimonial .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .lw-testimonial .xb-item--content',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="lw-testimonial-sliders">
            <div class="xb-carousel-inner">
                <div class="lw-testimonial-slider xb-swiper-container swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($settings['testimonials'] as $testimonial):
                            ?>
                            <div class="lw-testimonial swiper-slide xb-swiper-slide">
                                <div class="xb-item--inner">
                                    <div class="xb-item--author ul_li">
                                        <?php if (!empty($testimonial['avatar']['id'])): ?>
                                            <div class="xb-item--avatar">
                                                <?php echo wp_get_attachment_image($testimonial['avatar']['id'], 'thumbnail'); ?>
                                                <span class="xb-item--check"><i class="fas fa-check"></i></span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="xb-item--author-info">
                                            <?php if (!empty($testimonial['name'])): ?>
                                                <h3 class="xb-item--name"><?php echo esc_html($testimonial['name']); ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($testimonial['desig'])): ?>
                                                <span class="xb-item--desig"><?php echo esc_html($testimonial['desig']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="xb-item--holder">
                                        <div class="xb-item--meta ul_li_between">
                                            <?php echo wp_get_attachment_image($testimonial['ratting']['id'], 'medium'); ?>
                                            <?php if (!empty($testimonial['date'])): ?>
                                                <span class="xb-item--date"><?php echo esc_html($testimonial['date']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if (!empty($testimonial['content'])): ?>
                                            <div class="xb-item--content">
                                                <?php echo wp_kses($testimonial['content'], true); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Testimonial_V4());