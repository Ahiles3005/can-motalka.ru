<?php
class ModelAccountSocnetauth2 extends Model 
{
	public $socnets = array(
		"vkontakte" => array(
			"key" => "vkontakte",
			"short" => "vk",
			"name" => "ВКонтакте",
			"loginza_key" => "vkontakte"
		),
		"odnoklassniki" => array(
			"key" => "odnoklassniki",
			"short" => "od",
			"name" => "Одноклассники",
			"loginza_key" => "odnoklassniki"
		),
		"facebook" => array(
			"key" => "facebook",
			"short" => "fb",
			"name" => "FaceBook",
			"loginza_key" => "facebook"
		),
		"twitter" => array(
			"key" => "twitter",
			"short" => "tw",
			"name" => "Twitter",
			"loginza_key" => "twitter"
		),
		"gmail" => array(
			"key" => "gmail",
			"short" => "gm",
			"name" => "Gmail.com",
			"loginza_key" => "google"
		),
		"mailru" => array(
			"key" => "mailru",
			"short" => "mr",
			"name" => "Mail.ru",
			"loginza_key" => "mailru"
		),
		"steam" => array(
			"key" => "steam",
			"short" => "st",
			"name" => "Steam",
			"loginza_key" => "steam"
		),
		"yandex" => array(
			"key" => "yandex",
			"short" => "ya",
			"name" => "Яндекс",
			"loginza_key" => "yandex"
		),
		/* start 0207 */
		"instagram" => array(
			"key" => "instagram",
			"short" => "in",
			"name" => "Instagram",
			"loginza_key" => "instagram"
		),
		/* end 0207 */
	);
	
	public function checkNew($data)
	{
		if( empty($data['identity']) ) exit("EMPTY ID");
	
		$identitis = array();
		
		$identitis[] = $data['identity'];
		$identitis[] = str_replace("http://", "https://", $data['identity']);
		$identitis[] = str_replace("https://", "http://", $data['identity']);
		$identitis[] = str_replace("https://", "https://www.", $data['identity']);
		$identitis[] = str_replace("http://", "http://www.", $data['identity']);
		$identitis[] = str_replace("http://www.", "http://", $data['identity']);
		$identitis[] = str_replace("https://www.", "https://", $data['identity']);
		$identitis[] = str_replace("https://www.", "", $data['identity']);
		$identitis[] = str_replace("https://", "", $data['identity']);
		$identitis[] = str_replace("http://www.", "", $data['identity']);
		$identitis[] = str_replace("http://", "", $data['identity']);
		$identitis[] = str_replace("https://www.", "http://", $data['identity']);
		
		
		
			/*
			$this->query_run("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
							  SET
								 identity = '" .$this->escape($data['identity']) . "',
								 provider = '".$this->escape($data['provider']) ."',
								 data = '".$this->escape($data['data'])."',
								 link = '".$this->escape($data['link'])."',
								 email = '".$this->escape($data['email'])."',
								 customer_id = '".(int)$customer_id."'
							  WHERE
							    identity = '" .$this->escape($data['identity']) . "'");
			*/
			
		for($i=0; $i<count($identitis); $i++)
		{
			$identitis[$i] = " identity='".$this->db->escape($identitis[$i])."' ";
		}
		
		$wh = implode(" OR ", $identitis);
		
		$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "socnetauth2_customer2account` sc
								   JOIN `" . DB_PREFIX . "customer` c
								   ON c.customer_id=sc.customer_id
								   WHERE ".$wh);
								   
		if( empty($check->rows) && $this->config->get('socnetauth2_dobortype') == 'one' )
		{
			return false;
		}
		elseif( !empty( $check->row ) )
		{
			$upd = '';
			
			if( !empty($data['firstname']) )
			{
				$upd .= " firstname = '".$this->db->escape($data['firstname'])."', ";
			}
			
			if( !empty($data['lastname']) )
			{
				$upd .= " lastname = '".$this->db->escape($data['lastname'])."', ";
			}
			
			if( !empty($data['telephone']) )
			{
				$upd .= " telephone = '".$this->db->escape($data['telephone'])."', ";
			}
			
			if( !empty($data['email']) )
			{
				$upd .= " email = '".$this->db->escape($data['email'])."', ";
			}
			
			/* start 2507 */
			if( isset($data['newsletter']) )
			{
				$upd .= " newsletter = '".(int)$data['newsletter']."', ";
			}
			/* end 2507 */
			
			$this->db->query("UPDATE " . DB_PREFIX . "customer 
							  SET
							  ". $upd ."
							  
								ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'
							  WHERE
							    socnetauth2_identity = '" .$this->db->escape($data['identity']) . "'");
			
			$this->db->query("UPDATE " . DB_PREFIX . "socnetauth2_customer2account 
							  SET
								data = '".$this->db->escape($data['data'])."'
							  WHERE
							    identity = '" .$this->db->escape($data['identity']) . "'");
			
			$customer_data = $this->query_row("SELECT * FROM `" . DB_PREFIX . "customer`
								   WHERE customer_id = '" .$this->db->escape($check->row['customer_id']) . "'");	
								
			/*
			$this->query_run("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
							  SET
								 identity = '" .$this->escape($data['identity']) . "',
								 provider = '".$this->escape($data['provider']) ."',
								 data = '".$this->escape($data['data'])."',
								 link = '".$this->escape($data['link'])."',
								 email = '".$this->escape($data['email'])."',
								 customer_id = '".(int)$customer_id."'
							  WHERE
							    identity = '" .$this->escape($data['identity']) . "'");
			*/
			
			
			
			

			/* start specific block: system/library/customer.php */
			if( !empty($customer_data->row['cart']) && is_string($customer_data->row['cart']) ) {
				$cart = unserialize($customer_data->row['cart']);
				
				foreach ($cart as $key => $value) {
					if (!array_key_exists($key, $this->session->data['cart'])) {
						$this->session->data['cart'][$key] = $value;
					} else {
						$this->session->data['cart'][$key] += $value;
					}
				}			
			}

			if ( !empty($customer_data->row['wishlist']) && is_string($customer_data->row['wishlist'])) {
				if (!isset($this->session->data['wishlist'])) {
					$this->session->data['wishlist'] = array();
				}
								
				$wishlist = unserialize($customer_data->row['wishlist']);
			
				foreach ($wishlist as $product_id) {
					if (!in_array($product_id, $this->session->data['wishlist'])) {
						$this->session->data['wishlist'][] = $product_id;
					}
				}			
			}
			/* end specific block */

			
			return $customer_data->row['customer_id'];
		}
		else
		{
			return false;
		}
	}
	
	public function addCustomerAfterConfirm($data)
	{
		$query = $this->db->query("SELECT * 
									   FROM `" . DB_PREFIX . "customer`
									   WHERE `email`='".$this->db->escape($data['email'])."'");
			
		if( !empty($query->row) )
		{
				$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
								SET
								 identity = '" .$this->db->escape($data['identity']) . "',
								 provider = '".$this->db->escape($data['provider']) ."',
								 data = '".$this->db->escape($data['data'])."',
								 link = '".$this->db->escape($data['link'])."',
								 email = '".$this->db->escape($data['email'])."',
								 customer_id = '".(int)$query->row['customer_id']."'");
			
			/* start 0702 */
			$fields = array("firstname", "lastname", "email", "telephone", "company", "postcode",
			"country", "zone", "city", "address_1", "link", "group" );
			
			foreach($fields as $field)
			{
				if( !isset($data[$field]) )
				{
					$data[$field] = '';
				}
			}
			
			/* start 2507 */
			if( empty($data['country']) && $this->config->get('socnetauth2_default_country') )
			{
				$data['country'] = $this->config->get('socnetauth2_default_country');
			}
			
			if( !isset($data['newsletter']) )
			{
				$data['newsletter'] = 0;
			}
			/* end 2507 */
			
			$data['customer_id'] = $query->row['customer_id'];
			
			$this->db->query("UPDATE " . DB_PREFIX . "customer 
							  SET
								firstname = '".$this->db->escape($data['firstname'])."',
								lastname = '".$this->db->escape($data['lastname'])."',
								email = '".$this->db->escape($data['email'])."',
								telephone = '".$this->db->escape($data['telephone'])."',
								newsletter = '".(int)$data['newsletter']."',
							    ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'
							  WHERE 
								customer_id='".(int)$data['customer_id']."'");					 
				
			if( $this->config->get('socnetauth2_save_to_addr')!='customer_only' )
			{
				$query2 = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer 
											   WHERE customer_id='".(int)$data['customer_id']."'");
				
				if( !empty( $query2->row['address_id'] ) )
				{
					$this->db->query("UPDATE " . DB_PREFIX . "address 
							SET  
								firstname = '" . $this->db->escape($data['firstname']) . "', 
								lastname = '" . $this->db->escape($data['lastname']) . "', 
								company = '" . $this->db->escape($data['company']) . "', 
								address_1 = '" . $this->db->escape($data['address_1']) . "', 
								postcode = '" . $this->db->escape($data['postcode']) . "', 
								city = '" . $this->db->escape($data['city']) . "', 
								zone_id = '" . (int)$data['zone'] . "', 
								country_id = '" . (int)$data['country'] . "'
							WHERE
								address_id = '" . (int)$query2->row['address_id'] . "'");
				}
				else
				{
					$this->db->query("INSERT INTO " . DB_PREFIX . "address 
					SET 
					customer_id = '" . (int)$data['customer_id'] . "', 
					firstname = '" . $this->db->escape($data['firstname']) . "', 
					lastname = '" . $this->db->escape($data['lastname']) . "', 
					company = '" . $this->db->escape($data['company']) . "', 
					address_1 = '" . $this->db->escape($data['address_1']) . "', 
					postcode = '" . $this->db->escape($data['postcode']) . "', 
					city = '" . $this->db->escape($data['city']) . "', 
					zone_id = '" . (int)$data['zone'] . "', 
					country_id = '" . (int)$data['country'] . "'");
			
					$address_id = $this->db->getLastId();
			
					$this->db->query("UPDATE " . DB_PREFIX . "customer 
							  SET address_id = '" . (int)$address_id . "' 
							  WHERE customer_id = '" . (int)$data['customer_id'] . "'");
					
				}
			}
			/* end 0702 */
		}
		
		return $query->row['customer_id'];
	}
	
	public function addCustomer($data)
	{ 
		/* start 1007 */
		foreach($data as $key=>$val)
		{
			$data[$key] = trim($data[$key]);
		}
		
		$update_customer = '';
		
		if( !empty($data['firstname']) )
			$update_customer .= " firstname = '".$this->db->escape($data['firstname'])."', ";
		
		if( !empty($data['lastname']) )
			$update_customer .= " lastname = '".$this->db->escape($data['lastname'])."', ";
		
		if( !empty($data['email']) )
			$update_customer .= " email = '".$this->db->escape($data['email'])."', ";
		
		if( !empty($data['telephone']) )
			$update_customer .= " telephone = '".$this->db->escape($data['telephone'])."', ";
		
		/* start 2507 */
		if( isset($data['newsletter']) )
			$update_customer .= " newsletter = '".(int)$data['newsletter']."', ";
		/* end 2507 */
		
		$update_address = '';
		
		if( !empty($data['firstname']) )
			$update_address .= " firstname = '".$this->db->escape($data['firstname'])."', ";
		
		if( !empty($data['lastname']) )
			$update_address .= " lastname = '".$this->db->escape($data['lastname'])."', ";
		
		if( !empty($data['company']) )
			$update_address .= " company = '".$this->db->escape($data['company'])."', ";
		
		if( !empty($data['address_1']) )
			$update_address .= " address_1 = '".$this->db->escape($data['address_1'])."', ";
		
		if( !empty($data['postcode']) )
			$update_address .= " postcode = '".$this->db->escape($data['postcode'])."', ";
		
		if( !empty($data['city']) )
			$update_address .= " city = '".$this->db->escape($data['city'])."', ";
		
		if( !empty($data['zone']) )
			$update_address .= " zone_id = '".$this->db->escape($data['zone'])."', ";
		
		if( !empty($data['country']) )
			$update_address .= " country_id = '".$this->db->escape($data['country'])."', ";
		/* start 2507 */
		elseif( $this->config->get('socnetauth2_default_country') )
			$update_address .= " country_id = '".(int)$this->config->get('socnetauth2_default_country')."', ";
		/* end 2507 */
		
		$update_address = preg_replace("/\, $/", "", $update_address);
		 
		/* end 1007 */
		
		/* kin insert metka: c1 */
		$fields = array("firstname", "lastname", "email", "telephone", "company", "postcode",
		"country", "zone", "city", "address_1", "link", "group" );
		
		foreach($fields as $field)
		{
			if( !isset($data[$field]) )
			{
				$data[$field] = '';
			}
		}
		/* end kin metka: c1 */
		
		/* start specific block: catalog/model/account/customer.php */
		
		/* start 0102 */
		$updates = '';
		if( $data['group'] )
		{
			$customer_group_id = $data['group'];
			$updates = ", customer_group_id='".(int)$customer_group_id."' ";
		}
		else
			$customer_group_id = $this->config->get('socnetauth2_'.$data['provider'].'_customer_group_id');
		/* end 0102 */
		
		if( !$customer_group_id )
		$customer_group_id = $this->config->get('config_customer_group_id');
		
		$customer_id = '';
		
		if( !empty($data['data']) ) 
		{
			$data['data'] = preg_replace("/[\\\]+\'/", "'", $data['data']);			
		}
		
		$need_email = 0;
		
		if( $this->config->get('socnetauth2_email_auth') == 'noconfirm' && 
			!empty( $data['email'] ) )
		{
			$query = $this->db->query("SELECT * 
									   FROM `" . DB_PREFIX . "customer`
									   WHERE `email`='".$this->db->escape($data['email'])."'");
			
			if( !empty($query->row) )
			{
				$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
								SET
								 identity = '" .$this->db->escape($data['identity']) . "',
								 provider = '".$this->db->escape($data['provider']) ."',
								 data = '".$this->db->escape($data['data'])."',
								 link = '".$this->db->escape($data['link'])."',
								 email = '".$this->db->escape($data['email'])."',
								 customer_id = '".(int)$query->row['customer_id']."'");
				
				$customer_id = $query->row['customer_id'];
			}
			else
			{
				/* start 1007 */
				$this->db->query("INSERT INTO " . DB_PREFIX . "customer 
							  SET
								".$update_customer."
								ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "',
								approved = 1,
								customer_group_id = '" . (int)$customer_group_id . "', 
								status = '1', 
								date_added = NOW()");
				/* end 1007 */
				
								
				$customer_id = $this->db->getLastId();
				
				/* start 1710 */
				if( $this->config->has('reward_customer_sv') )
				{
					$reward_customer_sv = $this->config->get('reward_customer_sv');
					
					if( !empty( $reward_customer_sv['points_register'] ) )
					{
						$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward 
							  SET
								customer_id = '".(int)$customer_id."',
								points = '".(float)$reward_customer_sv['points_register']."',
								`description` = 'reward_customer_sv+socnetauth2',
								date_added = NOW()");
					}
				}
				/* end 1710 */
				
				
				$need_email = 1;
								
				$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
							  SET
								 identity = '" .$this->db->escape($data['identity']) . "',
								 provider = '".$this->db->escape($data['provider']) ."',
								 data = '".$this->db->escape($data['data'])."',
								 link = '".$this->db->escape($data['link'])."',
								 email = '".$this->db->escape($data['email'])."',
								 customer_id = '".(int)$customer_id."'");				
			}
			
		}
		else
		{
			if( empty($data['customer_id']) )
			{
				/* start 1007 */
				$this->db->query("INSERT INTO " . DB_PREFIX . "customer 
							  SET
								".$update_customer."
								ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "',
								approved = 1,
								customer_group_id = '" . (int)$customer_group_id . "', 
								status = '1', 
								date_added = NOW()");
				/* end 1007 */
				$need_email = 1;				
				$customer_id = $this->db->getLastId();
				
				/* start 1710 */
				if( $this->config->has('reward_customer_sv') )
				{
					$reward_customer_sv = $this->config->get('reward_customer_sv');
					
					if( !empty( $reward_customer_sv['points_register'] ) )
					{
						$this->db->query("INSERT INTO " . DB_PREFIX . "customer_reward 
							  SET
								customer_id = '".(int)$customer_id."',
								points = '".(float)$reward_customer_sv['points_register']."',
								`description` = 'reward_customer_sv+socnetauth2',
								date_added = NOW()");
					}
				}
				/* end 1710 */
				
				$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account` 
							  SET
								 identity = '" .$this->db->escape($data['identity']) . "',
								 provider = '".$this->db->escape($data['provider']) ."',
								 data = '".$this->db->escape($data['data'])."',
								 link = '".$this->db->escape($data['link'])."',
								 email = '".$this->db->escape($data['email'])."',
								 customer_id = '".(int)$customer_id."'");
			
			}
			else
			{
				/* start 1007 */
				$this->db->query("UPDATE " . DB_PREFIX . "customer 
							  SET
								".$update_customer."
								ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'
								".$updates."
							  WHERE 
								customer_id='".(int)$data['customer_id']."'");
				/* end 1007 */
				$customer_id = $data['customer_id'];
			}
		}
		/* end specific block */
		
		
		if( $this->config->get('socnetauth2_save_to_addr')!='customer_only' )
		{
			if( empty($data['customer_id']) )
			{
				/* start 1007 */
				$this->db->query("INSERT INTO " . DB_PREFIX . "address 
				SET 
				".$update_address.",
				customer_id = '" . (int)$customer_id . "'");
				/* end 1007 */
		
				$address_id = $this->db->getLastId();
		
				$this->db->query("UPDATE " . DB_PREFIX . "customer 
						  SET address_id = '" . (int)$address_id . "' 
						  WHERE customer_id = '" . (int)$customer_id . "'");
			}
			else
			{
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer 
										   WHERE customer_id='".(int)$data['customer_id']."'");
				
				if( !empty( $query->row['address_id'] ) )
				{
					/* start 1007 */
					$this->db->query("UPDATE " . DB_PREFIX . "address 
						SET  
							".$update_address."
						WHERE
							address_id = '" . (int)$query->row['address_id'] . "'");
					/* end 1007 */
				}
				/* start 0702 */
				else
				{
					/* start 1007 */
					$this->db->query("INSERT INTO " . DB_PREFIX . "address 
					SET 
					customer_id = '" . (int)$data['customer_id'] . "', 
					".$update_address."");
					/* end 1007 */
							
							
					$address_id = $this->db->getLastId();
			
					$this->db->query("UPDATE " . DB_PREFIX . "customer 
							  SET address_id = '" . (int)$address_id . "' 
							  WHERE customer_id = '" . (int)$data['customer_id'] . "'");
				}
				/* end 0702 */
			}
			
			
			
		}
		
		/* end kin metka: c1 */
		
			$this->log->write("metka-1");
			
		if( $need_email == 1 && !empty($data['email']) )
		{
			$this->log->write("metka-2");
			
			$this->language->load('mail/customer');
			
			$subject = sprintf($this->language->get('text_subject'), $this->config->get('config_name'));
			
			$message = sprintf($this->language->get('text_welcome'), $this->config->get('config_name')) . "\n\n";
			
			#if (!$customer_group_info['approval']) {
				$message .= $this->language->get('text_login') . "\n";
			#} else {
			#	$message .= $this->language->get('text_approval') . "\n";
			#}
			
			$message .= $this->url->link('account/login', '', 'SSL') . "\n\n";
			$message .= $this->language->get('text_services') . "\n\n";
			$message .= $this->language->get('text_thanks') . "\n";
			$message .= $this->config->get('config_name');
			
			$this->log->write("metka-3");
			
			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->hostname = $this->config->get('config_smtp_host');
			$mail->username = $this->config->get('config_smtp_username');
			$mail->password = $this->config->get('config_smtp_password');
			$mail->port = $this->config->get('config_smtp_port');
			$mail->timeout = $this->config->get('config_smtp_timeout');				
			$mail->setTo($data['email']);
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender($this->config->get('config_name'));
			$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
			$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
			$mail->send();
			
			$this->log->write("metka-4");
			
			
			// Admin Alert Mail
			if ($this->config->get('config_account_mail')) 
			{
			$this->log->write("metka-5");
			
				$message  = $this->language->get('text_signup') . "\n\n";
				$message .= $this->language->get('text_website') . ' ' . $this->config->get('config_name') . "\n";
				
				if ( !empty($data['firstname']) ) 
					$message .= $this->language->get('text_firstname') . ' ' . $data['firstname'] . "\n";
				if ( !empty($data['lastname']) )
					$message .= $this->language->get('text_lastname') . ' ' . $data['lastname'] . "\n";
				#$message .= $this->language->get('text_customer_group') . ' ' . $customer_group_info['name'] . "\n";
				
				if ( !empty($data['company']) ) {
					$message .= $this->language->get('text_company') . ' '  . $data['company'] . "\n";
				}
				
				$message .= $this->language->get('text_email') . ' '  .  $data['email'] . "\n";
				
				if ( !empty($data['telephone']) )
				$message .= $this->language->get('text_telephone') . ' ' . $data['telephone'] . "\n";
				
			$this->log->write("metka-6: ".$this->config->get('config_email'));
			
				$mail->setTo($this->config->get('config_email'));
				$mail->setSubject(html_entity_decode($this->language->get('text_new_customer'), ENT_QUOTES, 'UTF-8'));
				$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
				$mail->send();
				
			$this->log->write("metka-7");
				// Send to additional alert emails if new account email is enabled
				$emails = explode(',', $this->config->get('config_alert_emails'));
				
				foreach ($emails as $email) {
			$this->log->write("metka-8: ".$email);
					if (strlen($email) > 0 && preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email)) {
						
						
			$this->log->write("metka-9: ".$email);
						$mail->setTo($email);
						$mail->send();
					}
				}
			}
		}
		
		
		return $customer_id;
	}
	
	public function checkUniqEmail($email)
	{
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer` WHERE email='".$this->db->escape($email)."'");
		
		if( $query->row ) 
			return false;
		else 
			return true;
	}
	
	public function getOldDoborData($loginza_data)
	{
		$RES = array(
			"firstname" => "", 
			"lastname" => "", 
			"email" => "", 
			"telephone" => "",
		
			/* start 2505 */
			"newsletter" => "",
			/* end 2505 */
			
			/* start 0102 */
			"group" => "",
			/* end 0102 */
			"company" => "", 
			"address_1" => "", 
			"postcode" => "", 
			"city" => "", 
			"zone" => "", 
			"country" => ""
		);
		
		
		/* start 1007 */ 
		
		$dobor_customer_id = 0;
		
		if( !empty( $loginza_data['data']['customer_id'] ) )
		{
			$dobor_customer_id = $loginza_data['data']['customer_id'];
		}
		else 
		{
			$query = $this->db->query("SELECT * 
								   FROM `" . DB_PREFIX . "customer` c 
								   JOIN `" . DB_PREFIX . "socnetauth2_customer2account` sc
								   ON c.customer_id=sc.customer_id
								   WHERE 
									sc.identity='".$this->db->escape($loginza_data['data']['identity'])."'
								");
			if( !empty( $query->row['customer_id'] ) )
				$dobor_customer_id = $query->row['customer_id'];
			elseif( $this->config->get('socnetauth2_email_auth') == 'noconfirm' 
					&& !empty($loginza_data['data']['email'])
			)
			{
				$query = $this->db->query("SELECT * 
								   FROM `" . DB_PREFIX . "customer` c  
								   WHERE 
									c.email ='".$this->db->escape($loginza_data['data']['email'])."'
								");
				if( !empty( $query->row['customer_id'] ) )
					$dobor_customer_id = $query->row['customer_id'];
			}
		}
		 
		if( empty($dobor_customer_id) ) return;
		 
		$query = $this->db->query("SELECT * 
								   FROM `" . DB_PREFIX . "customer` c  
								   WHERE 
									c.customer_id = '".(int)$dobor_customer_id."'");
		
		if( empty($query->row) ) return;
		$RES['dobor_customer_id'] = $dobor_customer_id;
		/* end 1007 */ 
		
		$RES['telephone'] = $query->row['telephone'];
		$RES['email'] = $query->row['email'];
		$RES['firstname'] = $query->row['firstname'];
		$RES['lastname'] = $query->row['lastname'];
		/* start 0102 */
		$RES['group'] = $query->row['customer_group_id'];
		/* end 0102 */
		
		if( !empty($query->row['address_id']) )
		{
			$query_address = $this->db->query("SELECT * 
								   FROM `" . DB_PREFIX . "address` 
								   WHERE 
									address_id='".(int)$query->row['address_id']."'
								");
			
			if( !empty($query_address->row) )
			{
				
				$RES['company'] = $query_address->row['company'];
				$RES['address_1'] = $query_address->row['address_1'];
				$RES['postcode'] = $query_address->row['postcode'];
				
				$RES['city'] = $query_address->row['city'];
				$RES['zone'] = $query_address->row['zone_id'];
				$RES['country'] = $query_address->row['country_id'];
			}
		}
		
		return $RES;
	}
	
	
	public function sendConfirmEmail($data)
	{
		$res = $this->db->query("SHOW TABLES");
		$installed = 0;
		foreach($res->rows as $key=>$val)
		{
			foreach($val as $k=>$v)
			{
				if( $v == DB_PREFIX . 'socnetauth2_precode' )
				{
					$installed = 1;
				}
			}
		}
		
		if( $installed == 0 )
		{		
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "socnetauth2_precode` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`identity` varchar(300) NOT NULL,
				`code` varchar(300) NOT NULL,
				`cdate` DATETIME NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
			$this->db->query($sql);
			
		}
				
		$code = md5( rand() );
		$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_precode`
						  SET 
							`identity` = '".$this->db->escape($data['identity'])."',
							`code` = '".$this->db->escape($code)."',
							`cdate`=NOW()");
		
		
		$subject = $this->language->get('text_mail_subject');
		$message = $this->language->get('text_mail_body');
		$message = str_replace("%", $code, $message);
		
		$mail = new Mail();
		$mail->protocol = $this->config->get('config_mail_protocol');
		$mail->parameter = $this->config->get('config_mail_parameter');
		$mail->hostname = $this->config->get('config_smtp_host');
		$mail->username = $this->config->get('config_smtp_username');
		$mail->password = $this->config->get('config_smtp_password');
		$mail->port = $this->config->get('config_smtp_port');
		$mail->timeout = $this->config->get('config_smtp_timeout');				
		$mail->setTo($data['email']);
		$mail->setFrom($this->config->get('config_email'));
		$mail->setSender($this->config->get('config_name'));
		$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
		$mail->setHtml($message);
		$mail->send();
		
		return $code;
	}
	
	public function checkConfirmCode($identity, $code)
	{
		$res = $this->db->query("SHOW TABLES");
		$installed = 0;
		foreach($res->rows as $key=>$val)
		{
			foreach($val as $k=>$v)
			{
				if( $v == DB_PREFIX . 'socnetauth2_precode' )
				{
					$installed = 1;
				}
			}
		}
		
		if( $installed == 0 )
		{		
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "socnetauth2_precode` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`identity` varchar(300) NOT NULL,
				`code` varchar(300) NOT NULL,
				`cdate` DATETIME NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
			$this->db->query($sql);
			
		}
		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "socnetauth2_precode` 
								   WHERE identity='".$this->db->escape($identity)."' 
								   AND code='".$this->db->escape($code)."'");
		
		
		$this->db->query("DELETE FROM `" . DB_PREFIX . "socnetauth2_precode` 
						  WHERE DATE_ADD(cdate, INTERVAL 1 DAY) < NOW() ");
		
		if( $query->row ) 
			return true;
		else 
			return false;
	}
	
	/* start 1505 */
	public function custom_unserialize($s)
	{
		if( is_array($s) ) return $s;
	
		if(
			stristr($s, '{' ) != false &&
			stristr($s, '}' ) != false &&
			stristr($s, ';' ) != false &&
			stristr($s, ':' ) != false
		){
			return unserialize($s);
		}else{
			return $s;
		}

	}
	
	public function getConfigPostValue($key)
	{
		return $this->config->get($key);
	}
	
	public function checkIsSocnetAvailable($key)
	{
		if( !$this->getConfigPostValue('socnetauth2_'.$key.'_status') )
			return false;
		
		if( $this->getConfigPostValue('socnetauth2_'.$key.'_agent') == 'loginza' )
			return true;
		
		if( $key == 'vkontakte' )
		{
			if( $this->getConfigPostValue('socnetauth2_vkontakte_appid') && 
				$this->getConfigPostValue('socnetauth2_vkontakte_appsecret')
			)
			{
				return true;
			}
		}
		elseif( $key == 'facebook' )
		{
			if( $this->getConfigPostValue('socnetauth2_facebook_appid') && 
				$this->getConfigPostValue('socnetauth2_facebook_appsecret')
			)
			{
				return true;
			}
		}
		elseif( $key == 'twitter' )
		{
			if( $this->getConfigPostValue('socnetauth2_twitter_consumer_key') && 
				$this->getConfigPostValue('socnetauth2_twitter_consumer_secret')
			)
			{
				return true;
			}
		}
		elseif( $key == 'odnoklassniki' )
		{
			if( $this->getConfigPostValue('socnetauth2_odnoklassniki_application_id') && 
				$this->getConfigPostValue('socnetauth2_odnoklassniki_public_key') && 
				$this->getConfigPostValue('socnetauth2_odnoklassniki_secret_key')
			)
			{
				return true;
			}
		}
		elseif( $key == 'gmail' )
		{
			if( $this->getConfigPostValue('socnetauth2_gmail_client_id') && 
				$this->getConfigPostValue('socnetauth2_gmail_client_secret')
			)
			{
				return true;
			}
		}
		elseif( $key == 'mailru' )
		{
			if( $this->getConfigPostValue('socnetauth2_mailru_id') && 
				$this->getConfigPostValue('socnetauth2_mailru_private') && 
				$this->getConfigPostValue('socnetauth2_mailru_secret')
			)
			{
				return true;
			}
		}
		elseif( $key == 'yandex' )
		{
			if( $this->getConfigPostValue('socnetauth2_yandex_client_id') && 
				$this->getConfigPostValue('socnetauth2_yandex_client_secret') && 
				(
					$this->getConfigPostValue('socnetauth2_yandex_rights_email') ||
					$this->getConfigPostValue('socnetauth2_yandex_rights_info')
				)
			)
			{
				return true;
			}
		}
		elseif( $key == 'steam' )
		{
			if( $this->getConfigPostValue('socnetauth2_steam_api_key') )
			{
				return true;
			}
		}
		
		return false;
	}
	
	public function getLoginzaLangCode($code)
	{
		$lang_hash = array(
				"ru"=>"ru",
				"uk"=>"uk",
				"ua"=>"uk",
				"be"=>"be",
				"fr"=>"fr",
				"en"=>"en"
		);
			
		if( isset($lang_hash[ $code ]) )
		{
			return $lang_hash[ $code ];
		}
		elseif( isset($lang_hash[ $this->config->get('config_language') ]) )
		{
			return $lang_hash[ $this->config->get('config_language') ];
		}
		else
		{
			return 'ru';
		}
	}
	
	public function getEnabledSocnets()
	{
		$socnetauth2_shop_folder = '';
		if( $this->config->get('socnetauth2_shop_folder') ) 
			$socnetauth2_shop_folder = '/'.$this->config->get('socnetauth2_shop_folder');
			
		$http = 'http://';
		if( $this->config->get('socnetauth2_protokol') == 'detect' )
		{
			if( 
				( isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ) || 
				!empty($_SERVER['HTTPS']) 
				|| ( !empty($_SERVER['HTTP_CF_VISITOR']) && strstr($_SERVER['HTTP_CF_VISITOR'], "https") )	
			)
				$http = 'https://';
			else
				$http = 'http://';
		}
		else
			$http = $this->config->get('socnetauth2_protokol'). '://';
		 
		$redirect_url = $http.
						$_SERVER['HTTP_HOST'].$socnetauth2_shop_folder.
						'/socnetauth2/loginza.php';
		$redirect_url = urlencode($redirect_url);
		
		$lang = $this->getLoginzaLangCode( $this->config->get('config_language') );
		
		$result = array();
		foreach( $this->socnets as $key=>$socnet )
		{
			if( $this->checkIsSocnetAvailable($key) )
			{
				$link = '';
				if( $this->getConfigPostValue('socnetauth2_'.$key.'_agent') != 'loginza' )
				{
					$link = $socnetauth2_shop_folder.'/socnetauth2/'.$key.'.php?first=1';
				}
				else
				{
					$link = "https://loginza.ru/api/widget?token_url=".$redirect_url."&provider=".
					$socnet['loginza_key']."&lang=".$lang."&providers_set=vkontakte,facebook,twitter,odnoklassniki,google,mailru,steam,yandex";
				}
				
				$socnet['link'] = $link;
				
				$result[] = $socnet;
			}
		}
		
		return $result;
	}
	
	public function getCountEnabledSocnets()
	{
		$count = 0;
		foreach( $this->socnets as $key=>$socnet )
		{
			if( $this->checkIsSocnetAvailable($key) )
			{
				$count++;
			}
		}
		
		return $count;
	}
	/* end 1505 */
}

?>