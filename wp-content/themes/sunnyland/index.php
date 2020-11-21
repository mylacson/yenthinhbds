<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sunnyland
 */

get_header();
?>

    <div id="content">
        <div class="slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/banner.jpg"
                             class="thumnail wp-post-image" alt=""/></div>
                    <div class="carousel-item">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/banner2.jpg"
                             class="thumnail wp-post-image" alt=""/></div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="box-search">
                <?php form_search() ?>
            </div>
        </div>
        <div class="featured">
            <div class="container">
                <div class="title">
                    <h2>
                        <span>Bất động sản nổi bật</span>
                    </h2>
                    <p>Sau đây là một số bất động sản nổi bật của chúng tôi!</p>
                </div>
                <div class="content-featured">
                    <div class="owl-carousel owl-theme featured-slider">
                        <?php

                        $myposts = get_posts(array(
                            'posts_per_page' => 10,
                            'category' => 12
                        ));
                        if ($myposts) {
                            foreach ($myposts as $i=> $post) :

                                $id = $post->ID;
                                $title = $post->post_title;
                                $date = $post->post_date;
                                $category_detail = get_the_category($id);
                                $saleName = '';
                                foreach ($category_detail as $cd) {
                                    if (in_array($cd->term_id, [7, 8])) {
                                        $saleName = $cd->name;
                                        break;
                                    }
                                }
                                $spk = get_field("so_phong_khach", $id);
                                $spn = get_field("so_phong_ngu", $id);
                                $spvs = get_field("so_nha_ve_sinh", $id);
                                $dt = get_field("dien_tich", $id);
                                $st = get_field("so_tang", $id);
                                $h = get_field("huong", $id);
                                $mt = get_field("mat_tien", $id);
                                $dv = get_field("duong_vao", $id);
                                $gt = get_field("gia_tien", $id);
                                $dc = get_field("dia_chi", $id);
                                $kc = get_field("ket_cau", $id);
                                $aa = get_field("album_anh", $id);
                                setup_postdata($post);  ?>

                                <div class="item <?php echo $i;?>">
                                    <div class="detail-gird">
                                        <div class="img-post">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>"
                                                     alt="<?php the_title(); ?>">
                                            </a>
                                            <a><span class="label-sale"><?php echo $saleName; ?></span></a>
                                        </div>
                                        <div class="info-reals">
                                            <h4>
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="address">
                                                <i class="fa fa-map-marker"></i>
                                                <span><?php echo $dc ?></span>
                                            </p>
                                            <div class="info-icon">
                                        <span class="pull-left"><i
                                                    class="fa fa-map-o"></i> Diện tích: <strong><?php echo $dt . ' m²' ?></strong></span>
                                                <span class="pull-right"><i
                                                            class="fa fa-usd"></i> Giá: <strong><?php echo sunnyland_rate($gt) . ' đ' ?></strong></span>
                                                <div class="clearfix"></div>
                                                <span class="pull-left"><i
                                                            class="fa fa-calendar"></i><?php echo date('d/m/Y', strtotime($date)) ?> </span>
                                                <span class="pull-right"><a
                                                            href="<?php the_permalink(); ?>">Chi tiết <i
                                                                class="fa fa-long-arrow-right"></i></a></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endforeach;
                            wp_reset_postdata();
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="content">
                            <div class="block-reals">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#new">Mới nhất</a>
                                    </li>
                                    <?php
                                    $categories = get_categories(array('parent' => 1));
                                    foreach ($categories as $category) { ?>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                                href="#<?php echo $category->term_id ?>"><?php echo $category->cat_name ?></a>
                                        </li>
                                    <?php } ?>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane container active" id="new">
                                        <div class="list-reals">
                                            <?php
                                            global $post;

                                            $myposts = get_posts(array(
                                                'posts_per_page' => 10,
                                            ));

                                            if ($myposts) {
                                                foreach ($myposts as $post) :
                                                    $id = $post->ID;
                                                    $title = $post->post_title;
                                                    $date = $post->post_date;
                                                    $category_detail = get_the_category($id);
                                                    $saleName = '';
                                                    foreach ($category_detail as $cd) {
                                                        if (in_array($cd->term_id, [7, 8])) {
                                                            $saleName = $cd->name;
                                                            break;
                                                        }
                                                    }

                                                    $dt = get_field("dien_tich", $id);
                                                    $gt = get_field("gia_tien", $id);
                                                    $dc = get_field("dia_chi", $id);
                                                    $aa = get_field("album_anh", $id);
                                                    setup_postdata($post); ?>

                                                    <div class="detail-list">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>"
                                                                 alt="<?php the_title(); ?>">
                                                        </a>
                                                        <div class="info-real">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h4>
                                                            <p><i class="fa fa-usd"></i> Giá:
                                                                <strong><?php echo sunnyland_rate($gt) . ' đ' ?></strong>
                                                            </p>
                                                            <p><i class="fa fa-map-o"></i> Diện tích:
                                                                <strong><?php echo $dt . ' m²' ?></strong></p>
                                                            <p>
                                                                <i class="fa fa-map-marker"></i><span> Địa chỉ: <strong><?php echo $dc ?></strong></span>
                                                            </p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>


                                                <?php
                                                endforeach;
                                                wp_reset_postdata();
                                            }
                                            ?>

                                        </div>
                                        <div class="more">
                                            <a href="<?php echo get_category_link(1) ?>">Xem tất cả</a>
                                        </div>
                                    </div>
                                    <?php
                                    foreach ($categories as $category) { ?>
                                        <div class="tab-pane container fade" id="<?php echo $category->term_id ?>">
                                            <?php
                                            global $post;

                                            $myposts = get_posts(array(
                                                'posts_per_page' => 10,
                                                'category' => $category->term_taxonomy_id
                                            ));

                                            if ($myposts) {
                                                foreach ($myposts as $post) :
                                                    $id = $post->ID;
                                                    $title = $post->post_title;
                                                    $date = $post->post_date;
                                                    $category_detail = get_the_category($id);
                                                    $saleName = '';
                                                    $dt = get_field("dien_tich", $id);
                                                    $gt = get_field("gia_tien", $id);
                                                    $dc = get_field("dia_chi", $id);
                                                    $aa = get_field("album_anh", $id);
                                                    setup_postdata($post); ?>

                                                    <div class="detail-list">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>"
                                                                 alt="<?php the_title(); ?>">
                                                        </a>
                                                        <div class="info-real">
                                                            <h4>
                                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                            </h4>
                                                            <p><i class="fa fa-usd"></i> Giá:
                                                                <strong><?php echo sunnyland_rate($gt) . ' đ' ?></strong>
                                                            </p>
                                                            <p><i class="fa fa-map-o"></i> Diện tích:
                                                                <strong><?php echo $dt . ' m²' ?></strong></p>
                                                            <p>
                                                                <i class="fa fa-map-marker"></i><span> Địa chỉ: <strong><?php echo $dc ?></strong></span>
                                                            </p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>


                                                <?php
                                                endforeach;
                                                wp_reset_postdata();
                                            }
                                            ?>
                                            <div class="more">
                                                <a href="<?php echo get_category_link($category->term_id) ?>">Xem tất
                                                    cả</a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php

get_footer();
