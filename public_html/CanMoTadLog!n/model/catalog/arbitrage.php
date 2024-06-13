<?php
class ModelCatalogArbitrage extends Model {

	public function addArbitrage($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "arbitrage SET status = '" . (int) $data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', rating = '" . (int) $data['rating'] . "'");

		$arbitrage_id = $this->db->getLastId();

		foreach ($data['arbitrage_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "arbitrage_description SET arbitrage_id = '" . (int) $arbitrage_id . "', language_id = '" . (int) $language_id . "', author = '" . $this->db->escape($value['author']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function editArbitrage($arbitrage_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "arbitrage SET status = '" . (int) $data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "', rating = '" . (int) $data['rating'] . "' WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "arbitrage_description WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");

		foreach ($data['arbitrage_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "arbitrage_description SET arbitrage_id = '" . (int) $arbitrage_id . "', language_id = '" . (int) $language_id . "', author = '" . $this->db->escape($value['author']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	}

	public function deleteArbitrage($arbitrage_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "arbitrage WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "arbitrage_description WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");
	}

	public function getArbitrage($arbitrage_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "arbitrage WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");

		return $query->row;
	}

	public function getArbitrages($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "arbitrage a LEFT JOIN " . DB_PREFIX . "arbitrage_description ad ON (a.arbitrage_id = ad.arbitrage_id) WHERE ad.language_id = '" . (int) $this->config->get('config_language_id') . "'";

		$sort_data = array(
			'ad.author',
			'a.rating',
			'a.status',
			'a.date_added'
		);

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY a.date_added";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getArbitrageDescriptions($arbitrage_id) {
		$arbitrage_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "arbitrage_description WHERE arbitrage_id = '" . (int) $arbitrage_id . "'");

		foreach ($query->rows as $result) {
			$arbitrage_description_data[$result['language_id']] = array(
				'author' => $result['author'],
				'description' => $result['description']
			);
		}

		return $arbitrage_description_data;
	}

	public function getTotalArbitrages() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "arbitrage");

		return $query->row['total'];
	}

	public function getTotalArbitragesAwaitingApproval() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "arbitrage WHERE status = '0'");

		return $query->row['total'];
	}

	public function tableExists() {
		$query = $this->db->query("SHOW TABLES LIKE '" . DB_PREFIX . "arbitrage'");

		return $query->num_rows;
	}

	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "arbitrage (
			arbitrage_id int(11) NOT NULL AUTO_INCREMENT,
			status tinyint(1) NOT NULL DEFAULT '0',
			date_added datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
			rating int(1) NOT NULL,
			PRIMARY KEY (arbitrage_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

		$this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "arbitrage_description (
			arbitrage_id int(11) NOT NULL,
			language_id int(11) NOT NULL,
			author varchar(64) NOT NULL,
			description text NOT NULL,
			PRIMARY KEY (arbitrage_id,language_id)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
	}

	public function unistall() {
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "arbitrage");
		$this->db->query("DROP TABLE IF EXISTS " . DB_PREFIX . "arbitrage_description");
	}

}

?>
