<?php 
class ControllerModuleAllReviews extends Controller {  
	public function index() {

		$this->language->load('module/reviewer');
		$this->load->model('module/reviewer');
		$this->load->model('tool/image');			
		$this->load->model('catalog/product');			
		
		$this->document->setTitle($this->language->get('heading_title'));
		$this->document->setDescription($this->language->get('description'));
		$this->document->setKeywords($this->language->get('keywords'));
		
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
       		'separator' => false
   		);
		
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/allreviews'),
       		'separator' => $this->language->get('text_separator')
   		);	
			
		
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
	
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['no_reviews'] = $this->language->get('no_reviews');
			
			$data = array(
				'sort'                => 'r.date_added',
				'limit'               => $limit,
				'order'               => 'DESC',
				'start'              => ($page - 1) * $limit
			);
			
		$reviews = $this->model_module_reviewer->getReviews($data);
		$total_reviews	=	$this->model_module_reviewer->getTotalReviews();
				foreach ($reviews as $review) {
				
				$product = $this->model_catalog_product->getProduct($review['product_id']);
				
				if ($review['image']) {
				$image = $this->model_tool_image->resize($review['image'], 600, 450);
				} else {
					$image = false;
				}
					
					$this->data['reviews'][] = array(
						'id'      => $review['review_id'],
						'author'    => $review['author'],
						'image'    => $image,
						'product_name'    => $product['name'],
						'text'   => $review['text'],
						'rating'     => $review['rating'],
						'href'    => $this->url->link('product/product', 'product_id=' . $review['product_id']),
						'date' => date($this->language->get('date_format_short'), strtotime($review['date_added']))
					);
				}
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}	
			
			$pagination = new Pagination();
			$pagination->total = $total_reviews;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('module/allreviews', '&page={page}');
		
			$this->data['pagination'] = $pagination->render();
			$this->data['limit'] = $limit;
		
			$this->data['continue'] = $this->url->link('common/home');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/allreviews.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/module/allreviews.tpl';
			} else {
				$this->template = 'default/template/module/allreviews.tpl';
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
?>