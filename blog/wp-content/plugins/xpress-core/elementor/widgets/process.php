<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Process extends Widget_Base
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
        return 'int-process';
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
        return esc_html__('Process', 'xpress-core');
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
            'prc_list_content',
            [
                'label' => __('Process List', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon', [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'icon_bg', [
                'label' => esc_html__('Icon BG', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'check_icon',
            [
                'label' => esc_html__('Check Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
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
            'number',
            [
                'label' => __('Number', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => __('Process List', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'process_style',
            [
                'label' => esc_html__('Process Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-process__item .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .mr-process__item .xb-item--title',
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
                    '{{WRAPPER}} .mr-process__item .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .mr-process__item .xb-item--content',
            ]
        );
        $this->add_control(
            'number_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-process__item .xb-item--number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .mr-process__item .xb-item--number',
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="mr-process ul_li_between mt-none-50">
            <?php
            foreach ($settings['lists'] as $list):
                ?>
                <div class="mr-process__item mt-50">
                    <?php if (!empty($list['icon']['id'])): ?>
                        <div class="xb-item--icon pos-rel">
                            <?php echo wp_get_attachment_image($list['icon']['id'], 'thumbnail'); ?>
                            <span class="xb-item--icon-bg"><?php echo wp_get_attachment_image($list['icon_bg']['id'], 'thumbnail'); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($list['check_icon']['value']) || !empty($list['check_icon']['value']['url'])) : ?>
                        <span class="xb-item--check"><?php \Elementor\Icons_Manager::render_icon($list['check_icon'], ['aria-hidden' => 'true']); ?></span>
                    <?php endif; ?>
                    <?php if (!empty($list['title'])): ?>
                        <h2 class="xb-item--title"><?php echo esc_html($list['title']); ?></h2>
                    <?php endif; ?>
                    <?php if (!empty($list['content'])): ?>
                        <p class="xb-item--content"><?php echo wp_kses($list['content'], true); ?></p>
                    <?php endif; ?>
                    <?php if (!empty($list['number'])): ?>
                        <span class="xb-item--number"><?php echo esc_html($list['number']); ?></span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Process());