<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _m12
 */

get_header();
?>

<section id="primary" file_name="index.php">
	<main id="main" class="container max-w-7xl mx-auto px-3">

		<?php
		if (have_posts()) {

			if (is_home() && ! is_front_page()) :
		?>
				<header class="entry-header">
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				</header>
		<?php
			endif;

			get_template_part('template-parts/layout/recent-post-01');
			// get_template_part('template-parts/post/get-categories');
			get_template_part('archive', 'loop');

			// Previous/next page navigation.
			main12_the_posts_navigation();
		} else {

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content', 'none');
		}
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
