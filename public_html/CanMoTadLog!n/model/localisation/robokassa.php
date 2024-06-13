<?php  /* robokassa metka */
class ModelLocalisationRobokassa extends Model {
	public function updateExtentions( $data=array() ) {
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "extension WHERE `type`='payment' AND `code` LIKE 'robokassa%' AND `code`!='robokassa'");
		
		if($data)
		{
			foreach($data as $number)
			{
				$this->db->query("INSERT INTO " . DB_PREFIX . "extension (`type`, `code`) 
				VALUES ('payment', 'robokassa".$number."')");
			}
		}
	}

	/* start metka-kkt2 */
	public function changeDB()
	{
		$table_hash = array();
		
		$check = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "robokassa_payments'");
		
		if( !$check->row )
		{
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "robokassa_payments` (
					`payment_id` INT(11) NOT NULL auto_increment,
					`order_id` INT(11) NOT NULL,
					`code` VARCHAR(100) NOT NULL,
					`service` VARCHAR(100) NOT NULL,
					`total` DECIMAL(15,4) NOT NULL,
					`comment` TEXT NOT NULL,
					`params` TEXT NOT NULL,
					`url` TEXT NOT NULL,
					PRIMARY KEY  (`payment_id`),
					KEY `order_id` (`order_id`),
					KEY `code` (`code`)			
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
				
			$this->db->query($sql);
		}
	}
	
	public function addPayment($order_id, $data)
	{
		$code = md5( rand() );
		
		$this->db->query("INSERT INTO `" . DB_PREFIX . "robokassa_payments` SET
				`order_id`  = '".(int)$order_id."',
				`code`  = '".$this->db->escape($code)."',
				`service` = '".$this->db->escape($data['service'])."',
				`total` = '".(float)$data['total']."',
				`comment` = '".$this->db->escape($data['comment'])."',
				`params` = '".$this->db->escape( serialize($data['params']) )."',
				`url` = '".$this->db->escape($data['url'])."'");
		
		return HTTP_CATALOG.'index.php?route=payment/robokassa/payment&code='.$code;
	}
	
	/* end metka-kkt2 */
}
?>