<?php  
class ControllerProductProduct extends Controller {
	private $error = array(); 
	
	public function index() { 
		$this->language->load('product/product');
		$this->language->load('common/footer');
	
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),			
			'separator' => false
		);
		
		$this->load->model('catalog/category');	
		
		if (isset($this->request->get['path'])) {
			$path = '';
			
			$parts = explode('_', (string)$this->request->get['path']);
			
			$category_id = (int)array_pop($parts);
				
			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}
				
				$category_info = $this->model_catalog_category->getCategory($path_id);
				
				$this->data['cat_id'] = $path_id;
				
				if ($category_info) {
					$this->data['breadcrumbs'][] = array(
						'text'      => $category_info['name'],
						'href'      => $this->url->link('product/category', 'path=' . $path),
						'separator' => $this->language->get('text_separator')
					);
				}
			}
			
			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);
				
			if ($category_info) {			
				$url = '';
				
				if (isset($this->request->get['sort'])) {
					$url .= '&sort=' . $this->request->get['sort'];
				}	
	
				if (isset($this->request->get['order'])) {
					$url .= '&order=' . $this->request->get['order'];
				}	
				
				if (isset($this->request->get['page'])) {
					$url .= '&page=' . $this->request->get['page'];
				}
				
				if (isset($this->request->get['limit'])) {
					$url .= '&limit=' . $this->request->get['limit'];
				}
										
				$this->data['breadcrumbs'][] = array(
					'text'      => $category_info['name'],
					'href'      => $this->url->link('product/category', 'path=' . $this->request->get['path']),
					'separator' => $this->language->get('text_separator')
				);
			}
		}
		
		$this->load->model('catalog/manufacturer');	
		
		if (isset($this->request->get['manufacturer_id'])) {
			$this->data['breadcrumbs'][] = array( 
				'text'      => $this->language->get('text_brand'),
				'href'      => $this->url->link('product/manufacturer'),
				'separator' => $this->language->get('text_separator')
			);	
	
			$url = '';
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}	
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
							
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($this->request->get['manufacturer_id']);

			if ($manufacturer_info) {	
				$this->data['breadcrumbs'][] = array(
					'text'	    => $manufacturer_info['name'],
					'href'	    => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url),					
					'separator' => $this->language->get('text_separator')
				);
			}
		}
		
		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$url = '';
			
			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}
						
			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}
						
			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}
			
			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}	

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
												
			$this->data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_search'),
				'href'      => $this->url->link('product/search', $url),
				'separator' => $this->language->get('text_separator')
			); 	
		}
		
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
		
		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}
		
		$this->load->model('catalog/product');
		
		$product_info = $this->model_catalog_product->getProduct($product_id);
		
		if ($product_info) {
			$url = '';
			
			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}
						
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}
						
			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}			

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}
						
			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}
			
			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}	
						
			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}
			
			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}	
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}	
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
		if (!isset($_SESSION['product_viewed'][$product_id])){
			$_SESSION['product_viewed'][$product_id] = $product_id;
		}
																		
			$this->data['breadcrumbs'][] = array(
				'text'      => $product_info['name'],
				'href'      => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id']),
				'separator' => $this->language->get('text_separator')
			);			
			
			//if ($product_info['seo_title']) {
		  	//	$this->document->setTitle($product_info['seo_title']);
			//} else {
		  	//	$this->document->setTitle($product_info['name']);
			//}

			$this->document->setDescription($product_info['meta_description']);
			$this->document->setKeywords($product_info['meta_keyword']);
			$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');
			$this->document->setOgurl($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']));
			
			//if ($product_info['seo_h1']) {
			//	$this->data['heading_title'] = $product_info['seo_h1'];
			//} else {
			//	$this->data['heading_title'] = $product_info['name'];
			//}

			// product title
			//$product_cat = $this->model_catalog_product->getCategories($product_id);      
			//$product_cat_parent = $this->model_catalog_category->getCategory($product_cat[2]['category_id']);
			////$product_title = $this->model_catalog_product->getCategoryProductTitle($product_cat_parent['parent_id']);
			//$product_title = $this->model_catalog_product->getCategoryProductTitle($product_cat_parent['category_id']);
			//$category_name = $this->model_catalog_category->getCategory($product_cat_parent['category_id']);
			$categories = $this->model_catalog_product->getCategories($product_info['product_id']);
			if ($categories){
				$length = count($categories);
				for ($i = 0; $i < $length; $i++) {
  					if($categories[$i]['main_category']==1) {
  						$cat_id = $categories[$i]['category_id'];
  					}
				}
				//$categories_info = $this->model_catalog_category->getCategory($categories[0]['category_id']);
				//$this->data['category_id'] = $categories_info['category_id'];
				$category_name = $this->model_catalog_category->getCategory($cat_id);
				$product_title = $this->model_catalog_product->getCategoryProductTitle($cat_id);
			}
			// attribute
			$attributes = $this->model_catalog_product->getProductAttributes($product_info['product_id']);
			if(!empty($attributes)) {
				foreach ($attributes[0]['attribute'] as $attr) {
					if(isset($product_title['attribute'])&&$attr['attribute_id']==$product_title['attribute']) {
						$attr_name = $attr['text'];
					}
				}
			}
			// attribute

			$this->data['heading_title'] = "";
			if(!empty($product_title)) {
				// before
				if (isset($product_title['attribute'])&&isset($product_title['attribute_where'])&&$product_title['attribute_where']==1) {
					$this->data['heading_title'] .= $attr_name." ";
				}				
				if (isset($product_title['category'])&&$product_title['category']==1) {
					$this->data['heading_title'] .= $category_name['name']." ";
				}
				if (isset($product_title['manufacture'])&&$product_title['manufacture']==1) {
					$this->data['heading_title'] .= $product_info['manufacturer']." ";
				}				
				if (isset($product_title['model'])&&$product_title['model']==1) {
					$this->data['heading_title'] .= $product_info['model']." ";
				}
				// before
				if ($product_info['seo_h1']) {
					$this->data['heading_title'] .= $product_info['seo_h1'];
				} else {
					$this->data['heading_title'] .= $product_info['name'];
				}
				// after
				if (isset($product_title['attribute'])&&isset($product_title['attribute_where'])&&$product_title['attribute_where']==2) {
					$this->data['heading_title'] .= " ".$attr_name;
				}				
				if (isset($product_title['category'])&&$product_title['category']==2) {
					$this->data['heading_title'] .= " ".$category_name['name'];
				}
				if (isset($product_title['manufacture'])&&$product_title['manufacture']==2) {
					$this->data['heading_title'] .= " ".$product_info['manufacturer'];
				}				
				if (isset($product_title['model'])&&$product_title['model']==2) {
					$this->data['heading_title'] .= " ".$product_info['model'];
				}
				// after
				if ($product_info['seo_title']) {
		  			$this->document->setTitle($product_info['seo_title']);
				} else {
		  			$this->document->setTitle($this->data['heading_title']);
				}
			} else {				
				if ($product_info['seo_title']) {
		  			$this->document->setTitle($product_info['seo_title']);
				} else {
		  			$this->document->setTitle($product_info['name']);
				}
				if ($product_info['seo_h1']) {
					$this->data['heading_title'] .= $product_info['seo_h1'];
				} else {
					$this->data['heading_title'] .= $product_info['name'];
				}
			}
			//$this->data['name'] = $product_cat_parent['category_id'];
			//print_r($product_title);
			// product title
							
			$this->data['text_select'] = $this->language->get('text_select');
			$this->data['text_from'] = $this->language->get('text_from');
			$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
			$this->data['text_model'] = $this->language->get('text_model');
			$this->data['text_sku'] = $this->language->get('text_sku');
			$this->data['text_upc'] = $this->language->get('text_upc');
			$this->data['text_ean'] = $this->language->get('text_ean');
			$this->data['text_jan'] = $this->language->get('text_jan');
			$this->data['text_isbn'] = $this->language->get('text_isbn');
			$this->data['text_mpn'] = $this->language->get('text_mpn');
			$this->data['text_location'] = $this->language->get('text_location');
			$this->data['text_weight'] = $this->language->get('text_weight');
			$this->data['text_reward'] = $this->language->get('text_reward');
			$this->data['text_points'] = $this->language->get('text_points');	
			$this->data['text_discount'] = $this->language->get('text_discount');
			$this->data['text_stock'] = $this->language->get('text_stock');
			$this->data['text_price'] = $this->language->get('text_price');
			$this->data['text_tax'] = $this->language->get('text_tax');
			$this->data['text_discount'] = $this->language->get('text_discount');
			$this->data['text_option'] = $this->language->get('text_option');
			$this->data['text_qty'] = $this->language->get('text_qty');
			$this->data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$this->data['text_or'] = $this->language->get('text_or');
			$this->data['text_write'] = $this->language->get('text_write');
			$this->data['text_login_write'] = sprintf($this->language->get('text_login_write'), $this->url->link('account/login', '', 'SSL'), $this->url->link('account/register', '', 'SSL'));
			$this->data['text_note'] = $this->language->get('text_note');
			$this->data['text_share'] = $this->language->get('text_share');
			$this->data['text_wait'] = $this->language->get('text_wait');
			$this->data['text_tags'] = $this->language->get('text_tags');
			$this->data['text_contact'] = $this->language->get('text_contact');
			$this->data['contact'] = $this->url->link('information/contact');
			
			$this->data['entry_name'] = $this->language->get('entry_name');
			$this->data['entry_review'] = $this->language->get('entry_review');
			$this->data['entry_rating'] = $this->language->get('entry_rating');
			$this->data['entry_good'] = $this->language->get('entry_good');
			$this->data['entry_bad'] = $this->language->get('entry_bad');
			$this->data['entry_captcha'] = $this->language->get('entry_captcha');
			
			$this->data['button_cart'] = $this->language->get('button_cart');
			$this->data['button_wishlist'] = $this->language->get('button_wishlist');
			$this->data['button_compare'] = $this->language->get('button_compare');			
			$this->data['button_upload'] = $this->language->get('button_upload');
			$this->data['button_continue'] = $this->language->get('button_continue');
			
			$this->load->model('catalog/review');
			
			$this->data['text_units_sold'] = $this->language->get('text_units_sold');
			$this->data['units_sold'] = $this->model_catalog_product->getUnitsSold($product_id);

			$this->data['tab_description'] = $this->language->get('tab_description');
			$this->data['tab_attribute'] = $this->language->get('tab_attribute');
			$this->data['tab_review'] = sprintf($this->language->get('tab_review'), $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']));
			$this->data['tab_related'] = $this->language->get('tab_related');
			
			$this->data['product_id'] = $this->request->get['product_id'];
			$this->data['manufacturer'] = $product_info['manufacturer'];
			$this->data['categories'] = $categories;
			$this->data['manufacturers'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']);
			$this->data['model'] = $product_info['model'];
			$this->data['sku'] = $product_info['sku'];
			$this->data['upc'] = $product_info['upc'];
			$this->data['ozon'] = $product_info['ozon'];
			$this->data['ean'] = $product_info['ean'];
			$this->data['jan'] = $product_info['jan'];
			$this->data['isbn'] = $product_info['isbn'];
			$this->data['mpn'] = $product_info['mpn'];
			$this->data['location'] = $product_info['location'];
			$this->data['reward'] = $product_info['reward'];
			$this->data['points'] = $product_info['points'];
			
			if ($product_info['weight'] > 0) {
				$this->data['weight'] = $this->weight->format($product_info['weight'], $product_info['weight_class_id'], $this->language->get('decimal_point'), $this->language->get('thousand_point'));
			} else {
				$this->data['weight'] = '';
			}
			
			$this->data['display_weight'] = $this->config->get('config_display_weight');
			
			$this->data['config_zoom'] = $this->config->get('config_zoom_images_product');
			
			$this->data['quantity'] = $product_info['quantity'];
			
			if ($product_info['quantity'] <= 0) {
				$this->data['stock'] = $product_info['stock_status'];
			} elseif ($this->config->get('config_stock_display')) {
				$this->data['stock'] = $product_info['quantity'];
			} else {
				$this->data['stock'] = $this->language->get('text_instock');
			}
			
			if ($this->config->get('config_sticker_special_product')) {
				if ((float)$product_info['special']) {
					if ($product_info['price'] > 0) {
						if ($this->config->get('config_zoom_images_product')) {
							$this->data['sale'] = '<div class="stiker-special-product">' . '-' . round((($product_info['price'] - $product_info['special'])/$product_info['price'])*100, 0) . '<span>%</span>' . '</div>';
						} else {
							$this->data['sale'] = '<div class="stiker-special-product-not-zoom">' . '-' . round((($product_info['price'] - $product_info['special'])/$product_info['price'])*100, 0) . '<span>%</span>' . '</div>';
						}
					} else {
						$this->data['sale'] = false;
					}	
				} else {
					$this->data['sale'] = false;
				}			
			} else {
				$this->data['sale'] = false;
			}
			
			if ($this->config->get('config_sticker_new_product')) {
				if (($product_info['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
					$this->data['new'] = '<div class="stiker-new-product"></div>';
				} else {
					$this->data['new'] = false;
				}
			} else {
				$this->data['new'] = false;
			}
			
			if ($this->config->get('config_sticker_popular_product')) {
				if (($product_info['viewed']) > ($limit_viewed_popular_product)) {
					if ($this->config->get('config_zoom_images_product')) {
						$this->data['popular'] = '<div class="stiker-popular-product"></div>';
					} else {
						$this->data['popular'] = '<div class="stiker-popular-product-no-zoom"></div>';
					}
				} else {
					$this->data['popular'] = false;
				}
			} else {
				$this->data['popular'] = false;
			}
			
			
			if ($product_info['quantity'] <= 0){
				$this->data['stock'] = '<div class="cssload-jar none"><div class="cssload-base"><div class="cssload-liquid"> </div><div class="cssload-wave"></div><div class="cssload-wave"></div></div></div><div class="text-none">'.$this->language->get('text_stock_n').'</div>';
			} elseif ($product_info['quantity'] >= 1 && $product_info['quantity'] <= 7) {
				$this->data['stock'] = '<div class="cssload-jar mini"><div class="cssload-base"><div class="cssload-liquid"> </div><div class="cssload-wave"></div><div class="cssload-wave"></div></div></div><div class="text-min">'.$this->language->get('text_stock_s').'</div>';
			} elseif ($product_info['quantity'] >= 8 && $product_info['quantity'] <= 15) {
				$this->data['stock'] = '<div class="cssload-jar medium"><div class="cssload-base"><div class="cssload-liquid"> </div><div class="cssload-wave"></div><div class="cssload-wave"></div></div></div><div class="text-medium">'.$this->language->get('text_stock_l').'</div>';
			} else {
				$this->data['stock'] = '<div class="cssload-jar max"><div class="cssload-base"><div class="cssload-liquid"> </div><div class="cssload-wave"></div><div class="cssload-wave"></div></div></div><div class="text-max">'.$this->language->get('text_stock_b').'</div>';
			}
			
			$this->load->model('tool/image');

			if ($product_info['image']) {
				$this->data['popup'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
				$this->document->setOgimage($this->model_tool_image->resize($product_info['image'], 450, 450));
			} else {
				$this->data['popup'] = $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));
			}
			
			if ($product_info['image']) {
				$this->data['thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
			} else {
				$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height'));
			}
			
			if ($product_info['image']) {
				$this->data['small'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'));
			} else {
				$this->data['small'] = $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'));
			}		
			
			$this->data['images'] = array();
			
			$results = $this->model_catalog_product->getProductImages($this->request->get['product_id']);
			
			foreach ($results as $result) {
				$this->data['images'][] = array(
					'popup' 	 => $this->model_tool_image->resize($result['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height')),
					'thumb' 	 => $this->model_tool_image->resize($result['image'], $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height')),
					'thumb_zoom' => $this->model_tool_image->resize($result['image'], $this->config->get('config_image_thumb_width'), $this->config->get('config_image_thumb_height')),
					'small' 	 => $this->model_tool_image->resize($result['image'], $this->config->get('config_image_additional_width'), $this->config->get('config_image_additional_height'))
				);
			}	
			
			$this->load->model('catalog/manufacturer');	
			
			$manufacturer_image = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);
         
            if($manufacturer_image){
               $this->data['brand_image'] = $this->model_tool_image->resize($manufacturer_image['image'], 100, 70);
            } else {
               $this->data['brand_image'] = '';
            }	
						
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				//$this->data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				$price = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
			} else {
				//$this->data['price'] = false;
				$price = false;
			}
						
			if ((float)$product_info['special']) {
				//$this->data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
				$special = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')));
			} else {
				//$this->data['special'] = false;
				$special = false;
			}

					// price sign
					if (!empty($category_name['price_sign'])) {
						$this->data['price'] = $price."/".html_entity_decode($category_name['price_sign']);
						if($special) {
							$this->data['special'] = $special."/".html_entity_decode($category_name['price_sign']);
						} else {
							$this->data['special'] = false;
						}
					} else {
						$this->data['price'] = $price;
						if($special) {
							$this->data['special'] = $special;
						} else {
							$this->data['special'] = false;
						}
					}
					// price sign			
			
			if ($this->config->get('config_tax')) {
				$this->data['tax'] = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price']);
			} else {
				$this->data['tax'] = false;
			}
			
			$discounts = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);
			
			$this->data['discounts'] = array(); 
			
			foreach ($discounts as $discount) {
				$this->data['discounts'][] = array(
					'quantity' => $discount['quantity'],
					'price'    => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')))
				);
			}
			
			$this->data['options'] = array();
			
			foreach ($this->model_catalog_product->getProductOptions($this->request->get['product_id']) as $option) { 
				if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox' || $option['type'] == 'image') { 
					$option_value_data = array();
					
					foreach ($option['option_value'] as $option_value) {
						if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
							if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
								$price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax')));
							} else {
								$price = false;
							}
							
							$option_value_data[] = array(
								'product_option_value_id' => $option_value['product_option_value_id'],
								'option_value_id'         => $option_value['option_value_id'],
								'name'                    => $option_value['name'],
								'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
								'price'                   => $price,
								'price_prefix'            => $option_value['price_prefix']
							);
						}
					}
					
					$this->data['options'][] = array(
						'product_option_id' => $option['product_option_id'],
						'option_id'         => $option['option_id'],
						'name'              => $option['name'],
						'type'              => $option['type'],
						'option_value'      => $option_value_data,
						'required'          => $option['required']
					);					
				} elseif ($option['type'] == 'text' || $option['type'] == 'textarea' || $option['type'] == 'file' || $option['type'] == 'date' || $option['type'] == 'datetime' || $option['type'] == 'time') {
					$this->data['options'][] = array(
						'product_option_id' => $option['product_option_id'],
						'option_id'         => $option['option_id'],
						'name'              => $option['name'],
						'type'              => $option['type'],
						'option_value'      => $option['option_value'],

						'required'          => $option['required']
					);						
				}
			}
							
			if ($product_info['minimum']) {
				$this->data['minimum'] = $product_info['minimum'];
			} else {
				$this->data['minimum'] = 1;
			}
			
			$this->data['review_status'] = $this->config->get('config_review_status');
			if ($this->config->get('config_guest_review') || $this->customer->isLogged()) {
				$this->data['guest_review'] = true;
			} else {
				$this->data['guest_review'] = false;
			}
			
			if ($this->customer->isLogged()) {
				$this->data['customer_name'] = $this->customer->getFirstName() . '&nbsp;' . $this->customer->getLastName();
			} else {
				$this->data['customer_name'] = '';
			}

			$this->data['reviews'] = sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']);
			$this->data['rating'] = (int)$product_info['rating'];
			$this->data['description'] = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');
			$this->data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);
			
			$this->data['products'] = array();
			
			$results = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);

			//$this->load->model('catalog/category');
			
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('config_image_related_width'), $this->config->get('config_image_related_height'));
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
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}
				
				if ($this->config->get('config_sticker_special_product_related')) {
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
				
				if ($this->config->get('config_sticker_new_product_related')) {
					if (($result['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new-module"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_product_related')) {
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
							
				$this->data['products'][] = array(
					'product_id' => $result['product_id'],
					//'name'    	 => $result['name'],
					'name'    	 => $name,
					'catname'			=> $category_name['catname'],
					'brandlink'			=> $category_name['brandlink'],
					'category_name'			=> $category_name['name'],
					'manufacturer'			=> $result['manufacturer'],
					'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
					'thumb'   	 => $image,
					'no_image' 	 => $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_related_width'), $this->config->get('config_image_related_height')),
					//'price'   	 => $price,
					'price'   	 => $np,
					//'special' 	 => $special,
					'special' 	 => $ns,
					'rating'     => $rating,
					'sale' 	  	 => $sale,
					'new'     	 => $new,
					'popular'    => $popular,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}	
			
			$this->data['tags'] = array();
			
			if ($product_info['tag']) {		
				$tags = explode(',', $product_info['tag']);
				
				foreach ($tags as $tag) {
					$this->data['tags'][] = array(
						'tag'  => trim($tag),
						'href' => $this->url->link('product/search', 'tag=' . trim($tag))
					);
				}
			}
			
			$this->model_catalog_product->updateViewed($this->request->get['product_id']);
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/product.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/product.tpl';
			} else {
				$this->template = 'default/template/product/product.tpl';
			}
			
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer','module/catapulta',
				'common/header'
			);
						
			$this->response->setOutput($this->render());
		} else {
			$url = '';
			
			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}
						
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}	
						
			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}			

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}	
					
			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}
							
			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}
					
			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}
			
			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}	
			
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}	
			
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
														
      		$this->data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('text_error'),
				'href'      => $this->url->link('product/product', $url . '&product_id=' . $product_id),
        		'separator' => $this->language->get('text_separator')
      		);			
		
      		$this->document->setTitle($this->language->get('text_error'));

      		$this->data['heading_title'] = $this->language->get('text_error');

      		$this->data['text_error'] = $this->language->get('text_error');

      		$this->data['button_continue'] = $this->language->get('button_continue');

      		$this->data['continue'] = $this->url->link('common/home');
			
$this->data['name'] = $product_info['name'];
				$this->data['url'] = $this->url->link('product/product', 'product_id=' . $this->request->get['product_id']);
				$this->data['priceCurrency'] = $this->currency->getCode();
				$this->data['availability'] = $product_info['quantity'] ? true : false;
				$this->data['reviewCount'] = (int)$product_info['reviews'];
				$this->data['ratingValue'] = $product_info['rating'];
				//$this->data['image'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('config_image_popup_width'), $this->config->get('config_image_popup_height'));

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/error/not_found.tpl';
			} else {
				$this->template = 'default/template/error/not_found.tpl';
			}
			
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
			);
						
			$this->response->setOutput($this->render());
    	}
  	}
	
	public function review() {
    	$this->language->load('product/product');
		
		$this->load->model('catalog/review');

		$this->data['text_on'] = $this->language->get('text_on');
		$this->data['text_no_reviews'] = $this->language->get('text_no_reviews');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}  
		
		$this->data['reviews'] = array();
		
		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);
			
		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);
      		
		foreach ($results as $result) {
        	$this->data['reviews'][] = array(
        		'author'     => $result['author'],
				'text'       => $result['text'],
				'rating'     => (int)$result['rating'],
        		'reviews'    => sprintf($this->language->get('text_reviews'), (int)$review_total),
        		'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
        	);
      	}			
			
		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = 5; 
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('product/product/review', 'product_id=' . $this->request->get['product_id'] . '&page={page}');
			
		$this->data['pagination'] = $pagination->render();
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/review.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/review.tpl';
		} else {
			$this->template = 'default/template/product/review.tpl';
		}
		
		$this->response->setOutput($this->render());
	}
	
	public function write() {
		$this->language->load('product/product');
		
		$this->load->model('catalog/review');
		
		$json = array();
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}
			
			if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}
	
			if (empty($this->request->post['rating'])) {
				$json['error'] = $this->language->get('error_rating');
			}
	
			if (empty($this->session->data['captcha']) || ($this->session->data['captcha'] != $this->request->post['captcha'])) {
				$json['error'] = $this->language->get('error_captcha');
			}
				
			if (!isset($json['error'])) {
				$this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);
				
				$json['success'] = $this->language->get('text_success');
			}
		}
		
		$this->response->setOutput(json_encode($json));
	}
	
	public function captcha() {
		$this->load->library('captcha');
		
		$captcha = new Captcha();
		
		$this->session->data['captcha'] = $captcha->getCode();
		
		$captcha->showImage();
	}
	
	public function upload() {
		$this->language->load('product/product');
		
		$json = array();
		
		if (!empty($this->request->files['file']['name'])) {
			$filename = basename(preg_replace('/[^a-zA-Z0-9\.\-\s+]/', '', html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8')));
			
			if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 64)) {
        		$json['error'] = $this->language->get('error_filename');
	  		}	  	

			// Allowed file extension types
			$allowed = array();
			
			$filetypes = explode("\n", $this->config->get('config_file_extension_allowed'));
			
			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}
			
			if (!in_array(substr(strrchr($filename, '.'), 1), $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
       		}	
			
			// Allowed file mime types		
		    $allowed = array();
			
			$filetypes = explode("\n", $this->config->get('config_file_mime_allowed'));
			
			foreach ($filetypes as $filetype) {
				$allowed[] = trim($filetype);
			}
							
			if (!in_array($this->request->files['file']['type'], $allowed)) {
				$json['error'] = $this->language->get('error_filetype');
			}
						
			if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
			}
		} else {
			$json['error'] = $this->language->get('error_upload');
		}
		
		if (!$json && is_uploaded_file($this->request->files['file']['tmp_name']) && file_exists($this->request->files['file']['tmp_name'])) {
			$file = basename($filename) . '.' . md5(mt_rand());
			
			// Hide the uploaded file name so people can not link to it directly.
			$json['file'] = $this->encryption->encrypt($file);
			
			move_uploaded_file($this->request->files['file']['tmp_name'], DIR_DOWNLOAD . $file);
						
			$json['success'] = $this->language->get('text_upload');
		}	
		
		$this->response->setOutput(json_encode($json));		
	}
}
?>