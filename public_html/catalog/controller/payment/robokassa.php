<?php /* robokassa metka */
class ControllerPaymentRobokassa extends Controller {

	private $INDEX = 0;
	
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
	
	
	
	public function getRedirectURL()
	{
		$order_id = $this->session->data['order_id'];
		$method = $this->session->data['payment_code'];
		$INDEX = 0;
		
		$ar = array();
		if( preg_match("/(\d+)$/", $this->session->data['payment_code'], $ar) )
		{
			$INDEX = $ar[1];
		}
		
		//------------------------------------
		
		
		$this->load->model('checkout/order');
		
		$order_info = array();
		
		$order_info = $this->model_checkout_order->getOrder($order_id);
		
		$URL = '';
		
		
		$STORE_ID = $this->config->get('config_store_id');
		$CONFIG = array();
		
		if( $STORE_ID )
		{
			$CONFIG['robokassa_test_mode'] = $this->config->get('robokassa_test_mode_store');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login_store');
			$CONFIG['robokassa_currencies'] = $this->config->get('robokassa_currencies_store');
			$CONFIG['robokassa_currency'] = $this->config->get('robokassa_currency_store');
			$CONFIG['robokassa_interface_language'] = $this->config->get('robokassa_interface_language_store');
			$CONFIG['robokassa_default_language'] = $this->config->get('robokassa_default_language_store');
			$CONFIG['robokassa_password1'] = $this->config->get('robokassa_password1_store');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status_store');
			$CONFIG['robokassa_order_comment'] = $this->config->get('robokassa_order_comment_store');
			$CONFIG['robokassa_preorder_status_id'] = $this->config->get('robokassa_preorder_status_id_store');
			$CONFIG['robokassa_commission'] = $this->config->get('robokassa_commission_store');
			$CONFIG['robokassa_desc'] = $this->config->get('robokassa_desc_store');
			$CONFIG['robokassa_desc'] = $CONFIG['robokassa_desc'][ $this->config->get('config_language') ];
			$CONFIG['robokassa_premod_order_comment'] = $this->config->get('robokassa_premod_order_comment_store');
			$CONFIG['robokassa_premod_preorder_status_id'] = $this->config->get('robokassa_premod_preorder_status_id_store');
			$CONFIG['robokassa_premod_hide_order_comment'] = $this->config->get('robokassa_premod_hide_order_comment_store');
			$CONFIG['robokassa_premod_success_page_type'] = $this->config->get('robokassa_premod_success_page_type_store');
			
			
		
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				if( isset( $value[$STORE_ID] ) )
				$CONFIG[$key] = $value[$STORE_ID];
				else
				$CONFIG[$key] = '';
			}
		}
		else
		{
			$CONFIG['robokassa_test_mode'] = $this->config->get('robokassa_test_mode');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login');
			$CONFIG['robokassa_currencies'] = $this->config->get('robokassa_currencies');
			$CONFIG['robokassa_currency'] = $this->config->get('robokassa_currency');
			$CONFIG['robokassa_interface_language'] = $this->config->get('robokassa_interface_language');
			$CONFIG['robokassa_default_language'] = $this->config->get('robokassa_default_language');
			$CONFIG['robokassa_password1'] = $this->config->get('robokassa_password1');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status');
			$CONFIG['robokassa_order_comment'] = $this->config->get('robokassa_order_comment');
			$CONFIG['robokassa_preorder_status_id'] = $this->config->get('robokassa_preorder_status_id');
			$CONFIG['robokassa_desc'] = $this->config->get('robokassa_desc');
			$CONFIG['robokassa_commission'] = $this->config->get('robokassa_commission');
			$CONFIG['robokassa_desc'] = $CONFIG['robokassa_desc'][ $this->config->get('config_language') ];
			$CONFIG['robokassa_premod_order_comment'] = $this->config->get('robokassa_premod_order_comment');
			$CONFIG['robokassa_premod_preorder_status_id'] = $this->config->get('robokassa_premod_preorder_status_id');
			$CONFIG['robokassa_premod_hide_order_comment'] = $this->config->get('robokassa_premod_hide_order_comment');
			$CONFIG['robokassa_premod_success_page_type'] = $this->config->get('robokassa_premod_success_page_type');
			
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				$CONFIG[$key] = $value;
			}
		}
		
		
		$URL = "https://auth.robokassa.ru/Merchant/Index.aspx?";
			
		
		//------------------------------------
		
		$mrh_login = $CONFIG['robokassa_shop_login'];
		
		$URL .= 'MrchLogin='.$mrh_login;
		
		if( $CONFIG['robokassa_test_mode'] )
		$URL .= '&IsTest=1'; 
		
		//----
		
		$robokassa_currencies = $CONFIG['robokassa_currencies'];
		if( $robokassa_currencies[$INDEX] == 'robokassa' )
		$robokassa_currencies[$INDEX] = '';
		$in_curr = $robokassa_currencies[$INDEX];
		
		$URL .= '&IncCurrLabel='.$in_curr;
		
		//-----
		
		$culture = $this->session->data['language'];
		
		
		if( $CONFIG['robokassa_interface_language'] && $CONFIG['robokassa_interface_language']!='detect' )
		{
			$culture = $CONFIG['robokassa_interface_language'];
		}
		elseif( $CONFIG['robokassa_interface_language']=='detect' )
		{
			if( $this->session->data['language'] == 'ru' || $this->session->data['language']=='en' )
			{
				$culture = $this->session->data['language'];
			}
			elseif( $CONFIG['robokassa_default_language'] )
			{
				$culture = $CONFIG['robokassa_default_language'];
			}
			else
			{
				$culture = 'ru';
			}
		}
		else
		{
			if( $culture!='en' )
			{
				$culture!='ru';
			}
		}
		
		$URL .= '&Culture='.$culture;
		
		//----		
		
		$out_summ = $order_info['total'];
		
		if( $this->config->get('config_currency')!=$CONFIG['robokassa_currency'] ) 
		{
			$out_summ = $this->currency->convert($out_summ, $this->config->get('config_currency'), $CONFIG['robokassa_currency']);
		}
		
		
		
		if( $CONFIG['robokassa_commission'] == 'shop' #&& $LINK['IncCurrLabel'] 
		)
		{
			$url = 'https://auth.robokassa.ru/Merchant/WebService/Service.asmx/CalcOutSumm?MerchantLogin='.$mrh_login.
					'&IncCurrLabel='.$in_curr.'&IncSum='.$out_summ;
			
			
			if( extension_loaded('curl') )
			{
				$c = curl_init($url);
				curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
				$page = curl_exec($c);
				curl_close($c);
			}
			else
			{
				$page = file_get_contents($url);
			}
			
			$ar = array();
			//<OutSum>93.200000</OutSum>
			
			if( $page && preg_match("/<OutSum>([\d\.]+)<\/OutSum>/", $page, $ar) )
			{
				if( !empty($ar[1]) )
				{
					$out_summ = $ar[1];
				}
				
			}
		}
		
		
		$URL .= '&OutSum='.$out_summ;
		
		//----
		
		$shp_item = "2";
		$URL .= '&Shp_item='.$shp_item;
		
		//----		
		
		$URL .= '&Email='.$order_info['email'];
		
		//-----
		
		$inv_id =  $order_id;
		$URL .= '&InvId='.$inv_id;
		
		//-----
		
		
		$Desc = $CONFIG['robokassa_desc'];
		$Desc = str_replace("{number}", $inv_id, $Desc);
		$Desc = str_replace("{siteurl}", $order_info['store_url'], $Desc);
		$order_info['name'] = $order_info['firstname'].' '.$order_info['lastname'];
		$Desc = str_replace("{name}", $order_info['name'], $Desc);
		$Desc = urlencode($Desc);
		
		
		$URL .= '&Desc='.$Desc;
		
		
		//-----
		
		$mrh_pass1 = $CONFIG['robokassa_password1'];
		
		$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
		
		$URL .= '&SignatureValue='.$crc;
		
		if( $CONFIG['robokassa_confirm_status'] == 'before' ) 
		{ 
			$comment = '';
		
			if( !empty($order_info['language_id']) )
			{
				$this->load->model('localisation/language');
				$lang = $this->model_localisation_language->getLanguage($order_info['language_id']);
					
				if( !empty($lang['code']) && $CONFIG['robokassa_order_comment'] )
				{
					$comment_arr = $CONFIG['robokassa_order_comment'];
					
					if( !empty($comment_arr[$lang['code']]) )
					{
						$comment = $comment_arr[$lang['code']];
					}
				}
			
				$comment = str_replace("{link}", $URL, $comment);
				$comment = preg_replace("/[\n\r\t]/", "<br>", $comment);
				
				$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
			}
			
			$this->model_checkout_order->confirm($order_id, $CONFIG['robokassa_preorder_status_id'], $comment, true);
		}
		
		if( $CONFIG['robokassa_confirm_status'] == 'premod' ) 
		{
			$comment = '';
			
			$this->load->model('localisation/language');
			$lang = $this->model_localisation_language->getLanguage($order_info['language_id']);
					
		
			if( !empty($order_info['language_id']) )
			{
				if( !empty($lang['code']) && $CONFIG['robokassa_premod_order_comment'] )
				{
					$comment_arr = $CONFIG['robokassa_premod_order_comment'];
					
					if( !empty($comment_arr[$lang['code']]) )
					{
						$comment = $comment_arr[$lang['code']];
					}
				}
			
				$comment = str_replace("{link}", $URL, $comment);
				$comment = preg_replace("/[\n\r\t]/", "<br>", $comment);
				
				$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
			}
			
			$this->model_checkout_order->confirm($order_id, $CONFIG['robokassa_premod_preorder_status_id'], $comment, true);
			
			$premod_comment = '';
			if( !empty($lang['code']) && $CONFIG['robokassa_premod_hide_order_comment'] )
			{
				$comment_arr = $CONFIG['robokassa_premod_hide_order_comment'];
				
				if( !empty($comment_arr[$lang['code']]) )
				{
					$premod_comment = $comment_arr[$lang['code']];
				}
				
				$premod_comment = html_entity_decode($premod_comment, ENT_QUOTES, 'UTF-8');
			
				$premod_comment = str_replace("{link}", $URL, $premod_comment);
				$premod_comment = preg_replace("/[\n\r\t]/", "<br>", $premod_comment);
			}
				
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "order_history 
							  SET order_id = '" . (int)$order_id . "', 
							  order_status_id = '" . (int)$CONFIG['robokassa_premod_preorder_status_id'] . "', 
							  notify = '0', comment = '" . $this->db->escape($premod_comment) . "', date_added = NOW()");

			
			if( $this->config->get('robokassa_premod_success_page_type') == 'custom' && 
				$this->config->get('robokassa_confirm_status') == 'premod' )
			$URL = $this->url->link('checkout/robosuccess');
			else
			$URL = $this->url->link('checkout/success');
		
			
		}
		//------------------------------------
				
		exit($URL);		
	}
	
	public function preorder()
	{
		if( !isset($this->request->get['INDEX']) )
		{
			exit( json_encode(
					array(
						"error" => "empty index"
					)
				)
			);
		}
		
		// -----
		
		if( empty($this->session->data['order_id']) )
		{
			exit( json_encode(
					array(
						"error" => "empty order_id"
					)
				)
			);
		}
		
		// =============
		
		$order_id = $this->session->data['order_id'];
		$INDEX = $this->request->get['INDEX'];
	
		$this->load->model('payment/robokassa');
		$CONFIG = $this->model_payment_robokassa->getConfig($INDEX);
		
		list( $this->data['action'], $this->data['PARAMS'] 
		) = $this->model_payment_robokassa->getParams($INDEX, $CONFIG);
		
		$LINK = $this->model_payment_robokassa->addPayment($order_id, array(
			"service" => "robokassa",
			"total" => $this->data['PARAMS']['OutSum'],
			"comment" => $this->data['PARAMS']['Desc'],
			"params" => $this->data['PARAMS'],
			"url" => $this->data['action']
		));
		
		$this->load->model('checkout/order');		
		$order_info = $this->model_checkout_order->getOrder($order_id);
		
		$comment = '';
		$premod_comment = '';
		
		if( !empty($order_info['language_id']) )
		{
			$this->load->model('localisation/language');
			$lang = $this->model_localisation_language->getLanguage($order_info['language_id']);
			
			if( $CONFIG['robokassa_confirm_status'] == 'before' )
			{
				if( !empty($lang['code']) && $CONFIG['robokassa_order_comment'] )
				{
					$comment_arr = $CONFIG['robokassa_order_comment'];
				
					if( !empty($comment_arr[$lang['code']]) )
					{
						$comment = $comment_arr[$lang['code']];
					}
				
					$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
				}
			}
			elseif( $CONFIG['robokassa_confirm_status'] == 'premod' )
			{				
				if( !empty($lang['code']) && $CONFIG['robokassa_premod_order_comment'] )
				{
					$comment_arr = $CONFIG['robokassa_premod_order_comment'];
				
					if( !empty($comment_arr[$lang['code']]) )
					{
						$comment = $comment_arr[$lang['code']];
					}
				
					$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
					
					
				}
				
				
				if( !empty($lang['code']) && $CONFIG['robokassa_premod_hide_order_comment'] )
				{
					$comment_arr = $CONFIG['robokassa_premod_hide_order_comment'];
				
					if( !empty($comment_arr[$lang['code']]) )
					{
						$premod_comment = $comment_arr[$lang['code']];
					}
				
					$premod_comment = html_entity_decode($premod_comment, ENT_QUOTES, 'UTF-8');
				}
				
			}
			
			$comment = str_replace("{link}", $LINK, $comment);
			$comment = preg_replace("/[\n\r\t]/", "<br>", $comment);
			
			
			$premod_comment = str_replace("{link}", $LINK, $premod_comment);
			$premod_comment = preg_replace("/[\n\r\t]/", "<br>", $premod_comment);
		}
		
		if( $CONFIG['robokassa_confirm_status'] == 'before' )
		{
			$this->model_checkout_order->confirm($order_id, $CONFIG['robokassa_preorder_status_id'], $comment, true);
		}
		elseif( $CONFIG['robokassa_confirm_status'] == 'premod' )
		{		
			$this->model_checkout_order->confirm($order_id, $CONFIG['robokassa_premod_preorder_status_id'], $comment, true);

			$this->db->query("INSERT INTO " . DB_PREFIX . "order_history 
							  SET order_id = '" . (int)$order_id . "', 
							  order_status_id = '" . (int)$CONFIG['robokassa_premod_preorder_status_id'] . "', 
							  notify = '0', comment = '" . $this->db->escape($premod_comment) . "', date_added = NOW()");
			
			
			/* start 0106 */
			
			if( $CONFIG['robokassa_premod_paynotify'] && $CONFIG['robokassa_paynotify_email'] )
			{
				$subject = $CONFIG['robokassa_premod_paynotify_subject'];
				
				$subject = str_replace("{order_id}", $order_id, $subject);
				
				$html = $CONFIG['robokassa_premod_paynotify_message'];
				$html = preg_replace("/[\n]/", "<br>", $html);
				
				// ---	
				
				$text_products = "";
				
				$order_product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$order_id . "'");

				foreach ($order_product_query->rows as $product) {
					$text_products .= $product['quantity'] . 'x ' . $product['name'] . ' (' . $product['model'] . ') ' . html_entity_decode($this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value']), ENT_NOQUOTES, 'UTF-8') . "\n";
					
					$order_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$order_id . "' AND order_product_id = '" . $product['order_product_id'] . "'");
					
					foreach ($order_option_query->rows as $option) {
						$text_products .= chr(9) . '-' . $option['name'] . ' ' . (utf8_strlen($option['value']) > 20 ? utf8_substr($option['value'], 0, 20) . '..' : $option['value']) . "\n";
					}
				}
				
				$html = str_replace("{products}", $text_products, $html);
				
				//---
				
				 
				$html = str_replace("{pay_link}", $LINK, $html);
				
				$html = str_replace("{order_id}", $order_id, $html);
				
				$html = str_replace("{out_summ}", 
				$this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'])
				, $html);
				
				//---
				
				$query = $this->db->query("SELECT NOW() as dt");
				$pdate = preg_replace("/(\d+)\-(\d+)\-(\d+)\s(\d+)\:(\d+)\:(\d+)/", "$4:$5 $3.$2.$1", $query->row['dt']);
				$html = str_replace("{pdate}", $pdate, $html);
				
				//---
				
				$cdate = preg_replace("/(\d+)\-(\d+)\-(\d+)\s(\d+)\:(\d+)\:(\d+)/", "$4:$5 $3.$2.$1", $order_info['date_added'] );
				$html = str_replace("{cdate}", $cdate, $html);
				
				//---
				
				$customer_name = $order_info['firstname'].' '.$order_info['lastname'];
				$html = str_replace("{customer_name}", $customer_name, $html);
				
				//---
				
				$order_link = preg_replace("/\/$/", "", HTTP_SERVER).'/admin/index.php?route=sale/order/info&order_id='.$order_id;
				
				$html = str_replace("{order_link}", $order_link, $html);
				$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');
			
				$mail = new Mail(); 
				$mail->protocol = $this->config->get('config_mail_protocol');
				$mail->parameter = $this->config->get('config_mail_parameter');
				$mail->hostname = $this->config->get('config_smtp_host');
				$mail->username = $this->config->get('config_smtp_username');
				$mail->password = $this->config->get('config_smtp_password');
				$mail->port = $this->config->get('config_smtp_port');
				$mail->timeout = $this->config->get('config_smtp_timeout');		



				/* start 0412 */
				$emails = array($CONFIG['robokassa_paynotify_email']);
				if( strstr($CONFIG['robokassa_paynotify_email'], ",") )
					$emails = explode(',', $CONFIG['robokassa_paynotify_email']);
				
				foreach($emails as $to_email)
				{ 
					$mail->setTo( trim($to_email) );
					$mail->setFrom($this->config->get('config_email'));
					$mail->setSender($order_info['store_name']);
					$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
					$mail->setHtml($html);
					#$mail->setText(html_entity_decode($text, ENT_QUOTES, 'UTF-8'));
					$mail->send();
				}
				/* end 0412 */
				
			}
			
			/* end 0106 */
			
			
			$LINK = $this->url->link('checkout/success');
		
		}
		
		if( $this->config->get('robokassa_clear_order') )
		{
			$this->cart->clear();
		}
		
		exit( json_encode(
			array(
				"link" => $LINK
			)
		) );
	}
	
	public function payment()
	{
		if( empty($this->request->get['code']) )
		{
			exit("EMPTY CODE");
		}
		
		$this->load->model('payment/robokassa');
		$payment_info = $this->model_payment_robokassa->getPaymentByCode(
			$this->request->get['code']
		);
		
		if( empty($payment_info) )
		{
			exit("EMPTY payment");
		}
		
		$this->load->model('checkout/order');	
		$order_info = $this->model_checkout_order->getOrder($payment_info['order_id']);
		
		if( empty($order_info) )
		{
			exit("EMPTY order");
		}
		
		$this->session->data['order_id'] = $payment_info['order_id'];
		
		// -------
		
		$this->data['is_log'] = $this->config->get('robokassa_log');
		$this->data['PARAMS'] = unserialize( $payment_info['params'] );
		$this->data['action'] = $payment_info['url'];
		
		/* start 1405 */
		$this->data['Receipt_text'] = '';
		if( $this->data['is_log'] && !empty($this->data['PARAMS']['Receipt']) )
		{
			$receipt = json_decode( urldecode($this->data['PARAMS']['Receipt']), 1);
			foreach($receipt as $key=>$val)
			{
				if( !is_array($val) )
				{
					$this->data['Receipt_text'] .= $key.' => '.$val."<br>";
				}
				else
				{
					$this->data['Receipt_text'] .= $key." => Array<br>";
						
					foreach($val as $key2=>$val2)
					{
						if( !is_array($val2) )
						{
							$this->data['Receipt_text'] .= "----- ".$key2.' => '.$val2."<br>";
						}
						else
						{
							$this->data['Receipt_text'] .= "----- ".$key2." => Array<br>";
								
							foreach($val2 as $key3=>$val3)
							{
								if( !is_array($val3) )
								{
									$this->data['Receipt_text'] .= "----- ----- ".$key3.' => '.$val3."<br>";
								}
								else
								{
									$this->data['Receipt_text'] .= "----- ----- ".$key3." => Array<br>";
										
									foreach($val3 as $key4=>$val4)
									{
										if( !is_array($val4) )
										{
											$this->data['Receipt_text'] .= "----- ----- ----- ".$key4.' => '.$val4."<br>";
										}
										else
										{
											$this->data['Receipt_text'] .= "----- ----- ----- ".$key4." => Array<br>";
												
											foreach($val4 as $key5=>$val5)
											{
												if( !is_array($val5) )
												{
													$this->data['Receipt_text'] .= "----- ----- ----- ----- ".$key5.' => '.$val5."<br>";
												}
												else
												{
													$this->data['Receipt_text'] .= "----- ----- ----- ----- ".$key5." => Array<br>";
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
		/* end 1405 */
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/robokassa_payment.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/robokassa_payment.tpl';
		} else {
			$this->template = 'default/template/payment/robokassa_payment.tpl';
		}		
		
		$this->response->setOutput( $this->render() );
		
	}
	
	
	public function result() 
	{
		if( $this->config->get('robokassa_log') )
		{
			$log = new Log('robokassa_log.txt');
			$log->write('metka-0');
		}
		
		$STORE_ID = $this->config->get('config_store_id');
		$CONFIG = array();
		
		if( $STORE_ID )
		{
			$CONFIG['robokassa_log'] = $this->config->get('robokassa_log_store');
			$CONFIG['robokassa_password2'] = $this->config->get('robokassa_password2_store');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login_store');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status_store');
			$CONFIG['robokassa_confirm_comment'] = $this->config->get('robokassa_confirm_comment_store');
			$CONFIG['robokassa_order_status_id'] = $this->config->get('robokassa_order_status_id_store');
			$CONFIG['robokassa_confirm_notify'] = $this->config->get('robokassa_confirm_notify_store');
			$CONFIG['robokassa_paynotify'] = $this->config->get('robokassa_paynotify_store');
			$CONFIG['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email_store');
				
			$CONFIG['robokassa_sms_status'] = $this->config->get('robokassa_sms_status_store');
			$CONFIG['robokassa_sms_phone'] = $this->config->get('robokassa_sms_phone_store');
			$CONFIG['robokassa_sms_message'] = $this->config->get('robokassa_sms_message_store');
			
			$CONFIG['robokassa_premod_confirm_comment'] = $this->config->get('robokassa_premod_confirm_comment_store');
			
			/* start 0106 */
			$CONFIG['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email_store');
			$CONFIG['robokassa_paynotify_subject'] = $this->config->get('robokassa_paynotify_subject_store');
			$CONFIG['robokassa_paynotify_message'] = $this->config->get('robokassa_paynotify_message_store');
			
			$CONFIG['robokassa_premod_paynotify'] = $this->config->get('robokassa_premod_paynotify_store');
			$CONFIG['robokassa_premod_paynotify_subject'] = $this->config->get('robokassa_premod_paynotify_subject_store');
			$CONFIG['robokassa_premod_paynotify_message'] = $this->config->get('robokassa_premod_paynotify_message_store');
			/* end 0106 */
			
			
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				if( isset( $value[$STORE_ID] ) )
				$CONFIG[$key] = $value[$STORE_ID];
				else
				$CONFIG[$key] = '';
			}
		}
		else
		{
			$CONFIG['robokassa_log'] = $this->config->get('robokassa_log');
			$CONFIG['robokassa_password2'] = $this->config->get('robokassa_password2');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status');
			$CONFIG['robokassa_confirm_comment'] = $this->config->get('robokassa_confirm_comment');
			$CONFIG['robokassa_order_status_id'] = $this->config->get('robokassa_order_status_id');
			$CONFIG['robokassa_confirm_notify'] = $this->config->get('robokassa_confirm_notify');
			$CONFIG['robokassa_paynotify'] = $this->config->get('robokassa_paynotify');
			$CONFIG['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email');
			$CONFIG['robokassa_sms_status'] = $this->config->get('robokassa_sms_status');
			$CONFIG['robokassa_sms_phone'] = $this->config->get('robokassa_sms_phone');
			$CONFIG['robokassa_sms_message'] = $this->config->get('robokassa_sms_message');
			
			$CONFIG['robokassa_premod_confirm_comment'] = $this->config->get('robokassa_premod_confirm_comment');
			
			/* start 0106 */
			$CONFIG['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email');
			$CONFIG['robokassa_paynotify_subject'] = $this->config->get('robokassa_paynotify_subject');
			$CONFIG['robokassa_paynotify_message'] = $this->config->get('robokassa_paynotify_message');
			
			$CONFIG['robokassa_premod_paynotify'] = $this->config->get('robokassa_premod_paynotify');
			$CONFIG['robokassa_premod_paynotify_subject'] = $this->config->get('robokassa_premod_paynotify_subject');
			$CONFIG['robokassa_premod_paynotify_message'] = $this->config->get('robokassa_premod_paynotify_message');
			/* end 0106 */
			 
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				$CONFIG[$key] = $value;
			}
		}
		
		$IS_DEBUG = 0;
		
		if( empty($this->request->post["InvId"]) ) exit();
		
		if( $CONFIG['robokassa_log'] )
		{
			$log = new Log('robokassa_log.txt');
			$IS_DEBUG = 1;
			
			$log->write('RESULT('.$this->request->post["InvId"].'): metka-1');
		}
		
		$mrh_pass2 =$CONFIG['robokassa_password2'];
		
		if( $IS_DEBUG )
		$log->write('RESULT('.$this->request->post["InvId"].'): metka-2 OutSum='.$this->request->post['OutSum'].'|InvId='.$this->request->post["InvId"].'|Shp_item='.$this->request->post["Shp_item"].'|SignatureValue='.$this->request->post["SignatureValue"]);
		
		if( empty($this->request->post['OutSum']) ||
			empty($this->request->post["InvId"]) || 
			empty($this->request->post["Shp_item"]) || 
			empty($this->request->post["SignatureValue"]) )
		exit();
		
		
		if( $IS_DEBUG )
		$log->write('RESULT('.$this->request->post["InvId"].'): metka-3');
		
		
		$out_summ = $this->request->post['OutSum'];
		$inv_id = 	$this->request->post["InvId"];
		$shp_item = $this->request->post["Shp_item"];
		$crc = 		$this->request->post["SignatureValue"];

		$crc = strtoupper($crc);

		$mrh_login = $CONFIG['robokassa_shop_login'];
		
		$my_crc1 = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));
		$my_crc2 = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));
		$my_crc3 = strtoupper(md5("$mrh_login:$out_summ:$inv_id:$mrh_pass2"));
		$my_crc4 = strtoupper(md5("$mrh_login:$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));
		
		
		if( $IS_DEBUG )
		$log->write('RESULT('.$this->request->post["InvId"].'):  metka-4 '.$crc.'|'.$my_crc1.'|'.$my_crc2.'|'.$my_crc3.'|'.$my_crc4);
		
		
		if( $my_crc1 == $crc || 
			$my_crc2 == $crc || 
			$my_crc3 == $crc || 
			$my_crc4 == $crc
		)
		{
			if( $IS_DEBUG )
			$log->write('RESULT('.$this->request->post["InvId"].'): metka-5');
		
			
			/* start 2007 */
			$this->load->model('checkout/order');
			$order = $this->model_checkout_order->getOrder($inv_id);
			 
			/* end 2007 */
			 
			 
			if( $IS_DEBUG )
			$log->write('RESULT('.$this->request->post["InvId"].'): metka-6');
			
			if( $CONFIG['robokassa_confirm_status']=='before' )
			{
				$order_info = $this->model_checkout_order->getOrder($this->request->post["InvId"]);
				
				$comment = '';
				
				if( !empty($order_info['language_id']) )
				{
					$this->load->model('localisation/language');
					$lang = $this->model_localisation_language->getLanguage($order_info['language_id']);
					
					if( !empty($lang['code']) && $CONFIG['robokassa_confirm_comment'] )
					{
						$comment_arr = $CONFIG['robokassa_confirm_comment'];
						
					
						if( !empty($comment_arr[$lang['code']]) )
						{
							$comment = $comment_arr[$lang['code']];
						}
					}
					
					$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
				}				
				
			
				if( $IS_DEBUG )
				$log->write('RESULT('.$this->request->post["InvId"].'): metka-6.1: '.$CONFIG['robokassa_order_status_id']);
				
				if( $order['order_status_id'] != $CONFIG['robokassa_order_status_id'] )
				$this->model_checkout_order->update( $inv_id, 
														$CONFIG['robokassa_order_status_id'], 
														$comment, 
														$CONFIG['robokassa_confirm_notify'] );
			}
			elseif(  $CONFIG['robokassa_confirm_status']=='after'  )
			{
				if( $order['order_status_id'] != $CONFIG['robokassa_order_status_id'] )
				$this->model_checkout_order->confirm($inv_id, $CONFIG['robokassa_order_status_id'], '', 1);
			}
			elseif(  $CONFIG['robokassa_confirm_status']=='premod'  )
			{
				$order_info = $this->model_checkout_order->getOrder($inv_id);
				
				if( !empty($order_info['language_id']) )
				{
					$this->load->model('localisation/language');
					$lang = $this->model_localisation_language->getLanguage($order_info['language_id']);
					
					if( !empty($lang['code']) && $CONFIG['robokassa_premod_confirm_comment'] )
					{
						$comment_arr = $CONFIG['robokassa_premod_confirm_comment'];
						
					
						if( !empty($comment_arr[$lang['code']]) )
						{
							$comment = $comment_arr[$lang['code']];
						}
					}
					
					$comment = html_entity_decode($comment, ENT_QUOTES, 'UTF-8');
				}			
				
				if( $order['order_status_id'] != $CONFIG['robokassa_order_status_id'] )
				$this->model_checkout_order->update( $inv_id, 
														$CONFIG['robokassa_order_status_id'], 
														$comment, true );
			
				#$this->model_checkout_order->confirm($inv_id, $CONFIG['robokassa_premod_order_status_id'], 
				#$comment, false);
			}
			
			
			if( $CONFIG['robokassa_paynotify'] && $CONFIG['robokassa_paynotify_email'] )
			{
				/* start 0106 */
				$subject = $CONFIG['robokassa_paynotify_subject'];
				/* end 0106 */
				
				$subject = str_replace("{order_id}", $inv_id, $subject);
				
				//---
				
				/* start 0106 */
				$html = $CONFIG['robokassa_paynotify_message'];
				/* end 0106 */
				
				
				$html = str_replace("{order_id}", $inv_id, $html);
				
				$html = str_replace("{out_summ}", $out_summ, $html);
				
				//---
				
				$query = $this->db->query("SELECT NOW() as dt");
				$pdate = preg_replace("/(\d+)\-(\d+)\-(\d+)\s(\d+)\:(\d+)\:(\d+)/", "$4:$5 $3.$2.$1", $query->row['dt']);
				$html = str_replace("{pdate}", $pdate, $html);
				
				//---
				
				$order_info = $this->model_checkout_order->getOrder($inv_id);
				
				$cdate = preg_replace("/(\d+)\-(\d+)\-(\d+)\s(\d+)\:(\d+)\:(\d+)/", "$4:$5 $3.$2.$1", $order_info['date_added'] );
				$html = str_replace("{cdate}", $cdate, $html);
				
				//---
				
				$customer_name = $order_info['firstname'].' '.$order_info['lastname'];
				$html = str_replace("{customer_name}", $customer_name, $html);
				
				//---
				
				$order_link = preg_replace("/\/$/", "", HTTP_SERVER).'/admin/index.php?route=sale/order/info&order_id='.$inv_id;
				
				$html = str_replace("{order_link}", $order_link, $html);
			
				$text_products = "";
				
				$order_product_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$inv_id . "'");

				foreach ($order_product_query->rows as $product) {
					$text_products .= $product['quantity'] . 'x ' . $product['name'] . ' (' . $product['model'] . ') ' . html_entity_decode($this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value']), ENT_NOQUOTES, 'UTF-8') . "\n";
					
					$order_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE order_id = '" . (int)$inv_id . "' AND order_product_id = '" . $product['order_product_id'] . "'");
					
					foreach ($order_option_query->rows as $option) {
						$text_products .= chr(9) . '-' . $option['name'] . ' ' . (utf8_strlen($option['value']) > 20 ? utf8_substr($option['value'], 0, 20) . '..' : $option['value']) . "\n";
					}
				}
				
				
				$html = str_replace("{products}", $text_products, $html);
				
				/* start 0106 */
				$html = preg_replace("/[\n]/", "<br>", $html);
				$html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');
				/* end 0106 */
				
				$mail = new Mail(); 
				$mail->protocol = $this->config->get('config_mail_protocol');
				$mail->parameter = $this->config->get('config_mail_parameter');
				$mail->hostname = $this->config->get('config_smtp_host');
				$mail->username = $this->config->get('config_smtp_username');
				$mail->password = $this->config->get('config_smtp_password');
				$mail->port = $this->config->get('config_smtp_port');
				$mail->timeout = $this->config->get('config_smtp_timeout');		


				/* start 0412 */
				$emails = array($CONFIG['robokassa_paynotify_email']);
				if( strstr($CONFIG['robokassa_paynotify_email'], ",") )
					$emails = explode(',', $CONFIG['robokassa_paynotify_email']);
				
				foreach($emails as $to_email)
				{ 
					$mail->setTo( trim($to_email) ); 
					$mail->setFrom($this->config->get('config_email'));
					$mail->setSender($order_info['store_name']);
					$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
					$mail->setHtml($html);
					#$mail->setText(html_entity_decode($text, ENT_QUOTES, 'UTF-8'));
					$mail->send();
				}
				/* end 0412 */
								
			}
			
			// SMSOrderStatus
			if( $this->config->get('config_sms_gatename') && 
				$this->config->get('robokassa_sms_status') ) 
			{
			
				$order = $this->model_checkout_order->getOrder($inv_id);
						
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE order_id = '" . (int)$inv_id . "'");
					
				$products = array();
					
				foreach($query->rows as $row)
				{
					$products[] = $row['name'];
				}
					
				$products = implode(";", $products);
					
				$query = $this->db->query(
                            "SELECT name
                            FROM " . DB_PREFIX . "order_status
                            WHERE order_status_id = '" . (int)$order['order_status_id'] . "'
                            AND language_id = '" . (int)$this->config->get('config_language_id') . "'
                            LIMIT 1"
                );
                    
				$status_name = $query->row['name'];
					
                $options = array(
                                'to'       => $this->config->get('robokassa_sms_phone'),
                                'from'     => $this->config->get('config_sms_from'),
                                'username' => $this->config->get('config_sms_gate_username'),
                                'password' => $this->config->get('config_sms_gate_password'),
                                'message'  => str_replace(
                                    array(
                                        '{ID}',
                                        '{DATE}',
                                        '{TIME}',
                                        '{SUM}',
                                        '{PHONE}',
                                        '{STATUS}',
										'{FIRSTNAME}',
										'{LASTNAME}',
										'{PRODUCTS}',
                                    ),
                                    array(
                                        $inv_id,
                                        date('d.m.Y'),
                                        date('H:i'),
                                        floatval($order['total']),
                                        $order['telephone'],
                                        $status_name,
										$order['firstname'],
										$order['lastname'],
										$products,
                                    ),
                                    $this->config->get('robokassa_sms_message')
                                )
                );
                
				$this->load->library('sms');
                $sms = new Sms($this->config->get('config_sms_gatename'), $options);
                $sms->send();
            }
			
			
			if( $IS_DEBUG )
			$log->write('RESULT('.$inv_id.'): metka-7');
		
			echo "OK$inv_id\n";
		}
		
		if( $IS_DEBUG )
			$log->write('RESULT('.$this->request->post["InvId"].'): metka-end');		
	}
	
	public function callback() 
	{
		$this->result();	
	}
	
	
	public function fail() 
	{
		$this->language->load('payment/robokassa');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->data['breadcrumbs'] = array(); 

      	$this->data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('common/home'),
        	'text'      => $this->language->get('text_home'),
        	'separator' => false
      	); 
		
      	$this->data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('checkout/cart'),
        	'text'      => $this->language->get('text_basket'),
        	'separator' => $this->language->get('text_separator')
      	);
				
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('checkout/checkout', '', 'SSL'),
			'text'      => $this->language->get('text_checkout'),
			'separator' => $this->language->get('text_separator')
		);	
					
      	$this->data['breadcrumbs'][] = array(
        	'href'      => $this->url->link('checkout/robokassa/fail'),
        	'text'      => $this->language->get('text_fail'),
        	'separator' => $this->language->get('text_separator')
      	);
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
		
    	$this->data['text_message'] = $this->language->get('text_message');
		
		$this->load->model('payment/robokassa');
		
		
		$this->data['text_message'] = str_replace("%1", $this->url->link('checkout/checkout', '', 'SSL'), $this->data['text_message']);
		
    	$this->data['button_continue'] = $this->language->get('button_continue');

    	$this->data['continue'] = $this->url->link('common/home');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/success.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/success.tpl';
		} else {
			$this->template = 'default/template/common/success.tpl';
		}
		
		$this->data['content_top'] = '';
		$this->data['content_bottom'] = '';
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			#'common/content_top',
			#'common/content_bottom',
			'common/footer',
			'common/header'			
		);
				
		$this->response->setOutput($this->render());
	}
	
	
	protected function is_serialized( $data ) {
    // if it isn't a string, it isn't serialized
		if ( !is_string( $data ) )
        return false;
		$data = trim( $data );
		if ( 'N;' == $data )
        return true;
		if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
        return false;
		switch ( $badions[1] ) {
        case 'a' :
        case 'O' :
        case 's' :
            if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
                return true;
            break;
        case 'b' :
        case 'i' :
        case 'd' :
            if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
                return true;
            break;
		}
		return false;
	}
}
?>