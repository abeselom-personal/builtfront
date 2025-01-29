<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Section_Title extends Widget_Base
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
        return 'int-sec-title';
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
        return esc_html__('Section Title', 'xpress-core');
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
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'xpress-core'),
                    'style_2' => __('Style 2', 'xpress-core'),
                    'style_3' => __('Style 3', 'xpress-core'),
                    'style_4' => __('Style 4', 'xpress-core'),
                    'style_5' => __('Style 5', 'xpress-core'),
                    'style_6' => __('Style 6', 'xpress-core'),
                ],
                'default' => 'style_1',
            ]
        );

        $this->add_control(
            'subtitle_icon',
            [
                'label' => esc_html__('Sub Title Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'design_style' => ['style_1', 'style_6'],
                ],
            ]
        );
        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'design_style' => ['style_1', 'style_3', 'style_4', 'style_5', 'style_6'],
                ],
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
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
                'condition' => [
                    'design_style' => ['style_1', 'style_3', 'style_4', 'style_5', 'style_6'],
                ],
            ]
        );

        $this->add_control(
            'sub-title-arrow-c',
            [
                'label' => esc_html__('Sub Title Arrow Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title--marketing .subtitle::before' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => ['style_3'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
                'condition' => [
                    'design_style' => ['style_1', 'style_3', 'style_4', 'style_5', 'style_6'],
                ],
            ]
        );

        $this->add_control(
            'cta-box-styl',
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
        $this->add_control(
            'title-highlight-c',
            [
                'label' => esc_html__('Title Highlight Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title--business .title span' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
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
                    '{{WRAPPER}} .sec-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .sec-title p',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="sec-title sec-title--business">
            <?php if (!empty($settings['sub_title'])): ?>
                <h5 class="subtitle"><?php echo esc_html($settings['sub_title']); ?></h5>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_3'): ?>
        <div class="sec-title sec-title--marketing">
            <?php if (!empty($settings['sub_title'])): ?>
                <span class="subtitle"><?php echo esc_html($settings['sub_title']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_4'): ?>
        <div class="sec-title sec-title--law">
            <?php if (!empty($settings['sub_title'])): ?>
                <span class="subtitle"><?php echo esc_html($settings['sub_title']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_5'): ?>
        <div class="sec-title sec-title--ins">
            <?php if (!empty($settings['sub_title'])): ?>
                <span class="subtitle"><?php echo esc_html($settings['sub_title']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php elseif ($settings['design_style'] === 'style_6'): ?>
        <div class="sec-title sec-title--advisor">
            <?php if (!empty($settings['sub_title'])): ?>
                <span class="subtitle ul_li"><img src="<?php echo esc_url($settings['subtitle_icon']['url']); ?>"
                                                alt=""> <?php echo esc_html($settings['sub_title']); ?></span>
            <?php endif;
            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="sec-title">
            <?php if (!empty($settings['sub_title'])): ?>
                <h5 class="subtitle ul_li"><img src="<?php echo esc_url($settings['subtitle_icon']['url']); ?>"
                                                alt=""> <?php echo esc_html($settings['sub_title']); ?></h5>
            <?php endif;

            if (!empty($settings['title'])): ?>
                <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
            <?php endif;
            if (!empty($settings['content'])): ?>
                <p><?php echo wp_kses($settings['content'], true); ?></p>
            <?php endif; ?>
        </div>
    <?php
    endif;
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Section_Title());