<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_V4 extends Widget_Base
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
        return 'int-service-v4';
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
        return esc_html__('Service V4', 'xpress-core');
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon', [
                'label' => esc_html__('Icon', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
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
            'link_text', [
                'label' => esc_html__('Link Label', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
        $repeater->add_control(
            'arrow_icon',
            [
                'label' => esc_html__( 'Arrow Icon', 'xpress-core' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $this->add_control(
            'services',
            [
                'label' => esc_html__('Add Service Item', 'xpress-core'),
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
            'srv_bg-c',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--inner' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'srv_bg_hover-c',
            [
                'label' => esc_html__('Background Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--inner:hover::before' => 'background-color: {{VALUE}}',
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
            'tt-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'tt-hover-c',
            [
                'label' => esc_html__('Title Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--inner:hover .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tt_typography',
                'selector' => '{{WRAPPER}} .lw-service .xb-item--title',
            ]
        );
        $this->add_control(
            'link_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'link-c',
            [
                'label' => esc_html__('Link Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'link-hover-c',
            [
                'label' => esc_html__('Link Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-service .xb-item--inner:hover .xb-item--link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'selector' => '{{WRAPPER}} .lw-service .xb-item--link',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="lw-service-wrap">
            <div class="row justify-content-center g-0">
                <?php
                foreach ($settings['services'] as $service):
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="lw-service">
                            <div class="xb-item--inner">
                                <div class="xb-item--holder">
                                    <?php if (!empty($service['icon']['id'])): ?>
                                        <div class="xb-item--icon">
                                            <?php echo wp_get_attachment_image($service['icon']['id'], 'thumbnail'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($service['title'])): ?>
                                        <h3 class="xb-item--title"><?php echo esc_html($service['title']); ?></h3>
                                    <?php endif; ?>
                                    <?php if (!empty($service['link_text'])): ?>
                                        <a class="xb-item--link" href="<?php echo esc_url($service['link']['url']); ?>"><?php echo esc_html($service['link_text']); ?> <span><?php \Elementor\Icons_Manager::render_icon( $service['arrow_icon'], [ 'aria-hidden' => 'true' ] ); ?></span></a>
                                    <?php endif; ?>
                                    <a class="xb-overlay xb-overlay-link" href="<?php echo esc_url($service['link']['url']); ?>"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php
    }

}


Plugin::instance()->widgets_manager->register(new Seargin_Service_V4());