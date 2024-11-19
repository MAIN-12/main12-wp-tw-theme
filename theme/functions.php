<?php

/**
 * _m12 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _m12
 */

if (! defined('MAIN12_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('MAIN12_VERSION', '0.1.0');
}

if (! defined('MAIN12_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `main12_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'MAIN12_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (! function_exists('main12_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function main12_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _m12, use a find and replace
		 * to change 'main12' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('main12', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'main12'),
				'menu-2' => __('Footer Menu', 'main12'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
	}
endif;
add_action('after_setup_theme', 'main12_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function main12_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'main12'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'main12'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'main12_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function main12_scripts()
{
	wp_enqueue_style('main12-style', get_stylesheet_uri(), array(), MAIN12_VERSION);
	wp_enqueue_script('main12-script', get_template_directory_uri() . '/js/script.min.js', array(), MAIN12_VERSION, true);
	// wp_enqueue_script('main12-fade-in', get_template_directory_uri() . '/js/section-fade-in.min.js', array(), MAIN12_VERSION, true);
	// wp_enqueue_script('main12-scroll-animation', get_template_directory_uri() . '/js/scroll-animation.min.js', array(), MAIN12_VERSION, true);
	wp_enqueue_script('main12-scroll-functions', get_template_directory_uri() . '/js/scroll-functions.min.js', array(), MAIN12_VERSION, true);
	// wp_enqueue_script('main12-header-fade', get_template_directory_uri() . '/js/header-fade.min.js', array(), MAIN12_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'main12_scripts');

/**
 * Enqueue the block editor script.
 */
function main12_enqueue_block_editor_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'main12-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			MAIN12_VERSION,
			true
		);
		wp_add_inline_script('main12-editor', "tailwindTypographyClasses = '" . esc_attr(MAIN12_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'main12_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function main12_tinymce_add_class($settings)
{
	$settings['body_class'] = MAIN12_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'main12_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

if (!function_exists('main12_article_posted_on')) {
	/**
	 * "Theme posted on" pattern.
	 *
	 * @since v1.0
	 */
	function main12_article_posted_on()
	{
		printf(
			wp_kses_post(__('<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author-meta vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'main12-02')),
			esc_url(get_the_permalink()),
			esc_attr(get_the_date() . ' - ' . get_the_time()),
			esc_attr(get_the_date('c')),
			esc_html(get_the_date() . ' - ' . get_the_time()),
			esc_url(get_author_posts_url((int) get_the_author_meta('ID'))),
			sprintf(esc_attr__('View all posts by %s', 'main12-02'), get_the_author()),
			get_the_author()
		);
	}
}

function get_my_content()
{
	$post_content = get_the_content();

	// Find all h2 titles within the post content with specific classes
	preg_match_all('/<h2(.*?)>(.*?)<\/h2>/', $post_content, $matches);

	// Generate the table of contents
	if (!empty($matches[2])) {
		foreach ($matches[2] as $index => $title) {
			$id = 'section-' . ($index + 1); // Generate unique ID for each title
			$id_attr = sanitize_title_with_dashes($title); // Sanitize the title for use as an ID attribute
			// Assign the ID attribute to the corresponding <h2> tag
			$post_content = str_replace($matches[0][$index], '<h2 id="' . $id_attr . '">' . $matches[2][$index] . '</h2>', $post_content);
		}
	}

	// Apply WordPress content filters to maintain formatting
	$formatted_content = apply_filters('the_content', $post_content);

	// Return the modified and formatted content
	echo $formatted_content;
	// return $formatted_content;
}

function get_table_of_content()
{
	// Retrieve the post content
	$post_content = get_the_content();

	// Find all h2 titles within the post content with specific classes
	preg_match_all('/<h2(.*?)>(.*?)<\/h2>/', $post_content, $matches);

	// Initialize the variable to store the generated HTML
	$table_of_contents = '';

	// Generate the table of contents
	if (!empty($matches[2])) {
		$table_of_contents .= '<div id="sidebarNav">';
		$table_of_contents .= '<h3>Table of Content</h3>';
		$table_of_contents .= '<ul class="nav flex-column">';

		foreach ($matches[2] as $index => $title) {
			$id = 'section-' . ($index + 1); // Generate unique ID for each title
			$id_attr = sanitize_title_with_dashes($title); // Sanitize the title for use as an ID attribute
			$table_of_contents .= '<li class="nav-item">';
			$table_of_contents .= '<a class="nav-link" href="#' . $id_attr . '" data-scroll-target="' . $id_attr . '">' . $title . '</a>';
			$table_of_contents .= '</li>';

			// Assign the ID attribute to the corresponding <h2> tag
			$post_content = str_replace($matches[0][$index], '<h2 id="' . $id_attr . '">' . $matches[2][$index] . '</h2>', $post_content);
		}

		$table_of_contents .= '</ul></div>';
	}

	// Return the generated table of contents HTML
	echo $table_of_contents;
}



if (!function_exists('main12_02_comment')) {
	/**
	 * Style Reply link.
	 *
	 * @since v1.0
	 *
	 * @param string $class Link class.
	 *
	 * @return string
	 */
	function main12_02_replace_reply_link_class($class)
	{
		return str_replace("class='comment-reply-link", "class='comment-reply-link text-primary hover:text-blue-500 rounded-lg py-2", $class);
	}
	add_filter('comment_reply_link', 'main12_02_replace_reply_link_class');

	/**
	 * Template for comments and pingbacks.
	 */
	function main12_02_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		switch ($comment->comment_type):
			case 'pingback':
			case 'trackback':
?>
				<li class="post pingback">
					<p>
						<?php
						esc_html_e('Pingback:', 'main12-02');
						comment_author_link();
						edit_comment_link(esc_html__('Edit', 'main12-02'), '<span class="edit-link">', '</span>');
						?>
					</p>
				<?php
				break;
			default:
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="comment p-4 ">
						<div class="comment-meta flex items-start gap-4">
							<div class="w-[60px]">
								<?php
								$avatar_size = ('0' !== $comment->comment_parent ? 50 : 50);
								echo get_avatar($comment, $avatar_size, '', '', array('class' => 'rounded-full w-12 h-12'));
								?>
							</div>

							<div class="flex-1">
								<div class="comment-author vcard flex items-center space-x-3">
									<?php
									printf(
										wp_kses_post(__('%1$s, %2$s', 'main12-02')),
										sprintf('<span class="fn font-semibold">%s</span>', get_comment_author_link()),
										sprintf(
											'<a href="%1$s" class="text-gray-500"><time datetime="%2$s">%3$s</time></a>',
											esc_url(get_comment_link($comment->comment_ID)),
											get_comment_time('c'),
											sprintf(esc_html__('%1$s ago', 'main12-02'), human_time_diff((int) get_comment_time('U'), current_time('timestamp')))
										)
									);

									edit_comment_link(esc_html__('Edit', 'main12-02'), '<span class="edit-link text-blue-500 ml-2">', '</span>');
									?>
								</div>

								<?php if ('0' === $comment->comment_approved) { ?>
									<em class="comment-awaiting-moderation text-red-500">
										<?php esc_html_e('Your comment is awaiting moderation.', 'main12-02'); ?>
									</em>
									<br />
								<?php } ?>

								<div class="comment-content mt-3 text-gray-800"><?php comment_text(); ?></div>

								<div class="reply mt-2">
									<?php
									comment_reply_link(
										array_merge(
											$args,
											array(
												'reply_text' => esc_html__('Reply', 'main12-02') . ' <span>&darr;</span>',
												'depth'      => $depth,
												'max_depth'  => $args['max_depth'],
											)
										)
									);
									?>
								</div><!-- /.reply -->

							</div>
						</div>
					</article><!-- /#comment-## -->
	<?php
				break;
		endswitch;
	}

	/**
	 * Custom Comment form.
	 *
	 * @since v1.0
	 * @since v1.1: Added 'submit_button' and 'submit_field'
	 */
	function main12_02_custom_commentform($args = array(), $post_id = null)
	{
		if (null === $post_id) {
			$post_id = get_the_ID();
		}

		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		$args = wp_parse_args($args);

		$req      = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true' required" : '');
		$consent  = (empty($commenter['comment_author_email']) ? '' : ' checked="checked"');
		$fields   = array(
			'author'  => '<div class="mb-4">
							<input type="text" id="author" name="author" class="w-full p-2 border border-gray-300 rounded-md" value="' . esc_attr($commenter['comment_author']) . '" placeholder="' . esc_html__('Name', 'main12-02') . ($req ? '' : '') . '"' . $aria_req . ' />
						</div>',
			'email'   => '<div class="mb-4">
							<input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded-md" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="' . esc_html__('Email', 'main12-02') . ($req ? '' : '') . '"' . $aria_req . ' />
						</div>',
			'url'     => '',
			'cookies' => '<p class="mb-4">
							<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" class="mr-2" type="checkbox" value="yes"' . $consent . ' />
							<label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'main12-02') . '</label>
						</p>',
		);

		$defaults = array(
			'fields'               => apply_filters('comment_form_default_fields', $fields),
			'comment_field'        => '<div class="mb-4 mt-3">
											<textarea id="comment" name="comment" class="w-full p-2 border border-gray-300 rounded-md" aria-required="true" required placeholder="' . esc_attr__('Comment', 'main12-02') . ($req ? '' : '') . '"></textarea>
										</div>',
			'must_log_in'          => '<p class="must-log-in">' . sprintf(wp_kses_post(__('You must be <a href="%s" class="text-blue-500">logged in</a> to post a comment.', 'main12-02')), wp_login_url(esc_url(get_the_permalink(get_the_ID())))) . '</p>',
			'logged_in_as'         => '<p class="logged-in-as">' . sprintf(wp_kses_post(__('Logged in as <a href="%1$s" class="text-blue-500">%2$s</a>. <a href="%3$s" class="text-blue-500" title="Log out of this account">Log out?</a>', 'main12-02')), get_edit_user_link(), $user->display_name, wp_logout_url(apply_filters('the_permalink', esc_url(get_the_permalink(get_the_ID()))))) . '</p>',
			'comment_notes_before' => '<p class="small comment-notes text-gray-500">' . esc_html__('Your Email address will not be published.', 'main12-02') . '</p>',
			'comment_notes_after'  => '',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'class_submit'         => 'bg-blue-500 text-white rounded-lg px-4 py-2 hover:bg-blue-700',
			'name_submit'          => 'submit',
			'title_reply'          => '',
			'title_reply_to'       => esc_html__('Leave a Reply to %s', 'main12-02'),
			'cancel_reply_link'    => esc_html__('Cancel reply', 'main12-02'),
			'label_submit'         => esc_html__('Post Comment', 'main12-02'),
			'submit_button'        => '<input type="submit" id="%2$s" name="%1$s" class="%3$s" value="%4$s" />',
			'submit_field'         => '<div class="form-submit mb-6">%1$s %2$s</div>',
			'format'               => 'html5',
		);

		return $defaults;
	}
	add_filter('comment_form_defaults', 'main12_02_custom_commentform');
}

if (!function_exists('main12_02_content_nav')) {
	/**
	 * Display a navigation to next/previous pages when applicable.
	 *
	 * @since v1.0
	 *
	 * @param string $nav_id Navigation ID.
	 */
	function main12_02_content_nav($nav_id)
	{
		global $wp_query;

		if ($wp_query->max_num_pages > 1) {
?>
			<div id="<?php echo esc_attr($nav_id); ?>" class="d-flex mb-4 justify-content-between">
				<div><?php next_posts_link('<span aria-hidden="true">&larr;</span> ' . esc_html__('Older posts', 'main12-02')); ?></div>
				<div><?php previous_posts_link(esc_html__('Newer posts', 'main12-02') . ' <span aria-hidden="true">&rarr;</span>'); ?></div>
			</div><!-- /.d-flex -->
			<?php
		} else {
			echo '<div class="clearfix"></div>';
		}
	}

	/**
	 * Add Class.
	 *
	 * @since v1.0
	 *
	 * @return string
	 */
	function posts_link_attributes()
	{
		return 'class="btn btn-secondary btn-lg"';
	}
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');
}
