<?php
/* Template Name: Work Page Template */
get_header();?>
	<div class="workpage-image"></div>
	<a id="go-home" href="<?php echo get_home_url() ?>">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><polygon fill="none" stroke-width="2" stroke-miterlimit="10" points="32,3 2,33 11,33 11,63 23,63 23,47 39,47 39,63 51,63 51,33 62,33 "/></svg>
	</a>

	<div id="work-slider" class="flexslider">
		<ul class="slides">
			<?php
		    $args = array(
		      'post_type' => 'work',
		      'posts_per_page' => 12
		    );
		    $the_query = new WP_Query($args);
		    $do = 0;
		    if (have_posts()):
		    while ($the_query->have_posts()): $the_query->the_post();
		  ?>
			<li class="work-page-item-wrapper" data-work="<?php echo the_field('work_internal_link'); ?>">
				<div class="work-page-item">
					<div class="work-hero" style="background-image: url(<?php echo the_field('work_image') ?>)"></div>
					<div class="work-info">
						<h5><?php echo the_title(); ?></h5>
						<h6><?php echo the_field('work_company') ?></h6>
						<div class="work-buttons">
						<?php if( have_rows('work_button') ): while ( have_rows('work_button') ) : the_row(); ?>
							<a href="<?php echo the_sub_field('link'); ?>" target="_blank" class="work-link"><?php echo the_sub_field('title'); ?></a>
						<?php endwhile; else : endif; ?>
						</div>
						<div class="work-info-item">
							<p><?php echo the_field('work_info') ?></p>
						</div>

						<div class="work-info-item">
							<p><?php echo the_field('work_tech') ?></p>
						</div>
					</div>
				</div>
			</li>
			<?php
		  	$do++;
			  endwhile;
			  endif;
		  ?>
		  <?php wp_reset_postdata();?>
		</ul>
  </div>
<?php get_footer();?>