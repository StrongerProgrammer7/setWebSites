<section class="questions">
        <div class="container2 blueColorBack_questions">
             <div class="questions__content">
                <h1>
                    <svg width="53" height="1" viewBox="0 0 53 1" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="0.170166" width="52.0804" height="1" fill="white"/></svg>
                     <? echo $args['title'];?>
                </h1>
                    <p><? echo $args['text'];?></p>
                <form class="questions_form" id="questions_form" method="POST">
                    <!-- <input type="text" placeholder="Ваше имя*" class="questions__form-input" name="user_name" id="questions_nameInput" required/>
                    <input type="email" placeholder="Адрес почты" class="questions__form-input" name="user_email" id="questions_emailInput"/>
                    <input type="tel" placeholder="Номер телефона*" class="questions__form-input" name="user_phone" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" id="questions_phoneInput" required/>
                    <div class="request__form-checkbox questions__form-checkbox">
                        
                        <div class="wrapper__copyright">
                            <div class="wrapper_custom_checkbox">
                            <input type="checkbox" class="rf-checkbox"  id="questions__form-checkbox" value="1"/>
                            <label for="questions__form-checkbox"></label>
                        
                        </div>
                      
                        <span id="COPYRIGHT_TEXT">  </span>
                        </div>
                      <button type="submit" class="btn_request_form">Отправить</button>
                    </div> -->
                    <?php echo do_shortcode('[contact-form-7 id="d96177b" title="Контактная форма Имя_Телефон_Почта"]') ?>
                </form>
                
             </div>
        </div>
</section>