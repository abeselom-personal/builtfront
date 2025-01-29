<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Service_V3 extends Widget_Base
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
        return 'int-service-v3';
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
        return esc_html__('Service V3', 'xpress-core');
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
            'active',
            [
                'label' => esc_html__('Active', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'xpress-core'),
                'label_off' => esc_html__('Hide', 'xpress-core'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'number', [
                'label' => esc_html__('Number', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link_label', [
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
            'image',
            [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'tabs',
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
            'number-c',
            [
                'label' => esc_html__('Number Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .number' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .number',
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
                    '{{WRAPPER}} .accordion_box .block .acc-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .acc-btn',
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
                    '{{WRAPPER}} .accordion_box .block .content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .content p',
            ]
        );
        $this->add_control(
            'link_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'link_color',
            [
                'label' => esc_html__('Link Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion_box .block .content a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'selector' => '{{WRAPPER}} .accordion_box .block .content a',
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="mr-service-wrap">
            <div class="row mt-none-30">
                <div class="col-lg-7 col-md-6 mt-30">
                    <ul class="mr-service nav nav-tabs accordion_box clearfix" id="myTab" role="tablist">
                        <?php foreach ($settings['tabs'] as $tab): ?>
                            <li class="nav-link accordion block <?php if ('yes' == $tab['active']) {
                                echo esc_attr('active-block active');
                            } ?>" id="<?php echo $tab['_id'] ?>-tab" data-bs-toggle="tab"
                                data-bs-target="#<?php echo $tab['_id'] ?>" role="tab"
                                aria-controls="<?php echo $tab['_id'] ?>" aria-selected="true">
                                <div class="acc-btn">
                                    <?php echo esc_html($tab['title']); ?>
                                    <span class="arrow"></span>
                                </div>
                                <div class="acc_body <?php if ('yes' == $tab['active']) {
                                    echo esc_attr('current');
                                } ?>">
                                    <div class="content">
                                        <?php echo wp_kses($tab['content'], true); ?>
                                        <?php if (!empty($tab['link_label'])): ?>
                                            <div class="mr-service-btn">
                                                <a href="<?php echo esc_url($tab['link']['url']); ?>"><?php echo esc_html($tab['link_label']); ?><span><img
                                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/mr_arrow_right.svg"
                                                                alt=""></span></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if (!empty($tab['number'])): ?>
                                    <span class="number"><?php echo esc_html($tab['number']); ?></span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 mt-30">
                    <div class="tab-content" id="myTabContent">
                        <?php foreach ($settings['tabs'] as $tab): ?>
                            <div class="tab-pane animated fadeInRight <?php if ('yes' == $tab['active']) {
                                echo esc_attr('show active');
                            } ?>" id="<?php echo $tab['_id'] ?>" role="tabpanel"
                                 aria-labelledby="<?php echo $tab['_id'] ?>-tab">
                                <div class="mr-service__img text-end">
                                    <?php echo wp_get_attachment_image($tab['image']['id'], 'large'); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Service_V3());