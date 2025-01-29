<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Image_Banner extends Widget_Base
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
        return 'int-image-banner';
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
        return esc_html__('Image Banner', 'xpress-core');
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
            'bg_image',
            [
                'label' => esc_html__('BG Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'shape1',
            [
                'label' => esc_html__('Shape 1', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape2',
            [
                'label' => esc_html__('Shape 2', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape3',
            [
                'label' => esc_html__('Shape 3', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape4',
            [
                'label' => esc_html__('Shape 4', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape5',
            [
                'label' => esc_html__('Shape 5', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="bc-banner">
            <?php
            if (!empty($settings['bg_image']['id'])):
                ?>
                <div class="bc-banner__bg">
                    <?php echo wp_get_attachment_image($settings['bg_image']['id'], 'full'); ?>
                </div>
            <?php endif; ?>
            <?php
            if (!empty($settings['image']['id'])):
                ?>
                <div class="bc-banner__img">
                    <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                </div>
            <?php endif; ?>
            <div class="bc-banner__shape">
                <?php
                if (!empty($settings['shape1']['url'])):
                    ?>
                    <div class="shape shape--1">
                        <img data-parallax='{"x":-50,"y":-80}' src="<?php echo esc_url($settings['shape1']['url']); ?>"
                             alt="">
                    </div>
                <?php endif; ?>
                <?php
                if (!empty($settings['shape2']['url'])):
                    ?>
                    <div class="shape shape--2">
                        <img data-parallax='{"y": "-50", "scaleX" : 1.2, "scaleY" : 1.2}'
                             src="<?php echo esc_url($settings['shape2']['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php
                if (!empty($settings['shape3']['url'])):
                    ?>
                    <div class="shape shape--3">
                        <img data-parallax='{"x":50,"y": -80}' src="<?php echo esc_url($settings['shape3']['url']); ?>"
                             alt="">
                    </div>
                <?php endif; ?>
                <?php
                if (!empty($settings['shape4']['url'])):
                    ?>
                    <div class="shape shape--4">
                        <img data-parallax='{"y": "-50", "scaleX" : 1.2, "scaleY" : 1.2}'
                             src="<?php echo esc_url($settings['shape4']['url']); ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php
                if (!empty($settings['shape5']['url'])):
                    ?>
                    <div class="shape shape--5">
                        <img data-parallax='{"x":50,"y": -80}' src="<?php echo esc_url($settings['shape5']['url']); ?>"
                             alt="">
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Image_Banner());