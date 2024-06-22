<?php 
      
    if($args):
       
?>
        <div class="base_mt offers__text">
            <div class="our__serviec-intro offers__align-center">
             
                <h1 class="our__services-name offers__name"><?php 
                if( $args['name'] == 'rent')
                    the_field('catalog_title_rent');
                else
                    the_field('catalog_title');
                ?></h1>
                   <img class="servieces__intro-leftImg" src="<?php echo get_template_directory_uri( )?>/assets/img/line_gold.png" alt="our__services" /><br>
            </div>
            <p><? the_field('catalog_text'); ?></p>
        </div>   

       <?php  get_template_part( 'blocks/tpl_sliders' ,null,$args); ?>
       
      
<?endif;?>