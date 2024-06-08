<?php get_header();?>

<pre><?php print_r(Config::B24CurlRequest()); ?></pre>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <?php the_title(); ?>
<?php endwhile; else: ?>
	Записей нет.
<?php endif; ?>


<?php get_footer(); ?>
