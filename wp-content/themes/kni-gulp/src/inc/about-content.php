<section id="about-content" class="content about-item is-active">
  <?php
    $args = array('post_type' => 'post','posts_per_page' => 8,'order' => 'DESC');
    $my_query = new WP_Query($args);
    while ($my_query->have_posts()) : $my_query->the_post();
  ?>

  <article class="post">
    <h2><?php the_title(); ?></h2>
    <h6 class="post-date"><?php the_date(); ?></h6>
    <?php the_content(); ?>
  </article>

  <?php endwhile; wp_reset_query(); ?>
</section>
