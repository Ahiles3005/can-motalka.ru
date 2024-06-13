<?php
class ControllerModuleRcategory extends Controller {

	public function index($setting) {

		$this->language->load('module/rcategory');
		
		static $module = 1;
		
		$this->data['button_cart'] = $this->language->get('button_cart');

		$this->data['setting'] = $setting;

		$this->data['text_goto_category'] = $this->language->get('text_goto_category');

		$this->load->model('module/rcategory');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$this->data['products'] = array();

		if ($this->config->get('config_limit_days_new_product')) {
			$limit_days_new_product = $this->config->get('config_limit_days_new_product');
		} else {
			$limit_days_new_product = 31;
		}
		
		if ($this->config->get('config_limit_viewed_popular_product')) {
			$limit_viewed_popular_product = $this->config->get('config_limit_viewed_popular_product');
		} else {
			$limit_viewed_popular_product = 50;
		}		
		
		$timestamp 			= time();
		$date_time_array 	= getdate($timestamp);
		$hours 				= $date_time_array['hours'];
		$minutes 			= $date_time_array['minutes'];
		$seconds 			= $date_time_array['seconds'];
		$month 				= $date_time_array['mon'];
		$day 				= $date_time_array['mday'];
		$year 				= $date_time_array['year'];

		$timestamp = mktime($hours, $minutes, $seconds, $month,$day - $limit_days_new_product, $year);
			
		$this->document->addScript('catalog/view/javascript/jquery/tabs.js');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/stylesheet/rcategory/rcategory.css')) {
			$css = 'catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/rcategory/rcategory.css?v=' .$this->data['timeModified'] = time(). '';
		} else {
			$css = 'catalog/view/theme/default/stylesheet/rcategory/rcategory.css?v=' .$this->data['timeModified'] = time(). '';
		}				
		
		//$this->document->addStyle('catalog/view/theme/default/stylesheet/rcategory/rcategory.css');
		$this->document->addStyle($css);
		
		if(isset($this->request->get['path'])){
			$parts = explode('_', $this->request->get['path']);
			$category_id = end($parts);
			
			$category_name = $this->model_module_rcategory->getCategoryName($category_id);
			$replace = array(
				'{cname}' => $category_name,
			);
			
			if(isset($this->request->get['product_id'])){
				$product_name = $this->model_module_rcategory->getProductName($this->request->get['product_id']);
				if($product_name){
					$replace['{pname}'] = $product_name;
				}			
			}

			$title = isset($setting['title']) ? strtr($setting['title'][$this->config->get('config_language_id')],$replace) : $this->language->get('heading_title');

			$this->data['heading_title'] = $title;
			$this->data['rcatproducts'] = array();
			
			$rcategories = $this->model_module_rcategory->getRcategories($category_id);
			
			if($rcategories) {

				foreach($rcategories as $rcategory) {

					$rproducts = array();

					$products = $this->model_module_rcategory->getRproducts($rcategory['rcategory_id'],$rcategory['limit'],$setting);
					
					foreach($products as $result){

						if ($result['image']) {
							$image = $this->model_tool_image->resize($result['image'], $setting['image_width'], $setting['image_height']);
						} else {
							$image = false;
						}

						if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
							$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
						} else {
							$price = false;
						}

						if ((float)$result['special']) {
							$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
						} else {
							$special = false;
						}

						if ($this->config->get('config_review_status')) {
							$rating = $result['rating'];
						} else {
							$rating = false;
						}
						
						
				if ($this->config->get('config_sticker_special_rcategory')) {
					if ((float)$result['special']) {
						if ($result['price'] > 0) {
							$sale = '<div class="stiker-special-module">' . '-' . round((($result['price'] - $result['special'])/$result['price'])*100, 0) . '<span>%</span>' . '</div>';
						} else {
							$sale = false;
						}	
					} else {
						$sale = false;
					}			
				} else {
					$sale = false;
				}
				
				
				if ($this->config->get('config_sticker_new_rcategory')) {
					if (($result['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new-module"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_rcategory')) {
					if (($result['viewed']) > ($limit_viewed_popular_product)) {
						$popular = '<div class="stiker-popular-module"></div>';
					} else {
						$popular = false;
					}
				} else {
					$popular = false;
				}							
						
								

				// title
			$this->load->model('catalog/category');
			$categories_t = $this->model_catalog_product->getCategories($result['product_id']);
			if ($categories_t){
				$length = count($categories_t);
				for ($i = 0; $i < $length; $i++) {
  					if($categories_t[$i]['main_category']==1) {
  						$cat_id = $categories_t[$i]['category_id'];
  					}
				}
				$category_name = $this->model_catalog_category->getCategory($cat_id);
				$product_title = $this->model_catalog_product->getCategoryProductTitle($cat_id);
			}
			// attribute
			$attributes_t = $this->model_catalog_product->getProductAttributes($result['product_id']);
			if(!empty($attributes_t)) {
				foreach ($attributes_t[0]['attribute'] as $attr) {
					if(isset($product_title['attribute'])&&$attr['attribute_id']==$product_title['attribute']) {
						$attr_name = $attr['text'];
					}
				}
			}
			// attribute

			$name = "";
			if(!empty($product_title)) {
				// before
				if (isset($product_title['attribute'])&&isset($product_title['attribute_where'])&&$product_title['attribute_where']==1) {
					$name .= $attr_name." ";
				}				
				if (isset($product_title['category'])&&$product_title['category']==1) {
					$name .= $category_name['name']." ";
				}
				if (isset($product_title['manufacture'])&&$product_title['manufacture']==1) {
					$name .= $result['manufacturer']." ";
				}				
				if (isset($product_title['model'])&&$product_title['model']==1) {
					$name .= $result['model']." ";
				}
				// before
				$name .= $result['name'];
				// after
				if (isset($product_title['attribute'])&&isset($product_title['attribute_where'])&&$product_title['attribute_where']==2) {
					$name .= " ".$attr_name;
				}				
				if (isset($product_title['category'])&&$product_title['category']==2) {
					$name .= " ".$category_name['name'];
				}
				if (isset($product_title['manufacture'])&&$product_title['manufacture']==2) {
					$name .= " ".$result['manufacturer'];
				}				
				if (isset($product_title['model'])&&$product_title['model']==2) {
					$name .= " ".$result['model'];
				}
				// after
			} else {
				$name .= $result['name'];
			}			
					// price sign
					if (!empty($category_name['price_sign'])) {
						$np = $price."/".html_entity_decode($category_name['price_sign']);
						if($special) {
							$ns = $special."/".html_entity_decode($category_name['price_sign']);
						} else {
							$ns = false;
						}
					} else {
						$np = $price;
						if($special) {
							$ns = $special;
						} else {
							$ns = false;
						}
					}
					// price sign

				// title
								

						$rproducts[] = array(
							'product_id' 	=> $result['product_id'],
							'thumb'   	 	=> $image,
							'no_image'    => $this->model_tool_image->resize('no_image.jpg', $setting['image_width'], $setting['image_height']),
							//'name'    	 	=> $result['name'],
							'name'    	  => $name,
							'catname'			=> $category_name['catname'],
							'brandlink'			=> $category_name['brandlink'],
							'category_name'			=> $category_name['name'],	
							'price'   	  => $np,
							'special' 	  => $ns,
							'manufacturer' => $result['manufacturer'],
							'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
							'rating'     	=> $rating,
							'sale' 	  	  => $sale,
							'new'     	  => $new,
							'popular'     => $popular,								
							'reviews'       => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
							'href'    	 	=> $this->url->link('product/product', 'product_id=' . $result['product_id'])
						);
					}
					
					if($rproducts) {							
						$this->data['products'] = $rproducts;

						$rcategory_path = $this->url->link('product/category', 'path=' . $this->model_module_rcategory->getRcategoryLink($rcategory['rcategory_id']));
						
						if($setting['show_link']['status']) {
							$product_total = '';
								
							if($setting['show_link']['show_pcount']) {
								$data = array(
									'filter_category_id'  => $rcategory['rcategory_id'],
									'filter_sub_category' => false
								);						
								$product_total = 0;
							}						
							
							$rcategory_path = $this->url->link('product/category', 'path=' . $this->model_module_rcategory->getRcategoryLink($rcategory['rcategory_id']));
													
							$replace = array(
								'{cname}'	=> sprintf($this->language->get('text_category_link'), $rcategory_path, $rcategory['name']),
								'{pqnt}' 	=> $product_total
							);
														
							$goto_rcategory = strtr($setting['show_link']['text'][$this->config->get('config_language_id')],$replace);
						} else {
							$goto_rcategory = '';
						}

						$this->data['rcatproducts'][] = array(
							'rcategory_id'		=>	$rcategory['rcategory_id'],
							'rcategory_name'	=>	$rcategory['name'],
							'goto_rcategory'	=> 	$goto_rcategory,
							'rproducts'			=>	$this->data['products']
						);
					}
				}
			}
		}
		
		$this->data['module'] = $module;
		$module++;

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/rcategory.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/rcategory.tpl';
		} else {
			$this->template = 'default/template/module/rcategory.tpl';
		}

		$this->render();
	}
}
?>
