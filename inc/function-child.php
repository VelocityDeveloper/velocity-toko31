<?php

/**
 * Fuction yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function velocity_categories()
{
    $args = array(
        'orderby' => 'name',
        'hide_empty' => false,
    );
    $cats = array(
        '' => 'Show All'
    );
    $categories = get_categories($args);
    foreach ($categories as $category) {
        $cats[$category->term_id] = $category->name;
    }
    return $cats;
}

add_action('after_setup_theme', 'velocitychild_theme_setup', 10);
function velocitychild_theme_setup()
{
    // Load justg_child_enqueue_parent_style after theme setup
    // add_action('wp_enqueue_scripts', 'justg_child_enqueue_parent_style', 20);

    if (class_exists('Kirki')) :

        Kirki::add_panel('panel_toko31', [
            'priority'    => 10,
            'title'       => esc_html__('Velocity Toko 31', 'justg'),
            'description' => esc_html__('', 'justg'),
        ]);

        // section title_tagline
        Kirki::add_section('title_tagline', [
            'panel'    => 'panel_toko31',
            'title'    => __('Site Identity', 'justg'),
            'priority' => 10,
        ]);

        /// Section Typography
        Kirki::add_section('section_typography', [
            'panel'     => 'panel_toko31',
            'title'     => __('Typography', 'justg'),
            'priority'  => 10,
        ]);

        new \Kirki\Field\Typography(
            [
                'settings'    => 'heading_setting',
                'label'       => esc_html__('Heading', 'velocity'),
                'description' => esc_html__('Just the font-family and font-weight.', 'velocity'),
                'section'     => 'section_typography',
                'priority'    => 10,
                'transport'   => 'auto',
                'default'     => [
                    'font-family'     => 'Oswald',
                ],
                'output'      => [
                    [
                        'element'   => 'h1,h2,h3,h4,h5,h6',
                    ],
                ],
            ]
        );

        new \Kirki\Field\Typography(
            [
                'settings'    => 'typography_setting',
                'label'       => esc_html__('Typography Body', 'velocity'),
                'description' => esc_html__('Just the font-family and font-weight.', 'velocity'),
                'section'     => 'section_typography',
                'priority'    => 10,
                'transport'   => 'auto',
                'default'     => [
                    'font-family'     => 'Poppins',
                    'variant'         => 'regular',
                    'font-style'      => 'normal',
                    'font-size'       => '14px',
                    'line-height'     => '1.5',
                    'letter-spacing'  => '0',
                    'text-transform'  => 'none',
                    'text-decoration' => 'none',
                    'text-align'      => 'left',
                ],
                'output'      => [
                    [
                        'element' => 'body,.is-root-container',
                    ],
                ],
            ]
        );

        ///Section Color
        Kirki::add_section('section_colorvelocity', [
            'panel'    => 'panel_toko31',
            'title'    => __('Background', 'justg'),
            'priority' => 10,
        ]);

        /**
         * Multicolor Control.
         */
        new \Kirki\Field\Multicolor(
            [
                'settings'  => 'link_setting',
                'label'     => esc_html__('Multicolor Control', 'velocity'),
                'section'   => 'section_colorvelocity',
                'priority'  => 10,
                'transport' => 'postMessage',
                'choices'   => [
                    'main'    => esc_html__('Text', 'justg'),
                    'heading' => esc_html__('Heading', 'justg'),
                    'link'    => esc_html__('Link', 'justg'),
                    'hover'   => esc_html__('Hover', 'justg'),
                    'active'  => esc_html__('Active', 'justg'),
                    'primary' => esc_html__('Primary', 'justg'),
                    'light'      => esc_html__('Light', 'justg'),
                ],
                'alpha'     => true,
                'default'     => [
                    'main'    => '#333333',
                    'heading' => '#121212',
                    'link'    => '#002B5B',
                    'hover'   => '#333333',
                    'primary' => '#1e73be',
                    'light'   => '#f8f9fa',
                ],
                'output'   => [
                    [
                        'choice'    => 'main',
                        'element'   => ':root[data-bs-theme=light]',
                        'property'  => '--bs-body-color',
                    ],
                    [
                        'choice'    => 'heading',
                        'element'   => ':root[data-bs-theme=light]',
                        'property'  => '--bs-heading-color',
                    ],
                    [
                        'choice'    => 'link',
                        'element'   => ':root[data-bs-theme=light]',
                        'property'  => '--bs-link-color',
                    ],
                    [
                        'choice'    => 'hover',
                        'element'   => ':root[data-bs-theme=light]',
                        'property'  => '--bs-link-hover-color',
                    ],
                    [
                        'choice'    => 'primary',
                        'element'   => ':root',
                        'property'  => '--bs-primary',
                    ],
                    [
                        'choice'    => 'primary',
                        'element'   => ':root',
                        'property'  => '--primary',
                    ],
                    [
                        'choice'    => 'primary',
                        'element'   => '[data-bs-theme=dark]',
                        'property'  => '--bs-link-hover-color',
                    ],
                    [
                        'choice'    => 'light',
                        'element'   => ':root',
                        'property'  => '--bs-light',
                    ],
                    [
                        'choice'    => 'light',
                        'element'   => ':root',
                        'property'  => '--light',
                    ],
                ],
            ]
        );

        Kirki::add_field('justg_config', [
            'type'        => 'background',
            'settings'    => 'background_themewebsite',
            'label'       => __('Website Background', 'justg'),
            'description' => esc_html__('', 'justg'),
            'section'     => 'section_colorvelocity',
            'default'     => [
                'background-color'      => 'rgba(255,255,255)',
                'background-image'      => '',
                'background-repeat'     => 'repeat',
                'background-position'   => 'center center',
                'background-size'       => 'cover',
                'background-attachment' => 'scroll',
            ],
            'transport'   => 'auto',
            'output'      => [
                [
                    'element'   => ':root[data-bs-theme=light] body',
                ],
                [
                    'element'   => 'body',
                ],
            ],
        ]);

        ///Section Color
        Kirki::add_section('section_slider', [
            'panel'    => 'panel_toko31',
            'title'    => __('Slider Home', 'justg'),
            'priority' => 10,
        ]);
        new \Kirki\Field\Repeater(
            [
                'settings' => 'slider_repeat',
                'label'    => esc_html__('Slider Home', 'justg'),
                'section'  => 'section_slider',
                'priority' => 10,
                'row_label'    => [
                    'type'  => 'field',
                    'value' => esc_html__('Slider', 'justg'),
                ],
                'button_label' => esc_html__('"Add Slider" ', 'justg'),
                'fields'   => [
                    'imgslider'   => [
                        'type'        => 'image',
                        'label'       => esc_html__('Slider', 'justg'),
                        'description' => esc_html__('', 'justg'),
                        'default'     => '',
                    ],
                ],
            ]
        );

        // section velocity_news_section
        Kirki::add_section('velocity_news_section', [
            'panel'    => 'panel_toko31',
            'title'    => __('Velocity Home News', 'justg'),
            'priority' => 10,
        ]);
        new \Kirki\Field\Text(
            [
                'settings' => 'velocity_judul_news',
                'label'    => esc_html__('Judul', 'justg'),
                'section'  => 'velocity_news_section',
                'default'  => esc_html__('', 'justg'),
                'priority' => 10,
            ]
        );
        new \Kirki\Field\Select(
            [
                'settings'    => 'velocity_news',
                'label'       => esc_html__('Pilih Kategori:', 'justg'),
                'section'     => 'velocity_news_section',
                'default'     => '',
                'placeholder' => esc_html__('Pilih Kategori', 'justg'),
                'choices'   => velocity_categories(),
            ]
        );

        // section velocity_hotline
        Kirki::add_section('velocity_hotline', [
            'panel'    => 'panel_toko31',
            'title'    => __('Velocity Hotline', 'justg'),
            'priority' => 10,
        ]);
        new \Kirki\Field\Text(
            [
                'settings' => 'hotline',
                'label'    => esc_html__('Hotline', 'justg'),
                'section'  => 'velocity_hotline',
                'default'  => esc_html__('', 'justg'),
                'priority' => 10,
            ]
        );

        // remove panel in customizer 
        Kirki::remove_panel('global_panel');
        Kirki::remove_panel('panel_header');
        Kirki::remove_panel('panel_footer');
        Kirki::remove_panel('panel_antispam');
    // Kirki::remove_control('custom_logo');

    endif;

    //remove action from Parent Theme
    remove_action('justg_header', 'justg_header_menu');
    remove_action('justg_do_footer', 'justg_the_footer_open');
    remove_action('justg_do_footer', 'justg_the_footer_content');
    remove_action('justg_do_footer', 'justg_the_footer_close');
    remove_theme_support('widgets-block-editor');
}

if (!function_exists('justg_header_open')) {
    function justg_header_open()
    {
        echo '<header id="wrapper-header">';
        echo '<div id="wrapper-navbar" class="wrapper-fluid wrapper-navbar position-relative pb-0 p-md-0 p-2" itemscope itemtype="http://schema.org/WebSite">';
        echo '<div class="card p-0 rounded-0 border-light border-top-0 border-bottom-0 shadow container">';
    }
}
if (!function_exists('justg_header_close')) {
    function justg_header_close()
    {
        echo '</div>';
        echo '</div>';
        echo '</header>';
    }
}


///add action builder part
add_action('justg_header', 'justg_header_berita');
function justg_header_berita()
{
    require_once(get_stylesheet_directory() . '/inc/part-header.php');
}

add_action('justg_do_footer', 'justg_footer_berita');
function justg_footer_berita()
{
    do_action('justg_the_footer_content');
    require_once(get_stylesheet_directory() . '/inc/part-footer.php');
}
add_action('justg_before_wrapper_content', 'justg_before_wrapper_content');
function justg_before_wrapper_content()
{
    echo '<div class="px-2">';
    echo '<div class="card rounded-0 border-light border-top-0 border-bottom-0 shadow px-3 py-2 container">';
}
add_action('justg_after_wrapper_content', 'justg_after_wrapper_content');
function justg_after_wrapper_content()
{
    echo '</div>';
    echo '</div>';
}

// excerpt more
add_filter('excerpt_more', 'velocity_custom_excerpt_more');
if (!function_exists('velocity_custom_excerpt_more')) {
    function velocity_custom_excerpt_more($more)
    {
        return '...';
    }
}

// excerpt length
add_filter('excerpt_length', 'velocity_excerpt_length');
function velocity_excerpt_length($length)
{
    return 20;
}

if (!function_exists('justg_right_sidebar_check')) {
    function justg_right_sidebar_check()
    {
        if (is_singular('fl-builder-template')) {
            return;
        }
        if (!is_active_sidebar('main-sidebar')) {
            return;
        }
        // if (is_singular('product')) {
        //     return;
        // }
        if (is_tax(array('merk', 'category-product'))) {
            echo '<div class="left-sidebar widget-area pe-md-2 col-sm-12 col-md-3 order-md-1 order-4" id="left-sidebar" role="complementary">';
            echo '<aside class="mb-3 d-none d-md-block">';
            echo get_velocitytoko_part('public/templates/filter');
            echo '</aside>';
            echo '</div>';
            return;
        }
        echo '<div class="left-sidebar velocity-widget widget-area px-md-0 col-sm-12 col-md-3 order-3 order-md-1" id="left-sidebar" role="complementary">';
        do_action('justg_before_main_sidebar');
        dynamic_sidebar('main-sidebar');
        do_action('justg_after_main_sidebar');
        echo '</div>';
    }
}

function velocity_title()
{
    if (is_single() || is_page()) {
        return the_title('<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">', '</h1>');
    } elseif (is_archive()) {
        return the_archive_title('<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">', '</h1>');
        return category_description();
    } elseif (is_tag()) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . single_tag_title('', false) . '</h1>';
    } elseif (is_day()) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . sprintf(__('Daily Archives: <span>%s</span>', THEME_NS), get_the_date()) . '</h1>';
    } elseif (is_month()) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . sprintf(__('Monthly Archives: <span>%s</span>', THEME_NS), get_the_date('F Y')) . '</h1>';
    } elseif (is_year()) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . sprintf(__('Yearly Archives: <span>%s</span>', THEME_NS), get_the_date('Y')) . '</h1>';
    } elseif (is_tax()) {
        $object = get_queried_object();
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . $object->name . '</h1>';
    } elseif (is_post_type_archive()) {
        $object = get_queried_object();
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . $object->label . '</h1>';
    } elseif (is_author()) {
        //the_post();
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">' . get_the_author() . '</h1>';
        //rewind_posts();
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">Blog Archives</h1>';
    } elseif (is_search()) {
        return '<h1 class="h4 text-uppercase velocity-postheader velocity-judul colortheme">Search Results for: "' . get_search_query() . '"</h1>';
    }
}

// archive product
remove_action('velocitytoko_product_loop', 'velocitytoko_content_product', 20);
add_action('velocitytoko_product_loop', 'velocitytoko_content_products', 30);
function velocitytoko_content_products($post)
{
    $title = wp_trim_words(get_the_title(), '5');
?>
    <article <?php post_class('col-md-4 col-6 p-2 mb-3'); ?> id="post-<?php the_ID(); ?>">
        <div class="card h-100 shadow card-product border-0">
            <?php echo do_shortcode("[thumbnail width='300' height='300' crop='false' upscale='true']"); ?>

            <div class="p-3">
                <div class="my-2 text-center">
                    <h6 class="colortheme fw-bold"><?php echo do_shortcode("[harga]"); ?></h6>
                </div>
                <div class="my-2 text-center">
                    <h6><a class="text-dark" href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h6>
                </div>
                <div class="row">
                    <div class="col-9 p-1 text-start"><a href="<?php the_permalink(); ?>" class="btn btn-sm p-1 bg-colortheme text-white w-100">Detail</a></div>
                    <div class="col-3 p-1 text-end">
                        <span class="cart-arsip w-100 btn btn-sm p-1 bg-dark"><?php echo do_shortcode("[beli]"); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php
}

// single product
remove_action('velocitytoko_content_single_product', 'velocitytoko_content_single_product', 20);
add_action('velocitytoko_content_single_product', 'velocitytoko_content_single_products', 30);
function velocitytoko_content_single_products($post)
{
?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <?php //echo do_shortcode('[vd-breadcrumbs]'); 
        ?>
        <div class="block-primary">
            <h3 class="colortheme fs-4 mb-3">
                <?php echo do_shortcode("[vtoko-title link='false' node-cart='cartsingle']"); ?>
            </h3>
            <div class="row">
                <div class="col-md-6 col-xl-5">
                    <?php echo do_shortcode('[slider-produk width="350" height="350"]'); ?>
                </div>
                <div class="col-md">

                    <div class="mb-2">
                        <small>
                            Kategori: <?php echo velocitytoko_term_list('category-product', ",", get_the_ID()); ?>
                            | Dilihat: <?php echo do_shortcode('[view]'); ?>
                        </small>
                    </div>
                    <div class="single-harga mb-3">
                        <h5>Harga: <span class="colortheme"><?php echo do_shortcode('[harga node-cart="cartsingle"]'); ?></span></h5>
                    </div>
                    <div class="mb-3"><?php echo do_shortcode('[beli modal="false" node-cart="cartsingle" text="true"]'); ?></div>
                    <div class="mb-3"><?php echo do_shortcode('[love text="true"]'); ?></div>
                    <div class="mb-3"><?php echo do_shortcode('[beli-lain]'); ?></div>
                    <div class="mb-3"><?php echo do_shortcode('[detail-produk]'); ?></div>
                    <div class="mb-3"><?php echo do_shortcode('[share]'); ?></div>
                </div>
            </div>
        </div>

        <div class="block-primary">
            <h3 class="title-single-part">Detail Produk</h3>
            <div><?php echo get_the_content(); ?></div>
        </div>

    </article><!-- #post-## -->
<?php
}
