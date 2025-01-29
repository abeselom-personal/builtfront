<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Team_Map extends Widget_Base
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
        return 'int-team-map';
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
        return esc_html__('Team Map', 'xpress-core');
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
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'avatar',
            [
                'label' => esc_html__('Avatar', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'avatars',
            [
                'label' => esc_html__('Add Avatar Item', 'xpress-core'),
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
            'dot1-c',
            [
                'label' => esc_html__('Animation Dot 1 Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-map__dot .dot' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .team-map__dot .dot::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'dot2-c',
            [
                'label' => esc_html__('Animation Dot 1 Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-map__dot .dot--2' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .team-map__dot .dot--2::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="team-map__inner text-center">
            <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
            <div class="team-map__avatar">
                <?php
                $i = 0;
                foreach ($settings['avatars'] as $avatar):
                    $i++;
                    ?>
                    <div class="avatar avatar--<?php echo $i; ?>">
                        <?php echo wp_get_attachment_image($avatar['avatar']['id'], 'full'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="team-map__dot">
                <span class="dot dot--1"></span>
                <span class="dot dot--2"></span>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Team_Map());