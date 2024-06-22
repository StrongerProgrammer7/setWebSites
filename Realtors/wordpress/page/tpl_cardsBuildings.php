<?php
// Template Name: Card's buildings page
get_header();
?>
<div class="call_manager manage_fixed" onclick="showModal()"></div>
<section class="section__face" id="section__face">
        <div class="swiper sample-slider">
            <div class="swiper-wrapper">
                <div class=" swiper-slide ">
                        <div class=" about_room_slider-left__text slider__left__text">
                           <div class="about_room-slt-elems slider__left-elements">
                                <p class="slider__text-name">ЖК Дом на Саввинской набережной
                                </p>
                                    <p class="slider__text-price">Саввинская набережная, 9</p>
                                 
                                    <div class="about__room-slte-choose slider__text-choose">
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/building.svg" alt="rooms" />
                                            <p class="text_object">Тип объекта: Квартира</p>
                                        </div>
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/room.png" alt="rooms" />
                                            <p class="text_object">Площадь: 160 м²</p>
                                        </div>
                                        <div class="text__choose-object">
                                            <img class="img_object" src="<?php echo get_template_directory_uri( )?>/assets/img/page_AboutRoom/svg/bed.png" alt="rooms" />
                                            <p class="text_object">Количество спален: 2</p>
                                        </div>
                                    </div> 
                                    <p  class="mt-3rem rentRoom_night">
                                        от <span>2000р/</span>ночь
                                    </p>
                                    <button class="mt-2rem slider__btn-buy rentRoomFontBtn card-btn" onclick="showModal()">Получить консультацию</button>
                           </div>
                        </div>
                        <div  style='background: url(" <?php echo $slide['image_slide']?>") no-repeat center center / cover;' class="slider__right-img">
                                <?php
                            $messanger = get_field('social', 'option');
                            if ($messanger):
                            ?>
                                <div class="slider__contacts">
                                    <?php
                                    foreach ($messanger as $elem) :
                                    ?>
                                        <a href="<?php echo $elem['link'] ?>">
                                            <img class="slider__contact" src="<?php echo $elem['icon'] ?>" alt="whatsapp" />
                                        </a>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            <?php endif; ?>
                </div>
                           
                        </div>
                       
               
                </div>
                
            </div>
             
            <div class="swiper-pagination"></div>

        </div>
        <? get_template_part( 'blocks/corners/corner_underPage_White' ); ?> ?>
</section>
<section class="back__veryBrightMarble catalog">
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">
                <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/our_services.png" alt="our__services" />

                <h1 class="our__services-name offers__name">Ключевые характеристики
                </h1>
                <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/our_services.png" alt="our__services" /><br>
            </div>
        </div>
        <div class="container-catalog">
                <div class="keyCharacter_rows">
                    <div class="keyCharacter_column">
                    <h3>Кровати</h3>
                    <ul>
                        <li> <img src="./assets/img/page_AboutRoom/svg/ul1lii1.svg" alt="icon" /><p>Две односпальные или большая двуспальная кровать</p></li>
                    </ul>
                    <h3>Мебель</h3>
                    <ul>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li1.svg" alt="icon" /><p>Барная стойка</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li2.svg" alt="icon" /><p>Зеркало</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li3.svg" alt="icon" /><p>Кресло</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li4.svg" alt="icon" /><p>Мебельный гарнитур</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li5.svg" alt="icon" /><p>Раскладное кресло</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li6.svg" alt="icon" /><p>Стул</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li7.svg" alt="icon" /><p>Шкаф для одежды</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul2li8.svg" alt="icon" /><p>Шкаф-купе</p></li>
                    </ul>
                    <h3>Электроника</h3>
                    <ul>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li1.svg" alt="icon" /><p>Кофемашина</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li2.svg" alt="icon" /><p>Микроволновая печь</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li3.svg" alt="icon" /><p>Плита для приготовления пищи</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li4.svg" alt="icon" /><p>Светильник</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li4.svg" alt="icon" /><p>Утюг</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li5.svg" alt="icon" /><p>Фен</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li6.svg" alt="icon" /><p>Холодильник</p></li>
                        <li><img src="./assets/img/page_AboutRoom/svg/ul3li7.svg" alt="icon" /><p>Электронные замки</p></li>
                    </ul>
                    </div>
                    <div class="keyCharacter_column">
                        <h3>Видео/аудио</h3>
                        <ul>
                            <li> <img src="./assets/img/page_AboutRoom/svg/col2/ul1li1.svg" alt="icon" /><p>Кабельное телевидение</p></li>
                            <li> <img src="./assets/img/page_AboutRoom/svg/col2/ul1li2.svg" alt="icon" /><p>Цифровое ТВ</p></li>
                            <li> <img src="./assets/img/page_AboutRoom/svg/col2/ul1li3.svg" alt="icon" /><p>Телевизор с плоским экраном</p></li>
                        </ul>
                        <h3>Интернет/телефония</h3>
                        <ul>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul2li1.svg" alt="icon" /><p>Wi-FI</p></li>
                        </ul>
                        <h3>Ванная комната</h3>
                        <ul>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li1.svg" alt="icon" /><p>Ванна</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li2.svg" alt="icon" /><p>Ванная комната</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li3.svg" alt="icon" /><p>Водонагреватель</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li4.svg" alt="icon" /><p>Косметические средства</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li4.svg" alt="icon" /><p>Туалет</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li5.svg" alt="icon" /><p>Туалетные средства</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col2/ul3li6.svg" alt="icon" /><p>Унитаз</p></li>
                        </ul>
                    </div>
                    <div class="keyCharacter_column">
                        <h3>Внешняя территория и вид из окна</h3>
                        <ul>
                            <li> <img src="./assets/img/page_AboutRoom/svg/col3/ul1li1.svg" alt="icon" /><p>Вид во двор</p></li>
                        </ul>
                        <h3>Прочее</h3>
                        <ul>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li1.svg" alt="icon" /><p>Гладильная доска</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li2.svg" alt="icon" /><p>Кухонная посуда</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li3.svg" alt="icon" /><p>Кухонный уголок</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li4.svg" alt="icon" /><p>Ламинат</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li4.svg" alt="icon" /><p>Мини-кухня</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li5.svg" alt="icon" /><p>Набор посуды</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Номер для некурящих</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Отопление</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Стаканы</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Стиральная машина</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Столовые приборы</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Сушилка для белья</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Чайник</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Чайный набор</p></li>
                            <li><img src="./assets/img/page_AboutRoom/svg/col3/ul2li6.svg" alt="icon" /><p>Онлайн-регистрация до заезда</p></li>
                        </ul>
                    </div>
             </div>

        </div>
        <?  get_template_part( 'blocks/corners/corner_underPage_SoftWhite' ); ?>?>
</section>
<section class="mb-0 best__offers ">
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">
                <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/our_services.png" alt="our__services" />

                <h1 class="our__services-name offers__name">О квартире
                </h1>
                <img class= "servieces__intro-rightImg" src="<?php echo get_template_directory_uri( )?>/assets/img/our_services.png" alt="our__services" /><br>
            </div>
        </div>
        <div class="about__room">
            <div class="about_room-content">
                <h3>Квартира в аренду, 3-комнатная, Дом на Саввинской набережной, Саввинская набережная, 9, ID 44940</h3>
                <p>Уютная 3-х комнатная квартира общей площадью 160 кв. м, расположенная в новом доме на Саввинской набережной. Современный авторский ремонт из натуральных материалов. Полная комплектация мебелью и техникой. Установлены кондиционеры. Функциональная планировка: просторная гостиная, кухня, 2 спальни, 2 ванные комнаты, 2 гардеробные, постирочная комната. Окна выходят на 2 стороны, высота потолков 3,2 м. Огороженная охраняемая территория, установлен домофон. Подземный паркинг. В ближайшем доступе: кафе, магазины, рестораны, бары, салоны красоты, музеи.</p>
            </div>
            <div class="about_room-map">
                <h3>На карте:</h3>
                <div id="mymap" class="page_contacts_info-map">
                    <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A053bd947d462cc1a45aeba4070defff75501905071c0eaf68436ac9976ec698c&amp;id=mymap&amp;lang=ru_RU&amp;"></script>
                </div>
            </div>
        </div>
        
        <?  get_template_part( 'blocks/corners/corner_underPage_Block' ); ?>?>
</section>
<section class="call_us">
    <? 
    get_template_part( 'blocks/tpl_call_us' );
    get_template_part( 'blocks/corners/corner_underPage_Block' ); ?>
</section>
<?php
get_footer();
?>