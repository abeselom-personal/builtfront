<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Team extends Widget_Base
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
        return 'int-team';
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
        return esc_html__('Team', 'xpress-core');
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
            'name', [
                'label' => esc_html__('Name', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'desig', [
                'label' => esc_html__('Designation', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'shape',
            [
                'label' => esc_html__('Shape', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
            'social_options',
            [
                'label' => esc_html__('Social Options', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'fb',
            [
                'label' => esc_html__('Facebook Url', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tw',
            [
                'label' => esc_html__('Twitter Url', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'ln',
            [
                'label' => esc_html__('Linkedin Url', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'yt',
            [
                'label' => esc_html__('Youtube Url', 'xprss-core'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url'],
                'default' => [
                    'url' => '#',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'teams',
            [
                'label' => esc_html__('Add Team Item', 'xpress-core'),
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
            'name-c',
            [
                'label' => esc_html__('Name Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-team1 .xb-item--name a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .xb-team1 .xb-item--name',
            ]
        );
        $this->add_control(
            'content_hr',
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
                    '{{WRAPPER}} .xb-team1 .xb-item--desig' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desig_typography',
                'selector' => '{{WRAPPER}} .xb-team1 .xb-item--desig',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>


        <div class="xb-swiper-sliders">
            <div class="xb-carousel-inner">
                <div class="xb-team-sldier xb-swiper-container swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($settings['teams'] as $team):
                            ?>
                            <div class="xb-swiper-slide swiper-slide xb-team xb-team1">
                                <div class="xb-item--inner">
                                    <div class="xb-item--holder mb-25">
                                        <?php if (!empty($team['name'])): ?>
                                            <h3 class="xb-item--name"><a href="<?php echo esc_url($team['link']['url']); ?>"><?php echo esc_html($team['name']); ?></a></h3>
                                        <?php endif; ?>

                                        <?php if (!empty($team['desig'])): ?>
                                            <span class="xb-item--desig"><?php echo esc_html($team['desig']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if (!empty($team['image']['id'])): ?>
                                        <div class="xb-item--img">
                                            <div class="shape shape--4"><?php echo wp_get_attachment_image($team['image']['id'], 'large'); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($team['shape']['id'])): ?>
                                        <div class="xb-item--shape">
                                            <div class="shape shape--4"><?php echo wp_get_attachment_image($team['shape']['id'], 'large'); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <ul class="xb-item--social ul_li_center">
                                        <?php if(!empty($team['fb']['url'])): ?>
                                        <li><a class="facebook" href="<?php echo esc_url($team['ln']['url']) ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($team['tw']['url'])): ?>
                                        <li><a class="twitter" href="<?php echo esc_url($team['tw']['url']) ?>"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M9.4893 6.77491L15.3176 0H13.9365L8.87577 5.88256L4.8338 0H0.171875L6.28412 8.89547L0.171875 16H1.55307L6.8973 9.78782L11.1659 16H15.8278L9.48896 6.77491H9.4893ZM7.59756 8.97384L6.97826 8.08805L2.05073 1.03974H4.17217L8.14874 6.72795L8.76804 7.61374L13.9371 15.0075H11.8157L7.59756 8.97418V8.97384Z"
                                                              fill="black"/></g><defs><clipPath><rect width="16" height="16" fill="white"/></clipPath></defs></svg></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($team['ln']['url'])): ?>
                                            <li><a class="linkedin" href="<?php echo esc_url($team['ln']['url']) ?>"><i class="fab fa-linkedin"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(!empty($team['yt']['url'])): ?>
                                            <li><a class="youtube" href="<?php echo esc_url($team['ln']['url']) ?>"><i class="fab fa-youtube"></i></a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="pagination-style1 swiper-pagination style-white"></div>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Team());