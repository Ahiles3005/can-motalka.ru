<?php  
class ControllerModulereviewer extends Controller {
	
	protected $path = array();
	
	protected function index($setting) {
		static $module = 0;
		$this->language->load('module/reviewer');
		$this->load->model('catalog/category');
		
		if ($setting['title']) {
		$this->data['heading_title'] = $setting['title'][$this->config->get('config_language_id')];
		} else {
			$this->data['heading_title'] = $this->language->get('heading_title');	
		}
		$this->data['all_reviews'] = $this->url->link('module/allreviews');
		if (($setting['position'] == 'column_left') || ($setting['position'] == 'column_right')){
		$this->data['position'] = 'column';
		}
    	$this->data['button_cart'] = $this->language->get('button_cart');
    	$this->data['no_reviews'] = $this->language->get('no_reviews');
    	$this->data['text_seeall'] = $this->language->get('text_seeall');
    	$this->data['visible'] = $setting['visible'];
    	$this->data['scroll'] = $setting['scroll'];
    	$this->data['sort'] = $setting['sort'];
		$this->data['type'] = "wrap: 'last'";
		if ($setting['autoscroll'] > 0) {
		$this->data['autoscroll'] = $setting['autoscroll'];}
			else {$this->data['autoscroll'] = '0';}
		if ($setting['animationspeed'] > 0) {
		$this->data['animationspeed'] = $setting['animationspeed'];}
			else {$this->data['animationspeed'] = '1000';}
		$this->data['hoverpause'] = $setting['hoverpause'];
		$this->data['disableauto'] = $setting['disableauto'];
			
		$this->data['show_link'] = $setting['show_link'];
		$this->data['show_nick'] = $setting['show_nick'];
		$this->data['show_date'] = $setting['show_date'];
		$this->data['show_rate'] = $setting['show_rate'];
		$this->data['show_text'] = $setting['show_text'];
		$this->data['show_image'] = $setting['show_image'];
			
		$this->load->model('module/reviewer');
		
		$this->load->model('tool/image');
		
		if (isset($this->request->get['path'])) {
			$this->path = explode('_', $this->request->get['path']);
			
			$this->category_id = end($this->path);
		}
		$url = '';

        $this->data['reviews'] = array();
			
		if ($setting['category_id'] == 'featured') {
			$this->data['reviews'] = $this->getfeaturedreviews($setting);
		} else {
			$this->data['reviews'] = $this->getcategoryreviews($setting, $module);
		}
						
		$this->data['module'] = $module++; 
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/reviewer.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/reviewer.tpl';
		} else {
			$this->template = 'default/template/module/reviewer.tpl';
		}
		
		$this->render();
  	}
	
	public function getcategoryreviews($setting, $id){
	
	$data = array(
				'filter_category_id'  => $setting['category_id'], 
				'filter_manufacturer_id'  => $setting['manufacturer_id'], 
				'filter_sub_category' => true, 
				'sort'                => $setting['sort'],
				'minrate'             => $setting['minrate'],
				'minprice'            => $setting['minprice'],
				'order'               => 'DESC',
				'start'               => '0',
				'limit'               => $setting['count']
			);
	$reviews = $this->model_module_reviewer->getReviews($data);
					
					foreach ($reviews as $review) {
					
					if ($review['image']) {
					$image = $this->model_tool_image->resize($review['image'], $setting['image_width'], $setting['image_height']);
					} else {
						$image = false;
					}
					
					if ($setting['words']) {
						$text = $this->words_limit($review['text'], $setting['words'], '...', $id);
					} else {
						
					}
						
						$this->data['reviews'][] = array(
							'id'      => $review['review_id'],
							'author'    => $review['author'],
							'image'    => $image,
							'text'   => $text,
							'rating'     => $review['rating'],
							'href'    => $this->url->link('product/product', 'product_id=' . $review['product_id']),
							'date' => date($this->language->get('date_format_short'), strtotime($review['date_added']))
						);
					}
		return $this->data['reviews'];
	}
	
	public function getfeaturedreviews($setting){
	$reviews = explode(',', $setting['featured']);		

		if (empty($setting['count'])) {
			$setting['count'] = 5;
		}
		
		$reviews = array_slice($reviews, 0, (int)$setting['count']);
		
		foreach ($reviews as $product_id) {
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
					
				$this->data['reviews'][] = array(
					'id' => $product_info['product_id'],
					'thumb'   	 => $image,
					'name'    	 => $product_info['name'],
					'price'   	 => $price,
					'special' 	 => $special,
					'rating'     => $rating,
					'reviews'    => sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']),
					'href'    	 => $this->url->link('product/product', 'product_id=' . $product_info['product_id']),
				);
			}
		}
		return $this->data['reviews'];
	}
	
	function words_limit($input_text, $limit = 50, $end_str = '', $id) {
	$expand_text = $this->language->get('expand_text');
	$collapse_text = $this->language->get('collapse_text');
    $input_text = strip_tags($input_text);
    $words = explode(' ', $input_text);
    if ($limit < 1 || sizeof($words) <= $limit) {
        return $input_text;
    }
    $shown = implode(' ', array_slice($words, 0, $limit));
    $hidden = implode(' ', array_slice($words, $limit));

    return ''.$shown.'<a class="spoiler-exp_'.$id.'" style="text-decoration:none;"><span class="endstr">'.$end_str.'</span><span class="exptext">'.$expand_text.'</span></a><span class="spoiler-body spoiler-body_'.$id.'"> '.$hidden.'';
}
	
	
}
?>