<?php  /* robokassa metka */
class ModelPaymentRobokassa13 extends Model {

	private $INDEX=13;
	
  	public function getMethod($address, $total) 
	{
		$this->load->model('payment/robokassa');
		return $this->model_payment_robokassa->getMethodData($this->INDEX, $address, $total);
  	}
}
?>