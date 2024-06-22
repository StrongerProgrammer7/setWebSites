<section class="info best__offers">
    <?php
        $blog_description = get_field('about_us');
        if($blog_description):
    ?>
    <div class="info-content">
        <?php
            foreach($blog_description as $item):
        ?>
        <div class="info-content-card">
            <div class="info__wrapper-content-frist">
                <img src="<?php echo $item['image']?>" alt="room" />
                <div class="info-rectangle-border info-rect1">

                </div>
            </div>
            <div class="info-content-frist-text">
                <h1> <?php echo $item['name']?><br>
                    <img class="info-img_under_h1" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
                </h1>
                <!-- <div class="info__wrapper-content-frist"> -->

                    <p class="info-content-first-paragraph">
                   
                        <? 
                            if(isset($args['color'])){
                        ?>
                            <svg class="border__paragraph" width="100%" height="100%" viewBox="" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0" y="0" width="100%" height="100%" rx="9.5" stroke="url(#paint0_linear_53_5448)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_53_5448" x1="0" y1="0" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2C5352"/>
                                    <stop offset="1" stop-color="#2C5352" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                            </svg>

                        <? }else { ?>
                            <svg class="border__paragraph" width="100%" height="100%" viewBox="" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0" y="0" width="100%" height="100%" rx="9.5" stroke="url(#paint0_linear_44_12044)" />
                            <defs>
                                <linearGradient id="paint0_linear_44_12044" x1="0" y1="0" x2="100%" y2="0%" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#ECCE00" />
                                    <stop offset="1" stop-color="#ECCE00" stop-opacity="0" />
                                </linearGradient>

                            </defs>

                        </svg>

                            <?}?>
                        <?php echo $item['text']?>
                    </p>

                <!-- </div> -->
            </div>
        </div>
        <?endforeach;?>
       
    </div>
    <?endif;?>
    <?php get_template_part( 'blocks/corners/corner_underPage_White' );  ?>
</section>