<section id="about-sidebar" class="sidebar about-item is-active">

  <div class="sidebar-full">
    <h1><?php the_title(); ?></h1>
    <h5><?php the_field('sub_title'); ?></h5>

    <ul class="side-bar-social">
      <li><a href="<?php echo the_field('linkedin'); ?>"><?php include 'icons/linkedin.svg'; ?></a></li>
      <li><a href="<?php echo the_field('github'); ?>"><?php include 'icons/github.svg'; ?></a></li>
    </ul>

    <p><?php echo the_content(); ?></p>

    <form action="">
      <h6>Contact Me</h6>
      <input type="text" placeholder="Name">
      <input type="text" placeholder="Email">
      <textarea placeholder="Message" name=""></textarea>
      <input type="submit" value="send">
    </form>
  </div>

</section>
