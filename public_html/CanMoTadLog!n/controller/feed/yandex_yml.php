<?php
class ControllerFeedYandexYml extends Controller {
	protected $error = array();
	
	protected $allowedCurrencies = array('RUR', 'RUB', 'USD', 'EUR', 'BYR', 'BYN', 'KZT', 'UAH');
	
	protected $CONFIG_PREFIX = 'yandex_yml_';
	
	protected function preparePostData() {
		if (isset($this->request->post['yandex_yml_in_stock'])) {
			$this->request->post['yandex_yml_in_stock'] = implode(',', array_map('intval', $this->request->post['yandex_yml_in_stock']));
		}
		if (isset($this->request->post['yandex_yml_out_of_stock'])) {
			$this->request->post['yandex_yml_out_of_stock'] = implode(',', array_map('intval', $this->request->post['yandex_yml_out_of_stock']));
		}
	
		if (isset($this->request->post['yandex_yml_categories'])) {
			$this->request->post['yandex_yml_categories'] = implode(',', array_map('intval', $this->request->post['yandex_yml_categories']));
		}
		if (isset($this->request->post['yandex_yml_manufacturers'])) {
			$this->request->post['yandex_yml_manufacturers'] = implode(',', $this->request->post['yandex_yml_manufacturers']);
		}
		if (isset($this->request->post['yandex_yml_categ_delivery_cost'])) {
			$this->request->post['yandex_yml_categ_delivery_cost'] = serialize(array_filter($this->request->post['yandex_yml_categ_delivery_cost'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_manuf_delivery_cost'])) {
			$this->request->post['yandex_yml_manuf_delivery_cost'] = serialize(array_filter($this->request->post['yandex_yml_manuf_delivery_cost'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_categ_delivery_days'])) {
			$this->request->post['yandex_yml_categ_delivery_days'] = serialize(array_filter($this->request->post['yandex_yml_categ_delivery_days'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_manuf_delivery_days'])) {
			$this->request->post['yandex_yml_manuf_delivery_days'] = serialize(array_filter($this->request->post['yandex_yml_manuf_delivery_days'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_categ_cpa'])) {
			$this->request->post['yandex_yml_categ_cpa'] = serialize($this->request->post['yandex_yml_categ_cpa']);
		}
		
		if (isset($this->request->post['yandex_yml_manuf_cpa'])) {
			$this->request->post['yandex_yml_manuf_cpa'] = serialize($this->request->post['yandex_yml_manuf_cpa']);
		}
		
		if (isset($this->request->post['yandex_yml_categ_fee'])) {
			$this->request->post['yandex_yml_categ_fee'] = serialize(array_filter($this->request->post['yandex_yml_categ_fee'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_manuf_fee'])) {
			$this->request->post['yandex_yml_manuf_fee'] = serialize(array_filter($this->request->post['yandex_yml_manuf_fee'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_categ_age_18'])) {
			$this->request->post['yandex_yml_categ_age_18'] = serialize($this->request->post['yandex_yml_categ_age_18']);
		}
		
		if (isset($this->request->post['yandex_yml_manuf_age_18'])) {
			$this->request->post['yandex_yml_manuf_age_18'] = serialize($this->request->post['yandex_yml_manuf_age_18']);
		}
		
		if (isset($this->request->post['yandex_yml_categ_sales_notes'])) {
			$this->request->post['yandex_yml_categ_sales_notes'] = serialize(array_filter($this->request->post['yandex_yml_categ_sales_notes'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_manuf_sales_notes'])) {
			$this->request->post['yandex_yml_manuf_sales_notes'] = serialize(array_filter($this->request->post['yandex_yml_manuf_sales_notes'], 'strlen'));
		}
		
		if (isset($this->request->post['yandex_yml_blacklist'])) {
			$this->request->post['yandex_yml_blacklist'] = implode(',', $this->request->post['yandex_yml_blacklist']);
		}
		if (isset($this->request->post['yandex_yml_pricefrom'])) {
			$this->request->post['yandex_yml_pricefrom'] = floatval($this->request->post['yandex_yml_pricefrom']);
		}
		if (isset($this->request->post['yandex_yml_priceto'])) {
			$this->request->post['yandex_yml_priceto'] = $this->request->post['yandex_yml_priceto'];
		}
		if (isset($this->request->post['yandex_yml_attributes'])) {
			$this->request->post['yandex_yml_attributes'] = implode(',', $this->request->post['yandex_yml_attributes']);
		}
		if (isset($this->request->post['yandex_yml_color_options'])) {
			$this->request->post['yandex_yml_color_options'] = implode(',', $this->request->post['yandex_yml_color_options']);
		}
		if (isset($this->request->post['yandex_yml_size_options'])) {
			$this->request->post['yandex_yml_size_options'] = implode(',', $this->request->post['yandex_yml_size_options']);
		}
		if (isset($this->request->post['yandex_yml_size_units'])) {
			$this->request->post['yandex_yml_size_units'] = serialize($this->request->post['yandex_yml_size_units']);
		}
	}

	protected function setLanguageData() {
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
			'separator' => FALSE
		);

		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_feed'),
			'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('feed/yandex_yml', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
			'separator' => ' :: '
		);

		$this->data['CONFIG_PREFIX'] = $this->CONFIG_PREFIX;
		
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_available'] = $this->language->get('tab_available');
		$this->data['tab_categories'] = $this->language->get('tab_categories');
		$this->data['tab_attributes'] = $this->language->get('tab_attributes');
		$this->data['tab_tailor'] = $this->language->get('tab_tailor');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_select_all'] = $this->language->get('text_select_all');
		$this->data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$this->data['text_blacklist'] = $this->language->get('text_blacklist');
		$this->data['text_whitelist'] = $this->language->get('text_whitelist');

		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_token'] = $this->language->get('entry_token');
		$this->data['entry_data_feed'] = $this->language->get('entry_data_feed');
		//$this->data['entry_shopname'] = $this->language->get('entry_shopname');
		$this->data['entry_ocstore'] = $this->language->get('entry_ocstore');
		$this->data['entry_company'] = $this->language->get('entry_company');
		$this->data['entry_ocstore'] = $this->language->get('entry_ocstore');
		$this->data['entry_datamodel'] = $this->language->get('entry_datamodel');
		
		$this->data['entry_name_field'] = $this->language->get('entry_name_field');
		$this->data['entry_model_field'] = $this->language->get('entry_model_field');
		$this->data['entry_vendorcode_field'] = $this->language->get('entry_vendorcode_field');
		$this->data['entry_typeprefix_field'] = $this->language->get('entry_typeprefix_field');
		$this->data['entry_barcode_field'] = $this->language->get('entry_barcode_field');
		$this->data['entry_keywords_field'] = $this->language->get('entry_keywords_field');
		$this->data['entry_description_field'] = $this->language->get('entry_description_field');
		$this->data['entry_dont_export'] = $this->language->get('entry_dont_export');
        
		$this->data['entry_export_tags'] = $this->language->get('entry_export_tags');
		$this->data['entry_utm_label'] = $this->language->get('entry_utm_label');
		
		$this->data['datamodels'] = $this->language->get('datamodels');
		$this->data['entry_pickup'] = $this->language->get('entry_pickup');
		$this->data['entry_delivery_cost'] = $this->language->get('entry_delivery_cost');
		$this->data['entry_delivery_days'] = $this->language->get('entry_delivery_days');
		$this->data['entry_delivery_before'] = $this->language->get('entry_delivery_before');
		$this->data['entry_local_delivery'] = $this->language->get('entry_local_delivery');
		$this->data['entry_outlets'] = $this->language->get('entry_outlets');
		$this->data['entry_sales_notes'] = $this->language->get('entry_sales_notes');
		$this->data['entry_age_18'] = $this->language->get('entry_age_18');
		
		$this->data['entry_currency'] = $this->language->get('entry_currency');
		$this->data['entry_oldprice'] = $this->language->get('entry_oldprice');
		$this->data['entry_changeprice'] = $this->language->get('entry_changeprice');
		$this->data['entry_groupprice'] = $this->language->get('entry_groupprice');
		
		$this->data['entry_unavailable'] = $this->language->get('entry_unavailable');
		$this->data['entry_in_stock'] = $this->language->get('entry_in_stock');
		$this->data['entry_out_of_stock'] = $this->language->get('entry_out_of_stock');

		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_numpictures'] = $this->language->get('entry_numpictures');
		$this->data['entry_option_image'] = $this->language->get('entry_option_image');
		$this->data['entry_option_image_pro'] = $this->language->get('entry_option_image_pro');
		$this->data['entry_cpa'] = $this->language->get('entry_cpa');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		
		$this->data['entry_cron_run'] = $this->language->get('entry_cron_run');
		$this->data['entry_export_url'] = $this->language->get('entry_export_url');
		
		//++++ Для вкладки Что экспортировать ++++
		$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_manufacturers'] = $this->language->get('entry_manufacturers');
		$this->data['entry_blacklist_type'] = $this->language->get('entry_blacklist_type');
		$this->data['entry_blacklist'] = $this->language->get('entry_blacklist');
		$this->data['entry_whitelist'] = $this->language->get('entry_whitelist');
		$this->data['entry_image_mandatory'] = $this->language->get('entry_image_mandatory');
		
		$this->data['entry_pricefrom'] = $this->language->get('entry_pricefrom');
		$this->data['entry_priceto'] = $this->language->get('entry_priceto');

		//++++ Для вкладки аттрибутов ++++
		$this->data['tab_attributes_description'] = str_replace('%attr_url%', $this->url->link('catalog/attribute', 'token=' . $this->session->data['token'], 'SSL'), $this->language->get('tab_attributes_description'));
		$this->data['entry_attributes'] = $this->language->get('entry_attributes');
		$this->data['entry_adult'] = $this->language->get('entry_adult');
		$this->data['entry_all_adult'] = $this->language->get('entry_all_adult');
		$this->data['entry_manufacturer_warranty'] = $this->language->get('entry_manufacturer_warranty');
		$this->data['entry_all_manufacturer_warranty'] = $this->language->get('entry_all_manufacturer_warranty');
		$this->data['entry_country_of_origin'] = $this->language->get('entry_country_of_origin');
		$this->data['entry_product_rel'] = $this->language->get('entry_product_rel');
		$this->data['entry_product_accessory'] = $this->language->get('entry_product_accessory');

		//++++ Для магазинов одежды ++++
		$this->data['entry_color_option'] = $this->language->get('entry_color_option');
		$this->data['entry_size_option'] = $this->language->get('entry_size_option');
		$this->data['entry_size_unit'] = $this->language->get('entry_size_unit');
		$this->data['entry_optioned_name'] = $this->language->get('entry_optioned_name');
		$this->data['optioned_name_no'] = $this->language->get('optioned_name_no');
		$this->data['optioned_name_short'] = $this->language->get('optioned_name_short');
		$this->data['optioned_name_long'] = $this->language->get('optioned_name_long');
		
		$this->data['size_units_orig'] = array(
			'RU' => 'Россия (СНГ)',
			'EU' => 'Европа',
			'UK' => 'Великобритания',
			'US' => 'США',
			'INT' => 'Международная');
		$this->data['size_units_type'] = array(
			'INCH' => 'Дюймы',
			'Height' => 'Рост в сантиметрах',
			'Months' => 'Возраст в месяцах',
			'Years' => 'Возраст в годах',
			'Round' => 'Окружность в сантиметрах');
			
		$this->data['oc_fields'] = array(
			'name' => 'Название товара',
			'model' => 'Модель',
			'sku' => 'Артикул (SKU, код производителя)',
			'upc' => 'UPC',
			'meta_description' => 'Мета-тег &quot;Описание&quot;',
			//'{model} {option} {sku}' => 'Модель + Опция + SKU'
		);
		$this->data['oc_desc_fields'] = array(
			'description' => 'Описание',
			'meta_description' => 'Мета-тег &quot;Описание&quot;',
			'attr_vs_description' => 'Брать из атрибутов'
		);
		if (version_compare(VERSION, '1.5.3.1') >= 0) {
			$this->data['oc_fields']['meta_keyword'] = 'Мета-тег Keywords';
			$this->data['oc_fields']['seo_h1'] = 'HTML-тег H1';
			$this->data['oc_fields']['seo_title'] = 'HTML-тег Title';
		}
		if (version_compare(VERSION, '1.5.4.1') >= 0) {
			$this->data['oc_fields']['ean'] = 'EAN';
			$this->data['oc_fields']['jan'] = 'JAN';
			$this->data['oc_fields']['isbn'] = 'ISBN';
			$this->data['oc_fields']['mpn'] = 'MPN';
		}
	}

	protected function setFormData() {
		if (isset($this->request->post['yandex_yml_status'])) {
			$this->data['yandex_yml_status'] = $this->request->post['yandex_yml_status'];
		} else {
			$this->data['yandex_yml_status'] = $this->config->get($this->CONFIG_PREFIX.'status');
		}
		
		if (isset($this->request->post['yandex_yml_token'])) {
			$this->data['yandex_yml_token'] = $this->request->post['yandex_yml_token'];
		} else {
			$this->data['yandex_yml_token'] = $this->config->get($this->CONFIG_PREFIX.'token');
		}

		if (isset($this->request->post['yandex_yml_ocstore'])) {
			$this->data['yandex_yml_ocstore'] = $this->request->post['yandex_yml_ocstore'];
		} else {
			$this->data['yandex_yml_ocstore'] = $this->config->get($this->CONFIG_PREFIX.'ocstore');
		}

		if (isset($this->request->post['yandex_yml_datamodel'])) {
			$this->data['yandex_yml_datamodel'] = $this->request->post['yandex_yml_datamodel'];
		} else {
			$this->data['yandex_yml_datamodel'] = $this->config->get($this->CONFIG_PREFIX.'datamodel');
		}
		
		if (isset($this->request->post['yandex_yml_name_field'])) {
			$this->data['yandex_yml_name_field'] = $this->request->post['yandex_yml_name_field'];
		} else {
			$this->data['yandex_yml_name_field'] = $this->config->get($this->CONFIG_PREFIX.'name_field');
		}
		if (isset($this->request->post['yandex_yml_model_field'])) {
			$this->data['yandex_yml_model_field'] = $this->request->post['yandex_yml_model_field'];
		} else {
			$this->data['yandex_yml_model_field'] = $this->config->get($this->CONFIG_PREFIX.'model_field');
		}
		if (isset($this->request->post['yandex_yml_vendorcode_field'])) {
			$this->data['yandex_yml_vendorcode_field'] = $this->request->post['yandex_yml_vendorcode_field'];
		} else {
			$this->data['yandex_yml_vendorcode_field'] = $this->config->get($this->CONFIG_PREFIX.'vendorcode_field');
		}
		if (isset($this->request->post['yandex_yml_typeprefix_field'])) {
			$this->data['yandex_yml_typeprefix_field'] = $this->request->post['yandex_yml_typeprefix_field'];
		} else {
			$this->data['yandex_yml_typeprefix_field'] = $this->config->get($this->CONFIG_PREFIX.'typeprefix_field');
		}
		if (isset($this->request->post['yandex_yml_barcode_field'])) {
			$this->data['yandex_yml_barcode_field'] = $this->request->post['yandex_yml_barcode_field'];
		} else {
			$this->data['yandex_yml_barcode_field'] = $this->config->get($this->CONFIG_PREFIX.'barcode_field');
		}
		if (isset($this->request->post['yandex_yml_keywords_field'])) {
			$this->data['yandex_yml_keywords_field'] = $this->request->post['yandex_yml_keywords_field'];
		} else {
			$this->data['yandex_yml_keywords_field'] = $this->config->get($this->CONFIG_PREFIX.'keywords_field');
		}
		if (isset($this->request->post['yandex_yml_description_field'])) {
			$this->data['yandex_yml_description_field'] = $this->request->post['yandex_yml_description_field'];
		} else {
			$this->data['yandex_yml_description_field'] = $this->config->get($this->CONFIG_PREFIX.'description_field');
		}
		
		if (isset($this->request->post['yandex_yml_delivery_cost'])) {
			$this->data['yandex_yml_delivery_cost'] = $this->request->post['yandex_yml_delivery_cost'];
		} else {
			$this->data['yandex_yml_delivery_cost'] = $this->config->get($this->CONFIG_PREFIX.'delivery_cost');
		}
		if (isset($this->request->post['yandex_yml_delivery_days'])) {
			$this->data['yandex_yml_delivery_days'] = $this->request->post['yandex_yml_delivery_days'];
		} else {
			$this->data['yandex_yml_delivery_days'] = $this->config->get($this->CONFIG_PREFIX.'delivery_days');
		}
		if (isset($this->request->post['yandex_yml_delivery_before'])) {
			$this->data['yandex_yml_delivery_before'] = $this->request->post['yandex_yml_delivery_before'];
		} else {
			$this->data['yandex_yml_delivery_before'] = $this->config->get($this->CONFIG_PREFIX.'delivery_before');
		}
		if (isset($this->request->post['yandex_yml_local_delivery'])) {
			$this->data['yandex_yml_local_delivery'] = $this->request->post['yandex_yml_local_delivery'];
		} else {
			$this->data['yandex_yml_local_delivery'] = $this->config->get($this->CONFIG_PREFIX.'local_delivery');
		}
		if (isset($this->request->post['yandex_yml_outlets'])) {
			$this->data['yandex_yml_outlets'] = $this->request->post['yandex_yml_outlets'];
		} else {
			$this->data['yandex_yml_outlets'] = $this->config->get($this->CONFIG_PREFIX.'outlets');
		}

		if (isset($this->request->post['yandex_yml_pricefrom'])) {
			$this->data['yandex_yml_pricefrom'] = $this->request->post['yandex_yml_pricefrom'];
		} else {
			$this->data['yandex_yml_pricefrom'] = $this->config->get($this->CONFIG_PREFIX.'pricefrom');
		}
		
		if (isset($this->request->post['yandex_yml_priceto'])) {
			$this->data['yandex_yml_priceto'] = $this->request->post['yandex_yml_priceto'];
		} else {
			$this->data['yandex_yml_priceto'] = $this->config->get($this->CONFIG_PREFIX.'priceto');
		}

		if (isset($this->request->post['yandex_yml_export_tags'])) {
			$this->data['yandex_yml_export_tags'] = $this->request->post['yandex_yml_export_tags'];
		} else {
			$this->data['yandex_yml_export_tags'] = $this->config->get($this->CONFIG_PREFIX.'export_tags');
		}

		if (isset($this->request->post['yandex_yml_utm_label'])) {
			$this->data['yandex_yml_utm_label'] = $this->request->post['yandex_yml_utm_label'];
		} else {
			$this->data['yandex_yml_utm_label'] = $this->config->get($this->CONFIG_PREFIX.'utm_label');
		}
		
		if (isset($this->request->post['yandex_yml_currency'])) {
			$this->data['yandex_yml_currency'] = $this->request->post['yandex_yml_currency'];
		} else {
			$this->data['yandex_yml_currency'] = $this->config->get($this->CONFIG_PREFIX.'currency');
		}
		
		if (isset($this->request->post['yandex_yml_oldprice'])) {
			$this->data['yandex_yml_oldprice'] = $this->request->post['yandex_yml_oldprice'];
		} else {
			$this->data['yandex_yml_oldprice'] = $this->config->get($this->CONFIG_PREFIX.'oldprice');
		}

		$this->load->model('sale/customer_group');
		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
		if (isset($this->request->post['yandex_yml_groupprice'])) {
			$this->data['yandex_yml_groupprice'] = $this->request->post['yandex_yml_groupprice'];
		} else {
			$this->data['yandex_yml_groupprice'] = $this->config->get($this->CONFIG_PREFIX.'groupprice');
		}
		
		if (isset($this->request->post['yandex_yml_changeprice'])) {
			$this->data['yandex_yml_changeprice'] = $this->request->post['yandex_yml_changeprice'];
		} else {
			$this->data['yandex_yml_changeprice'] = $this->config->get($this->CONFIG_PREFIX.'changeprice');
		}
		
		if (isset($this->request->post['yandex_yml_blacklist_type'])) {
			$this->data['blacklist_type'] = $this->request->post['yandex_yml_blacklist_type'];
		} else {
			$this->data['blacklist_type'] = $this->config->get($this->CONFIG_PREFIX.'blacklist_type');
		}

		if (isset($this->request->post['yandex_yml_blacklist'])) {
			$blacklist = $this->request->post['yandex_yml_blacklist'];
		} else {
			$blacklist = explode(',', $this->config->get($this->CONFIG_PREFIX.'blacklist'));
		}
		$this->load->model('catalog/product');
		
		$this->data['blacklist'] = array();
		
		foreach ($blacklist as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {
				$this->data['blacklist'][] = array(
					'product_id' => $product_info['product_id'],
					'name'       => $product_info['name']
				);
			}
		}

		if (isset($this->request->post['yandex_yml_unavailable'])) {
			$this->data['yandex_yml_unavailable'] = $this->request->post['yandex_yml_unavailable'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'unavailable')) {
			$this->data['yandex_yml_unavailable'] = $this->config->get($this->CONFIG_PREFIX.'unavailable');
		} else {
			$this->data['yandex_yml_unavailable'] = '';
		}

		if (isset($this->request->post['yandex_yml_in_stock'])) {
			$this->data['yandex_yml_in_stock'] = is_array($this->request->post['yandex_yml_in_stock']) ?
                $this->request->post['yandex_yml_in_stock'] : explode(',', $this->request->post['yandex_yml_in_stock']);
		} elseif ($this->config->get($this->CONFIG_PREFIX.'in_stock')) {
			$this->data['yandex_yml_in_stock'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'in_stock'));
		} else {
			$this->data['yandex_yml_in_stock'] = array(7);
		}

		if (isset($this->request->post['yandex_yml_out_of_stock'])) {
			$this->data['yandex_yml_out_of_stock'] = is_array($this->request->post['yandex_yml_out_of_stock']) ? 
                $this->request->post['yandex_yml_out_of_stock'] : explode(',', $this->request->post['yandex_yml_out_of_stock']);
		} elseif ($this->config->get($this->CONFIG_PREFIX.'in_stock')) {
			$this->data['yandex_yml_out_of_stock'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'out_of_stock'));
		} else {
			$this->data['yandex_yml_out_of_stock'] = array(5);
		}

		if (isset($this->request->post['yandex_yml_pickup'])) {
			$this->data['yandex_yml_pickup'] = $this->request->post['yandex_yml_pickup'];
		} else {
			$this->data['yandex_yml_pickup'] = $this->config->get($this->CONFIG_PREFIX.'pickup');
		}

		if (isset($this->request->post['yandex_yml_sales_notes'])) {
			$this->data['yandex_yml_sales_notes'] = $this->request->post['yandex_yml_sales_notes'];
		} else {
			$this->data['yandex_yml_sales_notes'] = $this->config->get($this->CONFIG_PREFIX.'sales_notes');
		}

		if (isset($this->request->post['yandex_yml_age_18'])) {
			$this->data['yandex_yml_age_18'] = $this->request->post['yandex_yml_age_18'];
		} else {
			$this->data['yandex_yml_age_18'] = $this->config->get($this->CONFIG_PREFIX.'age_18');
		}
        
		if (isset($this->request->post['yandex_yml_store'])) {
			$this->data['yandex_yml_store'] = $this->request->post['yandex_yml_store'];
		} else {
			$this->data['yandex_yml_store'] = $this->config->get($this->CONFIG_PREFIX.'store');
		}
		
		if (isset($this->request->post['yandex_yml_numpictures'])) {
			$this->data['yandex_yml_numpictures'] = $this->request->post['yandex_yml_numpictures'];
		} else {
			$this->data['yandex_yml_numpictures'] = $this->config->get($this->CONFIG_PREFIX.'numpictures');
		}

		if (isset($this->request->post['yandex_yml_cpa'])) {
			$this->data['yandex_yml_cpa'] = $this->request->post['yandex_yml_cpa'];
		} else {
			$this->data['yandex_yml_cpa'] = $this->config->get($this->CONFIG_PREFIX.'cpa');
		}
		
		//++++ Для вкладки аттрибутов ++++
		if (isset($this->request->post['yandex_yml_attributes'])) {
			$this->data['yandex_yml_attributes'] = $this->request->post['yandex_yml_attributes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'attributes') != '') {
			$this->data['yandex_yml_attributes'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'attributes'));
		} else {
			$this->data['yandex_yml_attributes'] = array();
		}
		if (isset($this->request->post['yandex_yml_adult'])) {
			$this->data['yandex_yml_adult'] = $this->request->post['yandex_yml_adult'];
		} else {
			$this->data['yandex_yml_adult'] = $this->config->get($this->CONFIG_PREFIX.'adult');
		}
		if (isset($this->request->post['yandex_yml_all_adult'])) {
			$this->data['yandex_yml_all_adult'] = $this->request->post['yandex_yml_all_adult'];
		} else {
			$this->data['yandex_yml_all_adult'] = $this->config->get($this->CONFIG_PREFIX.'all_adult');
		}
		
		if (isset($this->request->post['yandex_yml_manufacturer_warranty'])) {
			$this->data['yandex_yml_manufacturer_warranty'] = $this->request->post['yandex_yml_manufacturer_warranty'];
		} else {
			$this->data['yandex_yml_manufacturer_warranty'] = $this->config->get($this->CONFIG_PREFIX.'manufacturer_warranty');
		}
		if (isset($this->request->post['yandex_yml_all_manufacturer_warranty'])) {
			$this->data['yandex_yml_all_manufacturer_warranty'] = $this->request->post['yandex_yml_all_manufacturer_warranty'];
		} else {
			$this->data['yandex_yml_all_manufacturer_warranty'] = $this->config->get($this->CONFIG_PREFIX.'all_manufacturer_warranty');
		}
		
		
		if (isset($this->request->post['yandex_yml_country_of_origin'])) {
			$this->data['yandex_yml_country_of_origin'] = $this->request->post['yandex_yml_country_of_origin'];
		} else {
			$this->data['yandex_yml_country_of_origin'] = $this->config->get($this->CONFIG_PREFIX.'country_of_origin');
		}

		if (isset($this->request->post['yandex_yml_product_rel'])) {
			$this->data['yandex_yml_product_rel'] = $this->request->post['yandex_yml_product_rel'];
		} else {
			$this->data['yandex_yml_product_rel'] = $this->config->get($this->CONFIG_PREFIX.'product_rel');
		}
		if (isset($this->request->post['yandex_yml_product_accessory'])) {
			$this->data['yandex_yml_product_accessory'] = $this->request->post['yandex_yml_product_accessory'];
		} else {
			$this->data['yandex_yml_product_accessory'] = $this->config->get($this->CONFIG_PREFIX.'product_accessory');
		}
		
		$this->load->model('catalog/attribute');
		$results = $this->model_catalog_attribute->getAttributes(array('sort'=>'attribute_group'));
		$this->data['attributes'] = $results;
		//---- Для вкладки аттрибутов ----

		//++++ Для магазинов одежды ++++
		$this->load->model('catalog/option');
		$results = $this->model_catalog_option->getOptions(array('sort' => 'name'));
		$this->data['options'] = $results;
		
		$this->data['tab_tailor_description'] = $this->language->get('tab_tailor_description');

		if (isset($this->request->post['yandex_yml_color_options'])) {
			$this->data['yandex_yml_color_options'] = $this->request->post['yandex_yml_color_options'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'color_options') != '') {
			$this->data['yandex_yml_color_options'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'color_options'));
		} else {
			$this->data['yandex_yml_color_options'] = array();
		}
		if (isset($this->request->post['yandex_yml_size_options'])) {
			$this->data['yandex_yml_size_options'] = $this->request->post['yandex_yml_size_options'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'size_options') != '') {
			$this->data['yandex_yml_size_options'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'size_options'));
		} else {
			$this->data['yandex_yml_size_options'] = array();
		}
		if (isset($this->request->post['yandex_yml_size_units'])) {
			$this->data['yandex_yml_size_units'] = $this->request->post['yandex_yml_size_units'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'size_units') != '') {
			$this->data['yandex_yml_size_units'] = unserialize($this->config->get($this->CONFIG_PREFIX.'size_units'));
		} else {
			$this->data['yandex_yml_size_units'] = array();
		}

		if (isset($this->request->post['yandex_yml_optioned_name'])) {
			$this->data['yandex_yml_optioned_name'] = $this->request->post['yandex_yml_optioned_name'];
		} else {
			$this->data['yandex_yml_optioned_name'] = $this->config->get($this->CONFIG_PREFIX.'optioned_name');
		}
		
		if (isset($this->request->post['yandex_yml_option_image'])) {
			$this->data['yandex_yml_option_image'] = $this->request->post['yandex_yml_option_image'];
		} else {
			$this->data['yandex_yml_option_image'] = $this->config->get($this->CONFIG_PREFIX.'option_image');
		}
		if (isset($this->request->post['yandex_yml_option_image_pro'])) {
			$this->data['yandex_yml_option_image_pro'] = $this->request->post['yandex_yml_option_image_pro'];
		} else {
			$this->data['yandex_yml_option_image_pro'] = $this->config->get($this->CONFIG_PREFIX.'option_image_pro');
		}
		if (isset($this->request->post['yandex_yml_image_mandatory'])) {
			$this->data['yandex_yml_image_mandatory'] = $this->request->post['yandex_yml_image_mandatory'];
		} else {
			$this->data['yandex_yml_image_mandatory'] = $this->config->get($this->CONFIG_PREFIX.'image_mandatory');
		}
		
		//---- Для магазинов одежды ----

		$this->load->model('localisation/stock_status');

		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		$this->load->model('catalog/category');
		$this->data['categories'] = $this->model_catalog_category->getCategories(0);
		
		$this->load->model('catalog/manufacturer');
		$this->data['manufacturers'] = $this->model_catalog_manufacturer->getManufacturers(0);
		$this->data['manufacturers'][] = array('manufacturer_id'=>'0', 'name'=>'Производитель не указан');

		if (isset($this->request->post['yandex_yml_categories'])) {
			$this->data['yandex_yml_categories'] = $this->request->post['yandex_yml_categories'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categories') != '') {
			$this->data['yandex_yml_categories'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'categories'));
		} else {
			$this->data['yandex_yml_categories'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_manufacturers'])) {
			$this->data['yandex_yml_manufacturers'] = $this->request->post['yandex_yml_manufacturers'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manufacturers') != '') {
			$this->data['yandex_yml_manufacturers'] = explode(',', $this->config->get($this->CONFIG_PREFIX.'manufacturers'));
		} else {
			$this->data['yandex_yml_manufacturers'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_delivery_cost'])) {
			$this->data['yandex_yml_categ_delivery_cost'] = $this->request->post['yandex_yml_categ_delivery_cost'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_delivery_cost') != '') {
			$this->data['yandex_yml_categ_delivery_cost'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_delivery_cost'));
		} else {
			$this->data['yandex_yml_categ_delivery_cost'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_manuf_delivery_cost'])) {
			$this->data['yandex_yml_manuf_delivery_cost'] = $this->request->post['yandex_yml_manuf_delivery_cost'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_cost') != '') {
			$this->data['yandex_yml_manuf_delivery_cost'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_cost'));
		} else {
			$this->data['yandex_yml_manuf_delivery_cost'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_delivery_days'])) {
			$this->data['yandex_yml_categ_delivery_days'] = $this->request->post['yandex_yml_categ_delivery_days'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_delivery_days') != '') {
			$this->data['yandex_yml_categ_delivery_days'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_delivery_days'));
		} else {
			$this->data['yandex_yml_categ_delivery_days'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_manuf_delivery_days'])) {
			$this->data['yandex_yml_manuf_delivery_days'] = $this->request->post['yandex_yml_manuf_delivery_days'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_days') != '') {
			$this->data['yandex_yml_manuf_delivery_days'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_delivery_days'));
		} else {
			$this->data['yandex_yml_manuf_delivery_days'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_cpa'])) {
			$this->data['yandex_yml_categ_cpa'] = $this->request->post['yandex_yml_categ_cpa'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_cpa') != '') {
			$this->data['yandex_yml_categ_cpa'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_cpa'));
		} else {
			$this->data['yandex_yml_categ_cpa'] = array();
		}

		if (isset($this->request->post['yandex_yml_manuf_cpa'])) {
			$this->data['yandex_yml_manuf_cpa'] = $this->request->post['yandex_yml_manuf_cpa'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_cpa') != '') {
			$this->data['yandex_yml_manuf_cpa'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_cpa'));
		} else {
			$this->data['yandex_yml_manuf_cpa'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_fee'])) {
			$this->data['yandex_yml_categ_fee'] = $this->request->post['yandex_yml_categ_fee'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_fee') != '') {
			$this->data['yandex_yml_categ_fee'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_fee'));
		} else {
			$this->data['yandex_yml_categ_fee'] = array();
		}

		if (isset($this->request->post['yandex_yml_manuf_fee'])) {
			$this->data['yandex_yml_manuf_fee'] = $this->request->post['yandex_yml_manuf_fee'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_fee') != '') {
			$this->data['yandex_yml_manuf_fee'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_fee'));
		} else {
			$this->data['yandex_yml_manuf_fee'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_age_18'])) {
			$this->data['yandex_yml_categ_age_18'] = $this->request->post['yandex_yml_categ_age_18'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_age_18') != '') {
			$this->data['yandex_yml_categ_age_18'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_age_18'));
		} else {
			$this->data['yandex_yml_categ_age_18'] = array();
		}

		if (isset($this->request->post['yandex_yml_manuf_age_18'])) {
			$this->data['yandex_yml_manuf_age_18'] = $this->request->post['yandex_yml_manuf_age_18'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_age_18') != '') {
			$this->data['yandex_yml_manuf_age_18'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_age_18'));
		} else {
			$this->data['yandex_yml_manuf_age_18'] = array();
		}
		
		if (isset($this->request->post['yandex_yml_categ_sales_notes'])) {
			$this->data['yandex_yml_categ_sales_notes'] = $this->request->post['yandex_yml_categ_sales_notes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'categ_sales_notes') != '') {
			$this->data['yandex_yml_categ_sales_notes'] = unserialize($this->config->get($this->CONFIG_PREFIX.'categ_sales_notes'));
		} else {
			$this->data['yandex_yml_categ_sales_notes'] = array();
		}

		if (isset($this->request->post['yandex_yml_manuf_sales_notes'])) {
			$this->data['yandex_yml_manuf_sales_notes'] = $this->request->post['yandex_yml_manuf_sales_notes'];
		} elseif ($this->config->get($this->CONFIG_PREFIX.'manuf_sales_notes') != '') {
			$this->data['yandex_yml_manuf_sales_notes'] = unserialize($this->config->get($this->CONFIG_PREFIX.'manuf_sales_notes'));
		} else {
			$this->data['yandex_yml_manuf_sales_notes'] = array();
		}
		
		$this->load->model('localisation/currency');
		$currencies = $this->model_localisation_currency->getCurrencies();
		$allowed_currencies = array_flip($this->allowedCurrencies);
		$this->data['currencies'] = array_intersect_key($currencies, $allowed_currencies);
	}
	
	public function index() {
		$this->load->language('feed/yandex_yml');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate($this->request->post))) {
			$this->preparePostData();

			$this->model_setting_setting->editSetting('yandex_yml', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL'));
		}

		$this->setLanguageData();
		$this->data['token'] = $this->session->data['token'];
		$this->data['cron_path'] = 'php '.realpath(DIR_CATALOG.'../export/yandex_yml.php');

		$this->data['export_url'] = HTTP_CATALOG.'export/';

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		$this->data['action'] = $this->url->link('feed/yandex_yml', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['cancel'] = $this->url->link('extension/feed', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['data_feed'] = HTTP_CATALOG . 'index.php?route=feed/yandex_yml';
		
		$this->setFormData();
		
		$this->template = 'feed/yandex_yml.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validate($data) {
		if (!$this->user->hasPermission('modify', 'feed/yandex_yml')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
        if (!isset($data['yandex_yml_currency']) || !$data['yandex_yml_currency']) {
			$this->error['warning'] = $this->language->get('error_no_currency');
		}
        if (!intval($data['yandex_yml_numpictures']) && isset($data['yandex_yml_image_mandatory'])) {
			$this->error['warning'] = $this->language->get('error_image_mandatory');
		}

		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
