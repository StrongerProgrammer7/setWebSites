<?php
// Template Name: Blog page
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
          
            <div style='' class="monumental__right-content sell_face_right-content">
                <img src="<?php echo $headAboutCompany['background']?>" alt="background" /> 
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
<section class="back__veryBrightMarble our__services objections_onSale">
       <?php
       $my_posts = get_posts( array(
        'numberposts' => -1,
        'category_name'    => "cards_article",
        'orderby'     => 'date',
        'order'       => 'ASC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );
        
    global $post;
    if($my_posts):
       ?>
        <div class="container-catalog">
            <div class="page_blog_cards">
                <?php
                

                foreach( $my_posts as $post ){
                    setup_postdata( $post );
                ?>

                <div class="page_blog_card">
                    <img src="<?echo the_field('image')?>" alt="image" />
                    <div class="page_blog_cardWrapperBorder">
                        <div class="page_blog_card-data">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.7188 2.75H10.3125V1.22656C10.3125 1.05078 10.1367 0.875 9.96094 0.875H8.78906C8.58398 0.875 8.4375 1.05078 8.4375 1.22656V2.75H4.6875V1.22656C4.6875 1.05078 4.51172 0.875 4.33594 0.875H3.16406C2.95898 0.875 2.8125 1.05078 2.8125 1.22656V2.75H1.40625C0.615234 2.75 0 3.39453 0 4.15625V14.4688C0 15.2598 0.615234 15.875 1.40625 15.875H11.7188C12.4805 15.875 13.125 15.2598 13.125 14.4688V4.15625C13.125 3.39453 12.4805 2.75 11.7188 2.75ZM11.543 14.4688H1.58203C1.46484 14.4688 1.40625 14.4102 1.40625 14.293V5.5625H11.7188V14.293C11.7188 14.4102 11.6309 14.4688 11.543 14.4688Z" fill="#ECCE00"/>
                            </svg>

                                
                            <span><? echo the_field('date')?></span>
                        </div>
                        <div>
                            <h1><?echo the_field('title')?></h1>
                            <p><?echo the_field('text')?> </p>
                            <a href="<?php the_field('link')?>"><button>Подробнее</button></a>
                        </div>
                    </div>
                </div>
<?php
                }

                wp_reset_postdata(); // сброс
                   
                ?>
                
             
              
            </div>
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