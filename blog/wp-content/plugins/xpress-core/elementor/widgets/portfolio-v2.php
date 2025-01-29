<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Portfolio_V2 extends Widget_Base
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
        return 'int-portfolio-v2';
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
        return esc_html__('Portfolio V2', 'xpress-core');
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
            'portfolio_option',
            [
                'label' => esc_html__('Portfolio', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'portfolioorder',
            [
                'label' => esc_html__('Portfolio Order', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'xpress-core'),
                    'DESC' => esc_html__('Descending', 'xpress-core'),
                ],
            ]
        );
        $this->add_control(
            'portfolio_per_page',
            [
                'label' => __('Portfolio Per Page', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 9,
            ]
        );
        $this->add_control(
            'portfolio_categories',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Portfolio Categories', 'xpress-core'),
                'options' => seargin_portfolio_category(),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'portfolio_cat_style',
            [
                'label' => esc_html__('Portfolio Category', 'xpress-core'),
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
            'portfolio_list_style',
            [
                'label' => esc_html__('Portfolio List', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'port_border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio .xb-item--content' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .xb-portfolio .xb-item--content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'port_cat_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'cat_color',
            [
                'label' => esc_html__('Category Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-portfolio .xb-item--cat' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cat_typography',
                'selector' => '{{WRAPPER}} .xb-portfolio .xb-item--cat',
            ]
        );
        $this->add_control(
            'port_title_hr',
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
                    '{{WRAPPER}} .xb-portfolio .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-portfolio .xb-item--title',
            ]
        );
        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $portfolioCategory = get_terms('portfolio_cat');
        ?>

        <div class="text-center">
            <div class="xb-portfolio__menu portfolio-menu mb-70 text-center">
                <button class="active" data-filter="*"><?php esc_html_e('SEE ALL', 'xpress-core') ?></button>
                <?php
                if (!empty($portfolioCategory) && !is_wp_error($portfolioCategory)):
                    foreach ($portfolioCategory as $cate):
                        ?>
                        <button data-filter=".<?php echo esc_attr($cate->slug) ?>"
                                class=""><?php echo esc_html($cate->name) ?></button>
                    <?php endforeach; endif; ?>
            </div>
        </div>
        <div class="row grid mt-none-30">

            <?php
            $args = array(
                'post_type' => 'seargin_portfolio',
                'posts_per_page' => !empty($settings['portfolio_per_page']) ? $settings['portfolio_per_page'] : 1,
                'ignore_sticky_posts' => true,
                'post_status' => 'publish',
                'suppress_filters' => false,
                'order' => $settings['portfolioorder'],
            );
            if (!empty($settings['portfolio_categories'])) {
                $args['portfolio_cat'] = implode(',', $settings['portfolio_categories']);
            }
            $query = new \WP_Query($args);
            if ($query->have_posts()):

                while ($query->have_posts()) {
                    $query->the_post();
                    $idd = get_the_ID();

                    $portfolioInerCates = get_the_terms($idd, 'portfolio_cat');
                    if ($portfolioInerCates && !is_wp_error($portfolioInerCates)) {
                        $portfolio_cat_list = array();
                        foreach ($portfolioInerCates as $cate) {
                            $portfolio_cat_list[] = $cate->slug;
                        }
                        $portfolio_cate_asign_list = join(' ', $portfolio_cat_list);
                    } else {
                        $portfolio_cate_asign_list = '';
                    }

                    ?>

                    <div class="col-lg-4 col-md-6 col-sm-6 grid-item <?php echo esc_attr($portfolio_cate_asign_list) ?>">
                        <div class="xb-portfolio mt-30">
                            <div class="xb-item--img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('seargin-portfolio'); ?></a>
                            </div>
                            <div class="xb-item--holder">
                                <div class="xb-item--content">
                                    <span class="xb-item--cat"><?php echo esc_attr($cate->name); ?></span>
                                    <h3 class="xb-item--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_query();
            endif;
            ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Portfolio_V2());