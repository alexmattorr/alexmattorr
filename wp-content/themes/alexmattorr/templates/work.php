<section class="wrapper" id="work">
	<h3 class="title"><?php echo the_field('work_title'); ?></h3>

	<?php
    if(have_rows('work_item') ):
    while(have_rows('work_item') ) : the_row();
	?>
	<a class="work-wrapper" href="<?php echo the_sub_field('work_link'); ?>">
		<h5><?php echo the_sub_field('work_name'); ?></h5>	
		<div class="work-item" style="background-image: url(<?php echo the_sub_field('work_image'); ?>"></div>
	</a>
	<?php
	  endwhile;
	  endif;
	?>
</section>