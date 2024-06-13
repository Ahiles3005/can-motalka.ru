<?php

class ControllerModuleApslider extends Controller {

	private $error = array(); 

	public function index() {

		$this->language->load('module/apslider');
		$this->document->addStyle('view/stylesheet/apslider.css');
		$this->document->addScript('view/javascript/apslider/color/jsColorPicker.min.js');

		// LOADING MODEL
		$models = array ( 
			'setting/setting', 
			'design/layout', 
			'design/banner', 
			'tool/image',
			'localisation/language' 
		);
		
		foreach ($models as $model) { $this->load->model($model); }

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('apslider', $this->request->post);				
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		// LOADING LANGUAGE
		$languages = array(
			'heading_title',
			'text_enabled',
			'text_content_top',
			'text_content_bottom',
			'text_column_left',
			'text_column_right',
			'text_browse',
			'text_clear',

			'text_image_manager',
			'text_basic',
			'text_on',
			'text_off',
			'text_add_slide',
			'text_basic_block',
			'text_image',
			'text_bg_color',
			'text_link',
			'text_actions',
			'text_sotr',
			'text_clickable_slider',
			'text_clickable_button',
			'text_text_block',
			'text_optional',
			'text_no_setup_required',
			'text_title',
			'text_description',
			'text_title_btn',
			'text_block_width',
			'text_addit_settings',
			'text_block_position',
			'text_block_position',
			'text_color_title',
			'text_color_descr',
			'text_color_btn',
			'text_color_text_btn',
			'text_remove_slide',
			'text_add_slider',
			'text_basic_settings',
			'text_slider_size',
			'text_w_h',
			'text_positon',
			'text_layout',
			'text_slider_status',
			'text_sort_order',
			'text_sr_settings',
			'text_full',
			'text_parallax',
			'text_type',
			'text_timeout',
			'text_autoplay',
			'text_arrow',
			'text_point',
			'text_lazy_load',
			'text_slider',
			'text_settings',
			'text_selector',
			'text_element',
			'text_second',
			'text_align',
			'text_align_left',
			'text_align_center',
			'text_align_right',
			'text_align_justify',
			'text_size_element',
			'text_info_element',
			'text_desktop',
			'text_width_block',
			'text_width_btn',
			'text_show_block',
			'text_no_show',
			'text_off_show',
			'text_slider_parallax',
			'text_desktop_size',
			'text_speed_parallax',
			'text_nav',
			'text_creator',
			'text_position_point',
			'text_color_point',
			'text_settings_bar',
			'text_bar',
			'text_position_bar',
			'text_substrate_color',
			'text_progress_color',
			'text_thickness',
			'text_top_progress',
			'text_bottom_progress',
			'text_full_settings',
			'text_t_b',
			'text_margin',
			'text_substrate',
			'text_add_substrate',
			'text_not_substrate',
			'text_basic_color',
			'text_hover_color',

			'remove_slider',

			'button_save',
			'button_cancel',
			'button_apply',
		);

		foreach ($languages as $language) { $this->data[$language] = $this->language->get($language); }

		// ERROR
		if (isset($this->error['warning']))
			 $this->data['error_warning'] = $this->error['warning'];
		else $this->data['error_warning'] = '';

		if (isset($this->error['size']))
			 $this->data['error_size'] = $this->error['size'];
		else $this->data['error_size'] = '';

		if (isset($this->error['slider']))
			 $this->data['error_slider'] = $this->error['slider'];
		else $this->data['error_slider'] = '';

		// BREAD CRUMBS
		$this->data['breadcrumbs']   = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ''
   		);

		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/apslider', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ''
   		);

		// ACTION BUTTON
		$this->data['action']    = $this->url->link('module/apslider',  'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel']    = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['token']     = $this->session->data['token'];
		$this->data['layouts']   = $this->model_design_layout->getLayouts();
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		$this->data['no_image']  = $this->model_tool_image->resize('no_image.jpg', 120, 120);

		$this->data['positions'] = array (
			'top_left', 
			'top_center', 
			'top_right', 
			'center_left', 
			'center_center', 
			'center_right', 
			'bottom_left', 
			'bottom_center', 
			'bottom_right'
		);

		$this->data['animations'] = array (
			'fade',
			'backSlide',
			'goDown',
			'fadeUp'
		);

		$this->data['apslider_item']   = array ();
		$this->data['apslider_module'] = array ();
		
		if (isset($this->request->post['apslider_module'])) 
			 $this->data['apslider_module'] = $this->request->post['apslider_module'];
		elseif ($this->config->get('apslider_module')) 
			 $this->data['apslider_module'] = $this->config->get('apslider_module');

		if (isset($this->request->post['apslider_item'])) 
			 $ap_slidershow = $this->request->post['apslider_item'];
		elseif ($this->config->get('apslider_item')) 
			 $ap_slidershow = $this->config->get('apslider_item');
		else $ap_slidershow = array ();

		foreach ($ap_slidershow as $kay => $slidershow) {

			foreach ($slidershow as $item) {

					if ($item['image'] && file_exists(DIR_IMAGE . $item['image']))
						 $image = $item['image'];
					else $image = 'no_image.jpg';
					
					$this->data['apslider_item'][$kay][] = array (

						'thumb'			 => $this->model_tool_image->resize($image, 120, 120, 100),
						'image' 		 => $image,
						'bg_descr'       => $item['bg_descr'],
						'link'			 => $item['link'],
						'link_to'		 => $item['link_to'],
						'text_title' 	 => $item['text_title'],
						'text_descr' 	 => $item['text_descr'],
						'btn_title'	 	 => $item['btn_title'],
						'text_position'	 => $item['text_position'],

						'box_width1200'  => $item['box_width1200'], 
						'box_width992'   => $item['box_width992'], 
						'box_width768'   => $item['box_width768'], 
						'box_width560'   => $item['box_width560'], 
						'box_width450'   => $item['box_width450'], 
						'box_width320'   => $item['box_width320'],

						'btn_width1200'  => $item['btn_width1200'], 
						'btn_width992'   => $item['btn_width992'], 
						'btn_width768'   => $item['btn_width768'], 
						'btn_width560'   => $item['btn_width560'], 
						'btn_width450'   => $item['btn_width450'], 
						'btn_width320'   => $item['btn_width320'], 

						'show_width1200' => $item['show_width1200'],
						'show_width992'  => $item['show_width992'],
						'show_width768'  => $item['show_width768'],
						'show_width560'  => $item['show_width560'],
						'show_width450'  => $item['show_width450'],
						'show_width320'  => $item['show_width320'],

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

		$this->template  = 'module/apslider.tpl';

		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validate() {

		if (isset($this->request->post['apslider_item'])) {
			foreach ($this->request->post['apslider_module'] as $moduls) {
				if (($moduls['width'] < 1) || ($moduls['height'] < 1)) {
					$this->error['size'] = $this->language->get('error_size');
				}
			}
		}

		if (isset($this->request->post['apslider_item']) && isset($this->request->post['apslider_module'])) {
			if (count($this->request->post['apslider_item']) != count($this->request->post['apslider_module'])){
				$this->error['slider'] = $this->language->get('error_slider');
			}
		}

		if (!$this->user->hasPermission('modify', 'module/apslider')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {return true;}
		else {return false;}

	}

}