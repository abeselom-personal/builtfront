<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_V5 extends Widget_Base
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
        return 'int-service-v5';
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
        return esc_html__('Service V5', 'xpress-core');
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
            'icon', [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'arrow_icon',
            [
                'label' => esc_html__('Arrow Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
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
                    '{{WRAPPER}} .ins-service .xb-item--inner' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .ins-service .xb-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'icon_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-service .xb-item--icon' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .ins-service .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tt_typography',
                'selector' => '{{WRAPPER}} .ins-service .xb-item--title',
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
                    '{{WRAPPER}} .ins-service .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cc_typography',
                'selector' => '{{WRAPPER}} .ins-service .xb-item--content',
            ]
        );
        $this->add_control(
            'link_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'link-c',
            [
                'label' => esc_html__('Link Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-service .xb-item--link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'link-bg-c',
            [
                'label' => esc_html__('Link BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-service .xb-item--link' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'link-h-bg-c',
            [
                'label' => esc_html__('Link Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-service .xb-item--inner:hover .xb-item--link' => 'background-color: {{VALUE}}',
                ],
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
        <div class="ins-service">
            <div class="xb-item--inner ul_li">
                <?php if (!empty($settings['icon']['id'])): ?>
                    <div class="xb-item--icon">
                        <?php echo wp_get_attachment_image($settings['icon']['id'], 'thumbnail'); ?>
                    </div>
                <?php endif; ?>
                <div class="xb-item--holder">
                    <?php if (!empty($settings['title'])): ?>
                        <h3 class="xb-item--title"><?php echo esc_html($settings['title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['content'])): ?>
                        <p class="xb-item--content"><?php echo wp_kses($settings['content'], true); ?> </p>
                    <?php endif; ?>
                </div>
                <a class="xb-item--link" href="<?php echo esc_url($settings['link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon( $settings['arrow_icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
                <a class="xb-overlay" href="<?php echo esc_url($settings['link']['url']); ?>" <?php echo $target . $nofollow; ?> ></a>
            </div>
        </div>

        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Service_V5());