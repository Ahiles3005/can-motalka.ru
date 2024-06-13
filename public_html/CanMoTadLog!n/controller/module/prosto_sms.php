<?php

class ControllerModuleProstoSms extends Controller {
	
	private $error = array(); 
	
	public function index() {   
		//Load language file
		$this->load->language('module/prosto_sms');

		//Set title from language file
		$this->document->setTitle($this->language->get('heading_title'));
		
		//Load settings model
		$this->load->model('setting/setting');

        //Save settings
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
                $this->model_setting_setting->editSetting('prosto_sms', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
		}
		
		$text_strings = array(
				'heading_title',
				'button_save',
				'button_cancel',
				'button_add_module',
				'button_remove',
				'placeholder',
		);
		
		foreach ($text_strings as $text) {
			$this->data[$text] = $this->language->get($text);
		}
			
		//error handling
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
			'href'      => $this->url->link('module/prosto_sms', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['action'] = $this->url->link('module/prosto_sms', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['testLink'] = $this->url->link('module/prosto_sms/send_sms', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

	
		//Check if multiple instances of this module
		$this->data['modules'] = array();
		
		if (isset($this->request->post['prosto_sms_module'])) {
			$this->data['modules'] = $this->request->post['prosto_sms_module'];
		} elseif ($this->config->get('prosto_sms_module')) { 
			$this->data['modules'] = $this->config->get('prosto_sms_module');
		}		

		//Prepare for display
		$this->load->model('design/layout');
        $this->data['setting'] = $this->model_setting_setting->getSetting('prosto_sms');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'module/prosto_sms.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);

		//Send the output.
		$this->response->setOutput($this->render());
	}
	
	/*
	 * 
	 * Check that user actions are authorized
	 * 
	 */
	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/prosto_sms')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}

	public function send_sms(){
        $this->load->model('setting/setting');
        $setting = $this->model_setting_setting->getSetting('prosto_sms');
        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            header("Content-Type: application/json");
            echo json_encode(SmsProsto::pushMsgKey(htmlspecialchars($setting["prstKey"]), htmlspecialchars($this->request->post["prstTel"]), "Тестовое сообщение") ?: ["error" => "сообщение не отправлено"]);
            exit();
        }

    }




}
?>