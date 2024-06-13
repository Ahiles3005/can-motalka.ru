<?php
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ControllerBackgroundCache extends Controller {
	private $error = array();
 
	public function index() {
		
	}
	public function clear(){
		if ($this->validate()) {
			$files_c = glob(DIR_CACHE . 'cache.bgmgr_cat' . '*.*');
			$files_l = glob(DIR_CACHE . 'cache.bgmgr_layout' . '*.*');
			$files_gen = glob(DIR_CACHE . 'cache.bgmgr_css' . '*.*');
			$files_gen2 = glob(DIR_CACHE . 'cache.bgmgr_js' . '*.*');
			
			$files_css = array();
			if (!empty($files_gen)) {
				foreach ($files_gen as $key => $value) {
					$fname = explode('_', $value);
					$fname = explode('.', $fname[2]);
					if (is_file(DIR_CACHE.$fname[0].'.css')) {
						unlink(DIR_CACHE.$fname[0].'.css');
					}
					unlink($value);
				}
			}
			$files_js = array();
			if (!empty($files_gen2)) {
				foreach ($files_gen2 as $key => $value) {
					$fname = explode('_', $value);
					$fname = explode('.', $fname[2]);
					if (is_file(DIR_CACHE.$fname[0].'.js')) {
						unlink(DIR_CACHE.$fname[0].'.js');
					}
					unlink($value);
				}
			}
			if (!empty($files_l)) {
				foreach ($files_l as $key => $value) {
					unlink($value);
				}
			}
			if (!empty($files_c)) {
				foreach ($files_c as $key => $value) {
					unlink($value);
				}
			}

			$this->response->addHeader('Content-type:application/json');
			$this->response->setOutput(json_encode(array('response'=>true)));
		}else{
			$this->response->addHeader('Content-type:application/json');
			$this->response->setOutput(json_encode(array('response'=>$this->error['warning'])));
		}
	}
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'background/cache')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		if (!$this->error) {return true;} else {return false;}
	}
}
?>