<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Header_Three extends Widget_Base
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
        return 'seargin-header-3';
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
        return esc_html__('Header Three', 'xpress-core');
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
            'topbar_option',
            [
                'label' => esc_html__('Top Bar Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'topbar_enable',
            [
                'label' => esc_html__('Enable or Disable Top Bar', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'social_options',
            [
                'label' => esc_html__('Social Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
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
        $this->add_control(
            'socials',
            [
                'label' => esc_html__('Add Social Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );
        $this->add_control(
            'lang_options',
            [
                'label' => esc_html__('Language Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'language_img', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'language_label', [
                'label' => esc_html__('Language Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('ENGLISH', 'xpress-core'),
            ]
        );
        $this->add_control(
            'language_arrow',
            [
                'label' => esc_html__('Arrow Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $this->add_control(
            'language_link',
            [
                'label' => esc_html__('Link', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'label', [
                'label' => esc_html__('Language Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__('EN', 'xpress-core'),
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'languages',
            [
                'label' => esc_html__('Add language Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
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
                    '{{WRAPPER}} .header__logo img' => 'max-width: {{SIZE}}{{UNIT}};',
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
            'search_option',
            [
                'label' => esc_html__('Search Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'search_enable',
            [
                'label' => esc_html__('Enable or Disable Search', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'search_icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'search_enable' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'offcanvas_option',
            [
                'label' => esc_html__('Offcanvas Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'offcanvas_enable',
            [
                'label' => esc_html__('Enable or Disable Offcanvas', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'opc_content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'opc_contact_info',
            [
                'label' => esc_html__('Contact Information', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'opc_ci_title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'info', [
                'label' => esc_html__('Info Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'infos',
            [
                'label' => esc_html__('Add Info Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );

        $this->add_control(
            'opc_ml_hr',
            [
                'label' => esc_html__('Newsletter', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'opc_nl_title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shortcode', [
                'label' => esc_html__('Newsletter Shortcode', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'opc_s_hr',
            [
                'label' => esc_html__('Social', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'opc_s_title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
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
        $this->add_control(
            'opc_socials',
            [
                'label' => esc_html__('Add Social Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ],
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'top_bar_style',
            [
                'label' => esc_html__('Top Bar Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'top__style',
            [
                'label' => esc_html__('Top Bar Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            's-title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-social span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 's-title_typography',
                'selector' => '{{WRAPPER}} .xb-social span'
            ]
        );
        $this->add_control(
            'social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social-c',
            [
                'label' => esc_html__('Social Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-social ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-social li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-c-h',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-social ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-social li a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'lang_style',
            [
                'label' => esc_html__('Language Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'lang_lab_c',
            [
                'label' => esc_html__('Language Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header__language ul .lang-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'lan_lab_typography',
                'selector' => '{{WRAPPER}} .xb-header__language ul .lang-btn',
            ]
        );
        $this->add_control(
            'lang_dropdown_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'lang_dorpdown_bg_color',
            [
                'label' => esc_html__('Dropdown BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header__language .lang_sub_list' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'drop_lab_c',
            [
                'label' => esc_html__('Dropdown Label Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-header__language .lang_sub_list li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'drop_lab_typography',
                'selector' => '{{WRAPPER}} .xb-header__language .lang_sub_list li a',
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
            'dropdown_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'submenu-bg-c',
            [
                'label' => esc_html__('Submenu BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .sub-menu::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu-c',
            [
                'label' => esc_html__('Submenu Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu li > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .main-menu ul li .sub-menu li.active > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'submenu-hover-active-c',
            [
                'label' => esc_html__('Submenu Hover & Active Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li .sub-menu li:hover > a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .main-menu ul li .main-menu ul li .sub-menu li.active > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'offcanvas_style',
            [
                'label' => esc_html__('Offcanvas Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'opc_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-sidebar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'opc_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .offcanvas-sidebar' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'opc_content_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'opc_content_color',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'opc_content_typography',
                'selector' => '{{WRAPPER}} .sidebar-content',
            ]
        );
        $this->add_control(
            'opc_heading_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'opc_heading_color',
            [
                'label' => esc_html__('Heading Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-heading' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'opc_heading_typography',
                'selector' => '{{WRAPPER}} .sidebar-heading',
            ]
        );
        $this->add_control(
            'opc_info_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'opc_info_color',
            [
                'label' => esc_html__('Info Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sidebar-info-list li' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'opc_info_typography',
                'selector' => '{{WRAPPER}} .sidebar-info-list li',
            ]
        );
        $this->add_control(
            'opc_social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'opc_social_color',
            [
                'label' => esc_html__('Social Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-footer-info .xb-item--social li a' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .mr-footer-info .xb-item--social li a svg path' => 'fill: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_control(
            'opc_social_hover_color',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-footer-info .xb-item--social li a:hover' => 'color: {{VALUE}} !important',
                    '{{WRAPPER}} .mr-footer-info .xb-item--social li a:hover svg path' => 'fill: {{VALUE}} !important',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $sticky_header_enable = seargin_option('sticky_header_enable');

        ?>
        <header id="xb-header-area"
                class="site-header header-marketing <?php if ($sticky_header_enable == true): ?> is-sticky <?php endif; ?>">
            <?php if ($settings['topbar_enable'] == 'yes'): ?>
                <div class="xb-header__top">
                    <div class="container m-auto ul_li_between">
                        <div class="xb-social ul_li">
                            <?php if (!empty($settings['title'])): ?>
                                <span><?php echo esc_html($settings['title']); ?></span>
                            <?php endif; ?>
                            <ul class="ul_li">
                                <?php
                                foreach ($settings['socials'] as $social):
                                    $target = $social['link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $social['link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                    <li>
                                        <a href="<?php echo esc_url($social['link']['url']); ?>" <?php echo $target . $nofollow; ?>><?php \Elementor\Icons_Manager::render_icon($social['icon'], ['aria-hidden' => 'true']); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="xb-header__language pl-70">
                            <ul>
                                <li><a href="<?php echo esc_url($settings['language_link']['url']); ?>"
                                       class="lang-btn">
                                        <div class="flag"><img
                                                    src="<?php echo esc_url($settings['language_img']['url']); ?>"
                                                    alt=""></div>
                                        <?php echo esc_html($settings['language_label']); ?>
                                        <div class="arrow_down"><?php \Elementor\Icons_Manager::render_icon($settings['language_arrow'], ['aria-hidden' => 'true']); ?></div>
                                    </a>
                                    <ul class="lang_sub_list">
                                        <?php
                                        foreach ($settings['languages'] as $item):
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url($item['link']['url']); ?>"><?php echo esc_html($item['label']); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="xb-header__wrap xb-header-has-arrow xb-header">
                <div class="container">
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
                                    'menu_id' => 'mobile-main-nav',
                                    'link_before' => '<span>','link_after'=>'</span>',
                                    'container' => false,
                                    'fallback_cb' => 'Seargin_Bootstrap_Navwalker::fallback',
                                ));
                                ?>
                            </nav>
                            <div class="xb-header-wrap style-black">
                                <div class="xb-header-menu">
                                    <div class="xb-header-menu-scroll">
                                        <div class="xb-menu-close xb-hide-xl xb-close"></div>
                                        <div class="xb-logo-mobile xb-hide-xl">
                                            <a href="<?php if (!empty($settings['logolink']['url'])) {
                                                echo esc_url($settings['logolink']['url']);
                                            } else {
                                                echo esc_url(home_url('/'));
                                            } ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>"
                                                       alt=""></a>
                                        </div>
                                        <?php
                                        seargin_moble_search();
                                        ?>
                                        <nav class="xb-header-nav">
                                            <?php
                                            wp_nav_menu(array(
                                                'menu' => $settings['choose-menu'],
                                                'menu_id' => 'main-nav',
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
                        <div class="xb-header__right ul_li">
                            <?php if ($settings['search_enable'] == 'yes'): ?>
                                <ul class="xb-header__action ul_li">
                                    <li><a class="header-search-btn"
                                           href="javascript:void(0);"><?php \Elementor\Icons_Manager::render_icon($settings['search_icon'], ['aria-hidden' => 'true']); ?></a>
                                    </li>
                                </ul>
                            <?php endif; ?>
                            <?php if ($settings['offcanvas_enable'] == 'yes'): ?>
                                <div class="d-none d-lg-block">
                                    <a class="xb-header-bar offcanvas-sidebar-btn ml-30" href="javascript:void(0);">
                                        <div class="xb-header-bar__icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="header-bar d-lg-none">
                                <a class="xb-header-bar xb-nav-mobile ml-30" href="javascript:void(0);">
                                    <div class="xb-header-bar__icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- sidebar-info end -->
        <div class="body-overlay"></div>

        <div class="header-search-form-wrapper style-black">
            <?php seargin_heder_search(); ?>
        </div>

        <div class="offcanvas-sidebar">
            <div class="sidebar-menu-close">
                <a class="xb-close" href="javascript:void(0);"></a>
            </div>
            <div class="sidebar-top mb-65">
                <div class="sidebar-logo mb-40">
                    <a href="<?php if (!empty($settings['logolink']['url'])) {
                        echo esc_url($settings['logolink']['url']);
                    } else {
                        echo esc_url(home_url('/'));
                    } ?>"><img src="<?php echo esc_url($settings['logo']['url']); ?>" alt=""></a>
                </div>
                <?php if (!empty($settings['opc_content'])): ?>
                    <div class="sidebar-content">
                        <?php echo wp_kses($settings['opc_content'], true); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sidebar-contact-info mb-65">
                <?php if (!empty($settings['opc_ci_title'])): ?>
                    <h4 class="sidebar-heading"><?php echo esc_html($settings['opc_ci_title']); ?></h4>
                <?php endif; ?>
                <ul class="sidebar-info-list list-unstyled">
                    <?php
                    foreach ($settings['infos'] as $info):
                        ?>
                        <li>
                            <span><?php \Elementor\Icons_Manager::render_icon($info['icon'], ['aria-hidden' => 'true']); ?></span><?php echo esc_html($info['info']); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="sidebar-newsletter">
                <?php if (!empty($settings['opc_nl_title'])): ?>
                    <h4 class="sidebar-heading"><?php echo esc_html($settings['opc_nl_title']); ?></h4>
                <?php endif; ?>

                <?php if (!empty($settings['shortcode'])): ?>
                    <div class="sidebar-newsletter-form">
                        <?php echo do_shortcode($settings['shortcode']); ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="sidebar-social mr-footer-info mt-65">
                <?php if (!empty($settings['opc_s_title'])): ?>
                    <h4 class="sidebar-heading"><?php echo esc_html($settings['opc_s_title']); ?></h4>
                <?php endif; ?>
                <ul class="xb-item--social ul_li">
                    <?php
                    foreach ($settings['opc_socials'] as $opc_social):
                        ?>
                        <li>
                            <a href="<?php echo esc_url($opc_social['link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($opc_social['icon'], ['aria-hidden' => 'true']); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <?php
    }
}


Plugin::instance()->widgets_manager->register(new Seargin_Header_Three());