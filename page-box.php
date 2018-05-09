<?php 
/**
 * The template for displaying all pages
 * Template Name: Box Page
 *
 * @since 1.0
 */
get_header(); 
?>
<!-- page-box.php -->
<div class="hero-block">
<div class="box_white">
<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		the_content();
	} // end while
} // end if
?>
</div>
</div>
<?php get_footer(); ?>