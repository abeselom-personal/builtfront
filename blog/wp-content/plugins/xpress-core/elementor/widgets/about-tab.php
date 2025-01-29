<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_About_Tab extends Widget_Base
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
        return 'int-about-tab';
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
        return esc_html__('About Tab', 'xpress-core');
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
            'about_tab_option',
            [
                'label' => esc_html__('About Tab', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'ttl',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__('Title', 'xpress-core'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'template',
            [
                'type' => Controls_Manager::SELECT2,
                'options' => $this->template_select(),
                'multiple' => false,
                'label' => esc_html__('Template', 'thepack'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'lists',
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
            'tab_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'selector' => '{{WRAPPER}} .bc-about__tab .nav-item .nav-link',
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'tab-c',
            [
                'label' => esc_html__('Tab Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab-border-c',
            [
                'label' => esc_html__('Tab Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab-bg-c',
            [
                'label' => esc_html__('Tab BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'xpress-core' ),
            ]
        );

        $this->add_control(
            'h-tab-c',
            [
                'label' => esc_html__('Tab Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link.active' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-tab-border-c',
            [
                'label' => esc_html__('Tab Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link.active' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'h-tab-bg-c',
            [
                'label' => esc_html__('Tab BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link.active' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .bc-about__tab .nav-item .nav-link:hover' => 'background-color: {{VALUE}}',
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

        $nav = '';
        $out = '';
        $i = 0;
        foreach ($settings['lists'] as $a) {
            $i++;
            $id = 'd-' . $i;
            if ($i == '1') {
                $aria_true = 'true';
                $collapse_show = 'show active';

                $nav_active = 'active';
            } else {
                $aria_true = 'false';
                $collapse_show = '';

                $nav_active = '';
            }
            $nav .= '
      <li class="nav-item" role="presentation">
        <button class="nav-link ' . $nav_active . '" id="' . $id . '-tab" data-bs-toggle="tab" data-bs-target="#' . $id . '" type="button" role="tab" aria-controls="' . $id . '" aria-selected="' . $aria_true . '">' . $a['ttl'] . '</button>
      </li>    
    ';
            $out .= '
      <div class="tab-pane fade ' . $collapse_show . '" id="' . $id . '" role="tabpanel" aria-labelledby="' . $id . '-tab">
        ' . $this->render_template($a['template']) . '
      </div>
      ';
        }
        ?>
            <div class="container mxw_1320">
                <ul class="nav bc-about__tab nav-tabs" id="myTab" role="tablist">
                    <?php echo $nav; ?>
                </ul>
            </div>

        <div class="tab-content" id="myTabContent">
            <?php echo $out; ?>
        </div>
    <?php
    }

    protected function template_select()
    {
        $type = 'elementor_library';
        global $post;
        $args = array('numberposts' => -1, 'post_type' => $type,);
        $posts = get_posts($args);
        $categories = array(
            '' => __('Select', 'xpress-core'),
        );
        foreach ($posts as $pn_cat) {
            $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
        }
        return $categories;
    }

    protected function render_template($id)
    {
        return Plugin::instance()->frontend->get_builder_content_for_display($id);
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_About_Tab());