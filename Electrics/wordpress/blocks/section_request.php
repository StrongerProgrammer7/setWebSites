<section class="request">
        <div class="container2 blueColorBack_borderRadius">
            <div class="request__inner">
               <div class="wrapper__request__info">
                <div class="request__info">
                    <h2><? echo $args['description_nomore']?></h2>
                    <p><?echo $args['description'];?></p>
                </div>
               </div>
                <div class="wrapper__request__form">
                    <form class="request__form" id="form_requst" method="POST">
                        <!-- <div class="wrapper_rf-inputs">
                            <div class="wrapper_rf-inputs-label">
                                <label for="name" class="form-label">Ваше имя</label>
                                <input type="text" placeholder="Ваше имя" class="request__form-input" id="name" required/>
                            </div>
                            <div class="wrapper_rf-inputs-label">
                                <label for="phone" class="form-label">Ваше телефон</label>
                                <input type="tel" placeholder="+7(__) ___ - ___"  pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" class="request__form-input" id="phone" required/>
                            </div>
                        </div>
                         <div class="request__form-checkbox">
                             <input type="checkbox" class="rf-checkbox"  id="request__form-checkbox"  name="policy"/>
                             <label for="request__form-checkbox"></label>
                            <span id="COPYRIGHT_TEXT">  </span>
                         </div>
                         <button class="btn_request_form">Оставить заявку</button> -->
                         <?php echo do_shortcode('[contact-form-7 id="591568f" title="Контактная форма Имя_Телефон"]') ?>
                     </form>
                </div>
            </div>
        </div>
</section>
