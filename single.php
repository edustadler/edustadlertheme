<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        // My loop is here
        the_title();
        the_content();
    endwhile;

else :
// if I haven't post...
endif;
?>


<?php get_footer(); ?>