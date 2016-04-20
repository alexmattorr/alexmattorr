<article id="sidebar" class="sidebar">

  <div class="sidebar-info">
    <h1><?php echo the_title(); ?></h1>
    <h6><?php echo the_field('sub_title'); ?></h6>

    <ul class="side-bar-social">
      <li><a href="<?php echo the_field('linkedin'); ?>"><?php include 'icons/linkedin.svg'; ?></a></li>
      <li><a href="<?php echo the_field('twitter'); ?>"><?php include 'icons/twitter.svg'; ?></a></li>
      <li><a href="<?php echo the_field('github'); ?>"><?php include 'icons/github.svg'; ?></a></li>
    </ul>

    <p><?php echo the_content(); ?></p>
  </div>

  <ul class="sidebar-items">

    <?php
      $item_counter = 0;
      if( have_rows('item') ): while( have_rows('item') ): the_row();
    ?>
      <li data-item="content-item-<?php echo $item_counter; ?>" class="sidebar-item <?php if($item_counter === 0) { echo 'item-active'; } ?>" style="background-image: url(<?php echo the_sub_field('sidebar_image'); ?>); color: <?php echo the_sub_field('brand_color'); ?>;"></li>
    <?php $item_counter++; endwhile; endif; wp_reset_query();?>

  </ul>

</article>
