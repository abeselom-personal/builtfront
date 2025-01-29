<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Pricing_V2 extends Widget_Base
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
        return 'int-pricing-v2';
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
        return esc_html__('Pricing V2', 'xpress-core');
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
                'label' => __('Pricing', 'xpress-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'primary',
            [
                'label' => esc_html__('Primary', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
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
            'price',
            [
                'label' => __('Price', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_icon',
            [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'list_text', [
                'label' => esc_html__('List Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'deactive',
            [
                'label' => esc_html__('Deactive', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
            ]
        );

        $this->add_control(
            'lists',
            [
                'label' => __('Add List Item', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ list_text }}}',
            ]
        );
        $this->add_control(
            'btn_options',
            [
                'label' => esc_html__('Button Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link',
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
            'icon_options',
            [
                'label' => esc_html__('Icon Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon', [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'pricing_style',
            [
                'label' => esc_html__('Pricing Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing.primary' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'primary' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'primary' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'title_bg_color',
            [
                'label' => esc_html__('Title BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing .xb-item--title' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .xb-pricing .xb-item--title',
            ]
        );
        $this->add_control(
            'sbutitle_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing .xb-item--subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .xb-pricing .xb-item--subtitle',
            ]
        );
        $this->add_control(
            'price_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'price_color',
            [
                'label' => esc_html__('Price Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing .xb-item--price' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .xb-pricing .xb-item--price',
            ]
        );
        $this->add_control(
            'list_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'list_color',
            [
                'label' => esc_html__('List Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-pricing .xb-item--list li' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_typography',
                'selector' => '{{WRAPPER}} .xb-pricing .xb-item--list li',
            ]
        );
        $this->add_control(
            'btn_style',
            [
                'label' => esc_html__('Button Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';
        $primary = ( $settings['primary'] === 'yes' ) ? ' primary' : '';
        ?>
        <div class="xb-pricing <?php echo esc_attr($primary); ?>">
            <?php if (!empty($settings['title'])): ?>
                <span class="xb-item--title"><?php echo esc_html($settings['title']); ?></span>
            <?php endif; ?>
            <?php if (!empty($settings['subtitle'])): ?>
                <p class="xb-item--subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
            <?php endif; ?>

            <?php if (!empty($settings['price'])): ?>
                <h2 class="xb-item--price"><?php echo wp_kses($settings['price'], true); ?></h2>
            <?php endif; ?>

            <ul class="xb-item--list list-unstyled mb-35">
                <?php
                foreach ($settings['lists'] as $list):
                    $deactive_class = ( $list['deactive'] === 'yes' ) ? ' deactive' : '';
                    ?>
                    <li class="<?php echo esc_attr($deactive_class); ?>"><span><?php \Elementor\Icons_Manager::render_icon( $list['list_icon'], [ 'aria-hidden' => 'true' ] ); ?></span><?php echo esc_html($list['list_text']); ?></li>
                <?php endforeach; ?>
            </ul>
            <?php if (!empty($settings['btn_text'])): ?>
                <a class="xb-item--btn xb-btn" href="<?php echo esc_url($settings['btn_link']['url']); ?>" <?php echo $target . $nofollow; ?> ><?php echo esc_html($settings['btn_text']); ?></a>
            <?php endif; ?>
            <?php if (!empty($settings['icon']['id'])): ?>
                <div class="xb-item--icon">
                    <?php echo wp_get_attachment_image($settings['icon']['id'], 'thumbnail'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Pricing_V2());