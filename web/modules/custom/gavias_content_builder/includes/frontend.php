<?php
function gavias_content_builder_frontend( $params ) {
	$output = '';
	$classes = array(
		'1' => 'col-lg-1 col-md-1 col-sm-2 col-xs-12',
		'2' => 'col-lg-2 col-md-2 col-sm-4 col-xs-12',
		'3' => 'col-lg-3 col-md-3 col-sm-6 col-xs-12',
		'4' => 'col-lg-4 col-md-4 col-sm-12 col-xs-12',
		'5' => 'col-lg-5 col-md-5 col-sm-12 col-xs-12',
		'6' => 'col-lg-6 col-md-6 col-sm-12 col-xs-12',
		'7' => 'col-lg-7 col-md-7 col-sm-12 col-xs-12',
		'8' => 'col-lg-8 col-md-8 col-sm-12 col-xs-12',
		'9' => 'col-lg-9 col-md-9 col-sm-12 col-xs-12',
		'10' => 'col-lg-10 col-md-10 col-sm-12 col-xs-12',
		'11' => 'col-lg-11 col-md-11 col-sm-12 col-xs-12',
		'12' => 'col-lg-12 col-md-12 col-sm-12 col-xs-12',
	);
	$content = json_decode($params, true);
	ob_start();
	if ( ! empty( $content ) ) {
		foreach ( $content as $k => $row ) {
			print (gavias_content_builder_render_el( $row ) );
		}
	}
	$output = ob_get_clean();		
	return $output;
}

 	function gavias_content_builder_render_el( $data = array(), $content = '' ) {
		$settings = ! empty( $data['settings'] ) ? $data['settings'] : array();
		$data['settings']['first_level'] = true;
		$content_columns = '';
		//print "<pre>"; print_r($data);
		// if ( ! empty( $data['row'] ) ) {
		// 	return gavias_content_builder_render_el( $data['row'] );
		// }

		if ( ! empty( $data['columns']) ){
			foreach ($data['columns'] as $key => $column) {
				$content_elements = '';
				$column['settings']['col_lg'] = $column['col_lg'];

				if(! empty( $column['elements'])){
					foreach ($column['elements'] as $key => $element) {
						
						$content_row_1 = ''; 
						if(!empty($element['row'])){
							$content_row_1 = gavias_content_builder_render_row($element['row']);
						}

						if($element['element_name']=='gva_row'){
							$content_elements .= $content_row_1;
						}else{
							$content_elements .= gavias_content_builder_render_element($element['element_name'], $element['settings']);
						}
					}
				}
				$content_columns .= gavias_content_builder_render_element($column['element_name'], $column['settings'], $content_elements);
			}
		}
 
		$content = gavias_content_builder_render_element($data['element_name'], $data['settings'], $content_columns);

		return $content;

	}

	function gavias_content_builder_render_row($row = array()){
		
			$content_row = '';
			$content_columns = '';

			if ( ! empty( $row['columns']) ){
				foreach ($row['columns'] as $key => $column) {
					$content_elements = '';
					$column['settings']['col_lg'] = $column['col_lg'];
					if(! empty( $column['elements'])){
						foreach ($column['elements'] as $key => $element) {
							if($element['element_name'] == 'gva_row'){
								$content_elements .= gavias_content_builder_render_row($element['row']);
							}else{
								$content_elements .= gavias_content_builder_render_element($element['element_name'], $element['settings']);
							}
						}
					}
					$content_columns .= gavias_content_builder_render_element($column['element_name'], $column['settings'], $content_elements);
				}
			}

			$content_row = gavias_content_builder_render_element($row['element_name'], $row['settings'], $content_columns);

			return $content_row;
	}




	function gavias_content_builder_render_element($id = '', $settings = array(), $content =''){
		$_class = 'element_' . $id;
		if( class_exists($_class) ){
			$s = new $_class;
    		if(method_exists($s, 'render_content')){
    			foreach ( $settings as $key => $setting ) {
					if ( $key === $id ) {
						foreach ( $setting as $name => $value ) {
							$settings[$name] = $value;
						}
					}
				}
    			return $s->render_content( $settings, $content);
    		}
		}
	}