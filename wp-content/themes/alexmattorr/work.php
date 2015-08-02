<?php
/* Template Name: Work Page Template */
get_header();?>
	<a id="go-home" href="<?php echo get_home_url() ?>">
		Go Home
	</a>

	<div class="work-container">
	<?php
    $args = array(
      'post_type' => 'work',
      'posts_per_page' => 50
    );
    $the_query = new WP_Query($args);
    if (have_posts()):
    while ($the_query->have_posts()): $the_query->the_post();
  ?>
		<div class="work-item" id="">
			<div class="work-hero" style="background: url(<?php echo the_field('work_image') ?>)"></div>
			<div class="work-info">
				<div class="work-info-item">
					<h5><?php echo the_title(); ?></h5>
					<h6><?php echo the_field('work_company') ?></h6>
					<p><?php echo the_field('work_info') ?></p>
				</div>

				<div class="work-info-item">
					<p><?php echo the_field('work_tech') ?></p>
					<a href="<?php echo the_field('work_external_link') ?>" class="work-link"></a>
				</div>
			</div>
		</div>
  <?php
	  endwhile;
	  endif;
  ?>
  <?php wp_reset_postdata();?>
	</div>
<?php get_footer();?>