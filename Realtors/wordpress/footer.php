<?php
    $extra_title_link = get_field('set_extra_links','option');
?>
<footer class="footer">
        <a class="head__logo footer-logo" style='background: url(" <?php the_field('logo','option')?>") no-repeat center center / cover;' <?if (is_front_page()) 
                            echo "onclick='showModal()'" ;
                        else 
                            echo "href=".home_url(); ?>></a>
        <div class="footer-content">
            <div class="footer-content-first">
                <h1><a href="<?=$extra_title_link[0]['link']?>"><? echo $extra_title_link[0]['title']?></a></h1>
                <ul class="menu__ul">
                    <?php
                         $menu_link = get_field('menu_link','option');
                         if($menu_link):
                            $subMenu = $menu_link['submenu'][0]; 
                            
                    ?>
                    <li class="link__submenu" id="link__submenu_footer">
                       <a class="">
                            <span class="submenu__footer" id="link_submenu_span_footer">
                                <img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" /> <? echo $subMenu['title']?> 
                            </span>
                       </a>
                        <ul class="submenu" id="submenu_footer">
                                <? $subMenu_links = $subMenu['links'];
                                    if($subMenu_links):
                                        
                                        foreach($subMenu_links as $subLinks):
                                ?>
                                <li class="submenu__titles" id="submenu__titles_footer" >
                                <span  id="submenu_span_footer"> <a href="<? echo $subLinks['link_by_title'] ?>"><? echo $subLinks['name'] ?><div class="submenu_arrow" ></div></a> </span>

                                    <ul class="submenu_links" id="submenu_links_footer" >
                                        <? 
                                            $sub_links = $subLinks['sub_link'];
                                            if($sub_links):
                                            foreach($sub_links as $link):
                                        ?>
                                        <li id="sub_li_links_footer">
                                            <a href="<? echo $link['link']?>?typeObjectSelect=<?echo $link['name_link']?>" id="sub_li_a_links"> <?echo $link['name_link']?></a>
                                            
                                        </li>
                                                <?endforeach;?>
                                            <? endif;?>
                                    </ul>
                                </li>
                               <?endforeach;endif;?>
                            </ul> 
                    </li>
                    <!-- <li class="link__submenu" id="link__submenu">
                                <a class="link_for_submenu">
                                   <span id="link_submenu_span">
                                   <?// echo $subMenu['title'] ?> 
                                    
                                   </span>
                                </a>
                           
                        </li> -->
                    <? foreach($menu_link['links'] as $link): ?>
                    <li>
                        <a  href="<? echo $link['link'] ?>"><img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" /> <? echo $link['name']?>
                    </li>
                    <?php endforeach;
                        endif;
                    ?>
                    
                </ul>
            </div>
            <div class="footer-content-first">
                <h1><a href="<?=$extra_title_link[1]['link']?>"><? echo $extra_title_link[1]['title']?></a></h1>
                <ul class="menu__ul">
                <?php
                         $links_rent = get_field('linksRent','option');
                         $linkRent = $links_rent['link_rent'];
                         $filters = $links_rent['filters'];
                         if($links_rent):
                             foreach($filters as $filter):
                    ?>
                    <li>
                        <a href="<? echo $linkRent ?>?typeObjectSelect=<?echo $filter['filter'] ?>"><img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" /><? echo $filter['filter']?>
                      </li>
                      <?php endforeach;endif;?>
                      
                </ul>
            </div>
            <div class="footer-content-first">
                <h1><a href="<?=$extra_title_link[2]['link']?>"><? echo $extra_title_link[2]['title']?></a></h1>
                <ul class="menu__ul">
                <?php
                         $links_rent = get_field('linksSell','option');
                         $linkRent = $links_rent['link_sell'];
                         $filters = $links_rent['filters'];
                         if($links_rent):
                             foreach($filters as $filter):
                    ?>
                    <li>
                        <a href="<? echo $linkRent ?>?typeObjectSelect=<?echo $filter['filter'] ?>"><img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" /><? echo $filter['filter']?>
                      </li>
                      <?php endforeach;endif;?>
                    
                </ul>
            </div>
            <div class="footer-content-first">
                <h1 class="footer__name"><a href="<?=$extra_title_link[3]['link']?>"><? echo $extra_title_link[3]['title']?></a></h1>
                
                <?php  $phone = get_field('phone','option');
                            if($phone):?>
                <a href="tel:<?php echo preg_replace('/[ -]*/', '', $phone) ?>" ><p class="footer_phone"> <?php echo $phone ?> </p></a> <?endif;?>
                <div class="footer__contacts">
                <?php
                    $messanger = get_field('social_gold', 'option');
                    if ($messanger):
                    ?>
                            <?php
                            foreach ($messanger as $elem) :
                            ?>
                                <a href="<?php echo $elem['link'] ?>">
                                    <img class="slider__contact" src="<?php echo $elem['icon'] ?>" alt="whatsapp" />
                                </a>
                            <?php
                            endforeach;
                            ?>
                    <?php endif; ?>
                </div>
                <div class="head__information-address footer__address">
                    <svg class="svg__address" xmlns="http://www.w3.org/2000/svg" width="17" height="22" viewBox="0 0 17 22" fill="none">
                        <path d="M1.47794 5.86607C2.5545 3.022 5.30049 1 8.52039 1C12.677 1 16.0465 4.37056 16.0465 8.52679C16.0465 11.8636 11.1949 18.2478 9.28213 20.6348C9.19053 20.7488 9.07453 20.8408 8.94267 20.904C8.8108 20.9672 8.66644 21 8.52022 21C8.37399 21 8.22963 20.9672 8.09777 20.904C7.96591 20.8408 7.8499 20.7488 7.7583 20.6348C5.88428 18.2964 1.18976 12.1215 1 8.73374" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M5.06934 8.52412C5.07538 7.61499 5.44096 6.74519 6.08623 6.10474" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M7.25733 5.33782C7.88375 5.09165 8.56846 5.03397 9.22723 5.17187C9.88601 5.30976 10.4901 5.63722 10.9652 6.11396C11.4403 6.5907 11.7657 7.19592 11.9013 7.85517C12.0369 8.51441 11.9768 9.19892 11.7285 9.82448C11.4802 10.45 11.0544 10.9894 10.5035 11.3761C9.95269 11.7628 9.30081 11.9801 8.62809 12.0012C7.95537 12.0223 7.29116 11.8462 6.71718 11.4948C6.1432 11.1433 5.68448 10.6317 5.39746 10.0229" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                    </svg>
                    <?php 
                                $address = get_field('address','option');
                                if($address):
                            ?>
                            <p><a href="<?=$extra_title_link[3]['link']?>" ><?php echo $address ?> </a></p> 
                            <?endif;?>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <a href="https://rieltors.dev.agrachoff.ru/sample-page/politika-konfidencialnosti">Соглашение об использовании персональных данных</a>
            <a href="https://rieltors.dev.agrachoff.ru/sample-page/politika-konfidencialnosti">© 2023 Все права защищены</a>
        </div>
    </footer>


    <div class="block_modal" id="modal">
        <div class="border" id="modal_border">
            <div class="modal_X" id="modal_close" onclick="showModal()"> </div>
            <div class="modal-content">
                <div class="modal_name">
                    <h1>продать/сдать</h1>
                    <h1>недвижимость</h1>
                    <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/svg_ourServices.png" alt="vector" />
                </div>
                <p>Оставьте заявку и наши менеджеры свяжутся с вами в ближайшее время</p>
                <form class="modal_form" name="form_call" id="modal_form" method="post">
                    <!-- <input class="modal_form_input_withImg " type="text" name="name"  placeholder="Ваше имя" required/>
                    <input class="ml-auto call_input input_phone" type="tel" name="phone" placeholder="+7 (_ _ _) _ _ _ - _ _  - _ _" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" required/>
                    <div class="modal_wrapper_icon_input">
                        <div class="modal_wrapper__select-form_typeObject">
                            <select class="modal_typeObject" id="modal_typeService" name="modal_typeService"> 
                                <option>Тип услуги</option> 
                                <option >Дом</option> 
                                <option>Квартира</option> 
                                <option>Подвал</option> 
                                <option>Клетка</option> 
                            </select>
                        </div>
                     </div>
                    <div class="modal_wrapper_icon_input">
                        <div class="modal_wrapper__select-form_typeObject">
                            <select class="modal_typeObject" id="modal_typeObject" name="modal_typeObject"> 
                                <option>Тип объекта</option> 
                                <option >Дом</option> 
                                <option>Квартира</option> 
                                <option>Подвал</option> 
                                <option>Клетка</option> 
                            </select>
                        </div>
                     </div>
                     <input class="modal_input" type="text" name="address" placeholder="Введите адрес" required/>
                     <div class="modal_form_blocks_inputs">
                        <input class="modal_input" type="text" name="square"  placeholder="Площадь" required/>
                        <input class="modal_input" type="text" name="countRoom"placeholder="Кол. комнат" required/>
                     </div>
                     <div class="modal_form_personalInfo">
                        <input type="checkbox" class="checkbox-round" name="policy" id="policy"  required/>
                        <p>Принимаю <u>условия обработки</u> персональных данных</p>
                     </div>
                    <div class="modal_form_block_btn">
                        <button class="modal_form_btn">Оставить заявку</button>
                    </div> -->
                    <?php echo do_shortcode('[contact-form-7 id="29c1e8c" title="Контактная форма модального окна"]') ?>
                </form>
               
            </div>
            <div class="modal_X" id="modal_close_bottom" onclick="showModal()"> </div>
        </div>
    </div>


    <div class="burger">
        <span></span>
    </div>
    <div class="menu" id="burger_menu">
        
            <a class="head__logo" 
                <?
                if (is_front_page()) 
                echo "onclick='showModal()'" ;
            else 
                echo "href=".home_url(); ?>>
                <div class="head__logo_menuMobail" style='background: url(" <?php the_field('logo','option')?>") no-repeat center center / cover;'>
                </div>
        </a>
      
        <nav class="head__menu">
            <ul class="menu__ul">
            <?php
                            $menu_link = get_field('menu_link','option');
                            if($menu_link):
                                foreach($menu_link['links'] as $link):
                        ?>
                        <li>
                          <a href="<? echo $link['link']?>"><img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/links.png" alt="links" /><? echo $link['name'] ?> 
                            <img class ="links__hover__img-right" src="<?php echo get_template_directory_uri( ) ?>/assets/img/links.png" alt="links" /></a>
                          
                        </li>
                    <?php 
                        endforeach;
                        endif;
                    ?>
               
            </ul>
        </nav>
        <div class="head__information">
            <div class="head__information-address">
                <svg class="svg__address" xmlns="http://www.w3.org/2000/svg" width="17" height="22" viewBox="0 0 17 22" fill="none">
                    <path d="M1.47794 5.86607C2.5545 3.022 5.30049 1 8.52039 1C12.677 1 16.0465 4.37056 16.0465 8.52679C16.0465 11.8636 11.1949 18.2478 9.28213 20.6348C9.19053 20.7488 9.07453 20.8408 8.94267 20.904C8.8108 20.9672 8.66644 21 8.52022 21C8.37399 21 8.22963 20.9672 8.09777 20.904C7.96591 20.8408 7.8499 20.7488 7.7583 20.6348C5.88428 18.2964 1.18976 12.1215 1 8.73374" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path d="M5.06934 8.52412C5.07538 7.61499 5.44096 6.74519 6.08623 6.10474" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                    <path d="M7.25733 5.33782C7.88375 5.09165 8.56846 5.03397 9.22723 5.17187C9.88601 5.30976 10.4901 5.63722 10.9652 6.11396C11.4403 6.5907 11.7657 7.19592 11.9013 7.85517C12.0369 8.51441 11.9768 9.19892 11.7285 9.82448C11.4802 10.45 11.0544 10.9894 10.5035 11.3761C9.95269 11.7628 9.30081 11.9801 8.62809 12.0012C7.95537 12.0223 7.29116 11.8462 6.71718 11.4948C6.1432 11.1433 5.68448 10.6317 5.39746 10.0229" stroke="#DBC67F" stroke-miterlimit="10" stroke-linecap="round"/>
                </svg>
                <?php 
                                $address = get_field('address','option');
                                if($address):
                            ?>
                            <p><?php echo $address ?></p> 
                            <?endif;?>
            </div>
            <div class="head__information-phone">
            <?php  $phone = get_field('phone','option');
                            if($phone):?>
                <a href="tel:<?php echo preg_replace('/[ -]*/', '', $phone) ?>" ><p class="footer_phone"> <?php echo $phone ?> </p></a> <?endif;?>
                <svg class="svg__phone" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.2178 13.9244C11.4978 16.44 13.56 18.5022 16.0756 19.7822L18.0311 17.8267C18.28 17.5778 18.6267 17.5067 18.9378 17.6044C19.9333 17.9333 21 18.1111 22.1111 18.1111C22.3469 18.1111 22.573 18.2048 22.7397 18.3715C22.9064 18.5382 23 18.7643 23 19V22.1111C23 22.3469 22.9064 22.573 22.7397 22.7397C22.573 22.9064 22.3469 23 22.1111 23C18.1034 23 14.2598 21.4079 11.4259 18.5741C8.59206 15.7402 7 11.8966 7 7.88889C7 7.65314 7.09365 7.42705 7.26035 7.26035C7.42705 7.09365 7.65314 7 7.88889 7H11C11.2357 7 11.4618 7.09365 11.6285 7.26035C11.7952 7.42705 11.8889 7.65314 11.8889 7.88889C11.8889 9 12.0667 10.0667 12.3956 11.0622C12.4933 11.3733 12.4222 11.72 12.1733 11.9689L10.2178 13.9244Z" fill="#DBC67F"/>
                    <circle cx="15" cy="15" r="14.5" stroke="#DBC67F"/>
                </svg>
                    
        </div>
        </div>
       
    </div>
    <?php wp_footer(  ); ?>
</body>
</html>