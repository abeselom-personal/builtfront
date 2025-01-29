<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_About_Review extends Widget_Base
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
        return 'int-about-review';
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
        return esc_html__('About Review', 'xpress-core');
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
            'review_title', [
                'label' => esc_html__('Review Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'rating', [
                'label' => esc_html__('Rating', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'rating_icon',
            [
                'label' => esc_html__('Rating Icon', 'xpress-core'),
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
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .bc-about__revirew' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'review_text_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'review_text_c',
            [
                'label' => esc_html__('Review Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew .xb-item--review' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'review_text_bg_c',
            [
                'label' => esc_html__('Review Text BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew .xb-item--review' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'review_text_typography',
                'selector' => '{{WRAPPER}} .bc-about__revirew .xb-item--title',
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .bc-about__revirew .xb-item--title',
            ]
        );
        $this->add_control(
            'rating_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'rating-c',
            [
                'label' => esc_html__('Rating Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew .xb-item--rating' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'rating-bg-c',
            [
                'label' => esc_html__('Rating BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__revirew .xb-item--rating' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'rating_typography',
                'selector' => '{{WRAPPER}} .bc-about__revirew .xb-item--rating',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="bc-about__revirew style-3">
            <?php if (!empty($settings['review_title'])): ?>
                <span class="xb-item--review"><?php echo esc_html($settings['review_title']); ?></span>
            <?php endif; ?>
            <?php if (!empty($settings['title'])): ?>
                <h4 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h4>
            <?php endif; ?>
            <?php if (!empty($settings['title'])): ?>
                <span class="xb-item--rating"><?php echo esc_html($settings['rating']); ?><span><?php \Elementor\Icons_Manager::render_icon($settings['rating_icon'], ['aria-hidden' => 'true']); ?></span></span>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_About_Review());