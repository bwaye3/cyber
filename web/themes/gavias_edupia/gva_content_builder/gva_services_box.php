<?php 
if(!class_exists('element_gva_services_box')):
   class element_gva_services_box{
      public function render_form(){
         $fields = array(
            'title' => t('Services Box'),
            'key' => 'gva_services_box',
            'fields' => array(
               array(
                  'id'        => 'title',
                  'type'      => 'text',
                  'title'     => t('Title For Admin'),
                  'admin'     => true
               ),
               array(
                  'id'        => 'display',
                  'type'      => 'select',
                  'title'     => 'Display',
                  'options'   => array(
                     'carousel' => t('Carousel'),
                     'grid'     => t('Grid') 
                  ) 
               ),
               array(
                  'id'        => 'columns_lg',
                  'type'      => 'text',
                  'title'     => t('Columns For Large Screen'),
                  'std'       => '6',
                  'class'     => 'width-1-4'
               ),
               array(
                  'id'        => 'columns_md',
                  'type'      => 'text',
                  'title'     => t('Columns For Medium Screen'),
                  'std'       => '6',
                  'class'     => 'width-1-4'
               ),
               array(
                  'id'        => 'columns_sm',
                  'type'      => 'text',
                  'title'     => t('Columns For Small Screen'),
                  'std'       => '3',
                  'class'     => 'width-1-4'
               ),
                array(
                  'id'        => 'columns_xs',
                  'type'      => 'text',
                  'title'     => t('Columns For Extra Small Screen'),
                  'std'       => '2',
                  'class'     => 'width-1-4'
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
               ), 
               array(
                  'id'        => 'el_class',
                  'type'      => 'text',
                  'title'     => t('Extra class name'),
                  'desc'      => t('Style particular content element differently - add a class name and refer to it in custom CSS.'),
               ),   
            ),                                     
         );

         for($i=1; $i<=10; $i++){
            $fields['fields'][] = array(
               'id'     => "info_${i}",
               'type'   => 'info',
               'desc'   => "Information for item {$i}"
            );
            $fields['fields'][] = array(
               'id'        => "title_{$i}",
               'type'      => 'text',
               'title'     => t("Title {$i}")
            );
            $fields['fields'][] = array(
               'id'           => "icon_{$i}",
               'type'         => 'text',
               'title'        => t("Icon {$i}"),
               'desc'     => t('Use class icon font <a target="_blank" href="http://fontawesome.io/icons/">Icon Awesome</a> or <a target="_blank" href="http://gaviasthemes.com/icons/">Custom icon</a>')
            );
            $fields['fields'][] = array(
               'id'        => "link_{$i}",
               'type'      => 'text',
               'title'     => t("Link {$i}")
            );
         }
         return $fields;
      }

      public static function render_content( $attr = array(), $content = '' ){
         global $base_url;
         $default = array(
            'title'           => '',
            'display'         => '',
            'columns_lg'      => '',
            'columns_md'      => '',
            'columns_sm'      => '',
            'columns_xs'      => '',
            'el_class'        => '',
            'animate'         => '',
            'animate_delay'   => ''
         );

         for($i=1; $i<=10; $i++){
            $default["title_{$i}"] = '';
            $default["icon_{$i}"] = '';
            $default["link_{$i}"] = '';
         }

         extract(gavias_merge_atts($default, $attr));
         if($animate) $el_class .= ' wow ' . $animate; 
         $_id = gavias_content_builder_makeid();
         
         ?>
         <?php ob_start() ?>
         
         <?php if($display == 'carousel'){ ?>
            <div class="gsc-services-box <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>> 
               <div class="owl-carousel init-carousel-owl owl-loaded owl-drag" data-items="<?php print $columns_lg ?>" data-items_lg="<?php print $columns_lg ?>" data-items_md="<?php print $columns_md ?>" data-items_sm="<?php print $columns_sm ?>" data-items_xs="<?php print $columns_xs ?>"
                  data-loop="1" data-speed="500" data-auto_play="1" data-auto_play_speed="2000" data-auto_play_timeout="5000" data-auto_play_hover="1" data-navigation="1" data-rewind_nav="0" data-pagination="0" data-mouse_drag="1" data-touch_drag="1">
                  <?php for($i=1; $i<=10; $i++){ ?>
                     <?php 
                        $title = "title_{$i}";
                        $icon = "icon_{$i}";
                        $link = "link_{$i}";
                     ?>
                     <?php if($$title){ ?>
                        <div class="item item-service-box">
                           <div class="content-inner">
                              <a href="<?php print $$link ?>">
                                 <?php if($$icon){ ?><span class="icon"><i class="<?php print $$icon ?>"></i></span><?php } ?>         
                                 <?php if($$title){ ?><span class="title"><?php print $$title ?></span><?php } ?>
                              </a>
                           </div>
                        </div>
                     <?php } ?>    
                  <?php } ?>
               </div>  
            </div>
         <?php } ?>
         
         <?php if($display == 'grid'){ ?>
            <div class="gsc-services-box <?php echo $el_class ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>> 
               <div class="lg-block-grid-<?php print $columns_lg ?> md-block-grid-<?php print $columns_md ?> sm-block-grid-<?php print $columns_sm ?> xs-block-grid-<?php print $columns_xs ?> ">
                  <?php for($i=1; $i<=10; $i++){ ?>
                     <?php 
                        $title = "title_{$i}";
                        $icon = "icon_{$i}";
                        $link = "link_{$i}";
                     ?>
                     <?php if($$title){ ?>
                        <div class="item-columns item-service-box">
                           <div class="content-inner">
                              <a href="<?php print $$link ?>">
                                 <?php if($$icon){ ?><span class="icon"><i class="<?php print $$icon ?>"></i></span><?php } ?>         
                                 <?php if($$title){ ?><span class="title"><?php print $$title ?></span><?php } ?>
                              </a>
                           </div>
                        </div>
                     <?php } ?>    
                  <?php } ?>
               </div>  
            </div>
         <?php } ?>

         <?php return ob_get_clean();
      }

   }
 endif;  



