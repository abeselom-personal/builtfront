<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Testimonial extends Widget_Base
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
        return 'int-testimonial';
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
        return esc_html__('Testimonial', 'xpress-core');
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
            'quote',
            [
                'label' => esc_html__('Quote', 'xpress-core'),
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'trustpilot',
            [
                'label' => esc_html__('Trustpilot Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'rating', [
                'label' => esc_html__('Trustpilot Rating', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
            'bg-c',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'border-c',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--inner::before' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'quote_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'quote_bg-c',
            [
                'label' => esc_html__('Quote BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--quote' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'quote-border-c',
            [
                'label' => esc_html__('Quote BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--quote' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial1 .xb-item--name',
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
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--desig' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial1 .xb-item--desig',
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
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial1 .xb-item--content',
            ]
        );
        $this->add_control(
            'rating_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'rating_color',
            [
                'label' => esc_html__('Rating Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-testimonial1 .xb-item--bottom span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rating_typography',
                'selector' => '{{WRAPPER}} .xb-testimonial1 .xb-item--bottom span',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="xb-swiper-sliders">
            <div class="xb-carousel-inner">
                <div class="xb-testimonial-sldier xb-swiper-container swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($settings['testimonials'] as $testimonial):
                            ?>
                            <div class="xb-swiper-slide swiper-slide xb-testimonial xb-testimonial1">
                                <div class="xb-item--inner">
                                    <?php if (!empty($testimonial['image']['id'])): ?>
                                        <div class="xb-item--avatar">
                                            <?php echo wp_get_attachment_image($testimonial['image']['id'], 'thumbnail'); ?>
                                            <div class="xb-item--quote">
                                                <?php echo wp_get_attachment_image($testimonial['quote']['id'], 'thumbnail'); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="xb-item--author mb-45">
                                        <?php if (!empty($testimonial['name'])): ?>
                                            <h3 class="xb-item--name"><?php echo esc_html($testimonial['name']); ?></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($testimonial['desig'])): ?>
                                            <span class="xb-item--desig"><?php echo esc_html($testimonial['desig']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($testimonial['content'])): ?>
                                        <div class="xb-item--content mb-40">
                                            <?php echo wp_kses($testimonial['content'], true); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="xb-item--bottom ul_li_between">
                                        <?php echo wp_get_attachment_image($testimonial['trustpilot']['id'], 'thumbnail'); ?>
                                        <?php if (!empty($testimonial['rating'])): ?>
                                            <span><?php echo esc_html($testimonial['rating']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="pagination-style1 swiper-pagination"></div>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Testimonial());