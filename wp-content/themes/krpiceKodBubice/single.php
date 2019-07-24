<?php get_header(); ?>

<?php
while (have_posts()) {
    the_post();
    ?>

    <h2><?php the_title(); ?></h2>
    <!-- <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" /> -->
    <?php the_content(); ?>
    <div id="comments-section">
        <?php
        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? " aria-required='true'" : '');
        $fields =  [

            'author' =>
            '<input placeholder="Name" id="author" name="author" type="text" value="' .
                esc_attr($commenter['comment_author']) .
                '" size="30"' . $aria_req . ' />',

            'email' =>
            '<input placeholder="Email" id="email" name="email" type="text" value="' .
                esc_attr($commenter['comment_author_email']) .
                '" size="30"' . $aria_req . ' />',
        ];

        $args = [
            'title_replay' => 'Share Your Thoughts',
            'fields' => $fields,
            'comment_field' => '<textarea placeholder="Your Comment" id="comment"
    name="comment" cols="45" rows="8" aria-required="true"></textarea>',
            'comment_notes_before' => '<p class="comment-notes">Your email address will not be published.
    All fields are required</p>'
        ];


        comment_form($args);

        $comments_number = get_comments_number();
        if ($comments_number != 0) {
            ?>
            <div class="comments">
                <h3>What others say</h3>
                <ol class="all-comments">
                    <?php
                    $comments = get_comments([
                        'post_id' => $post->ID,
                        'status' => 'approve'
                    ]);
                    wp_list_comments([
                        'per_page' => 15
                    ], $comments);
                    ?>
                </ol>
            </div>
        <?php
        }
        ?>
        <!-- <aside id="sidebar">
                <?php dynamic_sidebar('main_sidebar'); ?>
            </aside> -->
    </div>


<?php
}
get_footer(); ?>