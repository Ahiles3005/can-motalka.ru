<?php  /* robokassa metka */
class ModelPaymentRobokassa17 extends Model {

	private $INDEX=17;
	
  	public function getMethod($address, $total) 
	{
		$this->load->model('payment/robokassa');
		return $this->model_payment_robokassa->getMethodData($this->INDEX, $address, $total);
  	}
}
?>