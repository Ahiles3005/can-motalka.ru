<?php
class ControllerModuleWebme18YO extends Controller {
	public function index() {
		if ($this->config->get('webme_18yo_status')) {
			
			if ($this->config->get('webme_18yo_debug_mode') == 1) {
				// remove cookie while testing...
				setcookie('18yo_agree', "", time() - 10, '/');
			}
			
			$agree = isset($this->request->cookie['18yo_agree']);
			
			if (isset($this->request->post['18yo_agree'])) {
				setcookie('18yo_agree', $this->request->post['18yo_agree'], time() + 3600 * 24 * $this->config->get('webme_18yo_cookie_days_lifetime'), '/');
				// redirect to store homepage
				header('Location: '.HTTPS_SERVER.'');
			}
			
			if (!$agree) {
				$route = '';
				
				if (isset($this->request->get['route'])) {
					$part = explode('/', $this->request->get['route']);
					
					if (isset($part[0])) {
						$route .= $part[0];
					}
				}
				
				// Show site if logged in as admin
				$this->load->library('user');
				
				$this->user = new User($this->registry);
				
				if (($route != 'payment') && !$this->user->isLogged()) {
					return $this->forward('module/webme_18yo/info');
				}
			}
		}
	}
	
	public function info() {
		$this->load->language('module/webme_18yo');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['action'] = HTTPS_SERVER."index.php?route=module/webme_18yo";
		
		// form buttons
		$this->data['button_agree'] = $this->language->get('button_agree');
		$this->data['button_disagree'] = $this->language->get('button_disagree');
		
		$this->document->breadcrumbs = array();
		$this->document->breadcrumbs[] = array(
			'text'      => $this->language->get('text_breadcrumbs'),
			'href'      => $this->url->link('module/webme_18yo'),
			'separator' => false
		); 
		
		$this->data['message'] = nl2br($this->config->get('webme_18yo_agreement'));
		$this->data['disagreement_link'] = $this->config->get('webme_18yo_disagreement_link');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/webme_18yo.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/webme_18yo.tpl';
		} else {
			$this->template = 'default/template/module/webme_18yo.tpl';
		}
		
		$this->children = array(
			'common/footer',
			'common/header'
		);
		
		$this->response->setOutput($this->render());
	}
	
	public function modal() {
		$agree = isset($this->request->cookie['18yo_agree']);
		
		if ($this->config->get('webme_18yo_debug_mode') == 1) {
			// remove cookie while testing...
			setcookie('18yo_agree', "", time() - 10, '/');
		}
		
		if (!$agree) {
			$this->load->language('module/webme_18yo');
			$this->document->setTitle($this->language->get('heading_title'));
			$this->data['heading_title'] = $this->language->get('heading_title');
			$this->data['webme_18yo_header'] = $this->language->get('heading_title');
			
			$this->data['action'] = HTTPS_SERVER."index.php?route=module/webme_18yo/agree";
			
			// form buttons
			$this->data['button_agree'] = $this->language->get('button_agree');
			$this->data['button_disagree'] = $this->language->get('button_disagree');
			
			$this->document->breadcrumbs = array();
			$this->document->breadcrumbs[] = array(
				'text'      => $this->language->get('text_breadcrumbs'),
				'href'      => $this->url->link('module/webme_18yo'),
				'separator' => false
			); 
			
			$this->data['message'] = nl2br($this->config->get('webme_18yo_agreement'));
			$this->data['disagreement_link'] = $this->config->get('webme_18yo_disagreement_link');
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/webme_18yo_modal.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/webme_18yo_modal.tpl';
			} else {
				$this->template = 'default/template/module/webme_18yo_modal.tpl';
			}
			
			$this->response->setOutput($this->render());
		} else {
			$output = "";
			die();
		}
	}
	
	public function agree() {
		$result = array();
		if (isset($this->request->post['18yo_agree'])) {
			setcookie('18yo_agree', $this->request->post['18yo_agree'], time() + 3600 * 24 * $this->config->get('webme_18yo_cookie_days_lifetime'), '/');
			$result['success'] = 1;
		} else {
			$this->load->language('module/webme_18yo');
			$result['error'] = $this->language->get('text_agree_cookie_error');
		}
		
		$this->response->setOutput(json_encode($result));
	}
}
?>