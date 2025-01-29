<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Pricing_Tab extends Widget_Base
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
        return 'int-pricing-tab';
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
        return esc_html__('Pricing Tab', 'xpress-core');
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
                'label' => esc_html__('Pricing Tab', 'xpress-core'),
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
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing-nav' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'selector' => '{{WRAPPER}} .xb-pricing-nav .nav-item .nav-link',
            ]
        );
        $this->add_control(
            'tab_active_bg_color',
            [
                'label' => esc_html__('Tab Active BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing-nav .nav-item .nav-link.active' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_offer_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'tab_offer_color',
            [
                'label' => esc_html__('Tab Offer Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing-nav .nav-item .nav-link span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tab_offer_bg_color',
            [
                'label' => esc_html__('Tab Offer Text BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing-nav .nav-item .nav-link span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_offer_typography',
                'selector' => '{{WRAPPER}} .xb-pricing-nav .nav-item .nav-link span',
            ]
        );


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
      <div class="tab-pane ' . $collapse_show . '" id="' . $id . '" role="tabpanel" aria-labelledby="' . $id . '-tab">
        ' . $this->render_template($a['template']) . '
      </div>
      ';
        }
        ?>

        <div class="xb-pricing-nav-wrap text-center">
            <ul class="nav nav-pills xb-pricing-nav ul_li_center mb-60" id="pills-tab" role="tablist">
                <?php echo $nav; ?>
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">
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


Plugin::instance()->widgets_manager->register(new Seargin_Pricing_Tab());