<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Team_Info extends Widget_Base
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
        return 'int-team-info';
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
        return esc_html__('Team Info', 'xpress-core');
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
            'name', [
                'label' => esc_html__('Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'info', [
                'label' => esc_html__('Information', 'xpress-core'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
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
            's_title', [
                'label' => esc_html__('Social Title', 'xpress-core'),
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
            'image_options',
            [
                'label' => esc_html__('Image Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'shape', [
                'label' => esc_html__('Shape', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
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

        $this->add_control(
            'name-c',
            [
                'label' => esc_html__('Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .team-single__author-info .xb-item--name',
            ]
        );
        $this->add_control(
            'info_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'info_color',
            [
                'label' => esc_html__('Info Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--list li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'info_typography',
                'selector' => '{{WRAPPER}} .team-single__author-info .xb-item--list li',
            ]
        );
        $this->add_control(
            'social_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social_title_color',
            [
                'label' => esc_html__('Social Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--social-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'social_typography',
                'selector' => '{{WRAPPER}} .team-single__author-info .xb-item--social-title',
            ]
        );
        $this->add_control(
            'hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'social_color',
            [
                'label' => esc_html__('Social Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--social li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-single__author-info .xb-item--social li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_h_color',
            [
                'label' => esc_html__('Social Icon Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--social li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .team-single__author-info .xb-item--social li a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_border_color',
            [
                'label' => esc_html__('Social Border Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-single__author-info .xb-item--social li a' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>

        <div class="team-single__author ul_li">
            <div class="team-single__author-info">
                <?php if (!empty($settings['name'])): ?>
                    <h3 class="xb-item--name"><?php echo esc_html($settings['name']); ?></h3>
                <?php endif; ?>
                <?php if (!empty($settings['info'])): ?>
                    <div class="xb-item--list mb-60">
                        <?php echo wp_kses($settings['info'], true); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($settings['s_title'])): ?>
                    <h3 class="xb-item--social-title"><?php echo esc_html($settings['s_title']); ?></h3>
                <?php endif; ?>
                <ul class="xb-item--social ul_li">
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
            <?php if (!empty($settings['image']['id'])): ?>
                <div class="team-single__img pos-rel">
                    <?php echo wp_get_attachment_image($settings['image']['id'], 'large'); ?>
                    <div class="team-single__img-shape">
                        <?php echo wp_get_attachment_image($settings['shape']['id'], 'large'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Team_Info());