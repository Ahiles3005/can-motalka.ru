<?php
 if (defined("LIGHT_ENABLED") or (!defined("LIGHT_FRONTEND") and !file_exists(DIR_LOGS.'cv'))) {if (defined('DIR_CATALOG')) $b = DIR_CATALOG; else $b = DIR_APPLICATION; $b .= 'controller/extension/lightning/beta.php'; if (file_exists($b)) require_once $b;} // Lightning 
class DB {
	private $driver;
	
	public function __construct($driver, $hostname, $username, $password, $database) {
 global $db; $db = $this; if (function_exists('Wbu')) { $this->db = Wbu(); $this->adaptor = $this->db; $this->driver = $this->db; return; } // Lightning 
		if (file_exists(DIR_DATABASE . $driver . '.php')) {
			require_once(VQMod::modCheck(DIR_DATABASE . $driver . '.php'));
		} else {
			exit('Error: Could not load database file ' . $driver . '!');
		}
				
		$this->driver = new $driver($hostname, $username, $password, $database);
	}
		
  	public function query($sql) {
		return $this->driver->query($sql);
  	}
	
	public function escape($value) {
		return $this->driver->escape($value);
	}
	
  	public function countAffected() {
		return $this->driver->countAffected();
  	}

  	public function getLastId() {
		return $this->driver->getLastId();
  	}	
}
?>