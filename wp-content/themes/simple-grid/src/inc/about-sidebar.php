<section id="about-sidebar" class="sidebar about-item is-active">

  <div class="sidebar-full">
    <h2><?php the_title(); ?></h2>
    <h6><?php the_field('sub_title'); ?></h6>

    <p><?php echo the_content(); ?></p>

    <ul class="side-bar-social">
      <li><a href="<?php echo the_field('email'); ?>"><?php // include 'icons/envelope.svg'; ?></a></li>
      <li><a href="<?php echo the_field('github'); ?>" target="_blank"><?php // include 'icons/github2.svg'; ?></a></li>
      <li><a href="<?php echo the_field('linkedin'); ?>" target="_blank"><?php // include 'icons/linkedin.svg'; ?></a></li>
    </ul>

    <form action="" style="display: none;">
      <input type="text" placeholder="Name">
      <input type="text" placeholder="Email">
      <textarea placeholder="Message" name=""></textarea>
      <input type="submit" value="send">
    </form>
  </div>

</section>
