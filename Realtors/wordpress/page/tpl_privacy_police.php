<?php
// Template Name: Privacy policy page

get_header();
?>
<section class="policy">
<h1 class="title_policy"><?echo the_title();?></h1>
<div class="policy_text">
    <? echo the_content();?>
</div>
</section>

<?php
get_footer();
?>