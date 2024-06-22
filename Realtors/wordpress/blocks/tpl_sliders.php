<div class="wrapper_slider">
<div class="swiper swiper-room <? if(isset($args['color'])) echo "slider_".$args['color']?>">
    <div class="swiper-wrapper">
        <?php
            global $post;
            
            // $args['posts_per_page'] = -1;

            // echo '<pre>';
            // print_r($args);
            foreach ($args['slider'] as $post) :
                setup_postdata( $post );
        ?>
            <div class="swiper-slide" id="slide">
                <?php get_template_part('blocks/tpl_card', null, $post); ?>
            </div>
        <?php endforeach;
        wp_reset_postdata(); 
        
        $countRecord = count($args['slider']);
        if($countRecord == 2)
        {
            for($i = 0;$i < 8;$i++)
            {
                foreach ($args['slider'] as $post) :
                    setup_postdata( $post ); ?>

                    <div class="swiper-slide" id="slide">
                        <?php get_template_part('blocks/tpl_card', null, $post); ?>
                    </div>
                <?php endforeach; 
                wp_reset_postdata(); 
            }
        }else if($countRecord == 4)
        {
            for($i = 0;$i < 3;$i++)
            {
                foreach ($args['slider'] as $post) :
                    setup_postdata( $post ); ?>

                    <div class="swiper-slide" id="slide">
                        <?php get_template_part('blocks/tpl_card', null, $post); ?>
                    </div>
                <?php endforeach;
                wp_reset_postdata();  
            }
        }else if($countRecord == 6)
        {
            for($i = 0;$i < 2;$i++)
            {
                foreach ($args['slider'] as $post) :
                    setup_postdata( $post ); ?>

                    <div class="swiper-slide" id="slide">
                        <?php get_template_part('blocks/tpl_card', null, $post); ?>
                    </div>
                <?php endforeach; 
                wp_reset_postdata(); 
            }
        }else if($countRecord == 8)
        {
                foreach ($args['slider'] as $post) :
                    setup_postdata( $post ); ?>

                    <div class="swiper-slide" id="slide">
                        <?php get_template_part('blocks/tpl_card', null, $post); ?>
                    </div>
                <?php endforeach; 
                wp_reset_postdata(); 
            
        }
        ?>
    </div>
    
    <div class="swiper-pagination"></div>


    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
</div>

