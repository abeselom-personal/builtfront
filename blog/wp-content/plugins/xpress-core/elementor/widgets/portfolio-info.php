<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Portfolio_Info extends Widget_Base
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
        return 'int-portfolio-info';
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
        return esc_html__('Portfolio Info', 'xpress-core');
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
            'portfolio_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'info', [
                'label' => esc_html__('Info', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists',
            [
                'label' => __('Add List Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
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
            'tt-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single__meta li strong' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .portfolio-single__meta li strong',
            ]
        );
        $this->add_control(
            'info_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'info_color',
            [
                'label' => esc_html__('Info Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single__meta li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_typography',
                'selector' => '{{WRAPPER}} .portfolio-single__meta li',
            ]
        );
        $this->add_control(
            'border_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-single__meta' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <ul class="portfolio-single__meta ul_li_between">
            <?php
            foreach ($settings['lists'] as $list):
                ?>
                <li><strong><?php echo esc_html($list['title']); ?></strong> <?php echo esc_html($list['info']); ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Portfolio_Info());