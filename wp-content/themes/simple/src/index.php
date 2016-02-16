<?php
  /* Template Name: Home Template */
  get_header();
?>
<div class="bg" data-ibg-bg="<?php echo the_field('background_image'); ?>"></div>
<div class="container">
  <section class="main">
    <article class="vh">
      <p class="intro"><?php echo the_field('intro_text'); ?></p>
      <h1 class="title"><?php echo the_title(); ?></h1>
      <button id="main-btn" class="main-btn"><?php echo the_field('button_label'); ?></button>
    </article>
  </section>
</div>
<div class="overlay">
  <div class="container">
    <section class="main-overlay">
      <div class="vh">

        <?php
          if(have_rows('overlay_item') ): while(have_rows('overlay_item') ) : the_row();
        ?>
        <div class="overlay-item">
          <div class="vh">
            <h4><?php echo the_sub_field('overlay_title'); ?></h4>
          </div>
          <div class="overlay-item-overlay">
            <div class="vh">
              <h3><?php echo the_sub_field('overlay_title'); ?></h3>
              <p><?php echo the_sub_field('overlay_text'); ?></p>
            </div>
          </div>
        </div>
        <?php endwhile; endif; ?>

      </div>
    </section>
  </div>
  <svg class="overlay-close" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve"><g><line fill="none" stroke-width="2" stroke-miterlimit="10" x1="18.947" y1="17.153" x2="45.045" y2="43.056"></line></g><g><line fill="none" stroke-width="2" stroke-miterlimit="10" x1="19.045" y1="43.153" x2="44.947" y2="17.056"></line></g></svg>
</div>
<?php get_footer(); ?>
