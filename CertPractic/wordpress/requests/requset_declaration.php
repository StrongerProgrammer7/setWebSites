

<?php
add_action("wp_ajax_load_declaration", "load_declaration");
add_action("wp_ajax_nopriv_load_declaration", "load_declaration");
function get_decalration($args,$count)
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
                $html .= get_template_part( 'blocks/block_declaration_price' );
            }else
                break;
        
            $ind--;
        endwhile;
    endif;

    wp_reset_postdata();

    return $html;
}

function load_declaration()
{
   
    $args = $_POST["query"];

   
    $count = !empty($_POST['countDeclaration']) ? $_POST['countDeclaration'] : 1;
    $html = get_decalration($args,$count);
    die($html);
}
?>