<?php
$site_name = get_bloginfo('name');
$main_menu_items = wp_get_nav_menu_items('main_menu');
$main_menu_arr = [];
foreach ($main_menu_items as $key => $value) {
	if ($value->menu_item_parent == 0) {
		$main_menu_arr[] = [
			'ID' => $value->ID,
			'title' => $value->title,
			'url' => $value->url,
			'items' => [],
		];
	}
}
foreach ($main_menu_arr as $key => $value) {
	foreach ($main_menu_items as $key1 => $value1) {
		if ($value1->menu_item_parent != 0 and $value['ID'] == $value1->menu_item_parent) {
			$main_menu_arr[$key]['items'][] = [
				'ID' => $value1->ID,
				'title' => $value1->post_title,
				'url' => $value1->url,
			];
		}		
	}
}
?>
<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $site_name; ?></title>
	<?php wp_head(); ?>
</head>
<body style="background-image: url(<?php echo get_stylesheet_directory_uri();?>/img/milky-way.jpg);">
	
	<div class="container-fluid">
		<div class="row align-items-center">
			<div class="col-lg-2 col-md-3 col-sm-4 col-6">
				<a href="/">
					<img 
					class="w-100"
					src="<?php echo wp_get_attachment_url(get_theme_mod('custom_logo'));?>"
					alt=""></a>
				</div>
				<div class="col-lg-10 col-md-9 col-sm-8 col-6">
					<div class="h1 text-info"><?php echo $site_name; ?></div>
					<div class="text-light"><?php echo get_bloginfo('description'); ?></div>
					<div class="d-flex flex-wrap bg-light p-2">
						<?php foreach ($main_menu_arr as $key => $value): ?>
							<a href="<?php echo $value['url']; ?>" class="p-2 text-decoration-none">
								<?php echo $value['title']; ?>
							</a>
						<?php endforeach ?>
					</div>
				</div>
			</div>

			<pre class="bg-light"><?php print_r($main_menu_arr); ?></pre>