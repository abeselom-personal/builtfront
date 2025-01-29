<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Contact_V3 extends Widget_Base
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
        return 'int-contact-v3';
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
        return esc_html__('Contact V3', 'xpress-core');
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
            'image_option',
            [
                'label' => esc_html__('Background Image', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'bg_image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
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

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form_option',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shortcode', [
                'label' => esc_html__('Form Shortcode', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'locations_option',
            [
                'label' => esc_html__('Locations Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'map', [
                'label' => esc_html__('Map Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'active',
            [
                'label' => esc_html__( 'Active', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'xpress-core' ),
                'label_off' => esc_html__( 'Hide', 'xpress-core' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'map_dot', [
                'label' => esc_html__('Map Dot', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'map_flag', [
                'label' => esc_html__('Map Flag', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'loc', [
                'label' => esc_html__('Location', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'locations',
            [
                'label' => esc_html__('Add Location Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
            ]
        );

        $this->add_control(
            'title-style',
            [
                'label' => esc_html__('Title Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttile_typography',
                'selector' => '{{WRAPPER}} .sec-title .title',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'form_option_style',
            [
                'label' => esc_html__('Form', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-contact-form__wrap' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bg_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ins-contact-form__wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'field_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'field-c',
            [
                'label' => esc_html__('Field Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-contact-form .xb-item--field input' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ins-contact-form .xb-item--field textarea' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field-bg-c',
            [
                'label' => esc_html__('Field BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ins-contact-form .xb-item--field input' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ins-contact-form .xb-item--field textarea' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .ins-contact-form .xb-item--field .nice-select' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'selector' => '{{WRAPPER}} .ins-contact-form .xb-item--field input, 
                                {{WRAPPER}} .ins-contact-form .xb-item--field textarea,
                                {{WRAPPER}} .ins-contact-form .xb-item--field select',
            ]
        );

        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__('Button Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn',
            ]
        );
        $this->start_controls_tabs(
            'btn_tabs'
        );

        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpres-core'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
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
                ],
            ]
        );
        $this->add_control(
            'btn_icon_color',
            [
                'label' => esc_html__('Button Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--law.has-icon i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hbtn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpres-core'),
            ]
        );
        $this->add_control(
            'hbtn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbtn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--law.has-icon::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbtn_icon_color',
            [
                'label' => esc_html__('Button Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover i' => 'color: {{VALUE}}',
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

        <section class="contact br-20 pos-rel pt-140 pb-140 bg_img" <?php if (!empty($settings['bg_image']['url'])): ?>
                 style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>') <?php endif; ?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7">
                        <div class="ins-contact-form__wrap">
                            <div class="sec-title sec-title--ins mb-45">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <span class="subtitle"><?php echo esc_html($settings['sub_title']); ?></span>
                                <?php endif;
                                if (!empty($settings['title'])): ?>
                                    <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['shortcode'])): ?>
                                <div class="ins-contact-form">
                                    <?php echo do_shortcode($settings['shortcode']); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="ins-location-map">
                            <?php echo wp_get_attachment_image($settings['map']['id'], 'full'); ?>
                            <div class="ins-location-inner">
                                <?php
                                $i = 0;
                                foreach ($settings['locations'] as $location):
                                    $i++;
                                    ?>
                                    <div class="map map--<?php echo $i; ?>">
                                        <div class="icon xb-mouseenter2 <?php if ('yes' == $location['active']) {
                                            echo esc_attr('active');
                                        } ?>">
                                            <?php echo wp_get_attachment_image($location['map_dot']['id'], 'thumbnail'); ?>
                                        </div>
                                        <div class="map-info">
                                            <?php echo wp_get_attachment_image($location['map_flag']['id'], 'thumbnail'); ?><?php echo esc_html($location['loc']); ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Contact_V3());