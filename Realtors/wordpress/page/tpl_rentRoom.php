<?php
// Template Name: Rent rooms page
$numPosts = 2;
$sorting = "ASC";
$typeObj = !empty($_GET['typeObjectSelect'] )?$_GET['typeObjectSelect'] : "";
$imgManager = get_field('imgManagerTotal','option');
get_header();
?>
<div class="call_manager manage_fixed" onclick="showModal()">
<img src="<?= $imgManager ?> " alt="icon"/></div>
<section class="section__face" id="section__face">
    <div class="swiper sample-slider">
        <div class="swiper-wrapper">
            <? $slider = get_field('main_slider'); 
                if($slider):
                    foreach($slider as $slide):
            ?>
            <div class=" swiper-slide ">
                <div class="sell_face-left-content rentRoom-slider">
                        <p>
                            <a href="<? echo $slide['main_link']['link'] ?>"> <? echo $slide['main_link']['name'] ?></a> / <a href="#!"> <?echo $slide['current_page']?></a>
                        </p>
                        <? echo $slide['title'] ?>
                        </h1>
                        <p  class="mt-3rem rentRoom_night">
                            <? echo $slide['under_title']?>
                        </p>
                        <button class="slider__btn-buy sell_face_btn" onclick="showModal()">Получить консультацию</button>
                </div>
                       
                <div  style='background: url(" <?php echo $slide['image_slide']?>") no-repeat center center / cover;' class="slider__right-img">
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
            <?php
                endforeach;
                endif;?>                           


        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
    <? get_template_part( 'blocks/corners/corner_underPage_SoftWhite' );  ?>
</section>

<section class="mb-0 room_form_filter_section ">
        <div class=" mb-7rem container-rentRoom">
            <div class="form_order">
                <? 
                    $elems_form = get_field('elems_forms');
                    if($elems_form):
                        ?>
                <form class="form" id="filters">
                   <div class="form__content">
                    <div class="chid">
                        <label for="select">Тип  объекта: </label>
                        <div class="multiselect_block" >
                            <label for="typeObjectSelect" class="field_multiselect">Выбор</label>
                            <input id="checkbox-1" class="multiselect_checkbox" type="checkbox">
                            <label for="checkbox-1" class="multiselect_label"></label>
                            <select id="typeObjectSelect" class="field_select" name="technology" multiple style="@media (min-width: 768px) { height: calc(4 * 38px)}">
                            <?php
                                $typeObjects =$elems_form['typeObjects'];
                                if($typeObjects):
                                    foreach($typeObjects as $option):
                            ?>
                                 <option value="<? echo trim($option['name'])?>" 
                                <?= trim($option['name']) == trim($typeObj) ? "selected" : "" ?>><? echo $option['name']?></option>
                                <?endforeach; endif; ?>
                            </select>
                        </div> 
                    </div>
                        <div class="chid">
                            <label for="price">Цена </label>
                            <div class="price" id="price">
                                <input type="text" name="from_price" id="from_price" placeholder="от"/>
                                <input type="text" name="to_price" id="to_price" placeholder="до"/>
                            </div>
                        </div>
                        <div class="chid">
                            <label for="price">Площадь </label>
                            <div class="price" id="price">
                                <input type="text" name="from_square"  id="from_square" placeholder="от"/>
                                <input type="text" name="to_square"  id="to_square" placeholder="до"/>
                            </div>
                        </div>
                        <div class="chid">
                            <label for="room">Комнат </label>
                            <div class="room" id="room">
                                <div class="wrapper_checkbox">
                                    <input  type="radio" name="count_room" id="count_room" value="1"/>
                                    <span>1</span>
                                  
                                </div>
                                <div class="wrapper_checkbox">
                                    <input  type="radio" name="count_room" id="count_room"  value="2"/>
                                    <span>2</span>
                                    <div class="line-gray"></div>
                                </div>
                                <div class="wrapper_checkbox">
                                    <input  type="radio" name="count_room" id="count_room"   value="3"/>
                                    <span>3</span>
                                    <div class="line-gray"></div>
                                </div>
                                <div class="wrapper_checkbox">
                                    <input  type="radio" name="count_room" id="count_room"  value="4"/>
                                    <span>4+</span>
                                    <div class="line-gray"></div>
                                </div>
                                
                            </div>
                        </div>
                   </div>
                   <div class="form__content">
                    <div class="chid">
                        <label for="bed">Спальни </label>
                        <div class="room" id="bed">
                            <div class="wrapper_checkbox">
                                <input  type="radio" name="count_bed" id="count_bed" value="1"/>
                                <span>1</span>
                            </div>
                            <div class="wrapper_checkbox">
                                <input  type="radio" name="count_bed" id="count_bed" value="2"/>
                                <span>2</span>
                                <div class="line-gray"></div>
                            </div>
                            <div class="wrapper_checkbox">
                                <input  type="radio" name="count_bed"  id="count_bed"value="3"/>
                                <span>3</span>
                                <div class="line-gray"></div>
                            </div>
                            <div class="wrapper_checkbox">
                                <input  type="radio" name="count_bed" id="count_bed"  value="4"/>
                                <span>4+</span>
                                <div class="line-gray"></div>
                            </div>
                         
                            
                        </div>
                    </div>
                    <div class="chid">
                        <label for="repairSelect">Ремонт </label>
                        <div class="wrapper__select-form_repair">
                            <select class="repair" id="repairSelect"> 
                                <option>Все</option>
                                 
                                <?php
                                $Repair =$elems_form['repair'];
                                if($Repair):
                                    foreach($Repair as $option):
                                ?>
                                <option value="<? echo $option['name']?>"><? echo $option['name']?></option>
                                <?endforeach; endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="chid">
                        <label for="charactersSelect">Характеристики: </label> 
                        <div class="multiselect_block_character">
                            <label for="charactersSelect" class="field_multiselect_character">Выбор</label>
                            <input id="checkbox-2" class="multiselect_checkbox_character" type="checkbox">
                            <label for="checkbox-2" class="multiselect_label_character"></label>
                            <select id="charactersSelect" class="field_select_character" name="technology" multiple style="@media (min-width: 768px) { height: calc(4 * 38px)}">
                                <?php
                                $characters =$elems_form['characters'];
                                if($characters):
                                    foreach($characters as $option):
                                ?>
                                <option value="<? echo $option['name']?>"><? echo $option['name']?></option>
                                <?endforeach; endif; ?>
                            </select>
                        </div> 
                    </div>
                    <div class="chid">
                        <button class="w-100per mt-1rem slider__btn-buy rentRoomFontBtn " type="submit">Подобрать</button>
                    </div>
                   </div>
                </form>
                <?endif;?>
            </div>
        </div>
        
        
        <? get_template_part( 'blocks/corners/corner_underPage_White' );  ?>
</section>

<section class="back__veryBrightMarble catalog">
    <?
     if(! empty ($_GET["sortByPrice"]) && $_GET["sortByPrice"])
     {
         $sorting = $_GET["sortByPrice"];
     }else
         $sorting = "ASC";
?>
       <div class="container-catalog">
            <div class="catalog-sort">
                <p>Сортировать по: <div class="select-wrapper">
                    <form id="formSortByPrice">
                    <select id="selectByPrice" name="sortByPrice">
                        <option value="ASC" <?= ($sorting == "ASC") ? "selected" : "" ?>>Возростанию цены</option>
                        <option value="DESC" <?= ($sorting == "DESC") ?  "selected" :  "" ?>> Убыванию цены</option>
                    </select>
                    <input name="addCards" type="number" value="5" style="display:none;"/>
                    </form>
                </div></p>
            </div>
            <div class="catalog__content" id="catalog__content">
                <?
                   
                    $cards = array( 
                        'post_type' => 'room', 
                        'posts_per_page' => 2,
                        "meta_key"       => "price_num",
                        "paged" => 1,
                        "orderby"        => "meta_value_num",
                        "post_status" => "publish",
                        "order"          => $sorting 
                    );
                    if($typeObj != "")
                    {
                        
                        $cards['meta_query'] = array();
                        $cards['meta_query'][]  = array(  
                            'key' => 'typeObjectBuild',  
                            'value' => $typeObj,
                            'type' => 'string',
                            'compare' => 'LIKE'
        
                        );
                    }
                   
                    $query = new WP_Query( $cards );
                    
                    //$paged = $query->max_num_pages;
                    $max_pages = $query->max_num_pages;
                    if( $query->have_posts() ){
                    
                        while ( $query->have_posts() )
                        {
                            $query->the_post();
                            get_template_part( 'blocks/tpl_card',null, $post );
                        }
                    

                    ?>
            </div>

                <button 
                data-max_pages="<?= $max_pages ?>"  
                data-paged=<?= json_encode($query->query_vars); ?>   
                data-tpl="card" 
                class="ofc__button" id="btnAddCards" type="button">Смотреть все</button> 

                <?php
                    
                    }else
                    {
                        $cards['meta_query'] = [];
                  
                        $query->query_vars['meta_query'] = [];
                        ?> 
                             <h1 class="offers_card"
                            data-max_pages="<?= $max_pages ?>"  
                            data-paged=<?= json_encode($query->query_vars); ?>   
                            data-tpl="card" 
                            id="nothind_data_card"
                            > Отсутствуют </h1>
                        <?
                    }
         
                    wp_reset_postdata();     
                ?>
       </div>
       <? get_template_part( 'blocks/corners/corner_underPage_#F4F6FB' );  ?>
</section>

<section class="best__offers_back">
    <?php 

            $cards = get_field('slider-cards');
            $args = ['slider' => $cards, 'name' => 'sell','color'=>'black'];
            
            if($cards) 
                get_template_part( 'blocks/block_with_slider',null, $args );
          wp_reset_postdata();  
          get_template_part( 'blocks/corners/corner_underPage_White' ); 
    ?>
</section>
<section class="back__veryBrightMarble our__services objections_onSale">
        <?php
            $our_service = get_field('about_us');
            if($our_service):
        ?>
        <div class="info-content">
            <?php 
                foreach($our_service as $item):
            ?>
            <div class="info-content-card frist">
                <div class="info__wrapper-content-frist">
                    <img src="<? echo $item['image']?>" alt="room" />
                    <div class="info-rectangle-border info-rect1">
                        
                    </div>
                </div>
                <div class="info-content-frist-text">
                    <h1> <?echo $item['name'] ?><br>
                    <img class="info-img_under_h1" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                    </h1>
                    <div class="info__wrapper-content-frist">
                        
                        <div class="info-content-first-paragraph read_more_content">
                            <svg class="border__paragraph" width="100%" height="100%"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect  x="0" y="0" width="100%" height="100%" rx="9.5" stroke="url(#paint0_linear_7_956)"/>
                                <defs>
                                <linearGradient id="paint0_linear_7_956" x1="0" y1="0" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#DBC67F"/>
                                <stop offset="1" stop-color="#DBC67F" stop-opacity="0"/>
                                </linearGradient>
                                
                                </defs>
                                
                            </svg>
                            <p class="read_more_text"><? echo $item['text'] ?></p>
                            <button class="readContinue" onclick="read_more(this);">Читать далее...</button>
                        </div>
                       
                    </div>
                </div>
            </div >
            <?endforeach;?>
           
        </div>
       <? endif;?>
        <?  get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?> 
</section>
<?php
get_footer();
?>

<script type="text/javascript">
function read_more(button)
{
  
  const parent = button.parentElement;
  const svg = parent.querySelector('svg');
  const p = parent.querySelector('p');
  parent.style = "position: relative; padding-bottom: 2rem; padding-left:0;";
  svg.style = "height:100%; margin-left:-2rem;";
  p.classList.toggle('withot-after-elem');
  p.style = "height:100%;    padding-right: 0rem; padding-bottom: 2rem;";
  button.remove();

}
</script>