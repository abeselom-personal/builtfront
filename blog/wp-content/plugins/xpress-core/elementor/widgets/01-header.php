<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Header_One extends Widget_Base
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
        return 'seargin-header-1';
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
        return esc_html__('Header One', 'xpress-core');
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
        return ['seargin_hf_widgets'];
    }


    protected function register_controls()
    {

        $this->start_controls_section(
            'container_otpion',
            [
                'label' => esc_html__('Container', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'container_width',
            [
                'label' => esc_html__( 'Container Width', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 2000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .container' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'logoop',
            [
                'label' => esc_html__('Logo Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'logo', [
                'label' => esc_html__('Logo', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'logo_max_width',
            [
                'label' => esc_html__('Max Width', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                    ]
                ],

                'selectors' => [
                    '{{WRAPPER}} .xb-header__logo img' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'menu_select',
            [
                'label' => esc_html__('Menu Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'choose-menu',
            [
                'label' => esc_html__('Choose menu', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => seargin_menu_selector(),
                'multiple' => false
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_option',
            [
                'label' => esc_html__('Button Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_enable',
            [
                'label' => esc_html__('Enable or Disable Button', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Login / Signup', 'xpress-core' ),
                'condition' => [
                    'button_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'btn_link', [
                'label' => esc_html__('Link', 'xpress-core'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'condition' => [
                    'button_enable' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'menu_style',
            [
                'label' => esc_html__('Menu Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'menu-c',
            [
                'label' => esc_html__('Menu Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'menu-hover-c',
            [
                'label' => esc_html__('Menu Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li.active > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .sub-menu li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .main-menu ul li .sub-menu li.active > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'selector' => '{{WRAPPER}} .main-menu ul li a',
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
            'btn_bg_hover_color',
            [
                'label' => esc_html__('Button Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__('Button Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-btn' => 'color: {{VALUE}}',
                ],
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
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $sticky_header_enable = seargin_option('sticky_header_enable');
        ?>

        <header id="xb-header-area" class="site-header header-default <?php if ($sticky_header_enable == true): ?> is-sticky <?php endif; ?>">
            <div class="xb-header__wrap xb-header-has-arrow xb-header">
                <div class="container mxw_1710">
                    <div class="ul_li_between">
                        <div class="xb-header__logo">
                            <a href="<?php if (!empty($settings['logolink']['url'])) {
                                echo esc_url($settings['logolink']['url']);
                            } else {
                                echo esc_url(home_url('/'));
                            } ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt=""></a>
                        </div>
                        <div class="main-menu__wrap ul_li navbar navbar-expand-lg">
                            <nav class="main-menu collapse navbar-collapse">
                                <?php
                                wp_nav_menu(array(
                                    'menu' => $settings['choose-menu'],
                                    'menu_id' => 'main-nav',
                                    'link_before' => '<span>','link_after'=>'</span>',
                                    'container' => false,
                                    'fallback_cb' => 'Seargin_Bootstrap_Navwalker::fallback',
                                ));
                                ?>
                            </nav>
                            <div class="xb-header-wrap">
                                <div class="xb-header-menu">
                                    <div class="xb-header-menu-scroll">
                                        <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                        <div class="xb-logo-mobile xb-hide-xl">
                                            <a href="<?php if (!empty($settings['logolink']['url'])) {
                                                echo esc_url($settings['logolink']['url']);
                                            } else {
                                                echo esc_url(home_url('/'));
                                            } ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt=""></a>
                                        </div>
                                        <?php
                                        seargin_moble_search();
                                        ?>
                                        <nav class="xb-header-nav">
                                            <?php
                                            wp_nav_menu(array(
                                                'menu' => $settings['choose-menu'],
                                                'menu_id' => 'mobile-main-nav',
                                                'menu_class' => 'xb-menu-primary clearfix',
                                                'link_before' => '<span>','link_after'=>'</span>',
                                                'container' => false,
                                                'fallback_cb' => 'Seargin_Bootstrap_Navwalker::fallback',
                                            ));
                                            ?>
                                        </nav>
                                    </div>
                                </div>
                                <div class="xb-header-menu-backdrop"></div>
                            </div>
                        </div>
                        <?php
                        if(!empty($settings['btn_text'])):
                        ?>
                        <div class="xb-header__btn d-none d-lg-block">
                            <a class="xb-btn" href="<?php echo esc_url($settings['btn_link']['url']); ?>"><?php echo esc_html($settings['btn_text']); ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="xb-hamburger-menu">
                            <div class="xb-nav-mobile">
                                <div class="xb-nav-mobile-button"><i class="fal fa-bars"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?php
    }
}


Plugin::instance()->widgets_manager->register(new Seargin_Header_One());