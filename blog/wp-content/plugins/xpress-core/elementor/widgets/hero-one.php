<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Hero_one extends Widget_Base
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
        return 'int-hero-one';
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
        return esc_html__('Hero One', 'xpress-core');
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
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'lists', [
                'label' => esc_html__('Lists', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'hero_btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_1', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link1',
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
            'button_2',
            [
                'label' => esc_html__('Button 2', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'btn_2', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link2',
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
                'name' => 'sub-title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
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
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'fttile_typography',
                'selector' => '{{WRAPPER}} .sec-title .title',
            ]
        );
        $this->add_control(
            'list_hr',
            [
                'label' => esc_html__('List', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'list_color',
            [
                'label' => esc_html__('List Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-content .xb-item--list li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_typography',
                'selector' => '{{WRAPPER}} .hero-content .xb-item--list li',
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

        $this->add_control(
            'button_white_style',
            [
                'label' => esc_html__('Button White Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs(
            '2btn_tabs'
        );

        $this->start_controls_tab(
            '2btn_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpres-core'),
            ]
        );
        $this->add_control(
            '2btn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--white' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            '2btn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--white' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '2hbtn_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpres-core'),
            ]
        );
        $this->add_control(
            '2hbtn_color',
            [
                'label' => esc_html__('Button Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--white:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            '2hbtn_bg_color',
            [
                'label' => esc_html__('Button BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn--white:hover' => 'background-color: {{VALUE}}',
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

        <section class="hero hero-default ul_li bg_img"
            <?php if (!empty($settings['bg_image']['url'])): ?>
                 style="background-image: url('<?php echo esc_url($settings['bg_image']['url']); ?>') <?php endif; ?>">
            <div class="container px-60">
                <div class="row align-items-center">
                    <div class="hero-content">
                        <div class="sec-title mb-40">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <span class="subtitle ul_li wow fadeInUp" data-wow-delay="0ms"
                                      data-wow-duration="500ms"><img
                                            src="<?php echo esc_url($settings['subtitle_icon']['url']); ?>"
                                            alt=""> <?php echo esc_html($settings['subtitle']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['title'])): ?>
                                <h2 class="title title-big wow fadeInUp" data-wow-delay="200ms"
                                    data-wow-duration="500ms"><?php echo wp_kses($settings['title'], true); ?></h2>
                            <?php endif; ?>
                        </div>

                        <?php $features_list = $settings['lists'];
                        if (!empty($features_list)) {
                            $features_list = explode("\n", ($features_list));
                            ?>
                            <ul class="xb-item--list list-unstyled mb-60 wow fadeInUp" data-wow-delay="400ms"
                                data-wow-duration="500ms">
                                <?php foreach ($features_list as $features): ?>
                                    <li><i class="far fa-check"></i><?php echo wp_kses($features, true); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php } ?>

                        <div class="hero-btn wow fadeInUp" data-wow-delay="600ms" data-wow-duration="500ms">
                            <div class="xb-item--btn btns">
                                <?php if (!empty($settings['btn_1'])): ?>
                                    <a class="xb-btn"
                                       href="<?php echo esc_url($settings['btn_link1']['url']); ?>"><?php echo esc_html($settings['btn_1']); ?></a>
                                <?php endif; ?>
                                <?php if (!empty($settings['btn_2'])): ?>
                                    <a class="xb-btn xb-btn--white"
                                       href="<?php echo esc_url($settings['btn_link2']['url']); ?>"><?php echo esc_html($settings['btn_2']); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Hero_one());