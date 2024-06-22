<?php
// Template Name: Article page

// Template Post Type: post, pages
$imgManager = get_field('imgManagerTotal','option');
get_header();
?>
<div class="call_manager manage_fixed" onclick="showModal()">
<img src="<?= $imgManager ?> " alt="icon"/></div>
<section class="monumental__group">
        <?php
            ?>
        <div class="monumental__group-content h-auto">
            <div class="about__company_left-content monumental__left-content back_black">
                <div class="sell_face-left-content">
                    <p>
                    <a  href="https://rieltors.dev.agrachoff.ru/?page_id=2"> Главная</a> / <a href="#!"> Статья </a>
                    </p>
                    <?php echo the_field('title')?> 
                 
                </div>
               
            </div>
          
            <div style='' class="monumental__right-content sell_face_right-content">
                <img src="<?php echo get_template_directory_uri( )?>/assets/img/page_blog/background.png" alt="background" /> 
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

        </div>
        <?php endif; ?>
       <? get_template_part( 'blocks/corners/corner_underPage_White' );  ?>
</section>
<section class="back__veryBrightMarble our__services objections_onSale">
        <div class="mb-5rem container-catalog">
            <div class="info-content">
                <div class="info-content-card frist">
                    <div class="info__wrapper-content-frist article_content">
                        <img src=" <?php echo the_field('image')?> " alt="room" />
                        <div class="page_acticle-content-left-border info-rectangle-border">
                            
                        </div>
                    </div>
                    <div class="page_articleContentRight info-content-frist-text">
                        
                        </h1>
                        <div class=" pAC_info info__wrapper-content-frist">
                            <p class=" info-content-first-paragraph">
                                <svg class=" width-90per border__paragraph" width="100%" height="100%"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect  x="0" y="0" width="100%" height="100%" rx="9.5" stroke="url(#paint0_linear_7_956)"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_7_956" x1="0" y1="0" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#DBC67F"/>
                                    <stop offset="1" stop-color="#DBC67F" stop-opacity="0"/>
                                    </linearGradient>
                                    
                                    </defs>
                                    
                                </svg>
                                <?php echo the_field('text')?> 
                               <!-- <p class="pAC_info_text">
                                    <?php //echo the_field('text')?> 
                               </p> -->
                            </p>
         
                        </div>
                    </div>
                </div >
            </div>
        </div>
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