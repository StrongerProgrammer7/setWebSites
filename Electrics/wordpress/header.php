<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri( ) ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A053bd947d462cc1a45aeba4070defff75501905071c0eaf68436ac9976ec698c&amp;id=mymap&amp;lang=ru_RU&amp;"></script> -->
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/jquery.min.js" defer></script>
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/index.js" defer></script>
    <title><?php bloginfo( "name" ) ?></title>
    <?php wp_head(); ?>
</head>
<body>
 <header class="header"> <a name="Begin"></a>
        <div class="container">
            <?php
                $logo = get_field('logo','option');
                $description_logo = get_field('description_logo','option');
                $address = get_field('addres_group','option');
                $phone = get_field('phone_group_header','option');
                $messangers = get_field('messangers','option');
                $menu = get_field('menu','option');
                $email = get_field('email','option');
                if($logo && $address && $phone && $messangers && $menu && $email):
            ?>
           <div class="wrapper_header">
            <div class="main_header">
                <div class="header__logo">
                    <img src="<? echo $logo ?>" alt="logo" onclick="showModal();"/>
                    <p><?echo $description_logo ?></p>
                </div>
                <div class="header__info">
                    <div class="address">
                        <img src="<?echo $address['icon'] ?>" alt="icon" />
                        <p><a href="<?echo $address['link']?>"><?echo $address['address'] ?></a></p>
                    </div>
                    <div class="phone">
                        <img src="<?echo $phone['icon']?>" alt="icon" />
                        <a href="tel:<? echo preg_replace('/[ -]*/', '', $phone['phone'])?>"><span><?echo $phone['phone']?></span><br/><?echo $phone['extra_info']?> </a>
                    </div>
                    <div class="contacts">
                        <? 
                            if($messangers):
                                foreach($messangers as $mes):
                        ?>
                            <a href="<?echo $mes['link']?>"> <img src="<? echo $mes['messengar']?>" alt="messanger" /></a>
                        <?endforeach; endif; ?>
                        <div class="contacts__adress-phone">
                            <a href="tel: <? if(!$phone['phone_2']) echo preg_replace('/[ -]*/', '', $phone['phone']);else echo preg_replace('/[ -]*/', '', $phone['phone_2']);?>">
                                
                            <? if(!$phone['phone_2']) echo $phone['phone'];else echo $phone['phone_2'];?></a> 
                            <p><a href="mailto:<?echo $email?>"><?echo $email?></a></p>
                        </div>
                    </div>
                    <button class="btn__order" onclick="showModal();"><img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/phone-call.svg" alt="icon" />Заказать звонок</button>
                </div> 
                
            </div>
            <?
                if($menu):
            ?>
            <ul class="menu">
                <?foreach($menu as $link):?>
                <li><a href="#<?echo $link['title']?>"><?echo $link['title']?></a></li>
                <?endforeach;?>
            </ul>
            <?endif;?>
           </div>
           <?endif;?>
        </div>
</header>


    