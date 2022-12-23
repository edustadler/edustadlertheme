<?php 

$title = get_field('title', 30);
$content1 = get_field('content', 30);
$img1 = get_field('right_image', 30);

?>


<section id="initial">
    <div class="grid">
        <div class="left">
            <h1><?php echo $title; ?></h1>
            <p><?php echo $content1; ?></p>
        </div>
    </div>
    <img src="<?php echo $img1; ?>" alt="<?php the_title(); ?>">
</section>