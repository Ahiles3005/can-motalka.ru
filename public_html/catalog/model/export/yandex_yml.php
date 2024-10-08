<?php
class ModelExportYandexYml extends Model {
	protected $categories = array();
	protected $cat_ids = array();
	public $is_main_category = false;
	
	protected function loadCategories() {
		$query = $this->db->query("SELECT cd.name, c.category_id, c.parent_id FROM " . DB_PREFIX . "category c
            LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id)
            LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id)
            WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "'
                AND c2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

		foreach($query->rows as $row) {
			$this->setCategory($row['name'], $row['category_id'], $row['parent_id']);
		}
	}
	
	/**
	 * Категории (рубрики) товаров
	 *
	 * @param string $name - название рубрики
	 * @param int $id - id рубрики
	 * @param int $parent_id - id родительской рубрики
	 * @return bool
	 */
	protected function setCategory($name, $id, $parent_id = 0) {
		$id = (int)$id;
		if ($id < 1 || trim($name) == '') {
			return false;
		}
		if ((int)$parent_id > 0) {
			$this->categories[$id] = array(
				'id'=>$id,
				'parentId'=>(int)$parent_id,
				'name'=>$name
			);
		} else {
			$this->categories[$id] = array(
				'id'=>$id,
				'name'=>$name
			);
		}

		return true;
	}

	public function getCategoryTree($allowed_categories, $blacklist_type, $blacklist, $out_of_stock_ids, $allowed_manufacturers = '') {
		$this->loadCategories();
		
		$sql_blacklist = '';
		if ($blacklist) {
			$sql_blacklist = " AND ".($blacklist_type == 'black' ? "NOT" : "")."(p.product_id IN (" . $this->db->escape($blacklist) . "))";
		}
		$query = $this->db->query("SELECT DISTINCT p2c.category_id
			FROM " . DB_PREFIX . "product p
			JOIN " . DB_PREFIX . "product_to_category AS p2c ON (p.product_id = p2c.product_id".($this->is_main_category ? " AND p2c.main_category = 1" : "").")
			".($this->is_main_category && $allowed_categories ? " JOIN " . DB_PREFIX . "product_to_category AS p2c2 ON (p.product_id = p2c2.product_id)" : "")."
			LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
			LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)
			WHERE p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'"
				.($allowed_categories ? " AND " . ($this->is_main_category ? "p2c2" : "p2c") . ".category_id IN (" . $this->db->escape($allowed_categories) . ")" : "")
				.$sql_blacklist
				.($allowed_manufacturers ? " AND p.manufacturer_id IN (" . $this->db->escape($allowed_manufacturers) . ")" : "") . "
				AND p.date_available <= NOW() 
				AND p.status = '1'
				AND (p.quantity > '0' OR NOT(p.stock_status_id IN(" . implode(',', array_map('intval', $out_of_stock_ids)) . ")))
				GROUP BY p.product_id ORDER BY p.product_id");
		foreach ($query->rows as $row) {
			$this->setExportFlag($row['category_id']);
		
		}
		$this->categories = array_filter($this->categories, array($this, "filterCategory"));
		return $this->categories;
	}
	
	protected function setExportFlag($category_id) {
		if (isset($this->categories[$category_id])) {
			$this->categories[$category_id]['export'] = 1;
			$this->cat_ids[] = $category_id;

			if (isset($this->categories[$category_id]['parentId']) && !in_array($this->categories[$category_id]['parentId'], $this->cat_ids)) {
				$this->setExportFlag($this->categories[$category_id]['parentId']);
			}
		}
	}
	
	protected function filterCategory($category) {
		return isset($category['export']);
	}
	
	
	public function getProduct($allowed_categories, $blacklist_type, $blacklist, $out_of_stock_ids, $allowed_manufacturers = '', $customer_group = 1, $with_related = false, $skip = 0, $limit = 200) {
		$sql_blacklist = '';
		if ($blacklist) {
			$sql_blacklist = " AND ".($blacklist_type == 'black' ? "NOT" : "")."(p.product_id IN (" . $this->db->escape($blacklist) . "))";
		}
				
		$query = $this->db->query("SELECT
			p.*, pd.*, m.name AS manufacturer, p2c.category_id, IFNULL(pd2.price, p.price) AS price, ps.price AS special, wcd.unit AS weight_unit"
			. ($with_related ? ", GROUP_CONCAT(DISTINCT CAST(pr.related_id AS CHAR) SEPARATOR ',') AS rel " : "") . "
			FROM " . DB_PREFIX . "product p
			JOIN " . DB_PREFIX . "product_to_category AS p2c ON (p.product_id = p2c.product_id" . ($this->is_main_category ? " AND p2c.main_category = 1" : "") . ")
			".($this->is_main_category && $allowed_categories ? " JOIN " . DB_PREFIX . "product_to_category AS p2c2 ON (p.product_id = p2c2.product_id)" : "")."
			LEFT JOIN " . DB_PREFIX . "manufacturer m ON (p.manufacturer_id = m.manufacturer_id)
			LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)
			LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id)
			LEFT JOIN " . DB_PREFIX . "product_special ps ON (p.product_id = ps.product_id AND ps.customer_group_id = '" . (int)$customer_group . "' AND ps.date_start < NOW() AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())/* AND ps.priority = 0 */)
			LEFT JOIN " . DB_PREFIX . "product_discount pd2 ON (p.product_id = pd2.product_id AND pd2.customer_group_id = '" . (int)$customer_group . "' AND pd2.quantity = '1' AND pd2.date_start < NOW() AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())/* AND pd2.priority = 0 */)
			LEFT JOIN " . DB_PREFIX . "weight_class_description wcd ON (p.weight_class_id = wcd.weight_class_id) AND wcd.language_id='" . (int)$this->config->get('config_language_id') . "'"
			. ($with_related ? "LEFT JOIN " . DB_PREFIX . "product_related pr ON (p.product_id = pr.product_id AND p.date_available <= NOW() AND p.status = '1')" : "") . "
			WHERE p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'"
				.($allowed_categories ? " AND " . ($this->is_main_category ? "p2c2" : "p2c") . ".category_id IN (" . $this->db->escape($allowed_categories) . ")" : "")
				.$sql_blacklist
				.($allowed_manufacturers ? " AND p.manufacturer_id IN (" . $this->db->escape($allowed_manufacturers) . ")" : "") . "
				AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'
				AND p.date_available <= NOW() 
				AND p.status = '1'
				AND (p.quantity > '0' OR NOT(p.stock_status_id IN(" . implode(',', array_map('intval', $out_of_stock_ids)) . ")))
				GROUP BY p.product_id ORDER BY p.product_id LIMIT ".(int)$skip.", ".(int)$limit);
				
		return $query->rows;
	}

	public function getProductImages($numpictures = 9) {
		$query = $this->db->query("SELECT product_id, image FROM " . DB_PREFIX . "product_image ORDER BY product_id");
		$ret = array();
		foreach($query->rows as $row) {
			if (!isset($ret[$row['product_id']])) {
				$ret[$row['product_id']] = array();
			}
			if (count($ret[$row['product_id']]) < $numpictures)
				$ret[$row['product_id']][] = $row['image'];
		}
		return $ret;
	}

	public function getProductOptions($option_ids, $product_id) {
		$lang = (int)$this->config->get('config_language_id');
		
		$query = $this->db->query("SELECT pov.*, od.name AS option_name, ovd.name, ov.image
			FROM " . DB_PREFIX . "product_option_value pov 
			LEFT JOIN " . DB_PREFIX . "option_value ov ON (ov.option_value_id = pov.option_value_id)
			LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (pov.option_value_id = ovd.option_value_id)
			LEFT JOIN " . DB_PREFIX . "option_description od ON (od.option_id = pov.option_id) AND (od.language_id = '$lang')
			WHERE pov.option_id IN (". implode(',', array_map('intval', $option_ids)) .") AND pov.product_id = '". (int)$product_id."'
				AND ovd.language_id = '$lang'");
		return $query->rows;
	}
	
	public function getAttributes($attr_ids) {
		if (!$attr_ids) return array();
		$query = $this->db->query("SELECT a.attribute_id, ad.name
			FROM " . DB_PREFIX . "attribute a
			LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (a.attribute_id = ad.attribute_id)
			WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "'
				AND a.attribute_id IN (" . $this->db->escape($attr_ids) . ")
				ORDER BY a.attribute_id, ad.name");
		$ret = array();
		foreach($query->rows as $row) {
			$ret[$row['attribute_id']] = $row['name'];
		}
		return $ret;
	}
	
	public function getProductAttributes($product_id) {
		$query = $this->db->query("SELECT pa.attribute_id, pa.text, ad.name
			FROM " . DB_PREFIX . "product_attribute pa
			LEFT JOIN " . DB_PREFIX . "attribute_description ad ON (pa.attribute_id = ad.attribute_id)
			WHERE pa.product_id = '" . (int)$product_id . "'
				AND pa.language_id = '" . (int)$this->config->get('config_language_id') . "'
				AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'
				ORDER BY pa.attribute_id");
		return $query->rows;
	}
}
?>
