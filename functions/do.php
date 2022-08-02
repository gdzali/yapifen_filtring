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
    $last_html .= '<li><input type="checkbox" data-group="'. $tax_name . '" id="'. $term->slug .'" name="'. $term->slug .'" value="'. $term->name .'">
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
      <form class="#" method="get">
          <div class="col-12 col-xl-12 option-table" id="proje-turu-table">
            <div class="row">
              <div class="col-12 col-xl-4">
                <span class="parent-title"><li><input type="checkbox" id="ust-yapi" class="group-title" name="ust-yapi" value="Üst Yapı">
                <label for="ust-yapi">Üst Yapı</label><br></li></span>
                <ul class="term-items-list">
                  <?= filter_terms_call('ust-yapi') ?>
                </ul>
              </div>
              <div class="col-12 col-xl-4">
                <span class="parent-title"><li><input type="checkbox" id="ulastirma" class="group-title" name="ulastirma" value="Ulaştırma">
                    <label for="ulastirma">Ulaştırma</label><br></li></span>
                <ul class="term-items-list">
                    <?= filter_terms_call('ulastirma') ?>
                </ul>
              </div>
              <div class="col-12 col-xl-4">
                <span class="parent-title"><li><input type="checkbox" id="su-enerji" name="su-enerji" class="group-title" value="Su ve Enerji">
                    <label for="su-enerji">Su ve Enerji</label><br></li></span>
                <ul class="term-items-list">
                  <?= filter_terms_call('su-enerji') ?>
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

    $tax_query = array('relation' => 'OR');

   if(isset($_GET['lokasyon'])) {
       $lokasyon = sanitize_text_field( $_GET['lokasyon'] );
       $tax_query[] = array(
           'taxonomy' => 'lokasyon',
           'field' => 'slug',
           'operator' => 'IN',
           'terms' => $lokasyon

       );
   }

   if(isset($_GET['ilan_tipi'])) {
       $ilan_tipi = sanitize_text_field( $_GET['ilan_tipi'] );
       $tax_query[] = array(
           'taxonomy' => 'ilan_tipi',
           'field' => 'slug',
           'operator' => 'IN',
           'terms' => $ilan_tipi
       );
   }

   if(isset($_GET['konut'])) {
       $konut = sanitize_text_field( $_GET['konut'] );
       $tax_query[] = array(
           'taxonomy' => 'tip',
           'field' => 'slug',
           'operator' => 'IN',
           'terms' => $konut
       );
   }

    $search_query = new WP_Query( $args );

    if ( $search_query->have_posts() ) {

        $result = array();

        while ( $search_query->have_posts() ) {

            $search_query->the_post();
            $cats = strip_tags( get_the_category_list(", ") );
            $result[] = array(
                "id" => get_the_ID(),
                "title" => get_the_title(),
                "content" => get_the_content(),
                "permalink" => get_permalink(),
                "oda" => get_field('oda_sayisi')->name,
                "alan" => get_field('alan')->name,
                "tip" => get_field('tip')->name,
                "ilan_tipi" => get_field('ilan_tipi')->name,
                "lokasyon" => get_field('lokasyon')->name,
                "banyo_sayisi" => get_field('banyo_sayisi')->name,
                "fiyat" => get_field('proje_fiyati'),
                "pdf" => get_field('proje_detay_dosyasi'),
                "poster" => wp_get_attachment_url(get_post_thumbnail_id($post->ID),'full')
            );

        }

        wp_reset_query();

        echo json_encode($result);


    } else {
        // no posts found
    }
    wp_die();
}
