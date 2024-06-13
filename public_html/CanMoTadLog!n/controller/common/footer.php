<?php
class ControllerCommonFooter extends Controller {   
	protected function index() {
		/* start multiship */
		$VERSION = VERSION;
		$VERSION = str_replace(".", "", $VERSION);
		
		if( strlen($VERSION) == 3 )
		{
			$VERSION .= '0';
		}
		elseif( strlen($VERSION) > 4 )
		{
			$VERSION = substr($VERSION, 0, 4);
		}
		
		if( $VERSION <= 1541 )
		{
			$this->load->language('common/footer');
		}
		else
		{
			$this->language->load('common/footer');
		}
		/* end multiship */
		$this->data['text_footer'] = sprintf($this->language->get('text_footer'), VERSION);
		
		
		/* start multiship */
		if( $VERSION > 1521 )
		{
			if (file_exists(DIR_SYSTEM . 'config/svn/svn.ver')) {
				$this->data['text_footer'] .= '.r' . trim(file_get_contents(DIR_SYSTEM . 'config/svn/svn.ver'));
			}
		}
		/* end multiship */
		
		/* start socnetauth2 */
		
		if(
			$this->config->get('socnetauth2_status') &&
			!empty( $this->request->get['route'] ) && (
				$this->request->get['route']=='sale/customer/update' ||
				$this->request->get['route']=='sale/order/info' ||
				$this->request->get['route']=='sale/order/update' ||
				$this->request->get['route']=='sale/customer' ||
				$this->request->get['route']=='sale/order'
			)
			)
		{
			$this->load->model('sale/customer');
			$this->load->model('module/socnetauth2');
			$data =	$this->model_module_socnetauth2->showData();
			
			$this->data['text_footer'] .= $data;
		}
		
		/* end multiship */
		
		
		$this->template = 'common/footer.tpl';
	
    	$this->render();
  	}
}
?>