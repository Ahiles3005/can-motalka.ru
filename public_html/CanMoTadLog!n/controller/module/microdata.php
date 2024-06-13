<?php
class ControllerModuleMicrodata extends Controller {
	private $error = array();

	public function index() {
		$language = $this->language->load('module/microdata');

    $this->document->setTitle($this->language->get('heading_title_top'));
		$this->document->addStyle('view/stylesheet/microdata.css');

    $this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('microdata', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->data['token'] = $this->session->data['token'];

    $language = array(
			'heading_title',

			'tab_schemaorg',
			'tab_schemaorg_demo',
			'tab_schemaorg_home',
			'tab_schemaorg_prod',
			'tab_opengraph',
			'tab_twittercard',
			'tab_info',

			'text_status',
			'text_enabled',
			'text_disabled',
			'text_home_title',

			'text_name',
			'text_description',
			'text_telephone',
			'text_addresscountry',
			'text_addresslocality',
			'text_streetaddress',
			'text_openinghours',
			'text_openinghours_days',
			'text_openinghours_time',

			'text_name_placeholder',
			'text_description_placeholder',
			'text_telephone_placeholder',
			'text_email_placeholder',
			'text_addresscountry_placeholder',
			'text_addresslocality_placeholder',
			'text_streetaddress_placeholder',
			'text_openinghours_days_placeholder',
			'text_openinghours_time_placeholder',

			'text_island_type',
			'text_island_1',
			'text_island_2',
			'text_island_3',
			'text_twitter_creator',
			'text_twitter_place',
			'text_twitter_place',

			'text_modul',
			'text_autor',
			'text_contacts',
			'text_email',
			'text_send_email',
			'text_skype',
			'text_send_skype',
			'text_microdata',
			'text_dariygray',

			'button_save',
			'button_cancel',
    );

    foreach ($language as $lang) {
			$this->data[$lang] = $this->language->get($lang);
    }

    $config_data = array(
			'schemaorg_status',
			'schemaorg_home_status',
			'schemaorg_home_name',
			'schemaorg_home_description',
			'schemaorg_home_telephone',
			'schemaorg_home_email',
			'schemaorg_home_addresscountry',
			'schemaorg_home_addresslocality',
			'schemaorg_home_streetaddress',
			'schemaorg_home_openinghours_days',
			'schemaorg_home_openinghours_time',
			'schemaorg_island',
			'opengraph_status',
			'twittercard_status',
			'twitter_site',
			'twitter_creator'
    );

    foreach ($config_data as $conf) {
      if (isset($this->request->post[$conf])) {
        $this->data[$conf] = $this->request->post[$conf];
      } else {
        $this->data[$conf] = $this->config->get($conf);
      }
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
			'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
   	);

   	$this->data['breadcrumbs'][] = array(
    	'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/microdata', 'token=' . $this->session->data['token'], 'SSL'),
      'separator' => ' :: '
   	);

		$this->data['action'] = $this->url->link('module/microdata', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');

		$this->template = 'module/microdata.tpl';

		$this->children = array(
			'common/header',
			'common/footer',
		);

		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/microdata')) {
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