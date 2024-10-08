<?php
class Modelmodulesocnetauth2 extends Model 
{
	
	public $socnets = array(
		/* start 1405 */
		"vkontakte" => array(
			"key" => "vkontakte",
			"short" => "vk",
			"name" => "ВКонтакте",
			"loginza_key" => "vkontakte"
		),
		"odnoklassniki" => array(
			"key" => "odnoklassniki",
			"short" => "ok",
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
		/* end 1405 */
		/* start 0207 */
		"instagram" => array(
			"key" => "instagram",
			"short" => "in",
			"name" => "Instagram",
			"loginza_key" => "instagram"
		),
		/* end 0207 */
	);
	
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
		/* start 0207 */
		elseif( $key == 'instagram' )
		{
			if( $this->getConfigPostValue('socnetauth2_instagram_client_id') && 
				$this->getConfigPostValue('socnetauth2_instagram_client_secret')
			)
			{
				return true;
			}
		}
		/* end 0207 */
		
		
		return false;
	}
	
	public function getEnabledSocnets()
	{
		$result = array();
		foreach( $this->socnets as $key=>$socnet )
		{
			if( $this->checkIsSocnetAvailable($key) )
			{
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
	private function isTableExists( $table_key )
	{
		$query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . $table_key. "'");
		
		return empty($query->row) ? false : true;
	}
	public function addFields() 
	{
	
		// ..................................................................
	
		if( !$this->isTableExists("socnetauth2_records") )
		{
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "socnetauth2_records` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`state` varchar(100) NOT NULL,
					`redirect` varchar(300) NOT NULL,
					`cdate` datetime NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
					
			$this->db->query($sql);
			
		}
		
		$query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "customer`");

		$column_hash = array();
		
		foreach($query->rows as $row)
		{
			$column_hash[ $row['Field'] ] = 1;
		}
		
		
		if( !isset( $column_hash['socnetauth2_identity'] ) )
		{
			$sql = "ALTER TABLE `" . DB_PREFIX . "customer` ADD `socnetauth2_identity` VARCHAR( 300 ) NOT NULL";
			$this->db->query($sql);
		}
		
		/* start metka a1 */
		if( !isset( $column_hash['socnetauth2_link'] ) )
		{
			$sql = "ALTER TABLE `" . DB_PREFIX . "customer` ADD `socnetauth2_link` VARCHAR( 100 ) NOT NULL";
			$this->db->query($sql);
		}
		/* end metka a1 */
		
		if( !isset( $column_hash['socnetauth2_provider'] ) )
		{
			$sql = "ALTER TABLE `" . DB_PREFIX . "customer` ADD `socnetauth2_provider` VARCHAR( 100 ) NOT NULL";
			$this->db->query($sql);
		}
		
		if( !isset( $column_hash['socnetauth2_data'] ) )
		{
			$sql = "ALTER TABLE `" . DB_PREFIX . "customer` ADD `socnetauth2_data` TEXT NOT NULL";
			$this->db->query($sql);
		}
	}
	
	/* start 0503 */
	public function getCustomerSocnetsByOrderId($order_id)
	{
		$query = $this->db->query("SELECT * FROM `".DB_PREFIX."order` o
								   JOIN `".DB_PREFIX."customer` c 
								   ON o.customer_id = c.customer_id
								   WHERE o.order_id = '".(int)$order_id."'
								   AND o.customer_id!=0");
		
		
		if( !empty( $query->row['customer_id'] ) )
			return $this->getCustomerSocnets($query->row['customer_id']);
	}
	
	public function getCustomerSocnets($customer_id)
	{
		$query = $this->db->query("SELECT * FROM `".DB_PREFIX."socnetauth2_customer2account`
								   WHERE customer_id = '".(int)$customer_id."'");
								   
		if( $query->rows )
		{
			$list = array();
			
			foreach($query->rows as $row)
			{
				if( !empty( $row['link'] ) )
					$list[] = "<a href='".$row['link']."' target=_blank>".
					strtoupper( $this->socnets[ $row['provider'] ]['short'] )."</a>";
				else
					$list[] = strtoupper( $this->socnets[ $row['provider'] ]['short'] );
			}
			
			return " (".implode(", ", $list).")";
		}
		
	}
	/* end 0503 */
	
	
	protected function cmp($a, $b)
	{
		if($a['sort'] == $b['sort']) {
			return 0;
		}
	
		return ($a['sort'] < $b['sort']) ? -1 : 1;
	}
	
	public function sortMethods($socnetauth2_methods)
	{
		$sortable_arr = array();
		
		foreach($socnetauth2_methods as $key=>$val)
		{
			$val['k'] = $key;
			$sortable_arr[] = $val;
		}
		
		usort($sortable_arr, array($this, "cmp"));
		
		$sorted_socnetauth2_methods = array();
		
		foreach($sortable_arr as $key=>$val)
		{
			$sorted_socnetauth2_methods[ $val['k'] ] = $val;
		}
		
		return $sorted_socnetauth2_methods;
	}
	
	/* start 1505 */
	public function getConfigPostValue($key)
	{
		return isset( $this->request->post[$key] ) ? 
			   $this->request->post[$key] : 
			   $this->custom_unserialize( $this->config->get($key) );
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
	
	
	public function makeCode($data)
	{
		$data['socnetauth2_reg_code_lline'] = '';
		$data['socnetauth2_account_code_lline'] = '';
		$data['socnetauth2_checkout_code_lline'] = '';
			
		$data['socnetauth2_reg_code_bline'] = '';
		$data['socnetauth2_account_code_bline'] = '';
		$data['socnetauth2_checkout_code_bline'] = '';
			
		$data['socnetauth2_reg_code_kvadrat'] = '';
		$data['socnetauth2_account_code_kvadrat'] = '';
		$data['socnetauth2_checkout_code_kvadrat'] = '';
		
		// ----
		
		$this->load->model('localisation/language');
		$languages = $this->model_localisation_language->getLanguages();
		
		
		$icons_keys = array("lline" => 16, "bline" => 45, "kvadrat" => 45);
		$icons_hash = array();
		
		$socnetauth2_shop_folder = '';
		if( $this->getConfigPostValue( 'socnetauth2_shop_folder' ) )
			$socnetauth2_shop_folder = '/'.$this->getConfigPostValue( 'socnetauth2_shop_folder' );
		
		$socnets = $this->getEnabledSocnets();
		$count = $this->getCountEnabledSocnets();
		
		if( !$count )
			return $data;
		
		
		foreach($icons_keys as $icon_key=>$img_size)
		{
			$template = $this->getConfigPostValue( 'socnetauth2_'.$icon_key.'_html' );
			$template = $template[ $count ];
			
			foreach($socnets as $i=>$socnet)
			{
				$index = $i+1;
				$link = '';
				if( $this->getConfigPostValue('socnetauth2_'.$socnet['key'].'_agent') != 'loginza' )
				{
					if( $socnetauth2_shop_folder )
						$link = $socnetauth2_shop_folder.'/socnetauth2/'.$socnet['key'].'.php?first=1';
					else
						$link = '/socnetauth2/'.$socnet['key'].'.php?first=1';
				}
				else
				{
					$link = "https://loginza.ru/api/widget?token_url=#redirect_url#&provider=".
					$socnet['loginza_key']."&lang={lang}&providers_set=vkontakte,facebook,twitter,odnoklassniki,google,mailru,steam,yandex";
				}
				
				$img = '/socnetauth2/icons/'.$socnet['short'].$img_size.'.png';
				
				if( $socnetauth2_shop_folder )
					$img = $socnetauth2_shop_folder.$img;
				
				$template = str_replace("{link_".$index."}", $link, $template);
				$template = str_replace("{img_".$index."}", $img, $template);
			}
			
			foreach( $languages as $lang)
			{
				$value = $template;
				$ln = $this->getLoginzaLangCode( $lang['code'] );
				
				$value = str_replace("{lang}", $ln, $value);
				$icons_hash[ $icon_key ][ $lang['language_id'] ] = $value;
			}
		}
		
		// ---------
		
		$list = array("account", "checkout", "reg");
		
		$style = $this->getConfigPostValue("socnetauth2_design_general_css");
		
		foreach($list as $page_key)
		{
			foreach($languages as $lang)
			{
				$base_template = $this->getConfigPostValue("socnetauth2_design_".$page_key."_html");
				$style .= $this->getConfigPostValue("socnetauth2_design_".$page_key."_css");
				
				$base_template = str_replace("{style}", $style, $base_template);
				
				$header = $this->getConfigPostValue("socnetauth2_design_".$page_key."_header");
				$base_template = str_replace("{header}", $header[ $lang['language_id'] ], $base_template);
				
				foreach( $icons_hash as $icon_key=>$icon_values )
				{
					if( !$data['socnetauth2_'.$page_key.'_code_'.$icon_key] )
						$data['socnetauth2_'.$page_key.'_code_'.$icon_key] = array();
					
					$template = $base_template;
					$template = str_replace("{icons}", $icon_values[ $lang['language_id'] ], $template);
					
					$data['socnetauth2_'.$page_key.'_code_'.$icon_key][ $lang['language_id'] ] = $template;
				}	
			
				$style = $this->getConfigPostValue("socnetauth2_design_general_css");
			} 
		}
		
		// ----------
		
		$template = new Template();
		$template->data['socnetauth2_is_close_disabled'] = $this->getConfigPostValue('socnetauth2_is_close_disabled');
		$data['socnetauth2_confirm_block'] = $template->fetch('module/socnetauth2_blocks/socnetauth2_confirm.tpl');
		
		// ----------
		
		return $data;
	}
	/* end 1505 */
	
	public function updateSetting($group='', $key, $value)
	{
		$check = $this->db->query("SELECT * FROM ".DB_PREFIX."setting
								   WHERE
									`group`='".$group."' AND `key`='".$key."'");
		
		if( empty($check->rows) )
		{
			$this->db->query("INSERT INTO ".DB_PREFIX."setting
								   SET 
									value = '".$this->db->escape($value)."',
									`group`='".$group."', 
									`key`='".$key."'");
		}
		else
		{
			$this->db->query("UPDATE ".DB_PREFIX."setting
								   SET 
									value = '".$this->db->escape($value)."'
								   WHERE
									`group`='".$group."' AND `key`='".$key."'");
		}
	}
	
	
	
	public function showData()
	{
		$tab = 'customer';
		$customer_id = 0;
		
		if( !empty($this->request->get['customer_id']) )
		{
			$customer_id = $this->request->get['customer_id'];
			
			if( !$this->config->get('socnetauth2_admin_customer') ) return;			
		}
		elseif( !empty($this->request->get['order_id']) )
		{
			$this->load->model('sale/order');
			$order_info = $this->model_sale_order->getOrder($this->request->get['order_id']);
			
			if( !empty($order_info['customer_id']) )
			{
				$customer_id = $order_info['customer_id'];
				
				if( $this->request->get['route']=='sale/order/info' )
				$tab = 'order';
			}
			
			if( empty($customer_id) ) return;
			if( !$this->config->get('socnetauth2_admin_order') ) return;
		}
		elseif( $this->request->get['route']=='sale/customer' )
		{
			$tab = 'customer_list';
			$customer_id = '';
			if( !$this->config->get('socnetauth2_admin_customer_list') ) return;
		}
		elseif( $this->request->get['route']=='sale/order' )
		{
			$tab = 'order_list';
			$customer_id = '';
			if( !$this->config->get('socnetauth2_admin_order_list') ) return;
		}
				
		
		$hash_values = array(
			"identity" => "Идентификатор:",
			"provider" => "Провайдер:",
			"uid" => "uid:",
			"nickname" => "Логин:",
			"email" => "E-mail:",
			"country" => 'Страна:',
			"postal_code" => 'Почтовый индекс:',
			"state" => 'Область/регион:',
			"city" => 'Город:',
			"street_address" => 'Адрес:',
			"gender" => "Пол:",
			"photo" => "Фото:",
			"name" => "Имя:",
			"full_name" => "ФИО:",
			"first_name" => "Имя:",
			"last_name" => "Фамилия:",
			"middle_name" => "Отчество:",
			"dob" => "Дата рождения:",
			"work" => "Работа:",
			"company" => "Название компании:",
			"job" => "Профессия или должность:",
			"home" => "Домашний адрес:",
			"business" => "Рабочий адрес:",
			"phone" => "Телефон:",
			"preferred" => "Номер телефона указанный по умолчанию:",
			"home" => "Домашний телефон:",
			"work" => "Рабочий телефон:",
			"mobile" => "Мобильный телефон:",
			"fax" => "Факс:",
			"im" => "Массив с аккаунтами для связи:",
			"icq" => "Номер ICQ аккаунта:",
			"jabber" => "Jabber аккаунт:",
			"skype" => "Skype аккаунт:",
			"web" => "Массив содержащий адреса сайтов пользователя:",
			"default" => "Адрес профиля или персональной страницы:",
			"blog" => "Адрес блога:",
			"language" => "Язык:",
			"timezone" => "Временная зона:",
			"biography" => "Другая информация о пользователе и его интересах:"
		);
		
		$this->checkDB();
		
		
		
		if( $customer_id )
		{ 
			$data = '';
			$customer = $this->model_sale_customer->getCustomer($customer_id);
			
			$customer['socnetauth2_data'] = $this->getDataByCustomer($customer_id);
			
			
			if( !empty($customer['socnetauth2_data']) )
			{
				$data = '<script>';
				
				$socnetauth2_data = '';
				$i = 0;
				foreach($customer['socnetauth2_data'] as $row)
				{
					$i++;
					$row['data'] = html_entity_decode($row['data'], ENT_QUOTES, 'UTF-8');
					
					$data_arr = unserialize( $row['data'] );
					#$data_arr['provider'] = $row['provider'];
					$data_arr['link'] = $row['link'];
					$socnetauth2_data .= '<b>'.strtoupper($row['provider'])."</b><br>";
			
					foreach($data_arr as $key=>$val)
					{
						if( !is_array($val) )
						{
							if( $key=='photo' && $val )
							{
								$val = '<img src="'.$val.'">';
							}
							elseif( preg_match("/^http/", $val) )
							{
								$val = '<a href="'.$val.'" target=_blank>'.$val.'</a>';
							}
						
							if($val=='')
							{
								$val = '(пусто)';
							}
						
							if( !empty($hash_values[$key]) )
							$key = $hash_values[$key];
						
							$socnetauth2_data .= '<b>'.$key."</b> ".$val."<br>";
						}
						else
						{
							foreach($val as $k=>$v)
							{
								if( !is_array($v) )
								{
									if( $v=='' )
									{
										$v = '(пусто)';
									}
									elseif( preg_match("/^http/", $v) )
									{
										$v = '<a href="'.$v.'" target=_blank>'.$v.'</a>';
									}
						
									if( !empty($hash_values[$k]) )
									$k = $hash_values[$k];
								
									$socnetauth2_data .= '<b>'.$k."</b> ".$v."<br>";
								}
								else
								{
									foreach($v as $k2=>$v2)
									{
										if( $v2=='' )
										{
											$v2 = '(пусто)';
										}
										elseif( preg_match("/^http/", $v2) )
										{
											$v2 = '<a href="'.$v2.'" target=_blank>'.$v2.'</a>';
										}
								
										if( !empty($hash_values[$k2]) )
										$k2 = $hash_values[$k2];
									
										$socnetauth2_data .= '<b>'.$k2."</b> ".$v2."<br>";
									}
								}
							}
						}
						
					}
					
					if( count($customer['socnetauth2_data'])>1 && $i!=count($customer['socnetauth2_data']) )  
					$socnetauth2_data .= "--------<br>";
						
				}
				
			
				$text = "<tbody><tr><td>socnetauth:</td><td>".$socnetauth2_data."</td></tr></tbody>";
				
				$data .= "$('#tab-".$tab." .form tbody').after('".$text."');";
			
				
				
				$data .= "var ID = '';
					$('.list').find('tr').each(function(e) {
					
					
					if( e==0 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td>Провайдер</td>');
							}
						});
					}
	
					if( e==1 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td></td>');
							}
						});
					}
	
					if(e>1)
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 0 )
							{
								ID = $(this).find('input').attr('value');
								//alert( $(this).find('input').attr('value') );
							}
		
							if( i == 2)
							{
								//var cur = $(this).text();
				
								//$(this).after('<td>1212</td>');
				
								//$(this).text( cur + ID );
							}
						});
					}
				});
				</script>   ";
				
			}
			
			
			return $data;
		}
		elseif( $tab == 'customer_list' )
		{
			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = null;
			}

			if (isset($this->request->get['filter_email'])) {
				$filter_email = $this->request->get['filter_email'];
			} else {
				$filter_email = null;
			}
		
			if (isset($this->request->get['filter_customer_group_id'])) {
				$filter_customer_group_id = $this->request->get['filter_customer_group_id'];
			} else {
				$filter_customer_group_id = null;
			}

			if (isset($this->request->get['filter_status'])) {
				$filter_status = $this->request->get['filter_status'];
			} else {
				$filter_status = null;
			}
		
			if (isset($this->request->get['filter_approved'])) {
				$filter_approved = $this->request->get['filter_approved'];
			} else {
				$filter_approved = null;
			}
			
			if (isset($this->request->get['filter_ip'])) {
				$filter_ip = $this->request->get['filter_ip'];
			} else {
				$filter_ip = null;
			}
				
			if (isset($this->request->get['filter_date_added'])) {
				$filter_date_added = $this->request->get['filter_date_added'];
			} else {
				$filter_date_added = null;
			}		
		
			if (isset($this->request->get['sort'])) {
				$sort = $this->request->get['sort'];
			} else {
				$sort = 'name'; 
			}
		
			if (isset($this->request->get['order'])) {
				$order = $this->request->get['order'];
			} else {
				$order = 'ASC';
			}
		
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
		
			$data_filter = array(
				'filter_name'              => $filter_name, 
				'filter_email'             => $filter_email, 
				'filter_customer_group_id' => $filter_customer_group_id, 
				'filter_status'            => $filter_status, 
				'filter_approved'          => $filter_approved, 
				'filter_date_added'        => $filter_date_added,
				'filter_ip'                => $filter_ip,
				'sort'                     => $sort,
				'order'                    => $order,
				'start'                    => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit'                    => $this->config->get('config_admin_limit')
			);
		
			$customer_total = $this->model_sale_customer->getTotalCustomers($data_filter);
	
			$results = $this->model_sale_customer->getCustomers($data_filter);
			
		
			$data = '<script>';
			
			$data .= "var ID = '';
					$('.list').find('tr').each(function(e) {
					
					var items_hash = new Array();";
			
			foreach($results as $res)
			{
				$socnetdata = $this->getDataByCustomer($res['customer_id']);
				
				if( !empty($socnetdata) )
				{
					$value = array();
					foreach($socnetdata as $row)
					{
						if( empty($row['link']) )
						{
							$value[] = $this->socnets[ $row['provider'] ]['name'];
						}
						else
						{
							$value[] = "<a href=\"".$row['link']."\" target=_blank>".$this->socnets[ $row['provider'] ]['name']."</a>";
						}
					}
					
					$data .= " items_hash[".$res['customer_id']."] = '".implode(" ", $value)."';";
				}
				else
				{
					$data .= " items_hash[".$res['customer_id']."] = '';";
				}
			}
					
			/* start metka: a1 */
			$data .= "
					
					if( e==0 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td>Провайдер</td>');
							}
						});
					}
	
					if( e==1 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td></td>');
							}
						});
					}
	
					if(e>1)
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 0 )
							{
								ID = $(this).find('input').attr('value');
								//alert( $(this).find('input').attr('value') );
							}
		
							if( i == 2)
							{
								$(this).after('<td>'+items_hash[ID]+'</td>');
							}
						});
					}
				});
				</script>   ";
			/* end metka: a1 */
				
			return $data;
		}
		elseif( $tab == 'order_list' )
		{
			if (isset($this->request->get['filter_order_id'])) {
				$filter_order_id = $this->request->get['filter_order_id'];
			} else {
				$filter_order_id = null;
			}

			if (isset($this->request->get['filter_customer'])) {
				$filter_customer = $this->request->get['filter_customer'];
			} else {
				$filter_customer = null;
			}

			if (isset($this->request->get['filter_order_status_id'])) {
				$filter_order_status_id = $this->request->get['filter_order_status_id'];
			} else {
				$filter_order_status_id = null;
			}
		
			if (isset($this->request->get['filter_total'])) {
				$filter_total = $this->request->get['filter_total'];
			} else {
				$filter_total = null;
			}
			
			if (isset($this->request->get['filter_date_added'])) {
				$filter_date_added = $this->request->get['filter_date_added'];
			} else {
				$filter_date_added = null;
			}
		
			if (isset($this->request->get['filter_date_modified'])) {
				$filter_date_modified = $this->request->get['filter_date_modified'];
			} else {
				$filter_date_modified = null;
			}

			if (isset($this->request->get['sort'])) {
				$sort = $this->request->get['sort'];
			} else {
				$sort = 'o.order_id';
			}

			if (isset($this->request->get['order'])) {
				$order = $this->request->get['order'];
			} else {
				$order = 'DESC';
			}
		
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else {
				$page = 1;
			}
			
			
			$data_filter = array(
				'filter_order_id'        => $filter_order_id,
				'filter_customer'	     => $filter_customer,
				'filter_order_status_id' => $filter_order_status_id,
				'filter_total'           => $filter_total,
				'filter_date_added'      => $filter_date_added,
				'filter_date_modified'   => $filter_date_modified,
				'sort'                   => $sort,
				'order'                  => $order,
				'start'                  => ($page - 1) * $this->config->get('config_admin_limit'),
				'limit'                  => $this->config->get('config_admin_limit')
			);

			$this->load->model('sale/order');

			$results = $this->model_sale_order->getOrders($data_filter);
			
			$data = '<script>';
			
			$data .= "var ID = '';
					$('.list').find('tr').each(function(e) {
					
					var items_hash = new Array();";
			
			foreach($results as $res)
			{
				$order = $this->model_sale_order->getOrder( $res['order_id'] );
				
				if( !empty($order['customer_id']) )
				{
					$socnetdata = $this->getDataByCustomer($order['customer_id']);
				
					if( !empty($socnetdata) )
					{
						$value = array();
						foreach($socnetdata as $row)
						{				
							if( empty($row['link']) )
							{
								$value[] = $this->socnets[ $row['provider'] ]['name'];
							}
							else
							{
								$value[] = "<a href=\"".$row['link']."\" target=_blank>".$this->socnets[ $row['provider'] ]['name']."</a>";
							}
						}
					
						$data .= " items_hash[".$res['order_id']."] = '".implode(" ", $value)."';";
					}
					else
					{
						$data .= " items_hash[".$res['order_id']."] = '';";
					}
				
				
				
				/*
					$cust = $this->model_sale_customer->getCustomer( $order['customer_id'] );
					
					if( !empty( $cust['socnetauth2_provider'] ) )
					{
						if( empty( $cust['socnetauth2_link'] ) )
						$data .= " items_hash[".$res['order_id']."] = '".$this->socnets[ $cust['socnetauth2_provider'] ]['name']."';";
						else
						$data .= " items_hash[".$res['order_id']."] = '<a href=\"".$cust['socnetauth2_link']."\" target=_blank>".$this->socnets[ $cust['socnetauth2_provider'] ]['name']."</a>';";
					}
					else
					{
						$data .= " items_hash[".$res['order_id']."] = '';";
					}
				*/
				}
				else
				{
					$data .= " items_hash[".$res['order_id']."] = '';";
				}
			}
			
			/* start metka: a1 */		
			$data .= "
					
					if( e==0 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td>Провайдер</td>');
							}
						});
					}
	
					if( e==1 )
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 2)
							{
								$(this).after('<td></td>');
							}
						});
					}
	
					if(e>1)
					{
						$(this).find('td').each(function(i) 
						{
							if( i == 0 )
							{
								ID = $(this).find('input').attr('value');
								//alert( $(this).find('input').attr('value') );
							}
		
							if( i == 2)
							{
								$(this).after('<td>'+items_hash[ID]+'</td>');
							}
						});
					}
				});
				</script>   ";
			/* end metka: a1 */
				
			return $data;
		}
	}
	
	public function checkDB()
	{
		$res = $this->db->query("SHOW TABLES");
		$installed = 0;
		foreach($res->rows as $key=>$val)
		{
			foreach($val as $k=>$v)
			{
				if( $v == DB_PREFIX . 'socnetauth2_customer2account' )
				{
					$installed = 1;
				}
			}
		}
		
		if( $installed == 0 )
		{
			$sql = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "socnetauth2_customer2account` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`customer_id` varchar(100) NOT NULL,
				`identity` varchar(300) NOT NULL,
				`link` varchar(300) NOT NULL,
				`provider` varchar(300) NOT NULL,
				`email` varchar(300) NOT NULL,
				`data` TEXT NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
				
			$this->db->query($sql);
			
			
			$query = $this->db->query("SELECT * 
							   FROM `" . DB_PREFIX . "customer` 
							   WHERE socnetauth2_identity!=''");
			if( !empty($query->rows) )				   
			{
				foreach($query->rows as $customer)
				{
					$this->db->query("INSERT INTO `" . DB_PREFIX . "socnetauth2_customer2account`
									SET 
									`customer_id` = '".(int)$customer['customer_id']."',
									`identity` = '".$this->escape($customer['socnetauth2_identity'])."',
									`link` = '".$this->escape($customer['socnetauth2_link'])."',
									`provider` = '".$this->escape($customer['socnetauth2_provider'])."',
									`data` = '".$this->escape($customer['socnetauth2_data'])."',
									`email` = '".$this->escape($customer['email'])."'");
				}
			}
		}
		else
		{
			$todel = $this->db->query("SELECT sc.id, c.customer_id 
								  FROM `" . DB_PREFIX . "socnetauth2_customer2account` sc
								  LEFT JOIN `" . DB_PREFIX . "customer` c
								  ON sc.customer_id=c.customer_id
								  WHERE c.customer_id IS NULL");
			
			if( !empty($todel->rows) )
			{
				foreach($todel->rows as $item)
				{
					$this->db->query("DELETE FROM `" . DB_PREFIX . "socnetauth2_customer2account` 
								  WHERE id=".(int)$item['id'] );
				}
			}
			
		}
	}
	
	public function getDataByCustomer($customer_id)
	{
		$query = $this->db->query("SELECT * 
								  FROM `" . DB_PREFIX . "socnetauth2_customer2account`
								  WHERE customer_id='".(int)$customer_id."'");
		
		if( !empty($query->rows) ) return $query->rows;
		else return false;
	}
	
}
?>