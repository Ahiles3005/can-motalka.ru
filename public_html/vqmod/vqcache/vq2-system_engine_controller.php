<?php
abstract class Controller {
	protected $registry;	
	protected $id;
	protected $layout;
	protected $template;
	protected $children = array();
	protected $data = array();
	protected $output;
	
	public function __construct($registry) {
		$this->registry = $registry;
	}
	
	public function __get($key) {
		return $this->registry->get($key);
	}
	
	public function __set($key, $value) {
		$this->registry->set($key, $value);
	}
			
	protected function forward($route, $args = array()) {
		return new Action($route, $args);
	}

	protected function redirect($url, $status = 302) {
		header('Status: ' . $status);
		header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url));
		exit();				
	}
	
 function getChildHtml($child,$args) { return $this->getChild($child,$args); } //Lightning 
	protected function getChild($child, $args = array()) {
		$action = new Action($child, $args);
	
		if (file_exists($action->getFile())) {
			require_once(VQMod::modCheck($action->getFile()));

			$class = $action->getClass();

			$controller = new $class($this->registry);

			$controller->{$action->getMethod()}($action->getArgs());
			
			return $controller->output;
		} else {
			trigger_error('Error: Could not load controller ' . $child . '!');
			exit();					
		}		
	}
	
	protected function render() {
		foreach ($this->children as $child) {
			$this->data[basename($child)] = $this->getChild($child);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->template)) {
			extract($this->data);
			
      		ob_start();
      
	  		require(VQMod::modCheck(DIR_TEMPLATE . $this->template));
      
	  		$this->output = ob_get_contents();

      		ob_end_clean();
      		
 static $li_lock; if (function_exists('Wbo') and !$li_lock) { $li_lock = 1; while ($c=Wbo($this->template, $this->output)) $this->output .= $this->getChild($c); $li_lock = 0; } //Lightning 
			return $this->output;
    	} else {
			trigger_error('Error: Could not load template ' . DIR_TEMPLATE . $this->template . '!');
			exit();				
    	}
	}
}
?>