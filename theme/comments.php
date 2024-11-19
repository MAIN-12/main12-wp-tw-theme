<?php

/**
 * The template for displaying Comments.
 */

if (post_password_required()) {
	return;
}
?>
<div id="comments" class="mt-8">
	<?php if (comments_open() && ! have_comments()) : ?>
		<h2 id="comments-title" class="text-lg font-semibold">
			<?php esc_html_e('No Comments yet!', 'main12-02'); ?>
		</h2>
	<?php endif; ?>

	<?php if (have_comments()) : ?>
		<h2 id="comments-title" class="text-xl font-semibold">
			<?php
			$comments_number = get_comments_number();
			if ('1' === $comments_number) {
				printf(_x('One Reply to &ldquo;%s&rdquo;', 'comments title', 'main12-02'), get_the_title());
			} else {
				printf(
					_nx(
						'%1$s Reply to &ldquo;%2$s&rdquo;',
						'%1$s Replies to &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'main12-02'
					),
					number_format_i18n($comments_number),
					get_the_title()
				);
			}
			?>
		</h2>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
			<nav id="comment-nav-above" class="flex justify-between items-center mb-4 text-sm">
				<h1 class="sr-only"><?php esc_html_e('Comment navigation', 'main12-02'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'main12-02')); ?></div>
				<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'main12-02')); ?></div>
			</nav>
		<?php endif; ?>

		<ol class="commentlist list-none pl-0 space-y-4">
			<?php
			// Loop through and list the comments.
			wp_list_comments(array('callback' => 'main12_02_comment'));
			?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
			<nav id="comment-nav-below" class="flex justify-between items-center mt-4 text-sm">
				<h1 class="sr-only"><?php esc_html_e('Comment navigation', 'main12-02'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'main12-02')); ?></div>
				<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'main12-02')); ?></div>
			</nav>
		<?php endif; ?>

	<?php elseif (! comments_open() && ! is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
		<h2 id="comments-title" class="text-lg font-semibold text-gray-500"><?php esc_html_e('Comments are closed.', 'main12-02'); ?></h2>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>