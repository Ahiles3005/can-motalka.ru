<?php
class ControllerModuleCustomBackground extends Controller {
	private $error = array(); 
	
	public function index() {   
		$this->language->load('module/custom_background');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		$this->load->model('tool/image');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
			
			if ($this->request->post['apply']) {
				$url = $this->url->link('module/custom_background', 'token=' . $this->session->data['token'], 'SSL');
			} else {
				$url = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
			}
			
			unset($this->request->post['apply']);
			
			$this->model_setting_setting->editSetting('custom_background', $this->request->post);
		
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->redirect($url);
		}
		
		$this->data['token'] = $this->session->data['token'];
		
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 50, 50);
				
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');		
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		
		$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_background_image'] = $this->language->get('entry_background_image');
		$this->data['entry_background_link'] = $this->language->get('entry_background_link');
		$this->data['entry_product'] = $this->language->get('entry_product');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['button_apply'] = $this->language->get('button_apply');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->error['image'])) {
			$this->data['error_image'] = $this->error['image'];
		} else {
			$this->data['error_image'] = array();
		}
		
  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/custom_background', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/custom_background', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->load->model('catalog/category');		
		$this->data['categories'] = $this->model_catalog_category->getCategories(0);
		
		if (isset($this->request->post['popup_options_category'])) {
			$this->data['custom_background_category'] = $this->request->post['popup_options_category'];
		} elseif ($this->config->get('custom_background_category')) { 
			$this->data['custom_background_category'] = $this->config->get('popup_options_category');
		} else {
			$this->data['custom_background_category'] = array();
		}

		$this->data['modules'] = array();
		
		if (isset($this->request->post['custom_background_module'])) {
			$this->data['modules'] = $this->request->post['custom_background_module'];
		} elseif ($this->config->get('custom_background_module')) { 
			$this->data['modules'] = $this->config->get('custom_background_module');
		}				
				
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/custom_background.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'module/custom_background')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['custom_background_module'])) {
			foreach ($this->request->post['custom_background_module'] as $key => $value) {
				if (!$value['image_width'] || !$value['image_height']) {
					$this->error['image'][$key] = $this->language->get('error_image');
				}
			}
		}		
				
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
}
?>