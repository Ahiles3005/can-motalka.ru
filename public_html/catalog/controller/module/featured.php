<?php
class ControllerModuleFeatured extends Controller {
	protected function index($setting) {
		$this->language->load('module/featured'); 

      	$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['setting'] = $setting;
		
		$this->document->addScript('catalog/view/javascript/jquery/tabs.js');
		$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
		$this->data['button_quick_view'] = $this->language->get('button_quick_view');
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		$this->data['button_compare'] = $this->language->get('button_compare');
		
		$this->data['quick_view_featured'] = $this->config->get('config_quick_view_featured');
		
		$this->data['top_bottom'] = $setting['position'] == 'content_top' || $setting['position'] == 'content_bottom';
		$this->data['side_left'] = $setting['position'] == 'column_left';
		$this->data['side_right'] = $setting['position'] == 'column_right';
		$this->data['side'] = $setting['position'] == 'column_left' || $setting['position'] == 'column_right';
		
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
		
		$this->load->model('catalog/product'); 
		
		$this->load->model('tool/image');

		$this->data['products'] = array();

		$products = explode(',', $this->config->get('featured_product'));		

		if (empty($setting['limit'])) {
			$setting['limit'] = 5;
		}
		
		$products = array_slice($products, 0, (int)$setting['limit']);
		
		$timestamp 			= time();
		$date_time_array 	= getdate($timestamp);
		$hours 				= $date_time_array['hours'];
		$minutes 			= $date_time_array['minutes'];
		$seconds 			= $date_time_array['seconds'];
		$month 				= $date_time_array['mon'];
		$day 				= $date_time_array['mday'];
		$year 				= $date_time_array['year'];

		$timestamp = mktime($hours, $minutes, $seconds, $month,$day - $limit_days_new_product, $year);
		
		foreach ($products as $product_id) {
			$product_info = $this->model_catalog_product->getProduct($product_id);
			
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
				
				if ($this->config->get('config_sticker_special_module_featured')) {
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
				
				
				if ($this->config->get('config_sticker_new_module_featured')) {
					if (($product_info['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new-module"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_module_featured')) {
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
					'product_id'  => $product_info['product_id'],
					'thumb'   	  => $image,
					'no_image'    => $this->model_tool_image->resize('no_image.jpg', $setting['image_width'], $setting['image_height']),
					//'name'    	  => $product_info['name'],
					'name'    	  => $name,
					'catname'			=> $category_name['catname'],
					'brandlink'			=> $category_name['brandlink'],
					'category_name'			=> $category_name['name'],
					'manufacturer'			=> $product_info['manufacturer'],
					'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']),
					'description' => utf8_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_grid_description_limit')) . '...',
					'price'   	  => $np,
					'special' 	  => $ns,
					'rating'      => $rating,
					'sale' 	  	  => $sale,
					'new'     	  => $new,
					'popular'     => $popular,
					'reviews'     => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
					'href'    	  => $this->url->link('product/product', 'product_id=' . $product_info['product_id'])
				);
			}
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/featured.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/featured.tpl';
		} else {
			$this->template = 'default/template/module/featured.tpl';
		}

		$this->render();
	}
}
?>