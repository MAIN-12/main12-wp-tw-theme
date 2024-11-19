<?php

/**
 * The template for displaying content in the index.php template.
 */
?>
<?php
$excerpt = false;
$excerpt_max_characters = 100;
?>

<div class="col mb-6">
	<article>
		<div class="border-0 bg-transparent">
			<?php
			// Get the post thumbnail URL
			$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');

			// If there's no thumbnail, set a fallback image
			if (empty($post_thumbnail_url)) {
				$post_thumbnail_url = 'path/to/fallback/image.jpg'; // Replace with the path to your fallback image
			}
			?>
			<a href="<?php the_permalink(); ?>">
				<figure class="overflow-hidden relative" style="margin: 0;">
					<div class="post-thumbnail" style="background-image: url('<?php echo esc_url($post_thumbnail_url); ?>'); background-size: cover; background-position: center; aspect-ratio: 16/9;"></div>

					<figcaption class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-eye text-white" viewBox="0 0 16 16">
							<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
							<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
						</svg>
						<h4 class="text-white mt-2">Read More</h4>
					</figcaption>
				</figure>
			</a>

			<div class="m-0 p-0">
				<div class="mb-3">
					<ul class="list-none flex mb-3">
						<li>
							<?php
							$categories = get_the_category();
							if (!empty($categories)) {
								$category_name = esc_html($categories[0]->name);
								$category_link = esc_url(get_category_link($categories[0]->term_id));
							?>
								<a class="inline-flex px-2 py-1 text-primary bg-primary-subtle border border-primary-subtle rounded text-xs" href="<?php echo $category_link; ?>"><?php echo $category_name; ?></a>
							<?php } ?>
						</li>
					</ul>
					<h2 class="text-xl m-0">
						<a class="text-dark no-underline" href="<?php the_permalink(); ?>">
							<?php
							$title = esc_html(get_the_title());
							echo mb_strimwidth($title, 0, 60, '...');
							?>
						</a>
					</h2>
				</div>
			</div>

			<div class="p-0 m-0">
				<ul class="list-none flex items-center m-0 ">
					<li>
						<a class="text-xs text-gray-400 flex items-center" href="#!">
							<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
								<path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
								<path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
							</svg>
							<span class="ms-2 text-xs"><?php echo esc_html(get_the_date()); ?></span>
						</a>
					</li>
					<?php
					$num_comments = get_comments_number();
					if (comments_open() && $num_comments >= 1) :
					?>
						<li>
							<span class="px-3">&bull;</span>
						</li>
						<li>

							<a class="text-gray-400 flex items-center" href="<?php echo esc_url(get_comments_link()) ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
									<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
									<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.188-.142.34-.227.447-.385.45-.922.733-1.48.99a3.453 3.453 0 0 1-1.34.29z" />
								</svg>
								<span class="ms-2 text-xs"><?php echo $num_comments; ?></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</article>
</div>