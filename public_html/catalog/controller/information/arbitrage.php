<?php
class ControllerInformationArbitrage extends Controller {

	public function index() {
		$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		$this->document->addScript('catalog/view/javascript/arbitrage.js');

		$this->language->load('information/arbitrage');

		$this->load->model('catalog/arbitrage');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/arbitrage'),
			'separator' => $this->language->get('text_separator')
		);

		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['button_send'] = $this->language->get('button_send');
		
		$this->data['text_write'] = $this->language->get('text_write');
		$this->data['entry_author'] = $this->language->get('entry_author');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_rating'] = $this->language->get('entry_rating');
		$this->data['entry_good'] = $this->language->get('entry_good');
		$this->data['entry_bad'] = $this->language->get('entry_bad');
		$this->data['entry_captcha'] = $this->language->get('entry_captcha');
		$this->data['text_wait'] = $this->language->get('text_wait');
		$this->data['text_note'] = $this->language->get('text_note');

		$this->data['button_send'] = $this->language->get('button_send');

		$this->data['rand'] = substr(sha1(mt_rand()), 17, 6);		

		$this->data['action'] = $this->url->link('information/arbitrage/getForm');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/arbitrage.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/arbitrage.tpl';
		} else {
			$this->template = 'default/template/information/arbitrage.tpl';
		}

		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'
		);

		$this->response->setOutput($this->render());
	}

	public function getArbitrages() {
		$this->language->load('information/arbitrage');

		$this->load->model('catalog/arbitrage');

		$this->data['text_no_arbitrages'] = $this->language->get('text_no_arbitrages');
		$this->data['text_on'] = $this->language->get('text_on');

		$this->data['arbitrages'] = array();

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data = array(
			'start' => ($page - 1) * $this->config->get('config_catalog_limit'),
			'limit' => $this->config->get('config_catalog_limit')
		);

		$arbitrage_total = $this->model_catalog_arbitrage->getTotalArbitrages();
		$results = $this->model_catalog_arbitrage->getArbitrages($data);

		foreach ($results as $result) {
			$this->data['arbitrages'][] = array(
				'author' => $result['author'],
				'description' => $result['description'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'rating' => $result['rating'],
				'rating_author' => sprintf($this->language->get('text_rating_author'), $result['author'])
			);
		}

		$pagination = new Pagination();
		$pagination->total = $arbitrage_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_catalog_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->text_first = $this->language->get('text_first_arbitrage');
		$pagination->text_last = $this->language->get('text_last_arbitrage');
		$pagination->url = $this->url->link('information/arbitrage/getArbitrages', 'page={page}');

		$this->data['pagination'] = $pagination->render();

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/arbitrage_list.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/arbitrage_list.tpl';
		} else {
			$this->template = 'default/template/information/arbitrage_list.tpl';
		}

		$this->response->setOutput($this->render());
	}

	public function write() {
		$this->language->load('information/arbitrage');

		$this->load->model('catalog/arbitrage');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['author']) < 3) || (utf8_strlen($this->request->post['author']) > 25)) {
				$json['error']['author'] = $this->language->get('error_author');
			}

			if ((utf8_strlen($this->request->post['description']) < 25) || (utf8_strlen($this->request->post['description']) > 3000)) {
				$json['error']['description'] = $this->language->get('error_description');
			}

			if (empty($this->request->post['rating'])) {
				$json['error']['rating'] = $this->language->get('error_rating');
			}

			if (empty($this->session->data['captcha_feedback_arbitrage']) || ($this->session->data['captcha_feedback_arbitrage'] != $this->request->post['captcha'])) {
				$json['error']['captcha'] = $this->language->get('error_captcha');
			}

			if (!isset($json['error'])) {
				$this->load->model('localisation/language');

				$data = array(
					'author' => $this->request->post['author'],
					'description' => $this->request->post['description'],
					'rating' => $this->request->post['rating'],
					'languages' => $this->model_localisation_language->getLanguages()
				);

				$results = $this->model_catalog_arbitrage->addArbitrage($data);

				$json['success'] = true;

				if ($this->config->get('arbitrage_email_status')) {
					$email_subject = sprintf($this->language->get('email_subject'), html_entity_decode($this->request->post['author'], ENT_QUOTES, 'UTF-8'));
					$email_text = sprintf($this->language->get('email_text'), html_entity_decode($this->request->post['description']), ENT_QUOTES, 'UTF-8');

					$mail = new Mail();
					$mail->protocol = $this->config->get('config_mail_protocol');
					$mail->parameter = $this->config->get('config_mail_parameter');
					$mail->hostname = $this->config->get('config_smtp_host');
					$mail->username = $this->config->get('config_smtp_username');
					$mail->password = $this->config->get('config_smtp_password');
					$mail->port = $this->config->get('config_smtp_port');
					$mail->timeout = $this->config->get('config_smtp_timeout');
					$mail->setTo($this->config->get('config_email'));
					$mail->setFrom($this->config->get('config_email'));
					$mail->setSender($this->request->post['author']);
					$mail->setSubject($email_subject);
					$mail->setText($email_text);
					$mail->send();

					// Send to additional alert emails
					$emails = explode(',', $this->config->get('config_alert_emails'));

					foreach ($emails as $email) {
						if ($email && preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email)) {
							$mail->setTo($email);
							$mail->send();
						}
					}
				}

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->setOutput(json_encode($json));
	}

	public function captcha() {
		$this->load->library('captcha');

		$captcha = new Captcha();

		$this->session->data['captcha_feedback_arbitrage'] = $captcha->getCode();

		$captcha->showImage();
	}

}

?>
