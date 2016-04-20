<?php
  //Template Name:  Index
  update_option('current_page_template','index'); // <----- this adds a body class
  get_header();

  include 'inc/about.php';
  include 'inc/work.php';
  include 'inc/contact.php';

  get_footer();
?>
