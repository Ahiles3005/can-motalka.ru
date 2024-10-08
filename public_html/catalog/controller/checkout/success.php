<?php
class ControllerCheckoutSuccess extends Controller { 
	public function index() {
			$this->data['order_id'] = $this->session->data['order_id'];
			$this->data['store_name'] = $this->config->get('config_name');
			$this->data['order_text'] = $this->config->get('config_order_text');

			$this->load->model('account/order');
			$this->data['order_info'] = $this->model_account_order->getOrder($this->session->data['order_id']);

			$this->data['order_products'] = $this->model_account_order->getOrderProducts($this->session->data['order_id']);

			$tax = 0;
			foreach($this->data['order_products'] as $row){
			$tax = $tax + $row['tax'];
			}
			$this->data['tax'] = $tax;		
		if (isset($this->session->data['order_id'])) {
			$this->cart->clear();

			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			//unset($this->session->data['order_id']);	
			unset($this->session->data['coupon']);
			unset($this->session->data['reward']);
			unset($this->session->data['voucher']);
			unset($this->session->data['vouchers']);
		}	
									   
		$this->language->load('checkout/success');
		
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
        	'href'      => $this->url->link('checkout/success'),
        	'text'      => $this->language->get('text_success'),
        	'separator' => $this->language->get('text_separator')
      	);

		$this->data['heading_title'] = $this->language->get('heading_title');
		
		if ($this->customer->isLogged()) {
    		$this->data['text_message'] = sprintf($this->language->get('text_customer'), $this->url->link('account/account', '', 'SSL'), $this->url->link('account/order', '', 'SSL'), $this->url->link('account/download', '', 'SSL'), $this->url->link('information/contact'));
		} else {
    		$this->data['text_message'] = sprintf($this->language->get('text_guest'), $this->url->link('information/contact'));
		}
		
    	$this->data['button_continue'] = $this->language->get('button_continue');

    	$this->data['continue'] = $this->url->link('common/home');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/success.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/success.tpl';
		} else {
			$this->template = 'default/template/common/success.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'			
		);

        $this->data['send_confirm_code'] = false;
        $this->load->model("module/prosto_sms");

        if($this->model_module_prosto_sms->isInstalled()){
            $this->load->model('setting/setting');
            $setting = $this->model_setting_setting->getSetting('prosto_sms');
            $this->data['send_confirm_code'] = $setting['sendConfirmCode'];
            $this->data['confirm_code_url'] = $this->url->link('module/prosto_sms/validate_code');
        }

		$this->response->setOutput($this->render());
  	}
}
?>