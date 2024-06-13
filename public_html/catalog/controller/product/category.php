<?php 
class ControllerProductCategory extends Controller {  
	public function index() { 
		$this->language->load('product/category');
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->load->model('tool/image');
		
if (isset($this->request->get['page'])) {
            $page = $this->request->get['page'];
            $pathx = explode('_', $this->request->get['path']);
            $pathx = end($pathx);
            $this->document->addLink($this->url->link('product/category', 'path=' . $pathx ), 'canonical');
        } else {
            $page = 1;
        }		
		
		if (isset($this->request->get['filter'])) {
			$filter = $this->request->get['filter'];
		} else {
			$filter = '';
		}
				
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'p.sort_order';
			//$sort = 'p.quantity';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			//$order = 'DESC';
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
			
		if (isset($this->request->get['path'])) {
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
									
			$path = '';
		
			$parts = explode('_', (string)$this->request->get['path']);
		
			$category_id = (int)array_pop($parts);
		
			foreach ($parts as $path_id) {
				if (!$path) {
					$path = (int)$path_id;
				} else {
					$path .= '_' . (int)$path_id;
				}
									
				$category_info = $this->model_catalog_category->getCategory($path_id);
				
				if ($category_info) {
	       			$this->data['breadcrumbs'][] = array(
   	    				'text'      => $category_info['name'],
						'href'      => $this->url->link('product/category', 'path=' . $path . $url),
        				'separator' => $this->language->get('text_separator')
        			);
				}
			}
		} else {
			$category_id = 0;
		}
				
		$category_info = $this->model_catalog_category->getCategory($category_id);
	
		if ($category_info) {
	  		if ($category_info['seo_title']) {
		  		$this->document->setTitle($category_info['seo_title']);
			} else {
		  		$this->document->setTitle($category_info['name']);
			}
			
			if (
			isset($this->request->get['page']) ||
			isset($this->request->get['limit']) ||
			isset($this->request->get['order'])
			) {
				$this->document->setRobots('noindex,follow');
			}			
			
			$this->document->setDescription($category_info['meta_description']);
			$this->document->setKeywords($category_info['meta_keyword']);
			
			if ($category_info['seo_h1']) {
				$this->data['heading_title'] = $category_info['seo_h1'];
			} else {
				$this->data['heading_title'] = $category_info['name'];
			}
			
			$this->data['text_refine'] = $this->language->get('text_refine');
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
			$this->data['text_units_sold'] = $this->language->get('text_units_sold');
			$this->data['text_sort'] = $this->language->get('text_sort');
			$this->data['text_limit'] = $this->language->get('text_limit');
					
			$this->data['button_quick_view'] = $this->language->get('button_quick_view');
			$this->data['button_cart'] = $this->language->get('button_cart');
			$this->data['button_wishlist'] = $this->language->get('button_wishlist');
			$this->data['button_compare'] = $this->language->get('button_compare');
			$this->data['button_continue'] = $this->language->get('button_continue');
			
			$this->data['view_subcategories'] = $this->config->get('config_view_subcategory');
			$this->data['quick_view_categories'] = $this->config->get('config_quick_view_categories');
			
			// Set the last category breadcrumb		
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
			
			if ($this->config->get('config_image_subcategory_width')) {
				$image_subcategory_width = $this->config->get('config_image_subcategory_width');
			} else {
				$image_subcategory_width = 220;
			}
			
			if ($this->config->get('config_image_subcategory_height')) {
				$image_subcategory_height = $this->config->get('config_image_subcategory_height');
			} else {
				$image_subcategory_height = 220;
			}
			
			if ($this->config->get('config_sub_category_description_limit')) {
				$sub_category_description_limit = $this->config->get('config_sub_category_description_limit');
			} else {
				$sub_category_description_limit = 300;
			}
								
			if ($category_info['image']) {
				$this->data['thumb'] = $this->model_tool_image->resize($category_info['image'], $this->config->get('config_image_category_width'), $this->config->get('config_image_category_height'));
				$this->document->setOgimage($this->model_tool_image->resize($category_info['image'], 250, 250));
			} else {
				$this->data['thumb'] = '';
			}
			
			$this->document->setOgurl($this->url->link('product/category', 'path=' . $this->request->get['path']));
									
			if ($page == 1) {
			$this->data['description'] = html_entity_decode($category_info['description'], ENT_QUOTES, 'UTF-8');
			} else {
			$this->data['description'] = "";
			}
			$this->data['compare'] = $this->url->link('product/compare');
			
			$url = '';
			
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}	
						
			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}	

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}	
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
								
			$this->data['categories'] = array();
			
			$results = $this->model_catalog_category->getCategories($category_id);
			
			foreach ($results as $result) {
				$data = array(
					'filter_category_id'  => $result['category_id'],
					'filter_sub_category' => true
				);
				
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $image_subcategory_width, $image_subcategory_height);
				} else {
					$image = false;
				}
				
				if ($result['description']) {
					$description = utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $sub_category_description_limit) . '...';
				} else {
					$description = $this->language->get('text_no_description');
				}
				
				$product_total = $this->model_catalog_product->getTotalProducts($data);				
				
				$this->data['categories'][] = array(
					'name'  	  => $result['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
					'description' => $description,
					'thumb' 	  => $image,
					'no_image' 	  => $this->model_tool_image->resize('no_image.jpg', $image_subcategory_width, $image_subcategory_height),
					'href'  	  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $result['category_id'] . $url)
				);
			}
			
			$this->data['width'] = $this->config->get('config_image_subcategory_width') + 2;
			
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
			
			$this->data['products'] = array();
			
			$data = array(
				'filter_category_id' => $category_id,
				'filter_filter'      => $filter, 
				'sort'               => $sort,
				'order'              => $order,
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
					
			$product_total  = $this->model_catalog_product->getTotalProducts($data);
			//file_put_contents("hlog1.txt", $product_total);
			
			$results = $this->model_catalog_product->getProducts($data);
			
			$this->data['remarketing_ids'] = array();
			
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
				
				if ($this->config->get('config_sticker_special_categories')) {
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
				
				if ($this->config->get('config_sticker_new_categories')) {
					if (($result['date_available']) > strftime('%Y-%m-%d',$timestamp)) {
						$new = '<div class="stiker-new"></div>';
					} else {
						$new = false;
					}
				} else {
					$new = false;
				}
				
				if ($this->config->get('config_sticker_popular_categories')) {
					if (($result['viewed']) > ($limit_viewed_popular_product)) {
						$popular = '<div class="stiker-popular"></div>';
					} else {
						$popular = false;
					}
				} else {
					$popular = false;
				}


				// title
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
				
				$this->data['remarketing_ids'][] = $result['product_id'];
				
				$this->data['products'][] = array(
				'units_sold' => $this->model_catalog_category->getUnitsSold($result['product_id']),
					'product_id'  	   	=> $result['product_id'],
					//'name'        	   	=> $result['name'],
					'upc'               => $result['upc'],
					'ozon'               => $result['ozon'],
					'name'        	   	=> $name,
					'catname'			=> $category_name['catname'],
					'brandlink'			=> $category_name['brandlink'],
					'category_name'			=> $category_name['name'],
					'manufacturer'			=> $result['manufacturer'],
					'manufacturer_link'		=> $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $result['manufacturer_id']),
					'thumb'       	   	=> $image,
					'no_image'    		=> $this->model_tool_image->resize('no_image.jpg', $this->config->get('config_image_product_width'), $this->config->get('config_image_product_height')),
					'description' 		=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_list_description_limit')) . '...',
					'description_list' 	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_list_description_limit')) . '...',
					'description_grid' 	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_grid_description_limit')) . '...',
					'availability' => $result['quantity'] ? true : false,
					//'price'       		=> $price,
					'price'       		=> $np,
					'special'     		=> $ns,
					'tax'         		=> $tax,
					'rating'      		=> $result['rating'],
					'sale' 	  	  		=> $sale,
					'new'     	  		=> $new,
					'popular'     		=> $popular,
					'reviews'     		=> sprintf($this->language->get('text_reviews'), (int)$result['reviews']),
					'href'        		=> $this->url->link('product/product', 'path=' . $this->request->get['path'] . '&product_id=' . $result['product_id'] . $url)
				);
			}
			
			$url = '';
			
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}
				
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
										
			$this->data['sorts'] = array();
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.sort_order&order=ASC' . $url)
			);
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=pd.name&order=DESC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=ASC' . $url)
			); 

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.price&order=DESC' . $url)
			); 
			
			if ($this->config->get('config_review_status')) {
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=DESC' . $url)
				); 
				
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=rating&order=ASC' . $url)
				);
			}
			
			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . '&sort=p.model&order=DESC' . $url)
			);
			
			$url = '';
			
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}
				
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
					'href'  => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&limit=' . $limits)
				);
			}
			
			$url = '';
			
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}
				
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
			$pagination->url = $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page={page}');
		
			$this->data['pagination'] = $pagination->render();
			
			
	  $this->data['dynx_pagetype'] = 'view_item_list';
	  $this->data['remarketing_code'] = '';
	  	if (count($this->data['remarketing_ids']) > 1){
			$dynx_itemid = '["' . implode('","', $this->data['remarketing_ids']) . '"]';
		} elseif (!empty( $this->data['remarketing_ids'])) {
			$dynx_itemid = '"' .  $this->data['remarketing_ids'][0] . '"';
		} else {
			$dynx_itemid = '';
		}
		if ($this->data['dynx_pagetype']) {
		$this->data['remarketing_code'] .= '<script type="text/javascript">'."\n";
		$this->data['remarketing_code'] .= 'gtag("event", "' . $this->data['dynx_pagetype'] . '", {'."\n";
		$this->data['remarketing_code'] .= 'send_to: "AW-' . $this->config->get('config_remarketing_code') .'",'."\n";
		if(count($this->data['remarketing_ids']) > 0){
        $this->data['remarketing_code'] .= "'items': [\n";
		foreach($this->data['remarketing_ids'] as $item) {
		$this->data['remarketing_code'] .= "{\n";
		$this->data['remarketing_code'] .= "'id': " . $item . ",\n";
		$this->data['remarketing_code'] .= "'google_business_vertical': 'retail'\n";
		$this->data['remarketing_code'] .= "},\n";
		}
		$this->data['remarketing_code'] .= "]\n";
		}
		$this->data['remarketing_code'] .= '});'."\n</script>\n";
		}
			
			
			if($pagination->limit && ceil($pagination->total / $pagination->limit) > $pagination->page) {
			$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page='. ($pagination->page + 1)), 'next');
			}
			if($pagination->page > 1) {
			$this->document->addLink($this->url->link('product/category', 'path=' . $this->request->get['path'] . $url . '&page='. ($pagination->page - 1)), 'prev');
			}
		
			$this->data['sort'] = $sort;
			$this->data['order'] = $order;
			$this->data['limit'] = $limit;
		
			$this->data['continue'] = $this->url->link('common/home');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/category.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/category.tpl';
			} else {
				$this->template = 'default/template/product/category.tpl';
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
			
			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}
			
			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
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