<?php  /* robokassa metka */
class ModelPaymentRobokassa12 extends Model {

	private $INDEX=12;
	
  	public function getMethod($address, $total) 
	{
		$this->load->model('payment/robokassa');
		return $this->model_payment_robokassa->getMethodData($this->INDEX, $address, $total);
  	}
}
?>