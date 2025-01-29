<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Project extends Widget_Base
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
        return 'int-project';
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
        return esc_html__('Project', 'xpress-core');
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
            'button_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'btn_label', [
                'label' => esc_html__('Button Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'xprss-core'),
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
            'prj_list_item',
            [
                'label' => __('Project List', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content',
            [
                'label' => __('Content', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $repeater->add_control(
            'date',
            [
                'label' => __('Date', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                ],
            ]
        );
        $this->add_control(
            'projects',
            [
                'label' => __('Project List', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'btn_style',
            [
                'label' => esc_html__('Button Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
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

        $this->start_controls_section(
            'project_style',
            [
                'label' => esc_html__('Project Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .mr-project__lists .xb-item--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .mr-project__lists .xb-item--img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-project__lists .xb-item--holder' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mr-project__lists .xb-item--item' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mr-project__lists .xb-item--item:nth-child(even) .xb-item--holder' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .mr-project__lists .xb-item--title' => 'border-color: {{VALUE}}',
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
            'title_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-project__lists .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .mr-project__lists .xb-item--title',
            ]
        );
        $this->add_control(
            'content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-project__lists .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .mr-project__lists .xb-item--content',
            ]
        );
        $this->add_control(
            'date_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'date_color',
            [
                'label' => esc_html__('Date Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-project__lists .xb-item--date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .mr-project__lists .xb-item--date',
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="mr-project-wrap">
            <div class="mr-project sticky-coloum-wrap">
                <?php if (!empty($settings['btn_label'])): ?>
                    <div class="mr-project__btn sticky-coloum-item">
                        <a class="xb-btn xb-btn--marketing" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                            <div class="btn-anim-wrap">
                                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                                <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="mr-project__lists sticky-coloum-item">
                    <?php
                    foreach ($settings['projects'] as $project):
                        ?>
                        <div class="xb-item--item">
                            <div class="xb-item--holder">
                                <?php if (!empty($project['title'])): ?>
                                    <h3 class="xb-item--title"><?php echo esc_html($project['title']); ?></h3>
                                <?php endif; ?>
                                <?php if (!empty($project['content'])): ?>
                                    <div class="xb-item--content">
                                        <?php echo wp_kses($project['content'], true); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($project['date'])): ?>
                                    <span class="xb-item--date"><?php echo esc_html($project['date']); ?></span>
                                <?php endif; ?>
                                <?php if (!empty($project['icon']['value']) || !empty($project['icon']['value']['url'])) : ?>
                                    <span class="xb-item--icon"><?php \Elementor\Icons_Manager::render_icon($project['icon'], ['aria-hidden' => 'true']); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($project['image']['id'])): ?>
                                <div class="xb-item--img">
                                    <div class="xb-item--img-inner">
                                        <?php echo wp_get_attachment_image($project['image']['id'], 'large'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($project['link']['url'])): ?>
                                <a class="xb-overlay" href="<?php echo esc_url($project['link']['url']); ?>"></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if (!empty($settings['btn_label'])): ?>
                <div class="mr-project__btn-bottom d-lg-none text-center mt-40">
                    <a class="xb-btn xb-btn--marketing" href="<?php echo esc_url($settings['btn_link']['url']); ?>">
                        <div class="btn-anim-wrap">
                            <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                            <span class="button-text"><?php echo esc_html($settings['btn_label']); ?></span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Project());