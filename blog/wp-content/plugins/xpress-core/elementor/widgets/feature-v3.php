<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Feature_V3 extends Widget_Base
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
        return 'int-feature-v3';
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
        return esc_html__('Feature V3', 'xpress-core');
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
        $this->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
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
        $this->add_control(
            'btn_option',
            [
                'label' => esc_html__('Button Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link',
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
            'funfact_option',
            [
                'label' => esc_html__('Funfact ', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'funfact_list',
            [
                'label' => esc_html__('Funfact List', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Number', 'xpress-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'suffix',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Suffix', 'xpress-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'xpress-core'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'box_color',
            [
                'label' => esc_html__('Box BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'funfacts',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
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
        $this->add_control(
            'list_hr',
            [
                'label' => esc_html__('List Style', 'xpress-core'),
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
                    '{{WRAPPER}} .xb-lw-list li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'list_icon_color',
            [
                'label' => esc_html__('List Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-lw-list li i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_typography',
                'selector' => '{{WRAPPER}} .xb-lw-list li',
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
        $this->add_control(
            'funfact_hr',
            [
                'label' => esc_html__('Funfact Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'ff_number_color',
            [
                'label' => esc_html__('Funfact Number Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-feat-funfact .number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ff_number_typography',
                'selector' => '{{WRAPPER}} .lw-feat-funfact .number',
            ]
        );
        $this->add_control(
            'ff_title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'ff_title_color',
            [
                'label' => esc_html__('Funfact Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-feat-funfact .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ff_title_typography',
                'selector' => '{{WRAPPER}} .lw-feat-funfact .title',
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="feature z-1 pos-rel pb-130" data-bg-color="#F2F3F4">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                        <div class="lw-feature">
                            <div class="sec-title sec-title--law mb-25">
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
                            <?php $features_list = $settings['lists'];
                            if (!empty($features_list)) {
                                $features_list = explode("\n", ($features_list));
                                ?>
                                <ul class="xb-lw-list list-unstyled mb-50">
                                    <?php foreach ($features_list as $features): ?>
                                        <li><i class="fas fa-check"></i><?php echo wp_kses($features, true); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php } ?>

                            <?php if (!empty($settings['btn_text'])): ?>
                                <a class="xb-btn xb-btn--law has-icon"
                                   href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo esc_html($settings['btn_text']); ?>
                                    <i class="fas fa-chevron-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-2">
                        <div class="lw-feat-funfact__wrap ul_li_right mb-10">
                            <?php foreach ($settings['funfacts'] as $funfact): ?>
                                <div class="lw-feat-funfact elementor-repeater-item-<?php echo esc_attr($funfact['_id']); ?>">
                                    <h2 class="number"><span class="xbo"
                                                             data-count="<?php echo esc_attr($funfact['number']); ?>">00</span><span
                                                class="suffix"><?php echo esc_html($funfact['suffix']); ?></span></h2>
                                    <h4 class="title"><?php echo esc_html($funfact['title']); ?></h4>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($settings['image']['url'])): ?>
                <div class="lw-feature-img jarallax"
                     style="background-image: url('<?php echo esc_url($settings['image']['url']); ?>')"></div>
            <?php endif; ?>

        </section>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Feature_V3());