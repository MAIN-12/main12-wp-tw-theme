<?php

/**
 * The template for displaying the archive loop.
 */

main12_02_content_nav('nav-above');

if (have_posts()) :
?>
	<div file_name="archive-loop.php" class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
		<?php
		while (have_posts()) :
			the_post();

			/**
			 * Include the Post-Format-specific template for the content.
			 * If you want to overload this in a child theme then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			// get_template_part( 'content', 'index' ); // Post format: content-index.php

			if (is_search()) {
				get_template_part('template-parts/content/card-04-h');
			} else {
				get_template_part('template-parts/content/card-01');
			}
		endwhile;
		?>
	</div>
<?php
endif;

wp_reset_postdata();

main12_02_content_nav('nav-below');
