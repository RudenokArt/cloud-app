<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <title>Document</title> -->
<?php wp_head(); ?>
</head>
<body>
	<pre><?php print_r(wp_get_nav_menu_items('main_menu')) ?></pre>
	<hr>
<?php get_sidebar(); ?>
