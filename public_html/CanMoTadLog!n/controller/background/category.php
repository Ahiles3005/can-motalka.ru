<?php
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ControllerBackgroundCategory extends Controller {
	private $error = array();
 
	public function index() {
		$this->language->load('background/manager'); 

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/background.manager.css');
		
		$this->load->model('background/manager');
		$this->load->model('catalog/category');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_background_manager->editCategories($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['heading_title'] = $this->language->get('text_categories');
		//Set language variables
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_insert'] = $this->language->get('button_text_insert');
		$this->data['button_text_copy'] = $this->language->get('button_text_copy');
		$this->data['button_text_delete'] = $this->language->get('button_text_delete');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');

		$this->data['entry_bg_type'] = $this->language->get('entry_bg_type');
			$this->data['text_bg_type_one'] = $this->language->get('text_bg_type_one');
			$this->data['text_bg_type_two'] = $this->language->get('text_bg_type_two');
			$this->data['text_bg_type_three'] = $this->language->get('text_bg_type_three');
		
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['button_text_save'] = $this->language->get('button_text_save');
		$this->data['button_text_cancel'] = $this->language->get('button_text_cancel');
		$this->data['text_not_selected'] = $this->language->get('text_not_selected');
		$this->data['text_use_for_child'] = $this->language->get('text_use_for_child');
		
		
		$cats = $this->model_background_manager->getCategories();
		foreach ($cats as $key => $value) {
			$categories[$value['category_id']] = array(
				'parent_id' => $value['parent_id'],
				'pattern_id' => $value['pattern_id'],
				'use_for_child' => $value['use_for_child']
			);
		}
		$results = $this->model_catalog_category->getCategories(null);
		foreach ($results as $result) {
			if (array_key_exists($result['category_id'], $categories)) {
				$this->data['categories'][] = array(
					'category_id' => $result['category_id'],
					'parent_id' => $categories[$result['category_id']]['parent_id'],
					'pattern_id' => $categories[$result['category_id']]['pattern_id'],
					'use_for_child' => $categories[$result['category_id']]['use_for_child'],
					'name'        => $result['name'],
				);	
			}else{
				$this->data['categories'][] = array(
					'category_id' => $result['category_id'],
					'parent_id' => '0',
					'pattern_id' => '0',
					'use_for_child' => '0',
					'name'        => $result['name'],
				);
			}
			
		}
		$patterns = $this->model_background_manager->getPatterns();
		foreach ($patterns as $key => $value) {
			$this->data['patterns'][] = array(
				'pattern_id' => $value['id'],
				'pattern_name' => $value['pattern_name'],
			);
		}

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
       		'text'      => $this->language->get('text_categories'),
			'href'      => $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['save'] = $this->url->link('background/category/save', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['text_patterns'] = $this->language->get('text_patterns');
		$this->data['text_design_layout'] = $this->language->get('text_design_layout');
		$this->data['text_categories'] = $this->language->get('text_categories');
		$this->data['text_settings'] = $this->language->get('text_settings');
		$this->data['text_elements'] = $this->language->get('text_elements');
		$this->data['link_patterns'] = $this->url->link('background/pattern', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_layouts'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_categories'] = $this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['link_settings'] = $this->url->link('background/settings', 'token=' . $this->session->data['token'], 'SSL');
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
		$this->template = 'background/category.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
		
	}
	public function save(){
		$this->language->load('background/manager'); 

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('background/manager');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$data = '';
			foreach ($this->request->post as $key => $value) {
				 $data .= '(\''.str_replace('category', '', $key).'\',\''.$value.'\'),';
			}
			$data = rtrim($data,',');
			$this->model_background_manager->editCategories($data);
			
			$this->session->data['success'] = $this->language->get('text_success_categories_save');

			$this->redirect($this->url->link('background/category', 'token=' . $this->session->data['token'], 'SSL'));
		}
	}
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'background/category')) {
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
}
?>