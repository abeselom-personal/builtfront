<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Team_V3 extends Widget_Base
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
        return 'int-team-v3';
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
        return esc_html__('Team V3', 'xpress-core');
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
                'label' => esc_html__('Content', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'name', [
                'label' => esc_html__('Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'desig', [
                'label' => esc_html__('Designation', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
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
            'social_options',
            [
                'label' => esc_html__('Social Left', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
            's_link',
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
            'social_right',
            [
                'label' => esc_html__('Social Right', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
            's_link',
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
            'socials2',
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
            'hover_bg_color',
            [
                'label' => esc_html__('Hover Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--img::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'name_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );

        $this->add_control(
            'name-c',
            [
                'label' => esc_html__('Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .lw-team .xb-item--name',
            ]
        );
        $this->add_control(
            'desig_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'desig_color',
            [
                'label' => esc_html__('Designation Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--desig' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .lw-team .xb-item--desig',
            ]
        );
        $this->add_control(
            'social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social_color',
            [
                'label' => esc_html__('Social Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--social-links a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .lw-team .xb-item--social-links a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_bg_color',
            [
                'label' => esc_html__('Social BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--social-links a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_h_color',
            [
                'label' => esc_html__('Social Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--social-links a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .lw-team .xb-item--social-links a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_h_bg_color',
            [
                'label' => esc_html__('Social Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-team .xb-item--social-links a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="lw-team">
            <div class="xb-item--inner">
                <div class="xb-item--img pos-rel">
                    <?php echo wp_get_attachment_image($settings['image']['id'], 'large'); ?>
                    <div class="xb-item--social">
                        <span class="xb-item--icon"><i class="fal fa-plus"></i></span>
                        <ul class="xb-item--social-links ul_li_block">
                            <?php
                            foreach ($settings['socials'] as $social):
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social['s_link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social['icon'], ['aria-hidden' => 'true']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="xb-item--social-links ul_li">
                            <?php
                            foreach ($settings['socials2'] as $social2):
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($social2['s_link']['url']); ?>"><?php \Elementor\Icons_Manager::render_icon($social2['icon'], ['aria-hidden' => 'true']); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="xb-item--holder">
                    <?php if (!empty($settings['name'])): ?>
                        <h3 class="xb-item--name"><a
                                    href="<?php echo esc_url($settings['link']['url']); ?>"><?php echo esc_html($settings['name']); ?></a>
                        </h3>
                    <?php endif; ?>
                    <?php if (!empty($settings['desig'])): ?>
                        <span class="xb-item--desig"><?php echo esc_html($settings['desig']); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Team_V3());