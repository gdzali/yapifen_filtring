<?= get_header(); ?>
<style media="screen">
.addtoany_share_save_container.addtoany_content.addtoany_content_bottom {
    display: none !important;
}

section.elementor-section.elementor-top-section.elementor-element.elementor-element-119173b.elementor-section-full_width.elementor-section-content-top.xts-section-stretch-content.elementor-section-height-default.elementor-section-height-default {
  background-image: url(http://yapifen-filtering.local/wp-content/uploads/2022/06/havuzlu-BUYUK2.jpg);
  background-position: top center;
  background-repeat: no-repeat;
  background-size: cover;
  height:551px !important;
}
</style>

<?php
global $post;
$post_term_1 = get_the_terms($post->ID,'ust-yapi');
$post_term_2 = get_the_terms($post->ID,'ulastirma');
$post_term_3 = get_the_terms($post->ID, 'su-enerji');
$post_term_4 = get_the_terms($post->ID, 'endustriyel');

foreach ($post_term_1 as $ust_yapi_term) {
  $print_ust_yapi = $ust_yapi_term->name;
}
foreach ($post_term_2 as $ulastirma_term) {
  $print_ulastirma = $ulastirma->name;
}
foreach ($post_term_3 as $su_enerji_term) {
  $print_enerji_term = $su_enerji_term->name;
}
foreach ($post_term_4 as $endustriyel_term) {
  $print_endustriyel = $endustriyel_term->name;
}
?>
<div class="xts-site-content">
  <div class="container">
    <div class="row row-spacing-40 xts-sidebar-hidden-md">
      <div class="xts-content-area col-lg-12 col-12 col-md-12">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-119173b elementor-section-full_width elementor-section-content-top xts-section-stretch-content elementor-section-height-default elementor-section-height-default" data-id="119173b" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
						<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9f206fc" data-id="9f206fc" data-element_type="column">
			<div class="elementor-widget-wrap">
									</div>
		</div>
							</div>
		</section>
    <section class="xts-negative-gap elementor-section elementor-top-section elementor-element elementor-element-b6c0288 xts-hide-bg-md xts-hide-bg-sm elementor-section-boxed elementor-section-height-default elementor-section-height-default xts-section-disabled">
      <div class="elementor-container elementor-column-gap-extended">
        <div class="container projects-single">
          <div class="row">
            <div class="col-12 col-xl-8">
              <div class="main-content-area">
                <h1><?= the_title(); ?></h1>
                <?= the_content(); ?>
              </div>
            </div>
            <div class="col-12 col-xl-4 projects-sidebar xts-sticky-column">
              <span class="main-title">Project Details</span>
              <div class="projects-sub">
                <span class="title">Category</span>
                <span><?= $print_endustriyel ?><?= $print_enerji_term ?><?= $print_ulastirma ?><?= $print_ust_yapi ?></span>
              </div>
              <?php if (get_field('yil')): ?>
                <div class="projects-sub">
                  <span class="title">Year</span>
                  <span><?= get_field('yil') ?></span>
                </div>
              <?php endif; ?>
              <?php if (get_field('isveren')): ?>
                <div class="projects-sub">
                  <span class="title">Client</span>
                  <span><?= get_field('isveren') ?></span>
                </div>
              <?php endif; ?>
              <?php if (get_field('idare')): ?>
                <div class="projects-sub">
                  <span class="title">End Client</span>
                  <span><?= get_field('idare') ?></span>
                </div>
              <?php endif; ?>
              <?php if (get_field('konum')): ?>
                <div class="projects-sub">
                  <span class="title">Location</span>
                  <span><?= get_field('konum') ?></span>
                </div>
              <?php endif; ?>
              <div class="socials-share">
                <div class="addtoany_shortcode"><div class="a2a_kit a2a_kit_size_24 addtoany_list" data-a2a-url="<?= the_permalink(); ?>" data-a2a-title="Havuzlu Viaduct" style="line-height: 24px;"><a class="a2a_button_copy_link" href="/#copy_link" title="Copy Link" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_link" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M24.412 21.177c0-.36-.126-.665-.377-.917l-2.804-2.804a1.235 1.235 0 00-.913-.378c-.377 0-.7.144-.97.43.026.028.11.11.255.25.144.14.24.236.29.29s.117.14.2.256c.087.117.146.232.177.344.03.112.046.236.046.37 0 .36-.126.666-.377.918a1.25 1.25 0 01-.918.377 1.4 1.4 0 01-.373-.047 1.062 1.062 0 01-.345-.175 2.268 2.268 0 01-.256-.2 6.815 6.815 0 01-.29-.29c-.14-.142-.223-.23-.25-.254-.297.28-.445.607-.445.984 0 .36.126.664.377.916l2.778 2.79c.243.243.548.364.917.364.36 0 .665-.118.917-.35l1.982-1.97c.252-.25.378-.55.378-.9zm-9.477-9.504c0-.36-.126-.665-.377-.917l-2.777-2.79a1.235 1.235 0 00-.913-.378c-.35 0-.656.12-.917.364L7.967 9.92c-.254.252-.38.553-.38.903 0 .36.126.665.38.917l2.802 2.804c.242.243.547.364.916.364.377 0 .7-.14.97-.418-.026-.027-.11-.11-.255-.25s-.24-.235-.29-.29a2.675 2.675 0 01-.2-.255 1.052 1.052 0 01-.176-.344 1.396 1.396 0 01-.047-.37c0-.36.126-.662.377-.914.252-.252.557-.377.917-.377.136 0 .26.015.37.046.114.03.23.09.346.175.117.085.202.153.256.2.054.05.15.148.29.29.14.146.222.23.25.258.294-.278.442-.606.442-.983zM27 21.177c0 1.078-.382 1.99-1.146 2.736l-1.982 1.968c-.745.75-1.658 1.12-2.736 1.12-1.087 0-2.004-.38-2.75-1.143l-2.777-2.79c-.75-.747-1.12-1.66-1.12-2.737 0-1.106.392-2.046 1.183-2.818l-1.186-1.185c-.774.79-1.708 1.186-2.805 1.186-1.078 0-1.995-.376-2.75-1.13l-2.803-2.81C5.377 12.82 5 11.903 5 10.826c0-1.08.382-1.993 1.146-2.738L8.128 6.12C8.873 5.372 9.785 5 10.864 5c1.087 0 2.004.382 2.75 1.146l2.777 2.79c.75.747 1.12 1.66 1.12 2.737 0 1.105-.392 2.045-1.183 2.817l1.186 1.186c.774-.79 1.708-1.186 2.805-1.186 1.078 0 1.995.377 2.75 1.132l2.804 2.804c.754.755 1.13 1.672 1.13 2.75z"></path></svg></span><span class="a2a_label">Copy Link</span></a><a class="a2a_button_email" href="/#email" title="Email" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_email" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M26 21.25v-9s-9.1 6.35-9.984 6.68C15.144 18.616 6 12.25 6 12.25v9c0 1.25.266 1.5 1.5 1.5h17c1.266 0 1.5-.22 1.5-1.5zm-.015-10.765c0-.91-.265-1.235-1.485-1.235h-17c-1.255 0-1.5.39-1.5 1.3l.015.14s9.035 6.22 10 6.56c1.02-.395 9.985-6.7 9.985-6.7l-.015-.065z"></path></svg></span><span class="a2a_label">Email</span></a><a class="a2a_button_linkedin" href="/#linkedin" title="LinkedIn" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 010 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path></svg></span><span class="a2a_label">LinkedIn</span></a><a class="a2a_button_facebook" href="/#facebook" title="Facebook" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path></svg></span><span class="a2a_label">Facebook</span></a><a class="a2a_button_twitter" href="/#twitter" title="Twitter" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill="#FFF" d="M28 8.557a9.913 9.913 0 01-2.828.775 4.93 4.93 0 002.166-2.725 9.738 9.738 0 01-3.13 1.194 4.92 4.92 0 00-3.593-1.55 4.924 4.924 0 00-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 00-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 01-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 004.6 3.42 9.893 9.893 0 01-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 007.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path></svg></span><span class="a2a_label">Twitter</span></a><a class="a2a_button_whatsapp" href="/#whatsapp" title="WhatsApp" rel="nofollow noopener" target="_blank"><span class="a2a_svg a2a_s__default a2a_s_whatsapp" style="background-color: rgb(4, 66, 111); width: 24px; line-height: 24px; height: 24px; background-size: 24px; border-radius: 3px;"><svg focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path fill-rule="evenodd" clip-rule="evenodd" fill="#FFF" d="M16.21 4.41C9.973 4.41 4.917 9.465 4.917 15.7c0 2.134.592 4.13 1.62 5.832L4.5 27.59l6.25-2.002a11.241 11.241 0 005.46 1.404c6.234 0 11.29-5.055 11.29-11.29 0-6.237-5.056-11.292-11.29-11.292zm0 20.69c-1.91 0-3.69-.57-5.173-1.553l-3.61 1.156 1.173-3.49a9.345 9.345 0 01-1.79-5.512c0-5.18 4.217-9.4 9.4-9.4 5.183 0 9.397 4.22 9.397 9.4 0 5.188-4.214 9.4-9.398 9.4zm5.293-6.832c-.284-.155-1.673-.906-1.934-1.012-.265-.106-.455-.16-.658.12s-.78.91-.954 1.096c-.176.186-.345.203-.628.048-.282-.154-1.2-.494-2.264-1.517-.83-.795-1.373-1.76-1.53-2.055-.158-.295 0-.445.15-.584.134-.124.3-.326.45-.488.15-.163.203-.28.306-.47.104-.19.06-.36-.005-.506-.066-.147-.59-1.587-.81-2.173-.218-.586-.46-.498-.63-.505-.168-.007-.358-.038-.55-.045-.19-.007-.51.054-.78.332-.277.274-1.05.943-1.1 2.362-.055 1.418.926 2.826 1.064 3.023.137.2 1.874 3.272 4.76 4.537 2.888 1.264 2.9.878 3.43.85.53-.027 1.734-.633 2-1.297.266-.664.287-1.24.22-1.363-.07-.123-.26-.203-.54-.357z"></path></svg></span><span class="a2a_label">WhatsApp</span></a></div></div>
              </div>

            </div>
          </div>
        </div>

      </div>
    </section>
    <?php xts_get_template_part( 'templates/single-posts-navigation' ); ?>
    <?php
				xts_portfolio_template(
					array(
						'image_size'            => xts_get_loop_prop( 'portfolio_image_size' ),
						'image_size_custom'     => xts_get_loop_prop( 'portfolio_image_size_custom' ),
						'items_per_page'        => array( 'size' => xts_get_opt( 'portfolio_single_related_projects_count' ) ),
						'carousel_items'        => array( 'size' => xts_get_opt( 'portfolio_single_related_projects_per_row' ) ),
						'carousel_items_tablet' => array( 'size' => 2 ),
						'carousel_items_mobile' => array( 'size' => 1 ),
						'different_images'      => 0,
						'view'                  => 'carousel',
						'related_post_ids'      => $post->ID,
						'filters_type'          => 'without',
						'carousel_spacing'      => xts_get_opt( 'portfolio_spacing' ),
					)
				);
        ?>
      </div>
    </div>
  </div>
</div>
<?= get_footer(); ?>
