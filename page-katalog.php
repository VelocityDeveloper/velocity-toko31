<?php

/**
 * Template Name: Velocity Toko 31 Katalog
 *
 * @package velocity-toko
 */

get_header();
$container        = get_theme_mod('justg_container_type', 'container');
$search_query     = new WP_Query(array(
    'post_type'         => 'product',
    'post_status'       => 'publish',
    'order'             => 'asc',
    'orderby'           => 'title',
    'posts_per_page'    => -1
));
?>

<div class="wrapper" id="page-wrapper">

    <div class="<?php echo esc_attr($container); ?> p-0" id="content">

        <div class="btn-print mb-3">
            <?php echo do_shortcode('[print targetid="main"]'); ?>
        </div>

        <div class="row mx-0">

            <!-- Do the left sidebar check -->
            <?php do_action('justg_before_content'); ?>

            <div class="content-area col order-2" id="primary">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <?php the_title('<h5 class="fw-bold text-uppercase colortheme m-0">', '</h5>'); ?>
                </div>

                <main class="site-main mt-3" id="main">
                    <?php if ($search_query->have_posts()) : ?>
                        <div class="row mx-0">
                            <?php while ($search_query->have_posts()) : $search_query->the_post();
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
                    <?php else : ?>
                        <div class="container text-center">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z" />
                                </svg>
                            </span>
                            <h3 class="mt-2 mb-3"> Produk tidak ditemukan ! :(</h3>
                        </div>
                    <?php endif; ?>

                </main><!-- #main -->

            </div><!-- #primary -->

            <!-- Do the right sidebar check. -->
            <?php do_action('justg_after_content'); ?>

        </div><!-- .row -->

    </div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
