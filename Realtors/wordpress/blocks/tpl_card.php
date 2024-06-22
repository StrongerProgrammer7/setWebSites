    <div class="offers__card" id="cards">
        <div class="offers__card-img">
            <img src="<? echo get_the_post_thumbnail_url() ?>" alt="<? the_title(); ?>" />
        </div>
        <div class="offers__card-content">
            <h3><? the_title(); ?></h3>
            <p><? the_field('address') ?></p>
            <div class="ofc__icons">
                <div class="ofc__icons-content">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/card/icons/icon_size.png.png" alt="icon" />
                    <p>Площадь (м2)</p>
                    <p><? the_field('square') ?></p>
                </div>
                <div class="ofc__icons-content">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/card/icons/floor.png" alt="icon" />
                    <p>Этаж</p>
                    <p><? the_field('floor') ?></p>
                </div>
                <div class="ofc__icons-content">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/card/icons/bed.png" alt="icon" />
                    <p>Вместимость</p>
                    <p><? the_field('space') ?></p>
                </div>
                <div class="ofc__icons-content">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/card/icons/sunset.png" alt="icon" />
                    <p>Вид</p>
                    <p><? the_field('view') ?></p>
                </div>
            </div>
            <p class="ofc__price" id="price_text"><? the_field('price') ?></p>
            <a class="a_wrapper_btn" href="<? the_permalink() ?>"> <button class="ofc__button">Подробнее</button></a>
        </div>
    </div>