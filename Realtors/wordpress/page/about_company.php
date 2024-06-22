<?php
// Template Name: About company page
get_header();
?>
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
                                <a style="cursor:pointer;" href="<?php echo $elem['link'] ?>">
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