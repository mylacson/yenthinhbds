<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sunnyland
 */

get_header();
$id = get_the_ID();
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
$ggmap_lat = get_field("ggmap_lat", $id);
$ggmap_lng = get_field("ggmap_lng", $id);

?>
<div class="bread">

    <div class="container">
        <?php echo dimox_breadcrumbs() ?>
    </div>
</div>
<div id="content">
    <div class="main-content child-page">
        <div class="container">
            <div class="title-single-reals">
                <div class="title-reals">
                    <h1><?php echo the_title() ?></h1>
                    <div class="address">
                        <span><i class="fa fa-home"></i> <?php echo $dc ?></span>
                    </div>
                    <div class="price">
                        <span><?php echo get_the_date('d/m/Y') ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="content single-khach-san">
                        <div class="slider-tour">
                            <ul class="imageGallery">
                                <?php
                                foreach ($aa as $image) { ?>
                                    <li data-thumb="<?php echo $image['chon_anh']['sizes']['medium_large'] ?>"
                                        data-src="<?php echo $image['chon_anh']['sizes']['medium_large'] ?>">
                                        <img src="<?php echo $image['chon_anh']['sizes']['medium_large'] ?>"
                                             alt="<?php echo the_title() ?>"/>
                                    </li>
                                <?php } ?>
                        </div>
                        <div class="utility">
                            <h3>Thông tin</h3>
                            <div class="content-info-real">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <p class="list-info">
                                            <i class="fa fa-angle-right"></i>
                                            <strong>Giá: </strong>
                                            <span class="color">
												<?php echo sunnyland_rate($gt) . ' đ' ?>		</span>                                                                                                                                    </span>
                                        </p>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                        <p class="list-info">
                                            <i class="fa fa-angle-right"></i>
                                            <strong>Diện tích: </strong>
                                            <span class="color"> <?php echo $dt . ' m²' ?>			</span>
                                        </p>
                                    </div>

                                    <?php if (!empty($mt)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Mặt tiền: </strong>
                                                <span class="color">
													<?php echo $mt . ' m' ?>
												</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($dv)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Đường vào: </strong>
                                                <span class="color">
													<?php echo $dv . ' m' ?>
												</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($h)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Hướng nhà: </strong>
                                                <span class="color">
													<?php echo $h ?>											</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($st)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Số tầng: </strong>
                                                <span class="color">
														<?php echo $st ?>												</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($spk)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Số phòng Khách: </strong>
                                                <span class="color">
													<?php echo $spk ?>												</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($spn)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Số phòng ngủ: </strong>
                                                <span class="color">
													<?php echo $spn ?>													</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($spvs)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Số phòng vệ sinh: </strong>
                                                <span class="color">
													<?php echo $spvs ?>												</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($dc)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Địa chỉ: </strong>
                                                <span class="color">
													<?php echo $dc ?>											</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty($kc)) { ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <p class="list-info">
                                                <i class="fa fa-angle-right"></i>
                                                <strong>Kết cấu: </strong>
                                                <span class="color">
													<?php echo $kc ?>											</span>
                                            </p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="content-text">
                            <h3>Chi tiết</h3>
                            <article class="post-content">
                                <?php the_content() ?>
                            </article>
                        </div>
                        <?php if (!empty($ggmap_lat) && !empty($ggmap_lng)){ ?>
                        <div class="content-text">
                            <h3>Bản đồ</h3>
                            <article class="post-content">
                                <div id="map"></div>
                                <style type="text/css">
                                    #map {
                                        height: 500px;
                                        width: 100%;
                                    }
                                </style>
                                <script>
                                    var gmarkers1 = [];
                                    var markers1 = [];
                                    markers1 = [
                                        {
                                            title: '<?php echo the_title()?>',
                                            content: '<?php echo $dc?>',
                                        }
                                    ];

                                    function initMap() {
                                        var myLatLng = {lat: <?php echo $ggmap_lat?>, lng: <?php echo $ggmap_lng?>};

                                        var center = new google.maps.LatLng(myLatLng);
                                        var mapOptions = {
                                            zoom: 14,
                                            center: center
                                        };

                                        map = new google.maps.Map(document.getElementById("map"), mapOptions);
                                        for (i = 0; i < markers1.length; i++) {
                                            addMarker(markers1[i], i);
                                        }

                                    }

                                    function addMarker(marker, iter) {
                                        var infowindow = new google.maps.InfoWindow({
                                            content: ''
                                        });
                                        var district = marker.district;
                                        var title = marker.title;
                                        var pos = new google.maps.LatLng(marker.lat, marker.lng);
                                        var content = '<h4><a>' + marker.title + '</a></h4><p style="margin-bottom: 0">' + marker.content + '</p>';

                                        marker1 = new google.maps.Marker({
                                            title: title,
                                            position: pos,
                                            district: district,
                                            price: marker.price,
                                            city: marker.city,
                                            room_type: marker.room_type,
                                            iter: iter,
                                            map: map,
                                        });

                                        gmarkers1.push(marker1);
                                        infowindow.setContent(content);
                                        infowindow.open(map, marker1);
                                        google.maps.event.addListener(marker1, 'click', (function (marker1, content) {
                                            return function () {
                                                infowindow.setContent(content);
                                                infowindow.open(map, marker1);
                                                map.panTo(this.getPosition());
                                                map.setZoom(16);
                                            }
                                        })(marker1, content));
                                    }
                                </script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRuWoXFLOONQZaoLfXrVeiRuBWZ9yMc-M&callback=initMap"></script>
                            </article>
                            <?php } ?>
                        </div>
                        <div class="rel-hotel">
                            <h3>Bất động sản liên quan</h3>
                            <div class="list-reals">
                                <?php
                                $categories = get_the_category($post->ID);
                                if ($categories) {
                                    $category_ids = array();
                                    foreach ($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                    $args = array(
                                        'category__in' => $category_ids,
                                        'post__not_in' => array($post->ID),
                                        'showposts' => 5, // Số bài viết bạn muốn hiển thị.
                                        'caller_get_posts' => 1
                                    );
                                    $my_query = new wp_query($args);
                                    if ($my_query->have_posts()) {
                                        while ($my_query->have_posts()) {
                                            $my_query->the_post();
                                            $id = get_the_ID();
                                            $dt = get_field("dien_tich", $id);
                                            $gt = get_field("gia_tien", $id);
                                            $dc = get_field("dia_chi", $id);
                                            $aa = get_field("album_anh", $id);
                                            ?>
                                            <div class="detail-list" style="background: #fff;">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>"
                                                         alt="<?php the_title(); ?>">
                                                </a>
                                                <div class="info-real">
                                                    <h4>
                                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h4>
                                                    <p><i class="fa fa-usd"></i> Giá:
                                                        <strong><?php echo sunnyland_rate($gt) . ' đ' ?> </span> </strong>
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
                                        }
                                    }
                                }
                                ?>
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

?>
<script>
    jQuery(document).ready(function ($) {
        $('.imageGallery img').height($('.imageGallery').width() * 0.6);
        $('.imageGallery').lightSlider({
            gallery: true,
            item: 1,
            loop: true,
            thumbItem: 6,
            slideMargin: 0,
            enableDrag: false,
            currentPagerPosition: 'left',
            onSliderLoad: function (el) {
                el.lightGallery({
                    selector: '.imageGallery .lslide'
                });
            }
        });
    });
</script>
