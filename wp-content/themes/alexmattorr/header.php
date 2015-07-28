<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
    <meta name="description" content="Alexander Orr's Portfolio Site" />
    <meta name="author"      content="Alexander Orr" />
    <meta name="viewport"    content="width=device-width, initial-scale=1, minimum-scale=1"/>
    <!-- <script type="text/javascript" src="../assets/svg/grunticon.loader.js"></script> -->
    <link href="<?php echo get_template_directory_uri(); ?>/dist/assets/style/min/style.css" rel="stylesheet" />
		<?php wp_head(); ?>
	</head>
<body>
