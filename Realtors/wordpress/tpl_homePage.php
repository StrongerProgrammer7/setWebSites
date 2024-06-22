<?php
// Template Name: Main page
get_header();
?>

<section class="section__face main__page" id="section__face">
    <div class="swiper sample-slider">
        <div class="swiper-wrapper">
            <? $slider = get_field('main_slider'); 
                if($slider):
                    foreach($slider as $slide):
            ?>
            <div class=" swiper-slide ">

                <div class="slider__left__text">
                    <div class="slider__left-elements">
                        <p class="slider__text-name"><?php echo $slide['title'] ?>
                        </p>
                        <p class="slider__text-price"><?php echo $slide['under_title'] ?></p>
                        <p class="slider__text-about">
                            <?php echo $slide['text'] ?>
                        </p>
                        <div class="slider__text-choose">
                            <?php $list = $slide['list'];
                                    if($list):
                                        $ind = 0;
                                        ?>
                                        <div class="sl_text-choose-left">
                                        <?
                                        foreach ($list as $item):
                                            $ind++;
                                ?>
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri() ?>/assets/img/line_gold.png" alt="rooms" />
                                            <p class="text_object"><?php echo $item['item'] ?></p>
                                        </div>
                           
                            <?php
                                        if($ind == 2)
                                            break;
                                        endforeach;?>
                                        </div>
                                        <div class="sl_text-choose-right">
                                        <?
                                            $newInd = 0;
                                            foreach($list as $item):
                                                $newInd++;
                                                if($newInd <=2)
                                                {
                                                    continue;
                                                }
                                        ?> <div class="text__choose-object">
                                        <img class="img_object" src="<?php echo get_template_directory_uri() ?>/assets/img/line_gold.png" alt="rooms" />
                                        <p class="text_object"><?php echo $item['item'] ?></p>
                                    </div>
                                            
                                        <? 
                                                endforeach;?>
                                                </div><?
                                    endif;?>
                        </div>
                        <div class="slider_face-btn">
                            <button class="slider__btn-buy" onclick="showModal()">Купить</button>
                            <button class="slider__btn-buy" onclick="showModal()">Арендовать</button>
                        </div>
                    </div>

                </div>
                <div style='background: url(" <?php echo $slide['image_slide']?>") no-repeat center center / cover;' class="slider__right-img">
                    <?php
                    $messanger = get_field('social', 'option');
                    if ($messanger):
                    ?>
                        <div class="slider__contacts">
                            <?php
                            foreach ($messanger as $elem) :
                            ?>
                                <a href="<?php echo $elem['link'] ?>">
                                    <img class="slider__contact" src="<?php echo $elem['icon'] ?>" alt="whatsapp" />
                                </a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="slider__call">
                        <div  class="call_manager">
                            <img src="<?= $slide['contactManager']['img'] ?> " alt="icon"/>
                    </div>
                        <div class="slider__call-info">
                            <p class="slider__call-name">
                                <?= $slide ['contactManager']['fio']?>
                            </p>
                            <p class="slider__call-text">
                                <?= $slide ['contactManager']['text']?>
                            </p>
                            <?php 
                                if($messanger):
                            ?>
                            <div class="slider__call-img">
                                <a href="<?php echo $messanger[0]['link'] ?>">
                                    <img class="slider__contact" src="<?php echo $messanger[0]['icon'] ?>" alt="whatsapp" />
                                </a>
                                 <a href="<?php echo $messanger[1]['link'] ?>">
                                    <img class="slider__contact" src="<?php echo $messanger[1]['icon'] ?>" alt="telegram" />
                                </a>
                            </div>
                            <?endif;?>
                            <?php 
                             $phone = get_field('phone','option');
                             if($phone):
                             ?>
                            <p class="slider__call-phone">
                                <a class="goldColor managerPhoneLink" href="tel:<?php echo preg_replace('/[ -]*/', '', $phone) ?>" > <?php echo $phone ?> </a>
                            </p>
                            <? endif;?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
                endif;?>                           


        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <? get_template_part( 'blocks/corners/corner_underPage_White' );  ?>
</section>
<section class="our__services">
    <?php  $our_service = get_field('our_service');
            if($our_service):?>
    <div class="our__serviec-intro">
   
        <h1 class="our__services-name services_name-padt"><? echo $our_service[0]['title']?></h1>
        <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" />
       
    </div>
    <div class="our__services-body">
        <?php 
                foreach($our_service[0]['items'] as $item):
        ?>
            <div class="services__body">
                <div class="wrapper_img2"></div>
                    <img class="img2" src="<?php echo $item['background'] ?>" alt="img" />
                    <div class="our__services_border"></div>
               
                    <div class="services__body-wrapper">
                        <p><?php echo $item['name']?> </p>
                        <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                    <button class="services__btn"  
                    <? if($item['name'] == "Продажа"): ?>
                     onclick="redirectToCatalogSell()"
                     <? else: ?>
                        onclick="redirectToCatalogRent()"
                        <?endif;?>> В каталог </button>
                    </div>
                  
                </div>
        <?endforeach;?>
    </div>
    <?endif;?>
    <?get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?>
</section>
<section class="bigger__base">
    <?php
        get_template_part( 'blocks/tpl_biggerBase' );
        get_template_part( 'blocks/corners/corner_underPage_White' );
    ?>
</section>
<section class="best__offers_back">
    <?php 
            global $post;
            $linkRent= get_field('linkRent');
            $beft_offers = get_field('slider-cards');
            $args = ['slider' => $beft_offers, 'name' => 'rent'];
            if($beft_offers)
            {
                get_template_part( 'blocks/block_with_slider',null, $args );
                ?> <a href="<? echo $linkRent?>" class="a_wrapper_btn"> <button class="btn-text-gold ofc__button " onclick="redirectToCatalogRent();">Смотреть все</button> </a><?  
            } 
            wp_reset_postdata();  
            get_template_part( 'blocks/corners/corner_underPage_White' ); 
    ?>
</section>

<section class="best__offers_2back"> 
    <?php 
            $linkSell = get_field('linkSell');
            $beft_offers = get_field('slider-cards');
            $args = ['slider' => $beft_offers, 'name' => 'sell'];
            if($beft_offers)
            {
                get_template_part( 'blocks/block_with_slider',null, $args );
                ?> <a href="<? echo $linkSell ?>" class="a_wrapper_btn"> <button class="btn-text-gold ofc__button " onclick="redirectToCatalogSell();">Смотреть все</button> </a><?  
            } 
            wp_reset_postdata();    
    get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); 
    ?>
</section>
<section class="monumental__group">
    <?php
        $monumentalGroup = get_field('block_elite');
        if($monumentalGroup):
    ?>
    <div class="monumental__group-content">
        <div style="" class="monumental__left-content">
            <img src="<?php echo get_template_directory_uri( )?>/assets/img/background_section_5_left_2.png" alt="img" />
            <div class="overlay_onImg"></div>
            <div class="monumental__left-text">
                <h1><? echo $monumentalGroup['name'] ?></span>
                </h1>
                <h3><? echo $monumentalGroup['subTitle'] ?></h3>
                <p><? echo $monumentalGroup['text'] ?></p>
                <button class="ofc__button mon_btn_text" onclick="redirectToAboutCompany()">О компании</button>
            </div>

        </div>
        <div class="monumental__right-content">
            <img src="<?php echo $monumentalGroup['back']?>" alt="background" />
            <?php
                $logo_2 =  $monumentalGroup['logo_opacity'];
                if($logo_2):
            ?>
                
             <img class="monumental-logo-right" src="<?php echo $logo_2 ?>" alt="logo" />
            <?endif;?>
        </div>
    </div>
    <?php endif;?>
    <?php get_template_part( 'blocks/corners/corner_underPage_#F4F6FB' ); ?>
</section>

<?php
        get_template_part( 'blocks/tpl_aboutUs' );
        
?>

<section class="choose_us best__offers_2back">
    <?php 
        $tabs = get_field('why_us');
        if($tabs):
    ?>
    <div class="base_mt offers__text">
        <div class="our__serviec-intro offers__align-center">
           

            <h1 class="our__services-name offers__name">почему выбирают нас</h1>
            <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" />
        </div>
    </div>
    <div class="choose_us__cards">
        <div class="choose__cards">
            <?php for($num_tab=0;$num_tab<2;$num_tab++): ?>
            <div class="choose_card">
                <div class="choose_card-content">
                    <h1><?echo $num_tab+1?></h1>
                    <div class="choose_card-context-text">
                        <h2><?echo $tabs['items'][$num_tab]['name']?></h2>
                        <p><?echo $tabs['items'][$num_tab]['text']?></p>
                    </div>
                </div>
               
            </div>
            <?endfor;?>
        </div>
        <div class="choose__cards mt-0">
            <?php for($num_tab=2;$num_tab<4;$num_tab++): ?>
            <div class="choose_card">
                <div class="choose_card-content">
                    <h1><?echo $num_tab+1?></h1>
                    <div class="choose_card-context-text">
                    <h2><?echo $tabs['items'][$num_tab]['name']?></h2>
                        <p><?echo $tabs['items'][$num_tab]['text']?></p>
                    </div>
                </div>
               
            </div>
            <?endfor;?>
        </div>
       
    </div>
    <div class="choose_btn">
        <button class="slider__btn-buy" onclick="showModal();"> Оставить заявку</button>
    </div>
    <?endif;?>
    <?php
        get_template_part( 'blocks/corners/corner_underPage_Gray' );
    ?>
</section>

<section class="call_us">
    <? 
    get_template_part( 'blocks/tpl_call_us' );
    get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?>
</section>

<?php
get_footer();
?>