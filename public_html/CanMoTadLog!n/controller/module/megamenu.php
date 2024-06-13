<?php
class ControllerModuleMegamenu extends Controller {
	private $error = array();
	
	public function index() {
		$this->language->load('module/megamenu');		
		$this->load->model('tool/megamenu');
		$this->load->model('setting/setting');
		
		
		$this->document->setTitle($this->language->get('heading_title'));
		
			if (($this->request->server['REQUEST_METHOD'] == 'POST')  && isset($this->request->post['megamenu_status']) && $this->validateStatus()) {
			$this->model_setting_setting->editSetting('megamenu',$this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

				$this->redirect($this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
	$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL')
				,	'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
				'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
				,		'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL')
			,		'separator' => ' :: '
		);
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		if (isset($this->error['warning'])) {
			$this->data['error'] = $this->error['warning'];
		
			unset($this->error['warning']);
		} else {
			$this->data['error'] = '';
		}
		
		
			
		if (isset($this->request->post['megamenu_status'])) {
			$this->data['megamenu_status'] = $this->request->post['megamenu_status'];
		} else {
			$this->data['megamenu_status'] = $this->config->get('megamenu_status');
		}
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['text_th_title'] = $this->language->get('text_th_title');
		$this->data['text_th_link'] = $this->language->get('text_th_link');
		$this->data['text_th_sort_order'] = $this->language->get('text_th_sort_order');
		$this->data['text_short_description'] = $this->language->get('text_short_description');
		$this->data['text_date'] = $this->language->get('text_date');
		$this->data['text_action'] = $this->language->get('text_action');
		$this->data['text_edit'] = $this->language->get('text_edit');
		$this->data['text_list'] = $this->language->get('text_list');
        $this->data['text_refresh'] = $this->language->get('text_refresh');
		$this->data['text_no_results'] = $this->language->get('text_no_results');

		$this->data['text_confirm'] = $this->language->get('text_confirm');
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');		
		$this->data['button_add'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');		
		$this->data['entry_status'] = $this->language->get('entry_status_module');
		$this->data['action'] = $this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['add'] = $this->url->link('module/megamenu/insert', '&token=' . $this->session->data['token'], 'SSL');
 	    $this->data['refresh'] = $this->url->link('module/megamenu/refresh', '&token=' . $this->session->data['token'], 'SSL');
		$this->data['delete'] = $this->url->link('module/megamenu/delete', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['all_items'] = array();
		
		$filter_data=array('sort'=>'sort_order');		
		$all_items = $this->model_tool_megamenu->getItems($filter_data);
			
		
		foreach ($all_items as $item) {
			$this->data['all_items'][] = array (
				'id' 			=> $item['megamenu_id'],
				'title' 			=> $item['title'],			
				'link' 			=> $item['link'],	
				'sort_order' 			=> $item['sort_order'],	
				'edit' 				=> $this->url->link('module/megamenu/edit', 'id=' . $item['megamenu_id'] . '&token=' . $this->session->data['token'], 'SSL')
			);
		}
	
	$this->load->model('design/layout');
		
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
						
		$this->template = 'module/megamenu_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}
	
	public function edit() {
		$this->language->load('module/megamenu');
		
		$this->load->model('tool/megamenu');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_tool_megamenu->editItem($this->request->get['id'], $this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL'));
		}
		
		$this->form();
	}
	
	public function insert() {
	
		$this->language->load('module/megamenu');
		
		$this->load->model('tool/megamenu');
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_tool_megamenu->addItem($this->request->post);		
			
			$this->session->data['success'] = $this->language->get('text_success');
						
			$this->redirect($this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL'));
		}
	
		$this->form();
	}
	
	protected function form() {
		$this->language->load('module/megamenu');
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('catalog/manufacturer');
		$this->load->model('catalog/information');
		
		$this->load->model('tool/megamenu');
		
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
				,		'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_module'),
			'href' => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL')
				,		'separator' => ' :: '
		);

		$this->data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL')
				,		'separator' => ' :: '
		);
		
		if (isset($this->request->get['id'])) {
			$this->data['action'] = $this->url->link('module/megamenu/edit', '&id=' . $this->request->get['id'] . '&token=' . $this->session->data['token'], 'SSL');
		} else {
			$this->data['action'] = $this->url->link('module/megamenu/insert', '&token=' . $this->session->data['token'], 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('module/megamenu', '&token=' . $this->session->data['token'], 'SSL');
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_image'] = $this->language->get('text_image');
		$this->data['text_title'] = $this->language->get('text_title');
		$this->data['text_description'] = $this->language->get('text_description');
		$this->data['text_short_description'] = $this->language->get('text_short_description');
		$this->data['text_status'] = $this->language->get('text_status');
		$this->data['text_keyword'] = $this->language->get('text_keyword');
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_type'] = $this->language->get('text_type');
		$this->data['text_type_category'] = $this->language->get('text_type_category');
		$this->data['text_type_html'] = $this->language->get('text_type_html');
		$this->data['text_html_description'] = $this->language->get('text_html_description');
		$this->data['text_type_manufacturer'] = $this->language->get('text_type_manufacturer');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_type_information'] = $this->language->get('text_type_information');
		$this->data['text_information'] = $this->language->get('text_information');
		$this->data['text_type_product'] = $this->language->get('text_type_product');
		$this->data['text_product'] = $this->language->get('text_product');
		$this->data['text_thumb'] = $this->language->get('text_thumb');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		
		$this->data['text_product_width'] = $this->language->get('text_product_width');
		$this->data['text_product_height'] = $this->language->get('text_product_height');
		
		$this->data['text_type_auth'] = $this->language->get('text_type_auth');
		$this->data['text_add_html'] = $this->language->get('text_add_html');
		
		$this->data['text_type_link'] = $this->language->get('text_type_link');
        $this->data['text_link_options_yes'] = $this->language->get('text_link_options_yes');
        $this->data['text_link_options'] = $this->language->get('text_link_options');
        $this->data['text_link_options_no'] = $this->language->get('text_link_options_no');
		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_html'] = $this->language->get('tab_html');		
		$this->data['tab_options'] = $this->language->get('tab_options');		
		$this->data['tab_add_html'] = $this->language->get('tab_add_html');
		$this->data['text_variant_category'] = $this->language->get('text_variant_category');		
		$this->data['variant_category_simple'] = $this->language->get('variant_category_simple');
		$this->data['variant_category_full'] = $this->language->get('variant_category_full');
		$this->data['variant_category_full_image'] = $this->language->get('variant_category_full_image');
		$this->data['text_link'] = $this->language->get('text_link');
		$this->data['text_category'] = $this->language->get('text_category');
		$this->data['text_category_show_subcategory'] = $this->language->get('text_category_show_subcategory');		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');	
		$this->data['text_sort_order'] = $this->language->get('text_sort_order');	
		$this->data['token'] = $this->session->data['token'];		
		
		
		
		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		if (isset($this->error['warning'])) {
			$this->data['error'] = $this->error['warning'];
		} else {
			$this->data['error'] = '';
		}
		
		if (isset($this->request->get['id'])) {
			$item = $this->model_tool_megamenu->getItem($this->request->get['id']);
			$item['options']=unserialize($item['options']);
		} else {
			$item = array();
		}
		
		
		
		
		if (isset($this->request->post['menu_type'])) {
			$this->data['menu_type'] = $this->request->post['menu_type'];		
		} elseif (!empty($item['menu_type'])) {
			$this->data['menu_type'] = $item["menu_type"];
		} else {
			$this->data['menu_type'] = '';
		}
	
	
		if (isset($this->request->post['link'])) {
			$this->data['link'] = $this->request->post['link'];		
		} elseif (!empty($item['link'])) {
			$this->data['link'] = $item["link"];
		} else {
			$this->data['link'] = '';
		}
		
		
		if (isset($this->request->post['megamenu'])) {
			$this->data['megamenu'] = $this->request->post['megamenu'];		
		} elseif (!empty($item)) {
			$this->data['megamenu'] = $this->model_tool_megamenu->getItemDescription($this->request->get['id']);
		} else {
			$this->data['megamenu'] = '';
		}
		
				
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($item['status'])) {
			$this->data['status'] = $item['status'];
		} else {
			$this->data['status'] = '';
		}
		
		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($item['sort_order'])) {
			$this->data['sort_order'] = $item['sort_order'];
		} else {
			$this->data['sort_order'] = '0';
		}
		
		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && is_file(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
			$this->data['thumb_hidden'] = $this->request->post['image'];
			
		} elseif (!empty($item['thumb']) && is_file(DIR_IMAGE . $item['thumb'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($item['thumb'], 100, 100);
			$this->data['thumb_hidden'] = $item['thumb'];
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
			$this->data['thumb_hidden'] = "";
		}
		$this->data['placeholder_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
	
		
			if (isset($this->request->post['use_add_html'])) {
			$this->data['use_add_html'] = (int)$this->request->post['use_add_html'];
		} elseif (!empty($item['use_add_html'])) {
			$this->data['use_add_html'] = (int)$item['use_add_html'];
		} else {
			$this->data['use_add_html'] = '0';
		}
        
        
        		if (isset($this->request->post['use_target_blank'])) {
			$this->data['use_target_blank'] = (int)$this->request->post['use_target_blank'];
		} elseif (!empty($item['use_target_blank'])) {
			$this->data['use_target_blank'] = (int)$item['use_target_blank'];
		} else {
			$this->data['use_target_blank'] = '0';
		}
		
		##category start
		if (isset($this->request->post['variant_category'])) {
			$this->data['variant_category'] = $this->request->post['variant_category'];
		} elseif (!empty($item['options']['variant_category'])) {
			$this->data['variant_category']=$item['options']['variant_category'];
		} else {
			$this->data['variant_category'] = '';
		}
		
		
		
			if (isset($this->request->post['category_show_subcategory'])) {
			$this->data['category_show_subcategory'] = $this->request->post['category_show_subcategory'];
		} elseif (!empty($item['options']['category_show_subcategory'])) {
			$this->data['category_show_subcategory']=$item['options']['category_show_subcategory'];
		} else {
			$this->data['category_show_subcategory'] = '';
		}
		if (isset($this->request->post['categories_list'])) {
			
			$categories_list_selected = $this->request->post['categories_list'];
		} elseif (!empty($item['options']['categories_list'])) {
			$categories_list_selected=$item['options']['categories_list'];
		} else {
			$categories_list_selected = array();
		}
		
		foreach($categories_list_selected as $k=>$v){			
		$this->data['categories_list_selected'][$v]=1;
		}
		
		
		
		
		//categories list		
		$this->data['categories_list'] = array();		
		$results = $this->model_catalog_category->getCategories(array('start'=>0,'limit'=>999,'sort'=>'name'));
		foreach ($results as $result) {
				$this->data['categories_list'][] = array(
					'category_id' => $result['category_id'],
					'name'        => ($result['name'])
				);
			}
		
		##category end
		
		##manufacturer start
		$this->data['manufacturers_list'] = array();		
		$results = $this->model_catalog_manufacturer->getManufacturers(array('start'=>0,'limit'=>999,'sort'=>'name'));
		foreach ($results as $result) {
				$this->data['manufacturers_list'][] = array(
					'manufacturer_id' => $result['manufacturer_id'],
					'name'        => ($result['name'])
				);
			}
			
		if (isset($this->request->post['manufacturers_list'])) {	
			$manufacturers_list_selected = $this->request->post['manufacturers_list'];
		} elseif (!empty($item['options']['manufacturers_list'])) {
			$manufacturers_list_selected=$item['options']['manufacturers_list'];
		} else {
			$manufacturers_list_selected = array();
		}
		
		foreach($manufacturers_list_selected as $k=>$v){			
		$this->data['manufacturers_list_selected'][$v]=1;
		}	
			
		##manufacturer end
		
		##information start
		$this->data['informations_list'] = array();		
		$results = $this->model_catalog_information->getInformations(array('start'=>0,'limit'=>999,'sort'=>'title'));		
		foreach ($results as $result) {
				$this->data['informations_list'][] = array(
					'information_id' => $result['information_id'],
					'title'        => ($result['title'])
				);
			}
			
		if (isset($this->request->post['informations_list'])) {	
			$informations_list_selected = $this->request->post['informations_list'];
		} elseif (!empty($item['options']['informations_list'])) {
			$informations_list_selected=$item['options']['informations_list'];
		} else {
			$informations_list_selected = array();
		}
		
		foreach($informations_list_selected as $k=>$v){			
		$this->data['informations_list_selected'][$v]=1;
		}	
			
		##information end
		
		
		##product start
	
		if (isset($this->request->post['products_list'])) {	
			$products_list_sel_tmp = $this->request->post['products_list'];
		} elseif (!empty($item['options']['products_list'])) {
			$products_list_sel_tmp=$item['options']['products_list'];
		} else {
			$products_list_sel_tmp = array();
		}
		
		$this->data['products_list_sel']=array();
		foreach($products_list_sel_tmp as $product_id){		
		$product = $this->model_catalog_product->getProduct((int)$product_id);				
		if(isset($product['product_id']))
		$this->data['products_list_sel'][]=array('product_id'=>$product['product_id'],'name'=>$product['name']);
		}

		if (isset($this->request->post['product_width'])) {	
			$this->data['product_width'] = $this->request->post['product_width'];
		} elseif (!empty($item['options']['product_width'])) {
			$this->data['product_width']=$item['options']['product_width'];
		} else {
			$this->data['product_width'] = 50;
		}
		
		if (isset($this->request->post['product_height'])) {	
			$this->data['product_height'] = $this->request->post['product_height'];
		} elseif (!empty($item['options']['product_height'])) {
			$this->data['product_height']=$item['options']['product_height'];
		} else {
			$this->data['product_height'] = 50;
		}
		
		##product end
		$this->load->model('design/layout');
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
						
		$this->template = 'module/megamenu_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());

	}
	
	public function delete() {
		$this->language->load('module/megamenu');
		
		$this->load->model('tool/megamenu');

		$this->document->setTitle($this->language->get('heading_title'));
		
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $id) {
				$this->model_tool_megamenu->deleteItem($id);
			}

			$this->session->data['success'] = $this->language->get('text_success');
		}
		
		$this->redirect($this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL'));
	}
	
	protected function validateStatus() {
		if (!$this->user->hasPermission('modify', 'module/megamenu')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}		
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'module/megamenu')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}		
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	protected function validate() {
		$this->error="";
		if (!$this->user->hasPermission('modify', 'module/megamenu')) {
			if(isset($this->error['warning']))
			$this->error['warning'].= "<p>".$this->language->get('error_permission')."</p>";
			else
			$this->error['warning']= "<p>".$this->language->get('error_permission')."</p>";
		}
		
		
		foreach ($this->request->post['megamenu'] as $key => $value) {
			if(!trim($value['title']))
			{
			if(isset($this->error['warning']))
			$this->error['warning'].= "<p>".$this->language->get('error_title')."</p>";
			else
			$this->error['warning']= "<p>".$this->language->get('error_title')."</p>";
			}
		}	
	
		if(!in_array($this->request->post['menu_type'],array("category","html","manufacturer","information","product","auth","link")))
		{
			if(isset($this->error['warning']))
			$this->error['warning'].= "<p>".$this->language->get('error_menu_type')."</p>";
			else
			$this->error['warning']= "<p>".$this->language->get('error_menu_type')."</p>";
		}		
		
		
		//category
		if($this->request->post['menu_type']=="category" && !in_array($this->request->post['variant_category'],array("simple","full","full_image")))
		{
			if(isset($this->error['warning']))
			$this->error['warning'].= "<p>".$this->language->get('error_menu_type')."</p>";
			else
			$this->error['warning']= "<p>".$this->language->get('error_menu_type')."</p>";
		}
		
		
		//html	
		if($this->request->post['menu_type']=="html")
		{
			foreach ($this->request->post['megamenu'] as $key => $value) {
			if(isset($value['html']) && !trim($value['html']))
			{
			if(isset($this->error['warning']))
			$this->error['warning'].= "<p>".$this->language->get('error_html')."</p>";
			else
			$this->error['warning']= "<p>".$this->language->get('error_html')."</p>";
			}
		}
		}
		
		
		
		
		
		
		
		
		
		
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}	
	}
	
	
	public function refresh() {
	    
        $this->language->load('module/megamenu');
        
        $r = $this->db->query("DESCRIBE `" . DB_PREFIX . "megamenu` `use_target_blank`");
        if ($r->num_rows == 0) {
            $msql = "ALTER TABLE  `" . DB_PREFIX . "megamenu` ADD  `use_target_blank` INT( 1 ) NULL DEFAULT  '0' AFTER  `use_add_html`";
            $query = $this->db->query($msql);
        }	
        
        $this->session->data['success'] = $this->language->get('text_success');
        $this->redirect($this->url->link('module/megamenu', 'token=' . $this->session->data['token'], 'SSL'));
	}	
	
		
	public function install() {
		$this->db->query("CREATE TABLE `" . DB_PREFIX . "megamenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_added` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL,
  `menu_type` varchar(32) NOT NULL,
  `options` text,
  `sort_order` int(10) NOT NULL DEFAULT '0',
  `use_add_html` int(1) DEFAULT '0',
  `use_target_blank` int(1) DEFAULT '0',
  `thumb` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE `" . DB_PREFIX . "megamenu_description` (
  `megamenu_description_id` int(11) NOT NULL AUTO_INCREMENT,
  `megamenu_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `html` text NOT NULL,
  `add_html` text NOT NULL,
  PRIMARY KEY (`megamenu_description_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
		

	}
	
	public function uninstall() {
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "megamenu`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "megamenu_description`");
	}
	
}