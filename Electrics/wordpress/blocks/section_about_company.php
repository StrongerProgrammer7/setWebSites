<section class="about_company">
        <div class="container2">
            <div class="services__logo">
                <h1 class="about_company_logo">
                    <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 151.svg" alt="icon" /><? echo $args['title']?>
                    <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/Group 150.svg" alt="icon" /> 
                </h1>
            </div>
            <div class="about_company-content">
                <div class="ac__content-images">
                    <div class="acc__images-backRectabgle"></div>
                    <img src="<?echo $args['img'] ?>" alt="image" />
                </div>
                <div class="ac__content-info">
                    <p><? echo $args['description']?>
                       </p>
                    <button class="btn__order" onclick="showModal();"><img src="<?php echo get_template_directory_uri( ) ?>/assets/img/svg/phone-call.svg" alt="icon" />Заказать звонок</button>
                </div>
            </div>
        </div>
</section>