<?php
class Currency {
  	private $code;
  	private $currencies = array();
  
  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->db = $registry->get('db');

		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "currency_modsymbols` (
				`modsymbols_id` INT(11) NOT NULL AUTO_INCREMENT,
				`code` varchar(3) NOT NULL,
				`symbol_left` varchar(255) NOT NULL,
				`symbol_right` varchar(255) NOT NULL,
				`date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`modsymbols_id`),
				UNIQUE KEY `codeunique` (`code`)
			) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
		");
		$query = $this->db->query("SELECT `modsymbols_id` FROM `" . DB_PREFIX . "currency_modsymbols`;");
		if (!$query->num_rows) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "currency_modsymbols` (`code`, `symbol_left`, `symbol_right`) VALUES ('RUB','','<span class=\"sr-only\">_default_symbol_</span><span class=\"pt-sans-forced ruble\" aria-hidden=\"true\" style=\"display:none;\"></span>');");
		}

		$this->language = $registry->get('language');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
		
		
		$query = $this->db->query("SELECT 
			c.`code`,
			c.`currency_id`,
			c.`title`,
			c.`decimal_place`,
			c.`value`,
			IF(LENGTH(cm.`symbol_left`) != 0 AND cm.`symbol_left` IS NOT NULL,
				CONCAT((IF(LENGTH(SUBSTRING_INDEX(c.`symbol_left`,
							TRIM(c.`symbol_left`),
							1)) > 0,
							SUBSTRING_INDEX(c.`symbol_left`,
								TRIM(c.`symbol_left`),
								1),
							'')),
						REPLACE(cm.`symbol_left`,
							'_default_symbol_',
							TRIM(c.`symbol_left`)),
						(IF(LENGTH(SUBSTRING_INDEX(c.`symbol_left`,
							TRIM(c.`symbol_left`),
							- 1)) > 0,
							SUBSTRING_INDEX(c.`symbol_left`,
								TRIM(c.`symbol_left`),
								- 1),
					''))),
				c.`symbol_left`) AS 'symbol_left',
			IF(LENGTH(cm.`symbol_right`) != 0 AND cm.`symbol_right` IS NOT NULL,
				CONCAT((IF(LENGTH(SUBSTRING_INDEX(c.`symbol_right`,
							TRIM(c.`symbol_right`),
							1)) > 0,
							SUBSTRING_INDEX(c.`symbol_right`,
								TRIM(c.`symbol_right`),
								1),
							'')),
						REPLACE(cm.`symbol_right`,
							'_default_symbol_',
							TRIM(c.`symbol_right`)),
						(IF(LENGTH(SUBSTRING_INDEX(c.`symbol_right`,
							TRIM(c.`symbol_right`),
							- 1)) > 0,
							SUBSTRING_INDEX(c.`symbol_right`,
								TRIM(c.`symbol_right`),
								- 1),
					''))),
				c.`symbol_right`) AS 'symbol_right'
			FROM
				`" . DB_PREFIX . "currency` c
					LEFT JOIN
				`" . DB_PREFIX . "currency_modsymbols` cm ON (c.`code` = cm.`code`);
		");


    	foreach ($query->rows as $result) {
      		$this->currencies[$result['code']] = array(
        		'currency_id'   => $result['currency_id'],
        		'title'         => $result['title'],
        		'symbol_left'   => $result['symbol_left'],
        		'symbol_right'  => $result['symbol_right'],
        		'decimal_place' => $result['decimal_place'],
        		'value'         => $result['value']
      		); 
    	}
		
		if (isset($this->request->get['currency']) && (array_key_exists($this->request->get['currency'], $this->currencies))) {
			$this->set($this->request->get['currency']);
    	} elseif ((isset($this->session->data['currency'])) && (array_key_exists($this->session->data['currency'], $this->currencies))) {
      		$this->set($this->session->data['currency']);
    	} elseif ((isset($this->request->cookie['currency'])) && (array_key_exists($this->request->cookie['currency'], $this->currencies))) {
      		$this->set($this->request->cookie['currency']);
    	} else {
      		$this->set($this->config->get('config_currency'));
    	}
  	}
	
  	public function set($currency) {
    	$this->code = $currency;

    	if (!isset($this->session->data['currency']) || ($this->session->data['currency'] != $currency)) {
      		$this->session->data['currency'] = $currency;
    	}

    	if (!isset($this->request->cookie['currency']) || ($this->request->cookie['currency'] != $currency)) {
	  		setcookie('currency', $currency, time() + 60 * 60 * 24 * 30, '/', $this->request->server['HTTP_HOST']);
    	}
  	}

  	public function format($number, $currency = '', $value = '', $format = true) {
		if ($currency && $this->has($currency)) {
      		$symbol_left   = $this->currencies[$currency]['symbol_left'];
      		$symbol_right  = $this->currencies[$currency]['symbol_right'];
      		$decimal_place = $this->currencies[$currency]['decimal_place'];
    	} else {
      		$symbol_left   = $this->currencies[$this->code]['symbol_left'];
      		$symbol_right  = $this->currencies[$this->code]['symbol_right'];
      		$decimal_place = $this->currencies[$this->code]['decimal_place'];
			
			$currency = $this->code;
    	}

    	if ($value) {
      		$value = $value;
    	} else {
      		$value = $this->currencies[$currency]['value'];
    	}

    	if ($value) {
      		$value = (float)$number * $value;
    	} else {
      		$value = $number;
    	}

    	$string = '';

    	if (($symbol_left) && ($format)) {
      		$string .= $symbol_left;
    	}

		if ($format) {
			$decimal_point = $this->language->get('decimal_point');
		} else {
			$decimal_point = '.';
		}
		
		if ($format) {
			$thousand_point = $this->language->get('thousand_point');
		} else {
			$thousand_point = '';
		}
		
    	$string .= number_format(round($value, (int)$decimal_place), (int)$decimal_place, $decimal_point, $thousand_point);

    	if (($symbol_right) && ($format)) {
      		$string .= $symbol_right;
    	}

    	return $string;
  	}
	
  	public function convert($value, $from, $to) {
		if (isset($this->currencies[$from])) {
			$from = $this->currencies[$from]['value'];
		} else {
			$from = 0;
		}
		
		if (isset($this->currencies[$to])) {
			$to = $this->currencies[$to]['value'];
		} else {
			$to = 0;
		}		
		
		return $value * ($to / $from);
  	}
	
  	public function getId($currency = '') {
		if (!$currency) {
			return $this->currencies[$this->code]['currency_id'];
		} elseif ($currency && isset($this->currencies[$currency])) {
			return $this->currencies[$currency]['currency_id'];
		} else {
			return 0;
		}
  	}
	
	public function getSymbolLeft($currency = '') {
		if (!$currency) {
			return $this->currencies[$this->code]['symbol_left'];
		} elseif ($currency && isset($this->currencies[$currency])) {
			return $this->currencies[$currency]['symbol_left'];
		} else {
			return '';
		}
  	}
	
	public function getSymbolRight($currency = '') {
		if (!$currency) {
			return $this->currencies[$this->code]['symbol_right'];
		} elseif ($currency && isset($this->currencies[$currency])) {
			return $this->currencies[$currency]['symbol_right'];
		} else {
			return '';
		}
  	}
	
	public function getDecimalPlace($currency = '') {
		if (!$currency) {
			return $this->currencies[$this->code]['decimal_place'];
		} elseif ($currency && isset($this->currencies[$currency])) {
			return $this->currencies[$currency]['decimal_place'];
		} else {
			return 0;
		}
  	}
	
  	public function getCode() {
    	return $this->code;
  	}
  
  	public function getValue($currency = '') {
		if (!$currency) {
			return $this->currencies[$this->code]['value'];
		} elseif ($currency && isset($this->currencies[$currency])) {
			return $this->currencies[$currency]['value'];
		} else {
			return 0;
		}
  	}
    
  	public function has($currency) {
    	return isset($this->currencies[$currency]);
  	}
}
?>