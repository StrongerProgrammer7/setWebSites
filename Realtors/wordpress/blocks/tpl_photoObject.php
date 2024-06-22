<div class="swiper-slide">
    <div class="grid_wrapper_objects">
                 <div class="box leftBig">
                     <img src="<?php the_field('mainImg') ?>" alt="bigImg" />
                 </div>
                 <?php
                      $photos = have_rows('smallImg');
                      $num_room = 1;
                      while( have_rows('smallImg')) :
                         the_row();
                 ?>
                 <div  class="box room<?echo $num_room?> small_img">
                     <div class="small_dark"> 
                     </div>
                     <img src="<?php the_sub_field('image') ?>" alt="image"/>
                 </div>
                 <?php
                     $num_room++;
                      endwhile;
                 ?>
             </div>          
</div>                  
                
              
                      