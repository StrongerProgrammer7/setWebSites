<?php
// Template Name: Owners page
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
                 
                </div>
               
            </div>
          
            <div style='background: url(" <?php echo $headAboutCompany['background']?>");     background-repeat: no-repeat;
    background-size: cover;' class="monumental__right-content sell_face_right-content">
               
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
                            
                        <form class="our__services-form" id="form_owners" method="POST">
                           <!-- <div class="wrapper_icon_input">
                            <input class="call_input input_name" type="text" name="name" placeholder="Ваше имя" required/>
                            <img class="svg_name_form" src="<?php //echo get_template_directory_uri( )?>/assets/img/page_owners/svg/name.svg" alt="icon" />
                           </div>
                           <div class="wrapper_icon_input">
                                <input class="m-0 call_input input_phone" type="tel" name="phone" placeholder="+7 (_ _ _) _ _ _ - _ _  - _ _" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" required/>
                                <img class="svg_name_form" src="<?php //echo get_template_directory_uri( )?>/assets/img/page_owners/svg/phone.svg" alt="icon" />
                           </div>
                             <div class="wrapper_icon_input">
                                <div class="wrapper__select-form_typeObject">
                                    <select class="typeObject" id="typeObject"> 
                                        <option>Тип объекта</option> 
                                        <option>Дом</option> 
                                        <option>Квартира</option> 
                                        <option>Подвал</option> 
                                        <option>Клетка</option> 
                                    </select>
                                </div>
                                <img class="svg_name_form" src="<?php //echo get_template_directory_uri( )?>/assets/img/page_owners/svg/home.svg" alt="icon" />
                             </div>
                            <div class="wrapper_icon_input">
                                <input class="call_input input_name" type="text" name="price" placeholder="Цена" required/>
                                <img class="svg_name_form" src="<?php //echo get_template_directory_uri( )?>/assets/img/page_owners/svg/price.svg" alt="icon" />
                               </div>
                            <button class="services__btn"> <? 
                            // $name = explode(' ',$item['name']);
                            // if(strtolower(trim($name[0])) == "Продать") 
                            //         echo "Продать";
                            //     else 
                            //         echo "Арендовать"; 
                            ?>
                             </button> -->
                             <?php echo do_shortcode('[contact-form-7 id="fdf5f6f" title="Контактная форма по объектам"]') ?>
                       </form>
                       
                        </div>
                    </div>
            <?endforeach;?>
        </div>
        <?endif;?>
      <? get_template_part( 'blocks/corners/corner_underPage_SoftBlack' );  ?>
    </section>
   
<section class="bigger__base">
    <?php
        get_template_part( 'blocks/tpl_biggerBase' );
        get_template_part( 'blocks/corners/corner_underPage_White' ); 
    ?>
</section>
<section class="back__veryBrightMarble our__services objections_onSale">
        <?php
            $our_service = get_field('about_us_');
            if($our_service):
        ?>
        <div class="info-content">
            <?php 
                foreach($our_service as $item):
            ?>
            <div class="info-content-card frist">
                <div class="info__wrapper-content-frist">
                    <img src="<?php echo $item['image']?>" alt="room" />
                    <div class="info-rectangle-border info-rect1">
                        
                    </div>
                </div>
                <div class="info-content-frist-text">
                    <h1> <?echo $item['name'] ?><br>
                    <img class="info-img_under_h1 figure_size" src="<?php echo get_template_directory_uri( )?>/assets/img/svg/Group 130_gold.svg" alt="vector" />
                    </h1>
                    <div class="info__wrapper-content-frist">
                        
                        <p class="info-content-first-paragraph">
                            <svg class="border__paragraph" width="100%" height="100%"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect  x="0" y="0" width="100%" height="100%" rx="9.5" stroke="url(#paint0_linear_7_956)"/>
                                <defs>
                                <linearGradient id="paint0_linear_7_956" x1="0" y1="0" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DBC67F"/>
                                <stop offset="1" stop-color="#DBC67F" stop-opacity="0"/>
                                </linearGradient>
                                
                                </defs>
                                
                            </svg>
                            <? echo $item['text'] ?>
                        </p>
     
                    </div>
                </div>
            </div >
            <?endforeach;?>
           
        </div>
       <? endif;?>
        <?  get_template_part( 'blocks/corners/corner_underPage_Gray' ); ?> 
</section>


<section class="call_us">
    <? 
    get_template_part( 'blocks/tpl_call_us' );
    get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?>
</section>
<?php
get_footer();
?>