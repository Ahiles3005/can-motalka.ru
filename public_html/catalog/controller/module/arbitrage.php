<?php
class ControllerModuleArbitrage extends Controller {

	public function index($setting) {
		$this->language->load('information/arbitrage');

		$this->load->model('catalog/arbitrage');

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['text_no_arbitrages'] = $this->language->get('text_no_arbitrages');

		$this->data['text_on'] = $this->language->get('text_on');

		$this->data['button_send'] = $this->language->get('button_send');

		$this->data['arbitrages'] = array();

		if (isset($setting['quantity'])) {
			$limit = $setting['quantity'];
		} else {
			$limit = 5;
		}

		$data = array(
			'start' => 0,
			'limit' => $limit
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

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/arbitrage.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/arbitrage.tpl';
		} else {
			$this->template = 'default/template/module/arbitrage.tpl';
		}

		$this->response->setOutput($this->render());
	}

}

?>
