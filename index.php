<?php 
/**
 * The template for index.php
 * 
 * @since 1.0
 */
get_header(); 
?>

<!-- Index.php -->
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		the_content();
	
	} // end while
} // end if
?>

<?php get_footer(); ?>