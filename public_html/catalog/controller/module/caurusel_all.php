<?php
class ControllerModuleCauruselAll extends Controller {
	protected function index($setting) {
		static $module = 0;

		$this->document->addScript('catalog/view/javascript/owl.carousel.js');
		
		if (file_exists('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/caurusel_all.css')) {
			$this->document->addStyle('catalog/view/theme/' . $this->config->get('config_template') . '/stylesheet/caurusel_all.css?v=' .$this->data['timeModified'] = time(). '');
		} else {
			$this->document->addStyle('catalog/view/theme/default/stylesheet/caurusel_all.css?v=' .$this->data['timeModified'] = time(). '');
		}
		
		$this->load->model('caurusel_all/model');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');
		
		$this->data['use_scrolling_panel'] = $setting['use_scrolling_panel'];
		$this->data['scroll'] = $setting['scroll'];
		$this->data['visible'] = $setting['visible'];
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['button_compare'] = $this->language->get('button_compare');
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		
		$results = array();
		
		
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
		
		
		$filter_type = $setting['filter_type'];
		switch($filter_type)
		{
		case "popular":
			$results = $this->model_catalog_product->getPopularProducts($setting['limit']);
			break;
			
//рекомендуемые
		case "featureds":
		$this->data['products'] = array();

		$products = explode(',', $this->config->get('featureds_product'));		

		if (empty($setting['limit'])) {
			$setting['limit'] = 5;
		}
		
		$products = array_slice($products, 0, (int)$setting['limit']);
		
		foreach ($products as $product_id) {
			$product_info = $this->model_catalog_product->getFeaturedProduct($product_id);
			
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
				if ($product_info['minimum']) {
			       $this->data['minimum'] = $product_info['minimum'];
		    	} else {
				   $this->data['minimum'] = 1;
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
				
				
				$this->data['products'][] = array(
					'product_id' => $product_info['product_id'],
					'thumb'   	 => $image,
					'no_image'    => $this->model_tool_image->resize('no_image.jpg', $setting['image_width'], $setting['image_height']),
					'name'    	  => $name,
					'catname'			=> $category_name['catname'],
					'brandlink'			=> $category_name['brandlink'],
					'category_name'			=> $category_name['name'],	
					'price'   	  => $np,
					'special' 	  => $ns,
					'manufacturer' => $result['manufacturer'],
					'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
					'special' 	 => $special,
					'minimum'    => $product_info['minimum'], 
					'rating'     => $rating,
					'sale' 	  	  => $sale,
					'new'     	  => $new,
					'popular'     => $popular,
					'attribute_groups' => $this->model_catalog_product->getProductAttributes($product_info['product_id']),
					'description' => mb_substr(strip_tags(html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8')), 0, 250) . '..',
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
				);
			}
		}
			break;
//рекомендуемые end

		case "special":
			$data = array(
			//'sort'  => 'p.price',
			//'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
			);
			$results = $this->model_catalog_product->getProductSpecials($data);
			break;
		case "bestseller":
			$results = $this->model_catalog_product->getBestSellerProducts($setting['limit']);
			break;
		case "latest":
			$results = $this->model_catalog_product->getLatestProducts($setting['limit']);
			break;
		case "latestreview":		
			$results_data = $this->model_caurusel_all_model->getLatestReviewProducts($setting['limit']);
			foreach($results_data as $products_data){
				$results[] = $this->model_catalog_product->getproduct($products_data['product_id']);
			}
			break;
		case "category":	
			$data = array(
			'filter_category_id' => $setting['filter_type_category'],
			//'sort'  => 'p.price',
			//'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit'],
			$this->data['category_href'] = $this->url->link('product/category', 'path=' . $setting['filter_type_category'])
			);
			$results = $this->model_catalog_product->getFeaturedProducts($data);
			break;
		}
		
		$this->data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		
		
		foreach ($results as $result) {
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
			
			if ($result['minimum']) {
			    $this->data['minimum'] = $result['minimum'];
			} else {
				$this->data['minimum'] = 1;
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
			
			
			$this->data['products'][] = array(
				'product_id' => $result['product_id'],
				'thumb'   	 => $image,
				'no_image'    => $this->model_tool_image->resize('no_image.jpg', $setting['image_width'], $setting['image_height']),
				'name'    	  => $name,
				'catname'			=> $category_name['catname'],
				'brandlink'			=> $category_name['brandlink'],
				'category_name'			=> $category_name['name'],	
				'price'   	  => $np,
				'special' 	  => $ns,
				'manufacturer' => $result['manufacturer'],
				'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
				'minimum'    => $result['minimum'], 
				'rating'     => $rating,
				'sale' 	  	  => $sale,
				'new'     	  => $new,
				'popular'     => $popular,	
				'attribute_groups' => $this->model_catalog_product->getProductAttributes($result['product_id']),
                'description' => mb_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 250) . '..',
				'reviews'    => sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
				'href'    	 => $this->url->link('product/product', 'product_id=' . $result['product_id']),
			);
		}
		
		$this->data['module'] = $module++;
		$this->data['template'] = $this->config->get('config_template');
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/caurusel_all.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/caurusel_all.tpl';
		} else {
			$this->template = 'default/template/module/caurusel_all.tpl';
		}

		$this->render();
	}
}
?>