<?php
// Template Name: Service page

get_header();
?>
    <section class="face">
        <div class="wrapper__face_img">
            <div class="face_conent_left-background">
            <?php if ( get_field( 'back_left' ) ) : ?>
                <img src="<?php the_field( 'back_left' ); ?>"  alt="image" />
            <?php endif ?>
                
                <div class="container-total wrapper__face-content">
                    
                        <div class="face_content-left">
                                <h1><? the_title(); ?></h1>
                                  <?
                                        $services = get_field('services');
                                        if($services):
                                  ?>
                                <ul>
                                    <? foreach($services as $service):?>
                                    <li><? echo $service['name'];?></li>
                                    <? endforeach; ?>
                                </ul>
                                <? endif; ?>
                            <button class="btn__order " onclick="showModal();">Узнать стоимость</button>
                            </div>
                        </div>
               
            </div>
            <?php $back_right = get_field( 'back_right' ); ?>
            <?php if ( $back_right ) : ?>
            <div class="face_conent_right-background">
                <img src="<?php the_field( 'back_right' ); ?>" alt="image" />
                <div class="wrapper_angleUpDown">
                    <div class="wrapper_angleUpDownImg">
                        <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/MainPage/AngelUPWhite.png" alt="angle_image" />
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
    <?  
        if ( have_rows( 'complexServices' ) ) : 
            $complex = get_field('complexServices');
            $title = $complex[ 'title' ];
            $text =  $complex['text_underTitle' ];
    ?>
    <section class="certPrice complexService">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1><? echo $title ?> 
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                        </h1>
                        
                    </div>
                    <div class="tc_content-text">
                        <p><? echo $text ?> </p>
                        
                    </div>
                    <? $services = $complex['services']; 
                        if($services):?>
                    <div class="tc_content-items">
                    <? foreach($services as $service):?>
                        <div class="item_content-block">
                            <p><? echo $service['description']; ?> </p>
                        </div>
                        <? endforeach; ?>
                    </div>
                    <? endif;?>
                   
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
    <? endif;?>
    <?  
        $stages_document = get_field('stages_documents');
       if($stages_document):
        $back_left = $stages_document['back_left'];
        $text_right = $stages_document['text_Right'];
        $back_right = $stages_document['back_right'];
        $text_left = $stages_document['text_left'];
        $title = $stages_document['title'];
    ?>
    <section class="certPrice stages_documents">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    <? if($back_left && $text_right):?>
                    <div class="tc_content-title">
                        <h1><? echo $title ?>
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                        </h1>
                        
                    </div>
                    <div class="wrapper__stages">
                        <div class="stages_img">
                            <img src="<? echo $back_left ?>" alt="img" />
                        </div>
                        <div class="item_content-block">
                            <p> <? echo $text_right ?>
                            </p>
                        </div>
                    </div>
                    <? endif;?>
                    <? if($back_right && $text_left):?>
                    <div class="wrapper_documents">
                        <div class="tc_content-title">
                            <h1>Необходимые    <span>документы </span>
                                <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                            </h1>
                            
                        </div>
                        <div class="wrapper__stages row-reverse">
                            <div class="stages_img">
                                <img src="<? echo $back_right?>" alt="img" />
                            </div>
                            <div class="item_content-block">
                                <p><? echo $text_left ?>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <?endif;?>
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftSoftWhite' );  ?>
    </section>
    
    <?endif;?>
    <?
        $documents = get_field('normDocuments');
        if($documents):
    ?>
    <section class="certPrice regulatoryDocuments">
        <div class="background_linearSoftWhite">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1><? echo $documents['title'];?>
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                        </h1>
                        
                    </div>
                    <? $docs = $documents['docs']; 
                        if($docs):
                    ?>
                    <div class="tc_content-items">
                        <? foreach($docs as $doc): ?>
                        <div class="cert_item item_content-block">
                            <div class="wrappet_cert_item-content">
                                <p class="cert_item-title"><? echo $doc['title'];?></p>
                                <a href="<? echo $doc['link_download'];?>" class="btn__order">Скачать</a>
                            </div>
                            <div class="wrapper_cert_item-img">
                                <img src="<? echo $doc['img'];?>" alt="img" />
                            </div>
                        </div>
                        <?endforeach;?>
                    </div>
                    <? endif;?>
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftRed' );  ?>
    </section>
    <?endif;
    get_template_part( 'blocks/block_info_know_us' );  
    get_template_part( 'blocks/block_ourOffice_map' );
    ?>
<?php
get_footer();
?>