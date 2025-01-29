<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Blog extends Widget_Base
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
        return 'int-blog';
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
        return esc_html__('Blog', 'xpress-core');
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
            'color_option',
            [
                'label' => esc_html__('Section Title', 'xpress-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sec_bg_color',
            [
                'label' => esc_html__('Background Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .xb-blog .xb-item--inner.bg-clr' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'subtitle_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'sub-title-c',
            [
                'label' => esc_html__('Sub Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'selector' => '{{WRAPPER}} .sec-title .subtitle',
            ]
        );

        $this->add_control(
            'title-style',
            [
                'label' => esc_html__('Title Style', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'title-c',
            [
                'label' => esc_html__('Title Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'ttile_typography',
                'selector' => '{{WRAPPER}} .sec-title .title',
            ]
        );
        $this->add_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .sec-title .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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

        <div class="xb-blog__wrap">
            <div class="row g-12 mt-none-12">
                <div class="col-lg-6 mt-12">
                    <div class="xb-blog h-100">
                        <div class="xb-item--inner bg-clr ul_li h-100">
                            <div class="sec-title">
                                <?php if (!empty($settings['sub_title'])): ?>
                                    <h5 class="subtitle ul_li"><img
                                                src="<?php echo esc_url($settings['subtitle_icon']['url']); ?>"
                                                alt=""> <?php echo esc_html($settings['sub_title']); ?></h5>
                                <?php endif;

                                if (!empty($settings['title'])): ?>
                                    <h2 class="title"><?php echo wp_kses($settings['title'], true); ?></h2>
                                <?php endif;
                                if (!empty($settings['content'])): ?>
                                    <p><?php echo wp_kses($settings['content'], true); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($settings['shape']['id'])): ?>
                                <div class="xb-item--shape">
                                    <?php echo wp_get_attachment_image($settings['shape']['id'], 'large'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $tags = get_the_tags(get_the_ID());
                        $categories = get_the_terms(get_the_ID(), 'category');
                        ?>
                        <div class="col-lg-6 mt-12">
                            <div class="xb-blog">
                                <div class="xb-item--inner">
                                    <?php
                                    $categories = get_the_category();
                                    $cat_clr = get_term_meta($categories[0]->term_id, 'seargin_category_color', true);
                                    if (!empty($categories)) {
                                        if (isset($cat_clr['cat-color'])) {
                                            $bg = 'style ="background-color:' . $cat_clr['cat-color'] . '" ';
                                        } else {
                                            $bg = '';
                                        }
                                        echo '<a class="xb-item--cat" ' . $bg . ' href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                                    }
                                    ?>
                                    <h3 class="xb-item--title border-effect"><a
                                                href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></a>
                                    </h3>
                                    <p class="xb-item--content"><?php echo wp_trim_words(get_the_excerpt(), $settings['excerpt_length'], ''); ?></p>
                                    <div class="xb-item--meta ul_li">
                                        <div class="xb-item--author ul_li">
                                            <div class="xb-item--avatar">
                                                <?php seargin_post_author_avatars(36); ?>
                                            </div>
                                            <span class="xb-item--name"><?php the_author() ?></span>
                                        </div>
                                        <span class="xb-item--date"><i
                                                    class="far fa-clock"></i><?php echo get_the_date('F j, Y'); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    wp_reset_query();
                } ?>
            </div>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Blog());