<?php
// Template Name: Contacts page
$dataMap = get_field('data_map');
$coordinate_smal_map = $dataMap['coordinate'];
$addressSmallMap = $dataMap['address'];
get_header();
?>
<?
    $title_contacts = get_field('title');
    $back_contacts = get_field('background');
    if($title_contacts && $back_contacts):
?>
    <section class="certPrice  projectsFace">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1> <? echo $title_contacts ?></h1>
                    </div>
                </div>
               
            </div>
            <img src="<? echo $back_contacts?>" alt="background" />
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
    <? endif;?>
    <? 
        $name_form = get_field('title_form');
        $contacs = get_field('contacts');
        if($contacs):
    ?>
    <section class="our_contacts">
        <div class="container-total">
           <div class="our_contacts-content">
                <div class="our_contacts_cards">
                    <?
                        $ind  = 0;
                        foreach($contacs as $contact):
                    ?>
                    <div class="our_contacts_card">
                        <a href="<?= trim(mb_strtolower($contact['title'])," \n:") == "адрес" ? " https://yandex.ru/maps/2/saint-petersburg/house/moskovskoye_shosse_13ashch/Z0kYdQJhSEQPQFtjfXRzd31rbQ==/?ll=30.351118%2C59.826189&z=16.74" : "mailto:" . $contact['text']; ?>" >
                            <img src="<? echo $contact['img'];?>" alt="icon" />
                            <div class="our_contacts_card-text">
                                <h1><? echo $contact['title']?> </h1>
                                <?php 
                                    if (trim(mb_strtolower($contact['title'])," \n:") != "телефон")
                                    {
                                ?>
                                    <p><? echo $contact['text']?>  </p>
                                <? } else {
                                    $phones = get_field('phones');
                                    if($phones):
                                        foreach($phones as $phone):
                                ?>
                                    <p><a href="tel:<?php echo preg_replace('/[ -]*/', '', $phone['phone']) ?>"><? echo $phone['phone']; ?></a></p>
                                <?  endforeach;
                                    endif;
                                    }
                                ?>
                            </div>
                        </a>
                    </div>
                    <? $ind++;endforeach; ?>
                    
                   
                </div>
        
                <div  class="our_contacts_info">
                    <div id="mymap2" class="our_contacts_info-map">
                        <div style="position:relative;overflow:hidden;">
                        </div>
                    </div>
                    <div class="our_contacts_info-form">
                        <div class="tc_content-title">
                            <h1> <? echo $name_form ?></h1>
                        </div>
                        <form class="form_ourContacts" method="POST">
                            <!-- <div class="form_oc_inputs">
                                <input type="text" name="user_name" placeholder="Ваше имя" required/>
                                <input type="tel" name="user_phone" placeholder="+7(_ _ _) _ _ _ - _ _ - _ _" pattern="^(\+7|8)[0-9]{3}[0-9]{3}[0-9]{4}$" required />
                            </div>
                            <textarea class="form_ocTextArea" placeholder="Ваши пожелания" name="user_text"></textarea>
                           <p class="form_oc_checkbox">
                            <input class="" type="checkbox" checked /> <span>Вы даете согласие на обработку персональных данных</span>
                           </p>
                            <button class="btn__order">Отправить</button> -->
                            <?php echo do_shortcode('[contact-form-7 id="b651f1e" title="КФ-Связаться с нами"]') ?>
                       </form>
                    </div>
                </div>
           </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftRed' );  ?>
    </section>
    <? endif; 
     get_template_part( 'blocks/block_info_know_us' );  
    get_template_part( 'blocks/block_ourOffice_map' );  
    
    ?>

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
document.addEventListener('DOMContentLoaded',(e)=>
{
    let coordinate_small_Map = `<? echo $coordinate_smal_map?>`;
    let address_smal_map = `<? echo $addressSmallMap?>`;

    buildMap(coordinate_small_Map,address_smal_map);
});

function buildMap(coordinate_small_Map,address_smal_map)
{
    ymaps.ready(function () 
    {
    
        try 
        {
           
            if(document.getElementById('mymap2')!==null && coordinate_small_Map && address_smal_map)
            {
                coordinate_small_Map = coordinate_small_Map.split(',');

                let smallMap = new ymaps.Map('mymap2', 
                 {
                    center: [coordinate_small_Map[0],coordinate_small_Map[1]],
                    zoom: 15
                        }, {
                            searchControlProvider: 'yandex#search'
                        }),
                    myPieChart = new ymaps.Placemark([coordinate_small_Map[0],coordinate_small_Map[1]], 
                    {
                        balloonContent: address_smal_map,
                        iconCaption: address_smal_map
                    }, {
                        preset: 'islands#icon',
                        iconColor: '#0095b6'
                    });
                    smallMap.geoObjects.add(myPieChart)

                    // Создаём макет содержимого.
                    MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                        '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                    );
            }

        
        } catch (error) 
        {
            console.log(error);    
        }
    });
}

</script>