<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Blog_V2 extends Widget_Base
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
        return 'int-blog-v2';
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
        return esc_html__('Blog V2', 'xpress-core');
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
            'button_label', [
                'label' => esc_html__('Readmore Button', 'xpress-core'),
                'default' => esc_html__('Read more', 'xpress-core'),
                'type' => Controls_Manager::TEXT,
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
            'p-date-c',
            [
                'label' => esc_html__('Date Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-blog .xb-item--date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'selector' => '{{WRAPPER}} .bc-blog .xb-item--date',
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
                    '{{WRAPPER}} .bc-blog .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_title_typography',
                'selector' => '{{WRAPPER}} .bc-blog .xb-item--title',
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
                    '{{WRAPPER}} .bc-blog .xb-item--content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_content_typography',
                'selector' => '{{WRAPPER}} .bc-blog .xb-item--content',
            ]
        );
        $this->add_control(
            'read_more_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'readmore_color',
            [
                'label' => esc_html__('Read More Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-blog .xb-item--link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'readmore_icon_color',
            [
                'label' => esc_html__('Read More Icon Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-blog .xb-item--link i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'readmore_icon_bg_color',
            [
                'label' => esc_html__('Read More Icon BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-blog .xb-item--link i' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'readmore_icon_bg_hover_color',
            [
                'label' => esc_html__('Read More Icon BG Hover Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bc-blog .xb-item--link:hover i' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'readmore_typography',
                'selector' => '{{WRAPPER}} .bc-blog .xb-item--link',
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
            <div class="row justify-content-md-center mt-none-30">

                <?php
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $tags = get_the_tags(get_the_ID());
                        $categories = get_the_terms(get_the_ID(), 'category');
                        ?>
                        <div class="col-lg-4 col-md-6 mt-30">
                            <div class="bc-blog xb-hover-zoom">
                                <div class="xb-item--inner">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="xb-item--img">
                                            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('seargin-medium'); ?></a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="xb-item--holder">
                                        <span class="xb-item--date"><?php _e("Published on"); ?> <?php echo get_the_date('F j, Y'); ?></span>
                                        <h3 class="xb-item--title border-effect"><a
                                                    href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></a>
                                        </h3>
                                        <?php if (!empty($settings['button_label'])): ?>
                                            <a class="xb-item--link ul_li" href="<?php the_permalink() ?>"><i
                                                        class="far fa-arrow-right"></i><?php echo esc_html($settings['button_label']); ?>
                                            </a>
                                        <?php endif; ?>
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


Plugin::instance()->widgets_manager->register(new Seargin_Blog_V2());