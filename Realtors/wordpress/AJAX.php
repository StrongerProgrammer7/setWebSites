<?php

function acceptFilters($args, $filters)
{
    if(!empty($filters))
    {
        $args['meta_query'] = array();
        if(count($filters) > 1)
            $args['meta_query'] = array('relation' => 'AND'); 
        if($filters['from_price'] != "" || $filters['to_price'] != "")
        {
            if($filters['from_price'] != "" && $filters['to_price'] != "")
            {
                $args['meta_query'][]  = array(  
                    'key' => 'price_num',  
                    'value' => array( (int)$filters['from_price'], (int)$filters['to_price'] ),
                    'type' => 'numeric',
                    'compare' => 'BETWEEN'  
                );
            }else if($filters['from_price'] != "" )
            {
                $args['meta_query'][]  = array(  
                    'key' => 'price_num',  
                    'value' =>  (int)$filters['from_price'],
                    'type' => 'numeric',
                    'compare' => '>='
                );
            }else
                $args['meta_query'][]  = array(  
                    'key' => 'price_num',  
                    'value' =>  (int)$filters['to_price'],
                    'type' => 'numeric',
                    'compare' => '<='
                );
        }
        if($filters['from_square']!= "" || $filters['to_square'] != "")
        {
            if($filters['from_square'] != "" && $filters['to_square'] != "")
            {
                $args['meta_query'][]  = array(  
                    'key' => 'square',  
                    'value' => array( (int)$filters['from_square'], (int)$filters['to_square'] ),
                    'type' => 'numeric',
                    'compare' => 'BETWEEN'  
                );
            }else if($filters['from_square'] != "" )
            {
                $args['meta_query'][]  = array(  
                    'key' => 'square',  
                    'value' =>  (int)$filters['from_square'],
                    'type' => 'numeric',
                    'compare' => '>='
                );
            }else
                $args['meta_query'][]  = array(  
                    'key' => 'square',  
                    'value' =>  (int)$filters['to_square'],
                    'type' => 'numeric',
                    'compare' => '<='
                );
          
        }

       
        if($filters['count_bed'])
        {
            if($filters['count_bed'] == "4")
            {
                $args['meta_query'][]  = array(  
                    'key' => 'space',  
                    'value' =>(int)$filters['count_bed']  ,
                    'type' => 'numeric',
                    'compare' => '>='
                );
            }else
            {
                $args['meta_query'][]  = array(  
                    'key' => 'space',  
                    'value' => (int)$filters['count_bed'],
                    'type' => 'numeric',
                );
            }
           
        }
        if($filters['count_room'])
        {
            if($filters['count_room'] == "4")
            {
                $args['meta_query'][]  = array(  
                    'key' => 'count_room',  
                    'value' =>(int)$filters['count_room']  ,
                    'type' => 'numeric',
                    'compare' => '>='
                );
            }else
            {
                $args['meta_query'][]  = array(  
                    'key' => 'count_room',  
                    'value' => (int)$filters['count_room'],
                    'type' => 'numeric',
                );
            }
           
        }

        if($filters['repairSelect'] && $filters['repairSelect'] != "Все")
        {
            if($filters['repairSelect'] != "Полный")
                $args['meta_query'][]  = array(  
                    'key' => 'repair',  
                    'value' => $filters['repairSelect'] ,
                    'type' => 'string',
                    'compare' => 'LIKE'

                );
        }

        if(!empty($filters['typeObjectSelect']))
        {
            $argsOR['meta_query'] = array('relation' => 'OR'); 
            for($i =0; $i < count($filters['typeObjectSelect']);$i++)
            {
                $argsOR['meta_query'][]  = array(  
                    'key' => 'typeObjectBuild',  
                    'value' => $filters['typeObjectSelect'][$i] ,
                    'type' => 'string',
                    'compare' => 'LIKE'
    
                );  
            }
            $args['meta_query'][] = $argsOR;
              
        }

        if(!empty($filters['charactersSelect']))
        {
            $argsOR['meta_query'] = array('relation' => 'OR'); 
            for($i =0; $i < count($filters['charactersSelect']);$i++)
            {
                $argsOR['meta_query'][]  = array(  
                    'key' => 'characters',  
                    'value' => $filters['charactersSelect'][$i] ,
                    'type' => 'string',
                    'compare' => 'LIKE'
    
                );  
            }
            $args['meta_query'][] = $argsOR;
     
        }
    }else
    {
        $args['meta_query'] = array();
    }

    return $args;
}

function getPosts($args, $paged)
{
    global $posts;
    $posts = new WP_Query($args);
    $html = '';
    $countPage = 0;
    if ($posts->have_posts()) : 
        $ind = 0;
        while ($posts->have_posts()) : 
            $posts->the_post();
            if($ind === 3)
            {
                $countPage++;
                $ind = 0;
            }
            $html .= get_template_part( 'blocks/tpl_card' );
            if($countPage == $paged)
                break;
            $ind++;
        endwhile;
    endif;

    wp_reset_postdata();
    return $html;
}
add_action("wp_ajax_load_more", "load_posts");
add_action("wp_ajax_nopriv_load_more", "load_posts");
function load_posts()
{
    $paged = !empty($_POST['page']) ? $_POST['page'] : 1;
    $paged++;
    $args = $_POST["query"];

    $args["paged"] = $paged;
    $args["order"] = !empty($_POST['order']) ? $_POST['order'] : "ASC";

    $filters = !empty($_POST['filters']) ? $_POST['filters'] : [];
    $args = acceptFilters($args,$filters);

    $html = getPosts($args,$args["paged"]);
    die($html);
}

add_action("wp_ajax_filter_posts", "filter_posts");
add_action("wp_ajax_nopriv_filter_posts", "filter_posts");
function filter_posts()
{

    $args = $_POST["query"];  
    $args['order'] = $_POST['order'];

    $filters = !empty($_POST['filters']) ? $_POST['filters'] : [];
    $args = acceptFilters($args,$filters);
    
    $html = getPosts($args,$args["paged"]);
    die($html);
}



add_action("wp_ajax_load_photos", "load_photos");
add_action("wp_ajax_nopriv_load_photos", "load_photos");

function getPhotos($args,$paged)
{
    global $posts;
    $args['posts_per_page'] = -1;
    $posts = new WP_Query($args);
    
    $html = '';
    $count = $posts->found_posts;
    // if ($posts->have_posts()) 
    // {
    //     $html .= get_template_part( 'blocks/tpl_slider_objects',null,$posts );
    // }
    if ($posts->have_posts()) 
    {
        while ($posts->have_posts()) : 
            $posts->the_post();
            $html .= get_template_part( 'blocks/tpl_photoObject' );
        endwhile;
    }

    wp_reset_postdata();
    if($count < 3)
    {
        $posts = new WP_Query($args);
        while ($posts->have_posts()) : 
            $posts->the_post();
            $html .= get_template_part( 'blocks/tpl_photoObject' );
        endwhile;
        wp_reset_postdata();
    }

    return $html;
}
function load_photos()
{
    $paged = !empty($_POST['page']) ? $_POST['page'] : 1;
    $paged++;
    $args = $_POST["query"];

    $args["paged"] = $paged;

    $html = getPhotos($args,$args["paged"]);
    die($html);
}

/*
add_action("wp_ajax_from_modal", "from_modal");
add_action("wp_ajax_nopriv_from_modal", "from_modal");

function from_modal()
{
   //TODO: Tomorrow COntact Form WP
    if(isset($_POST['name']))
    {
        
        die($_POST['name'] . ', оставил заявку и его телефон ' . $_POST['phone']);
        
    }else
    {
        die("Problem with data");
    }
}
*/

?>