<?php

class ControllerModuleSearchSuggestion extends Controller {

	private $error = array();

	public function index() {
		
		$this->data = $this->load->language('module/search_suggestion');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {

			foreach ($this->request->post['search_suggestion_module'] as &$module) {
				if (!isset($module['status'])) {
					$module['status'] = 0;
				}
			}
			$this->model_setting_setting->editSetting('search_suggestion', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
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
			'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/search_suggestion', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);

		$this->data['action'] = $this->url->link('module/search_suggestion', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['modules'] = array();

		if (isset($this->request->post['search_suggestion_module'])) {
			$this->data['modules'] = $this->request->post['search_suggestion_module'];
		} elseif ($this->config->get('search_suggestion_module')) {
			$this->data['modules'] = $this->config->get('search_suggestion_module');
		}

		if (isset($this->request->post['search_suggestion_options'])) {
			$options = $this->request->post['search_suggestion_options'];
		} elseif ($this->config->get('search_suggestion_options')) {
			$options = $this->config->get('search_suggestion_options');
		}
		
		uasort($options['search_field'], array($this, 'sort_fields'));
		
		$this->data['options'] = $options;

		$this->load->model('catalog/attribute');
		$this->data['attributes'] = $this->model_catalog_attribute->getAttributes();

		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/search_suggestion.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
	
	private function sort_fields ($a, $b) {
		return $a['sort'] - $b['sort'];
	}

	public function install() {
		$this->load->model('setting/setting');
		$this->load->model('catalog/search_suggestion');
		$this->model_setting_setting->deleteSetting('search_suggestion');
		$setting['search_suggestion_module'] = $this->model_catalog_search_suggestion->getNewModules();
		$setting['search_suggestion_options'] = $this->model_catalog_search_suggestion->getDefaultOptions();
		$this->model_setting_setting->editSetting('search_suggestion', $setting);
	}

	public function uninstall() {
		$this->load->model('setting/setting');
		$this->model_setting_setting->deleteSetting('search_suggestion');
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/search_suggestion')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
}


