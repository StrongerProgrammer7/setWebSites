<?  $menu = get_field('menu','option');?>
<section class="how_we_works_for_us"><a name="<? echo $menu[1]['title'] ?>"></a>
    <div class="container2">
        <div class="services__logo">
            <h1 class="about_company_logo hwwfu__logo">
                <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 151.svg" alt="icon" /><? echo $args['title'];?>
                <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 150.svg" alt="icon" /> 
            </h1>
        </div>
            <?
                $cards = $args['cards_about_us'];
                if($cards):
            ?>
        <div class="hwwfu__content">
            <?
                $ind = 0;
                $max_cards = count($cards);
                foreach($cards as $card):
                    get_template_part( 'blocks/cards/card_howWeWork',null,['card'=> $card,'ind' => $ind,'max_cards'=>$max_cards] );
                $ind++;
                endforeach;?>
                
        </div>
        <?endif;?>
    </div>
</section>