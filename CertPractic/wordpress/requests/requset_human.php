

<?php
add_action("wp_ajax_load_personal", "load_personal");
add_action("wp_ajax_nopriv_load_personal", "load_personal");
function get_people($args,$count)
{
    global $post;
    
    $query = new WP_Query($args);
    
    $html = '';
    $ind = $count-1;
    if ($query->have_posts()) : 
        while ($query->have_posts()) : 
            $query->the_post();
            if($ind >= 0)
            {
                $html .= get_template_part( 'blocks/block_human_card' );
            }else
                break;
        
            $ind--;
        endwhile;
    endif;

    wp_reset_postdata();

    return $html;
}

function load_personal()
{
    $args = $_POST["query"];

    $count = !empty($_POST['countHuman']) ? $_POST['countHuman'] : 1;
    $html = get_people($args,$count);
    die($html);
}
?>