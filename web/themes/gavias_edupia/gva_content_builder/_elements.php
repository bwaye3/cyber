<?php
function gavias_content_builder_set_elements(){
   return $shortcodes = array(
    'gva_column',
    'gva_row',
    'gva_accordion',
    'gva_box_hover', 
    'gva_call_to_action',
    'gva_carousel_content',
    'gva_chart',
    'gva_text',
    'gva_text_noeditor',
    'gva_counter',
    'gva_countdown',
    'gva_drupal_block',
    'gva_heading',
    'gva_icon_box',
    'gva_image',
    'gva_our_team',
    'gva_pricing_item',
    'gva_progress',
    'gva_tabs',
    'gva_tabs_content',
    'gva_video_box',
    'gva_gmap',
    'gva_button',
    'gva_view',
    'gva_quote_text',
    'gva_quotes_rotator',
    'gva_image_content',
    'gva_job_box',
    'gva_services_box',
    'gva_gallery',
    'gva_our_partners',
    'gva_socials',
    'gva_divider',
    'gva_view_tabs_ajax'
  );
}

function gavias_merge_atts( $pairs, $atts, $shortcode = '' ) {
    $atts = (array)$atts;
    $out = array();
    foreach($pairs as $name => $default) {
        if ( array_key_exists($name, $atts) )
            $out[$name] = $atts[$name];
        else
            $out[$name] = $default;
    }
    return $out;
}

function gavias_render_views($views_name, $view_id, $arguments = ''){
    $result = array('content'=> '', 'view_title' => '');
    
    $view_title = '';
    $output = '';
    try{
        $view = Drupal\views\Views::getView($views_name);
        if($view){
            if($view->access($view_id)){
                $element = $view->buildRenderable($view_id);
                if($element){
                    if($view->getTitle()){
                        $view_title = $view->getTitle();
                    }
                    $element['#view_id'] = $view->storage->id();
                    $element['#view_display_show_admin_links'] = $view->getShowAdminLinks();
                    $element['#view_display_plugin_id'] = $view->display_handler->getPluginId();
                    $element['#arguments'] = $arguments;
                    views_add_contextual_links($element, 'block', $view_id);
                    $element = Drupal\views\Element\View::preRenderViewElement($element);
                    if (empty($element['view_build'])) {
                      $element = ['#cache' => $element['#cache']];
                    }
                    if($element){
                      $output .= '<div class="block-content">'. render($element) . '</div>';
                    }
                }
            }else{
                $output .= '<div>Missing view, block "'.$views_name.' - '.$view_id.'"</div>';
            }
        }
   }catch(Exception $e){
        $output .=  '<div>Missing view, block "'.$views_name.' - '.$view_id.'"</div>';
   }
   $result['content'] = $output;
   $result['view_title'] = $view_title;
   //$view->destroy();
   $element = null;
   $view = null;
   return $result;
}

function scrape_insta_hash($tag) {
   $insta_source = file_get_contents('https://www.instagram.com/'.trim($tag)); // instagrame tag url
   $shards = explode('window._sharedData = ', $insta_source);
   $insta_json = explode(';</script>', $shards[1]); 
   $insta_array = json_decode($insta_json[0], TRUE);
   return $insta_array; // this return a lot things print it and see what else you need
}
