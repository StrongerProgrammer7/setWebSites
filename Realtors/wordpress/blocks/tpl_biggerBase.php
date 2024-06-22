
    <?php $biggerBase = get_field('biggerBase');
            if($biggerBase):
    ?>
        <div class="our__serviec-intro base_mt">

            <h1 class="our__services-name"><? echo $biggerBase['title']?></h1>
            <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="vector" />
        </div>
        <div class="bigger__base_wrapper">
            <?php 
                foreach($biggerBase['items'] as $item):
            ?>
        
            <div class="bigger__base-content">
                <div class="bigger__base-info">
                    <p><?echo $item['number'] ?></p>
                    <img class="services_svg" src="<?php echo get_template_directory_uri( )?>/assets/img/svg_ourServices.png" alt="vector" />
                    <span><? echo $item['name_text']?></span>
                </div>
            </div>
            <?endforeach;?>
        </div>
    <? endif;?>
                