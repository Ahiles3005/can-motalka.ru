<?php

class ModelCatalogSearchMr extends Model {

	public function getDefaultOptions() {

		return array(
			'key' => 'ddddf3ef1e00bf4de9d2593ee6a235c2',
			'min_word_length' => 2,
			'cache_results' => 1,
			'fix_keyboard_layout' => 0,
			'sort_order_stock' => 1,			
			'fields' => array(
				'name' => array(
					'search' => 'contains',
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 80,
						'phrase' => 60,
						'word' => 40
					)
				),
				'description' => array(
					'search' => 'contains',
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 20,
						'word' => 10
					)
				),
				'tags' => array(
					'search' => 'contains',
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 45
					)
				),
				'attributes' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'model' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'exclude_characters' => '-/_',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'sku' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'upc' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'ean' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'jan' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'isbn' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
				'mpn' => array(
					'search' => 0,
					'phrase' => 'cut',
					'use_morphology' => 1,
					'use_relevance' => 1,
					'logic' => 'OR',
					'relevance' => array(
						'start' => 0,
						'phrase' => 0,
						'word' => 0
					)
				),
			),
		);
	}

	public function getFields() {

		return array(
			'name',
			'description',
			'tags',
			'attributes',
			'model',
			'sku',
			'upc',
			'ean',
			'jan',
			'isbn',
			'mpn');
	}

	public function install() {
		
				
		$a85a7f5cde5cebb11e7135003074bf199 = array (
						'model' => true,
			'sku' => true,
			'upc' => true,
			'ean' => true,
			'jan' => true,
			'isbn' => true,
			'mpn' => true
		);
		
		$aaba87244222ea873a9e5078d96690cca = $this->db->query("SHOW INDEX FROM " . DB_PREFIX . "product");
		
		foreach ($aaba87244222ea873a9e5078d96690cca->rows as $ae15ab47deb7ba01c5b1b6da3afb158db) {
						if (isset($ae15ab47deb7ba01c5b1b6da3afb158db['Column_name']) && array_key_exists($ae15ab47deb7ba01c5b1b6da3afb158db['Column_name'], $a85a7f5cde5cebb11e7135003074bf199)) {
				$a85a7f5cde5cebb11e7135003074bf199[$ae15ab47deb7ba01c5b1b6da3afb158db['Column_name']] = false;
			}
		}
		
		foreach ($a85a7f5cde5cebb11e7135003074bf199 as $a6665efd7363fefcbcad1a0bb7298d86a => $a3f1dc671c408606a483e11cb08fbea01) {
			if ($a3f1dc671c408606a483e11cb08fbea01) {
				$this->db->query("ALTER TABLE " . DB_PREFIX . "product ADD INDEX ( " . $a6665efd7363fefcbcad1a0bb7298d86a . " )");
			}
		}				
	}
}

