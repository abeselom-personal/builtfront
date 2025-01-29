<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Button extends Widget_Base
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
        return 'int-button';
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
        return esc_html__('Button', 'xpress-core');
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
            'btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'xpress-core'),
                    'style_2' => __('Style 2', 'xpress-core'),
                    'style_3' => __('Style 3', 'xpress-core'),
                    'style_4' => __('Style 4', 'xpress-core'),
                ],
                'default' => 'style_1',
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
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'design_style' => 'style_2',
                ],
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
                    '{{WRAPPER}} .mr-all-link' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Text Align', 'xpress-core'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'start' => [
                        'title' => __('Left', 'xpress-core'),
                        'icon' => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'xpress-core'),
                        'icon' => 'eicon-text-align-center',
                    ],

                    'end' => [
                        'title' => __('Right', 'xpress-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .xb-btn-wrap' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .lw-btn' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .ins-btn' => 'text-align: {{VALUE}};',
                ],
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
            'btn_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .mr-all-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .mr-all-link' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn, {{WRAPPER}} .mr-all-link',
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
                    '{{WRAPPER}} .mr-all-link' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .mr-all-link' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mr-all-link' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .mr-all-link:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .mr-all-link:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h_btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business:hover' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mr-all-link:hover' => 'border-color: {{VALUE}}',
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
        $target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="xb-btn-wrap">
            <a class="mr-all-link mb-20"
               href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?>
                <span><?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?></span></a>
        </div>
    <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_3'): ?>
        <div class="lw-btn">
            <a class="xb-btn xb-btn--law has-icon"
               href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?>
                <i class="fas fa-chevron-right"></i></a>
        </div>
    <?php elseif (!empty($settings['design_style']) and $settings['design_style'] == 'style_4'): ?>
        <div class="ins-btn">
            <a class="xb-btn xb-btn--insurance" href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['btn_label']); ?></a>
        </div>
    <?php else: ?>
        <a class="xb-btn xb-btn--business"
           href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?>>
            <div class="btn-anim-wrap">
                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
            </div>
        </a>
    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Button());