<?php
// Template Name: Card's buildings page
$imgManager = get_field('imgManagerTotal','option');
get_header();
?>
<div class="call_manager manage_fixed" onclick="showModal()">
<img src="<?= $imgManager ?> " alt="icon"/></div>
<section class="section__face" id="section__face">
        <div class="swiper sample-slider">
            <div class="swiper-wrapper">
                <?
                    $mainSliderImg = get_field('image_MainSliders');
                    if($mainSliderImg):
                        foreach($mainSliderImg as $img):
                ?>
                <div class=" swiper-slide ">
                        <div class=" about_room_slider-left__text slider__left__text">
                           <div class="about_room-slt-elems slider__left-elements">
                                <div class="slider_left-elems-links">
                                    <p><a href="https://rieltors.dev.agrachoff.ru/?page_id=2">Главная </a> / <a href="#!"> Каталог </a>
                                    </p>
                                </div>
                                <p class="slider__text-name"><? the_title('') ?> </p>
                                <p class="slider__text-price"><? the_field('address') ?></p>
                                 
                                <div class="about__room-slte-choose slider__text-choose">
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/building.svg" alt="rooms" />
                                            <p class="text_object">Тип объекта: <?the_field('typeObjectBuild'); ?></p>
                                        </div>
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/room.png" alt="rooms" />
                                            <p class="text_object">Площадь: <? the_field('square'); ?> м²</p>
                                        </div>
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/bed.png" alt="rooms" />
                                            <p class="text_object">Количество спален: <?the_field('space');?></p>
                                        </div>
                                    </div> 
                                <p  class="mt-3rem rentRoom_night">
                                       <?the_field('price');?>
                                    </p>
                                <button class="mt-2rem slider__btn-buy rentRoomFontBtn card-btn" onclick="showModal()">Получить консультацию</button>
                           </div>
                        </div>
                        <div  style='' class="slider__right-img">
                                <img src="<? echo $img['img']; ?>" alt="img" />
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
                        </div>
                           
                </div>
                <?endforeach;endif;?>    
               
            </div>
      
             
            <div class="swiper-pagination"></div>

        </div>
        <? get_template_part( 'blocks/corners/corner_underPage_White' ); ?> 
</section>
<section class="back__veryBrightMarble catalog">
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">
                <h1 class="our__services-name offers__name">Ключевые характеристики
                </h1>
                <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" /><br>
            </div>
        </div>
        <div class="container-catalog">
                <div class="keyCharacter_rows">
                    <?php
                        $options = get_field('options');
                        
                        if($options):
                            
                 
                            foreach($options as $option):
                    ?>
                        <div class="keyCharacter_column">
                            <h3><? echo $option['title_group']; ?></h3>
                            <ul>
                                <?
                                global $post;
 
                                foreach($option['options'] as $post):
                                    ?>
                                     <li> <img src="<? echo get_the_post_thumbnail_url(  )?>" alt="icon" /><p><? the_title('')?></p></li>
                                <?endforeach;  wp_reset_postdata( );?>
                               
                            </ul>
                        </div>
                    <?endforeach; endif;?>
             </div>

        </div>
        <?  get_template_part( 'blocks/corners/corner_underPage_#F4F6FB' ); ?>?>
</section>
<section class="mb-0 best__offers ">
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">

                <h1 class="our__services-name offers__name"><?the_field('name_blocks'); ?>
                </h1>
                <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" /><br>
            </div>
        </div>
        <?
            $description = get_field('description');
            if($description): 
        ?>
        <div class="about__room">
            
            <div class="about_room-content">
            <h3><? echo $description['name_address_id'];?></h3>
                <p><? echo $description['description_home'];?></p>
            </div>
            <div class="about_room-map">
                <h3>На карте:</h3>
                <div id="mymap" class="page_contacts_info-map">
                    <!-- <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A053bd947d462cc1a45aeba4070defff75501905071c0eaf68436ac9976ec698c&amp;id=mymap&amp;lang=ru_RU&amp;"></script> -->
                </div>
            </div>
        </div>
        <? endif; ?>
        <?  get_template_part( 'blocks/corners/corner_underPage_Gray' ); ?>?>
</section>
<section class="call_us">
    <? 
    get_template_part( 'blocks/tpl_call_us' );
    get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?>
</section>
<?php
get_footer();
?>


<!-- Подключение JQuery -->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
</script>
<script defer>

ymaps.ready(function () 
{
    

    try 
    {
        let coordinate = '<? echo the_field('coordinate')?>';
        if(!coordinate)
            coordinate = '55.751574, 37.573856'; 
        coordinate = coordinate.split(',');
        console.log(coordinate[0]);
        var myMap = new ymaps.Map('mymap', {
            center: [coordinate[0],coordinate[1]],
            zoom: 15
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myPieChart = new ymaps.Placemark([coordinate[0],coordinate[1]], {
            balloonContent: '<?echo the_field('address'); ?>'
        }, {
            preset: 'islands#icon',
            iconColor: '#0095b6'
        });
        myMap.geoObjects.add(myPieChart)

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        );

       
    } catch (error) 
    {
        console.log(error);    
    }
});
</script>