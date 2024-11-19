<?php

/**
 * The template for displaying content in the index.php template.
 */
?>
<?php
$title_max_characters = 60;
$show_excerpt = false;
$excerpt_max_characters = 1000;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('w-full'); ?>>
    <div class="rounded-lg mb-4 overflow-hidden">
        <div class="flex flex-wrap md:flex-nowrap">
            <!-- Left column for the cover image -->
            <div class="w-full md:w-1/4 p-2">
                <?php $post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                <a href="<?php the_permalink(); ?>">
                    <figure class="relative w-full h-full overflow-hidden">
                        <div class="bg-cover bg-center h-full" style="background-image: url('<?php echo esc_url($post_thumbnail_url); ?>');"></div>
                        <figcaption class="absolute inset-0 flex flex-col items-center justify-center opacity-0 hover:opacity-100 transition-opacity bg-black bg-opacity-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-white" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                            </svg>
                            <h4 class="text-white mt-2">Read More</h4>
                        </figcaption>
                    </figure>
                </a>
            </div>

            <!-- Right column for title and excerpt -->
            <div class="w-full md:w-3/4 p-4">
                <div>
                    <ul class="flex items-center text-gray-500 text-sm space-x-3">
                        <li>
                            <a href="#!" class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-400" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                </svg>
                                <span><?php echo esc_html(get_the_date()); ?></span>
                            </a>
                        </li>
                        <?php
                        $num_comments = get_comments_number();
                        if (comments_open() && $num_comments >= 1) :
                        ?>
                            <li>&bull;</li>
                            <li>
                                <a href="<?php echo esc_url(get_comments_link()) ?>" class="flex items-center space-x-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-400" viewBox="0 0 16 16">
                                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
                                    </svg>
                                    <span><?php echo $num_comments; ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <h2 class="text-xl font-semibold text-gray-800 mt-2">
                    <a href="<?php the_permalink(); ?>" class="hover:underline">
                        <?php
                        $title = esc_html(get_the_title());
                        echo mb_strimwidth($title, 0, $title_max_characters, '...');
                        ?>
                    </a>
                </h2>

                <?php
                if ($show_excerpt) {
                    $excerpt = get_the_excerpt();
                    $limited_excerpt = mb_strimwidth($excerpt, 0, $excerpt_max_characters, '...');
                    echo "<p class='mt-2 text-gray-600'>$limited_excerpt</p>";
                }
                ?>

                <a href="<?php the_permalink(); ?>" class="inline-block mt-3 px-4 py-2 text-sm font-semibold text-blue-500 border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white transition">
                    <?php esc_html_e('Read More', 'underscores'); ?>
                </a>
            </div>
        </div>
    </div>
</article>