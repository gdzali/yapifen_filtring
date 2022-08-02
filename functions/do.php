<?php
/**
 * Operations of the plugin are included here.
 *
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

function so17687619_jquery_add_inline() {
    wp_add_inline_script( 'jquery-core', '$ = jQuery;' );
}
add_action( 'wp_enqueue_scripts', 'so17687619_jquery_add_inline' );

function yapifenfilter_enqueue_style(){
  wp_enqueue_style( 'bootstrapcss','https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css', 99 );
  wp_enqueue_style( 'datatables-css','https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css', 99 );
  wp_enqueue_style( 'yapifenfilter_css', PREFIX_STARTER_PLUGIN_URL_CSS . 'yapifen-filter-main.css' , 99);
}
function yapifenfilter_enqueue_script() {
  wp_enqueue_script( 'bootstapjs', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js', 99 );
  wp_enqueue_script( 'datatables-js', 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js', 99 );
  wp_enqueue_script( 'yapifenfilter_js', PREFIX_STARTER_PLUGIN_URL_JS . 'yapifen-filter-main.js', 99);
}

add_action( 'wp_enqueue_scripts', 'yapifenfilter_enqueue_style', '99' );
add_action( 'wp_enqueue_scripts', 'yapifenfilter_enqueue_script', '99' );

require_once(PREFIX_STARTER_PLUGIN_DIR . 'includes/cpt-taxonomies.php');

// Add Shortcode
function get_filtering() {
    require_once( PREFIX_STARTER_PLUGIN_DIR . 'includes/filtering-table.php' );
}
add_shortcode( 'get_filtering', 'get_filtering' );

function filter_terms_call( $tax_name ) {

  $taxonomies = array(
    $tax_name
  );

  $args = array(
      'order_by' => 'name',
      'order' => 'ASC',
      'number' => 0,
      'hide_empty' => false
  );

  $terms = get_terms( $taxonomies , $args);

  foreach ($terms as $term ) {
    // $last_html .= '<option value='. $term->slug .'>'. $term->name .'</option>';
    $last_html .= '<li><input type="checkbox" class="sub-terms" data-group="'. $tax_name . '" id="'. $term->slug .'" name="'. $term->slug .'" value="'. $term->name .'">
        <label for="'. $term->slug .'">'. $term->name .'</label><br></li>';
  }

    return $last_html;
}

function my_ajax_filter_search_scripts() {
    wp_enqueue_script( 'my_ajax_filter_search', PREFIX_STARTER_PLUGIN_URL_JS . 'ajax_script.js', array(), '1.0', true );
    wp_localize_script( 'my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php') );
}

// Shortcode: [my_ajax_filter_search]
function my_ajax_filter_search_shortcode() {

    my_ajax_filter_search_scripts(); // Added here

    ob_start(); ?>
    <div id="my-ajax-filter-search">
      <form class="#" method="GET">
        <input type="text" id="ust-yapi-hidden" name="ust-yapi-hidden" class="hidden-input" value="">
        <input type="text" id="ulastirma-hidden" name="ulastirma-hidden" class="hidden-input" value="">
        <input type="text" id="su-enerji-hidden" name="su-enerji-hidden" class="hidden-input" value="">
        <input type="text" id="endustriyel-hidden" name="endustriyel-hidden" class="hidden-input" value="">
        <input type="text" id="proje_durum-hidden" name="proje_durum-hidden" class="hidden-input" value="">
          <div class="col-12 col-xl-12 option-table" id="proje-turu-table">
            <div class="row">
              <div class="col-12 col-xl-3">
                <span class="parent-title"><li><input type="checkbox" id="ust-yapi" class="group-title" name="ust-yapi" value="Üst Yapı">
                <label for="ust-yapi">Üst Yapı</label><br></li></span>
                <ul class="term-items-list">
                  <?= filter_terms_call('ust-yapi') ?>
                </ul>
              </div>
              <div class="col-12 col-xl-3">
                <span class="parent-title"><li><input type="checkbox" id="ulastirma" class="group-title" name="ulastirma" value="Ulaştırma">
                    <label for="ulastirma">Ulaştırma</label><br></li></span>
                <ul class="term-items-list">
                    <?= filter_terms_call('ulastirma') ?>
                </ul>
              </div>
              <div class="col-12 col-xl-3">
                <span class="parent-title"><li><input type="checkbox" id="su-enerji" name="su-enerji" class="group-title" value="Su ve Enerji">
                    <label for="su-enerji">Su ve Enerji</label><br></li></span>
                <ul class="term-items-list">
                  <?= filter_terms_call('su-enerji') ?>
                </ul>
              </div>
              <div class="col-12 col-xl-3">
                <span class="parent-title"><li><input type="checkbox" id="endustriyel" name="endustriyel" class="group-title" value="Endüstriyel">
                    <label for="endustriyel">Endüstriyel</label><br></li></span>
                <ul class="term-items-list">
                  <?= filter_terms_call('endustriyel') ?>
                </ul>
              </div>
            </div>
            <div class="row btn-area">
              <div class="col-12 col-xl-2">
                <a href="#" id="btn-temizle">Temizle</a>
              </div>
              <div class="col-12 col-xl-2">
                <a href="#" id="btn-all">Hepsini Seç</a>
              </div>
              <div class="col-12 col-xl-8">
                <input type="submit" name="uygula" id="btn-apply" value="Uygula">
              </div>
            </div>
        </div>
        <div class="col-12 col-xl-4 option-table" id="proje-durumu-table">
          <div class="row">
            <div class="col-12 col-4">
              <ul class="term-items-list">
                <?= filter_terms_call('proje_durum') ?>
              </ul>
              <div class="row btn-area">
                <div class="col-12 col-xl-2">
                  <input type="submit" name="uygula" id="btn-apply" value="Uygula">
                </div>
              </div>
            </div>
          </div>
        </div>

        </form>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode ('my_ajax_filter_search', 'my_ajax_filter_search_shortcode');

add_action('wp_ajax_my_ajax_filter_search', 'my_ajax_filter_search_callback');
add_action('wp_ajax_nopriv_my_ajax_filter_search', 'my_ajax_filter_search_callback');

function my_ajax_filter_search_callback() {

    header("Content-Type: application/json");

    $tax_query = array('relation' => 'AND');
    $tax_query_sub = array('relation' => 'OR');

    if(isset($_GET['ust_yapi'])) {
         $ust_yapi_hid = sanitize_text_field( $_GET['ust_yapi'] );
         $tax_query_sub[] = array(
             'taxonomy' => 'ust-yapi',
             'field' => 'slug',
             'operator' => 'IN',
             'terms' => explode(',',$ust_yapi_hid)
         );
    }

    if(isset($_GET['ulastirma'])) {
         $ulastirma_hid = sanitize_text_field( $_GET['ulastirma'] );
         $tax_query_sub[] = array(
             'taxonomy' => 'ulastirma',
             'field' => 'slug',
             'operator' => 'IN',
             'terms' => explode(',',$ulastirma_hid)
         );
    }

    if(isset($_GET['su_enerji'])) {
         $su_enerji_hid = sanitize_text_field( $_GET['su_enerji'] );
         $tax_query_sub[] = array(
             'taxonomy' => 'su-enerji',
             'field' => 'slug',
             'operator' => 'IN',
             'terms' => explode(',',$su_enerji_hid)
         );
    }

    if(isset($_GET['endustriyel'])) {
         $endustriyel_hid = sanitize_text_field( $_GET['endustriyel'] );
         $tax_query_sub[] = array(
             'taxonomy' => 'endustriyel',
             'field' => 'slug',
             'operator' => 'IN',
             'terms' => explode(',',$endustriyel_hid)
         );
    }

    $tax_query[] = $tax_query_sub;

    if(isset($_GET['proje_durum'])) {
         $proje_durum_hid = sanitize_text_field( $_GET['proje_durum'] );
         $tax_query[] = array(
             'taxonomy' => 'proje_durum',
             'field' => 'slug',
             'operator' => 'IN',
             'terms' => explode(',',$proje_durum_hid)
         );
    }

    $args = array(
        'post_type' => 'projeler-alt',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    );

    $search_query = new WP_Query( $args );

    // call to function
    // file_put_contents('../tax_query.txt', print_r($args, true));
    file_put_contents('../tax_query.txt', print_r($tax_query, true));

    if ( $search_query->have_posts() ) {

        $result = array();

        while ( $search_query->have_posts() ) {
            $terms = get_the_terms( $post->ID, 'ust-yapi' );
            $terms_ulastirma = get_the_terms( $post->ID, 'ulastirma' );
            $terms_su_enerji = get_the_terms( $post->ID, 'su-enerji' );
            $terms_endustriyel = get_the_terms( $post->ID, 'endustriyel' );
            $term = array_shift( $terms );
            $return_html=null;
            $return_html .= $term->name;
            $term_ulastirma = array_shift( $terms_ulastirma );
            $return_html .= $term_ulastirma->name;
            $term_su_enerji = array_shift( $terms_su_enerji );
            $return_html .= $term_su_enerji->name;
            $term_endustriyel = array_shift( $terms_endustriyel );
            $return_html .= $term_endustriyel->name;

            $search_query->the_post();
            $result[] = array(
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "content" => get_the_content(),
                "permalink" => get_permalink(),
                "konum" => get_field('konum'),
                "yil" => get_field('yil'),
                "kategori" => $return_html
            );

        }

        wp_reset_query();

        echo json_encode($result);


    } else {
        // no posts found
    }
    wp_die();
}
