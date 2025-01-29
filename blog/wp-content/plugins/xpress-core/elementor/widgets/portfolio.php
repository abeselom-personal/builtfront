<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Portfolio extends Widget_Base
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
        return 'int-portfolio';
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
        return esc_html__('Portfolio', 'xpress-core');
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
            'sec_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'port_cat_option',
            [
                'label' => esc_html__('Portfolio Category', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'cat_title',
            [
                'label' => __('Category Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('', 'xpress-core'),
            ]
        );
        $repeater->add_control(
            'cat_id',
            [
                'label' => __('Category ID', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('all', 'xpress-core'),
            ]
        );
        $this->add_control(
            'cat_list',
            [
                'label' => esc_html__('Add Cat Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ cat_title }}}',
            ],
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'port_list_item',
            [
                'label' => __('Portfolio List', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'port_img', [
                'label' => __('Portfolio Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'port_id',
            [
                'label' => __('Portfolio Category ID', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('1', 'xpress-core'),
            ]
        );
        $repeater->add_control(
            'port_cat_title',
            [
                'label' => __('Category Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'port_title',
            [
                'label' => __('Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'port_content',
            [
                'label' => __('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $repeater->add_control(
            'port_btn',
            [
                'label' => __('Portfolio Button', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'port_link', [
                'label' => __('Link', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->add_control(
            'port_list',
            [
                'label' => __('Portfolio List', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ port_cat_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'sec_title_style',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title--business .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .sec-title--business .title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_cat_style',
            [
                'label' => esc_html__('Portfolio Category', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_padding',
            [
                'label' => esc_html__('Nav Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_typography',
                'selector' => '{{WRAPPER}} .bc-portfolio__menu button',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'nav-c',
            [
                'label' => esc_html__('Nav Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav-border-c',
            [
                'label' => esc_html__('Nav Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav-bg-c',
            [
                'label' => esc_html__('Nav BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'h-nav-c',
            [
                'label' => esc_html__('Nav Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-portfolio__menu button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-nav-border-c',
            [
                'label' => esc_html__('Nav Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .bc-portfolio__menu button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-nav-bg-c',
            [
                'label' => esc_html__('Nav BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio__menu button.active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .bc-portfolio__menu button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_list_style',
            [
                'label' => esc_html__('Portfolio List', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'port_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port_border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--inner' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'port_cat_title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'cat_title_color',
            [
                'label' => esc_html__('Category Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--cat' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cat_title_typography',
                'selector' => '{{WRAPPER}} .bc-portfolio .xb-item--cat',
            ]
        );
        $this->add_control(
            'port_title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'port_title_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'port_title_typography',
                'selector' => '{{WRAPPER}} .bc-portfolio .xb-item--title',
            ]
        );
        $this->add_control(
            'port_content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'port_content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-portfolio .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'port_content_typography',
                'selector' => '{{WRAPPER}} .bc-portfolio .xb-item--content',
            ]
        );
        $this->add_control(
            'port_btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'port_btn_padding',
            [
                'label' => esc_html__('Button Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'port_btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn--business',
            ]
        );

        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        $this->start_controls_tab(
            'btn_style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'port-btn-c',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port-btn-bg-c',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'h-port-btn-c',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-port-btn-bg-c',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--business:hover' => 'background-color: {{VALUE}}',
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

        <div class="ul_li_between mb-30 wow fadeInUp" data-wow-duration="600ms">
            <?php if (!empty($settings['title'])): ?>
                <div class="sec-title sec-title--business mb-25">
                    <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
                </div>
            <?php endif; ?>
            <div class="bc-portfolio__menu portfolio-menu">
                <button class="active" data-filter="*"><?php echo esc_html__('SEE ALL', 'xpress-core') ?></button>
                <?php foreach ($settings['cat_list'] as $cat): ?>
                    <button data-filter=".<?php echo esc_attr($cat['cat_id']) ?>"
                            class=""><?php echo esc_html($cat['cat_title']); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row bc-portfolio__inner grid">
            <?php
            foreach ($settings['port_list'] as $port):
                ?>
                <div class="col-12 grid-item <?php echo esc_attr($port['port_id']); ?>">
                    <div class="bc-portfolio">
                        <div class="xb-item--inner ul_li wow fadeInUp" data-wow-duration="600ms">
                            <div class="xb-item--holder">
                                <?php if (!empty($port['port_cat_title'])): ?>
                                    <span class="xb-item--cat"><?php echo esc_html($port['port_cat_title']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($port['port_title'])): ?>
                                    <h2 class="xb-item--title mb-30"><a
                                                href="<?php echo esc_html($port['port_link']['url']); ?>"><?php echo esc_html($port['port_title']); ?></a>
                                    </h2>
                                <?php endif; ?>
                                <?php if (!empty($port['port_content'])): ?>
                                    <p class="xb-item--content mb-35"><?php echo wp_kses($port['port_content'], true); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($port['port_btn'])): ?>
                                    <a class="xb-btn xb-btn--business btn-black"
                                       href="<?php echo esc_html($port['port_link']['url']); ?>">
                                        <div class="btn-anim-wrap">
                                            <span class="button-text"><?php echo esc_html($port['port_btn']); ?></span>
                                            <span class="button-text"><?php echo esc_html($port['port_btn']); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="xb-item--img">
                                <?php echo wp_get_attachment_image($port['port_img']['id'], 'large'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Portfolio());