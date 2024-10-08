<?php
class ControllerPaymentWebmoneyWMU extends Controller {
	protected function index() {
		$this->data['button_confirm'] = $this->language->get('button_confirm');
		$this->data['button_back'] = $this->language->get('button_back');

		$this->data['action'] = 'https://merchant.webmoney.ru/lmi/payment.asp';
		
		$this->load->model('checkout/order');
		
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);

		$this->data['LMI_PAYEE_PURSE'] = $this->config->get('webmoney_wmu_merch_u');
		$this->data['order_id'] = $this->session->data['order_id'];
		$this->data['description'] = html_entity_decode($this->config->get('config_store'), ENT_QUOTES, 'UTF-8');
		
		$uah_code = "UAH";
		$uah_order_total = $this->currency->convert($order_info['total'], $order_info['currency_code'], $uah_code);
		$this->data['amount'] = $this->currency->format($uah_order_total, $uah_code, $order_info['currency_value'], FALSE);
		
		$this->data['return'] = HTTPS_SERVER . 'index.php?route=checkout/success';

		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['cancel_return'] = HTTPS_SERVER . 'index.php?route=checkout/payment';
		} else {
			$this->data['cancel_return'] = HTTPS_SERVER . 'index.php?route=checkout/guest_step_2';
		}
		
		if ($this->request->get['route'] != 'checkout/guest_step_3') {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/payment';
		} else {
			$this->data['back'] = HTTPS_SERVER . 'index.php?route=checkout/guest_step_2';
		}
		
		$this->id = 'payment';
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/payment/webmoney_wmu.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/payment/webmoney_wmu.tpl';
		} else {
			$this->template = 'default/template/payment/webmoney_wmu.tpl';
		}
		
		$this->render();
	}
	
	public function fail() {
		$this->redirect(HTTPS_SERVER . 'index.php?route=checkout/payment');
		return TRUE;
	}
	
	public function success() {
		
		$LMI_PAYMENT_NO = (int)$this->request->post['LMI_PAYMENT_NO'];
		
		$this->load->model('checkout/order');
		
		$this->model_checkout_order->confirm($LMI_PAYMENT_NO, $this->config->get('webmoney_wmu_order_status_id'), 'Webmoney WMU');
		
		$this->redirect(HTTPS_SERVER . 'index.php?route=checkout/success');
		
		return TRUE;
	}
	
	public function callback() {
		
		if( isset($this->request->post['LMI_PREREQUEST']) ) {
			echo 'YES';
			exit;
		}

		if( ! isset($this->request->post['LMI_PAYEE_PURSE']) ) exit('ERR: Отсутствует номер кошелька продавца');
		
		$LMI_PAYEE_PURSE 		= $this->request->post['LMI_PAYEE_PURSE'];
		$LMI_PAYMENT_AMOUNT 	= $this->request->post['LMI_PAYMENT_AMOUNT'];
		$LMI_PAYMENT_NO			= $this->request->post['LMI_PAYMENT_NO'];
		$LMI_MODE 				= $this->request->post['LMI_MODE'];
		$LMI_SYS_INVS_NO 		= $this->request->post['LMI_SYS_INVS_NO'];
		$LMI_SYS_TRANS_NO 		= $this->request->post['LMI_SYS_TRANS_NO'];
		$LMI_SYS_TRANS_DATE 	= $this->request->post['LMI_SYS_TRANS_DATE'];
		$LMI_PAYER_PURSE 		= $this->request->post['LMI_PAYER_PURSE'];
		$LMI_PAYER_WM 			= $this->request->post['LMI_PAYER_WM'];
		$LMI_HASH 				= $this->request->post['LMI_HASH'];
		
		
		$LMI_SECRET_KEY = $this->config->get('webmoney_wmu_secret_key');
		
		$crc = strtoupper(md5($LMI_PAYEE_PURSE . $LMI_PAYMENT_AMOUNT . $LMI_PAYMENT_NO . $LMI_MODE . $LMI_SYS_INVS_NO . $LMI_SYS_TRANS_NO . $LMI_SYS_TRANS_DATE . $LMI_SECRET_KEY . $LMI_PAYER_PURSE . $LMI_PAYER_WM));
		 
		if( $LMI_HASH != $crc) {
			echo 'ERROR: Ошибка проверки crc!';
			return 0;
		}
		
		
		$this->load->model('checkout/order');
		
		$order_info = $this->model_checkout_order->getOrder($LMI_PAYMENT_NO);
		
		if ( ! $order_info) {
			echo 'ERROR:  Нет такого заказа!';
			return 0;
		}
		
		if( $order_info['order_status_id'] == 0) {
			$this->model_checkout_order->confirm($LMI_PAYMENT_NO, $this->config->get('webmoney_wmu_order_status_id'), 'Webmoney WMU');
			return TRUE;
		}
		
		if( $order_info['order_status_id'] != $this->config->get('webmoney_wmu_order_status_id')) {
			$this->model_checkout_order->update($LMI_PAYMENT_NO, $this->config->get('webmoney_wmu_order_status_id'),'Webmoney WMU',TRUE);
		}
		
		return TRUE;
		
	}
}
?>