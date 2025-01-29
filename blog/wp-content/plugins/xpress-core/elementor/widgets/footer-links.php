<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Footer_Links extends Widget_Base
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
        return 'int-footer-links';
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
        return esc_html__('Footer Links', 'xpress-core');
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

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'label', [
                'label' => esc_html__('Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
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
        $this->add_control(
            'lists',
            [
                'label' => esc_html__('Add List Item', 'xpress-core'),
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
            'label-c',
            [
                'label' => esc_html__('Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-links li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'label-c-hover',
            [
                'label' => esc_html__('Label Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-links li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'label_typography',
                'selector' => '{{WRAPPER}} .widget-links li a',
            ]
        );
        $this->add_control(
            'width',
            [
                'label' => esc_html__( 'Bottom Space', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 8,
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-links li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <ul class="widget-links list-unstyled">
            <?php
            foreach ($settings['lists'] as $list):
                $target = $list['link']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $list['link']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                <li><a href="<?php echo esc_url($list['link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php echo esc_html($list['label']); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Footer_Links());