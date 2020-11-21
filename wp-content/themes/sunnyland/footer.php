<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sunnyland
 */
$dc = get_field("dia_chi",2);
$email = get_field("email",2);
$website = get_field("website",2);
$dt = get_field("dien_thoai",2);
$tct = get_field("ten_cong_ty",2);
?>

<footer>
    <div class="content-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="block-ft">
                        <h3>Thông tin liên hệ</h3>
                        <div class="block-content-ft">
                            <p><?php echo $tct ?></p>
                            <div class="info-contact">
                                <p><span><i class="fa fa-home"></i> Địa chỉ: </span><?php echo $dc ?></p>
                                <p><span><i class="fa fa-envelope-open"></i> Email: </span><?php echo $email ?></p>
                                <p><span><i class="fa fa-phone"></i> Điện thoại: </span><?php echo $dt ?></p>
                                <?php if (!empty($website)){?>
                                <p><span><i class="fa fa-globe"></i> Website: </span><?php echo $website ?></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                    <div class="block-ft">
                        <h3>Bản đồ</h3>
                        <div class="block-content-ft">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.455652559762!2d106.73626501466806!3d10.699294963538696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31753ab2d44405e1%3A0xdd010630ff2fa043!2zMTk3OSwgOCBIdeG7s25oIFThuqVuIFBow6F0LCB0dC4gTmjDoCBCw6gsIE5ow6AgQsOoLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1604247417924!5m2!1sen!2s" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <div class="call-now-button">
        <div><p class="call-text"><a href="https://zalo.me/0974677168" title="Zalo"> Zalo </a></p>
            <a href="https://zalo.me/0974677168" title="Zalo">
                <div class="quick-alo-ph-circle"></div>
                <div class="quick-alo-ph-circle-fill"></div>
                <div class="quick-alo-ph-btn-icon quick-alo-custom-img-circle"></div>
            </a>
        </div>
    </div>
</footer>
</div>


<?php wp_footer(); ?>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v8.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="101732928415802"
     theme_color="#44bec7"
     logged_in_greeting="Hi! Tôi có thể giúp gì cho bạn?"
     logged_out_greeting="Hi! Tôi có thể giúp gì cho bạn?">
</div>

</body>
</html>
