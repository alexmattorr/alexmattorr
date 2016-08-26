<article id="work-content" class="content work-item">

  <?php
    $counter = 0;
    if( have_rows('item') ): while( have_rows('item') ): the_row();
  ?>
    <div id="content-image-<?php echo $counter; ?>" class="content-item content-image <?php if($counter === 0) { echo 'item-active'; } ?>" >
      <img src="<?php echo the_sub_field('showcase_image'); ?>" alt="<?php echo the_sub_field('title'); ?>">
    </div>
  <?php $counter++; endwhile; endif; wp_reset_query();?>

</article>
