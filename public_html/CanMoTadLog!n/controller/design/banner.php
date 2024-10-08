<?php 
class ControllerDesignBanner extends Controller {
	private $error = array();
 
	public function index() {
		$this->language->load('design/banner');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/banner');
		
		$this->getList();
	}

    
    // Banner Image Sort
    public function addsorttable()
    {
        $this->session->data['success'] = "DATABASE UPDATE SUCCESS";
        $this->load->model('design/banner');
        $this->model_design_banner->addSortTable();
        $this->language->load('design/banner');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('design/banner');
        $this->getList();
    }
	
	public function insert() {
		$this->language->load('design/banner');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/banner');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_design_banner->addBanner($this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

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
			
			$this->redirect($this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->language->load('design/banner');

		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/banner');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_design_banner->editBanner($this->request->get['banner_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

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
					
			$this->redirect($this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}
 
	public function delete() {
		$this->language->load('design/banner');
 
		$this->document->setTitle($this->language->get('heading_title'));
		
		$this->load->model('design/banner');
		
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $banner_id) {
				$this->model_design_banner->deleteBanner($banner_id);
			}
			
			$this->session->data['success'] = $this->language->get('text_success');

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

			$this->redirect($this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}

	protected function getList() {
		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'name';
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

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
		
		$this->data['insert'] = $this->url->link('design/banner/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['delete'] = $this->url->link('design/banner/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');
		 
		$this->data['banners'] = array();

		$data = array(
			'sort'  => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit' => $this->config->get('config_admin_limit')
		);
		
		$banner_total = $this->model_design_banner->getTotalBanners();
		
		$results = $this->model_design_banner->getBanners($data);
		
		foreach ($results as $result) {
			$action = array();
			
			if ($this->config->get('config_buttons_apply') == 0) {
				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link('design/banner/update', 'token=' . $this->session->data['token'] . '&banner_id=' . $result['banner_id'] . $url, 'SSL')
				);
			} else {
				$action[] = array(
					'text' => $this->language->get('button_edites'),
					'href' => $this->url->link('design/banner/update', 'token=' . $this->session->data['token'] . '&banner_id=' . $result['banner_id'] . $url, 'SSL')
				);
			}

			$this->data['banners'][] = array(
				'banner_id' => $result['banner_id'],
				'name'      => $result['name'],	
				'status'    => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),				
				'selected'  => isset($this->request->post['selected']) && in_array($result['banner_id'], $this->request->post['selected']),				
				'action'    => $action
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');	

		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
		
		$this->data['token'] = $this->session->data['token'];
 
 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}
		
		$this->data['sort_name'] = $this->url->link('design/banner', 'token=' . $this->session->data['token'] . '&sort=name' . $url, 'SSL');
		$this->data['sort_status'] = $this->url->link('design/banner', 'token=' . $this->session->data['token'] . '&sort=status' . $url, 'SSL');
		
		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}
												
		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $banner_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();
		
		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'design/banner_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	protected function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');
		
		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
 		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');			
				
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_link'] = $this->language->get('entry_link');
		$this->data['entry_image'] = $this->language->get('entry_image');
    
            // Banner Image Sort
		$this->data['entry_sort'] = $this->language->get('entry_sort');		
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		$this->data['entry_color'] = $this->language->get('entry_color');$this->data['entry_fontcolor'] = $this->language->get('entry_fontcolor');$this->data['entry_align_top'] = $this->language->get('entry_align_top');$this->data['entry_width'] = $this->language->get('entry_width');$this->data['entry_radius'] = $this->language->get('entry_radius');$this->data['entry_border'] = $this->language->get('entry_border');$this->data['entry_colorborder'] = $this->language->get('entry_colorborder');$this->data['entry_setting'] = $this->language->get('entry_setting');$this->data['entry_nosetting'] = $this->language->get('entry_nosetting');$this->data['entry_quickview'] = $this->language->get('entry_quickview');$this->data['entry_opacity'] = $this->language->get('entry_opacity');$this->data['entry_naz_gl'] = $this->language->get('entry_naz_gl');$this->data['entry_naz_hl'] = $this->language->get('entry_naz_hl');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_banner'] = $this->language->get('button_add_banner');
		$this->data['button_remove'] = $this->language->get('button_remove');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

 		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = '';
		}

 		if (isset($this->error['banner_image'])) {
			$this->data['error_banner_image'] = $this->error['banner_image'];
		} else {
			$this->data['error_banner_image'] = array();
		}	
						
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

  		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
      		'separator' => false
   		);

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL'),
      		'separator' => ' :: '
   		);
							
		if (!isset($this->request->get['banner_id'])) { 
			$this->data['action'] = $this->url->link('design/banner/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('design/banner/update', 'token=' . $this->session->data['token'] . '&banner_id=' . $this->request->get['banner_id'] . $url, 'SSL');
		}
		
		$this->data['cancel'] = $this->url->link('design/banner', 'token=' . $this->session->data['token'] . $url, 'SSL');
		
		if (isset($this->request->get['banner_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$banner_info = $this->model_design_banner->getBanner($this->request->get['banner_id']);
		}

		$this->data['token'] = $this->session->data['token'];

		if (isset($this->request->post['name'])) {
			$this->data['name'] = $this->request->post['name'];
		} elseif (!empty($banner_info)) {
			$this->data['name'] = $banner_info['name'];
		} else {
			$this->data['name'] = '';
		}
		
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($banner_info)) {
			$this->data['status'] = $banner_info['status'];
		} else {
			$this->data['status'] = true;
		}

		$this->load->model('localisation/language');
		
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
		
		$this->load->model('tool/image');
	
		if (isset($this->request->post['banner_image'])) {
			$banner_images = $this->request->post['banner_image'];
		} elseif (isset($this->request->get['banner_id'])) {
			$banner_images = $this->model_design_banner->getBannerImages($this->request->get['banner_id']);	
		} else {
			$banner_images = array();
		}
		
		$this->data['banner_images'] = array();
		
		foreach ($banner_images as $banner_image) {
			if ($banner_image['image'] && file_exists(DIR_IMAGE . $banner_image['image'])) {
				$image = $banner_image['image'];
			} else {
				$image = 'no_image.jpg';
			}			
			
			$this->data['banner_images'][] = array(
				'banner_image_description' => $banner_image['banner_image_description'],
				'color' => $banner_image['color'],'fontcolor' => $banner_image['fontcolor'],'align_top' => $banner_image['align_top'],'width' => $banner_image['width'],'radius' => $banner_image['radius'],'border' => $banner_image['border'],'colorborder' => $banner_image['colorborder'],'opacity' => $banner_image['opacity'],
				'link'                     => $banner_image['link'],
				'image'                    => $image,
            // Banner Image Sort
				'sort'                    => $banner_image['sort'],
				'thumb'                    => $this->model_tool_image->resize($image, 200, 200)
			);	
		} 
	
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 200, 200);		

		$this->template = 'design/banner_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput($this->render());
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'design/banner')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
			$this->error['name'] = $this->language->get('error_name');
		}
		
		if (isset($this->request->post['banner_image'])) {
			foreach ($this->request->post['banner_image'] as $banner_image_id => $banner_image) {
				foreach ($banner_image['banner_image_description'] as $language_id => $banner_image_description) {
					if ((utf8_strlen($banner_image_description['title']) < 2) || (utf8_strlen($banner_image_description['title']) > 1000)) {
						$this->error['banner_image'][$banner_image_id][$language_id] = $this->language->get('error_title'); 
					}					
				}
			}	
		}
		
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'design/banner')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
	
		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	public function changeStatus() {
		if ($this->user->hasPermission('modify', 'design/banner')) {
			$this->language->load('design/banner');
			$this->load->model('design/banner');
			$output='';
			if(isset($this->request->get['object_id'])){
				$requestpart = explode('-',$this->request->get['object_id']);
				if(count($requestpart)==2){
					$column_name = $requestpart[0];
					$banner_id = $requestpart[1];				
					$result = $this->model_design_banner->getBanner($banner_id);
					if($result[$column_name]){
						$this->model_design_banner->changeStatus($banner_id, $column_name, 0);
					} else {
						$this->model_design_banner->changeStatus($banner_id, $column_name, 1);
					}				
					$result = $this->model_design_banner->getBanner($banner_id);
					$output = $result[$column_name] ? $this->language->get('text_enabled') : $this->language->get('text_disabled');
				}
			}
			$this->response->setOutput($output);
		}
	}
}
?>