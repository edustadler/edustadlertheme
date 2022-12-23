<?php
/*
Template Name: About
*/
get_header(); ?>

<?php

$icon1 = get_field('icon-1', 30);
$icon2 = get_field('icon-2', 30);
$icon3 = get_field('icon-3', 30);
$icon4 = get_field('icon-4', 30);
$icon5 = get_field('icon-5', 30);
$icon6 = get_field('icon-6', 30);
$content2 = get_field('content-2', 30);


?>

<?php get_template_part('parts/about/first-section'); ?>

<section id="second-section">
    <div class="grid">
        <div class="left left-flex">
            <img src="<?php echo $icon1; ?>" alt="">
            
            <img src="<?php echo $icon2; ?>" alt="">
            
            <img src="<?php echo $icon3; ?>" alt="">
            
            <img src="<?php echo $icon4; ?>" alt="">
            
            <img src="<?php echo $icon5; ?>" alt="" style="width: 7rem;">
            
            <img src="<?php echo $icon6; ?>" alt="">            
        </div>
        <div class="right">
            <p>
                <?php echo $content2; ?>
            </p>
        </div>
    </div>
</section>


<?php get_footer(); ?>