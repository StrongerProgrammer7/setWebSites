<?
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo get_template_directory_uri( ) ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri( ) ?>/assets/swiper-10.3.1/swiper-bundle.min.css">

    
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/swiper-10.3.1/swiper-bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/jquery.min.js" defer></script>

    <script src="<?php echo get_template_directory_uri( ) ?>/assets/js/index.js" defer></script>
    <title><?php bloginfo( "name" ) ?></title>
    <?php wp_head(); ?>
</head> 
<body>
    <header class="head">
        <div class="container">
                <nav class="head__menu">
                    <ul class="menu__ul">
                        <? $menu_link = get_field('menu_link','option');
                            if($menu_link):
                                $subMenu = $menu_link['submenu'][0]; 
                                //echo var_dump($subMenu);
                                ?>
                        <li class="link__submenu" id="link__submenu">
                                <a class="link_for_submenu">
                                   <span id="link_submenu_span">
                                   <? echo $subMenu['title'] ?> 
                                    <img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" />
                                   </span>
                                   <span class="link_for_submenu_arrow"></span>
                                </a>
                            <ul class="submenu" id="submenu">
                                <? $subMenu_links = $subMenu['links'];
                                    if($subMenu_links):
                                        
                                        foreach($subMenu_links as $subLinks):
                                ?>
                                <li class="submenu__titles" id="submenu__titles" >
                                    <span  id="submenu_span"> <a href="<? echo $subLinks['link_by_title'] ?>"><? echo $subLinks['name'] ?><div class="submenu_arrow" ></div></a> </span>
                                    <ul class="submenu_links" id="submenu_links" >
                                        <? 
                                            $sub_links = $subLinks['sub_link'];
                                            if($sub_links):
                                            foreach($sub_links as $link):
                                        ?>
                                        <li id="sub_li_links">
                                            <a href="<? echo $link['link']?>?typeObjectSelect=<?echo $link['name_link']?>" id="sub_li_a_links"> <?echo $link['name_link']?></a>
                                            
                                        </li>
                                                <?endforeach;?>
                                            <? endif;?>
                                    </ul>
                                </li>
                               <?endforeach;endif;?>
                            </ul> 
                        </li>
                        <?php
                           
                                foreach($menu_link['links'] as $link):
                        ?>
                        <li>
                          <a href="<? echo $link['link']?>">
                          <img class ="links__hover__img-left" src="<?php echo get_template_directory_uri( ) ?>/assets/img/line_gold.png" alt="links" /><? echo $link['name'] ?> 
                            </a>
                          
                        </li>
                    <?php 
                        endforeach;
                        endif;
                    ?>
                    </ul>
                </nav>

                    <a class="head__logo" style='background: url(" <?php the_field('logo','option')?>") no-repeat center center / cover;' <? 
                        if (is_front_page()) 
                            echo "onclick='showModal()'" ;
                        else 
                            echo "href=".home_url(); ?>></a>
             
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
                            <p><a href="<? echo get_field('set_extra_links','option')[3]['link']?>"> <?php the_field('address','option'); ?></a></p>

                            <?php endif;?>
                        </div>
                        <?php 
                            $phone = get_field('phone','option');
                            if($phone):
                        ?>
                        <div class="head__information-phone">
                            
                            <a href="tel:<?php echo preg_replace('/[ -]*/', '', $phone) ?>" ><p> <?php echo $phone ?> </p></a>
                            <svg class="svg__phone" width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.2178 13.9244C11.4978 16.44 13.56 18.5022 16.0756 19.7822L18.0311 17.8267C18.28 17.5778 18.6267 17.5067 18.9378 17.6044C19.9333 17.9333 21 18.1111 22.1111 18.1111C22.3469 18.1111 22.573 18.2048 22.7397 18.3715C22.9064 18.5382 23 18.7643 23 19V22.1111C23 22.3469 22.9064 22.573 22.7397 22.7397C22.573 22.9064 22.3469 23 22.1111 23C18.1034 23 14.2598 21.4079 11.4259 18.5741C8.59206 15.7402 7 11.8966 7 7.88889C7 7.65314 7.09365 7.42705 7.26035 7.26035C7.42705 7.09365 7.65314 7 7.88889 7H11C11.2357 7 11.4618 7.09365 11.6285 7.26035C11.7952 7.42705 11.8889 7.65314 11.8889 7.88889C11.8889 9 12.0667 10.0667 12.3956 11.0622C12.4933 11.3733 12.4222 11.72 12.1733 11.9689L10.2178 13.9244Z" fill="#DBC67F"/>
                                <circle cx="15" cy="15" r="14.5" stroke="#DBC67F"/>
                                </svg>
                                
                        </div>
                        <?php endif; ?>
                </div>
            </div>
        </div> 
    </header>

    