<?php
class ControllerModuleWebme18YO extends Controller {
	private $error = array();
	
	/* [w] update checker data __DO_NOT_EDIT__ :: begin */
	private $version = "0.3.ocs1531";
	private $updateCheckerUrl = 'http://store.webme.com.ua/index.php?route=webme/update_checker/remoteCheck';
	private $updateCheckerExtensionId = '1286236806';
	/* [w] update checker data __DO_NOT_EDIT__ :: end */
	
	
	public function index() {
		$this->load->language('module/webme_18yo');
		
		/* [w] update checker data __DO_NOT_EDIT__ :: begin */
		$this->data['text_check_updates'] = $this->language->get('text_check_updates');
		$this->data['updateCheckerUrl'] = HTTPS_SERVER.'index.php?route=module/webme_18yo/checkUpdate&token=' . $this->session->data['token'];
		$this->data['error_check_update'] = $this->language->get('error_check_update');
		/* [w] update checker data __DO_NOT_EDIT__ :: end */
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->load->model('setting/setting');
			$this->model_setting_setting->editSetting('webme_18yo', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
			$this->redirect(HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token']);
		}
		
		$this->data['heading_title'] = $this->language->get('heading_title').sprintf($this->language->get('version'), $this->version);
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_agreement'] = $this->language->get('entry_agreement');
		$this->data['entry_cookie_days_lifetime'] = $this->language->get('entry_cookie_days_lifetime');
		$this->data['entry_disagreement_link'] = $this->language->get('entry_disagreement_link');
		$this->data['entry_debug_mode'] = $this->language->get('entry_debug_mode');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		$this->data['tab_general'] = $this->language->get('tab_general');
		
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		// errors
		if (isset($this->error['agreement'])) {
			$this->data['error_agreement'] = $this->error['agreement'];
		} else {
			$this->data['error_agreement'] = '';
		}
		if (isset($this->error['cookie_days_lifetime'])) {
			$this->data['error_cookie_days_lifetime'] = $this->error['cookie_days_lifetime'];
		} else {
			$this->data['error_cookie_days_lifetime'] = '';
		}
		
		if (isset($this->error['disagreement_link'])) {
			$this->data['error_disagreement_link'] = $this->error['disagreement_link'];
		} else {
			$this->data['error_disagreement_link'] = '';
		}
		//======
		
		$this->data['breadcrumbs'] = array();
		
		$this->data['breadcrumbs'][] = array(
			'href'      => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);
		
		$this->data['breadcrumbs'][] = array(
			'href'      => HTTPS_SERVER . 'index.php?route=extension/module&token=' . $this->session->data['token'],
			'text'      => $this->language->get('text_modules'),
			'separator' => ' :: '
		);
		
		$this->data['breadcrumbs'][] = array(
			'href'      => HTTPS_SERVER . 'index.php?route=module/webme_18yo&token=' . $this->session->data['token'],
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = HTTPS_SERVER . 'index.php?route=module/webme_18yo&token=' . $this->session->data['token'];
		$this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/module';
		
		
		// Текст соглашения при первом посещении сайта
		if (isset($this->request->post['webme_18yo_agreement'])) {
			$this->data['webme_18yo_agreement'] = $this->request->post['webme_18yo_agreement'];
		} else {
			$this->data['webme_18yo_agreement'] = $this->config->get('webme_18yo_agreement');
		}
		
		// Продолжительность жизни cookie в случае принятия соглашения (в днях)
		if (isset($this->request->post['webme_18yo_cookie_days_lifetime'])) {
			$this->data['webme_18yo_cookie_days_lifetime'] = $this->request->post['webme_18yo_cookie_days_lifetime'];
		} else {
			$this->data['webme_18yo_cookie_days_lifetime'] = $this->config->get('webme_18yo_cookie_days_lifetime');
		}
		
		// Ссылка для перехода, при выборе варианта "нет 18 лет / не согласен"
		if (isset($this->request->post['webme_18yo_disagreement_link'])) {
			$this->data['webme_18yo_disagreement_link'] = $this->request->post['webme_18yo_disagreement_link'];
		} else {
			$this->data['webme_18yo_disagreement_link'] = $this->config->get('webme_18yo_disagreement_link');
		}
		
		if (isset($this->request->post['webme_18yo_status'])) {
			$this->data['webme_18yo_status'] = $this->request->post['webme_18yo_status'];
		} else {
			$this->data['webme_18yo_status'] = $this->config->get('webme_18yo_status');
		}
		
		/* debug-param : begin */
		if (isset($this->request->post['webme_18yo_debug_mode'])) {
			$this->data['webme_18yo_debug_mode'] = $this->request->post['webme_18yo_debug_mode'];
		} else {
			$this->data['webme_18yo_debug_mode'] = $this->config->get('webme_18yo_debug_mode');
		}
		/* debug-param : end */
		
		$this->template = 'module/webme_18yo.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	}
	
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/webme_18yo')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->request->post['webme_18yo_agreement']) {
			$this->error['agreement'] = $this->language->get('error_agreement');
		}
		if (!$this->request->post['webme_18yo_disagreement_link']) {
			$this->error['disagreement_link'] = $this->language->get('error_disagreement_link');
		}
		if (!$this->request->post['webme_18yo_cookie_days_lifetime']) {
			$this->error['cookie_days_lifetime'] = $this->language->get('error_cookie_days_lifetime');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/* [w] update checker data __DO_NOT_EDIT__ :: begin */
	public function checkUpdate() {
		$json = array();
		$this->load->language('module/webme_18yo');
		
		if (isset($this->updateCheckerExtensionId) && (isset($this->version) && preg_match("(\.ocs)", $this->version))){
			
			$url = $this->updateCheckerUrl."&extension_ien=".$this->updateCheckerExtensionId."&version=".$this->version."&dmn=".$this->request->server['SERVER_NAME'];
			$curl_url = str_replace( "&amp;", "&", urldecode(trim($url)) );
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_URL, $curl_url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_REFERER, HTTPS_SERVER);
			$content = curl_exec( $ch );
			$response = curl_getinfo( $ch );
			curl_close ( $ch );
			
			$checkResult = $content;
			
			if (empty($checkResult) || is_null($checkResult)) {
				$json['error'] = $this->language->get('error_no_extension');
			} else {
				$response = json_decode($checkResult);
				if (is_null($response)) {
					$json['error'] = $this->language->get('error_check_update');
				} else {
					$json = $response;
				}
			}
		} else {
			$json['error'] = $this->language->get('error_no_extension');
		}
		
		$this->response->setOutput(json_encode($json));
	}
	/* [w] update checker data __DO_NOT_EDIT__ :: end */
}
?>