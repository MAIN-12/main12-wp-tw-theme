<div class="container mx-auto px-4">
    <h2 class="text-2xl font-bold mb-6">Latest Adventures and Discoveries</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="mb-6">
            <?php get_template_part('template-parts/content/main-card'); ?>
        </div>
        <div class="mb-6">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
            );

            $recent_posts_query = new WP_Query($args);

            if ($recent_posts_query->have_posts()) :
                while ($recent_posts_query->have_posts()) : $recent_posts_query->the_post();
                    get_template_part('template-parts/content/main-card-h');
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No posts found';
            endif;
            ?>
        </div>
    </div>
</div>