<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Author_Img extends Widget_Base
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
        return 'int-author-img';
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
        return esc_html__('Author Image', 'xpress-core');
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
            'image', [
                'label' => esc_html__('Image', 'xpress-core'),
                'type' => Controls_Manager::MEDIA,
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
            'social_style',
            [
                'label' => esc_html__('Social Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon-c',
            [
                'label' => esc_html__('Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-about-social li a' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ad-about-social li a svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-c-h',
            [
                'label' => esc_html__('Icon Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-about-social li a:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .ad-about-social li a:hover svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-bg-c',
            [
                'label' => esc_html__('Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-about-social li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon-bg-c-h',
            [
                'label' => esc_html__('Icon Hover BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ad-about-social li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="ad-about-author-img pos-rel">
            <?php echo wp_get_attachment_image($settings['image']['id'], 'large'); ?>
            <ul class="ad-about-social ul_li_center">
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
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Author_Img());