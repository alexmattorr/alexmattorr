<?php
  //Template Name:  Grid
  update_option('current_page_template','grid'); // <----- this adds a body class
  get_header();

  include 'inc/about-sidebar.php';
  include 'inc/about-content.php';

  include 'inc/work-sidebar.php';
  include 'inc/work-content.php';

  get_footer();
?>
