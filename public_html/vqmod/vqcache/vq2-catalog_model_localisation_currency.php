<?php
class ModelLocalisationCurrency extends Model {
	public function getCurrencyByCode($currency) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "currency WHERE code = '" . $this->db->escape($currency) . "'");
	
		return $query->row;
	}
	
	public function getCurrencies() {
		$currency_data = $this->cache->get('currency');

		if (!$currency_data) {
			$currency_data = array();
			
			
			$query = $this->db->query("SELECT 
				c.`code`,
				c.`currency_id`,
				c.`title`,
				c.`decimal_place`,
				c.`value`,
				c.`status`,
				c.`date_modified`,
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
					`" . DB_PREFIX . "currency_modsymbols` cm ON (c.`code` = cm.`code`)
				ORDER BY c.`title` ASC;
			");

	
			foreach ($query->rows as $result) {
      			$currency_data[$result['code']] = array(
        			'currency_id'   => $result['currency_id'],
        			'title'         => $result['title'],
        			'code'          => $result['code'],
					'symbol_left'   => $result['symbol_left'],
					'symbol_right'  => $result['symbol_right'],
					'decimal_place' => $result['decimal_place'],
					'value'         => $result['value'],
					'status'        => $result['status'],
					'date_modified' => $result['date_modified']
      			);
    		}	
			
			$this->cache->set('currency', $currency_data);
		}
			
		return $currency_data;	
	}	
}
?>