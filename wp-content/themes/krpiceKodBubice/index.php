<?php get_header(); ?>


<h2 class="section-heading">
    New in our store
</h2>
<section>
    <?php

    $args = [
        'post_type' => 'shop',
        'posts_per_page' => 4,
    ];

    $shopPost = new WP_Query($args);

    while ($shopPost->have_posts()) {
        $shopPost->the_post();

        ?>
        <div class="card">
            <div class="card-image">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Card Image">
                </a>
            </div>
            <div class="card-description">
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
                <!-- <div class="card-meta">
                           Posted by <?php the_author(); ?> on <?php the_time('F j, Y') ?> in 
                       </div> -->
                <p>
                    <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="btn-readmore">Read more</a>
            </div>
        </div>
    <?php
    }
    wp_reset_query()
    ?>
</section>
<div class="pagination">
    <?php echo paginate_links(); ?>
</div>

<?php get_footer(); ?>