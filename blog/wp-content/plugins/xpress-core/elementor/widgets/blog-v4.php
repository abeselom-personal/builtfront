<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Blog_V4 extends Widget_Base
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
        return 'int-blog-v4';
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
        return esc_html__('Blog V4', 'xpress-core');
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
            'section_title_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'subtitle_icon',
            [
                'label' => esc_html__('Sub Title Icon', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'sub_title', [
                'label' => esc_html__('Sub Title', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content', [
                'label' => esc_html__('Content', 'xpress-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_responsive_control(
            'text_align',
            [
                'label' => esc_html__('Text Align', 'xpress-core'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'start' => [
                        'title' => __('Left', 'xpress-core'),
                        'icon' => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'xpress-core'),
                        'icon' => 'eicon-text-align-center',
                    ],

                    'end' => [
                        'title' => __('Right', 'xpress-core'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .sec-title' => 'text-align: {{VALUE}};',
                ],
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
            'post_sec_h_option',
            [
                'label' => esc_html__('Post Option', 'xpress-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'post_order',
            [
                'label' => esc_html__('Post Order', 'xpress-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'xpress-core'),
                    'DESC' => esc_html__('Descending', 'xpress-core'),
                ],
            ]
        );

        $this->add_control(
            'post_per_page',
            [
                'label' => __('Posts Per Page', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'default' => 5,
            ]
        );
        $this->add_control(
            'post_categories',
            [
                'type' => Controls_Manager::SELECT2,
                'label' => esc_html__('Select Categories', 'xpress-core'),
                'options' => xpress_blog_category(),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'title_length',
            [
                'label' => __('Title Length', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 12,
            ]
        );
        $this->add_control(
            'excerpt_length',
            [
                'label' => __('Excerpt Length', 'xpress-core'),
                'type' => Controls_Manager::NUMBER,
                'step' => 1,
                'default' => 20,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'post_style',
            [
                'label' => esc_html__('Post Style', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .lw-blog .xb-item--holder' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .lw-blog .xb-item--holder' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'p-title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_title_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--title',
            ]
        );
        $this->add_control(
            'p_conetnt_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-content-c',
            [
                'label' => esc_html__('Content Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_content_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--content',
            ]
        );
        $this->add_control(
            'author_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-author-c',
            [
                'label' => esc_html__('Author Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'author_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--name',
            ]
        );
        $this->add_control(
            'date_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-date-c',
            [
                'label' => esc_html__('Date Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--date' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .xb-blog .xb-item--date i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .xb-blog .xb-item--date',
            ]
        );
        $this->end_controls_section();


    }


    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page'] : 1,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'order' => $settings['post_order'],
        );
        if (!empty($settings['post_categories'])) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }

        $query = new \WP_Query($args);
        ?>

        <div class="xb-testimonial-sliders">
            <div class="xb-carousel-inner">
                <div class="lw-blog-slider xb-swiper-container swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                $tags = get_the_tags(get_the_ID());
                                $categories = get_the_terms(get_the_ID(), 'category');
                                ?>
                                <div class="xb-blog lw-blog xb-hover-zoom swiper-slide">
                                    <div class="xb-item--inner">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="xb-item--img">
                                                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('large'); ?></a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="xb-item--holder">
                                            <span class="xb-item--cat"><?php echo esc_html($categories[0]->name); ?></span>
                                            <h2 class="xb-item--title border-effect"><a
                                                        href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></a>
                                            </h2>
                                            <p class="xb-item--content"><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], ''); ?></p>
                                            <div class="xb-item--meta ul_li">
                                                <div class="xb-item--author ul_li">
                                                    <div class="xb-item--avatar">
                                                        <?php seargin_post_author_avatars(36); ?>
                                                    </div>
                                                    <span class="xb-item--name"><?php the_author() ?></span>
                                                </div>
                                                <span class="xb-item--date"><i class="far fa-clock"></i><?php echo get_the_date('F j, Y'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                            wp_reset_query();
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Blog_V4());