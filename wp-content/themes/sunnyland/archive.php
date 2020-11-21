<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sunnyland
 */

get_header();
?>
    <div class="bread">
        <div class="container"><?php echo dimox_breadcrumbs()?></div>
    </div>
    <div id="content">
        <div class="box-search box-s-child">
            <?php form_search() ?>
        </div>
        <div class="cat-product">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h1 class="title-cat"><span><?php echo single_cat_title('', false); ?></span></h1>
                        <div class="list-reals">
                            <?php if (have_posts()) : ?>
                                <?php
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();

                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', get_post_type());

                                endwhile;

                                nav_pagination();

                            else :

                                get_template_part('template-parts/content', 'none');

                            endif;
                            ?>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
