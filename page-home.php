<?php

/**
 * Template Name: Home Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package justg
 */

get_header();
$container         = velocitytheme_option('justg_container_type', 'container');
$sliders = velocitytheme_option('slider_repeat');
?>
<div class="wrapper py-3" id="page-wrapper">
    <div class="" id="content">
        <div class="row mx-md-auto">
            <?php do_action('justg_before_content'); ?>
            <main class="site-main" id="main" role="main">

                <div id="carouselExampleInterval" class="carousel slide border" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php $i = 0;
                        foreach ($sliders as $slider) : $i++;
                        $active = $i==1 ? 'active' : '';?>
                            <div class="carousel-item <?php echo $active;?>" data-bs-interval="3000">
                                <img class="ratio ratio-16x9" src="<?php echo $slider['imgslider']; ?>" alt="...">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <h3 class="title-single-part colortheme"><?php echo get_option('blogname') . '-' . get_option('blogdescription'); ?></h3>
                <div class="produk-home">
                    <?php
                    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
                    $argprod = array(
                        'posts_per_page' => 6,
                        'post_type' => 'product',
                        'paged' => $paged,
                    );
                    $produk_query = new WP_Query($argprod);

                    if ($produk_query->have_posts()) :
                        echo '<div class="row m-0">';
                        while ($produk_query->have_posts()) :
                            $produk_query->the_post();
                            $title = wp_trim_words(get_the_title(), '5');
                    ?>
                            <article <?php post_class('col-md-4 col-6 p-2 mb-3'); ?> id="post-<?php the_ID(); ?>">
                                <div class="card h-100 shadow card-product border-0">
                                    <div class="bg-colortheme p-2">
                                        <?php echo do_shortcode("[thumbnail width='300' height='300' crop='false' upscale='true']"); ?>
                                    </div>

                                    <div class="p-3">
                                        <div class="my-2 text-center">
                                            <h6 class="colortheme fw-bold"><?php echo do_shortcode("[harga]"); ?></h6>
                                        </div>
                                        <div class="my-2 text-center">
                                            <h6><a class="text-dark" href="<?php echo get_the_permalink(); ?>"><?php echo $title; ?></a></h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-9 p-1 text-start"><a href="<?php the_permalink(); ?>" class="btn btn-sm p-1 bg-colortheme text-white fw-bold w-100">Detail</a></div>
                                            <div class="col-3 p-1 text-end">
                                                <span class="cart-arsip w-100 btn btn-sm p-1 bg-dark"><?php echo do_shortcode("[beli]"); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                </div>

                <!-- // Fungsi pagination -->
                <div class="pagination pagi-home">
                    <?php
                        echo paginate_links([
                            'total' => $produk_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => __('&laquo; Prev'),
                            'next_text' => __('Next &raquo;'),
                        ]); ?>
                </div>
            <?php
                        wp_reset_query();
                    endif;
            ?>
        </div>

        <!-- Artikel section -->
        <?php $args = array(
            'posts_per_page' => 3,
            'showposts' => 3,
            'post_type' => 'post',
            'cat' => velocitytheme_option('velocity_news'),
        );
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) : ?>
            <div class="blog-home">
                <?php if (!empty(velocitytheme_option('velocity_judul_news'))) { ?>
                    <h3 class="title-single-part colortheme"><?php echo velocitytheme_option('velocity_judul_news'); ?></h3>
                <?php } ?>
                <div class="row mx-0">
                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <article <?php post_class('row mx-0 border p-1 rounded-0 mb-3'); ?> id="post-<?php the_ID(); ?>">
                            <div class="col-md-2 p-md-2 p-0">
                                <?php if (has_post_thumbnail()) { ?>
                                    <div class="ratio ratio-1x1">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('full', array('class' => 'w-100 mb-3')); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="col-md-10 p-md-2 py-2 px-0">
                                <div class="judul-posts">
                                    <h6>
                                        <a class="colortheme text-uppercase" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo the_title(); ?></a>
                                    </h6>
                                </div>
                                <div class="entry-content">
                                    <?php $content = get_the_content();
                                    $trimmed_content = wp_trim_words($content, 30);
                                    echo $trimmed_content; ?>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif;
        wp_reset_query(); ?>
        </main><!-- #main -->
        <?php do_action('justg_after_content'); ?>
    </div>
</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
