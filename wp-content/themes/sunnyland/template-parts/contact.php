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
 * @package Sunnyland
 */
/*
 Template Name: Contact
 */

get_header();
$dc = get_field("dia_chi");
$email = get_field("email");
$website = get_field("website");
$dt = get_field("dien_thoai");
$tct = get_field("ten_cong_ty");
?>

    <div class="bread">
        <div class="container"><?php echo dimox_breadcrumbs() ?></div>
    </div>
    <div id="content">
        <div class="container">
            <div class="map-page">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.455652559762!2d106.73626501466806!3d10.699294963538696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31753ab2d44405e1%3A0xdd010630ff2fa043!2zMTk3OSwgOCBIdeG7s25oIFThuqVuIFBow6F0LCB0dC4gTmjDoCBCw6gsIE5ow6AgQsOoLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1604247417924!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen></iframe>
            </div>
        </div>
        <div class="info-contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="block-content-ft-contact">
                            <h1>Liên hệ</h1>
                            <p><?php echo $tct ?></p>
                            <div class="info-contact">
                                <p><span><i class="fa fa-home"></i> Địa chỉ:</span> <?php echo $dc ?></p>
                                <p><span><i class="fa fa-envelope-open"></i> Email:</span> <?php echo $email ?></p>
                                <p><span><i class="fa fa-phone"></i> Điện thoại:</span> <?php echo $dt ?></p>
                                <p><span><i class="fa fa-globe"></i> Website:</span> <?php echo $website ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-contact">
                            <div role="form" class="wpcf7" id="wpcf7-f4-o1" lang="vi" dir="ltr">
                                <div class="screen-reader-response"></div>
                                <?php echo do_shortcode( '[contact-form-7 id="115" title="contact 1"]')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
