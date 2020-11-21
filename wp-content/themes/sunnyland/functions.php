<?php
/**
 * sunnyland functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sunnyland
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('sunnyland_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function sunnyland_setup()
    {
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Menu Top', 'sunnyland'),
            )
        );

    }
endif;
add_action('after_setup_theme', 'sunnyland_setup');

/**
 * Enqueue scripts and styles.
 */
function sunnyland_scripts()
{
    wp_enqueue_style('sunnyland-main', get_template_directory_uri() . '/css/main.min.css', array(), _S_VERSION);
    wp_enqueue_style('sunnyland-hamburger', get_template_directory_uri() . '/css/wpr-hamburger.css', array(), _S_VERSION);
    wp_enqueue_style('sunnyland-wprmenu', get_template_directory_uri() . '/css/wprmenu.css', array(), _S_VERSION);
    wp_enqueue_style('sunnyland-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);
    wp_enqueue_script('sunnyland-jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('sunnyland-bootstrap-bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('sunnyland-jquery-ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('sunnyland-jquery-ui-touch-punch', get_template_directory_uri() . '/js/jquery.ui.touch-punch.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('sunnyland-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('sunnyland-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
    wp_enqueue_style('sunnyland-button', get_template_directory_uri() . '/css/quick-call-button.css', array(), _S_VERSION);

    if (is_singular()) {
        wp_enqueue_style('sunnyland-lightgallery', get_template_directory_uri() . '/css/lightgallery.min.css', array(), _S_VERSION);
        wp_enqueue_style('sunnyland-lightslider', get_template_directory_uri() . '/css/lightslider.min.css', array(), _S_VERSION);
        wp_enqueue_script('sunnyland-lightgallery', get_template_directory_uri() . '/js/lightgallery.min.js', array(), _S_VERSION, true);
        wp_enqueue_script('sunnyland-lightslider', get_template_directory_uri() . '/js/lightslider.min.js', array(), _S_VERSION, true);
    }
}

add_action('wp_enqueue_scripts', 'sunnyland_scripts');

function sunnyland_rate($number)
{
    $number = intval(str_replace(",","",$number)) ;
    $ty = 1000000000;
    $kq = $number / $ty;
    $duong = (int)$kq;
    if ($kq >= 1) {
        $du = $number % $ty;
        if ($du > 0) {
            $trieu = _calc_trieu($du);
            $str = $duong . ' tỷ ' . $trieu;
        } else {
            $str = $duong . ' tỷ ';
        }
    } else {
        $trieu = _calc_trieu($number);
        $str = $trieu;
    }
    return $str;
}

add_action('sunnyland_rate', 'sunnyland_rate');

function _calc_trieu($number)
{
    $trieu = 1000000;
    $kq = $number / $trieu;
    $duong = (int)$kq;
    if ($kq >= 1) {
        $du = $number % $trieu;
        if ($du > 0) {
            $ngan = _calc_ngan($du);
            $str = $duong . ' triệu ' . $ngan;
        } else {
            $str = $duong . ' triệu ';
        }

    } else {
        $ngan = _calc_ngan($number);
        $str = $ngan;
    }

    return $str;
}


function _calc_ngan($number)
{
    $ngan = 1000;
    $kq = $number / $ngan;
    $duong = (int)$kq;
    if ($kq >= 1) {
        $du = $number % $ngan;
    }
    $str = $duong . ' ngàn ' . $du;
    return $str;
}

function nav_pagination()
{

    if (is_singular())
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1)
        return;

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link())
        printf('<li>%s</li>' . "\n", get_previous_posts_link('&laquo;'));

    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links))
            echo '<li><a>…</a></li>' . "\n";
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li><a>…</a></li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link())
        printf('<li>%s</li>' . "\n", get_next_posts_link('&raquo;'));

    echo '</ul></div>' . "\n";

}

/**
 * Breadcrumb
 */
function dimox_breadcrumbs()
{
    $delimiter = '<i class="fa fa-angle-double-right"></i>';
    $home = 'Trang chủ'; // chữ thay thế cho phần 'Home' link
    $before = '<span class="current">'; // thẻ html đằng trước mỗi link
    $after = '</span>'; // thẻ đằng sau mỗi link
    if (!is_home() && !is_front_page() || is_paged()) {
        echo '<div id="breadcrumbs"> <i class="fa fa-home"></i>  ';
        global $post;
        $homeLink = get_bloginfo('url');
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
                echo $before . get_the_title() . $after;
            } else {
                $cats = get_the_category();
                $ind = count($cats);
                $cat = $cats[$ind - 1];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ')';
        }
        echo '</div>';
    }
} // end dimox_breadcrumbs()

function form_search()
{
    $valDT = $_GET['dien-tich'];
    $valMin = $_GET['min-money'];
    $valMax = $_GET['max-money'];
    if (empty($valMin)) {
        $valMin = 100000000;
    }
    if (empty($valMax)) {
        $valMax = 8000000000;
    }
    $val = [$_GET['quan'], $_GET['the-loai'], $_GET['bat-dong-san']];

    $categories = get_categories(array(
        'parent' => 0
    ));
    $data = [];
    $temp = ['bat-dong-san', 'the-loai', 'quan'];
    foreach ($categories as $parent) {
        if (in_array($parent->slug, $temp)) {
            $cateChilds = get_categories(array('parent' => $parent->term_id));
            $option = '<option value=""> Chọn ' . $parent->name . '</option>';
            foreach ($cateChilds as $child) {
                if (in_array($child->term_id, $val)) {
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                $option .= '<option value="' . $child->term_id . '" ' . $selected . '>' . $child->name . '</option>';
            }
            $html = '<select name="' . $parent->slug . '" id="' . $parent->slug . '" class="form-control">' . $option . '</select>';
            $data[$parent->slug] = $html;
        }
    }
    $dataDT = [
        30=>"30",
        "30%2B50" =>"30-50",
        "80%2B100"=>"80-100",
        "100%2B150"=>"100-150",
        "150%2B200"=>"150-200",
        "200%2B250"=>"200-250",
        "250%2B300"=>"250-300",
        "300%2B500"=>"300-500",
        500=>"500"
    ];

    $optionDT = '<option value="">Chọn Diện tích</option>';
    foreach ($dataDT as $i => $dt) {
        if ($i === 30) {
            $fix = '&lt;=';
        } else if ($i === 500) {
            $fix = '&gt;=';
        } else {
            $fix = '';
        }
        if ($i === $valDT) {
            $selected = 'selected';
        } else {
            $selected = '';
        }
        $optionDT .= '<option value="' . $i . '" ' . $selected . ' >' . $fix . " " . $dt . ' m²</option>';
    }

    $form = '<div class="container">
                    <div class="form-search">
                    <form action="'.get_bloginfo('url').'/category/bat-dong-san/" method="GET" role="form">
                            <input type="hidden" name="s" value="">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    ' . $data['quan'] . '
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    ' . $data['the-loai'] . '
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    ' . $data['bat-dong-san'] . '
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    <select name="dien-tich" id="inputdientich" class="form-control">
                                       ' . $optionDT . '
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <div id="slider-range"></div>
                                    <div id="amount">
                                        <div class="pull-left"><span class="mo-left"></span></div>
                                        <div class="pull-right"><span class="mo-right"></span></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <input type="hidden" name="min-money" class="min-money" >
                                    <input type="hidden" name="max-money" class="max-money" >
                                    <script>
                                        var minmoney = ' . $valMin . ';
                                        var maxmoney = ' . $valMax . ';
                                    </script>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                                    <button class="submit-form">Tìm kiếm</button>
                                </div>
                            </div>
                        </form></div>
                </div>';
    echo $form;

}

function admin_scripts( $hook ) {

    if( !in_array( $hook, array( 'post.php', 'post-new.php' ) ) )
        return;
    wp_enqueue_script(
        'custom admin',                         // Handle
        get_template_directory_uri() . '/js/custom-admin.js',  // Path to file
        array( 'jquery' )                             // Dependancies
    );
}
add_action( 'admin_enqueue_scripts', 'admin_scripts', 2000 );


function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCRuWoXFLOONQZaoLfXrVeiRuBWZ9yMc-M';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

