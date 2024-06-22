<div class="hwwfu__content-card">
    <div class="hwwfu_card_image">
        <img src="<? echo $args['card']['img'];?>" alt="icon" />
    </div>
    <div class="hwwfu_card-content">
        <h2><?echo $args['card']['name'];?></h2>
        <p><? echo $args['card']['description'];?> </p>
     </div>
    <?if($args['ind'] != $args['max_cards']-1):?>
        <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/how_we_workVectorLeft.svg" alt="vector" />
    <?endif;?>
</div>