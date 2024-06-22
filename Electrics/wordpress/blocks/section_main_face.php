

<section class="main_face">
    <?
        $main_block = get_field('section_face');
        $title = $main_block['title'];
        $services = $main_block['services'];
        $background_right = $main_block['background_right'];
        $small_block = $main_block['small_block_calls'];
    ?>
        <div class="main_face-container">
             <div class="main_face-leftContent">
               <div class="wrapper_img_content_main_face">
                
                    <img src="<?php echo get_template_directory_uri( ) ?>/assets/img/background_main_left.png" alt="image" />
           

                <div class="leftContent">
                   <h1 class="leftContent-title"><?echo $title?> </h1>
                   <? if($services):?>
                   <div class="leftContent-list">
                    <? 
                            foreach($services as $service):
                    ?>
                    <p class="list-text"><img src="<? echo $service['icon'] ?>" alt="icon" /><? echo $service['description'] ?> </p>
                    <? endforeach;?>
                   </div>
                   <?endif;?>
                   <button class="main_face-btn_order" onclick="showModal();">Заказать звонок</button>
                </div>
               </div>
             </div>
             <?
                if($background_right):
             ?>
            <div class="main_face-rightContent" >
               <div class="wrapperRightContent">
                <img src="<? echo $background_right?>" alt="image" />
                <? if($small_block):
                        $icon_1 = $small_block['icon'];
                        $text_1 = $small_block['text'];
                        $text_2 = $small_block['text_2'];    
                ?>
                <div class="rightContent-connect">
                    <div class="connect-upContent" onclick="showModal();">
                        <img src="<? echo $icon_1?>" alt="icon" />
                        <p><? echo $text_1 ?></p>
                    </div>
                    <svg width="95" height="1" viewBox="0 0 95 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.75" x2="95" y2="0.75" stroke="#173164" stroke-width="0.5"/>
                        </svg>
                        
                    <div class="connect-downContent">
                        <p><?echo $text_2  ?></p>
                        <? $mess = get_field('messangers','option'); 
                            if($mess):    
                        ?>
                        <div class="downContent-contacts">
                            <? 
                                foreach($mess as $mes):
                            ?>
                             <a href="<?echo $mes['link']?>"> <img src="<? echo $mes['messengar']?>" alt="messanger" /></a>
                            <?endforeach;?>
                        </div>
                        <? endif;?>
                    </div>
                </div>
                <?endif;?>
               </div>
            </div>
            <?endif;?>
        </div>
</section>