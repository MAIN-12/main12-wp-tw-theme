<?php

/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('container mb-8 '); ?>>
    <header class="entry-header mb-4">
        <h1 class="entry-title text-2xl font-bold text-gray-800"><?php the_title(); ?></h1>
        <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta text-sm text-gray-600 mt-2">
                <?php main12_article_posted_on(); ?>
            </div>
        <?php endif; ?>
    </header><!-- /.entry-header -->

    <div class="prose prose-lg max-w-none">
        <?php
        get_my_content();
        // the_content();
        ?>

        <?php wp_link_pages(array(
            'before' => '<div class="page-link text-sm text-blue-500 mt-4"><span>' . esc_html__('Pages:', 'main12_02') . '</span>',
            'after' => '</div>'
        )); ?>
    </div>

    <?php edit_post_link(__('Edit', 'main12_02'), '<span class="edit-link block mt-4 text-blue-500">', '</span>'); ?>

    <footer class="entry-meta mt-6 text-gray-700">
        <hr class="my-4 border-gray-300">

        <?php
        /* translators: used between list items, there is a space after the comma */
        $category_list = get_the_category_list(__(', ', 'main12_02'));

        /* translators: used between list items, there is a space after the comma */
        $tag_list = get_the_tag_list('', __(', ', 'main12_02'));

        if ($tag_list != '') :
            $utility_text = __('This entry was posted in %1$s and tagged %2$s by <a href="%6$s" class="text-blue-500">%5$s</a>. Bookmark the <a href="%3$s" class="text-blue-500" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'main12_02');
        elseif ($category_list != '') :
            $utility_text = __('This entry was posted in %1$s by <a href="%6$s" class="text-blue-500">%5$s</a>. Bookmark the <a href="%3$s" class="text-blue-500" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'main12_02');
        else :
            $utility_text = __('This entry was posted by <a href="%6$s" class="text-blue-500">%5$s</a>. Bookmark the <a href="%3$s" class="text-blue-500" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'main12_02');
        endif;

        printf(
            $utility_text,
            $category_list,
            $tag_list,
            esc_url(get_the_permalink()),
            the_title_attribute(array('echo' => false)),
            get_the_author(),
            esc_url(get_author_posts_url((int) get_the_author_meta('ID')))
        );
        ?>
    </footer><!-- /.entry-meta -->
</article><!-- /#post-<?php the_ID(); ?> -->