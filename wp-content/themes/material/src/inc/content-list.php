<div class="content content-list">

  <?php
    if(have_rows('work_item') ): while(have_rows('work_item') ) : the_row();
    $image_object = get_sub_field('image');
    $image_size = 'medium';
    $image_url = $image_object['sizes'][$image_size];
  ?>
  <a href="<?php echo the_sub_field('link'); ?>" class="content-item" target="_blank">
    <div class="item-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
    <div class="item-text">
      <h3 class="color-title"><?php echo the_sub_field('title'); ?></h3>
      <p><?php echo the_sub_field('text'); ?></p>
    </div>
  </a>
  <?php endwhile; endif; ?>


</div>
