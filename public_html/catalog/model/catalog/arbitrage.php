<?php
class ModelCatalogArbitrage extends Model {

	public function getArbitrages($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "arbitrage a LEFT JOIN " . DB_PREFIX . "arbitrage_description ad ON (a.arbitrage_id = ad.arbitrage_id) WHERE ad.language_id = '" . (int) $this->config->get('config_language_id') . "' AND a.status = '1'";

		$sql .= " ORDER BY a.date_added DESC, a.arbitrage_id DESC";

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 5;
			}

			$sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function addArbitrage($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "arbitrage SET status = '0', date_added = NOW(), rating = '" . (int) $data['rating'] . "'");

		$arbitrage_id = $this->db->getLastId();

		$languages = $data['languages'];

		foreach ($languages as $language) {			
			$this->db->query("INSERT INTO " . DB_PREFIX . "arbitrage_description SET arbitrage_id = '" . (int) $arbitrage_id . "', language_id = '" . (int) $language['language_id'] . "', author = '" . $this->db->escape($data['author']) . "', description = '" . $this->db->escape($data['description']) . "'");
		}
	}

	public function getTotalArbitrages() {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "arbitrage WHERE status = '1'");

		return $query->row['total'];
	}

}

?>
