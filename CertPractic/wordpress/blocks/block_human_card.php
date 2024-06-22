                        <div class="wrapper_outTeam-item">
                            <div class="cert_item item_content-block our_team-item" id="our_team-item">
                                <div class="wrappet_cert_item-content">
                                    <p class="cert_item_nameMan"><? the_title();?></p>
                                    <p class="cert_item-title"><?php the_field( 'job_title' ); ?> </p>
                                    <p class="cert_item-price"><?php the_field( 'phone' ); ?></p>
                                    <p class="cert_item_email"><?php the_field( 'email' ); ?></p>
                                    <button class="btn__order " id="btn_human">Узнать стоимость</button>
                                </div>
                                <div class="wrapper_cert_item-img">
                                    <img src="<? echo get_the_post_thumbnail_url() ?>" alt="img" />
                                </div>
                            </div>
                        </div>