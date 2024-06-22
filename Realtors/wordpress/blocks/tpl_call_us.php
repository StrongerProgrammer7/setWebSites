
    <?php 
        $call_us = get_field('realise_home','option');
        if($call_us):
    ?>
    <div class="monumental__group-content call_us-content">
        <div class="monumental__left-content">
            <div class="monumental__left-text call_us-text">
                <h1><? echo $call_us['name']?></h1>
                <p><? echo $call_us['description']?></p>
                <!-- <form class="from_call_us" id="from_call_us">
                    <input class="call_input input_name" type="text" name="name" placeholder="Ваше имя" required />
                    <input class="call_input input_phone" type="tel" name="phone" placeholder="+7 (_ _ _) _ _ _ - _ _  - _ _" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" required />
                    <button class="slider__btn-buy call_us-btn mt-2-31rem" id="btn_rent_call_us" onclick="getSubmitValueBtn(this);">Сдать в аренду</button>
                    <button class="slider__btn-buy call_us-btn_2 mt-2-31rem" id="btn_sell_call_us" onclick="getSubmitValueBtn(this);">Продать</button>
                </form> -->
                <?php echo do_shortcode('[contact-form-7 id="55bb635" title="Форма для блока РЕАЛИЗУЙТЕ СВОЮ НЕДВИЖИМОСТЬ"]') ?>
             
            </div>
        </div>
        <div class="monumental__right-content">
            <img class="back_with_man" src="<? echo $call_us['background']?>" alt="background">
                <img class="man" src="<? echo $call_us['man'] ?>" alt="man" />
                <div class="block_withInfoAboutMan">
                    <h1 class="goldColor"><? echo  $call_us['surnameName']?></h1>
                    <p>
                        <? echo $call_us['description_man'] ?><br>
                        <span class="goldColor"><? echo $call_us['golden_text'] ?></span>
                    </p>
                </div>
        </div>
    </div>
    <?endif;?>
