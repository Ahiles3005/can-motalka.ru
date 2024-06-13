<?php
require_once(DIR_SYSTEM . 'library/Mobile_Detect.php');
class ControllerModuleSlideshow extends Controller {
	protected function index($setting) {
		static $module = 0;
		
		$this->load->model('design/banner');
		$this->load->model('tool/image');
		
		$this->data['width'] = $setting['width'];
		$this->data['height'] = $setting['height'];
		
		$this->data['banners'] = array();
		
		if (isset($setting['banner_id'])) {
			$results = $this->model_design_banner->getBanner($setting['banner_id']);
			  
			foreach ($results as $result) {
				if (file_exists(DIR_IMAGE . $result['image'])) {
					$this->data['banners'][] = array(
						'title' => $result['title'],
						'color' => $result['color'],'fontcolor' => $result['fontcolor'],'align_top' => $result['align_top'],'width' => $result['width'],'radius' => $result['radius'],'border' => $result['border'],'colorborder' => $result['colorborder'],'opacity' => $result['opacity'],
						'color' => $result['color'],
						'fontcolor' => $result['fontcolor'],
						'align_top' => $result['align_top'],
						'width' => $result['width'],
						'radius' => $result['radius'],
						'border' => $result['border'],
						'colorborder' => $result['colorborder'],
						'opacity' => $result['opacity'],
						'link'  => $result['link'],
						'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height'])
					);
				}
			}
		}
		
		$this->data['module'] = $module++;
						
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/slideshow.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/slideshow.tpl';
		} else {
			$this->template = 'default/template/module/slideshow.tpl';
		}
		
		$this->render();
	}
}
?>