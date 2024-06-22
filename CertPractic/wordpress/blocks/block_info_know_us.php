    <?
        $section = get_field('block_form_text','option');
        if($section):
            $title = $section['title'];
            $text = $section['text'];
            $img_down = $section['img_down'];
    ?>
    
    <section class="info know_us">
        <div class="info_background_linear">
            <div class="container-total">
                <div class="know_us-form">
                    <form class="form_call_us" method="POST">
                        <!-- <p>
                            Укажите контакты, мы уточним детали вашей ситуации, дадим оценку и расскажем, как вам получить документы быстрее
                        </p>
                        <input type="text" class="user_nameForm" name="user_name" placeholder="Ваше имя" required/>
                        <input type="tel" class="user_phoneForm" name="user_phone" placeholder="+7 (_ _ _) _ _ _ - _ _ - _ _" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" required/>
                        <div class="modal_form_personalInfo">
                            <input type="checkbox" class="checkbox-round" name="policy" id="policy"  required/>
                            <a href="http://www.certpraktik.dev.agrachoff.ru/sample-page/politika-konfidencialnosti/">Принимаю <u>условия обработки</u> персональных данных</a>
                         </div> -->
                         <?php echo do_shortcode('[contact-form-7 id="591568f" title="Contact form 1"]') ?>
                    </form>
                    
                    <?
                        $messanges = get_field('messangers','option');
                        if($messanges):
                    ?>
                    <div class="wrapper_footer_messangers">
                        <p>
                            Или напишите в удобный мессенджер
                        </p>
                        <div class="footer_messanger">
                            <?
                                foreach($messanges as $messanger):
                            ?>
                        <a href="<? echo $messanger['link'] ?>" class="wrapper_messanger">
                                <img src="<? echo $messanger['img'] ?>" alt="icon"/>
                                <p><? echo $messanger['name']?></p>
                        </a>
                        <?endforeach;?>
                        
                        </div>
                    </div>
                    <?endif;?>
                </div>
                <div class="know_us-content">
                    <div class="info__title tc_content-title">
                        <h1><?php echo $title ?> 
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word_white.png" alt="line" />
                        </h1> 
                    </div>
                    <?php if($text):?>
                    <div class="info__title_text tc_content-text">
                        <p><? echo $text ?> </p>
                    </div>
                    <?php endif;?>
                    
                </div>
            </div>
        </div>
        <? if($img_down): ?>
        <img class="books" src="<? echo $img_down ?>" alt="img" />
        <? endif;?>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
    <? endif;?>