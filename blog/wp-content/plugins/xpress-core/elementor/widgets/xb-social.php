<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Social extends Widget_Base
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
        return 'int-social';
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
        return esc_html__('Social', 'xpress-core');
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
            'social_content_option',
            [
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'xpress-core'),
                    'style_2' => __('Style 2', 'xpress-core'),
                ],
                'default' => 'style_1',
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

        $this->end_controls_section();


        $this->start_controls_section(
            'color_option',
            [
                'label' => esc_html__('Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social span' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .footer-social span,
                                {{WRAPPER}} .bc-footer-social-title',
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
                    '{{WRAPPER}} .footer-social ul li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .footer-social ul li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-bg-c',
            [
                'label' => esc_html__('Social BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-footer-social li a' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->add_control(
            'social-c-h',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-social ul li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .bc-footer-social li a:hover svg path' => 'fill: {{VALUE}}',
                    '{{WRAPPER}} .footer-social ul li a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social-hover-bg-c',
            [
                'label' => esc_html__('Social Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-footer-social li a:hover' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <?php if (!empty($settings['design_style']) and $settings['design_style'] == 'style_2'): ?>
        <div class="bc-footer-social-inner">
            <?php if (!empty($settings['title'])): ?>
                <span class="bc-footer-social-title"><?php echo esc_html($settings['title']); ?></span>
            <?php endif; ?>
            <ul class="bc-footer-social ul_li">
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
    <?php else: ?>
        <div class="footer-social ul_li_right mt-15">
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
    <?php
    endif;

    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Social());