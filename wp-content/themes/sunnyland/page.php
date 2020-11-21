<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sunnyland
 */

get_header();
?>
    <div class="bread">

        <div class="container">
            <?php echo dimox_breadcrumbs() ?>
        </div>
    </div>
    <div id="content">
        <div class="main-content child-page">
            <div class="container">
                <div class="content single-khach-san">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="content-text">
                            <h3><?php echo the_title() ?></h3>
                            <article class="post-content">
                                <?php the_content() ?>
                            </article>
                        </div>
                    <?php endwhile; // End of the loop. ?>
                </div>
            </div>
        </div>
    </div>


<?php
get_footer();
