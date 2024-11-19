<?php

/**
 * The template for displaying content in the index.php template.
 */
?>
<?php
$show_excerpt = true;
$excerpt_max_characters = 200;
?>

<div class="w-full mb-6">
	<article>
		<div class="bg-transparent border-0">
			<?php $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
			<a href="<?php the_permalink(); ?>">
				<figure class="overflow-hidden relative">
					<div class="bg-cover bg-center h-64" style="background-image: url('<?php echo esc_url($post_thumbnail_url); ?>');"></div>
					<figcaption class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 hover:opacity-100 transition-opacity">
						<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-white" viewBox="0 0 16 16">
							<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
							<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
						</svg>
						<h4 class="text-white mt-2">Read More</h4>
					</figcaption>
				</figure>
			</a>

			<div class="p-4">
				<div class="mb-3">
					<ul class="flex items-center space-x-2 text-sm text-gray-600 mb-3">
						<?php
						$categories = get_the_category();
						if (!empty($categories)) :
							$category_name = esc_html($categories[0]->name);
							$category_link = esc_url(get_category_link($categories[0]->term_id));
						?>
							<li>
								<a href="<?php echo $category_link; ?>" class="px-2 py-1 text-primary border border-primary rounded text-xs bg-primary-light">
									<?php echo $category_name; ?>
								</a>
							</li>
						<?php endif; ?>
					</ul>
					<h2 class="text-lg font-bold">
						<a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600">
							<?php
							$title = esc_html(get_the_title());
							echo mb_strimwidth($title, 0, 100, '...');
							?>
						</a>
					</h2>
				</div>
			</div>

			<div class="p-4 border-t border-gray-200">
				<ul class="flex items-center text-sm text-gray-500 space-x-3">
					<li class="flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="mr-1" viewBox="0 0 16 16">
							<path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
							<path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
						</svg>
						<span><?php echo esc_html(get_the_date()); ?></span>
					</li>
					<?php
					$num_comments = get_comments_number();
					if (comments_open() && $num_comments >= 1) :
					?>
						<li>&bull;</li>
						<li class="flex items-center">
							<a href="<?php echo esc_url(get_comments_link()) ?>" class="flex items-center hover:text-blue-600">
								<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="mr-1" viewBox="0 0 16 16">
									<path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
									<path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
								</svg>
								<span><?php echo $num_comments; ?></span>
							</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>

			<div class="p-4">
				<?php
				$excerpt = get_the_excerpt();
				if ($show_excerpt && $excerpt) :
				?>
					<p class="text-sm text-gray-700">
						<?php echo wp_trim_words($excerpt, 40, '...'); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</article>
</div>