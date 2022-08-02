<section id="filter-section">
  <div class="container">
    <div class="row" class="filtering-area">
      <div class="col-12 col-xl-4">
        <span class="yapifen-filter-title">Filtreleme</span>
      </div>
      <div class="col-12 col-xl-4" style="padding-top: 7px;" >
        <a class="yapifen-filter-title option-selector" id="proje-turu-button">Proje Türü</a>
      </div>
      <div class="col-12 col-xl-4" style="padding-top: 7px;" >
        <a class="yapifen-filter-title option-selector" id="proje-durumu-button">Proje Durumu</a>
      </div>
      <?= do_shortcode('[my_ajax_filter_search]'); ?>
    </div>
    <div class="row" id="table-area">
      <table id="projects_table" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Proje Başlığı</th>
                <th>Kategori</th>
                <th>Yıl</th>
                <th>Konum</th>
            </tr>
        </thead>
        <tbody class="data-area">
          <?php
          // WP_Query arguments
          $args = array (
          'post_type'              => array( 'projeler-alt' ),
          'posts_per_page'         => '-1',
          );

          // The Query
          $query = new WP_Query( $args );

          // The Loop
          if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
            // Get terms from the post IDs of the above post query
            $terms = get_the_terms( $post->ID, 'ust-yapi' );
            $terms_ulastirma = get_the_terms( $post->ID, 'ulastirma' );
            $terms_su_enerji = get_the_terms( $post->ID, 'su-enerji' );
            $terms_endustriyel = get_the_terms( $post->ID, 'endustriyel' );
            if ( !empty( $terms ) || !empty($terms_ulastirma) || !empty($terms_su_enerji) ){
                // get the first term
                $term = array_shift( $terms );
                $term_ulastirma = array_shift( $terms_ulastirma );
                $term_su_enerji = array_shift( $terms_su_enerji );
                $term_endustriyel = array_shift( $terms_endustriyel );
            } ?>
            <tr>
                <td><a href="<?= the_permalink() ?>"><?= the_title(); ?></a></td>
                <td><?= $term->name ?><?= $term_ulastirma->name ?><?= $term_su_enerji->name ?><?= $term_endustriyel->name ?></td>
                <td><?= get_field('yil') ?></td>
                <td><?= get_field('konum') ?></td>
            </tr>
            <?
          }
          } else {
          // no posts found
          }

          // Restore original Post Data
          wp_reset_postdata();
          ?>
        </tbody>
    </table>
    </div>
  </div>
</section>
