<?php get_header('atc'); ?>
<?php get_template_part('parts/nav', 'offcanvas'); ?>
	<div id="all-things-create" style="background-image: url(<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0]); ?>);">
		<div id="inner-content" class="row expanded collapse">
	    <main id="main" class="large-12 medium-12 small-12 columns" role="main">
        <section id="timeline" class="parallax">
          <?php
            $timeline_nav_items = get_timeline_nav_items();
            $num = count($timeline_nav_items);
            // add the a query var for z-index of the parallax-group
            global $wp;
            $wp->add_query_var('parallax-z');
            for ($i = 0; $i < $num; $i++) {
              //set the query var for z-index of the parallax-group
              if ($i % 2 == 0) {
                set_query_var('parallax-z', 2);
              } else {
                set_query_var('parallax-z', 1);
              }

              set_query_var('cat', $timeline_nav_items[$i]->object_id);

              get_template_part('parts/loop', 'timeline');
            }
          ?>
        </section> <!-- #timeline -->
				<!-- off-canvas pages -->
				<?php
					$site_nav_items = get_site_nav_items();
					$num = count($site_nav_items);
					for ($i = 1; $i < $num; $i++) : $page = $site_nav_items[$i];
				?>
				<section id="<?php echo get_post($page->object_id)->post_name; ?>" class="offcanvas-page">
					<?php
						global $post;
						$post = get_post($page->object_id);
						setup_postdata($post);
						get_template_part('parts/offcanvas/page', get_post($page->object_id)->post_name);
					?>
				</section>
				<?php endfor; ?>
	    </main> <!-- end #main -->
		</div> <!-- end #inner-content -->
	</div> <!-- end #all-things-create -->
<?php get_footer('atc'); ?>
