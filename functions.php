
<?php

/**
 * CSS & JS
 */
add_action('wp_head', 'show_template');
function show_template()
{
    global $template;
    return basename($template);
}
function load_style($name)
{
    $dir = get_template_url() . '/assets/css' . '/' . $name . '.css';
    wp_enqueue_style($name . '-css', $dir, array(), time(), 'all');
    return false;
}
function load_script($name)
{
    $dir = get_template_url() . '/assets/js' . '/' . $name . '.js';
    wp_enqueue_script($name . '-js', $dir, array('googleapis-jquery'), time(),  false);
    return false;
}


/**
 * CSS / JS
 */

function script_load()
{
    global $post;
    wp_enqueue_script('gsap-cdn-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js');
    wp_enqueue_script('scrolltrigger-cdn-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/ScrollTrigger.min.js');
    wp_enqueue_script('cssrule-plugin-cdn-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/CSSRulePlugin.min.js');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js');
    wp_enqueue_style('edustadlertheme', get_template_directory_uri() . '/assets/css/style.css', array(), time(), 'all');

    $template_name = show_template();
    switch ($template_name) {
        case "index.php":
            load_style('style');
            break;
        case "page-about.php":
            load_style('style');
            load_style('page-about');
            break;
        default:
            echo '';
    }
}

add_action('wp_enqueue_scripts', 'script_load');


add_theme_support('post-thumbnails');

function get_url_template()
{
    return get_bloginfo('template_url');
}
function get_image($img = '')
{
    return get_bloginfo('template_url') . '/assets/img/' . $img;
}

function get_font($font = '')
{
    return get_bloginfo('template_url') . '/assets/font/' . $font;
}
function new_excerpt($length)
{
    return 10;
}
function new_excerpt_more($more)
{
    return '';
}
function get_template_url()
{
    return get_bloginfo('template_url');
}

?>

<?php
function retira_editor()
{
    remove_post_type_support('page', 'editor');
}
add_action('init', 'retira_editor');
?>