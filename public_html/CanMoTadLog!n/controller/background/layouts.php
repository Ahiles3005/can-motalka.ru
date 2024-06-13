<?php
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ControllerBackgroundLayouts extends Controller {
	private $error = array();
 
	public function index() {
		$this->language->load('background/manager'); 

		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->addStyle('view/stylesheet/background.manager.css');
		
		$this->load->model('background/manager');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			foreach ($this->request->post as $key => $value) {
				$data[str_replace('layout', '', $key)] = $value;
			}
			$this->model_background_manager->editLayouts($data);
			
			$this->session->data['success'] = $this->language->get('text_success_layout_changed');

			$this->redirect($this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL'));
		}
		$this->data['patterns'] = $this->model_background_manager->getPatterns();
		$this->data['pattern_layouts'] = $this->model_background_manager->getLayouts();

		$this->data['heading_title'] = $this->language->get('text_design_layout');
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
		$this->data['text_layout_name'] = $this->language->get('text_layout_name');
		$this->data['text_pattern_name'] = $this->language->get('text_pattern_name');
		$this->data['text_not_selected'] = $this->language->get('text_not_selected');
		
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
       		'text'      => $this->language->get('text_design_layout'),
			'href'      => $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
		//Set links
		$this->data['save'] = $this->url->link('background/layouts', 'token=' . $this->session->data['token'], 'SSL');
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
		$this->load->model('design/layout');
		$layout_total = $this->model_design_layout->getTotalLayouts();
		
		$results = $this->model_design_layout->getLayouts(null);
		
		$action_g[] = array(
			'text' => $this->language->get('button_text_edit'),
		);
		$this->data['layouts'][] = array(
			'layout_id' => '0',
			'name'		=> $this->language->get('text_default_pattern'),
		);
		
		foreach ($results as $result) {
			$action = array();
			
			$action[] = array(
				'text' => $this->language->get('button_text_edit'),
			);
			$this->data['layouts'][] = array(
				'layout_id' => $result['layout_id'],
				'name'      => $result['name'],
			);
		}
			foreach ($this->data['layouts'] as $key => $value) {
				$this->data['combined'][$value['layout_id']] = array(
					'name' => $value['name'],
					'pattern_id' => ''
				);
				foreach ($this->data['pattern_layouts'] as $pl_key => $pl_value) {
					if ($pl_value['layout_id'] == $value['layout_id']) {
						$this->data['combined'][$value['layout_id']] = array(
							'name' => $value['name'],
							'pattern_id' => $pl_value['pattern_id']
						);
					}
				}
			}
			$this->data['combined'];
		//Set settings
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		$this->template = 'background/layouts.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		$this->response->setOutput($this->render());
		
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'background/layouts')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {return true;} else {return false;}
	}
}
?>