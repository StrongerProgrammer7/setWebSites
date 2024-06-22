
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri( ) ?>/assets/css/style.css">

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/jquery.min.js" defer></script>
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/index.js" defer></script>
    <script src="//code.jivo.ru/widget/TcAYPTkbXh" async></script>
    
    <title><?php bloginfo( "name" ) ?></title>
    <?php wp_head(); ?>
</head> 
<body>
<header class="header">
        <div class="container">
           <div class="inner_header">
            <div class="wrapper_header">
                <?  
                    $logo = get_field('logo','option');
                    if($logo):
                ?>
                    <a class="header__logo" 
                    <? 
                        if (is_front_page()) 
                            echo "onclick='showModal()'" ;
                        else 
                            echo "href=".home_url(); ?>>
                        <img src="<?echo $logo ?>" alt="logo" />
                    </a>
                    <?endif;?>
                    <?
                        $menu = get_field('menu','option');
                        if($menu):
                    ?>
                    <nav class="menu__ul">
                        <?
                            $ind = 0;
                            foreach($menu as $elem):

                        ?>
                        <?
                            if($ind == 0):
                        ?>
                            <li class="serviceMenu" id="serviceMenu">
                               <a><? echo $elem['title'] ?>
                                <svg class="arrowSubmenuOff" id="arrowSubmenuOff" xmlns="http://www.w3.org/2000/svg" width="10" height="3" viewBox="0 0 10 3" fill="none">
                                    <path d="M5 3L0.669872 0.749999L9.33013 0.75L5 3Z" fill="#B20710"/>
                                </svg>
                                <svg class="arrowSubmenuOn" id="arrowSubmenuOn" xmlns="http://www.w3.org/2000/svg" width="10" height="3" viewBox="0 0 10 3" fill="none">
                                    <path d="M5 3L0.669872 0.749999L9.33013 0.75L5 3Z" fill="#B20710"/>
                                </svg>
                               </a>
                               <?
                                    $submenu = get_field('submenu','option');
                                    if($submenu):
                               ?>
                               <ul class="submenu" id="submenu">
                                <?foreach($submenu as $sub): ?>
                                <li><a href="<? echo $sub['link']?>"><? echo $sub['title']?></a></li>
                                <? endforeach;?>
                               </ul>
                               <?endif;?>
                            </li>
                            <? $ind++;continue;endif;?>
                           <li>
                             <a href="<? echo $elem['link']?>"><? echo $elem['title'] ?></a>
                           </li>
                           
                           <? $ind++; endforeach; ?>
                    </nav>
                    <?
                        endif;
                        $phone_header = get_field('phones','option')[0]['phone'];
                        
                        $timeWork = get_field('timeWork','option');
                        $to = $timeWork['to'];
                        $from = $timeWork['from'];
                        if($phone_header && $timeWork):
                    ?>
                    <div class="header__info">
                        <div class="address">
                            <p class="timeWork">Время работы с 
                                <span>
                                    <span class="redColor bold600"><?echo $from?></span> до <span  class="redColor bold600"><? echo $to?></span>
                                </span>
                               
                            </p>
                        </div>
                        <div class="phone">
                            <a href="tel:<?php echo preg_replace('/[ -]*/', '', $phone_header) ?>"><? echo $phone_header ?> </a>
                        </div>
                        <button class="btn__order" onclick="showModal();">Оставить заявку</button>
                    </div> 
                    <?endif;?>
               </div>
              <div class="wrapper_header_borderDown">
                   <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/header_line2.png" alt="line" /> 
              </div>
           </div>
        </div>
    </header>
    