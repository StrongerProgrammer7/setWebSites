<?php
// Template Name: Contacts page
get_header();
?>
<section class="monumental__group">
        <?php
                $headAboutCompany = get_field('our_contacts');
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
                <img src=" <?php echo $headAboutCompany['background']?>" alt="background" /> 
                <?php
                    $messanger = get_field('social', 'option');
                    if ($messanger):
                    ?>
                        <div class="slider__contacts sell__contacts">
                            <?php
                            foreach ($messanger as $elem) :
                            ?>
                                <a href="<?php echo $elem['link'] ?>">
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
        $contactsPage = get_field('linkWithUs');
        if($contactsPage):
    ?>
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">
                <h1 class="our__services-name offers__name"><? echo $contactsPage['title'] ?>
                </h1>
            </div>
        </div>
        <div class="mb-8rem container-catalog">
           <div class="page_contacts_cards">
            <?php
                foreach($contactsPage['info'] as $card):
            ?>
            
                <a href="<?php
                if( mb_strtolower(trim($card['name'],":")) == "телефон"){ echo "tel:"; echo$card['description']; }
                if( mb_strtolower(trim($card['name'],":")) == "email"){ echo "mailto:"; echo$card['description']; }
                if( mb_strtolower(trim($card['name'],":")) == "адрес"){ echo "https://yandex.ru/maps/-/CDaGQPOI"; }
                ?>" class="page_contacts_card">
                    <img src="<? echo $card['icon']?>" alt="icon" />
                    <div class="page_contacts_card-text">
                        <h1><? echo $card['name']?> </h1>
                        <p>
                            <? echo $card['description']?>
                        </p>
                    </div>
                </a>
                <? endforeach;?>
            <?php 
                $extraInfoPress = $contactsPage['extraInfor']['press']; 
                $extraInfoRequisites= $contactsPage['extraInfor']['requisites'];
                ?>   
           </div>
                <div  class="page_contacts_info">
                    <div id="mymap" style="" class="page_contacts_info-map">
                    <!-- <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A053bd947d462cc1a45aeba4070defff75501905071c0eaf68436ac9976ec698c&amp;id=mymap&amp;lang=ru_RU&amp;"></script>
                     -->
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=37.597845%2C55.741439&mode=search&oid=1509974685&ol=biz&z=16.74" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                    </div>
                    <!--<img src="./assets/img/page_contacts/map.png" alt="map" />-->
                    <div class="page_contacts_info-text">
                        <h1><? echo $extraInfoPress['name'] ?></h1>
                        <p><? echo $extraInfoPress['text'] ?></p>
                        <div>
                            <h1>Реквизиты:</h1>
                            <?php
                                echo $extraInfoRequisites['name'];
                                echo $extraInfoRequisites['nalog'];
                                echo $extraInfoRequisites['ogrn'];
                                echo $extraInfoRequisites['bik'];
                                echo $extraInfoRequisites['address'];

                            ?>
                        </div>
                    </div>
                </div>
        </div>
        <?endif;?>
        <?  get_template_part( 'blocks/corners/corner_underPage_SoftBlack' ); ?> 
</section>

<? 
    if(isset($_GET["sendForm"]) && $_GET["sendForm"]==1)
    {
        ?>
        <div class="modal_form_success " id="modal_form_success">
            <p>Заявка успешно отправлена. </p>
            <p>Мы обязательно с вами свяжимся!</p>
        </div>
        <?
    }
?>

<?php
get_footer();
?>

<script type="text/javascript" defer>
const modal_form_success = document.querySelector('#modal_form_success');
if(modal_form_success)
{
  setTimeout(()=>
  {
    modal_form_success.classList.add('modal_form_success_displayOff');
  },3500)
}
</script>