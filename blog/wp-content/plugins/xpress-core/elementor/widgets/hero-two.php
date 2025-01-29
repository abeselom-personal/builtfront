<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Hero_Two extends Widget_Base
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
        return 'int-hero-two';
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
        return esc_html__('Hero Two', 'xpress-core');
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
            'bg_image_option',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('Background Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle_icon',
            [
                'label' => esc_html__('Sub Title Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'subtitle', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::WYSIWYG,
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
            'btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
            'image_shape_option',
            [
                'label' => esc_html__('Image & Shape', 'xpress-core'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'shape_option',
            [
                'label' => esc_html__('Left Shape', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'h_shape',
            [
                'label' => esc_html__('Shape', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-hero-content .xb-item--subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub-title_typography',
                'selector' => '{{WRAPPER}} .mr-hero-content .xb-item--subtitle',
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
                    '{{WRAPPER}} .mr-hero-content .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fttile_typography',
                'selector' => '{{WRAPPER}} .mr-hero-content .xb-item--title',
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-hero-content .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .mr-hero-content .xb-item--content',
            ]
        );

        $this->add_control(
            'button_style',
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
            'btn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'border-color: {{VALUE}}',
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
            'hbtn_border_color',
            [
                'label' => esc_html__('Button Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'hbtn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
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

        <section
                class="hero-marketing mr-bg pos-rel d-flex align-items-center" <?php if (!empty($settings['bg_image']['url'])): ?>
                style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>') <?php endif; ?>">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="mr-hero-content">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <span class="xb-item--subtitle wow fadeInUp"
                                      data-wow-duration="600ms"><span> <?php echo wp_get_attachment_image($settings['subtitle_icon']['id'], 'thumbnail'); ?></span> <?php echo esc_html($settings['subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="xb-item--title wow fadeInUp" data-wow-duration="600ms"
                                    data-wow-delay="200ms"><?php echo wp_kses($settings['title'], true); ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($settings['content'])): ?>
                                <p class="xb-item--content mb-50 wow fadeInUp" data-wow-duration="500ms"
                                   data-wow-delay="400ms"><?php echo wp_kses($settings['content'], true); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['btn'])): ?>
                                <div class="xb-item--btn wow fadeInUp" data-wow-duration="600ms"
                                     data-wow-delay="600ms">
                                    <a class="xb-btn xb-btn--marketing"
                                       href="<?php echo esc_url($settings['link']['url']); ?>">
                                        <div class="btn-anim-wrap">
                                            <span class="button-text"><?php echo esc_html($settings['btn']); ?></span>
                                            <span class="button-text"><?php echo esc_html($settings['btn']); ?></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mr-hero-img pos-rel">
                            <div class="wow fadeInRight"
                                 data-wow-delay="300ms"><?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?></div>
                            <div class="mr-hero-img-inner">
                                <?php if (!empty($settings['shape1']['id'])): ?>
                                    <div class="chart chart--1">
                                        <div class="wow zoomIn" data-wow-duration="600ms"
                                             data-wow-delay="500ms"><?php echo wp_get_attachment_image($settings['shape1']['id'], 'medium'); ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['shape2']['id'])): ?>
                                    <div class="chart chart--2">
                                        <div class="wow zoomIn" data-wow-duration="600ms"
                                             data-wow-delay="600ms"><?php echo wp_get_attachment_image($settings['shape2']['id'], 'medium'); ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['shape3']['id'])): ?>
                                    <div class="chart chart--3">
                                        <div class="wow zoomIn" data-wow-duration="600ms"
                                             data-wow-delay="700ms"><?php echo wp_get_attachment_image($settings['shape3']['id'], 'medium'); ?></div>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($settings['shape4']['id'])): ?>
                                    <div class="chart chart--4">
                                        <div class="wow zoomIn" data-wow-duration="600ms"
                                             data-wow-delay="800ms"><?php echo wp_get_attachment_image($settings['shape4']['id'], 'medium'); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['h_shape']['id'])): ?>
                <div class="mr-hero-shape">
                    <?php echo wp_get_attachment_image($settings['h_shape']['id'], 'medium'); ?>
                </div>
            <?php endif; ?>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Hero_Two());