<?php
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ControllerBackgroundPattern extends Controller {
	private $error = array();
	public function index() {
		$this->language->load('background/manager'); 

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/background.manager.css');
		
		$this->load->model('background/manager');
			//OnForm Submitting
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				
				// $this->model_mcj_setting->editSetting('bg_mgr', $this->request->post);
				
				$this->session->data['success'] = $this->language->get('text_success');

				$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
			}
		$this->data['patterns'] = $this->model_background_manager->getPatterns();
		if (!empty($this->data['patterns'])) {
			foreach ($this->data['patterns'] as $key => $value) {
				if (isset($value['additional_images']) && !empty($value['additional_images'])) {
					$value['additional_images'] = json_decode($value['additional_images']);
				}
				$value['view_link'] = HTTP_CATALOG.'?session='. $this->session->data['token'].'&action=preview&'.http_build_query($value);
				$value['edit_link'] = $this->url->link('background/pattern/edit', 'token=' . $this->session->data['token'].'&pid='.$value['id'], 'SSL');
				$this->data['patterns'][$key] = $value;
			}
		}

		$this->data['heading_title'] = $this->language->get('text_patterns');
		//Set language variables
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_insert'] = $this->language->get('button_text_insert');
		$this->data['button_text_copy'] = $this->language->get('button_text_copy');
		$this->data['button_text_delete'] = $this->language->get('button_text_delete');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');
		$this->data['button_text_edit'] = $this->language->get('button_text_edit');
		$this->data['text_view'] = $this->language->get('text_view');

		$this->data['entry_bg_type'] = $this->language->get('entry_bg_type');
		$this->data['text_link_target'] = $this->language->get('text_link_target');
		$this->data['pattern_types'] = array($this->language->get('text_bg_type_one'), $this->language->get('text_bg_type_two'), $this->language->get('text_bg_type_three'));

		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_list_empty'] = $this->language->get('text_list_empty');
		$this->data['text_success'] = $this->language->get('text_success');
		$this->data['text_pattern_name'] = $this->language->get('text_pattern_name');
		$this->data['text_bg_type'] = $this->language->get('text_bg_type');
		$this->data['text_action'] = $this->language->get('text_action');
		$this->data['text_elements'] = $this->language->get('text_elements');
		
		$this->data['text_bg_type_one'] = $this->language->get('text_bg_type_one');
		$this->data['text_bg_type_two'] = $this->language->get('text_bg_type_two');
		$this->data['text_bg_type_three'] = $this->language->get('text_bg_type_three');
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_patterns'),
			'href'      => $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['add'] = $this->url->link('background/pattern/add', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['delete'] = $this->url->link('background/pattern/delete', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['copy'] = $this->url->link('background/pattern/copy', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['link_patterns'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_layouts'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_categories'] = $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_settings'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
		//cache
		$this->data['text_cache_count'] = $this->language->get('text_clear_cache').' ('.$this->model_background_manager->getCacheCount().')';
		$this->data['link_clear_cache'] = $this->url->link('background/cache/clear', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['token'] = $this->session->data['token'];
		//Set settings
		$this->data['server'] = $this->server;
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		$this->template = 'background/pattern_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
		
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'background/pattern')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

	 	// if (!$this->request->post['config_name']) {
	 	// 	$this->error['name'] = $this->language->get('error_name');
	 	// }	
		// if (!$this->request->post['config_name']) {
	 	// 		$this->error['name'] = $this->language->get('error_name');
	 	// 	}
		
		if (!$this->error) {return true;} else {return false;}
	}

	public function edit(){
		$this->language->load('background/manager'); 
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addScript('view/javascript/jscolor/jscolor.js');
		$this->document->addStyle('view/stylesheet/background.manager.css');
		$this->load->model('background/manager');
			//OnForm Submitting
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				// $this->model_mcj_setting->editSetting('bg_mgr', $this->request->post);
				$this->model_background_manager->editPattern($this->request->post);
				
				$this->session->data['success'] = $this->language->get('text_success');
				if (isset($this->request->post['from'])) {
					$this->redirect($this->url->link('background/pattern/edit', 'token=' . $this->session->data['token'].'&pid='.$this->request->post['pid'], 'SSL'));
				}else{
					$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
				}
			}
		$this->data['pattern'] = $this->model_background_manager->getPattern($this->request->get['pid']);
		
		$this->load->model('tool/image');
		if ($this->data['pattern'][0]['img1'] && file_exists(DIR_IMAGE . $this->data['pattern'][0]['img1']) && is_file(DIR_IMAGE . $this->data['pattern'][0]['img1'])) {
			$this->data['pattern'][0]['img1_thumb'] = $this->model_tool_image->resize($this->data['pattern'][0]['img1'], 100, 100);		
		} else {
			$this->data['pattern'][0]['img1_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if ($this->data['pattern'][0]['img2'] && file_exists(DIR_IMAGE . $this->data['pattern'][0]['img2']) && is_file(DIR_IMAGE . $this->data['pattern'][0]['img2'])) {
			$this->data['pattern'][0]['img2_thumb'] = $this->model_tool_image->resize($this->data['pattern'][0]['img2'], 100, 100);		
		} else {
			$this->data['pattern'][0]['img2_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if ($this->data['pattern'][0]['img3'] && file_exists(DIR_IMAGE . $this->data['pattern'][0]['img3']) && is_file(DIR_IMAGE . $this->data['pattern'][0]['img3'])) {
			$this->data['pattern'][0]['img3_thumb'] = $this->model_tool_image->resize($this->data['pattern'][0]['img3'], 100, 100);		
		} else {
			$this->data['pattern'][0]['img3_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if ($this->data['pattern'][0]['img4'] && file_exists(DIR_IMAGE . $this->data['pattern'][0]['img4']) && is_file(DIR_IMAGE . $this->data['pattern'][0]['img4'])) {
			$this->data['pattern'][0]['img4_thumb'] = $this->model_tool_image->resize($this->data['pattern'][0]['img4'], 100, 100);		
		} else {
			$this->data['pattern'][0]['img4_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		// Additional images
		$this->data['additional_images'] = array();
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		if (!empty($this->data['pattern'][0]['additional_images'])) {
			foreach ($this->data['pattern'][0]['additional_images'] as $additional_image) {
				$id_s[] = $additional_image['id'];
				if ($additional_image['image'] && file_exists(DIR_IMAGE . $additional_image['image'])) {
					$image = $additional_image['image'];
				} else {
					$image = 'no_image.jpg';
				}
				
				$this->data['additional_images'][] = array(
					'id'      	=> $additional_image['id'],
					'image'     => $image,
					'thumb'     => $this->model_tool_image->resize($image, 100, 100)
				);
			}
			$this->data['image_row'] = max($id_s)+1;
		}else{
			$this->data['image_row'] = 5;
		}
		$this->data['heading_title'] = $this->language->get('text_pattern_edit');
		//Set language variables
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_insert'] = $this->language->get('button_text_insert');
		$this->data['button_text_copy'] = $this->language->get('button_text_copy');
		$this->data['button_text_delete'] = $this->language->get('button_text_delete');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');
		$this->data['button_text_preview'] = $this->language->get('button_text_preview');
		$this->data['button_text_live_edit'] = $this->language->get('button_text_live_edit');
		$this->data['button_text_global_vars'] = $this->language->get('button_text_global_vars');
		$this->data['button_text_snippets'] = $this->language->get('button_text_snippets');
		$this->data['button_text_edit'] = $this->language->get('button_text_edit');
		$this->data['button_text_add_image'] = $this->language->get('button_text_add_image');
		$this->data['button_text_remove_image'] = $this->language->get('button_text_remove_image');

		$this->data['entry_bg_type'] = $this->language->get('entry_bg_type');
			$this->data['text_bg_type_one'] = $this->language->get('text_bg_type_one');
			$this->data['text_bg_type_two'] = $this->language->get('text_bg_type_two');
			$this->data['text_bg_type_three'] = $this->language->get('text_bg_type_three');
		
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_pattern_edit'] = $this->language->get('text_pattern_edit');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_list_empty'] = $this->language->get('text_list_empty');
		
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_align1'] = $this->language->get('text_align1');
		$this->data['text_align2'] = $this->language->get('text_align2');
		$this->data['text_align3'] = $this->language->get('text_align3');
		$this->data['text_align4'] = $this->language->get('text_align4');
		$this->data['text_align5'] = $this->language->get('text_align5');
		$this->data['text_align6'] = $this->language->get('text_align6');
		$this->data['text_align7'] = $this->language->get('text_align7');
		$this->data['text_align8'] = $this->language->get('text_align8');
		$this->data['text_align9'] = $this->language->get('text_align9');
		$this->data['text_img_repeat1'] = $this->language->get('text_img_repeat1');
		$this->data['text_img_repeat2'] = $this->language->get('text_img_repeat2');
		$this->data['text_img_repeat3'] = $this->language->get('text_img_repeat3');
		$this->data['text_img_repeat4'] = $this->language->get('text_img_repeat4');
		$this->data['text_pattern_name'] = $this->language->get('text_pattern_name');
		
		$this->data['text_bg_type'] = 		$this->language->get('text_bg_type');
		$this->data['text_img1'] = 		$this->language->get('text_img1');
		$this->data['text_img2'] = 		$this->language->get('text_img2');
		$this->data['text_img3'] = 		$this->language->get('text_img3');
		$this->data['text_img4'] = 		$this->language->get('text_img4');
		$this->data['text_img1_align'] = 		$this->language->get('text_img1_align');
		$this->data['text_img2_align'] = 		$this->language->get('text_img2_align');
		$this->data['text_img3_align'] = 		$this->language->get('text_img3_align');
		$this->data['text_img4_align'] = 		$this->language->get('text_img4_align');
		$this->data['text_img1_repeat'] = 		$this->language->get('text_img1_repeat');
		$this->data['text_img2_repeat'] = 		$this->language->get('text_img2_repeat');
		$this->data['text_img3_repeat'] = 		$this->language->get('text_img3_repeat');
		$this->data['text_img4_repeat'] = 		$this->language->get('text_img4_repeat');
		$this->data['text_fix_left_right'] = 		$this->language->get('text_fix_left_right');
		$this->data['text_color1'] = 		$this->language->get('text_color1');
		$this->data['text_color2'] = 		$this->language->get('text_color2');
		$this->data['text_fix_bg'] = 		$this->language->get('text_fix_bg');
		$this->data['text_fix_bg_cont'] = 		$this->language->get('text_fix_bg_cont');
		$this->data['text_full_width'] = 		$this->language->get('text_full_width');
		$this->data['text_full_width_cont'] = 		$this->language->get('text_full_width_cont');
			$this->data['text_full_width_0'] = 		$this->language->get('text_full_width_0');
			$this->data['text_full_width_1'] = 		$this->language->get('text_full_width_1');
			$this->data['text_full_width_2'] = 		$this->language->get('text_full_width_2');
			$this->data['text_full_width_3'] = 		$this->language->get('text_full_width_3');
		$this->data['text_show_shadow'] = 		$this->language->get('text_show_shadow');
		$this->data['text_shadow_code'] = 		$this->language->get('text_shadow_code');
		$this->data['text_padding'] = 		$this->language->get('text_padding');
		//migration transfer variables
		$this->data['text_move_to_custom_css'] = 		$this->language->get('text_move_to_custom_css');
		$this->data['alert_text_move_to_custom_css'] = 		$this->language->get('alert_text_move_to_custom_css');
		$this->data['button_text_move_to_custom_css'] = 		$this->language->get('button_text_move_to_custom_css');
		
		$this->data['text_link'] = 		$this->language->get('text_link');
		$this->data['text_link_target'] = 		$this->language->get('text_link_target');
			$this->data['text_link_target_1'] = 		$this->language->get('text_link_target_1');
			$this->data['text_link_target_2'] = 		$this->language->get('text_link_target_2');
		$this->data['text_custom_css'] = 		$this->language->get('text_custom_css');
		$this->data['text_custom_js'] = 		$this->language->get('text_custom_js');
		$this->data['text_additional_images'] = 		$this->language->get('text_additional_images');
		//cache
		$this->data['text_cache_count'] = $this->language->get('text_clear_cache').' ('.$this->model_background_manager->getCacheCount().')';
		$this->data['link_clear_cache'] = $this->url->link('background/cache/clear', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_patterns'),
			'href'      => $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_pattern_edit'),
			'href'      => $this->url->link('background/pattern/edit', 'token=' . $this->session->data['token'].'&pid='.$this->request->get['pid'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['save'] = $this->url->link('background/pattern/edit', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['upload'] = $this->url->link('common/filemanager', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['upload_image'] = $this->url->link('common/filemanager/image', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_elements'] = $this->language->get('text_elements');
		$this->data['link_patterns'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_layouts'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_categories'] = $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_settings'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
		
		// migration  delete shadow and padding_text
		if (!empty($this->data['pattern'][0]['shadow_text']) || !empty($this->data['pattern'][0]['padding_text'])) {
			$code = '';
			if (!empty($this->data['pattern'][0]['shadow_text'])) {
				$code .= $this->data['pattern'][0]['shadow_text'];
			}
			if (!empty($this->data['pattern'][0]['padding_text'])) {
				$code .= 'padding:'.$this->data['pattern'][0]['padding_text'].';';
			}
			$this->data['migraton_custom_css'] = '[container_id]{'.$code.'}';
		}

		$this->data['token'] = $this->session->data['token'];
		//Set settings
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		$this->template = 'background/pattern_edit.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
	}
	public function add(){
		$this->language->load('background/manager'); 
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addScript('view/javascript/jscolor/jscolor.js');
		$this->document->addStyle('view/stylesheet/background.manager.css');
		$this->load->model('background/manager');
			//OnForm Submitting
			if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
				
				// $this->model_mcj_setting->editSetting('bg_mgr', $this->request->post);
				$this->model_background_manager->addPattern($this->request->post);
				
				$this->session->data['success'] = $this->language->get('text_success');

				$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
			}
		$this->data['pattern'][0]=array(
			'id' 				=> '0',
			'pattern_name' 		=> $this->language->get('text_new_pattern_name'),
			'bg_type' 			=> '1',
			'img1' 				=> '',
			'img2' 				=> '',
			'img3' 				=> '',
			'img4' 				=> '',
			'img1_align' 		=> '1',
			'img2_align' 		=> '1',
			'img3_align' 		=> '1',
			'img4_align' 		=> '1',
			'img1_repeat' 		=> '4',
			'img2_repeat' 		=> '4',
			'img3_repeat' 		=> '4',
			'img4_repeat' 		=> '4',
			'fix_left_right' 	=> '0',
			'fix_bg' 			=> '0',
			'fix_bg_cont'		=> '0',
			'full_width' 		=> '0',
			'full_width_cont'	=> '0',
			'show_shadow' 		=> '0',
			'color1' 			=> 'ffffff',
			'color2' 			=> 'ffffff',
			'shadow_text' 		=> '',
			'padding_text' 		=> '',
			'bglink' 			=> '',
			'bglink_target' 	=> '0',
			'custom_css' 		=> '',
			'custom_js' 		=> '',
			'additional_images' => array()
		);
		
		$this->load->model('tool/image');
	
		$this->data['pattern'][0]['img1_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		$this->data['pattern'][0]['img2_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		$this->data['pattern'][0]['img3_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		$this->data['pattern'][0]['img4_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		// Additional images
		$this->data['additional_images'] = array();
		$this->data['image_row'] = 5;
		$this->data['heading_title'] = $this->language->get('text_pattern_add');
		//Set language variables
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_insert'] = $this->language->get('button_text_insert');
		$this->data['button_text_copy'] = $this->language->get('button_text_copy');
		$this->data['button_text_delete'] = $this->language->get('button_text_delete');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');
		$this->data['button_text_preview'] = $this->language->get('button_text_preview');
		$this->data['button_text_live_edit'] = $this->language->get('button_text_live_edit');
		$this->data['button_text_global_vars'] = $this->language->get('button_text_global_vars');
		$this->data['button_text_snippets'] = $this->language->get('button_text_snippets');
		$this->data['button_text_edit'] = $this->language->get('button_text_edit');
		$this->data['button_text_add_image'] = 	$this->language->get('button_text_add_image');
		$this->data['button_text_remove_image'] = $this->language->get('button_text_remove_image');

		$this->data['entry_bg_type'] = $this->language->get('entry_bg_type');
			$this->data['text_bg_type_one'] = $this->language->get('text_bg_type_one');
			$this->data['text_bg_type_two'] = $this->language->get('text_bg_type_two');
			$this->data['text_bg_type_three'] = $this->language->get('text_bg_type_three');
		
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_pattern_edit'] = $this->language->get('text_pattern_edit');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_list_empty'] = $this->language->get('text_list_empty');
		
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_preview'] = $this->language->get('text_preview');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_align1'] = $this->language->get('text_align1');
		$this->data['text_align2'] = $this->language->get('text_align2');
		$this->data['text_align3'] = $this->language->get('text_align3');
		$this->data['text_align4'] = $this->language->get('text_align4');
		$this->data['text_align5'] = $this->language->get('text_align5');
		$this->data['text_align6'] = $this->language->get('text_align6');
		$this->data['text_align7'] = $this->language->get('text_align7');
		$this->data['text_align8'] = $this->language->get('text_align8');
		$this->data['text_align9'] = $this->language->get('text_align9');
		$this->data['text_img_repeat1'] = $this->language->get('text_img_repeat1');
		$this->data['text_img_repeat2'] = $this->language->get('text_img_repeat2');
		$this->data['text_img_repeat3'] = $this->language->get('text_img_repeat3');
		$this->data['text_img_repeat4'] = $this->language->get('text_img_repeat4');
		$this->data['text_pattern_name'] = $this->language->get('text_pattern_name');
		
		$this->data['text_bg_type'] = 		$this->language->get('text_bg_type');
		$this->data['text_img1'] = 		$this->language->get('text_img1');
		$this->data['text_img2'] = 		$this->language->get('text_img2');
		$this->data['text_img3'] = 		$this->language->get('text_img3');
		$this->data['text_img4'] = 		$this->language->get('text_img4');
		$this->data['text_img1_align'] = 		$this->language->get('text_img1_align');
		$this->data['text_img2_align'] = 		$this->language->get('text_img2_align');
		$this->data['text_img3_align'] = 		$this->language->get('text_img3_align');
		$this->data['text_img4_align'] = 		$this->language->get('text_img4_align');
		$this->data['text_img1_repeat'] = 		$this->language->get('text_img1_repeat');
		$this->data['text_img2_repeat'] = 		$this->language->get('text_img2_repeat');
		$this->data['text_img3_repeat'] = 		$this->language->get('text_img3_repeat');
		$this->data['text_img4_repeat'] = 		$this->language->get('text_img4_repeat');
		$this->data['text_fix_left_right'] = 		$this->language->get('text_fix_left_right');
		$this->data['text_color1'] = 		$this->language->get('text_color1');
		$this->data['text_color2'] = 		$this->language->get('text_color2');
		$this->data['text_fix_bg'] = 		$this->language->get('text_fix_bg');
		$this->data['text_fix_bg_cont'] = 		$this->language->get('text_fix_bg_cont');
		$this->data['text_full_width'] = 		$this->language->get('text_full_width');
		$this->data['text_full_width_cont'] = 		$this->language->get('text_full_width_cont');
			$this->data['text_full_width_0'] = 		$this->language->get('text_full_width_0');
			$this->data['text_full_width_1'] = 		$this->language->get('text_full_width_1');
			$this->data['text_full_width_2'] = 		$this->language->get('text_full_width_2');
			$this->data['text_full_width_3'] = 		$this->language->get('text_full_width_3');
		$this->data['text_show_shadow'] = 		$this->language->get('text_show_shadow');
		$this->data['text_shadow_code'] = 		$this->language->get('text_shadow_code');
		$this->data['text_padding'] = 		$this->language->get('text_padding');
		$this->data['text_link'] = 		$this->language->get('text_link');
		$this->data['text_link_target'] = 		$this->language->get('text_link_target');
			$this->data['text_link_target_1'] = 		$this->language->get('text_link_target_1');
			$this->data['text_link_target_2'] = 		$this->language->get('text_link_target_2');
		$this->data['text_custom_css'] = 		$this->language->get('text_custom_css');
		$this->data['text_custom_js'] = 		$this->language->get('text_custom_js');
		$this->data['text_additional_images'] = 		$this->language->get('text_additional_images');
		
		//cache
		$this->data['text_cache_count'] = $this->language->get('text_clear_cache').' ('.$this->model_background_manager->getCacheCount().')';
		$this->data['link_clear_cache'] = $this->url->link('background/cache/clear', 'token=' . $this->session->data['token'], 'SSL');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_patterns'),
			'href'      => $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_pattern_add'),
			'href'      => $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['save'] = $this->url->link('background/pattern/add', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['upload'] = $this->url->link('common/filemanager', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['upload_image'] = $this->url->link('common/filemanager/image', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_elements'] = $this->language->get('text_elements');
		$this->data['link_patterns'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_layouts'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_categories'] = $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_settings'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
		
		// migration container_id
		$this->data['bg_mgr_container_id'] 				= $this->config->get('bg_mgr_container_id');
		
		$this->data['token'] = $this->session->data['token'];
		//Set settings
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		$this->template = 'background/pattern_edit.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
	}

	public function delete() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateDelete()) {
			$this->language->load('background/manager'); 
			
			$this->load->model('background/manager');

			$this->model_background_manager->deletePattern($this->request->post['selected']);
			
			$this->session->data['success'] = $this->language->get('text_success_deleted');

			$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
		}else{
			$this->error['warning'] = $this->language->get('error_permission');
			$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
		}
	}
	public function copy() {
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->language->load('background/manager'); 
			
			$this->load->model('background/manager');

			$this->model_background_manager->copyPattern($this->request->post['selected'], $this->language->get('text_copy'));
			
			$this->session->data['success'] = $this->language->get('text_success_copied');

			$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
		}else{
			$this->error['warning'] = $this->language->get('error_permission');
			$this->redirect($this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL'));
		}
	}
	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'background/pattern')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
 
		if (!$this->error) {
			return TRUE; 
		} else {
			return FALSE;
		}
	}
}
?>