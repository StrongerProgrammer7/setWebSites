<?
    $query = $args;
?>
<div class="swiper swiper-objects">
     <div class="swiper-wrapper" id="swiper_content_photoObjects">
         <?
                                  
        // echo var_dump($query);
        while ( $query->have_posts() )
        {
            $query->the_post();
                get_template_part( 'blocks/tpl_photoObject' );
        }               
        ?>
        </div>
    <div class="swiper-pagination"></div>
                  
         
     <div class="swiper-button-prev swiper-btn-photo"></div>
    <div class="swiper-button-next swiper-btn-photo"></div>
</div>