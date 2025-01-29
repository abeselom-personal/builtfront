<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Funfact extends Widget_Base
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
        return 'int-funfact';
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
        return esc_html__('Funfact', 'xpress-core');
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
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
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
            'number', [
                'label' => esc_html__('Number', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'suffix', [
                'label' => esc_html__('Suffix', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
            'icon-c',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-fanfact .xb-item--icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-bg-c',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-fanfact .xb-item--icon' => 'background-color: {{VALUE}}',
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
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-fanfact .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-fanfact .xb-item--title',
            ]
        );
        $this->add_control(
            'number_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-fanfact .xb-item--number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .xb-fanfact .xb-item--number',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="xb-fanfact">
            <div class="xb-item--inner ul_li">
                <div class="xb-item--icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
                </div>
                <div class="xb-item--holder">
                    <?php if (!empty($settings['title'])): ?>
                        <span class="xb-item--title"><?php echo esc_html($settings['title']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($settings['number'])): ?>
                        <h2 class="xb-item--number"><span class="xbo"
                                                          data-count="<?php echo esc_attr($settings['number']); ?>">00</span><span
                                    class="suffix"><?php echo esc_html($settings['suffix']); ?></span></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Funfact());