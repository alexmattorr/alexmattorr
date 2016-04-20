<?php
  //Template Name:  Grid
  update_option('current_page_template','grid'); // <----- this adds a body class
  get_header();

  include 'inc/sidebar.php';
  include 'inc/content.php';

  get_footer();
?>
