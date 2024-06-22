<?php
// Template Name: Article page

// Template Post Type: post, pages
get_header();
?>
    <section class="certPrice  projectsFace">
        <div class="total_control-background">
            <div class="container-total">
                <div class="total_control-content">
                    <div class="tc_content-title">
                        <h1>  <?php echo the_title()?>       </h1>
                        
                    </div>
                </div>
               
            </div>
            <?php if ( get_field( 'background' ) ) : ?>
                <img src="<?php the_field( 'background' ); ?>"  alt="background" />
            <?php endif ?>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftWhite' );  ?>
    </section>
    <article class="article">
        <div class="container-total">
            <div class="article_content">
                <div class="wrapperArticleImg">
                    <img src="<? echo get_the_post_thumbnail_url() ?>" alt="image" />
                </div>
                <div>
                    <p class="article_text"><?php the_field( 'text' ); ?>
                    </p>
                </div>
            </div>
        </div>
     
         <? get_template_part( 'blocks/down_block_angels/angleLeftSoftWhite' );  ?>
    </article>
    <?
     $projects = get_posts( array(
        'numberposts' => 3,
        'category_name'    => "project",
        'orderby'     => 'date',
        'order'       => 'DESC',
        'include'     => array(),
        'exclude'     => array(),
        'meta_key'    => '',
        'meta_value'  =>'',
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );
    if($projects):
        global $post;
?> 
    <section class="projects">
        <div class="background_linearSoftWhite">
        <div class="container-total">
            <div class="projects_cards">
            <? foreach($projects as $post): 
                    setup_postdata( $post );
                ?>
                <div class="projects_card">
                   <div class="wrapper_porjectsCard">
                        <img src="<? echo get_the_post_thumbnail_url() ?>" alt="image" />
                        <div class="project_cardNameCountry">
                            <svg width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.1094 1.5H6.60938L5.32031 0.234375C5.17969 0.09375 4.99219 0 4.78125 0H1.35938C0.726562 0 0.234375 0.515625 0.234375 1.125V7.875C0.234375 8.50781 0.726562 9 1.35938 9H11.1094C11.7188 9 12.2344 8.50781 12.2344 7.875V2.625C12.2344 2.01562 11.7188 1.5 11.1094 1.5ZM11.1094 7.875H1.35938V1.125H4.64062L5.90625 2.41406C6.04688 2.55469 6.23438 2.625 6.44531 2.625H11.1094V7.875Z" fill="white"/>
                            </svg>
                            <p><?php the_field( 'country' ); ?></p>
                        </div>
                   </div>
                    <div class="projects_cardWrapperBorder">
                        <div class="projects_card-data">
                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.7188 2.75H10.3125V1.22656C10.3125 1.05078 10.1367 0.875 9.96094 0.875H8.78906C8.58398 0.875 8.4375 1.05078 8.4375 1.22656V2.75H4.6875V1.22656C4.6875 1.05078 4.51172 0.875 4.33594 0.875H3.16406C2.95898 0.875 2.8125 1.05078 2.8125 1.22656V2.75H1.40625C0.615234 2.75 0 3.39453 0 4.15625V14.4688C0 15.2598 0.615234 15.875 1.40625 15.875H11.7188C12.4805 15.875 13.125 15.2598 13.125 14.4688V4.15625C13.125 3.39453 12.4805 2.75 11.7188 2.75ZM11.543 14.4688H1.58203C1.46484 14.4688 1.40625 14.4102 1.40625 14.293V5.5625H11.7188V14.293C11.7188 14.4102 11.6309 14.4688 11.543 14.4688Z" fill="#B20710"/>
                            </svg> 
                                
                            <span><?php the_field( 'date' ); ?></span>
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_field( 'text_card' ); ?> </p>
                            <a href="<?php the_permalink(); ?>">Подробнее <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.09375 5.05664C6.32227 4.82812 6.32227 4.44727 6.09375 4.19336L2.64062 0.740234C2.38672 0.511719 2.00586 0.511719 1.77734 0.740234L1.19336 1.32422C0.964844 1.57812 0.964844 1.95898 1.19336 2.1875L3.65625 4.65039L1.19336 7.08789C0.964844 7.31641 0.964844 7.69727 1.19336 7.95117L1.77734 8.50977C2.00586 8.76367 2.38672 8.76367 2.64062 8.50977L6.09375 5.05664ZM10.9688 4.19336L7.51562 0.740234C7.26172 0.511719 6.88086 0.511719 6.65234 0.740234L6.06836 1.32422C5.83984 1.55273 5.83984 1.95898 6.06836 2.1875L8.53125 4.625L6.06836 7.08789C5.83984 7.31641 5.83984 7.69727 6.06836 7.95117L6.65234 8.50977C6.88086 8.76367 7.28711 8.76367 7.51562 8.50977L10.9688 5.05664C11.1973 4.82812 11.1973 4.44727 10.9688 4.19336Z" fill="#16243D"/>
                                </svg>
                                </a>
                        </div> 
                    </div>
                </div>
                <? endforeach; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
        <? get_template_part( 'blocks/down_block_angels/angleLeftRed' );  ?>
        </div>
    </section>
<? endif;
get_template_part( 'blocks/block_info_know_us' );  
get_template_part( 'blocks/block_ourOffice_map' );   
?>
<?php
get_footer();
?>