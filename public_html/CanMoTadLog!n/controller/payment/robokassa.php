<?php /* robokassa metka */
class ControllerPaymentRobokassa extends Controller {
	private $error = array(); 

	public function index() {
		
		/* start metka-kkt2 */
		$this->load->model('localisation/robokassa');
		$this->model_localisation_robokassa->changeDB();
		/* end metka-kkt2 */
						
						
	$hash_images = array(
						
						"AlfaBank" => "AlfaBankOceanR",
						"MobileRobokassa" => "BANKOCEAN2CHECKR",
						"BankCard" => "BANKOCEAN2R",
						"BankInteza" => "BSSIntezaR",
						"BSSMezhtopenergobank" => "BSSMezhtopenergobankR",
						"EasyPay" => "EasyPayB", // ??
						"ElecsnetWallet" => "ElecsnetWalletR",
						"BankFactura" => "FacturaR",
						"HandyBankBB" => "HandyBankBB",
						"HandyBankBO" => "HandyBankBO",
						"HandyBankFB" => "HandyBankFB",
						"HandyBankFU" => "HandyBankFU",
						"HandyBankKB" => "HandyBankKB",
						"HandyBankKSB" => "HandyBankKSB",
						"HandyBankLOB" => "HandyBankLOB",
						"HandyBank" => "HandyBankMerchantOceanR",
						"HandyBankNSB" => "HandyBankNSB",
						"HandyBankTB" => "HandyBankTB",
						"HandyBankVIB" => "HandyBankVIB",
						"LiqPay" => "LiqPayZ", // ??
						"Megafon" => "MegafonR", // ??
						"BankMIN" => "MINBankR",
						"MobicomBeeline" => "MobicomBeelineR", // ??
						"MobicomMts" => "MobicomMtsR", // ??
						"MobicomTele2" => "MobicomTele2R", // ??
						"Mts" => "MtsR", // ??
						"OceanBank" => "OceanBankOceanR", // ??
						"BankPSB" => "PSKBR",
						"QiwiWallet" => "QiwiR",
						"StoreEuroset" => "RapidaOceanEurosetR",
						"StoreSvyaznoy" => "RapidaOceanSvyaznoyR",
						"BankRSB" => "RussianStandardBankR",
						"SberBank" => "SberBankR", // ??
						"TeleMoney" => "TeleMoneyR", // ??
						"Elecsnet" => "TerminalsElecsnetOceanR",
						"TerminalsMElement" => "TerminalsMElementR", // ??
						"TerminalsPinpay" => "TerminalsPinpayR", // ??
						"TerminalsPkb" => "TerminalsPkbR", // ??
						"TerminalsUnikassa" => "TerminalsUnikassaR", // ??
						"UniStream" => "UnistreamR",
						"VTB24" => "VTB24R", // ??
						"W1" => "W1R",
						"WMB" => "WMBM",
						"WME" => "WMEM",
						"WMG" => "WMGM",
						"WMR" => "WMRM",
						"WMU" => "WMUM",
						"WMZ" => "WMZM",
						"YandexMoney" => "YandexMerchantR",
					);
		
		$this->language->load('payment/robokassa');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('setting/setting');
			
		$this->load->model('localisation/language');
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->load->model('setting/store');		
		$stores = $this->model_setting_store->getStores();
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) 
		{
			if( !$this->request->post['robokassa_p1'] && $this->config->get('robokassa_password1') )
				$this->request->post['robokassa_password1'] = $this->config->get('robokassa_password1');
			elseif( $this->request->post['robokassa_p1'] )
				$this->request->post['robokassa_password1'] = $this->request->post['robokassa_p1'];
			
			if( !$this->request->post['robokassa_p2'] && $this->config->get('robokassa_password2') )
				$this->request->post['robokassa_password2'] = $this->config->get('robokassa_password2');
			elseif( $this->request->post['robokassa_p2'] )
				$this->request->post['robokassa_password2'] = $this->request->post['robokassa_p2'];
			
			$this->request->post['robokassa_p1'] = '';
			$this->request->post['robokassa_p2'] = '';
			
			
			if( !empty( $stores ) )
			{
				foreach($stores as $store)
				{
					$dat = unserialize($this->config->get('robokassa_password1_store'));
					
					if( empty($this->request->post['robokassa_p1_store'][ $store['store_id'] ])
					&& !empty($dat[ $store['store_id'] ]) )
					$this->request->post['robokassa_password1_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ];
					elseif( !empty($this->request->post['robokassa_p1_store'][ $store['store_id'] ]) )
					$this->request->post['robokassa_password1_store'][ $store['store_id'] ] = $this->request->post['robokassa_p1_store'][ $store['store_id'] ];
			
					$dat = unserialize($this->config->get('robokassa_password2_store'));
					
					if( empty($this->request->post['robokassa_password2_store'][ $store['store_id'] ] )
						&& !empty($dat[ $store['store_id'] ]) )
					$this->request->post['robokassa_password2_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ];
					elseif( !empty($this->request->post['robokassa_p2_store'][ $store['store_id'] ]) )
					$this->request->post['robokassa_password2_store'][ $store['store_id'] ] = $this->request->post['robokassa_p2_store'][ $store['store_id'] ];
				}
			}
			
			$ext_arr = array();
			$updExt = array();
			
			if( !empty($this->request->post['robokassa_currencies'][0]) )
			{
				$this->request->post['robokassa__status'] = 1;
			}
			else
			{
				$this->request->post['robokassa__status'] = 0;
			}
			
			if( isset($this->request->post['robokassa_currencies_store']) )
			{
				foreach($this->request->post['robokassa_currencies_store'] as $STORE_ID=>$val  )
				{
					if( !empty($this->request->post['robokassa_currencies_store'][$STORE_ID][0]) )
					{
						$this->request->post['robokassa_status_store_'.$STORE_ID] = 1;
					}
					else
					{
						$this->request->post['robokassa_status_store_'.$STORE_ID] = 0;
					}
				}
			}
			
			//--------
			
			if( !empty($this->request->post['robokassa_methods']) )
			{
				$i=0;
				foreach( $this->request->post['robokassa_methods'] as $val )
				{
					if( 
					/* start update: a1 
						Earlier:
						$val &&
					*/ !empty($this->request->post['robokassa_currencies'][$i]) )
					{
						if($i!=0)
						{
							$this->request->post['robokassa'.$i.'_status'] = 1;
							$updExt[] = $i;
						}
					}
					else
					{
						if($i!=0)
						{
							$this->request->post['robokassa'.$i.'_status'] = 0;
						}
					}
					
					$i++;
				}
			}
			
			if( !empty($this->request->post['robokassa_methods_store']) )
			{
			
				$i=0;
				foreach( $this->request->post['robokassa_methods_store'] as $STORE_ID=>$val )
				{
					$i=0;
					
					foreach($val as $met)
					{					
						if( 
							!empty($this->request->post['robokassa_currencies_store'][$STORE_ID][$i]) 
						)
						{
							if($i!=0)
							{
				
								$this->request->post['robokassa'.$i.'_status_store_'.$STORE_ID] = 1;
								$this->request->post['robokassa'.$i.'_status'] = 1;
							
								if( !isset($updExt[$i]) ) 
								$updExt[] = $i;
							}
						}
						else
						{
							if($i!=0)
							{
								$this->request->post['robokassa'.$i.'_status_store_'.$STORE_ID] = 0;
								$this->request->post['robokassa'.$i.'_status'] = 0;
							}
						}
						
						$i++;
					}
					
				}
			}
			
			if( !empty($this->request->post['robokassa_methods']) )
			$this->request->post['robokassa_methods'] = serialize($this->request->post['robokassa_methods']);
			
			if( !empty($this->request->post['robokassa_currencies']) )
			$this->request->post['robokassa_currencies'] = serialize($this->request->post['robokassa_currencies']);
			
			if( !empty($this->request->post['robokassa_minprice']) )
			$this->request->post['robokassa_minprice'] = serialize($this->request->post['robokassa_minprice']);
			
			if( !empty($this->request->post['robokassa_maxprice']) )
			$this->request->post['robokassa_maxprice'] = serialize($this->request->post['robokassa_maxprice']);
			
			if( !empty($this->request->post['robokassa_confirm_comment']) )
			$this->request->post['robokassa_confirm_comment'] = serialize($this->request->post['robokassa_confirm_comment']);
			
			if( !empty($this->request->post['robokassa_premod_confirm_comment']) )
			$this->request->post['robokassa_premod_confirm_comment'] = serialize($this->request->post['robokassa_premod_confirm_comment']);
			
			if( !empty($this->request->post['robokassa_dopcostname']) )
			$this->request->post['robokassa_dopcostname'] = serialize($this->request->post['robokassa_dopcostname']);
			
			if( !empty($this->request->post['robokassa_premod_order_comment']) )
			$this->request->post['robokassa_premod_order_comment'] = serialize($this->request->post['robokassa_premod_order_comment']);
			
			
			
			if( !empty($this->request->post['robokassa_premod_success_page_text']) )
			$this->request->post['robokassa_premod_success_page_text'] = serialize($this->request->post['robokassa_premod_success_page_text']);
			
			if( !empty($this->request->post['robokassa_premod_success_page_header']) )
			$this->request->post['robokassa_premod_success_page_header'] = serialize($this->request->post['robokassa_premod_success_page_header']);
			
			
			
			if( !empty($this->request->post['robokassa_premod_hide_order_comment']) )
			$this->request->post['robokassa_premod_hide_order_comment'] = serialize($this->request->post['robokassa_premod_hide_order_comment']);
			
			if( !empty($this->request->post['robokassa_order_comment']) )
			$this->request->post['robokassa_order_comment'] = serialize($this->request->post['robokassa_order_comment']);
			
			if( !empty($this->request->post['robokassa_images']) )
			$this->request->post['robokassa_images'] = serialize($this->request->post['robokassa_images']);
			
			if( !empty( $stores ) )
			{
				foreach($this->request->post as $key=>$val)
				{
					if( preg_match("/_store$/", $key ) && is_array($val) )
					{
						$this->request->post[$key] = serialize($this->request->post[$key]);
					}
				}
			}
			
			
			$this->model_setting_setting->editSetting('robokassa', $this->request->post);
			
			$this->load->model('localisation/robokassa');
			
			$this->model_localisation_robokassa->updateExtentions($updExt);
			$this->session->data['current_store_id'] = $this->request->post['current_store_id'];
			
			
			if($this->request->post['robokassa_stay'])
			$this->redirect($this->url->link('payment/robokassa', 'success=1&token=' . $this->session->data['token'], 'SSL'));
			else
			$this->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		if( !empty( $stores ) )
		{
			$this->data['tab_general'] = $this->config->get('config_name');
			
			foreach($stores as $store)
			{
				$this->data['stores'][] = $store;
			}
		}
		else
		{
			$this->data['stores'] = array();
			$this->data['tab_general'] = $this->language->get('tab_general');
		
		}
		
		
		
		if( !empty($this->request->get['success'] ) )
		$this->data['success'] = $this->language->get('text_success');
		else
		$this->data['success'] = '';
		
		
		$this->load->model('localisation/currency');
		$results = $this->model_localisation_currency->getCurrencies();
		
		if( !isset($results['RUB']) && !isset($results['RUR']) )
		{
			$this->error[] = $this->language->get('error_rub');
		}			

		$this->data['notice'] = $this->language->get('notice');

		$this->data['HTTPS_CATALOG'] = HTTPS_CATALOG;
		$this->data['heading_title'] = $this->language->get('heading_title');
	
		$this->data['entry_clear_order'] = $this->language->get('entry_clear_order');
		$this->data['entry_clear_order_notice'] = $this->language->get('entry_clear_order_notice');
		$this->data['entry_clear_order_no'] = $this->language->get('entry_clear_order_no');
		$this->data['entry_clear_order_yes'] = $this->language->get('entry_clear_order_yes');
		
		$this->data['text_password_notice'] = $this->language->get('text_password_notice');
		$this->data['text_saved'] = $this->language->get('text_saved');
		$this->data['entry_icons'] = $this->language->get('entry_icons');
		$this->data['text_mode_notice'] = $this->language->get('text_mode_notice');
		
		/* kin insert metka: u1 */
		$this->data['tab_generation'] = $this->language->get('tab_generation');
		$this->data['entry_generate_order_id'] = $this->language->get('entry_generate_order_id');
		$this->data['entry_generate_sum'] = $this->language->get('entry_generate_sum');
		$this->data['entry_generate_store'] = $this->language->get('entry_generate_store');
		$this->data['text_default_store'] = $this->language->get('text_default_store');
		$this->data['entry_generate_email'] = $this->language->get('entry_generate_email');
		$this->data['entry_generate_currency'] = $this->language->get('entry_generate_currency');
		$this->data['entry_generate_culture'] = $this->language->get('entry_generate_culture');
		$this->data['entry_generate_culture_ru'] = $this->language->get('entry_generate_culture_ru');
		$this->data['entry_generate_culture_en'] = $this->language->get('entry_generate_culture_en');
		$this->data['button_generate'] = $this->language->get('button_generate');
		
		$this->data['error_generate_order_id'] = $this->language->get('error_generate_order_id');
		$this->data['error_generate_sum'] = $this->language->get('error_generate_sum');
		$this->data['error_generate_email'] = $this->language->get('error_generate_email');
		$this->data['error_order_id'] = $this->language->get('error_order_id');
		/* end kin metka */
		
		$this->data['entry_algoritm'] = $this->language->get('entry_algoritm');
		
		
		$this->data['entry_dopcost'] = $this->language->get('entry_dopcost');
		$this->data['entry_dopcostname'] = $this->language->get('entry_dopcostname');
		$this->data['text_dopcost_int'] = $this->language->get('text_dopcost_int');
		$this->data['text_dopcost_percent'] = $this->language->get('text_dopcost_percent');
		$this->data['text_dopcost_comission'] = $this->language->get('text_dopcost_comission');
		
		$this->data['text_login_notice'] = $this->language->get('text_login_notice');
		
		$this->data['entry_premod_success_page_type'] = $this->language->get('entry_premod_success_page_type');
		$this->data['text_premod_success_page_type_common'] = $this->language->get('text_premod_success_page_type_common');
		$this->data['text_premod_success_page_type_custom'] = $this->language->get('text_premod_success_page_type_custom');
		$this->data['entry_premod_success_page_header'] = $this->language->get('entry_premod_success_page_header');
		$this->data['entry_premod_success_page_text'] = $this->language->get('entry_premod_success_page_text');
		$this->data['entry_premod_success_page_notice'] = $this->language->get('entry_premod_success_page_notice');
		
		
		$this->data['text_robokassa_method'] = $this->language->get('text_robokassa_method');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_all_zones'] = $this->language->get('text_all_zones');
				
		$this->data['entry_shop_login'] = $this->language->get('entry_shop_login');		
		
		$this->data['entry_order_comment'] = $this->language->get('entry_order_comment');		
		$this->data['entry_order_comment_notice'] = $this->language->get('entry_order_comment_notice');
		
		$this->data['entry_test_mode'] = $this->language->get('entry_test_mode');
		
		$this->data['entry_result_url'] = $this->language->get('entry_result_url');
		$this->data['entry_result_method'] = $this->language->get('entry_result_method');
		$this->data['entry_success_url'] = $this->language->get('entry_success_url');
		$this->data['entry_success_method'] = $this->language->get('entry_success_method');
		$this->data['entry_fail_url'] = $this->language->get('entry_fail_url');
		$this->data['entry_fail_method'] = $this->language->get('entry_fail_method');
		
		$this->data['entry_paynotify'] = $this->language->get('entry_paynotify');
		$this->data['entry_paynotify_email'] = $this->language->get('entry_paynotify_email');
		
		/* start 1705 */
		
			$data['protokol'] = 'https://';
		/* end 1705 */
		
		
		$this->data['entry_commission'] = $this->language->get('entry_commission');
		$this->data['text_commission_shop'] = $this->language->get('text_commission_shop');
		$this->data['text_commission_customer'] = $this->language->get('text_commission_customer');
		$this->data['text_commission_j'] = $this->language->get('text_commission_j');
		
		$this->data['entry_interface_language'] = $this->language->get('entry_interface_language');
		$this->data['entry_interface_language_ru'] = $this->language->get('entry_interface_language_ru');
		$this->data['entry_interface_language_en'] = $this->language->get('entry_interface_language_en');
		$this->data['entry_interface_language_detect'] = $this->language->get('entry_interface_language_detect');
		$this->data['entry_interface_language_notice'] = $this->language->get('entry_interface_language_notice');
		$this->data['entry_default_language'] = $this->language->get('entry_default_language');
		$this->data['entry_default_language_ru'] = $this->language->get('entry_default_language_ru');
		$this->data['entry_default_language_en'] = $this->language->get('entry_default_language_en');
		$this->data['entry_default_language_notice'] = $this->language->get('entry_default_language_notice');
		
		$this->data['entry_log'] = $this->language->get('entry_log');	
		
		$this->data['entry_log'] = str_replace("#url#", HTTP_CATALOG.'system/logs/robokassa_log.txt', $this->data['entry_log']);
		
		$this->data['entry_no_methods'] = $this->language->get('entry_no_methods');
		$this->data['entry_methods'] = $this->language->get('entry_methods');
		
		$this->data['entry_password1'] = $this->language->get('entry_password1');		
		$this->data['entry_password2'] = $this->language->get('entry_password2');		
		
		$this->data['entry_order_status'] = $this->language->get('entry_order_status');	
		$this->data['entry_preorder_status'] = $this->language->get('entry_preorder_status');	
		
		$this->data['entry_order_status2'] = $this->language->get('entry_order_status2');		
		$this->data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		
		$this->data['entry_script'] = $this->language->get('entry_script');
		$this->data['entry_script_before'] = $this->language->get('entry_script_before');
		$this->data['entry_script_after'] = $this->language->get('entry_script_after');
		$this->data['entry_script_premod'] = $this->language->get('entry_script_premod');
		
		
		
		/* start 1112 */
		$this->data['entry_okrugl'] = $this->language->get('entry_okrugl');
		$this->data['entry_okrugl_no'] = $this->language->get('entry_okrugl_no');
		$this->data['entry_okrugl_round'] = $this->language->get('entry_okrugl_round');
		$this->data['entry_okrugl_ceil'] = $this->language->get('entry_okrugl_ceil');
		$this->data['entry_okrugl_floor'] = $this->language->get('entry_okrugl_floor');
		
		if (isset($this->request->post['robokassa_okrugl'])) {
			$this->data['robokassa_okrugl'] = $this->request->post['robokassa_okrugl'];
		} elseif( $this->config->get('robokassa_okrugl') ) {
			$this->data['robokassa_okrugl'] = $this->config->get('robokassa_okrugl');
		} else {
			$this->data['robokassa_okrugl'] = '';
		}
		/* end 1112 */
		
		
		$this->data['entry_confirm_notify'] = $this->language->get('entry_confirm_notify');
		$this->data['entry_confirm_comment'] = $this->language->get('entry_confirm_comment');
		$this->data['text_confirm_comment_default'] = $this->language->get('text_confirm_comment_default');
		
		/* kin insert metka: d1 */
		$this->data['entry_robokassa_desc'] = $this->language->get('entry_robokassa_desc');
		/* end kin metka: d1 */
		
		$this->data['entry_no_robokass_methods'] = $this->language->get('entry_no_robokass_methods');
		
		
		$this->data['select_currency'] = $this->language->get('select_currency');
		$this->data['entry_version'] = $this->language->get('entry_version');
	
		$this->data['methods_col1'] = $this->language->get('methods_col1');
	
		$this->data['methods_col2'] = $this->language->get('methods_col2');
		$this->data['methods_col3'] = $this->language->get('methods_col3');
		$this->data['methods_col4'] = $this->language->get('methods_col4');
		$this->data['methods_col5'] = $this->language->get('methods_col5');
		
		$this->data['entry_hide_order_comment'] = $this->language->get('entry_hide_order_comment');
		
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_save_and_go'] = $this->language->get('button_save_and_go');
		$this->data['button_save_and_stay'] = $this->language->get('button_save_and_stay');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		
		$this->data['tab_support'] = $this->language->get('tab_support');
		$this->data['text_contact'] = $this->language->get('text_contact');
		$this->data['tab_instruction'] = $this->language->get('tab_instruction');
		
		$this->data['text_frame'] = $this->language->get('text_frame');
		
		$this->data['text_sms_instruction']  = $this->language->get('text_sms_instruction');
		$this->data['entry_sms_status'] 	 = $this->language->get('entry_sms_status');
		$this->data['entry_sms_instruction'] = $this->language->get('entry_sms_instruction');
		$this->data['entry_sms_phone'] 		 = $this->language->get('entry_sms_phone');
		$this->data['entry_sms_message'] 		 = $this->language->get('entry_sms_message');
		
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		/* start metka-kkt */
		
		$this->data['header_kkt'] = $this->language->get('header_kkt');
		$this->data['entry_kkt_mode'] = $this->language->get('entry_kkt_mode');
		$this->data['entry_kkt_mode_notice'] = $this->language->get('entry_kkt_mode_notice');
		$this->data['entry_kkt_sno'] = $this->language->get('entry_kkt_sno');
		$this->data['entry_kkt_sno_osn'] = $this->language->get('entry_kkt_sno_osn');
		$this->data['entry_kkt_sno_usn_income'] = $this->language->get('entry_kkt_sno_usn_income');
		$this->data['entry_kkt_sno_usn_income_outcome'] = $this->language->get('entry_kkt_sno_usn_income_outcome');
		$this->data['entry_kkt_sno_envd'] = $this->language->get('entry_kkt_sno_envd');
		$this->data['entry_kkt_sno_esn'] = $this->language->get('entry_kkt_sno_esn');
		$this->data['entry_kkt_sno_patent'] = $this->language->get('entry_kkt_sno_patent');
		
		
		$this->data['entry_kkt_tax'] = $this->language->get('entry_kkt_tax');
		$this->data['entry_kkt_tax_none'] = $this->language->get('entry_kkt_tax_none');
		$this->data['entry_kkt_tax_vat0'] = $this->language->get('entry_kkt_tax_vat0');
		$this->data['entry_kkt_tax_vat10'] = $this->language->get('entry_kkt_tax_vat10');
		$this->data['entry_kkt_tax_vat18'] = $this->language->get('entry_kkt_tax_vat18');
		$this->data['entry_kkt_tax_vat110'] = $this->language->get('entry_kkt_tax_vat110');
		$this->data['entry_kkt_tax_vat118'] = $this->language->get('entry_kkt_tax_vat118');
		
		
		
		if (isset($this->request->post['robokassa_kkt_mode'])) {
			$this->data['robokassa_kkt_mode'] = $this->request->post['robokassa_kkt_mode'];
		} elseif( $this->config->has('robokassa_kkt_mode') ) {
			$this->data['robokassa_kkt_mode'] = $this->config->get('robokassa_kkt_mode'); 
		} else {
			$this->data['robokassa_kkt_mode'] = 0; 
		}
		
		if (isset($this->request->post['robokassa_kkt_sno'])) {
			$this->data['robokassa_kkt_sno'] = $this->request->post['robokassa_kkt_sno'];
		} elseif( $this->config->has('robokassa_kkt_sno') ) {
			$this->data['robokassa_kkt_sno'] = $this->config->get('robokassa_kkt_sno'); 
		} else {
			$this->data['robokassa_kkt_sno'] = 'osn'; 
		}
		
		if (isset($this->request->post['robokassa_kkt_tax'])) {
			$this->data['robokassa_kkt_tax'] = $this->request->post['robokassa_kkt_tax'];
		} elseif( $this->config->has('robokassa_kkt_tax') ) {
			$this->data['robokassa_kkt_tax'] = $this->config->get('robokassa_kkt_tax'); 
		} else {
			$this->data['robokassa_kkt_tax'] = 'none'; 
		}
		
		
		/* end metka-kkt */
		
		
		/* start 1112 */
		
		$this->data['entry_kkt_payment_method'] = $this->language->get('entry_kkt_payment_method');
		$this->data['entry_kkt_payment_method_full_prepayment'] = $this->language->get('entry_kkt_payment_method_full_prepayment');
		$this->data['entry_kkt_payment_method_prepayment'] = $this->language->get('entry_kkt_payment_method_prepayment');
		$this->data['entry_kkt_payment_method_advance'] = $this->language->get('entry_kkt_payment_method_advance');
		$this->data['entry_kkt_payment_method_full_payment'] = $this->language->get('entry_kkt_payment_method_full_payment');
		$this->data['entry_kkt_payment_method_partial_payment'] = $this->language->get('entry_kkt_payment_method_partial_payment');
		$this->data['entry_kkt_payment_method_credit'] = $this->language->get('entry_kkt_payment_method_credit');
		$this->data['entry_kkt_payment_method_credit_payment'] = $this->language->get('entry_kkt_payment_method_credit_payment');
		
		$this->data['entry_kkt_payment_object'] = $this->language->get('entry_kkt_payment_object');
		$this->data['entry_kkt_payment_object_different'] = $this->language->get('entry_kkt_payment_object_different');
		$this->data['entry_kkt_payment_object_commodity'] = $this->language->get('entry_kkt_payment_object_commodity');
		$this->data['entry_kkt_payment_object_excise'] = $this->language->get('entry_kkt_payment_object_excise');
		$this->data['entry_kkt_payment_object_job'] = $this->language->get('entry_kkt_payment_object_job'); 
		$this->data['entry_kkt_payment_object_service'] = $this->language->get('entry_kkt_payment_object_service'); 
		$this->data['entry_kkt_payment_object_gambling_bet'] = $this->language->get('entry_kkt_payment_object_gambling_bet');
		$this->data['entry_kkt_payment_object_gambling_prize'] = $this->language->get('entry_kkt_payment_object_gambling_prize');
		$this->data['entry_kkt_payment_object_lottery'] = $this->language->get('entry_kkt_payment_object_lottery');
		$this->data['entry_kkt_payment_object_lottery_prize'] = $this->language->get('entry_kkt_payment_object_lottery_prize');
		$this->data['entry_kkt_payment_object_intellectual_activity'] = $this->language->get('entry_kkt_payment_object_intellectual_activity');
		$this->data['entry_kkt_payment_object_payment'] = $this->language->get('entry_kkt_payment_object_payment');
		$this->data['entry_kkt_payment_object_agent_commission'] = $this->language->get('entry_kkt_payment_object_agent_commission');
		$this->data['entry_kkt_payment_object_composite'] = $this->language->get('entry_kkt_payment_object_composite');
		$this->data['entry_kkt_payment_object_another'] = $this->language->get('entry_kkt_payment_object_another');
		$this->data['entry_kkt_payment_object_property_right'] = $this->language->get('entry_kkt_payment_object_property_right');
		$this->data['entry_kkt_payment_object_non_operating_gain'] = $this->language->get('entry_kkt_payment_object_non_operating_gain');
		$this->data['entry_kkt_payment_object_insurance_premium'] = $this->language->get('entry_kkt_payment_object_insurance_premium');
		$this->data['entry_kkt_payment_object_sales_tax'] = $this->language->get('entry_kkt_payment_object_sales_tax');
		$this->data['entry_kkt_payment_object_resort_fee'] = $this->language->get('entry_kkt_payment_object_resort_fee'); 
		$this->data['entry_kkt_payment_object_notice'] = $this->language->get('entry_kkt_payment_object_notice');
		
		$this->data['entry_kkt_default_payment_object'] = $this->language->get('entry_kkt_default_payment_object');
		$this->data['entry_kkt_col_object'] = $this->language->get('entry_kkt_col_object');
		$this->data['entry_kkt_col_name'] = $this->language->get('entry_kkt_col_name');
		$this->data['entry_kkt_col_model'] = $this->language->get('entry_kkt_col_model');
		$this->data['entry_kkt_col_price'] = $this->language->get('entry_kkt_col_price');
		$this->data['entry_kkt_col_category'] = $this->language->get('entry_kkt_col_category');
		$this->data['entry_kkt_col_manufacturer'] = $this->language->get('entry_kkt_col_manufacturer');
		$this->data['text_from'] = $this->language->get('text_from');
		$this->data['text_to'] = $this->language->get('text_to');
		$this->data['text_exact'] = $this->language->get('text_exact');
		$this->data['text_include'] = $this->language->get('text_include');
		$this->data['button_add'] = $this->language->get('button_add');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['text_any_category'] = $this->language->get('text_any_category');
		$this->data['text_any_manufacturer'] = $this->language->get('text_any_manufacturer');
		$this->data['entry_kkt_payment_object_notice2'] = $this->language->get('entry_kkt_payment_object_notice2');
		
		$this->data['text_name'] = $this->language->get('text_name');
		$this->data['text_model'] = $this->language->get('text_model');
		$this->data['entry_kkt_col_status'] = $this->language->get('entry_kkt_col_status');
		$this->data['entry_kkt_col_sort_order'] = $this->language->get('entry_kkt_col_sort_order');
		
		if (isset($this->request->post['robokassa_kkt_payment_method'])) {
			$this->data['robokassa_kkt_payment_method'] = $this->request->post['robokassa_kkt_payment_method'];
		} elseif( $this->config->has('robokassa_kkt_payment_method') ) {
			$this->data['robokassa_kkt_payment_method'] = $this->config->get('robokassa_kkt_payment_method'); 
		} else {
			$this->data['robokassa_kkt_payment_method'] = 'full_prepayment'; 
		}
		
		if (isset($this->request->post['robokassa_kkt_payment_object'])) {
			$this->data['robokassa_kkt_payment_object'] = $this->request->post['robokassa_kkt_payment_object'];
		} elseif( $this->config->has('robokassa_kkt_payment_object') ) {
			$this->data['robokassa_kkt_payment_object'] = $this->config->get('robokassa_kkt_payment_object'); 
		} else {
			$this->data['robokassa_kkt_payment_object'] = 'commodity'; 
		}
		
		if (isset($this->request->post['robokassa_kkt_default_payment_object'])) {
			$this->data['robokassa_kkt_default_payment_object'] = $this->request->post['robokassa_kkt_default_payment_object'];
		} elseif( $this->config->has('robokassa_kkt_default_payment_object') ) {
			$this->data['robokassa_kkt_default_payment_object'] = $this->config->get('robokassa_kkt_default_payment_object'); 
		} else {
			$this->data['robokassa_kkt_default_payment_object'] = 'commodity'; 
		}
		
		if (isset($this->request->post['robokassa_kkt_payment_objects'])) {
			$this->data['robokassa_kkt_payment_objects'] = $this->request->post['robokassa_kkt_payment_objects'];
		} elseif( $this->config->has('robokassa_kkt_payment_objects') ) {
			$this->data['robokassa_kkt_payment_objects'] =  $this->custom_unserialize( $this->config->get('robokassa_kkt_payment_objects') ) ; 
		} else {
			$this->data['robokassa_kkt_payment_objects'] = array(); 
		}
		
		$this->load->model('catalog/category');
		$this->load->model('catalog/manufacturer');
		
		if( $this->data['robokassa_kkt_payment_objects'] )
		{
			$robokassa_kkt_payment_objects = $this->data['robokassa_kkt_payment_objects'];
			$this->data['robokassa_kkt_payment_objects'] = array();
			
			foreach($robokassa_kkt_payment_objects as $filter)
			{
				if( !empty( $filter['filter_category'] ) ) 
				{
					$filter_category = array();
					
					foreach( $filter['filter_category'] as $category_id )
					{
						$category_info = $this->model_catalog_category->getCategory($category_id);
						
						if( $category_info )
						{
							$filter_category[] = array(
								"category_id" => $category_id, 
								"name" => $category_info['name'], 
							);
						}
					}
					
					$filter['filter_category'] = $filter_category;
				}
				
				// ----
				
				if( !empty( $filter['filter_manufacturer'] ) ) 
				{
					$filter_manufacturer = array();
					
					foreach( $filter['filter_manufacturer'] as $manufacturer_id )
					{
						$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($manufacturer_id);
						
						if( $manufacturer_info )
						{
							$filter_manufacturer[] = array(
								"manufacturer_id" => $manufacturer_id, 
								"name" => $manufacturer_info['name'], 
							);
						}
					}
					
					$filter['filter_manufacturer'] = $filter_manufacturer;
				}
				
				$this->data['robokassa_kkt_payment_objects'][] = $filter;
			}
			
		}
		
		/* end 1112 */
		
		
		$currencies = array();
		$this->data['currencies'] = array();
		
		if (isset($this->request->post['current_store_id'])) {
			$this->data['current_store_id'] = $this->request->post['current_store_id'];
		} else {
			$this->data['current_store_id'] = $this->config->get('current_store_id'); 
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_test_mode'])) {
			$this->data['robokassa_test_mode'] = $this->request->post['robokassa_test_mode'];
		} elseif( $this->config->has('robokassa_test_mode') ) {
			$this->data['robokassa_test_mode'] = $this->config->get('robokassa_test_mode'); 
		} else {
			$this->data['robokassa_test_mode'] = 1; 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_test_mode_store'][$store['store_id']])) {
					$this->data['robokassa_test_mode_store'][$store['store_id']] = $this->request->post['robokassa_test_mode_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_test_mode_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_test_mode_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_order_comment'])) {
			$this->data['robokassa_order_comment'] = $this->request->post['robokassa_order_comment'];
		} elseif( $this->config->get('robokassa_order_comment') ) 
		{
			if( is_array($this->config->get('robokassa_order_comment')) )
			{
				$this->data['robokassa_order_comment'] = $this->config->get('robokassa_order_comment'); 
			}
			elseif( $this->config->get('robokassa_order_comment') )
			{
				$this->data['robokassa_order_comment'] = unserialize($this->config->get('robokassa_order_comment')); 
			}
			else
			{
				$this->data['robokassa_order_comment'] = array();
			}
			
		} elseif( !$this->config->has('robokassa_order_comment') ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_order_comment'][$language['code']] = $Lang->get('text_order_comment_default');
			}
		} else {
			$this->data['robokassa_order_comment'] = array();
		}
		
		//------
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_order_comment_store'][$store['store_id']])) {
					$this->data['robokassa_order_comment_store'][$store['store_id']] = $this->request->post['robokassa_order_comment_store'][$store['store_id']];
				} 
				elseif( $this->config->get('robokassa_order_comment_store') ) 
				{
					$dat = $this->config->get('robokassa_order_comment_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					if( is_array($dat[$store['store_id']]) )
					{
						$this->data['robokassa_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
					else
					{
						$this->data['robokassa_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
				} 
				elseif( !$this->config->has('robokassa_order_comment_store') ) 
				{
					foreach($this->data['languages'] as $language)
					{
						$Lang = new Language( $language['directory'] );
						$Lang->load('payment/robokassa');
				
						$this->data['robokassa_order_comment_store'][$store['store_id']][$language['code']] = $Lang->get('text_order_comment_default');
					}
				} 
				else 
				{
					$this->data['robokassa_order_comment_store'][$store['store_id']] = array();
				}
			}
		}
		
		
		// -----------------------------
		
		if (isset($this->request->post['robokassa_premod_confirm_comment'])) {
			$this->data['robokassa_premod_confirm_comment'] = $this->request->post['robokassa_premod_confirm_comment'];
		} elseif( $this->config->get('robokassa_premod_confirm_comment') ) 
		{
			if( is_array($this->config->get('robokassa_premod_confirm_comment')) )
			{
				$this->data['robokassa_premod_confirm_comment'] = $this->config->get('robokassa_premod_confirm_comment'); 
			}
			else
			{
				$this->data['robokassa_premod_confirm_comment'] = unserialize($this->config->get('robokassa_premod_confirm_comment')); 
			}
		} elseif( $this->config->get('robokassa_shop_login')=='' ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_premod_confirm_comment'][$language['code']] = $Lang->get('text_confirm_comment_default');
			}
		} else {
			$this->data['robokassa_premod_confirm_comment'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_confirm_comment_store'][$store['store_id']])) {
					$this->data['robokassa_premod_confirm_comment_store'][$store['store_id']] = $this->request->post['robokassa_premod_confirm_comment_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_premod_confirm_comment_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_premod_confirm_comment_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_premod_confirm_comment_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$Lang = new Language( $language['directory'] );
								$Lang->load('payment/robokassa');
					
								$this->data['robokassa_premod_confirm_comment_store'][$store['store_id']][$language['code']] = $Lang->get('text_confirm_comment_default');
							}
						} else {
							$this->data['robokassa_premod_confirm_comment_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		
		// -----------------------------
		
		if (isset($this->request->post['robokassa_premod_success_page_type'])) {
			$this->data['robokassa_premod_success_page_type'] = $this->request->post['robokassa_premod_success_page_type'];
		} elseif( $this->config->has('robokassa_premod_success_page_type') ) {
			$this->data['robokassa_premod_success_page_type'] = $this->config->get('robokassa_premod_success_page_type'); 
		} else {
			$this->data['robokassa_premod_success_page_type'] = 'common'; 
		}
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_success_page_type_store'][$store['store_id']])) {
					$this->data['robokassa_premod_success_page_type_store'][$store['store_id']] = $this->request->post['robokassa_premod_success_page_type_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_premod_success_page_type_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_premod_success_page_type_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_premod_success_page_type_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$Lang = new Language( $language['directory'] );
								$Lang->load('payment/robokassa');
					
								$this->data['robokassa_premod_success_page_type_store'][$store['store_id']][$language['code']] = $Lang->get('default_premod_success_page_header');
							}
						} else {
							$this->data['robokassa_premod_success_page_type_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		
		// ------------
		
		if (isset($this->request->post['robokassa_clear_order'])) {
			$this->data['robokassa_clear_order'] = $this->request->post['robokassa_clear_order'];
		} elseif( $this->config->has('robokassa_clear_order') ) {
			$this->data['robokassa_clear_order'] = $this->config->get('robokassa_clear_order'); 
		} else {
			$this->data['robokassa_clear_order'] = 1; 
		}
		
		
		// -----------------------------
		
		if (isset($this->request->post['robokassa_premod_success_page_header'])) {
			$this->data['robokassa_premod_success_page_header'] = $this->request->post['robokassa_premod_success_page_header'];
		} elseif( $this->config->get('robokassa_premod_success_page_header') ) 
		{
			if( is_array($this->config->get('robokassa_premod_success_page_header')) )
			{
				$this->data['robokassa_premod_success_page_header'] = $this->config->get('robokassa_premod_success_page_header'); 
			}
			else
			{
				$this->data['robokassa_premod_success_page_header'] = unserialize($this->config->get('robokassa_premod_success_page_header')); 
			}
		} elseif( !$this->config->has('robokassa_premod_success_page_header') ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_premod_success_page_header'][$language['code']] = $Lang->get('default_premod_success_page_header');
			}
		} else {
			$this->data['robokassa_premod_success_page_header'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_success_page_header_store'][$store['store_id']])) {
					$this->data['robokassa_premod_success_page_header_store'][$store['store_id']] = $this->request->post['robokassa_premod_success_page_header_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_premod_success_page_header_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_premod_success_page_header_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_premod_success_page_header_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$Lang = new Language( $language['directory'] );
								$Lang->load('payment/robokassa');
					
								$this->data['robokassa_premod_success_page_header_store'][$store['store_id']][$language['code']] = $Lang->get('default_premod_success_page_header');
							}
						} else {
							$this->data['robokassa_premod_success_page_header_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		
		// -----------------------------
		
		if (isset($this->request->post['robokassa_premod_success_page_text'])) {
			$this->data['robokassa_premod_success_page_text'] = $this->request->post['robokassa_premod_success_page_text'];
		} elseif( $this->config->get('robokassa_premod_success_page_text') ) 
		{
			if( is_array($this->config->get('robokassa_premod_success_page_text')) )
			{
				$this->data['robokassa_premod_success_page_text'] = $this->config->get('robokassa_premod_success_page_text'); 
			}
			else
			{
				$this->data['robokassa_premod_success_page_text'] = unserialize($this->config->get('robokassa_premod_success_page_text')); 
			}
		} elseif( !$this->config->has('robokassa_premod_success_page_text')  ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_premod_success_page_text'][$language['code']] = $Lang->get('default_premod_success_page_text');
			}
		} else {
			$this->data['robokassa_premod_success_page_text'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_success_page_text_store'][$store['store_id']])) {
					$this->data['robokassa_premod_success_page_text_store'][$store['store_id']] = $this->request->post['robokassa_premod_success_page_text_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_premod_success_page_text_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_premod_success_page_text_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_premod_success_page_text_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$Lang = new Language( $language['directory'] );
								$Lang->load('payment/robokassa');
					
								$this->data['robokassa_premod_success_page_text_store'][$store['store_id']][$language['code']] = $Lang->get('default_premod_success_page_text');
							}
						} else {
							$this->data['robokassa_premod_success_page_text_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		
		
		
		/////////////////////
		
		
		if (isset($this->request->post['robokassa_premod_order_comment'])) {
			$this->data['robokassa_premod_order_comment'] = $this->request->post['robokassa_premod_order_comment'];
		} elseif( $this->config->get('robokassa_premod_order_comment') ) 
		{
			if( is_array($this->config->get('robokassa_premod_order_comment')) )
			{
				$this->data['robokassa_premod_order_comment'] = $this->config->get('robokassa_premod_order_comment'); 
			}
			elseif( $this->config->get('robokassa_premod_order_comment') )
			{
				$this->data['robokassa_premod_order_comment'] = unserialize($this->config->get('robokassa_premod_order_comment')); 
			}
			else
			{
				$this->data['robokassa_premod_order_comment'] = array();
			}
			
		} elseif( !$this->config->has('robokassa_premod_order_comment') ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_premod_order_comment'][$language['code']] = $Lang->get('text_premod_order_comment_default');
			}
		} else {
			$this->data['robokassa_premod_order_comment'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_order_comment_store'][$store['store_id']])) {
					$this->data['robokassa_premod_order_comment_store'][$store['store_id']] = $this->request->post['robokassa_premod_order_comment_store'][$store['store_id']];
				} 
				elseif( $this->config->get('robokassa_premod_order_comment_store') ) 
				{
					$dat = $this->config->get('robokassa_premod_order_comment_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					if( is_array($dat[$store['store_id']]) )
					{
						$this->data['robokassa_premod_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
					else
					{
						$this->data['robokassa_premod_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
				} 
				elseif( !$this->config->has('robokassa_premod_order_comment_store') ) 
				{
					foreach($this->data['languages'] as $language)
					{
						$Lang = new Language( $language['directory'] );
						$Lang->load('payment/robokassa');
				
						$this->data['robokassa_premod_order_comment_store'][$store['store_id']][$language['code']] = $Lang->get('text_premod_order_comment_default');
					}
				} 
				else 
				{
					$this->data['robokassa_premod_order_comment_store'][$store['store_id']] = array();
				}
			}
		}
		
		//---------
		
		
		if (isset($this->request->post['robokassa_premod_hide_order_comment'])) {
			$this->data['robokassa_premod_hide_order_comment'] = $this->request->post['robokassa_premod_hide_order_comment'];
		} elseif( $this->config->get('robokassa_premod_hide_order_comment') ) 
		{
			if( is_array($this->config->get('robokassa_premod_hide_order_comment')) )
			{
				$this->data['robokassa_premod_hide_order_comment'] = $this->config->get('robokassa_premod_hide_order_comment'); 
			}
			elseif( $this->config->get('robokassa_premod_hide_order_comment') )
			{
				$this->data['robokassa_premod_hide_order_comment'] = unserialize($this->config->get('robokassa_premod_hide_order_comment')); 
			}
			else
			{
				$this->data['robokassa_premod_hide_order_comment'] = array();
			}
			
		} elseif( !$this->config->has('robokassa_premod_hide_order_comment') ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_premod_hide_order_comment'][$language['code']] = $Lang->get('text_premod_hide_order_comment_default');
			}
		} else {
			$this->data['robokassa_premod_hide_order_comment'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_hide_order_comment_store'][$store['store_id']])) {
					$this->data['robokassa_premod_hide_order_comment_store'][$store['store_id']] = $this->request->post['robokassa_premod_hide_order_comment_store'][$store['store_id']];
				} 
				elseif( $this->config->get('robokassa_premod_hide_order_comment_store') ) 
				{
					$dat = $this->config->get('robokassa_premod_hide_order_comment_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					if( is_array($dat[$store['store_id']]) )
					{
						$this->data['robokassa_premod_hide_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
					else
					{
						$this->data['robokassa_premod_hide_order_comment_store'][$store['store_id']] = $dat[$store['store_id']];
					}
				} 
				elseif( !$this->config->has('robokassa_premod_hide_order_comment_store') ) 
				{
					foreach($this->data['languages'] as $language)
					{
						$Lang = new Language( $language['directory'] );
						$Lang->load('payment/robokassa');
				
						$this->data['robokassa_premod_hide_order_comment_store'][$store['store_id']][$language['code']] = $Lang->get('text_premod_order_comment_default');
					}
				} 
				else 
				{
					$this->data['robokassa_premod_hide_order_comment_store'][$store['store_id']] = array();
				}
			}
		}
		
		
		//---------
		
		
		if (isset($this->request->post['robokassa_paynotify'])) {
			$this->data['robokassa_paynotify'] = $this->request->post['robokassa_paynotify'];
		} elseif( $this->config->has('robokassa_paynotify') ) {
			$this->data['robokassa_paynotify'] = $this->config->get('robokassa_paynotify'); 
		} else {
			$this->data['robokassa_paynotify'] = 1; 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_paynotify_store'][$store['store_id']])) {
					$this->data['robokassa_paynotify_store'][$store['store_id']] = $this->request->post['robokassa_paynotify_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_paynotify_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_paynotify_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		/* start 0106 */
		$this->data['entry_paynotify_subject'] = $this->language->get('entry_paynotify_subject');
		$this->data['entry_paynotify_message'] = $this->language->get('entry_paynotify_message');
		
		$this->data['entry_premod_paynotify'] = $this->language->get('entry_premod_paynotify');
		$this->data['entry_premod_paynotify_subject'] = $this->language->get('entry_premod_paynotify_subject');
		$this->data['entry_premod_paynotify_message'] = $this->language->get('entry_premod_paynotify_message');
		
		
		if (isset($this->request->post['robokassa_paynotify_subject'])) {
			$this->data['robokassa_paynotify_subject'] = $this->request->post['robokassa_paynotify_subject'];
		} elseif( $this->config->has('robokassa_paynotify_subject') ) {
			$this->data['robokassa_paynotify_subject'] = $this->config->get('robokassa_paynotify_subject'); 
		} else { 
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				if( $language['code'] == $this->config->get('config_language') )
				{
					$this->data['robokassa_paynotify_subject'] = $Lang->get('default_paynotify_subject');
				}
			}
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_paynotify_subject_store'][$store['store_id']])) {
					$this->data['robokassa_paynotify_subject_store'][$store['store_id']] = $this->request->post['robokassa_paynotify_subject_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_paynotify_subject_store') )
					{
						$dat = $this->config->get('robokassa_paynotify_subject_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_paynotify_subject_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						foreach($this->data['languages'] as $language)
						{
							$Lang = new Language( $language['directory'] );
							$Lang->load('payment/robokassa');
							
							if( $language['code'] == $this->config->get('config_language') )
							$this->data['robokassa_paynotify_subject_store'][$store['store_id']] = $Lang->get('default_paynotify_subject');
						}
					}
				}
			}
		}
		
		
		if (isset($this->request->post['robokassa_paynotify_message'])) {
			$this->data['robokassa_paynotify_message'] = $this->request->post['robokassa_paynotify_message'];
		} elseif( $this->config->has('robokassa_paynotify_message') ) {
			$this->data['robokassa_paynotify_message'] = $this->config->get('robokassa_paynotify_message'); 
		} else {
			$Lang = new Language( $language['directory'] );
			$Lang->load('payment/robokassa');
				
			if( $language['code'] == $this->config->get('config_language') )
			{
				$this->data['robokassa_paynotify_message'] = $Lang->get('default_paynotify_message');
			}
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_paynotify_message_store'][$store['store_id']])) {
					$this->data['robokassa_paynotify_message_store'][$store['store_id']] = $this->request->post['robokassa_paynotify_message_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_paynotify_message_store') )
					{
						$dat = $this->config->get('robokassa_paynotify_message_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_paynotify_message_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						foreach($this->data['languages'] as $language)
						{
							$Lang = new Language( $language['directory'] );
							$Lang->load('payment/robokassa');
							
							if( $language['code'] == $this->config->get('config_language') )
							$this->data['robokassa_paynotify_message_store'][$store['store_id']] = $Lang->get('default_paynotify_message');
						}
					}
				}
			}
		}
		
		
		if (isset($this->request->post['robokassa_premod_paynotify'])) {
			$this->data['robokassa_premod_paynotify'] = $this->request->post['robokassa_premod_paynotify'];
		} elseif( $this->config->has('robokassa_premod_paynotify') ) {
			$this->data['robokassa_premod_paynotify'] = $this->config->get('robokassa_premod_paynotify'); 
		} else {
			$this->data['robokassa_premod_paynotify'] = 1; 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_paynotify_store'][$store['store_id']])) {
					$this->data['robokassa_premod_paynotify_store'][$store['store_id']] = $this->request->post['robokassa_premod_paynotify_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_premod_paynotify_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_premod_paynotify_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		
		
		if (isset($this->request->post['robokassa_premod_paynotify_subject'])) {
			$this->data['robokassa_premod_paynotify_subject'] = $this->request->post['robokassa_premod_paynotify_subject'];
		} elseif( $this->config->has('robokassa_premod_paynotify_subject') ) {
			$this->data['robokassa_premod_paynotify_subject'] = $this->config->get('robokassa_premod_paynotify_subject'); 
		} else { 
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				if( $language['code'] == $this->config->get('config_language') )
				{
					$this->data['robokassa_premod_paynotify_subject'] = $Lang->get('default_premod_paynotify_subject');
				}
			}
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_paynotify_subject_store'][$store['store_id']])) {
					$this->data['robokassa_premod_paynotify_subject_store'][$store['store_id']] = $this->request->post['robokassa_premod_paynotify_subject_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_premod_paynotify_subject_store') )
					{
						$dat = $this->config->get('robokassa_premod_paynotify_subject_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_premod_paynotify_subject_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						foreach($this->data['languages'] as $language)
						{
							$Lang = new Language( $language['directory'] );
							$Lang->load('payment/robokassa');
							
							if( $language['code'] == $this->config->get('config_language') )
							$this->data['robokassa_premod_paynotify_subject_store'][$store['store_id']] = $Lang->get('default_premod_paynotify_subject');
						}
					}
				}
			}
		}
		
		
		if (isset($this->request->post['robokassa_premod_paynotify_message'])) {
			$this->data['robokassa_premod_paynotify_message'] = $this->request->post['robokassa_premod_paynotify_message'];
		} elseif( $this->config->has('robokassa_premod_paynotify_message') ) {
			$this->data['robokassa_premod_paynotify_message'] = $this->config->get('robokassa_premod_paynotify_message'); 
		} else {
			$Lang = new Language( $language['directory'] );
			$Lang->load('payment/robokassa');
				
			if( $language['code'] == $this->config->get('config_language') )
			{
				$this->data['robokassa_premod_paynotify_message'] = $Lang->get('default_premod_paynotify_message');
			}
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_paynotify_message_store'][$store['store_id']])) {
					$this->data['robokassa_premod_paynotify_message_store'][$store['store_id']] = $this->request->post['robokassa_premod_paynotify_message_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_premod_paynotify_message_store') )
					{
						$dat = $this->config->get('robokassa_premod_paynotify_message_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_premod_paynotify_message_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						foreach($this->data['languages'] as $language)
						{
							$Lang = new Language( $language['directory'] );
							$Lang->load('payment/robokassa');
							
							if( $language['code'] == $this->config->get('config_language') )
							$this->data['robokassa_premod_paynotify_message_store'][$store['store_id']] = $Lang->get('default_premod_paynotify_message');
						}
					}
				}
			}
		}
		
		
		$this->data['protokol'] = 'http://';
		if( strstr(HTTPS_SERVER, "https://") )
			$this->data['protokol'] = 'https://';
		
		/* end 0106 */
		
		if (isset($this->request->post['robokassa_paynotify_email'])) {
			$this->data['robokassa_paynotify_email'] = $this->request->post['robokassa_paynotify_email'];
		} elseif( $this->config->has('robokassa_paynotify_email') ) {
			$this->data['robokassa_paynotify_email'] = $this->config->get('robokassa_paynotify_email'); 
		} else {
			$this->data['robokassa_paynotify_email'] = $this->config->get('config_email'); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_paynotify_email_store'][$store['store_id']])) {
					$this->data['robokassa_paynotify_email_store'][$store['store_id']] = $this->request->post['robokassa_paynotify_email_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_paynotify_email_store') )
					{
						$dat = $this->config->get('robokassa_paynotify_email_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_paynotify_email_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						$this->data['robokassa_paynotify_email_store'][$store['store_id']] = $this->config->get('config_email'); 
					}
				}
			}
		}
		
		//----
		
		if (isset($this->request->post['robokassa_confirm_status'])) {
			$this->data['robokassa_confirm_status'] = $this->request->post['robokassa_confirm_status'];
		} elseif( $this->config->has('robokassa_confirm_status') ) {
			$this->data['robokassa_confirm_status'] = $this->config->get('robokassa_confirm_status'); 
		} else {
			$this->data['robokassa_confirm_status'] = 'before'; 
		}
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_confirm_status_store'][$store['store_id']])) {
					$this->data['robokassa_confirm_status_store'][$store['store_id']] = $this->request->post['robokassa_confirm_status_store'][$store['store_id']];
				} elseif( $this->config->has('robokassa_confirm_status_store') ) {
					$dat = $this->config->get('robokassa_confirm_status_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					if( isset($dat[$store['store_id']]) )
						$this->data['robokassa_confirm_status_store'][$store['store_id']] = $dat[$store['store_id']]; 
					else
						$this->data['robokassa_confirm_status_store'][$store['store_id']] = 'before';
				
				} else {
					$this->data['robokassa_confirm_status_store'][$store['store_id']] = 'before';
				}
			}
		}
		
		//---------
		
		/* start 2710 */
		
		$this->data['entry_icons_format'] = $this->language->get('entry_icons_format'); 
		$this->data['entry_icons_format_inname'] = $this->language->get('entry_icons_format_inname');
		$this->data['entry_icons_format_inimage'] = $this->language->get('entry_icons_format_inimage'); 
		$this->data['entry_icons_html'] = $this->language->get('entry_icons_html');  
		$this->data['entry_icons_size'] = $this->language->get('entry_icons_size');  
		  
		if (isset($this->request->post['robokassa_icons_format'])) {
			$this->data['robokassa_icons_format'] = $this->request->post['robokassa_icons_format'];
		} elseif( $this->config->has('robokassa_icons_format') ) {
			$this->data['robokassa_icons_format'] = $this->config->get('robokassa_icons_format'); 
		} else {
			$this->data['robokassa_icons_format'] = 'inname'; 
		}
		
		if (isset($this->request->post['robokassa_icons_html'])) {
			$this->data['robokassa_icons_html'] = $this->request->post['robokassa_icons_html'];
		} elseif( $this->config->has('robokassa_icons_html') ) {
			$this->data['robokassa_icons_html'] = $this->config->get('robokassa_icons_html'); 
		} else {
			$this->data['robokassa_icons_html'] = $this->language->get('default_icons_html');  
		}
		  
		if (isset($this->request->post['robokassa_icons_width'])) {
			$this->data['robokassa_icons_width'] = $this->request->post['robokassa_icons_width'];
		} elseif( $this->config->has('robokassa_icons_width') ) {
			$this->data['robokassa_icons_width'] = $this->config->get('robokassa_icons_width'); 
		} else {
			$this->data['robokassa_icons_width'] = 69; 
		}
		  
		if (isset($this->request->post['robokassa_icons_height'])) {
			$this->data['robokassa_icons_height'] = $this->request->post['robokassa_icons_height'];
		} elseif( $this->config->has('robokassa_icons_height') ) {
			$this->data['robokassa_icons_height'] = $this->config->get('robokassa_icons_height'); 
		} else {
			$this->data['robokassa_icons_height'] = 35; 
		}
		/* end 2710 */
		
		
		if (isset($this->request->post['robokassa_sms_status'])) {
			$this->data['robokassa_sms_status'] = $this->request->post['robokassa_sms_status'];
		} elseif( $this->config->has('robokassa_sms_status') ) {
			$this->data['robokassa_sms_status'] = $this->config->get('robokassa_sms_status'); 
		} else {
			$this->data['robokassa_sms_status'] = 0; 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_sms_status_store'][$store['store_id']])) {
					$this->data['robokassa_sms_status_store'][$store['store_id']] = $this->request->post['robokassa_sms_status_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_sms_status_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_sms_status_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		if (isset($this->request->post['robokassa_sms_phone'])) {
			$this->data['robokassa_sms_phone'] = $this->request->post['robokassa_sms_phone'];
		} elseif( $this->config->has('robokassa_sms_phone') ) {
			$this->data['robokassa_sms_phone'] = $this->config->get('robokassa_sms_phone'); 
		} else {
			$this->data['robokassa_sms_phone'] = ''; 
		}
		
		//-------------
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_dopcost_store'][$store['store_id']])) {
					$this->data['robokassa_dopcost_store'][$store['store_id']] = $this->request->post['robokassa_dopcost_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_dopcost_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_dopcost_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		if (isset($this->request->post['robokassa_dopcost'])) {
			$this->data['robokassa_dopcost'] = $this->request->post['robokassa_dopcost'];
		} elseif( $this->config->has('robokassa_dopcost') ) {
			$this->data['robokassa_dopcost'] = $this->config->get('robokassa_dopcost'); 
		} else {
			$this->data['robokassa_dopcost'] = ''; 
		}
		
		//-----------
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_dopcosttype_store'][$store['store_id']])) {
					$this->data['robokassa_dopcosttype_store'][$store['store_id']] = $this->request->post['robokassa_dopcosttype_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_dopcosttype_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_dopcosttype_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		if (isset($this->request->post['robokassa_dopcosttype'])) {
			$this->data['robokassa_dopcosttype'] = $this->request->post['robokassa_dopcosttype'];
		} elseif( $this->config->has('robokassa_dopcosttype') ) {
			$this->data['robokassa_dopcosttype'] = $this->config->get('robokassa_dopcosttype'); 
		} else {
			$this->data['robokassa_dopcosttype'] = ''; 
		}
		
		//-------------
		
		
		if (isset($this->request->post['robokassa_dopcostname'])) {
			$this->data['robokassa_dopcostname'] = $this->request->post['robokassa_dopcostname'];
		} elseif( $this->config->get('robokassa_dopcostname') ) 
		{
			if( is_array($this->config->get('robokassa_dopcostname')) )
			{
				$this->data['robokassa_dopcostname'] = $this->config->get('robokassa_dopcostname'); 
			}
			else
			{
				$this->data['robokassa_dopcostname'] = unserialize($this->config->get('robokassa_dopcostname')); 
			}
		} elseif( $this->config->get('robokassa_shop_login')=='' ) {
			
			foreach($this->data['languages'] as $language)
			{
				$this->data['robokassa_dopcostname'][$language['code']] = '';
			}
		} else {
			$this->data['robokassa_dopcostname'] = array();
		}
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_dopcostname_store'][$store['store_id']])) {
					$this->data['robokassa_dopcostname_store'][$store['store_id']] = $this->request->post['robokassa_dopcostname_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_dopcostname_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_dopcostname_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_dopcostname_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$this->data['robokassa_dopcostname_store'][$store['store_id']][$language['code']] = '';
							}
						} else {
							$this->data['robokassa_dopcostname_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		
		//-------------
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_sms_phone_store'][$store['store_id']])) {
					$this->data['robokassa_sms_phone_store'][$store['store_id']] = $this->request->post['robokassa_sms_phone_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_sms_phone_store') )
					{
						$dat = $this->config->get('robokassa_sms_phone_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_sms_phone_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						$this->data['robokassa_sms_phone_store'][$store['store_id']] = ''; 
					}
				}
			}
		}
		
		
		if (isset($this->request->post['robokassa_sms_message'])) {
			$this->data['robokassa_sms_message'] = $this->request->post['robokassa_sms_message'];
		} elseif( $this->config->has('robokassa_sms_message') ) {
			$this->data['robokassa_sms_message'] = $this->config->get('robokassa_sms_message'); 
		} else {
			$this->data['robokassa_sms_message'] = $this->language->get('entry_sms_message_default'); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_sms_message_store'][$store['store_id']])) {
					$this->data['robokassa_sms_message_store'][$store['store_id']] = $this->request->post['robokassa_sms_message_store'][$store['store_id']];
				} else {
					if( $this->config->has('robokassa_sms_message_store') )
					{
						$dat = $this->config->get('robokassa_sms_message_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						$this->data['robokassa_sms_message_store'][$store['store_id']] = $dat[$store['store_id']]; 
					}
					else
					{
						$this->data['robokassa_sms_message_store'][$store['store_id']] = $this->language->get('entry_sms_message_default'); 
					}
				}
			}
		}
		
		//---------
		if (isset($this->request->post['robokassa_interface_language'])) 
		{
			$this->data['robokassa_interface_language'] = $this->request->post['robokassa_interface_language'];
		} 
		else 
		{
			$this->data['robokassa_interface_language'] = $this->config->get('robokassa_interface_language'); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_interface_language_store'][$store['store_id']])) 
				{
					$this->data['robokassa_interface_language_store'][$store['store_id']] = $this->request->post['robokassa_interface_language_store'][$store['store_id']];
				} 
				else 
				{
					$dat = $this->config->get('robokassa_interface_language_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					$this->data['robokassa_interface_language_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		//---------
		/* kin insert metka: g1 */
		
		/* start 1611 */
		$this->data['text_copy_to_clipboard'] = $this->language->get('text_copy_to_clipboard');
		/* end 1611 */
		
		$this->data['entry_hide_noname'] = $this->language->get('entry_hide_noname');
		
		
		if (isset($this->request->post['robokassa_hide_noname'])) 
		{
			$this->data['robokassa_hide_noname'] = $this->request->post['robokassa_hide_noname'];
		} 
		else 
		{
			$this->data['robokassa_hide_noname'] = $this->config->get('robokassa_hide_noname'); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_hide_noname_store'][$store['store_id']])) 
				{
					$this->data['robokassa_hide_noname_store'][$store['store_id']] = $this->request->post['robokassa_hide_noname_store'][$store['store_id']];
				} 
				else 
				{
					$dat = $this->config->get('robokassa_hide_noname_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					$this->data['robokassa_hide_noname_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		/* end kin insert metka: g1 */
		
		
		// --------------------
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_default_language_store'][$store['store_id']])) {
					$this->data['robokassa_default_language_store'][$store['store_id']] = $this->request->post['robokassa_default_language_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_default_language_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$this->data['robokassa_default_language_store'][$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		
		
		//---------
		
		if (isset($this->request->post['robokassa_commission'])) {
			$this->data['robokassa_commission'] = $this->request->post['robokassa_commission'];
		} elseif( $this->config->get('robokassa_commission') ) {
			$this->data['robokassa_commission'] = $this->config->get('robokassa_commission');
		} else {
			$this->data['robokassa_commission'] = 'j';
		}
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_commission_store'][$store['store_id']])) {
					$this->data['robokassa_commission_store'][$store['store_id']] = $this->request->post['robokassa_commission_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_commission_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
				
					if( isset($dat[$store['store_id']]) )
						$this->data['robokassa_commission_store'][$store['store_id']] = $dat[$store['store_id']]; 
					else
						$this->data['robokassa_commission_store'][$store['store_id']] = array();
				}
			}
		}
		//---------
		
		$this->load->model('tool/image');
		
		$all_images = array();
			
		if( $this->config->get('robokassa_shop_login') )
		{
			$interface_lang = $this->config->get('config_admin_language');
			
			if( $interface_lang != 'en' ) 
			$interface_lang = 'ru';
		
			$url = "https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin=".$this->config->get('robokassa_shop_login')."&Language=".$interface_lang;
			
			if( $this->data['robokassa_test_mode'] )
			$url .= '&IsTest=1'; 
		
			//$url = "http://auth.robokassa.ru/Webservice/Service.asmx/GetCurrencies?MerchantLogin=".$this->config->get('robokassa_shop_login')."&Language=ru";
			// http://merchant.roboxchange.com/WebService/Service.asmx/CalcOutSumm?MerchantLogin=obrands&IncCurrLabel=WMR&IncSum=210
			// http://merchant.roboxchange.com/Webservice/Service.asmx/GetCurrencies?MerchantLogin=obrands&Language=ru
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
			
			
			if( !preg_match("/<Code>0<\/Code>/i", $page) )
			{
				#$this->data['robokassa_methods'] = '';
			}
			elseif($page)
			{
				$arr_value = array();
				$group_value = array();
				
				//<Group Code="EMoney" Description="Электронные валюты"></Group>
				//preg_match_all("/(<offer([^>]*)>(.*)<\/offer>)/Ui", $yml_data, $pred_offer);
				//preg_match_all("/(<Group Code=\"([^\"]+)\" Description=\"([^\"]+)\">(.*)<\/Group>)/Ui", $page, $group_value);
				
				$ar = array();
				
				//<Currency Label="Qiwi29OceanR" Name="QIWI Кошелек" />
				
				$groups = explode("<Group ", $page);
				
				for($i=1; $i<count($groups); $i++)
				{
					$ar = array();
					preg_match("/^Code=\"([^\"]+)\" Description=\"([^\"]+)\"/",
					$groups[$i], $ar);
					
					if( empty($ar) ) continue;
					
					$group_description = $ar[2];
					
					$ar = array();
					
					if( strstr($groups[$i], "Alias") )
					{
						preg_match_all("/(<Currency Label=\"([^\"]+)\" Alias=\"([^\"]+)\" Name=\"([^\"]+)\")/", 
									$groups[$i], $ar);
					}
					else
					{
						preg_match_all("/(<Currency Label=\"([^\"]+)\" Name=\"([^\"]+)\")/", 
									$groups[$i], $ar);
					}
					
					
					if( empty($ar) ) continue;
					
					for($e=0; $e<count($ar[2]); $e++)
					{
						$Label = $ar[2][$e];
						$Alias = '';
						
						if( !empty($ar[4][$e]) )
						{
							$Alias = $ar[3][$e];
							$Name = $ar[4][$e];
						}
						else
						{
							$Name = $ar[3][$e];
						}
						
						$curName = '';
						
						if( file_exists( DIR_IMAGE.'data/robokassa_icons/'.trim($Label).'.png' )  )
						{
							$curName = HTTP_CATALOG.'image/data/robokassa_icons/'.trim($Label).'.png';
							$curValue = 'data/robokassa_icons/'.trim($Label).'.png';
						}
						elseif( $Alias && isset( $hash_images[ trim($Alias) ] ) &&
								file_exists( DIR_IMAGE.'data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png' ) )
						{
							$curName = HTTP_CATALOG.'image/data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png' ;
							$curValue = 'data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png';
						}
						
						$currencies[ trim($Label) ] = $Name." (".$group_description.")"; 
								
						if( $curName  )
						{
							$all_images[ trim($Label) ]  = array( 
								"thumb" => $curName,
								"value" => $curValue
							);
						}
						else
						{
							$all_images[ trim($Label) ] = array(
										"thumb" => $this->model_tool_image->resize('no_image.png', 40, 40),
										"value" => 'no_image.png'
								);
						}
					}
					
					
					$all_images["robokassa"] = array(
										"thumb" => HTTP_CATALOG.'image/data/robokassa_icons/robokassa.png',
										"value" => 'data/robokassa_icons/robokassa.png'
								);
					
				}
				
				$this->data['currencies'] = $currencies;
			}
		}
		else
		{
			#$this->data['robokassa_methods'] = '';
		}
		
		$all_images_store = array();
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				$dat = $this->config->get('robokassa_shop_login_store');
				if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
				
				if( !empty( $dat[$store['store_id']] ) )
				{
					$dat = $this->config->get('config_admin_language_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					$interface_lang = $dat[$store['store_id']];
			
					if( $interface_lang != 'en' ) 
					$interface_lang = 'ru';
		
				
					$url = "https://auth.robokassa.ru/Merchant/WebService/Service.asmx/GetCurrencies?MerchantLogin=".$this->config->get('robokassa_shop_login')."&Language=".$interface_lang;
					
					if( $dat['robokassa_test_mode'] )
					$url .= '&IsTest=1'; 
				
					//$url = "http://auth.robokassa.ru/Webservice/Service.asmx/GetCurrencies?MerchantLogin=".$this->config->get('robokassa_shop_login')."&Language=ru";
					// http://merchant.roboxchange.com/WebService/Service.asmx/CalcOutSumm?MerchantLogin=obrands&IncCurrLabel=WMR&IncSum=210
					// http://merchant.roboxchange.com/Webservice/Service.asmx/GetCurrencies?MerchantLogin=obrands&Language=ru
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
			
			
					if( !preg_match("/<Code>0<\/Code>/i", $page) )
					{
						$this->data['robokassa_methods_store'][$store['store_id']] = '';
					}
					elseif($page)
					{
						$arr_value = array();
						$group_value = array();
						
						$ar = array();
				
						$groups = explode("<Group ", $page);
				
						for($i=1; $i<count($groups); $i++)
						{
							$ar = array();
							preg_match("/^Code=\"([^\"]+)\" Description=\"([^\"]+)\"/",
							$groups[$i], $ar);
					
							if( empty($ar) ) continue;
					
							$group_description = $ar[2];
					
							$ar = array();
							if( strstr($groups[$i], "Alias") )
							{
								preg_match_all("/(<Currency Label=\"([^\"]+)\" Alias=\"([^\"]+)\" Name=\"([^\"]+)\")/", 
											$groups[$i], $ar);
							}
							else
							{
								preg_match_all("/(<Currency Label=\"([^\"]+)\" Name=\"([^\"]+)\")/", 
											$groups[$i], $ar);
							}
					
							if( empty($ar) ) continue;
					
					
							for($e=0; $e<count($ar[2]); $e++)
							{
								$Alias = '';
								
								$Label = $ar[2][$e];
								if( empty($ar[4][$e]) )
								{
									$Name  = $ar[3][$e];
								}
								else
								{
									$Alias = $ar[3][$e];
									$Name = $ar[4][$e];
								}
								
								$currencies[ trim($Label) ] = $Name." (".$group_description.")"; 
								
								
								$curName = '';
								
								if( file_exists( DIR_IMAGE.'data/robokassa_icons/'.trim($Label).'.png' )  )
								{
									$curName = HTTP_CATALOG.'image/data/robokassa_icons/'.trim($Label).'.png';
									$curValue = 'data/robokassa_icons/'.trim($Label).'.png';
								}
								elseif( $Alias && isset( $hash_images[ trim($Alias) ] ) &&
										file_exists( DIR_IMAGE.'data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png' ) )
								{
									$curName = HTTP_CATALOG.'image/data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png' ;
									$curValue = 'data/robokassa_icons/'.$hash_images[ trim($Alias) ].'.png';
								}
						
								if( $curName  )
								{
									$all_images_store[$store['store_id']][ trim($Label) ]  =array( 
										"thumb" => $curName,
										"value" => $curValue
									);
								}
								else
								{
									$all_images_store[$store['store_id']][ trim($Label) ] = array(
												"thumb" => $this->model_tool_image->resize('no_image.png', 40, 40),
												"value" => 'no_image.png'
										);
								}
							}
					
							$all_images_store[$store['store_id']]["robokassa"] = array(
												"thumb" => HTTP_CATALOG.'image/data/robokassa_icons/robokassa.png',
												"value" => 'data/robokassa_icons/robokassa.png'
										);
							
						}
				
						$this->data['currencies_store'][$store['store_id']] = $currencies;
					}
				}
				else
				{
					$this->data['robokassa_methods_store'][$store['store_id']] = '';
				}
			}
		}	
		
		//---------
		
  		if (isset($this->error)) {
			$this->data['error_warning'] = $this->error;
		} else {
			$this->data['error_warning'] = '';
		}

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_payment'),
			'href'      => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('payment/robokassa', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => ' :: '
   		);
				
		$this->data['action'] = $this->url->link('payment/robokassa', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['callback'] = HTTP_CATALOG . 'index.php?route=payment/robokassa/callback';

		/* kin insert metka: a4 */
		
		$this->load->model('localisation/currency');
		$results = $this->model_localisation_currency->getCurrencies();
		
		if( !isset($results['RUB']) && !isset($results['RUR']) )
		{
			$this->error[] = $this->language->get('error_rub');
		}			
		
		$this->data['opencart_currencies'] = $results;
		
		$this->data['entry_currency'] = $this->language->get('entry_currency');
		$this->data['text_currency_notice'] = $this->language->get('text_currency_notice');
		
		$this->data['text_img_notice'] = $this->language->get('text_img_notice');
		
		//---------
		
		if (isset($this->request->post['robokassa_currency'])) {
			$this->data['robokassa_currency'] = $this->request->post['robokassa_currency'];
		} else {
			$this->data['robokassa_currency'] = $this->config->get('robokassa_currency');
		} 	
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_currency_store'][$store['store_id']])) {
					$this->data['robokassa_currency_store'][$store['store_id']] = $this->request->post['robokassa_currency_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_currency_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_currency_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 	
			}
		}
		//---------
		
		if (isset($this->request->post['robokassa_default_language'])) {
			$this->data['robokassa_default_language'] = $this->request->post['robokassa_default_language'];
		} else {
			$this->data['robokassa_default_language'] = $this->config->get('robokassa_default_language');
		} 
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_default_language_store'][$store['store_id']])) {
					$this->data['robokassa_default_language_store'][$store['store_id']] = $this->request->post['robokassa_default_language_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_default_language_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_default_language_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_order_status_id'])) {
			$this->data['robokassa_order_status_id'] = $this->request->post['robokassa_order_status_id'];
		} else {
			$this->data['robokassa_order_status_id'] = $this->config->get('robokassa_order_status_id');
		} 
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_order_status_id_store'][$store['store_id']])) {
					$this->data['robokassa_order_status_id_store'][$store['store_id']] = $this->request->post['robokassa_order_status_id_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_order_status_id_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_order_status_id_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		
		
		if (isset($this->request->post['robokassa_after_order_status_id'])) {
			$this->data['robokassa_after_order_status_id'] = $this->request->post['robokassa_after_order_status_id'];
		} else {
			$this->data['robokassa_after_order_status_id'] = $this->config->get('robokassa_after_order_status_id');
		} 
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_after_order_status_id_store'][$store['store_id']])) {
					$this->data['robokassa_after_order_status_id_store'][$store['store_id']] = $this->request->post['robokassa_after_order_status_id_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_after_order_status_id_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_after_order_status_id_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		
		
		
		//---------
		if (isset($this->request->post['robokassa_order_status_id2'])) {
			$this->data['robokassa_order_status_id2'] = $this->request->post['robokassa_order_status_id2'];
		} else {
			$this->data['robokassa_order_status_id2'] = $this->config->get('robokassa_order_status_id2');
		} 
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_order_status_id2_store'][$store['store_id']])) {
					$this->data['robokassa_order_status_id2_store'][$store['store_id']] = $this->request->post['robokassa_order_status_id2_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_order_status_id2_store'); 
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_order_status_id2_store'][$store['store_id']] = $dat[$store['store_id']];
				} 
			}
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_shop_login'])) {
			$this->data['robokassa_shop_login'] = $this->request->post['robokassa_shop_login'];
		} else {
			$this->data['robokassa_shop_login'] = $this->config->get('robokassa_shop_login');
		}
		
		if( $this->data['entry_no_robokass_methods'] )
			$this->data['entry_no_robokass_methods'] = str_replace("{login}", $this->data['robokassa_shop_login'], $this->data['entry_no_robokass_methods']);
		else
			$this->data['entry_no_robokass_methods'] = str_replace("ВАШ_ИДЕНТИФИКАТОР_МАГАЗИНА", $this->data['robokassa_shop_login'], $this->data['entry_no_robokass_methods']);
			
				
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_shop_login_store'][$store['store_id']])) {
					$this->data['robokassa_shop_login_store'][$store['store_id']] = $this->request->post['robokassa_shop_login_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_shop_login_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat); 
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_shop_login_store'][$store['store_id']] = $dat[$store['store_id']];
				}
			}
		}
		
		//---------
				
		if (isset($this->request->post['robokassa_confirm_notify'])) {
			$this->data['robokassa_confirm_notify'] = $this->request->post['robokassa_confirm_notify'];
		} else {
			$this->data['robokassa_confirm_notify'] = $this->config->get('robokassa_confirm_notify'); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_confirm_notify_store'][$store['store_id']])) {
					$this->data['robokassa_confirm_notify_store'][$store['store_id']] = $this->request->post['robokassa_confirm_notify_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_confirm_notify_store'); 
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_confirm_notify_store'][$store['store_id']] = $dat[$store['store_id']];
				}
			}
		}
		
		//---------
				
		if (isset($this->request->post['robokassa_confirm_comment'])) {
			$this->data['robokassa_confirm_comment'] = $this->request->post['robokassa_confirm_comment'];
		} elseif( $this->config->get('robokassa_confirm_comment') ) 
		{
			if( is_array($this->config->get('robokassa_confirm_comment')) )
			{
				$this->data['robokassa_confirm_comment'] = $this->config->get('robokassa_confirm_comment'); 
			}
			else
			{
				$this->data['robokassa_confirm_comment'] = unserialize($this->config->get('robokassa_confirm_comment')); 
			}
		} elseif( $this->config->get('robokassa_shop_login')=='' ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_confirm_comment'][$language['code']] = $Lang->get('text_confirm_comment_default');
			}
		} else {
			$this->data['robokassa_confirm_comment'] = array();
		}
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_confirm_comment_store'][$store['store_id']])) {
					$this->data['robokassa_confirm_comment_store'][$store['store_id']] = $this->request->post['robokassa_confirm_comment_store'][$store['store_id']];
				} 
				else
				{
					$dat = $this->config->get('robokassa_confirm_comment_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					
					if( !empty( $dat[$store['store_id']] ) ) 
					{
						if( is_array( $dat[$store['store_id']] ) )
						{
							$this->data['robokassa_confirm_comment_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
						else
						{
							$this->data['robokassa_confirm_comment_store'][$store['store_id']] = $dat[$store['store_id']]; 
						}
					} 
					else
					{
						$dat = $this->config->get('robokassa_shop_login_store');
						if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
						if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
						
						if( $dat[$store['store_id']] ) 
						{
							foreach($this->data['languages'] as $language)
							{
								$Lang = new Language( $language['directory'] );
								$Lang->load('payment/robokassa');
					
								$this->data['robokassa_confirm_comment_store'][$store['store_id']][$language['code']] = $Lang->get('text_confirm_comment_default');
							}
						} else {
							$this->data['robokassa_confirm_comment_store'][$store['store_id']] = array();
						}
					}
				}
			}
		}
		//---------
				
		
		if (isset($this->request->post['robokassa_log'])) {
			$this->data['robokassa_log'] = $this->request->post['robokassa_log'];
		} else {
			$this->data['robokassa_log'] = $this->config->get('robokassa_log'); 
		} 
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_log_store'][$store['store_id']])) {
					$this->data['robokassa_log_store'][$store['store_id']] = $this->request->post['robokassa_log_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_log_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_log_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		//---------
				
		
		if (isset($this->request->post['robokassa_preorder_status_id'])) {
			$this->data['robokassa_preorder_status_id'] = $this->request->post['robokassa_preorder_status_id'];
		} else {
			$this->data['robokassa_preorder_status_id'] = $this->config->get('robokassa_preorder_status_id'); 
		} 
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_preorder_status_id_store'][$store['store_id']])) {
					$this->data['robokassa_preorder_status_id_store'][$store['store_id']] = $this->request->post['robokassa_preorder_status_id_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_preorder_status_id_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_preorder_status_id_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		
		if (isset($this->request->post['robokassa_premod_preorder_status_id'])) {
			$this->data['robokassa_premod_preorder_status_id'] = $this->request->post['robokassa_premod_preorder_status_id'];
		} else {
			$this->data['robokassa_premod_preorder_status_id'] = $this->config->get('robokassa_premod_preorder_status_id'); 
		} 
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_premod_preorder_status_id_store'][$store['store_id']])) {
					$this->data['robokassa_premod_preorder_status_id_store'][$store['store_id']] = $this->request->post['robokassa_premod_preorder_status_id_store'][$store['store_id']];
				} else {
					$dat = $this->config->get('robokassa_premod_preorder_status_id_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_premod_preorder_status_id_store'][$store['store_id']] = $dat[$store['store_id']]; 
				} 
			}
		}
		//---------
				
		$data['robokassa_methods'] = array();
		$robokassa_methods = array();
		
		if (isset($this->request->post['robokassa_methods'])) {
			$robokassa_methods = $this->request->post['robokassa_methods'];
		} elseif( $this->config->has('robokassa_methods') ) {
			$robokassa_methods = unserialize( $this->config->get('robokassa_methods') ); 
		}
		
		$robokassa_methods_store = array();
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_methods_store'][$store['store_id']])) {
					$robokassa_methods_store[$store['store_id']] = $this->request->post['robokassa_methods_store'][$store['store_id']];
				} elseif( $this->config->has('robokassa_methods_store') ) {
					$dat = $this->config->get('robokassa_methods_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = array();
					
					$robokassa_methods_store[$store['store_id']] = $dat[$store['store_id']]; 
				}
			}
		}
		//---------
				
		$is_ru = 0;
		foreach($this->data['languages'] as $lang)
		{
			if( $lang['code']=='ru' )
			{
				$is_ru = 1;
			}
		}
		
		$this->data['robokassa_methods'] = array();
		if($robokassa_methods)
		{
			foreach( $robokassa_methods as $value )
			{
				if( !is_array($value) )
				{
					$i = 0;
					foreach($this->data['languages'] as $lang_id=>$val)
					{
						$i++;
					
						if( ($is_ru && $val['code']=='ru' ) || 
						(!$is_ru && $i==1 ) )
						{
							$method[$val['code']] = $value;		
						}
						else
						{
							$method[$val['code']] = '';
						}
					}
				}
				else
				{
					$method = $value;
				}
			
				$this->data['robokassa_methods'][] = $method;
			}
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if( !empty( $robokassa_methods_store[ $store['store_id'] ] ) )
				{
					foreach( $robokassa_methods_store[ $store['store_id'] ] as $value )
					{
						if( !is_array($value) )
						{
							$i = 0;
							foreach($this->data['languages'] as $lang_id=>$val)
							{
								$i++;
								
								if( ($is_ru && $val['code']=='ru' ) || 
								(!$is_ru && $i==1 ) )
								{
									$method[$val['code']] = $value;		
								}
								else
								{
									$method[$val['code']] = '';
								}
							}
						}
						else
						{
							$method = $value;
						}
						
						$this->data['robokassa_methods_store'][ $store['store_id'] ][] = $method;
					}
				}
			}
		}
		
		//---------
				
		
		if (isset($this->request->post['robokassa_currencies'])) {
			$this->data['robokassa_currencies'] = $this->request->post['robokassa_currencies'];
		} else {
			$this->data['robokassa_currencies'] = unserialize( $this->config->get('robokassa_currencies') ); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_currencies_store'][ $store['store_id'] ])) {
					$this->data['robokassa_currencies_store'][ $store['store_id'] ] = $this->request->post['robokassa_currencies_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_currencies_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = array();
					$this->data['robokassa_currencies_store'][ $store['store_id'] ] = $dat[$store['store_id']]; 
				}
			}
		}
		
		//---------
		
		
		if (isset($this->request->post['robokassa_minprice'])) {
			$this->data['robokassa_minprice'] = $this->request->post['robokassa_minprice'];
		} else {
			$this->data['robokassa_minprice'] = unserialize( $this->config->get('robokassa_minprice') ); 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_minprice_store'][ $store['store_id'] ])) {
					$this->data['robokassa_minprice_store'][ $store['store_id'] ] = $this->request->post['robokassa_minprice_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_minprice_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = array();
					$this->data['robokassa_minprice_store'][ $store['store_id'] ] = $dat[$store['store_id']]; 
				}
			}
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_maxprice'])) {
			$this->data['robokassa_maxprice'] = $this->request->post['robokassa_maxprice'];
		} else {
			$this->data['robokassa_maxprice'] = unserialize( $this->config->get('robokassa_maxprice') ); 
		}
		

		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_maxprice_store'][ $store['store_id'] ])) {
					$this->data['robokassa_maxprice_store'][ $store['store_id'] ] = $this->request->post['robokassa_maxprice_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_maxprice_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = array();
					$this->data['robokassa_maxprice_store'][ $store['store_id'] ] = $dat[$store['store_id']]; 
				}
			}
		}
				
		//---------
		
		
		if (isset($this->request->post['robokassa_images'])) {
			$robokassa_images = $this->request->post['robokassa_images'];
		} elseif( $this->config->get('robokassa_images') ) {
			$robokassa_images = unserialize( $this->config->get('robokassa_images') ); 
		} else {
			$robokassa_images = array();
			$this->data['robokassa_images'] = array();
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_images_store'][ $store['store_id'] ])) {
					$robokassa_images_store[ $store['store_id'] ] = $this->request->post['robokassa_images_store'][ $store['store_id'] ];
				} elseif( $this->config->get('robokassa_images_store') ) 
				{
					$dat = $this->config->get('robokassa_images_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = array();
					$robokassa_images_store[ $store['store_id'] ] = $dat[ $store['store_id'] ]; 
				} else {
					$robokassa_images_store[ $store['store_id'] ] = array();
					$this->data['robokassa_images_store'][ $store['store_id'] ] = array();
				}
			}
		}
		
		//---------
		
		
		$this->data['all_images'] = $all_images;
		
		for($i=0; $i<20; $i++  )
		{
		
			if( empty($robokassa_images[$i]) )
			{
				if( !empty($this->data['robokassa_currencies'][$i]) )
				{
					if( 
						isset( $all_images[$this->data['robokassa_currencies'][$i]]['thumb'] ) && 
						isset( $all_images[$this->data['robokassa_currencies'][$i]]['value'] )
					)
					{
						$thumb = $all_images[$this->data['robokassa_currencies'][$i]]['thumb'];
						$value = $all_images[$this->data['robokassa_currencies'][$i]]['value']; 
					}
					else
					{
						$thumb = $this->model_tool_image->resize('no_image.jpg', 40, 40);
						$value = 'no_image.jpg';
					}
				}
				else
				{
					$thumb = $this->model_tool_image->resize('no_image.jpg', 40, 40);
					$value = 'no_image.jpg';
				}
			}
			else
			{
				$thumb = HTTP_CATALOG.'image/'.$robokassa_images[$i];
				$value = $robokassa_images[$i];
			}
			
			if( empty($this->data['robokassa_currencies'][$i]) )
			$this->data['robokassa_currencies'][$i] = '';
			
			
			$this->data['robokassa_images'][$i] = array(
					"thumb" => $thumb,
					"value" => $value
				);
		}
		
		$this->data['all_images_store'] = $all_images_store;
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				for($i=0; $i<20; $i++  )
				{
					//echo $robokassa_images_store[ $store['store_id'] ]."---<br>";
					
					
					if( empty($robokassa_images_store[ $store['store_id'] ][$i]) )
					{
						if( !empty($this->data['robokassa_currencies_store'][ $store['store_id'] ][$i]) )
						{
							$thumb = $all_images_store[ $store['store_id'] ][$this->data['robokassa_currencies_store'][ $store['store_id'] ][$i]  ]['thumb'];
							$value = $all_images_store[ $store['store_id'] ][$this->data['robokassa_currencies_store'][ $store['store_id'] ][$i]  ]['value']; 
						}
						else
						{
							$thumb = $this->model_tool_image->resize('no_image.jpg', 40, 40);
							$value = 'no_image.jpg';
						}
					}
					else
					{
						$thumb = HTTP_CATALOG.'image/'.$robokassa_images_store[ $store['store_id'] ][$i];
						$value = $robokassa_images_store[ $store['store_id'] ][$i];
					}
			
					if( empty($this->data['robokassa_currencies_store'][ $store['store_id'] ][$i]) )
					$this->data['robokassa_currencies_store'][ $store['store_id'] ][$i] = '';
			
			
					$this->data['robokassa_images_store'][ $store['store_id'] ][$i] = array(
							"thumb" => $thumb,
							"value" => $value
						);
				}
			}
		}
		//---------
		
		
		
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 40, 40);
		
		/* start update: a1 */		
		if (  $this->config->get('robokassa_password1')  ) {
			$this->data['robokassa_password1'] = 1; 
		}
		else
		{
			$this->data['robokassa_password1'] = 0; 
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{		
				$dat = $this->config->get('robokassa_password1_store');
				if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
				if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
				
				if( !empty( $dat[ $store['store_id'] ] ) ) 
				{
					$this->data['robokassa_password1_store'][ $store['store_id'] ] = 1; 
				}
				else
				{
					$this->data['robokassa_password1_store'][ $store['store_id'] ] = 0; 
				}
			}
		}
		//---------
		
		$this->data['token'] = $this->session->data['token'];
		
		if (  $this->config->get('robokassa_password2')  ) {
			$this->data['robokassa_password2'] = 1; 
		} 	
		else
		{
			$this->data['robokassa_password2'] = 0; 
		}	
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{	
				$dat = $this->config->get('robokassa_password2_store');
				if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
				if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
				
				if ( !empty( $dat[ $store['store_id'] ] ) ) {
					$this->data['robokassa_password2_store'][ $store['store_id'] ] = 1; 
				} 	
				else
				{
					$this->data['robokassa_password2_store'][ $store['store_id'] ] = 0; 
				}	
			}
		}
		
		//---------
		
		
		if (isset($this->request->post['robokassa_icons'])) {
			$this->data['robokassa_icons'] = $this->request->post['robokassa_icons'];
		} else {
			$this->data['robokassa_icons'] = $this->config->get('robokassa_icons'); 
		} 		
		
		/* kin insert metka: d1 */
		if (isset($this->request->post['robokassa_desc'])) {
			$this->data['robokassa_desc'] = $this->request->post['robokassa_desc'];
		} elseif( $this->config->get('robokassa_desc') ) 
		{
			if( is_array($this->config->get('robokassa_desc')) )
			{
				$this->data['robokassa_desc'] = $this->config->get('robokassa_desc'); 
			}
			else
			{
				$this->data['robokassa_desc'] = unserialize($this->config->get('robokassa_desc')); 
			}
		} elseif( !$this->config->has('robokassa_desc') ) {
			
			foreach($this->data['languages'] as $language)
			{
				$Lang = new Language( $language['directory'] );
				$Lang->load('payment/robokassa');
				
				$this->data['robokassa_desc'][$language['code']] = $Lang->get('entry_robokassa_desc_default');
			}
		} else {
			$this->data['robokassa_desc'] = array();
		}
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{
				if (isset($this->request->post['robokassa_desc_store'][$store['store_id']])) {
					$this->data['robokassa_desc_store'][$store['store_id']] = $this->request->post['robokassa_desc_store'][$store['store_id']];
				} 
				elseif( $this->config->get('robokassa_desc_store') ) 
				{
					$dat = $this->config->get('robokassa_desc_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					
					if( empty($dat[$store['store_id']]) )
					{
						foreach($this->data['languages'] as $language)
						{
							$Lang = new Language( $language['directory'] );
							$Lang->load('payment/robokassa');
				
							$this->data['robokassa_desc_store'][$store['store_id']][$language['code']] = $Lang->get('entry_robokassa_desc_default');
						}
					}
					else
					{
						if( is_array($dat[$store['store_id']]) )
						{
							$this->data['robokassa_desc_store'][$store['store_id']] = $dat[$store['store_id']];
						}
						else
						{
							$this->data['robokassa_desc_store'][$store['store_id']] = $dat[$store['store_id']];
						}
					}
				} 
				elseif( !$this->config->has('robokassa_desc_store') ) 
				{
					foreach($this->data['languages'] as $language)
					{
						$Lang = new Language( $language['directory'] );
						$Lang->load('payment/robokassa');
				
						$this->data['robokassa_desc_store'][$store['store_id']][$language['code']] = $Lang->get('entry_robokassa_desc_default');
					}
				} 
				else 
				{
					$this->data['robokassa_desc_store'][$store['store_id']] = array();
				}
			}
		}
		
		/* end kin metka: d1 */
		
		
		
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{	
				if (isset($this->request->post['robokassa_icons_store'][ $store['store_id'] ])) {
					$this->data['robokassa_icons_store'][ $store['store_id'] ] = $this->request->post['robokassa_icons_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_icons_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_icons_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ]; 
				} 		
			}
		}
		
		//---------
		
		
		$this->load->model('localisation/order_status');
		
		$this->data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
		
		if (isset($this->request->post['robokassa_geo_zone_id'])) {
			$this->data['robokassa_geo_zone_id'] = $this->request->post['robokassa_geo_zone_id'];
		} else {
			$this->data['robokassa_geo_zone_id'] = $this->config->get('robokassa_geo_zone_id'); 
		} 
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{	
				if (isset($this->request->post['robokassa_geo_zone_id_store'][ $store['store_id'] ])) {
					$this->data['robokassa_geo_zone_id_store'][ $store['store_id'] ] = $this->request->post['robokassa_geo_zone_id_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_geo_zone_id_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_geo_zone_id_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ]; 
				} 
			}
		}
		
		//---------
		
		$this->load->model('localisation/geo_zone');
										
		$this->data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
		
		if (isset($this->request->post['robokassa_status'])) {
			$this->data['robokassa_status'] = $this->request->post['robokassa_status'];
		} else {
			$this->data['robokassa_status'] = $this->config->get('robokassa_status');
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{	
				if (isset($this->request->post['robokassa_status_store'][ $store['store_id'] ])) {
					$this->data['robokassa_status_store'][ $store['store_id'] ] = $this->request->post['robokassa_status_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_status_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_status_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ]; 
				}
			}
		}
		
		//---------
		
		if (isset($this->request->post['robokassa_sort_order'])) {
			$this->data['robokassa_sort_order'] = $this->request->post['robokassa_sort_order'];
		} else {
			$this->data['robokassa_sort_order'] = $this->config->get('robokassa_sort_order');
		}
		
		if( !empty($stores) )
		{
			foreach($stores as $store)
			{	
				if (isset($this->request->post['robokassa_sort_order_store'][ $store['store_id'] ])) {
					$this->data['robokassa_sort_order_store'][ $store['store_id'] ] = $this->request->post['robokassa_sort_order_store'][ $store['store_id'] ];
				} else {
					$dat = $this->config->get('robokassa_sort_order_store');
					if( $this->is_serialized( $dat ) ) $dat = unserialize($dat);
					if( empty($dat[$store['store_id']]) ) $dat[$store['store_id']] = false;
					$this->data['robokassa_sort_order_store'][ $store['store_id'] ] = $dat[ $store['store_id'] ]; 
				}
			}
		}
		//-----------------------------------
		
		
		$this->template = 'payment/robokassa.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
				
		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'payment/robokassa')) {
			$this->error[] = $this->language->get('error_permission');
		}
		
		if (!$this->request->post['robokassa_p1'] && !$this->config->get('robokassa_password1') ) 
		{
			$this->error[] = $this->language->get('error_robokassa_password1');
		}
		
		if (!$this->request->post['robokassa_p2'] && !$this->config->get('robokassa_password2') ) 
		{
			$this->error[] = $this->language->get('error_robokassa_password2');
		}
		
		if( !empty($this->request->post['robokassa_password1']) && 
			!preg_match("/^[a-zA-Z0-9]+$/", $this->request->post['robokassa_password1']) )
		{
			#$this->error[] = $this->language->get('error_robokassa_password_symbols');
		}
		
		if (!$this->request->post['robokassa_shop_login']) {
			$this->error[] = $this->language->get('error_robokassa_shop_login');
		}
		
		if( !empty($this->request->post['robokassa_shop_login']) )
		$this->request->post['robokassa_shop_login'] = trim($this->request->post['robokassa_shop_login']);
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
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
	
	
	public function getlink()
	{
		$order_id = $this->request->get['InvId'];
		$STORE_ID = $this->request->get['StoreId'];
		
		$RUB = $this->getRub();
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
			
			/* start metka-kkt2 */
			$CONFIG['robokassa_kkt_mode'] = $this->config->get('robokassa_kkt_mode_store');
			$CONFIG['robokassa_kkt_sno'] = $this->config->get('robokassa_kkt_sno_store');
			$CONFIG['robokassa_kkt_tax'] = $this->config->get('robokassa_kkt_tax_store');
			/* end metka-kkt2 */
			
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
			
			/* start metka-kkt2 */
			$CONFIG['robokassa_kkt_mode'] = $this->config->get('robokassa_kkt_mode');
			$CONFIG['robokassa_kkt_sno'] = $this->config->get('robokassa_kkt_sno');
			$CONFIG['robokassa_kkt_tax'] = $this->config->get('robokassa_kkt_tax');
			/* end metka-kkt2 */
			
			foreach($CONFIG as $key=>$value)
			{
				if( $this->is_serialized($value) )
				$value = unserialize($value);
				
				$CONFIG[$key] = $value;
			}
		}
		
		//------------------------------------
		
		$this->load->model('sale/order');
		$order_info = $this->model_sale_order->getOrder($order_id);
		
		
		$PARAMS = array();
		
		$PARAMS['MrchLogin'] = $CONFIG['robokassa_shop_login'];
		
		if( $CONFIG['robokassa_test_mode'] )
		$PARAMS['IsTest'] = 1; 
	
		//----
		
		$in_curr = $this->request->get['IncCurrLabel'];
		
		$PARAMS['IncCurrLabel'] =  $in_curr;
		
		//-----
		
		$PARAMS['Culture'] =  $this->request->get['Culture'];
		
		//----		
		
		$out_summ = !empty($this->request->get['OutSum']) ? 
					$this->request->get['OutSum'] : $order_info['total'];
		
		if( $this->config->get('config_currency')!=$CONFIG['robokassa_currency'] ) 
		{
			$out_summ = $this->currency->convert($out_summ, $this->config->get('config_currency'), $CONFIG['robokassa_currency']);
		}
		
		
		
		if( $CONFIG['robokassa_commission'] == 'shop' && !$CONFIG['robokassa_test_mode'] )
		{
			$url = 'https://auth.robokassa.ru/Merchant/WebService/Service.asmx/CalcOutSumm?MerchantLogin='.$PARAMS['MrchLogin'].
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
		
		/* start 1112 */
		$out_summ = $this->getOkrugl( $out_summ );
		/* end 1112 */
		
		$out_summ = number_format( $out_summ, 2, '.', '' );
		$PARAMS['OutSum'] = $out_summ;
		
		//----
		
		$shp_item = "2";
		$PARAMS['Shp_item'] = $shp_item;
		
		//----		
		$PARAMS['Email'] = $this->request->get['Email'];
		
		//-----
		
		$inv_id =  $order_id;
		$PARAMS['InvId'] = $inv_id;
		
		//-----
		
		
		$this->language->load('payment/robokassa');
		
		if( empty($order_info) ) exit("ERRORorder");
		
		$name = $order_info['firstname'];
	
		if( !empty($order_info['lastname']) )
		$name .= ' '.$order_info['lastname'];
	
		$Desc = $CONFIG['robokassa_desc'];
		$Desc = str_replace("{number}", $inv_id, $Desc);
		$Desc = str_replace("{siteurl}", $order_info['store_url'], $Desc);
		$Desc = str_replace("{name}", $name, $Desc);
		
		
		$PARAMS['Desc'] = $Desc;
		
		
		//-----
		
		$mrh_pass1 = $CONFIG['robokassa_password1'];
		
		if( $CONFIG['robokassa_kkt_mode'] )
		{
			$items = $this->getReceiptItems($order_id, $RUB, $out_summ, $CONFIG);
			
			$PARAMS['Receipt'] = urlencode( json_encode( array(
				"sno" => $CONFIG['robokassa_kkt_sno'],
				"items" => $items,
			) ) );
			
			$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:".$PARAMS['Receipt'].":$mrh_pass1:Shp_item=$shp_item");
		}
		else
		{
			if( $RUB != $CONFIG['robokassa_currency'] ) 
			{
				$PARAMS['OutSumCurrency'] = $CONFIG['robokassa_currency'];
				$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:".$PARAMS['OutSumCurrency'].":$mrh_pass1:Shp_item=$shp_item");
			}
			else
			{
				$PARAMS['SignatureValue'] = md5($PARAMS['MrchLogin'].":$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
			}
		}
		
		$this->load->model('localisation/robokassa');
		$link = $this->model_localisation_robokassa->addPayment($order_id, array(
			"service" => "robokassa",
			"total" => $PARAMS['OutSum'], 
			"comment" => $PARAMS['Desc'],
			"params" => $PARAMS,
			"url" => "https://auth.robokassa.ru/Merchant/Index.aspx"
		));
		
		exit($link);			
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
	
	private function getShippingTotalData($order_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_total 
		WHERE order_id = '".(int)$order_id."' AND code = 'shipping'");
		
		return $query->row;
	}
	
	private function getOrderProducts($order_id)
	{
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product
		WHERE order_id = '".(int)$order_id."'");
		
		return $query->rows;
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
		2, '.', '' );
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
	
	
	private function getProductPaymentObject( $product, $total_sum )
	{
		$IS_DEBUG = 0;
			
		if( $this->config->get('robokassa_kkt_payment_object') != 'different' )
		{
			if( $IS_DEBUG ) $this->log->write( "m1(".$product['product_id'].")<br>");
			return $this->config->get('robokassa_kkt_payment_object');
		}
		
		$robokassa_kkt_payment_objects = $this->config->get('robokassa_kkt_payment_objects');
		
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
	
	public function getReceiptItems($order_id, $RUB, $out_summ, $CONFIG)
	{
		mb_internal_encoding("UTF-8");
		$shipping_total = 0;
		
		$shipping = $this->getShippingTotalData($order_id);
		
		// ----------------
		
		if( $shipping )
		{
			$shipping_total = $this->customFormat( $shipping['value'], $RUB );
		}
		
		// ----
		
		$products_total = 0;
		
		$products = $this->getOrderProducts($order_id);
		
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
							"payment_object" => $this->getProductPaymentObject($product, $this->customFormat( $product['total'], $RUB ))
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
							"payment_object" => 'service'
							/* end 1112 */
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
				
			}
			
			// ==========
			
		}
		
		return $items;
	}
	/* end 2111 */
	
	public function image() {
		$this->load->model('tool/image');
		
		if (isset($this->request->get['image'])) {
			$this->response->setOutput(HTTP_CATALOG.'image/'.$this->request->get['image']);
		}
	}
	
	function is_serialized( $data ) {
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
	
	/* start 1611 */
	public function getOrderSum()
	{
		$json = array();
		if( empty($this->request->get['order_id']) ) 
		exit( json_encode( array('error' => "order_id") ) );
		
	
		$order_id = $this->request->get['order_id'];
		
		$this->load->model('sale/order');
		$order_info = $this->model_sale_order->getOrder($order_id);
		
		if( empty($order_info) ) 
		exit( json_encode( array('error' => "order") ) );
		
		$json = array(
			"sum" => number_format($order_info['total'], 2, '.', ''),
			"email" => $order_info['email'],
		);
		
		exit( json_encode($json) );
	}
	/* end 1611 */
	
	
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
}
?>