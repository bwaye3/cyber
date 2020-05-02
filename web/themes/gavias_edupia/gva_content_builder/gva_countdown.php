<?php 
if(!class_exists('element_gva_countdown')):
   class element_gva_countdown{
      public function render_form(){
         $fields = array(
            'type' => 'element_gva_countdown',
            'title' => ('Countdown'),
            'fields' => array(
               array(
                  'id'        => 'title',
                  'title'     => t('Title'),
                  'type'      => 'text',
                  'admin'     => true
               ),
               array(
                  'id'        => 'year',
                  'title'     => t('Year'),
                  'type'      => 'text',
                  'default'   => '2019'
               ),
               array(
                  'id'        => 'month',
                  'title'     => t('Month'),
                  'type'      => 'text',
                  'default'   => '12'
               ),
               array(
                  'id'        => 'day',
                  'type'      => 'text',
                  'title'     => t('Day'),
                  'default'   => '01'
               ),
               array(
                  'id'        => 'hour',
                  'type'      => 'text',
                  'title'     => t('Hour'),
                  'default'   => '00'
               ),
                array(
                  'id'        => 'minutes',
                  'type'      => 'text',
                  'title'     => t('Minutes'),
                  'default'   => '00'
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
            'year'          => '',
            'month'         => '',
            'day'           => '',
            'hour'          => '',
            'minutes'       => '',
            'el_class'      => '',
            'style_text'    => 'text-dark',
            'animate'       => '',
            'animate_delay' => ''
         ), $attr));

         $class = array();
         $class[] = $el_class;
         $class[] = $style_text;
         if($animate) $class[] = 'wow ' . $animate; 
         $date = $month . '-' . $day . '-' . $year . '-' . $hour . '-' . $minutes . '-00';
         ?>
         <?php ob_start() ?>
         <div class="gsc-countdown <?php print implode($class, ' ') ?>">
            <div class="gva-countdown clearfix" data-countdown="countdown" data-date="<?php print $date ?>" <?php print gavias_content_builder_print_animate_wow_delay($animate, $animate_delay) ?>></div> 
         </div>
         <?php return ob_get_clean() ?>
         <?php
      }

   }
endif;
   



