<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_V6 extends Widget_Base
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
        return 'int-service-v6';
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
        return esc_html__('Service V6', 'xpress-core');
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
            'bg_img',
            [
                'label' => esc_html__( 'Background Image', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
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
            'srv_bg-c',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--bg svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'srv_bg-c-h',
            [
                'label' => esc_html__('Background Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--inner:hover .xb-item--bg svg path' => 'fill: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-service2 .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_border_color',
            [
                'label' => esc_html__('Icon Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--icon' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'tt-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tt-c-h',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--inner:hover .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tt_typography',
                'selector' => '{{WRAPPER}} .xb-service2 .xb-item--title',
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'cc-c',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'cc-c-h',
            [
                'label' => esc_html__('Content Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-service2 .xb-item--inner:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cc_typography',
                'selector' => '{{WRAPPER}} .xb-service2 .xb-item--content',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="xb-service2">
            <div class="xb-item--inner">
                <div class="xb-item--bg">
                    <?php \Elementor\Icons_Manager::render_icon($settings['bg_img'], ['aria-hidden' => 'true']); ?>
                </div>
                <div class="xb-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <?php if (!empty($settings['title'])): ?>
                    <h3 class="xb-item--title"><a href="<?php echo esc_url($settings['link']['url']); ?>>" <?php echo $target . $nofollow; ?>><?php echo esc_html($settings['title']); ?></a></h3>
                <?php endif; ?>
                <?php if (!empty($settings['content'])): ?>
                    <p class="xb-item--content"><?php echo wp_kses($settings['content'], true); ?> </p>
                <?php endif; ?>
                <a class="xb-overlay" href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo $target . $nofollow; ?>></a>
            </div>
        </div>

        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Service_V6());