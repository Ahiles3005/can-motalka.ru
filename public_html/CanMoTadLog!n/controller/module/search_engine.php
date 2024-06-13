<?php

class ControllerModuleSearchEngine extends Controller {

	private $error = array();
	
	private	$limit = 100;
		
	private	$exact_total = true;
	
	public function index() {

		$this->data = $this->load->language('module/search_engine');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
		$this->load->model('extension/module/search_engine');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			$this->model_setting_setting->editSetting('search_engine', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			//$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['new_fields'])) {
			$this->data['error_new_fields'] = $this->error['new_fields'];
		} else {
			$this->data['error_new_fields'] = '';
		}
		
    if (isset($this->session->data['success'])) {
      $this->data['success'] = $this->session->data['success'];
      unset($this->session->data['success']);
    } else {
      $this->data['success'] = '';
    }

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/search_engine', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['action'] = $this->url->link('module/search_engine', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['delete'] = $this->url->link('module/search_engine/delete', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['search_engine_status'])) {
			$this->data['search_engine_status'] = $this->request->post['search_engine_status'];
		} else {
			$this->data['search_engine_status'] = $this->config->get('search_engine_status');
		}

		if (isset($this->request->post['search_engine_options'])) {
			$this->data['options'] = $this->request->post['search_engine_options'];
		} elseif ($this->config->get('search_engine_options')) {
			$this->data['options'] = $this->config->get('search_engine_options');
		}

		$this->data['fields'] = $this->model_extension_module_search_engine->getFields($this->data['options']);
		
		$this->model_extension_module_search_engine->exact_total = $this->exact_total;
		
		$this->data['total_indexed'] = $this->model_extension_module_search_engine->getTotalIndexed();
		$this->data['total_not_indexed'] = $this->model_extension_module_search_engine->getTotalNotIndexed($this->data['total_indexed']);
		
		$this->data['token'] = $this->session->data['token'];
		
		$this->template = 'module/search_engine.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
	}

	public function install() {

		$this->load->model('setting/setting');
		$this->load->model('extension/module/search_engine');

		$this->model_extension_module_search_engine->install();

		$this->model_setting_setting->deleteSetting('search_engine');

		$setting['search_engine_options'] = $this->model_extension_module_search_engine->getDefaultOptions();
		
		$this->model_setting_setting->editSetting('search_engine', $setting);		
	}

	public function uninstall() {

		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('search_engine');
		$this->load->model('extension/module/search_engine');
		$this->model_extension_module_search_engine->uninstall();
	}

	public function add() {
		
		$this->load->language('module/search_engine');
		
		$this->load->model('extension/module/search_engine');
		
		require_once DIR_SYSTEM . '/library/morphy.php';
		
		$json = array();
		
		if ($this->validate()) {
			
			$this->model_extension_module_search_engine->exact_total = $this->exact_total;
			
			$total_indexed = $this->model_extension_module_search_engine->getTotalIndexed();
			$total_not_indexed = $this->model_extension_module_search_engine->getTotalNotIndexed($total_indexed);
			
			if ($total_not_indexed == 0) {

				$json['progress'] = 100;
				$json['success'] = $this->language->get('text_success_index');
				
			} else {
			
				$progress = number_format($total_indexed * 100 / ($total_not_indexed + $total_indexed), 2);
				
				if ($progress < 100) {

					$error = $this->model_extension_module_search_engine->addIndexes( $this->limit );														
					if ($error) {
						$json['error'] = $error;
					}
					
					$total_not_indexed -= $this->limit;				
					$total_indexed += $this->limit;				

					$progress = number_format($total_indexed * 100 / ($total_not_indexed + $total_indexed), 2);
				}	
				
				$json['progress'] = $progress;
				
				if ($progress >= 100) {
					$json['success'] = $this->language->get('text_success_index');;					
				} else {
					$json['text'] = sprintf($this->language->get('text_index_progress'), $progress);
				}
			}
		} else {
			$json['error'] = $this->error['warning'];
		}		
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function stop() {		
		unset($this->session->data['indexing_process']);				
	}
	
	public function getTotals() {		
		$this->load->model('extension/module/search_engine');
		
		$json = array();
		
		$this->model_extension_module_search_engine->exact_total = $this->exact_total;
		
		$json['total_indexed'] = $this->model_extension_module_search_engine->getTotalIndexed();
		$json['total_not_indexed'] = $this->model_extension_module_search_engine->getTotalNotIndexed();
	
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function delete() {
		
		if ($this->validate()) {
			$this->load->model('extension/module/search_engine');
			$this->model_extension_module_search_engine->deleteIndexes();
		}
		
		$this->redirect($this->url->link('module/search_engine', 'token=' . $this->session->data['token'], 'SSL'));
	}
	
	private function validate() {

		if (!$this->user->hasPermission('modify', 'module/search_engine')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!empty($this->request->post['search_engine_options']['new_fields'])) {
			foreach ($this->request->post['search_engine_options']['new_fields'] as $field) {
				if ((utf8_strlen(trim($field['field'])) < 1)) {
					$this->error['new_fields'][$field['field']] = $this->language->get('error_field');
					$this->error['warning'] = $this->language->get('error_warning');
				}
			}
		}

		return!$this->error ? true : false;
	}

}