<section id="work-sidebar" class="sidebar work-item">

  <div class="sidebar-info">
    <?php
      $item_counter = 0;
      if( have_rows('item') ): while( have_rows('item') ): the_row();
    ?>
      <div id="side-info-<?php echo $item_counter; ?>" class="content-info content-item <?php if($item_counter === 0) { echo 'item-active'; } ?>">
        <h2 style="color: <?php echo the_sub_field('brand_color'); ?>;"><?php the_sub_field('title'); ?></h2>
        <h6><?php the_sub_field('date'); ?></h6>
        <p><?php the_sub_field('description'); ?>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure tempore, quos harum adipisci vel voluptates aspernatur alias nulla in a repellat maxime reiciendis fugiat est, ducimus iste, ipsam. Optio, vel!</p>
        <a href="<?php the_sub_field('link'); ?>" style="color: <?php echo the_sub_field('brand_color'); ?>; border-color: <?php echo the_sub_field('brand_color'); ?>;" target="_blank">View Project</a>
      </div>
    <?php $item_counter++; endwhile; endif; wp_reset_query();?>
  </div>

  <ul class="sidebar-items">

    <?php
      $item_counter = 0;
      if( have_rows('item') ): while( have_rows('item') ): the_row();
    ?>
      <li data-item="<?php echo $item_counter; ?>" class="sidebar-item content-item <?php if($item_counter === 0) { echo 'item-active'; } ?>" style="background-image: url(<?php echo the_sub_field('sidebar_image'); ?>); color: <?php echo the_sub_field('brand_color'); ?>;"></li>
    <?php $item_counter++; endwhile; endif; wp_reset_query();?>

  </ul>

</section>
