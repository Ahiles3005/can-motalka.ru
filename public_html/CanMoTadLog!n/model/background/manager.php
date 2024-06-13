<?php 
/**
* @author Shashakhmetov Talgat <talgatks@gmail.com>
*/
class ModelBackgroundManager extends Model {
	public function getPatterns(){
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "bg_mgr_patterns");
		return $query->rows;
	}

	public function getPattern($pid) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "bg_mgr_patterns WHERE `id` = '".(int)$pid."'");
		$query->rows[0]['additional_images'] = json_decode($query->rows[0]['additional_images'], true);
		return $query->rows;
	}

	public function editPattern($data) {
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$data[$key] = mysql_escape_string(json_encode($value));
			}else{
				$data[$key] = mysql_real_escape_string($value);
			}
		}
		//migration
		$show_shadow = (array_key_exists('show_shadow', $data))?$data['show_shadow']:0;
		$shadow_text = (array_key_exists('shadow_text', $data))?$data['shadow_text']:'';
		$padding_text = (array_key_exists('padding_text', $data))?$data['padding_text']:'';
		$additional_images = (array_key_exists('additional_images', $data))?$data['additional_images']:'';

		$this->db->query("UPDATE `" . DB_PREFIX ."bg_mgr_patterns` SET 
		`pattern_name` = '".$data['pattern_name']."',
		`bg_type` = ".$data['bg_type'].",
		`img1` = '".$data['img1']."',
		`img2` = '".$data['img2']."',
		`img3` = '".$data['img3']."',
		`img4` = '".$data['img4']."',
		`img1_align` = '".$data['img1_align']."',
		`img2_align` = '".$data['img2_align']."',
		`img3_align` = '".$data['img3_align']."',
		`img4_align` = '".$data['img4_align']."',
		`img1_repeat` = '".$data['img1_repeat']."',
		`img2_repeat` = '".$data['img2_repeat']."',
		`img3_repeat` = '".$data['img3_repeat']."',
		`img4_repeat` = '".$data['img4_repeat']."',
		`fix_left_right` = '".$data['fix_left_right']."',
		`color1` = '".$data['color1']."',
		`color2` = '".$data['color2']."',
		`fix_bg` = ".$data['fix_bg'].",
		`fix_bg_cont` = ".$data['fix_bg_cont'].",
		`full_width` = ".$data['full_width'].",
		`full_width_cont` = ".$data['full_width_cont'].",
		`show_shadow` = ".$show_shadow.",
		`shadow_text` = '".$shadow_text."',
		`padding_text` = '".$padding_text."',
		`bglink` = '".$data['bglink']."',
		`bglink_target` = '".$data['bglink_target']."',
		`custom_css` = '".$data['custom_css']."',
		`custom_js` = '".$data['custom_js']."',
		`additional_images` = '".$additional_images."'
		 WHERE `id` = ".$data['pid']);
	}
	public function addPattern($data) {
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$data[$key] = mysql_escape_string(json_encode($value));
			}else{
				$data[$key] = mysql_real_escape_string($value);
			}
		}
		$additional_images = (array_key_exists('additional_images', $data))?$data['additional_images']:'';
		$this->db->query("INSERT INTO `" . DB_PREFIX ."bg_mgr_patterns`(
			`pattern_name`, 
			`bg_type`, 
			`img1`, 
			`img2`, 
			`img3`, 
			`img4`, 
			`img1_align`, 
			`img2_align`, 
			`img3_align`, 
			`img4_align`, 
			`img1_repeat`, 
			`img2_repeat`, 
			`img3_repeat`, 
			`img4_repeat`, 
			`fix_left_right`, 
			`fix_bg`, 
			`fix_bg_cont`, 
			`full_width`, 
			`full_width_cont`, 
			`color1`, 
			`color2`, 
			`bglink`, 
			`bglink_target`,
			`custom_css`,
			`custom_js`,
			`additional_images`) VALUES (
			'".$data['pattern_name']."',
			".$data['bg_type'].",
			'".$data['img1']."',
			'".$data['img2']."',
			'".$data['img3']."',
			'".$data['img4']."',
			'".$data['img1_align']."',
			'".$data['img2_align']."',
			'".$data['img3_align']."',
			'".$data['img4_align']."',
			'".$data['img1_repeat']."',
			'".$data['img2_repeat']."',
			'".$data['img3_repeat']."',
			'".$data['img4_repeat']."',
			'".$data['fix_left_right']."',
			".$data['fix_bg'].",
			".$data['fix_bg_cont'].",
			".$data['full_width'].",
			".$data['full_width_cont'].",
			'".$data['color1']."',
			'".$data['color2']."',
			'".$data['bglink']."',
			'".$data['bglink_target']."',
			'".$data['custom_css']."',
			'".$data['custom_js']."',
			'".$additional_images."')");
	}
	
	public function getLayouts() {
		$query = $this->db->query("SELECT * FROM `".DB_PREFIX."bg_mgr_patterns` RIGHT JOIN `".DB_PREFIX."bg_mgr_layouts` ON `".DB_PREFIX."bg_mgr_patterns`.`id` = `".DB_PREFIX."bg_mgr_layouts`.`pattern_id`");
		return $query->rows;
	}
	public function editLayouts($data) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "bg_mgr_layouts`");
		foreach ($data as $key => $elem) {
			$this->db->query("INSERT INTO `" . DB_PREFIX ."bg_mgr_layouts`(
				`layout_id`, 
				`pattern_id`) VALUES (
				'".$key."',
				'".$elem."')");
		}
	}
	public function getCategories() {
		$query = $this->db->query("SELECT `" . DB_PREFIX . "category`.`category_id` AS `category_id`,`" . DB_PREFIX . "category`.`parent_id` AS `parent_id`,`" . DB_PREFIX . "bg_mgr_categories`.`pattern_id` AS `pattern_id`, `" . DB_PREFIX . "bg_mgr_categories`.`use_for_child` AS `use_for_child` FROM `" . DB_PREFIX . "category` LEFT JOIN `" . DB_PREFIX . "bg_mgr_categories` ON `" . DB_PREFIX . "category`.`category_id` = `" . DB_PREFIX . "bg_mgr_categories`.`category_id`");
		return $query->rows;
	}
	public function editCategories($data) {
		$this->db->query("DELETE FROM `" . DB_PREFIX . "bg_mgr_categories`");
		$this->db->query("INSERT INTO `" . DB_PREFIX ."bg_mgr_categories`(
			`category_id`, 
			`pattern_id`) VALUES ".$data);
	}
	public function deletePattern($pids) {
		foreach ($pids as $key => $pid) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "bg_mgr_patterns WHERE `id` = '" . (int)$pid . "'");
		}
	}
	public function copyPattern($pids, $name_postfix) {
		foreach ($pids as $key => $pid) {
			$data = $this->getPattern((int)$pid);
			$data[0]['pattern_name'] .= $name_postfix;
			$this->addPattern($data[0]);
		}
	}
	public function getCacheCount(){
		$files_c = glob(DIR_CACHE . 'cache.bgmgr_cat' . '*.*');
		$files_l = glob(DIR_CACHE . 'cache.bgmgr_layout' . '*.*');
		$files_gen = glob(DIR_CACHE . 'cache.bgmgr_css' . '*.*');
		$files_gen2 = glob(DIR_CACHE . 'cache.bgmgr_js' . '*.*');
		$files_css = array();
		if (!empty($files_gen)) {
			foreach ($files_gen as $key => $value) {
				$fname = explode('_', $value);
				$fname = explode('.', $fname[2]);
				if (is_file(DIR_CACHE.$fname[0].'.css')) {
					$files_css[] = DIR_CACHE.$fname[0].'.css';
				}
			}
		}
		$files_js = array();
		if (!empty($files_gen2)) {
			foreach ($files_gen2 as $key => $value) {
				$fname = explode('_', $value);
				$fname = explode('.', $fname[2]);
				if (is_file(DIR_CACHE.$fname[0].'.js')) {
					$files_js[] = DIR_CACHE.$fname[0].'.js';
				}
			}
		}
		return count($files_c)+count($files_l)+count($files_gen)+count($files_css)+count($files_gen2)+count($files_js);
	}
}
?>