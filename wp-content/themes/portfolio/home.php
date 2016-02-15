<?php
/* Template Name: Home Page Template */
get_header();?>
	<div class="home-image"></div>
	<?php include 'sidebar.php'; ?>
	<div class="container">
		<?php include 'templates/top.php';?>
		<?php include 'templates/about.php';?>
		<?php include 'templates/work.php';?>
		<?php include 'templates/contact.php';?>
	</div>
<?php get_footer();?>