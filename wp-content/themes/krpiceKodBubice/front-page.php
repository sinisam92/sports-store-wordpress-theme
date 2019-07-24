<?php get_header(); ?>
<div id="banner">
    <h1>KrpiceKodBubice</h1>
    <h3>Kopacke na izvolte</h3>
</div>
<main>
    <a href="<?php echo site_url('/shop'); ?>">
        <h2 class="section-heading">
            New in our store
        </h2>
    </a>
    <section>
        <?php

        $args = [
            'post_type' => 'post',
            'psots_per_page' => 4,
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
</main>
<?php get_footer(); ?>