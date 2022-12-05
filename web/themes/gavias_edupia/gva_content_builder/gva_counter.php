<?php 

if(!class_exists('element_gva_counter')):
   class element_gva_counter{
      public function render_form(){
         $fields = array(
            'type' => 'element_gva_counter',
            'title' => ('Counter'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'title'     => t('Title'),
                  'type'      => 'text',
                  'admin'     => true
               ),
               array(
                  'id'        => 'icon',
                  'title'     => t('Icon'),
                  'type'      => 'text',
                  'std'       => '',
                  'desc'     => t('Use class icon font <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Icon Awesome</a> or <a target="_blank" href="http://gaviasthemes.com/icons/education/">Custom icon</a>'),
               ),
               array(
                  'id'        => 'number',
                  'title'     => t('Number'),
                  'type'      => 'text',
               ),
               array(
                  'id'        => 'symbol',
                  'title'     => t('Symbol'),
                  'type'      => 'text',
                  'desc'      => 'e.g %'
               ),
               array(
                  'id'        => 'content',
                  'type'      => 'textarea',
                  'title'     => t('Content')
               ),
               array(
                  'id'        => 'type',
                  'title'     => t('Style'),
                  'type'      => 'select',
                  'options'   => array(
                     'icon-left'                => 'Icon left',
                     'icon-top'                 => 'Icon top',
                  ),
                  'std'    => 'icon-left',
               ),
               array(
                  'id'        => 'color',
                  'type'      => 'text',
                  'title'     => t('Icon Color'),
                  'desc'      => t('Use color name ( blue ) or hex ( #2991D6 )'),
               ),
               array(
                  'id'        => 'style_text',
                  'type'      => 'select',
                  'title'     => t('Skin Text for box'),
                  'options'   => array(
                     'text-dark'   => 'Text dark',
                     'text-light'   => 'Text light'
                  ),
                  'std'       => 'text-dark'
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
               ), 
         
            ),                                      
         );
         return $fields;
      }


      public function render_content( $attr = array(), $content = '' ){
         extract(gavias_merge_atts(array(
            'title'         => '',
            'icon'          => '',
            'number'        => '',
            'symbol'        => '',
            'content'       => '',
            'type'          => 'icon-top',
            'el_class'      => '',
            'style_text'    => 'text-dark',
            'color'         => '',
            'animate'       => '',
            'animate_delay' => ''
         ), $attr));
         $class = array();
         $class[] = $el_class;
         $class[] = 'position-'.$type;
         $class[] = $style_text;
         if($animate) $class[] = 'wow ' . $animate;
         $style = '';
         if($color) $style = "color: {$color};";
         if($style) $style = 'style="'.$style.'"';
         ob_start();
         ?>
         <?php if($type == 'icon-top-2'){ ?>
            <div class="widget milestone-block <?php if(count($class) > 0){ print implode(' ', $class); } ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>>
               <div class="milestone-text"><?php print $title ?></div>
               <?php if($icon){ ?>
                  <div class="milestone-icon"><span <?php print $style ?> class="<?php print $icon; ?>"></span></div>
               <?php } ?>   
               <div class="milestone-right">
                  <div class="milestone-number-inner" <?php print $style ?>><span class="milestone-number"><?php print $number; ?></span><span class="symbol"><?php print $symbol ?></span></div>
                  <?php if($content){ ?><div class="milestone-content"><?php print $content; ?></div><?php } ?>
               </div>
            </div>
         <?php }else{ ?>
            <div class="widget milestone-block <?php if(count($class) > 0){ print implode(' ', $class); } ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>>
               <?php if($icon){ ?>
                  <div class="milestone-icon"><span <?php print $style ?> class="<?php print $icon; ?>"></span></div>
               <?php } ?>   
               <div class="milestone-right">
                  <div class="milestone-number-inner" <?php print $style ?>><span class="milestone-number"><?php print $number; ?></span><span class="symbol"><?php print $symbol ?></span></div>
                  <div class="milestone-text"><?php print $title ?></div>
                  <?php if($content){ ?><div class="milestone-content"><?php print $content; ?></div><?php } ?>
               </div>
            </div>
         <?php } ?>   
         <?php return ob_get_clean() ?>
         <?php
      }

   }
endif;
   



