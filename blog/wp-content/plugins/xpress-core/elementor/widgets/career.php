<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Career extends Widget_Base
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
        return 'int-career';
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
        return esc_html__('Career', 'xpress-core');
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
            'career_option',
            [
                'label' => esc_html__('Career Category', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'careerorder',
            [
                'label' => esc_html__('Career Order', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'xpress-core'),
                    'DESC' => esc_html__('Descending', 'xpress-core'),
                ],
            ]
        );
        $this->add_control(
            'career_per_page',
            [
                'label' => __('Career Per Page', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 6,
            ]
        );
        $this->add_control(
            'career_categories',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Career Categories', 'xpress-core'),
                'options' => seargin_career_category(),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'view_job_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'button_label', [
                'label' => esc_html__('View Job Button', 'xpress-core'),
                'default' => esc_html__('View Job', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'career_cat_style',
            [
                'label' => esc_html__('Career Category', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'nav_padding',
            [
                'label' => esc_html__('Nav Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'nav_typography',
                'selector' => '{{WRAPPER}} .xb-portfolio__menu button',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpress-core'),
            ]
        );

        $this->add_control(
            'nav-c',
            [
                'label' => esc_html__('Nav Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav-border-c',
            [
                'label' => esc_html__('Nav Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'nav-bg-c',
            [
                'label' => esc_html__('Nav BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpress-core'),
            ]
        );

        $this->add_control(
            'h-nav-c',
            [
                'label' => esc_html__('Nav Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-portfolio__menu button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-nav-border-c',
            [
                'label' => esc_html__('Nav Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-portfolio__menu button:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-nav-bg-c',
            [
                'label' => esc_html__('Nav BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio__menu button.active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .xb-portfolio__menu button:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'career_list_style',
            [
                'label' => esc_html__('Career List', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'port_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-career' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port_border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-career' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-career' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'port_cat_title_hr',
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
                    '{{WRAPPER}} .xb-career .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-career .xb-item--title',
            ]
        );
        $this->add_control(
            'meta_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'meata_color',
            [
                'label' => esc_html__('Meta Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-career .xb-item--meta li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'meata_typography',
                'selector' => '{{WRAPPER}} .xb-career .xb-item--meta li',
            ]
        );
        $this->add_control(
            'port_btn_option',
            [
                'label' => esc_html__('Button', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'port_btn_padding',
            [
                'label' => esc_html__('Button Padding', 'xpress-core'),
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
                'name' => 'port_btn_typography',
                'selector' => '{{WRAPPER}} .xb-btn',
            ]
        );

        $this->start_controls_tabs(
            'btn_style_tabs'
        );

        $this->start_controls_tab(
            'btn_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'xpress-core'),
            ]
        );

        $this->add_control(
            'port-btn-c',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'port-btn-bg-c',
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
            'btn_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'xpress-core'),
            ]
        );

        $this->add_control(
            'h-port-btn-c',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-port-btn-bg-c',
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
        $careerCategory = get_terms('career_cat');
        ?>

        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="text-center">
                    <div class="xb-portfolio__menu portfolio-menu mb-70 text-center">
                        <button class="active" data-filter="*"><?php esc_html_e('SEE ALL', 'xpress-core') ?></button>
                        <?php
                        if (!empty($careerCategory) && !is_wp_error($careerCategory)):
                            foreach ($careerCategory as $cate):
                                ?>
                                <button data-filter=".<?php echo esc_attr($cate->slug) ?>"
                                        class=""><?php echo esc_html($cate->name) ?></button>
                            <?php endforeach; endif; ?>
                    </div>
                </div>
                <div class="row grid mt-none-30">

                    <?php
                    $args = array(
                        'post_type' => 'seargin_career',
                        'posts_per_page' => !empty($settings['career_per_page']) ? $settings['career_per_page'] : 1,
                        'ignore_sticky_posts' => true,
                        'post_status' => 'publish',
                        'suppress_filters' => false,
                        'order' => $settings['careerorder'],
                    );
                    if (!empty($settings['career_categories'])) {
                        $args['career_cat'] = implode(',', $settings['career_categories']);
                    }
                    $query = new \WP_Query($args);
                    if ($query->have_posts()):

                        while ($query->have_posts()) {
                            $query->the_post();
                            $idd = get_the_ID();

                            if (get_post_meta($idd, 'seargin_career_meta', true)) {
                                $career_meta = get_post_meta($idd, 'seargin_career_meta', true);
                            } else {
                                $career_meta = array();
                            }

                            if (array_key_exists('job_location', $career_meta)) {
                                $job_location = $career_meta['job_location'];
                            } else {
                                $job_location = '';
                            }
                            if (array_key_exists('job_time', $career_meta)) {
                                $job_time = $career_meta['job_time'];
                            } else {
                                $job_time = '';
                            }

                            $careerInerCates = get_the_terms($idd, 'career_cat');
                            if ($careerInerCates && !is_wp_error($careerInerCates)) {
                                $career_cat_list = array();
                                foreach ($careerInerCates as $cate) {
                                    $career_cat_list[] = $cate->slug;
                                }
                                $career_cate_asign_list = join(' ', $career_cat_list);
                            } else {
                                $career_cate_asign_list = '';
                            }

                            ?>

                            <div class="col-12 grid-item <?php echo esc_attr($career_cate_asign_list) ?>">
                                <div class="xb-career ul_li_between mt-20">
                                    <div class="xb-item--holder mt-30">
                                        <h2 class="xb-item--title"><a
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        <ul class="xb-item--meta ul_li">
                                            <?php if (!empty($job_location)): ?>
                                                <li>
                                                    <i class="far fa-map-marker-alt"></i><?php echo wp_kses($job_location, true); ?>
                                                </li>
                                            <?php endif; ?>
                                            <?php if (!empty($job_time)): ?>
                                                <li><i class="far fa-clock"></i><?php echo wp_kses($job_time, true); ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>

                                    <?php if (!empty($settings['button_label'])): ?>
                                        <a class="xb-item--btn xb-btn mt-30"
                                           href="<?php the_permalink(); ?>"><?php echo esc_html($settings['button_label']); ?><i
                                                    class="far fa-arrow-right"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_query();
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Career());