<?php  /* robokassa metka */
class ModelPaymentRobokassa extends Model {

	private $INDEX=0;

  	public function getMethod($address, $total) 
	{
		return $this->getMethodData($this->INDEX, $address, $total);
  	}
	
	
	public function getMethodData($INDEX, $address, $total)
	{
		if( $total<= 0  ) return;
		
		$CONFIG = $this->getConfig($INDEX);
		$RUB = $this->getRub();
		
		if( !empty($address['country_id']) && !empty($address['zone_id']) )
		{
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone 
			WHERE geo_zone_id = '" . (int)$CONFIG['robokassa_geo_zone_id'] . "' 
			AND country_id = '" . (int)$address['country_id'] . "' 
			AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");
		
			if (!$CONFIG['robokassa_geo_zone_id']) {
				$status = true;
			} elseif ($query->num_rows) {
				$status = true;
			} else {
				$status = false;
			}	
		}
		else
		{
			$status = true;
		}
		
		$robokassa_methods = array();
		$vr_robokassa_methods = $CONFIG['robokassa_methods'];
		if( !is_array( $vr_robokassa_methods[$INDEX] ) )
		{
			$robokassa_methods[$INDEX][ $this->config->get('config_language') ] = $vr_robokassa_methods[$INDEX];			
		}
		else
		{
			$robokassa_methods = $vr_robokassa_methods;
		}
		
		$method_data = array();
	
		$robokassa_currencies = $CONFIG['robokassa_currencies'];
		$robokassa_images = $CONFIG['robokassa_images'];
		
		if( empty($robokassa_images[$INDEX]) )
		$robokassa_images[$INDEX] = 'catalog/robokassa_icons/'.$robokassa_currencies[$INDEX].'.png';
		
		/* ------------- */
		
		$robokassa_minprice = '';
		$robokassa_maxprice = '';
		
		if( !empty($CONFIG['robokassa_minprice'][$INDEX]) )
		$robokassa_minprice = $CONFIG['robokassa_minprice'][$INDEX];
	
		if( !empty($CONFIG['robokassa_maxprice'][$INDEX]) )
		$robokassa_maxprice = $CONFIG['robokassa_maxprice'][$INDEX];
		
		$subtotal = $total;		
	
		if( $robokassa_minprice && $subtotal < $robokassa_minprice )
		return false;
		
		if( $robokassa_maxprice && $subtotal > $robokassa_maxprice )
		return false;
		
		/* ------------- */
		
		/* start 612 */
		if ($status) 
		{
			$image = '/image/'.$robokassa_images[$INDEX];
			
			$title = $robokassa_methods[$INDEX][$this->config->get('config_language')];
			$title = str_replace("Альфа-Клик", "АльфаКлик", $title);
			$title = str_replace("Альфа Клик", "АльфаКлик", $title);
			
			$html_image = '';
			
			if( $CONFIG['robokassa_icons'] )
			{
				if( $CONFIG['robokassa_icons_format'] != 'inimage' )
				{
					$html_image = $CONFIG['robokassa_icons_html'];
					$html_image = str_replace("{title}", $title, $html_image);
					$html_image = str_replace("{image_url}", $image, $html_image);
					$html_image = html_entity_decode($html_image, ENT_QUOTES, 'UTF-8');
				}
			}
			
			$code = 'robokassa';	
			
			if($INDEX!=0)
			$code = 'robokassa'.$INDEX;
			
			
			$method_data = array( 
				'code'       => $code,
				'html_image' => $html_image,
				'title'		 => $title,
				'terms'      => '',
				'img_url'	 => $image,
				'image'	 => $html_image,
				'sort_order' => (float)$CONFIG['robokassa_sort_order'] + (float)$CONFIG['robokassa_sort_order_num']
      		);
			
			if( $CONFIG['robokassa_icons'] && 
				$CONFIG['robokassa_icons_format'] == 'inimage' )
			{
				$method_data['image'] = $image;
			}
    	}
		/* end 612 */
		
    	return $method_data;
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
	
	
	
	/* start metka-kkt */
	
	private function getShippingTotalData()
	{
		if( !empty($this->session->data['shipping_method']['cost']) )
		{
			return array( 
				"title" => $this->session->data['shipping_method']['title'],
				"value" => $this->session->data['shipping_method']['cost']
			);
		}
	}
	
	/* start 2111 */
	
	public function customFormat($price, $RUB)
	{
		return number_format( 
			$this->currency->convert(
				$price, 
				$this->config->get('config_currency'), 
				$RUB 
			), 
		1, '.', '' );
	}
	
	
	/* start 1112 */
	
	
	private function custom_unserialize($s)
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
	
	private function getProductPaymentObject( $product, $total_sum )
	{
		$IS_DEBUG = 0;
			
		if( $this->config->get('robokassa_kkt_payment_object') != 'different' )
		{
			if( $IS_DEBUG ) $this->log->write( "m1(".$product['product_id'].")<br>");
			return $this->config->get('robokassa_kkt_payment_object');
		}
		
		$robokassa_kkt_payment_objects =  $this->custom_unserialize( $this->config->get('robokassa_kkt_payment_objects') );
		
		if( !$robokassa_kkt_payment_objects )
		{
			if( $IS_DEBUG ) $this->log->write( "m2(".$product['product_id'].")<br>");
			return $this->config->get('robokassa_kkt_default_payment_object');
		}
		
		
		$sort_order = array();

		foreach ($robokassa_kkt_payment_objects as $key => $value) {
			$sort_order[$key] = (int)$value['sort_order'];
		}
		
		array_multisort($sort_order, SORT_ASC, $robokassa_kkt_payment_objects);
		
		foreach($robokassa_kkt_payment_objects as $object)
		{
			if( $IS_DEBUG ) $this->log->write( "m3(".$product['product_id'].")<br>");
			
			if( empty($object['status']) )
				continue;
			
			if( $IS_DEBUG ) $this->log->write(  "m4(".$product['product_id'].")<br>");
			
			
			if( !empty($object['name']) )
			{
				if( $object['name_type'] == 'exact' )
				{
					$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_description`
					WHERE name = '".$this->db->escape($object['name'])."' 
					AND product_id = '".(int)$product['product_id']."'");
					
					if( !$check->row )
						continue;
				}
				else
				{
					$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_description`
					WHERE name LIKE '%".$this->db->escape($object['name'])."%' 
					AND product_id = '".(int)$product['product_id']."'");
					
					if( !$check->row )
						continue;
				}
			}
			
			if( $IS_DEBUG ) $this->log->write(  "m5(".$product['product_id'].")<br>");
			
			
			if( !empty($object['model']) )
			{
				if( $object['model_type'] == 'exact' )
				{
					$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product`
					WHERE `model` = '".$this->db->escape($object['model'])."' 
					AND product_id = '".(int)$product['product_id']."'");
					
					if( !$check->row )
						continue;
				}
				else
				{
					$check = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_description`
					WHERE `model` LIKE '%".$this->db->escape($object['model'])."%' 
					AND product_id = '".(int)$product['product_id']."'");
					
					if( !$check->row )
						continue;
				}
			}
			
			if( $IS_DEBUG ) $this->log->write(  "m6(".$product['product_id'].")<br>");
			
			
			if( !empty($object['from_price']) &&
				(float)$object['from_price'] > $total_sum )
				continue;
			
			if( $IS_DEBUG ) $this->log->write(  "m7(".$product['product_id'].")<br>");
			
			if( !empty($object['to_price']) &&
				(float)$object['to_price'] < $total_sum )
				continue;
				
			if( $IS_DEBUG ) $this->log->write(  "m8(".$product['product_id'].")<br>");
			
				
			if( !empty( $object['filter_category'] ) )
			{
				$wh_ar = array();
				foreach($object['filter_category'] as $category_id)
				{
					$wh_ar[] = (int)$category_id;
				}
				
				$sql = "SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id='".(int)$product['product_id']."' AND category_id IN (".implode(",", $wh_ar).") ";
				
				$query = $this->db->query($sql);
				
				if( !$query->row ) 
					continue;
			}
			
			if( $IS_DEBUG ) $this->log->write(  "m9(".$product['product_id'].")<br>");
			
			
			if( !empty( $object['filter_manufacturer'] ) )
			{
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product 
				WHERE product_id='".(int)$product['product_id']."'");
				
				if( empty($query->row['manufacturer_id'] ) || 
					!in_array($query->row['manufacturer_id'], $object['filter_manufacturer']) ) 
				{ 
					continue;
				}
			}
			
			if( $IS_DEBUG ) $this->log->write(  "m10(".$product['product_id'].")<br>" );
			
			return $object['object'];
		}
		
		return $this->config->get('robokassa_kkt_default_payment_object');
	}
	/* end 1112 */
	
	public function getReceiptItems($RUB, $out_summ)
	{
		mb_internal_encoding("UTF-8");
		$shipping_total = 0;
		
		$shipping = $this->getShippingTotalData();
		
		if( $shipping )
		{
			$shipping_total = $this->customFormat( $shipping['value'], $RUB );
		}
		
		// ----
		$products_total = 0;
		
		$products = $this->cart->getProducts();
		foreach($products as $product)
		{
			$products_total += $this->customFormat( $product['total'], $RUB );
		}
		
		// ----
		
		$total_total = $shipping_total + $products_total;
		
		// ===================
		$items = array();
		
		if( $out_summ == $total_total )
		{
			foreach( $products as $product ) 
			{
				$items[] = array(
							"name" => mb_substr($product['name'], 0, 64),
							"quantity" => (int)$product['quantity'],
							"sum" => $this->customFormat( $product['total'], $RUB ),
							"tax" => $this->getRobokassaKktTax(),
							"payment_method" => $this->config->get('robokassa_kkt_payment_method'), 
							"payment_object" => 'service'
				);
			}
			
			if( $shipping )
			{
				$items[] = array(
							"name" => mb_substr(strip_tags($shipping['title']), 0, 64),
							"quantity" => 1,
							"sum" => $this->customFormat( $shipping['value'], $RUB ),
							"tax" => $this->getRobokassaKktTax(),
							"payment_method" => $this->config->get('robokassa_kkt_payment_method'), 
							"payment_object" => $this->getProductPaymentObject($product, $this->customFormat( $product['total'], $RUB ))
							
				);
				
			}
			
		}
		else
		{
			$is_total_include_shipping = false;
			
			$diff_total = 0;
			if( $out_summ > $total_total )
				$diff_total = $out_summ - $total_total;
			else
				$diff_total = $total_total - $out_summ;
			
			if( $diff_total > $products_total )
			$is_total_include_shipping = true;
			
			$percent = 0;
			
			if( $is_total_include_shipping )
				$percent = $out_summ * 100 / $total_total;
			else
				$percent = ($out_summ - $shipping_total) * 100 / $products_total;
			
			foreach( $products as $product ) 
			{
				$product['price'] = $product['price'] * $percent / 100;
				$product['total'] = $product['total'] * $percent / 100;
				
				$items[] = array(
							"name" => mb_substr(strip_tags($product['name']), 0, 64),
							"quantity" => 1,
							"sum" => $this->customFormat( $product['total'], $RUB ),
							"tax" => $this->getRobokassaKktTax(),
							"payment_method" => $this->config->get('robokassa_kkt_payment_method'), 
							"payment_object" => $this->getProductPaymentObject($product, $this->customFormat( $product['total'], $RUB ))
							
				);
				
			}
			
			if( $shipping )
			{
				$shipping_value = $shipping['value'];
				if($is_total_include_shipping)
				{
					$shipping_value = $shipping_value * $percent / 100;
				}
				
				$items[] = array(
							"name" => mb_substr(strip_tags($shipping['title']), 0, 64),
							"quantity" => 1,
							"sum" => $this->customFormat( $shipping_value, $RUB ),
							"tax" => $this->getRobokassaKktTax(),
							"payment_method" => $this->config->get('robokassa_kkt_payment_method'), 
							"payment_object" => 'service'
				);
				
			}
			
			// ==========
			// Final
			$total = 0;
			foreach($items as $item)
			{
				$total += $item['sum'];
			}
			
			$diff_total = 0;
			if( $out_summ != $total )
				$diff_total = round($out_summ - $total, 2);
			
			if( $diff_total != 0 )
			{
				$index = count($items)-1;
				$items[$index]['sum'] += $diff_total;	
				
				$items[$index]['sum'] = number_format($items[$index]['sum'], 1, '.', '');
			}
			
			// ==========
			
		}
		
		/* start 2105 */
		$result = array();
		
		foreach($items as $val)
		{
			$result[] = '{"name":"'.$val['name'].'","quantity":'.$val['quantity'].
					',"sum":'.$val['sum'].',"tax":"'.$val['tax'].
					'","payment_method":"'.$val['payment_method'].
					'","payment_object":"'.$val['payment_object'].'"}';
		}
		
		return implode($result, ",");
		/* end 2105 */
	}
	
	/* end 2111 */
	/* end metka-kkt */
	
	private $data;
	public function getIndexData($INDEX)
	{
		$CONFIG = $this->getConfig($INDEX);
		list( $this->data['action'], $this->data['PARAMS'] ) = $this->getParams($INDEX, $CONFIG);
		
		$this->load->language('payment/robokassa');
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		
		$this->data['robokassa_confirm_status'] = $CONFIG['robokassa_confirm_status'];
		
		if( $this->config->get('robokassa_premod_success_page_type') == 'custom' && 
			$this->config->get('robokassa_confirm_status') == 'premod' )
		$this->data['continue'] = $this->url->link('checkout/robosuccess');
		else
    	$this->data['continue'] = $this->url->link('checkout/success');
	
		$this->data['INDEX'] = $INDEX;
		
		return $this->data;
	}
	/* start metka-kkt2 */
	
	public function getRub()
	{
		$this->load->model('localisation/currency');
		$currencies = $this->model_localisation_currency->getCurrencies();
		
		$RUB = '';
		
		if( !isset($currencies['RUB']) && 
			!isset($currencies['RUR']) && 
			!isset($currencies['rub']) && 
			!isset($currencies['rur']) 
		){}
		elseif( isset($currencies['RUB']) ) $RUB = 'RUB';
		elseif( isset($currencies['RUR']) ) $RUB = 'RUR';
		elseif( isset($currencies['rub']) ) $RUB = 'rub';
		elseif( isset($currencies['rur']) ) $RUB = 'rur';
		
		return $RUB;
	}
	
	public function getParams($INDEX, $CONFIG)
	{
		$RUB = $this->getRub();
		
		$this->load->model('checkout/order');
		
		$order_info = array();
		
		if( !empty($this->session->data['order_id']) )
		{
			$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
			$order_info['name'] = $order_info['firstname'].' '.$order_info['lastname'];
		}
		else 
		{
			$order_info['total'] = $this->cart->getTotal();
			$order_info['store_name'] = $this->config->get('config_name');
			$order_info['store_url'] = HTTPS_SERVER;
			$order_info['name'] = '';
			$order_info['email'] = '';
		}
		
		$PARAMS = array();
		
		if( $CONFIG['robokassa_test_mode'] )
		$PARAMS['IsTest'] = 1;
		
		$PARAMS['MrchLogin'] = $CONFIG['robokassa_shop_login'];
		
		$out_summ = $order_info['total'];
		
		if( $this->config->get('config_currency')!=$CONFIG['robokassa_currency'] ) 
		{
			$out_summ = $this->currency->convert($out_summ, $this->config->get('config_currency'), $CONFIG['robokassa_currency']);
		}
		elseif( $this->currency->getValue($CONFIG['robokassa_currency']) != 1 )
		{
			$out_summ = $this->currency->getValue($CONFIG['robokassa_currency']) * $out_summ;
		}
		
		$robokassa_currencies = $CONFIG['robokassa_currencies'];
		
		if( $robokassa_currencies[$INDEX] == 'robokassa' )
			$robokassa_currencies[$INDEX] = '';
		
		$PARAMS['IncCurrLabel'] = $robokassa_currencies[$INDEX];
		
		if( !$CONFIG['robokassa_kkt_mode'] && 
			$CONFIG['robokassa_commission'] == 'shop' && 
			$PARAMS['IncCurrLabel'] 
		)
		{
			$url = 'https://auth.robokassa.ru/Merchant/WebService/Service.asmx/CalcOutSumm?MerchantLogin='.$CONFIG['robokassa_shop_login'].
					'&IncCurrLabel='.$PARAMS['IncCurrLabel'].'&IncSum='.$out_summ;
			
			if( extension_loaded('curl') )
			{
				$c = curl_init($url);
				curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
				$page = curl_exec($c);
				curl_close($c);
				
				if( !$page )
				{
					$page = file_get_contents($url);
				}
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
		
		$shp_item = "2";
		
		
		$in_curr = $robokassa_currencies[$INDEX];
		
		if( !empty($this->session->data['order_id']) )
		$inv_id =  $this->session->data['order_id'];
		else
		$inv_id = 0;
		
		$out_summ = number_format($out_summ, 2, '.', '');
		
		$out_summ = $this->getOkrugl( $out_summ );
		$PARAMS['OutSum'] = $out_summ;
		
		if( !empty($this->session->data['order_id']) )
		$PARAMS['InvId'] =  $this->session->data['order_id'];
		else
		$PARAMS['InvId'] = 0;
		

		$PARAMS['Desc'] = $CONFIG['robokassa_desc'];
		$PARAMS['Desc'] = str_replace("{number}", $PARAMS['InvId'], $PARAMS['Desc']);
		$PARAMS['Desc'] = str_replace("{siteurl}", $order_info['store_url'], $PARAMS['Desc']);
		$PARAMS['Desc'] = str_replace("{name}", $order_info['name'], $PARAMS['Desc']);
		
		$PARAMS['Shp_item'] = $shp_item;
		$PARAMS['Email'] = $order_info['email'];
		
		
		/* start metka-kkt2 */
		if( $CONFIG['robokassa_kkt_mode'] )
		{
			$items = $this->getReceiptItems($RUB, $out_summ, $CONFIG);
			
			/* start 2105 */
			$PARAMS['Receipt'] = '{"sno":"'.$CONFIG['robokassa_kkt_sno'].
								  '","items":['.$items.']}';
			
			$PARAMS['Receipt'] = urlencode( $PARAMS['Receipt'] );
			/* end 2105 */
			$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:".$PARAMS['Receipt'].":".$CONFIG['robokassa_password1'].":Shp_item=$shp_item");
		}
		else
		{
			if( $RUB != $CONFIG['robokassa_currency'] ) 
			{
				$PARAMS['OutSumCurrency'] = $CONFIG['robokassa_currency'];
				$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:".$PARAMS['OutSumCurrency'].":".$CONFIG['robokassa_password1'].":Shp_item=$shp_item");
			}
			else
			{
				$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:".$CONFIG['robokassa_password1'].":Shp_item=$shp_item");
			}
		}
		/* end metka-kkt2 */
		
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
		
		$PARAMS['Culture'] = $culture;
		
		return array(
			"https://auth.robokassa.ru/Merchant/Index.aspx",
			$PARAMS
		);
	}
	
	public function getRobokassaKktTax()
	{
		if( (int)date("Y") == 2018 )
			return $this->config->get('robokassa_kkt_tax');
		
		if( $this->config->get('robokassa_kkt_tax') == 'vat18' )
		{
			return 'vat20';
		}
		elseif( $this->config->get('robokassa_kkt_tax') == 'vat118' )
		{
			return 'vat120';
		}
		else
		{
			return $this->config->get('robokassa_kkt_tax');
		}
	}
	
	public function getOkrugl($sum)
	{
		if( $this->config->get('robokassa_okrugl') )
		{
			if( $this->config->get('robokassa_okrugl') == 'round' )
				$sum = round($sum);
			elseif( $this->config->get('robokassa_okrugl') == 'ceil' )
				$sum = ceil($sum);
			elseif( $this->config->get('robokassa_okrugl') == 'floor' )
				$sum = floor($sum); 
		}
		
		return $sum;
	}	
	
	public function getConfig($INDEX)
	{
		$STORE_ID = $this->config->get('config_store_id');
		$CONFIG = array();
		
		if( $STORE_ID )
		{
			$CONFIG['robokassa_icons'] = $this->config->get('robokassa_icons_store');
			$CONFIG['robokassa_images'] = $this->config->get('robokassa_images_store');
			$CONFIG['robokassa_methods'] = $this->config->get('robokassa_methods_store');
			$CONFIG['robokassa_test_mode'] = $this->config->get('robokassa_test_mode_store');
			$CONFIG['robokassa_password1'] = $this->config->get('robokassa_password1_store');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login_store');
			$CONFIG['robokassa_currency'] = $this->config->get('robokassa_currency_store');
			$CONFIG['robokassa_currencies'] = $this->config->get('robokassa_currencies_store');
			$CONFIG['robokassa_commission'] = $this->config->get('robokassa_commission_store');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status_store');
			$CONFIG['robokassa_interface_language'] = $this->config->get('robokassa_interface_language_store');
			$CONFIG['robokassa_default_language'] = $this->config->get('robokassa_default_language_store');
			$CONFIG['robokassa_desc'] = $this->config->get('robokassa_desc_store');
			$CONFIG['robokassa_geo_zone_id'] = $this->config->get('robokassa_geo_zone_id_store');
			
			$CONFIG['robokassa_sort_order_num'] = $this->config->get('robokassa'.$INDEX.'_sort_order');
			$CONFIG['robokassa_sort_order'] = $this->config->get('robokassa_sort_order_store');
			 
			$CONFIG['robokassa_order_comment'] = $this->config->get('robokassa_order_comment_store');
			/* start metka-kkt2 */
			$CONFIG['robokassa_kkt_mode'] = $this->config->get('robokassa_kkt_mode_store');
			$CONFIG['robokassa_kkt_sno'] = $this->config->get('robokassa_kkt_sno_store');
			$CONFIG['robokassa_kkt_tax'] = $this->config->get('robokassa_kkt_tax_store');
			/* end metka-kkt2 */
			$CONFIG['robokassa_preorder_status_id'] = $this->config->get('robokassa_preorder_status_id_store');
			
			$CONFIG['robokassa_hide_noname'] = $this->config->get('robokassa_hide_noname_store');
			
			$CONFIG['robokassa_sort_order_num'] = $this->config->get('robokassa'.$INDEX.'_sort_order_store');
			
			$CONFIG['robokassa_premod_order_comment'] = $this->config->get('robokassa_premod_order_comment_store');
			$CONFIG['robokassa_premod_hide_order_comment'] = $this->config->get('robokassa_premod_hide_order_comment_store');
			$CONFIG['robokassa_premod_preorder_status_id'] = $this->config->get('robokassa_premod_preorder_status_id_store');
			
			$CONFIG['robokassa_paynotify'] = $this->config->get('robokassa_paynotify_store');
			
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
			
			if( isset($CONFIG['robokassa_desc'][ $this->config->get('config_language') ]) )
			$CONFIG['robokassa_desc'] = $CONFIG['robokassa_desc'][ $this->config->get('config_language') ];
			
		}
		else
		{
			$CONFIG['robokassa_premod_order_comment'] = $this->config->get('robokassa_premod_order_comment');
			$CONFIG['robokassa_premod_hide_order_comment'] = $this->config->get('robokassa_premod_hide_order_comment');
			$CONFIG['robokassa_premod_preorder_status_id'] = $this->config->get('robokassa_premod_preorder_status_id');
			
			$CONFIG['robokassa_sort_order'] = $this->config->get('robokassa_sort_order');
			$CONFIG['robokassa_hide_noname'] = $this->config->get('robokassa_hide_noname');
			
			$CONFIG['robokassa_icons'] = $this->config->get('robokassa_icons');
			$CONFIG['robokassa_images'] = $this->config->get('robokassa_images');
			$CONFIG['robokassa_methods'] = $this->config->get('robokassa_methods');
			$CONFIG['robokassa_geo_zone_id'] = $this->config->get('robokassa_geo_zone_id');
			$CONFIG['robokassa_order_comment'] = $this->config->get('robokassa_order_comment');
			$CONFIG['robokassa_test_mode'] = $this->config->get('robokassa_test_mode');
			$CONFIG['robokassa_password1'] = $this->config->get('robokassa_password1');
			$CONFIG['robokassa_shop_login'] = $this->config->get('robokassa_shop_login');
			$CONFIG['robokassa_currency'] = $this->config->get('robokassa_currency');
			$CONFIG['robokassa_currencies'] = $this->config->get('robokassa_currencies');
			$CONFIG['robokassa_commission'] = $this->config->get('robokassa_commission');
			$CONFIG['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status');
			$CONFIG['robokassa_interface_language'] = $this->config->get('robokassa_interface_language');
			$CONFIG['robokassa_default_language'] = $this->config->get('robokassa_default_language');
			$CONFIG['robokassa_desc'] = $this->config->get('robokassa_desc');
			$CONFIG['robokassa_sort_order_num'] = $this->config->get('robokassa'.$INDEX.'_sort_order');
			
			/* start metka-kkt2 */
			$CONFIG['robokassa_kkt_mode'] = $this->config->get('robokassa_kkt_mode');
			$CONFIG['robokassa_kkt_sno'] = $this->config->get('robokassa_kkt_sno');
			$CONFIG['robokassa_kkt_tax'] = $this->config->get('robokassa_kkt_tax');
			/* end metka-kkt2 */
			
			
			$CONFIG['robokassa_paynotify'] = $this->config->get('robokassa_paynotify');
			/* start 0106 */
			$CONFIG['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email');
			$CONFIG['robokassa_paynotify_subject'] = $this->config->get('robokassa_paynotify_subject');
			$CONFIG['robokassa_paynotify_message'] = $this->config->get('robokassa_paynotify_message');
			
			$CONFIG['robokassa_premod_paynotify'] = $this->config->get('robokassa_premod_paynotify');
			$CONFIG['robokassa_premod_paynotify_subject'] = $this->config->get('robokassa_premod_paynotify_subject');
			$CONFIG['robokassa_premod_paynotify_message'] = $this->config->get('robokassa_premod_paynotify_message');
			/* end 0106 */
			
			$CONFIG['robokassa_preorder_status_id'] = $this->config->get('robokassa_preorder_status_id');
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				$CONFIG[$key] = $value;
			}
			
			if( isset($CONFIG['robokassa_desc'][ $this->config->get('config_language') ]) )
			$CONFIG['robokassa_desc'] = $CONFIG['robokassa_desc'][ $this->config->get('config_language') ];
		}
		
			/* start 2710 */
			$CONFIG['robokassa_icons_format'] = $this->config->get('robokassa_icons_format');
			$CONFIG['robokassa_icons_html'] = $this->config->get('robokassa_icons_html');
			/* end 2710 */
			
		return $CONFIG;
	}
	
	public function getPaymentByCode($code) 
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "robokassa_payments 
								   WHERE code = '".$this->db->escape($code)."'");
		
		return $query->row;
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
				`params` = '".$this->db->escape( serialize($data['params'])  )."',
				`url` = '".$this->db->escape($data['url'])."'");
		
		return $this->url->link('payment/robokassa/payment', 'code='.$code, 'SSL');
	}
	/* end metka-kkt2 */
}
?>