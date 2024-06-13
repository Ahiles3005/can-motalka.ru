<?php
class ControllerModuleMultiProduct extends Controller{
	private $error = array(); 
	
	public function index() {   
	
		$this->load->language('module/multiproduct');

		$this->document->setTitle(strip_tags($this->language->get('heading_title')));
		
		$this->load->model('setting/setting');
				
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$posts = $this->request->post;
			
			$this->model_setting_setting->editSetting('multiproduct', $posts);		
					
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}
				
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_content_top'] = $this->language->get('text_content_top');
		$this->data['text_content_bottom'] = $this->language->get('text_content_bottom');		
		$this->data['text_column_left'] = $this->language->get('text_column_left');
		$this->data['text_column_right'] = $this->language->get('text_column_right');
		$this->data['text_select_all'] = $this->language->get('text_select_all');
		$this->data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_count'] = $this->language->get('entry_count');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_product'] = $this->language->get('entry_product');
		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_style'] = $this->language->get('entry_style');
		$this->data['entry_ds'] = $this->language->get('entry_ds');
		$this->data['entry_block'] = $this->language->get('entry_block');		
		$this->data['text_grid'] = $this->language->get('text_grid');
		$this->data['text_list'] = $this->language->get('text_list');
		$this->data['text_carousel'] = $this->language->get('text_carousel');
		$this->data['text_brand'] = $this->language->get('text_brand');
		$this->data['text_model'] = $this->language->get('text_model');
		$this->data['text_sku'] = $this->language->get('text_sku');	
		$this->data['text_quantity'] = $this->language->get('text_quantity');
		$this->data['text_stockstatus'] = $this->language->get('text_stockstatus');	
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
		
		$this->data['tab_module'] = $this->language->get('tab_module');
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
       		'text'      => strip_tags($this->language->get('heading_title')),
			'href'      => $this->url->link('module/multiproduct', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
	
		$this->data['action'] = $this->url->link('module/multiproduct', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['token'] = $this->session->data['token'];
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		$this->data['modules'] = array();
		
		
		$products = array();
		if (isset($this->request->post['multiproduct_module'])) {
			$this->data['modules'] = $this->request->post['multiproduct_module'];
			$products = $this->request->post['multiproduct_module']['product'];
		} elseif ($this->config->get('multiproduct_module')) { 
			$this->data['modules'] = $this->config->get('multiproduct_module');
			$products = $this->config->get('multiproduct_module');
		}	
		
		$this->load->model('catalog/product');
		$this->data['featured_products'] = array();
		foreach($products as $key => $product){
			if(isset($product['product'])){
				foreach($product['product'] as $product_id){
					$products_info = $this->model_catalog_product->getProduct($product_id);
					
					if ($products_info) {
						$this->data['featured_products'][$key][] = array(
							'product_id' => $products_info['product_id'],
							'name'       => $products_info['name']
						);
					}
				}
			}
		}
				
		$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/multiproduct.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/multiproduct')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (isset($this->request->post['multiproduct_module'])) {
			foreach ($this->request->post['multiproduct_module'] as $key => $value) {
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