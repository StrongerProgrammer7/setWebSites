<?php
// Template Name: Main page
get_header();
?>
<?  get_template_part( 'blocks/section_main_face' );?>

<?
    $cards = get_field('cards');
    if($cards)
        get_template_part( 'blocks/section_cards',null,$cards );
?>

<?
    $service_group = get_field('service_group');
    if($service_group)
        get_template_part( 'blocks/section_services',null,$service_group );
?>
<?
    $about_company = get_field('block_AC');
    if($about_company)
        get_template_part( 'blocks/section_about_company',null,$about_company );
?>
<?
    $requestuser = get_field('call_us');
    if($requestuser)
        get_template_part( 'blocks/section_request',null,$requestuser );
?>
<?
    $howWeWork = get_field('workForYou');
    if($howWeWork)
        get_template_part( 'blocks/section_how_we_work',null,$howWeWork );
?>

<? 
    $questions = get_field('leftQuestions');
    if($questions)
        get_template_part( 'blocks/section_questions',null,$questions );
?>
<? 
    get_template_part( 'blocks/section_map' );
?>
<?php
get_footer();
?>

