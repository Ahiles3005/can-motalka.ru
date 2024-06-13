<?php
class ControllerCatalogArbitrage extends Controller {
	private $error = array();
	public function index() {
		$this->load->language('catalog/arbitrage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/arbitrage');

		$this->getList();
	}

	public function insert() {
		$this->load->language('catalog/arbitrage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/arbitrage');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_arbitrage->addArbitrage($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->load->language('catalog/arbitrage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/arbitrage');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_arbitrage->editArbitrage($this->request->get['arbitrage_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function delete() {
		$this->load->language('catalog/arbitrage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/arbitrage');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $arbitrage_id) {
				$this->model_catalog_arbitrage->deleteArbitrage($arbitrage_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	private function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'a.date_added';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'		 => $this->language->get('text_home'),
			'href'		 => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator'	 => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'		 => $this->language->get('heading_title'),
			'href'		 => $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator'	 => ' :: '
		);

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['module_install'] = $this->model_catalog_arbitrage->tableExists();

		if ($this->data['module_install']) {
			$this->data['insert'] = $this->url->link('catalog/arbitrage/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
			$this->data['delete'] = $this->url->link('catalog/arbitrage/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');

			$this->data['arbitrages'] = array();

			$data = array(
				'sort'	 => $sort,
				'order'	 => $order,
				'start'	 => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit'	 => $this->config->get('config_admin_limit')
			);

			$arbitrage_total = $this->model_catalog_arbitrage->getTotalArbitrages();

			$results = $this->model_catalog_arbitrage->getArbitrages($data);

			foreach ($results as $result) {
				$action = array();

				$action[] = array(
					'text'	 => $this->language->get('text_edit'),
					'href'	 => $this->url->link('catalog/arbitrage/update', 'token=' . $this->session->data['token'] . '&arbitrage_id=' . $result['arbitrage_id'] . $url, 'SSL')
				);

				$this->data['arbitrages'][] = array(
					'arbitrage_id'	 => $result['arbitrage_id'],
					'author'		 => $result['author'],
					'rating'		 => $result['rating'],
					'status'		 => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
					'date_added'	 => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
					'selected'		 => isset($this->request->post['selected']) && in_array($result['arbitrage_id'], $this->request->post['selected']),
					'action'		 => $action
				);
			}

			$this->data['text_no_results'] = $this->language->get('text_no_results');

			$this->data['column_author'] = $this->language->get('column_author');
			$this->data['column_status'] = $this->language->get('column_status');
			$this->data['column_date_added'] = $this->language->get('column_date_added');
			$this->data['column_rating'] = $this->language->get('column_rating');
			$this->data['column_action'] = $this->language->get('column_action');

			$this->data['button_insert'] = $this->language->get('button_insert');
			$this->data['button_delete'] = $this->language->get('button_delete');

			if (isset($this->error['warning'])) {
				$this->data['error_warning'] = $this->error['warning'];
			} else {
				$this->data['error_warning'] = '';
			}

			if (isset($this->session->data['success'])) {
				$this->data['success'] = $this->session->data['success'];
				unset($this->session->data['success']);
			} else {
				$this->data['success'] = '';
			}

			$url = '';

			if ($order == 'ASC') {
				$url .= '&order=DESC';
			} else {
				$url .= '&order=ASC';
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->data['sort_author'] = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . '&sort=ad.author' . $url, 'SSL');
			$this->data['sort_rating'] = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . '&sort=a.rating' . $url, 'SSL');
			$this->data['sort_status'] = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . '&sort=a.status' . $url, 'SSL');
			$this->data['sort_date_added'] = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . '&sort=a.date_added' . $url, 'SSL');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$pagination = new Pagination();
			$pagination->total = $arbitrage_total;
			$pagination->page = $page;
			$pagination->limit = $this->config->get('config_admin_limit');
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

			$this->data['pagination'] = $pagination->render();

			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
		} else {
			$this->data['text_module_not_exists'] = $this->language->get('text_module_not_exists');
		}

		$this->template = 'catalog/arbitrage_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_select'] = $this->language->get('text_select');

		$this->data['entry_author'] = $this->language->get('entry_author');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_date_added'] = $this->language->get('entry_date_added');
		$this->data['entry_rating'] = $this->language->get('entry_rating');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_good'] = $this->language->get('entry_good');
		$this->data['entry_bad'] = $this->language->get('entry_bad');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['author'])) {
			$this->data['error_author'] = $this->error['author'];
		} else {
			$this->data['error_author'] = array();
		}

		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}

		if (isset($this->error['rating'])) {
			$this->data['error_rating'] = $this->error['rating'];
		} else {
			$this->data['error_rating'] = '';
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'		 => $this->language->get('text_home'),
			'href'		 => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator'	 => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'		 => $this->language->get('heading_title'),
			'href'		 => $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator'	 => ' :: '
		);

		if (!isset($this->request->get['arbitrage_id'])) {
			$this->data['action'] = $this->url->link('catalog/arbitrage/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/arbitrage/update', 'token=' . $this->session->data['token'] . '&arbitrage_id=' . $this->request->get['arbitrage_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/arbitrage', 'token=' . $this->session->data['token'] . $url, 'SSL');

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['arbitrage_description'])) {
			$this->data['arbitrage_description'] = $this->request->post['arbitrage_description'];
		} elseif (isset($this->request->get['arbitrage_id'])) {
			$this->data['arbitrage_description'] = $this->model_catalog_arbitrage->getArbitrageDescriptions($this->request->get['arbitrage_id']);
		} else {
			$this->data['arbitrage_description'] = array();
		}

		if (isset($this->request->get['arbitrage_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$arbitrage_info = $this->model_catalog_arbitrage->getArbitrage($this->request->get['arbitrage_id']);
		}

		if (isset($this->request->post['date_added'])) {
			$this->data['date_added'] = $this->request->post['date_added'];
		} elseif (!empty($arbitrage_info)) {
			$this->data['date_added'] = date('Y-m-d', strtotime($arbitrage_info['date_added']));
		} else {
			$this->data['date_added'] = date('Y-m-d', time() - 86400);
		}

		if (isset($this->request->post['rating'])) {
			$this->data['rating'] = $this->request->post['rating'];
		} elseif (!empty($arbitrage_info)) {
			$this->data['rating'] = $arbitrage_info['rating'];
		} else {
			$this->data['rating'] = '';
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($arbitrage_info)) {
			$this->data['status'] = $arbitrage_info['status'];
		} else {
			$this->data['status'] = '';
		}

		$this->template = 'catalog/arbitrage_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	private function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/arbitrage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['arbitrage_description'] as $language_id => $value) {
			if ((utf8_strlen($value['author']) < 3) || (utf8_strlen($value['author']) > 64)) {
				$this->error['author'][$language_id] = $this->language->get('error_author');
			}

			if (utf8_strlen($value['description']) < 1) {
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}
		}

		if (empty($this->request->post['rating'])) {
			$this->error['rating'] = $this->language->get('error_rating');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/arbitrage')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

}

?>
