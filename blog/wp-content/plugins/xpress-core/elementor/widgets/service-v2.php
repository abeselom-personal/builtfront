<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_V2 extends Widget_Base
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
        return 'int-service-v2';
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
        return esc_html__('Service V2', 'xpress-core');
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
            'content_option',
            [
                'label' => esc_html__('Services', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
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
            'icon-position',
            [
                'label' => esc_html__('Icon BG Position', 'xpres-core'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}:before' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
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
            'services',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'prevent_empty' => false,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'nav_setting',
            [
                'label' => esc_html__('Nav Setting', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'show_nav',
            [
                'label' => esc_html__('Show Arrow', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'icon_bg-c',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-service .xb-item--icon::before' => 'background-color: {{VALUE}}',
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
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-service .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .bc-service .xb-item--title',
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
                    '{{WRAPPER}} .bc-service .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .bc-service .xb-item--content',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="bc-service-slider__inner">
            <div class="bc-service-slider">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($settings['services'] as $service):
                        ?>
                        <div class="swiper-slide bc-service">
                            <div class="xb-item--inner">
                                <div class="xb-item--icon mb-80 elementor-repeater-item-<?php echo esc_attr($service['_id']) ?>">
                                    <?php \Elementor\Icons_Manager::render_icon($service['icon'], ['aria-hidden' => 'true']); ?>
                                </div>
                                <h3 class="xb-item--title"><a
                                            href="<?php echo esc_url($service['link']['url']); ?>"><?php echo wp_kses($service['title'], true); ?></a>
                                </h3>
                                <?php if (!empty($service['content'])): ?>
                                    <p class="xb-item--content"><?php echo wp_kses($service['content'], true); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            if ($settings['show_nav'] == true):
                ?>
                <div class="bc-carousel-button">
                    <div class="xb-swiper-arrow xb-swiper-arrow-prev"><i class="fal fa-long-arrow-left"></i></div>
                    <div class="xb-swiper-arrow xb-swiper-arrow-next"><i class="fal fa-long-arrow-right"></i></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Service_V2());