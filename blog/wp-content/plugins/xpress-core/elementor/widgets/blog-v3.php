<?php

/**
 * Elementor Single Widget
 * @package xpress-core
 * @since 1.0.0
 */

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly.

class Seargin_Blog_V3 extends Widget_Base
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
        return 'int-blog-v3';
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
        return esc_html__('Blog V3', 'xpress-core');
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
            'read_min', [
                'label' => esc_html__('Read Min', 'xpress-core'),
                'default' => esc_html__('10 min read', 'xpress-core'),
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
            'padding',
            [
                'label' => esc_html__('Padding', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .mr-blog' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'xpress-core'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .mr-blog' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'p-cat-c',
            [
                'label' => esc_html__('Category Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-blog .xb-item--cat span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'p-cat-bg-c',
            [
                'label' => esc_html__('Category BG Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-blog .xb-item--cat span' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'cat_typography',
                'selector' => '{{WRAPPER}} .mr-blog .xb-item--cat span',
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
                    '{{WRAPPER}} .mr-blog .xb-item--title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_title_typography',
                'selector' => '{{WRAPPER}} .mr-blog .xb-item--title',
            ]
        );
        $this->add_control(
            'p_date_hr',
            [
                'type' => \Elementor\Controls_Manager::DIVIDER,
            ]
        );
        $this->add_control(
            'p-date-c',
            [
                'label' => esc_html__('Date & Read Text Color', 'xpress-core'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .mr-blog .xb-item--date' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .mr-blog .xb-item--read' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'p_date_typography',
                'selector' => '{{WRAPPER}} .mr-blog .xb-item--date, {{WRAPPER}} .mr-blog .xb-item--date',
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
        $post_counter = 0
        ?>
        <div class="mr-blog-wrap">
            <?php
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $tags = get_the_tags(get_the_ID());
                    $categories = get_the_terms(get_the_ID(), 'category');
                    $post_counter++;
                    ?>
                    <div class="mr-blog xb-mouseenter <?php echo ($post_counter === 1) ? 'active' : ''; ?>">
                        <div class="xb-item--inner ul_li_between">
                            <div class="xb-item--holder d-flex">
                                <span class="xb-item--cat"><span><?php echo esc_html($categories[0]->name); ?></span></span>
                                <h2 class="xb-item--title"><?php echo wp_trim_words(get_the_title(), $settings['title_length'], ''); ?></h2>
                            </div>
                            <span class="xb-item--date"><?php echo get_the_date('M d, Y'); ?></span>
                            <?php if (!empty($settings['read_min'])): ?>
                                <span class="xb-item--read"><?php echo esc_html($settings['read_min']); ?></span>
                            <?php endif; ?>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="xb-item--img"
                                     style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');"></div>
                            <?php endif; ?>
                            <a class="xb-overlay" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                <?php }
                wp_reset_query();
            } ?>
        </div>
        <?php
    }


}


Plugin::instance()->widgets_manager->register(new Seargin_Blog_V3());