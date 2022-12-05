<?php 

use Drupal\views\Views;
use Drupal\views\Element\View;

if(!class_exists('element_gva_view_tabs_ajax')):
   class element_gva_view_tabs_ajax{
      public function render_form(){
         $view_options = Views::getViewsAsOptions(TRUE, 'all', NULL, FALSE, TRUE);
         $view_display = array();
         foreach ($view_options as $view_key => $view_name) {
            $view = Views::getView($view_key);
            $view_display[''] = '-- None --';
            foreach ($view->storage->get('display') as $name => $display) {
               if($display['display_plugin']=='block'){
                  $view_display[$view_key . '-----' . $name] = $view_name .' || '. $display['display_title'];
               }
            }
         }
         asort($view_display);
         $fields = array(
            'type' => 'gsc_view_tabs_ajax',
            'title' => t('View Tabs Ajax'),
            'size' => 3,
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title For Admin'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'style',
                  'type'      => 'select',
                  'title'     => t('Style display'),
                  'options'   => array(
                     'style-1'   => 'Style #1', 
                     'style-2'   => 'Style #2',
                     'style-3'   => 'Style #3'
                  )
               ),
               array(
                  'id'        => 'hidden_category',
                  'type'      => 'select',
                  'title'     => t('Hidden Categories Of Post'),
                  'options'   => array(
                     'hidden' => 'Hidden',
                     'show'   => 'Show'
                  ),
                  'default'       => 'show',
               ), 
               array(
                  'id'        => 'el_class',
                  'type'      => 'text',
                  'title'     => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ), 
               array(
                  'id'        => 'animate',
                  'type'      => 'select',
                  'title'     => t('Animation'),
                  'desc'      => t('Entrance animation for element'),
                  'options'   => gavias_content_builder_animate(),
                  'class'     => 'width-1-2'
               ), 
               array(
                  'id'        => 'animate_delay',
                  'type'      => 'select',
                  'title'     => t('Animation Delay'),
                  'options'   => gavias_content_builder_delay_wow(),
                  'desc'      => '0 = default',
                  'class'     => 'width-1-2'
               ) 
            )                                     
         );

         for($i=1; $i<=10; $i++){
            $fields['fields'][] = array(
               'id'     => "info_${i}",
               'type'   => 'info',
               'desc'   => "Information for tab item {$i}"
            );
            $fields['fields'][] = array(
               'id'        => "title_{$i}",
               'type'      => 'text',
               'title'     => t("Title {$i}")
            );
            $fields['fields'][] = array(
               'id'        => "view_{$i}",
               'type'      => 'select',
               'title'     => t("View {$i}"),
               'options'   => $view_display
            );
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         $default = array(
            'title'              => '',
            'hidden_category'    => '',
            'el_class'           => '',
            'style'              => 'style-1',
            'animate'            => '',
            'animate_delay'      => ''
         );

         for($i=1; $i<=10; $i++){
            $default["title_{$i}"] = '';
            $default["view_{$i}"] = '';
         }
         extract(gavias_merge_atts($default, $attr));
         if($hidden_category == 'hidden') $el_class  .= 'hidden-categories';
         $el_class .= ' ' . $style;
         if($animate) $el_class .= ' wow ' . $animate; 
         $_id = gavias_content_builder_makeid();
               ob_start();
         ?>
         <div class="gsc-tab-views block widget gsc-tabs-views-ajax <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>> 
            <div class="block-content">
               <div class="list-links-tabs clearfix">
                  <?php if($title && $style == 'style-3'){ ?>
                     <div class="wtitle"><span><?php print $title ?></span></div>
                  <?php } ?>
                  <ul class="nav nav-tabs links-ajax" data-load="ajax">
                     <?php
                     for($i=1; $i<=10; $i++){ 
                        $title = "title_{$i}";
                        if(!empty($$title)){
                     ?>
                        <li class="nav-item <?php print ($i==1?'active':'') ?>"><a href="javascript:void(0);" data-panel="#tab-item-<?php print ($_id . $i) ?>"><?php print $$title ?></a></li>
                     <?php 
                        }
                     } 
                     ?>
                  </ul>
               </div>  
               <div class="tabs-container clearfix">
                  <div class="ajax-loading"></div>
                  <div class="tab-content tab-content-view">
                     <?php for($i=1; $i<=10; $i++){ 
                        $output = '';
                        $view = "view_{$i}";
                        $view_name = $view;
                        $title = "title_{$i}";
                        if(!empty($$title)){
                           if($i==1){
                              if($$view){
                                 $_view =  preg_split("/-----/", $$view);
                                 if(isset($_view[0]) && isset($_view[1])){
                                    $view = gavias_render_views($_view[0], $_view[1], '');
                                    $output .= $view['content'];
                                 }
                              }else{
                                 $output .= '<div>Missing view, please choose view"</div>';
                              }
                              print '<div data-loaded="true" data-view="'.  $$view_name . '" class="tab-pane clearfix fade in show '.(($i==1)?'active':'').'" id="tab-item-' . $_id . $i . '">'.$output.'</div>';     
                           }else{
                              print '<div data-loaded="false" data-view="'.  $$view_name . '" class="tab-pane clearfix fade in show '.(($i==1)?'active':'').'" id="tab-item-' . $_id . $i . '"></div>';
                           }
                        }
                     } ?>
                  </div>
               </div>
            </div>      
         </div>   
         <?php return ob_get_clean();
      }
   }
 endif;  



