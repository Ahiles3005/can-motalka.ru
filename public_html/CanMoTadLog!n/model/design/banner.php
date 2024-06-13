<?php
class ModelDesignBanner extends Model {
	public function addBanner($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "banner SET name = '" . $this->db->escape($data['name']) . "', status = '" . (int)$data['status'] . "'");
	
		$banner_id = $this->db->getLastId();
	
		if (isset($data['banner_image'])) {
			foreach ($data['banner_image'] as $banner_image) {
				            // Banner Image Sort
			//	$this->db->query("INSERT INTO " . DB_PREFIX . "banner_image SET banner_id = '" . (int)$banner_id . "', link = '" .  $this->db->escape($banner_image['link']) . "', image = '" .  $this->db->escape($banner_image['image']) . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "banner_image SET banner_id = '" .
                    (int)$banner_id . "', link = '" . $this->db->escape($banner_image['link']) .
                    "', image = '" . $this->db->escape($banner_image['image']) . "', sort = '" . $this->
                    db->escape($banner_image['sort']) . "'");
				
				$banner_image_id = $this->db->getLastId();
				
				foreach ($banner_image['banner_image_description'] as $language_id => $banner_image_description) {				
					$this->db->query("INSERT INTO " . DB_PREFIX . "banner_image_description SET banner_image_id = '" . (int)$banner_image_id . "', language_id = '" . (int)$language_id . "', banner_id = '" . (int)$banner_id . "', title = '" .  $this->db->escape($banner_image_description['title']) . "', color='" .  $this->db->escape($banner_image['color']) . "', fontcolor='" .  $this->db->escape($banner_image['fontcolor']) . "', align_top='" .  $this->db->escape($banner_image['align_top']) . "', width='" .  $this->db->escape($banner_image['width']) . "', link = '" .  $this->db->escape($banner_image['link']) . "', radius='" .  $this->db->escape($banner_image['radius']) . "', border='" .  $this->db->escape($banner_image['border']) . "', colorborder='" .  $this->db->escape($banner_image['colorborder']) . "', opacity='" .  $this->db->escape($banner_image['opacity']) . "'");
				}
			}
		}		
	}
	
	public function editBanner($banner_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "banner SET name = '" . $this->db->escape($data['name']) . "', status = '" . (int)$data['status'] . "' WHERE banner_id = '" . (int)$banner_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "banner_image WHERE banner_id = '" . (int)$banner_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "banner_image_description WHERE banner_id = '" . (int)$banner_id . "'");
			
		if (isset($data['banner_image'])) {
			foreach ($data['banner_image'] as $banner_image) {
				            // Banner Image Sort
			//	$this->db->query("INSERT INTO " . DB_PREFIX . "banner_image SET banner_id = '" . (int)$banner_id . "', link = '" .  $this->db->escape($banner_image['link']) . "', image = '" .  $this->db->escape($banner_image['image']) . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "banner_image SET banner_id = '" .
                    (int)$banner_id . "', link = '" . $this->db->escape($banner_image['link']) .
                    "', image = '" . $this->db->escape($banner_image['image']) . "', sort = '" . $this->
                    db->escape($banner_image['sort']) . "'");
				
				$banner_image_id = $this->db->getLastId();
				
				foreach ($banner_image['banner_image_description'] as $language_id => $banner_image_description) {				
					$this->db->query("INSERT INTO " . DB_PREFIX . "banner_image_description SET banner_image_id = '" . (int)$banner_image_id . "', language_id = '" . (int)$language_id . "', banner_id = '" . (int)$banner_id . "', title = '" .  $this->db->escape($banner_image_description['title']) . "', color='" .  $this->db->escape($banner_image['color']) . "', fontcolor='" .  $this->db->escape($banner_image['fontcolor']) . "', align_top='" .  $this->db->escape($banner_image['align_top']) . "', width='" .  $this->db->escape($banner_image['width']) . "', link = '" .  $this->db->escape($banner_image['link']) . "', radius='" .  $this->db->escape($banner_image['radius']) . "', border='" .  $this->db->escape($banner_image['border']) . "', colorborder='" .  $this->db->escape($banner_image['colorborder']) . "', opacity='" .  $this->db->escape($banner_image['opacity']) . "'");
				}
			}
		}			
	}
	
	public function deleteBanner($banner_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "banner WHERE banner_id = '" . (int)$banner_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "banner_image WHERE banner_id = '" . (int)$banner_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "banner_image_description WHERE banner_id = '" . (int)$banner_id . "'");
	}
	
	public function getBanner($banner_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "banner WHERE banner_id = '" . (int)$banner_id . "'");
		
		return $query->row;
	}
		
	public function getBanners($data = array()) {
		$sql = "SELECT * FROM " . DB_PREFIX . "banner";
		
		$sort_data = array(
			'name',
			'status'
		);	
		
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY name";	
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
		
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}		
		
		$query = $this->db->query($sql);

		return $query->rows;
	}
		
	public function getBannerImages($banner_id) {
		$banner_image_data = array();
		
		            // Banner Image Sort
		//$banner_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "banner_image WHERE banner_id = '" . (int)$banner_id . "'");
        $banner_image_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "banner_image WHERE banner_id = '" . (int)$banner_id . "' ORDER BY sort ASC");
		
		foreach ($banner_image_query->rows as $banner_image) {
			$banner_image_description_data = array();
			 
			$banner_image_description_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "banner_image_description WHERE banner_image_id = '" . (int)$banner_image['banner_image_id'] . "' AND banner_id = '" . (int)$banner_id . "'");
			
			foreach ($banner_image_description_query->rows as $banner_image_description) {			
				$banner_image_description_data[$banner_image_description['language_id']] = array('title' => $banner_image_description['title']);
				$color=$banner_image_description['color'];$fontcolor=$banner_image_description['fontcolor'];$align_top=$banner_image_description['align_top'];$width=$banner_image_description['width'];$radius=$banner_image_description['radius'];$border=$banner_image_description['border'];$colorborder=$banner_image_description['colorborder'];$opacity=$banner_image_description['opacity'];
			}
		
			$banner_image_data[] = array(
				'banner_image_description' => $banner_image_description_data,
				'color' => $color,'fontcolor' => $fontcolor,'align_top' => $align_top,'width' => $width,'radius' => $radius,'border' => $border,'colorborder' => $colorborder,'opacity' => $opacity,
				'link'                     => $banner_image['link'],
            // Banner Image Sort
				'sort'                     => $banner_image['sort'],
				'image'                    => $banner_image['image']	
			);
		}
		
		return $banner_image_data;
	}

   
            // Banner Image Sort
	public function addSortTable()
    {
   $this->db->query("ALTER TABLE  " . DB_PREFIX . "banner_image ADD sort INT( 5 ) NOT NULL DEFAULT  '500'");
    }

	public function getTotalBanners() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "banner");
		
		return $query->row['total'];
	}	
	
	public function changeStatus($banner_id, $column_name, $value){
		$this->db->query("UPDATE " . DB_PREFIX . "banner SET " . $column_name . " = '" . (int)$value . "' WHERE banner_id = '" . (int)$banner_id . "'");
	}
}
?>