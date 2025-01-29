<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Funfact_V2 extends Widget_Base
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
        return 'int-funfact-v2';
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
        return esc_html__('Funfact V2', 'xpress-core');
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
            'video_option',
            [
                'label' => esc_html__('Video', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'video', [
                'label' => esc_html__('Upload Video', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'poster', [
                'label' => esc_html__('Upload Poster Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __('Loop', 'xpress-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'xpress-core'),
                'label_off' => __('No', 'xpress-core'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay', 'xpress-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'xpress-core'),
                'label_off' => __('No', 'xpress-core'),
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'muted',
            [
                'label' => __('Muted', 'xpress-core'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'xpress-core'),
                'label_off' => __('No', 'xpress-core'),
                'default' => 'yes',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'number', [
                'label' => esc_html__('Number', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'suffix', [
                'label' => esc_html__('Suffix', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => __('Add Funfact Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->add_control(
            'shape_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'shape1', [
                'label' => esc_html__('Shape Left', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape2', [
                'label' => esc_html__('Shape Right', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
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
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-fanfact__inner::before' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-fanfact__inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .xb-fanfact2 .number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .xb-fanfact2 .number',
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
                    '{{WRAPPER}} .xb-fanfact2 > span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-fanfact2 > span',
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
                    '{{WRAPPER}} .xb-fanfact2' => 'border-color: {{VALUE}}',
                ],
            ]
        );


        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $video_file = $settings['video'];
        $video_poster = $settings['poster'];
        $loop = $settings['loop'] == 'yes' ? 'loop ' : '';
        $autoplay = $settings['autoplay'] == 'yes' ? 'autoplay ' : '';
        $muted = $settings['muted'] == 'yes' ? 'muted ' : '';
        ?>

        <section class="fanfact">
            <?php if (!empty($video_file['url'])): ?>
                <video class="fanfact-video"
                       src="<?php echo esc_url($video_file['url']); ?>" <?php echo $loop . $autoplay . $muted; ?>
                       poster="<?php echo esc_url($video_poster['url']); ?>"></video>
            <?php endif; ?>
            <div class="container pos-rel">
                <div class="xb-fanfact__inner ul_li_between">
                    <?php
                    foreach ($settings['lists'] as $list):
                        ?>
                        <div class="xb-fanfact2">
                            <h3 class="number"><span class="xbo" data-count="<?php echo esc_attr($list['number']); ?>">00</span><span
                                        class="suffix"><?php echo esc_html($list['suffix']); ?></span>
                            </h3>
                            <?php if (!empty($list['title'])): ?>
                                <span><?php echo esc_html($list['title']); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;
                    ?>

                    <div class="xb-fanfact__shape">
                        <?php if (!empty($settings['shape1']['id'])): ?>
                            <div class="shape shape--1">
                                <?php echo wp_get_attachment_image($settings['shape1']['id'], 'medium'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['shape1']['id'])): ?>
                            <div class="shape shape--2">
                                <?php echo wp_get_attachment_image($settings['shape2']['id'], 'medium'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Funfact_V2());