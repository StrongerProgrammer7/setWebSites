<?php
// Template Name: Rent page
$imgManager = get_field('imgManagerTotal','option');
get_header();
?>
<div class="call_manager manage_fixed" onclick="showModal()">
<img src="<?= $imgManager ?> " alt="icon"/></div>
<section class="monumental__group">
        <?php
                $headAboutCompany = get_field('head_aboutCompany');
                if($headAboutCompany):
            ?>
        <div class="monumental__group-content h-auto">
            <div class="about__company_left-content monumental__left-content back_black">
                <div class="sell_face-left-content">
                    <p>
                       <?php echo $headAboutCompany['link']?> 
                    </p>
                    <?php echo $headAboutCompany['title']?> 
                    <button class="slider__btn-buy sell_face_btn" onclick="showModal()">Получить консультацию</button>
                </div>
                
            </div>
          
            <div style='' class="monumental__right-content sell_face_right-content">
                <div class="face_wrapper_imgRight"><img src=" <?php echo $headAboutCompany['background']?>" alt="image"/></div>
                <?php
                    $messanger = get_field('social', 'option');
                    if ($messanger):
                    ?>
                        <div class="slider__contacts sell__contacts">
                            <?php
                            foreach ($messanger as $elem) :
                            ?>
                                <a href="<?php echo $elem['link'] ?>">
                                    <img class="slider__contact" src="<?php echo $elem['icon'] ?>" alt="messanger" />
                                </a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    
            </div>
            <?php endif; ?>
        </div>
       
        <?php endif; ?>
       <? get_template_part( 'blocks/corners/corner_underPage_White' );  ?>
</section>


<section class="back__veryBrightMarble objections_onSale">
    <?php 
        $block_withImg = get_field('block');
        if($block_withImg):
            $grid = $block_withImg['block_with_imgGrid']['content_img_text'];
            $link_rentRoom = $block_withImg['link'];
            $bigTitle = $block_withImg['block_with_imgGrid']['title_bigImg'];
            $bigImg = $block_withImg['block_with_imgGrid']['bigImg'];
    ?>
        <div class="our__serviec-intro objections_onSale-intro">
            <h1 class="our__services-name services_name-padt"><?echo $block_withImg['title']?></h1>
            <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" />
        </div>
        <div class="objects_onSale-grid pageRent_objects_onSale-grid">
            <div class="grid-wrapper page_rent_grid">
                <a style="" class="box lands" href="<? echo $link_rentRoom?>?typeObjectSelect=<? echo $grid[1]['title']?>" >
            
                    <img src="<?echo $grid[1]['image']; ?>" alt="img" />
                        <div class="overlay_img"></div>
                    <div class="services__body-wrapper objects_onSaleGrid-text">
                        <p><?echo $grid[1]['title']?></p>
                        <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                    </div>
                </a>
          
                <a style="" class="box commercial" href="<? echo $link_rentRoom?>?typeObjectSelect=<? echo $grid[0]['title']?>">
                    <img src="<?echo $grid[0]['image']; ?>" alt="img" />
                        <div class="overlay_img"></div>
                    <div class="services__body-wrapper objects_onSaleGrid-text">
                        <p><?echo $grid[0]['title']?></p>
                        <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                    </div>
                </a>
                <a style="" class="box rooms" href="<? echo $link_rentRoom?>?typeObjectSelect=<? echo $bigTitle?>">
                    <div class="box_wrapper__img">
                        <img src="<?echo $bigImg; ?>" alt="img" />
                        <div class="overlay_img"></div>
                    </div>
               
                    <div class="services__body-wrapper objects_onSaleGrid-text">
                        <p><? echo $bigTitle ?></p>
                        <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                    </div>
                </a>
              </div>
        </div>
        <?endif;?>
        <? get_template_part( 'blocks/corners/corner_underPage_#F4F6FB' );  ?>
</section>
<section class="best__offers_back">
    <?php 
            $beft_offers = get_field('slider-cards');
            $args = ['slider' => $beft_offers, 'name' => 'sell','color' => 'black'];
            
            if($beft_offers)
            {
                get_template_part( 'blocks/block_with_slider',null, $args );
                $linkSell = get_field('linksRent','option');
                ?><a href="<? echo $linkSell['link_rent'] ?>" class="a_wrapper_btn"> <button class="btn-text-gold ofc__button " onclick="redirectToCatalogSell();">Смотреть все</button> </a><?
            }
                
            
          get_template_part( 'blocks/corners/corner_underPage_Gray' ); 
    ?>
</section>

<section class="call_us">
    <? 
    get_template_part( 'blocks/tpl_call_us' );
    get_template_part( 'blocks/corners/corner_underPage_White' );  
?>
</section>

<?php
    get_template_part( 'blocks/tpl_aboutUs',null,['color' => 'black']  );       
?>
<section class=" back__veryBrightMarble photo_ours_object">
    <?php 
        $block_withImg2 = get_field('photoOurObject');
        if($block_withImg2):
            $title = $block_withImg2['title'];
            $slider = $block_withImg2['sliders-photos'];
    ?>
        <div class="our__serviec-intro objections_onSale-intro">
            <h1 class="our__services-name services_name-padt"><? echo $title ?></h1>
            <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" />
        </div>

        <?
            global $post;
            $photosObjectcs = array( 
                'post_type' => 'photo_objects_rent', 
                'posts_per_page' => 2,
                "paged" => 1,
                "post_status" => "publish",
            );
           
            $query = new WP_Query( $photosObjectcs );
            
            //$paged = $query->max_num_pages;
            $max_pages = $query->max_num_pages;
            if( $query->have_posts() )
            {
        ?>
       <div>
       <div class="photo-slider wrapper_slider" id="photo-slider">
            <div class="swiper swiper-objects">
                <div class="swiper-wrapper" id="swiper_content_photoObjects">
                     <?
                        //echo var_dump($query);
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

        </div>
       </div>

        <button
            class="btn-text-black ofc__button "
            data-max_pages="<?= $max_pages ?>"  
            data-paged=<?= json_encode($query->query_vars); ?>   
            data-tpl="card" 
            id="getYetPhotoObjects">Смотреть портфолио</button>
        <? }
         else
         {?>
            <h1 class="nothind_data_photObjects"
            data-max_pages="<?= $max_pages ?>"  
            data-paged=<?= json_encode($query->query_vars); ?>   
            data-tpl="btn_addPhotos" 
            id="nothind_data_photObjects"
            > Отсутствуют </h1>
         <?} 
         wp_reset_postdata(); 
         ?>
        <? endif;?>
       <? get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?> 
    </section>
<?php
get_footer();
?>