<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sunnyland
 */

get_header();
$valQ = $_GET['quan'];
$valTL = $_GET['the-loai'];
$valBDS = $_GET['bat-dong-san'];
$valDT = $_GET['dien-tich'];
$valMin = $_GET['min-money'];
$valMax = $_GET['max-money'];
$cateIn = [];
$dtmin = 0;
$dtmax = 200000;
if (!empty($valDT)) {
    if (strpos($valDT, '%2B') !== false) {
        $valDT = urldecode($valDT);
        $arr = explode("+", $valDT);
        $dtmin = intval($arr[0]);
        $dtmax = intval($arr[1]);
    } else {
        if ($valDT == 30) {
            $dtmax = 30;
        } else if ($valDT == 500) {
            $dtmin = 500;
        }
    }

}

if (!empty($valQ)) {
    $cateIn[] = $valQ;
}

if (!empty($valTL)) {
    $cateIn[] = $valTL;
}

if (!empty($valBDS)) {
    $cateIn[] = $valBDS;
}

$temp = array();

if (!empty($cateIn)) {
    $temp['category__and'] = $cateIn;
}

$myPosts = get_posts($temp);
?>

    <div class="bread">
        <div class="container"><?php echo dimox_breadcrumbs() ?></div>
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
                            <?php $index = 0;
                            if(!empty($myPosts)){
                                foreach ($myPosts as $post) {

                                $dt = get_field("dien_tich", $id);
                                $gt = get_field("gia_tien", $id);
                                $dc = get_field("dia_chi", $id);
                                $aa = get_field("album_anh", $id);
                                if ($dtmin <= $dt && $dt <= $dtmax && $valMin <= $gt && $gt <= $valMax) {
                                    $index = $index++;
                                    ?>

                                <div class="detail-list">
                                    <a href="<?php echo get_permalink() ?>">
                                        <img src="<?php echo $aa[0]['chon_anh']['sizes']['medium']; ?>"
                                             alt="<?php the_title(); ?>">
                                    </a>
                                    <div class="info-real">
                                        <h4><a href="<?php echo get_permalink() ?>"><?php the_title(); ?></a></h4>
                                        <p><i class="fa fa-usd"></i> Giá:
                                            <strong><?php echo sunnyland_rate($gt) . ' đ' ?></strong></p>
                                        <p><i class="fa fa-map-o"></i> Diện tích:
                                            <strong><?php echo $dt . ' m²' ?></strong></p>
                                        <p>
                                            <i class="fa fa-map-marker"></i><span> Địa chỉ: <strong><?php echo $dc ?></strong></span>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            <?php }}}
                            if ($index == 0){
                                get_template_part('template-parts/content', 'none');
                            }?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
