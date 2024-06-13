<?php /* robokassa metka */
class ControllerPaymentRobokassa8 extends Controller {

	private $INDEX = 8;
	
	public function index() {
		
		$this->load->model('payment/robokassa');
		$this->data = $this->model_payment_robokassa->getIndexData($this->INDEX);
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/robokassa.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/robokassa.tpl';
		} else {
			$this->template = 'default/template/payment/robokassa.tpl';
		}		
		
		$this->render();
	}
}
?>