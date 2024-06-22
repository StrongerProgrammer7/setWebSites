<?php
// Template Name: About company
get_header();
?>
<?
    $section_face = get_field('block_face');
    if($section_face):
        $title =$section_face['title'];
        $imgs = $section_face['imgs'];
        $background = $section_face['background'];
?>
    <section class="certPrice aboutCompanyFace">
        <div class="total_control-background">
            <div>
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1><? echo $title ?> </h1>
                    </div>
                    <? if($imgs): ?>
                    <div class="about_company_items">
                        <? 
                            foreach($imgs as $img):
                        ?>
                        <div class="ac_item">
                            <img src="<? echo $img['img'] ?>" alt="image" />
                            <div class="overlay_itemAC"></div>
                        </div>
                        <? endforeach; ?>
                    </div>
                   <? endif;?>
                </div>
               
            </div>
            <img src="<? echo $background ?>" alt="background" />
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
<?
 endif;
 $section_ourCompany = get_field('our_company');
 if($section_ourCompany):
    $title = $section_ourCompany['title'];
    $text = $section_ourCompany['text'];
    $img = $section_ourCompany['img'];
?>
    <section class="certPrice our_company">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    
                    <div class="wrapper__stages wrapper_our_company">
                        <div class="stages_img">
                            <img src="<? echo $img?>" alt="img" />
                        </div>
                        <div class="item_content-block">
                            <p class="cert_item-title"><? echo $title ?></p>
                            <p> <? echo $text ?>
                            </p>
                        </div>
                    </div>
                    
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/AngleLeftSoftWhite' );  ?>
    </section>
<?
    endif;
    $section_history = get_field('history');
    if($section_history):
    $title = $section_history['title'];
    $content = $section_history['year_text'];
?>
    <section class="certPrice historyDevelopment">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1><? echo $title ?>
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                        </h1>
                    </div>
                    <? if($content):?>
                    <div class="historyDevelopment_items">
                        <? foreach($content as $item): ?>
                        <div class="hD-item">
                                <p class="hD-year"><? echo $item['year'];?></p>
                                <p class="hD-text"><? echo $item['text'];?></p>
                        </div>
                        <? endforeach;?>
                        
                    </div>
                   <? endif;?>
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/AngleLeftSoftWhite' );  ?>
        
    </section>
<?
endif;
$section_letterThanks = get_field('letters_thanks');
if($section_letterThanks):
$title = $section_letterThanks['title'];
$lettersImg = $section_letterThanks['letters_img'];
?>
    <section class="certPrice letterThanks">
        <div class="background_linearSoftWhite">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1><? echo $title ?>
                            <img src="<?php echo get_template_directory_uri( ) ?>/assets/imgs/line_under_word.png" alt="line" />
                        </h1>
                        
                    </div>
                    <?
                        if($lettersImg):
                    ?>
                    <div class="tc_content-items">
                        <? foreach($lettersImg as $img): ?>
                        <div class="wrapper_cert_item-img">
                            <img src="<? echo $img['img'];?>" alt="img" />
                        </div>
                        <? endforeach;?>
                       
                    </div>
                    <?endif;?>
                </div>
               
            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftRed' );  ?>
    </section>  
<?
endif;
get_template_part( 'blocks/block_info_know_us' );  
get_template_part( 'blocks/block_ourOffice_map' );  
?>
<?php
get_footer();
?>