<?  $menu = get_field('menu','option');?>

<footer class="footer"> <a name="<? echo $menu[2]['title'] ?>"></a>
       <div class="footer__border">
       <?php
                $logo = get_field('logo','option');
                $description_logo = get_field('description_logo','option');
                $address = get_field('addres_group','option');
                $phone = get_field('phone_group_footer','option');
                $email = get_field('email','option');
                $messangers = get_field('messangers','option');
                if($logo && $address && $phone && $email):
            ?>
            <div class="container2">
                <div class="wrapper__footer">
                <div class="header__logo footer__logo" >
                   <a href="#Begin"> <img src="<? echo $logo?>" alt="logo"  /></a>
                    <p><? echo $description_logo ?></p>
                </div>
                <div class="footer__contacts">
                    <div class="footer__contacts-phone">
                        <div class="footer_phone">
                            <img src="<? echo $phone['icon'] ?>" alt="icon" />
                            <a href="tel:<? echo preg_replace('/[ -]*/', '', $phone['phone'])?>"><?echo $phone['phone'] ?><br/><span><?echo $phone['extra_info']?></span> </a>
                           
                        </div>
                        <p><? echo $address['address']?></p>
                       
                    </div>
                    <div class="footer__contacts-btnPhone">
                        <div class="contacts__adress-phone">
                            <a href="tel:<? if(!$phone['phone_2']) echo preg_replace('/[ -]*/', '', $phone['phone']);else echo preg_replace('/[ -]*/', '', $phone['phone_2']);?>"> <? if(!$phone['phone_2']) echo $phone['phone'];else echo $phone['phone_2'];?></a> 
                            <p><a href="mailto:<?echo $email?>"><?echo $email?></a></p>
                        </div>
                        <button class="btn__order" onclick="showModal();"><img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/phone-call.svg" alt="icon" />Заказать звонок</button>
                    </div>
                </div>
                </div>
           
            </div>
            <?endif;?>
       </div>
      
       <div class="copyright">
            <a>Политика конфиденциальности</a>
            <svg width="1" height="30" viewBox="0 0 1 30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="0.5" y1="30" x2="0.500001" y2="-2.18557e-08" stroke="#F5F5F5"/>
            </svg>
            <a>Политика обработки файлов cookie</a>
       </div>
    </footer>
    <div class="burger">
        <span></span>
    </div>
    <div class="menu_mobail animate2">
        <div class="main_header">
            <div class="header__logo">
                <img src="<? echo $logo ?>" alt="logo" />
            </div>
            <? $menu = get_field('menu','option');
                if($menu):?>
            <ul class="menu">
                <? foreach($menu as $link):?>
                <li><a href="#!"><? echo $link['title']?></a></li>
                <?endforeach;?>
            </ul>
            <?endif;?>
            <?

            ?>
            <div class="header__info">
                <div class="address">
                    <img src="<? echo $address['icon'] ?>" alt="icon" />
                    <p><? echo $address['address'] ?></p>
                </div>
                <? $phone = get_field('phone_group_header','option'); ?>
                <div class="phone">
                        <img src="<?echo $phone['icon']?>" alt="icon" />
                        <a href="tel:<? echo preg_replace('/[ -]*/', '', $phone['phone'])?>"><span><?echo $phone['phone']?></span><br/><?echo $phone['extra_info']?> </a>
                    </div>
                <div class="contacts">
                   <div class="contacts_row"> 
                        <? 
                            if($messangers):
                                foreach($messangers as $mes):
                        ?>
                            <a href="<?echo $mes['link']?>"> <img src="<? echo $mes['messengar']?>" alt="messanger" /></a>
                        <?endforeach; endif; ?>
                    </div>
                   
                    <div class="contacts__adress-phone">
                            <a href="tel: <? if(!$phone['phone_2']) echo preg_replace('/[ -]*/', '', $phone['phone']);else echo preg_replace('/[ -]*/', '', $phone['phone_2']);?>">
                                
                            <? if(!$phone['phone_2']) echo $phone['phone'];else echo $phone['phone_2'];?></a> 
                            <p><a href="mailto:<?echo $email?>"><?echo $email?></a></p>
                    </div>
                </div>
                <button class="btn__order"><img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/phone-call.svg" alt="icon" />Заказать звонок</button>
            </div> 
            
        </div>
        
       
    </div>

    <div class="modal" id="modal">
        <div clas="wrapper_modal">
            <h1 class="modal_title">Оставьте заявку, чтобы не терять драгоценное время и приступить к работе уже на этой неделе</h1>
            <form class="form_modal" method="POST">
                <!--<div class="wrapper_rf-inputs-label">
                    <label for="name" class="form-label">Ваше имя</label>
                    <input type="text" placeholder="Ваше имя" class="request__form-input" id="name" required/>
                </div>
                <div class="wrapper_rf-inputs-label">
                    <label for="phone" class="form-label">Ваше телефон</label>
                    <input type="tel" placeholder="+7(__) ___ - ___" class="request__form-input" id="phone" required/>
                </div>
                <a href="#!" class="modal_copyright" >Нажимая кнопку «отправить заявку», вы даете согласие на <span>обработку персональных данных</span></a>
                <button class="modal_btn" id="modal_btn">Оставить заявку</button>-->
                <?php echo do_shortcode('[contact-form-7 id="56994c3" title="Контактная форма Модальное окно"]') ?>
            </form>
        </div>
        
    </div>
    <div class="overlay" id="overlayModal"></div>


<? 
    if((isset($_GET["sendForm"]) && $_GET["sendForm"]==1))
    {
        ?>
        <div class="modal_form_success " id="modal_form_success">
            <p>Заявка успешно отправлена. </p>
            <p>Мы обязательно с вами свяжимся!</p>
        </div>
        <?
    }
?>
<script type="text/javascript" defer>
    document.addEventListener("DOMContentLoaded",()=>
    {
        console.log(document.querySelector('#COPYRIGHT_TEXT')); 
        let str =` <? echo the_field('text_copyright','option'); ?>`;
        let copyright =  document.querySelectorAll('#COPYRIGHT_TEXT');
        if(copyright)
        {   
            copyright.forEach(element => 
            {
                element.textContent = str;
            });
          
         
        }
    });
   
      
</script>
<?php wp_footer(  ); ?>
</body>
</html>