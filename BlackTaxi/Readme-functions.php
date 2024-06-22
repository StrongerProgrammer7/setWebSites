<?php

/*------------------Для пользовательской Contact Form--------------------------*/
/*
* Для того чтобы работл свой код формы ( при этом не будет работать базовая (интерактивная вставка полей))
*
*/
//Подсветка в Contact Form
add_action('admin_print_styles-toplevel_page_wpcf7',function()
{
    if(empty($_GET['post']))
    {
        return;
    }

    $settings = wp_enqueue_code_editor(array('type' => 'text/html'));
    if($settings === false)
        return;
    
    wp_add_inline_script(
        'code-editor',
         sprintf(
            'jQuery(function(){wp.codeEditor.initialize("wpcf7-form",%s);})',
             wp_json_encode($settings)
        )
    );
        
});

//Убираем лишние span spinner, \n \t и т.п.
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter('wpcf7_form_elements', function($content) 
{
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = preg_replace('/(size|rows|cols)="\d+"/i', '', $content);
   // $path = get_template_directory_uri( );
    /*$content = preg_replace(
        '/^<(img).*?(class="svg_name_form"){1} src=(\"|\')((\w|\s|\/)*\.{1}\w*)(\"|\')\s*(alt="\w*")?\s*(\/|\s)?>$/i', 
        `<img $2 src=$3 . $path . $4$6 $7/>`,
        $content);*/

    return $content;
});
