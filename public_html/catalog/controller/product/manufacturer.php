<?php 
class ControllerProductManufacturer extends Controller {  
	public function index() {
		$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . '/1.1 404 Not Found');
		return $this->forward('error/not_found');
		$this->language->load('product/manufacturer');
		
		$this->load->model('catalog/manufacturer');
		
		$this->load->model('tool/image');		
		
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_index'] = $this->language->get('text_index');
		$this->data['text_empty'] = $this->language->get('text_empty');
		
		$this->data['button_continue'] = $this->language->get('button_continue');
		
		$this->data['breadcrumbs'] = array();
		
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
        	'separator' => false
      	);
		
		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_brand'),
			'href'      => $this->url->link('product/manufacturer'),
			'separator' => $this->language->get('text_separator')
		);
		
		$this->data['categories'] = array();
									
		$results = $this->model_catalog_manufacturer->getManufacturers();
	
		foreach ($results as $result) {
			if (is_numeric(utf8_substr($result['name'], 0, 1))) {
				$key = '0 - 9';
			} else {
				$key = utf8_substr(utf8_strtoupper($result['name']), 0, 1);
			}
			
			if (!isset($this->data['manufacturers'][$key])) {
				$this->data['categories'][$key]['name'] = $key;
			}
			
			if ($result['image']) {
				$image = $this->model_tool_image->resize($result['image'],150,150);
			} else {
				$image = '';
			}
			
			$this->data['categories'][$key]['manufacturer'][] = array(
				'name' => $result['name'],
				'image'=> $image,
				'href' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id'])
			);
		}
		
		$this->data['continue'] = $this->url->link('common/home');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/manufacturer_list.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/manufacturer_list.tpl';
		} else {
			$this->template = 'default/template/product/manufacturer_list.tpl';
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
	
	public function info() {
    	$this->language->load('product/manufacturer');
		
		$this->load->model('catalog/manufacturer');
		
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image'); 
		
		if (isset($this->request->get['manufacturer_id'])) {
			$manufacturer_id = (int)$this->request->get['manufacturer_id'];
		} else {
			$manufacturer_id = 0;
		} 
										
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
		} 

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		} 
  		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
				
		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = $this->config->get('config_catalog_limit');
		}

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array( 
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
      		'separator' => false
   		);
   		
		$this->data['breadcrumbs'][] = array( 
       		'text'      => $this->language->get('text_brand'),
			'href'      => $this->url->link('product/manufacturer'),
      		'separator' => $this->language->get('text_separator')
   		);
		
		$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($manufacturer_id);
	
		if ($manufacturer_info) {
			if ($manufacturer_info['seo_title']) {
				$this->document->setTitle($manufacturer_info['seo_title']);
			} else {
				$this->document->setTitle($manufacturer_info['name']);
			}
			
			if (
			isset($this->request->get['page']) ||
			isset($this->request->get['limit']) ||
			isset($this->request->get['order'])
			) {
				$this->document->setRobots('noindex,follow');
			}			
			
			$this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/tabs.js');
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
			
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
       			'text'      => $manufacturer_info['name'],
				'href'      => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url),
      			'separator' => $this->language->get('text_separator')
   			);
			
			if ($manufacturer_info['image']) {
				$this->data['thumb'] = $this->model_tool_image->resize($manufacturer_info['image'], 100, 100);
			} else {
				$this->data['thumb'] = '';
			}
			
			$this->data['description'] = html_entity_decode($manufacturer_info['description'], ENT_QUOTES, 'UTF-8');
		
			if ($manufacturer_info['seo_h1']) {
				$this->data['heading_title'] = $manufacturer_info['seo_h1'];
			} else {
				$this->data['heading_title'] = $manufacturer_info['name'];
			}
			
			$this->data['text_empty'] = $this->language->get('text_empty');
			$this->data['text_quantity'] = $this->language->get('text_quantity');
			$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
			$this->data['text_model'] = $this->language->get('text_model');
			$this->data['text_price'] = $this->language->get('text_price');
			$this->data['text_tax'] = $this->language->get('text_tax');
			$this->data['text_points'] = $this->language->get('text_points');
			$this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
			$this->data['text_display'] = $this->language->get('text_display');
			$this->data['text_list'] = $this->language->get('text_list');
			$this->data['text_grid'] = $this->language->get('text_grid');			
			$this->data['text_sort'] = $this->language->get('text_sort');
			$this->data['text_limit'] = $this->language->get('text_limit');
			  
			$this->data['button_quick_view'] = $this->language->get('button_quick_view');
			$this->data['button_cart'] = $this->language->get('button_cart');
			$this->data['button_wishlist'] = $this->language->get('button_wishlist');
			$this->data['button_compare'] = $this->language->get('button_compare');
			$this->data['button_continue'] = $this->language->get('button_continue');
			
			$this->data['quick_view_manufacturers'] = $this->config->get('config_quick_view_manufacturers');
			
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
			
			$this->data['compare'] = $this->url->link('product/compare');
			
			$this->data['products'] = array();
			
			$data = array(
				'filter_manufacturer_id' => $manufacturer_id, 
				'sort'                   => $sort,
				'order'                  => $order,
				'start'                  => ($page - 1) * $limit,
				'limit'                  => $limit
			);
					
			//$product_total = $this->model_catalog_product->getTotalProducts($data);
								
			$results = $this->model_catalog_product->getProducts($data);
					
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
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
				
				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
				} else {
					$tax = false;
				}				
				
				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}
				
				if ($this->config->get('config_sticker_special_manufacturer')) {
					if ((float)$result['special']) {
						if ($result['price'] > 0) {
							$sale = '<div class="stiker-special">' . '-' . round((($result['price'] - $result['special'])/$result['price'])*100, 0) . '<span>%</span>' . '</div>';
						} else {
							$sale = false;
						}	
					} else {
						$sale = false;
					}			
				} else {
					$sale = false;
				}
				
				if ($this->config->get('config_sticker_new_manufacturer')) {
					if (($result['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_manufacturer')) {
					if (($result['viewed']) > ($limit_viewed_popular_product)) {
						$popular = '<div class="stiker-popular"></div>';
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
					'product_id'  		=> $result['product_id'],
					//'name'        		=> $result['name'],
					'name'        		=> $name,
					'catname'			=> $category_name['catname'],
					'brandlink'			=> $category_name['brandlink'],
					'category_name'			=> $category_name['name'],
					'manufacturer'			=> $result['manufacturer'],
					'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
					'thumb'       		=> $image,
					'no_image'    		=> $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')),
					'description' 		=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_list_description_limit')) . '...',
					'description_list' 	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_list_description_limit')) . '...',
					'description_grid' 	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_grid_description_limit')) . '...',
					'price'       		=> $np,
					'special'     		=> $ns,
					'tax'         		=> $tax,
					'rating'      		=> $result['rating'],
					'sale' 	  	  		=> $sale,
					'new'     	  		=> $new,
					'popular'     		=> $popular,
					'reviews'     		=> sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'        		=> $this->url->link('product/product', '&manufacturer_id=' . $result['manufacturer_id'] . '&product_id=' . $result['product_id'] . $url)
				);
			}
					
			$url = '';
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
						
			$this->data['sorts'] = array();
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=p.sort_order&order=ASC' . $url)
			);
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=pd.name&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=pd.name&order=DESC' . $url)
			);
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=p.price&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=p.price&order=DESC' . $url)
			); 
			
			if ($this->config->get('config_review_status')) {
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=rating&order=DESC' . $url)
				); 
				
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=rating&order=ASC' . $url)
				);
			}
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=p.model&order=ASC' . $url)
			); 
	
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . '&sort=p.model&order=DESC' . $url)
			);
	
			$url = '';
					
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	
	
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			$this->data['limits'] = array();
	
			$limits = array_unique(array($this->config->get('config_catalog_limit'), 25, 50, 75, 100));
			
			sort($limits);
	
			foreach($limits as $limits){
				$this->data['limits'][] = array(
					'text'  => $limits,
					'value' => $limits,
					'href'  => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url . '&limit=' . $limits)
				);
			}
			
			$url = '';
							
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	
	
			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
					
			$pagination = new Pagination();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('product/manufacturer/info','manufacturer_id=' . $this->request->get['manufacturer_id'] .  $url . '&page={page}');
			
			$this->data['pagination'] = $pagination->render();
			
			if($pagination->limit && ceil($pagination->total / $pagination->limit) > $pagination->page) {
			$this->document->addLink($this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] .  $url . '&page='. ($pagination->page + 1)), 'next');
			}
			if($pagination->page > 1) {
			$this->document->addLink($this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] .  $url . '&page='. ($pagination->page - 1)), 'prev');
			}
			
			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
			$this->data['limit'] = $limit;
			
			$this->data['continue'] = $this->url->link('common/home');
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/manufacturer_info.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/manufacturer_info.tpl';
			} else {
				$this->template = 'default/template/product/manufacturer_info.tpl';
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
		} else {
			$url = '';
			
			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
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
				'href'      => $this->url->link('product/category', $url),
				'separator' => $this->language->get('text_separator')
			);
				
			$this->document->setTitle($this->language->get('text_error'));

      		$this->data['heading_title'] = $this->language->get('text_error');

      		$this->data['text_error'] = $this->language->get('text_error');

      		$this->data['button_continue'] = $this->language->get('button_continue');

      		$this->data['continue'] = $this->url->link('common/home');

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
}
?>