<section class="wrapper" id="work">
	<h3 class="title"><?php echo the_field('work_title'); ?></h3>

	<?php
    $args = array(
      'post_type' => 'work',
      'posts_per_page' => 50
    );
    $the_query = new WP_Query($args);
    if (have_posts()):
    while ($the_query->have_posts()): $the_query->the_post();
  ?>
	<a class="work-wrapper" href="/work/#<?php echo the_field('work_internal_link'); ?>">
		<h5><?php echo the_sub_field('work_name'); ?></h5>	
		<div class="work-item" style="background-image: url(<?php echo the_field('work_stage_image'); ?>);"></div>
	</a>
	<?php
	  endwhile;
	  endif;
  ?>
  <?php wp_reset_postdata();?>
</section>