<?php
class ControllerModulereviewer extends Controller {
	private $error = array(); 
	
	public function index() {
		$this->load->language('module/reviewer');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		$this->load->model('catalog/category');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('reviewer', $this->request->post);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			if($this->request->post['apply'])
			$this->redirect($this->url->link('module/reviewer', 'success=1&token=' . $this->session->data['token'], 'SSL'));
			else
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if( !empty($this->request->get['success'] ) )
		$this->data['success'] = $this->language->get('text_success');
		else
		$this->data['success'] = '';
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['tab_module'] = $this->language->get('tab_module');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_root'] = $this->language->get('text_root');
		$this->data['text_all_manufacturers'] = $this->language->get('text_all_manufacturers');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_date_added'] = $this->language->get('text_date_added');
		$this->data['text_rating'] = $this->language->get('text_rating');
		$this->data['text_textlenght'] = $this->language->get('text_textlenght');
		$this->data['text_random'] = $this->language->get('text_random');
		

		
		$this->data['entry_main_options'] = $this->language->get('entry_main_options');
		$this->data['entry_scroller_options'] = $this->language->get('entry_scroller_options');
		$this->data['entry_product_options'] = $this->language->get('entry_product_options');
		
		$this->data['entry_sort'] = $this->language->get('entry_sort');
		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_source'] = $this->language->get('entry_source');
		$this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
		$this->data['entry_product'] = $this->language->get('entry_product');
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_type'] = $this->language->get('entry_type');
		$this->data['entry_minrate'] = $this->language->get('entry_minrate');
		$this->data['stars'] = $this->language->get('stars');
		$this->data['entry_minprice'] = $this->language->get('entry_minprice');
		$this->data['currency'] = $this->config->get('config_currency');
		$this->data['entry_count'] = $this->language->get('entry_count');
		$this->data['entry_visible'] = $this->language->get('entry_visible');
		$this->data['entry_scroll'] = $this->language->get('entry_scroll');
		$this->data['entry_autoscroll'] = $this->language->get('entry_autoscroll');
		$this->data['entry_animationspeed'] = $this->language->get('entry_animationspeed');
		$this->data['entry_hoverpause'] = $this->language->get('entry_hoverpause');
		$this->data['entry_show_link'] = $this->language->get('entry_show_link');
		$this->data['entry_disableauto'] = $this->language->get('entry_disableauto');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_show_nick'] = $this->language->get('entry_show_nick');
		$this->data['entry_show_date'] = $this->language->get('entry_show_date');
		$this->data['entry_show_rate'] = $this->language->get('entry_show_rate');
		$this->data['entry_show_text'] = $this->language->get('entry_show_text');
		$this->data['entry_cut_text'] = $this->language->get('entry_cut_text');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_image_size'] = $this->language->get('entry_image_size');
		
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
			'href'      => $this->url->link('module/reviewer', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/reviewer', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['token'] = $this->session->data['token'];
		
		$this->data['modules'] = array();
		
		
		if (isset($this->request->post['reviewer_module'])) {
			$this->data['modules'] = $this->request->post['reviewer_module'];
		} elseif ($this->config->get('reviewer_module')) { 
			$this->data['modules'] = $this->config->get('reviewer_module');
		}
		
		
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
		
		$this->load->model('catalog/manufacturer');

		$results = $this->model_catalog_manufacturer->getManufacturers();

		foreach ($results as $result) {
							
			$this->data['manufacturers'][] = array(
				'manufacturer_id' => $result['manufacturer_id'],
				'name'        => $result['name']
			);
		}
		
		$this->data['rootcats'] = $this->model_catalog_category->getCategories(0);
		
		$this->load->model('catalog/product');

		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
				
		$this->template = 'module/reviewer.tpl';
		$this->children = array(
			'common/header',	
			'common/footer'	
		);
		
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/reviewer')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['reviewer_module'])) {
			foreach ($this->request->post['reviewer_module'] as $key => $value) {
				if (!$value['count'] || $value['count'] < 1) {
					$this->error['warning'] = sprintf($this->language->get('error_count'), $key);
				}

				if (!$value['visible'] || $value['visible'] < 1) {
					$this->error['warning'] = sprintf($this->language->get('error_visible'), $key);
				}
				
				if ((!$value['image_width'] || !$value['image_height'])||(($value['image_height']< 1) || ($value['image_width'] < 1))) {
					$this->error['warning'] = sprintf($this->language->get('error_image'), $key);
				}
				if (!$value['scroll'] || $value['scroll'] < 1) {
					$this->error['warning'] = sprintf($this->language->get('error_scroll'), $key);
				}
				if (!$value['animationspeed'] || $value['animationspeed'] < 1) {
					$this->error['warning'] = sprintf($this->language->get('error_animationspeed'), $key);
				}
			}	
			
		}
			
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
}
?>