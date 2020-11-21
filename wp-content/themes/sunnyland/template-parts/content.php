<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sunnyland
 */
$dt = get_field("dien_tich", $id);
$gt = get_field("gia_tien", $id);
$dc = get_field("dia_chi", $id);
$aa = get_field("album_anh", $id);

?>

<div class="detail-list">
    <a href="<?php echo get_permalink()?>">
        <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>" alt="<?php the_title(); ?>">
    </a>
    <div class="info-real">
        <h4><a href="<?php echo get_permalink()?>"><?php the_title(); ?></a></h4>
        <p><i class="fa fa-usd"></i> Giá: <strong><?php echo sunnyland_rate($gt)  . ' đ' ?></strong></p>
        <p><i class="fa fa-map-o"></i> Diện tích: <strong><?php echo $dt . ' m²' ?></strong></p>
        <p><i class="fa fa-map-marker"></i><span> Địa chỉ: <strong><?php echo $dc ?></strong></span></p>
    </div>
    <div class="clearfix"></div>
</div>

