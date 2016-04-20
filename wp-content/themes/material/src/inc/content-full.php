<div class="content content-full">

  <div class="content-block">

    <div class="content-block-small contact-block-side">
      <?php
        if(have_rows('side_item') ): while(have_rows('side_item') ) : the_row();
        echo the_sub_field('side_text');
        endwhile; endif;
      ?>
    </div>

    <div class="content-block-large">

      <h5><?php // the_field('page_intro'); ?></h5>
      <h1 class="color-title"><?php the_field('page_title'); ?></h1>

      <?php if(have_rows('full_item') ): while(have_rows('full_item') ) : the_row(); ?>
      <div class="content-block-item">
        <?php echo the_sub_field('text'); ?>
      </div>
      <?php endwhile; endif; ?>
    </div>

  </div>

</div>
