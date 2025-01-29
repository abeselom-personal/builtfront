<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Count_Number extends Widget_Base
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
        return 'int-count-number';
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
        return esc_html__('Count Number', 'xpress-core');
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
            'count_number_option',
            [
                'label' => esc_html__('Count Number', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'count_number', [
                'label' => esc_html__('Counter Number', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'suffix', [
                'label' => esc_html__('Suffix', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
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

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'count_gd_color',
                'types' => ['gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .xb-grd-number .xbo-value, {{WRAPPER}} .xb-grd-number',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Number Gradient Color', 'xpress-core'),
                    ]
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_typography',
                'selector' => '{{WRAPPER}} .xb-grd-number',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <?php $features_list = $settings['count_number'];
        if(!empty($features_list)){
            $features_list = explode("\n", ($features_list));
            ?>
            <h2 class="xb-grd-number d-flex">
            <?php foreach($features_list as $features): ?>
                <div><span class="xbo" data-count="<?php echo wp_kses($features, true); ?>">00</span></div>
            <?php endforeach; ?>
                <?php if(!empty($settings['suffix'])): ?>
                <div><span class="suffix"><?php echo esc_html($settings['suffix']); ?></span></div>
                <?php endif; ?>
            </h2>
        <?php } ?>

        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Count_Number());