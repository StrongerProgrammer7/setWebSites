<div class="cert_item item_content-block">
    <div class="wrappet_cert_item-content">
        <p class="cert_item-title"><? the_title();?></p>
        <p class="cert_item-price"> <? echo the_field('price'); ?></p>
        <button class="btn__order" id="declarations">Узнать стоимость</button>
    </div>
    <div class="wrapper_cert_item-img">
        <img src="<? echo get_the_post_thumbnail_url() ?>" alt="img" />
    </div>
</div>