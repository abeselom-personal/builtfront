<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Project_V2 extends Widget_Base
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
        return 'int-project-v2';
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
        return esc_html__('Project V2', 'xpress-core');
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
            'prj_list_item',
            [
                'label' => __('Project List', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Sub Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_text', [
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'number',
            [
                'label' => __('Number', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
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
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
        <section class="project pos-rel">
            <div class="container">
                <div class="lw-project-wrap">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php if (!empty($settings['subtitle'])): ?>
                                <div class="sec-title sec-title--law sec-title--white mb-10">
                                    <span class="subtitle"><?php echo esc_html($settings['subtitle']); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="lw-project-slider mb-55">
                                <div class="swiper-wrapper">
                                    <?php
                                    foreach ($settings['projects'] as $project):
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="xb-item--inner ul_li">
                                                <?php if (!empty($project['content'])): ?>
                                                    <div class="xb-item--number">
                                                        <?php echo esc_html($project['number']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="xb-item--content">
                                                    <?php if (!empty($project['title'])): ?>
                                                        <h3 class="xb-item--title"><?php echo esc_html($project['title']); ?></h3>
                                                    <?php endif; ?>
                                                    <?php if (!empty($project['content'])): ?>
                                                        <p><?php echo wp_kses($project['content'], true); ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="ul_li_between">
                                <?php if (!empty($settings['btn_text'])): ?>
                                    <a class="xb-btn xb-btn--law has-icon btn-white mt-20" href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo esc_html($settings['btn_text']); ?><i class="fas fa-chevron-right"></i></a>
                                <?php endif; ?>
                                <div class="xb-law-swiper-arrow ul_li mt-20">
                                    <div class="xb-swiper-arrow xb-swiper-arrow-prev"><i
                                                class="fas fa-chevron-left"></i></div>
                                    <div class="xb-swiper-arrow xb-swiper-arrow-next"><i
                                                class="fas fa-chevron-right"></i></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="lw-project-slider-inner">
                <div class="lw-project-slider-for swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($settings['projects'] as $project):
                            ?>
                            <div class="swiper-slide">
                                <div class="slide-inner slide-overlay slide-bg-image"
                                     style="background-image: url('<?php echo esc_url($project['image']['url']); ?>')"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- end swiper-wrapper -->
                </div>
            </div>
        </section>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Project_V2());