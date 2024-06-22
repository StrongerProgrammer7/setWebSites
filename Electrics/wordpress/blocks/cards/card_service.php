<div class="services__card">
    <div class="services__card-content">
        <div class="wrapper_services_card">
            <div class="wrapper__info_card" id="wrapper__info_card">
                <p class="services__card-info"><? echo $args['text']?></p>
            </div>
            <p class="services__card-price">От <span><?echo $args['price']?></span> <?echo $args['text_price'];?> </p>
             <button class="btn_card_order" id="orderService"  onclick="showModal();">Заказать</button>
        </div>
    </div> 
    <img class="card__image" src="<? echo $args['img']?>" alt="image" />
</div>