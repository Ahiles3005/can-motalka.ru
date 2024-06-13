<?php  
class ControllerModuleProductViewed extends Controller {

	protected function index($setting) {
		$this->language->load('module/product_viewed');
 
      	$this->data['heading_title'] = $this->language->get('heading_title');
				
		$this->data['button_cart'] = $this->language->get('button_cart');
		
		$this->load->model('catalog/product');
		
		$this->load->model('catalog/category');
		
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
		
		$this->document->addStyle('catalog/view/theme/default/stylesheet/product_viewed.css?v=' .$this->data['timeModified'] = time(). '');
		
		if (!isset($_SESSION['product_viewed'])) {
			$_SESSION['product_viewed'] = array();
		}
		
		if (empty($setting['limit'])) {
			$setting['limit'] = 5;
		}

		$results = array_slice(array_reverse($_SESSION['product_viewed'], TRUE), 0, $setting['limit']);
		
		foreach ($results as $product_id) {
			
			$product_info =  $this->model_catalog_product->getProduct($product_id);
			
			if ($product_info) {
			
				if ($product_info['image']) {
					$image = $this->model_tool_image->resize($product_info['image'], $setting['image_width'], $setting['image_height']);
				} else {
					$image = false;
				}
				
				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}
						
				if ((float)$product_info['special']) {
					$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}	
				
				if ($this->config->get('config_review_status')) {
					$rating = $product_info['rating'];
				} else {
					$rating = false;
				}
				
				if ($this->config->get('config_sticker_special_product_viewed')) {
					if ((float)$product_info['special']) {
						if ($product_info['price'] > 0) {
							$sale = '<div class="stiker-special-module">' . '-' . round((($product_info['price'] - $product_info['special'])/$product_info['price'])*100, 0) . '<span>%</span>' . '</div>';
						} else {
							$sale = false;
						}	
					} else {
						$sale = false;
					}			
				} else {
					$sale = false;
				}
				
				
				if ($this->config->get('config_sticker_new_product_viewed')) {
					if (($product_info['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new-module"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_product_viewed')) {
					if (($product_info['viewed']) > ($limit_viewed_popular_product)) {
						$popular = '<div class="stiker-popular-module"></div>';
					} else {
						$popular = false;
					}
				} else {
					$popular = false;
				}
				
				// title
			$this->load->model('catalog/category');
			$categories_t = $this->model_catalog_product->getCategories($product_info['product_id']);
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
			$attributes_t = $this->model_catalog_product->getProductAttributes($product_info['product_id']);
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
					$name .= $product_info['manufacturer']." ";
				}				
				if (isset($product_title['model'])&&$product_title['model']==1) {
					$name .= $product_info['model']." ";
				}
				// before
				$name .= $product_info['name'];
				// after
				if (isset($product_title['attribute'])&&isset($product_title['attribute_where'])&&$product_title['attribute_where']==2) {
					$name .= " ".$attr_name;
				}				
				if (isset($product_title['category'])&&$product_title['category']==2) {
					$name .= " ".$category_name['name'];
				}
				if (isset($product_title['manufacture'])&&$product_title['manufacture']==2) {
					$name .= " ".$product_info['manufacturer'];
				}				
				if (isset($product_title['model'])&&$product_title['model']==2) {
					$name .= " ".$product_info['model'];
				}
				// after
			} else {
				$name .= $product_info['name'];
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
								
				$this->data['products'][] = array(
					'product_id' => $product_info['product_id'],
					'thumb'   	 => $image,
					'no_image'    => $this->model_tool_image->resize('no_image.jpg', $setting['image_width'], $setting['image_height']),
					//'name'    	 => $product_info['name'],
					'name'    	  => $name,
					'catname'	  => $category_name['catname'],
					'brandlink'	  => $category_name['brandlink'],
					'category_name'	 => $category_name['name'],	
					'price'   	  => $np,
					'special' 	  => $ns,
					//'price'   	 => $price,
					'manufacturer' => $product_info['manufacturer'],
					'manufacturer_link'	=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']),
					'special' 	 => $special,
					'rating'     => $rating,
					'sale' 	  	 => $sale,
					'new'     	 => $new,
					'popular'    => $popular,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
				);
			
			}
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/product_viewed.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/product_viewed.tpl';
		} else {
			$this->template = 'default/template/module/product_viewed.tpl';
		}

		$this->render();
	}
}
?>