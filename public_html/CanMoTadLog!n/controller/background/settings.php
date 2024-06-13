<?php
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ControllerBackgroundSettings extends Controller {
	private $error = array();
 
	public function index() {
		$this->language->load('background/manager'); 

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/background.manager.css');
		
		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('setting/setting');
			$this->model_setting_setting->editSetting('bg_mgr', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success_settings');

			$this->redirect($this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('text_settings');
		//Set language variables
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_insert'] = $this->language->get('button_text_insert');
		$this->data['button_text_copy'] = $this->language->get('button_text_copy');
		$this->data['button_text_delete'] = $this->language->get('button_text_delete');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		
		$this->data['entry_bg_type'] = $this->language->get('entry_bg_type');
			$this->data['text_bg_type_one'] = $this->language->get('text_bg_type_one');
			$this->data['text_bg_type_two'] = $this->language->get('text_bg_type_two');
			$this->data['text_bg_type_three'] = $this->language->get('text_bg_type_three');
		
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_setting_warn_info'] = $this->language->get('text_setting_warn_info');
		
		$this->data['text_setting_mgr_on'] = $this->language->get('text_setting_mgr_on');
		$this->data['text_setting_css_input_method'] = $this->language->get('text_setting_css_input_method');
			$this->data['text_setting_css_input_method_1'] = $this->language->get('text_setting_css_input_method_1');
			$this->data['text_setting_css_input_method_2'] = $this->language->get('text_setting_css_input_method_2');
		$this->data['text_setting_js_input_method'] = $this->language->get('text_setting_js_input_method');
			$this->data['text_setting_js_input_method_1'] = $this->language->get('text_setting_js_input_method_1');
			$this->data['text_setting_js_input_method_2'] = $this->language->get('text_setting_js_input_method_2');
		$this->data['text_setting_inherit_product_patterns'] = $this->language->get('text_setting_inherit_product_patterns');
		$this->data['text_setting_include_base64'] = $this->language->get('text_setting_include_base64');
		$this->data['text_setting_enable_db_cache'] = $this->language->get('text_setting_enable_db_cache');
		$this->data['text_setting_enable_css_cache'] = $this->language->get('text_setting_enable_css_cache');
		$this->data['text_setting_enable_js_cache'] = $this->language->get('text_setting_enable_js_cache');
		$this->data['text_setting_container_id'] = $this->language->get('text_setting_container_id');
		$this->data['text_setting_image_dir'] = $this->language->get('text_setting_image_dir');
		$this->data['text_setting_fix_code'] = $this->language->get('text_setting_fix_code');
		$this->data['bg_mgr_on'] 						= $this->config->get('bg_mgr_on');
		$this->data['bg_mgr_css_input_method'] 			= $this->config->get('bg_mgr_css_input_method');
		$this->data['bg_mgr_js_input_method'] 			= $this->config->get('bg_mgr_js_input_method');
		$this->data['bg_mgr_inherit_product_patterns'] 	= $this->config->get('bg_mgr_inherit_product_patterns');
		$this->data['bg_mgr_include_base64'] 			= $this->config->get('bg_mgr_include_base64');
		$this->data['bg_mgr_enable_db_cache'] 			= $this->config->get('bg_mgr_enable_db_cache');
		$this->data['bg_mgr_enable_css_cache']	 		= $this->config->get('bg_mgr_enable_css_cache');
		$this->data['bg_mgr_enable_js_cache']	 		= $this->config->get('bg_mgr_enable_js_cache');
		$this->data['bg_mgr_container_id'] 				= $this->config->get('bg_mgr_container_id');
		$this->data['bg_mgr_image_dir'] 				= $this->config->get('bg_mgr_image_dir');
		$this->data['bg_mgr_fix_code'] 					= $this->config->get('bg_mgr_fix_code');
		
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
       		'text'      => $this->language->get('text_settings'),
			'href'      => $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['save'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_elements'] = $this->language->get('text_elements');
		$this->data['link_patterns'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_layouts'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_categories'] = $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_settings'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
		$this->load->model('background/manager');
		//cache
		$this->data['text_cache_count'] = $this->language->get('text_clear_cache').' ('.$this->model_background_manager->getCacheCount().')';
		$this->data['link_clear_cache'] = $this->url->link('background/cache/clear', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['token'] = $this->session->data['token'];
		//Set settings
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		$this->template = 'background/settings.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
		
	}
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'background/settings')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->error) {return true;} else {return false;}
	}
}
?>