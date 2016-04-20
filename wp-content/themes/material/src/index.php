<?php
  //Template Name:  Index
  update_option('current_page_template','index'); // <----- this adds a body class
  get_header();
?>

<div class="group is-small">
  <h2 class="group-title">About</h2>
  <?php include 'inc/content-full.php'; ?>
</div>

<div class="group is-large">
  <h2 class="group-title">Resume</h2>
  <?php include 'inc/content-resume.php'; ?>
</div>

<div class="group is-small">
  <h2 class="group-title">Work</h2>
  <?php include 'inc/content-list.php'; ?>
</div>

<div class="group is-small">
  <h2 class="group-title">Contact</h2>
  <?php include 'inc/contact.php'; ?>
</div>

<?php get_footer(); ?>
