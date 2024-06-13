<?php
require_once(DIR_SYSTEM . 'library/Mobile_Detect.php');
class ControllerCommonFooter extends Controller {
	protected function index() {
		$this->language->load('common/footer');
		
		$this->data['text_information'] = $this->language->get('text_information');
		$this->data['text_service'] = $this->language->get('text_service');
		$this->data['text_extra'] = $this->language->get('text_extra');
		$this->data['text_contact'] = $this->language->get('text_contact');
		$this->data['text_return'] = $this->language->get('text_return');
    	$this->data['text_sitemap'] = $this->language->get('text_sitemap');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_voucher'] = $this->language->get('text_voucher');
		$this->data['text_affiliate'] = $this->language->get('text_affiliate');
		$this->data['text_special'] = $this->language->get('text_special');
		$this->data['text_account'] = $this->language->get('text_account');
		$this->data['text_order'] = $this->language->get('text_order');
		$this->data['text_wishlist'] = $this->language->get('text_wishlist');
		$this->data['text_newsletter'] = $this->language->get('text_newsletter');
		$this->data['text_address'] = $this->language->get('text_address');
		$this->data['text_login'] = $this->language->get('text_login');
		$this->data['text_cancel'] = $this->language->get('text_cancel');
		$this->data['text_pays'] = $this->language->get('text_pays');
		$this->data['text_old'] = $this->language->get('text_old');
		
		$this->data['name'] = $this->config->get('config_name');
		
		$this->load->model('catalog/information');
		
		$this->data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$this->data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
    	}

		$this->data['contact'] = $this->url->link('information/contact');
		$this->data['home'] = $this->url->link('common/home');
		$this->data['return'] = $this->url->link('account/return/insert', '', 'SSL');
    	$this->data['sitemap'] = $this->url->link('information/sitemap');
		$this->data['manufacturer'] = $this->url->link('product/manufacturer');
		$this->data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$this->data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$this->data['special'] = $this->url->link('product/special');
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');
		$this->data['order'] = $this->url->link('account/order', '', 'SSL');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');	
		
		
			// REMARKETING
		$this->data['remarketing_code'] = '';
		$this->data['tag_params'] = '';
		if ($this->config->get('config_remarketing_code')) {
		


		
		if (isset($this->request->get['route'])) {
			$route = $this->request->get['route'];
		} else {
			$route = '';
		}
		$this->load->model('catalog/product');
		$this->load->model('checkout/order');	
		
		$this->data['dynx_itemid'] = array();
		$this->data['dynx_totalvalue'] = '';
		
		switch($route) {
			case '':			
			case 'common/home':	
				$this->data['dynx_pagetype'] = false;
				break;	
			case 'product/category':
			case 'product/search':
			case 'product/special':
			case 'product/manufacturer/info':
				$this->data['dynx_pagetype'] = false;
				break;		
			case 'product/product':
				$this->data['dynx_pagetype'] = 'product';
				$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
				$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				if ((float)$product_info['special']) {
					$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}  
				$price_formatted = trim(preg_replace('/[^\d.]/','', ($special ? $special : $price)), '.');
				$this->data['dynx_itemid'][] = $product_info['product_id'];
				$this->data['dynx_totalvalue'] = $price_formatted;
				
				
				break;	
			case 'checkout/cart':
			case 'checkout/simplecheckout':
			case 'checkout/checkout':
			case 'checkout/unicheckout':
			case 'checkout/revcheckout':
			case 'checkout/oct_fastorder':
				$this->data['dynx_pagetype'] = 'cart';
				$products = $this->cart->getProducts();
				foreach ($products as $product) {
					$this->data['dynx_itemid'][] = $product['product_id'];			
				} 
				$this->data['dynx_totalvalue'] = trim(preg_replace('/[^\d.]/','', $this->currency->format($this->cart->getTotal(), $this->session->data['currency'])),'.'); 
				break;	
			case 'checkout/success':
				$this->data['dynx_pagetype'] = 'purchase';
				if (isset($this->session->data['order_id'])) {
				$order_info = $this->model_checkout_order->getOrderRemarketing($this->session->data['order_id']);
				if ($order_info) {
					$this->data['dynx_itemid'] = $order_info['products'];
					$this->data['dynx_totalvalue'] = trim(preg_replace('/[^\d.]/','', $this->currency->format($order_info['total'], $this->session->data['currency'])),'.');
				} 
				unset($this->session->data['order_id']); 
				} else {
				$this->data['dynx_pagetype'] = 'other';
				}
				break;	 
			default:
				$this->data['dynx_pagetype'] = 'other';
				break;
		}
		if (count($this->data['dynx_itemid']) > 1){
			$dynx_itemid =  implode(',', $this->data['dynx_itemid']);
		} elseif (!empty($this->data['dynx_itemid'])) {
			$dynx_itemid = $this->data['dynx_itemid'][0];
		} else {
			$dynx_itemid = '';	
		}
		if ($this->data['dynx_pagetype']) {
		
		$this->data['tag_params'] .= '<script type="text/javascript">'."\n";
		$this->data['tag_params'] .= 'window.dataLayer = window.dataLayer || [];'."\n";
		$this->data['tag_params'] .= 'dataLayer.push({'."\n";
		if (!empty($dynx_itemid)) $this->data['tag_params'] .= "'ecomm_prodid': " . "'" . $dynx_itemid . "',"."\n";
		$this->data['tag_params'] .= "'ecomm_pagetype': '" . $this->data['dynx_pagetype'] ."'," . "\n";
		if (!empty($this->data['dynx_totalvalue']) && ($this->data['dynx_pagetype'] == 'conversionintent' || $this->data['dynx_pagetype'] == 'conversion')) $this->data['tag_params'] .= "'ecomm_totalvalue': '". $this->data['dynx_totalvalue'] . "'\n";
		$this->data['tag_params'] .= '});'."\n</script>\n";
		
		$this->document->setDatalayer($this->data['tag_params']);
		
		}
		}
		
		
		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');
	
			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];	
			} else {
				$ip = ''; 
			}
			
			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];	
			} else {
				$url = '';
			}
			
			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];	
			} else {
				$referer = '';
			}
						
			$this->model_tool_online->whosonline($ip, $this->customer->getId(), $url, $referer);
		}	
		
		if ($this->config->get('config_copyright')) {
			$this->data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));
			$this->data['powered_copyright'] = 'powered';
		} else {
			$this->data['powered'] = sprintf($this->language->get('text_no_copyright'), $this->config->get('config_name'), date('Y', time()));
			$this->data['powered_copyright'] = 'copyright';
		}
		
		// [webme] 18yo modal --- begin
		$this->data['webme_18yo_status'] = $this->config->get('webme_18yo_status');
		// [webme] 18yo modal --- end
		
		$this->data['contact_display'] = $this->config->get('config_contacts_display') == 'footer' || $this->config->get('config_contacts_display') == 'header_footer';
		
		if ($this->data['contact_display']) {
			$this->data['width_info']  = 'width:20%;';
			$this->data['width']  = 'width:15%;';
		} else {
			$this->data['width_info'] = 'width:25%;';
			$this->data['width'] = 'width:25%;';
		}
		
		$this->data['width_address']  = 'width: 35%;';
		
		$this->data['contact_address'] = $this->config->get('config_address');
		$this->data['contact_email'] = $this->config->get('config_email');
		$this->data['contact_telephone'] = $this->config->get('config_telephone');
		$this->data['contact_mobile_telephone'] = $this->config->get('config_mobile_telephone');
		$this->data['contact_fax'] = $this->config->get('config_fax');
		
		$this->data['text_contact'] = $this->language->get('text_contact');
		$this->data['text_address'] = $this->language->get('text_address');
		$this->data['text_email_address'] = $this->language->get('text_email_address');
		$this->data['text_telephone'] = $this->language->get('text_telephone');
		$this->data['text_mobile_telephone'] = $this->language->get('text_mobile_telephone');
		$this->data['text_fax'] = $this->language->get('text_fax');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/footer.tpl';
		} else {
			$this->template = 'default/template/common/footer.tpl';
		}
		
		$this->render();
	}

	public function click_counter() {

		$text = date("d-m-Y H:i:s").' URL: '.$this->request->post['href']."\n";
		$filename = '/home/canmotalka/web/can-motalka.ru/public_html/statistics/day-'.date("d-m-Y").'.txt';
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$json = 'is_bot';
		$is_bot = false;

		$bots = [
	        // Yandex
	        'YandexBot', 'YandexAccessibilityBot', 'YandexMobileBot', 'YandexDirectDyn', 'YandexScreenshotBot',
	        'YandexImages', 'YandexVideo', 'YandexVideoParser', 'YandexMedia', 'YandexBlogs', 'YandexFavicons',
	        'YandexWebmaster', 'YandexPagechecker', 'YandexImageResizer', 'YandexAdNet', 'YandexDirect',
	        'YaDirectFetcher', 'YandexCalendar', 'YandexSitelinks', 'YandexMetrika', 'YandexNews',
	        'YandexNewslinks', 'YandexCatalog', 'YandexAntivirus', 'YandexMarket', 'YandexVertis',
	        'YandexForDomain', 'YandexSpravBot', 'YandexSearchShop', 'YandexMedianaBot', 'YandexOntoDB',
	        'YandexOntoDBAPI', 'YandexTurbo', 'YandexVerticals',

	        // Google
	        'Googlebot', 'Googlebot-Image', 'Mediapartners-Google', 'AdsBot-Google', 'APIs-Google',
	        'AdsBot-Google-Mobile', 'AdsBot-Google-Mobile', 'Googlebot-News', 'Googlebot-Video',
	        'AdsBot-Google-Mobile-Apps',

	        // Other
	        'Mail.RU_Bot', 'bingbot', 'Accoona', 'ia_archiver', 'Ask Jeeves', 'OmniExplorer_Bot', 'W3C_Validator',
	        'WebAlta', 'YahooFeedSeeker', 'Yahoo!', 'Ezooms', 'Tourlentabot', 'MJ12bot', 'AhrefsBot',
	        'SearchBot', 'SiteStatus', 'Nigma.ru', 'Baiduspider', 'Statsbot', 'SISTRIX', 'AcoonBot', 'findlinks',
	        'proximic', 'OpenindexSpider', 'statdom.ru', 'Exabot', 'Spider', 'SeznamBot', 'oBot', 'C-T bot',
	        'Updownerbot', 'Snoopy', 'heritrix', 'Yeti', 'DomainVader', 'DCPbot', 'PaperLiBot', 'StackRambler',
	        'msnbot', 'msnbot-media', 'msnbot-news', 'Lighthouse',
	    ];

	    foreach ($bots as $bot) {
	        if (stripos($user_agent, $bot) !== false) {
	        	$is_bot = true;
	        	break;
	        }
	    }

	    if (!$is_bot) {
	    	$json = file_put_contents($filename, $text, FILE_APPEND);
	    }

		$this->response->setOutput(json_encode($json));
	}
}
?>