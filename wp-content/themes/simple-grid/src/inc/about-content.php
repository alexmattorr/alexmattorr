<section id="about-content" class="content about-item is-active">
  <?php
    $args = array('post_type' => 'post','posts_per_page' => 8,'order' => 'DESC');
    $my_query = new WP_Query($args);

    $pc = 1;
    while ($my_query->have_posts()) : $my_query->the_post();
  ?>

  <article class="post <?php if($pc === 1) { echo 'is-open'; } ?>">
    <h3><?php the_title(); ?><span class="post-arrow"><?php include 'icons/arrow-left.svg'; ?></span></h3>
    <h6 class="post-date"><?php the_time(get_option('date_format')); ?></h6>

    <div class="post-info" style="<?php if($pc === 1) { echo 'display: block;'; } else { echo 'display: none;'; } ?>">
      <?php the_content(); ?>
    </div>
  </article>

  <?php $pc++; endwhile; wp_reset_query(); ?>
</section>
