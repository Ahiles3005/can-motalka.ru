<?php  /* robokassa metka */
class ModelPaymentRobokassa19 extends Model {

	private $INDEX=19;
	
  	public function getMethod($address, $total) 
	{
		$this->load->model('payment/robokassa');
		return $this->model_payment_robokassa->getMethodData($this->INDEX, $address, $total);
  	}
}
?>