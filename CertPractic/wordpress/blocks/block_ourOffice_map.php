
<? 
    $section_map = get_field('our_office','option');
    if($section_map):
        $text = $section_map['text'];
?>
    <section class="address_map">
        <div class="total_control-background">
        <div class="container-total">
            <div class="info_and_form">
                <div class="our_office" id="our_office">
                    <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/address.svg" alt="icon" />
                    <p >Наши офисы</p>
                    <?   
                        $ourOfficeAddress = get_field('ourOfficeAddress','option');
                        if($ourOfficeAddress):
                    ?>
                    <div class="addresses_block" id="address_block">
                            <? foreach($ourOfficeAddress as $address): ?>
                        <div class="addresses" id="ourOfficeSetCenter">
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/address_black.svg" alt="icon" />
                            <p id="ourOfficeaddressName"><? echo $address['address']?>
                                <span class="coordiante_address"><? echo $address['coordinate']?></span>
                            </p>
                            
                         </div>
                         <? endforeach; ?>
                        
                    </div>
                    <? endif;?>
                </div>
                <? 
                if($text):
                ?>
                     <h3>Мы всегда рады помочь и ответить на все интересующие вас вопросы</h3>
                <? endif;?>
                 <form method="POST" class="our_office_form">
                    <!-- <input type="tel" name="user_phone" placeholder="Ваш телефон" />
                    <button class="btn__order">Позвонить вам</button> -->
                    <?php echo do_shortcode('[contact-form-7 id="956321f" title="Контактная форма-номер"]') ?>
                 </form>
                 
                 
            </div>
        </div>
        <div id="mymap" class="page_contacts_info-map">
 
            <div class="overlayMap" id="overlayMap">

            </div>    
        </div>

     </div>
        
     <? get_template_part( 'blocks/down_block_angels/angleLeftSoftWhite' );  ?>
    </section>
    <?endif;?>