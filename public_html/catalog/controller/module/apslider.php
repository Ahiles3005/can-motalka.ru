<?php
class ControllerModuleApslider extends Controller {

	protected function index($setting) {

		static $module = 0;

		$this->document->addStyle('catalog/view/javascript/jquery/apslider/owl.apslider.css?v=' .$this->data['timeModified'] = time(). '');	

		$this->load->model('tool/image');

		$sliders = $this->config->get('apslider_item');

		$this->data['slider']   = array();

		$this->data['width']    = $setting['width'];
		$this->data['height']   = $setting['height'];

		// SLIDER SETTING
		$settings = array (

			'timeout',
			'animation',
			'lazy_load',
			'point',
			'arrow',
			'auto_play',
			'selector',
			'parallax',
			'parallax_speed',
			'full',
			'progress',
			'progress_pos',
			'progress_bg',
			'progress_status',
			'line_height',
			'substrate',
			'max_1200',
			'max_992',
			'max_768',
			'max_560',
			'max_450',
			'max_320',
			'point_color',
			'point_possition',
			'margin_top',
			'margin_bottom'

		);

	
		foreach($settings as $set) { $this->data[$set] = $setting[$set]; }
		
		$language_id = $this->config->get('config_language_id');

		foreach($sliders as $slider => $items) {

			if ($setting['slider_id'] == $slider) {

				foreach($items as $item) {

					if ($item['image'] && file_exists(DIR_IMAGE . $item['image']))
						$image = $item['image'];
					else $image = 'no_image.jpg';

					$this->data['slider'][] = array (

						'thumb'			 => $this->model_tool_image->resize($image, $setting['width'], $setting['height']),
						'bg_descr'       => $item['bg_descr'],
						'link'			 => $item['link'][$language_id],
						'link_to'		 => $item['link_to'],
						'text_title' 	 => $item['text_title'][$language_id],
						'text_descr' 	 => $item['text_descr'][$language_id],
						'btn_title'	 	 => $item['btn_title'][$language_id],
						'text_position'	 => $item['text_position'],

						'box_width1200'  => $item['box_width1200'], 
						'box_width992'   => $item['box_width992'], 
						'box_width768'   => $item['box_width768'], 
						'box_width560'   => $item['box_width560'], 
						'box_width450'   => $item['box_width450'], 
						'box_width320'   => $item['box_width320'],

						'show_width1200' => $item['show_width1200'],
						'show_width992'  => $item['show_width992'],
						'show_width768'  => $item['show_width768'],
						'show_width560'  => $item['show_width560'],
						'show_width450'  => $item['show_width450'],
						'show_width320'  => $item['show_width320'],

						'btn_width1200'  => $item['btn_width1200'], 
						'btn_width992'   => $item['btn_width992'], 
						'btn_width768'   => $item['btn_width768'], 
						'btn_width560'   => $item['btn_width560'], 
						'btn_width450'   => $item['btn_width450'], 
						'btn_width320'   => $item['btn_width320'], 

						'title_color'	 => $item['title_color'],
						'descr_color'	 => $item['descr_color'],
						'btn_color' 	 => $item['btn_color'],
						'colortext_btn'	 => $item['colortext_btn'],

						'title_alig'     => $item['title_alig'],
						'descr_alig'	 => $item['descr_alig'],
						'btn_alig'	     => $item['btn_alig'],
						'btn_hover'		 =>	$item['btn_hover'],
						'colortext_hover'=> $item['colortext_hover']
					);
				}
			}

		}

		$this->data['module'] = $module++;

						
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/apslider.tpl')) {
			$this->template =  $this->config->get('config_template') . '/template/module/apslider.tpl';
		} else {
			$this->template = 'default/template/module/apslider.tpl';
		}
		
		$this->render();

	}
}