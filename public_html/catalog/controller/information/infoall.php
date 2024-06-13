<?php 
class ControllerInformationInfoall extends Controller {  
	public function index() { 
		$this->language->load('information/info');

		$this->load->model('catalog/info');
		
		$this->load->model('tool/image'); 

		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else { 
			$page = 1;
		}	
							
		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = 15;
		}
							
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
       		'separator' => false
   		);
		
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_info'),
			'href'      => $this->url->link('information/infoall'),
        	'separator' => false
      	);

		$this->data['informations'] = array();
		
		$data = array(
			'start'              	  => ($page - 1) * $limit,
			'limit'              	  => $limit
		);
				
		$informations_total = $this->model_catalog_info->getTotalinformations($data); 
		
		$results = $this->model_catalog_info->getInformations($data);
	
		if ($results) {

		  	$this->document->setTitle('Инфо');			
			$this->document->setDescription('Инфо');
			$this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');
			$this->data['heading_title'] = 'Инфо';
						
			$this->data['text_refine'] = $this->language->get('text_refine');	
			$this->data['text_empty'] = $this->language->get('text_empty');			
			$this->data['text_display'] = $this->language->get('text_display');
			$this->data['text_list'] = $this->language->get('text_list');
			$this->data['text_grid'] = $this->language->get('text_grid');
			$this->data['text_sort'] = $this->language->get('text_sort');
			$this->data['text_limit'] = $this->language->get('text_limit');

			$this->data['button_continue'] = $this->language->get('button_continue');
			$this->data['button_more'] = $this->language->get('button_more');
			
			foreach ($results as $result) {
				if ($this->config->get('config_image_news_width')) {
					$image_news_width = $this->config->get('config_image_news_width');
				} else {
					$image_news_width = 220;
				}
				
				if ($this->config->get('config_image_news_height')) {
					$image_news_height = $this->config->get('config_image_news_height');
				} else {
					$image_news_height = 220;
				}
				
				if ($this->config->get('config_news_description_limit')) {
					$description_list_limit = $this->config->get('config_news_description_limit');
				} else {
					$description_list_limit = 500;
				}
				
				if ($this->config->get('config_news_grid_description_limit')) {
					$description_grid_limit = $this->config->get('config_news_grid_description_limit');
				} else {
					$description_grid_limit = 200;
				}
	
				$this->data['informations'][] = array(
					'information_id'  	     	=> $result['information_id'],
					'name'           	=> $result['title'],
					'thumb'          	=> $this->model_tool_image->resize($result['image'], $image_news_width, $image_news_height),
					'no_image' 	  	 	=> '/image/no-image.svg',
					'date_available' 	=> sprintf($this->language->get('text_date_available'), date($this->language->get('date_format_short'), strtotime($result['date_available']))),
					'viewed' 		 	=> sprintf($this->language->get('text_viewed'), $result['viewed']),
					'description_list' 	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 100) . '...',
					'href'           	=> $this->url->link('information/info', 'info_id=' . $result['information_id'])
				);
			}
			
			$url = '';
			
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			
			$this->data['limits'] = array();
	
			$limits = array(5, 15, 25, 50, 75, 100);
	
			foreach($limits as $limits){
				$this->data['limits'][] = array(
					'text'  => $limits,
					'value' => $limits,
					'href'  => $this->url->link('informations/infoall', '&limit=' . $limits)
				);
			}
			
			$url = '';
	
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
					
			$pagination = new Pagination();
			$pagination->total = $informations_total;
			$pagination->page = $page;
			$pagination->limit = $limit;
			$pagination->text = $this->language->get('text_pagination');
			$pagination->url = $this->url->link('informations/infoall', $url . '&page={page}');
		
			$this->data['pagination'] = $pagination->render();

			$this->data['limit'] = $limit;
		
			$this->data['continue'] = $this->url->link('common/home');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/info_all.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/info_all.tpl';
			} else {
				$this->template = 'default/template/information/info_all.tpl';
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
				
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
						
			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
						
			$this->data['breadcrumbs'][] = array(
				'text'      => $this->language->get('text_error'),
				'href'      => $this->url->link('informations/infoall', $url),
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