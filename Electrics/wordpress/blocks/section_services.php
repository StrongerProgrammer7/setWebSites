<?  $menu = get_field('menu','option');?>
<section class="services" ><a name="<? echo $menu[0]['title'] ?>"></a>
        <div class="container2">
            <div class="services__intro">
                <div class="wrapper_services_logo" >
                    <div class="services__logo">
                       
                        <h1 class="services__logo-text"> 
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 150.svg" alt="icon" />
                            <?echo $args['title']?>
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 151.svg" alt="icon" />
                        </h1>
                        
                    </div>
                </div>
                <?
                    $cards_services = $args['cards_services'];
                    if($cards_services):
                ?>
                <div class="services__content">
                    <? foreach($cards_services as $card)
                    {
                        get_template_part( 'blocks/cards/card_service',null,$card );
                    }
                    ?>
                </div>
                <?endif;?>

               
            </div>
        </div>
</section>