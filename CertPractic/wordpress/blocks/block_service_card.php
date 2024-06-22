                    <div class="item">
                        <img src="<? echo get_the_post_thumbnail_url() ?>" alt="image" />
                        
                        <img class="imgAngelLeft" src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/MainPage/Cards/Angle/AngleUpRed.png" alt="image" />
                        <img class="imgAngelRight" src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/MainPage/Cards/Angle/AngelDownRed.png" alt="image" />
                        <div class="item_content">
                            <div class="item_content-block">
                                <p class="item_content-text"><? the_title(); ?></p>
                            </div>
                            <a href="<? the_permalink() ?>"><button class="btn__order">Оформить</button></a>
                        </div>
                    </div>