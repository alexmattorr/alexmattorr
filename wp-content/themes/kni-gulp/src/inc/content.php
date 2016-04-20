<article id="content" class="content">

  <div class="left-btn"><?php include 'icons/arrow-left.svg'; ?></div>
  <div class="right-btn"><?php include 'icons/arrow-right.svg'; ?></div>

  <?php
    $counter = 0;
    if( have_rows('item') ): while( have_rows('item') ): the_row();
  ?>
    <div id="content-item-<?php echo $counter; ?>" class="content-item" style="<?php if($counter === 0) { echo 'display: block'; } ?>" >

      <div class="content-info">
        <h2><?php echo the_sub_field('title'); ?></h2>
        <h6><?php echo the_sub_field('date'); ?></h6>
        <a href="<?php echo the_sub_field('link'); ?>" class="btn">View Project</a>
      </div>

      <img src="<?php echo the_sub_field('showcase_image'); ?>" alt="<?php echo the_sub_field('title'); ?>">


      <div class="content-overlay"></div>
    </div>
  <?php $counter++; endwhile; endif; wp_reset_query();?>

</article>
