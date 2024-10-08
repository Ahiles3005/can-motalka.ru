<?php 
class ModelCatalogSuppler extends Model {
	public function createTables() {
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler (form_id INT(10) AUTO_INCREMENT, suppler_id INT(11), name varchar(64), main INT(1), sort_order INT(13), rate decimal(12,4), ratep decimal(12,4), ratek decimal(12,4), cod varchar(128), item varchar(128), cat varchar(128), qu varchar(128), price varchar(128), descrip varchar(128), pic_ext varchar(256), manuf varchar(128), warranty varchar(512), ad varchar(2), status INT(2), my_cat INT(5), my_qu varchar(512), my_price INT(2), my_descrip varchar(512), my_manuf varchar(64), my_mark varchar(512), weight varchar(3), length varchar(3), width varchar(3), height varchar(3), parent  varchar(1), hide varchar(1), newphoto varchar(1), my_photo varchar(512), cheap varchar(3), addopt varchar(1), addseo varchar(1), related varchar(3), updte varchar(1), pmanuf varchar(1), upattr varchar(1), upopt varchar(1), upname varchar(1), myplus varchar(3), cprice varchar(3), minus varchar(1), chcode varchar(1), importseo varchar(1), sorder  varchar(3), spec varchar(128), upurl varchar(3), ref varchar(3), ref1 varchar(3), addattr varchar(1), exsame varchar(1), sku2  varchar(3), parss varchar(3), points varchar(64), places varchar(5), parsi varchar(3), pointi varchar(64), placei varchar(5), parsc varchar(3), pointc varchar(64), placec varchar(5), parsp varchar(3), pointp varchar(64), placep varchar(5), parsd varchar(3), pointd varchar(64), placed varchar(5), parsm varchar(3), pointm varchar(64), placem varchar(5), parsk varchar(3), parsq varchar(3), pointq varchar(64), placeq varchar(5), bprice varchar(3), kmenu varchar(3), catcreate varchar(1), stay varchar(1), joen varchar(1), off varchar(1), umanuf varchar(1), onn   varchar(12),  refer varchar(3), disc varchar(12), newurl varchar(1), upc varchar(3), ean varchar(3), mpn varchar(3), ddata varchar(3), bonus varchar(64), ddesc varchar(1), qu_discount varchar(128), plusopt varchar(1), idcat varchar(1), t_ref varchar(3), t_ref1 varchar(3), termin varchar(3), t_status varchar(255), onoff varchar(1), zero varchar(1),  metka varchar(1), jopt varchar(1), optsku varchar(1), newproduct varchar(5), opt_prices varchar(1), opt_fotos varchar(1), usd varchar(3), serie varchar(3), sleep varchar(1), ffile varchar(1), rprice varchar(3), subfolder varchar(1), delimiter varchar(1), skuprefix varchar(24), formdate datetime, PRIMARY KEY (form_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
	
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_data (nom_id int(11) AUTO_INCREMENT, form_id int(11), cat_ext varchar(128), category_id int(11), pic_int varchar(160), cat_plus varchar(512), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_attributes (nom_id int(11) AUTO_INCREMENT, form_id int(11), attr_ext varchar(128), attr_point varchar(64), attribute_id int(11), tags varchar(1), filter_group_id int(11), PRIMARY KEY (nom_id))  ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_options (nom_id int(11) AUTO_INCREMENT, form_id int(11), option_id int(11), opt varchar(64), opt_point varchar(64), po varchar(3), ko varchar(3), pr varchar(64), we varchar(3), `option_required` varchar(1), art varchar(3), foto varchar(3), opt_pref varchar(1), opt_margin varchar(1), PRIMARY KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_sku_description (nom_id int(11) AUTO_INCREMENT, sku_id int(11), sku varchar(64), store_id int(2), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_sku (nom_id int(11) AUTO_INCREMENT, sku_id int(11), product_id int(11), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions (relatedoptions_id int(11) AUTO_INCREMENT, relatedoptions_variant_product_id int(11), product_id int(11), quantity int(4), price_prefix varchar(1), price decimal(15,4), model varchar(64), sku varchar(64), upc varchar(12), ean varchar(14), location varchar(128), stock_status_id  int(11), defaultselect  tinyint(1), defaultselectpriority int(11), weight decimal(15,8), weight_prefix varchar(1), PRIMARY  KEY (relatedoptions_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_option  (relatedoptions_id int(11), product_id int(11), option_id int(11), option_value_id int(11)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_variant  (relatedoptions_variant_id int(11) AUTO_INCREMENT, relatedoptions_variant_name varchar(255), PRIMARY  KEY (relatedoptions_variant_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
				
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_variant_option  (relatedoptions_variant_id int(11), option_id int(11)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_variant_product  (relatedoptions_variant_product_id int(11) AUTO_INCREMENT, relatedoptions_variant_id int(11), product_id int(11), relatedoptions_use tinyint(1), PRIMARY  KEY (relatedoptions_variant_product_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_discount (relatedoptions_id int(11), customer_group_id int(11), quantity int(4), priority int(5), price decimal(15,4)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_special (relatedoptions_id int(11), customer_group_id int(11), priority int(5), price decimal(15,4)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "relatedoptions_to_char (relatedoptions_id int(11), char_id varchar(255)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_price (nom_id int(11) AUTO_INCREMENT, form_id int(11), nom varchar(3), ident varchar(16), mratek decimal(15,4), param varchar(128), point varchar(64),  noprice varchar(64), paramnp  varchar(128), pointnp varchar(64), baseprice int(1), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_ref (nom_id int(11) AUTO_INCREMENT, product_id int(11), ident varchar(16), url text, price decimal(15,4), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "redirect (redirect_id int(11) AUTO_INCREMENT, active tinyint(1) DEFAULT '0', from_url text, to_url text, response_code int(3) DEFAULT '301', date_start date DEFAULT '0000-00-00', date_end date DEFAULT '0000-00-00', times_used int(5) DEFAULT '0', product_id int(11), PRIMARY  KEY (redirect_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_seo (nom_id int(11) AUTO_INCREMENT,  form_id int(11), prod_title varchar(400), prod_meta_desc varchar(400), prod_desc text, prod_keyword varchar(1000), prod_h1 text, prod_photo text, cat_title varchar(400), cat_meta_desc varchar(400), cat_desc text, manuf_title varchar(400), manuf_meta_desc varchar(400), manuf_desc text, seo_1 text, seo_2 text, seo_3 text, seo_4 text, seo_5 text, seo_6 text, seo_7 text, seo_8 text, seo_9 text, seo_10 text, seo_11 text, seo_12 text, seo_13 text, seo_14 text, seo_15 text, seo_16 text, seo_17 text, seo_18 text, seo_19 text, seo_20 text, seo_r1 text, seo_r2 text, seo_r3 text, seo_r4 text, seo_r5 text, seo_r6 text, PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$query = $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "suppler_base_price (nom_id int(11) AUTO_INCREMENT, product_id int(11), model varchar(64), bprice decimal(12,4), bpack int(11), brate decimal(12,4), bsuppler varchar(2), bdisc decimal(12,4), bmin decimal(12,4), bav decimal(12,4), bmax decimal(12,4), optimal  decimal(12,4), market_percent_to_price decimal(6,3), market_percent_to_bprice decimal(6,3),  market_percent_to_bdprice decimal(6,3), PRIMARY  KEY (nom_id)) ENGINE=MyISAM DEFAULT CHARSET=utf8");
		
		$langs = $this->getAllLanguages();	
		if (!empty($langs)) {
			for ($i=1; $i<1000; $i++) {
				if (isset($langs[$i])) {
					$row = $this->getAttributeGroupDesc($langs[$i]);
					if (empty($row)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_group_description SET `attribute_group_id` = '" . 1 . "', `language_id` = '" . $langs[$i] . "', `name` = '   '");
					}	
					$row = $this->getAttributeGroup();
					if (empty($row)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_group SET `attribute_group_id` = '" . 1 . "', `sort_order` = '" . 0 . "'");
					}	
				}	
			}		
		}	
		
		$this->cache->delete('suppler');
	}
	
	public function	getAttributeGroupDesc($lang) {			
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_group_description WHERE `attribute_group_id` = '" . 1 . "' AND `language_id` = '" . $lang . "'");	
		
		return $query->row;		
	}
	
	public function	getAttributeGroup() {			
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_group WHERE `attribute_group_id` = '" . 1 . "'");	
		
		return $query->row;		
	}
	
	public function getMinAttribute() {	
		$query = $this->db->query("SELECT min(attribute_id) FROM " . DB_PREFIX . "attribute");	
		return $query->row;
	}
	
	public function getMaxSuppler() {	
		$query = $this->db->query("SELECT max(suppler_id) FROM " . DB_PREFIX . "suppler");	
		return $query->row;
	}
	
	public function getParent($i, $store) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store cs ON (c.category_id = cs.category_id) WHERE c.parent_id = '" . $i . "' and cs.store_id = '" . (int)$store . "'");		
	
		return $query->rows;		
	}
	
	public function getChain($i) {			
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE `category_id` = '" . $i . "' ORDER BY parent_id ASC");	
		
		return $query->rows;		
	}
	
	public function getMinCategoryID() {	
		$query = $this->db->query("SELECT min(category_id) FROM " . DB_PREFIX . "category");
		return $query->row;
	}
	
	public function getMaxCategoryID() {	
		$query = $this->db->query("SELECT max(category_id) FROM " . DB_PREFIX . "category");
		return $query->row;
	}	
	
	public function getMaxManufacturerID() {	
		$query = $this->db->query("SELECT max(manufacturer_id) FROM " . DB_PREFIX . "manufacturer");
		return $query->row;
	}
	
	public function getMaxOrders() {	
		$query = $this->db->query("SELECT max(order_id) FROM " . DB_PREFIX . "order_product");
		return $query->row;
	}
	
	public function getMinOrders() {	
		$query = $this->db->query("SELECT min(order_id) FROM " . DB_PREFIX . "order_product");
		return $query->row;
	}

	public function addSuppler($data, $x) {
		if (!isset($data['suppler_id']) or !$data['suppler_id']) {
			$row = $this->getMaxSuppler();
			if (!empty($row)) $data['suppler_id'] = $row['max(suppler_id)'] + 1;
			else $data['suppler_id'] = 1;		
		}
		$data['rate'] = str_replace(',','.',trim($data['rate']));
		if (!$data['rate']) $data['rate'] = 1.0;
		$data['ratep'] = str_replace(',','.',trim($data['ratep']));
		if (!$data['ratep']) $data['ratep'] = 1.0;		
		
		$lang = $this->config->get('config_language_id');
		if (!$x) {
			if (isset($data['main'])) $main = 1;
			else $main = 0;
		} else $main = $data['main'];
		
      	$this->db->query("INSERT INTO " . DB_PREFIX . "suppler SET `suppler_id` = '". $data['suppler_id'] . "', `name` = '" . $this->db->escape($data['name']) . "', `main` = '" . $main . "', `sort_order` = '" . $lang . "', `rate` = '" . $data['rate'] . "', `ratep` = '" . $data['ratep'] . "', `ratek` = '" . $data['ratek'] . "', `cod` = '" . $this->db->escape($data['cod']) . "', `item` = '" . $this->db->escape($data['item']) . "', `cat` = '" . $this->db->escape($data['cat']) . "', `qu` = '" . $this->db->escape($data['qu']) . "', `price` = '" . $this->db->escape($data['price']) . "', `descrip` = '" . $this->db->escape($data['descrip']) . "', `pic_ext` = '" . $this->db->escape($data['pic_ext']) . "', `manuf` = '" . $this->db->escape($data['manuf']) . "', `warranty` = '" . $this->db->escape($data['warranty']) . "', `ad` = '" . $data['ad'] . "', `status` = '" . $data['status'] . "', `my_cat` = '" . $data['my_cat'] . "', `my_qu` = '" . $this->db->escape($data['my_qu']) . "', `my_price` = '" . $data['my_price'] . "', `my_descrip` = '" . $this->db->escape($data['my_descrip']) . "', `my_manuf` = '" . $this->db->escape($data['my_manuf']) . "', `my_mark` = '" . $this->db->escape($data['my_mark']) . "', `weight` = '" . $this->db->escape($data['weight']) . "', `length` = '" . $this->db->escape($data['length']) . "', `width` = '" . $this->db->escape($data['width']) . "', `height` = '" . $this->db->escape($data['height']) ."', `parent` = '" . $data['parent'] ."', `hide` = '" . $data['hide'] ."', `newphoto` = '" . $this->db->escape($data['newphoto']) ."', `my_photo` = '" . $this->db->escape($data['my_photo']) ."', `cheap` = '" . $data['cheap'] ."', `addopt` = '" . $data['addopt'] ."', `addseo` = '" . $data['addseo'] . "', `related` = '" . $this->db->escape($data['related']) ."', `updte` = '" . $data['updte'] . "', `pmanuf` = '" . $data['pmanuf'] ."', `upattr` = '" . $data['upattr']."', `upopt` = '" . $data['upopt']. "', `upname` = '" . $data['upname']. "', `myplus` = '" . $data['myplus']. "', `cprice` = '" . $data['cprice']. "', `minus` = '" . $data['minus']. "', `chcode` = '" . $data['chcode']. "',  `importseo` = '" . $data['importseo'] ."', `sorder` = '" . $data['sorder']."', `spec` = '" . $data['spec']."', `upurl` = '" . $data['upurl']."', `ref` = '" . $data['ref']."', `ref1` = '" . $data['ref1']."', `addattr` = '" . $data['addattr'] ."', `exsame` = '" . 0 ."', `sku2` = '" . $data['sku2']."', `parss` = '" . $data['parss'] . "', `points` = '" . $this->db->escape($data['points']) . "', `places` = '" . $data['places'] . "', `parsi` = '" . $data['parsi'] . "', `pointi` = '" . $this->db->escape($data['pointi']) . "', `placei` = '" . $data['placei'] . "', `parsc` = '" . $data['parsc'] . "', `pointc` = '" . $this->db->escape($data['pointc']) . "', `placec` = '" . $data['placec'] . "', `parsp` = '" . $data['parsp'] . "', `pointp` = '" . $this->db->escape($data['pointp']) . "', `placep` = '" . $data['placep'] . "', `parsd` = '" . $data['parsd'] . "', `pointd` = '" . $this->db->escape($data['pointd']) . "', `placed` = '" . $data['placed'] . "', `parsm` = '" . $data['parsm'] . "', `pointm` = '" . $this->db->escape($data['pointm']) . "', `placem` = '" . $data['placem'] . "', `parsk` = '" . $data['parsk'] . "', `parsq` = '" . $data['parsq'] . "', `pointq` = '" . $this->db->escape($data['pointq']) . "', `placeq` = '" . $data['placeq'] . "', `bprice` = '" . $data['bprice'] . "', `kmenu` = '" . $data['kmenu'] . "', `catcreate` = '" .  0 . "', `stay` = '" . $data['stay'] . "', `joen` = '" . $data['joen'] . "', `off` = '" . $data['off'] . "', `umanuf` = '" . $data['umanuf'] . "', `onn` = '" . $data['onn'] . "', `refer` = '" . $data['refer'] . "', `disc` = '" . $data['disc'] . "', `newurl` = '" . $data['newurl'] ."', `upc` = '" . $data['upc'] . "', `ean` = '" . $data['ean'] . "', `mpn` = '" . $data['mpn'] . "', `ddata` = '" . 0 ."', `bonus` = '" . $data['bonus'] ."', `ddesc` = '" . $data['ddesc'] ."', `qu_discount` = '" . $data['qu_discount'] ."', `plusopt` = '" . $data['plusopt'] ."', `idcat` = '" . $data['idcat'] ."', `t_ref` = '" . $data['t_ref'] ."', `t_ref1` = '" . $data['t_ref1'] ."', `termin` = '" . $data['termin'] ."', `t_status` = '" . $data['t_status'] ."', `onoff` = '" . $data['onoff'] ."',  `zero` = '" . $data['zero'] ."',  `metka` = '" . $data['metka'] ."', `jopt` = '" . $data['jopt'] ."', `optsku` = '" . $data['optsku'] ."', `newproduct` = '" . $data['newproduct'] ."', `opt_prices` = '" . $data['opt_prices'] . "', `opt_fotos` = '" . $data['opt_fotos'] . "', `usd` = '" . $data['usd'] . "', `serie` = '" . $data['serie'] . "', `sleep` = '" . $data['sleep'] . "', `ffile` = '" . $data['ffile'] . "', `rprice` = '" . $data['rprice'] ."', `subfolder` = '" . $data['subfolder'] ."', `delimiter` = '" . $data['delimiter'] ."', `skuprefix` = '" . $data['skuprefix'] ."', `formdate` = '" . $data['formdate'] ."'");
		
		$form_id = $this->db->getLastId();
				
		$i = 0;	
		foreach ($data['cat_ext'] as $value) {
		  if ($data['cat_ext'][$i]) {		  
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_data SET `form_id` = '" . (int)$form_id . "', `cat_ext` = '" . $this->db->escape($data['cat_ext'][$i]) . "', `category_id` = '" . (int)$data['category_id'][$i] . "', `pic_int` = '" . $data['pic_int'][$i] . "', `cat_plus` = '" . $data['cat_plus'][$i] . "'");
		  }
			$i = $i +1;
		}
	
		$i = 0;	
		foreach ($data['attr_ext'] as $value) {
		  if ($data['attr_ext'][$i]) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_attributes SET `form_id` = '" . (int)$form_id . "', `attr_ext` = '" . $this->db->escape($data['attr_ext'][$i]) . "', `attr_point` = '". $this->db->escape($data['attr_point'][$i]) . "', `attribute_id` = '" . (int)$data['attribute_id'][$i] . "', `tags` = '" . $data['tags'][$i] . "', `filter_group_id` = '" . (int)$data['filter_group_id'][$i] . "'");
		  }
			$i = $i +1;			
		}

		$i = 0;	
		foreach ($data['opt'] as $value) {
		  if ($data['opt'][$i]) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_options SET `form_id` = '" . (int)$form_id . "', `opt` = '" . $this->db->escape($data['opt'][$i]) . "', `option_id` = '" . (int)$data['option_id'][$i] . "', `opt_point` = '" . $this->db->escape($data['opt_point'][$i]) . "', `po` = '" . $this->db->escape($data['po'][$i]) ."', `ko` = '" . $this->db->escape($data['ko'][$i]) . "', `pr` = '" . $this->db->escape($data['pr'][$i]) ."', `we` = '" . $this->db->escape($data['we'][$i]) ."', `option_required` = '" . $this->db->escape($data['option_required'][$i]) ."', `art` = '" . $this->db->escape($data['art'][$i]) ."', `foto` = '" . $this->db->escape($data['foto'][$i]) ."', `opt_pref` = '" . $data['opt_pref'][$i] ."', `opt_margin` = '" . $data['opt_margin'][$i] ."'");
		  }
			$i = $i +1;			
		}
		
		$i = 0;	
		foreach ($data['nom'] as $value) {
		  if ($data['nom'][$i]) {
				$data['mratek'][$i] = str_replace(',','.',$data['mratek'][$i]);
				if ((float)$data['mratek'][$i] == 0.000000) $data['mratek'][$i] = 1.0;
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_price SET `form_id` = '" . (int)$form_id . "', `nom` = '" . $data['nom'][$i] . "', `ident` = '" . $data['ident'][$i] . "', `mratek` = '" . $data['mratek'][$i] . "',  `param` = '" . $this->db->escape($data['param'][$i]) ."', `point` = '" . $this->db->escape($data['point'][$i]) . "', `noprice` = '" . $data['noprice'][$i] . "', `paramnp` = '" . $this->db->escape($data['paramnp'][$i]) ."', `pointnp` = '" . $this->db->escape($data['pointnp'][$i]) . "', `baseprice` = '" . $data['baseprice'][$i] ."'");
		  }
			$i = $i +1;			
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_seo SET `form_id` = '" . (int)$form_id . "', `prod_title` = '" . $this->db->escape($data['prod_title']) . "', `prod_meta_desc` = '" . $this->db->escape($data['prod_meta_desc']) ."', `prod_desc` = '" . $this->db->escape($data['prod_desc']) ."', `prod_keyword` = '" . $this->db->escape($data['prod_keyword']) ."', `prod_h1` = '" . $this->db->escape($data['prod_h1']) ."', `prod_photo` = '" . $this->db->escape($data['prod_photo']) ."', `prod_url` = '" . $this->db->escape($data['prod_url']) ."', `cat_title` = '" . $this->db->escape($data['cat_title']) ."', `cat_meta_desc` = '" . $this->db->escape($data['cat_meta_desc']) ."', `cat_desc` = '" . $this->db->escape($data['cat_desc']) ."', `manuf_title` = '" . $this->db->escape($data['manuf_title']) ."', `manuf_meta_desc` = '" . $this->db->escape($data['manuf_meta_desc']) ."', `manuf_desc` = '" . $this->db->escape($data['manuf_desc']) ."', `seo_1` = '" . $this->db->escape($data['seo_1']) ."', `seo_2` = '" . $this->db->escape($data['seo_2']) ."', `seo_3` = '" . $this->db->escape($data['seo_3']) ."', `seo_4` = '" . $this->db->escape($data['seo_4']) ."', `seo_5` = '" . $this->db->escape($data['seo_5']) ."', `seo_6` = '" . $this->db->escape($data['seo_6']) ."', `seo_7` = '" . $this->db->escape($data['seo_7']) ."', `seo_8` = '" . $this->db->escape($data['seo_8']) ."', `seo_9` = '" . $this->db->escape($data['seo_9']) ."', `seo_10` = '" . $this->db->escape($data['seo_10']) ."', `seo_11` = '" . $this->db->escape($data['seo_11']) ."', `seo_12` = '" . $this->db->escape($data['seo_12']) ."', `seo_13` = '" . $this->db->escape($data['seo_13']) ."', `seo_14` = '" . $this->db->escape($data['seo_14']) ."', `seo_15` = '" . $this->db->escape($data['seo_15']) ."', `seo_16` = '" . $this->db->escape($data['seo_16']) ."', `seo_17` = '" . $this->db->escape($data['seo_17']) ."', `seo_18` = '" . $this->db->escape($data['seo_18']) ."', `seo_19` = '" . $this->db->escape($data['seo_19']) ."', `seo_20` = '" . $this->db->escape($data['seo_20']) ."'");
				
		$this->cache->delete('suppler');		
	}
		
	public function editSuppler($form_id, $data) {
		if (!isset($data['suppler_id']) or !$data['suppler_id']) return;
		
		if ($data['name'] == "New" or $data['name'] == "new" or $data['name'] == "NEW")  {
		    unset($data['cat_ext'],$data['cat_plus'],$data['category_id'],$data['pic_int']);
			$rows = $this->getSupplerData($form_id);
			for ($i=0; $i<5000; $i++) {
				if (!isset($rows[$i]['cat_ext'])) break;
				$data['cat_ext'][$i] = $rows[$i]['cat_ext'];
				$data['cat_plus'][$i] = $rows[$i]['cat_plus'];
				$data['category_id'][$i] = $rows[$i]['category_id'];
				$data['pic_int'][$i] = $rows[$i]['pic_int'];
			}			
			$this->addSuppler($data, 0);
			return;
		}	
			
		$data['rate'] = str_replace(',','.',trim($data['rate']));
		if (!$data['rate']) $data['rate'] = 1.0;
		$data['ratep'] = str_replace(',','.',trim($data['ratep']));
		if (!$data['ratep']) $data['ratep'] = 1.0;		
	
		$lang = $this->config->get('config_language_id');
		if (isset($data['main'])) $main = 1;
		else $main = 0;
		
      	$this->db->query("UPDATE " . DB_PREFIX . "suppler SET `suppler_id` =  '". $data['suppler_id'] . "', `name` = '" . $this->db->escape($data['name']) . "', `main` = '" . $main . "', `sort_order` = '" . $lang . "', `rate` = '" . $data['rate'] . "', `ratep` = '" . $data['ratep'] . "', `ratek` = '" . $data['ratek'] . "', `cod` = '" . $this->db->escape($data['cod']) . "', `item` = '" . $this->db->escape($data['item']) . "', `cat` = '" . $this->db->escape($data['cat']) . "', `qu` = '" . $this->db->escape($data['qu']) . "', `price` = '" . $this->db->escape($data['price']) . "', `descrip` = '" . $this->db->escape($data['descrip']) . "', `pic_ext` = '" . $this->db->escape($data['pic_ext']) . "', `manuf` = '" . $this->db->escape($data['manuf']) . "', `warranty` = '" . $this->db->escape($data['warranty']) . "', `ad` = '" . $data['ad'] . "', `status` = '" . $data['status'] . "', `my_cat` = '" . $data['my_cat'] . "', `my_qu` = '" . $this->db->escape($data['my_qu']) . "', `my_price` = '" . $data['my_price'] . "', `my_descrip` = '" . $this->db->escape($data['my_descrip']) . "', `my_manuf` = '" . $this->db->escape($data['my_manuf']) . "', `my_mark` = '" . $this->db->escape($data['my_mark']) . "', `weight` = '" . $this->db->escape($data['weight']) . "', `length` = '" . $this->db->escape($data['length']) . "', `width` = '" . $this->db->escape($data['width']) . "', `height` = '" . $this->db->escape($data['height']) . "', `parent` = '" . $data['parent'] . "', `hide` = '" . $data['hide'] . "', `newphoto` = '" . $this->db->escape($data['newphoto']) ."', `my_photo` = '" . $this->db->escape($data['my_photo']) ."', `cheap` = '" . $data['cheap'] ."', `addopt` = '" . $data['addopt'] ."', `addseo` = '" . $data['addseo'] . "', `related` = '" . $this->db->escape($data['related']) . "', `updte` = '" . $data['updte'] . "', `pmanuf` = '" . $data['pmanuf'] . "', `upattr` = '" . $data['upattr']."', `upopt` = '" . $data['upopt']. "', `upname` = '" . $data['upname']. "', `myplus` = '" . $data['myplus']. "', `cprice` = '" . $data['cprice']. "', `minus` = '" . $data['minus']. "', `chcode` = '" . $data['chcode']. "',  `importseo` = '" . $data['importseo'] ."', `sorder` = '" . $data['sorder']."', `spec` = '" . $data['spec']."', `upurl` = '" . $data['upurl']."', `ref` = '" . $data['ref']."', `ref1` = '" . $data['ref1']."', `addattr` = '" . $data['addattr'] ."', `exsame` = '" . 0 ."', `sku2` = '" . $data['sku2']."', `parss` = '" . $data['parss'] . "', `points` = '" . $this->db->escape($data['points']) . "', `places` = '" . $data['places'] . "', `parsi` = '" . $data['parsi'] . "', `pointi` = '" . $this->db->escape($data['pointi']) . "', `placei` = '" . $data['placei'] . "', `parsc` = '" . $data['parsc'] . "', `pointc` = '" . $this->db->escape($data['pointc']) . "', `placec` = '" . $data['placec'] . "', `parsp` = '" . $data['parsp'] . "', `pointp` = '" . $this->db->escape($data['pointp']) . "', `placep` = '" . $data['placep'] . "', `parsd` = '" . $data['parsd'] . "', `pointd` = '" . $this->db->escape($data['pointd']) . "', `placed` = '" . $data['placed'] . "', `parsm` = '" . $data['parsm'] . "', `pointm` = '" . $this->db->escape($data['pointm']) . "', `placem` = '" . $data['placem'] . "', `parsk` = '" . $data['parsk'] . "',`parsq` = '" . $data['parsq'] . "', `pointq` = '" . $this->db->escape($data['pointq']) . "', `placeq` = '" . $data['placeq'] . "', `bprice` = '" . $data['bprice'] . "', `kmenu` = '" . $data['kmenu'] . "', `catcreate` = '" .  0 . "', `stay` = '" . $data['stay'] . "', `joen` = '" . $data['joen'] . "', `off` = '" . $data['off'] . "', `umanuf` = '" . $data['umanuf'] . "', `onn` = '" . $data['onn'] . "', `refer` = '" . $data['refer'] . "', `disc` = '" . $data['disc'] . "', `newurl` = '" . $data['newurl'] ."', `upc` = '" . $data['upc'] . "', `ean` = '" . $data['ean'] . "', `mpn` = '" . $data['mpn'] . "', `ddata` = '" . 0 ."', `bonus` = '" . $data['bonus'] ."', `ddesc` = '" . $data['ddesc'] ."', `qu_discount` = '" . $data['qu_discount'] ."', `plusopt` = '" . $data['plusopt'] ."', `idcat` = '" . $data['idcat'] ."', `t_ref` = '" . $data['t_ref'] ."', `t_ref1` = '" . $data['t_ref1'] ."', `termin` = '" . $data['termin'] ."', `t_status` = '" . $data['t_status'] ."', `onoff` = '" . $data['onoff'] ."',  `zero` = '" . $data['zero'] ."',  `metka` = '" . $data['metka'] ."', `optsku` = '" . $data['optsku'] ."', `newproduct` = '" . $data['newproduct'] ."', `opt_prices` = '" . $data['opt_prices'] . "', `opt_fotos` = '" . $data['opt_fotos'] . "', `usd` = '" . $data['usd'] . "', `serie` = '" . $data['serie'] . "', `sleep` = '" . $data['sleep'] . "', `ffile` = '" . $data['ffile'] . "', `rprice` = '" . $data['rprice'] ."', `subfolder` = '" . $data['subfolder'] ."', `delimiter` = '" . $data['delimiter'] ."', `skuprefix` = '" . $data['skuprefix'] ."', `formdate` = '" . $data['formdate'] ."' WHERE `form_id` = '" . (int)$form_id . "'");
		
		for ($i=0; $i<50; $i++) {
			if (!isset($data['nom_id'][$i])) break;
			if (isset($data['del'][$i])) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_data WHERE `nom_id`='" . (int)$data['del'][$i]. "'");
			} else {
				$this->db->query("UPDATE " . DB_PREFIX . "suppler_data SET `cat_ext` = '" . $this->db->escape($data['cat_ext'][$i+3]) . "', `category_id` = '" . (int)$data['category_id'][$i+3] . "', `pic_int` = '" . $data['pic_int'][$i+3] . "', `cat_plus` = '" . $data['cat_plus'][$i+3] . "' WHERE `nom_id`='" . (int)$data['nom_id'][$i]. "'");
			}
			
		}
		for ($i=0; $i<3; $i++) {
			if ($data['cat_ext'][$i]) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_data SET `form_id` = '" . (int)$form_id . "', `cat_ext` = '" . $this->db->escape($data['cat_ext'][$i]) . "', `category_id` = '" . (int)$data['category_id'][$i] . "', `pic_int` = '" . $data['pic_int'][$i] . "', `cat_plus` = '" . $data['cat_plus'][$i] . "'");
			}	
		}		
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_attributes WHERE `form_id`='" . (int)$form_id. "'");
		
		$i = 0;			
		foreach ($data['attr_ext'] as $value) {
		  if ($data['attr_ext'][$i]) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_attributes SET `form_id` = '" . (int)$form_id . "', `attr_ext` = '" . $this->db->escape($data['attr_ext'][$i]) . "', `attr_point` = '". $this->db->escape($data['attr_point'][$i]) . "', `attribute_id` = '" . (int)$data['attribute_id'][$i] . "', `tags` = '" . $data['tags'][$i] . "', `filter_group_id` = '" . (int)$data['filter_group_id'][$i] . "'");
		  }
			$i = $i +1;			
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_options WHERE `form_id`='" . (int)$form_id. "'");
		
		$i = 0;	
		foreach ($data['opt'] as $value) {
		  if ($data['opt'][$i]) {		
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_options SET `form_id` = '" . (int)$form_id . "', `opt` = '" . $this->db->escape($data['opt'][$i]) . "', `option_id` = '" . (int)$data['option_id'][$i] . "', `opt_point` = '" . $this->db->escape($data['opt_point'][$i]) . "', `po` = '" . $this->db->escape($data['po'][$i]) ."', `ko` = '" . $this->db->escape($data['ko'][$i]) . "', `pr` = '" . $this->db->escape($data['pr'][$i]) ."', `we` = '" . $this->db->escape($data['we'][$i]) ."',   `option_required` = '" . $this->db->escape($data['option_required'][$i]) ."', `art` = '" . $this->db->escape($data['art'][$i]) ."', `foto` = '" . $this->db->escape($data['foto'][$i]) ."', `opt_pref` = '" . $data['opt_pref'][$i] ."', `opt_margin` = '" . $data['opt_margin'][$i] ."'");
		  }
			$i = $i +1;			
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_price WHERE `form_id`='" . (int)$form_id. "'");
		
		$i = 0;	
		foreach ($data['nom'] as $value) {
		  if ($data['nom'][$i]) {
				$data['mratek'][$i] = str_replace(',','.',$data['mratek'][$i]);
				if ((float)$data['mratek'][$i] == 0.000000) $data['mratek'][$i] = 1.0;
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_price SET `form_id` = '" . (int)$form_id . "', `nom` = '" . $data['nom'][$i] . "', `ident` = '" . $data['ident'][$i] . "', `mratek` = '" . $data['mratek'][$i] . "', `param` = '" . $this->db->escape($data['param'][$i]) ."', `point` = '" . $this->db->escape($data['point'][$i]) . "', `noprice` = '" . $data['noprice'][$i] . "', `paramnp` = '" . $this->db->escape($data['paramnp'][$i]) ."', `pointnp` = '" . $this->db->escape($data['pointnp'][$i]) . "', `baseprice` = '" . $data['baseprice'][$i] ."'");
		  }
			$i = $i +1;			
		}		
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_seo WHERE `form_id`='" . (int)$form_id. "'");
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_seo SET `form_id` = '" . (int)$form_id . "', `prod_title` = '" . $this->db->escape($data['prod_title']) . "', `prod_meta_desc` = '" . $this->db->escape($data['prod_meta_desc']) ."', `prod_desc` = '" . $this->db->escape($data['prod_desc']) ."', `prod_keyword` = '" . $this->db->escape($data['prod_keyword']) ."', `prod_h1` = '" . $this->db->escape($data['prod_h1']) ."', `prod_photo` = '" . $this->db->escape($data['prod_photo']) ."', `prod_url` = '" . $this->db->escape($data['prod_url']) ."',  `cat_title` = '" . $this->db->escape($data['cat_title']) ."', `cat_meta_desc` = '" . $this->db->escape($data['cat_meta_desc']) ."', `cat_desc` = '" . $this->db->escape($data['cat_desc']) ."', `manuf_title` = '" . $this->db->escape($data['manuf_title']) ."', `manuf_meta_desc` = '" . $this->db->escape($data['manuf_meta_desc']) ."', `manuf_desc` = '" . $this->db->escape($data['manuf_desc']) ."', `seo_1` = '" . $this->db->escape($data['seo_1']) ."', `seo_2` = '" . $this->db->escape($data['seo_2']) ."', `seo_3` = '" . $this->db->escape($data['seo_3']) ."', `seo_4` = '" . $this->db->escape($data['seo_4']) ."', `seo_5` = '" . $this->db->escape($data['seo_5']) ."', `seo_6` = '" . $this->db->escape($data['seo_6']) ."', `seo_7` = '" . $this->db->escape($data['seo_7']) ."', `seo_8` = '" . $this->db->escape($data['seo_8']) ."', `seo_9` = '" . $this->db->escape($data['seo_9']) ."', `seo_10` = '" . $this->db->escape($data['seo_10']) ."', `seo_11` = '" . $this->db->escape($data['seo_11']) ."', `seo_12` = '" . $this->db->escape($data['seo_12']) ."', `seo_13` = '" . $this->db->escape($data['seo_13']) ."', `seo_14` = '" . $this->db->escape($data['seo_14']) ."', `seo_15` = '" . $this->db->escape($data['seo_15']) ."', `seo_16` = '" . $this->db->escape($data['seo_16']) ."', `seo_17` = '" . $this->db->escape($data['seo_17']) ."', `seo_18` = '" . $this->db->escape($data['seo_18']) ."', `seo_19` = '" . $this->db->escape($data['seo_19']) ."', `seo_20` = '" . $this->db->escape($data['seo_20']) ."'");
				
		$this->cache->delete('suppler');		
	}
	
	public function deleteSuppler($form_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler WHERE `form_id` = '" . (int)$form_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_data WHERE `form_id` = '" . (int)$form_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_attributes WHERE `form_id`='" . (int)$form_id. "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_options WHERE `form_id`='" . (int)$form_id. "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_price WHERE `form_id`='" . (int)$form_id. "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_seo WHERE `form_id`='" . (int)$form_id. "'");
		
		$this->cache->delete('suppler');
	}
	
	public function getAllCategories($form_id) {
		$row = $this->getSuppler($form_id);
		$store = 0;
		if (!empty($row)) $store = $row['addattr'];		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_description cd ON (c.category_id = cd.category_id) LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE cd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND c2s.store_id = '" . (int)$store . "'  ORDER BY c.parent_id, c.sort_order, cd.name");

		$category_data = array();
		foreach ($query->rows as $row) {
			$category_data[$row['parent_id']][$row['category_id']] = $row;
		}		

		return $category_data;
	}
	
	public function getAllCategoriesStore($store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c2s.store_id = '" . (int)$store . "'  ORDER BY c.category_id");
		
		return $query->rows;
	}
		
	public function getAllFilters() {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "filter_group_description WHERE language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY name");
		
		$filters = array();
		$i=0;
		foreach ($query->rows as $row) {
			$filters[$i]['filter_group_id'] = $row['filter_group_id'];			
			$filters[$i]['name'] = $row['name'];
			$i++;
		}
		return $filters;
	}
	
	public function getAllManufacturers($form_id) {
		$row = $this->getSuppler($form_id);
		$store = 0;
		if (!empty($row)) $store = $row['addattr'];
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer m LEFT JOIN " . DB_PREFIX . "manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) WHERE m2s.store_id = '" . (int)$store . "' ORDER BY name");
		
		return $query->rows;
	}
	
	public function getManufacturerDesc($manufacturer_id, $lang) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer_description WHERE `manufacturer_id` = '" . $manufacturer_id . "' and `language_id` = '" . $lang . "'");
		
		return $query->rows;
	}
	
	public function getManufacturerStore($manufacturer_id, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer m LEFT JOIN " . DB_PREFIX . "manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) WHERE m.manufacturer_id = '" . $manufacturer_id . "' AND m2s.store_id = '" . (int)$store . "'");
		
		return $query->rows;
	}
	
	public function getCategoryByID($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE `category_id` = '" . $category_id . "'");
		
		return $query->row;
	}
	
	public function getCategoryDescriptionByID($category_id, $lang) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_description WHERE `category_id` = '" . $category_id . "' AND `language_id` = '" . (int)$lang . "'");
		
		return $query->row;
	}
	
	public function get100products($c, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . $c . "' AND c2s.store_id = '" . (int)$store . "' LIMIT 100");
		
		return $query->rows;
	}	
	
	public function upCategoryImage($category_id, $image) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "category SET `image` = '" . $image . "' WHERE `category_id` = '" . $category_id . "'");
	}
	
	public function upCategoryByID($row) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "category SET `image` = '" . $this->db->escape($row['image']) ."', `sort_order` = '" . $row['sort_order'] . "' WHERE `category_id` = '" . $row['category_id'] . "'");
	}

	public function upCategoryDescriptionByID($row, $lang) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "category_description SET `name` = '" . $this->db->escape($row['name']) ."', `description` = '" . $this->db->escape($row['description']) . "', `meta_description` = '" . $this->db->escape($row['meta_description']) . "', `meta_keyword` = '" . $this->db->escape($row['meta_keyword']) . "', `seo_title` = '" . $this->db->escape($row['seo_title']) . "', `seo_h1` = '" . $this->db->escape($row['seo_h1']) . "' WHERE `category_id` = '" . $row['category_id'] . "' and `language_id` = '" . $lang . "'");
	}
	
	public function getCategoryStore($category_id, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category c LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (c.category_id = c2s.category_id) WHERE c.category_id = '" . $category_id . "' AND c2s.store_id = '" . (int)$store . "'");
		
		return $query->rows;
	}
	
	public function subarr($arr, $id, &$ch) {		
		$j=0;
		for ($i=0; $i<10000; $i++) {	
			if (!isset($arr[$i]['parent_id'])) break;
			if ($arr[$i]['parent_id'] == $id) {	
				$ch[$j]['category_id'] = $arr[$i]['category_id'];
				$ch[$j]['status'] = $arr[$i]['status'];		
				$j++;
			}	
		}		
	}
	
	public function getChildCategory($parent_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE parent_id = '" . $parent_id . "'");
		
		return $query->rows;
	}
	
	public function getSuppler_SEO($form_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_seo WHERE `form_id` = '" . (int)$form_id . "'");
			
		return $query->rows;
	}
	
	public function getDataForm($cat, $form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_data WHERE `form_id` = '" . (int)$form_id . "' and `cat_ext` = '" . $cat . "'");
		
		return $query->rows;
	}
	
	public function getSuppler($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler WHERE `form_id` = '" . (int)$form_id . "'");
		
		return $query->row;
	}

	public function getStatus() {			
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "stock_status WHERE `language_id` = '" . $this->config->get('config_language_id') . "'");
		return $query->rows;	
	}

	public function getSupplerOptions($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_options WHERE `form_id` = '" . (int)$form_id . "' ORDER BY nom_id");
			
		return $query->rows;
	}	
	
	public function getLink($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_ref WHERE `product_id` = '" . $product_id . "' ORDER BY ident ASC");
			
		return $query->rows;
	}
	
	public function getSupplerSEO($form_id) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_seo WHERE `form_id` = '" . $form_id . "'");
		
		return $query->rows;
	}
	
	public function getBonus1($customer_group_id, $product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_reward WHERE `product_id` = '" . $product_id . "' AND `customer_group_id` = '" . $customer_group_id . "'");
			
		return $query->rows;
	}
	
	public function deleteBonus0($product_id) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `points` = '" . '' . "' WHERE `product_id` = '" . $product_id . "'");		
	}
	
	public function deleteBonus1($customer_group_id, $product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE `product_id` = '" . $product_id . "' and `customer_group_id` = '". $customer_group_id . "'");		
	}
	
	public function Bonus0($product_id, $value) {	
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `points` = '" . $value . "' WHERE `product_id` = '" . $product_id . "'");		
	}
	
	public function Bonus1($customer_group_id, $product_id, $value) {
		$rows = $this->getBonus1($customer_group_id, $product_id);
		if (!empty($rows)) {
			$query = $this->db->query("UPDATE " . DB_PREFIX . "product_reward SET `points` = '" . $value . "' WHERE `product_id` = '" . $product_id . "' AND `customer_group_id` = '". $customer_group_id . "'");
		} else {
			$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_reward SET `points` = '" . $value . "',   `product_id` = '" . $product_id . "', `customer_group_id` = '" . $customer_group_id . "'");
		}	
	}
		
	public function getProductSerie($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_series WHERE `product_id` = '" . $product_id . "'");
			
		return $query->rows;
	}
	
	public function getMasterProduct($serie_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_master WHERE `master_product_id` = '" . $serie_id . "'");
			
		return $query->rows;
	}
	
	public function isProductInSerie($product_id, $serie_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_master WHERE `product_id` = '" . $product_id . "' and `master_product_id` = '" . $serie_id . "'");
			
		return $query->row;
	}
	
	public function getSpecialAttribute($sag_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "special_attribute WHERE `special_attribute_group_id` = '" . $sag_id . "'");
			
		return $query->row;
	}
	
	public function getSpecialAttributeGroup($sagi) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "special_attribute WHERE `special_attribute_group_id` = '" . $sagi . "'");
			
		return $query->row;
	}
	
	public function getMasterSerie($serie_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_master WHERE `product_id` = '" . $serie_id . "' and `master_product_id` = '" . 0 . "'");
			
		return $query->row;
	}
	
	public function putSerie($product_id, $serie_id) {
		if ($serie_id < 1) return;
		$table = DB_PREFIX . "special_attribute";
		$tname = "special_attribute_group_id";
		if ($this->getColumnName($table, $tname)) {
		
			$row = $this->getMasterSerie($serie_id);		
			if (empty($row)) {			
				$row1 = $this->getSpecialAttributeGroup(2);
				if (empty($row1)) {
					$query = $this->db->query("INSERT INTO " . DB_PREFIX . "special_attribute SET `special_attribute_group_id` = '" . 2 . "'");
					
					$sa_id = $this->db->getLastId();
				} else 	$sa_id = $row1['special_attribute_id'];
					
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_master SET `product_id` = '" . $serie_id . "',   `master_product_id` = '" . 0 . "',   `special_attribute_group_id` = '" . 2 . "'");
				
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_special_attribute SET `product_id` = '" . $serie_id . "', `special_attribute_id` = '" . $sa_id . "'");
			}
			$sagi = 2;
			if (isset($row['special_attribute_group_id'])) $sagi = $row['special_attribute_group_id'];		
			$row = $this->isProductInSerie($product_id, $serie_id);	
			if (empty($row) and $product_id != $serie_id) {	
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_master SET `product_id` = '" . $product_id . "',   `master_product_id` = '" . $serie_id . "',   `special_attribute_group_id` = '" . $sagi . "'");
				
				$row = $this->getSpecialAttribute($sagi);	
				if (empty($row)) $row['special_attribute_id'] = 1;
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_special_attribute SET `product_id` = '" . $product_id . "', `special_attribute_id` = '" . $row['special_attribute_id'] . "'");
			}	
		} else {
			$table = DB_PREFIX . "kjseries_links";
			$tname = "parent_id";
			if ($this->getColumnName($table, $tname)) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "kjseries_links WHERE `parent_id` = '" . $serie_id . "' AND `product_id` = '" . $product_id . "'");
				
				if (!$query->rows) {
					$query = $this->db->query("INSERT INTO " . DB_PREFIX . "kjseries_links SET `product_id` = '" . $product_id . "',   `parent_id` = '" . $serie_id . "', `sort` = '" . 1 . "'");
				}
			}
		}	
	}	
	
	public function getlanguages() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "language ORDER BY `language_id` ASC");
			
		return $query->rows;
	}
	
	public function getAllLanguages() {
		$rows = $this->getlanguages();
		for ($i=1; $i<1000; $i++) {
			if (!isset($rows[$i-1]['language_id'])) break;
			$langs[$i] = $rows[$i-1]['language_id'];
		}
	return $langs;	
	}
	
	public function getOrderStatus($order_status_id, $lang) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_status WHERE `order_status_id` = '" . $order_status_id . "' AND `language_id` = '" . $lang . "'");
		
		return $query->row;	
	}
	
	public function getOrder($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order WHERE `order_id` = '" . $order_id . "'");
		
		return $query->row;	
	}
	
	public function getOrderTotal($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_total WHERE `order_id` = '" . $order_id . "'  ORDER BY `order_total_id` ASC");
		
		return $query->rows;	
	}
	
	public function getOrderProduct($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_product WHERE `order_id` = '" . $order_id . "'  ORDER BY `order_product_id` ASC");
		
		return $query->rows;
	}
	
	public function getOrderHistory($order_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_history WHERE `order_id` = '" . $order_id . "'  ORDER BY `order_history_id` ASC");
		
		return $query->rows;
	}
	
	public function deleteFilterProduct($product_id) {		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");	
	}
	
	public function isFilterInProduct($product_id, $filter) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_filter WHERE `filter_id` = '" . (int)$filter . "' and `product_id` = '" . (int)$product_id . "'");
		
		return $query->row;
	}
	
	public function AttributeToFilter($product_id, $filters) {
		for ($j=0; $j<100; $j++) {			
			for ($i=0; $i<3; $i++) {
				if (isset($filters[$i][$j]) and !empty($filters[$i][$j])) {
					$row = $this->isFilterInProduct($product_id, $filters[$i][$j]);
					if (empty($row)) {
						$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_filter SET `product_id` = '" . (int)$product_id . "', `filter_id` = '" . (int)$filters[$i][$j] . "'");
					}
				}
			}
		}	
	}
	
	public function changeFilter($find, $replace, $filter_group_id, $lang) {	
		$query = $this->db->query("UPDATE " . DB_PREFIX . "filter_description SET `name` = '" . $this->db->escape($replace) ."' WHERE `filter_group_id` = '" . $filter_group_id . "' and `name` = '" . $this->db->escape($find) . "' and `language_id` = '" . $lang . "'");
	}	

	public function findFilter($text, $filter_group_id, &$filter_id) {
		$filter_id = 0;		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "filter_description WHERE `filter_group_id` = '" . $filter_group_id . "' and `name` = '" . $this->db->escape($text) . "'");
		
		if (!empty($query->row)) $filter_id = $query->row['filter_id'];
	}
	
	public function checkFilter($text, $filter_group_id, $lang, &$filter_id) {
		$filter_id = 0;		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "filter_description WHERE `filter_group_id` = '" . $filter_group_id . "' and `name` = '" . $this->db->escape($text) . "' and `language_id` = '" . $lang . "'");
		
		if (!empty($query->row)) $filter_id = $query->row['filter_id'];
	}	
	
	public function CreateFilter($data, $filter_group_id, $langs, &$filters) {		
		if (!isset($data['text1']) or empty($data['text1'])) return;
		$t1 = array();
		$t2 = array(); 
		$t3 = array();
		$t1 = explode(',', $data['text1']);
		if (isset($data['text2'])) $t2 = explode(',', $data['text2']);
		if (isset($data['text3'])) $t3 = explode(',', $data['text3']);
		$n = count($t1);
		if ($n < count($t2)) $n = count($t2);
		if ($n < count($t3)) $n = count($t3);
		
		for ($j=0; $j<$n; $j++) {
			$id = 0;
			$filters[0][$j] = '';
			if (isset($t1[$j]) and !empty($t1[$j])) {
				$t1[$j] = trim($t1[$j]);
				$this->checkFilter($t1[$j], $filter_group_id, $langs[1], $filter_id);
				$filters[0][$j] = $filter_id;				
			}	
			$filters[1][$j] = '';
			if (isset($t2[$j]) and !empty($t2[$j])) {
				$t2[$j] = trim($t2[$j]);
				$this->checkFilter($t2[$j], $filter_group_id, $langs[2], $filter_id);
				$filters[1][$j] = $filter_id;			
			}			
			$filters[2][$j] = '';
			if (isset($t3[$j]) and !empty($t3[$j])) {
				$t3[$j] = trim($t3[$j]);
				$this->checkFilter($t3[$j], $filter_group_id, $langs[3], $filter_id);
				$filters[2][$j] = $filter_id;
			}
	
			if (!$filters[0][$j] and !$filters[1][$j] and !$filters[2][$j] and ($filters[0][$j] == '0' or $filters[1][$j] == '0' or $filters[2][$j] == '0')) {
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "filter SET `filter_group_id` = '" . (int)$filter_group_id . "', `sort_order` = '" . 0 . "'");
				
				$id = $this->db->getLastId();
			}

			for ($i=0; $i<3; $i++) {
			if ($id) {
					$name = '';
					if ($i == 0 and isset($t1[$j])) $name = $t1[$j];
					if ($i == 1 and isset($t2[$j])) $name = $t2[$j];
					if ($i == 2 and isset($t3[$j])) $name = $t3[$j];
		
					if (isset($langs[$i+1]) and !empty($name)) {
						$name = trim($name);		
						$query = $this->db->query("INSERT INTO " . DB_PREFIX . "filter_description SET  `filter_id` = '" . $id . "', `filter_group_id` = '" . (int)$filter_group_id . "', `language_id` = '" . (int)$langs[$i+1] . "', `name` = '" . $this->db->escape($name) . "'");
					
						$filters[$i][$j] = $id;
					}
				}
			}	
		}
	}
	
	public function getOptionsByName($name) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `name` = '" . $this->db->escape($name) . "' and `language_id` = '" . $lang . "' ORDER BY `option_value_id` ASC");
			
		return $query->rows;
	}
	
	public function getOptionsOfProduct($option_id, $option_value_id, $lang) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `option_value_id` = '" . $option_value_id . "' and `option_id` = '" . $option_id . "' and `language_id` = '" . $lang . "'");
			
		return $query->rows;	
	}
	
	public function getOptionsById($option_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `option_id` = '" . (int)$option_id . "'");
			
		return $query->rows;
	}

	public function getOptionsType($option_id) {		
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "option`  WHERE option_id = '" . (int)$option_id . "'");
			
		return $query->row;
	}
	
	public function addValueDescription($option_id, $ovid, $opt_val, $langs) {		
		for	($i=1; $i<=count($langs); $i++) {					
			$query = $this->db->query("INSERT INTO " . DB_PREFIX . "option_value_description SET `option_value_id` = '" . (int)$ovid . "', `language_id` = '" . $langs[$i] . "', `option_id` = '" . (int)$option_id . "', `name` = '" . $this->db->escape($opt_val) . "'");
		}
		$this->cache->delete('option');	
	}
	
	public function upOptionFoto($option_id, $option_value_id, $foto) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "option_value SET `image` = '" . $foto . "' WHERE `option_id` = '" . (int)$option_id . "' and `option_value_id` = '" . (int)$option_value_id . "'");	
		
	}	
	
	public function addValue($option_id, &$ovid, $foto, $upOptionFoto) {
		if ($upOptionFoto == 1) {
			$query = $this->db->query("INSERT INTO " . DB_PREFIX . "option_value SET `option_id` = '" . (int)$option_id . "', `image` = '" . $foto . "', `sort_order` = '" . 0 . "'");
		} else {
			$query = $this->db->query("INSERT INTO " . DB_PREFIX . "option_value SET `option_id` = '" . (int)$option_id . "', `sort_order` = '" . 0 . "'");
		}
		$ovid = $this->db->getLastId();	
		$this->cache->delete('option');	
	}
	
	public function getOptionID($name) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_description WHERE `name` = '" . $this->db->escape($name) . "'");
		
		return $query->rows;
	}
	
	public function getOptionValue($product_id, $option_value_id, $sku) {
		if (!$sku) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `option_value_id` = '" . (int)$option_value_id. "' and `product_id` = '" . (int)$product_id . "'");
		} else {
			if ($option_value_id) {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_id` = '" . (int)$product_id . "' and `optsku` = '" . $this->db->escape($sku) . "' and `option_value_id` = '" . (int)$option_value_id . "'");
			} else {
				$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_id` = '" . (int)$product_id . "' and `optsku` = '" . $this->db->escape($sku) . "'");
			}	
		}
		return $query->rows;
	}	
	
	public function getProductOption($product_id, $option_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option WHERE `option_id` = '" . (int)$option_id. "'  and `product_id` = '" . $product_id . "'");
		
		return $query->rows;
	}
	
	public function getOptionValueByName1($option_id, $name) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `name` = '" . $this->db->escape($name) . "' and `option_id` = '" . $option_id . "'");
		
		return $query->rows;
	}
	
	public function getOptionValueByName($name) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `name` = '" . $this->db->escape($name) . "'");
		
		return $query->rows;
	}
	
	public function getProductOptionValue($product_id, $option_value_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `option_value_id` = '" . (int)$option_value_id. "'  and `product_id` = '" . $product_id . "'");
		
		return $query->rows;
	}
		
	public function getProductAllOptionValue($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_id` = '" . $product_id . "'");
		
		return $query->rows;
	}
	
	public function getProductAllOption($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option WHERE `product_id` = '" . $product_id . "'");
		
		return $query->rows;
	}
	
	public function isProductOption($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_id` = '" . $product_id . "'");
		
		return $query->rows;
	}
	
	public function issetOpt($name, &$option_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_description WHERE `name` = '" . $this->db->escape($name) . "'");
		
		if (!empty($query->row['option_id'])) $option_id = $query->row['option_id'];		
	}

	public function createOpt($name, &$option_id) {
		$query = $this->db->query("INSERT INTO " . DB_PREFIX . "option SET `type` = 'select', `sort_order` = '" . 0 . "'");
		
		$option_id = $this->db->getLastId();
	}	
	
	public function createOption($name, $langs) {
		$option_id = 0;
		if (empty($name)) return 0;
		$this->issetOpt($name, $option_id);
		if ($option_id) return $option_id;
		$this->createOpt($name, $option_id);
		if ($option_id) {
			for	($i=1; $i<=count($langs); $i++) {
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "option_description SET `name` = '" . $this->db->escape($name) . "', `language_id` = '" . $langs[$i] . "', `option_id` = '" . $option_id . "'");
			}
		}
		return $option_id;
	}	
	
	public function cleanQuantityOption($product_id) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `quantity` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "'");	

		$query = $this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `quantity` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "'");
		
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "'");
	
		$this->cache->delete('option');
	}
	
	public function upOptionPlus($id, $price, $prefix) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $price . "', `price_prefix` = '" .$prefix . "' WHERE `product_option_value_id` = '" . (int)$id . "'");
			
		$table = DB_PREFIX . "product_option_value";
		$tname = "base_price";
		if ($this->getColumnName($table, $tname)) {		
			$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $price . "' WHERE `product_option_value_id` = '" . (int)$id . "'");
		}
	}
	
	public function getOptPic($product_id, $prod_opt_id, $prod_opt_val_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "poip_option_image WHERE `product_id` = '" . (int)$product_id . "' AND `product_option_value_id` = '" . (int)$prod_opt_val_id . "' AND `product_option_id` = '" . (int)$prod_opt_id . "'");
		
		return $query->rows;
	}	
	
	public function upProductOption($product_id, $option_id, $data_option, $subtract, $ad, $type, $my_price, $usd, $uu, $option_foto, &$prod_opt_val_id, $upOptionFoto, &$mas_prod_opt_val_id) {	
		$prod_opt_id = 0;
		$rows = $this->getProductOption($product_id, $option_id);
		if ($option_id) {
			if (empty($rows)) {
				if (!empty($data_option['opt'])) {
					if ($type == 'text') {
						$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET `product_id` = '" . (int)$product_id . "', `option_value` = '" . $this->db->escape($data_option['opt']) . "', `option_id` = '" . (int)$option_id . "', `required` = '" . $data_option['option_required'] . "'");
					} else {
						$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET `product_id` = '" . (int)$product_id . "', `option_id` = '" . (int)$option_id . "', `required` = '" . $data_option['option_required'] . "'");
					}
					$prod_opt_id = $this->db->getLastId();
				}							
			} else {
				if (!empty($data_option['opt'])) {
					if ($type == 'text') {
						$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option SET `required` = '" . $data_option['option_required'] . "', `option_value` = '" . $this->db->escape($data_option['opt']) . "' WHERE `product_id` = '" . (int)$product_id . "' AND `option_id` = '" . (int)$option_id . "'");
					} else {
						$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option SET `required` = '" . $data_option['option_required'] . "' WHERE `product_id` = '" . (int)$product_id . "' AND `option_id` = '" . (int)$option_id . "'");
					}
					$prod_opt_id = $rows[0]['product_option_id'];
				}				
			}
		}
		if ($type == 'text') return;	

		$rows = $this->getOptionValue($product_id, $data_option['op_val_id'], $data_option['optsku']);		
		if (empty($rows)) {
			$prod_opt_val_id = 0;
			if ($data_option['op_val_id'] and $prod_opt_id and $option_id) {
				$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET `product_option_id` = '" . (int)$prod_opt_id . "', `product_id` = '" . (int)$product_id. "', `option_id` = '" . (int)$option_id. "', `option_value_id` = '" . (int)$data_option['op_val_id'] . "', `quantity` = '" . (int)$data_option['ko'] . "', `subtract` = '" . (int)$subtract . "', `price` = '" . $data_option['pr'] . "', `price_prefix` = '" . $data_option['pr_prefix'] . "', `points` = '" . (int)$data_option['po'] . "', `points_prefix` = '" . $data_option['po_prefix'] . "', `weight` = '" . $data_option['we'] . "', `weight_prefix` = '" . $data_option['we_prefix'] . "', `optsku` = '" . $data_option['optsku'] . "'");
				
				$prod_opt_val_id = $this->db->getLastId();
			}
		} else {
			$prod_opt_val_id = 0;
			
			$st = "UPDATE " . DB_PREFIX . "product_option_value SET `subtract` = '" . (int)$subtract . "'";
			$e = 1;
			if ($data_option['pr_prefix'] == '=' and $data_option['pr'] != '') {
				$e = 0;
				if ($my_price == 1 or $rows[0]['price'] == 0) $e = 1;
				if ($my_price == 2 and (float)$rows[0]['price'] < (float)$data_option['pr']) $e = 1;			
				if ($my_price == 3 and (float)$rows[0]['price'] > (float)$data_option['pr']) $e = 1;				
			}
			if ($my_price == 4) $e = 0;
			
			if ($ad != 4 and $ad != 12 and $ad != 14) $st = $st . ", `quantity` = '" . (int)$data_option['ko'] . "'";
			if ($ad != 2 and $ad != 12 and $ad != 13) {
				if ($e and $data_option['ko'])	
				$st = $st . " , `price` = '" . $data_option['pr'] . "', `price_prefix` = '" . $data_option['pr_prefix'] . "'";
	
				if ($e and $usd and $uu != '') {
					$table = DB_PREFIX . "product_option_value";
					$tname = "base_price";
					if ($this->getColumnName($table, $tname))
					$st = $st . " , `base_price` = '" . $data_option['pr'] . "'";
				}
			}				
			if ($e and $data_option['po'] != '') $st = $st . " , `points` = '" . (int)$data_option['po'] . "', `points_prefix` = '" . $data_option['po_prefix'] . "'";
			
			if ($e and $data_option['we'] != '') $st = $st . " , `weight` = '" . $data_option['we'] . "', `weight_prefix` = '" . $data_option['we_prefix'] . "'";
	
			if (!$data_option['optsku'] and $data_option['op_val_id']) {
				$st = $st ." WHERE `option_value_id` = '" . $data_option['op_val_id'] . "' and `product_id` = '" . (int)$product_id . "'";
			}				
			if ($data_option['optsku'] and !$data_option['op_val_id']) {
				$st = $st ." WHERE `optsku` = '" . $this->db->escape($data_option['optsku']) . "' and `product_id` = '" . (int)$product_id . "'";
			}
			if ($data_option['optsku'] and $data_option['op_val_id']) {				
				$st = $st ." WHERE `optsku` = '" . $this->db->escape($data_option['optsku']) . "' and `option_value_id` = '" . (int)$data_option['op_val_id'] . "' and `product_id` = '" . (int)$product_id . "'";
			}	
			$query = $this->db->query($st);
			
			if (!empty($option_foto)) {
				$st = "SELECT * FROM " . DB_PREFIX . "product_option_value";
				
				if (!$data_option['optsku'] and $data_option['op_val_id']) {
					$st = $st ." WHERE `option_value_id` = '" . $data_option['op_val_id'] . "' and `product_id` = '" . (int)$product_id . "'";
				}				
				if ($data_option['optsku'] and !$data_option['op_val_id']) {
					$st = $st ." WHERE `optsku` = '" . $this->db->escape($data_option['optsku']) . "' and `product_id` = '" . (int)$product_id . "'";
				}
				if ($data_option['optsku'] and $data_option['op_val_id']) {				
					$st = $st ." WHERE `optsku` = '" . $this->db->escape($data_option['optsku']) . "' and `option_value_id` = '" . (int)$data_option['op_val_id'] . "' and `product_id` = '" . (int)$product_id . "'";
				}	
				$query = $this->db->query($st);				
			}
			$prod_opt_val_id = $rows[0]['product_option_value_id'];
			for ($ii=0; $ii<900; $ii++) {
				if (!isset($rows[$ii]['product_option_value_id'])) break;
				$mas_prod_opt_val_id[$ii]['prod_id'] = $rows[$ii]['product_option_value_id'];
				$mas_prod_opt_val_id[$ii]['val_id'] = $rows[$ii]['option_value_id'];
				$mas_prod_opt_val_id[$ii]['optsku'] = $rows[$ii]['optsku'];
				$mas_prod_opt_val_id[$ii]['opt'] = $rows[$ii]['option_id'];			
			}
		}
	
		if ($upOptionFoto == 2 and $prod_opt_val_id) {			
			$rows = $this->getOptPic($product_id, $prod_opt_id, $prod_opt_val_id);
			for ($x=0; $x<count($option_foto); $x++) {	
				if (!empty($option_foto[$x])) {
					$f = 1;
					foreach ($rows as $r) {
						if ($r['image'] == $option_foto[$x]) $f = 0;
					}	
					if ($f) {							
						$query = $this->db->query("INSERT INTO " . DB_PREFIX . "poip_option_image SET `product_id` = '" . (int)$product_id . "', `product_option_value_id` = '" . (int)$prod_opt_val_id . "', `product_option_id` = '" . (int)$prod_opt_id . "', `image` = '" . $option_foto[$x] . "', `sort_order` = '" . $x . "'");
					}				
				}
			}	
		}
		
		$this->cache->delete('option');		
	}
	
	public function getVariant($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions_variant_product WHERE `product_id` = '" . $product_id. "'");
			
		return $query->row;
	}
		
	public function getGroups($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions_option WHERE `product_id` = '" . $product_id. "' ORDER BY `relatedoptions_id` ");
			
		return $query->rows;
	}
	
	public function getLayout($product_id, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_layout WHERE `product_id` = '" . $product_id. "' and `store_id` = '" . $store . "'");
			
		return $query->rows;
	}
	
	public function getjOptionsID($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions_option WHERE `product_id` = '" . $product_id . "'");
			
		return $query->rows;
	}
	
	public function getGroupSumma($product_id, $gr) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions WHERE `product_id` = '" . $product_id. "' and  `relatedoptions_id` = '" . $gr . "'");
			
		return $query->row;
	
	}
	
	public function getAllGroups($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "relatedoptions WHERE `product_id` = '" . $product_id. "'");
			
		return $query->rows;
	
	}	
	
	public function jOption($gr_data, $ad) {	
		$mas1 = array();
		$mas2 = array();
		$rows = $this->getGroups($gr_data[1][1]);	
		$found = 0;
		$nom = 0;
		while(1) {	
			if (!isset($rows[$nom]['relatedoptions_id'])) break;			
			$mas1 = '';
			$mas2 = '';
			$k = 0;
			for ($j=0; $j<900; $j++) {
				if ($j == 0) {
					$mas1[$k] = $rows[$j+$nom]['option_id'];
					$mas2[$k] = $rows[$j+$nom]['option_value_id'];
					$gr = $rows[$j+$nom]['relatedoptions_id'];
				} else {
					if (isset($rows[$j+$nom]['relatedoptions_id']) and $rows[$j+$nom-1]['relatedoptions_id'] == $rows[$j+$nom]['relatedoptions_id']) {
						$k++;
						$mas1[$k] = $rows[$j+$nom]['option_id'];
						$mas2[$k] = $rows[$j+$nom]['option_value_id'];
					} else break;
				}
			}
	
			$found = 0;	
			$nom = $nom+$k+1;			
			for ($i=0; $i<900; $i++) {
				if (!isset($mas1[$i])) break;
				$ok = 0;
				for ($j=1; $j<900; $j++) {
					if (!isset($gr_data[$j][2])) break;	
					if ($mas1[$i] == $gr_data[$j][2] and $mas2[$i] == $gr_data[$j][3]) {
						$ok = 1;
						break;
					}					
				}				
				if (!$ok) break;			
			}
			if ($ok) {
				$found = 1;	
				break;
			}	
		}	
		if ($found) {
			if ($ad == 4 and $ad != 12 and $ad != 13) {
				$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `price` = '" .  $gr_data[1][5] . "', `sku` = '" . $gr_data[1][8] . "', `weight` = '" . $gr_data[1][7] . "', `weight_prefix` = '" . $gr_data[1][6] . "', `price_prefix` = '" . $gr_data[1][9] . "' WHERE `relatedoptions_id` = '" . $gr . "' and `product_id` = '" . $gr_data[1][1]. "'");
			}
			if ($ad == 2 and $ad != 12 and $ad != 14) {
				$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `quantity` = '" . $gr_data[1][4] . "', `sku` = '" . $gr_data[1][8] . "', `weight` = '" . $gr_data[1][7] . "', `weight_prefix` = '" . $gr_data[1][6] . "', `price_prefix` = '" . $gr_data[1][9] . "' WHERE `relatedoptions_id` = '" . $gr . "' and `product_id` = '" . $gr_data[1][1]. "'");
			}
			if ($ad != 2 and $ad != 4 and $ad != 12 and $ad != 13 and $ad != 14) {
				$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `quantity` = '" . $gr_data[1][4] . "', `price` = '" .  $gr_data[1][5] . "', `sku` = '" . $gr_data[1][8] . "', `weight` = '" . $gr_data[1][7] . "', `weight_prefix` = '" . $gr_data[1][6] . "', `price_prefix` = '" . $gr_data[1][9] . "' WHERE `relatedoptions_id` = '" . $gr . "' and `product_id` = '" . $gr_data[1][1]. "'");
			}			
			$row = $this->getGroupSumma($gr_data[1][1], $gr);
			if (empty($row)) {	
				$this->db->query("INSERT INTO " . DB_PREFIX . "relatedoptions SET `relatedoptions_id` = '" . (int)$gr . "', `product_id` = '" . (int)$gr_data[1][1] . "', `quantity` = '" . (int)$gr_data[1][4] . "', `price` = '" .  $gr_data[1][5] . "', `sku` = '" . $gr_data[1][8] . "', `weight` = '" . $gr_data[1][7] . "', `weight_prefix` = '" . $gr_data[1][6] . "', `price_prefix` = '" . $gr_data[1][9] . "'");
			}
		} else {			
			$this->db->query("INSERT INTO " . DB_PREFIX . "relatedoptions SET `product_id` = '" . (int)$gr_data[1][1] . "', `quantity` = '" . (int)$gr_data[1][4] . "', `price` = '" .  $gr_data[1][5] . "', `sku` = '" . $gr_data[1][8] . "', `weight` = '" . $gr_data[1][7] . "', `weight_prefix` = '" . $gr_data[1][6] . "', `price_prefix` = '" . $gr_data[1][9] . "'");			
			
			$next = $this->db->getLastId();
		
			for ($i=1; $i<900; $i++) {			
				if (!isset($gr_data[$i][3])) break;
				if ($gr_data[$i][2] != 0 and $gr_data[$i][3] != 0) {
				 $this->db->query("INSERT INTO " . DB_PREFIX . "relatedoptions_option SET `relatedoptions_id` =  '" . $next . "', `product_id` = '" . (int)$gr_data[1][1] . "', `option_id` = '" . $gr_data[$i][2] . "', `option_value_id` = '" . $gr_data[$i][3] . "'");
				} 
			}			
		}
		
		$row = $this->getVariant($gr_data[1][1]);
		if (empty($row)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "relatedoptions_variant_product SET `relatedoptions_use` = '" . 1 . "', `product_id` = '" . $gr_data[1][1]. "'");
			
			$row['relatedoptions_variant_product_id'] = $this->db->getLastId();
			
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions_variant_product SET `relatedoptions_use` = '" . 1 . "' WHERE `product_id` = '" . $gr_data[1][1]. "'");
		}	
		
		$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `relatedoptions_variant_product_id` = '" . $row['relatedoptions_variant_product_id'] . "' WHERE `product_id` = '" . $gr_data[1][1]. "'");
		
		unset($mas1);
		unset($mas2);
		$this->cache->delete('option');
	}
	
	public function getSupplerAttributes($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_attributes WHERE `form_id` = '" . (int)$form_id . "' ORDER BY nom_id");
			
		return $query->rows;
	}
	
	public function getAllAttr() {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute ORDER BY attribute_id");
			
		return $query->rows;
	}
	
	public function	DelAttribute($attribute_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "attribute WHERE attribute_id = '" . (int)$attribute_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "attribute_description WHERE attribute_id = '" . (int)$attribute_id . "'");
	
	}	
	
	public function	DelAttributeInProduct($product_id, $attribute_id, $lang) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' and attribute_id = '" . $attribute_id . "' and language_id = '" . $lang . "'");
		
		$this->cache->delete('product');	
	}
	
	public function	deleteAttribute($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");
		
		$this->cache->delete('product');
	}
	
	public function	getAllAttributes() {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_description ORDER BY attribute_id");
				
		return $query->rows;
	}
	
	public function	getAttrib($product_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE `product_id` = '" . (int)$product_id . "' ORDER BY attribute_id");
			
		return $query->rows;
	}
	
	public function	isProductAttribute($product_id, $attribute_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE `attribute_id` = '" . (int)$attribute_id . "' and `product_id` = '" . (int)$product_id . "' ORDER BY language_id");
			
		return $query->rows;
	}
	
	public function	isProductByAttribute($attribute_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE `attribute_id` = '" . (int)$attribute_id . "'");
			
		return $query->rows;
	}
	
	public function	isAttribute($attribute_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute WHERE `attribute_id` = '" . (int)$attribute_id . "'");
			
		return $query->row;
	}
	
	public function	getAttributes($product_id) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE `product_id` = '" . (int)$product_id . "' and `language_id` = '" . $lang . "' ORDER BY attribute_id");
			
		return $query->rows;
	}
	
	public function	getAttributeID($name) {
		$name = str_replace("-&gt;", "->", $name);
		$names =  mb_split('->', $name);	
		$n = $name;
		$group = 0;
		if (count($names) > 1) {
			$n = $names[1];			
			if (isset($names[0]) and !empty($names[0])) {
				$rows = $this->getAttributeByGroup($names[0]);
				if (!empty($rows)) $group = $rows[0]['attribute_group_id'];
			}	
		}
		if (!$group)
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_description WHERE `name` = '" . $this->db->escape($n) . "'");	
		else 	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_description d LEFT JOIN " . DB_PREFIX . "attribute a ON (d.attribute_id = a.attribute_id) WHERE d.name = '" . $this->db->escape($n) . "' AND a.attribute_group_id = '" . $group . "'");
		
		return $query->rows;		
	}
	
	public function upDesc($newdesc, $id) {
		$lang = $this->config->get('config_language_id');
		$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($newdesc) . "' WHERE `product_id` = '" . $id . "' and `language_id` = '" . $lang. "'");
		
		$this->cache->delete('*');
	}

	public function getOptionValuePhoto($id) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value WHERE `option_value_id` = '" . $id . "'");
            
        return $query->row;
	}
	
	public function getMaxOptionValueID() {	
		$query = $this->db->query("SELECT max(option_value_id) FROM " . DB_PREFIX . "option_value");
			
		return $query->row;
	}
	
	public function getMaxAttributeID() {	
		$query = $this->db->query("SELECT max(attribute_id) FROM " . DB_PREFIX . "attribute");
			
		return $query->row;
	}
	
	public function	checkAttribute($id, $lang) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_description WHERE `attribute_id` = '" . (int)$id . "' and `language_id` = '" . $lang . "'");
			
		return $query->rows;
	}	
	
	public function	getAttributeName($id) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_description WHERE `attribute_id` = '" . (int)$id . "' and `language_id` = '" . $lang . "'");
			
		return $query->rows;
	}	
	
	public function getAttributeById($product_id, $attribute_id, $lang) {        
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '". $attribute_id . "' and `language_id` = '". $lang. "'");
            
        return $query->rows;
    }		

	public function changeAttributeId($product_id, $attribute_id_new, $attribute_id_old) {		
		$rows = $this->isProductAttribute($product_id, $attribute_id_new);
		if (empty($rows)) {				
			$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `attribute_id` = '" . $attribute_id_new . "' WHERE `product_id` = '" . $product_id . "' and `attribute_id` = '" . $attribute_id_old. "'");
		} else {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' and `attribute_id` ='" . $attribute_id_old. "'");
		}
		$this->cache->delete('suppler');		
	}
	
	public function putAttributeById($data, $upattr, $langs) {
		if ($data['text1'] == '') return;
		$data['text1'] = str_replace("-&gt;", "->", $data['text1']);
		$names =  mb_split('->', $data['text1']);
		if (count($names) > 1) $data['text1'] = $names[1];
		$data['text2'] = str_replace("-&gt;", "->", $data['text2']);
		$names =  mb_split('->', $data['text2']);
		if (count($names) > 1) $data['text2'] = $names[1];
		$data['text3'] = str_replace("-&gt;", "->", $data['text3']);
		$names =  mb_split('->', $data['text3']);
		if (count($names) > 1) $data['text3'] = $names[1];
		$text1 = $data['text1'];
		$text2 = $data['text2'];
		$text3 = $data['text3'];
	
		if (preg_match('/^[0-9.,Ee+-]+$/', $text1) and (substr_count($text1, ".") or substr_count($text1, ","))) {
			if (substr_count($text1, ".") and substr_count($text1, ",")) $text1 = str_replace(',', '',$text1);
			if (is_numeric($text1)) {
				$text1 = str_replace(',', '.',$text1);
				$text1 = (string)round($text1, 2);
			}	
		}
		if (preg_match('/^[0-9.,Ee+-]+$/', $text2) and (substr_count($text2, ".") or substr_count($text2, ","))) {
			if (substr_count($text2, ".") and substr_count($text2, ",")) $text2 = str_replace(',', '',$text2);	
			if (is_numeric($text2)) {
				$text2 = str_replace(',', '.',$text2);
				$text2 = (string)round($text2, 2);
			}
		}
		if (preg_match('/^[0-9.,Ee+-]+$/', $text3) and (substr_count($text3, ".") or substr_count($text3, ","))) {
			if (substr_count($text3, ".") and substr_count($text3, ",")) $text3 = str_replace(',', '',$text3);
			if (is_numeric($text3)) {
				$text3 = str_replace(',', '.',$text3);
				$text3 = (string)round($text3, 2);
			}
		}
		
		if ($text1 != '') {
			$rows = $this->getAttributeById((int)$data['product_id'], (int)$data['attribute_id'], $langs[1]);
			if (empty($rows)) {			
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$data['product_id'] . "', `attribute_id` = '" . (int)$data['attribute_id'] . "', `language_id` = '" . $langs[1] . "', `text` = '" . $this->db->escape($text1) . "'");				
			} else {
				if ($upattr != 5)
				$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($text1). "' WHERE `product_id` = '" . (int)$data['product_id'] . "' and `attribute_id` = '" . (int)$data['attribute_id'] . "' and `language_id` = '" . $langs[1] . "'");
			}
			if ($text2 == '' and isset($langs[2])) {				
				if (empty($rows)) {			
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$data['product_id'] . "', `attribute_id` = '" . (int)$data['attribute_id'] . "', `language_id` = '" . $langs[2] . "', `text` = '" . $this->db->escape($text1) . "'");				
				} else {
					if ($upattr != 5)
					$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($text1). "' WHERE `product_id` = '" . (int)$data['product_id'] . "' and `attribute_id` = '" . (int)$data['attribute_id'] . "' and `language_id` = '" . $langs[2] . "'");
				}
			}
			if ($text3 == '' and isset($langs[3])) {				
				if (empty($rows)) {			
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$data['product_id'] . "', `attribute_id` = '" . (int)$data['attribute_id'] . "', `language_id` = '" . $langs[3] . "', `text` = '" . $this->db->escape($text1) . "'");				
				} else {
					if ($upattr != 5)
					$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($text1). "' WHERE `product_id` = '" . (int)$data['product_id'] . "' and `attribute_id` = '" . (int)$data['attribute_id'] . "' and `language_id` = '" . $langs[3] . "'");
				}
			}
		}
		if ($text2 != '' and isset($langs[2])) {
			$rows = $this->getAttributeById((int)$data['product_id'], (int)$data['attribute_id'], $langs[2]);
			if (empty($rows)) {	
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$data['product_id'] . "', `attribute_id` = '" . (int)$data['attribute_id'] . "', `language_id` = '" . $langs[2] . "', `text` = '" . $this->db->escape($text2) . "'");
			} else {
				if ($upattr != 5)
				$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($text2). "' WHERE `product_id` = '" . (int)$data['product_id'] . "' and `attribute_id` = '" . (int)$data['attribute_id'] . "' and `language_id` = '" . $langs[2] . "'");
			}	
		}
		if ($text3 != '' and isset($langs[3])) {
			$rows = $this->getAttributeById((int)$data['product_id'], (int)$data['attribute_id'], $langs[3]);
			if (empty($rows)) {	
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$data['product_id'] . "', `attribute_id` = '" . (int)$data['attribute_id'] . "', `language_id` = '" . $langs[3] . "', `text` = '" . $this->db->escape($text3) . "'");
			} else {
				if ($upattr != 5)
				$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($text3). "' WHERE `product_id` = '" . (int)$data['product_id'] . "' and `attribute_id` = '" . (int)$data['attribute_id'] . "' and `language_id` = '" . $langs[3] . "'");
			}	
		}
        $this->cache->delete('attribute');        
    }

	public function getGroup($attribute_id, $lang) {		
		$row = $this->isAttribute($attribute_id);
		if (empty($row)) return;
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_group_description WHERE `attribute_group_id` = '" . (int)$row['attribute_group_id'] . "' and `language_id` = '" . $lang . "'");
	
		return $query->rows;
	}
		

	public function getAttributeByGroup($name) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "attribute_group_description WHERE `name` = '" . $this->db->escape($name) . "'");
		
		return $query->rows;
	}

	public function createAttribute($data, &$attID, $langs) {
		if ((!empty($data['text2']) and count($langs) < 2) or (!empty($data['text3']) and count($langs) < 3) or empty($data['text1'])) {
			$attID = 1.2;
			return;
		}
		
		$t1 = 0;
		$t2 = 0;
		$t3 = 0;
		$rows = $this->getAttributeID($data['text1']);		
		if (!empty($rows)) {
			$t1 = 1;
			$attID1 = $rows[0]['attribute_id'];
		}	
		$rows = '';
		if (!empty($data['text2'])) $rows = $this->getAttributeID($data['text2']);
		if (!empty($rows)) {
			$t2 = 1;
			$attID2 = $rows[0]['attribute_id'];
		}
		$rows = '';
		if (!empty($data['text3'])) $rows = $this->getAttributeID($data['text3']);
		if (!empty($rows)) {
			$t3 = 1;
			$attID3 = $rows[0]['attribute_id'];
		}
			
		if (!$t1 and !$t2 and !$t3 and (!empty($data['text1']) or !empty($data['text2']) or !empty($data['text3']))) {
			$group = 1;
			$data['text1'] = str_replace("-&gt;", "->", $data['text1']);
			$names =  mb_split('->', $data['text1']);		
			if (count($names) > 1 and !empty($names[0])) {
				$rows = $this->getAttributeByGroup($names[0]);
				if (!empty($rows)) $group = $rows[0]['attribute_group_id'];
				if (!empty($names[1])) $data['text1'] = $names[1];
			}
			if (!empty($data['text2'])) {
				$data['text2'] = str_replace("-&gt;", "->", $data['text2']);
			    $names =  mb_split('->', $data['text2']);
			    if (count($names) > 1 and !empty($names[1])) $data['text2'] = $names[1];			
			}
			if (!empty($data['text3'])) {
				$data['text3'] = str_replace("-&gt;", "->", $data['text3']);
			    $names =  mb_split('->', $data['text3']);
			    if (count($names) > 1 and !empty($names[1])) $data['text3'] = $names[1];			
			}
			
			$this->db->query("INSERT INTO " . DB_PREFIX . "attribute SET attribute_group_id = '" . $group . "', sort_order = '" . 0 . "'");
			
			$attID = $this->db->getLastId();
			
			if (!$attID) {
				$err =  " Create Attribute error auto-increment " . "  \n";
				$this->adderr($err);
				$attID = 0;
				return;
			}	
						
			$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[1] . "', name = '" . $this->db->escape($data['text1']) . "'");
			
			if (empty($data['text2']) and isset($langs[2])) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[2] . "', name = '" . $this->db->escape($data['text1']) . "'");
			}				
			if (empty($data['text3']) and isset($langs[3])) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text1']) . "'");
			}		
			if (!empty($data['text2']) and isset($langs[2])) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[2] . "', name = '" . $this->db->escape($data['text2']) . "'");			
			}
			if (!empty($data['text3']) and isset($langs[3])) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text3']) . "'");			
			}
			
		}
	
		if ($t1 and !$t2) {
			$attID = $attID1;
			if (!empty($data['text2'])) {
				$rows = $this->checkAttribute($attID, $langs[2]);
				if (empty($rows) and isset($langs[2]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[2] . "', name = '" . $this->db->escape($data['text2']) . "'");			
			}		
		}
		if (!$t1 and $t2) {
			$attID = $attID2;
			if (!empty($data['text1'])) {
				$rows = $this->checkAttribute($attID, $langs[1]);
				if (empty($rows))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[1] . "', name = '" . $this->db->escape($data['text1']) . "'");
			}	
		}
		if (($t1 or $t2) and !$t3) {
			$attID = $attID1;
			if (!empty($data['text3'])) {
				$rows = $this->checkAttribute($attID, $langs[3]);
				if (empty($rows) and isset($langs[3]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text3']) . "'");			
			}		
		}
		if (!($t1 or $t2) and $t3) {
			$attID = $attID3;
			if (!empty($data['text3'])) {
				$rows = $this->checkAttribute($attID, $langs[3]);
				if (empty($rows) and isset($langs[3]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text3']) . "'");
			}	
		}
		if ($t1 and $t2 and $attID1 != $attID2) {
			$attID = $attID1;
			if (!empty($data['text2'])) {
				$rows = $this->checkAttribute($attID, $langs[2]);
				if (empty($rows) and isset($langs[2]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[2] . "', name = '" . $this->db->escape($data['text2']) . "'");
			}	
		}
		if ($t1 and $t2 and $attID1 == $attID2) $attID = $attID1;
		
		if ($t1 and $t3 and $attID1 != $attID3) {
			$attID = $attID1;
			if (!empty($data['text3'])) {
				$rows = $this->checkAttribute($attID, $langs[3]);
				if (empty($rows) and isset($langs[3]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text3']) . "'");
			}	
		}
		if ($t1 and $t3 and $attID1 == $attID3) $attID = $attID1;
		
		if (!$t1 and $t2 and $t3 and $attID2 != $attID3) {
			$attID = $attID2;
			if (!empty($data['text3'])) {
				$rows = $this->checkAttribute($attID, $langs[3]);
				if (empty($rows) and isset($langs[3]))
				$this->db->query("INSERT INTO " . DB_PREFIX . "attribute_description SET attribute_id = '" . $attID . "', language_id = '" . $langs[3] . "', name = '" . $this->db->escape($data['text3']) . "'");
			}	
		}
		if (!$t1 and $t2 and $t3 and $attID2 == $attID3) $attID = $attID2;
		
		$this->cache->delete('attribute');	
	
	}
	
	public function getRefSort($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_ref WHERE `product_id` = '" . (int)$product_id . "' ORDER BY ident");
			
		return $query->rows;
	}
	
	public function getRefIdent($product_id, $ident) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_ref WHERE `product_id` = '" . (int)$product_id . "' and `ident` = '" . $this->db->escape($ident) . "'");
			
		return $query->row;
	}
	
	public function saveRef($product_id, $ident, $url) {
		$row = $this->getRefIdent($product_id, $ident);
		if (empty($row)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_ref SET `product_id` = '" . $product_id . "', `ident` = '" . $ident . "', `url` = '" . $url . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "suppler_ref SET `url` = '" . $url . "' WHERE `product_id` = '" . $product_id . "' and `ident` = '" . $this->db->escape($ident) . "'");
		}
	}
	
	public function getSupplerPriceSort($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_price WHERE `form_id` = '" . (int)$form_id . "' ORDER BY ident");
			
		return $query->rows;
	}
	
	public function getSupplerPrice($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_price WHERE `form_id` = '" . (int)$form_id . "' ORDER BY nom_id");
			
		return $query->rows;
	}
	
	public function getReferens($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_ref WHERE `product_id` = '" . (int)$product_id . "'");
		
		return $query->rows;
	}
	
	public function getMySuppler($form_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler WHERE `form_id` = '" . (int)$form_id . "'");
			
		return $query->rows;
	}	
	
	public function getSupplers($order) {	
		$sql = "SELECT * FROM " . DB_PREFIX . "suppler ORDER BY ";
		if ($order == "ASC") $sql = $sql . "name ASC";
		else $sql = $sql . "suppler_id ASC";
	
		$query = $this->db->query($sql);		
		return $query->rows;
	}	
	
	public function getSame($names, $manufacturer_id, $category_id, $store) {
		$sql = "SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";
		
		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p2s.store_id = '" . (int)$store . "'";
		
		if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4]) and !empty($names[5]) and !empty($names[6]) and !empty($names[7]) and !empty($names[8]) and !empty($names[9])) {
		
			$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[5]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[6]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[7]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[8]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[9]) . "%')";

		} else {		
			if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4]) and !empty($names[5]) and !empty($names[6]) and !empty($names[7]) and !empty($names[8])) {
		
				$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[5]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[6]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[7]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[8]) . "%')";

			} else {		
				if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4]) and !empty($names[5]) and !empty($names[6]) and !empty($names[7])) {
		
					$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[5]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[6]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[7]) . "%')";

				} else {		
					if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4]) and !empty($names[5]) and !empty($names[6])) {
		
						$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[5]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[6]) . "%')";

					} else {		
						if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4]) and !empty($names[5])) {
		
							$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[5]) . "%')";

						} else {
							if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3]) and !empty($names[4])) {			
								$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[4]) . "%')";
							} else {
								if (!empty($names[0]) and !empty($names[1]) and !empty($names[2]) and !empty($names[3])) {			
									$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[3]) . "%')";
								} else {
									if (!empty($names[0]) and !empty($names[1]) and !empty($names[2])) {			
										$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[2]) . "%')";
									} else {
										if (!empty($names[0]) and !empty($names[1])) {
											$sql .= " AND (pd.name LIKE '%" . $this->db->escape($names[0]) . "%' OR pd.name LIKE '%" . $this->db->escape($names[1]) ."')";
										} else {
											if (!empty($names[0])) {
												$sql .= " AND pd.name LIKE '%" . $this->db->escape($names[0]) . "%'";
											} else if ($category_id == 0 and $manufacturer_id == 0) return '';
										}	
									}
								}
							}
						}	
					}	
				}
			}
		}	
		if ((int)$category_id != 0) {
			$sql .= " AND p2c.category_id = '" . (int)$category_id . "' AND p2s.store_id = '" . (int)$store . "'";
		}
		
		if ((int)$manufacturer_id != 0) {
			$sql .= " AND p.manufacturer_id = '" . $manufacturer_id . "' AND p2s.store_id = '" . (int)$store . "'";
		}
			
		$sql .= " ORDER BY pd.name ASC";	
			
		$query = $this->db->query($sql);
		return $query->rows;
	}	
	
	public function getMargin($form_id, $category_id) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_data WHERE `form_id` = '" . (int)$form_id . "' and `category_id` ='" . $category_id . "'");
			
		return $query->rows;
	}
	
	public function getColumnName($table, $name) {
		$query = $this->db->query("SELECT COLUMN_NAME FROM information_schema.columns WHERE table_name='" .$table."' AND  column_name = '". $this->db->escape($name) ."' AND table_schema ='" . DB_DATABASE . "'");
		
		$ok = 0;
		if (isset($query->row['COLUMN_NAME'])) $ok = 1;
		
		return $ok;
	}
	
	public function getDiscountAll($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE `product_id` ='" .$product_id."'");
	
		return $query->rows;
	}
	
	public function getActionAll($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_special WHERE `product_id` ='" .$product_id."'");
	
		return $query->rows;
	}
	
	public function getCustomerGroup($customer_group_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_group WHERE `customer_group_id` ='" .$customer_group_id."'");
	
		return $query->row;
	}
		
	public function deleteWholesale($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
	
		$this->cache->delete('product');
	}
	
	public function deleteWholesaleGroup($product_id, $group) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . $product_id . "' and customer_group_id = '" . $group . "'");
	
		$this->cache->delete('product');
	}
	
	public function putWholesale($data, $usd, $uu) {
		$row = $this->getCustomerGroup($data['customer_group_id']);
		if (empty($row)) return;
		if ($data['price'] != '' and $data['price'] != 0) {
			$table = DB_PREFIX . "product_discount";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname) and $usd and $uu != '') {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET `product_id` ='" .$data['product_id']."', `customer_group_id` = '".$data['customer_group_id']."', `quantity` = '".$data['quantity']."', `priority` = '".$data['priority']."', `price` = '".$data['price']."', `base_price` = '".$data['price']."', `date_start` = '".$data['date_start']."', `date_end` = '".$data['date_end']."'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET `product_id` ='" .$data['product_id']."', `customer_group_id` = '".$data['customer_group_id']."', `quantity` = '".$data['quantity']."', `priority` = '".$data['priority']."', `price` = '".$data['price']."', `date_start` = '".$data['date_start']."', `date_end` = '".$data['date_end']."'");
			}	
		}	
	}	
	
	public function deleteActionPrice($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE `product_id` ='" .$product_id. "'");
	
		$this->cache->delete('product');
	}

	public function getActionPrice($product_id, $customer_group_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_special WHERE `product_id` ='" .$product_id."' AND `customer_group_id` ='" . $customer_group_id . "'");
	
		return $query->row;
	}
	
	public function putActionPrice($data, $usd, $uu) {
		$row = $this->getCustomerGroup($data['customer_group_id']);
		if (empty($row)) return;
		if ($data['price'] != '' and $data['price'] != 0) {
			$table = DB_PREFIX . "product_special";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$data['product_id']."', `customer_group_id` = '".$data['customer_group_id']."', `priority` = '".$data['priority']."', `price` = '".$data['price']."', `base_price` = '".$data['price']."', `date_start` = '".$data['date_start']."', `date_end` = '".$data['date_end']."'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$data['product_id']."', `customer_group_id` = '".$data['customer_group_id']."', `priority` = '".$data['priority']."', `price` = '".$data['price']."', `date_start` = '".$data['date_start']."', `date_end` = '".$data['date_end']."'");
			}	
		}	
	}
	
	public function getTotalData($form_id) {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "suppler_data WHERE `form_id` = '" . (int)$form_id . "'");
		
		return $query->row['total'];
	}
	
	public function getTotalSupplers() {
      	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "suppler");
		
		return $query->row['total'];
	}	

	public function getSupplerData($form_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_data WHERE `form_id` = '" . (int)$form_id . "' ORDER BY nom_id ASC");
			
		return $query->rows;
	}
	
	public function getOptionSKU($sku) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `optsku` = '" . $sku . "'");
			
		return $query->rows;
	}
	
	public function getOrderOption($opi) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "order_option WHERE `order_product_id` = '" . $opi . "'");
		
		return $query->rows;
	}
	
	public function getoptsku($prod_opt_val_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_option_value_id` = '" . $prod_opt_val_id . "'");
		
		return $query->rows;
	}
	
	public function getProductBySKU($sku, $store) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.sku = '" . $this->db->escape($sku) . "' AND p2s.store_id = '" . (int)$store . "'");
			
		return $query->rows;
	}
	
	public function getProductsInCategory($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE `category_id` = '" . (int)$category_id . "'");
		
		return $query->rows;
	}
	
	public function getCategory($category_id) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE `category_id` = '" . (int)$category_id . "'");
		
		return $query->rows;
	}

	public function getAllManufacturerURL() {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `query` LIKE 'manufacturer_id%'");
	
		return $query->rows;	
	}

	public function chURLcategory($keyword) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `query` LIKE 'category_id%' and `keyword` = '" . $keyword ."'");
	
		return $query->rows;	
	}
	
	public function chURL($seo_url) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `keyword` = '" . $this->db->escape($seo_url) . "'");
	
		return $query->rows;
	}
	
	public function getURLmanufacturer($manufacturer_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `query` = 'manufacturer_id=".(int)$manufacturer_id . "'");
	
		return $query->row;	
	}
	
	public function getURLcategory($category_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `query` = 'category_id=".(int)$category_id . "'");
	
		return $query->row;	
	}
	
	public function getRedirect($product_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "redirect` WHERE `product_id` = '" . (int)$product_id . "'");
	
		return $query->row;	
	}

	public function getMinAliasID() {	
		$query = $this->db->query("SELECT min(url_alias_id) FROM " . DB_PREFIX . "url_alias");
			
		return $query->row;
	}
	
	public function getMaxAliasID() {	
		$query = $this->db->query("SELECT max(url_alias_id) FROM " . DB_PREFIX . "url_alias");
			
		return $query->row;
	}
	
	public function getAlias($url_alias_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `url_alias_id` = '" . $url_alias_id ."'");
	
		return $query->row;	
	}
	
	public function getURL($product_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "url_alias` WHERE `query` = 'product_id=".(int)$product_id."'");
	
		return $query->row;	
	}
	
	public function isLink($parent_id, $category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE `category_id` = '" . (int)$category_id . "' and `parent_id` = '" . (int)$parent_id . "'");
		
		return $query->rows;
	
	}
	
	public function getProductDiscount($product_id, $j) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE `product_id` = '" . (int)$product_id . "' and `customer_group_id` = '" . $j . "'");
		
		return $query->rows;
	}
	
	public function getCategoryPhoto($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category WHERE `category_id` = '" . (int)$category_id . "'");
		
		return $query->rows;
	}
	
	public function getCategoryName($category_id) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_description WHERE `category_id` = '" . (int)$category_id . "' and `language_id` = '" . $lang . "'");
		
		return $query->rows;
	}
	
	public function getCategoryIDbyName1($name, $store) {
	/*	$tr = array(
                "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
                "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"G","З"=>"Z","И"=>"I",
                "Й"=>"J","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
                "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
                "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"Z","Ч"=>"T",
                "Ш"=>"S","Щ"=>"S","Ъ"=>"a","Ы"=>"Y","Ь"=>"o",
                "Э"=>"E","Ю"=>"Y","Я"=>"Y","Ї"=>"I","Ґ" =>"G","І" =>"I","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e", "ё"=>"e","ж"=>"g",
                "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"z","ч"=>"h","ш"=>"s","щ"=>"s","ъ"=>"a",
                "ы"=>"y","ь"=>"o","э"=>"e","ю"=>"y","я"=>"y",
                "ї"=> "j", "і"=> "i", "ґ" =>"g", "Є" =>"e", "є" =>"e","ў" =>"u","Ў"=>"U","і" =>"i","І" =>"I" );
				
		$t = strtr($name, $tr);
		unset($tr);		
		
		for ($i=strlen($t)-1; $i>0; $i--) {
			if (preg_match('/[A-Z]/', $t[$i])) break;
		}
		if (preg_match('/^[А-Яа-я]/', $name)) $i = $i*2;
		if ($i<strlen($name)) $name = iconv_substr($name, $i);	*/
		
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_description cd LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (cd.category_id = c2s.category_id) WHERE cd.name LIKE '%" . $this->db->escape($name) . "' AND  cd.language_id = '" . $lang . "' AND c2s.store_id = '" . (int)$store . "'");
		
		return $query->rows;
	}
	
	public function getCategoryIDbyName($name, $store) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "category_description cd LEFT JOIN " . DB_PREFIX . "category_to_store c2s ON (cd.category_id = c2s.category_id) WHERE cd.name LIKE '" . $this->db->escape($name) . "' AND  cd.language_id = '" . $lang . "' AND c2s.store_id = '" . (int)$store . "'");
		
		return $query->rows;
	}	
	
	public function CreateCategory($name, $langs, $parent_category_id, &$new_id, $date, $refer, $catdesc, $caturl, $catmd, $catmk, $catmt, $catmh, $seo_data, $store) {	
		if (!substr_count($refer, "/")) $refer = "data/category/" . $refer;
		$this->db->query("INSERT INTO " . DB_PREFIX . "category SET `image` = '" . $refer . "', `parent_id` = '" . (int)$parent_category_id . "', `top` = '" . 0 . "', `column` = '" . 1 ."', `sort_order` = '" . 0 . "', `status` = '" . 1 . "', `date_added` = '" . $date . "', `date_modified` = '" . $date . "'");
		
		$new_id = $this->db->getLastId();
		$seo = array();
		$this->seoCategory($store, $name, $parent_category_id, $seo_data, $seo);
		
		$seo_keyword = '';
		$h1 = $name;
		$seo_url = $this->TransLit($name);
		$seo_url = $this->MetaURL($seo_url);	
		$seo_url = strtolower($seo_url);
		
		if (!empty($caturl)) $seo_url = $caturl;		
		if (!empty($catdesc)) $seo['cat_desc'] = $catdesc;
		if (!empty($catmd)) $seo['cat_meta_desc'] = $catmd;
		if (!empty($catmk)) $seo_keyword = $catmk;
		if (!empty($catmt)) $seo['cat_title'] = $catmt;
		if (!empty($catmh)) $h1 = $catmh;
		
		for	($i=1; $i<=count($langs); $i++) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "category_description SET `category_id` = '". (int)$new_id . "', `language_id` = '" . $langs[$i] . "', `name` = '" . $this->db->escape($name) . "', `description` = '" . $this->db->escape($seo['cat_desc']) . "', `meta_description` = '" . $this->db->escape($seo['cat_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($h1) . "', `seo_title` = '" . $this->db->escape($seo['cat_title']) . "'");
		}

		$this->db->query("INSERT INTO " . DB_PREFIX . "category_to_store SET `category_id` = '". (int)$new_id . "', `store_id` = '". $store ."'");
		
		$rows1 = $this->chURL($seo_url);
		if (!empty($rows1)) $seo_url = $seo_url . '-' . $new_id;
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'category_id=" . (int)$new_id . "', keyword = '" . $this->db->escape($seo_url) . "'");		
		
		$this->cache->delete('category');
	}

	public function deleteProductImage($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");	
	}
	
	public function countPOPImages($im) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "poip_option_image WHERE `image` = '" . $im . "'");
		
		return $query->rows;
	}
	
	public function countDopImages($im) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE `image` = '" . $im . "'");
		
		return $query->rows;
	}
	
	public function countImages($im) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE `image` = '" . $im . "'");
		
		return $query->rows;
	}
	
	public function getProductImage($product_id) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE `product_id` = '" . (int)$product_id . "' ORDER BY `product_image_id` ASC");
		
		return $query->rows;
	}
	
	public function isCategoryOfProduct($product_id, $category_id) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE `product_id` = '" . (int)$product_id . "' AND `category_id` = '" . (int)$category_id . "'");
			
		return $query->rows;
	}
		
	public function getProductCategory($product_id) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE `product_id` = '" . (int)$product_id . "'");
			
		return $query->rows;
	}
	
	public function getProdOptions($product_id, $opt_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value WHERE `product_id` = '" . (int)$product_id . "' and `option_id` = '" . (int)$opt_id ."' ORDER BY `option_value_id` ASC");
			
		return $query->rows;
	
	}
	
	public function getPhotoPRO($product_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "poip_option_image WHERE `product_id` = '" . $product_id . "'");		
			
		return $query->rows;	
	}
	
	public function getPhotoOptionPRO($product_option_value_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "poip_option_image WHERE `product_option_value_id` = '" . $product_option_value_id . "'");		
			
		return $query->rows;	
	}
	
	public function getPhotoOption($option_value_id) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value WHERE `option_value_id` = '" . $option_value_id . "'");		
			
		return $query->rows;	
	}
	
	public function getNameOption($option_value_id) {
		$lang = $this->config->get('config_language_id');		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description WHERE `option_value_id` = '" . $option_value_id . "' and `language_id` = '" . $lang . "'");		
			
		return $query->rows;	
	}
	
	public function getOptions() {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "option` ORDER BY option_id");
	
		return $query->rows;
	}
	
	public function getRalatedAll($product_id) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . $product_id . "'");
	
		return $query->rows;
	
	}	
	
	public function getRalated($new, $old) {	
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_related` WHERE `product_id` = '" . $new . "' and `related_id` = '" . $old . "'");
	
		return $query->rows;
	
	}	
	
	public function addRelated($new, $old) {	
		$query = $this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET `product_id` = '" . $new . "', `related_id` = '" . $old . "'");
	
		$this->cache->delete('product');	
	}
	
	public function getMinID() {	
		$query = $this->db->query("SELECT min(product_id) FROM " . DB_PREFIX . "product");
			
		return $query->row;
	}
	
	public function getMaxID() {	
		$query = $this->db->query("SELECT max(product_id) FROM " . DB_PREFIX . "product");
			
		return $query->row;
	}

	public function getMaxAttribute() {	
		$query = $this->db->query("SELECT max(attribute_id) FROM " . DB_PREFIX . "attribute");
			
		return $query->row;
	}

	public function getMaxLanguage() {	
		$query = $this->db->query("SELECT max(language_id) FROM " . DB_PREFIX . "language");
			
		return $query->row;
	}
	
	public function addManufacturer($data, $langs, &$last_id, $seo_data, $store) {
		$name = $data['name'];
		$seo_keyword = '';	
		$seo_url = $this->TransLit($name);
		$seo_url = $this->MetaURL($seo_url);
		$seo_url = strtolower($seo_url);
						
		$this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer SET name = '" . $this->db->escape($name) . "', sort_order = '" . (int)$data['sort_order'] . "'");
		
		$last_id = $this->db->getLastId();
		$seo = array();
		$this->seoManufacturer($store, $name, $seo_data, $seo);		

		for	($i=1; $i<=count($langs); $i++) {
			$table = DB_PREFIX . "manufacturer_description";		
			if (!$this->getColumnName($table, "name")) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer_description SET `manufacturer_id` = '". (int)$last_id . "', `language_id` = '" . $langs[$i] . "', `description` = '" . $this->db->escape($seo['manuf_desc']) . "', `meta_description` = '" . $this->db->escape($seo['manuf_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['manuf_title']) . "'");
			} else {
				$this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer_description SET `manufacturer_id` = '". (int)$last_id . "', name = '" . $this->db->escape($name) . "', `language_id` = '" . $langs[$i] . "', `description` = '" . $this->db->escape($seo['manuf_desc']) . "', `meta_description` = '" . $this->db->escape($seo['manuf_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['manuf_title']) . "'");
			}	
		}
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "manufacturer_to_store SET manufacturer_id = '" . (int)$last_id . "', store_id = '" . $store . "'");
		
		$rows1 = $this->chURL($seo_url);
		if (!empty($rows1)) $seo_url = $seo_url . '-' . $last_id;
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'manufacturer_id=" . (int)$last_id . "', keyword = '" . $this->db->escape($seo_url) . "'");		
		
		$this->cache->delete('manufacturer');
	}
	
	public function getTable() {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "suppler_sku_description` WHERE `nom_id` = '" . 1 . "'");
	
		return $query->rows;
	
	}
		
	public function getMaxSkuID() {
		$query = $this->db->query("SELECT max(sku_id) FROM " . DB_PREFIX . "suppler_sku_description");
	
		return $query->row;
	}
	
	public function getMaxsku_id() {
		$query = $this->db->query("SELECT max(sku_id) FROM " . DB_PREFIX . "suppler_sku_description");
	
		return $query->row;
	}
	
	public function getSkuBysku_id($sku_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku_id` = '" . $sku_id . "'");
	
		return $query->rows;
	}
	
	public function getJoin($sku, $store) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku` = '" . $this->db->escape($sku) . "' AND store_id = '" . (int)$store . "'");
	
		return $query->rows;
	}
	
	public function getJoinOptSKU($sku, $store) {
		$rows = '';
		$rows = $this->getJoin($sku, $store);	
		if (!empty($rows)) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku_id` = '" . $rows[0]['sku_id'] . "' AND store_id = '" . (int)$store . "'");
			
			return $query->rows;
		}
		return $rows;
	}
	
	public function getskuDescription($sku, $store) {
		if ($store == 0) {
		  $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku` = '" . $this->db->escape($sku) . "' AND (`store_id` = '" . (int)$store . "' OR `store_id` = '') ");
		} else {  
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku` = '" . $this->db->escape($sku) . "' AND `store_id` = '" . (int)$store . "'");
		}
		return $query->row;	
	
	}	
	
	public function getSku($sku_id, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku_id` = '" . $sku_id . "' AND  store_id = '" . (int)$store . "'");
	
		return $query->rows;
	
	}
	
	public function getAllRecordsLibrary($sku, $store) {
		if ($store == 0) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku` = '" . $this->db->escape($sku) . "' AND  (`store_id` = '" . (int)$store . "' OR `store_id` = '') ");
		} else {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku` = '" . $this->db->escape($sku) . "' AND store_id = '" . (int)$store . "'");
		}
		return $query->rows;
	
	}
	
	public function getSkuID($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku WHERE `product_id` = '" . $product_id . "'");
	
		return $query->row;	
	
	}
	
	public function getProductByTable($sku, $store) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "suppler_sku ss ON (p.product_id = ss.product_id) LEFT JOIN " . DB_PREFIX . "suppler_sku_description ssd ON (ss.sku_id = ssd.sku_id) WHERE ssd.sku = '" . $this->db->escape($sku) . "' AND ssd.store_id = '" . (int)$store . "'");
	
		return $query->rows;
	}	
		
	public function getProductIDbySkuID($sku_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku WHERE `sku_id` = '" . $sku_id . "'");
	
		return $query->row;	
	}
	
	public function getskuIDbyProductID($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku WHERE `product_id` = '" . $product_id . "'");
	
		return $query->row;	
	}
	
	public function issetsku($id, $product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_sku WHERE `product_id` = '" . $product_id . "' and `sku_id` = '". $id. "'");
	
		return $query->row;	
	}
	
	public function putsku($product_id, $sku_id) {
		$row = $this->issetsku($sku_id, $product_id);
		if (empty($row)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_sku SET `sku_id` = '" . $sku_id . "', `product_id` = '" . $product_id . "'");
		}	
		
		$this->cache->delete('suppler');
	}

	public function getBasePrice($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "suppler_base_price WHERE `product_id` = '" . $product_id . "'");
	
		return $query->rows;	
	}	
	
	public function putProductBySKU($sku, $row_product, $updte, $upname, $max_attr, $attr_ext, $row, $tags, $addseo, $upurl, $umanuf, $seo_data, $store, $parent, $t_ref, $t_ref1, $metka, $yml, $usd, $catmany, $idcat) {		
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `model` = '" . $row_product[0]['model'] . "', `sku` = '" . $this->db->escape($row_product[0]['sku']) . "', `price` = '" . $row_product[0]['price'] . "', `stock_status_id` = '" . $row_product[0]['stock_status_id'] . "', `quantity` = '" . $row_product[0]['quantity'] . "', `subtract` = '". $row_product[0]['subtract']. "', `image` = '". $this->db->escape($row_product[0]['image']). "', `status` = '". $row_product[0]['hide'] ."',  `sort_order` = '" . (int)$row_product[0]['sort_order'] . "', `weight` = '". $row_product[0]['weight'] . "', `length` = '". $row_product[0]['length'] ."', `width` = '". $row_product[0]['width'] ."', `height` = '". $row_product[0]['height'] ."', `date_modified` = '" . $row_product[0]['date_modified'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
		
		if ($yml) {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `model` = '" . $row_product[0]['model'] . "', `sku` = '" . $this->db->escape($row_product[0]['sku']) . "', `price` = '" . $row_product[0]['price'] . "', `stock_status_id` = '" . $row_product[0]['stock_status_id'] . "', `subtract` = '". $row_product[0]['subtract']. "', `image` = '". $this->db->escape($row_product[0]['image']). "', `status` = '". $row_product[0]['hide'] ."',  `sort_order` = '" . (int)$row_product[0]['sort_order'] . "', `weight` = '". $row_product[0]['weight'] . "', `length` = '". $row_product[0]['length'] ."', `width` = '". $row_product[0]['width'] ."', `height` = '". $row_product[0]['height'] ."', `date_modified` = '" . $row_product[0]['date_modified'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
						
			if ($row_product[0]['quantity']) {
				$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `quantity` = '" . $row_product[0]['quantity'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
			}	
		}

		if ($usd and isset($row[$usd]) and $row[$usd] != '' and $row_product[0]['quantity']) {
			if ($row[$usd] == '0') $row[$usd] = '';
			$table = DB_PREFIX . "product";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname)) {
				$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_currency_code` = '" . $this->db->escape($row[$usd]) . "', `base_price` = '" . $row_product[0]['price'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");			
			}	
		}
		if (!empty($row_product[0]['upc']) or $row_product[0]['upc'] == '0')
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `upc` = '" . $this->db->escape($row_product[0]['upc']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");

		if (!empty($row_product[0]['ean']) or $row_product[0]['ean'] == '0')
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `ean` = '" . $this->db->escape($row_product[0]['ean']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
			
		if (!empty($row_product[0]['mpn']) or $row_product[0]['mpn'] == '0')
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `mpn` = '" . $this->db->escape($row_product[0]['mpn']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");	
		
		if ($row_product[0]['manufacturer_id'])
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `manufacturer_id` = '" . $row_product[0]['manufacturer_id'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
		
		if (!empty($row_product[0]['bprice'])) {
			$rows = $this->getBasePrice($row_product[0]['product_id']);
			if (empty($rows)) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "suppler_base_price` SET `product_id` = '" . (int)$row_product[0]['product_id'] . "', `model` = '" . $row_product[0]['model'] . "', `bprice` = '" . $row_product[0]['bprice'] . "', `bpack` = '" . $row_product[0]['bpack'] . "', `brate` = '" . $row_product[0]['brate'] . "', `bsuppler` = '" . $row_product[0]['bsuppler'] . "', `bdisc` = '" . $row_product[0]['bdisc'] . "'");
			} else {
				$this->db->query("UPDATE `" . DB_PREFIX . "suppler_base_price` SET `model` = '" . $row_product[0]['model'] . "', `bprice` = '" . $row_product[0]['bprice'] . "', `bpack` = '" . $row_product[0]['bpack'] . "', `brate` = '" . $row_product[0]['brate'] . "', `bsuppler` = '" . $row_product[0]['bsuppler'] . "', `bdisc` = '" . $row_product[0]['bdisc'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
			}
		}
		$lang = $this->config->get('config_language_id');
		$date = $row_product[0]['date_modified'];
		
		// Описание оригинал
		$descript = "";
		if (isset($row_product[0]['description'])) $descript = $row_product[0]['description'];
				
		// Наименование товара
		$prod_name = "";
		if (isset($row_product[0]['item'])) $prod_name = $row_product[0]['item'];			
		
		// Имя производителя
		$meta_manuf = '';
		if (isset($row_product[0]['manuf_name'])) $meta_manuf = $this->getName($row_product[0]['manuf_name']);		
	
		// Вытаскиваем название категории для этого продукта 
		$rows = $this->getCategoryName((int)$row_product[0]['category_id']);
		$meta_category_name = '';	
		if (isset($rows[0]['name'])) $meta_category_name = $rows[0]['name'];		
				
		// Метки: атрибуты товара см. стр "Атрибуты"
		$at ='';
		if ($max_attr) {			
			for ($j = 1; $j <= $max_attr; $j++) {
				if ($j > 30) break;
				if (isset($row[$attr_ext[$j]]) and !empty($row[$attr_ext[$j]])) {
					if (!preg_match('/^[0-9 ]+$/', $row[$attr_ext[$j]])) {
						if ($tags[$j]) {						
							$add = $this->getName($row[$attr_ext[$j]]);
							if (empty($at)) $at = $add;
							else $at = $at.','.$add;
						}	
					}	
				}	
			}
		}
		
		$tag = '';
		if ($metka) {
			$tag = $meta_category_name;
			if (!empty($meta_manuf)) $tag = $tag . ','. $meta_manuf;
			if (!empty($at)) $tag = $tag .',' . $at;
		
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
		}
		$seo = array();
		$this->seoProduct($store, (int)$row_product[0]['product_id'], $seo_data, $seo);
		$seo_h1 = $seo['prod_h1'];
		if (empty($seo_h1)) $seo_h1 = $prod_name;
		$seo_title = $seo['prod_title'];
		$meta_desc = $seo['prod_meta_desc'];
		$desc = $seo['prod_desc'];
		$keywords = $seo['prod_keyword'];
		$url = $seo['prod_url'];
		if (!empty($url)) {			
			$url = $this->TransLit($url);
			$url = $this->MetaURL($url);
			$url = strtolower($url);
		}		
	
		for ($j=1; $j<300; $j++) {
			if (!isset($row[$j]) or empty($row[$j])) continue;
			$a = '{' . $j . '}';
			$seo_h1 = str_replace($a, $row[$j], $seo_h1);
			$seo_title = str_replace($a, $row[$j], $seo_title);
			$meta_desc = str_replace($a, $row[$j], $meta_desc);
			$desc = str_replace($a, $row[$j], $desc);
			$keywords = str_replace($a, $row[$j], $keywords);
			$url = str_replace($a, $row[$j], $url);
		}
		$seo_h1 = $this->clearSEO($seo_h1);
		$seo_title = $this->clearSEO($seo_title);
		$meta_desc = $this->clearSEO($meta_desc);
		$desc = $this->clearSEO($desc);
		$keywords = $this->clearSEO($keywords);
		$url = $this->clearSEO($url);
		
		
		if ($updte == 4) $descript = $desc;
	
	// SEO URL
		$seo_url = $prod_name;			
	//	$seo_url = substr($seo_url, 0, 64);  // обрезать до 64 символов        
	//	$seo_url = $seo_url.'_'.$row_product[0]['model']; // название товара+Модель
	//  $seo_url = $row_product[0]['sku']."_".$row_product[0]['model']; // sku+model
	//	$seo_url = $seo_url."_".$row_product[0]['sku']; // название+sku
		$seo_url = $this->TransLit($seo_url);
		$seo_url = $this->MetaURL($seo_url);		
		$seo_url = strtolower($seo_url);			
		
		// Импорт мета-данных из прас-листа. Из колонок прайса номера: 38, 39, 40, 41, 42
		if ($addseo == 2) {	
			if (isset($row_product[0]['seo_h1']) and !empty($row_product[0]['seo_h1'])) $seo_h1 = $this->getName($row_product[0]['seo_h1']);
			if (isset($row_product[0]['seo_title']) and !empty($row_product[0]['seo_title'])) $seo_title = $this->getName($row_product[0]['seo_title']);
			if (isset($row_product[0]['meta_keyword']) and !empty($row_product[0]['meta_keyword'])) $keywords = $this->getName($row_product[0]['meta_keyword']);
			if (isset($row_product[0]['meta_description']) and !empty($row_product[0]['meta_description'])) $meta_desc = $this->symbol($row_product[0]['meta_description']);
			if (isset($row_product[0]['tag']) and !empty($row_product[0]['tag']) and $metka) $tag = $this->getName($row_product[0]['tag']);
		}
					
		if ($upurl == 2) {   // Импорт url из прас-листа. Из колонки прайса номер: 43
			if (isset($row_product[0]['url']) and !empty($row_product[0]['url'])) $seo_url = $this->symbol($row_product[0]['url']);
		}

		if ($upurl == 3 and !empty($url)) $seo_url = $this->symbol($url);	
		
		if ($addseo) {				
			if (!empty($meta_desc)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang .  "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}
			if (!empty($keywords)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($keywords) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($keywords) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}
			
			if (!empty($tag) and $metka) {
				$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
			}
			
			if (!empty($seo_h1)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($seo_h1) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($seo_h1) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}
			if (!empty($seo_title)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($seo_title) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($seo_title) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}			
		}
		
		if (($upurl or $yml) and !empty($seo_url)) {
			$rows = $this->getURL($row_product[0]['product_id'], $store);
			if (empty($rows)) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "url_alias` SET `keyword` = '" . $this->db->escape($seo_url) . "', `query` = 'product_id=" . (int)$row_product[0]['product_id'] . "'");
			} else {				
				$this->db->query("UPDATE `" . DB_PREFIX . "url_alias` SET `keyword` = '" . $this->db->escape($seo_url) . "' WHERE `query` = 'product_id=".(int)$row_product[0]['product_id']."'");		
			}
		}
	
		if ($updte > 1 or $yml) {		
			if (!empty($descript)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($descript) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($descript) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}
		}
	
		if ($upname or $yml) {		
			if (!empty($prod_name)) {
				if (!$yml) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = '" . $this->db->escape($prod_name) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = '" . $this->db->escape($prod_name) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
				}	
			}
		}
		
		if ((!empty($row_product[0]['ref']) or $row_product[0]['ref'] == '0') and preg_match('/^[0-9]+$/', $t_ref) and $t_ref > 0) {
			
			switch ($t_ref) {			
				case 1:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 2:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 3:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 4:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 5:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 6:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `minimum` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 7:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `subtract` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 8:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 9:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `length_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 10:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `weight_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 11:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `tax_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 12:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `points` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 13:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `location` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 14:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `jan` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;	
				case 15:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `isbn` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;					
				case 16:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `stock_status_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;				
				case 17:
					$rows = $this->getProductSerie((int)$row_product[0]['product_id']);
					if (empty($rows)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_series SET `product_id` = '" .(int)$row_product[0]['product_id']. "', `series_id` = '" . (int)$row_product[0]['ref'] . "'");
					} else {	
						$this->db->query("UPDATE `" . DB_PREFIX . "product_to_series` SET `series_id` = '" . (int)$row_product[0]['ref'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;
				case 18:									
	//				$this->db->query("UPDATE `" . DB_PREFIX . "my_table` SET `my_field` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 19:
					if ($row_product[0]['ref'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `extra_charge` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;
				case 20:
					if ($row_product[0]['ref'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `cost` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;	
			}
		}
		if ((!empty($row_product[0]['ref1']) or $row_product[0]['ref1'] == '0') and preg_match('/^[0-9]+$/', $t_ref1) and $t_ref1 > 0) {
			
			switch ($t_ref1) {			
				case 1:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 2:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 3:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 4:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 5:									
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
					break;
				case 6:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `minimum` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 7:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `subtract` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 8:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 9:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `length_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 10:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `weight_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 11:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `tax_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 12:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `points` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 13:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `location` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 14:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `jan` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;	
				case 15:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `isbn` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;	
				case 16:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `stock_status_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;				
				case 17:
					$rows = $this->getProductSerie((int)$row_product[0]['product_id']);
					if (empty($rows)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_series SET `product_id` = '" .(int)$row_product[0]['product_id']. "', `series_id` = '" . (int)$row_product[0]['ref1'] . "'");
					} else {	
						$this->db->query("UPDATE `" . DB_PREFIX . "product_to_series` SET `series_id` = '" . (int)$row_product[0]['ref1'] . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;
				case 18:									
	//				$this->db->query("UPDATE `" . DB_PREFIX . "my_table` SET `my_field` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					break;
				case 19:
					if ($row_product[0]['ref1'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `extra_charge` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;
				case 20:
					if ($row_product[0]['ref1'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `cost` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "'");
					}	
					break;	
			}
		}
		if ($parent == 4 or $parent == 6) {
			$product_id = (int)$row_product[0]['product_id'];
			if ($product_id and $parent == 6) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "'");
			}	
			for ($i=0; $i<200; $i++) {
				if (!isset($catmany[$i])) break;
				if ($i == 0 and $row_product[0]['category_id']) {
					if ($parent == 4) $rows  = $this->isCategoryOfProduct($product_id, $row_product[0]['category_id']);
					else $rows = '';
					if (empty($rows)) {
						if ($parent != 6) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .$product_id. "', `category_id` = '" . (int)$row_product[0]['category_id'] . "', `main_category` = 0");
						} else {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .$product_id. "', `category_id` = '" . (int)$row_product[0]['category_id'] . "', `main_category` = 1");
						}
					}				
				} else {
					if (!$idcat) {
						$rows = $this->getCategoryIDbyName($catmany[$i], $store);						
						if (!empty($rows)) {
							$cat_id = (int)$rows[0]['category_id'];
							if ($parent == 4) $rows  = $this->isCategoryOfProduct($product_id, $cat_id);
							else $rows = '';
							if (empty($rows)) {	
								$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .$product_id. "', `category_id` = '" . $cat_id . "', `main_category` = 0");
							}	
						}
					} else {
						if ($parent == 4) $rows  = $this->isCategoryOfProduct($product_id, (int)$catmany[$i]);
						else $rows = '';
						if (empty($rows)) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .$product_id. "', `category_id` = '" . (int)$catmany[$i] . "', `main_category` = 0");
						}
					}	
				}	
			}
		}	
		if ($yml and !empty($row_product[0]['category_id'])) {
			$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$row_product[0]['product_id'] . "' and `category_id` = '" . (int)$row_product[0]['category_id'] ."'");
			
			if (!$query->rows)
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$row_product[0]['product_id']. "', `category_id` = '" . (int)$row_product[0]['category_id'] . "', `main_category` = 1");		
		}
		
		if ($parent == 5 and !empty($row_product[0]['category_id'])) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$row_product[0]['product_id'] . "'");
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$row_product[0]['product_id']. "', `category_id` = '" . (int)$row_product[0]['category_id'] . "', `main_category` = 1");

			if (!empty($tag) and $metka) {
				$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `language_id` = '" . $lang. "'");
			}
		}
		
		$this->cache->delete('suppler');
	}
	
	public function getManufacturerID($name, $store) {		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer m LEFT JOIN " . DB_PREFIX . "manufacturer_to_store m2s ON (m.manufacturer_id = m2s.manufacturer_id) WHERE m.name = '" . $this->db->escape($name) . "' AND m2s.store_id = '" . (int)$store . "'");
	
		return $query->rows;
	}
	
	public function getManufacturerName($id) {	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "manufacturer WHERE `manufacturer_id` = '" . $id . "'");
			
		return $query->rows;
	}
	
	public function getProductDesc($id) {
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE `product_id` = '" . $id . "' and `language_id` = '" . $lang . "'");
			
		return $query->rows;
	}

	public function getProductIDbyName($name) {	
		$lang = $this->config->get('config_language_id');
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE `name` = '" . $this->db->escape($name) . "' and `language_id` = '" . $lang . "'");
			
		return $query->rows;
	}
		
	
	public function getProductsByID($product_id) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE `product_id` = '" . (int)$product_id . "'");
			
		return $query->rows;
	}
	
	public function getProductByID($product_id) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product WHERE `product_id` = '" . (int)$product_id . "'");
			
		return $query->row;
	}
	
	public function getProductByIDStore($product_id, $store) {				
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND p2s.store_id = '" . (int)$store . "'");
			
		return $query->row;
	}
	
	public function	upProduct($row) {	
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `model` = '" . $row['model'] . "', `quantity` = '" . $row['quantity'] . "', `price` = '" . $row['price'] . "', `image` = '" . $row['image'] . "', `status` = '". $row['status'] . "', `stock_status_id` = '" . $row['stock_status_id'] . "', `sort_order` = '". $row['sort_order'] . "' WHERE `product_id` = '" . $row['product_id'] . "'");
	
		$this->cache->delete('*');
	}
	
	public function addPicture($product_id, $pic_addr, $sort_order) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET `product_id` = '" . $product_id . "', `image` = '" .$this->db->escape($pic_addr). "', `sort_order` = '" . $sort_order . "'");
	
		$this->cache->delete('*');
	}
	
	public function setCategory($product_id, $cat) {
		if (empty($cat)) return;
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$n = 0;
			for ($i=0; $i<2000; $i++) {
				if (!isset($rows[$i]['category_id'])) break;					
				if ($rows[$i]['category_id']>$n) $n = $rows[$i]['category_id'];
			}	
		}
		$m = 0;
		for ($i=0; $i<2000; $i++) {
			if (!isset($cat[$i])) break;
			if ($cat[$i]>$m) $m = $cat[$i];
			if ($cat[$i]==$n) {
				$m = $n;
				break;
			}	
		}
		if (!$m) return;
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" .(int)$product_id. "'");
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . (int)$m . "', `main_category` = 1");
		
		for ($l=0; $l<2000; $l++) {
			if (!isset($cat[$l])) break;
			if ($cat[$l] == $m) continue;
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . (int)$cat[$l] . "', `main_category` = 0");
		}
		$rows = $this->getCategoryName($m);
		$category_name = '';	
		if (isset($rows[0]['name'])) $category_name = $rows[0]['name'];
		$rows = $this->getProductDesc($product_id);	
		if (!empty($rows) and isset($rows[0]['tag'])) {
			$p = stripos($rows[0]['tag'], ',');		
			if ($p) {			
				$lang = $this->config->get('config_language_id');
				$hvost = substr($rows[0]['tag'], $p);				
				$tag = $category_name.$hvost;

				$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
			}	
		}
		$this->cache->delete('*');
	}
	
	public function issetProductCategory($product_id, $cat) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE `product_id` = '" . (int)$product_id . "' and `category_id` = '" . (int)$cat . "'");
			
		return $query->rows;
	}

	public function notCategory($product_id, $cat) {
		for ($l=0; $l<2000; $l++) {
			if (!isset($cat[$l])) break;
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "' and category_id = '" . (int)$cat[$l] . "'");
		}	
	}
	
	public function toCategory($product_id, $cat) {
		for ($l=0; $l<2000; $l++) {
			if (!isset($cat[$l])) break;
			$rows = $this->issetProductCategory($product_id, $cat[$l]);		
			if (empty($rows)) {	
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . (int)$cat[$l] . "', `main_category` = 0");					
			}
		}
		$this->cache->delete('*');
	}
	
	public function	putNewProduct($row_product, $parent, &$last_product_id, $attr_ext, $max_attr, $langs, $row, $tags, $addseo, $catmany, $catcreate, $catdescs, $caturls, $catmd, $catmk, $catmt, $catmh, $newurl, $refers, $seo_data, $store, $off, $idcat, $t_ref, $t_ref1, $metka, $usd) {
	
		if (!$catcreate) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product SET `model` = '" . $row_product[0]['model'] . "', `sku` = '" . $this->db->escape($row_product[0]['sku']) . "', `upc` = '" . $this->db->escape($row_product[0]['upc']) . "', `ean` = '" . $this->db->escape($row_product[0]['ean']) . "', `quantity` = '" . $row_product[0]['quantity'] . "', `stock_status_id` = '" . $row_product[0]['stock_status_id'] . "', `image` = '" . $this->db->escape($row_product[0]['image']) . "', `manufacturer_id` = '" . $row_product[0]['manufacturer_id'] . "', `shipping` = '" . $row_product[0]['shipping'] . "', `price` = '" . $row_product[0]['price'] . "', `points` = '0' , `tax_class_id` = '0' , `date_available` = '" . $row_product[0]['date_available'] . "', `weight` = '". $row_product[0]['weight'] . "', `weight_class_id` = '1' , `length` = '". $row_product[0]['length'] ."', `width` = '". $row_product[0]['width'] ."', `height` = '". $row_product[0]['height'] ."' , `length_class_id` = '1' , `subtract` = '". $row_product[0]['subtract']. "', `minimum` = '1' ,  `sort_order` = '" . (int)$row_product[0]['sort_order'] . "', `status` = '". $row_product[0]['hide'] ."', `date_added` = '" . $row_product[0]['date_added'] . "', `date_modified` = '" . $row_product[0]['date_added'] . "', `viewed` = '0'");
		
			$product_id = $this->db->getLastId();
			$last_product_id = $product_id;
			
			if ($usd and isset($row[$usd]) and $row[$usd] != '') {
				if ($row[$usd] == '0') $row[$usd] = '';
				$table = DB_PREFIX . "product";
				$tname = "base_price";
				if ($this->getColumnName($table, $tname)) {				
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_currency_code` = '" . $this->db->escape($row[$usd]) . "', `base_price` = '" . $row_product[0]['price'] . "' WHERE `product_id` = '" .(int)$last_product_id . "'");				
				}	
			}			
		}
		$date = $row_product[0]['date_added'];
		
		if ($catcreate) {	
			$dim = count($catmany);
			for ($k=0; $k<$dim; $k++) {
				if (empty($catmany[$k])) break;
			}
			$dim = $k;		
			if (!$parent and $dim > 1) {									
				$rows = $this->getCategoryIDbyName($catmany[$dim-1], $store);			
				if (!empty($rows)) {
					$parent_id = $rows[0]['category_id'];
				
					$dim = $dim - 2;				
					for($i=$dim; $i>=0; $i--) {
						$rows1 = $this->getCategoryIDbyName($catmany[$i], $store);					
						if (!empty($rows1)) {										
							$fl = 0;								
							foreach ($rows1 as $r1) {
								$rows2 = $this->isLink($parent_id, $r1['category_id']); 
								if (!empty($rows2) or $parent_id == $r1['category_id']) {
									$parent_id = $r1['category_id'];
									$cat_id = $r1['category_id'];
									$fl = 1;
									break;
								}
							}
							if (!$fl) {	
								$this->CreateCategory($catmany[$i], $langs, $parent_id, $cat_id, $date, $refers[$i],  $catdescs[$i], $caturls[$i], $catmd[$i], $catmk[$i], $catmt[$i], $catmh[$i], $seo_data, $store);
								$parent_id = $cat_id;								
							} 				
							
						} else {	
							$this->CreateCategory($catmany[$i], $langs, $parent_id, $cat_id, $date, $refers[$i],  $catdescs[$i], $caturls[$i], $catmd[$i], $catmk[$i], $catmt[$i], $catmh[$i], $seo_data, $store);					
							$parent_id = $cat_id;						
						}				
					}				
				}
			}		
			return;
		}
		// Описание оригинал
		$descript = "";
		if (isset($row_product[0]['description'])) $descript = $row_product[0]['description'];		
					
		// Наименование товара
		$prod_name = "";
		if (isset($row_product[0]['item'])) $prod_name = $row_product[0]['item'];
		
		// Сео-Имя производителя
		$meta_manuf = '';
		if (isset($row_product[0]['manuf_name'])) $meta_manuf = $row_product[0]['manuf_name'];			
			
		// Вытаскиваем название категории для этого продукта 
		$rows = $this->getCategoryName((int)$row_product[0]['category_id']);
		$meta_category_name = '';	
		if (isset($rows[0]['name'])) $meta_category_name = $rows[0]['name'];		
		
		// Метки: атрибуты товара см. стр "Атрибуты"
		$at ='';
		if ($max_attr) {			
			for ($j = 1; $j <= $max_attr; $j++) {
				if ($j > 30) break;
				if (isset($row[$attr_ext[$j]]) and !empty($row[$attr_ext[$j]])) {
					if (!preg_match('/^[0-9 ]+$/', $row[$attr_ext[$j]])) {
						if ($tags[$j]) {						
							$add = $this->getName($row[$attr_ext[$j]]);
							if (empty($at)) $at = $add;
							else $at = $at.','.$add;
						}	
					}	
				}	
			}
		}
		
		$tag = '';
		if ($metka) {
			$tag = $meta_category_name;
			if (!empty($meta_manuf)) $tag = $tag . ','. $meta_manuf;
			if (!empty($at)) $tag = $tag .',' . $at;
		}	

		$seo_h1 = '';
		$seo_title = '';
		$keywords = '';
		$meta_desc = '';		
		$url = '';
		// SEO URL
		$seo_url = $prod_name;			
	//	$seo_url = substr($seo_url, 0, 64);  // обрезать до 64 символов        
	//	$seo_url = $seo_url.'_'.$row_product[0]['model']; // название товара+Модель
	//  $seo_url = $row_product[0]['sku']."_".$row_product[0]['model']; // sku+model
	//	$seo_url = $seo_url."_".$row_product[0]['sku']; // название+sku
		$seo_url = $this->TransLit($seo_url);
		$seo_url = $this->MetaURL($seo_url);			
		$seo_url = strtolower($seo_url);		
		
		// Импорт мета-данных из прас-листа. Из колонок прайса номера: 38, 39, 40, 41, 42
		if ($addseo == 2) {
			if (isset($row_product[0]['seo_h1']) and !empty($row_product[0]['seo_h1'])) $seo_h1 = $this->getName($row_product[0]['seo_h1']);
			if (isset($row_product[0]['seo_title']) and !empty($row_product[0]['seo_title'])) $seo_title = $this->getName($row_product[0]['seo_title']);
			if (isset($row_product[0]['meta_keyword']) and !empty($row_product[0]['meta_keyword'])) $keywords = $this->getName($row_product[0]['meta_keyword']);
			if (isset($row_product[0]['meta_description']) and !empty($row_product[0]['meta_description'])) $meta_desc = $this->symbol($row_product[0]['meta_description']);
			if (isset($row_product[0]['tag']) and !empty($row_product[0]['tag']) and $metka) $tag = $this->getName($row_product[0]['tag']);
		}		
		if ($newurl == 1) {   // Импорт url из прас-листа. Из колонки прайса номер: 43
			if (isset($row_product[0]['url']) and !empty($row_product[0]['url'])) $seo_url = $this->symbol($row_product[0]['url']);
		}
		
		if (!empty($row_product[0]['bprice'])) {
			$this->db->query("INSERT INTO `" . DB_PREFIX . "suppler_base_price` SET `product_id` = '" . (int)$product_id . "', `model` = '" . $row_product[0]['model'] . "', `bprice` = '" . $row_product[0]['bprice'] . "', `bpack` = '" . $row_product[0]['bpack'] . "', `brate` = '" . $row_product[0]['brate'] . "', `bsuppler` = '" . $row_product[0]['bsuppler'] . "', `bdisc` = '" . $row_product[0]['bdisc'] . "'");
		}
		
		for	($i=1; $i<=count($langs); $i++) {				
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET `product_id` = '" .(int)$product_id. "', `language_id` = '" .$langs[$i] . "', `name` = '" . $this->db->escape($prod_name) . "', `description` = '" . $this->db->escape($descript). "'");
			
			if ($addseo == 2) {
				if (!$metka) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "', `seo_title` = '" . $this->db->escape($seo_title) . "', `meta_keyword` = '" . $this->db->escape($keywords) . "' WHERE `product_id` = '" .(int)$product_id. "' and `language_id` = '" .$langs[$i] . "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "', `seo_title` = '" . $this->db->escape($seo_title) . "', `meta_keyword` = '" . $this->db->escape($keywords) . "', `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" .(int)$product_id. "' and `language_id` = '" .$langs[$i] . "'");
				}	
				
			}
		}
		for ($i=0; $i<600; $i++) {
			if (!isset($catmany[$i]) or !$product_id) break;
			if ($i == 0 and $row_product[0]['category_id']) {			
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . (int)$row_product[0]['category_id'] . "', `main_category` = 1");
			} else {
				if ($parent == 1) {
					if (preg_match('/[0-9]+$/', $catmany[$i]) and $idcat) {
						$rows = $this->getCategory((int)$catmany[$i]);
						if (!empty($rows)) {							
							$rows  = $this->isCategoryOfProduct($product_id, (int)$catmany[$i]);
							if (empty($rows)) {
								$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . (int)$catmany[$i] . "', `main_category` = 0");
							}	
						}
					} else {	
						$rows = $this->getCategoryIDbyName($catmany[$i], $store);			
						if (!empty($rows)) {
							$cat_id = (int)$rows[0]['category_id'];
							$rows  = $this->isCategoryOfProduct($product_id, $cat_id);
							if (empty($rows)) {
								$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . $cat_id . "', `main_category` = 0");
							}	
						}	
					}	
				}	
			}	
		}		
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET `product_id` = '" .(int)$product_id. "', `store_id` = '" . $store ."'");
		
		if ($newurl != 3) {
			$rows = $this->chURL($seo_url);
			if (!empty($rows)) $seo_url = $seo_url . '-' . $product_id;
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'product_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($seo_url) . "'");
		}
	
		if ($parent == 2) {
			$category_id = (int)$row_product[0]['category_id'];
			$rows  = $this->getCategory($category_id);
			if (!empty($rows)) {
				$parent_id = $rows[0]['parent_id'];
				if ($parent_id) {
					$rows  = $this->isCategoryOfProduct($product_id, $parent_id);
					if (empty($rows)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . $parent_id . "', `main_category` = 0");
					}	
				}	
			}	
		}
		
		if ($parent == 3) {
			$category_id = (int)$row_product[0]['category_id'];
			while (1) {
				$rows  = $this->getCategory($category_id);
				if (empty($rows))  break;
				$parent_id = $rows[0]['parent_id'];
				if ($parent_id) {
					$rows  = $this->isCategoryOfProduct($product_id, $parent_id);
					if (empty($rows)) {
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" .(int)$product_id. "', `category_id` = '" . $parent_id . "', `main_category` = 0");
					}								
				}
				$category_id = $parent_id ;	
			}
		}
		
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);
		$seo_h1 = $seo['prod_h1'];	
		if (empty($seo_h1)) $seo_h1 = $prod_name;
		$seo_title = $seo['prod_title'];
		$meta_desc = $seo['prod_meta_desc'];
		$desc = $seo['prod_desc'];
		$keywords = $seo['prod_keyword'];
		$url = $seo['prod_url'];
		for ($j=1; $j<300; $j++) {	
			if (!isset($row[$j]) or empty($row[$j])) continue;
			$a = '{' . $j . '}';
			$seo_h1 = str_replace($a, $row[$j], $seo_h1);
			$seo_title = str_replace($a, $row[$j], $seo_title);
			$meta_desc = str_replace($a, $row[$j], $meta_desc);
			$desc = str_replace($a, $row[$j], $desc);
			$keywords = str_replace($a, $row[$j], $keywords);
			$url = str_replace($a, $row[$j], $url);
		}		
		if (!empty($url)) {			
			$url = $this->TransLit($url);
			$url = $this->MetaURL($url);
			$url = strtolower($url);
		}
		$url = $this->clearSEO($url);
		$seo_h1 = $this->clearSEO($seo_h1);
		$seo_title = $this->clearSEO($seo_title);
		$meta_desc = $this->clearSEO($meta_desc);		
		$desc = $this->clearSEO($desc);
		$keywords = $this->clearSEO($keywords);
		
		if (!empty($url) and $newurl == 2) {
			$rows = $this->chURL($url);
			if (!empty($rows)) $url = $url . '-' . $product_id;

			$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($url) . "' WHERE `query` = 'product_id=" . (int)$product_id . "'");
		}
		
		if ($off) $descript = $desc;
		
		for	($i=1; $i<=count($langs); $i++) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($descript). "' WHERE `product_id` = '" .(int)$product_id. "' and `language_id` = '" .$langs[$i] . "'");
		}
		
		if ($addseo == 1) {
			for	($i=1; $i<=count($langs); $i++) {
				if ($metka) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "', `seo_title` = '" . $this->db->escape($seo_title) . "', `meta_keyword` = '" . $this->db->escape($keywords) . "', `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" .(int)$product_id. "' and `language_id` = '" .$langs[$i] . "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($meta_desc) . "', `seo_h1` = '" . $this->db->escape($seo_h1) . "', `seo_title` = '" . $this->db->escape($seo_title) . "', `meta_keyword` = '" . $this->db->escape($keywords) . "' WHERE `product_id` = '" .(int)$product_id. "' and `language_id` = '" .$langs[$i] . "'");
				}
			}	
		}
		
	if ((!empty($row_product[0]['ref']) or $row_product[0]['ref'] == '0') and preg_match('/^[0-9]+$/', $t_ref) and $t_ref > 0) {	
			
			switch ($t_ref) {			
				case 1:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 2:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i] . "'");
					}	
					break;
				case 3:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 4:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 5:									
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}
					break;
				case 6:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `minimum` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 7:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `subtract` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 8:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 9:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `length_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 10:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `weight_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 11:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `tax_class_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 12:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `points` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 13:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `location` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 14:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `jan` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 15:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `isbn` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;	
				case 16:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `stock_status_id` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;				
				case 17:
                    $rows = $this->getProductSerie((int)$product_id);
                    if (empty($rows)) {
                        $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_series SET `product_id` = '" .(int)$product_id. "', `series_id` = '" . (int)$row_product[0]['ref'] . "'");
                    } else {    
                        $this->db->query("UPDATE `" . DB_PREFIX . "product_to_series` SET `series_id` = '" . (int)$row_product[0]['ref'] . "' WHERE `product_id` = '" .(int)$product_id . "'");
                    }    
                    break;
				case 18:									
	//				$this->db->query("UPDATE `" . DB_PREFIX . "my_table` SET `my_field` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 19:
					if ($row_product[0]['ref'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `extra_charge` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					}	
					break;
				case 20:
					if ($row_product[0]['ref'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `cost` = '" . $this->db->escape($row_product[0]['ref']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					}	
					break;	
			}
		}
		if ((!empty($row_product[0]['ref1']) or $row_product[0]['ref1'] == '0') and preg_match('/^[0-9]+$/', $t_ref1) and $t_ref1 > 0) {	
			
			switch ($t_ref1) {			
				case 1:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 2:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i] . "'");
					}	
					break;
				case 3:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 4:
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}	
					break;
				case 5:									
					for	($i=1; $i<=count($langs); $i++) {
						$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $langs[$i]. "'");
					}
					break;
				case 6:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `minimum` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 7:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `subtract` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 8:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 9:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `length_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 10:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `weight_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 11:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `tax_class_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 12:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `points` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 13:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `location` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 14:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `jan` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 15:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `isbn` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;	
				case 16:									
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `stock_status_id` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;				
				case 17:
                    $rows = $this->getProductSerie((int)$product_id);
                    if (empty($rows)) {
                        $this->db->query("INSERT INTO " . DB_PREFIX . "product_to_series SET `product_id` = '" .(int)$product_id. "', `series_id` = '" . (int)$row_product[0]['ref1'] . "'");
                    } else {    
                        $this->db->query("UPDATE `" . DB_PREFIX . "product_to_series` SET `series_id` = '" . (int)$row_product[0]['ref1'] . "' WHERE `product_id` = '" .(int)$product_id . "'");
                    }    
                    break;
				case 18:									
	//				$this->db->query("UPDATE `" . DB_PREFIX . "my_table` SET `my_field` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					break;
				case 19:
					if ($row_product[0]['ref1'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `extra_charge` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					}	
					break;
				case 20:
					if ($row_product[0]['ref1'] != '') {
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `cost` = '" . $this->db->escape($row_product[0]['ref1']) . "' WHERE `product_id` = '" .(int)$product_id . "'");
					}	
					break;	
			}
		}
		$this->cache->delete('*');
	}
	
	public function getQuantity($row, $qu, $my_qu, &$quantity, &$newstatus, &$empt) {		
		if (preg_match('/^[0-9,]+$/', $qu)) $qus = explode("," , $qu);
		else $qus[0] = 'qu';
		for ($k=0; $k<20; $k++) {
			$quant = 0;
			if (!isset($qus[$k])) break;
			$quk = $qus[$k];	
			if (!isset($row[$quk])) continue;	
			if (!empty($row[$quk])) {
				$row[$quk] = str_replace("&amp;#160;", '', $row[$quk]);
				$row[$quk] = str_replace("&#160;", '', $row[$quk]);
				if (preg_match('/^[0-9 ]+$/', $row[$quk])) $row[$quk] = str_replace(" ", '', $row[$quk]);
				$row[$quk] = $this->symbol($row[$quk]);
			}
			if (preg_match('/^[0-9.,]+$/', $row[$quk])) {						
                $quant = (int)$this->convertPrice($row[$quk]);
				$quant = round($quant, 0);
                $empt = 1;
			} else {	
				if (!empty($my_qu)) {
					$my_qu = $this->symbol($my_qu);
					if (substr_count($my_qu, "=")) {												
						$t = explode("," , $my_qu);
						foreach ($t as $value) {
							if (isset($value)) {
								$m = explode("=" , $value);		
								if (!empty($row[$quk]) and isset($m[0]) and isset($m[1]) and preg_match('/^[0-9()-]+$/', $m[1])) {	
									if ($m[0] == $row[$quk]) {
										$empt = 1;
										$posa = strpos($m[1], "(");
										if ($posa) {
											$quant = (int)substr($m[1], 0, $posa);								
											$posb = strpos($m[1], ")");
											if ($posb) $newstatus = (int)substr($m[1], $posa+1, $posb-$posa-1);
										} else $quant = (int)$m[1];
										break;
									}
								}
							}							
						}
						if (!$empt) {
							$quant = 0;
							$empt = 1;
						}	
					}
				} 					
			}					
			$quantity = $quantity + $quant;		
		}
		unset($gus);
	}
	
	public function deleteAllCategories() {
		$this->db->query("DELETE FROM " . DB_PREFIX . "category");
		$this->db->query("DELETE FROM " . DB_PREFIX . "category_description");
		$this->db->query("DELETE FROM " . DB_PREFIX . "category_to_layot");
		$this->db->query("DELETE FROM " . DB_PREFIX . "category_to_store");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE `query` LIKE 'category_id%'");
	}	
	
	public function deleteProduct($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");	
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "review WHERE product_id = '" . (int)$product_id . "'");		
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");	
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_sku WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_base_price WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_ref WHERE product_id = '" . (int)$product_id . "'");		
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_variant_product WHERE product_id = '" . (int)$product_id . "'");		
		
		$this->cache->delete('product');
	}	
	
	public function clearCache() {
		$this->cache->delete('*');
	}
	
	public function FindReplace($text) {
		if (empty($text)) return '';		
		$mm = explode(' ', $text);
		$max = count($mm);
		for ($i=0; $i<$max; $i++) {
			if (substr_count($mm[$i], 'amp;amp;amp;amp;')) {
				$mm[$i] = str_replace('amp;amp;amp;amp;', 'amp;amp;amp;', $mm[$i]);
			} else {
				if (substr_count($mm[$i], 'amp;amp;amp;')) {
					$mm[$i] = str_replace('amp;amp;amp;', 'amp;amp;', $mm[$i]);
				} else {
					if (substr_count($mm[$i], 'amp;amp;')) {
						$mm[$i] = str_replace('amp;amp;', 'amp;', $mm[$i]);
					} else {
						if (substr_count($mm[$i], 'amp;')) {
							$mm[$i] = str_replace('amp;', '', $mm[$i]);
						}	
					}
				}
			}
		}
		$st = '';		
		for ($i=0; $i<$max; $i++) {
			$st = $st . $mm[$i];
			if ($i != $max-1) $st = $st . ' ';
		}	

		return $st;
	}
	
	public function getName($text) {
		$text = $this->symbol($text);
		$text = str_replace ('"', '&quot;', $text);
		$text = str_replace('&#160;', ' ', $text);
		$text = str_replace('&nbsp;', ' ', $text);		
		$text = str_replace ("'", '&#039;', $text);
		$text = str_replace(chr(10), '', $text);
		$text = str_replace(chr(13), ' ', $text);
		$text = str_replace('\r\n',  ' ', $text);
		$text = preg_replace('| +|', ' ', $text);		
		$text = preg_replace('|-+|', '-', $text);
		$text = preg_replace('|_+|', '_', $text);		
		$text = trim($text);
		return $text;
	}
	
	public function MetaURL($text) {
		$text = strip_tags($text);
		$text = str_replace('&laquo;', '', $text);
		$text = str_replace('&raquo;', '', $text);
		$text = str_replace(' ', '-', $text);
		$text = str_replace('&nbsp;', '-', $text);
		$text = str_replace ('&#034;', '', $text);
		$text = str_replace ('&#039;', '', $text);		
		$text = str_replace ('&quot;', '', $text);		
		$text = str_replace ('&amp;quot;', '', $text);
		$text = str_replace('&amp;laquo;', '', $text);
		$text = str_replace('&amp;raquo;', '', $text);
		$text = str_replace('&amp;nbsp;', '', $text);
		$text = str_replace ('&amp;', '', $text);
		$text = str_replace('“', '-', $text);
		$text = str_replace('”', '-', $text);
		$text = str_replace("'", '-', $text);
		$text = str_replace('"' , '-' , $text);
		$text = str_replace('«' , '' , $text);
		$text = str_replace('»' , '' , $text);
		$text = str_replace('.' , '-' , $text);
		$text = str_replace(':' , '-' , $text);
		$text = str_replace('|' , '-' , $text);
		$text = str_replace('*' , '-' , $text);
		$text = str_replace('=' , '-' , $text);
		$text = str_replace('^' , '-' , $text);
		$text = str_replace('%' , '-' , $text);
		$text = str_replace('$' , '-' , $text);
		$text = str_replace('?' , '-' , $text);
		$text = str_replace('@' , '-' , $text);
		$text = str_replace('+' , '-' , $text);
		$text = str_replace('!' , '-' , $text);
		$text = str_replace('<' , '' , $text);		
		$text = str_replace('>' , '' , $text);
		$text = str_replace('#' , '' , $text);
		$text = str_replace(',' , '-' , $text);		
		$text = str_replace('\\' , '-' , $text);
		$text = str_replace('\/' , '-' , $text);	
		$text = str_replace("/" , '-' , $text);		
		$text = str_replace("(" , '' , $text);
		$text = str_replace(")" , '' , $text);
		$text = str_replace("[" , '' , $text);
		$text = str_replace("]" , '' , $text);
		$text = str_replace('&' , '-' , $text);		
		$text = str_replace(" " , '-' , $text);
		$text = str_replace("№" , '' , $text);
		$text = str_replace("`" , '-' , $text);
		$text = str_replace("{" , '-' , $text);
		$text = str_replace("}" , '-' , $text);
		$text = str_replace("—" , '-' , $text);
		$text = str_replace("–" , '-' , $text);
		$text = str_replace("’" , '' , $text);
		$text = str_replace(";" , '-' , $text);
		$text = str_replace("±" , '-' , $text);
		$text = preg_replace('|-+|', '-', $text);
		$l = strlen($text);
		if (substr($text, 0, 1) == "-") $text = substr($text, 1, $l-1);				
		if (substr($text, $l-1, 1) == "-") $text = substr($text, 0, $l-1);
		$text = trim($text);

		return $text;
	}
	
	public function code($text) {
		$tr = array(
			"&amp;quot;" =>'"',"&quot;" =>'"', "<br>"=>"&lt;br /&gt;","&lt;br&gt;"=>"&lt;br /&gt;","&amp;lt;br&amp;gt;"=>"&lt;br /&gt;",
			'"'=>"&#034;"," #"=>" &#035;"," # "=>" &#035; ","# "=>"&#035; ","$"=>"&#036;","%"=>"&#037;"," & "=>" &amp; ","& "=>"&amp; ","'"=>"&#039;","/"=>"&#047;","<"=>"&#060;",">"=>"&#062;","\\"=>"&#092;","^"=>"&#094;","`"=>"&#096;","|"=>"&#124;","~"=>"&#126;","€"=>"&#128;","ƒ"=>"&#131;","„"=>"&#132;","…"=>"&#133;","†"=>"&#134;","‡"=>"&#135;","ˆ"=>"&#136;","‰"=>"&#137;","Š"=>"&#138;","‹"=>"&#139;","Œ"=>"&#140;","Ž"=>"&#142;","`"=>"&#145;","’"=>"&#146;","“"=>"&#147;","”"=>"&#148;","•"=>"&#149;","—"=>"&#151;","˜˜ "=>"&#152;",'™'=>"&#153;","š"=>"&#154;","›"=>"&#155;","œ"=>"&#156;","ž"=>"&#158;","Ÿ"=>"&#159;","¡"=>"&#161;","¢"=>"&#162;","£"=>"&#163;","¤"=>"&#164;","¥"=>"&#165;","¦"=>"&#166;","¨"=>"&#168;","©"=>"&#169;","ª"=>"&#170;",'«'=>"&#171;","¬"=>"&#172;","®"=>"&#174;","¯"=>"&#175;","°"=>"&#176;","±"=>"&#177;","²"=>"&#178;","³"=>"&#179;","´"=>"&#180;","µ"=>"&#181;","¶"=>"&#182;","·"=>"&#183;","¸"=>"&#184;","¹"=>"&#185;","º"=>"&#186;",'»'=>"&#187;","¼"=>"&#188;","½"=>"&#189;","¾"=>"&#190;","¿"=>"&#191;","À"=>"&#192;","Á"=>"&#193;","Â"=>"&#194;","Ã"=>"&#195;","Ä"=>"&#196;","Å"=>"&#197;","Æ"=>"&#198;","Ç"=>"&#199;","È"=>"&#200;","É"=>"&#201;","Ê"=>"&#202;","Ë"=>"&#203;","Ì"=>"&#204;","Í"=>"&#205;","Î"=>"&#206;","Ï"=>"&#207;","Ð"=>"&#208;","Ñ"=>"&#209;","Ò"=>"&#210;","Ó"=>"&#211;","Ô"=>"&#212;","Õ"=>"&#213;","Ö"=>"&#214;","×"=>"&#215;","Ø"=>"&#216;","Ù"=>"&#217;","Ú"=>"&#218;","Û"=>"&#219;","Ü"=>"&#220;","Ý"=>"&#221;","Þ"=>"&#222;","ß"=>"&#223;","à"=>"&#224;","á"=>"&#225;","â"=>"&#226;","ã"=>"&#227;","ä"=>"&#228;","å"=>"&#229;","æ"=>"&#230;","ç"=>"&#231;","è"=>"&#232;","é"=>"&#233;","ê"=>"&#234;","ë"=>"&#235;","ì"=>"&#236;","í"=>"&#237;","î"=>"&#238;","ð"=>"&#240;","ñ"=>"&#241;","ò"=>"&#242;","ó"=>"&#243;","ô"=>"&#244;","õ"=>"&#245;","ö"=>"&#246;","÷"=>"&#247;","ø"=>"&#248;","ù"=>"&#249;","ú"=>"&#250;","û"=>"&#251;","ü"=>"&#252;","ý"=>"&#253;","þ"=>"&#254;","ÿ"=>"&#255;",'‰'=>"&#8240;",'…'=>"&#8230;",'‾'=>"&#8254;",
			'№'=>"&#8470;",'⁄'=>"&#8260;",'≤'=>"&#8804;",'≥'=>"&#8805;",'≠'=>"&#8800;",'‹'=>"&#8249;",'›'=>"&#8250;","‘"=>"&#8216;","’"=>"&#8217;","‚"=>"&#8218;","“"=>"&#8220;","”"=>"&#8221;","„"=>"&#8222;","∑"=>"&#8721;","€"=>"&#8364;");
				
		$text = strtr($text, $tr);
	//	$text = preg_replace('#^(:?&)(.*&?)(;)$#','',$text);		

		return $text;
	}

	public function symbol($text) {		
		$tr = array(
			"&amp;#00;"=>"","&amp;#01;"=>"","&amp;#02;"=>"","&amp;#03;"=>"","&amp;#04;"=>"","&amp;#05;"=>"",
			"&amp;#06;"=>"","&amp;#07;"=>"","&amp;#08;"=>"","&amp;#09;"=>"","&amp;#10;"=>"<br />","&amp;#11;"=>"",
			"&amp;#12;"=>"","&amp;#13;"=>"","&amp;#14;"=>"","&amp;#15;"=>"","&amp;#16;"=>"","&amp;#17;"=>"",
			"&amp;#18;"=>"","&amp;#19;"=>"","&amp;#20;"=>"","&amp;#21;"=>"","&amp;#22;"=>'&quot;',"&amp;#23;"=>"",
			"&amp;#24;"=>"","&amp;#25;"=>"","&amp;#26;"=>"","&amp;#27;"=>"","&amp;#28;"=>"","&amp;#29;"=>"",
			"&amp;#30;"=>"","&amp;#31;"=>"","&amp;#32;"=>"","&amp;#33;"=>"!","&amp;#34;"=>'&quot;',"&amp;#35;"=>"#","&amp;#36;"=>"$","&amp;#37;"=>"%","&amp;#38;"=>"&","&amp;#39;"=>"&#39;","&amp;#40;"=>"(","&amp;#41;"=>")","&amp;#42;"=>"*","&amp;#43;"=>"+","&amp;#44;"=>',',"&amp;#45;"=>"-","&amp;#46;"=>".","&amp;#47;"=>"/","&amp;#58;"=>":","&amp;#59;"=>";","&amp;#60;"=>"<","&amp;#61;"=>"=","&amp;#62;"=>">","&amp;#63;"=>"?","&amp;#64;"=>"@","&amp;#91;"=>"[","&amp;#92;"=>"\\","&amp;#93;"=>"]","&amp;#94;"=>"^","&amp;#95;"=>"_",
			"&amp;#96;"=>"`",
			"&amp;#000;"=>"","&amp;#001;"=>"","&amp;#002;"=>"","&amp;#003;"=>"","&amp;#004;"=>"","&amp;#005;"=>"",
			"&amp;#006;"=>"","&amp;#007;"=>"","&amp;#008;"=>"","&amp;#009;"=>"","&amp;#010;"=>"<br />","&amp;#011;"=>"",
			"&amp;#012;"=>"","&amp;#014;"=>"","&amp;#015;"=>"","&amp;#016;"=>"","&amp;#017;"=>"",
			"&amp;#018;"=>"","&amp;#019;"=>"","&amp;#020;"=>"","&amp;#021;"=>"","&amp;#022;"=>'&quot;',"&amp;#023;"=>"",
			"&amp;#024;"=>"","&amp;#025;"=>"","&amp;#026;"=>"","&amp;#027;"=>"","&amp;#028;"=>"","&amp;#029;"=>"",
			"&amp;#030;"=>"","&amp;#031;"=>"","&amp;#032;"=>"","&amp;#033;"=>"!","&amp;#034;"=>'&quot;',"&amp;#035;"=>"#","&amp;#036;"=>"$","&amp;#037;"=>"%","&amp;#038;"=>"&","&amp;#039;"=>"&#39;","&amp;#040;"=>"(","&amp;#041;"=>")","&amp;#042;"=>"*","&amp;#043;"=>"+","&amp;#044;"=>',',"&amp;#045;"=>"-","&amp;#046;"=>".","&amp;#047;"=>"/","&amp;#058;"=>":","&amp;#059;"=>";","&amp;#060;"=>"<","&amp;#061;"=>"=","&amp;#062;"=>">","&amp;#063;"=>"?","&amp;#064;"=>"@","&amp;#091;"=>"[","&amp;#092;"=>"\\","&amp;#093;"=>"]","&amp;#094;"=>"^","&amp;#095;"=>"_",
			"&amp;#096;"=>"`","&amp;#123;"=>"{","&amp;#124;"=>"|","&amp;#125;"=>"}","&amp;#126;"=>"~","&amp;#128;"=>"€","&amp;#130;"=>'‚',"&amp;#131;"=>"ƒ","&amp;#132;"=>'„',"&amp;#133;"=>"…","&amp;#134;"=>"†","&amp;#135;"=>"‡","&amp;#136;"=>"ˆ","&amp;#137;"=>"‰","&amp;#138;"=>"Š","&amp;#139;"=>"‹","&amp;#140;"=>"Œ","&amp;#141;"=>"","&amp;#142;"=>"Ž","&amp;#143;"=>"","&amp;#144;"=>"","&amp;#145;"=>"`","&amp;#146;"=>"’","&amp;#147;"=>"“","&amp;#148;"=>"”","&amp;#149;"=>"•","&amp;#150;"=>"-","&amp;#151;"=>"—","&amp;#152;"=>"˜˜ ","&amp;#153;"=>"™",
			"&amp;#154;"=>"š","&amp;#155;"=>"›","&amp;#156;"=>"œ","&amp;#157;"=>"","&amp;#158;"=>"ž","&amp;#159;"=>"Ÿ","&amp;#160;"=>" ","&amp;#161;"=>"¡","&amp;#162;"=>"¢","&amp;#163;"=>"£","&amp;#164;"=>"¤","&amp;#165;"=>"¥","&amp;#166;"=>"¦","&amp;#167;"=>"","&amp;#168;"=>"¨","&amp;#169;"=>"©","&amp;#170;"=>"ª","&amp;#171;"=>'«',"&amp;#172;"=>"¬","&amp;#173;"=>"-","&amp;#174;"=>"®","&amp;#175;"=>"¯","&amp;#176;"=>"°","&amp;#177;"=>"±","&amp;#178;"=>"²","&amp;#179;"=>"³","&amp;#180;"=>"´","&amp;#181;"=>"µ","&amp;#182;"=>"¶","&amp;#183;"=>"·",
			"&amp;#184;"=>"¸","&amp;#185;"=>"¹","&amp;#186;"=>"º","&amp;#187;"=>'»',"&amp;#188;"=>"¼","&amp;#189;"=>"½","&amp;#190;"=>"¾","&amp;#191;"=>"¿","&amp;#192;"=>"À","&amp;#193;"=>"Á","&amp;#194;"=>"Â","&amp;#195;"=>"Ã","&amp;#196;"=>"Ä","&amp;#197;"=>"Å","&amp;#198;"=>"Æ","&amp;#199;"=>"Ç","&amp;#200;"=>"È","&amp;#201;"=>"É","&amp;#202;"=>"Ê","&amp;#203;"=>"Ë","&amp;#204;"=>"Ì","&amp;#205;"=>"Í","&amp;#206;"=>"Î","&amp;#207;"=>"Ï","&amp;#208;"=>"Ð","&amp;#209;"=>"Ñ","&amp;#210;"=>"Ò","&amp;#211;"=>"Ó","&amp;#212;"=>"Ô","&amp;#213;"=>"Õ",
			"&amp;#214;"=>"Ö","&amp;#215;"=>"×","&amp;#216;"=>"Ø","&amp;#217;"=>"Ù","&amp;#218;"=>"Ú","&amp;#219;"=>"Û","&amp;#220;"=>"Ü","&amp;#221;"=>"Ý","&amp;#222;"=>"Þ","&amp;#223;"=>"ß","&amp;#224;"=>"à","&amp;#225;"=>"á","&amp;#226;"=>"â","&amp;#227;"=>"ã","&amp;#228;"=>"ä","&amp;#229;"=>"å","&amp;#230;"=>"æ","&amp;#231;"=>"ç","&amp;#232;"=>"è","&amp;#233;"=>"é","&amp;#234;"=>"ê","&amp;#235;"=>"ë","&amp;#236;"=>"ì","&amp;#237;"=>"í","&amp;#238;"=>"î","&amp;#239;"=>"ï","&amp;#240;"=>"ð","&amp;#241;"=>"ñ","&amp;#242;"=>"ò","&amp;#243;"=>"ó",
			"&amp;#244;"=>"ô","&amp;#245;"=>"õ","&amp;#246;"=>"ö","&amp;#247;"=>"÷","&amp;#248;"=>"ø","&amp;#249;"=>"ù","&amp;#250;"=>"ú","&amp;#251;"=>"û","&amp;#252;"=>"ü","&amp;#253;"=>"ý","&amp;#254;"=>"þ","&amp;#255;"=>"ÿ",
			
			"&amp;#758;"=>'&quot;',"&amp;#760;"=>":","&amp;#782;"=>'&quot;',"&amp;#800;"=>"_","&amp;#840;"=>'&quot;',"&amp;#818;"=>"_","&amp;#824;"=>"/","&amp;#822;"=>"-","&amp;#817;"=>"-","&amp;#451;"=>"!","&amp;#1030;"=>"I","&amp;#1031;"=>"Ї","&amp;#1042;"=>"В","&amp;#1110;"=>"і","&amp;#1111;"=>"ї","&amp;#835;"=>"&#39;","&amp;#1040;"=>"А","&amp;#1041;"=>"Б","&amp;#1042;"=>"В","&amp;#1043;"=>"Г","&amp;#1044;"=>"Д","&amp;#1045;"=>"Е",
			"&amp;#1046;"=>"Ж","&amp;#1047;"=>"З","&amp;#1048;"=>"И","&amp;#1049;"=>"Й","&amp;#1050;"=>"К","&amp;#1051;"=>"Л","&amp;#1052;"=>"М","&amp;#1053;"=>"Н","&amp;#1054;"=>"О","&amp;#1055;"=>"П","&amp;#1056;"=>"Р","&amp;#1057;"=>"С","&amp;#1058;"=>"Т","&amp;#1059;"=>"У","&amp;#1060;"=>"Ф","&amp;#1061;"=>"Х","&amp;#1062;"=>"Ц","&amp;#1063;"=>"Ч","&amp;#1064;"=>"Ш","&amp;#1065;"=>"Щ","&amp;#1066;"=>"Ъ","&amp;#1067;"=>"Ы","&amp;#1068;"=>"Ь","&amp;#1069;"=>"Э","&amp;#1070;"=>"Ю","&amp;#1071;"=>"Я","&amp;#1072;"=>"а","&amp;#1073;"=>"б","&amp;#1074;"=>"в","&amp;#1075;"=>"г","&amp;#1076;"=>"д","&amp;#1077;"=>"е","&amp;#1078;"=>"ж","&amp;#1079;"=>"з","&amp;#1080;"=>"и","&amp;#1081;"=>"й","&amp;#1082;"=>"к","&amp;#1083;"=>"л","&amp;#1084;"=>"м","&amp;#1085;"=>"н","&amp;#1086;"=>"о","&amp;#1087;"=>"п",
			"&amp;#1088;"=>"р","&amp;#1089;"=>"с","&amp;#1090;"=>"т","&amp;#1091;"=>"у","&amp;#1092;"=>"ф","&amp;#1093;"=>"х","&amp;#1094;"=>"ц","&amp;#1095;"=>"ч","&amp;#1096;"=>"ш","&amp;#1097;"=>"щ","&amp;#1098;"=>"ъ","&amp;#1099;"=>"ы","&amp;#1100;"=>"ь","&amp;#1101;"=>"э","&amp;#1102;"=>"ю","&amp;#1103;"=>"я",
			"&amp;#8221;"=>'&quot;',"&amp;#8194;"=>' ',"&amp;#8195;" =>"  ","&amp;#8211;" =>"–","&amp;#8212;" =>"—","&amp;#769;" =>"а́","&amp;#8482;"=>'™',"&amp;#8240;"=>'‰',"&amp;#8230;"=>'…',"&amp;#8254;"=>'‾',"&amp;#8470;"=>'№',"&amp;#8260;"=>'⁄',"&amp;#8722;"=>'−',"&amp;#8804;"=>'≤',"&amp;#8805;"=>'≥',"&amp;#8800;"=>'≠',"&amp;#8249;"=>'‹',"&amp;#8250;"=>'›',"&amp;#8242;"=>"′","&amp;#8243;"=>"″","&amp;#8216;"=>"‘","&amp;#8217;"=>"’","&amp;#8218;"=>"‚","&amp;#8220;"=>"“","&amp;#8221;"=>"”","&amp;#8222;"=>"„","&amp;#8721;"=>"∑","&amp;#8364;"=>"€",
			
			"&amp;quot;" =>'&quot;', "&amp;amp;quot;" =>'&quot;',"&amp;laquo;" =>'«',"&amp;raquo;" =>'»', "&amp;ndash;" =>"-", "&amp;plusmn;"=>"±", "&amp;amp;"=>"&","&amp;gt;"=>">", "&amp;lt;"=>"<", "&amp;nbsp;"=>" ", "&amp;tilde;"=>"~", "&amp;lsquo;"=>"‘","&amp;rsquo;"=>"’", "&amp;mdash;" =>"—", "&amp;trade;" =>"™", "&amp;nbsp;" =>" ", "&amp;brvbar;" =>"¦",
			"&amp;sect;" =>"§", "&amp;copy;" =>"©", "&amp;reg;" =>"®", "&amp;sup2;" =>"²", "&amp;acuate;" =>"´", "&amp;ldquo;" =>"“", "&amp;rdquo;" =>"”", "&amp;rsaquo;" =>"›", "&amp;lsaquo;" =>"‹", "&amp;Yuml;" =>"Ÿ",  "&amp;ixcl;" =>"¡", "&amp;cent;" =>"¢", "&amp;sbquo;" =>"‚", "&amp;dbquo;" =>"„", "&amp;dagger;" =>"†", "&amp;Dagger;" =>"‡", "&amp;permil;" =>"‰", "&amp;pound;" =>"£", "&amp;curren;" =>"¤", "&amp;yen;" =>"¥",  "&amp;uml;" =>"¨", "&amp;ordf;" =>"ª", "&amp;laquo;" =>"«", "&amp;not;" =>"¬", "&amp;shy;" =>"-", "&amp;macr;" =>"¯", "&amp;deg;" =>"°", "&amp;sup3;" =>"³", "&amp;acuate;" =>"´", "&amp;micro;" =>"µ", "&amp;para;" =>"¶", "&amp;middot;" =>"·", "&amp;cedil;" =>"¸", "&amp;sup1;" =>"¹", "&amp;ordm;" =>"º", "&amp;frac14;" =>"¼", "&amp;frac12;" =>"½", "&amp;frac34;" =>"¾", "&amp;iquest;" =>"¿", "&amp;Agrave;" =>"À", "&amp;Aacute;" =>"Á", "&amp;Acirc;" =>"Â", "&amp;Atilde;" =>"Ã", "&amp;Auml;" =>"Ä", "&amp;Aring;" =>"Å", "&amp;AElig;" =>"Æ", "&amp;Ccedil;" =>"Ç", "&amp;Egrave;" =>"È","&amp;Eacute;" =>"É","&amp;Ecirc;" =>"Ê","&amp;Euml;" =>"Ë","&amp;Igrave;" =>"Ì","&amp;Iacute;" =>"Í","&amp;Icirс;" =>"Î","&amp;ETH;" =>"Ð","&amp;Ntilde;" =>"Ñ","&amp;Ograve;" =>"Ò","&amp;Oacute;" =>"Ó","&amp;Ocirc;" =>"Ô","&amp;Otilde;" =>"Õ","&amp;Ouml;" =>"Ö","&amp;times;" =>"×","&amp;Oslash;" =>"Ø","&amp;Ugrave;" =>"Ù","&amp;Uacute;" =>"Ú","&amp;Ucirc;" =>"Û","&amp;Uuml;" =>"Ü","&amp;Yacute;" =>"Ý","&amp;THORN;" =>"Þ","&amp;szlig;" =>"ß","&amp;agrave;" =>"à","&amp;aacute;" =>"á","&amp;acirc;" =>"â","&amp;atilde;" =>"ã","&amp;auml;" =>"ä","&amp;aring;" =>"å","&amp;aelig;" =>"æ","&amp;ccedil;" =>"ç","&amp;egrave;" =>"è","&amp;eacute;" =>"é","&amp;ecirc;" =>"ê","&amp;euml;" =>"ë","&amp;igrave;" =>"ì","&amp;iacute;" =>"í","&amp;icirс;" =>"î","&amp;eth;" =>"ï","&amp;ntilde;" =>"ñ","&amp;ograve;" =>"ò","&amp;oacute;" =>"ó","&amp;ocirc;" =>"ô","&amp;otilde;" =>"õ","&amp;ouml;" =>"ö","&amp;divide;" =>"÷","&amp;oslash;" =>"ø","&amp;ugrave;" =>"ù","&amp;uacute;" =>"ú","&amp;ucirc;" =>"û","&amp;uuml;" =>"ü","&amp;yacute;" =>"ý","&amp;thorn;" =>"þ","&amp;yuml;" =>"ÿ","&amp;emsp;" =>"  ","&amp;ensp;" =>" ","&amp;pi;" =>"π","&amp;hellip;" =>"…","&amp;oline;" =>"‾","&amp;frasl;" =>"⁄","&amp;minus;" =>"−","&amp;le;" =>"≤","&amp;ge;" =>"≥","&amp;ne;" =>"≠","&amp;prime;" =>"′","&amp;Prime;" =>'″',"&amp;bdquo;" =>"„","&amp;sum;" =>"∑","&amp;euro;" =>"€",	
			
			"&#00;"=>"","&#01;"=>"","&#02;"=>"","&#03;"=>"","&#04;"=>"","&#05;"=>"","&#06;"=>"","&#07;"=>"","&#08;"=>"","&#09;"=>"","&#10;"=>"<br />","&#11;"=>"","&#12;"=>"","&#13;"=>"","&#14;"=>"","&#15;"=>"","&#16;"=>"","&#17;"=>"","&#18;"=>"","&#19;"=>"","&#20;"=>"","&#21;"=>"","&#22;"=>'&quot;',"&#23;"=>"",
			"&#24;"=>"","&#25;"=>"","&#26;"=>"","&#27;"=>"","&#28;"=>"","&#29;"=>"","&#30;"=>"","&#31;"=>"","&#32;"=>"","&#33;"=>"!","&#34;"=>'&quot;',"&#35;"=>"#","&#36;"=>"$","&#37;"=>"%","&#38;"=>"&","&#40;"=>"(","&#41;"=>")","&#42;"=>"*","&#43;"=>"+","&#44;"=>',',"&#45;"=>"-","&#46;"=>".","&#47;"=>"/","&#58;"=>":","&#59;"=>";","&#60;"=>"<","&#61;"=>"=","&#62;"=>">","&#63;"=>"?","&#64;"=>"@","&#91;"=>"[","&#92;"=>"\\","&#93;"=>"]","&#94;"=>"^","&#95;"=>"_","&#96;"=>"`",
			"&#000;"=>"","&#001;"=>"","&#002;"=>"","&#003;"=>"","&#004;"=>"","&#005;"=>"","&#006;"=>"","&#007;"=>"","&#008;"=>"","&#009;"=>"","&#010;"=>"<br />","&#011;"=>"","&#012;"=>"","&#014;"=>"","&#015;"=>"","&#016;"=>"","&#017;"=>"","&#018;"=>"","&#019;"=>"","&#020;"=>"","&#021;"=>"","&#022;"=>'&quot;',"&#023;"=>"",
			"&#024;"=>"","&#025;"=>"","&#026;"=>"","&#027;"=>"","&#028;"=>"","&#029;"=>"","&#030;"=>"","&#031;"=>"","&#032;"=>"","&#033;"=>"!","&#034;"=>'&quot;',"&#035;"=>"#","&#036;"=>"$","&#037;"=>"%","&#038;"=>"&","&#040;"=>"(","&#041;"=>")","&#042;"=>"*","&#043;"=>"+","&#044;"=>',',"&#045;"=>"-","&#046;"=>".","&#047;"=>"/","&#058;"=>":","&#059;"=>";","&#060;"=>"<","&#061;"=>"=","&#062;"=>">","&#063;"=>"?","&#064;"=>"@","&#091;"=>"[","&#092;"=>"\\","&#093;"=>"]","&#094;"=>"^","&#095;"=>"_","&#096;"=>"`","&#123;"=>"{","&#124;"=>"|","&#125;"=>"}","&#126;"=>"~","&#128;"=>"€","&#130;"=>'‚',"&#131;"=>"ƒ","&#132;"=>'„',"&#133;"=>"…","&#134;"=>"†","&#135;"=>"‡","&#136;"=>"ˆ","&#137;"=>"‰","&#138;"=>"Š","&#139;"=>"‹","&#140;"=>"Œ","&#141;"=>"","&#142;"=>"Ž","&#143;"=>"","&#144;"=>"","&#145;"=>"`","&#146;"=>"’","&#147;"=>"“","&#148;"=>"”","&#149;"=>"•","&#150;"=>"-","&#151;"=>"—","&#152;"=>"˜˜ ","&#153;"=>"™","&#154;"=>"š","&#155;"=>"›","&#156;"=>"œ","&#157;"=>"","&#158;"=>"ž","&#159;"=>"Ÿ","&#160;"=>" ","&#161;"=>"¡","&#162;"=>"¢","&#163;"=>"£","&#164;"=>"¤","&#165;"=>"¥","&#166;"=>"¦","&#167;"=>"","&#168;"=>"¨","&#169;"=>"©","&#170;"=>"ª","&#171;"=>'«',"&#172;"=>"¬","&#173;"=>"-","&#174;"=>"®","&#175;"=>"¯","&#176;"=>"°","&#177;"=>"±","&#178;"=>"²","&#179;"=>"³","&#180;"=>"´","&#181;"=>"µ","&#182;"=>"¶","&#183;"=>"·","&#184;"=>"¸","&#185;"=>"¹","&#186;"=>"º","&#187;"=>'»',"&#188;"=>"¼","&#189;"=>"½","&#190;"=>"¾","&#191;"=>"¿","&#192;"=>"À","&#193;"=>"Á","&#194;"=>"Â","&#195;"=>"Ã","&#196;"=>"Ä","&#197;"=>"Å","&#198;"=>"Æ","&#199;"=>"Ç","&#200;"=>"È","&#201;"=>"É","&#202;"=>"Ê","&#203;"=>"Ë","&#204;"=>"Ì","&#205;"=>"Í","&#206;"=>"Î","&#207;"=>"Ï","&#208;"=>"Ð","&#209;"=>"Ñ","&#210;"=>"Ò","&#211;"=>"Ó","&#212;"=>"Ô","&#213;"=>"Õ","&#214;"=>"Ö","&#215;"=>"×","&#216;"=>"Ø","&#217;"=>"Ù","&#218;"=>"Ú","&#219;"=>"Û","&#220;"=>"Ü","&#221;"=>"Ý","&#222;"=>"Þ","&#223;"=>"ß","&#224;"=>"à","&#225;"=>"á","&#226;"=>"â","&#227;"=>"ã","&#228;"=>"ä","&#229;"=>"å","&#230;"=>"æ","&#231;"=>"ç","&#232;"=>"è","&#233;"=>"é","&#234;"=>"ê","&#235;"=>"ë","&#236;"=>"ì","&#237;"=>"í","&#238;"=>"î","&#239;"=>"ï","&#240;"=>"ð","&#241;"=>"ñ","&#242;"=>"ò","&#243;"=>"ó","&#244;"=>"ô","&#245;"=>"õ","&#246;"=>"ö","&#247;"=>"÷","&#248;"=>"ø","&#249;"=>"ù","&#250;"=>"ú","&#251;"=>"û","&#252;"=>"ü","&#253;"=>"ý","&#254;"=>"þ","&#255;"=>"ÿ",
			
			"&#758;"=>'&quot;',"&#760;"=>":","&#782;"=>'&quot;',"&#800;"=>"_","&#840;"=>'&quot;',"&#818;"=>"_","&#824;"=>"/","&#822;"=>"-","&#817;"=>"-","&#451;"=>"!","&#1030;"=>"I","&#1031;"=>"Ї","&#1042;"=>"В","&#1110;"=>"і","&#1111;"=>"ї","&#835;"=>"&#39;","&#1040;"=>"А","&#1041;"=>"Б","&#1042;"=>"В","&#1043;"=>"Г","&#1044;"=>"Д","&#1045;"=>"Е",
			"&#1046;"=>"Ж","&#1047;"=>"З","&#1048;"=>"И","&#1049;"=>"Й","&#1050;"=>"К","&#1051;"=>"Л","&#1052;"=>"М","&#1053;"=>"Н","&#1054;"=>"О","&#1055;"=>"П","&#1056;"=>"Р","&#1057;"=>"С","&#1058;"=>"Т","&#1059;"=>"У","&#1060;"=>"Ф","&#1061;"=>"Х","&#1062;"=>"Ц","&#1063;"=>"Ч","&#1064;"=>"Ш","&#1065;"=>"Щ","&#1066;"=>"Ъ","&#1067;"=>"Ы","&#1068;"=>"Ь","&#1069;"=>"Э","&#1070;"=>"Ю","&#1071;"=>"Я","&#1072;"=>"а","&#1073;"=>"б","&#1074;"=>"в","&#1075;"=>"г","&#1076;"=>"д","&#1077;"=>"е","&#1078;"=>"ж","&#1079;"=>"з","&#1080;"=>"и","&#1081;"=>"й","&#1082;"=>"к","&#1083;"=>"л","&#1084;"=>"м","&#1085;"=>"н","&#1086;"=>"о","&#1087;"=>"п",
			"&#1088;"=>"р","&#1089;"=>"с","&#1090;"=>"т","&#1091;"=>"у","&#1092;"=>"ф","&#1093;"=>"х","&#1094;"=>"ц","&#1095;"=>"ч","&#1096;"=>"ш","&#1097;"=>"щ","&#1098;"=>"ъ","&#1099;"=>"ы","&#1100;"=>"ь","&#1101;"=>"э","&#1102;"=>"ю","&#1103;"=>"я","&#8221;"=>'&quot;',"&#8194;"=>' ',"&#8195;" =>"  ","&#8211;" =>"–","&#8212;" =>"—","&#769;" =>"а́","&#8482;"=>'™',"&#8240;"=>'‰',"&#8230;"=>'…',"&#8254;"=>'‾',"&#8470;"=>'№',"&#8260;"=>'⁄',"&#8722;"=>'−',"&#8804;"=>'≤',"&#8805;"=>'≥',"&#8800;"=>'≠',"&#8249;"=>'‹',"&#8250;"=>'›',"&#8242;"=>"′","&#8243;"=>"″","&#8216;"=>"‘","&#8217;"=>"’","&#8218;"=>"‚","&#8220;"=>"“","&#8221;"=>"”","&#8222;"=>"„","&#8721;"=>"∑","&#8364;"=>"€","&#10047;"=>"✿",
			
			 "&laquo;" =>'«',"&raquo;" =>'»', "&ndash;" =>"-", "&plusmn;"=>"±", "&gt;"=>">", "&lt;"=>"<", "&tilde;"=>"~", "&lsquo;"=>"‘","&rsquo;"=>"’", "&mdash;" =>"—", "&trade;" =>"™", "&brvbar;" =>"¦","&sect;" =>"§", "&copy;" =>"©", "&reg;" =>"®", "&sup2;" =>"²", "&acuate;" =>"´", "&ldquo;" =>"“", "&rdquo;" =>"”", "&rsaquo;" =>"›", "&lsaquo;" =>"‹", "&Yuml;" =>"Ÿ",  "&ixcl;" =>"¡", "&cent;" =>"¢", "&sbquo;" =>"‚", "&dbquo;" =>"„", "&dagger;" =>"†", "&Dagger;" =>"‡", "&permil;" =>"‰", "&pound;" =>"£", "&curren;" =>"¤", "&yen;" =>"¥",  "&uml;" =>"¨", "&ordf;" =>"ª", "&laquo;" =>"«", "&not;" =>"¬", "&shy;" =>"-", "&macr;" =>"¯", "&deg;" =>"°", "&sup3;" =>"³", "&acuate;" =>"´", "&micro;" =>"µ", "&para;" =>"¶", "&middot;" =>"·", "&cedil;" =>"¸", "&sup1;" =>"¹", "&ordm;" =>"º", "&frac14;" =>"¼", "&frac12;" =>"½", "&frac34;" =>"¾", "&iquest;" =>"¿", "&Agrave;" =>"À", "&Aacute;" =>"Á", "&Acirc;" =>"Â", "&Atilde;" =>"Ã", "&Auml;" =>"Ä", "&Aring;" =>"Å", "&AElig;" =>"Æ", "&Ccedil;" =>"Ç", "&Egrave;" =>"È","&Eacute;" =>"É","&Ecirc;" =>"Ê","&Euml;" =>"Ë","&Igrave;" =>"Ì","&Iacute;" =>"Í","&Icirс;" =>"Î","&ETH;" =>"Ð","&Ntilde;" =>"Ñ","&Ograve;" =>"Ò","&Oacute;" =>"Ó","&Ocirc;" =>"Ô","&Otilde;" =>"Õ","&Ouml;" =>"Ö","&times;" =>"×","&Oslash;" =>"Ø","&Ugrave;" =>"Ù","&Uacute;" =>"Ú","&Ucirc;" =>"Û","&Uuml;" =>"Ü","&Yacute;" =>"Ý","&THORN;" =>"Þ","&szlig;" =>"ß","&agrave;" =>"à","&aacute;" =>"á","&acirc;" =>"â","&atilde;" =>"ã","&auml;" =>"ä","&aring;" =>"å","&aelig;" =>"æ","&ccedil;" =>"ç","&egrave;" =>"è","&eacute;" =>"é","&ecirc;" =>"ê","&euml;" =>"ë","&igrave;" =>"ì","&iacute;" =>"í","&icirс;" =>"î","&eth;" =>"ï","&ntilde;" =>"ñ","&ograve;" =>"ò","&oacute;" =>"ó","&ocirc;" =>"ô","&otilde;" =>"õ","&ouml;" =>"ö","&divide;" =>"÷","&oslash;" =>"ø","&ugrave;" =>"ù","&uacute;" =>"ú","&ucirc;" =>"û","&uuml;" =>"ü","&yacute;" =>"ý","&thorn;" =>"þ","&yuml;" =>"ÿ","&emsp;" =>"  ","&ensp;" =>" ","&pi;" =>"π","&hellip;" =>"…","&oline;" =>"‾","&frasl;" =>"⁄","&minus;" =>"−","&le;" =>"≤","&ge;" =>"≥","&ne;" =>"≠","&prime;" =>"′","&Prime;" =>'″',"&bdquo;" =>"„","&sum;" =>"∑","&euro;" =>"€");
				
		$text = strtr($text, $tr);
		$text = str_replace ('"', '&quot;', $text);
		$text = str_replace ("'", '&#039;', $text);
		$text = str_replace(chr(10), '', $text);
		$text = str_replace(chr(13), ' ', $text);
		$text = str_replace("\\", '', $text);
		$text = preg_replace('| +|', ' ', $text);
		$text = trim($text);
	//	$text = preg_replace('#^(:?&)(.*&?)(;)$#','',$text);		

		return $text;
	}

	public function TransLit($text) {	
		$tr = array(
                "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
                "Д"=>"d","Е"=>"e","Ё"=>"e","Ж"=>"g","З"=>"z","И"=>"i",
                "Й"=>"J","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
                "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
                "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
                "Ш"=>"sh","Щ"=>"sch","Ъ"=>"a","Ы"=>"y","Ь"=>"",
                "Э"=>"e","Ю"=>"yu","Я"=>"ya","Ї"=>"ji","Ґ" =>"g","І" =>"I","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e", "ё"=>"e","ж"=>"g",
                "з"=>"z","и"=>"i","й"=>"j","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"a",
                "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
                "ї"=> "ji", "і"=> "i", "ґ" =>"g", "Є" =>"e", "є" =>"e","ў" =>"u","Ў"=>"U","і" =>"i","І" =>"I" );
				
		$text = strtr($text, $tr);
		unset ($tr);
		return $text;
	}
	
	public function convertWeight($price) {
		$pr = str_replace("&#160;", '', $price);
		$pr = preg_replace('/[^0-9.,E+-]/','',$pr);	
		$a = strlen($pr)-1;
		if (substr($pr, $a, 1) == ".") $pr = substr($pr, 0, $a);
		if (substr_count($pr, ".") and substr_count($pr, ",")) $pr = str_replace(',', '',$pr);
		$pr = str_replace(',', '.',$pr);	
	//	$pr = str_replace('.', '',$pr);
		$pr = trim($pr);
		$pr = round($pr, 3);	
		if (is_numeric($pr)) return $pr;
		else return '';
	}
	
	public function convertPrice($price) {
		$pr = str_replace("&#160;", '', $price);
		$pr = preg_replace('/[^0-9.,E+-]/','',$pr);	
		$a = strlen($pr)-1;
		if (substr($pr, $a, 1) == ".") $pr = substr($pr, 0, $a);
		if (substr_count($pr, ".") and substr_count($pr, ",")) $pr = str_replace(',', '',$pr);
		$pr = str_replace(',', '.',$pr);	
	//	$pr = str_replace('.', '',$pr);
		$pr = trim($pr);
		$pr = round($pr, 2);	
		if (is_numeric($pr)) return $pr;
		else return '';
	}
	
	public function clearSEO($text) {
		$text = str_replace(' [n]', '', $text);
		$text = str_replace('[n]', '', $text);
		$text = str_replace(' [p]', '', $text);
		$text = str_replace('[p]', '', $text);
		$text = str_replace(' [sp]', '', $text);
		$text = str_replace('[sp]', '', $text);
		$text = str_replace(' [c]', '', $text);
		$text = str_replace('[c]', '', $text);
		$text = str_replace(' [pc]', '', $text);
		$text = str_replace('[pc]', '', $text);
		$text = str_replace(' [m]', '', $text);
		$text = str_replace('[m]', '', $text);
		$text = str_replace(' [d]', '', $text);	
		$text = str_replace('[d]', '', $text);
		$text = str_replace(' [b]', '', $text);	
		$text = str_replace('[b]', '', $text);
		$text = str_replace(' [sku]', '', $text);	
		$text = str_replace('[sku]', '', $text);
	
		for ($j=1; $j<300; $j++) {			
			$a = ' {' . $j . '}';
			$text = str_replace($a, '', $text);
			$a = '{' . $j . '}';
			$text = str_replace($a, '', $text);	
		}
		for ($j=1; $j<21; $j++) {			
			$a = ' [' . $j . ']';
			$text = str_replace($a, '', $text);	
			$a = '[' . $j . ']';
			$text = str_replace($a, '', $text);	
		}
		return $text;
	}
								
	public function updatePrice($row, $cheap, $kmenu, $disc, $onn, $placep, $cprice, $zero, $max_site, $nomkol, $ident, $mratek, $param, $point, $noprice, $paramnp, $pointnp, $baseprice, $onoff, $sleep, $ffile) {
		if (!$row['sku']) return;
		$price = $row['price'];
		$zero_prod = 0;
		$off_prod = 0;
		$new_price = 0;
		$baseprice1 = 0;
		$rate_ident = 1;
		$mas = array();
		$identificator = array();
		$rows = $this->getReferens($row['product_id']);								
		if (!empty($rows)) {
			$k = 0;			
			foreach ($rows as $r) {	
				$rate_ident = 1;
				$ht = $this->curl_get_contents($r['url'], 0, $sleep, $ffile);
				if (strlen($ht) > 1024) {
					$ff = 0;
					for ($l=0; $l<$max_site; $l++) {
						if ($r['ident'] == $ident[$l]) {
							$ff = 1;
							break;
						}	
					}
					if ($ff) {
						if ($mratek[$l]) $rate_ident = $mratek[$l];
						$pr = $this->ParsPrice($ht, $param[$l], $point[$l], $placep);	
						if (!empty($pr)) $pr = $pr*$rate_ident;
						else {
							$err = " Site: " . $this->symbol($ident[$l]) . " url = ". $r['url'] . " parsing fail \n";
							$this->adderr($err);
						}
						$parsedprice = 0;
						if ($pr) $parsedprice = $pr; 
						$this->db->query("UPDATE `" . DB_PREFIX . "suppler_ref` SET `price` = '" . $parsedprice . "' WHERE `nom_id` = '" .(int)$r['nom_id'] . "'");
						if (!empty($pr)) {							
							if (!empty($noprice[$l])) {
								$nopr = $this->ParsName($ht, $paramnp[$l], $pointnp[$l], 1);
								if (empty($nopr) or !substr_count($nopr, $noprice[$l])) {
									$mas[$k] = $this->convertPrice($pr);									
									if ($baseprice[$l]) $baseprice1 = $pr;
									$k++;												
								}						
							} else {	
								$mas[$k] = $this->convertPrice($pr);								
								if ($baseprice[$l]) $baseprice1 = $pr;
								$k++;						
							}	
						}						
						
					}	
				} else {
					$err = " url = ". $r['url']. " Site no answer \n";
					$this->adderr($err);
				}				
			}
		}
	    $l = 0;
		if (count($mas)) {
			$min = 1000000000;
			for ($j=0; $j<$k; $j++) {
				if ($mas[$j] <= $min) {
					$min = $mas[$j];
					$l = $j;
				}	
			}
			$sum = 0;
			for ($j=0; $j<$k; $j++) {
				$sum = $sum + $mas[$j];
			}
			$sum = $sum/$j;
			$maxp = 0;
			$m = 100;
			for ($j=0; $j<$k; $j++) {
				if ($mas[$j] >= $maxp) {
					$maxp = $mas[$j];
					$m = $j;
				}	
			}	
			$optimal = $sum;
			if (count($mas) == 2) $optimal = ($mas[0]+$mas[1])/2;
			if (count($mas) > 2) {
				$optimal = 0;
				for ($j=0; $j<$k; $j++) {
					$w = 3;
					if ($j==$l) $w = 1;									
					if ($j==$m) $w = 2;
					$optimal = $optimal + $mas[$j] * $w;	
				}
				$optimal = $optimal/($j*3-3);							
			}	
			$submin = 1000000000;
			$mas[$l] = 999999999;
			for ($j=0; $j<$k; $j++) {
				if ($mas[$j] <= $submin) $submin = $mas[$j];
			}
			if ($submin > 999999998) $submin = $min;
			$po = strpos($onn, '%');
			if ($po) $onnn = substr($onn, 0, $po);
			else $onnn = $onn;			
			switch ($cheap) {			
				case 1:									
					if ($po) $new_price = $min - $min*$onnn/100;
					else $new_price = $min - $onnn;
					break;
				case 2:									
					if ($po) $new_price = $sum - $sum*$onnn/100;
					else $new_price = $sum - $onnn;		
					break;
				case 3:									
					if ($po) $new_price = $maxp - $maxp*$onnn/100;
					else $new_price = $maxp - $onnn;
					break;
				case 4:									
					if ($po) $new_price = $optimal - $optimal*$onnn/100;
					else $new_price = $optimal - $onnn;
					break;
				case 5:									
					if ($po) $new_price = $min + $min*$onnn/100;
					else $new_price = $min + $onnn;
					break;
				case 6:									
					if ($po) $new_price = $sum + $sum*$onnn/100;
					else $new_price = $sum + $onnn;		
					break;
				case 7:									
					if ($po) $new_price = $maxp + $maxp*$onnn/100;
					else $new_price = $maxp + $onnn;
					break;
				case 8:									
					if ($po) $new_price = $optimal + $optimal*$onnn/100;
					else $new_price = $optimal + $onnn;
					break;		
			}
	
			$status = 0;
			$quantity = 10;
			if ($onoff) $status = 1;
			if ($baseprice1) {			
				$bpr = strip_tags($baseprice1);
				$bpr = preg_replace('/[^0-9.,Ee+-]/','',$bpr);
				$bpr = str_replace(',', '.',$bpr);
				$bpr = trim($bpr);
				$bpr = $bpr*$rate_ident;
				$bpr = $this->convertPrice($bpr);
				$bprr = $bpr;
				if (!empty($disc)) $bprr = $bpr - $bpr*$disc/100;
				if ($bprr > $new_price) {
					switch ($kmenu) {
						case '0': $new_price = 0;
							break;
						case '1': $quantity = 0;
								$new_price = $price;
							break;
						case '2': $status = 0;
								$new_price = $price;
							break;
						case '3': $new_price = $bpr*1.01;
							break;
						case '4': 
							if ($po) $new_price = $min - $min*$onnn/100;
							else $new_price = $min - $onnn;											
							break;
						case '5': 
							if ($po) $new_price = $submin - $submin*$onnn/100;
							else $new_price = $submin - $onnn;											
							break;
						case '6': $new_price = 0;
							break;	
					}		
				}
				$percent_to_bprice = 0;
				if ($bpr) $percent_to_bprice = 100*($new_price-$bpr)/$bpr;
				$percent_to_bdprice = 0;
				if ($bprr) $percent_to_bdprice = 100*($new_price-$bprr)/$bprr;
				
				$this->db->query("UPDATE `" . DB_PREFIX . "suppler_base_price` SET `bprice` = '" . $bpr . "',  `market_percent_to_bprice` = '" . $percent_to_bprice . "', `market_percent_to_bdprice` = '" . $percent_to_bdprice . "' WHERE `product_id` = '" . $row['product_id'] . "'");				
			}		
			
			$percent_to_price = 0;			
						
			$this->db->query("UPDATE `" . DB_PREFIX . "suppler_base_price` SET `optimal` = '" . $optimal . "', `bmin` = '" . $min . "', `bav` = '" . $sum . "', `bmax` = '" . $maxp . "', `market_percent_to_price` = '" . $percent_to_price . "' WHERE `product_id` = '" . $row['product_id'] . "'");	
	
			if ($new_price and $quantity) {	
				$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `price` = '" . $new_price . "', `status` = '" . 1 . "', `quantity` = '" . $quantity . "', `status` = '" . $status . "' WHERE `product_id` = '" .(int)$row['product_id'] . "'");
				
				$table = DB_PREFIX . "product";
				$tname = "base_price";
				if ($this->getColumnName($table, $tname)) {		
					$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_price` = '" . $new_price . "' WHERE `product_id` = '" . (int)$row['product_id'] . "'");
				}
			}
			unset($mas);
			unset($identificator);
		} else {
			switch ($zero) {
				case '0': 
					break;
				case '1': 
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `quantity` = '" . 0 . "', `stock_status_id` = '" . 5 . "' WHERE `product_id` = '" .(int)$row['product_id'] . "'");	
					break;
				case '2': 
						$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `status` = '" . 0 . "' WHERE `product_id` = '" .(int)$row['product_id'] . "'");	
					break;
			}
		}	
	}
	
	public function PicData1($addrold, $folder, &$addrnew) {		
		$p = strrpos($addrold, "/");
		if (!$p) return;
		$name = substr($addrold, $p+1);
		$addrnew = "data/". $folder . "/" . $name;	
	}	
	
	public function PicData($row, $mas_catid, $pic_int) {		
		$rows = $this->getProductCategory($row['product_id']);
		if ($rows) {
			$child = 0;			
			for ($i=0; $i<900; $i++) {
				if (!isset($rows[$i]['category_id'])) break;
				if (isset($rows[$i]['main_category']) and $rows[$i]['main_category'] == 1) {
					$child = $rows[$i]['category_id'];
					break;
				}
				if ($rows[$i]['category_id'] > $child) $child = $rows[$i]['category_id'];				
			}
			if (!$child) return;
			$f = 0;
			for ($i=1; $i<9000; $i++) {
				if (!isset($mas_catid[$i])) break;
				if ($mas_catid[$i] == $child) {
					$f = $i;
					break;
				}	
			}
			if (!$f) {
				$err =  " Please, set category and folder for photo on page 'Category and margin' for Product: " . $row['model'] . " Category_id: " . $child ."  \n";
				$this->adderr($err);
				return;
			}
			$addrnew = 0;
			$this->PicData1($row['image'], $pic_int[$f], $addrnew);	
			if ($addrnew and $addrnew != $row['image']) {
				$path_old = "../image/" . $row['image'];
				$path_new = "../image/" . $addrnew;
				$p = strrpos($addrnew, "/");
				if ($p) {
					$path = "../image/" . substr($addrnew, 0, $p) . "/";
					if (!is_dir($path)) @mkdir($path, 0755);
					if (copy($path_old, $path_new)) {
						$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $addrnew . "' WHERE `product_id` = '" . $row['product_id'] . "'");
						
						if (file_exists($path_old)) @unlink ($path_old);
					}
				}
			}
			$rows = $this->getProductImage($row['product_id']);
			if (!empty ($rows)) {	
				foreach ($rows as $pp) {
					$addrnew = 0;
					$this->PicData1($pp['image'], $pic_int[$f], $addrnew);	
					if ($addrnew and $addrnew != $pp['image']) {
						$path_old = "../image/" . $pp['image'];
						$path_new = "../image/" . $addrnew;
						$p = strrpos($addrnew, "/");
						if ($p) {
							$path = "../image/" . substr($addrnew, 0, $p) . "/";
							if (!is_dir($path)) @mkdir($path, 0755);
							if (copy($path_old, $path_new)) {
								$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $addrnew . "' WHERE `product_image_id` = '" . $pp['product_image_id'] . "'");
								
								if (file_exists($path_old)) @unlink ($path_old);
							}	
						}
					}							
				}
			}
		}	
	}	
	
	public function PrintDublNameProducts($row) {
		$model = $row['model'];
		$rows = $this->getProductDesc($row['product_id']);	
		if (empty($rows)) return;		
		$rows = $this->getProductIDbyName($rows[0]['name']);
		if (!isset($rows[1]['name'])) return;
		$st = 'Product code: ' . $model . ' Name: ' . $this->symbol($rows[0]['name']);
		for ($i=1; $i<300; $i++) {
			if (!isset($rows[$i]['product_id'])) break;
			$rows1 = $this->getProductsByID($rows[$i]['product_id']);
			$st = $st . "    " . $rows1[0]['model'];
		}			
		if (strlen($st) > 19) {
			$err = $st . " \n";
			$this->adderr($err);
		}
	}
	
	public function DoubleAliasManuf() {
		$row = $this->getMaxAliasID();
		$max = $row['max(url_alias_id)'];
		for ($j=1; $j<=$max; $j++) {
			$row = $this->getURLmanufacturer($j);			
			if (empty($row)) continue;
			if (!substr_count($row['query'], "urer_id=")) continue;
			$a = $row['query'];
			$p = strpos($a, "=");
			$a = (int)substr($a, $p+1);
			$rows1 = $this->getManufacturerName((int)$a);
			if (empty($rows1)) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'manufacturer_id=" . $a. "'");
				continue;
			}
			$seo_url = $row['keyword'];			
			$rows = $this->chURL($seo_url);
			if (!isset($rows[1]['query'])) continue;
			$st = 'Manufacturer: ';
			for ($i=0; $i<10; $i++) {
				if (!isset($rows[$i]['query'])) break;
				if (!substr_count($rows[$i]['query'], "urer_id=")) continue;
				$a = $rows[$i]['query'];
				$p = strpos($a, "=");
				$a = (int)substr($a, $p+1);
				$rows1 = $this->getManufacturerName((int)$a);
				if (!empty($rows1)) $st = $st . "    " . $this->symbol($rows1[0]['name']);
			}			
			if (strlen($st) > 19) {
				$err = $st . " \n";
				$this->adderr($err);
			}		
		}	
	}
	
	public function DoubleAliasCat() {
		$row = $this->getMaxAliasID();
		$max = $row['max(url_alias_id)'];
		for ($j=1; $j<=$max; $j++) {
			$row = $this->getURLcategory($j);			
			if (empty($row)) continue;
			if (!substr_count($row['query'], "gory_id=")) continue;
			$a = $row['query'];
			$p = strpos($a, "=");
			$a = (int)substr($a, $p+1);
			$rows1 = $this->getCategory((int)$a);
			if (empty($rows1)) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'category_id=" . $a. "'");
				continue;
			}
			$seo_url = $row['keyword'];			
			$rows = $this->chURL($seo_url);
			if (!isset($rows[1]['query'])) continue;
			$st = 'Categories: ';
			for ($i=0; $i<10; $i++) {
				if (!isset($rows[$i]['query'])) break;
				if (!substr_count($rows[$i]['query'], "gory_id=")) continue;
				$a = $rows[$i]['query'];
				$p = strpos($a, "=");
				$a = (int)substr($a, $p+1);
				$rows1 = $this->getCategoryName((int)$a);
				if (!empty($rows1)) $st = $st . "    " . $this->symbol($rows1[0]['name']);
			}			
			if (strlen($st) > 17) {
				$err = $st . " \n";
				$this->adderr($err);
			}		
		}	
	}
	
	public function FixDublAliasProducts($product_id) {
		if (!$product_id) return;
		$row = $this->getURL($product_id);
		if (empty($row)) return;
		$seo_url = $row['keyword'];			
		$rows = $this->chURL($seo_url);
		if (!isset($rows[1]['query'])) return;
		$st = 'Product SKU: ';		
		for ($i=0; $i<50; $i++) {
			if (!isset($rows[$i]['query'])) break;
			if (!substr_count($rows[$i]['query'], "duct_id=")) continue;			
			$a = $rows[$i]['query'];
			$p = strpos($a, "=");
			$a = (int)substr($a, $p+1);
			$row = $this->getProductByID((int)$a);
			if (empty($row)) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . $product_id. "'");
				continue;
			} else {	
				$st = $st . "    " . $row['sku'];
				if ($i>0 and !substr_count($rows[$i]['query'], $product_id)) {
					$seo = $seo_url . '-' . $product_id;
					$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($seo) . "' WHERE `query` = 'product_id=" . (int)$a . "'");
				}
			}	
		}
		if (strlen($st) > 30) {
			$err = $st . " \n";
			$this->adderr($err);
		}
	}	
	
	public function PrintDublAliasProducts($product_id) {
		if (!$product_id) return;
		$row = $this->getURL($product_id);
		if (empty($row)) return;
		$seo_url = $row['keyword'];			
		$rows = $this->chURL($seo_url);
		if (!isset($rows[1]['query'])) return;
		$st = 'Product Codes: ';		
		for ($i=0; $i<50; $i++) {
			if (!isset($rows[$i]['query'])) break;
			if (!substr_count($rows[$i]['query'], "duct_id=")) continue;
			$a = $rows[$i]['query'];
			$p = strpos($a, "=");
			$a = (int)substr($a, $p+1);
			$row = $this->getProductByID((int)$a);				
			$st = $st . "    " . $row['model'];
		}
		if (strlen($st) > 30) {
			$err = $st . " \n";
			$this->adderr($err);
		}
	}
	
	public function FixDesCategoryNest($seo_data, $store, $papa) {
		$lang = $this->config->get('config_language_id');
		for ($j=0; $j<2000; $j++) {	
			if (!isset($papa[$j])) break;
			$rows1 = $this->getChildCategory($papa[$j]);
			if (empty($rows1)) continue;
			for ($i=0; $i<=3000; $i++) {	
				if (!isset($rows1[$i]['category_id'])) break;
				$rows = $this->getCategoryName($rows1[$i]['category_id']);
				if (empty($rows)) continue;
				$name = '';	
				if (isset($rows[0]['name'])) $name = $rows[0]['name'];
				$name = str_replace('"', "&quot;", $name);
				$name = str_replace("'", "&#039;", $name);
				$seo = array();
				$this->seoCategory($store, $name, 0, $seo_data, $seo);			
				$seo['cat_desc'] = $this->clearSEO($seo['cat_desc']);
			
				if (!empty($seo['cat_desc'])) {
					$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `description` = '" . $this->db->escape($seo['cat_desc']) . "' WHERE `category_id` = '". $rows1[$i]['category_id'] . "' and `language_id` = '" . $lang . "'");
				}	
			}	
		}
	}
	
	public function FixDesCategoryOne($seo_data, $store, $cat) {	
		$lang = $this->config->get('config_language_id');
		for ($i=0; $i<2000; $i++) {	
			if (!isset($cat[$i])) break;
			$rows = $this->getCategoryName($cat[$i]);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);			
			$seo['cat_desc'] = $this->clearSEO($seo['cat_desc']);		
	
			if (!empty($seo['cat_desc'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `description` = '" . $this->db->escape($seo['cat_desc']) . "' WHERE `category_id` = '". $cat[$i] . "' and `language_id` = '" . $lang . "'");
			}	
		}
	}
	
	public function FixMetaCategoryNest($seo_data, $store, $papa) {	
		$lang = $this->config->get('config_language_id');
		for ($j=0; $j<2000; $j++) {	
			if (!isset($papa[$j])) break;
			$rows1 = $this->getChildCategory($papa[$j]);
			if (empty($rows1)) continue;
			for ($i=0; $i<=3000; $i++) {	
				if (!isset($rows1[$i]['category_id'])) break;
				$rows = $this->getCategoryName($rows1[$i]['category_id']);
				if (empty($rows)) continue;
				$name = '';	
				if (isset($rows[0]['name'])) $name = $rows[0]['name'];
				$name = str_replace('"', "&quot;", $name);
				$name = str_replace("'", "&#039;", $name);
				$seo = array();
				$this->seoCategory($store, $name, 0, $seo_data, $seo);			
				$seo['cat_meta_desc'] = $this->clearSEO($seo['cat_meta_desc']);
				$seo['cat_title'] = $this->clearSEO($seo['cat_title']);
		
				$seo_keyword = '';
			
				if (!empty($name)) {
					$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `name` = '" . $this->db->escape($name) . "', `meta_description` = '" . $this->db->escape($seo['cat_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['cat_title']) . "' WHERE `category_id` = '". $rows1[$i]['category_id'] . "' and `language_id` = '" . $lang . "'");
				}	
			}	
		}		
	}
	
	public function FixMetaCategoryOne($seo_data, $store, $cat) {
		$lang = $this->config->get('config_language_id');
		for ($i=0; $i<2000; $i++) {	
			if (!isset($cat[$i])) break;
			$rows = $this->getCategoryName($cat[$i]);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);			
			$seo['cat_meta_desc'] = $this->clearSEO($seo['cat_meta_desc']);
			$seo['cat_title'] = $this->clearSEO($seo['cat_title']);
	
			$seo_keyword = '';
			if (!empty($name)) {
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `name` = '" . $this->db->escape($name) . "', `meta_description` = '" . $this->db->escape($seo['cat_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['cat_title']) . "' WHERE `category_id` = '". $cat[$i] . "' and `language_id` = '" . $lang . "'");	
			}	
		}	
	}
	
	public function ClearSerie($product_id) {
		$row = $this->getMasterSerie($product_id);
		if (empty($row)) return;
		$rows = $this->getMasterProduct($product_id);
		foreach ($rows as $r) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_master WHERE product_id = '" . $r['product_id'] . "'");
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_special_attribute WHERE product_id = '" . $r['product_id'] . "'");
		}	
	}
	
	public function attributeToTags($product_id) {
		$rows = $this->getAttributes($product_id);
		if (empty($rows)) return;
		$at ='';
		foreach ($rows as $r) {
			$add = $this->getName($r['text']);
			if (!empty($add)) {
				if (empty($at)) $at = $add;
				else $at = $at.','.$add;
			}	
		}
		if (!empty($at)) {			
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($at) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");
		}
	}
	
	public function deleteZeroQuantityOption($product_id) {
		$rows = $this->isProductOption($product_id);
		if (!empty($rows)) {
			foreach ($rows as $r) {
				if ($r['quantity'] == 0) $this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_value_id = '" . $r['product_option_value_id'] . "'");
			}
		}	
	}
	
	public function deleteZeroPriceOption($product_id) {
		$rows = $this->isProductOption($product_id);
		if (!empty($rows)) {
			foreach ($rows as $r) {
				if ($r['price'] == 0 and $r['price_prefix'] == '=') $this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_value_id = '" . $r['product_option_value_id'] . "'");
			}
		}	
	}
	
	public function deleteOptionValue($product_id, $option_value_id) {	
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE option_value_id = '" . $option_value_id . "' AND `product_id` = '" . $product_id . "'");
	}

	public function optQuantity($product_id, $val_id, $qu) {
		if (empty($qu)) $qu = 0;
		$rows = $this->getProductAllOptionValue($product_id);
		if (empty($rows)) return;
		if (!isset($val_id) or empty($val_id)) {
			$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `quantity` = '" . $qu . "' WHERE `product_id` = '" . $product_id. "'");
		} else {	
			for ($i=0; $i<400; $i++) {
				if (!isset($rows[$i]['option_id'])) break;
				if ($rows[$i]['option_value_id'] == $val_id) {
					$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `quantity` = '" . $qu . "' WHERE `product_option_value_id` = '" . $rows[$i]['product_option_value_id']. "'");
				}
			}
		}
	}	
	
	public function deleteDubleOption($product_id) {
		$rows = $this->getProductAllOptionValue($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['option_id'])) break;
			for ($j=0; $j<900; $j++) {
				if (!isset($rows[$j]['option_id'])) break;
				if (!$rows[$j]['option_id']) continue;
				if ($i != $j) {
					if ($rows[$i]['option_id'] == $rows[$j]['option_id'] and $rows[$i]['option_value_id'] == $rows[$j]['option_value_id']) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_value_id = '" . $rows[$j]['product_option_value_id'] . "'");
						$rows[$j]['option_id'] = 0;
					}	
				}
			}
		}	
	}	

	public function subOption($product_id, $option_id) {
		if (empty($option_id)) return;		
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `subtract` = '" . 1 . "' WHERE `product_id` = '" . (int)$product_id . "' and `option_id` = '" . $option_id . "'");		
	}

	public function _subOption($product_id, $option_id) {
		if (empty($option_id)) return;
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `subtract` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "' and `option_id` = '" . $option_id . "'");		
	}
	
	public function countOptionQuantity($product_id) {
		$rows = $this->getAllGroups($product_id);
		$summa = 0;
		$fl = 0;
		if (!empty($rows)) {
			$fl = 1;
			foreach ($rows as $val) {
				$summa = $summa + $val['quantity'];
			}					
		} else {
			$rows = $this->getProductAllOptionValue($product_id);
			if (!empty($rows)) {
				$fl = 1;
				for ($j=0; $j<=900; $j++) {
					if (!isset($rows[$j]['price'])) break;
					$summa = $summa + (int)$rows[$j]['quantity'];								
				}
			}	
		}
		if ($fl) {
			$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = '" . $summa . "' WHERE `product_id` = '" . (int)$product_id . "'");
		}	
	}
	
	public function _setOptionRequired($product_id, $option_name) {
		if (empty($option_name)) return;
		$option_name = $this->getName($option_name);
		$rows = $this->getOptionID($option_name);
		if (empty($rows)) return;
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option SET `required` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "' and `option_id` = '" . (int)$rows[0]['option_id'] . "'");		
	}

	public function setOptionRequired($product_id, $option_name) {
		if (empty($option_name)) return;
		$option_name = $this->getName($option_name);
		$rows = $this->getOptionID($option_name);
		if (empty($rows)) return;
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product_option SET `required` = '" . 1 . "' WHERE `product_id` = '" . (int)$product_id . "' and `option_id` = '" . (int)$rows[0]['option_id'] . "'");		
	}

	public function setPriceByMinOption($row) {
		$rows = $this->getProductAllOptionValue($row['product_id']);
		if (empty($rows)) return;
		$min = 999999999999;
		for ($j=0; $j<=900; $j++) {			
			if (!isset($rows[$j]['price'])) break;
			if ($rows[$j]['price_prefix'] == '+') $rows[$j]['price'] = $row['price'] + $rows[$j]['price'];
			if ($rows[$j]['price_prefix'] == '-') $rows[$j]['price'] = $row['price'] - $rows[$j]['price'];
			if ($rows[$j]['price']>0 and $rows[$j]['price'] < $min and $rows[$j]['quantity']) $min = $rows[$j]['price'];
		}
		if ($min < 999999999999) {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `price` = '" . $min . "' WHERE `product_id` = '" . $row['product_id'] ."'");
		
			$table = DB_PREFIX . "product";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname)) {		
				$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_price` = '" . $min . "' WHERE `product_id` = '" . $row['product_id'] . "'");
			}	
		}
	}

	public function clearPricesOptions($product_id) {		
		$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `price` = '" . 0 . "' WHERE `product_id` = '" . $product_id ."'");
		
		$table = DB_PREFIX . "product_option_value";
		$tname = "base_price";
		if ($this->getColumnName($table, $tname)) {		
			$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . 0 . "' WHERE `product_id` = '" . $product_id . "'");
		}
	}	
	
	public function countOptionPrices($row) {
		$rows = $this->getProductAllOptionValue($row['product_id']);
		if (empty($rows)) return;
		$min = 999999999999;
		for ($j=0; $j<=900; $j++) {			
			if (!isset($rows[$j]['price'])) break;
			if ($rows[$j]['price_prefix'] == '+') $rows[$j]['price'] = $row['price'] + $rows[$j]['price'];
			if ($rows[$j]['price_prefix'] == '-') $rows[$j]['price'] = $row['price'] - $rows[$j]['price'];
			if ($rows[$j]['price']>0 and $rows[$j]['price'] < $min and $rows[$j]['quantity']) $min = $rows[$j]['price'];
		}
		if ($min == 999999999999) return;
		for ($j=0; $j<=900; $j++) {				
			$popt = 0;	
			if (!isset($rows[$j]['price'])) break;			
			if ($rows[$j]['price']) {
				$popt = (float)$rows[$j]['price'] - (float)$min;							
				$prefix = '+';
				if ($popt<0) $prefix = '-';							
				$popt = abs($popt);
				$popt = $this->convertPrice($popt);	
				$this->upOptionPlus($rows[$j]['product_option_value_id'], $popt, $prefix);
			}	
		}
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `price` = '" . $min . "' WHERE `product_id` = '" . $row['product_id'] ."'");

		$table = DB_PREFIX . "product";
		$tname = "base_price";
		if ($this->getColumnName($table, $tname)) {		
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_price` = '" . $min . "' WHERE `product_id` = '" . $row['product_id'] . "'");
		}	
	}	
	
	public function delNovalueAtt($product_id) {
		$rows = $this->getAttrib($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<=1000; $i++) {
			if (!isset($rows[$i]['text'])) break;
			$k = 0;
			$mas = array();
			for	($j=$i; $j<900; $j++) {
				if (!isset($rows[$j]['attribute_id'])) break;	
				if ($rows[$i]['attribute_id'] != $rows[$j]['attribute_id']) break;
				if ($rows[$i]['attribute_id'] == $rows[$j]['attribute_id']) {		
					$mas[$k]['text'] = $rows[$j]['text'];	
					$k++;	
				}
			}

			$f = 0;
			for ($l=0; $l<$k; $l++) {
				if (!empty($mas[$l]['text'])) { 
					$f = 1;
					break;
				}
			}
			if (!$f) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE attribute_id = '" . $rows[$i]['attribute_id'] . "'");
			}	
			$i = $j-1;
		}		
	}

	public function addAttribute($product_id, $attribute_id, $val) {
		if (empty($val)) return;
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) {			
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . $product_id . "', `attribute_id` = '" . $attribute_id . "', `language_id` = '" . $lang . "', `text` = '" . $this->db->escape($val) . "'");			
		} else {
			$a = $rows[0]['text'] . ',' . $val;
			$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($a) . "' WHERE `product_id` = '" . $product_id . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang . "'");
		}	
	}
	
	public function deleteDubleProductAtt($product_id) {
		$rows = $this->getAttributes($product_id);
		if (empty($rows)) return;
		$lang = $this->config->get('config_language_id');	
		$names = array();
		for ($i=0; $i<1000; $i++) {
			if (!isset($rows[$i]['attribute_id'])) break;		
			$rows1 = $this->checkAttribute($rows[$i]['attribute_id'], $lang);
			if (!empty($rows1)) $names[$i] = $rows1[0]['name'];
			else $names[$i] = 'del';
		}	
		for ($i=0; $i<1000; $i++) {
			if (!isset($rows[$i]['attribute_id'])) break;
			for ($j=0; $j<1000; $j++) {
				if (!isset($rows[$j]['attribute_id'])) break;
				if ($i != $j and $names[$i] == $names[$j] and $names[$j] != 'del') {	
					$names[$j] = 'del';
					if (!empty($rows[$i]['text']) and !empty($rows[$j]['text'])) $rows[$i]['text'] = $rows[$i]['text'] . ',' . $rows[$j]['text'];
					
					$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($rows[$i]['text']). "' WHERE `product_id` = '" . $product_id . "' and `attribute_id` = '" . $rows[$i]['attribute_id'] . "' and `language_id` = '" . $lang . "'");
					
					$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . $product_id . "' AND attribute_id = '" . $rows[$j]['attribute_id'] . "' and `language_id` = '" . $lang . "'");				
				}
			}
		}	
	}
	
	public function deleteTheAttribute($product_id, $find) {		
		$rows = $this->getAttributeID($find);	
		if (empty($rows)) return;
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . $product_id . "' AND attribute_id = '" . $rows[0]['attribute_id'] . "'");
	}	
	
	public function clearAttribute($product_id) {
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributes($product_id);
		if (empty($rows)) return;
		foreach ($rows as $r) {				
			$new = trim($r['text']);
			$new = preg_replace('| +|', ' ', $new);			
			$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($new). "' WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '" . (int)$r['attribute_id'] . "' and `language_id` = '" . $lang . "'");
		}		
	}
	
	public function deleteRelatedOptions($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions WHERE product_id = '" . $product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_option WHERE product_id = '" . $product_id . "'");
	}	

	public function deleteZeroOption($product_id) {
		$rows = $this->getProductAllOptionValue($product_id);
		if (empty($rows)) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "'");
		} else {	
			$old_id = '';
			$l = 0;
			$mas = array();
			for ($j=0; $j<=900; $j++) {			
				if (!isset($rows[$j]['option_id'])) break;	
				$id = $rows[$j]['option_id'];
				if ($old_id != $id) {
					$old_id = $id;
					$summa = 0;
					for ($k=0; $k<=900; $k++) {
						if (!isset($rows[$k]['option_id'])) break;
						if ($rows[$k]['option_id'] == $id) $summa = $summa +  $rows[$k]['quantity'];
						if (!$rows[$k]['quantity']) {
							$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_value_id = '" . $rows[$k]['product_option_value_id'] . "'");
						}	
					}	
					if (!$summa) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . $product_id . "' AND option_id = '" . $id . "'");
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "' AND option_id = '" . $id . "'");
					} else {
						$mas[$l] = $id;
						$l++;
					}	
				}
			}	
			$rows = $this->getProductAllOption($product_id);
			if (!empty($rows)) {
				for ($j=0; $j<=900; $j++) {			
					if (!isset($rows[$j]['option_id'])) break;
					$f = 0;
					for ($k=0; $k<=900; $k++) {
						if (!isset($mas[$k])) break;
						if ($rows[$j]['option_id'] == $mas[$k]) $f = 1;	
					}
					if (!$f) {
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "' AND option_id = '" . $rows[$j]['option_id'] . "'");
					}
				}						
			}	
		}	
	}	
	
	public function deleteProductOption($product_id) {		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . $product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions WHERE product_id = '" . $product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_option WHERE product_id = '" . $product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_variant_product WHERE product_id = '" . $product_id . "'");
	}

	public function deleteOption($product_id, $option_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "' and option_id = '" . $option_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . $product_id . "' and option_id = '" . $option_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . $product_id . "' and option_id = '" . $option_id . "'");		
		$this->db->query("DELETE FROM " . DB_PREFIX . "relatedoptions_option WHERE product_id = '" . $product_id . "' and option_id = '" . $option_id . "'");		
	}
	
	public function changeActionDiscount($product_id, $mult, $rnd, $krat, $sum) {
		if (empty($mult) and $rnd = '' and empty($krat) and empty($sum)) return;
		if (!empty($mult) and !preg_match('/^[0-9.,]+$/', $mult)) return;
		if (!empty($sum) and !preg_match('/^[0-9.,]+$/', $sum)) return;
		if ($rnd != '' and !preg_match('/^[0-9]+$/', $rnd)) return;
		if (!empty($krat) and !preg_match('/^[0-1]+$/', $krat)) return;
		if (!empty($mult)) $mult = str_replace(',', '.', $mult);
		$rows = $this->getActionAll($product_id);
		if (!empty($rows)) {
			for ($i=0; $i<900; $i++) {
				if (!isset($rows[$i]['price'])) break;
				if (!empty($mult)) $rows[$i]['price'] = $rows[$i]['price']*$mult;
				if (!empty($rnd)) $rows[$i]['price'] = round($rows[$i]['price'], $rnd);
				if (!empty($krat)) $rows[$i]['price'] = round($rows[$i]['price']/$krat, 0)*$krat;
				if (!empty($sum)) $rows[$i]['price'] = $rows[$i]['price']+$sum;
				$table = DB_PREFIX . "product_special";
				$tname = "base_price";
				if (!$this->getColumnName($table, $tname)) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_special SET price = '" . $rows[$i]['price'] . "' WHERE product_special_id = '" . $rows[$i]['product_special_id']. "'");					
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_special SET base_price = '" . $rows[$i]['price'] . "', price = '" . $rows[$i]['price'] . "' WHERE product_special_id = '" . $rows[$i]['product_special_id']. "'");		
				}	
			}
		}
		$rows = $this->getDiscountAll($product_id);
		if (!empty($rows)) {
			for ($i=0; $i<900; $i++) {
				if (!isset($rows[$i]['price'])) break;
				if (!empty($mult)) $rows[$i]['price'] = $rows[$i]['price']*$mult;
				if (!empty($rnd)) $rows[$i]['price'] = round($rows[$i]['price'], $rnd);
				if (!empty($krat)) $rows[$i]['price'] = round($rows[$i]['price']/$krat, 0)*$krat;
				if (!empty($sum)) $rows[$i]['price'] = $rows[$i]['price']+$sum;
				$table = DB_PREFIX . "product_discount";
				$tname = "base_price";
				if (!$this->getColumnName($table, $tname)) {
					$this->db->query("UPDATE " . DB_PREFIX . "product_discount SET price = '" . $rows[$i]['price'] . "' WHERE product_discount_id = '" . $rows[$i]['product_discount_id']. "'");
				} else {
					$this->db->query("UPDATE " . DB_PREFIX . "product_discount SET base_price = '" . $rows[$i]['price'] . "', price = '" . $rows[$i]['price'] . "' WHERE product_discount_id = '" . $rows[$i]['product_discount_id']. "'");
				}	
			}
		}
	}

	public function deleteOptionPhoto($product_id) {
		$table = DB_PREFIX . "poip_option_image";
		$tname = "image";
		if ($this->getColumnName($table, $tname)) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "poip_option_image WHERE product_id = '" . $product_id . "'");
		}		
	}

	public function MultiplayOption($product_id, $option_id, $mult) {
		if (!preg_match('/^[0-9.,]+$/', $mult)) return;
		$mult = str_replace(',', '.', $mult);
		$rows = $this->isProductOption($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['price'])) break;			
			if ($rows[$i]['option_id'] == $option_id) {
				$rows[$i]['price'] = $rows[$i]['price'] * $mult;
				
				$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $rows[$i]['price'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
			
				$table = DB_PREFIX . "product_option_value";
				$tname = "base_price";
				if ($this->getColumnName($table, $tname)) {		
					$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $rows[$i]['price'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
				}				
			}	
		}	
	}

	public function MultOptValue($product_id, $option_value_id, $mult) {
		if (!preg_match('/^[0-9.,]+$/', $mult)) return;
		$mult = str_replace(',', '.', $mult);
		$rows = $this->isProductOption($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['price'])) break;
			$f = 0;
			if ($rows[$i]['option_value_id'] == $option_value_id) {
				$rows[$i]['price'] = $rows[$i]['price'] * $mult;
				$f = 1;
				break;
			}	
		}
		if ($f) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $rows[$i]['price'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
			
			$table = DB_PREFIX . "product_option_value";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname)) {		
				$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $rows[$i]['price'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
			}
		}	
	}
	
	public function MultOption($product_id, $mult) {
		if (empty($mult) or !preg_match('/^[0-9.,]+$/', $mult)) return;
		$mult = str_replace(',', '.', $mult);
		$rows = $this->isProductOption($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['price'])) break;
			$a = $rows[$i]['price'];
			$rows[$i]['price'] = $rows[$i]['price']*$mult;			
			if ($rows[$i]['price_prefix'] == '-') {
				$rows[$i]['price'] = $rows[$i]['price']-2*$a;
				if ($rows[$i]['price'] > 0) $rows[$i]['price_prefix'] = '+';
			}			
			$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $rows[$i]['price'] . "',  `price_prefix` = '" . $rows[$i]['price_prefix'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
			
			$table = DB_PREFIX . "product_option_value";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname)) {		
				$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $rows[$i]['price'] . "' WHERE product_option_value_id = '" . $rows[$i]['product_option_value_id']. "'");
			}
		}
		$rows = $this->getAllGroups($product_id);
		if (empty($rows)) return;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['price'])) break;
			$rows[$i]['price'] = $rows[$i]['price']*$mult;
			
			$this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `price` = '" . $rows[$i]['price'] . "' WHERE relatedoptions_id = '" . $rows[$i]['relatedoptions_id']. "'");
		}	
	}
	
	public function Design($product_id, $num, $store) {
		if (!$num) return;
		$rows = $this->getLayout($product_id, $store);
		if (empty($rows)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_layout SET layout_id = '" . $num . "', product_id  = '" . $product_id. "', store_id = '" . $store . "'");
		} else {
			$this->db->query("UPDATE " . DB_PREFIX . "product_to_layout SET layout_id = '" . $num . "' WHERE product_id = '" . $product_id. "' AND store_id = '" . $store . "'");
			
		}
	}
	
	public function deleteExtraPhotos($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . $product_id . "'");
	}	
	
	public function offNoPhoto($row) {		
		$path = "../image/" . $row['image'];	
		if (!empty($row['image']) and file_exists($path)) return;
		$row['status'] = 0;
		$this->upProduct($row);
	}
	
	public function deletePhotoIfProductGone($row) {
		if ($row['status']) return;
		$product_id = $row['product_id'];
		$path = "../image/" . $row['image'];	
		if (file_exists($path)) @unlink ($path);
		$path = "../image/cache/" . $row['image'];
		$pos = strrpos($path, "/");		
		$path = substr($path, 0, $pos+1);

		if (is_dir($path)) {
			if ($dh = opendir($path)) {
				while (($file = readdir($dh)) !== false) {
					$path_del = $path . $file;
					if (file_exists($path_del) and substr_count($path_del, ".jpg"))	@unlink ($path);				
				}
				closedir($dh);
			}
		}
		$rows = $this->getProductImage($product_id);
		if (!empty ($rows)) {	
			foreach ($rows as $p) {
				$path = "../image/" . $p['image'];				
				if (file_exists($path)) @unlink ($path);
			}
		}		
	}
	
	public function choicePhoto($c, $store) {
		$image = '';
		$r = array();
		$rows = array();
		for ($i=7; $i>=0; $i--) {	
			if (!$c[$i]) continue;	
			$rows = $this->get100products($c[$i], $store);
			if (empty($rows)) continue;
			$count = count($rows);
	
			for ($k=0; $k<6; $k++) {
				if ($count < 30 ) {
				$best = rand(0, $count-1);
					$r[$best]['product_id'] = $rows[$best]['product_id'];
				} else {			
					for ($l=0; $l<10; $l++) {
						$v = rand(0, $count-1);				
						$r[$l]['product_id'] = $rows[$v]['product_id'];			
					}
					$best = -1;
					for ($l=0; $l<10; $l++) {
						$rows = $this->getProductsByID($r[$l]['product_id']);	
						if (!empty($rows) and !empty($rows[0]['image'])) {
							$ffoto = "../image/" . $rows[0]['image'];
							if (file_exists($ffoto) and @getimagesize($ffoto)) {
								$best = $l;
								$size = @getimagesize($ffoto);							
								$dpi = @filesize($ffoto)/$size[0]/$size[1];
								$dpi = round($dpi, 2);
								$vol = $size[0];
								if ($vol < $size[1]) $vol = $size[1];	
								if ($vol and $dpi) break;	
							}	
						}		
					}
		
					if ($best == -1) continue;
			
					for ($l=0; $l<10; $l++) {
						$rows = $this->getProductsByID($r[$l]['product_id']);
						if (!empty($rows) and !empty($rows[0]['image'])) {
							$ffoto = "../image/" . $rows[0]['image'];
							if (file_exists($ffoto) and @getimagesize($ffoto)) {
								$size = @getimagesize($ffoto);							
								$dpi1 = @filesize($ffoto)/$size[0]/$size[1];
								$dpi1 = round($dpi1, 2);
								$vol1 = $size[0];
								if ($vol1 < $size[1]) $vol1 = $size[1];	
								$rn = $vol1/$vol + sqrt($dpi1/$dpi);
								$ro = $vol/$vol1 + sqrt($dpi/$dpi1);
								if ($rn > $ro) {
									$best = $l;
									$dpi = $dpi1;
									$vol = $vol1;
								}	
							}
						}	
					}
				}
				$rows = $this->getProductsByID($r[$best]['product_id']);	
				$p = strpos($rows[0]['image'], "/");
				$o = strrpos($rows[0]['image'], "/");
				if ($p) {
					$cc = substr($rows[0]['image'], 0, $p);
					$aa = substr($rows[0]['image'], $o+1);
					$old_path = "../image/" . $rows[0]['image'];
					$new_path = "../image/" . $cc . "/" . "category/" . $aa;
					if (@copy($old_path, $new_path)) $image = $cc . "/" . "category/" . $aa;
				}							
				if ($p or $k > 4) return $image;
			}			
		}		
	}
	
	public function deleteProductWithPhoto($row) {
		$product_id = $row['product_id'];
		$path = "../image/" . $row['image'];	
		if (file_exists($path)) @unlink ($path);
		/* $path = "../image/cache/" . $row['image']; // clear Cache
		$pos = strrpos($path, "/");		
		$path = substr($path, 0, $pos+1);

		if (is_dir($path)) {
			if ($dh = opendir($path)) {
				while (($file = readdir($dh)) !== false) {
					$path_del = $path . $file;
					if (file_exists($path_del) and substr_count($path_del, ".jpg"))	@unlink ($path);				
				}
				closedir($dh);
			}
		} */
		$rows = $this->getProductImage($product_id);
		if (!empty ($rows)) {	
			foreach ($rows as $p) {
				$path = "../image/" . $p['image'];				
				if (file_exists($path)) @unlink ($path);
			}
		}
		$this->deleteProduct($product_id);
	}
	
	public function onlyMain($store, $row) {
		$product_id = $row['product_id'];
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
					$child = $rows[$j]['category_id'];
					break;
				}
				if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];				
			}
			$rows = $this->getCategoryStore($child, $store);
			if (!empty($rows)) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "'");
		
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" . $product_id . "', `category_id` = '" . $child . "', `main_category` = 1");

				$this->cache->delete('product');
			}
		}
	}
	
	public function setMainCategory($product_id) {		
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;				
				if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];				
			}
			if (!isset($rows[0]['main_category'])) return;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				$main_category = 0;
				if ($child == $rows[$j]['category_id']) $main_category = 1;
				$this->db->query("UPDATE " . DB_PREFIX . "product_to_category SET `main_category` = '" . $main_category . "' WHERE `category_id` = '". $rows[$j]['category_id'] . "' and `product_id` = '" . $product_id . "'");
			}
		}	
	}	
	
	public function MainAndParents($store, $row) {
		$product_id = $row['product_id'];
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
					$child = $rows[$j]['category_id'];
					break;
				}
				if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];				
			}
			$rows = $this->getCategoryStore($child, $store);
			if (!empty($rows)) {
				while (1) {
					$rows  = $this->getCategory($child);
					if (empty($rows))  break;
					$parent_id = $rows[0]['parent_id'];
					if ($parent_id) {
						$rows  = $this->isCategoryOfProduct($product_id, $parent_id);
						if (empty($rows)) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" . $product_id. "', `category_id` = '" . $parent_id . "', `main_category` = 0");
						}								
					}
					$child = $parent_id ;	
				}
			}
		}
		$this->cache->delete('product');
	}
	
	public function FixURLCategory($seo_data, $store) {		
		$row = $this->getMaxCategoryID();
		$max = $row['max(category_id)'];
		for ($i=1; $i<=$max; $i++) {			
			$rows = $this->getCategoryName($i);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			
			$seo_url = $this->TransLit($name);
			$seo_url = $this->MetaURL($seo_url);
			$seo_url = strtolower($seo_url);
			
			$rows1 = $this->chURL($seo_url);
			if (!empty($rows1)) $seo_url = $seo_url . '-' . $i;
			
			$row = $this->getURLcategory($i);
			if (empty($row)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'category_id=" . $i . "', keyword = '" . $this->db->escape($seo_url) . "'");
			} else {		
				$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($seo_url) . "' WHERE `query` = 'category_id=" . $i . "'");				
			}
		}	
	}
	
	public function copyToParent($store, $row) {
		$product_id = $row['product_id'];
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
					$child = $rows[$j]['category_id'];
					break;
				}
				if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];				
			}
			$rows = $this->getCategoryStore($child, $store);
			if (!empty($rows)) {
				$parent = $rows[0]['parent_id'];
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . $product_id . "'");
				
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" . $product_id . "', `category_id` = '" . $child . "', `main_category` = 1");

				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET `product_id` = '" . $product_id . "', `category_id` = '" . $parent . "', `main_category` = 0");
			}	
		}
		$this->cache->delete('product');
	}
	
	public function FillDescManufacturer($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxManufacturerID();
		$max = $row['max(manufacturer_id)'];
		for ($i=1; $i<=$max; $i++) {					
			$rows = $this->getManufacturerStore($i, $store);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$rows = $this->getManufacturerDesc($i, $lang);
			if (empty($rows)) continue;	
			$desc = $rows[0]['description'];
			$seo = array();
			$this->seoManufacturer($store, $name, $seo_data, $seo);
			$seo['manuf_desc'] = $this->clearSEO($seo['manuf_desc']);
			
			if (!empty($seo['manuf_desc']) and empty($desc)) {
				$this->db->query("UPDATE " . DB_PREFIX . "manufacturer_description SET `description` = '" . $this->db->escape($seo['manuf_desc']) . "' WHERE `manufacturer_id` = '". $i . "' and `language_id` = '" . $lang . "'");
			}
		}	
	}
	
	public function FixDescManufacturer($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxManufacturerID();
		$max = $row['max(manufacturer_id)'];
		for ($i=1; $i<=$max; $i++) {					
			$rows = $this->getManufacturerStore($i, $store);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoManufacturer($store, $name, $seo_data, $seo);
			$seo['manuf_desc'] = $this->clearSEO($seo['manuf_desc']);
			
			if (!empty($seo['manuf_desc'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "manufacturer_description SET `description` = '" . $this->db->escape($seo['manuf_desc']) . "' WHERE `manufacturer_id` = '". $i . "' and `language_id` = '" . $lang . "'");
			}
		}	
	}
	
	public function FillDescCategory($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxCategoryID();
		$max = $row['max(category_id)'];
		for ($i=1; $i<=$max; $i++) {			
			$rows = $this->getCategoryName($i);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$desc = $rows[0]['description'];
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);
			$seo['cat_desc'] = $this->clearSEO($seo['cat_desc']);
			
			if (!empty($seo['cat_desc']) and empty($desc)) {
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `description` = '" . $this->db->escape($seo['cat_desc']) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");
			}
		}	
	}	
	
	public function FixDescCategory($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxCategoryID();
		$max = $row['max(category_id)'];
		for ($i=1; $i<=$max; $i++) {			
			$rows = $this->getCategoryName($i);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);
			$seo['cat_desc'] = $this->clearSEO($seo['cat_desc']);
			
			if (!empty($seo['cat_desc'])) {
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `description` = '" . $this->db->escape($seo['cat_desc']) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");
			}
		}	
	}	
	
	public function FillMetaCategory($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxCategoryID();
		$max = $row['max(category_id)'];
		for ($i=1; $i<=$max; $i++) {			
			$rows = $this->getCategoryName($i);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);			
			$seo['cat_meta_desc'] = $this->clearSEO($seo['cat_meta_desc']);
			$seo['cat_title'] = $this->clearSEO($seo['cat_title']);
		
			$seo_keyword = '';
			
			if (!empty($name)) {
				if (empty($rows[0]['seo_h1']))
					$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `seo_h1` = '" . $this->db->escape($name) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");
				
				if (empty($rows[0]['meta_description']))
					$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `meta_description` = '" . $this->db->escape($seo['cat_meta_desc']) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");
				
				if (empty($rows[0]['seo_title']))
					$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `seo_title` = '" . $this->db->escape($seo['cat_title']) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");								
			}	
		}		
	}
	
	public function FixMetaCategory($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxCategoryID();
		$max = $row['max(category_id)'];
		for ($i=1; $i<=$max; $i++) {			
			$rows = $this->getCategoryName($i);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$name = str_replace('"', "&quot;", $name);
			$name = str_replace("'", "&#039;", $name);
			$seo = array();
			$this->seoCategory($store, $name, 0, $seo_data, $seo);			
			$seo['cat_meta_desc'] = $this->clearSEO($seo['cat_meta_desc']);
			$seo['cat_title'] = $this->clearSEO($seo['cat_title']);
		
			$seo_keyword = '';
			
			if (!empty($name)) {
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `name` = '" . $this->db->escape($name) . "', `meta_description` = '" . $this->db->escape($seo['cat_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['cat_title']) . "' WHERE `category_id` = '". $i . "' and `language_id` = '" . $lang . "'");					
			}	
		}		
	}
	
	public function uniqueCatManuf($store) {	
		$rows = $this->getAllManufacturerURL();
		if (empty($rows)) return;
	
		for ($i=0; $i<10000; $i++) {
			if (!isset($rows[$i]['query'])) break;	
			$rows1 = $this->chURLcategory($rows[$i]['keyword']);
			if (empty($rows1)) continue;
	
			for ($j=0; $j<10000; $j++) {
				if (!isset($rows1[$j]['query'])) break;
				$a = strpos($rows1[$j]['query'], '=');
				if (!$a) continue;
				$id = substr($rows1[$j]['query'], $a+1);	
				$keyword = $rows1[$j]['keyword'] . '-' . $id; 
				
				$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($keyword) . "' WHERE `url_alias_id` = '" . $rows1[$j]['url_alias_id'] . "'");
			}
		}	
	}	
	
	public function FixURLManufacturer($seo_data, $store) {
		$row = $this->getMaxManufacturerID();
		$max = $row['max(manufacturer_id)'];
		for ($i=1; $i<=$max; $i++) {					
			$rows = $this->getManufacturerStore($i, $store);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			
			$seo_url = $this->TransLit($name);
			$seo_url = $this->MetaURL($seo_url);
			$seo_url = strtolower($seo_url);
			
			$rows1 = $this->chURL($seo_url);
			if (!empty($rows1)) $seo_url = $seo_url . '-' . $i;
			
			$row = $this->getURLmanufacturer($i);
			if (empty($row)) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'manufacturer_id=" . $i . "', keyword = '" . $this->db->escape($seo_url) . "'");
			} else {		
				$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($seo_url) . "' WHERE `query` = 'manufacturer_id=" . $i . "'");
			}
		}	
	}
	
	public function FixMetaManufacturer($seo_data, $store) {
		$lang = $this->config->get('config_language_id');
		$row = $this->getMaxManufacturerID();
		$max = $row['max(manufacturer_id)'];
		for ($i=1; $i<=$max; $i++) {					
			$rows = $this->getManufacturerStore($i, $store);
			if (empty($rows)) continue;
			$name = '';
			if (isset($rows[0]['name'])) $name = $rows[0]['name'];
			$seo = array();
			$this->seoManufacturer($store, $name, $seo_data, $seo);
			$seo['manuf_title'] = $this->clearSEO($seo['manuf_title']);
			$seo['manuf_meta_desc'] = $this->clearSEO($seo['manuf_meta_desc']);
			
			$seo_keyword = '';			

			$this->db->query("UPDATE " . DB_PREFIX . "manufacturer_description SET `meta_description` = '" . $this->db->escape($seo['manuf_meta_desc']) . "', `meta_keyword` = '" . $this->db->escape($seo_keyword) . "', `seo_h1` = '" . $this->db->escape($name) . "', `seo_title` = '" . $this->db->escape($seo['manuf_title']) . "' WHERE `manufacturer_id` = '". $i . "' and `language_id` = '" . $lang . "'");			
		}
	}
	
	public function percentWhole($row, $per, $gr) {
		$pr = $row['price'];
		$pr = $pr - $pr*$per/100;
		$pr = round($pr, 0);
		$date_start = "2000-01-01";
		$date_end = "2040-01-01";
		$row1 = $this->getCustomerGroup($gr);
		if (empty($row1)) return;
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE `product_id` = '" . $row['product_id'] . "' and `customer_group_id` = '" . $gr . "'");
		$table = DB_PREFIX . "product_discount";
		$tname = "base_price";
		if (!$this->getColumnName($table, $tname)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `quantity` = '" . 1 . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `quantity` = '" . 1 . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `base_price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		}	
	}
	
	public function setDateEndDiscount($product_id, $date) {
		if (!$date) return;
		if (substr_count($date, "-") != 2 or strlen($date) != 10 or strpos($date, "-") != 4) return;
		$this->db->query("UPDATE " . DB_PREFIX . "product_discount SET `date_end` = '" . $date . "' WHERE `product_id` = '". $product_id . "'");
	}	
	
	public function setDateEndSpecial($product_id, $date) {
		if (!$date) return;
		if (substr_count($date, "-") != 2 or strlen($date) != 10 or strpos($date, "-") != 4) return;
		$this->db->query("UPDATE " . DB_PREFIX . "product_special SET `date_end` = '" . $date . "' WHERE `product_id` = '". $product_id . "'");
	}
	
	public function delFictAction($row) {
		$rows = $this->getActionAll($row['product_id']);
		if (empty($rows)) return;
		$pr = 0;
		for ($i=0; $i<900; $i++) {
			if (!isset($rows[$i]['price'])) break;
			if ($rows[$i]['date_end'] == "2040-01-02") {
				$row['price'] = $rows[$i]['price'];
				$pr = 1;
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_special_id = '" . $rows[$i]['product_special_id'] . "'");
			}			
		}
		if ($pr) $this->upProduct($row);
	}	
	
	public function fictAction($row, $per, $gr) {
		if (!$per or !$gr) return;
		$row1 = $this->getCustomerGroup($gr);
		if (empty($row1)) return;
		$pr = $row['price'];
		$row['price'] = $row['price'] + $row['price']*$per/100;
		$row['price'] = round($row['price'], 2);
		$this->upProduct($row);
		$date_start = "2000-01-01";
		$date_end = "2040-01-02";		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE `product_id` = '" . $row['product_id'] . "' and `customer_group_id` = '" . $gr . "'");
		$table = DB_PREFIX . "product_special";
		$tname = "base_price";
		if (!$this->getColumnName($table, $tname)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `base_price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		}
	}
	
	public function percentAction($row, $per, $gr) {		
		$pr = $row['price'];
		$pr = $pr - $pr*$per/100;
		$pr = round($pr, 0);
		$date_start = "2000-01-01";
		$date_end = "2040-01-01";
		$row1 = $this->getCustomerGroup($gr);
		if (empty($row1)) return;
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE `product_id` = '" . $row['product_id'] . "' and `customer_group_id` = '" . $gr . "'");
		$table = DB_PREFIX . "product_special";
		$tname = "base_price";
		if (!$this->getColumnName($table, $tname)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		} else {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET `product_id` ='" .$row['product_id']."', `customer_group_id` = '" . $gr . "', `priority` = '" . 1 . "', `price` = '" . $pr . "', `base_price` = '" . $pr . "', `date_start` = '" . $date_start . "', `date_end` = '" . $date_end . "'");
		}	
	}
	
	public function tax($product_id, $class) {
		if ($class == '') return;
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `tax_class_id` = '" . (int)$class . "' WHERE `product_id` = '" . $product_id . "'");
	}
	
	public function weight($product_id, $weight) {
		if ($weight == '') return;
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `weight` = '" . (int)$weight . "' WHERE `product_id` = '" . $product_id . "'");
	}
	
	public function fillDescProduct($store, $row, $seo_data) {
		$lang = $this->config->get('config_language_id');
		$product_id = $row['product_id'];		
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;		
		$desc = $rows[0]['description'];		
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);
		$seo['prod_desc'] = $this->clearSEO($seo['prod_desc']);
		
		if (!empty($seo['prod_desc']) and empty($desc)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($seo['prod_desc']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}	
	}
	
	public function fixDescProduct($store, $row, $seo_data) {
		$lang = $this->config->get('config_language_id');
		$product_id = $row['product_id'];		
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);
		$seo['prod_desc'] = $this->clearSEO($seo['prod_desc']);
		
		if (!empty($seo['prod_desc'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($seo['prod_desc']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}	
	}
	
	public function clearMetaProduct($store, $product_id) {
		$lang = $this->config->get('config_language_id');		
		$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '', `seo_title` = '', `meta_description` = '', `meta_keyword` =  '' WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
	}
	
	public function addtoName($product_id, $add) {
		if ($add == '') return;
		$lang = $this->config->get('config_language_id');		
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$name = $rows[0]['name'] . $add;
		$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = '" . $name . "' WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
	}	

	public function copyH1toName($product_id) {
		$lang = $this->config->get('config_language_id');		
		$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = `seo_h1` WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
	}
	
	public function fillMetaProduct($store, $row, $seo_data) {
		$lang = $this->config->get('config_language_id');
		$product_id = $row['product_id'];		
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$name = $rows[0]['name'];
		$h1 = $rows[0]['seo_h1'];
		$meta_desc = $rows[0]['meta_description'];
		$title = $rows[0]['seo_title'];
		$keyword = $rows[0]['meta_keyword'];
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);
		if (empty($seo['prod_h1'])) $seo['prod_h1'] = $name;
		$seo['prod_h1'] = $this->clearSEO($seo['prod_h1']);
		$seo['prod_title'] = $this->clearSEO($seo['prod_title']);
		$seo['prod_meta_desc'] = $this->clearSEO($seo['prod_meta_desc']);
		$seo['prod_keyword'] = $this->clearSEO($seo['prod_keyword']);
				
		if (!empty($seo['prod_h1']) and empty($h1)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($seo['prod_h1']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
		}
		
		if (!empty($seo['prod_title']) and empty($title)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($seo['prod_title']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}
		
		if (!empty($seo['prod_meta_desc']) and empty($meta_desc)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($seo['prod_meta_desc']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}

		if (!empty($seo['prod_keyword']) and empty($keyword)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($seo['prod_keyword']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
		}
	}
	
	public function fillURL($row, $seo_data, $store) {		
		$row1 = $this->getURL($row['product_id']);		
		if (!isset($row1['keyword']) or empty($row1['keyword'])) $this->FixProductURL($row, $seo_data, $store);		
	}
	
	public function copyModel($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `sku` = '" . $this->db->escape($row['model']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copySKUModel($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `model` = '" . $this->db->escape($row['sku']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}

	public function copySku_Loc($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `location` = '" . $this->db->escape($row['sku']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyLoc_Sku($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `sku` = '" . $this->db->escape($row['location']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyModel_Loc($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `location` = '" . $this->db->escape($row['model']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyUpc_Loc($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `location` = '" . $this->db->escape($row['upc']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyLoc_Upc($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `upc` = '" . $this->db->escape($row['location']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyMpn_Loc($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `location` = '" . $this->db->escape($row['mpn']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyLoc_Mpn($row) {
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `mpn` = '" . $this->db->escape($row['location']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyUpc_Sku($row) {	
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `sku` = '" . $this->db->escape($row['upc']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyEan_Loc($row) {	
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `location` = '" . $this->db->escape($row['ean']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyEan_Sku($row) {	
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `sku` = '" . $this->db->escape($row['ean']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyLoc_Ean($row) {	
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `ean` = '" . $this->db->escape($row['location']) . "' WHERE `product_id` = '" . $row['product_id']. "'");
	}
	
	public function copyAttr_UPC($product_id, $attribute_id) {		
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `upc` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");
	}
	
	public function copyAttr_MPN($product_id, $attribute_id) {			
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `mpn` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_Weight($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
			if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `weight` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_Height($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `height` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_Width($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');	
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `width` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_Length($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
			if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `length` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_Price($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');	
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `price` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}		
	
	public function copyAttr_JAN($product_id, $attribute_id) {		
		$lang = $this->config->get('config_language_id');	
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `jan` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}
	
	public function copyAttr_SKU($product_id, $attribute_id) {	
		$lang = $this->config->get('config_language_id');
		$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
		if (empty($rows)) return;	
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `sku` = '" . $this->db->escape($rows[0]['text']). "' WHERE `product_id` = '" . $product_id . "'");	
	}	
	
	public function copyWeightAttribute($row, $attribute_id) {
		if (!$row['weight']) return;
		$lang = $this->config->get('config_language_id');
		$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $row['weight']. "' WHERE `product_id` = '" . $row['product_id'] . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang . "'");
	}			
				
	public function copyHeightAttribute($row, $attribute_id) {
		if (!$row['height']) return;
		$lang = $this->config->get('config_language_id');
		$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $row['height']. "' WHERE `product_id` = '" . $row['product_id'] . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang . "'");
	}			
				
	public function copyWidthAttribute($row, $attribute_id) {
		if (!$row['width']) return;
		$lang = $this->config->get('config_language_id');
		$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $row['width']. "' WHERE `product_id` = '" . $row['product_id'] . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang . "'");
	}			
	
	public function copyLengthAttribute($row, $attribute_id) {
		if (!$row['length']) return;
		$lang = $this->config->get('config_language_id');
		$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $row['length']. "' WHERE `product_id` = '" . $row['product_id'] . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang . "'");
	}
	
	public function getValue($product_id, $n, $lang) {		
		$name = substr($n, 1, strlen($n)-2);
		if (empty($name)) return '';
		if (substr_count($name, '{')) $name = substr($name, 1, strlen($name)-2);
		if (empty($name)) return '';
		$rows = $this->getAttributeID($name);
		if (!empty($rows)) {
			$rows = $this->getAttributeById($product_id, $rows[0]['attribute_id'], $lang);
			if (!empty($rows)) return $rows[0]['text'];
		}
		$rows = $this->getOptionID($name);		
		if (!empty($rows)) {
			$option_id = $rows[0]['option_id'];	
			$rows = $this->getProdOptions($product_id, $rows[0]['option_id']);	
			if (!empty($rows)) {
				$v = '';
				$i = 0;
				$ovid = 0;
				foreach ($rows as $r) {	
					$i++;
					$option_value_id = $r['option_value_id'];
					if ($ovid == $option_value_id) continue;
					$rows = $this->getOptionsOfProduct($option_id, $option_value_id, $lang);
					if (!empty($rows)) {
						if ($i == 1) $v = $rows[0]['name'];
						else $v = $v . ', ' . $rows[0]['name'];
						$ovid = $option_value_id;
					}	
				}	
				return $v;
			}
		}		
	}
	
	public function seoManufacturer($store, $manufacturer, $seo_data, &$seo) {
		if (empty($manufacturer)) return;
		$description = '';
		$table = DB_PREFIX . "manufacturer_description";
		$tname = "description";
		if ($this->getColumnName($table, $tname)) {			
			$lang = $this->config->get('config_language_id');
			$rows = $this->getManufacturerDesc($manufacturer, $lang);
			if (!empty($rows)) $description = $rows[0]['description'];
		}
		$seo['manuf_title'] = $seo_data['manuf_title'];
		$seo['manuf_meta_desc'] = $seo_data['manuf_meta_desc'];
		$seo['manuf_desc'] = $seo_data['manuf_desc'];
		
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {			
			$seo['manuf_title'] = str_replace('[m]', $manufacturer, $seo['manuf_title']);
			$seo['manuf_meta_desc'] = str_replace('[m]', $manufacturer, $seo['manuf_meta_desc']);
			$seo['manuf_desc'] = str_replace('[m]', $manufacturer, $seo['manuf_desc']);
			
			if (!empty($description) and $i == $kk-1 and substr_count($seo['manuf_desc'],"[d]")) {				
				$b = str_replace('[d]', '', $seo['manuf_desc']);
				$b = strip_tags($b);
				$a = strip_tags($description);
				$b = trim($b);
				$a = trim($a);
	
				if (!empty($a) and !empty($b) and !substr_count($a, $b)) $seo['manuf_desc'] = str_replace('[d]', $description, $seo['manuf_desc']);
				else $seo['manuf_desc'] = $description;
				
				$seo['manuf_desc'] = str_replace('[d]', '', $seo['manuf_desc']);	
			}
		}	
		
		$t1 = ''; $t2 = ''; $t3 = ''; $t4 = ''; $t5 = ''; $t6 = '';	$t7 = ''; $t8 = ''; $t9 = ''; $t10 = '';
		$t11 = ''; $t12 = ''; $t13 = ''; $t14 = ''; $t15 = ''; $t16 = ''; $t17 = ''; $t18 = ''; $t19 = ''; $t20 = '';
		$mm = explode("|", $seo_data['seo_1']);	
		if (!empty($mm)) $t1 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_2']);
		if (!empty($mm)) $t2 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_3']);
		if (!empty($mm)) $t3 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_4']);
		if (!empty($mm)) $t4 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_5']);
		if (!empty($mm)) $t5 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_6']);
		if (!empty($mm)) $t6 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_7']);
		if (!empty($mm)) $t7 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_8']);
		if (!empty($mm)) $t8 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_9']);
		if (!empty($mm)) $t9 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_10']);
		if (!empty($mm)) $t10 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_11']);
		if (!empty($mm)) $t11 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_12']);
		if (!empty($mm)) $t12 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_13']);
		if (!empty($mm)) $t13 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_14']);
		if (!empty($mm)) $t14 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_15']);
		if (!empty($mm)) $t15 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_16']);
		if (!empty($mm)) $t16 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_17']);
		if (!empty($mm)) $t17 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_18']);
		if (!empty($mm)) $t18 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_19']);
		if (!empty($mm)) $t19 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_20']);
		if (!empty($mm)) $t20 = $mm[rand(0, count($mm)-1)];
		
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {	
			if (!empty($t1)) {
				$t1 = str_replace('[m]', $manufacturer, $t1);				
				$seo['manuf_title'] = str_replace('[1]', $t1, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[1]', $t1, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[1]', $t1, $seo['manuf_desc']);
			}	
			if (!empty($t2)) {
				$t2 = str_replace('[m]', $manufacturer, $t2);
				$seo['manuf_title'] = str_replace('[2]', $t2, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[2]', $t2, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[2]', $t2, $seo['manuf_desc']);
			}
			if (!empty($t3)) {
				$t3 = str_replace('[m]', $manufacturer, $t3);
				$seo['manuf_title'] = str_replace('[3]', $t3, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[3]', $t3, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[3]', $t3, $seo['manuf_desc']);
			}
			if (!empty($t4)) {
				$t4 = str_replace('[m]', $manufacturer, $t4);
				$seo['manuf_title'] = str_replace('[4]', $t4, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[4]', $t4, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[4]', $t4, $seo['manuf_desc']);
			}
			if (!empty($t5)) {	
				$t5 = str_replace('[m]', $manufacturer, $t5);
				$seo['manuf_title'] = str_replace('[5]', $t5, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[5]', $t5, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[5]', $t5, $seo['manuf_desc']);
			}
			if (!empty($t6)) {
				$t6 = str_replace('[m]', $manufacturer, $t6);
				$seo['manuf_title'] = str_replace('[6]', $t6, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[6]', $t6, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[6]', $t6, $seo['manuf_desc']);
			}
			if (!empty($t7)) {
				$t7 = str_replace('[m]', $manufacturer, $t7);
				$seo['manuf_title'] = str_replace('[7]', $t7, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[7]', $t7, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[7]', $t7, $seo['manuf_desc']);
			}
			if (!empty($t8)) {
				$t8 = str_replace('[m]', $manufacturer, $t8);
				$seo['manuf_title'] = str_replace('[8]', $t8, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[8]', $t8, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[8]', $t8, $seo['manuf_desc']);
			}
			if (!empty($t9)) {
				$t9 = str_replace('[m]', $manufacturer, $t9);
				$seo['manuf_title'] = str_replace('[9]', $t9, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[9]', $t9, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[9]', $t9, $seo['manuf_desc']);
			}
			if (!empty($t10)) {
				$t10 = str_replace('[m]', $manufacturer, $t10);
				$seo['manuf_title'] = str_replace('[10]', $t10, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[10]', $t10, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[10]', $t10, $seo['manuf_desc']);
			}
			if (!empty($t11)) {
				$t11 = str_replace('[m]', $manufacturer, $t11);
				$seo['manuf_title'] = str_replace('[11]', $t11, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[11]', $t11, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[11]', $t11, $seo['manuf_desc']);
			}
			if (!empty($t12)) {
				$t12 = str_replace('[m]', $manufacturer, $t12);
				$seo['manuf_title'] = str_replace('[12]', $t12, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[12]', $t12, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[12]', $t12, $seo['manuf_desc']);
			}
			if (!empty($t13)) {	
				$t13 = str_replace('[m]', $manufacturer, $t13);
				$seo['manuf_title'] = str_replace('[13]', $t13, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[13]', $t13, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[13]', $t13, $seo['manuf_desc']);
			}
			if (!empty($t14)) {
				$t14 = str_replace('[m]', $manufacturer, $t14);
				$seo['manuf_title'] = str_replace('[14]', $t14, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[14]', $t14, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[14]', $t14, $seo['manuf_desc']);
			}
			if (!empty($t15)) {
				$t15 = str_replace('[m]', $manufacturer, $t15);
				$seo['manuf_title'] = str_replace('[15]', $t15, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[15]', $t15, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[15]', $t15, $seo['manuf_desc']);
			}
			if (!empty($t16)) {
				$t16 = str_replace('[m]', $manufacturer, $t16);
				$seo['manuf_title'] = str_replace('[16]', $t16, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[16]', $t16, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[16]', $t16, $seo['manuf_desc']);
			}
			if (!empty($t17)) {	
				$t17 = str_replace('[m]', $manufacturer, $t17);
				$seo['manuf_title'] = str_replace('[17]', $t17, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[17]', $t17, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[17]', $t17, $seo['manuf_desc']);
			}
			if (!empty($t18)) {	
				$t18 = str_replace('[m]', $manufacturer, $t18);
				$seo['manuf_title'] = str_replace('[18]', $t18, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[18]', $t18, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[18]', $t18, $seo['manuf_desc']);
			}
			if (!empty($t19)) {
				$t19 = str_replace('[m]', $manufacturer, $t19);
				$seo['manuf_title'] = str_replace('[19]', $t19, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[19]', $t19, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[19]', $t19, $seo['manuf_desc']);
			}
			if (!empty($t20)) {
				$t20 = str_replace('[m]', $manufacturer, $t20);
				$seo['manuf_title'] = str_replace('[20]', $t20, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[20]', $t20, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[20]', $t20, $seo['manuf_desc']);
			}			
		}
		$br = 1;
		for ($i=0; $i<200; $i++) {
			if (!$br) break;
			$br = 0;
			$pb = strpos($seo['manuf_title'], "[");	
			$pe = strpos($seo['manuf_title'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_title'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_title'] = str_replace($n, $text, $seo['manuf_title']);			
				}
			}	
			$pb = strpos($seo['manuf_meta_desc'], "[");	
			$pe = strpos($seo['manuf_meta_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_meta_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_meta_desc'] = str_replace($n, $text, $seo['manuf_meta_desc']);			
				}
			}	
			$pb = strpos($seo['manuf_desc'], "[");	
			$pe = strpos($seo['manuf_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_desc'] = str_replace($n, $text, $seo['manuf_desc']);			
				}
			}	
		}	
	}
	
	public function seoCategory($store, $category_name, $parent_id, $seo_data, &$seo) {
		if (empty($category_name)) return;		
		$pcategory = '';
		$category_id = 0;
		$description = '';
		$seo['cat_title'] = $seo_data['cat_title'];
		$seo['cat_meta_desc'] = $seo_data['cat_meta_desc'];
		$seo['cat_desc'] = $seo_data['cat_desc'];
		
		$rows = $this->getCategoryIDbyName($category_name, $store);
		if (!empty($rows)) $description = $rows[0]['description'];
		
		if (empty($parent_id) and !empty($rows)) {
			$category_id = $rows[0]['category_id'];
				
			$rows = $this->getCategoryStore($category_id, $store);
			if (!empty($rows)) $parent_id = $rows[0]['parent_id'];		
		}
		$rows = $this->getCategoryName($parent_id);
		if (!empty($rows)) $pcategory = $rows[0]['name'];
		
		$category = $category_name;	
		 
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {			
			$seo['cat_title'] = str_replace('[c]', $category, $seo['cat_title']);			
			$seo['cat_meta_desc'] = str_replace('[c]', $category, $seo['cat_meta_desc']);
			$seo['cat_desc'] = str_replace('[c]', $category, $seo['cat_desc']);
			
			$seo['cat_title'] = str_replace('[pc]', $pcategory, $seo['cat_title']);			
			$seo['cat_meta_desc'] = str_replace('[pc]', $pcategory, $seo['cat_meta_desc']);
			$seo['cat_desc'] = str_replace('[pc]', $pcategory, $seo['cat_desc']);

			if (!empty($description) and $i == $kk-1 and substr_count($seo['cat_desc'],"[d]")) {				
				$b = str_replace('[d]', '', $seo['cat_desc']);
				$b = strip_tags($b);
				$a = strip_tags($description);
				$b = trim($b);
				$a = trim($a);
	
				if (!empty($a) and !empty($b) and !substr_count($a, $b)) $seo['cat_desc'] = str_replace('[d]', $description, $seo['cat_desc']);
				else $seo['cat_desc'] = $description;
				
				$seo['cat_desc'] = str_replace('[d]', '', $seo['cat_desc']);	
			}
		}
		
		$t1 = ''; $t2 = ''; $t3 = ''; $t4 = ''; $t5 = ''; $t6 = '';	$t7 = ''; $t8 = ''; $t9 = ''; $t10 = '';
		$t11 = ''; $t12 = ''; $t13 = ''; $t14 = ''; $t15 = ''; $t16 = ''; $t17 = ''; $t18 = ''; $t19 = ''; $t20 = '';
		$mm = explode("|", $seo_data['seo_1']);	
		if (!empty($mm)) $t1 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_2']);
		if (!empty($mm)) $t2 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_3']);
		if (!empty($mm)) $t3 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_4']);
		if (!empty($mm)) $t4 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_5']);
		if (!empty($mm)) $t5 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_6']);
		if (!empty($mm)) $t6 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_7']);
		if (!empty($mm)) $t7 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_8']);
		if (!empty($mm)) $t8 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_9']);
		if (!empty($mm)) $t9 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_10']);
		if (!empty($mm)) $t10 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_11']);
		if (!empty($mm)) $t11 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_12']);
		if (!empty($mm)) $t12 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_13']);
		if (!empty($mm)) $t13 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_14']);
		if (!empty($mm)) $t14 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_15']);
		if (!empty($mm)) $t15 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_16']);
		if (!empty($mm)) $t16 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_17']);
		if (!empty($mm)) $t17 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_18']);
		if (!empty($mm)) $t18 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_19']);
		if (!empty($mm)) $t19 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_20']);
		if (!empty($mm)) $t20 = $mm[rand(0, count($mm)-1)];
		
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {	
			if (!empty($t1)) {
				$t1 = str_replace('[c]', $category, $t1);
				$t1 = str_replace('[pc]', $pcategory, $t1);	
				$seo['cat_title'] = str_replace('[1]', $t1, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[1]', $t1, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[1]', $t1, $seo['cat_desc']);				
			}	
			if (!empty($t2)) {				
				$t2 = str_replace('[c]', $category, $t2);
				$t2 = str_replace('[pc]', $pcategory, $t2);				
				$seo['cat_title'] = str_replace('[2]', $t2, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[2]', $t2, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[2]', $t2, $seo['cat_desc']);				
			}
			if (!empty($t3)) {
				$t3 = str_replace('[c]', $category, $t3);
				$t3 = str_replace('[pc]', $pcategory, $t3);	
				$seo['cat_title'] = str_replace('[3]', $t3, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[3]', $t3, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[3]', $t3, $seo['cat_desc']);				
			}
			if (!empty($t4)) {
				$t4 = str_replace('[c]', $category, $t4);
				$t4 = str_replace('[pc]', $pcategory, $t4);	
				$seo['cat_title'] = str_replace('[4]', $t4, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[4]', $t4, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[4]', $t4, $seo['cat_desc']);				
			}
			if (!empty($t5)) {
				$t5 = str_replace('[c]', $category, $t5);
				$t5 = str_replace('[pc]', $pcategory, $t5);	
				$seo['cat_title'] = str_replace('[5]', $t5, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[5]', $t5, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[5]', $t5, $seo['cat_desc']);				
			}
			if (!empty($t6)) {
				$t6 = str_replace('[c]', $category, $t6);
				$t6 = str_replace('[pc]', $pcategory, $t6);	
				$seo['cat_title'] = str_replace('[6]', $t6, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[6]', $t6, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[6]', $t6, $seo['cat_desc']);				
			}
			if (!empty($t7)) {
				$t7 = str_replace('[c]', $category, $t7);
				$t7 = str_replace('[pc]', $pcategory, $t7);	
				$seo['cat_title'] = str_replace('[7]', $t7, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[7]', $t7, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[7]', $t7, $seo['cat_desc']);				
			}
			if (!empty($t8)) {
				$t8 = str_replace('[c]', $category, $t8);
				$t8 = str_replace('[pc]', $pcategory, $t8);	
				$seo['cat_title'] = str_replace('[8]', $t8, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[8]', $t8, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[8]', $t8, $seo['cat_desc']);				
			}
			if (!empty($t9)) {
				$t9 = str_replace('[c]', $category, $t9);
				$t9 = str_replace('[pc]', $pcategory, $t9);	
				$seo['cat_title'] = str_replace('[9]', $t9, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[9]', $t9, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[9]', $t9, $seo['cat_desc']);				
			}
			if (!empty($t10)) {
				$t10 = str_replace('[c]', $category, $t10);
				$t10 = str_replace('[pc]', $pcategory, $t10);	
				$seo['cat_title'] = str_replace('[10]', $t10, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[10]', $t10, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[10]', $t10, $seo['cat_desc']);				
			}
			if (!empty($t11)) {	
				$t11 = str_replace('[c]', $category, $t11);
				$t11 = str_replace('[pc]', $pcategory, $t11);
				$seo['cat_title'] = str_replace('[11]', $t11, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[11]', $t11, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[11]', $t11, $seo['cat_desc']);				
			}
			if (!empty($t12)) {
				$t12 = str_replace('[c]', $category, $t12);
				$t12 = str_replace('[pc]', $pcategory, $t12);
				$seo['cat_title'] = str_replace('[12]', $t12, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[12]', $t12, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[12]', $t12, $seo['cat_desc']);				
			}
			if (!empty($t13)) {
				$t13 = str_replace('[c]', $category, $t13);
				$t13 = str_replace('[pc]', $pcategory, $t13);
				$seo['cat_title'] = str_replace('[13]', $t13, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[13]', $t13, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[13]', $t13, $seo['cat_desc']);				
			}
			if (!empty($t14)) {
				$t14 = str_replace('[c]', $category, $t14);
				$t14 = str_replace('[pc]', $pcategory, $t14);
				$seo['cat_title'] = str_replace('[14]', $t14, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[14]', $t14, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[14]', $t14, $seo['cat_desc']);				
			}
			if (!empty($t15)) {
				$t15 = str_replace('[c]', $category, $t15);
				$t15 = str_replace('[pc]', $pcategory, $t15);
				$seo['cat_title'] = str_replace('[15]', $t15, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[15]', $t15, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[15]', $t15, $seo['cat_desc']);				
			}
			if (!empty($t16)) {
				$t16 = str_replace('[c]', $category, $t16);
				$t16 = str_replace('[pc]', $pcategory, $t16);
				$seo['cat_title'] = str_replace('[16]', $t16, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[16]', $t16, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[16]', $t16, $seo['cat_desc']);				
			}
			if (!empty($t17)) {
				$t17 = str_replace('[c]', $category, $t17);
				$t17 = str_replace('[pc]', $pcategory, $t17);
				$seo['cat_title'] = str_replace('[17]', $t17, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[17]', $t17, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[17]', $t17, $seo['cat_desc']);				
			}
			if (!empty($t18)) {
				$t18 = str_replace('[c]', $category, $t18);
				$t18 = str_replace('[pc]', $pcategory, $t18);
				$seo['cat_title'] = str_replace('[18]', $t18, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[18]', $t18, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[18]', $t18, $seo['cat_desc']);				
			}
			if (!empty($t19)) {	
				$t19 = str_replace('[c]', $category, $t19);
				$t19 = str_replace('[pc]', $pcategory, $t19);
				$seo['cat_title'] = str_replace('[19]', $t19, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[19]', $t19, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[19]', $t19, $seo['cat_desc']);				
			}
			if (!empty($t20)) {	
				$t20 = str_replace('[c]', $category, $t20);
				$t20 = str_replace('[pc]', $pcategory, $t20);
				$seo['cat_title'] = str_replace('[20]', $t20, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[20]', $t20, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[20]', $t20, $seo['cat_desc']);				
			}			
		}	
		$br = 1;
		for ($i=0; $i<200; $i++) {
			if (!$br) break;
			$br = 0;
			$pb = strpos($seo['cat_title'], "[");	
			$pe = strpos($seo['cat_title'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_title'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_title'] = str_replace($n, $text, $seo['cat_title']);			
				}
			}	
			$pb = strpos($seo['cat_meta_desc'], "[");	
			$pe = strpos($seo['cat_meta_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_meta_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_meta_desc'] = str_replace($n, $text, $seo['cat_meta_desc']);			
				}
			}	
			$pb = strpos($seo['cat_desc'], "[");	
			$pe = strpos($seo['cat_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_desc'] = str_replace($n, $text, $seo['cat_desc']);			
				}
			}	
		}	
	}
	
	public function namePhoto($store, $data, $seo_photo) {
		$namephoto = '';
		if (empty($data)) return;
		if (empty($seo_photo)) return;
		$seo_photo = $this->getName($seo_photo);
		$lang = $this->config->get('config_language_id');		
		$name = $data['name'];
		$category = $data['category'];		
		$manufacturer = $data['manufacturer'];	
		$model = $data['model'];
		$brand = $data['brand'];
		$sku = $data['sku'];
		
		$sp = explode(',', $seo_photo);
		for ($i=0; $i<10; $i++) {
			if (!isset($sp[$i])) break;
			if (empty($sp[$i]) or !substr_count($sp[$i], '=')) continue;
			$fr = explode('=', $sp[$i]);			
			$pb = strpos($fr[0], "'");
		//	if ($pb === false) continue;
			$pe = strpos($fr[0], "'", $pb+1);
			if (!$pe) continue;
			$fr[0] = substr($fr[0], $pb+1, $pe-$pb-1);
			$pb = strpos($fr[1], "'");
			if ($pb === false) continue;
			$pe = strpos($fr[1], "'", $pb+1);
			if (!$pe) continue;
			$fr[1] = substr($fr[1], $pb+1, $pe-$pb-1);			
			$name = str_replace($fr[0], $fr[1], $name);
		
		}	
		$pb = strpos($seo_photo, ",");
		if ($pb) $seo_photo = substr($seo_photo, 0, $pb);		
		$namephoto = str_replace('[n]', $name, $seo_photo);
		$namephoto = str_replace('[c]', $category, $namephoto);		
		$namephoto = str_replace('[m]', $manufacturer, $namephoto);
		$namephoto = str_replace('[mod]', $model, $namephoto);
		$namephoto = str_replace('[b]', $brand, $namephoto);
		$namephoto = str_replace('[sku]', $sku, $namephoto);		
		$r = rand(0, 999999999);
		$f = 0;
		if ($store > 99) {
			$store = $store - 100;
			$f = 1;
		}
		if (!substr_count($namephoto, '[r]') and !$f) $namephoto = $r . '-' . $namephoto;
		else $namephoto = str_replace('[r]', $r, $namephoto);
		
		$namephoto = $this->clearSEO($namephoto);
		$namephoto = $this->TransLit($namephoto);							
		$namephoto = $this->MetaURL($namephoto);		
		$namephoto = strtolower($namephoto);
		$namephoto = trim($namephoto);
		$namephoto = preg_replace('/[^0-9_a-z-\s]/','',$namephoto);
		$namephoto = preg_replace('|-+|', '-', $namephoto);
		return $namephoto;		
	}
	
	public function seoProduct($store, $product_id, $seo_data, &$seo) {	
		if (empty($product_id)) return;
		$lang = $this->config->get('config_language_id');
		$name = '';
		$price = '';
		$sprice = '';
		$category = '';
		$pcategory = '';
		$manufacturer = '';
		$description = '';
		$brand = '';
		$sku = '';
		$model = '';
		$upc = '';
		$loc = '';
		$mpn = '';
		$isbn = '';
		$jan = '';
		$url = '';
		$rows  = $this->getProductsByID($product_id);
		if (!empty($rows)) {
			$price = $this->convertPrice($rows[0]['price']);
			$brand = $rows[0]['location'];
			$sku = $rows[0]['sku'];
			$model = $rows[0]['model'];
			if (isset($rows[0]['upc'])) $upc = $rows[0]['upc'];
			if (isset($rows[0]['location'])) $loc = $rows[0]['location'];
			if (isset($rows[0]['mpn'])) $mpn = $rows[0]['mpn'];
			if (isset($rows[0]['isbn'])) $isbn = $rows[0]['isbn'];
			if (isset($rows[0]['jan'])) $jan = $rows[0]['jan'];
			$rows = $this->getManufacturerStore($rows[0]['manufacturer_id'], $store);
			if (!empty($rows)) $manufacturer = $rows[0]['name'];			
		}
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
					$child = $rows[$j]['category_id'];
					break;
				}
				if ((int)$rows[$j]['category_id'] > $child)	$child = $rows[$j]['category_id'];			
			}
			$parent = 0;
			$rows = $this->getCategoryStore($child, $store);
			if (!empty($rows)) $parent = $rows[0]['parent_id'];
			
			$rows = $this->getCategoryName($child);
			if (!empty($rows)) $category = $rows[0]['name'];
			$rows = $this->getCategoryName($parent);
			if (!empty($rows)) $pcategory = $rows[0]['name'];
		}
		$customer_group_id = 1;
		$row = $this->getActionPrice($product_id, $customer_group_id);
		if (!empty($row)) $sprice = $this->convertPrice($row['price']);
		$rows = $this->getProductDesc($product_id);
		if (!empty($rows)) {
			$name = $rows[0]['name'];			
			$description = $rows[0]['description'];
		}

		$seo['prod_h1'] = $seo_data['prod_h1'];
		$seo['prod_title'] = $seo_data['prod_title'];
		$seo['prod_meta_desc'] = $seo_data['prod_meta_desc'];
		$seo['prod_desc'] = $seo_data['prod_desc'];
		$seo['cat_title'] = $seo_data['cat_title'];
		$seo['cat_meta_desc'] = $seo_data['cat_meta_desc'];
		$seo['cat_desc'] = $seo_data['cat_desc'];
		$seo['manuf_title'] = $seo_data['manuf_title'];
		$seo['manuf_meta_desc'] = $seo_data['manuf_meta_desc'];
		$seo['manuf_desc'] = $seo_data['manuf_desc'];
		$seo['prod_keyword'] = $seo_data['prod_keyword'];
		$seo['prod_url'] = $seo_data['prod_url'];
				
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {
			$seo['prod_h1'] = str_replace('[n]', $name, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[n]', $name, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[n]', $name, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[n]', $name, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[n]', $name, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[n]', $name, $seo['prod_url']);
		
			$seo['prod_h1'] = str_replace('[p]', $price, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[p]', $price, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[p]', $price, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[p]', $price, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[p]', $price, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[p]', $price, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[sp]', $sprice, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[sp]', $sprice, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[sp]', $sprice, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[sp]', $sprice, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[sp]', $sprice, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[sp]', $sprice, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[c]', $category, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[c]', $category, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[c]', $category, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[c]', $category, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[c]', $category, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[c]', $category, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[pc]', $pcategory, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[pc]', $pcategory, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[pc]', $pcategory, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[pc]', $pcategory, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[pc]', $pcategory, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[pc]', $pcategory, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[m]', $manufacturer, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[m]', $manufacturer, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[m]', $manufacturer, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[m]', $manufacturer, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[m]', $manufacturer, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[m]', $manufacturer, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[b]', $brand, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[b]', $brand, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[b]', $brand, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[b]', $brand, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[b]', $brand, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[b]', $brand, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[sku]', $sku, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[sku]', $sku, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[sku]', $sku, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[sku]', $sku, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[sku]', $sku, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[sku]', $sku, $seo['prod_url']);
			
			$seo['prod_h1'] = str_replace('[mod]', $model, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[mod]', $model, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[mod]', $model, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[mod]', $model, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[mod]', $model, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[mod]', $model, $seo['prod_url']);
		
			if ($upc) {
				$seo['prod_h1'] = str_replace('[upc]', $upc, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[upc]', $upc, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[upc]', $upc, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[upc]', $upc, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[upc]', $upc, $seo['prod_keyword']);
				$seo['prod_url'] = str_replace('[upc]', $upc, $seo['prod_url']);
			}			
			$seo['prod_h1'] = str_replace('[loc]', $loc, $seo['prod_h1']);
			$seo['prod_title'] = str_replace('[loc]', $loc, $seo['prod_title']);
			$seo['prod_meta_desc'] = str_replace('[loc]', $loc, $seo['prod_meta_desc']);
			$seo['prod_desc'] = str_replace('[loc]', $loc, $seo['prod_desc']);
			$seo['prod_keyword'] = str_replace('[loc]', $loc, $seo['prod_keyword']);
			$seo['prod_url'] = str_replace('[loc]', $loc, $seo['prod_url']);
			
			if ($mpn) {
				$seo['prod_h1'] = str_replace('[mpn]', $mpn, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[mpn]', $mpn, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[mpn]', $mpn, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[mpn]', $mpn, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[mpn]', $mpn, $seo['prod_keyword']);
				$seo['prod_url'] = str_replace('[mpn]', $mpn, $seo['prod_url']);
			}
			if ($isbn) {
				$seo['prod_h1'] = str_replace('[isbn]', $isbn, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[isbn]', $isbn, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[isbn]', $isbn, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[isbn]', $isbn, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[isbn]', $isbn, $seo['prod_keyword']);
				$seo['prod_url'] = str_replace('[isbn]', $isbn, $seo['prod_url']);
			}
			if ($jan) {
				$seo['prod_h1'] = str_replace('[jan]', $jan, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[jan]', $jan, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[jan]', $jan, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[jan]', $jan, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[jan]', $jan, $seo['prod_keyword']);
				$seo['prod_url'] = str_replace('[jan]', $jan, $seo['prod_url']);
			}
			if (!empty($description) and $i == $kk-1 and substr_count($seo['prod_desc'],"[d]")) {				
				$b = str_replace('[d]', '', $seo['prod_desc']);
				$b = strip_tags($b);
				$a = strip_tags($description);
				$b = trim($b);
				$a = trim($a);
	
				if (!empty($a) and !empty($b) and !substr_count($a, $b)) $seo['prod_desc'] = str_replace('[d]', $description, $seo['prod_desc']);
				else $seo['prod_desc'] = $description;
				
				$seo['prod_desc'] = str_replace('[d]', '', $seo['prod_desc']);	
			}	
		}
		
		$t1 = ''; $t2 = ''; $t3 = ''; $t4 = ''; $t5 = ''; $t6 = '';	$t7 = ''; $t8 = ''; $t9 = ''; $t10 = '';
		$t11 = ''; $t12 = ''; $t13 = ''; $t14 = ''; $t15 = ''; $t16 = ''; $t17 = ''; $t18 = ''; $t19 = ''; $t20 = '';
		$mm = explode("|", $seo_data['seo_1']);	
		if (!empty($mm)) $t1 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_2']);
		if (!empty($mm)) $t2 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_3']);
		if (!empty($mm)) $t3 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_4']);
		if (!empty($mm)) $t4 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_5']);
		if (!empty($mm)) $t5 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_6']);
		if (!empty($mm)) $t6 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_7']);
		if (!empty($mm)) $t7 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_8']);
		if (!empty($mm)) $t8 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_9']);
		if (!empty($mm)) $t9 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_10']);
		if (!empty($mm)) $t10 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_11']);
		if (!empty($mm)) $t11 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_12']);
		if (!empty($mm)) $t12 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_13']);
		if (!empty($mm)) $t13 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_14']);
		if (!empty($mm)) $t14 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_15']);
		if (!empty($mm)) $t15 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_16']);
		if (!empty($mm)) $t16 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_17']);
		if (!empty($mm)) $t17 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_18']);
		if (!empty($mm)) $t18 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_19']);
		if (!empty($mm)) $t19 = $mm[rand(0, count($mm)-1)];
		$mm = explode("|", $seo_data['seo_20']);
		if (!empty($mm)) $t20 = $mm[rand(0, count($mm)-1)];
	
		$kk = 6;
		for ($i=0; $i<$kk; $i++) {	
			if (!empty($t1)) {
				$t1 = str_replace('[n]', $name, $t1);				
				$t1 = str_replace('[p]', $price, $t1);
				$t1 = str_replace('[sp]', $sprice, $t1);
				$t1 = str_replace('[c]', $category, $t1);
				$t1 = str_replace('[pc]', $pcategory, $t1);
				$t1 = str_replace('[m]', $manufacturer, $t1);
				$t1 = str_replace('[b]', $brand, $t1);
				$t1 = str_replace('[sku]', $sku, $t1);
				$seo['prod_h1'] = str_replace('[1]', $t1, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[1]', $t1, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[1]', $t1, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[1]', $t1, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[1]', $t1, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[1]', $t1, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[1]', $t1, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[1]', $t1, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[1]', $t1, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[1]', $t1, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[1]', $t1, $seo['manuf_desc']);
			}	
			if (!empty($t2)) {
				$t2 = str_replace('[n]', $name, $t2);				
				$t2 = str_replace('[p]', $price, $t2);
				$t2 = str_replace('[sp]', $sprice, $t2);
				$t2 = str_replace('[c]', $category, $t2);
				$t2 = str_replace('[pc]', $pcategory, $t2);
				$t2 = str_replace('[m]', $manufacturer, $t2);
				$t2 = str_replace('[b]', $brand, $t2);
				$t2 = str_replace('[sku]', $sku, $t2);
				$seo['prod_h1'] = str_replace('[2]', $t2, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[2]', $t2, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[2]', $t2, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[2]', $t2, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[2]', $t2, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[2]', $t2, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[2]', $t2, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[2]', $t2, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[2]', $t2, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[2]', $t2, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[2]', $t2, $seo['manuf_desc']);
			}
			if (!empty($t3)) {
				$t3 = str_replace('[n]', $name, $t3);				
				$t3 = str_replace('[p]', $price, $t3);
				$t3 = str_replace('[sp]', $sprice, $t3);
				$t3 = str_replace('[c]', $category, $t3);
				$t3 = str_replace('[pc]', $pcategory, $t3);
				$t3 = str_replace('[m]', $manufacturer, $t3);
				$t3 = str_replace('[b]', $brand, $t3);
				$t3 = str_replace('[sku]', $sku, $t3);
				$seo['prod_h1'] = str_replace('[3]', $t3, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[3]', $t3, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[3]', $t3, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[3]', $t3, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[3]', $t3, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[3]', $t3, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[3]', $t3, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[3]', $t3, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[3]', $t3, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[3]', $t3, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[3]', $t3, $seo['manuf_desc']);
			}
			if (!empty($t4)) {
				$t4 = str_replace('[n]', $name, $t4);				
				$t4 = str_replace('[p]', $price, $t4);
				$t4 = str_replace('[sp]', $sprice, $t4);
				$t4 = str_replace('[c]', $category, $t4);
				$t4 = str_replace('[pc]', $pcategory, $t4);
				$t4 = str_replace('[m]', $manufacturer, $t4);
				$t4 = str_replace('[b]', $brand, $t4);
				$t4 = str_replace('[sku]', $sku, $t4);
				$seo['prod_h1'] = str_replace('[4]', $t4, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[4]', $t4, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[4]', $t4, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[4]', $t4, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[4]', $t4, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[4]', $t4, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[4]', $t4, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[4]', $t4, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[4]', $t4, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[4]', $t4, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[4]', $t4, $seo['manuf_desc']);
			}
			if (!empty($t5)) {
				$t5 = str_replace('[n]', $name, $t5);				
				$t5 = str_replace('[p]', $price, $t5);
				$t5 = str_replace('[sp]', $sprice, $t5);
				$t5 = str_replace('[c]', $category, $t5);
				$t5 = str_replace('[pc]', $pcategory, $t5);
				$t5 = str_replace('[m]', $manufacturer, $t5);
				$t5 = str_replace('[b]', $brand, $t5);
				$t5 = str_replace('[sku]', $sku, $t5);
				$seo['prod_h1'] = str_replace('[5]', $t5, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[5]', $t5, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[5]', $t5, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[5]', $t5, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[5]', $t5, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[5]', $t5, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[5]', $t5, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[5]', $t5, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[5]', $t5, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[5]', $t5, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[5]', $t5, $seo['manuf_desc']);
			}
			if (!empty($t6)) {
				$t6 = str_replace('[n]', $name, $t6);				
				$t6 = str_replace('[p]', $price, $t6);
				$t6 = str_replace('[sp]', $sprice, $t6);
				$t6 = str_replace('[c]', $category, $t6);
				$t6 = str_replace('[pc]', $pcategory, $t6);
				$t6 = str_replace('[m]', $manufacturer, $t6);
				$t6 = str_replace('[b]', $brand, $t6);
				$t6 = str_replace('[sku]', $sku, $t6);
				$seo['prod_h1'] = str_replace('[6]', $t6, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[6]', $t6, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[6]', $t6, $seo['prod_meta_desc']);				
				$seo['prod_desc'] = str_replace('[6]', $t6, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[6]', $t6, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[6]', $t6, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[6]', $t6, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[6]', $t6, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[6]', $t6, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[6]', $t6, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[6]', $t6, $seo['manuf_desc']);
			}
			if (!empty($t7)) {
				$t7 = str_replace('[n]', $name, $t7);				
				$t7 = str_replace('[p]', $price, $t7);
				$t7 = str_replace('[sp]', $sprice, $t7);
				$t7 = str_replace('[c]', $category, $t7);
				$t7 = str_replace('[pc]', $pcategory, $t7);
				$t7 = str_replace('[m]', $manufacturer, $t7);
				$t7 = str_replace('[b]', $brand, $t7);
				$t7 = str_replace('[sku]', $sku, $t7);
				$seo['prod_h1'] = str_replace('[7]', $t7, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[7]', $t7, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[7]', $t7, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[7]', $t7, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[7]', $t7, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[7]', $t7, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[7]', $t7, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[7]', $t7, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[7]', $t7, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[7]', $t7, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[7]', $t7, $seo['manuf_desc']);
			}
			if (!empty($t8)) {
				$t8 = str_replace('[n]', $name, $t8);				
				$t8 = str_replace('[p]', $price, $t8);
				$t8 = str_replace('[sp]', $sprice, $t8);
				$t8 = str_replace('[c]', $category, $t8);
				$t8 = str_replace('[pc]', $pcategory, $t8);
				$t8 = str_replace('[m]', $manufacturer, $t8);
				$t8 = str_replace('[b]', $brand, $t8);
				$t8 = str_replace('[sku]', $sku, $t8);
				$seo['prod_h1'] = str_replace('[8]', $t8, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[8]', $t8, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[8]', $t8, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[8]', $t8, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[8]', $t8, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[8]', $t8, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[8]', $t8, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[8]', $t8, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[8]', $t8, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[8]', $t8, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[8]', $t8, $seo['manuf_desc']);
			}
			if (!empty($t9)) {
				$t9 = str_replace('[n]', $name, $t9);				
				$t9 = str_replace('[p]', $price, $t9);
				$t9 = str_replace('[sp]', $sprice, $t9);
				$t9 = str_replace('[c]', $category, $t9);
				$t9 = str_replace('[pc]', $pcategory, $t9);
				$t9 = str_replace('[m]', $manufacturer, $t9);
				$t9 = str_replace('[b]', $brand, $t9);
				$t9 = str_replace('[sku]', $sku, $t9);
				$seo['prod_h1'] = str_replace('[9]', $t9, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[9]', $t9, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[9]', $t9, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[9]', $t9, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[9]', $t9, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[9]', $t9, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[9]', $t9, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[9]', $t9, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[9]', $t9, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[9]', $t9, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[9]', $t9, $seo['manuf_desc']);
			}
			if (!empty($t10)) {
				$t10 = str_replace('[n]', $name, $t10);				
				$t10 = str_replace('[p]', $price, $t10);
				$t10 = str_replace('[sp]', $sprice, $t10);
				$t10 = str_replace('[c]', $category, $t10);
				$t10 = str_replace('[pc]', $pcategory, $t10);
				$t10 = str_replace('[m]', $manufacturer, $t10);
				$t10 = str_replace('[b]', $brand, $t10);
				$t10 = str_replace('[sku]', $sku, $t10);
				$seo['prod_h1'] = str_replace('[10]', $t10, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[10]', $t10, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[10]', $t10, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[10]', $t10, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[10]', $t10, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[10]', $t10, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[10]', $t10, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[10]', $t10, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[10]', $t10, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[10]', $t10, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[10]', $t10, $seo['manuf_desc']);
			}
			if (!empty($t11)) {
				$t11 = str_replace('[n]', $name, $t11);				
				$t11 = str_replace('[p]', $price, $t11);
				$t11 = str_replace('[sp]', $sprice, $t11);
				$t11 = str_replace('[c]', $category, $t11);
				$t11 = str_replace('[pc]', $pcategory, $t11);
				$t11 = str_replace('[m]', $manufacturer, $t11);
				$t11 = str_replace('[b]', $brand, $t11);
				$t11 = str_replace('[sku]', $sku, $t11);
				$seo['prod_h1'] = str_replace('[11]', $t11, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[11]', $t11, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[11]', $t11, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[11]', $t11, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[11]', $t11, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[11]', $t11, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[11]', $t11, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[11]', $t11, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[11]', $t11, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[11]', $t11, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[11]', $t11, $seo['manuf_desc']);
			}
			if (!empty($t12)) {
				$t12 = str_replace('[n]', $name, $t12);				
				$t12 = str_replace('[p]', $price, $t12);
				$t12 = str_replace('[sp]', $sprice, $t12);
				$t12 = str_replace('[c]', $category, $t12);
				$t12 = str_replace('[pc]', $pcategory, $t12);
				$t12 = str_replace('[m]', $manufacturer, $t12);
				$t12 = str_replace('[b]', $brand, $t12);
				$t12 = str_replace('[sku]', $sku, $t12);
				$seo['prod_h1'] = str_replace('[12]', $t12, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[12]', $t12, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[12]', $t12, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[12]', $t12, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[12]', $t12, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[12]', $t12, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[12]', $t12, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[12]', $t12, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[12]', $t12, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[12]', $t12, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[12]', $t12, $seo['manuf_desc']);
			}
			if (!empty($t13)) {
				$t13 = str_replace('[n]', $name, $t13);				
				$t13 = str_replace('[p]', $price, $t13);
				$t13 = str_replace('[sp]', $sprice, $t13);
				$t13 = str_replace('[c]', $category, $t13);
				$t13 = str_replace('[pc]', $pcategory, $t13);
				$t13 = str_replace('[m]', $manufacturer, $t13);
				$t13 = str_replace('[b]', $brand, $t13);
				$t13 = str_replace('[sku]', $sku, $t13);
				$seo['prod_h1'] = str_replace('[13]', $t13, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[13]', $t13, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[13]', $t13, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[13]', $t13, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[13]', $t13, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[13]', $t13, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[13]', $t13, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[13]', $t13, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[13]', $t13, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[13]', $t13, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[13]', $t13, $seo['manuf_desc']);
			}
			if (!empty($t14)) {
				$t14 = str_replace('[n]', $name, $t14);				
				$t14 = str_replace('[p]', $price, $t14);
				$t14 = str_replace('[sp]', $sprice, $t14);
				$t14 = str_replace('[c]', $category, $t14);
				$t14 = str_replace('[pc]', $pcategory, $t14);
				$t14 = str_replace('[m]', $manufacturer, $t14);
				$t14 = str_replace('[b]', $brand, $t14);
				$t14 = str_replace('[sku]', $sku, $t14);
				$seo['prod_h1'] = str_replace('[14]', $t14, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[14]', $t14, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[14]', $t14, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[14]', $t14, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[14]', $t14, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[14]', $t14, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[14]', $t14, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[14]', $t14, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[14]', $t14, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[14]', $t14, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[14]', $t14, $seo['manuf_desc']);
			}
			if (!empty($t15)) {
				$t15 = str_replace('[n]', $name, $t15);				
				$t15 = str_replace('[p]', $price, $t15);
				$t15 = str_replace('[sp]', $sprice, $t15);
				$t15 = str_replace('[c]', $category, $t15);
				$t15 = str_replace('[pc]', $pcategory, $t15);
				$t15 = str_replace('[m]', $manufacturer, $t15);
				$t15 = str_replace('[b]', $brand, $t15);
				$t15 = str_replace('[sku]', $sku, $t15);
				$seo['prod_h1'] = str_replace('[15]', $t15, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[15]', $t15, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[15]', $t15, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[15]', $t15, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[15]', $t15, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[15]', $t15, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[15]', $t15, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[15]', $t15, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[15]', $t15, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[15]', $t15, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[15]', $t15, $seo['manuf_desc']);
			}
			if (!empty($t16)) {
				$t16 = str_replace('[n]', $name, $t16);				
				$t16 = str_replace('[p]', $price, $t16);
				$t16 = str_replace('[sp]', $sprice, $t16);
				$t16 = str_replace('[c]', $category, $t16);
				$t16 = str_replace('[pc]', $pcategory, $t16);
				$t16 = str_replace('[m]', $manufacturer, $t16);
				$t16 = str_replace('[b]', $brand, $t16);
				$t16 = str_replace('[sku]', $sku, $t16);
				$seo['prod_h1'] = str_replace('[16]', $t16, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[16]', $t16, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[16]', $t16, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[16]', $t16, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[16]', $t16, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[16]', $t16, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[16]', $t16, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[16]', $t16, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[16]', $t16, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[16]', $t16, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[16]', $t16, $seo['manuf_desc']);
			}
			if (!empty($t17)) {
				$t17 = str_replace('[n]', $name, $t17);				
				$t17 = str_replace('[p]', $price, $t17);
				$t17 = str_replace('[sp]', $sprice, $t17);
				$t17 = str_replace('[c]', $category, $t17);
				$t17 = str_replace('[pc]', $pcategory, $t17);
				$t17 = str_replace('[m]', $manufacturer, $t17);
				$t17 = str_replace('[b]', $brand, $t17);
				$t17 = str_replace('[sku]', $sku, $t17);
				$seo['prod_h1'] = str_replace('[17]', $t17, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[17]', $t17, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[17]', $t17, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[17]', $t17, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[17]', $t17, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[17]', $t17, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[17]', $t17, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[17]', $t17, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[17]', $t17, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[17]', $t17, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[17]', $t17, $seo['manuf_desc']);
			}
			if (!empty($t18)) {
				$t18 = str_replace('[n]', $name, $t18);				
				$t18 = str_replace('[p]', $price, $t18);
				$t18 = str_replace('[sp]', $sprice, $t18);
				$t18 = str_replace('[c]', $category, $t18);
				$t18 = str_replace('[pc]', $pcategory, $t18);
				$t18 = str_replace('[m]', $manufacturer, $t18);
				$t18 = str_replace('[b]', $brand, $t18);
				$t18 = str_replace('[sku]', $sku, $t18);
				$seo['prod_h1'] = str_replace('[18]', $t18, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[18]', $t18, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[18]', $t18, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[18]', $t18, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[18]', $t18, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[18]', $t18, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[18]', $t18, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[18]', $t18, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[18]', $t18, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[18]', $t18, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[18]', $t18, $seo['manuf_desc']);
			}
			if (!empty($t19)) {
				$t19 = str_replace('[n]', $name, $t19);				
				$t19 = str_replace('[p]', $price, $t19);
				$t19 = str_replace('[sp]', $sprice, $t19);
				$t19 = str_replace('[c]', $category, $t19);
				$t19 = str_replace('[pc]', $pcategory, $t19);
				$t19 = str_replace('[m]', $manufacturer, $t19);
				$t19 = str_replace('[b]', $brand, $t19);
				$t19 = str_replace('[sku]', $sku, $t19);
				$seo['prod_h1'] = str_replace('[19]', $t19, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[19]', $t19, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[19]', $t19, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[19]', $t19, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[19]', $t19, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[19]', $t19, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[19]', $t19, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[19]', $t19, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[19]', $t19, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[19]', $t19, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[19]', $t19, $seo['manuf_desc']);
			}
			if (!empty($t20)) {
				$t20 = str_replace('[n]', $name, $t20);				
				$t20 = str_replace('[p]', $price, $t20);
				$t20 = str_replace('[sp]', $sprice, $t20);
				$t20 = str_replace('[c]', $category, $t20);
				$t20 = str_replace('[pc]', $pcategory, $t20);
				$t20 = str_replace('[m]', $manufacturer, $t20);
				$t20 = str_replace('[b]', $brand, $t20);
				$t20 = str_replace('[sku]', $sku, $t20);
				$seo['prod_h1'] = str_replace('[20]', $t20, $seo['prod_h1']);
				$seo['prod_title'] = str_replace('[20]', $t20, $seo['prod_title']);
				$seo['prod_meta_desc'] = str_replace('[20]', $t20, $seo['prod_meta_desc']);
				$seo['prod_desc'] = str_replace('[20]', $t20, $seo['prod_desc']);
				$seo['prod_keyword'] = str_replace('[20]', $t20, $seo['prod_keyword']);
				$seo['cat_title'] = str_replace('[20]', $t20, $seo['cat_title']);			
				$seo['cat_meta_desc'] = str_replace('[20]', $t20, $seo['cat_meta_desc']);
				$seo['cat_desc'] = str_replace('[20]', $t20, $seo['cat_desc']);
				$seo['manuf_title'] = str_replace('[20]', $t20, $seo['manuf_title']);
				$seo['manuf_meta_desc'] = str_replace('[20]', $t20, $seo['manuf_meta_desc']);
				$seo['manuf_desc'] = str_replace('[20]', $t20, $seo['manuf_desc']);
			}
						
		}
		
		$br = 1;
		for ($i=0; $i<200; $i++) {
			if (!$br) break;
			$br = 0;
			$pb = strpos($seo['prod_h1'], "[");			
			$pe = strpos($seo['prod_h1'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['prod_h1'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['prod_h1'] = str_replace($n, $text, $seo['prod_h1']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['prod_h1'] = str_replace($n, $text, $seo['prod_h1']);
					} else $seo['prod_h1'] = str_replace($n, '', $seo['prod_h1']);
				}	
			}	
			$pb = strpos($seo['prod_title'], "[");			
			$pe = strpos($seo['prod_title'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['prod_title'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['prod_title'] = str_replace($n, $text, $seo['prod_title']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['prod_title'] = str_replace($n, $text, $seo['prod_title']);
					} else $seo['prod_title'] = str_replace($n, '', $seo['prod_title']);
				}	
			}		
			$pb = strpos($seo['prod_meta_desc'], "[");			
			$pe = strpos($seo['prod_meta_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['prod_meta_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['prod_meta_desc'] = str_replace($n, $text, $seo['prod_meta_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['prod_meta_desc'] = str_replace($n, $text, $seo['prod_meta_desc']);
					} else $seo['prod_meta_desc'] = str_replace($n, '', $seo['prod_meta_desc']);
				}	
			}
			
			$pb = strpos($seo['prod_desc'], "[");		
			$pe = strpos($seo['prod_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['prod_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['prod_desc'] = str_replace($n, $text, $seo['prod_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['prod_desc'] = str_replace($n, $text, $seo['prod_desc']);
					} else $seo['prod_desc'] = str_replace($n, '', $seo['prod_desc']);
				}	
			}	
			$pb = strpos($seo['cat_title'], "[");	
			$pe = strpos($seo['cat_title'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_title'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_title'] = str_replace($n, $text, $seo['cat_title']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['cat_title'] = str_replace($n, $text, $seo['cat_title']);
					} else $seo['cat_title'] = str_replace($n, '', $seo['cat_title']);
				}	
			}	
			$pb = strpos($seo['cat_meta_desc'], "[");	
			$pe = strpos($seo['cat_meta_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_meta_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_meta_desc'] = str_replace($n, $text, $seo['cat_meta_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['cat_meta_desc'] = str_replace($n, $text, $seo['cat_meta_desc']);
					} else $seo['cat_meta_desc'] = str_replace($n, '', $seo['cat_meta_desc']);
				}	
			}	
			$pb = strpos($seo['prod_keyword'], "[");	
			$pe = strpos($seo['prod_keyword'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['prod_keyword'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['prod_keyword'] = str_replace($n, $text, $seo['prod_keyword']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['prod_keyword'] = str_replace($n, $text, $seo['prod_keyword']);
					} else $seo['prod_keyword'] = str_replace($n, '', $seo['prod_keyword']);
				}	
			}	
			$pb = strpos($seo['cat_desc'], "[");	
			$pe = strpos($seo['cat_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['cat_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['cat_desc'] = str_replace($n, $text, $seo['cat_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['cat_desc'] = str_replace($n, $text, $seo['cat_desc']);
					} else $seo['cat_desc'] = str_replace($n, '', $seo['cat_desc']);
				}	
			}	
			$pb = strpos($seo['manuf_title'], "[");	
			$pe = strpos($seo['manuf_title'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_title'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_title'] = str_replace($n, $text, $seo['manuf_title']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['manuf_title'] = str_replace($n, $text, $seo['manuf_title']);
					} else $seo['manuf_title'] = str_replace($n, '', $seo['manuf_title']);
				}	
			}	
			$pb = strpos($seo['manuf_meta_desc'], "[");	
			$pe = strpos($seo['manuf_meta_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_meta_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_meta_desc'] = str_replace($n, $text, $seo['manuf_meta_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['manuf_meta_desc'] = str_replace($n, $text, $seo['manuf_meta_desc']);
					} else $seo['manuf_meta_desc'] = str_replace($n, '', $seo['manuf_meta_desc']);
				}	
			}	
			$pb = strpos($seo['manuf_desc'], "[");	
			$pe = strpos($seo['manuf_desc'], "]");
			if ($pe) {
				$br = 1;
				$n = substr($seo['manuf_desc'], $pb, $pe-$pb+1);
				if (substr_count($n, "|")) {
					$m = substr($n, 1, strlen($n)-2);
					$mm = explode("|", $m);						
					$text = $mm[rand(0, count($mm)-1)];
					$seo['manuf_desc'] = str_replace($n, $text, $seo['manuf_desc']);
				} else {
					$v = $this->getValue($product_id, $n, $lang);
					if (!empty($v)) {
						if (substr_count($n, '{')) $text = $v;
						else $text = substr($n, 1, strlen($n)-2) . ': ' . $v;
						switch ($n) {
                            case mb_strtolower($n):
                                $text = mb_strtolower($text);
                               break;
                            case mb_strtoupper($n):
                                $text = mb_strtoupper($text);
                               break;                               
                        }
						$seo['manuf_desc'] = str_replace($n, $text, $seo['manuf_desc']);
					} else $seo['manuf_desc'] = str_replace($n, '', $seo['manuf_desc']);
				}	
			}	
		}	
	}
	
	public function clearProductURL($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");
	}	
	
	public function FixProductURL($row, $seo_data, $store) {
		$product_id = $row['product_id'];		
		$model = $row['model'];
		$sku = $row['sku'];
		$url = '';
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);
		$url = $seo['prod_url'];
		$url = $this->clearSEO($url);
		$url = $this->TransLit($url);
		
		$rows = $this->getProductDesc($product_id);		
		$name = '';
		if (isset($rows[0]['name'])) $name = $rows[0]['name'];
		$seo_url = $this->TransLit($name);
		if (!empty($url)) $seo_url = $url;
		$seo_url = $this->MetaURL($seo_url);
		$seo_url = strtolower($seo_url);		
		
		$rows = $this->chURL($seo_url);
		if (!empty($rows)) $seo_url = $seo_url . '-' . $product_id;		
	
		$row = $this->getURL($product_id);
		if (empty($row)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'product_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($seo_url) . "'");
		} else {			
			$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($seo_url) . "' WHERE `query` = 'product_id=" . $product_id . "'");
		}
	}
	
	public function FixMetaProduct($store, $row, $seo_data) {
		$lang = $this->config->get('config_language_id');
		$product_id = $row['product_id'];		
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$name = $rows[0]['name'];		
		$seo = array();
		$this->seoProduct($store, $product_id, $seo_data, $seo);		
		if (empty($seo['prod_h1'])) $seo['prod_h1'] = $name;
		$seo['prod_h1'] = $this->clearSEO($seo['prod_h1']);
		$seo['prod_title'] = $this->clearSEO($seo['prod_title']);
		$seo['prod_meta_desc'] = $this->clearSEO($seo['prod_meta_desc']);
		$seo['prod_keyword'] = $this->clearSEO($seo['prod_keyword']);		
				
		if (!empty($seo['prod_h1'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($seo['prod_h1']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
		}
		
		if (!empty($seo['prod_title'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($seo['prod_title']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}
		
		if (!empty($seo['prod_meta_desc'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($seo['prod_meta_desc']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");	
		}

		if (!empty($seo['prod_keyword'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($seo['prod_keyword']) . "'  WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");
		}
				
	}
	
	public function getProduct($sku, $store) {
		$rows = '';	
		$rows  = $this->getProductBySKU($sku, $store);
		if (empty($rows)) {			
			$rows = $this->getProductByTable($sku, $store);	
		    if (empty($rows)) return '';
			$row = $this->getProductByID($rows[0]['product_id']);
			if (!empty($row['sku'])) $rows[0]['sku'] = $row['sku'];
		}
		return $rows;
	}	
	
	public function addSkuToTable($sku, &$sku_id, $store) {
		if (!$sku_id) {
			$row = $this->getMaxSkuID();
			$sku_id = $row['max(sku_id)'];
			$sku_id = $sku_id + 1;
		}		
		$row = $this->getskuDescription($sku, $store);
		if (!empty($row) and !empty($sku) and !empty($sku_id)) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_sku_description WHERE sku = '" . $this->db->escape($sku) . "' AND store_id = '" . (int)$store . "'");
			if ($store == 0)
			$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_sku_description WHERE sku = '" . $this->db->escape($sku) . "' AND store_id = ''");
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_sku_description SET `sku_id` = '" .$sku_id. "', `sku` = '" . $this->db->escape($sku) . "', store_id = '" . (int)$store . "'");		
		}
		if ((empty($row)) and !empty($sku) and !empty($sku_id)) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_sku_description SET `sku_id` = '" .$sku_id. "', `sku` = '" . $this->db->escape($sku) . "', store_id = '" . (int)$store . "'");				
		}		
	}
		
	public function CreateSkuTable($store) {
		$this->db->query("TRUNCATE " . DB_PREFIX . "suppler_sku");
		
		$row1 = $this->getMaxsku_id();  // suppler_sku_description
		$maxid = $row1['max(sku_id)'];
		for ($i=1; $i<=$maxid; $i++) {	
			$rows = $this->getSkuBysku_id($i); // suppler_sku_description		
			if (!isset($rows[0]['sku']) or empty($rows[0]['sku'])) continue;
			if (!isset($rows[1]['sku']) or empty($rows[1]['sku'])) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku_id` = '" . $i . "'");
				continue;
			}
			$rows1  = $this->getProductBySKU($rows[0]['sku'], $store);
			if (!empty($rows1))	$this->putsku($rows1[0]['product_id'], $i);
			else $this->db->query("DELETE FROM " . DB_PREFIX . "suppler_sku_description WHERE `sku_id` = '" . $i . "'");	
		}	
	}
	
	public function deleteEmptyPhoto($row) {
		if (empty($row)) return;
		$nul = '';
		$path = "../image/" . $row['image'];
		if (!file_exists($path)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $nul . "' WHERE product_id = '" . (int)$row['product_id'] ."'");
		}
		$rows = $this->getProductImage($row['product_id']);
		if (empty($rows)) return;		
		for ($i=0; $i<40; $i++) {
			if (!isset($rows[$i]['image'])) break;
			$path = "../image/" . $rows[$i]['image'];
			if (!file_exists($path)) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_image_id = '" . $rows[$i]['product_image_id'] . "'");
			}
		}
	}
	
	public function samePhotos($row, $photo) {
		$addr = 'data/photo/' . $photo;
		$path_new = '../image/data/photo/' . $photo;
		$path_old = '../image/' . $row['image'];				
		if (substr_count($row['image'], $photo)) {			
			if (!is_dir($path_new)) {				
				if (copy($path_old, $path_new)) {
					$row['image'] = $addr;
					$this->upProduct($row);
					@unlink($path_old);
				}
			} else {
				$row['image'] = $addr;
				$this->upProduct($row);
				@unlink($path_old);
			}
			
		}	
		$rows = $this->getProductImage($row['product_id']);
		if (!empty($rows)) {
			for ($i=0; $i<50; $i++) {
				if (!isset($rows[$i]['image'])) break;
				$path_old = '../image/' . $rows[$i]['image'];
				if (substr_count($rows[$i]['image'], $photo)) {
					if (!is_dir($path_new)) {										
						if (copy($path_old, $path_new)) {
							$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $addr . "' WHERE `product_image_id` = '".$rows[$i]['product_image_id']."'");
							
							@unlink($path_old);
						}	
					} else {
						$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $addr . "' WHERE `product_image_id` = '".$rows[$i]['product_image_id']."'");
							
						@unlink($path_old);
					}	
				}
			}	
		}	
	}	
	
	public function DeleteDefaultFoto($row, $photo) {		
		$nul = '';
		if (substr_count($row['image'], $photo)) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $nul . "' WHERE product_id = '" . (int)$row['product_id'] ."'");
		}
		$rows = $this->getProductImage($row['product_id']);
	// проверяем до 50 дополнительных фото
		for ($i=0; $i<50; $i++) {
			if (!isset($rows[$i]['image'])) break;				
			if (substr_count($rows[$i]['image'], $photo)) {		
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . $row['product_id'] . "' and `product_image_id` = '".$rows[$i]['product_image_id']."'");
				
			}
		}
	}
	
	public function deleteLinksDescription($product_id) {
		$rows = array();
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;		
		$f = 0;
		$rows[0]['description'] = $this->symbol($rows[0]['description']);
		for ($i=0; $i<20; $i++) {
			$pb = strpos($rows[0]['description'], "<a ");			
			if (!$pb) $pb = strpos($rows[0]['description'], "&lt;a ");
			if (!$pb and substr($rows[0]['description'], 0, 3) != "<a " and substr($rows[0]['description'], 0, 6) != "&lt;a ") break;			
			$pe = strpos($rows[0]['description'], ">", $pb);
			if (!$pe) {
				$pe = strpos($rows[0]['description'], "&gt;", $pb);
				$pe = $pe + 3;
			}	
			if (!$pe) break;			
			$l = $pe - $pb + 1;
			$text = substr($rows[0]['description'], $pb, $l);
			if (!substr_count($text, '.pdf') and !substr_count($text, HTTP_SERVER)) {
				$rows[0]['description'] = str_replace($text, "", $rows[0]['description']);				
				$f = 1;
			}		
		}
		$rows[0]['description'] = str_replace("</a>", "", $rows[0]['description']);
		$rows[0]['description'] = str_replace("&lt;/a&gt;", "", $rows[0]['description']);
		
		for ($i=0; $i<20; $i++) {
			$pb = strpos($rows[0]['description'], "http");	
			if (!$pb) break;			
			$pe = strpos($rows[0]['description'], '"', $pb);
			if (!$pe) $pe = strpos($rows[0]['description'], '&quot;', $pb);
			if (!$pe) break;
			$text_v = substr($rows[0]['description'], $pb, 30);	
			$video = strpos($text_v, 'youtube');
			$l = $pe - $pb + 1;
			$text = substr($rows[0]['description'], $pb, $l);			
			if (!substr_count($text, '.pdf') and !$video) {
				$rows[0]['description'] = str_replace($text, "", $rows[0]['description']);
				$f = 1;
			}	
		}
		
		if ($f) {
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($rows[0]['description']) . "' WHERE product_id = '" . $product_id ."' AND language_id = '" . $lang . "'");
		}			
	}
	
	public function deleteDescPhoto($product_id, $store) {
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!substr_count($rows[0]['description'], "<img")) return;
		$f = 0;
		for ($i=0; $i<20; $i++) {
			$pb = strpos($rows[0]['description'], "<img");
			if (!$pb) break;			
			$pe = strpos($rows[0]['description'], ">", $pb);
			if (!$pe) break;
			$f = 1;
			$l = $pe - $pb + 1;
			$text = substr($rows[0]['description'], $pb, $l);
			$fb = strpos($rows[0]['description'], 'src="', $pb);	
			if ($fb) {
				$fe = strpos($rows[0]['description'], '"', $fb+5);	
				$l = $fe - $fb - 5;
				$path = substr($rows[0]['description'], $fb+5, $l);
				if (file_exists($path)) @unlink ($path);	
			}
			$rows[0]['description'] = str_replace($text, "", $rows[0]['description']);
		}
		if ($f) {
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($rows[0]['description']) . "' WHERE product_id = '" . $product_id ."' AND language_id = '" . $lang . "'");
		}
	}			
	
	public function RenameFoto($row, $seo_photo, $store) {
		$data = array();
		$store = $store + 100;
		if (empty($row)) return;
		if (empty($seo_photo)) return;
		$product_id = $row['product_id'];		
		$lang = $this->config->get('config_language_id');
		$name = '';		
		$category = '';	
		$manufacturer = '';	
		$brand = $row['location'];
		$sku = $row['sku'];
		$model = $row['model'];
		$rows = $this->getManufacturerStore($row['manufacturer_id'], $store);
		if (!empty($rows)) $manufacturer = $rows[0]['name'];
		$manufacturer = str_replace('&#034;', '', $manufacturer);
		$manufacturer = str_replace('&#039;', '', $manufacturer);
	
		$rows = $this->getProductCategory($product_id);
		if (!empty($rows)) {
			$child = 0;
			for ($j=0; $j<900; $j++) {					
				if (!isset($rows[$j]['category_id'])) break;
				if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
					$child = $rows[$j]['category_id'];
					break;
				}
				if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];			
			}			
			$rows = $this->getCategoryName($child);
			if (!empty($rows)) $category = $rows[0]['name'];			
		}
		$category = str_replace('&#034;', '', $category);
		$category = str_replace('&#039;', '', $category);
		
		$rows = $this->getProductDesc($product_id);
		if (!empty($rows)) $name = $rows[0]['name'];		
		$name = str_replace('&#034;', '', $name);
		$name = str_replace('&#039;', '', $name);
		$brand = str_replace('&#034;', '', $brand);
		$brand = str_replace('&#039;', '', $brand);
		
		$text = '';
		if (substr_count($seo_photo, "[{")) {
			$a = stripos($seo_photo, "[{");
			$b = stripos($seo_photo, "}]");
			if ($b and $b>$a) {
				$t = substr($seo_photo, $a+2, $b-$a-2);				
				$rows = $this->getAttributeID($t);
				if (!empty($rows)) {
					$rows = $this->getAttributeById($product_id, $rows[0]['attribute_id'], $this->config->get('config_language_id'));
					if (!empty($rows)) {
						$text = $rows[0]['text'];
						$seo_photo = str_replace('[{'.$t.'}]', 'gggggg', $seo_photo);
					} else {
						$s1 = substr($seo_photo, 0, $a-1);
						$s2 = substr($seo_photo, $b+2);
						$seo_photo = $s1.$s2;
					}	
				}
			}	
		}		
		if (substr_count($seo_photo, "[sn]")) $seo_photo = str_replace('[sn]', 'hhhhhh', $seo_photo);
		$data['name'] = $name;
		$data['category'] = $category;
		$data['manufacturer'] = $manufacturer;
		$data['model'] = $model;
		$data['brand'] = $brand;
		$data['sku'] = $sku;	
		$app = $this->namePhoto($store, $data, $seo_photo);
		$app = str_replace('hhhhhh', '1', $app);
		if ($text) {
			$text = $this->TransLit($text);							
			$text = $this->MetaURL($text);		
			$text = strtolower($text);
			$text = trim($text);
			$text = preg_replace('/[^0-9_a-z-\s]/','',$text);
			$text = preg_replace('|-+|', '-', $text);
			$app = str_replace('gggggg', $text, $app);
		}
		$rows = $this->countImages($row['image']);
		if (!isset($rows[1]['image'])) {
			$nom = stripos($row['image'], ".j");
			if (!$nom) $nom = stripos($row['image'], ".png");
			if (!$nom) $nom = stripos($row['image'], ".gif");
			if (!$nom) $nom = stripos($row['image'], ".bmp");
			if (!$nom) $nom = stripos($row['image'], ".PNG");
			if (!$nom) $nom = stripos($row['image'], ".GIF");
			if (!$nom) $nom = stripos($row['image'], ".BMP");
			if (!$nom) return;
			$se = substr($row['image'], $nom);
			$old = '../image/' . $row['image'];
			$p = strrpos($row['image'], "/");
			if (!$p) return;
			$new = substr($row['image'], 0, $p+1);
			$new = $new . $app . $se;		
			if (!file_exists($old)) return;
			if (!rename ($old, '../image/' . $new)) return;
			$row['image'] = $new;
		
			$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $new . "' WHERE product_id = '" . $product_id ."'");
		}
		
		$rows = $this->getProductImage($product_id);
		if (!empty($rows)) {
			for ($i=0; $i<40; $i++) {
				if (!isset($rows[$i]['image']) or empty($rows[$i]['image'])) break;			
				$app = $this->namePhoto($store, $data, $seo_photo);
				$app = str_replace('hhhhhh', $i+2, $app);
				if ($text) $app = str_replace('gggggg', $text, $app);
				$rows1 = $this->countDopImages($rows[$i]['image']);
				if (!isset($rows1[1]['image'])) {
					$nom = stripos($rows[$i]['image'], ".j");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".png");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".gif");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".bmp");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".PNG");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".GIF");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".BMP");
					if (!$nom) return;
					$se = substr($rows[$i]['image'], $nom);
					$old = '../image/' . $rows[$i]['image'];
					$p = strrpos($rows[$i]['image'], "/");
					if (!$p) return;
					$new = substr($rows[$i]['image'], 0, $p+1);
					$new = $new . $app . $se;			
					if (!file_exists($old)) return;
					if (!rename ($old, '../image/' . $new)) return;					
		
					$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $new . "' WHERE product_image_id = '" . $rows[$i]['product_image_id'] ."'");
				}	
			}
		}
		$table = DB_PREFIX . "poip_option_image";
		$tname = "image";
		if ($this->getColumnName($table, $tname)) {
			$rows = $this->getPhotoPRO($product_id);
			if (!empty($rows)) {
				$n = 1;
				if (isset($i)) $n = $i+2;	
				for ($i=0; $i<900; $i++) {
					if (!isset($rows[$i]['image']) or empty($rows[$i]['image'])) break;			
					$app = $this->namePhoto($store, $data, $seo_photo);
					$app = str_replace('hhhhhh', $i+$n, $app);
					if ($text) $app = str_replace('gggggg', $text, $app);	
					$nom = stripos($rows[$i]['image'], ".j");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".png");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".gif");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".bmp");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".PNG");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".GIF");
					if (!$nom) $nom = stripos($rows[$i]['image'], ".BMP");
					if (!$nom) return;
					$se = substr($rows[$i]['image'], $nom);
					$old = '../image/' . $rows[$i]['image'];
					$p = strrpos($rows[$i]['image'], "/");
					if (!$p) return;
					$new = substr($rows[$i]['image'], 0, $p+1);
					$new = $new . $app . $se;			
					if (!file_exists($old)) return;
					if (!rename ($old, '../image/' . $new)) return;					
		
					$this->db->query("UPDATE " . DB_PREFIX . "poip_option_image SET `image` = '" . $new . "' WHERE product_option_id = '" . $rows[$i]['product_option_id'] ."' and product_option_value_id = '" . $rows[$i]['product_option_value_id'] ."' and image = '" . $rows[$i]['image'] ."' and product_id = '" . $product_id ."'");	
				}
			}
		}
	}
	
	public function DoubleFoto($row) {
		if (empty($row)) return;
		$mas = array();
		$product_id = $row['product_id'];
		$mas[0]['image'] = $row['image'];
		$mas[0]['id'] = '';
	
		$rows = $this->getProductImage($product_id);
		if (empty($rows)) return;		
		$k = 1;
		for ($i=0; $i<40; $i++) {
			if (!isset($rows[$i]['image'])) break;
			$mas[$k]['image'] = $rows[$i]['image'];
			$mas[$k]['id'] = $rows[$i]['product_image_id'];
			$k++;
		}	
		for ($i=0; $i<$k; $i++) {			
			if ($mas[$i]['image'] == "del") continue;
			$hashi = sha1_file('../image/' . $mas[$i]['image']);
			for ($j=0; $j<$k; $j++) {				
				if ($i != $j) {	
					if ($mas[$j]['image'] == "del") continue;
					$hashj = sha1_file('../image/' . $mas[$j]['image']);
	
					if ($hashi == $hashj) {		
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "' and `product_image_id` = '".$mas[$j]['id']."'");
						$mas[$j]['image'] = "del";
					}
				}
			}
		}
		$table = DB_PREFIX . "poip_option_image";
		$tname = "image";
		if ($this->getColumnName($table, $tname)) {
			$rows = $this->getPhotoPRO($product_id);
			if (!empty($rows)) {
				for ($i=0; $i<600; $i++) {
					if (!isset($rows[$i]['image'])) break;
					if ($rows[$i]['image'] == "del") continue;
					$hashi = sha1_file('../image/' . $rows[$i]['image']);
					for ($j=0; $j<600; $j++) {
						if (!isset($rows[$j]['image'])) break;
						if ($i != $j) {	
							if ($rows[$j]['image'] == "del") continue;
							$hashj = sha1_file('../image/' . $rows[$j]['image']);
	
							if ($hashi == $hashj) {		
								$this->db->query("DELETE FROM " . DB_PREFIX . "poip_option_image WHERE `image` = '" . $rows[$j]['image'] . "' and product_id = '" . $product_id ."'");
								$rows[$j]['image'] = "del";
							}
						}
					}
				}
			}	
		}
	}
	
	public function deleteProductWithoutPhoto($row) {
		if (empty($row)) return;
		if (empty($row['image'])) $this->deleteProduct($row['product_id']);
	}	
	
	public function deleteProductWithoutAttribute($product_id) {
		$rows = $this->getAttrib($product_id);
		if (empty($rows)) $this->deleteProduct($product_id);
		
	}
	
	public function DeleteSpecialPrice($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . $product_id . "'");
		
	}
	
	public function DeleteSpecialPriceGroup($product_id, $group) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . $product_id . "' and customer_group_id = '" . $group . "'");
		
	}
	
	public function deleteManufacturer($row) {
		$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `manufacturer_id` = '' WHERE `product_id` = '" . $row['product_id'] . "'");
	}
	
	public function changeManufacturer($row, $manufacturer_idF, $manufacturer_idR) {		
		if ($manufacturer_idF == $manufacturer_idR) return;
		if (empty($manufacturer_idF)) return;
		if (empty($manufacturer_idR)) return;		
		
		if ($row['manufacturer_id'] == $manufacturer_idF) {			
			$query = $this->db->query("UPDATE " . DB_PREFIX . "product SET `manufacturer_id` = '" . $manufacturer_idR . "' WHERE `product_id` = '" . $row['product_id'] . "'");
		}	
	}
	
	public function SendAttributeToFilter($store, $product_id, $attr_name, $filter_group_id, $langs) {		
		$filters = array();
		$attr_name = $this->getName($attr_name);
		$rows = $this->getAttributeID($attr_name);
		if (empty($rows)) return;
		$attribute_id = $rows[0]['attribute_id'];
		$rows = $this->isProductAttribute($product_id, $attribute_id);
		if (empty($rows)) return;
		$data = array();
		if (isset($rows[0]['text']) and !empty($rows[0]['text'])) $data['text1'] = $rows[0]['text'];
		if (isset($rows[1]['text']) and !empty($rows[1]['text'])) $data['text2'] = $rows[1]['text'];
		if (isset($rows[2]['text']) and !empty($rows[2]['text'])) $data['text3'] = $rows[2]['text'];
			
		if (!empty($data) and $filter_group_id) $this->CreateFilter($data, $filter_group_id, $langs, $filters);
		if (!empty($filters)) $this->AttributeToFilter($product_id, $filters);
	}

	public function addToTags($product_id, $find, $replace) {	
		if (empty($find) or empty($replace)) return;		
		$rows = $this->getAttributes($product_id);
		if (empty($rows)) return;
		$f = 0;
		foreach ($rows as $r) {
			if ($r['text'] == $replace) {
				$f = 1;
				break;
			}	
		}
		if ($f) {
			$rows = $this->getProductDesc($product_id);
			if (empty($rows)) return;
			$lang = $this->config->get('config_language_id');
			$tag = $tag . "," . $find;
			
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `tag` = '" . $this->db->escape($tag) . "' WHERE `product_id` = '" . $product_id . "' and `language_id` = '" . $lang. "'");			
		}	
	}

	public function deleteDoubleInAttribute($product_id, $attribute_id) {		
		$rows = $this->isProductAttribute($product_id, $attribute_id);
		if (empty($rows)) return;
		foreach ($rows as $r) {
			$val = explode(',', $r['text']);
			if (count($val) < 2) continue;
			$f = 0;
			for ($i=0; $i<900; $i++) {
				if (!isset($val[$i])) break;
				for ($j=0; $j<900; $j++) {
					if (!isset($val[$j])) break;
					if ($i != $j and $val[$i] == $val[$j] and $val[$i] != "del") {
						$val[$i] = "del";
						$f = 1;
					}	
				}
			}
			if ($f) {
				$text = '';
				$ff = 0;
				for ($i=0; $i<900; $i++) {
					if (!isset($val[$i])) break;
					if ($val[$i] != "del") {
						$text = $text . $val[$i] . ',';
						$ff = 1;
					}	
				}
				if ($ff) {
					$a = strlen($text);
					if ($a) {
						$text = substr($text, 0, $a-1);				
						$query = $this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $text . "' WHERE `product_id` = '" . $product_id . "' AND `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $r['language_id'] . "'");	
					}
				}	
			}
		}	
	}
	
	public function changeAttribute($store, $product_id, $find, $replace) {
		if (empty($find)) return;				
		if ($find == $replace) return;		
		$rows = $this->getAttributeID($find);
		if (empty($rows)) $rows = $this->getAttributeID($this->symbol($find));
		if (empty($rows)) return;		
		$attribute_idF = $rows[0]['attribute_id'];
		$rows1 = $this->isProductAttribute($product_id, $attribute_idF);
		if (empty($rows1)) return;
		if (empty($replace)) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' and attribute_id = '" . $attribute_idF . "'");
			return;
		}		
		
		$rows = $this->getAttributeID($replace);
		if (empty($rows)) $rows = $this->getAttributeID($this->symbol($replace));
		if (empty($rows)) return;
		$attribute_idR = $rows[0]['attribute_id'];		
		$rows = $this->isProductAttribute($product_id, $attribute_idR);
		if (!empty($rows)) {			
			$f = 0;
			for ($i=0; $i<30; $i++) {
				if (!isset($rows[$i]['attribute_id'])) break;
				$f = 1;
				$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $rows1[$i]['text'] . "' WHERE product_id = '" . (int)$product_id . "' AND `attribute_id` = '" . $attribute_idR . "' AND `language_id` = '" . $rows1[$i]['language_id'] . "'");
			}
			if ($f) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' and attribute_id = '" . $attribute_idF . "'");
			}
			return;
		}
		$f = 0;
		for ($i=0; $i<30; $i++) {
			if (!isset($rows1[$i]['attribute_id'])) break;
			$f = 1;
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET `product_id` = '" . (int)$product_id . "', `attribute_id` = '" . $attribute_idR . "', `language_id` = '" . $rows1[$i]['language_id'] . "', `text` = '" . $rows1[$i]['text'] . "'");
		}
		if ($f) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' and attribute_id = '" . $attribute_idF . "'");
		}			
	}
	
	public function FindReplaceSKU($row, $find, $replace) {
		if (empty($find)) return;		
		if (!isset($replace) or empty($replace)) $replace = '';
		$f = 0;
		if (substr_count($row['sku'], $find)) {
			$row['sku'] = str_replace($find, $replace, $row['sku']);
			$f = 1;
		} else {
			$find = $this->symbol($find);
			$find = str_replace('&quot;', '"', $find);
			$replace = $this->symbol($replace);
			if (substr_count($row['sku'], $find)) {
				$row['sku'] = str_replace($find, $replace, $row['sku']);
				$f = 1;
			}	
		}
		if ($f) {
			$query = $this->db->query("UPDATE `" . DB_PREFIX . "product` SET `sku` = '" . $row['sku'] . "' WHERE 	`product_id` = '" . $row['product_id'] . "'");
		}		
	}
	
	public function FindReplaceURL($row, $find, $replace) {
		if (empty($find)) return;		
		$product_id = $row['product_id'];		
		$row = $this->getURL($product_id);
		if (empty($row)) return;
		$seo_url = str_replace($find, $replace, $row['keyword']);
		$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($seo_url) . "' WHERE `query` = 'product_id=" . $product_id . "'");
		
	}
	
	public function deleteDoubleOptions($find) {
		if ($find == '') return;
		$lang = $this->config->get('config_language_id');
		$finds = explode("|", $find);
		$max = count($finds);
		for ($i=0; $i<$max; $i++) {
			$find = $finds[$i];			
			$rows = $this->getOptionsByName($find);
			if (!empty($rows[0]['option_value_id']) and !empty($rows[1]['option_value_id']) and $rows[0]['option_value_id'] != $rows[1]['option_value_id']) {
				$id = $rows[0]['option_value_id'];
				for ($j=1; $j<$max; $j++) {
					$id_old = $rows[$j]['option_value_id'];
					$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `option_value_id` = '" . $id . "' WHERE `option_value_id` = '" . $id_old . "' and `language_id` = '" . $lang . "'");
					
					$this->db->query("DELETE FROM " . DB_PREFIX . "option_value_description WHERE `option_value_id` = '" . $id_old . "'");
					
					$this->db->query("DELETE FROM " . DB_PREFIX . "option_value WHERE `option_value_id` = '" . $id_old . "'");
				}	
			}	
		}	
	}
	
	public function FindReplaceOption($find, $replace) {
		if ($find == '') return;				
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);	
		$max = count($finds);
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j]) or empty($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];	
			$this->db->query("UPDATE " . DB_PREFIX . "option_value_description SET `name` = '" . $this->db->escape($replace). "' WHERE `name` = '" . $this->db->escape($find) . "'");
			$find = $this->symbol($finds[$j]);
			$find = str_replace('&quot;', '"', $find);
			$replace = $this->symbol($replaces[$j]);	
			$this->db->query("UPDATE " . DB_PREFIX . "option_value_description SET `name` = '" . $this->db->escape($replace). "' WHERE `name` = '" . $this->db->escape($find) . "'");
		}	
	}
	
	public function findreplaceAttribute($product_id, $name, $find, $replace) {		
		if (empty($find)) return;		
		$rows = $this->getAttributes($product_id);
		if (empty($rows)) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);
		if (!$name) {
			foreach ($rows as $r) {				
				for ($j=0; $j<$max; $j++) {
					if (!isset($replaces[$j]) or empty($replaces[$j])) $replaces[$j] = '';	
					$find = $finds[$j];
					$replace = $replaces[$j];										
					if (substr_count($r['text'], $find)) {
						$new = str_replace($find, $replace, $r['text']);						
						$lang = $this->config->get('config_language_id');
						$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($new) . "' WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '" . (int)$r['attribute_id'] . "' and `language_id` = '" . $lang . "'");						
					} else {
						$find = $this->symbol($finds[$j]);
						$find = str_replace('&quot;', '"', $find);
						$replace = $this->symbol($replaces[$j]);										
						if (substr_count($r['text'], $find)) {
							$new = str_replace($find, $replace, $r['text']);						
							$lang = $this->config->get('config_language_id');
							$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($new) . "' WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '" . (int)$r['attribute_id'] . "' and `language_id` = '" . $lang . "'");
							break;
						}	
					}
				}
			}	
		} else {
			$rows = $this->getAttributeID($name);
			if (empty($rows)) return;
			$lang = $this->config->get('config_language_id');
			$rows = $this->getAttributeById($product_id, $rows[0]['attribute_id'], $lang);
			if (empty($rows)) return;			
			for ($j=0; $j<$max; $j++) {
				if (!isset($replaces[$j])) $replaces[$j] = '';
				$find = $finds[$j];
				$replace = $replaces[$j];								
				if (substr_count($rows[0]['text'], $find)) {
					$new = str_replace($find, $replace, $rows[0]['text']);					
					$lang = $this->config->get('config_language_id');	
					$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($new). "' WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '" . (int)$rows[0]['attribute_id'] . "' and `language_id` = '" . $lang . "'");				
				} else {
					$find = $this->symbol($finds[$j]);
					$find = str_replace('&quot;', '"', $find);
					$replace = $this->symbol($replaces[$j]);								
					if (substr_count($rows[0]['text'], $find)) {
						$new = str_replace($find, $replace, $rows[0]['text']);					
						$lang = $this->config->get('config_language_id');	
						$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($new). "' WHERE `product_id` = '" . (int)$product_id . "' and `attribute_id` = '" . (int)$rows[0]['attribute_id'] . "' and `language_id` = '" . $lang . "'");
						break;
					}
				}	
			}
		}		
	}
	
	public function shipping($product_id) {
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . 1 . "' WHERE `product_id` = '" . (int)$product_id . "'");
	
	}
	
	public function noshipping($product_id) {
		$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `shipping` = '" . 0 . "' WHERE `product_id` = '" . (int)$product_id . "'");
	
	}
	
	public function deleteProductFilter($product_id, $find, $filter_group_id) {		
		$this->findFilter($find, $filter_group_id, $filter_id);
		if ($filter_id) {
			$this->db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "' and filter_id = '" . $filter_id . "'");
		}		
	}
	
	public function findreplaceKeywords($product_id, $find, $replace) {				
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!isset($rows[0]['meta_keyword'])) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;		
		$newtag = $rows[0]['meta_keyword'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];					
			if (substr_count($newtag, $find)) {
				$newtag = str_replace($find, $replace, $newtag);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);					
				if (substr_count($newtag, $find)) {
					$newtag = str_replace($find, $replace, $newtag);
					$fl = 1;
				}
			}	
		}	
		if ($fl) {
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_keyword` = '" . $this->db->escape($newtag) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		}	
	}
	
	public function findreplaceMetaDesc($product_id, $find, $replace) {		
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!isset($rows[0]['meta_description'])) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;		
		$newmeta = $rows[0]['meta_description'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];						
			if (substr_count($newmeta, $find)) {
				$newmeta = str_replace($find, $replace, $newmeta);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);						
				if (substr_count($newmeta, $find)) {
					$newmeta = str_replace($find, $replace, $newmeta);
					$fl = 1;
				}
			}	
		}
		if ($fl) {
			$newmeta = trim($newmeta);
			$newmeta = preg_replace('| +|', ' ', $newmeta);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `meta_description` = '" . $this->db->escape($newmeta) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		}	
	}
	
	public function findreplaceH1($product_id, $find, $replace) {		
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!isset($rows[0]['seo_h1'])) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;		
		$newh1 = $rows[0]['seo_h1'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];						
			if (substr_count($newh1, $find)) {
				$newh1 = str_replace($find, $replace, $newh1);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);						
				if (substr_count($newh1, $find)) {
					$newh1 = str_replace($find, $replace, $newh1);
					$fl = 1;
				}
			}	
		}
		if ($fl) {
			$newh1 = trim($newh1);
			$newh1 = preg_replace('| +|', ' ', $newh1);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_h1` = '" . $this->db->escape($newh1) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		}	
	}
	
	public function findreplaceTitle($product_id, $find, $replace) {		
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!isset($rows[0]['seo_title'])) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;		
		$newtitle = $rows[0]['seo_title'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];					
			if (substr_count($newtitle, $find)) {
				$newtitle = str_replace($find, $replace, $newtitle);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);					
				if (substr_count($newtitle, $find)) {
					$newtitle = str_replace($find, $replace, $newtitle);
					$fl = 1;
				}
			}	
		}
		if ($fl) {
			$newtitle = trim($newtitle);
			$newtitle = preg_replace('| +|', ' ', $newtitle);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `seo_title` = '" . $this->db->escape($newtitle) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		}	
	}
	
	public function findreplaceName($product_id, $find, $replace) {		
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;
		$newname = $rows[0]['name'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];					
			if (substr_count($newname, $find)) {
				$newname = str_replace($find, $replace, $newname);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);					
				if (substr_count($newname, $find)) {
					$newname = str_replace($find, $replace, $newname);
					$fl = 1;
				}
			}	
		}
		if ($fl) {
			$newname = trim($newname);
			$newname = preg_replace('| +|', ' ', $newname);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = '" . $this->db->escape($newname) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		}	
	}
	
	public function deleteFragmentName($product_id, $find, $replace) {
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$finds = explode("|", $find);		
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;
		$newname = $rows[0]['name'];
		for ($j=0; $j<$max; $j++) {
			if ($finds[$j] == '') continue;
			$find = $finds[$j];
			$replace = $replaces[$j];			
			if (!substr_count($newname, $find)) {
				$find = $this->symbol($find);
				$find = str_replace('&quot;', '"', $find);
			}	
			if ($replace != '' and !substr_count($newname, $replace)) {
				$replace = $this->symbol($replace);
				$replace = str_replace('&quot;', '"', $replace);				
			}	
			if (!substr_count($newname, $find)) continue;
			if ($replace != '' and !substr_count($newname, $replace)) continue;
			$b = strpos($newname, $find);			
			if ($replace != '') {
				$e = strpos($newname, $replace);
				$a = substr($newname, 0, $b);
				$b = substr($newname, $e+strlen($replace));
				$newname = $a . $b;
			} else $newname = substr($newname, 0, $b);
			
			$fl = 1;
		}
		if ($fl) {
			$newname = trim($newname);
			$newname = preg_replace('| +|', ' ', $newname);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `name` = '" . $this->db->escape($newname) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		
		}	
	}
	
	public function deleteFragmentDescr($product_id, $find, $replace) {
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$finds = explode("|", $find);		
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;
		$newdesc = $rows[0]['description'];
		for ($j=0; $j<$max; $j++) {
			if ($finds[$j] == '') continue;
			$find = $finds[$j];
			$replace = $replaces[$j];			
			if (!substr_count($newdesc, $find)) {
				$find = $this->symbol($find);
				$find = str_replace('&quot;', '"', $find);
			}	
			if ($replace != '' and !substr_count($newdesc, $replace)) {
				$replace = $this->symbol($replace);
				$replace = str_replace('&quot;', '"', $replace);				
			}	
			if (!substr_count($newdesc, $find)) continue;
			if ($replace != '' and !substr_count($newdesc, $replace)) continue;
			$b = strpos($newdesc, $find);			
			if ($replace != '') {
				$e = strpos($newdesc, $replace);
				$a = substr($newdesc, 0, $b);
				$b = substr($newdesc, $e+strlen($replace));
				$newdesc = $a . $b;
			} else $newdesc = substr($newdesc, 0, $b);
			
			$fl = 1;
		}
		if ($fl) {
			$newdesc = trim($newdesc);
			$newdesc = preg_replace('| +|', ' ', $newdesc);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($newdesc) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");		
		
		}	
	}
	
	public function findreplaceDescription($product_id, $find, $replace) {		
		if ($find == '') return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		$finds = explode("|", $find);
		$replaces = explode("|", $replace);
		$max = count($finds);		
		$fl = 0;
		$newdesc = $rows[0]['description'];
		for ($j=0; $j<$max; $j++) {
			if (!isset($replaces[$j])) $replaces[$j] = '';
			$find = $finds[$j];
			$replace = $replaces[$j];			
			if (substr_count($newdesc, $find)) {
				$newdesc = str_replace($find, $replace, $newdesc);
				$fl = 1;
			} else {
				$find = $this->symbol($finds[$j]);
				$find = str_replace('&quot;', '"', $find);
				$replace = $this->symbol($replaces[$j]);			
				if (substr_count($newdesc, $find)) {
					$newdesc = str_replace($find, $replace, $newdesc);
					$fl = 1;
				}
			}	
		}
		if ($fl) {
			$newdesc = trim($newdesc);
			$newdesc = preg_replace('| +|', ' ', $newdesc);
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $this->db->escape($newdesc) . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");				
		
		}	
	}

	public function shortDescription($product_id, $find) {
		if (empty($find)) return;
		$rows = $this->getProductDesc($product_id);
		if (empty($rows)) return;
		if (!preg_match('/[0-9]+$/', $find)) return;
		$st = $this->TransLit($rows[0]['description']);
		$st = trim(strip_tags($st));
		
		if (strlen($st) < $find) {
			$newdesc = '';
			$lang = $this->config->get('config_language_id');
			$this->db->query("UPDATE " . DB_PREFIX . "product_description SET `description` = '" . $newdesc . "' WHERE `product_id` = '" .(int)$product_id . "' and `language_id` = '" . $lang. "'");
		}
	}
	
	public function redirect($product_id, $new_prefix) {
		$ds = date('Y-m-d');
		$de = '2034-00-00';
		$tu = 622080000;
		$active = 1;		
		$pref = HTTP_CATALOG;
		$m = explode ("+", $new_prefix);
		$new_pref = $m[0];		
		$en = '';
		if (substr_count($new_prefix, 'htm')) $en = '.htm';
		if (substr_count($new_prefix, 'html')) $en = '.html';
		$u = 0;
		if (substr_count($new_prefix, 'url')) $u = 1;	
		$row = $this->getURL($product_id);		
		if (!empty($row)) {
			$from_url = $pref.$row['keyword'].'.html';			
			$to_url = $new_pref;
			if ($u) $to_url = $to_url.$row['keyword'];
			if (!empty($en) and !substr_count($new_prefix, '.htm')) $to_url = $to_url.$en;			
			
			$row = $this->getRedirect($product_id);
			if (!empty($row)) {
				$this->db->query("UPDATE " . DB_PREFIX . "redirect SET `active` = '" . $active . "', `from_url` = '" . $from_url . "', `to_url` = '" . $to_url . "', `response_code` = 301, `date_start` = '" . $ds . "', `date_end` = '" . $de . "', `times_used` = '" . $tu . "' WHERE `product_id` = '" .(int)$product_id . "'");
			} else {
				$this->db->query("INSERT " . DB_PREFIX . "redirect SET `active` = '" . $active . "', `from_url` = '" . $from_url . "', `to_url` = '" . $to_url . "', `response_code` = 301, `date_start` = '" . $ds . "', `date_end` = '" . $de . "', `times_used` = '" . $tu . "', `product_id` = '" .(int)$product_id . "'");
			}
		}
	}
	
	public function minimum($product_id, $find) {
		if (empty($find)) return;
		$rows = $this->getProductsByID($product_id);
		if (empty($rows)) return;
		if (!preg_match('/[0-9]+$/', $find)) return;
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `minimum` = '" . $find . "' WHERE `product_id` = '" .(int)$product_id . "'");
	}
	
	public function changeEmptyPhoto($row, $change) {
		$product_id = $row['product_id'];
		$photo = "../image/" . $row['image'];
		if (empty($row['image']) or !file_exists($photo) or @getimagesize($photo)<500 or substr_count($row['image'], 'no_photo')) {
			if (substr_count($change, 'image/') or substr_count($change, 'data/') or substr_count($change, 'catalog/')) {
				$f = 0;
				$p = strpos($change, "mage/");
				if ($p) {
					$change = substr($change, $p+5);
					$f = 1;
				} else {
					$p = strpos($change, "atalog/");
					if ($p) {
						$change = substr($change, $p-1);
						$f = 1;
					} else {
						$p = strpos($change, "ata/");
						if ($p) {
							$change = substr($change, $p-1);
							$f = 1;
						}
					}
				}	
				if ($f) {
					$row['image'] = $change;
					$this->upProduct($row);
				}
			}
		}	
	}
	
	public function mainPhotoChangeBest($row) {
		$product_id = $row['product_id'];
		$rows = $this->getProductImage($product_id);
		if (empty($rows)) return;		
		$photo = "../image/" . $rows[0]['image'];
		$product_image_id = 0;
		$image = '';
		if (file_exists($photo) and @getimagesize($photo)) {
			$product_image_id = $rows[0]['product_image_id'];
			$image = $rows[0]['image'];
			$sizeo = @getimagesize($photo);
			$vol = filesize($photo);
			$po = $vol/$sizeo[0]/$sizeo[1];
			$po = round($po, 2);
			$maxo = $sizeo[0];
			if ($maxo < $sizeo[1]) $maxo = $sizeo[1];
			for ($j=1; $j<=30; $j++) {
				if (!isset($rows[$j]['image'])) break;
				$photo = "../image/" . $rows[$j]['image'];
				if (file_exists($photo) and @getimagesize($photo)) {
					$sizen = @getimagesize($photo);
					$vol = filesize($photo);
					$pn = $vol/$sizen[0]/$sizen[1];
					$pn = round($pn, 2);
					$maxn = $sizen[0];
					if ($maxn < $sizen[1]) $maxn = $sizen[1];
					$rn = $maxn/$maxo + sqrt($pn/$po);
					$ro = $maxo/$maxn + sqrt($po/$pn);
					if ($rn > $ro) {
						$po = $pn;
						$maxo = $maxn;
						$product_image_id = $rows[$j]['product_image_id'];
						$image = $rows[$j]['image'];
					}	
				}
			}	
		}
		if ($product_image_id) {
			$photo = "../image/" . $row['image'];
			$f = 0;
			if (file_exists($photo) and @getimagesize($photo)) {
				$sizen = @getimagesize($photo);
				$vol = filesize($photo);
				$pn = $vol/$sizen[0]/$sizen[1];
				$pn = round($pn, 2);
				$maxn = $sizen[0];
				if ($maxn < $sizen[1]) $maxn = $sizen[1];
				$rn = $maxn/$maxo + sqrt($pn/$po);
				$ro = $maxo/$maxn + sqrt($po/$pn);
				if ($rn <= $ro) $f = 1;					
			}
			if ($f) {			
				$row['image'] = $image;
				$this->upProduct($row);
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_image_id = '" . (int)$product_image_id . "'");
			}	
		}		
	}	
	
	public function sortsortPhoto($row) {
		$product_id = $row['product_id'];
		$p = strrpos($row['model'], "-");
		if (!$p) $p = strrpos($row['model'], "~");
		$id = substr($row['model'], 0, $p);
		if (strlen($id) < 2) return;
		$papka = substr($row['model'], $p-2, 1);
		
		$p = strrpos($row['image'], "/");
		$a = substr($row['image'], $p-4);	
		if (substr_count($a, "/") < 3) {
			$path_old = "../image/" . $row['image'];			
			if ($p) {
				$b = substr($row['image'], 0, $p);
				$e = substr($row['image'], $p+1);
				$addr_new = $b . "/" . $papka . "/" . $e;
				$path = "../image/" . $b . "/" . $papka . "/";
				$path_new = $path . $e;
				if (!is_dir($path)) @mkdir($path, 0755);					
				$a = @copy ($path_old, $path_new);
				if ($a) {
					$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $this->db->escape($addr_new) . "' WHERE `product_id` = '" . $product_id . "'");
					
					if (file_exists($path_old)) @unlink ($path_old);
					
				} else {
					$err = " Photo: " . $path_old . " not copied to " . $path_new . " Product_ID: " . $product_id . " \n";
					$this->adderr($err);
				}
			}	
		}
		
		$rows = $this->getProductImage($product_id);
		if (!empty($rows)) {
			for ($j=0; $j<30; $j++) {
				if (!isset($rows[$j]['image'])) break;
				$p = strrpos($row['image'], "/");
				$a = substr($row['image'], $p-4);
				if (substr_count($a, "/") < 3) {
					$path_old = "../image/" . $rows[$j]['image'];					
					if ($p) {
						$b = substr($rows[$j]['image'], 0, $p);
						$e = substr($rows[$j]['image'], $p+1);
						$addr_new = $b . "/" . $papka . "/" . $e;
						$path = "../image/" . $b . "/" . $papka . "/";
						$path_new = $path . $e;
						if (!is_dir($path)) @mkdir($path, 0755);							
						if (@copy($path_old, $path_new)) {								
							$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $this->db->escape($addr_new) . "' WHERE `product_image_id` = '" . $rows[$j]['product_image_id'] . "'");
							
							if (file_exists($path_old)) @unlink ($path_old);
							
						} else {
							$err = " Photo: " . $path_old . " not copied to " . $path_new . " Product_ID: " . $product_id . " \n";
							$this->adderr($err);
						}
					}	
				}
			}
		}	
		return 0;
	}
	
	public function sortPhoto($row) {
		$product_id = $row['product_id'];
		$p = strrpos($row['model'], "-");
		if (!$p) $p = strrpos($row['model'], "~");
		$papka = substr($row['model'], $p-1, 1);
		$a = substr_count($row['image'], "/0/");
		if (!$a) $a = substr_count($row['image'], "/1/");
		if (!$a) $a = substr_count($row['image'], "/2/");
		if (!$a) $a = substr_count($row['image'], "/3/");
		if (!$a) $a = substr_count($row['image'], "/4/");
		if (!$a) $a = substr_count($row['image'], "/5/");
		if (!$a) $a = substr_count($row['image'], "/6/");
		if (!$a) $a = substr_count($row['image'], "/7/");
		if (!$a) $a = substr_count($row['image'], "/8/");
		if (!$a) $a = substr_count($row['image'], "/9/");
		if (!$a) {
			$path_old = "../image/" . $row['image'];
			$p = strrpos($row['image'], "/");
			if ($p) {
				$b = substr($row['image'], 0, $p);
				$e = substr($row['image'], $p+1);
				$addr_new = $b . "/" . $papka . "/" . $e;
				$path = "../image/" . $b . "/" . $papka . "/";
				$path_new = $path . $e;
				if (!is_dir($path)) @mkdir($path, 0755);					
				$a = @copy ($path_old, $path_new);
				if ($a) {
					$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" . $this->db->escape($addr_new) . "' WHERE `product_id` = '" . $product_id . "'");
					
					if (file_exists($path_old)) @unlink ($path_old);
					
				} else {
					$err = " Photo: " . $path_old . " not copied to " . $path_new . " Product_ID: " . $product_id . " \n";
					$this->adderr($err);
				}
			}	
		}
		
		$rows = $this->getProductImage($product_id);
		if (!empty($rows)) {
			for ($j=0; $j<30; $j++) {
				if (!isset($rows[$j]['image'])) break;
				$a = substr_count($rows[$j]['image'], "/0/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/1/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/2/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/3/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/4/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/5/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/6/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/7/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/8/");
				if (!$a) $a = substr_count($rows[$j]['image'], "/9/");
				if (!$a) {
					$path_old = "../image/" . $rows[$j]['image'];
					$p = strrpos($rows[$j]['image'], "/");
					if ($p) {
						$b = substr($rows[$j]['image'], 0, $p);
						$e = substr($rows[$j]['image'], $p+1);
						$addr_new = $b . "/" . $papka . "/" . $e;
						$path = "../image/" . $b . "/" . $papka . "/";
						$path_new = $path . $e;
						if (!is_dir($path)) @mkdir($path, 0755);							
						if (@copy($path_old, $path_new)) {								
							$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" . $this->db->escape($addr_new) . "' WHERE `product_image_id` = '" . $rows[$j]['product_image_id'] . "'");
							
							if (file_exists($path_old)) @unlink ($path_old);
							
						} else {
							$err = " Photo: " . $path_old . " not copied to " . $path_new . " Product_ID: " . $product_id . " \n";
							$this->adderr($err);
						}
					}	
				}
			}
		}	
		return 0;
	}
	
	public function clearBonus($row) {
		$product_id = $row['product_id'];
		for ($j=1; $j<20; $j++) {			
			$this->deleteBonus1($j, $product_id);
		}
	}	
	
	public function changeQuantity($row, $old, $new) {
		if ($old == '' or $new == '') return;
		$oldg = 0;
		$oldl = 0;
		$newg = 0;
		$newl = 0;
		if (substr_count($old, "&gt;")) $oldg = 1;
		if (substr_count($old, "&lt;")) $oldl = 1;
		if (substr_count($new, "&gt;")) $newg = 1;
		if (substr_count($new, "&lt;")) $newl = 1;
		$old = preg_replace('/[^0-9]/','',$old);
		$old = trim($old);
		$new = preg_replace('/[^0-9]/','',$new);
		$new = trim($new);
		$f = 0;
		if ($oldg and $row['quantity'] > $old) $f = 1;
		if ($oldl and $row['quantity'] < $old) $f = 1;
		if (!$oldg and $row['quantity'] == $old) $f = 1;
		
		if ($f) {
			if ($newg) $row['quantity'] = $new+1;
			else if ($newl) $row['quantity'] = $new-1;
				 else $row['quantity'] = $new;
			$this ->upproduct($row);			
		}	
	}
	
	public function renameFolder($row, $source, $target) {	
		if (empty($source) or empty($target)) return;
		$row['image'] = str_replace($source, $target, $row['image']);
			
		$this->db->query("UPDATE " . DB_PREFIX . "product SET `image` = '" .$row['image']. "' WHERE `product_id` = '" . $row['product_id'] . "'");
		
		$rows = $this->getProductImage($row['product_id']);		
		if (!empty($rows)) {
			for ($j=0; $j<30; $j++) {
				if (!isset($rows[$j]['image'])) break;
				$rows[$j]['image'] = str_replace($source, $target, $rows[$j]['image']);
				$this->db->query("UPDATE " . DB_PREFIX . "product_image SET `image` = '" .$rows[$j]['image']. "' WHERE `product_image_id` = '" . $rows[$j]['product_image_id'] . "'");
				
			}
		}				
	}
	
	public function DeletePhoto($product_id) {
		$path = "../image1/";
		if (!is_dir($path)) return 29;
		$rows = $this->getProductsByID($product_id);
		if (!empty($rows) and !empty($rows[0]['image'])) {
			$path_old = "../image/" . $rows[0]['image'];
			$path_new = "../image1/" . $rows[0]['image'];
			$a = copy ($path_old, $path_new);
			if (!$a) {
				$err = " Photo: " . $path_old . " not copied. Product_ID: " . $product_id . " \n";
				$this->adderr($err);
			}
		}	
		$rows = $this->getProductImage($product_id);
		if (!empty($rows)) {
			foreach ($rows as $r) {
				if (!empty($r['image'])) {
					$path_old = "../image/" . $r['image'];
					$path_new = "../image1/" . $r['image'];
					$a = copy ($path_old, $path_new);
					if (!$a) {
						$err = " Photo: " . $path_old . " not copied. Product_ID: " . $product_id . " \n";
						$this->adderr($err);
					}	
				}
			}
		}
		$table = DB_PREFIX . "poip_option_image";
		$tname = "image";
		if ($this->getColumnName($table, $tname)) {
			$rows = $this->getPhotoPRO($product_id);
			if (!empty($rows)) {
				foreach ($rows as $r) {
					if (!empty($r['image'])) {
						$path_old = "../image/" . $r['image'];
						$path_new = "../image1/" . $r['image'];
						$a = copy ($path_old, $path_new);
						if (!$a) {
							$err = " Photo: " . $path_old . " not copied. Product_ID: " . $product_id . " \n";
							$this->adderr($err);
						}	
					}
				}
			}
		}	
		
		return 0;
	}
	
	public function importAtt($product_id, &$masatt) {	
		$lang = $this->config->get('config_language_id');
		for ($i=0; $i<5000; $i++) {	
			if (!isset($masatt[$i][1])) break;
			$masatt[$i][1] = $this->getName($masatt[$i][1]);
			$rows = $this->getAttributeID($masatt[$i][1]);	
			if (!empty($rows)) {
				$attribute_id = $rows[0]['attribute_id'];	
				$rows = $this->getAttributeById($product_id, $attribute_id, $lang);
				if (!empty($rows)) {	
					if (isset($masatt[$i][2]) and !empty($masatt[$i][2]) and $masatt[$i][2] != "0" and ($masatt[$i][1] != $masatt[$i][2])) {						
						$masatt[$i][2] = $this->getName($masatt[$i][2]);
						$this->db->query("UPDATE " . DB_PREFIX . "attribute_description SET `name` = '" . $this->db->escape($masatt[$i][2]) . "' WHERE `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang. "'");
				
						$this->cache->delete('attribute');
					}	
					for ($j=4; $j<2000; $j=$j+2) {	
						if (empty($masatt[$i][$j-1])) break;						
						if (isset($masatt[$i][$j]) and $masatt[$i][$j] != "") {
							
							$masatt[$i][$j] = $this->getName($masatt[$i][$j]);
							if ($masatt[$i][$j] == "0") {		
								$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE text = '" . $this->db->escape($masatt[$i][$j-1]) . "' and `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang. "' and `product_id` = '" . $product_id. "'");		
							} else {
								$m = $masatt[$i][$j-1];								
								$this->db->query("UPDATE " . DB_PREFIX . "product_attribute SET `text` = '" . $this->db->escape($masatt[$i][$j]) . "' WHERE `attribute_id` = '" . $attribute_id . "' and `language_id` = '" . $lang. "' and `product_id` = '" . $product_id. "' and `text` = '" . $this->db->escape($m) ."'");		
							}	
						}	
					}
					$this->cache->delete('product');
				}
			}
		}	
	}
	
	public function exportForm($form_id) {
		$form = array();
		$rows = $this->getMySuppler($form_id);
		$form['name'] = "Supplier Form";
		$form['suppler_id']	  = $rows[0]['suppler_id'];
		$form['rate']     = $rows[0]['rate'];
		$form['ratep']     = $rows[0]['ratep'];
		$form['ratek'] = $rows[0]['ratek'];
		$form['cod']      = $rows[0]['cod'];
		$form['related']  = $rows[0]['related'];
		$form['sort_order'] 	  = $rows[0]['sort_order'];
		$form['item']     = $rows[0]['item'];
		$form['cat']      = $rows[0]['cat'];			
		$form['qu']       = $rows[0]['qu'];
		$form['price']    = $rows[0]['price'];
		$form['qu']    	= $rows[0]['qu'];
		$form['descrip']  = $rows[0]['descrip'];
		$form['pic_ext']  = $rows[0]['pic_ext'];
		$form['manuf']    = $rows[0]['manuf'];
		$form['warranty'] = $rows[0]['warranty'];
		$form['sku2'] 	  = $rows[0]['sku2'];
		$form['ad']       = $rows[0]['ad'];			
		$form['status']   = $rows[0]['status'];
		$form['my_cat']   = $rows[0]['my_cat'];
		$form['my_qu']    = $rows[0]['my_qu'];
		$form['my_price'] = $rows[0]['my_price'];
		$form['my_descrip'] = $rows[0]['my_descrip'];
		$form['my_manuf'] = $rows[0]['my_manuf'];
		$form['my_photo']  = $rows[0]['my_photo'];
		$form['cheap']   = $rows[0]['cheap'];
		$form['my_mark']  = $rows[0]['my_mark'];
		$form['weight']  = $rows[0]['weight'];
		$form['length']  = $rows[0]['length'];
		$form['width']  = $rows[0]['width'];
		$form['height']  = $rows[0]['height'];
		$form['parent']  = $rows[0]['parent'];
		$form['hide']  = $rows[0]['hide'];
		$form['newphoto'] = $rows[0]['newphoto'];
		$form['addopt'] = $rows[0]['addopt'];
		$form['addseo'] = $rows[0]['addseo'];
		$form['importseo'] = $rows[0]['importseo'];
		$form['updte']  = $rows[0]['updte'];
		$form['pmanuf']  = $rows[0]['pmanuf'];
		$form['upattr'] = $rows[0]['upattr'];
		$form['upopt'] = $rows[0]['upopt'];
		$form['upname'] = $rows[0]['upname'];
		$form['myplus'] = $rows[0]['myplus'];			
		$form['cprice'] = $rows[0]['cprice'];
		$form['minus'] = $rows[0]['minus'];
		$form['chcode'] = $rows[0]['chcode'];
		$form['sorder'] = $rows[0]['sorder'];
		$form['spec'] = $rows[0]['spec'];
		$form['upurl'] = $rows[0]['upurl'];
		$form['ref'] = $rows[0]['ref'];
		$form['ref1'] = $rows[0]['ref1'];
		$form['addattr'] = $rows[0]['addattr'];
		$form['exsame'] = $rows[0]['exsame'];
		$form['parss'] = $rows[0]['parss'];
		$form['points'] = $rows[0]['points'];
		$form['places'] = $rows[0]['places'];
		$form['parsi'] = $rows[0]['parsi'];
		$form['pointi'] = $rows[0]['pointi'];
		$form['placei'] = $rows[0]['placei'];
		$form['parsc'] = $rows[0]['parsc'];
		$form['pointc'] = $rows[0]['pointc'];
		$form['placec'] = $rows[0]['placec'];
		$form['parsp'] = $rows[0]['parsp'];
		$form['pointp'] = $rows[0]['pointp'];			
		$form['placep'] = $rows[0]['placep'];
		$form['parsd'] = $rows[0]['parsd'];
		$form['pointd'] = $rows[0]['pointd'];
		$form['placed'] = $rows[0]['placed'];
		$form['parsm'] = $rows[0]['parsm'];
		$form['pointm'] = $rows[0]['pointm'];
		$form['placem'] = $rows[0]['placem'];
		$form['parsk'] = $rows[0]['parsk'];
		$form['parsq'] = $rows[0]['parsq'];
		$form['pointq'] = $rows[0]['pointq'];
		$form['placeq'] = $rows[0]['placeq'];
		$form['kmenu'] = $rows[0]['kmenu'];
		$form['bprice'] = $rows[0]['bprice'];
		$form['catcreate'] = $rows[0]['catcreate'];
		$form['stay']	 = $rows[0]['stay'];
		$form['joen']	 = $rows[0]['joen'];
		$form['off']	 = $rows[0]['off'];
		$form['umanuf']  = $rows[0]['umanuf'];
		$form['onn']	 = $rows[0]['onn'];
		$form['refer']  = $rows[0]['refer'];
		$form['disc']  = $rows[0]['disc'];
		$form['upc']  = $rows[0]['upc'];
		$form['ean']  = $rows[0]['ean'];
		$form['mpn']  = $rows[0]['mpn'];
		$form['newurl']  = $rows[0]['newurl'];
		$form['ddata']  = $rows[0]['ddata'];
		$form['bonus']  = $rows[0]['bonus'];
		$form['ddesc']  = $rows[0]['ddesc'];
		$form['qu_discount'] = $rows[0]['qu_discount'];
		$form['plusopt']  = $rows[0]['plusopt'];
		$form['idcat']  = $rows[0]['idcat'];
		$form['termin']  = $rows[0]['termin'];
		$form['t_status'] = $rows[0]['t_status'];
		$form['t_ref'] = $rows[0]['t_ref'];
		$form['t_ref1']  = $rows[0]['t_ref1'];
		$form['onoff']  = $rows[0]['onoff'];
		$form['main']  = $rows[0]['main'];
		$form['zero']  = $rows[0]['zero'];
		$form['metka']  = $rows[0]['metka'];
		$form['jopt']  = $rows[0]['jopt'];
		$form['optsku']  = $rows[0]['optsku'];
		$form['newproduct']  = $rows[0]['newproduct'];			
		$form['opt_fotos'] = $rows[0]['opt_fotos'];
		$form['opt_prices'] = $rows[0]['opt_prices'];
		$form['usd']         = $rows[0]['usd']; 
		$form['sleep']  = $rows[0]['sleep'];
		$form['ffile']	= $rows[0]['ffile'];
		$form['serie']	= $rows[0]['serie'];
		$form['rprice']	= $rows[0]['rprice'];
		$form['subfolder']	= $rows[0]['subfolder'];
		$form['delimiter']	= $rows[0]['delimiter'];
		$form['skuprefix']	= $rows[0]['skuprefix'];
		$form['formdate']	= $rows[0]['formdate'];
	
		$rows  = $this->getSupplerData($form_id);
		for ($i=0; $i<3; $i++) {
			$form['cat_ext'][$i] = '';
			$form['category_id'][$i] = 0;
			$form['pic_int'][$i] = '';
			$form['cat_plus'][$i] = '';		
		}	
		$i = 3;
		foreach ($rows as $value) {					
			$form['cat_ext'][$i] = $value['cat_ext'];
			$form['category_id'][$i] = $value['category_id'];
			$form['pic_int'][$i] = $value['pic_int'];
			$form['cat_plus'][$i] = $value['cat_plus'];
			$i++;
		}
	
		$rows  = $this->getSupplerAttributes($form_id);
		for ($i=0; $i<3; $i++) {			
			$form['attr_ext'][$i] = '';
			$form['attr_point'][$i] = '';
			$form['attribute_id'][$i] = 0;
			$form['tags'][$i] = 0;
			$form['filter_group_id'][$i]= 0;
		}
		$i = 3;
		foreach ($rows as $value) {				
			$form['attr_ext'][$i] = $value['attr_ext'];
			$form['attr_point'][$i] = $value['attr_point'];
			$form['attribute_id'][$i] = $value['attribute_id'];
			$form['tags'][$i] = $value['tags'];
			$form['filter_group_id'][$i]= $value['filter_group_id'];
			$i++;
		}	
		
		$rows  = $this->getSupplerOptions($form_id);
		$form['option_id'][0] = 0;
		$form['opt'][0] = '';
		$form['opt_point'][0] = '';
		$form['ko'][0] = 0;
		$form['po'][0] = 0;
		$form['pr'][0] = 0;
		$form['we'][0] = 0;
		$form['art'][0] = '';
		$form['foto'][0] = '';
		$form['option_required'][0] = '';
		$form['opt_pref'][0] = 0;
		$form['opt_margin'][0] = 0;		
		$i = 1;
		foreach ($rows as $value) {		
			$form['option_id'][$i] = $value['option_id'];
			$form['opt'][$i] = $value['opt'];
			$form['opt_point'][$i] = $value['opt_point'];
			$form['ko'][$i] = $value['ko'];
			$form['po'][$i] = $value['po'];
			$form['pr'][$i] = $value['pr'];
			$form['we'][$i] = $value['we'];
			$form['art'][$i] = $value['art'];
			$form['foto'][$i] = $value['foto'];
			$form['option_required'][$i] = $value['option_required'];
			$form['opt_pref'][$i] = $value['opt_pref'];
			$form['opt_margin'][$i] = $value['opt_margin'];				
			$i++;
		}
		
		
		$rows  = $this->getSupplerPrice($form_id);
		$form['nom'][0] = '';
		$form['ident'][0] = '';
		$form['mratek'][0] = '';
		$form['param'][0] = '';
		$form['point'][0] = '';
		$form['noprice'][0] = '';
		$form['paramnp'][0] = '';
		$form['pointnp'][0] = '';
		$form['baseprice'][0] = '';
		$i = 1;
		foreach ($rows as $value) {								
			$form['nom'][$i] = $value['nom'];
			$form['ident'][$i] = $value['ident'];
			$form['mratek'][$i] = $value['mratek'];
			$form['param'][$i] = $value['param'];
			$form['point'][$i] = $value['point'];
			$form['noprice'][$i] = $value['noprice'];
			$form['paramnp'][$i] = $value['paramnp'];
			$form['pointnp'][$i] = $value['pointnp'];
			$form['baseprice'][$i] = $value['baseprice'];				
			$i++;
		}
	
		$rows = $this->getSuppler_SEO($form_id);
		$form['prod_photo'] = $rows[0]['prod_photo'];
		$form['prod_h1'] = $rows[0]['prod_h1'];	
		$form['prod_title'] = $rows[0]['prod_title'];		
		$form['prod_meta_desc'] = $rows[0]['prod_meta_desc'];		
		$form['prod_desc'] = $rows[0]['prod_desc'];
		$form['prod_keyword'] = $rows[0]['prod_keyword'];
		$form['prod_url'] = $rows[0]['prod_url'];
		$form['cat_title'] = $rows[0]['cat_title'];		
		$form['cat_meta_desc'] = $rows[0]['cat_meta_desc'];		
		$form['cat_desc'] = $rows[0]['cat_desc'];		
		$form['manuf_title'] = $rows[0]['manuf_title'];		
		$form['manuf_meta_desc'] = $rows[0]['manuf_meta_desc'];		
		$form['manuf_desc'] = $rows[0]['manuf_desc'];
		$form['seo_1'] = $rows[0]['seo_1'];
		$form['seo_2'] = $rows[0]['seo_2'];
		$form['seo_3'] = $rows[0]['seo_3'];
		$form['seo_4'] = $rows[0]['seo_4'];
		$form['seo_5'] = $rows[0]['seo_5'];
		$form['seo_6'] = $rows[0]['seo_6'];		
		$form['seo_7'] = $rows[0]['seo_7'];
		$form['seo_8'] = $rows[0]['seo_8'];
		$form['seo_9'] = $rows[0]['seo_9'];
		$form['seo_10'] = $rows[0]['seo_10'];
		$form['seo_11'] = $rows[0]['seo_11'];
		$form['seo_12'] = $rows[0]['seo_12'];		
		$form['seo_13'] = $rows[0]['seo_13'];
		$form['seo_14'] = $rows[0]['seo_14'];
		$form['seo_15'] = $rows[0]['seo_15'];
		$form['seo_16'] = $rows[0]['seo_16'];
		$form['seo_17'] = $rows[0]['seo_17'];		
		$form['seo_18'] = $rows[0]['seo_18'];
		$form['seo_19'] = $rows[0]['seo_19'];
		$form['seo_20'] = $rows[0]['seo_20'];

		$file_table = "./uploads/form.tmp";
		$tab = fopen($file_table,'w+b');
		$str_table = serialize($form);
		if (fwrite($tab, $str_table) === false) {
			@fclose($tab);
			return 35;
		}	
		@fclose($tab);
	}	
	
	public function exportAtt($product_id, &$masatt) {
		$rows = $this->getAttributes($product_id);
		if (!empty($rows)) {
			foreach ($rows as $r) {				
				$f = 0;
				for ($i=0; $i<30000; $i++) {
					if (!isset($masatt[$i][0])) break;
					if ($r['attribute_id'] == (int)$masatt[$i][0]) {
						$f = 1;
						break;
					}
				}
				if (!$f) {					
					$rows1 = $this->getAttributeName($r['attribute_id']);	
					if (!empty($rows1)) {
						$masatt[$i][0] = $r['attribute_id'];
						$masatt[$i][1] = $rows1[0]['name'];
					} else {			
						$this->DelAttributeInProduct($product_id, $r['attribute_id'], $this->config->get('config_language_id'));
						continue;
					}
					
				}	
				$f = 0;	
				for ($j=2; $j<801; $j++) {
					if (!isset($masatt[$i][$j])) break;
					if ($r['text'] == $masatt[$i][$j]) {
						$f = 1;
						break;
					}
				}				
				if (!$f) $masatt[$i][$j] = $r['text'];	
			}			
		}		
	}
	
	public function changeAtt($masatt, &$r, &$name, &$value) {	
		if (!isset($masatt[1][1]) or empty($masatt[1][1])) return;
		if (!$r and empty($name)) return;
		$name = str_replace("-&gt;", "->", $name);
		$names =  mb_split('->', $name);
		$n = $name;
		if (count($names) > 1) $n = $names[1];
		if (!$r) {
			for ($i=1; $i<5000; $i++) {	
				if (!isset($masatt[$i][1])) break;
				if ($this->getName($masatt[$i][1]) == $n) {	$r = $i; break; }	
			}
		}
		if (!$r) return;		
		
		if (!empty($masatt[$r][2])) $name = $this->getName($masatt[$r][2]);
		if (count($names) > 1) $name = $names[0] . "->" . $name;
		
		if (!empty($value)) {			
			for ($j=3; $j<2000; $j=$j+2) {	
				if (!isset($masatt[$r][$j]) or empty($masatt[$r][$j])) break;						
				if (isset($masatt[$r][$j+1]) and $masatt[$r][$j+1] != "") $value = $this->symbol($masatt[$r][$j+1]);
			}		
		}	
	}	
	
	public function Convert($product_id, $mas_con, $text) {
		$rows = $this->getProductDesc($product_id);
		if ($rows) {
			$newdesc = $rows[0]['description'];	
			if (strlen($newdesc) < 5) return;
			$j=0;			
			while (1) {
				if (!isset($mas_con[$j][1])) break;				
				for ($k=0; $k<10; $k++) {
					$find = $mas_con[$j][1] . " ";	
					if (!substr_count($newdesc, $find)) {
						$find = $mas_con[$j][1] . "&";
						if (!substr_count($newdesc, $find)) {
							$find = $mas_con[$j][1] . "<";
							if (!substr_count($newdesc, $find)) {
								$find = $mas_con[$j][1] . ".";
								if (!substr_count($newdesc, $find)) break;
							}
						}	
					}

					$text = '';
					if (isset($mas_con[$j][3])) $text = $mas_con[$j][3];					
					if (!empty($text)) {
						while (1) {						
							$pe = 0;
							if (!substr_count($text, "[")) break;
							$pb = strpos($text, "[");						
							$pe = strpos($text, "]");
							if (!$pe) break;
							$n = substr($text, $pb, $pe-$pb+1);
							if (substr_count($n, "|")) {
								$m = substr($n, 1, strlen($n)-2);
								$mm = explode("|", $m);						
								$t = $mm[rand(0, count($mm)-1)];
								$text = str_replace($n, $t, $text);							
							} else break;	
						}
					}	
					$find = $mas_con[$j][1];
					$replace = $mas_con[$j][2];					
					while (1) {						
						$pe = 0;
						if (!substr_count($replace, "[")) break;
						$pb = strpos($replace, "[");					
						$pe = strpos($replace, "]");
						if (!$pe) break;
						$n = substr($replace, $pb, $pe-$pb+1);
						if (substr_count($n, "|")) {
							$m = substr($n, 1, strlen($n)-2);
							$mm = explode("|", $m);						
							$t = $mm[rand(0, count($mm)-1)];
							$replace = str_replace($n, $t, $replace);							
						} else break;	
					}
	
					if (!substr_count($newdesc, $find)) continue;
					$fp = strpos($newdesc, $find);				
					$a1 = substr($newdesc, 0, $fp);						
					$a2 = substr($newdesc, $fp+strlen($find));
	
					$b = '';					
					if (strlen($text) > 2) $b = substr($text, 0, 3);
					if ($b and $b == "<B>") {
						$pen = stripos($a2, '<p>', 2);
						if ($pen) $pen = $pen-1;
						if (!$pen) {
							$pen = stripos($a2, '</p>', 2);
							if ($pen) $pen = $pen+4;
						}	
						if (!$pen) {
							$pen = stripos($a2, '&lt;/p&gt;', 2);
							if ($pen) $pen = $pen+10;
						}	
						if (!$pen) {
							$pen = stripos($a2, '</ul>', 2);
							if ($pen) $pen = $pen+5;
						}
						if (!$pen) {
							$pen = stripos($a2, '&lt;/ul&gt;', 2);
							if ($pen) $pen = $pen+11;
						}

						if ($pen) {
							if (!substr_count($newdesc, $text)) $a2 = substr($a2, 0, $pen) . '<p>' . $text . '</p>'. substr($a2, $pen);							
						} else {
							if (!substr_count($newdesc, $text)) $a2 = $a2 . '<p>' . $text . '</p>';						
						}
					} elseif ($b) {	
						$b = substr($text, 0, 1);	
						if ($b != '(') {								
							$pen = stripos($a2, ". ", 2);
							if ($pen) $pen = $pen+2;
							if (!$pen) {
								$pen = stripos($a2, '.</p>', 2);
								if ($pen) $pen = $pen+5;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.&lt;/p&gt;', 2);
								if ($pen) $pen = $pen+11;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.</ul>', 2);
								if ($pen) $pen = $pen+6;
							}
							if (!$pen) {
								$pen = stripos($a2, '.&lt;/ul&gt;', 2);
								if ($pen) $pen = $pen+12;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.<br />', 2);
								if ($pen) $pen = $pen+7;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.&lt;br /&gt;', 2);
								if ($pen) $pen = $pen+13;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.&lt;br/&gt;', 2);
								if ($pen) $pen = $pen+12;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.&lt;br&gt;', 2);
								if ($pen) $pen = $pen+11;
							}	
							if (!$pen) {
								$pen = stripos($a2, '.&nbsp;', 2);
								if ($pen) $pen = $pen+7;
							}
		
							if ($pen) {
								if (!substr_count($newdesc, $text)) $a2 = substr($a2, 0, $pen) . '<p>' . $text . '</p>'. substr($a2, $pen);								
							}	
						} else {
							if (!substr_count($newdesc, $text)) $a2 = ' ' . $text . ' ' . $a2;							
						}		
					}
					
					if (!substr_count($newdesc, $replace)) $newdesc = $a1.$replace.$a2;
				}	
			
				$j++;
			}	
			$this->upDesc($newdesc, $product_id);
		}		
	}
	
	public function printSkuLibrary($row, $store) {
		$path = "./uploads/ex.xml";			
		if (!file_exists($path)) {
			$file_ex    = "./uploads/ex.xml";					
			$ex = @fopen($file_ex,'w+');			
			if (!$ex) return 3;
			$this->StartEx($ex);			
			
			for ($j=0; $j<5; $j++) {
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
			}
			$st = '<Row>'."\n";
			@fputs($ex, $st);			
			$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Main SKU</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Alt SKU</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name</Data></Cell>'."\n";
			@fputs($ex, $st);						
			$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price</Data></Cell>'."\n";
			@fputs($ex, $st);			
			$st = '</Row>'."\n";
			@fputs($ex, $st);
			@fclose($ex);
		}
		$name = '';
		$price = $row['price'];
		$model = $row['model'];
		$product_id = $row['product_id'];		
		$main_sku = $row['sku'];
		$row = $this->getSkuID($product_id);
		
		if (!empty($row)) {
			$fl = 0;			
			$rows = $this->getSku($row['sku_id'], $store);				
			if (!empty($rows)) {
				foreach ($rows as $r) {				
					if ($r['sku'] != $main_sku) {
						$fl = 1;
						$alt = $r['sku'];						
					}
		
					if ($fl) {
						$fl = 0;
						$rows1 = $this->getProductDesc($product_id);
						if (!empty($rows1)) $name = $this->code($rows1[0]['name']);				
						$file_ex    = "./uploads/ex.xml";
						$ex = @fopen($file_ex,'a');
						$st = '<Row>'."\n";
						@fputs($ex, $st);
						$st = $model;
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = $main_sku;
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = $alt;
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = $name;
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = $price;
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '</Row>'."\n";
						@fputs($ex, $st);
						@fclose($ex);
					}	
				}	
			}
		}
	}
	
	public function addPrefix($row, $prefix, $infix, $store) {	
		$sku = $row['sku'];
		if (empty($sku)) return;
		$a = 1;
		$b = 1;
		$new_sku = '';
		if (!empty($prefix)) $a = substr_count($sku, $prefix);
		if (!empty($infix)) $b = substr_count($sku, $infix);
		if (!$a and !$b) $new_sku = $prefix . $sku . $infix;
		if (!$b and $a) $new_sku = $sku . $infix;
		if ($b and !$a) $new_sku = $prefix . $sku;
		if (!empty($new_sku)) {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `sku` = '" . $this->db->escape($new_sku) . "' WHERE `product_id` = '" . $row['product_id'] . "'");

			$rows = $this->getAllRecordsLibrary($sku, $store);
			if (!empty($rows)) {
				foreach ($rows as $r) {	
					if ($r['sku'] == $sku) {
						$this->db->query("UPDATE `" . DB_PREFIX . "suppler_sku_description` SET `sku` = '" . $this->db->escape($new_sku) . "' WHERE `nom_id` = '" . $r['nom_id'] . "'");
					}
				}
			}
		}	
	}
	
	public function puttotal($total_add, $total_up) {
		$file_total    = "./uploads/total.tmp";	
		
		$total = @fopen($file_total,'r+');
		if ($total) {	
			fseek($total, 0);				
			$m = $total_add . ' ' . $total_up . '     ';	
			if (!@fputs($total, $m)) {
				fclose($total); 
				@unlink ($file_total);			
				return; 
			}
			fclose($total);				
			return;
		}
	}
	
	public function putsos($row_count, $sku) {
		$file_sos    = "./uploads/sos.tmp";	
		
		$sos = @fopen($file_sos,'r+');
		if (!$sos) { $row_count = -5; return $row_count; }
		else {			
			fseek($sos, 0);
			$mmm = fgets($sos, 100);
			$m = explode(" " , $mmm);
			$row_count_old = (int)$m[0];
							
			if (empty($row_count_old)) $row_count_old = -1;	
			if ($row_count_old > $row_count) {
				fclose($sos); 
				@unlink ($file_sos);
				$row_count = -5; 
				return $row_count; 
			}
			fseek($sos, 0);					
			$m = $row_count . ' ' . $sku . '     ';	
			if (!@fputs($sos, $m)) {
				fclose($sos); 
				@unlink ($file_sos);
				$row_count = -5; 
				return $row_count; 
			}
			fclose($sos);		
			$row_count = $row_count + 1;
			return $row_count;
		}
	}
	
	public function addReport($report, $row, $sku) {
		$file_rep    = "./uploads/report.tmp";
		$rep = @fopen($file_rep,'a');
		if (!$rep) $rep = @fopen($file_rep,'w+');
		$line =  " Row =~ ".$row." SKU = ".$sku." ".$report. "\n";
		@fputs($rep, $line);
		@fclose($rep);	
	}
	
	public function adderr($err) {
		$file_er    = "./uploads/errors.tmp";
		$er = @fopen($file_er,'a');
		if (!$er) $er = @fopen($file_er,'w+');
		@fputs($er, $err);
		@fclose($er);	
	}	
	
	public function addex($st) {
		$file_ex    = "./uploads/ex.xml";		
		$ex = @fopen($file_ex,'a');
		if (!$ex) $ex = @fopen($file_ex,'w+');			
		if (!$ex) return 3;
		@fputs($ex, $st);
		@fclose($ex);		
	}
			
	public function checkurl($url) {	
		$url=trim($url);
		if (is_numeric($url)) return -1;
		if (strlen($url) < 4) return -1;
		if (!substr_count($url, "/") and (substr_count($url, ".JPG") or substr_count($url, ".jpg") or substr_count($url, ".PNG") or substr_count($url, ".png") or substr_count($url, ".jpeg") or substr_count($url, ".JPEG") or substr_count($url, ".GIF") or substr_count($url, ".gif") or substr_count($url, ".BMP") or substr_count($url, ".bmp"))) return $url;			
		$url = str_replace("\\" , "/" , $url);		
		if (!substr_count($url,"://")) {
			$a = substr($url, 0, 1);
			if ($a == "/") $url = substr($url, 1);
			$a = substr($url, 0, 1);
			if ($a == "/") $url = substr($url, 1);
			$url = "http://".$url;
		}	
		$url = str_replace("&#45;", "-", $url);
		$url = str_replace("&amp;", "&", $url);
	//	$url = str_replace(" ", "%25%20", $url);
	//	$url = str_replace(" ", "%20", $url);
		$url = trim($url);	
		return $url;
	}
	
	public function StartEx($ex) {
		$st = '<?xml version="1.0"?>'."\n";
		@fputs($ex, $st);
		$st = '<?mso-application progid="Excel.Sheet"?>'."\n";
		@fputs($ex, $st);
		$st = '<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"'."\n";
		@fputs($ex, $st);
		$st = 'xmlns:o="urn:schemas-microsoft-com:office:office"'."\n";
		@fputs($ex, $st);
		$st = 'xmlns:x="urn:schemas-microsoft-com:office:excel"'."\n";
		@fputs($ex, $st);
		$st = 'xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"'."\n";
		@fputs($ex, $st);
		$st = 'xmlns:html="http://www.w3.org/TR/REC-html40">'."\n";
		@fputs($ex, $st);
		$st = '<DocumentProperties xmlns="urn:schemas-microsoft-com:office:office">'."\n";
		@fputs($ex, $st);
		$st = ' <Author>usergio</Author>'."\n";
		@fputs($ex, $st);
		$st = ' <LastAuthor>me</LastAuthor>'."\n";
		@fputs($ex, $st);
		$st = ' <Created>'.date('Y-m-d H:i:s').'</Created>'."\n";
		@fputs($ex, $st);
		$st = ' <LastSaved>'.date('Y-m-d H:i:s').'</LastSaved>'."\n";
		@fputs($ex, $st);
		$st = ' <Company>'.HTTP_CATALOG.'</Company>'."\n";
		@fputs($ex, $st);
		$st = ' <Version>12.00</Version>'."\n";
		@fputs($ex, $st);
		$st = '</DocumentProperties>'."\n";
		@fputs($ex, $st);
		$st = '<ExcelWorkbook xmlns="urn:schemas-microsoft-com:office:excel">'."\n";
		@fputs($ex, $st);
		$st = ' <WindowHeight>12396</WindowHeight>'."\n";
		@fputs($ex, $st);
		$st = ' <WindowWidth>23256</WindowWidth>'."\n";
		@fputs($ex, $st);				
		$st = ' <WindowTopX>180</WindowTopX>'."\n";
		@fputs($ex, $st);
		$st = ' <WindowTopY>456</WindowTopY>'."\n";
		@fputs($ex, $st);
		$st = ' <ProtectStructure>False</ProtectStructure>'."\n";
		@fputs($ex, $st);
		$st = ' <ProtectWindows>False</ProtectWindows>'."\n";
		@fputs($ex, $st);
		$st = '</ExcelWorkbook>'."\n";
		@fputs($ex, $st);
		$st = '<Styles>'."\n";
		@fputs($ex, $st);
		$st = ' <Style ss:ID="Default" ss:Name="Normal">'."\n";
		@fputs($ex, $st);
		$st = ' <Alignment ss:Vertical="Bottom"/>'."\n";
		@fputs($ex, $st);
		$st = ' <Borders/>'."\n";
		@fputs($ex, $st);
		$st = ' <Font ss:FontName="Calibri" ss:Size="11"/>'."\n";
		@fputs($ex, $st);
		$st = ' <Interior/>'."\n";
		@fputs($ex, $st);				
		$st = ' <NumberFormat/>'."\n";
		@fputs($ex, $st);
		$st = ' <Protection/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s16">'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="Fixed"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s17">'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="0"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s18">'."\n";
		@fputs($ex, $st);
		$st = ' <Font ss:FontName="Calibri" x:CharSet="204" x:Family="Swiss" ss:Size="11"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s19">'."\n";
		@fputs($ex, $st);
		$st = ' <Font ss:FontName="Calibri" x:CharSet="204" x:Family="Swiss" ss:Size="11"/>'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="0"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s20">'."\n";
		@fputs($ex, $st);
		$st = '<Alignment ss:Horizontal="Center" ss:Vertical="Bottom"/>'."\n";
		@fputs($ex, $st);
		$st = '<Font ss:FontName="Calibri" x:CharSet="204" x:Family="Swiss" ss:Size="11" ss:Bold="1"/>'."\n";
		@fputs($ex, $st);		
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s21">'."\n";
		@fputs($ex, $st);   
		$st = ' <Font ss:FontName="Calibri" x:CharSet="204" x:Family="Swiss" ss:Size="11"/>'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="0.0000"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s22">'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="0.0000"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s23">'."\n";
		@fputs($ex, $st);
		$st = ' <Font ss:FontName="Calibri" x:CharSet="204" x:Family="Swiss" ss:Size="11"/>'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s24">'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '<Style ss:ID="s25">'."\n";
		@fputs($ex, $st);
		$st = ' <NumberFormat ss:Format="Standard"/>'."\n";
		@fputs($ex, $st);
		$st = '</Style>'."\n";
		@fputs($ex, $st);
		$st = '</Styles>'."\n";
		@fputs($ex, $st);
		$st = '<Worksheet ss:Name="ERC price">'."\n";
		@fputs($ex, $st);
		$st = '<Table ss:ExpandedColumnCount="47" ss:ExpandedRowCount="1" x:FullColumns="1"'."\n";
		@fputs($ex, $st);
		$st = '           x:FullRows="1" ss:DefaultRowHeight="14">'."\n";
		@fputs($ex, $st);		
	}
	
	public function EndEx($kol_cell) {
		$file_ex  = "./uploads/ex.xml";		
		$ex = @fopen($file_ex,'r');
		$st ='usergio';
		$kol_row = 0;
		while (!@feof($ex)) {
				$st = @fgets($ex, 2048);
				if (substr_count($st, "<Row")) $kol_row++;
			}
		fclose($ex);
		
		$ex = @fopen($file_ex,'r+');
		$st ='usergio';
		while (!@feof($ex) and !substr_count($st, "<Worksheet ss:Name=")) {
				$st = @fgets($ex, 2048);
			}			
		
		if ($kol_row < 1) $kol_row = 1;
		$st = '<Table ss:ExpandedColumnCount="'.$kol_cell.'" ss:ExpandedRowCount="'.$kol_row.'" x:FullColumns="1"'."\n";
		$ste = $st;
		@fputs($ex, $st);
		@fclose($ex);
		
		$file_ex    = "./uploads/ex.xml";		
		$ex = @fopen($file_ex,'a');

		$st = '</Table>'."\n";
		@fputs($ex, $st);
		$st = '<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">'."\n";
		@fputs($ex, $st);
		$st = '<PageSetup>'."\n";
		@fputs($ex, $st);
		$st = '<Header x:Margin="0.3"/>'."\n";
		@fputs($ex, $st);
		$st = '<Footer x:Margin="0.3"/>'."\n";
		@fputs($ex, $st);
		$st = '<PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>'."\n";
		@fputs($ex, $st);
		$st = '</PageSetup>'."\n";
		@fputs($ex, $st);
		$st = '<Print>'."\n";
		@fputs($ex, $st);
		$st = '<ValidPrinterInfo/>'."\n";
		@fputs($ex, $st);
		$st = '<PaperSizeIndex>9</PaperSizeIndex>'."\n";
		@fputs($ex, $st);
		$st = '<HorizontalResolution>600</HorizontalResolution>'."\n";
		@fputs($ex, $st);
		$st = '<VerticalResolution>600</VerticalResolution>'."\n";
		@fputs($ex, $st);
		$st = '</Print>'."\n";
		@fputs($ex, $st);
		$st = '<Selected/>'."\n";
		@fputs($ex, $st);
		$st = '<Panes>'."\n";
		@fputs($ex, $st);
		$st = '<Pane>'."\n";
		@fputs($ex, $st);
		$st = '<Number>3</Number>'."\n";
		@fputs($ex, $st);
		$st = '<ActiveCol>0</ActiveCol>'."\n";
		@fputs($ex, $st);	
		$st = '</Pane>'."\n";
		@fputs($ex, $st);
		$st = '</Panes>'."\n";
		@fputs($ex, $st);
		$st = '<ProtectObjects>False</ProtectObjects>'."\n";
		@fputs($ex, $st);
		$st = '<ProtectScenarios>False</ProtectScenarios>'."\n";
		@fputs($ex, $st);
		$st = '</WorksheetOptions>'."\n";
		@fputs($ex, $st);
		$st = '</Worksheet>'."\n";
		@fputs($ex, $st);
		$st = '<Worksheet ss:Name="Лист1">'."\n";
		@fputs($ex, $st);
		$st = $ste;
		@fputs($ex, $st);
		$st = 'x:FullRows="1" ss:DefaultRowHeight="14.4">'."\n";
		@fputs($ex, $st);
		$st = '</Table>'."\n";
		@fputs($ex, $st);
		$st = '<WorksheetOptions xmlns="urn:schemas-microsoft-com:office:excel">'."\n";
		@fputs($ex, $st);
		$st = '<PageSetup>'."\n";
		@fputs($ex, $st);
		$st = '<Header x:Margin="0.3"/>'."\n";
		@fputs($ex, $st);
		$st = '<Footer x:Margin="0.3"/>'."\n";
		@fputs($ex, $st);
		$st = '<PageMargins x:Bottom="0.75" x:Left="0.7" x:Right="0.7" x:Top="0.75"/>'."\n";
		@fputs($ex, $st);  
		$st = '</PageSetup>'."\n";
		@fputs($ex, $st);
		$st = '<ProtectObjects>False</ProtectObjects>'."\n";
		@fputs($ex, $st);
		$st = '<ProtectScenarios>False</ProtectScenarios>'."\n";
		@fputs($ex, $st);
		$st = '</WorksheetOptions>'."\n";
		@fputs($ex, $st);
		$st = '</Worksheet>'."\n";
		@fputs($ex, $st);
		$st = '</Workbook>'."\n";
		@fputs($ex, $st);
		
		@fclose($ex);
	}
	
	public function deleteCompetitors($product_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "suppler_ref SET `url` = '' WHERE `product_id` = '" . $product_id . "'");
	}
	
	public function Competitors($row, $name, $form_id, $store) {
		$rows = $this->getSupplerPriceSort($form_id);
		if (empty($rows)) return;
		$masident = array();
		for ($i=0; $i<10; $i++) {
			if (!isset($rows[$i]['ident'])) break;
			$masident[$i] = $rows[$i]['ident'];
		}
		$rows = $this->getBasePrice($row['product_id']);
		if (empty($rows)) return;
		$file_ex    = "./uploads/ex.xml";
		$ex = @fopen($file_ex,'a');
		$st = '<Row>'."\n";
		@fputs($ex, $st);
		$st = $row['model'];
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $row['sku'];
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->code($name);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['bprice']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['bdisc']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($row['price'] - $rows[0]['bdisc'] - $rows[0]['bprice']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($row['price']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['bmin']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['bav']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['bmax']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['optimal']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['market_percent_to_price']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['market_percent_to_bprice']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->convertPrice($rows[0]['market_percent_to_bdprice']);
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$rows = $this->getRefSort($row['product_id']);
		if (!empty($rows)) {	
			$k = 0;
			for ($i=0; $i<10; $i++) {
				if (!isset($rows[$i]['ident'])) break;
				$f = 0;
				for ($l=0; $l<10; $l++) {
					if (!isset($masident[$l])) break;
					if (trim($rows[$i]['ident']) == trim($masident[$l])) $f = 1;				
				}
				if ($f) {
					for ($j=$k; $j<10; $j++) {
						if (!isset($masident[$j])) break;	
						if (trim($rows[$i]['ident']) == trim($masident[$j])) {
							$st = $this->convertPrice($rows[$i]['price']);
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$k = $j+1;
							break;
						} else {
							$st = '';
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}
					}	
				}				
			}	
		}	
		$st = '</Row>'."\n";		
		@fputs($ex, $st);
		@fclose($ex);
	}
	
	public function PrintSame($model1, $model2, $sku1, $sku2, $name1, $name2, $price1, $price2) {					
		$file_ex    = "./uploads/ex.xml";
		$ex = @fopen($file_ex,'a');
		$st = '<Row>'."\n";
		@fputs($ex, $st);
		$st = $model1;
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $model2;
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $sku1;
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $sku2;
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $this->code($name1);		
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);			
		$st = $this->code($name2);		
		$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);				
		$st = $price1;
		$st = '<Cell ss:StyleID="s22"><Data ss:Type="Number">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = $price2;
		$st = '<Cell ss:StyleID="s22"><Data ss:Type="Number">'.$st.'</Data></Cell>'."\n";
		@fputs($ex, $st);
		$st = '</Row>'."\n";
		@fputs($ex, $st);
		@fclose($ex);
	}
	
	public function Same($model2, $sku2, $name2, $category_id, $manufacturer_id, $price2, $store) {

		if (empty($name2) or empty($sku2)) return "";
		if (empty($category_id)) $category_id = 0;
		$name2 = $this->getName($name2);	
		$name2 = str_replace("-", " ", $name2);
		$name2 = str_replace("/", " ", $name2);
		$name2 = str_replace("III", "3", $name2);
		$name2 = str_replace("II", "2", $name2);		
		$name2 = str_replace("V", "5", $name2);
		$name2 = str_replace("IV", "4", $name2);
		$name2 = str_replace("(", "", $name2);
		$name2 = str_replace(")", "", $name2);
		$name2 = str_replace("[", "", $name2);
		$name2 = str_replace("]", "", $name2);
		$name2 = str_replace("&quot;", "", $name2);
		$name2 = strip_tags($name2);
		$ms2 = explode (" ", $name2);

		$rows = $this->getSame($ms2, $manufacturer_id, $category_id, $store);
		
		if (empty($rows)) return "";
		
		$old_model = "4F560D54GG";
		
		foreach ($rows as $r) {			
			$name1 = $r['name'];			
			$model1 = $r['model'];
			
			if ($model1 == $model2) continue;
			if ($model1 == $old_model) continue;
			$old_model = $model1;
	
			$sku1 = $r['sku'];	
			$price1 = $r['price'];
			$r['name'] = str_replace("-", " ", $r['name']);
			$r['name'] = str_replace("/", " ", $r['name']);
			$r['name'] = str_replace("III", "3", $r['name']);
			$r['name'] = str_replace("II", "2", $r['name']);			
			$r['name'] = str_replace("V", "5", $r['name']);
			$r['name'] = str_replace("IV", "4", $r['name']);
			$r['name'] = str_replace("(", "", $r['name']);
			$r['name'] = str_replace(")", "", $r['name']);
			$r['name'] = str_replace("[", "", $r['name']);
			$r['name'] = str_replace("]", "", $r['name']);
			$r['name'] = str_replace("&quot;", "", $r['name']);
			$ms1 = explode (" ", $r['name']);
			
			$yes = 0;
			$equal = 0;
			$max1 = count($ms1);
			$max2 = count($ms2);			
			for ($i=0; $i<$max1; $i++) {
				$le = strlen($ms1[$i]);	
				$ms1[$i] = strtolower($ms1[$i]);
				for ($j=0; $j<$max2; $j++) {					
					if ($le < 2) continue;
					if (strlen($ms2[$j]) < 2) continue;
					$ms2[$j] = strtolower($ms2[$j]);	
					if (($ms1[$i] == $ms2[$j] and $le > 3 and preg_match('/^[0-9a-z.A-Z-\/]+$/', $ms1[$i]) and !preg_match('/^[0-9]+$/', $ms1[$i]) and !preg_match('/^[a-zA-Z]+$/', $ms1[$i]))) {
						$yes = 1;	
					} else {					
						$p = stripos($ms1[$i], $ms2[$j]);		
						if ($p === false) $p = stripos($ms2[$j], $ms1[$i]);
						if (!($p === false)) {						
							$equal++;
						}	
					}
				}
			}
			$s1 = preg_replace('/[^0-9a-zA-Z]/', '', $sku1);
			$s2 = preg_replace('/[^0-9a-zA-Z]/', '', $sku2);
			$s1 = strtolower($s1);
			$s2 = strtolower($s2);
			if ($s1 == $s2) $yes = 1;
			
			$min = $max1;			
			if ($min > $max2) $min = $max2;	
			$max = $max1;			
			if ($max < $max2) $max = $max2;
			$c = 0;
			$c = $equal/$min;			
			
			$no = 0;
			if (!isset($old_model1)) $no = 0;
			elseif (($old_model1 == $model2 and $old_model2 == $model1) or ($old_model1 == $model1 and $old_model2 == $model2)) $no = 1;
			if ($sku2 != $sku1 and !$no) {
				if ($c > 0.59 or $yes) {
					$this->PrintSame($model1, $model2, $sku1, $sku2, $name1, $name2, $price1, $price2);
					$old_model1 = $model1;
					$old_model2 = $model2;
				} 				
			}  
		}	
	}

	public function Action($data, $form_id) {		
		$sort_att = array();
		$seo_data = array();		
		$masatt = array();
		$row = array();
		$row1 = array();
		$row2 = array();
		$rows = array();
		$rows1 = array();
		$rows2 = array();
		$rows3 = array();
		$rows4 = array();
		$row = $this->getSuppler($form_id);
		$store = $row['addattr'];
		$lang = $this->config->get('config_language_id');
		if ($data['inoption'] and !$data['isoptvalue']) return 37;
		if (!$data['inoption'] and $data['isoptvalue']) return 36;
		if ($data['act_noattribut'] and $data['act_attribut'] and $data['act_attribut'] == $data['act_noattribut'] and $data['command'] != 88) return 38;			
		
		$rows = $this->getAllAttr();
		for ($max_a=0; $max_a<10000; $max_a++) {
			if (!isset($rows[$max_a]['attribute_id'])) break;
			$sort_att[$max_a] = $rows[$max_a]['attribute_id'];
		}		
				
		if ($data['command'] == 12 and $max_a > 1000) $max_a = 1000;
		
		if ($data['command'] == 208) {
			$lang = $this->config->get('config_language_id');
			for ($i=0; $i<2000; $i++) {	
				if (!isset($data['act_manuf'][$i])) break;				
				$this->db->query("UPDATE " . DB_PREFIX . "manufacturer_description SET `meta_description` = '', `meta_keyword` = '', `seo_h1` = '', `seo_title` = '' WHERE `category_id` = '". (int)$data['act_manuf'][$i] . "' and `language_id` = '" . $lang . "'");		
			}
		}
		
		if ($data['command'] == 211) {			
			for ($i=0; $i<2000; $i++) {	
				if (!isset($data['act_cat'][$i])) break;				
				$this->db->query("UPDATE " . DB_PREFIX . "category SET `status` = '0' WHERE `category_id` = '". (int)$data['act_cat'][$i] . "'");		
			}
		}
		
		if ($data['command'] == 212) {			
			for ($i=0; $i<2000; $i++) {	
				if (!isset($data['act_cat'][$i])) break;				
				$this->db->query("UPDATE " . DB_PREFIX . "category SET `status` = '1' WHERE `category_id` = '". (int)$data['act_cat'][$i] . "'");		
			}
		}
		
		if ($data['command'] == 207) {
			$lang = $this->config->get('config_language_id');
			for ($i=0; $i<2000; $i++) {	
				if (!isset($data['act_cat'][$i])) break;				
				$this->db->query("UPDATE " . DB_PREFIX . "category_description SET `meta_description` = '', `meta_keyword` = '', `seo_h1` = '', `seo_title` = '' WHERE `category_id` = '". (int)$data['act_cat'][$i] . "' and `language_id` = '" . $lang . "'");		
			}
		}	
	
		if ($data['command'] == 203) {
			$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `image` = REPLACE(image, 'data/', 'catalog/')");
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `image` = REPLACE(image, 'data/', 'catalog/')");
			$this->db->query("UPDATE `" . DB_PREFIX . "manufacturer` SET `image` = REPLACE(image, 'data/', 'catalog/')");
			$this->db->query("UPDATE `" . DB_PREFIX . "product_image` SET `image` = REPLACE(image, 'data/', 'catalog/')");
			$this->db->query("UPDATE `" . DB_PREFIX . "option_value` SET `image` = REPLACE(image, 'data/', 'catalog/')");
			$table = DB_PREFIX . "poip_option_image";
			$tname = "image";
			if ($this->getColumnName($table, $tname)) $this->db->query("UPDATE `" . DB_PREFIX . "poip_option_image` SET `image` = REPLACE(image, 'data/', 'catalog/')");			
		}
		
		if ($data['command'] == 182) {
			$this->db->query("UPDATE `" . DB_PREFIX . "option_value` SET `image` = ''");			
		}

		if ($data['command'] == 142) {
			$rows = $this->getAllAttributes();
			if (empty($rows)) return;
			for ($i=0; $i<=10000; $i++) {
				if (!isset($rows[$i]['name'])) break;
				$k = 0;
				$mas = array();
				for	($j=$i; $j<900; $j++) {
					if (!isset($rows[$j]['attribute_id'])) break;	
					if ($rows[$i]['attribute_id'] != $rows[$j]['attribute_id']) break;
					if ($rows[$i]['attribute_id'] == $rows[$j]['attribute_id']) {						
						$mas[$k]['name'] = $rows[$j]['name'];	
						$k++;	
					}
				}

				$f = 0;
				for ($l=0; $l<$k; $l++) {
					if (!empty($mas[$l]['name'])) { 
						$f = 1;
						break;
					}
				}
				if (!$f) $this->DelAttribute($rows[$i]['attribute_id']);
				$i = $j-1;
			}
			return;
		}		
	
		if ($data['command'] == 172) {			
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) return 3;
			$file_ex    = "./uploads/ex.xml";					
			$ex = @fopen($file_ex,'r');			
			if (!$ex) return 3;
			
			$st = '';
			$f = array();
			$j = 0;
			while (!feof($ex)) {			
				while (!@feof($ex) and !substr_count($st, "<Row")) {
					$st = @fgets($ex, 65534);
				}	
				if (@feof($ex)) break;

				for ($jj=1; $jj<2003; $jj++) { $row[$jj] = NULL;}
				$i = -1;
				$br = 0;
				$ext = 1;
				$mas = array();
				while ($ext) {			
					$st = @fgets($ex, 65534);
					if (@feof($ex)) break;				
					if (substr_count($st, "</Row>"))  break;
								
					if (!substr_count($st, "<Cell")) {
				
						if (substr_count($st, "</Data")) $pose = strpos($st, "</Data"); 
							else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data"); 
									else $pose = strlen($st) - 1;
						if ($pose and $br) $row[$i] = $row[$i].preg_replace('| +|', ' ', substr($st, 0, $pose));					
						continue;
					
					} else {					
						$i++;
						$p = strpos($st, "Index=");
						if ($p != 0) {							
							$pe = strpos($st, '"', $p+7);
							$ii = substr ($st, $p+7, $pe-$p-7)-1;
							if ($ii>$i) {
								for ($ll=$i; $ll<$ii; $ll++) {
									$mas[$ll] = '';
								}
								$i = $ii;
							}	
						}					
						$br = 0;
						$a = ">";
						$posb1 = strpos($st, "String");
						if ($posb1 === false) $posb1 = 999;
						$posb2 = strpos($st, "Number");
						if ($posb2 === false) $posb2 = 999;													
						$posb3 = strpos($st, "HRef=");
						if ($posb3 === false) $posb3 = 999;
						$posb4 = strpos($st, "Boolean");
						if ($posb4 === false) $posb4 = 999;
							
						if ($posb1 < $posb2) $posb = $posb1;
						else $posb = $posb2;
						if ($posb4 < $posb) $posb = $posb4;
							
						if ($posb3 < $posb) {
							$posb = $posb3;
							$a = '"';						
						}	
						if ($posb != 999)	{					
							$posb = strpos($st, $a , $posb) +1;
							if ($posb < 0) continue;
							$pose = 0;
							if ($a != '"') {						
								if (substr_count($st, "</Data")) $pose = strpos($st, "</Data", $posb); 
								else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data", $posb); 
							} else $pose = strpos($st, $a, $posb); 
							if (!$pose) {
								$br = 1;
								$row[$i] = substr($st, $posb);
								continue;
							}	
							if ($pose and $pose > $posb) {						
								$len = $pose - $posb;
								$row[$i] = substr($st, $posb, $len);		
							} 
						} else continue;
					}
					$mas[$i] = $row[$i];		
				}
				if (count($mas)) {
					for ($i=0; $i<16; $i=$i+2) {	
						if (!empty($mas[$i]) and !in_array($mas[$i], $f)) {
							$f[$j] = $mas[$i];
							$j++;
							$category_id = (int)$mas[$i];	
							if ($category_id and (!empty($mas[$i+34]) or $mas[$i+174] != '')) {
								$row = $this->getCategoryByID($category_id);								
								if (!empty($row)) {	
									if (isset($mas[$i+34])) $row['image'] = $mas[$i+34];
									if (isset($mas[$i+174])) $row['sort_order'] = (int)$mas[$i+174];		
									$this->upCategoryByID($row);
								}	
							}
							if ($category_id and (!empty($mas[$i+1]) or !empty($mas[$i+54]) or !empty($mas[$i+94]) or !empty($mas[$i+114]) or !empty($mas[$i+134]) or !empty($mas[$i+154]))) {
								$row = $this->getCategoryDescriptionByID($category_id, $lang);
								if (!empty($row)) {
									if (isset($mas[$i+1])) $row['name'] = $this->getName($mas[$i+1]);
									if (isset($mas[$i+54])) $row['description'] = $this->symbol($mas[$i+54]);
									if (isset($mas[$i+94])) $row['meta_description'] = $this->symbol($mas[$i+94]);
									if (isset($mas[$i+114])) $row['meta_keyword'] = $this->symbol($mas[$i+114]);
									if (isset($mas[$i+134])) $row['seo_title'] = $this->symbol($mas[$i+134]);
									if (isset($mas[$i+154])) $row['seo_h1'] = $this->symbol($mas[$i+154]);
									$this->upCategoryDescriptionByID($row, $lang);
								}	
							}
							if ($category_id and !empty($mas[$i+74])) {								
								$rows1 = $this->getURLcategory($category_id);
								if (!empty($rows1)) {
									$this->db->query("UPDATE " . DB_PREFIX . "url_alias SET `keyword` = '" . $this->db->escape($mas[$i+74]) . "' WHERE `url_alias_id` = '" . $rows1['url_alias_id'] ."'");	
								} else {	
									$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'category_id=" . (int)$category_id . "', `keyword` = '" . $this->db->escape($mas[$i+74]) . "'");
								}	
							}
						}
					}
				}
			}
			return;
		}
		
		if ($data['command'] == 195) {		
			$file_sos    = "./uploads/sos.tmp";			
			if (file_exists ($file_sos)) {
				$sos = @fopen($file_sos,'r+');
				$pid = (int)fgets($sos, 10);
				if (empty($pid)) {
					$row = $this->getMinCategoryID();
					$pid = $row['min(category_id)']-1;
				}
				@fclose($sos);					
			} else {				
				$sos = @fopen($file_sos,'w+');
				if (!$sos) { @fclose($sos); return 2;}
				chmod($file_sos, 0777);
				$row = $this->getMinCategoryID();
				$pid = $row['min(category_id)']-1;
			}	
		
			$pid++;			
			$row = $this->getMaxCategoryID();
			$max_id = $row['max(category_id)'];
			$c = array();
			for ($i=$pid; $i<=$max_id; $i++) {
				$this->putsos($i-1, '');
				for ($l=0; $l<8; $l++) {$c[$l] = 0;}
				$rows  = $this->getParent($i, $store);	
				if (!empty($rows)) continue;	
				$rows  = $this->getChain($i);
				if (!empty($rows)) {
					$c[0] = $i;
					$image = '';
					if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
						$image = $this->choicePhoto($c, $store);
					if ($image) $this->upCategoryImage($c[0], $image);					
					$c[1] = $rows[0]['parent_id'];				
					if ($c[1] != 0) {
						$rows  = $this->getChain($c[1]);						
						$image = '';
						if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
							$image = $this->choicePhoto($c, $store);
						if ($image) $this->upCategoryImage($c[1], $image);					
						$c[2] = $rows[0]['parent_id'];						
						if ($c[2] != 0) {
							$rows  = $this->getChain($c[2]);							
							$image = '';
							if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
								$image = $this->choicePhoto($c, $store);
							if ($image) $this->upCategoryImage($c[2], $image);					
							$c[3] = $rows[0]['parent_id'];
							if ($c[3] != 0) {
								$rows  = $this->getChain($c[3]);								
								$image = '';
								if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
									$image = $this->choicePhoto($c, $store);
								if ($image) $this->upCategoryImage($c[3], $image);					
								$c[4] = $rows[0]['parent_id'];
								if ($c[4] != 0) {
									$rows  = $this->getChain($c[4]);									
									$image = '';
									if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
										$image = $this->choicePhoto($c, $store);
									if ($image) $this->upCategoryImage($c[4], $image);					
									$c[5] = $rows[0]['parent_id'];
									if ($c[5] != 0) {
										$rows  = $this->getChain($c[5]);										
										$image = '';
										if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
											$image = $this->choicePhoto($c, $store);
										if ($image) $this->upCategoryImage($c[5], $image);					
										$c[6] = $rows[0]['parent_id'];
										if ($c[6] != 0) {
											$rows  = $this->getChain($c[6]);											
											$image = '';
											if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
												$image = $this->choicePhoto($c, $store);
											if ($image) $this->upCategoryImage($c[6], $image);					
											$c[7] = $rows[0]['parent_id'];
											if ($c[7] != 0) {
												$rows  = $this->getChain($c[7]);											
												$image = '';
												if (empty($rows[0]['image']) or substr_count($rows[0]['image'], "no_image")) 
													$image = $this->choicePhoto($c, $store);
												if ($image) $this->upCategoryImage($c[7], $image);
											}
										}
									}
								}
							}
						}
					}
				}
			}
			$path = "./uploads/sos.tmp";
			if (file_exists($path)) unlink ($path);		
		}
		
		if ($data['command'] == 167) {
			
			$row = $this->getSuppler($form_id);
			$store = $row['addattr'];
			
			$path = "./uploads/sos.tmp";
			if (!file_exists($path)) {
				$path = "./uploads/ex.xml";
				if (file_exists($path)) unlink ($path);				
			}
			
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) {
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="30"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="140"/>'."\n";
					@fputs($ex, $st);
				}				
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				for ($i=0; $i<16; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="10"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="140"/>'."\n";
					@fputs($ex, $st);
				}				
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="300"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="6"/>'."\n";
					@fputs($ex, $st);
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="40"/>'."\n";
					@fputs($ex, $st);
				}
				
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"> ID'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Category'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU, Price</Data></Cell>'."\n";
				@fputs($ex, $st);
				for ($i=0; $i<16; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Description'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"> </Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">URL'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-Description'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-Keywords'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-Title'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-H1_'.$i.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				for ($i=0; $i<4; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);					
				}
				for ($i=0; $i<8; $i++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Sort</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			} else {			
				$file_ex  = "./uploads/ex.xml";		
				$ex = @fopen($file_ex,'r+');					
				$offcet = 0;
				$seek = 0;
				while (!@feof($ex)) {						
					$st = @fgets($ex, 2048);
					$offcet = $offcet + strlen($st);
					if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
				}
				ftruncate($ex, $seek);	
				@fclose($ex);			
			}
			
			$file_sos    = "./uploads/sos.tmp";			
			if (file_exists ($file_sos)) {
				$sos = @fopen($file_sos,'r+');
				$pid = (int)fgets($sos, 10);
				if (empty($pid)) {
					$row = $this->getMinCategoryID();
					$pid = $row['min(category_id)']-1;
				}
				@fclose($sos);					
			} else {				
				$sos = @fopen($file_sos,'w+');
				if (!$sos) { @fclose($sos); return 2;}
				chmod($file_sos, 0777);
				$row = $this->getMinCategoryID();
				$pid = $row['min(category_id)']-1;
			}	
		
			$pid++;			
			$row = $this->getMaxCategoryID();
			$max_id = $row['max(category_id)'];

			for ($i=$pid; $i<=$max_id; $i++) {
				$this->putsos($i-1, '');
				$mas = array();
				$image = array();
				$sortorder = array();
				$description = array();
				$meta_description = array();
				$meta_keyword = array();
				$title = array();
				$h1 = array();
				$rows  = $this->getParent($i, $store);	
				if (!empty($rows)) continue;
				$rows  = $this->getChain($i);
				if (!empty($rows)) {	
					$mas[0] = $i;
					$image[0] = $rows[0]['image'];
					$sortorder[0] = $rows[0]['sort_order'];
					$mas[1] = $rows[0]['parent_id'];				
					if ($mas[1] != 0) {
						$rows  = $this->getChain($mas[1]);
						if (empty($rows)) {
							$err =  " Parent Category id = " . $mas[1] . " not found for Category id = " . $i . "  \n";
							$this->adderr($err);
							continue;
						}
						$mas[2] = $rows[0]['parent_id'];
						$image[1] = $rows[0]['image'];
						$sortorder[1] = $rows[0]['sort_order'];
						if ($mas[2] != 0) {
							$rows  = $this->getChain($mas[2]);
							if (empty($rows)) {
								$err =  " Parent Category id = " . $mas[2] . " not found for Category id = " . $mas[1] . "  \n";
								$this->adderr($err);
								continue;
							}
							$mas[3] = $rows[0]['parent_id'];
							$image[2] = $rows[0]['image'];
							$sortorder[2] = $rows[0]['sort_order'];
							if ($mas[3] != 0) {
								$rows  = $this->getChain($mas[3]);
								if (empty($rows)) {
									$err =  " Parent Category id = " . $mas[3] . " not found for Category id = " . $mas[2] . "  \n";
									$this->adderr($err);
									continue;
								}
								$mas[4] = $rows[0]['parent_id'];
								$image[3] = $rows[0]['image'];
								$sortorder[3] = $rows[0]['sort_order'];
								if ($mas[4] != 0) {
									$rows  = $this->getChain($mas[4]);
									if (empty($rows)) {
										$err =  " Parent Category id = " . $mas[4] . " not found for Category id = " . $mas[3] . "  \n";
										$this->adderr($err);
										continue;
									}
									$mas[5] = $rows[0]['parent_id'];
									$image[4] = $rows[0]['image'];
									$sortorder[4] = $rows[0]['sort_order'];
									if ($mas[5] != 0) {
										$rows  = $this->getChain($mas[5]);
										if (empty($rows)) {
											$err =  " Parent Category id = " . $mas[5] . " not found for Category id = " . $mas[4] . "  \n";
											$this->adderr($err);
											continue;
										}
										$mas[6] = $rows[0]['parent_id'];
										$image[5] = $rows[0]['image'];
										$sortorder[5] = $rows[0]['sort_order'];
										if ($mas[6] != 0) {
											$rows  = $this->getChain($mas[6]);
											if (empty($rows)) {
												$err =  " Parent Category id = " . $mas[6] . " not found for Category id = " . $mas[5] . "  \n";
												$this->adderr($err);
												continue;
											}
											$mas[7] = $rows[0]['parent_id'];
											$image[6] = $rows[0]['image'];
											$sortorder[6] = $rows[0]['sort_order'];
											if ($mas[7] != 0) {
												$rows  = $this->getChain($mas[7]);
												if (empty($rows)) {
													$err =  " Parent Category id = " . $mas[7] . " not found for Category id = " . $mas[6] . "  \n";
													$this->adderr($err);
													continue;
												}
												$mas[8] = $rows[0]['parent_id'];
												$image[7] = $rows[0]['image'];
												$sortorder[7] = $rows[0]['sort_order'];
											}
										}
									}
								}
							}
						}
					}
					$file_ex    = "./uploads/ex.xml";
					$ex = @fopen($file_ex,'a');
					$st = '<Row>'."\n";					
					@fputs($ex, $st);					
				
					$k = 0;
					for ($j=0; $j<8; $j++) {
						if (isset($mas[$j]) and $mas[$j] != 0) {
							$rows  = $this->getCategoryName($mas[$j]);							
							if (!empty($rows)) {								
								$st = $mas[$j];
								$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
								@fputs($ex, $st);
								$st = $this->code($rows[0]['name']);
								$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
								@fputs($ex, $st);
								$k++;
								$description[$j] = $rows[0]['description'];
								$meta_description[$j] = $rows[0]['meta_description'];
								$meta_keyword[$j] = $rows[0]['meta_keyword'];
								$title[$j] = '';
								if (isset($rows[0]['meta_title'])) $title[$j] = $rows[0]['meta_title'];
								if (isset($rows[0]['seo_title'])) $title[$j] = $rows[0]['seo_title'];
								$h1[$j] = '';
								if (isset($rows[0]['meta_h1'])) $h1[$j] = $rows[0]['meta_h1'];
								if (isset($rows[0]['seo_h1'])) $h1[$j] = $rows[0]['seo_h1'];								
							}
						}	
					}
					for ($j=0; $j<8-$k; $j++) {
						$st = '<Cell><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '<Cell><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					$st = '<Cell><Data ss:Type="String">1</Data></Cell>'."\n";
					@fputs($ex, $st);
					for ($j=0; $j<16; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($image[$j])) $st = $image[$j];
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($description[$j])) $st = $this->code($description[$j]);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$row['keyword'] = '';
						if (isset($mas[$j]) and $mas[$j] != 0) $row  = $this->getURLcategory($mas[$j]);				
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($row['keyword']) and !empty($row['keyword'])) $st = $this->code($row['keyword']);
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);				
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($meta_description[$j])) $st = $this->code($meta_description[$j]);
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($meta_keyword[$j])) $st = $this->code($meta_keyword[$j]);
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"></Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($title[$j])) $st = $this->code($title[$j]);
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"> </Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"> </Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($h1[$j])) $st = $this->code($h1[$j]);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=0; $j<4; $j++) {
						$st = '<Cell ss:StyleID="s20"><Data ss:Type="String"> </Data></Cell>'."\n";
						@fputs($ex, $st);					
					}
					for ($j=0; $j<8; $j++) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String"> </Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '';
						if (isset($h1[$j])) $st = $sortorder[$j];
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					$st = '</Row>'."\n";
					@fputs($ex, $st);
					@fclose($ex);
				}				
			}	
			$kol_cell = 189;
			$this->EndEx($kol_cell);
			
			$path = "./uploads/sos.tmp";
			if (file_exists($path)) unlink ($path);		
		
			return;	
		}
		
		if ($data['command'] == 140) {
			$rows = $this->getMySuppler($form_id);
			if (empty($rows)) return;
			$id	= $rows[0]['suppler_id'];
			
			$path = "./uploads/sos.tmp";
			if (!file_exists($path)) {
				$path = "./uploads/ex.xml";
				if (file_exists($path)) unlink ($path);				
			}
			
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) {
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="120"/>'."\n";
				@fputs($ex, $st);				
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="73"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="120"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="60"/>'."\n";
				@fputs($ex, $st);				
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="180"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="120"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="120"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);							
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="120"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="200"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Order ID</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Invoice</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Articul (SKU)</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Name</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Quantity</Data></Cell>'."\n";
				@fputs($ex, $st);				
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SubTotal</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Total</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Shipping Title</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Shipping</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Tax Title</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Tax</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Tax Title</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Tax</Data></Cell>'."\n";
				@fputs($ex, $st);						
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Buyer</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Address</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Phone</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Status1</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Date1</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Status2</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Date2</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Status3</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Date3</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Status4</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Date4</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			} else {				
				$file_ex  = "./uploads/ex.xml";		
				$ex = @fopen($file_ex,'r+');					
				$offcet = 0;
				$seek = 0;
				while (!@feof($ex)) {						
					$st = @fgets($ex, 2048);
					$offcet = $offcet + strlen($st);
					if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
				}
				ftruncate($ex, $seek);	
				@fclose($ex);				
			}
			
			$file_sos    = "./uploads/sos.tmp";
			$file_total    = "./uploads/total.tmp";
			if (file_exists ($file_sos)) {
				$sos = @fopen($file_sos,'r+');
				$pid = (int)fgets($sos, 10);
				if (empty($pid)) {
					$row = $this->getMinOrders();
					$pid = $row['min(order_id)']-1;
				}
				@fclose($sos);
				$tab = fopen($file_total,'rb');
				if($tab) $summ = unserialize(fread($tab, filesize($file_total)));
				else $summ = 0;		
			} else {				
				$sos = @fopen($file_sos,'w+');
				if (!$sos) { @fclose($sos); return 2;}
				chmod($file_sos, 0777);
				$row = $this->getMinOrders();
				$pid = $row['min(order_id)']-1;
				$tab = fopen($file_total,'w+b');
				$summ = array();
				$summ[0] = 0;
				$summ[1] = 0;
				$summ[2] = 0;
				$str = serialize($summ);
				fwrite($tab, $str);				
			}	
	
			$pid++;			
			$row = $this->getMaxOrders();
			$max_id = $row['max(order_id)'];			
			
			for ($i=$pid; $i<=$max_id; $i++) {
				$this->putsos($i-1, '');
				$rows1  = $this->getOrderHistory($i);
				if (empty($rows1)) continue;
				$d = explode(' ', $rows1[0]['date_added']);
				$date = $d[0];
				$y1 = (int)substr($data['filter_date_start'], 0, 4);
				$m1 = (int)substr($data['filter_date_start'], 5, 2);
				$d1 = (int)substr($data['filter_date_start'], 8, 2);
				$y2 = (int)substr($data['filter_date_end'], 0, 4);
				$m2 = (int)substr($data['filter_date_end'], 5, 2);
				$d2 = (int)substr($data['filter_date_end'], 8, 2);			
			
				$y = (int)substr($date, 0, 4);
				$m = (int)substr($date, 5, 2);
				$d = (int)substr($date, 8, 2);
		
				$t1 = mktime(0, 0, 0, $m1, $d1, $y1);
				$t2 = mktime(0, 0, 0, $m2, $d2, $y2);
				$t = mktime(0, 0, 0, $m, $d, $y);	
		
				if (($t<$t1 or $t>$t2) and ($data['filter_date_start'] != '0000-00-00' or $data['filter_date_end'] != '0000-00-00')) continue;
				
				$rows2  = $this->getOrderProduct($i);
				if (empty($rows2)) continue;
				$p = strrpos($rows2[0]['model'], "-");
				if (!$p) $p = strrpos($rows2[0]['model'], "~");
				if ((preg_match('/^[0-9-~]+$/', $rows2[0]['model']) and $p > 0) or (substr_count($rows2[0]['model'], 'Series') and $p > 0)) {
					$sup = substr($rows2[0]['model'], $p+1, 2);
					if ((int)$data['all'] == 0 and $id != (int)$sup) continue;
				} else if ((int)$data['all'] == 0) continue;	
				
				$rows3  = $this->getOrderTotal($i);	
				if (empty($rows3)) continue;
				
				$row  = $this->getOrder($i);	
				if (empty($row)) continue;				
				
				for ($j=0; $j<900; $j++) {
					if (!isset($rows2[$j]['name'])) break;
					$file_ex    = "./uploads/ex.xml";
					$ex = @fopen($file_ex,'a');
					$st = '<Row>'."\n";
					@fputs($ex, $st);
					$st = $row['order_id'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = $row['invoice_prefix'];
					$st = $st . $row['invoice_no'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = $rows2[$j]['model'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					
					$st = '';
					$row1 = $this->getProductByID($rows2[$j]['product_id']);
					if (!empty($row1)) {
						$sku = $row1['sku'];				
						$rows4 = $this->getOrderOption($rows2[0]['order_product_id']);
						if (!empty($rows4)) {
							$rows4 = $this->getoptsku($rows4[0]['product_option_value_id']);
							if (!empty($rows4) and !empty($rows4[0]['optsku'])) $sku = $rows4[0]['optsku'];
						}
					}	
					if (!empty($row1)) $st = $sku;
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					
					$st = $this->Code($rows2[$j]['name']);
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$qu = (int)$rows2[$j]['quantity'];
					$price = round($rows2[$j]['price'], 2);
					$summa = $qu*(float)$price;
					$summ[0] = $summ[0] + $price;
					$summ[1] = $summ[1] + $qu;					
					$st = '<Cell><Data ss:Type="String">'.(string)$price.'</Data></Cell>'."\n";
					@fputs($ex, $st);					
					$st = '<Cell><Data ss:Type="String">'.(string)$qu.'</Data></Cell>'."\n";
					@fputs($ex, $st);					
					$st = '<Cell><Data ss:Type="String">'.(string)$summa.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '';
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st1 = '';
					$st2 = '';
					for ($k=0; $k<10; $k++) {
						if (!isset($rows3[$k]['code'])) break;						
						if ($rows3[$k]['code'] == 'shipping') {
							$st1 = $rows3[$k]['title'];							
							$st2 = $rows3[$k]['value'];							
						}
					}
					$st = '<Cell><Data ss:Type="String">'.$st1.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '<Cell><Data ss:Type="String">'.$st2.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st1 = '';
					$st2 = '';
					$kk = 0;
					for ($k=0; $k<10; $k++) {
						if (!isset($rows3[$k]['code'])) break;						
						if ($rows3[$k]['code'] == 'tax') {
							$st1 = $rows3[$k]['title'];							
							$st2 = $rows3[$k]['value'];
							$kk = $k+1;
							break;
						}
					}
					$st = '<Cell><Data ss:Type="String">'.$st1.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '<Cell><Data ss:Type="String">'.$st2.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st1 = '';
					$st2 = '';
					if ($kk) {						
						for ($k=$kk; $k<10; $k++) {
							if (!isset($rows3[$k]['code'])) break;						
							if ($rows3[$k]['code'] == 'tax') {
								$st1 = $rows3[$k]['title'];							
								$st2 = $rows3[$k]['value'];
								break;
							}
						}
					}	
					$st = '<Cell><Data ss:Type="String">'.$st1.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '<Cell><Data ss:Type="String">'.$st2.'</Data></Cell>'."\n";
					@fputs($ex, $st);					
					$st = $row['firstname'] . ' ' . $row['lastname'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = $row['shipping_address_1'] . ' ' . $row['shipping_city'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = $row['telephone'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);					
					for ($k=0; $k<4; $k++) {						
						if (!isset($rows1[$k]['order_status_id'])) break;
						$st1 = '';
						$st2 = '';
						$row1  = $this->getOrderStatus((int)$rows1[$k]['order_status_id'], $lang);
						if (!empty($row1)) $st1 = $row1['name'];						
						$st2 = $rows1[$k]['date_added'];
						$st = '<Cell><Data ss:Type="String">'.$st1.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '<Cell><Data ss:Type="String">'.$st2.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					$st = '</Row>'."\n";
					@fputs($ex, $st);
					@fclose($ex);
					
					$tab = fopen($file_total,'w+b');				
					$str = serialize($summ);
					fwrite($tab, $str);			
				}
				$file_ex    = "./uploads/ex.xml";
				$ex = @fopen($file_ex,'a');
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				for ($k=$kk; $k<10; $k++) {
					if (!isset($rows3[$k]['code'])) break;						
					if ($rows3[$k]['code'] == 'total') {					
						$st = $rows3[$k]['value'];
						break;
					}
				}
				$summ[2] = $summ[2] + $st;
				$st = (string)$st;
				$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '';
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			}
			$file_ex    = "./uploads/ex.xml";
			$ex = @fopen($file_ex,'a');
			$st = '<Row>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);			
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = (string)$summ[0];
			$st = '';
			$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = (string)$summ[1];
			$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = (string)$summ[2];
			$st = '<Cell ss:StyleID="s20"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '';
			$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
			@fputs($ex, $st);
			$st = '</Row>'."\n";
			@fputs($ex, $st);
			@fclose($ex);
			
			$kol_cell = 26;
			$this->EndEx($kol_cell);
			
			$path = "./uploads/sos.tmp";
			if (file_exists($path)) unlink ($path);
			$path = "./uploads/total.tmp";
			if (file_exists($path)) unlink ($path);
			return;
		}
		
		$rows = $this->getSuppler_SEO($form_id);
		$seo_data = array();
		$seo_data['prod_photo'] = '';
		if (isset($rows[0]['prod_photo']))
		$seo_data['prod_photo'] = $this->symbol($rows[0]['prod_photo']);
		$seo_data['prod_h1'] = '';
		if (isset($rows[0]['prod_h1']))
		$seo_data['prod_h1'] = $this->symbol($rows[0]['prod_h1']);
		$seo_data['prod_title'] = '';
		if (isset($rows[0]['prod_title']))
		$seo_data['prod_title'] = $this->symbol($rows[0]['prod_title']);		
		$seo_data['prod_meta_desc'] = '';
		if (isset($rows[0]['prod_meta_desc']))
		$seo_data['prod_meta_desc'] = $this->symbol($rows[0]['prod_meta_desc']);		
		$seo_data['prod_desc'] = '';
		if (isset($rows[0]['prod_desc']))
		$seo_data['prod_desc'] = $this->symbol($rows[0]['prod_desc']);
		if (isset($rows[0]['prod_keyword']))
		$seo_data['prod_keyword'] = $this->symbol($rows[0]['prod_keyword']);
		if (isset($rows[0]['prod_url']))
		$seo_data['prod_url'] = $this->symbol($rows[0]['prod_url']);
		$seo_data['cat_title'] = '';
		if (isset($rows[0]['cat_title']))
		$seo_data['cat_title'] = $this->symbol($rows[0]['cat_title']);		
		$seo_data['cat_meta_desc'] = '';
		if (isset($rows[0]['cat_meta_desc']))
		$seo_data['cat_meta_desc'] = $this->symbol($rows[0]['cat_meta_desc']);		
		$seo_data['cat_desc'] = '';
		if (isset($rows[0]['cat_desc']))
		$seo_data['cat_desc'] = $this->symbol($rows[0]['cat_desc']);		
		$seo_data['manuf_title'] = '';
		if (isset($rows[0]['manuf_title']))
		$seo_data['manuf_title'] = $this->symbol($rows[0]['manuf_title']);		
		$seo_data['manuf_meta_desc'] = '';
		if (isset($rows[0]['manuf_meta_desc']))
		$seo_data['manuf_meta_desc'] = $this->symbol($rows[0]['manuf_meta_desc']);		
		$seo_data['manuf_desc'] = '';
		if (isset($rows[0]['manuf_desc']))
		$seo_data['manuf_desc'] = $this->symbol($rows[0]['manuf_desc']);
		$seo_data['seo_1'] = '';
		if (isset($rows[0]['seo_1']))
		$seo_data['seo_1'] = $this->symbol($rows[0]['seo_1']);
		$seo_data['seo_2'] = '';
		if (isset($rows[0]['seo_2']))
		$seo_data['seo_2'] = $this->symbol($rows[0]['seo_2']);
		$seo_data['seo_3'] = '';
		if (isset($rows[0]['seo_3']))
		$seo_data['seo_3'] = $this->symbol($rows[0]['seo_3']);
		$seo_data['seo_4'] = '';
		if (isset($rows[0]['seo_4']))
		$seo_data['seo_4'] = $this->symbol($rows[0]['seo_4']);
		$seo_data['seo_5'] = '';
		if (isset($rows[0]['seo_5']))
		$seo_data['seo_5'] = $this->symbol($rows[0]['seo_5']);
		$seo_data['seo_6'] = '';	
		if (isset($rows[0]['seo_6']))
		$seo_data['seo_6'] = $this->symbol($rows[0]['seo_6']);
		$seo_data['seo_7'] = '';
		if (isset($rows[0]['seo_7']))
		$seo_data['seo_7'] = $this->symbol($rows[0]['seo_7']);
		$seo_data['seo_8'] = '';
		if (isset($rows[0]['seo_8']))
		$seo_data['seo_8'] = $this->symbol($rows[0]['seo_8']);
		$seo_data['seo_9'] = '';
		if (isset($rows[0]['seo_9']))
		$seo_data['seo_9'] = $this->symbol($rows[0]['seo_9']);
		$seo_data['seo_10'] = '';
		if (isset($rows[0]['seo_10']))
		$seo_data['seo_10'] = $this->symbol($rows[0]['seo_10']);
		$seo_data['seo_11'] = '';
		if (isset($rows[0]['seo_11']))
		$seo_data['seo_11'] = $this->symbol($rows[0]['seo_11']);
		$seo_data['seo_12'] = '';
		if (isset($rows[0]['seo_12']))
		$seo_data['seo_12'] = $this->symbol($rows[0]['seo_12']);		
		$seo_data['seo_13'] = '';
		if (isset($rows[0]['seo_13']))
		$seo_data['seo_13'] = $this->symbol($rows[0]['seo_13']);
		$seo_data['seo_14'] = '';
		if (isset($rows[0]['seo_14']))
		$seo_data['seo_14'] = $this->symbol($rows[0]['seo_14']);
		$seo_data['seo_15'] = '';
		if (isset($rows[0]['seo_15']))
		$seo_data['seo_15'] = $this->symbol($rows[0]['seo_15']);
		$seo_data['seo_16'] = '';
		if (isset($rows[0]['seo_16']))
		$seo_data['seo_16'] = $this->symbol($rows[0]['seo_16']);
		$seo_data['seo_17'] = '';
		if (isset($rows[0]['seo_17']))
		$seo_data['seo_17'] = $this->symbol($rows[0]['seo_17']);		
		$seo_data['seo_18'] = '';
		if (isset($rows[0]['seo_18']))
		$seo_data['seo_18'] = $this->symbol($rows[0]['seo_18']);
		$seo_data['seo_19'] = '';
		if (isset($rows[0]['seo_19']))
		$seo_data['seo_19'] = $this->symbol($rows[0]['seo_19']);
		$seo_data['seo_20'] = '';
		if (isset($rows[0]['seo_20']))
		$seo_data['seo_20'] = $this->symbol($rows[0]['seo_20']);
		
		$rows = $this->getMySuppler($form_id);
		if (empty($rows)) return;
		$id	= $rows[0]['suppler_id'];
		$store = $rows[0]['addattr'];
		$kmenu = $rows[0]['kmenu'];
		$placep = $rows[0]['placep'];
		$disc   = $this->symbol($rows[0]['disc']);
		$onn    = $rows[0]['onn'];
		$cheap  = $rows[0]['cheap'];		
		$cprice  = $rows[0]['cprice'];
		$zero  = $rows[0]['zero'];
		$day = gmmktime(0, 0, 0, gmdate('m'), gmdate('d'), gmdate('Y'));
		$dform = (int)gmdate('d', $day);
		$onoff  = $rows[0]['onoff'];
		$upOptionFoto = $rows[0]['opt_fotos'];
		$usd  = $rows[0]['usd'];
		$jpt  = $rows[0]['jopt'];
		
		$rows  = $this->getSupplerPrice($form_id);
	
		$nomkol = array();
		$ident = array();
		$mratek = array();
		$param = array();
		$point = array();
		$noprice = array();
		$paramnp = array();
		$pointnp = array();
		$baseprice = array();
		$nompoint = 1;
		$max_site = 0;
		if ($rows) {			
			foreach ($rows as $value) {								
				$nomkol[$max_site] = $value['nom'];
				$ident[$max_site] = $this->getName($value['ident']);
				$mratek[$max_site] = str_replace(',', '.', $value['mratek']);
				$param[$max_site] = $value['param'];
				$point[$max_site] = $value['point'];
				$noprice[$max_site] = $value['noprice'];
				$paramnp[$max_site] = $value['paramnp'];
				$pointnp[$max_site] = $value['pointnp'];
				$baseprice[$max_site] = $value['baseprice'];				
				$max_site++;
			}	
		}
		
		$langs = $this->getAllLanguages();		
		
		$rows  = $this->getSupplerData($form_id);

		$mas_catid = array();
		$pic_int = array();
		$max = 0;
		foreach ($rows as $value) {
			$max++;			
			$mas_catid[$max] = $value['category_id'];
			$pic_int[$max] = trim($value['pic_int']);			
		}
				
		$except = 0;
		$path = "./uploads/exception.xml";
		if (file_exists($path)) {
			$except = 1;
			$file_con  = "./uploads/exception.xml"; 
			$con = @fopen($file_con,'r');			
			if (!$con) return 25;
						
			$st = '';
			$nex = 0;			
			$masex = array();	
			while (!feof($con)) {		
				while (!@feof($con) and !substr_count($st, "<Row")){
					$st = @fgets($con, 65534);
				}	
				if (@feof($con)) break;					
				
				$m = '';
				while (1) {						
					$st = @fgets($con, 65534);
					$m = $m.$st;
					if (@feof($con)) break;				
					if (substr_count($st, "</Row>"))  break;		
					if (substr_count($st, "<Cell") and substr_count($st, "</Cell")) break;	
										
					$st = @fgets($con, 65534);
					$m = $m.$st;
					if (@feof($con)) break;				
					if (substr_count($st, "</Row>"))  break;
					if (substr_count($st, "</Cell"))  break;
				}
				$posb = stripos($m, "String");
				if (!$posb) $posb = stripos($m, "Number");
					
				if (!$posb) break;
				$posb = $posb;
				$posb = stripos($m, ">", $posb)+1;
				$pose = stripos($m, "</Data", $posb);
				if (!$pose) $pose = stripos($m, "</ss:Data", $posb);
		
				if ($pose > $posb) {						
					$len = $pose - $posb;
					$m = substr($m, $posb, $len);
					$masex[$nex] = $m;
					$nex++;		
				}			
			}
			@fclose($con);		
		}
		
		if ($data['command'] == 166) {
			if ((int)$data['all'] == 1) {
				$this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = 0");
			} else {	
				$sup = "-";
				$l = strlen($id);
				if ($l < 2) $sup = $sup."0";
				$sup = $sup.$id;
				$this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = 0 WHERE `model` LIKE '%" . $sup ."'");
			
				$sup = "~";
				$l = strlen($id);
				if ($l < 2) $sup = $sup."0";
				$sup = $sup.$id;
				$this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = 0 WHERE `model` LIKE '%" . $sup ."'");
			}	
			return;
		}

		if ($data['command'] == 165) {
			$path = "./uploads/form.tmp";
			if (file_exists($path)) {
				$tab = fopen($path,'rb');
				if($tab) $dd = unserialize(fread($tab, filesize($path)));	
				if (!empty($dd)) $this->addSuppler($dd, 1);
				return;
			}
		}
		
		if ($data['command'] == 163) {
			$this->deleteAllCategories();
			return;
		}
		
		if ($data['command'] == 161) {
			$lang = $this->config->get('config_language_id');			
			$f = explode('|', $data['act_find']);
			$r = explode('|', $data['act_change']);
			$row = $this->getMaxManufacturerID();
			$max = $row['max(manufacturer_id)'];
			for ($j=1; $j<=$max; $j++) {
				$p = 0;
				$manufacturer_id = $j;
				$rows = $this->getManufacturerDesc($manufacturer_id, $lang);
				if (empty($rows)) continue;
				for ($k=0; $k<50; $k++) {
					if (!isset($f[$k])) break;
					$text = str_replace($this->FindReplace($f[$k]), $this->FindReplace($r[$k]), $rows[0]['description']);
					if ($text) $p = 1;
				}
				if ($p) {
					$text = trim($text);
					$this->db->query("UPDATE `" . DB_PREFIX . "manufacturer_description` SET `description` = '" . $this->db->escape($text) . "' WHERE `manufacturer_id` = '" . $manufacturer_id ."' and `language_id` = '" . $lang . "'");
				}
			}	
		}
			
		if ($data['command'] == 160) {			
			$f = explode('|', $data['act_find']);
			$r = explode('|', $data['act_change']);
			$row = $this->getMaxCategoryID();
			$max = $row['max(category_id)'];
			for ($j=1; $j<=$max; $j++) {
				$p = 0;
				$category_id = $j;
				$rows = $this->getCategoryName($category_id);
				if (empty($rows)) continue;
				for ($k=0; $k<50; $k++) {
					if (!isset($f[$k])) break;
					$text = str_replace($this->FindReplace($f[$k]), $this->FindReplace($r[$k]), $rows[0]['description']);
					if ($text) $p = 1;
				}
				if ($p) {
					$text = trim($text);
					$this->db->query("UPDATE `" . DB_PREFIX . "category_description` SET `description` = '" . $this->db->escape($text) . "' WHERE `category_id` = '" . $category_id ."' and `language_id` = '" . $this->config->get('config_language_id') . "'");
				}
			}	
		}	
		
		if ($data['command'] == 158) {
			$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 1 . "'");
		}
		
		if ($data['command'] == 100) {
			$rows = $this->getAllCategoriesStore($store);
			for ($i=0; $i<=10000; $i++) {
				if (!isset($rows[$i]['category_id'])) break;
				if ($rows[$i]['status']) continue;
				$cat = $rows[$i]['category_id'];	
				$ch = array();
				$this->subarr($rows, $cat, $ch);	
				if (!isset($ch[0]['category_id'])) {
					$rows1 = $this->getProductsInCategory($cat);
					if (!empty($rows1)) {	
						$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 1 . "' WHERE `category_id` = '" . $cat . "'");
						$rows[$i]['status'] = 1;
						unset($ch);
						continue;
					}
				}
				unset($ch);
			}
			for ($k=0; $k<10; $k++) {
				for ($i=0; $i<=10000; $i++) {
					if (!isset($rows[$i]['category_id'])) break;
					if ($rows[$i]['status']) continue;				
					$cat = $rows[$i]['category_id'];
					$rows1 = $this->getProductsInCategory($cat);
					if (!empty($rows1)) {
						$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 1 . "' WHERE `category_id` = '" . $cat . "'");
						$rows[$i]['status'] = 1;
					} else {					
						$ch = array();
						$this->subarr($rows, $cat, $ch);					
						$f = 0;
						for ($j=0; $j<=10000; $j++) {
							if (!isset($ch[$j]['category_id'])) break;
							if ($ch[$j]['status']) $f = 1;
						}	
						if ($f) {		
							$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 1 . "' WHERE `category_id` = '" . $cat . "'");
							$rows[$i]['status'] = 1;										
						}
						unset($ch);
					}	
				}	
			}			
		}
		
		if ($data['command'] == 157) {	
			$rows = $this->getAllCategoriesStore($store);
			for ($i=0; $i<=10000; $i++) {
				if (!isset($rows[$i]['category_id'])) break;
				if (!$rows[$i]['status']) continue;
				$cat = $rows[$i]['category_id'];	
				$ch = array();
				$this->subarr($rows, $cat, $ch);	
				if (!isset($ch[0]['category_id'])) {
					$rows1 = $this->getProductsInCategory($cat);
					if (empty($rows1)) {	
						$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 0 . "' WHERE `category_id` = '" . $cat . "'");
						$rows[$i]['status'] = 0;
						unset($ch);
						continue;
					}
				}
				unset($ch);
			}
			for ($k=0; $k<10; $k++) {
				for ($i=0; $i<=10000; $i++) {
					if (!isset($rows[$i]['category_id'])) break;
					if (!$rows[$i]['status']) continue;				
					$cat = $rows[$i]['category_id'];
					$rows1 = $this->getProductsInCategory($cat);
					if (!empty($rows1)) continue;	
					$ch = array();
					$this->subarr($rows, $cat, $ch);					
					$f = 1;
					for ($j=0; $j<=10000; $j++) {
						if (!isset($ch[$j]['category_id'])) break;
						if ($ch[$j]['status']) $f = 0;
					}	
					if ($f) {		
						$this->db->query("UPDATE `" . DB_PREFIX . "category` SET `status` = '" . 0 . "' WHERE `category_id` = '" . $cat . "'");
						$rows[$i]['status'] = 0;										
					}
					unset($ch);
				}	
			}			
		}

		if ($data['command'] == 141) {
			$row = $this->getMinAliasID();
			$min = $row['min(url_alias_id)'];
			$row = $this->getMaxAliasID();
			$max = $row['max(url_alias_id)'];
			
			for ($i=$min; $i<=$max; $i++) {
				$row = $this->getAlias($i);
				if (empty($row)) continue;		
				if (!substr_count($row['query'], "duct_id=")) continue;
				$a = $row['query'];
				$url_alias_id = $row['url_alias_id'];		
				$p = strpos($a, "=");
				$a = (int)substr($a, $p+1);	
				$row = $this->getProductByID((int)$a);
				if (empty($row)) {	
					$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE `url_alias_id` = '" . $url_alias_id . "'");
				}	
			}
		}	
		
		if ($data['command'] == 18) $this->CreateSkuTable($store);
		
		if ($data['command'] == 137) {
			$this->exportForm($form_id);
			return;
		}
		
		if ($data['command'] == 135) {
			if ($data['act_find'] == '') return;
			$find = $this->FindReplace($data['act_find']);			
			$rows = $this->getOptionValueByName($find);
			if (empty($rows)) return;
			$option_value_id = $rows[0]['option_value_id'];
		}	
		
		if ($data['command'] == 126 and isset($data['act_find'])) $this->deleteDoubleOptions($this->FindReplace($data['act_find']));
	
		if ($data['command'] == 79 and isset($data['act_find'])) $this->FindReplaceOption($this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
		
		if ($data['command'] == 118) {
			$this->db->query("TRUNCATE " . DB_PREFIX . "product_master");
			$this->db->query("TRUNCATE " . DB_PREFIX . "product_special_attribute");			
		}
		
		if ($data['command'] == 119) {			
			if (!$data['act_filter_group_id']) return 32;
			if (!$data['act_attribut']) return 34;
		}			

		if ($data['command'] == 104) {		
			if (!$data['act_filter_group_id']) return 32;			
		}
		
		if ($data['command'] == 105) {			
			if (!$data['act_filter_group_id']) return 32;
			if (!$data['act_change'] or !$data['act_find']) return 33;			
			$this->checkFilter($this->FindReplace($data['act_find']), $data['act_filter_group_id'], $lang, $filter_id);
			$filter_old = $filter_id; 
			if ($filter_id) {
				$this->checkFilter($this->FindReplace($data['act_change']), $data['act_filter_group_id'], $lang, $filter_id);
				if (!$filter_id) {
					$this->db->query("UPDATE `" . DB_PREFIX . "filter_description` SET `name` = '" . $this->db->escape($this->FindReplace($data['act_change'])) . "' WHERE `filter_id` = '" .(int)$filter_old . "'");
				} else {
					$err =  "Filter " . $this->symbol($this->FindReplace($data['act_change'])) ." already exist " . "  \n";
					$this->adderr($err);
				}	
			}
			return 0;
		}
		
		if ($data['command'] == 182) {
			$file_sos    = "./uploads/sos.tmp";
			if (!file_exists ($file_sos)) $this->db->query("UPDATE " . DB_PREFIX . "option_value SET `image` = ''");
		}
		
		if ($data['command'] == 27) {
			$path = "../image1/";
			if (!is_dir($path)) return 29;
			$file_sos    = "./uploads/sos.tmp";
			if (!file_exists ($file_sos)) {
				$row = $this->getMaxOptionValueID();
				$max = $row['max(option_value_id)'];
				for ($ii=1; $ii<=$max; $ii++) {
					$row = $this->getOptionValuePhoto($ii);
					if (isset($row['image']) and !empty($row['image'])) {
						$path_old = "../image/" . $row['image'];
						$path_new = "../image1/" . $row['image'];
						$a = copy ($path_old, $path_new);					
					}
				}
				$row = $this->getMaxCategoryID();
				$max = $row['max(category_id)'];
				for ($ii=1; $ii<=$max; $ii++) {
					$rows = $this->getCategoryPhoto($ii);
					if (isset($rows[0]['image']) and !empty($rows[0]['image'])) {
						$path_old = "../image/" . $rows[0]['image'];
						$path_new = "../image1/" . $rows[0]['image'];
						$a = copy ($path_old, $path_new);					
					}
				}
				$row = $this->getMaxManufacturerID();
				$max = $row['max(manufacturer_id)'];
				for ($ii=1; $ii<=$max; $ii++) {				
					$rows = $this->getManufacturerStore($ii, $store);
					if (isset($rows[0]['image']) and !empty($rows[0]['image'])) {
						$path_old = "../image/" . $rows[0]['image'];
						$path_new = "../image1/" . $rows[0]['image'];
						$a = copy ($path_old, $path_new);					
					}
				}
			}
		}
		
		if ($data['command'] == 87) {
			if (isset($data['act_cat'])) $this->FixDesCategoryNest($seo_data, $store, $data['act_cat']);
			return 0;
		}
	
		if ($data['command'] == 86) {
			if (isset($data['act_cat'])) $this->FixDesCategoryOne($seo_data, $store, $data['act_cat']);
			return 0;
		}
		
		if ($data['command'] == 84) {
			if (isset($data['act_cat'])) $this->FixMetaCategoryNest($seo_data, $store, $data['act_cat']);
			return 0;
		}
		if ($data['command'] == 85) {
			if (isset($data['act_cat'])) $this->FixMetaCategoryOne($seo_data, $store, $data['act_cat']);
			return 0;
		}
		if ($data['command'] == 154) {
			$this->FillMetaCategory($seo_data, $store);
			return 0;
		}
		if ($data['command'] == 31) {
			$this->FixMetaCategory($seo_data, $store);
			return 0;
		}
		if ($data['command'] == 32) {
			$this->FixMetaManufacturer($seo_data, $store);
			return 0;
		}
		if ($data['command'] == 57) {
			$this->FixURLCategory($seo_data, $store);
			return 0;
		}
		if ($data['command'] == 58) {
			$this->FixURLManufacturer($seo_data, $store);
			return 0;
		}
		if ($data['command'] == 156) {
			$this->uniqueCatManuf($store);
			return 0;
		}		
		if ($data['command'] == 49) {
			$this->FixDescCategory($seo_data, $store);
			return 0;
		}
		
		if ($data['command'] == 50) {
			$this->FixDescManufacturer($seo_data, $store);
			return 0;
		}
		
		if ($data['command'] == 52) {
			$this->FillDescCategory($seo_data, $store);
			return 0;
		}
		
		if ($data['command'] == 53) {
			$this->FillDescManufacturer($seo_data, $store);
			return 0;
		}
		
		if ($data['command'] == 64) {
			$this->DoubleAliasCat();
			return 0;
		}
		
		if ($data['command'] == 65) {
			$this->DoubleAliasManuf();
			return 0;
		}		
		
		if (!isset($data['act_attribut'])) $data['act_attribut'] = '';
		if (!isset($data['act_find'])) $data['act_find'] = '';
		if (!isset($data['act_change'])) $data['act_change'] = '';
		
		if ($data['command'] == 61) {	
			$find = $this->FindReplace($data['act_find']);
			$replace = $this->FindReplace($data['act_change']);			
			$manufacturer_idF = '';
			$rows = $this->getManufacturerID($find, $store);
			if (!empty($rows)) $manufacturer_idF = $rows[0]['manufacturer_id'];
			$manufacturer_idR = '';
			$rows = $this->getManufacturerID($replace, $store);
			if (!empty($rows)) $manufacturer_idR = $rows[0]['manufacturer_id'];			
		}
		
		$table_sku = 1;
	//	$table_sku = $this->getTable();		

		$path = "./uploads/";		
		if (!is_dir($path)) return 30;

		if ($data['command'] == 47) {
			$row = $this->getMaxAttributeID();
			$max = $row['max(attribute_id)'];			
			
			$file_sos    = "./uploads/sos.tmp";
			$was_timelimit = 0;
			if (!file_exists ($file_sos)) {
				$sos = fopen($file_sos,'w+');
				if (!$sos) { @fclose($sos); return 2;}
				chmod($file_sos, 0777);
				@fclose($sos);
				$pid = 0;				
			} else {			
				$sos = fopen($file_sos,'r+');
				$pid = (int)fgets($sos, 10);
				if (empty($pid)) $pid = 0;
				else $was_timelimit = 1;
				@fclose($sos);
			}
			
			for ($i=$pid; $i<=$max; $i++) {
				$row = $this->isAttribute($i);
				if (!empty($row)) {
					$e = $this->putsos($i, '');
					if ($e < 0) return 2;	
					$rows = $this->isProductByAttribute($i);
					if (empty($rows)) $this->DelAttribute($i);
				}
			}
			if (file_exists($file_sos)) unlink ($file_sos);
		}
		$nompoint = $dform-$jpt;
		if ($data['command'] == 14) {
	
			$row = $this->getMaxAttributeID();
			$max = $row['max(attribute_id)'];
			
			$file_table = "./uploads/attribute.tmp";
			$file_sos    = "./uploads/sos.tmp";
			$was_timelimit = 0;
			if (!file_exists ($file_sos)) {
						
				if (file_exists($file_table)) @unlink ($file_table);				
				$table = array();
				$i = 1;
				for ($k=1; $k<=$max; $k++) {
					$rows = $this->getAttributeName($k);
					if (!empty($rows)) {					
						$rows = $this->getAttributeID($rows[0]['name']);						
						if (!empty($rows) and isset($rows[1]['attribute_id'])) {
							$j=0;
							foreach ($rows as $r) {
								$fl = 0;
								for ($l=1; $l<10000; $l++) {
									if (!isset($table[$l][0])) break;
									for ($ll=0; $ll<10000; $ll++) {
										if (!isset($table[$l][$ll])) break;
										if ($table[$l][$ll] == $r['attribute_id']) {
											$fl = 1;
											break;
										}	
									}
								}
								if (!$fl) {
									$table[$i][$j] = $r['attribute_id'];	
									$j++;
								}
							}
							if ($j>1) $i++;
						}	
					}
				}
				$tab = fopen($file_table,'w+b');
				$str_table = serialize($table);
				if (fwrite($tab, $str_table) === false) {
					@fclose($tab);
					return 26;
				}	
				@fclose($tab);

				$sos = fopen($file_sos,'w+');
				if (!$sos) { @fclose($sos); return 2;}
				chmod($file_sos, 0777);
				@fclose($sos);
				$row = $this->getMinID();
				$pid = $row['min(product_id)'];		
			} else {			
				$sos = fopen($file_sos,'r+');
				$pid = (int)fgets($sos, 10);
				if (empty($pid)) {
					$row = $this->getMinID();
					$pid = $row['min(product_id)'];
				} else $was_timelimit = 1;	
				@fclose($sos);
				
				$tab = fopen($file_table,'rb');
				if(!$tab) return 27;
				$table = unserialize(fread($tab, filesize($file_table)));	
				if (empty($table)) return 26;
			}	
			
			$row = $this->getMaxID();
			$max_id = $row['max(product_id)'];		
			for ($k=$pid; $k<=$max_id; $k++) {
				$row  = $this->getProductByIDStore($k, $store);
				if (empty($row)) continue;
					
				$e = $this->putsos($k, '');
				if ($e < 0) return 2;	
				
				$rows = $this->getAttrib($row['product_id']);
				foreach ($rows as $r){			
					for ($i=1; $i<10000; $i++) {
						if (!isset($table[$i][0])) break;
						for ($j=1; $j<10000; $j++) {
							if (!isset($table[$i][$j])) break;							
							if ($r['attribute_id'] == $table[$i][$j]) {						
								$this->changeAttributeId($row['product_id'], $table[$i][0], $r['attribute_id']);		
							
							}
						}
						for ($j=1; $j<10000; $j++) {
							if (!isset($table[$i][$j])) break;
							$this->DelAttribute($table[$i][$j]);
						}	
					}	
				}				
			}			
			if (file_exists($file_table)) unlink ($file_table);
			if (file_exists($file_sos)) unlink ($file_sos);
			return 0;	
		}
		
		if ($data['command'] == 15) {	
			$file_con  = "./uploads/conv.xml"; 
			$con = @fopen($file_con,'r');			
			if (!$con) return 25;
						
			$st = '';
			$j = 0;
			$text = array();	
			$mas_con = array();	
			while (!feof($con)) {		
				while (!@feof($con) and !substr_count($st, "<Row")){
					$st = @fgets($con, 65534);
				}	
				if (@feof($con)) break;						
			
				for ($i=1; $i<4; $i++) {
					$m = '';
					while (1) {						
						$st = @fgets($con, 65534);
						$m = $m.$st;
						if (@feof($con)) break;				
						if (substr_count($st, "</Row>"))  break;		
						if (substr_count($st, "<Cell") and substr_count($st, "</Cell")) break;	
											
						$st = @fgets($con, 65534);
						$m = $m.$st;
						if (@feof($con)) break;				
						if (substr_count($st, "</Row>"))  break;
						if (substr_count($st, "</Cell"))  break;
					}
					$posb = stripos($m, "String");	
	
					if (!$posb) break;					
					$posb = stripos($m, ">", $posb)+1;
					$pose = stripos($m, "</Data", $posb);
					if (!$pose) $pose = stripos($m, "</ss:Data", $posb);
		
					if ($pose > $posb) {						
						$len = $pose - $posb;
						$m = substr($m, $posb, $len);
	
						if ($i < 3) $mas_con[$j][$i] = $m;						
						if ($i == 3) {
							$m = $this->symbol($m);								
							$m = str_replace("html:", "", $m);						
							$m = str_replace("&#10;", "<br />", $m);							
							$m = str_replace("&#xD;&#xA;", "<br />", $m);		
							$m = str_replace('Size="8"', 'size="0"', $m);
							$m = str_replace('Size="9"', 'size="0"', $m);
							$m = str_replace('Size="10"', 'size="2"', $m);
							$m = str_replace('Size="11"', 'size="3"', $m);
							$m = str_replace('Size="12"', 'size="3"', $m);
							$mas_con[$j][$i] = $m;			
						}			
					} 
				}
				$j++;
			}
			@fclose($con);	
		}
		$was_timelimit = 0;	
		$file_sos    = "./uploads/sos.tmp"; 
		if (!file_exists ($file_sos)) {
		
			$path = "./uploads/report.tmp";
			if (file_exists($path)) @unlink ($path);
		
			$path = "./uploads/errors.tmp";
			if (file_exists($path)) @unlink ($path);
			
			$path = "./uploads/ex.xml";
			if (file_exists($path) and $data['command'] != 26) @unlink ($path);
		}
		
		if ($data['command'] == 69) {			
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) {
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);			
			
				for ($j=0; $j<24; $j++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
					@fputs($ex, $st);
				}
				$st = '<Row>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Base price</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">My margin</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Real margin</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price in Store</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Min. market price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Aver. market price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Max. market price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Optimal price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Percent to price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Percent to base price</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Percent to base discount price</Data></Cell>'."\n";
				@fputs($ex, $st);				
				$rows = $this->getSupplerPriceSort($form_id);
				for ($j=0; $j<10; $j++) {
					$st = '';	
					if (isset($rows[$j]['ident'])) $st = $this->code($rows[$j]['ident']);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">' . $st . '</Data></Cell>'."\n";
					@fputs($ex, $st);
				}					
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			} else {				
				$file_ex  = "./uploads/ex.xml";		
				$ex = @fopen($file_ex,'r+');					
				$offcet = 0;
				$seek = 0;
				while (!@feof($ex)) {						
					$st = @fgets($ex, 2048);
					$offcet = $offcet + strlen($st);
					if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
				}
				ftruncate($ex, $seek);	
				@fclose($ex);				
			}
		}	
		
		if ($data['command'] == 30) {			
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) {
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);			
			
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="400"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="400"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				
				$st = '<Row>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code1</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code2</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU1</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU2</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name1</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name2</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price1</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price2</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			} else {				
				$file_ex  = "./uploads/ex.xml";		
				$ex = @fopen($file_ex,'r+');					
				$offcet = 0;
				$seek = 0;
				while (!@feof($ex)) {						
					$st = @fgets($ex, 2048);
					$offcet = $offcet + strlen($st);
					if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
				}
				ftruncate($ex, $seek);	
				@fclose($ex);				
			}	
		}

		if 	($data['command'] == 26) {
			$file_ex  = "./uploads/attribute.xml";
			if (!file_exists($file_ex)) return 26;
			$ex = @fopen($file_ex,'r');			
			if (!$ex) return 26;		
		
			$st = '';			
			$k = -1;
			while (!feof($ex)) {
				$k++;
				while (!@feof($ex) and !substr_count($st, "<Row")) {
					$st = @fgets($ex, 65534);
				}	
				if (@feof($ex)) break;

				for ($j=1; $j<2003; $j++) { $row[$j] = NULL;}	
				$i = -1;
				$br = 0;
				$ext = 1;			
				while ($ext) {			
					$st = @fgets($ex, 65534);
					if (@feof($ex)) break;				
					if (substr_count($st, "</Row>"))  break;
								
					if (!substr_count($st, "<Cell")) {
				
						if (substr_count($st, "</Data")) $pose = strpos($st, "</Data"); 
							else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data"); 
									else $pose = strlen($st) - 1;
						if ($pose and $br) $row[$i] = $row[$i].preg_replace('| +|', ' ', substr($st, 0, $pose));					
						continue;
					
					} else {					
						$i++;
						$p = strpos($st, "Index=");
						if ($p != 0) {							
							$pe = strpos($st, '"', $p+7);
							$ii = substr ($st, $p+7, $pe-$p-7)-1;
							if ($ii>$i) {
								for ($ll=$i; $ll<$ii; $ll++) {
									$masatt[$k][$ll] = '';
								}
								$i = $ii;
							}	
						}					
						$br = 0;
						$a = ">";
						$posb1 = strpos($st, "String");
						if ($posb1 === false) $posb1 = 999;
						$posb2 = strpos($st, "Number");
						if ($posb2 === false) $posb2 = 999;													
						$posb3 = strpos($st, "HRef=");
						if ($posb3 === false) $posb3 = 999;
						$posb4 = strpos($st, "Boolean");
						if ($posb4 === false) $posb4 = 999;
							
						if ($posb1 < $posb2) $posb = $posb1;
						else $posb = $posb2;
						if ($posb4 < $posb) $posb = $posb4;
							
						if ($posb3 < $posb) {
							$posb = $posb3;
							$a = '"';						
						}		
						if ($posb != 999)	{					
							$posb = strpos($st, $a , $posb) +1;
							if ($posb < 0) continue;
							$pose = 0;
							if ($a != '"') {						
								if (substr_count($st, "</Data")) $pose = strpos($st, "</Data", $posb); 
								else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data", $posb); 
							} else $pose = strpos($st, $a, $posb); 
							if (!$pose) {
								$br = 1;
								$row[$i] = substr($st, $posb);
								continue;
							}	
							if ($pose and $pose > $posb) {						
								$len = $pose - $posb;
								$row[$i] = substr($st, $posb, $len);		
							} 
						} else continue;
					}
					$masatt[$k][$i] = $row[$i];
		
				}		
			}			
		}	
		
		if 	($data['command'] == 25) {	
			$file_table = "./uploads/attribute.tmp";
			$path = "./uploads/ex.xml";
			$file_sos = "./uploads/sos.tmp"; 
			if (!file_exists ($file_sos)) {
				if (file_exists($file_table)) unlink ($file_table);
				$tab = fopen($file_table,'w+b');				
				@fclose($tab);
			} else {
				if (!file_exists($file_table)) return 27;
				$tab = fopen($file_table,'rb');
				if(!$tab) return 27;
				$l = filesize($file_table);
				if ($l) $masatt = unserialize(fread($tab, $l));
				@fclose($tab);
			}	
			if (!file_exists($path)) {			
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);				
				for ($j=0; $j<2003; $j++) {
					$st = ' <Column ss:AutoFitWidth="0" ss:Width="82"/>'."\n";
					@fputs($ex, $st);
				}
				
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Attribute ID</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Attribute Name</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">New Name</Data></Cell>'."\n";
				@fputs($ex, $st);
			
				for ($j=0; $j<1000; $j++) {
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Attribute Value</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">New Value</Data></Cell>'."\n";
					@fputs($ex, $st);
				}		

				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			}
		}
				
		if 	($data['command'] == 12 or $data['command'] == 88 or $data['command'] == 120 or $data['command'] == 136 or $data['command'] == 178) {		
				$nf = 12;
				$allOptions = array();
				$rows = $this->getOptions();
				$max_options = 0;				
				foreach ($rows as $value) {
					$max_options++;
					$allOptions[$max_options] = $value['option_id'];
					}
				$max_opt7 = $max_options*7;
				
				$path = "./uploads/ex.xml";
				if (!file_exists($path)) {
					$file_ex    = "./uploads/ex.xml";					
					$ex = @fopen($file_ex,'w+');			
					if (!$ex) return 3;
					$this->StartEx($ex);
					$kk = 20;
					if ($data['command'] == 178) $kk = 10;
					for ($j=1; $j<$kk; $j++) {
						$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
						@fputs($ex, $st);
					}
				
					$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
					@fputs($ex, $st);					
					
					for ($j=1; $j<=$nf; $j++) {
						$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
						@fputs($ex, $st);
					}				
				
					if ($data['command'] != 120  and $data['command'] != 136) {
						if ($data['command'] != 178) {
							for ($j=1; $j<12; $j++) {
								$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
								@fputs($ex, $st);
							}
					
							for ($j=1; $j<19; $j++) {
								$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="82"/>'."\n";
								@fputs($ex, $st);
							}
					
							for ($j=1; $j<14; $j++) {
								$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
								@fputs($ex, $st);
							}						
						} else {
							$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
							@fputs($ex, $st);
						}	
						$rows = $this->getOptions();
						$max_options = 0;				
						foreach ($rows as $value) {
							$max_options++;
							$allOptions[$max_options] = $value['option_id'];
							for ($l=0; $l<7; $l++) {
								$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="82"/>'."\n";
								@fputs($ex, $st);
							}	
						}
						if ($data['command'] != 178) {
							$a = $max_a*2;
							if ($data['command'] == 88) $a = $max_a;
							for ($j=0; $j<$a; $j++) {
								$st = ' <Column ss:StyleID="s16" ss:AutoFitWidth="0" ss:Width="82"/>'."\n";
								@fputs($ex, $st);
							}
						}	
					}
					$st = '<Row>'."\n";
					@fputs($ex, $st);
					if ($data['command'] != 178) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Sort Order</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Code</Data></Cell>'."\n";
						@fputs($ex, $st);
					}	
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Main SKU</Data></Cell>'."\n";
					@fputs($ex, $st);
					if ($data['command'] != 178) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">UPC</Data></Cell>'."\n";
						@fputs($ex, $st);				
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">EAN</Data></Cell>'."\n";
						@fputs($ex, $st);						
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">JAN</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">ISBN</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">MPN</Data></Cell>'."\n";
						@fputs($ex, $st);			
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Location</Data></Cell>'."\n";
						@fputs($ex, $st);
					}	
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Category</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Parent Category</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Parent Category</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Parent Category</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Parent Category</Data></Cell>'."\n";
					@fputs($ex, $st);					
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Quantity</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price</Data></Cell>'."\n";
					@fputs($ex, $st);
					if ($data['command'] != 178) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Special Price</Data></Cell>'."\n";
						@fputs($ex, $st);
					}	
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Description</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Main photo</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					if ($data['command'] != 120 and $data['command'] != 136) {
						for ($j=1; $j<=$nf; $j++) {
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}
					}
					$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Manufacturer</Data></Cell>'."\n";
					@fputs($ex, $st);
					if ($data['command'] != 178) {
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Weight</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Length</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Width</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Height</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">HTML-tag H1</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">HTML-tag Title</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-tag Keywords</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Meta-tag Description</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Tags</Data></Cell>'."\n";
						@fputs($ex, $st);	
						$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">URL</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					if ($data['command'] != 120 and $data['command'] != 136) {
						if ($data['command'] != 178) {
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo for Category</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo for Parentcategory</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo for Parentcategory</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo for Parentcategory</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo for Parentcategory</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Related products</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Status</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Discount1</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Discount2</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Discount3</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Discount4</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Discount5</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product Bonus</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Bonus1</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Bonus2</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Bonus3</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Bonus4</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Сost</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Competitor1</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Link1</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Competitor2</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Link2</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Competitor3</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Link3</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Competitor4</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Link4</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Competitor5</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Link5</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Margin (%%)</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Curr</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Base Price</Data></Cell>'."\n";
							@fputs($ex, $st);
						}
						for ($j=1; $j<=$max_options; $j++) {					
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">OPTION'.$j.'-&gt;</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Quantity'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Add to price'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Points'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Weight'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Photo'.$j.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}				
						
						if ($data['command'] == 88) {					
							for ($j=1; $j<=$max_a; $j++) {								
								$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Attribute Value</Data></Cell>'."\n";
								@fputs($ex, $st);
							}
						} elseif ($data['command'] != 178) {
							for ($j=1; $j<=$max_a; $j++) {						
								$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">'.'Attribute Name'.'</Data></Cell>'."\n";
								@fputs($ex, $st);
								$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Attribute Value</Data></Cell>'."\n";
								@fputs($ex, $st);
							}
						}	
					}
					$st = '</Row>'."\n";
					@fputs($ex, $st);
					@fclose($ex);
				} 
		}
		$was_timelimit = 0;
		$file_sos    = "./uploads/sos.tmp";
		if (file_exists ($file_sos)) {
			$sos = @fopen($file_sos,'r+');
			$pid = (int)fgets($sos, 10);
			if (empty($pid)) {
				$row = $this->getMinID();
				$pid = $row['min(product_id)']-1;
			} else $was_timelimit = 1;
			@fclose($sos);
		} else {
			$sos = @fopen($file_sos,'w+');
			if (!$sos) { @fclose($sos); return 2;}
			chmod($file_sos, 0777);
			$row = $this->getMinID();
			$pid = $row['min(product_id)']-1;		
		}	
	
		$pid++;	
		
		$row = $this->getMaxID();
		$max_id = $row['max(product_id)'];
		
		if ($data['cod-id'] and $data['cod_from'] and !$was_timelimit) $pid = (int)$data['cod_from'];
		if ($data['cod-id'] and $data['cod_to']) $max_id = (int)$data['cod_to'];
		
		for ($i=$pid; $i<=$max_id; $i++) {
			$this->putsos($i-1, '');
			$row  = $this->getProductByIDStore($i, $store);			
			if (empty($row)) continue;

			if ($except) {
				if ($this->checkException($row['sku'], $masex, $nex)) continue;					
			}

			if (!isset($time_limit) or ((isset($time_limit) and $time_limit != 2.71828))) {
				$rows1 = $this->getSuppler_SEO($form_id);
				$time_limit = 2.71828;	
		
				$rows1 = $this->getMySuppler($form_id);
				if (empty($rows1)) return;
				$id	= $rows1[0]['suppler_id'];
				$store = $rows1[0]['addattr'];
				$kmenu = $rows1[0]['kmenu'];
				$placep = $rows1[0]['placep'];
				$disc   = $rows1[0]['disc'];
				$onn    = $rows1[0]['onn'];
				$cheap  = $rows1[0]['cheap'];				
				$cprice  = $rows1[0]['cprice'];
				$zero  = $rows1[0]['zero'];
				$onoff  = $rows1[0]['onoff'];
				$sleep  = $rows1[0]['sleep'];
				$ffile  = $rows1[0]['ffile'];
		
				$rows1  = $this->getSupplerPrice($form_id);
	
				$nomkol = array();
				$ident = array();
				$mratek = array();
				$param = array();
				$point = array();
				$noprice = array();
				$paramnp = array();
				$pointnp = array();
				$baseprice = array();
				$max_site = 0;
				if ($rows1) {			
					foreach ($rows1 as $value) {								
						$nomkol[$max_site] = $value['nom'];
						$ident[$max_site] = $this->getName($value['ident']);
						$mratek[$max_site] = str_replace(',', '.', $value['mratek']);
						$param[$max_site] = $value['param'];
						$point[$max_site] = $value['point'];
						$noprice[$max_site] = $value['noprice'];
						$paramnp[$max_site] = $value['paramnp'];
						$pointnp[$max_site] = $value['pointnp'];
						$baseprice[$max_site] = $value['baseprice'];				
						$max_site++;
					}	
				}
				
				$cmd = $nompoint;
				if ($data['command'] == 155 or $data['command'] == 181) {
					if (empty($data['act_find'])) return;
					$Aoption_value_id = 0;
					$rows = $this->getOptionValueByName($this->FindReplace($data['act_find']));
					if (!empty($rows)) $Aoption_value_id = $rows[0]['option_value_id'];
					else return;
				}				

				if (($data['command'] >= 106 and $data['command'] <= 108) or $data['command'] == 186 or ($data['command'] >= 189 and $data['command'] <= 192) or ($data['command'] >= 147 and $data['command'] <= 152) or $data['command'] == 198) {
					if (empty($data['act_find'])) return;					
					$rows = $this->getAttributeID($data['act_find']);	
					if (empty($rows)) return;
					$Aattribute_id = $rows[0]['attribute_id'];
				}

				if ($data['command'] == 183 or $data['command'] == 193 or $data['command'] == 132 or $data['command'] == 133) {
					if (empty($data['act_find'])) return;
					$Aoption_id = 0;
					$rows = $this->getOptionID($this->FindReplace($data['act_find']));
					if (!empty($rows)) $Aoption_id = $rows[0]['option_id'];
				}
			
				if ($data['inoption'] and $data['isoptvalue']) {
					$Aoption_id = 0;
					$Aoption_value_id = 0;
					$rows = $this->getOptionID($this->FindReplace($data['inoption']));
					if (!empty($rows)) $Aoption_id = $rows[0]['option_id'];
					if ($Aoption_id) $rows = $this->getOptionValueByName1($Aoption_id, $this->FindReplace($data['isoptvalue']));
					else return;
					if (!empty($rows)) $Aoption_value_id = $rows[0]['option_value_id'];
					else {
						$rows = $this->getOptionValueByName1($Aoption_id, $this->FindReplace($data['isoptvalue']));
						if (!empty($rows)) $Aoption_value_id = $rows[0]['option_value_id'];
					}	
				}
				
				if ($data['act_attribut'] and !$data['act_noattribut']) {
					$finds = explode("|", $data['act_attribut']);					
					for ($ii=0; $ii<500; $ii++) {
						if (!isset($finds[$ii])) break;
						$rows = $this->getAttributeID($this->FindReplace($finds[$ii]));
						if (!empty($rows)) $Aattribute_idf[$ii] = $rows[0]['attribute_id'];
						else $Aattribute_idf[$ii] = 0;	
					}
				}

				if ($data['act_noattribut'] and !$data['act_attribut']) {
					$finds = explode("|", $data['act_noattribut']);					
					for ($ii=0; $ii<500; $ii++) {
						if (!isset($finds[$ii])) break;
						$rows = $this->getAttributeID($this->FindReplace($finds[$ii]));
						if (!empty($rows)) $Anoattribute_idf[$ii] = $rows[0]['attribute_id'];
						else $Anoattribute_idf[$ii] = 0;
					}
				}
				
				if ($data['act_noattribut'] and $data['act_attribut'] and $data['act_attribut'] != $data['act_noattribut']) {
					
					$finds = explode("|", $data['act_attribut']);				
					$rows = $this->getAttributeID($this->FindReplace($finds[0]));
					if (!empty($rows)) $Aattribute_idf = $rows[0]['attribute_id'];
					else return;
					$finds = explode("|", $data['act_noattribut']);				
					$rows = $this->getAttributeID($this->FindReplace($finds[0]));
					if (!empty($rows)) $Anoattribute_idf = $rows[0]['attribute_id'];
					else return;
				}	
			}	
			
			$p = strrpos($row['model'], "-");
			if (!$p) $p = strrpos($row['model'], "~");
			
			if (!$data['cod-id']) { 
				if ((preg_match('/^[0-9-~]+$/', $row['model']) and $p > 0) or 
					(substr_count($row['model'], 'Series') and $p > 0)) {				
					$sup = substr($row['model'], $p+1, 2);
					$number = substr($row['model'], 0, $p);
					
					if (!empty ($data['cod_from']) and (int)$data['cod_from'] > (int)$number) continue;
					if (!empty ($data['cod_to']) and (int)$data['cod_to'] < (int)$number) continue;
					if ((int)$data['all'] == 0 and $id != (int)$sup) continue;				
				} else { 
					if ((int)$data['all'] == 0) continue;
					if (!empty ($data['cod_from']) or !empty ($data['cod_to'])) continue;				
				}
			} else {
				$sup = 0;
				if ($p > 0) $sup = substr($row['model'], $p+1, 2);
				if (!empty ($data['cod_from']) and (int)$data['cod_from'] > (int)$row['product_id']) continue;
				if (!empty ($data['cod_to']) and (int)$data['cod_to'] < (int)$row['product_id']) continue;
				if ((int)$data['all'] == 0 and $id != (int)$sup) continue;
			}
				
			if (!empty ($data['price_from']) and (float)$data['price_from'] > (float)$row['price']) continue;
			if (!empty ($data['price_to']) and (float)$data['price_to'] < (float)$row['price']) continue;
	
			if (!isset($row) or !isset($row['date_modified']) or !isset($row['price']) or 
				!isset($row['stock_status_id']) or !isset($row['quantity']) or !isset($row['manufacturer_id']) or 
				!isset($row['status'])) continue;
		
			if (!empty($data['act_cat'])) {			
				$rows = $this->getProductCategory($row['product_id']);				
				$j = 0;
				foreach ($rows as $cat) {
					for ($l=0; $l<2000; $l++) {
						if (!isset($data['act_cat'][$l])) break;
						if ($cat['category_id'] == (int)$data['act_cat'][$l]) {
							$j++;
							break;
						}
					}
					if ($j) break;
				}				
				if ($j == 0) continue;
			}

			if (!empty($data['act_manuf'])) {						
				$j = 0;				
				for ($l=0; $l<2000; $l++) {
					if (!isset($data['act_manuf'][$l])) break;	
					if ($row['manufacturer_id'] == (int)$data['act_manuf'][$l]) {	
						$j++;
						break;
					}
				}					
				if (!$j) continue;
			}

			if (!empty($data['spec_disc'])) {
				$r = 0;
				if ($data['spec_disc'] == 1 or $data['spec_disc'] == 3) {
					$rows = $this->getActionAll($row['product_id']);
					if (empty($rows) and $data['spec_disc'] == 1) continue;
					if (!empty($rows) and $data['spec_disc'] == 4) continue;
					if (!empty($rows)) $r = 1;
				} 
				if ($data['spec_disc'] == 2 or $data['spec_disc'] == 3) {
					$rows = $this->getDiscountAll($row['product_id']);
					if (empty($rows) and $data['spec_disc'] == 2) continue;
					if (!empty($rows) and $data['spec_disc'] == 4) continue;
					if (!empty($rows)) $r = 1;
				}
				if ($data['spec_disc'] == 3 and !$r) continue;
			}
			
			if (!empty($data['status_num']) and $data['status_num'] != $row['stock_status_id']) continue;
		
			$y1 = (int)substr($data['filter_date_start'], 0, 4);
			$m1 = (int)substr($data['filter_date_start'], 5, 2);
			$d1 = (int)substr($data['filter_date_start'], 8, 2);
			$y2 = (int)substr($data['filter_date_end'], 0, 4);
			$m2 = (int)substr($data['filter_date_end'], 5, 2);
			$d2 = (int)substr($data['filter_date_end'], 8, 2);
	
			$prod_date = $row['date_modified'];
			if (substr_count($prod_date, '0000')) $prod_date = $row['date_added'];
			$y = (int)substr($prod_date, 0, 4);
			$m = (int)substr($prod_date, 5, 2);
			$d = (int)substr($prod_date, 8, 2);
				
			$t1 = mktime(0, 0, 0, $m1, $d1, $y1);
			$t2 = mktime(0, 0, 0, $m2, $d2, $y2);
			$t = mktime(0, 0, 0, $m, $d, $y);	
		
			if ($data['filter_date_start'] != '0000-00-00' or $data['filter_date_end'] != '0000-00-00') {
				$bool = ($t<$t1 or $t>$t2);			
				if ($bool == true and $data['up-add'] == '0') continue;
				if ($bool == false and $data['up-add'] == '1') continue;		
			}
  
			$text = $data['isno'];
			$text = str_replace("&lt;", "<", $text);
			$text = str_replace("&gt;", ">", $text);
			if ($text != '') {
				if (is_numeric($text) and $text != $row['quantity']) continue;
				if (!is_numeric($text)) {
					if ($text[0] != "<" and $text[0] != ">") continue;					
					if ($text[0] == "<") {
						$p = stripos($text, ">", 1);
						if (!$p) {
							$d1 = substr($text, 1);
							if (!is_numeric($d1))  continue;
							if ($row['quantity'] >= $d1) continue;
						} else {
							$d1 = substr($text, 1, $p-1);
							if (!is_numeric($d1))  continue;
							$d2 = substr($text, $p+1);
							if (!is_numeric($d2))  continue;
							if ($row['quantity'] >= $d1 or $row['quantity'] <= $d2) continue;
						}	
					}
					if ($text[0] == ">") {
						$p = stripos($text, "<", 1);
						if (!$p) {
							$d1 = substr($text, 1);		
							if (!is_numeric($d1))  continue;
							if ($row['quantity'] <= $d1) continue;
						} else {
							$d1 = substr($text, 1, $p-1);	
							if (!is_numeric($d1))  continue;
							$d2 = substr($text, $p+1);		
							if (!is_numeric($d2))  continue;
							if ($row['quantity'] <= $d1 or $row['quantity'] >= $d2) continue;
						}	
					}	
				}
			}
			
			if ($data['offproduct'] == 1 and $row['status'] == 0) continue;
			if ($data['offproduct'] == 2 and $row['status'] == 1) continue;			
			if ($data['descr']) {
				$rows = $this->getProductDesc($row['product_id']);
				if ($data['descr'] == 1 and empty($rows[0]['description'])) continue;
				if ($data['descr'] == 2 and !empty($rows[0]['description'])) continue;
			}
	
			if ($data['act_attribut'] and !$data['act_noattribut']) {				
				$f = 0;
				for ($ii=0; $ii<500; $ii++) {
					if (!isset($Aattribute_idf[$ii])) break;					
					$rows = $this->getAttributeById($row['product_id'], $Aattribute_idf[$ii], $lang);	
					if (empty($rows)) continue;
					else {
						$f = 1;
						break;
					}
				}
				if (!$f) continue;
			}
	
			if ($data['act_noattribut'] and !$data['act_attribut']) {				
				$f = 0;
				for ($ii=0; $ii<500; $ii++) {
					if (!isset($Anoattribute_idf[$ii])) break;					
					if (!empty($Anoattribute_idf[$ii])) { 
						$rows = $this->getAttributeById($row['product_id'], $Anoattribute_idf[$ii], $lang);
						if (!empty($rows)) {
							$f = 0;
							break;
						} else {
							$f = 1;
							continue;
						}
					}	
				}		
				if (!$f) continue;
			}

			if ($data['act_noattribut'] and $data['act_attribut'] and $data['act_attribut'] != $data['act_noattribut']) {				
				$rows = $this->getAttributeById($row['product_id'], $Aattribute_idf, $lang);
				if (empty($rows)) continue;		
				
				$rows = $this->getAttributeById($row['product_id'], $Anoattribute_idf, $lang);
				if (!empty($rows)) continue;			
			}
	
			if ($data['act_inattribut'] or $data['act_isvalue']) {
				if (!$data['act_isvalue']) continue;
				if ($data['act_inattribut']) {
					$rows = $this->getAttributeID($this->FindReplace($data['act_inattribut']));
					if (empty($rows)) continue;					
					$rows = $this->getAttributeById($row['product_id'], $rows[0]['attribute_id'], $lang);
					if (empty($rows)) continue;
					$finds = explode("|", $data['act_isvalue']);
					$f = 0;
					for ($ii=0; $ii<500; $ii++) {
						if (!isset($finds[$ii])) break;
						if (!substr_count($rows[0]['text'], $this->FindReplace($finds[$ii]))) continue;	
						else {
							$f = 1;
							break;
						}	
					}
					if (!$f) continue;						
				} else {
					$rows = $this->getAttrib($row['product_id']);
					if (empty($rows)) continue;
					$finds = explode("|", $data['act_isvalue']);				
					$f = 0;
					for ($j=0; $j<900; $j++) {
						if (!isset($rows[$j]['attribute_id'])) break;
						for ($ii=0; $ii<500; $ii++) {
							if (!isset($finds[$ii])) break;
							if (substr_count($rows[$j]['text'], $this->FindReplace($finds[$ii]))) {
								$f = 1;
								break;
							} else continue;	
						} if ($f) break;
					}
					if (!$f) continue;				
				}
			}	
			
			if ($data['inoption'] and $data['isoptvalue']) {
				if (!$Aoption_value_id) continue;
				$rows = $this->getProductOptionValue($row['product_id'], $Aoption_value_id);
				if (empty($rows)) continue;				
			}
	
			if ($data['isattribute']) {
				$rows = $this->getAttrib($row['product_id']);
				if ($data['isattribute'] == 1 and empty($rows)) continue;
				if ($data['isattribute'] == 2 and !empty($rows)) continue;
			}
			
			if ($data['emopt']) {
				$rows = $this->isProductOption($row['product_id']);
				if (empty($rows)) continue;
				$f = 0;
				for ($ii=0; $ii<900; $ii++) {
					if (!isset($rows[$ii]['quantity'])) break;
					if (empty($rows[$ii]['quantity'])) {
						$f = 1;
						break;
					}
				}
				if (!$f) continue;
			}	
	
			if ($data['isoptions']) {
				$rows = $this->isProductOption($row['product_id']);
				if ($data['isoptions'] == 1 and empty($rows)) continue;
				if ($data['isoptions'] == 2 and !empty($rows)) continue;
				if ($data['isoptions'] > 2 and empty($rows)) continue;
				if ($data['isoptions'] > 2 and !empty($rows)) {
					$f = 0;
					for ($ii=0; $ii<900; $ii++) {
						if (!isset($rows[$ii]['optsku'])) break;
						if (!empty($rows[$ii]['optsku'])) {
							$f = 1;
							break;
						}
					}
					if ($f and $data['isoptions'] == 3) continue; // артикули не в опціях
					if (!$f and $data['isoptions'] == 4) continue; // артикули в опціях				
				}
			}
			
			if ($data['isphoto']) {	
				if ($data['isphoto'] == 1 and (empty($row['image']) or !file_exists("../image/" .$row['image']))) continue;
				if ($data['isphoto'] == 2 and (!empty($row['image']) and file_exists("../image/" .$row['image']))) continue;
			}
			
			if ($data['act_sname']) {						
				$rows = $this->getProductDesc($row['product_id']);
				if (empty($rows)) continue;
				$finds = explode("|", $data['act_sname']);
				$f = 0;
				for ($ii=0; $ii<500; $ii++) {
					if (!isset($finds[$ii])) break;						
					if (!substr_count($rows[0]['name'], $this->FindReplace($finds[$ii]))) continue;
					else {
						$f = 1;
						break;
					}	
				}
				if (!$f) continue;				
			}
			
			if ($data['act_sdesc']) {						
				$rows = $this->getProductDesc($row['product_id']);
				if (empty($rows)) continue;
				$finds = explode("|", $data['act_sdesc']);
				$f = 0;
				for ($ii=0; $ii<500; $ii++) {
					if (!isset($finds[$ii])) break;						
					if (!substr_count($rows[0]['description'], $this->FindReplace($finds[$ii]))) continue;
					else {
						$f = 1;
						break;
					}	
				}
				if (!$f) continue;
			}		
			
			switch ($data['command']) {
				case 1: 		
					if (empty($data['act_find']) or !preg_match('/^[0-9.,]+$/', $data['act_find'])) return;
					$data['act_find'] = str_replace(',', '.', $data['act_find']);
					$row['price'] = $row['price'] * $data['act_find'];
					$row['price'] = round($row['price'], 2);
					$this->upProduct($row);
					$this->changeActionDiscount($row['product_id'], $data['act_find'], '', 0, 0);
					break;
				case 2: 
					$row['stock_status_id']	= $data['act_find'];
					$this->upProduct($row);
					break;
				case 3: $row['stock_status_id']	= 6;
					$this->upProduct($row);
					break;
				case 4: $row['stock_status_id']	= 8;
					$this->upProduct($row);
					break;
				case 5: $row['stock_status_id']	= 5;
					$this->upProduct($row);
					break;
				case 6: $n = (int)$data['act_find'];
					$row['quantity']	= $n;
					if (!$n) $row['sort_order'] = $row['sort_order'] + 1000;
					$this->upProduct($row);
					break;
				case 7: if (!$data['zact_cat']) return;	
					$this->toCategory($row['product_id'], $data['zact_cat']);				
					break;	
				case 8: $this->setCategory($row['product_id'], $data['act_cat']);			
					break;	
				case 9: $row['status']	= 1;
					$this->upProduct($row);
					break;
				case 10: $row['status']	= 0;
					$this->upProduct($row);
					break;
				case 11: $this->deleteProduct($row['product_id']);
					break;		
				case 13: $n = (int)$data['act_find'];
					$row['price'] = round($row['price'], $n);
					$this->upProduct($row);
					$rows = $this->getProductAllOptionValue($row['product_id']);
					if (!empty($rows)) {
						for ($l=0; $l<500; $l++) {
							if (!isset($rows[$l]['product_option_value_id'])) break;
							$p = round($rows[$l]['price'], $n);
							$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $p. "' WHERE `product_option_value_id` = '" . $rows[$l]['product_option_value_id'] . "'");
							
							$table = DB_PREFIX . "product_option_value";
							$tname = "base_price";
							if ($this->getColumnName($table, $tname)) {		
								$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $p . "' WHERE product_option_value_id = '" . $rows[$l]['product_option_value_id']. "'");
							}
						}
					}
					$this->changeActionDiscount($row['product_id'], 0, $n, 0, 0);
					break;				
				case 15: $this->Convert($row['product_id'], $mas_con, $text);		
					break;				
				case 16: $this->DoubleFoto($row);		
					break;
				case 17: $this->FixMetaProduct($store, $row, $seo_data);
					break;				
				case 19: $this->deleteProductWithoutAttribute($row['product_id']);
					break;	
				case 20: $this->findreplaceAttribute($row['product_id'], $this->FindReplace($data['act_attribut']), $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
				 $this->cache->delete('product');
					break;
				case 21: $this->findreplaceDescription($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 22: $this->shipping($row['product_id']);
					break;
				case 23: $this->noshipping($row['product_id']);
					break;
				case 24: $this->findreplaceName($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 25: $this->exportAtt($row['product_id'], $masatt);
					break;
				case 26: $err = $this->importAtt($row['product_id'], $masatt);					
					break;
				case 27: $err = $this->DeletePhoto($row['product_id']);					
					break;
				case 28: $this->addPrefix($row, $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']), $store);					
					break;
				case 29: $this->printSkuLibrary($row, $store);					
					break;
				case 30:
					$category_id = 0;
					$rows = $this->getProductCategory($row['product_id']);
					if (!empty($rows)) $category_id = $rows[0]['category_id'];
					$name = '';
					$rows = $this->getProductDesc($row['product_id']);
					if (!empty($rows)) $name = $rows[0]['name'];
				    $this->Same($row['model'], $row['sku'], $name, $category_id, $row['manufacturer_id'], $row['price'], $store);					 
					break;
				case 33:
					$err = $this->DeleteSpecialPrice($row['product_id']);					
					break;	
				case 34: $this->FixProductURL($row, $seo_data, $store);
					break;
				case 35: $this->findreplaceTitle($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 36: $this->findreplaceH1($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 37: $this->findreplaceMetaDesc($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 38: $this->sortPhoto($row);		
					break;
				case 39: $this->shortDescription($row['product_id'], $data['act_find']);
				    break;
				case 40: $this->minimum($row['product_id'], $this->FindReplace($data['act_find']));
				    break;
				case 41: $this->redirect($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
				    break;
				case 42: $this->DeleteDefaultFoto($row, $this->FindReplace($data['act_find']));
				    break;
				case 43: $this->fillURL($row, $seo_data, $store);
				    break;
				case 44: $this->copyModel($row);
				    break;
				case 45: $this->fillMetaProduct($store, $row, $seo_data);
				    break;
				case 46: $this->tax($row['product_id'], $data['act_find']);
				    break;
				case 48: $this->weight($row['product_id'], $data['act_find']);
				    break;
				case 51: $this->fillDescProduct($store, $row, $seo_data);
					break;
				case 54: $this->fixDescProduct($store, $row, $seo_data);
					break;
				case 55: $this->copyToParent($store, $row);
					break;
				case 56: $this->changeAttribute($store, $row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 59: $this->onlyMain($store, $row);				
					break;
				case 60: $this->MainAndParents($store, $row);
					break;
				case 61: $this->changeManufacturer($row, $manufacturer_idF, $manufacturer_idR);	
					break;
				case 62: $this->deleteProductWithPhoto($row);
					break;	
				case 63: $this->PrintDublAliasProducts($row['product_id']);
					break;
				case 66: $this->updatePrice($row, $cheap, $kmenu, $disc, $onn, $placep, $cprice, $zero, $max_site, $nomkol, $ident, $mratek, $param, $point, $noprice, $paramnp, $pointnp, $baseprice, $onoff, $sleep, $ffile);				
					break;
				case 67: $this->PrintDublNameProducts($row);			
					break;
				case 68: if (!$data['zact_cat']) return;	
					$this->notCategory($row['product_id'], $data['zact_cat']);					
					break;
				case 69:					
					$name = '';
					$rows = $this->getProductDesc($row['product_id']);
					if (!empty($rows)) $name = $rows[0]['name'];
				    $this->Competitors($row, $name, $form_id, $store);		
					break;
				case 70: 	
					$this->RenameFoto($row, $seo_data['prod_photo'], $store);				
					break;
				case 71: 	
					$this->deleteWholesale($row['product_id']);				
					break;
				case 72: 	
					$this->deleteEmptyPhoto($row);				
					break;
				case 73: 	
					$n = (int)$data['act_find'];
					$row['sort_order']	= $n;
					$this->upProduct($row);				
					break;
				case 74: 	
					$n = $data['act_find']+ 1.1 - 1.1;
					$row['price']	= $this->convertPrice($n);
					$this->upProduct($row);				
					break;
				case 75: 	
					$this->percentAction($row, $data['act_find'], $data['act_change']);				
					break;	
				case 76: 	
					$this->percentWhole($row, $data['act_find'], $data['act_change']);			
					break;
				case 77:
					$this->renameFolder($row, $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));					
					break;
				case 78:
					$this->changeQuantity($row, $data['act_find'], $data['act_change']);					
					break;				
				case 80:
					$this->FindReplaceURL($row, $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 81: $this->offNoPhoto($row);
					break;
				case 82: $this->Design($row['product_id'], $data['act_find'], $store);
					break;
				case 83: $this->MultOption($row['product_id'], $data['act_find']);
					break;
				case 89: $this->cleanQuantityOption($row['product_id']);
					break;	
				case 90: $this->deletePhotoIfProductGone($row);
					break; 
				case 91: $this->FixDublAliasProducts($row['product_id']);
					break;
				case 92: $this->PicData($row, $mas_catid, $pic_int);
					break;
				case 93: $this->copySku_Loc($row);
					break;
				case 94: $this->copyLoc_Sku($row);
					break;
				case 95: $this->copyModel_Loc($row);
					break;	
				case 96: $this->copyUpc_Loc($row);
					break;
				case 97: $this->copyLoc_Upc($row);
					break;	
				case 98: $this->copyMpn_Loc($row);
					break;
				case 99: $this->copyLoc_Mpn($row);
					break;	
				case 101: if (empty($data['act_find']) or !preg_match('/^[0-9.,+-]+$/', $data['act_find'])) return;
					$data['act_find'] = str_replace(',', '.', $data['act_find']);
					$row['price'] = $row['price'] + $data['act_find'];
					$this->upProduct($row);
					$this->changeActionDiscount($row['product_id'], 0, '', 0, $data['act_find']);
					break;
				case 102: $this->findreplaceKeywords($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 103: $n = (int)$data['act_find'];
					$row['price'] = round($row['price']/$n, 0)*$n;
					$this->upProduct($row);
					$rows = $this->getProductAllOptionValue($row['product_id']);
					if (!empty($rows)) {
						for ($l=0; $l<500; $l++) {
							if (!isset($rows[$l]['product_option_value_id'])) break;
							$p = round($rows[$l]['price']/$n, 0)*$n;
							$this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `price` = '" . $p. "' WHERE `product_option_value_id` = '" . $rows[$l]['product_option_value_id'] . "'");
							
							$table = DB_PREFIX . "product_option_value";
							$tname = "base_price";
							if ($this->getColumnName($table, $tname)) {		
								$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `base_price` = '" . $p . "' WHERE `product_option_value_id` = '" . $rows[$l]['product_option_value_id'] . "'");
							}	
						}
					}
					$this->changeActionDiscount($row['product_id'], 0, '', $n, 0);
					break;
				case 104: $this->deleteProductFilter($row['product_id'], $this->FindReplace($data['act_find']), $data['act_filter_group_id']);				
					break;
				case 106: $this->copyAttr_UPC($row['product_id'], $Aattribute_id);
					break;
				case 107: $this->copyAttr_MPN($row['product_id'], $Aattribute_id);
					break;
				case 108: $this->copyAttr_JAN($row['product_id'], $Aattribute_id);
					break;
				case 109: $this->deleteProductOption($row['product_id']);
					break;
				case 110: $this->countOptionQuantity($row['product_id']);
					break;
				case 111: $this->countOptionPrices($row);
					break;
				case 112: $this->attributeToTags($row['product_id']);
					break;
				case 113: $this->setOptionRequired($row['product_id'], $data['act_find']);
					break;
				case 114: $this->_setOptionRequired($row['product_id'], $data['act_find']);
					break;
				case 115: $this->setMainCategory($row['product_id']);
					break;
				case 116: $this->setPriceByMinOption($row);				
					break;
				case 117: $this->ClearSerie($row['product_id']);				
					break;	
				case 119: $this->SendAttributeToFilter($store, $row['product_id'], $this->FindReplace($data['act_attribut']), $data['act_filter_group_id'], $langs);
					break;
				case 121: $this->deleteZeroOption($row['product_id']);
					break;	
				case 122: $this->clearAttribute($row['product_id']);
					break;
				case 123: $this->db->query("UPDATE " . DB_PREFIX . "product SET `noindex` = 1 WHERE `product_id` = '" . $row['product_id'] . "'");
					break;
				case 124: $this->deleteRelatedOptions($row['product_id']);
					break;
				case 125: if (!substr_count($row['model'], "Serie")) $row['model'] = $row['product_id'] . "-01";
						  else $row['model'] = $row['product_id'] . "-01 Serie";
				          $this->upProduct($row);
					break;
				case 127: $this->clearPricesOptions($row['product_id']);
					break;
				case 128: $this->deleteExtraPhotos($row['product_id']);
					break;
				case 129: $this->deleteTheAttribute($row['product_id'], $this->FindReplace($data['act_find']));
					break;
				case 130: $this->addToTags($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 131: $this->deleteDescPhoto($row['product_id'], $store);
					break;
				case 132: $this->subOption($row['product_id'], $Aoption_id);
					break;
				case 133: $this->_subOption($row['product_id'], $Aoption_id);
					break;
				case 134: $this->deleteDubleOption($row['product_id']);
					break;
				case 135: $this->deleteOptionValue($row['product_id'], $option_value_id);
					break;				
				case 138: $this->fictAction($row, $data['act_find'], $data['act_change']);
					break;
				case 139: $this->delFictAction($row);
					break;
				case 143: $this->clearProductFilters($row['product_id']);
					break;
				case 144: $this->delNovalueAtt($row['product_id']);
					break;
				case 145: $this->deleteAttribute($row['product_id']);
					break;
				case 146: $this->deleteProductWithoutPhoto($row);
					break;
				case 147: $this->copyAttr_SKU($row['product_id'], $Aattribute_id);
					break;
				case 148: $this->copyAttr_Price($row['product_id'], $Aattribute_id);
					break;
				case 149: $this->copyAttr_Length($row['product_id'], $Aattribute_id);
					break;	
				case 150: $this->copyAttr_Width($row['product_id'], $Aattribute_id);
					break;
				case 151: $this->copyAttr_Height($row['product_id'], $Aattribute_id);
					break;
				case 152: $this->copyAttr_Weight($row['product_id'], $Aattribute_id);
					break;
				case 153: $this->clearProductURL($row['product_id']);
					break;
				case 155: $this->optQuantity($row['product_id'], $Aoption_value_id, $data['act_change']);
					break;
				case 159: $this->mainPhotoChangeBest($row);
					break;	
				case 162: $this->clearBonus($row);
					break;
				case 164: $this->samePhotos($row, $this->FindReplace($data['act_find']));
					break;
				case 168: $this->copyUpc_Sku($row);
					break;
				case 169: $this->copyEan_Loc($row);
					break;
				case 170: $this->copyEan_Sku($row);
					break;
				case 171: $this->copyLoc_Ean($row);
					break;
				case 173: $this->DeleteSpecialPriceGroup($row['product_id'], (int)$data['act_find']);
					break;
				case 174: $this->deleteWholesaleGroup($row['product_id'], (int)$data['act_find']);
					break;
				case 175: $this->db->query("UPDATE " . DB_PREFIX . "product SET `noindex` = 0 WHERE `product_id` = '" . $row['product_id'] . "'");
					break;
				case 176: $this->FindReplaceSKU($row, $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 177: $this->deleteLinksDescription($row['product_id']);
					break;
				case 179: $this->deleteManufacturer($row);
					break;
				case 180: $this->deleteCompetitors($row['product_id']);
					break;
				case 181: $this->MultOptValue($row['product_id'], $Aoption_value_id, $data['act_change']);
					break;
				case 182: $this->deleteOptionPhoto($row['product_id']);
					break;
				case 183: $this->MultiplayOption($row['product_id'], $Aoption_id, $data['act_change']);
					break;
				case 184: $this->sortsortPhoto($row);
					break;
				case 185: $this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . $row['product_id'] . "'");
					break;	
				case 186: $this->addAttribute($row['product_id'], $Aattribute_id, $data['act_change']);
					break;
				case 187: $this->setDateEndSpecial($row['product_id'], $data['act_find']);
					break;	
				case 188: $this->setDateEndDiscount($row['product_id'], $data['act_find']);
					break;
				case 189: $this->copyLengthAttribute($row, $Aattribute_id);
					break;
				case 190: $this->copyWidthAttribute($row, $Aattribute_id);
					break;
				case 191: $this->copyHeightAttribute($row, $Aattribute_id);
					break;
				case 192: $this->copyWeightAttribute($row, $Aattribute_id);
					break;
				case 193: $this->deleteOption($row['product_id'], $Aoption_id);
					break;
				case 194: if ($data['act_find'] == '') $data['act_find'] = 0;
				$bonus = $row['price'] - $row['price'] * $data['act_find']/100;
				$this->db->query("UPDATE " . DB_PREFIX . "product SET `points` = '" . $bonus ."' WHERE `product_id` = '" . $row['product_id'] . "'");
					break;
				case 196: $this->deleteZeroPriceOption($row['product_id']);
					break;
				case 197: $this->deleteZeroQuantityOption($row['product_id']);
					break;	
				case 198: $this->deleteDoubleInAttribute($row['product_id'], $Aattribute_id);
					break;
				case 199: $query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `subtract` = '" . 1 . "' WHERE `product_id` = '" . $row['product_id'] . "'");
					break;
				case 200: $query = $this->db->query("UPDATE " . DB_PREFIX . "product_option_value SET `subtract` = '" . 0 . "' WHERE `product_id` = '" . $row['product_id'] . "'");
					break;
				case 201: $this->copySKUModel($row);
					break;
				case 202: $this->deleteDubleProductAtt($row['product_id']);
					break;	
				case 204: $this->deleteFragmentDescr($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 205: $this->deleteFragmentName($row['product_id'], $this->FindReplace($data['act_find']), $this->FindReplace($data['act_change']));
					break;
				case 206: $this->clearMetaProduct($store, $row['product_id']);
					break;
				case 209: $this->copyH1toName($row['product_id']);
					break;
				case 210: $this->addtoName($row['product_id'], $this->FindReplace($data['act_find']));
					break;
				case 213: $this->changeEmptyPhoto($row, $data['act_find']);
					break;	
			}
			
			if (($data['command'] == 12 or $data['command'] == 88 or $data['command'] == 120 or $data['command'] == 136 or $data['command'] == 178)) {
				$product_id = $row['product_id'];
				$manufacturer_id = $row['manufacturer_id'];
				
				$margin = '';
				$curr = '';
				$bp = '';
				$table = DB_PREFIX . "product";
				$tname = "base_currency_code";
				if ($this->getColumnName($table, $tname)) {
					$margin = $row['extra_charge'];
					$curr = $row['base_currency_code'];
					$bp = $row['base_price'];
				}				
				$rows = $this->getProductDesc($product_id+$cmd);
				if (empty($rows)) continue;	
				$desc = $rows;
				
				if (isset($was_timelimit) and $was_timelimit) {
					$was_timelimit = 0;
					$file_ex  = "./uploads/ex.xml";		
					$ex = @fopen($file_ex,'r+');					
					$offcet = 0;
					$seek = 0;
					while (!@feof($ex)) {						
						$st = @fgets($ex, 2048);
						$offcet = $offcet + strlen($st);
						if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
					}
					ftruncate($ex, $seek);	
					@fclose($ex);				
				}
				
				$file_ex    = "./uploads/ex.xml";
				$ex = @fopen($file_ex,'a');		
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				
				$status = 0;
				if (!empty($row['status'])) $status = $row['status'];
				
				if ($data['command'] != 178) {
					$st = '';
					if ($row['sort_order']) $st = $row['sort_order'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if ($row['model']) {
						$st = $row['model'];
						$st = $this->code($st);
					}
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}	
				$st = '';
				if ($row['sku']) $st = $row['sku'];
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				if ($data['command'] != 178) {
					$st = '';
					if ($row['upc']) $st = $row['upc'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);				
					$st = '';				
					if (isset($row['ean']) and $row['ean']) $st = $row['ean'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '';
					if (isset($row['jan']) and $row['jan']) $st = $row['jan'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '';
					if (isset($row['isbn']) and $row['isbn']) $st = $row['isbn'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$st = '';				
					if (isset($row['mpn']) and $row['mpn']) $st = $row['mpn'];
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);			
					$st = '';
					if ($row['location']) {
						$st = $row['location'];
						$st = $this->code($st);
					}	
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				$description = $rows[0]['description'];
				$st = '';
				if (isset($rows[0]['name'])) {
					$st = $rows[0]['name'];
					$st = $this->code($st);
				}	
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
	
				$rows = $this->getProductCategory($product_id);
				$child = 0;
				for ($j=0; $j<900; $j++) {					
					if (!isset($rows[$j]['category_id'])) break;
					if (isset($rows[$j]['main_category']) and $rows[$j]['main_category'] == 1) {
						$child = $rows[$j]['category_id'];
						break;
					}
					if ((int)$rows[$j]['category_id'] > $child) $child = $rows[$j]['category_id'];					
				}					
				if ($child) {
					$pach[0] = $child;
					for ($j=1; $j<5; $j++) {					
						$rows1 = $this->getCategory($child);
						if (empty($rows1)) break;
						$pach[$j] = $rows1[0]['parent_id'];
						$child = $pach[$j];					
					}	
				}
		
				for ($j=0; $j<5; $j++) {
					$st = '';
					if (isset($pach[$j])) {
						$rows = $this->getCategoryName($pach[$j]);						
						if (!empty($rows)) $st = $rows[0]['name'];
					}
					$st = $this->code($st);
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}	
				
				$st = '';
				if (isset($row['quantity'])) $st = $row['quantity'];
				$st = '<Cell ss:StyleID="s21"><Data ss:Type="Number">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				
				$st = '';
				if (isset($row['price'])) $st = $row['price'];
				if ($data['command'] == 136) {
					if (empty($data['act_find'])) $data['act_find'] = 0;
					$st = $st*$data['act_find']/100+$st;
					$st = round($st,2);
				}	
				$st = '<Cell ss:StyleID="s22"><Data ss:Type="Number">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				
				$image = '';
				if (isset($row['image'])) $image = $row['image'];
				$weight = '';
				if (isset($row['weight'])) $weight = $row['weight'];
				$length = '';
				if (isset($row['length'])) $length = $row['length'];
				$width = '';
				if (isset($row['width'])) $width = $row['width'];
				$height = '';
				if (isset($row['height'])) $height = $row['height'];
				
				if ($data['command'] != 178) {
					$spec = '';
					$ds = date('Y-m-d');
					$ds = str_replace('-', '', $ds);
					for ($l=1; $l<10; $l++) {
						$row = $this->getActionPrice($product_id, $l);					
						if (!empty($row)) {							
							$de = $row['date_end'];
							$de = str_replace('-', '', $de);
							if ($ds <= $de) {
								$spec = $row['price'];
								break;
							}	
						}
					}
					$st = '<Cell ss:StyleID="s22"><Data ss:Type="Number">'.$spec.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				$st = $this->code($description);
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);				
				
				$st = $image;
				$st = '<Cell ss:StyleID="s18"><Data ss:Type="String">'.HTTP_CATALOG."image/".$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				
				if ($data['command'] != 120 and $data['command'] != 136) {				
					$rows = $this->getProductImage($product_id);
					for ($j=0; $j<$nf; $j++) {
						$st = '';
						if (isset($rows[$j]['image'])) {
							$st = $rows[$j]['image'];				
							$st = '<Cell ss:StyleID="s18"><Data ss:Type="String">'.HTTP_CATALOG.'image/'.$st.'</Data></Cell>'."\n";
						} else $st = '<Cell ss:StyleID="s18"><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";	
						@fputs($ex, $st);
					}				
				}			
				
				$rows = $this->getManufacturerName($manufacturer_id);
				$st = '';
				if (isset($rows[0]['name'])) {
					$st = $rows[0]['name'];
					$st = $this->code($st);
				}
				$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				
				if ($data['command'] != 178) {
					$st = '<Cell ss:StyleID="s21"><Data ss:Type="Number">'.$weight.'</Data></Cell>'."\n";
					@fputs($ex, $st);			
				
					$st = '<Cell ss:StyleID="s21"><Data ss:Type="Number">'.$length.'</Data></Cell>'."\n";
					@fputs($ex, $st);			
				
					$st = '<Cell ss:StyleID="s21"><Data ss:Type="Number">'.$width.'</Data></Cell>'."\n";
					@fputs($ex, $st);				
				
					$st = '<Cell ss:StyleID="s21"><Data ss:Type="Number">'.$height.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if (isset($desc[0]['seo_h1'])) {
						$st = $desc[0]['seo_h1'];
						$st = $this->code($st);
					}
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if (isset($desc[0]['seo_title'])) $st = $desc[0]['seo_title'];				
					$st = $this->code($st);
			
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if (isset($desc[0]['meta_keyword'])) {
						$st = $desc[0]['meta_keyword'];
						$st = $this->code($st);
					}
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if (isset($desc[0]['meta_description'])) {
						$st = $desc[0]['meta_description'];
						$st = $this->code($st);
					}
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				
					$st = '';
					if (isset($desc[0]['tag'])) {
						$st = $desc[0]['tag'];
						$st = $this->code($st);
					}
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);

					$row1 = $this->getURL($product_id);
				
					$st = '';
					if (!empty($row1)) $st = $row1['keyword'];
					$st = $this->code($st);
					$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}
				
				if ($data['command'] != 120 and $data['command'] != 136) {
					if ($data['command'] != 178) {
						for ($j=0; $j<5; $j++) {
							$st = '';
							if (isset($pach[$j])) {
								$rows = $this->getCategoryPhoto($pach[$j]);						
								if (!empty($rows)) {
									$st = $rows[0]['image'];
									$st = str_replace("data/", "", $st);
								}
							}	
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}
				
						$st = '';
						$rows = $this->getRalatedAll($product_id);
						if (!empty($rows)) {					
							foreach ($rows as $r) {
								$rows1 = $this->getProductsByID($r['related_id']);
								if (!empty($rows1)) $st = $st.$rows1[0]['sku'].";";					
							}		
						}
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '<Cell><Data ss:Type="String">'.$status.'</Data></Cell>'."\n";
						@fputs($ex, $st);

						for ($j=1; $j<6; $j++) {
							$st = '';
							$rows = $this->getProductDiscount($product_id, $j);
							if (!empty($rows)) {
								$ds = date('Y-m-d');
								$ds = str_replace('-', '', $ds);
								$de = $rows[0]['date_end'];
								$de = str_replace('-', '', $de);
								if ($ds <= $de) $st = $rows[0]['price'];
							}
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}				
				
						$st = '';
						$rows = $this->getProductsByID($product_id);
						if (!empty($rows)) $st = $rows[0]['points'];
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
				
						for ($j=1; $j<5; $j++) {
							$st = '';
							$rows2 = $this->getBonus1($j, $product_id);
							if (!empty($rows2)) $st = $rows2[0]['points'];
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}
						
						$st = '';
						$table = DB_PREFIX . "product";
						$tname = "cost";
						if ($this->getColumnName($table, $tname)) $st = $rows[0]['cost'];
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
				
						$rows = $this->getLink($product_id);
						for ($j=0; $j<5; $j++) {
							$st = '';
							if (isset($rows[$j]['ident']) and !empty($rows[$j]['ident'])) $st = $rows[$j]['ident'];
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
							$st = '';
							if (isset($rows[$j]['url']) and !empty($rows[$j]['url'])) $st = $rows[$j]['url'];
							$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
							@fputs($ex, $st);
						}					
						
						$st = '<Cell><Data ss:Type="String">'.$margin.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '<Cell><Data ss:Type="String">'.$curr.'</Data></Cell>'."\n";
						@fputs($ex, $st);
						$st = '<Cell><Data ss:Type="String">'.$bp.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					}
					for ($j=1; $j<=$max_options; $j++) {
						$prod = array();
						$rows = $this->getProdOptions($product_id, $allOptions[$j]);					
						$prod = $rows;
						
						$st = '';						
						if (empty($rows)) {
							$rows = $this->getProductOption($product_id, $allOptions[$j]);
							if (!empty($rows)) $st = $rows[0]['option_value'];  // ['value']
							
						}					
				
						foreach ($prod as $one) {
							$rows = $this->getNameOption($one['option_value_id']);	
							if (empty($rows)) $st = $st . ';';
							else $st = $st . $rows[0]['name'].';';
						}
						$st = $this->code($st);
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '';
						foreach ($prod as $one) {	
							if (empty($one['optsku'])) $st = $st . ';';
							else $st = $st . $one['optsku'].';';
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '';
						foreach ($prod as $one) {
							if (empty($one['quantity'])) $st = $st . ';';
							else $st = $st . $one['quantity'].';';
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '';
						foreach ($prod as $one) {
							if (empty($one['price'])) $st = $st . ';';
							else $st = $st . $one['price'].$one['price_prefix'].';';
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '';
						foreach ($prod as $one) {
							if (empty($one['points'])) $st = $st . ';';
							else $st = $st . $one['points'].$one['points_prefix'].';';
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);
					
						$st = '';
						foreach ($prod as $one) {
							if (empty($one['weight'])) $st = $st . ';';
							else $st = $st . $one['weight'].$one['weight_prefix'].';';
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);						
						
						$st = '';
						foreach ($prod as $one) {
							if ($upOptionFoto != '2') {
								$rows = $this->getPhotoOption($one['option_value_id']);	
								if (!isset($rows[0]['image']) or empty($rows[0]['image'])) $st = $st . ';';
							    else $st = $st.HTTP_CATALOG."image/".$rows[0]['image'].';';
							} else {
								$rows = $this->getPhotoOptionPRO($one['product_option_value_id']);
								if (!isset($rows[0]['image']) or empty($rows[0]['image'])) $st = $st . ';';
							    else {
									foreach ($rows as $r) {										
										$st = $st.HTTP_CATALOG."image/".$r['image'].',';
									}
									$st = substr($st, 0, strlen($st)-1);
									$st = $st . ';';
								}	
							}	
						}					
						$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
						@fputs($ex, $st);				
					}
				}
				if ($data['command'] == 88) {
					$k = 0;
					$rows = $this->getAttributes($product_id);					
					for ($j=0; $j<$max_a; $j++) {
						$tt = '';						
						if (isset($rows[$j]['attribute_id'])) {							
							if ($data['act_attribut'] and $data['act_noattribut'] and $data['act_attribut'] == $data['act_noattribut']) {
								$rows1 = $this->getAttributeName($rows[$j]['attribute_id']);						
								if (isset($rows1[0]['name'])) $name = $rows1[0]['name'];		
								if ($data['act_noattribut'] == $name) {
									$tt = $rows[$j]['text'];
									$tt = $this->code($tt);																	
								}
							} else {
								$tt = $rows[$j]['text'];
								$tt = $this->code($tt);									
							}						
							for ($l=$k; $l<$max_a; $l++) {
								if ($rows[$j]['attribute_id'] == $sort_att[$l]) {
									$st = '<Cell><Data ss:Type="String">'.$tt.'</Data></Cell>'."\n";
									@fputs($ex, $st);
									$k++;
									break;	
								} else {
									$st = '<Cell><Data ss:Type="String">'.''.'</Data></Cell>'."\n";
									@fputs($ex, $st);	
									$k++;
								}
							}	
						}				
					}	
				} else {
					if ($data['command'] != 120 and $data['command'] != 136 and $data['command'] != 178) {
						$rows = $this->getAttributes($product_id);
						for ($j=$cmd; $j<$max_a; $j++) {
							$st = '';
							$name = "";					
							if (isset($rows[$j]['text']) and isset($rows[$j]['attribute_id'])) {
								$group = '';
								$rows1 = $this->getGroup($rows[$j]['attribute_id'], $lang);
								if (!empty($rows1)) $group = trim($rows1[0]['name']);
								$rows1 = $this->getAttributeName($rows[$j]['attribute_id']);
								if (isset($rows1[0]['name'])) {
									$name = $rows1[0]['name'];
									if (!empty($group)) $name = $group . "->" . $name;
								}	
								$st = $name;
								if ($data['act_attribut'] and $data['act_noattribut'] and $data['act_attribut'] == $data['act_noattribut']) {
									if ($data['act_noattribut'] == $name) {
										$st = $this->code($st);
										$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
										@fputs($ex, $st);
										$st = $rows[$j]['text'];
										$st = $this->code($st);
										$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
										@fputs($ex, $st);
									}	
								} else {
									$st = $this->code($st);
									$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
									@fputs($ex, $st);
									$st = $rows[$j]['text'];
									$st = $this->code($st);
									$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
									@fputs($ex, $st);
								}	
							} else {
								$st = $this->code($st);
								$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
								@fputs($ex, $st);
								$st = '';
								$st = '<Cell><Data ss:Type="String">'.$st.'</Data></Cell>'."\n";
								@fputs($ex, $st);
							}	
						}
					}	
				}
				
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			}

			if 	($data['command'] == 25) {
				$file_table = "./uploads/attribute.tmp";
				$file_table1 = "./uploads/attribute1.tmp";
				$tab1 = fopen($file_table1,'w+b');
				$str_table1 = serialize($masatt);
				$b = fwrite($tab1, $str_table1);
				@fclose($tab1);				
				$a = @copy($file_table1, $file_table);
				if ($a) @unlink ($file_table1);
			}
			$e = $this->putsos($i, '');
			if ($e < 0) return 2;			
		}
		$this->cache->delete('*');
		
		if ($data['command'] == 20 and !empty($data['act_filter_group_id']) and !empty($data['act_find']) and !empty($data['act_change'])) {
			$find = $this->getName($data['act_find']);
			$replace = $this->getName($data['act_change']);			
			$this->changeFilter($find, $replace, $data['act_filter_group_id'], $lang);		
		} 
		
		if 	($data['command'] == 77) return 31;
		
		if 	($data['command'] == 12) {
			$kol_cell = 62 + $nf + $max_a*2 + $max_opt7;
			$this->EndEx($kol_cell);			
		}
		
		if 	($data['command'] == 88) {
			$kol_cell = 62 + $nf + $max_a + $max_opt7;
			$this->EndEx($kol_cell);			
		}

		if ($data['command'] == 120 or $data['command'] == 136) {
			$kol_cell = 32;
			$this->EndEx($kol_cell);			
		}
		
		if ($data['command'] == 178) {
			$kol_cell = 12 + $nf + $max_opt7;
			$this->EndEx($kol_cell);
		}
		
		if 	($data['command'] == 29) {			
			$this->EndEx(5);			
		}
		
		if 	($data['command'] == 30) {			
			$this->EndEx(8);
		}
		
		if 	($data['command'] == 69) {			
			$this->EndEx(24);			
		}
		
		if 	($data['command'] == 25) {
			$file_table = "./uploads/attribute.tmp";
			$tab = fopen($file_table,'rb');
			if(!$tab) return 27;
			$l = filesize($file_table);
			$masatt = unserialize(fread($tab, $l));
			@fclose($tab);
			for ($k=$cmd; $k<5000; $k++) {
				if (!isset($masatt[$k][0])) break;
				$file_ex    = "./uploads/ex.xml";
				$ex = @fopen($file_ex,'a');
				$st = '<Row>'."\n";
				@fputs($ex, $st);
				for ($j=0; $j<2; $j++) {
					if (!isset($masatt[$k][$j])) break;
					$s = $masatt[$k][$j];
					$s = $this->code($s);
					$st = '<Cell><Data ss:Type="String">'.$s.'</Data></Cell>'."\n";
					@fputs($ex, $st);
				}				
				for ($j=2; $j<1000; $j++) {
					if (!isset($masatt[$k][$j])) break;
					$st = '<Cell><Data ss:Type="String">'.''.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					$s = $masatt[$k][$j];
					$s = $this->code($s);
					$st = '<Cell><Data ss:Type="String">'.$s.'</Data></Cell>'."\n";
					@fputs($ex, $st);
					
				}
				$st = '<Cell><Data ss:Type="String">'.''.'</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			}		
		
			$kol_cell = 2003;
			$this->EndEx($kol_cell);			
		}		
		$path = "./uploads/sos.tmp";
		$file_table = "./uploads/attribute.tmp";
		if (file_exists($path)) @unlink ($path);		
		if (file_exists($file_table)) @unlink ($file_table);
		if ($usd) {
			$table = DB_PREFIX . "product_option_value";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname))
			@file_get_contents(HTTP_CATALOG."index.php?route=wgi/currency_plus&type=product");
		}
		return 0;	
	}
	
	function getHead(&$url) {
		$ch = curl_init();	
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/61.0");
		$headers = array (
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
			'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
			'Accept-Encoding: identity',
			'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
		); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_NOBODY, 1);		
	//	curl_setopt($ch, CURLOPT_COOKIE, 'cookie.txt');
	//	curl_setopt($ch, CURLOPT_COOKIE, "ip=214.76.196.242");
	
		$head = curl_exec($ch);
		if($head === false) {
			$s=curl_error($ch);	
			$err = " curl error head = " . $s ." \n";
			$this->adderr($err);
			
		}	
		curl_close($ch);	
		return $head; 		
	}	
	
	function getBody($url) {
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/61.0");	
		$headers = array (
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
			'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
			'Accept-Encoding: identity',
			'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
		); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_NOBODY, 0);
	//	curl_setopt($ch, CURLOPT_COOKIE, 'cookie.txt');
	//	curl_setopt($ch, CURLOPT_COOKIE, "ip=214.76.196.242");
	
		$body = curl_exec($ch);
		if($body === false) {
			$s=curl_error($ch);	
			$err = " curl body error = " . $s ." \n";
			$this->adderr($err);
			
		}
		curl_close($ch);		
		return $body; 		
	}
	
	function getRef($head, $url) {
		$new_url = 0;
		$p = stripos($head, "location:");
		if (!$p) {
			$p = strpos($head, "src");
			if (!$p) $p = strpos($head, "href");
			if (!$p) return 0;
			$a = strpos($head, '"', $p)+1;			
			$b = strpos($head, '"', $p+9);
			$p = $b - $a;
			$new_url = substr($head, $a, $p);			
		} else {
			$pb = $p + 10;
			$pe = strpos($head, "\r\n", $pb);
			if (!$pe) return 0;
			$p = $pe - $pb;
			$new_url = substr($head, $pb, $p);
		}	
		if ($new_url) {
			if (!substr_count($new_url, "://")) {							
				$pe = strpos($url, "//");
				if ($pe) $pe = $pe + 2;
				$pe = strpos($url, "/", $pe);
				$a = substr($url, 0, $pe);							
				if (substr($new_url, 0 ,1) != "/") $new_url = '/'.$new_url;
				$new_url = $a.$new_url;
				$new_url = str_replace ("../", "", $new_url);
				$new_url = str_replace ("./", "", $new_url);
			} else {
				$pe = strpos($new_url, "//");
				if ($pe) $pe = $pe + 2;
				$pe = strpos($new_url, "/", $pe);
				if (substr($new_url, $pe+1, 1) == ".") {
					$new_url = str_replace ("../", "", $new_url);
					$new_url = str_replace ("./", "", $new_url);
				}
			}
		}
		
		return $new_url;
	}
	
	function getCode($head) {		
		$s = substr($head, 0, 64);
		$ms = explode (" ", $s);
		if (!isset($ms[1])) return "dupa";
		if ($ms[1] == "200") return "OK";
		if ($ms[1] < "300" or $ms[1] > "399") return "dupa";	
		
		return "redirect";
	}
	
	function getContents(&$url) { 
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/61.0");		
		$headers = array (
			'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*;q=0.8',
			'Accept-Language: ru,en-us;q=0.7,en;q=0.3',
			'Accept-Encoding: identity',
			'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7'
		); 
		curl_setopt($ch, CURLOPT_HTTPHEADER,$headers); 
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_NOBODY, false);
	//	curl_setopt($ch, CURLOPT_COOKIE, 'cookie.txt');
	//	curl_setopt($ch, CURLOPT_COOKIE, "ip=214.76.196.242");
	
		$out = curl_exec($ch);
		
		if($out === false) {
			$s=curl_error($ch);	
			$err = " curl contens error = " . $s ." \n";
			$this->adderr($err);	
		}
		curl_close($ch);
		return $out; 		
	}
	
	function curl_get_contents(&$url, $pi, $sleep, $ffile) {
		$body = '';	
		$url = $this->checkurl($url);	
		if ($url == -1) return $body;
	
		/* заменить в ссылке текст на текст	*/	
		$url = str_replace ("http://коляски.рф", "http://xn--h1adadot1h.xn--p1ai", $url);
		$url = str_replace ("`", "%60", $url);
		$url = str_replace ("™", "%99", $url);
		
		$arr = array();
		$arr = parse_url($url);
		if (preg_match("/[а-яёЁ]/i", $url) and isset($arr['path'])) {			
			$link = $arr['scheme'] . '://' 
			. $arr['host']
			. implode('/', 
				array_map('urlencode', 
					explode('/', $arr['path'])
				)
			);
	
			$url = $link;
			$url = str_replace ("%2520", " ", $url);
		} 
		
		if ($sleep == 9 and !$ffile) sleep(rand(2, 8));
		else if ($sleep and !$ffile) sleep($sleep);  // пауза перед парсингом
		
		if ($ffile and !$pi) {
			if (substr($url, strlen($url)-1, 1) == "/") $url = substr($url, 0, strlen($url)-1);
			$p = strrpos($url, "?");
			if (!$p) $p = strrpos($url, "/");			
			$name = substr($url, $p+1);
			$p = strrpos($name, ".");
			if ($p) $name = substr($name, 0, $p);
			$name = trim($name);	
			if (empty($name)) {
				$err = " File not found. url = " . $url . " name = " .$name. " \n";
				$this->adderr($err);				
				return;
			}	
			$file_s    = "./uploads/".$name;
			if (file_exists ($file_s)) {
				$st ='';
				$s = @fopen($file_s,'r');
				while (!@feof($s)) {
					$f = @fgets($s, 65534);
					$st = $st.$f;
				}    
				@fclose($s);
				$ht = $st;
	
			} else {
				$err = " file error = " . $file_s ." \n";
				$this->adderr($err);
				$err = $url ." \n";
				$this->adderr($err);
			}
			if (!empty($ht)) {
				$charset = '';		
				$p = stripos($ht, "charset=");
				if ($p) $charset = substr($ht, $p+8, 80);		
				if (!empty($charset) and (substr_count($charset, "1251") or (substr_count($charset, "utf-8") and !$this->detect_utf($ht)))) $ht = $this->win_to_utf($ht);			
			}
			return $ht;
		}		
		
		if ($pi) {
			if (strlen($url) < 25) {
				$err = " Incorrect link to photo \n";
				$this->adderr($err);
				return '';
			}
			
		//	$url = str_replace (" ", "%20", $url);

			/* заменить в ссылке на фото текст john на Sam */
			$url = str_replace ("http://www.bosch-pt.com/", "http://www.bosch-pt.com/ru/ru/accocs/", $url);
			$url = str_replace ("john", "Sam", $url);
			$url = str_replace ("small", "big", $url);
	
			$body = @file_get_contents($url);					
			if ($this->isPicture($body)) return $body;
		}
		
		for ($r=0; $r<5; $r++) {    // здесь установлено количество редиректов
			$head = $this->getHead($url);
			if ($head === false) {
				$body = $this->getContents($url);					
				break;
			}	
			$code = $this->getCode($head);			
			if ($code == "dupa") {
				$body = $this->getContents($url);
				break;
			}
		
			if ($code == "OK") {
				$body = $this->getBody($url);
				if (!$pi) break;	
				if ($this->isPicture($body)) break;				
			}	
			$ref = '';
			$body = '';
			$ref = $this->getRef($head, $url);   // если неправильный редирект, закомментируйте эту строку
			if (!$ref) {
				$body = $this->getContents($url);
				break;
			}
	
			if ($ref) $url = $ref;	
		}
		
		if (empty($body)) return '';
		$charset = '';		
		$p = stripos($body, "charset=");
		if ($p) $charset = substr($body, $p+8, 80);		
		if (!empty($charset) and (substr_count($charset, "1251") or (substr_count($charset, "utf-8") and !$this->detect_utf($body)))) $body = $this->win_to_utf($body);	
				
		return $body;
	}

	function isPicture($pic) {
		if (strlen($pic) < 10) return 0;
		$beg = substr($pic, 0, 3);
		$a = 0;
		if (ord($beg[0]) == 0x47 && ord($beg[1]) == 0x49 && ord($beg[2]) == 0x46) $a = 1;
		if (ord($beg[0]) == 0xff && ord($beg[1]) == 0xd8 && ord($beg[2]) == 0xff) $a = 1;
		if (ord($beg[0]) == 0x89 && ord($beg[1]) == 0x50 && ord($beg[2]) == 0x4e) $a = 1;
					
		return $a;		
	}	
	
	
	function detect_utf($string) {
		$result = preg_replace('/.*/su', '', $string);  
		return is_string($result) && strlen($result) == 0;    
	}
	
	function win_to_utf($s) {
		$t ='';
		for($i=0, $m=strlen($s); $i<$m; $i++)    {
			$c=ord($s[$i]);
			if ($c<=127) {$t.=chr($c); continue; }
			if ($c>=192 && $c<=207) {$t.=chr(208).chr($c-48); continue; }
			if ($c>=208 && $c<=239) {$t.=chr(208).chr($c-48); continue; }
			if ($c>=240 && $c<=255) {$t.=chr(209).chr($c-112); continue; }
			if ($c==184) { $t.=chr(209).chr(145); continue; }; // ё
			if ($c==168) { $t.=chr(208).chr(129); continue; }; // Ё
			if ($c==179) { $t.=chr(209).chr(150); continue; }; // і
			if ($c==178) { $t.=chr(208).chr(134); continue; }; // І
			if ($c==191) { $t.=chr(209).chr(151); continue; }; // ї
			if ($c==175) { $t.=chr(208).chr(135); continue; }; // ї
			if ($c==186) { $t.=chr(209).chr(148); continue; }; // є
			if ($c==170) { $t.=chr(208).chr(132); continue; }; // Є
			if ($c==180) { $t.=chr(210).chr(145); continue; }; // ґ
			if ($c==165) { $t.=chr(210).chr(144); continue; }; // Ґ
			if ($c==250) { $t.=chr(208).chr(170); continue; }; // ъ			
			
		}
		return $t;
	}

	public function ParsOptions($ht, $key1, $point, $key2, &$maso, &$masp) {		
		if (!empty($point)) {
			$point = $this->symbol($point);			
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
		}
		if (!empty($key1) and strlen($ht) > 500) {
			$key1 = $this->symbol($key1);			
			$key1 = str_replace("&#039;", "'", $key1);
			$key1 = str_replace("&quot;", '"', $key1);
			$key1 = str_replace("&amp;", '&', $key1);
			$key1 = str_replace("&amp;nbsp;", '&nbsp;', $key1);
			if (!empty($key2)) {
				$key2 = $this->symbol($key2);
				$key2 = str_replace("&#039;", "'", $key2);
				$key2 = str_replace("&quot;", '"', $key2);
				$key2 = str_replace("&amp;", '&', $key2);
				$key2 = str_replace("&amp;nbsp;", '&nbsp;', $key2);
			}
			$k1 = array();
			$k2 = array();
			$points = array(0,0,0);
			$lk10 = 0;
			$lk11 = 0;
			$lk20 = 0;
			$lk21 = 0;
			$k1 = explode(",", $key1);
			if (!empty($key2) and !preg_match('/^[0-9]+$/', $key2)) $k2 = explode(",", $key2);
			if ((empty($k1[0]) or empty($k1[1])) or ($k2 and (empty($k2[0]) or empty($k2[1])))) {
				$err = " Option keyword error \n";
				$this->adderr($err);
				return;
			}			
			$lk10 = strlen($k1[0]);
			$lk11 = strlen($k1[1]);
			if ($k2) {
				$lk20 = strlen($k2[0]);
				$lk21 = strlen($k2[1]);
			}
			
			if (!empty($point))	{
				$points = explode(",", $point);
				if (count($points)>2) {
					$posn = strpos($ht, $points[2]);				
					if ($posn) $ht = substr($ht, $posn+strlen($points[2]));
					else return;
				}	
			}
			
			$posb = 0;
			$pose = 0;
			$h = $ht;
			if (!empty($points[0]))	{
				$posb = strpos($ht, $points[0]);				
				if (!$posb) return;
			}
			if (!empty($points[1]))	{
				$pose = strpos($ht, $points[1], $posb);
				$h = substr($ht, $posb+strlen($points[0]), $pose-$posb-strlen($points[0]));
			} else $h = substr($ht, $posb+strlen($points[0]));
			$lim = strlen($h);
			
			$posa = 0;
			$posp = 0;
			$i = 0;	
			
			while ($posa < $lim-5) {
				$posa = stripos($h, $k1[0], $posa);	
				if (!$posa) break;					
				$posa = $posa + $lk10;		
				$pe = stripos($h, $k1[1], $posa);						
				if (!$pe) break;						
				$le = $pe - $posa;
				$a = substr($h, $posa, $le);	
				$a = strip_tags($a);						
				$a = $this->symbol($a);
				$a = str_replace("&nbsp;", " ", $a);
				
		/*                                        Вырезать из значения опции текст от символа ( до символа )
				$first = 0;
				$second = 0;
				$first = stripos($a, "(", 0);
				if ($first) $second = stripos($a, ")", $first);
				if ($second) {
					$a1 = substr($a, 0, $first);
					$a2 = substr($a, $second+1);
					$a = $a1.$a2;
				}
		                                          конец вырезания  */
				$a = trim($a);
				$maso[$i] = $a;
				$posa = $pe + $lk11;
	
				$masp[$i] = '';
				if ($k2) {
					$posp = stripos($h, $k2[0], $posp);
					if (!$posp) continue;
					$posp = $posp + $lk20;		
					$pe = stripos($h, $k2[1], $posp);						
					if (!$pe) continue;						
					$le = $pe - $posp;
					$a = substr($h, $posp, $le);
					if (isset($k[2]) and !empty($k[2]) and preg_match('/[0-9]+$/', $k[2])) {
						$n = $k[2];					
						preg_match_all('/\d+(?:[\., ]\d+)?/', $a, $mas);
						$d = 0;
						if (isset($mas[0])) $d = count($mas[0]);
						if ($n and $d) {
							if (isset($mas[0][$n-1])) $a =	$mas[0][$n-1];
							else $a = 	$mas[0][$d-1];
						}
					}
					$a = strip_tags($a);
					$a = $this->convertPrice($a);				
					$masp[$i] = $a;
				}
				$i++;
			}	
					
		}	
	}
	
	public function attImage(&$text, $row_count, $url, $sleep, $ffile) {
		if (empty($text)) return;
		$spath = "data/attribute/";
		$text = str_replace("&quot;", '"', $text);
		$text = str_replace("&#039;", '"', $text);
		$text = str_replace("&#39;", '"', $text);
		$pos = -1;		
		$path = '';
		$fpath = '';
		$ppath = '';
		$pos = stripos($text, '<img ', 0);
		if ($pos != -1) {				
			$epos = stripos($text, '>', $pos+1);				
			$kav = stripos($text, 'src', $pos+1);	
			if (!$kav) $kav = stripos($text, "ref", $pos+1);
			if (!$kav) {
				$this->delRefer($text, $pos, $epos);
				return;
			}	
			$ekav = stripos($text, '"', $kav+8);	
			if (!$ekav) $ekav = stripos($text, "'", $kav+8);
			if (!$ekav) {
				$ekav = stripos($text, ".jpg", $kav+8);
				if ($ekav) $ekav = $ekav+4;
			}	
			if (!$ekav) {
				$ekav = stripos($text, ".png", $kav+8);
				if ($ekav) $ekav = $ekav+4;
			}
			if (!$ekav) {
				$this->delRefer($text, $pos, $epos);
				return;
			}
			$bkav = stripos($text, '"', $kav);	
			if (!$bkav) $bkav = stripos($text, "'", $kav);
			if (!$bkav) $bkav = stripos($text, "=", $kav);
			if (!$bkav) {
				$this->delRefer($text, $pos, $epos);
				return;
			}
				
			$im = substr($text, $bkav+1, $ekav-$bkav-1);
			if (!substr_count($im, "http")) {							
				$pe = strpos($url, "//");
				if ($pe) $pe = $pe + 2;
				$pe = strpos($url, "/", $pe);
				$a = substr($url, 0, $pe);							
				if (substr($im, 0 ,1) != "/") $im = '/'.$im;
				if (substr($im, 0 ,2) == "//") $im = substr($im, 2);						
				else {	
					$im = $a.$im;
					$im = str_replace ("../", "", $im);
					$im = str_replace ("./", "", $im);
				}	
			} else {
				$pe = strpos($im, "//");
				if ($pe) $pe = $pe + 2;
				$pe = strpos($im, "/", $pe);
				if (substr($im, $pe+1, 1) == ".") {
					$im = str_replace ("../", "", $im);
					$im = str_replace ("./", "", $im);
				}
			}
				
			$url = $im;
			$url = $this->checkurl($url);	
			if ($url == -1) $this->delRefer($text, $pos, $epos);				
			$ise = ".jpg";
			$nom = stripos($url, ".jpg");
			if (!$nom) {
				$nom = strrpos($url, ".jpeg");
				if ($nom) $ise = ".jpeg";
			}
			if (!$nom) {
				$nom = strrpos($url, ".png");
				if ($nom) $ise = ".png";
			}	
			if (!$nom) {
				$nom = strrpos($url, ".PNG");
				if ($nom) $ise = ".png";
			}
			if (!$nom) {
				$nom = strrpos($url, ".gif");
				if ($nom) $ise = ".gif";
			}
			if (!$nom) {
				$nom = strrpos($url, ".GIF");
				if ($nom) $ise = ".gif";
			}
			if (!$nom) {
				$nom = strrpos($url, ".bmp");
				if ($nom) $ise = ".bmp";
			}
			if (!$nom) {
				$nom = strrpos($url, ".BMP");
				if ($nom) $ise = ".bmp";
			}
				
			$a = strlen($url);
			if (!$nom or $a - $nom > 5) {
				$se = $ise;
				$nom = $a;
			} else $se = substr($url, $nom);										
			$app = substr($url, 0, $nom);
			$nom = strpos($app, ".");
			$app = substr($app, $nom+7);
			$app = $this->TransLit($app);
			$nom = strlen($app);										
			if ($nom > 250) $app = substr($app, $nom-250, 250);
			if ($nom < 2) $app = rand(0, 999999999);									
			$app = $this->MetaURL($app);
				
			$fpath = '../image/' . $spath;	
			if (!is_dir($fpath)) {											
				$err =  " Photo in attribute has not insert : Row ~= " . $row_count . " Folder: " . $fpath. "  not found \n";
				$this->adderr($err);
			}
			$ppath = '../image/' . $spath;	
			if (!is_dir($ppath)) @mkdir($ppath, 0755);	
            $ref = '<img src="' . '../image/' . $spath . $app . $se . '">';				
		//	$ref = '<img src="' . '../image/' . $spath . $app . $se . '" width="10" height="10" />';
			$path = $ppath.$app.$se;
			if (!file_exists($path)) {
				$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);
				if (!$this->isPicture($pict)) {
					$err =  " Download photo in attribute fails. Row ~= " . $row_count ." Url = ". $url . " \n";
					$this->adderr($err);					
					$this->delRefer($text, $pos, $epos);
				
				} else {
					$bytes = @file_put_contents($path, $pict);
					if (!$bytes) {
						$err =  " Write photo in attribute fails. Row ~= " . $row_count ." Url = ". $url . " \n";
						$this->adderr($err);
						$this->delRefer($text, $pos, $epos);
					
					}	
				}
			}
			$text1 = substr($text, 0, $pos);
			$text2 = substr($text, $epos+1);
			$text = $text1 . $ref . $text2;			
		}	
	}
	
	public function ParsAttribute($ht, $key, $point, &$text, $row_count, $url, $sleep, $ffile, $photo_att) {	
		if (!empty($point)) {
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
		}	
		
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);			
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$k = explode(",", $key);
			
			if (empty($k[0]) or empty($k[1])) {
				$err = " Attribute keyword error \n";
				$this->adderr($err);
				return $text;
			}	
			$points = array(0,0,0);
			$lk0 = strlen($k[0]);
			$lk1 = strlen($k[1]);
			$lk2 = 0;
			$lk3 = 0;
			if (isset($k[2]) and !empty($k[2])) $lk2 = strlen($k[2]);
			if (isset($k[3]) and !empty($k[3])) $lk3 = strlen($k[3]);
		
			if (!empty($point))	{
				$points = explode(",", $point);
				if (count($points)>2) {
					$posn = strpos($ht, $points[2]);				
					if ($posn) $ht = substr($ht, $posn+strlen($points[2]));
					else return;
				}	
			}
	
			$posb = 0;			
			if (!empty($points[0]))	{
				$posb = strpos($ht, $points[0]);				
				if (!$posb) return;
				$posb = $posb+strlen($points[0]);
			}
	
			$pose = strlen($ht);
			if (!empty($points[1]))	{
				$pose = strpos($ht, $points[1], $posb);				
				$pose = $pose+strlen($points[1]);
			}
	
			if ($posb >= $pose) return;
			$l = $pose-$posb;
			$h = substr($ht, $posb, $l);
			$lim = strlen($h);
			
			$pos = stripos($h, $k[0], 0);
			if ($pos or $pos === 0) {						
				$posa = 0;
				$i = 0;				
				while ($posa < $lim) {	
					if (strlen($h) > $posa) $posa = stripos($h, $k[0], $posa);					
					if ($posa) {						
						$posa = $posa + $lk0;		
						$pe = stripos($h, $k[1], $posa);						
						if (!$pe) break;						
						$le = $pe - $posa;
						$a = substr($h, $posa, $le);
						$a = strip_tags($a);						
						$a = $this->getName($a);
						$a = str_replace("&nbsp;", " ", $a);
						
						if ($a and !$lk2) {
					//		if (substr_count($a, "i-x")) $a = "no";
					//		if (substr_count($a, "i-tip")) $a = "yes";		
							$a = str_replace("<ul><li>", "", $a);
							$a = str_replace("</li><li>", ", ", $a);
							$a = str_replace('"', '&quot;',$a);
							$a = str_replace('<br>', ',',$a);
							$a = str_replace('<br />', ',',$a);							
							$a = str_replace('&amp;', '&',$a);
							$a = str_replace('&#13;', '',$a);
							$a = str_replace('&#14;', '',$a);
							$text[0]['name'] = 'noname';
							$text[0]['val'] = $a;
							break;
						}	
	
						$posa = $pe + $lk1;	
						if (!$lk3) $posv = $posa;		
						else $posv = stripos($h, $k[2], $posa);	
						if ($posv) {
							if ($lk3) {
								$posv = $posv + $lk2;								
								$pe = stripos($h, $k[3], $posv);
							} else $pe = stripos($h, $k[2], $posv);						
							$le = $pe - $posv;						
							$v = substr($h, $posv, $le);							
							$v = $this->symbol($v);							
							$v = trim($v);
					//		if (substr_count($v, "i-x")) $v = "no";
					//		if (substr_count($v, "i-tip")) $v = "yes";					
	
							if (empty($v)) $pe = $posv;
							if (!empty($v) and !empty($a)) {
								$text[$i]['name'] = $a;
								$v = str_replace("<ul><li>", "", $v);
								$v = str_replace("</li><li>", ", ", $v);
								$v = str_replace('"', '&quot;',$v);
								$v = str_replace('<br>', ',',$v);
								$v = str_replace('<br />', ',',$v);
								$v = str_replace('&nbsp;', ' ',$v);
								$v = str_replace('&amp;', '&',$v);
								$v = str_replace('&#13;', '',$v);
								$v = str_replace('&#14;', '',$v);															
								if ($photo_att == 1) $text[$i]['val'] = strip_tags($v, '<img><em><i><b><strong>');
								else $text[$i]['val'] = strip_tags($v, '<em><i><b><strong>');
								$any = '';
								$any = '<li class="slidemenuItem">';   // удалить из атрибута все такие тексты			
								$text[$i]['val'] = $this->delAny($text[$i]['val'], $any);
								if (substr_count($text[$i]['val'], "<img") and $photo_att == 1) $this->attImage($text[$i]['val'], $row_count, $url, $sleep, $ffile);								
								$i++;								
							}	
						} else break;
						$posa = $pe+$lk2;	
					} else break;
				}				
			}	
		}
		return;
	}

	public function Parsing($ht, $k, $point, $place) {	
		$pointe = '';			
		if (!empty($point)) {		
			$mp = explode(",", $point);
			if (isset($mp[0]) and !empty($mp[0])) $point = $mp[0];			
			if (isset($mp[1]) and !empty($mp[1])) $pointe = $mp[1];
			if (!empty($mp[1]) and isset($mp[2]) and !empty($mp[2])) $point = $point . ',' . $mp[2];
		}
		
		if ($k[0] =='*' and $k[1] == '*') {
			$text = $ht;
			return $text;
		}
	
		$text = '';
		$lk0 = strlen($k[0]);
		$num = 1;
		if (!empty($place) and $place > 0 and preg_match('/^[0-9]+$/', $place)) $num = $place;	
	
		$pos = 0;
		$back = 0;
		$posf = 0;	
		
		if (!empty($point)) {	
			$nn = strlen($point) - 2;	
			if ($nn > 0) {
				$a = substr($point, $nn);
				if ($a == ",<") {
					$back = 1;
					$point = substr($point, 0, $nn);
				}	
				$pos = stripos($ht, $point);	
				if (!$pos) return $text;
				$pos = $pos+$nn+2;
			}			
		}
		$lim = $pos;
		if ($pointe) $posf = stripos($ht, $pointe, $pos+strlen($point));		
	
		if (!$back) {
			$a = 0;
			for ($j=1; $j<= $num; $j++) {
				$pos = stripos($ht, $k[0], $pos+1);	
				if (($posf and $pos and $pos < $posf) or (!$posf and $pos)) $a = $pos;
				if (!$pos) break;					
			}
			$pos = $a;
		} else {
			$pos = $posf;
			$a = 0;
			$h = substr($ht, 0, $posf);
			for ($j=1; $j<= $num; $j++) {	
				$pos = strrpos($h, $k[0]);				
				if ($pos and $pos > $lim) {
					$a = $pos;
					$h = substr($h, 0, $pos);
				}				
				if (!$pos) break;
			}	
			$pos = $a;
		}		
	
		if ($pos) {
			$posa = $pos + $lk0;	
			if ($posf) {	
				if ($posa > $posf) return $text;
			}
			$pose = stripos($ht, $k[1], $posa);

			if (isset($k[2]) and !empty($k[2])) {
				while(1) {
					$p = stripos($ht, $k[2], $pose+1);
					if (!$p) { 
						$pose = 0;
						break;
					}					
					$l = $p - $pose + strlen($k[2]);
					$end = substr($ht, $pose, $l);
					$end = preg_replace('%[^A-Za-zА-Яа-я0-9-/<>.:"=+;]%', '', $end);									
					$pose = $p;
					if ($end == $k[1].$k[2]) break;
					else {
						$pose = stripos($ht, $k[1], $p);
						if (!$pose) break;
					}				
				}
			}	
			if ($pose) {
				$l = $pose - $posa;
				if ($l > 0) {
					$text = substr($ht, $posa, $l);
					$text = trim($text);	
				}	
			}	
		}
		
	/*	if (substr_count($text, '&') and substr_count($text, ';')) {            
            $mas = explode(';', $text);
            $str = '';
            foreach ($mas as $ch) {
                if (preg_match('/[0-9&#;abcdefABCDEF]+$/', $ch) or preg_match('/[0-9&x;abcdefABCDEF]+$/', $ch)) {
                    if (!substr_count($ch, '#')) $ch = str_replace('&', '&#', $ch);
                    if (!substr_count($ch, 'x')) $ch = str_replace('#', '#x', $ch);
                    if (substr_count($ch, 'xx')) $ch = str_replace('xx', '#x', $ch);
                    $str.= html_entity_decode($ch.';' ,ENT_NOQUOTES, 'UTF-8');
                } else $str.= $ch;    
            }
            $text = $str;
            if (substr($text, strlen($text), 1) == ';') $text = substr($text, 0, strlen($text)-1);
            
        } */
		return $text;
	}
	
	public function ParsQu($ht, $key, $point, $place) {
		$text = '';			
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);			
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " Quantity keyword error \n";
				$this->adderr($err);
				return $text;
			}			
			$pr = $this->Parsing($ht, $k, $point, $place);
			$pr = strip_tags($pr);			
			$pr = str_replace("'", "", $pr);
			$text = str_replace("&nbsp;", ' ', $pr);
			$text = str_replace("&gt;", '>', $text);
			$text = str_replace("&lt;", '<', $text);
			$text = trim($text);
			if (empty($text)) $text = 0;
		}	
		return $text;
			
	}
	
	public function ParsPrice($ht, $key, $point, $place) {
		$pr = '';		
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);	
			if (empty($k[0]) or empty($k[1])) {
				$err = " Price keyword error \n";
				$this->adderr($err);
				return $pr;
			}
			$prm = array();
			$mas = array();
			$n = 0;
			if (isset($k[2]) and !empty($k[2]) and preg_match('/[0-9]+$/', $k[2])) {
				$n = $k[2];
				$k[2] = '';
			}
			if (!$place) {
				$pr = $this->Parsing($ht, $k, $point, 1);
				preg_match_all('/\d+(?:[\., ]\d+)?/', $pr, $mas);
				$d = 0;
				if (isset($mas[0]) and isset($mas[0][0])) {
					$d = count($mas[0]);
					$pr = $mas[0][0];
				}
				if ($n and $d) {
					if (isset($mas[0][$n-1])) $pr =	$mas[0][$n-1];
					else $pr = 	$mas[0][$d-1];
				}
				$pr = $this->convertPrice($pr);	
			} else {				
				$l = 0;
				for ($i=1; $i<20; $i++) {
					$pr = 0;
					$a = $this->Parsing($ht, $k, $point, $i);
					if ($a) {
						preg_match_all('/\d+(?:[\., ]\d+)?/', $a, $mas);
						$d = 0;
						if (isset($mas[0]) and isset($mas[0][0])) {
							$d = count($mas[0]);
							$a = $mas[0][0];
						}
						if ($n and $d) {
							if (isset($mas[0][$n-1])) $a =	$mas[0][$n-1];
							else $a = 	$mas[0][$d-1];
						}						
						$pr = $this->convertPrice($a);
						if ($pr) {
							$prm[$l] = $pr;	
							$l++;	
						}
					}					
				}
				$n = count($prm);
				if (!$n) return $pr;				
				$min = 10000000000;
				for ($i=0; $i<$n; $i++) {
					if ($prm[$i] < $min) $min = $prm[$i];						
				}
				$max = 0;
				for ($i=0; $i<$n; $i++) {
					if ($prm[$i] > $max) $max = $prm[$i];						
				}
				$sum = 0;
				for ($i=0; $i<$n; $i++) {
					$sum = $sum + $prm[$i];						
				}
				$av = $sum/$n;				
				switch ($place) {			
					case 1:
						$pr = $min;
						break;
					case 2:						
						$pr = $max;
						break;
					case 3:
						$pr = $av;
						break;
					case 4:
						$m = 0;
						for ($i=0; $i<$n; $i++) {
							if ($prm[$i]<$av and $prm[$i]>$m) $m = $prm[$i];								
						}
						$pr = $m;
						break;
					case 5:
						$m = 10000000;
						for ($i=0; $i<$n; $i++) {
							if ($prm[$i]>$min and $prm[$i]<$m) $m = $prm[$i];								
						}
						$pr = $m;
						break;
					case 6:
						$m = 0;
						for ($i=0; $i<$n; $i++) {
							if ($prm[$i]<$max and $prm[$i]>$m) $m = $prm[$i];								
						}
						$pr = $m;
						break;
					case 7:	
						$pr = 0; 
						if (isset($prm[1])) $pr = $prm[1];
						break;
					case 8:	
						$pr = 0; 
						if (isset($prm[2])) $pr = $prm[2];
						break;	
					case 9:	
						$pr = 0; 
						if (isset($prm[$n-1])) $pr = $prm[$n-1];
						break;	
					case 10:	
						$pr = 0; 
						if (isset($prm[3])) $pr = $prm[3];
						break;
					case 11:	
						$pr = 0; 
						if (isset($prm[4])) $pr = $prm[4];
						break;	
				}
			}
		}		
		return $pr;			
	}	
	
	public function ParsCategory($ht, $key, $point, $place) {
		$text = '';			
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " Category keyword error \n";
				$this->adderr($err);
				return $text;
			}
			$text = $this->Parsing($ht, $k, $point, $place);			
			$text = $this->getName($text);
		}	
		return $text;
			
	}
	
	public function ParsManufacturer($ht, $key, $point, $place) {
		$text = '';			
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " Manufacturer keyword error \n";
				$this->adderr($err);
				return $text;
			}
			$text = $this->Parsing($ht, $k, $point, $place);		
			$text = $this->getName($text);
		}
		
		return $text;
			
	}
	
	public function ParsCode($ht, $key, $point, $place) {
		$text = '';
		
		if (!empty($key) and strlen($ht) > 500) {		
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " SKU keyword error = ". $key."\n";
				$this->adderr($err);
				return $text;
			}
			$text = $this->Parsing($ht, $k, $point, $place);
			$text = strip_tags($text);			
			$text = trim($text);
		}	
		return $text;
			
	}	
	
	public function ParsName($ht, $key, $point, $place) {		
		$text = '';			
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " Product name keyword error \n";
				$this->adderr($err);
				return $text;
			}
			
			$text = $this->Parsing($ht, $k, $point, $place);
			$text = strip_tags($text, '<h2><h3><h4><b><strong><i>');
			$text = str_replace("&laquo;", "", $text);
			$text = str_replace("&raquo;", "", $text);
			$text = $this->getName($text);		
		}	
		return $text;			
	}
	
	public function delAny($text, $any) {
		if (!$any) return; 
		for ($i=0; $i<100; $i++) {
			$pos = stripos($text, $any);
			if (!$pos) break;
			$l = strlen($any);			
			$text1 = substr($text, 0, $pos);
			$text2 = substr($text, $pos+$l);
			$text = $text1 . $text2;
		}
	
		return $text;
	}
	
	public function delRefer(&$text, $pos, $epos) {
		$text1 = substr($text, 0, $pos-1);
		$text2 = substr($text, $epos+1);
		$text = $text1 . $text2;		
	}
	
	public function descImage(&$text, $row_count, $url, $sleep, $ffile) {
		if (empty($text)) return;
		$spath = "data/description/";
		$text = str_replace("&quot;", '"', $text);
		$text = str_replace("&#039;", '"', $text);
		$text = str_replace("&#39;", '"', $text);
		$pos = -1;		
		for ($i=0; $i<50; $i++) {
			$path = '';
			$fpath = '';
			$ppath = '';	
			$pos1 = stripos($text, '<img', $pos+1);			
			if ($pos1 or ($i == 0 and $pos1 == 0)) {
				if ($pos > $pos1) break;
				$pos = $pos1;
				$epos = 0;
				$epos = stripos($text, '>', $pos+1);				
				$kav = stripos($text, 'src', $pos+1);	
				if (!$kav) $kav = stripos($text, "ref", $pos+1);
				if (!$kav and $epos) {
					$this->delRefer($text, $pos, $epos-$pos+1);
					continue;
				}	
				$ekav = stripos($text, '"', $kav+8);				
				if (!$ekav) {
					$ekav = stripos($text, ".jpg", $kav+8);
					if ($ekav) $ekav = $ekav+4;
				}	
				if (!$ekav) {
					$ekav = stripos($text, ".png", $kav+8);
					if ($ekav) $ekav = $ekav+4;
				}
				if (!$ekav and $epos) {
					$this->delRefer($text, $pos, $epos-$pos+1);
					continue;
				}
				$bkav = stripos($text, '"', $kav);				
				if (!$bkav) $bkav = stripos($text, "=", $kav);
				if (!$bkav and $epos) {
					$this->delRefer($text, $pos, $epos-$pos+1);
					continue;
				}
	
				$im = substr($text, $bkav+1, $ekav-$bkav-1);
				$width = "180";
				$height= "180";
				$title = "";
				$alt = "";
				$t = substr($text, $pos1, $epos-$pos1+1);

				$a = stripos($t, 'width', 0);
				if ($a) {
					$b = 0;
					if (substr_count($t, "style")) $b = stripos($t, 'width:', $a)+5;
					if (!$b and substr_count($t, "style")) $b = stripos($t, 'width :', $a)+6;
					if (!$b) $b = stripos($t, '"', $a);					
					if ($b) {
						$c = 0;
						if (substr_count($t, "style")) {
							$c = stripos($t, 'px', $b+1);
							if (!$c) $c = stripos($t, ';', $b+1);
						}	
						if (!$c) $c = stripos($t, '"', $b+1);						
						if ($c) $width = trim(substr($t, $b+1, $c-$b-1));	
					}	
				}			
				$a = stripos($t, 'height', 0);
				if ($a) {
					$b = 0;
					if (substr_count($t, "style")) $b = stripos($t, 'height:', $a)+6;
					if (!$b and substr_count($t, "style")) $b = stripos($t, 'height :', $a)+7;
					if (!$b) $b = stripos($t, '"', $a);
					if (!$b) $b = stripos($t, "'", $a);
					if ($b) {
						$c = 0;
						if (substr_count($t, "style")) $c = stripos($t, 'px', $b+1);
						if (!$c) $c = stripos($t, '"', $b+1);
						if (!$c) $c = stripos($t, "'", $b+1);
						if ($c) $height = trim(substr($t, $b+1, $c-$b-1));	
					}	
				}
				
				$alt = "";
				$title = "";				
				$t = substr($text, $pos1, $epos);
				$a = stripos($t, 'alt', 0);
				if ($a) {
					$b = stripos($t, '"', $a);
					if (!$b) $b = stripos($t, "'", $a);
					if ($b) {
						$c = stripos($t, '"', $b+1);
						if (!$c) $c = stripos($t, "'", $b+1);
						if ($c) $alt = substr($t, $b+1, $c-$b-1);
					}	
				}			
				$a = stripos($t, 'title', 0);
				if ($a) {
					$b = stripos($t, '"', $a);
					if (!$b) $b = stripos($t, "'", $a);
					if ($b) {
						$c = stripos($t, '"', $b+1);
						if (!$c) $c = stripos($t, "'", $b+1);
						if ($c) $title = substr($t, $b+1, $c-$b-1);
					}	
				}
				
				if (!substr_count($im, "http")) {							
					$pe = strpos($url, "//");
					if ($pe) $pe = $pe + 2;
					$pe = strpos($url, "/", $pe);
					$a = substr($url, 0, $pe);							
					if (substr($im, 0 ,1) != "/") $im = '/'.$im;
					if (substr($im, 0 ,2) == "//") $im = substr($im, 2);						
					else {	
						$im = $a.$im;
						$im = str_replace ("../", "", $im);
						$im = str_replace ("./", "", $im);
					}	
				} else {
					$pe = strpos($im, "//");
					if ($pe) $pe = $pe + 2;
					$pe = strpos($im, "/", $pe);
					if (substr($im, $pe+1, 1) == ".") {
						$im = str_replace ("../", "", $im);
						$im = str_replace ("./", "", $im);
					}
				}
				
				$url = $im;
	
				$url = $this->checkurl($url);	
				if ($url == -1) $this->delRefer($text, $pos, $epos);				
				$ise = ".jpg";
				$nom = stripos($url, ".jpg");
					if (!$nom) {
					$nom = strrpos($url, ".jpeg");
					if ($nom) $ise = ".jpeg";
				}
				if (!$nom) {
					$nom = strrpos($url, ".png");
					if ($nom) $ise = ".png";
				}	
				if (!$nom) {
					$nom = strrpos($url, ".PNG");
					if ($nom) $ise = ".png";
				}
				if (!$nom) {
					$nom = strrpos($url, ".gif");
					if ($nom) $ise = ".gif";
				}
				if (!$nom) {
					$nom = strrpos($url, ".GIF");
					if ($nom) $ise = ".gif";
				}
				if (!$nom) {
					$nom = strrpos($url, ".bmp");
					if ($nom) $ise = ".bmp";
				}
				if (!$nom) {
					$nom = strrpos($url, ".BMP");
					if ($nom) $ise = ".bmp";
				}
				
				$a = strlen($url);
				if (!$nom or $a - $nom > 5) {
					$se = $ise;
					$nom = $a;
				} else $se = substr($url, $nom);										
				$app = substr($url, 0, $nom);
				$nom = strpos($app, ".");
				$app = substr($app, $nom+7);
				$app = $this->TransLit($app);
				$nom = strlen($app);										
				if ($nom > 250) $app = substr($app, $nom-250, 250);
				if ($nom < 2) $app = rand(0, 999999999);									
				$app = $this->MetaURL($app);
				
				$fpath = '../image/' . $spath;	
				if (!is_dir($fpath)) {											
					$err =  " Photo in description has not insert : Row ~= " . $row_count . " Folder: " . $fpath. "  not found \n";
					$this->adderr($err);
				}
				$ppath = '../image/' . $spath;	
				if (!is_dir($ppath)) @mkdir($ppath, 0755);				
				$ref = '<img src="' . '../image/' . $spath . $app . $se . '" width="' . $width . '" height="' . $height . '" . alt="' . $alt . '" title="' . $title . '" />';
				$path = $ppath.$app.$se;
				if (!file_exists($path)) {
					$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);
					if (!$this->isPicture($pict)) {
						$err =  " Download photo in description fails. Row ~= " . $row_count ." Url = ". $url . " \n";
						$this->adderr($err);					
						$this->delRefer($text, $pos, $epos);
						continue;			
					} else {
						$bytes = @file_put_contents($path, $pict);
						if (!$bytes) {
							$err =  " Write photo in description fails. Row ~= " . $row_count ." Url = ". $url . " \n";
							$this->adderr($err);
							$this->delRefer($text, $pos, $epos);
							continue;			
						}	
					}
				}

				$text1 = substr($text, 0, $pos);
				$text2 = substr($text, $epos+1);
				$text = $text1 . $ref . $text2;	
								
			} else break;
		}	
	}
	
	public function ParsDescription($ht, $key, $point, $place, $row_count, $url, $sleep, $ffile, $photo_desc) {
	
		$text = '';			
		if (!empty($key) and strlen($ht) > 500) {	
			$key = $this->symbol($key);
			$key = str_replace("&#039;", "'", $key);
			$key = str_replace("&quot;", '"', $key);
			$key = str_replace("&amp;", '&', $key);
			$key = str_replace("&amp;nbsp;", '&nbsp;', $key);
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$k = explode(",", $key);
			if (empty($k[0]) or empty($k[1])) {
				$err = " Product description keyword error \n";
				$this->adderr($err);
				return $text;
			}			
			$text = $this->Parsing($ht, $k, $point, $place);	
            $text = $this->symbol($text);			
	
			if ($photo_desc) $text = strip_tags($text, '<img><iframe><th><p><ol><em><i><br><li><ul><tbody><a><table><h1><h2><h3><h4><tr><td><dd><dt><b><strong>');
			else $text = strip_tags($text, '<th><p><ol><em><i><br><li><ul><tbody><a><table><h1><h2><h3><h4><tr><td><dd><dt><b><strong>');
			$any = '';
			$any = '<li class="slidemenuItem" id="slideli">';   // удалить из описания все такие тексты			
			$text = $this->delAny($text, $any);
			
			if (substr_count($text, "<img") and $photo_desc) $this->descImage($text, $row_count, $url, $sleep, $ffile);
			$text = str_replace('Описание', '', $text);
            $text = str_replace('Description', '', $text);			
			$text = preg_replace('/<P.*?>/','<p>',$text);	
			$text = str_replace('<p></p>', '', $text);
			$text = str_replace('<p> </p>', '', $text);
			$text = str_replace('<p>  </p>', '', $text);
			$text = str_replace('<p>&nbsp;</p>', '', $text);
			$text = str_replace('<strong></strong>', '', $text);
			$text = str_replace('<br /><br /><br />', '<br />', $text);
			$text = str_replace('<br/><br/><br/>', '<br />', $text);
			$text = str_replace('<br><br><br>', '<br />', $text);
			$text = str_replace('<br ><br ><br >', '<br />', $text);
			$text = str_replace('<br /><br />', '<br />', $text);
			$text = str_replace('<br/><br/>', '<br />', $text);
			$text = str_replace('<br><br>', '<br />', $text);
			$text = str_replace('<br ><br >', '<br />', $text);			
			$text = str_replace('&nbsp;', ' ',$text);
			$text = str_replace("\n", '', $text);
			$text = str_replace("\r", '', $text);
			$posa = strrpos($text, "<!--");
			if ($posa) $text = substr($text, 0, $posa);			
			$text = trim($text);			
			
			/************ Вырезать текст начиная, с ********************/
	/*		$pos = stripos($text, 'Купить', 0);
			if ($pos) $text = substr($text, 0, $pos);
			else {
				$pos = stripos($text, 'Сделать заказ', 0);
				if ($pos) $text = substr($text, 0, $pos);
				else {
					$pos = stripos($text, 'Продажа', 0);
					if ($pos) $text = substr($text, 0, $pos);
					else {
						$pos = stripos($text, 'Заказ', 0);
						if ($pos) $text = substr($text, 0, $pos);
						else {
							$pos = stripos($text, 'Расширяйте', 0);
							if ($pos) $text = substr($text, 0, $pos);
							else {
								$pos = stripos($text, 'Почему именно в', 0);
								if ($pos) $text = substr($text, 0, $pos);
								else {
									$pos = stripos($text, 'Инструкция', 0);
									if ($pos) $text = substr($text, 0, $pos);
									else {
										$pos = stripos($text, 'Сайт производителя', 0);
										if ($pos) $text = substr($text, 0, $pos);
									}	
								}							
							}	
						}	
					}
				}
			}	    */
			/********************************/
	
            $text = trim($text);    
        }
		return $text;
    }
	
	public function ParsPic($ht, $url, $key, $warranty, $fname, $point) {	
		$fname = $this->symbol($fname);
		$fname = str_replace("&#039;", "'", $fname);
		$fname = str_replace("&quot;", '"', $fname);
		$fname = str_replace("&amp;", '&', $fname);
		$fname = str_replace("&amp;nbsp;", '&nbsp;', $fname);
		$pointe = '';
		$pos = 0;
		$posf = 0;	
		if (!empty($point)) {
			$point = $this->symbol($point);
			$point = str_replace("&#039;", "'", $point);
			$point = str_replace("&quot;", '"', $point);
			$point = str_replace("&amp;", '&', $point);
			$point = str_replace("&amp;nbsp;", '&nbsp;', $point);
			$mp = explode(",", $point);
			
			if (empty($mp[0]) or (!empty($mp[0]) and preg_match('/^[0-9]+$/', $mp[0]))) {
				$err = " Invalid parameter for parsing photo: ". $this->symbol($mp[0]) ." URL: ". $url ."\n";
				$this->adderr($err);
				return 0;
			}
						
			$pos = stripos($ht, $mp[0]);	
			if (!$pos) {
				$err = " Invalid parameter for parsing photo = ". $this->symbol($mp[0]) ." URL = ". $url ."\n";
				$this->adderr($err);
				return 0;
			}	
		}
		
		if (isset($mp[1]) and !empty($mp[1])) $posf = stripos($ht, $mp[1], $pos);
		if ($pos and $posf) $ht = substr($ht, $pos, $posf-$pos);
		if ($pos and !$posf) $ht = substr($ht, $pos);
	
		$l = strlen($ht);	
		$im = 0;
		if ( $l > 50) {							
			$posb = 0;
			$pos = 0;							
			$num = substr($warranty, 4) + 0;
			
			for ($j=1; $j<= $num; $j++) {				
				$pos = stripos($ht, $fname, $pos+1);
				if (!$pos) break;					
			}
	
			$s = '';
			if ($pos) {
				$sign = substr($warranty,0, 4);	
				$fl = 0;
				if ($sign == "&lt;") {
					if ($pos > 500) $s = substr ($ht, $pos-500, 500);
					else $s = substr ($ht, 0, $pos);
					if (empty($key)) {						
						$posb = strrpos($s, "href=");
						if (!$posb) $posb=0;
						$posb1 = strrpos($s, "src=");
						if (!$posb1) $posb1=0;
						$posb2 = strrpos($s, "http");
						if (!$posb2) $posb2=0;
						$posb3 = strrpos($s, "url");
						if (!$posb3) $posb3=0;
						$posb4 = strrpos($s, "(/");
						if (!$posb4) $posb4=0;
						$posb5 = strrpos($s, "image=");
						if (!$posb5) $posb5=0;
						$posb6 = strrpos($s, "'/");
						if (!$posb6) $posb6=0;
						$posb7 = strrpos($s, "full=");
						if (!$posb7) $posb7=0;
						$posb8 = strrpos($s, '"/');
						if (!$posb8) $posb8=0;
						$posb9 = strrpos($s, "img=");
						if (!$posb9) $posb9=0;
						$max = 0;
						if ($posb > $max) $max = $posb;
						if ($posb1 > $max) $max = $posb1;
						if ($posb3 > $max) $max = $posb3;
						if ($posb4 > $max) $max = $posb4;
						if ($posb5 > $max) $max = $posb5;
						if ($posb6 > $max) $max = $posb6;
						if ($posb6 == $max) $max--;
						if ($posb7 > $max) $max = $posb7;
						if ($posb8 > $max) $max = $posb8;
						if ($posb8 == $max) $max--;
						if ($posb9 > $max) $max = $posb9;
						if ($posb2 > $max) {
							$max = $posb2;
							$fl = 1;
						}	
						$posb = $max;
						if ($fl) $posb = $posb - 2;
					} else $posb = strrpos($s, $key);
				} else {					
					$s = substr ($ht, $pos, 500);
					if (empty($key)) {						
						$posb = stripos($s, "href=");
						if (!$posb) $posb=500;
						$posb1 = stripos($s, "src=");
						if (!$posb1) $posb1=500;
						$posb2 = stripos($s, "http");
						if (!$posb2) $posb2=500;
						$posb3 = stripos($s, "url");
						if (!$posb3) $posb3=500;
						$posb4 = stripos($s, "(/");
						if (!$posb4) $posb4=500;
						$posb5 = stripos($s, "image=");
						if (!$posb5) $posb5=500;
						$posb6 = stripos($s, "'/");
						if (!$posb6) $posb6=500;
						$posb7 = stripos($s, "full=");
						if (!$posb7) $posb7=500;
						$posb8 = stripos($s, '"/');
						if (!$posb8) $posb8=500;
						$posb9 = stripos($s, "img=");
						if (!$posb9) $posb9=500;
						$min = 99999999;
						if ($posb < $min) $min = $posb;
						if ($posb1 < $min) $min = $posb1;
						if ($posb3 < $min) $min = $posb3;
						if ($posb4 < $min) $min = $posb4;
						if ($posb5 < $min) $min = $posb5;
						if ($posb6 < $min) $min = $posb6;
						if ($posb6 == $min) $min--;
						if ($posb7 < $min) $min = $posb7;
						if ($posb8 < $min) $min = $posb8;
						if ($posb8 == $min) $min--;
						if ($posb9 < $min) $min = $posb9;
						if ($posb2 < $min) {
							$min = $posb2;
							$fl = 1;
						}
						$posb = $min;
	
						if ($fl) $posb = $posb - 2;	
					} else $posb = stripos($s, $key);	
				}	
	
				$posb1 = 500;
				$posb2 = 500;
				$posb3 = 500;				
				if ($posb < 495 and $posb != 0) {
					if (!empty($key)) $posb = $posb + strlen($key);
					$posb1 = stripos($s, "'", $posb);
					if ($posb1-$posb > 10) $posb1 = 500;
					$posb2 = stripos($s, '"', $posb);
					if ($posb2-$posb > 10) $posb2 = 500;
					if ($posb1 == 500 and $posb2 == 500) {
						$posb3 = stripos($s, '=', $posb);
						if ($posb3-$posb > 10) $posb3 = 500;
					}
					$posb4 = stripos($s, '(', $posb);
					if ($posb4-$posb > 10) $posb4 = 500;
	
					$posb = 500;
					if ($posb1 < $posb and $posb1) $posb = $posb1;
					if ($posb2 < $posb and $posb2) $posb = $posb2;
					if ($posb3 < $posb and $posb3) $posb = $posb3;
					if ($posb4 < $posb and $posb4) $posb = $posb4;
	
					$pose=0;
					if ($posb != 500) {
						if ($posb1 == $posb) $pose = stripos($s, "'", $posb+1);					
						else {
							if ($posb2 == $posb) $pose = stripos($s, '"', $posb+1);
							else {
							    if ($posb4 == $posb) $pose = stripos($s, ')', $posb4+1);
								else {								
									if ($posb3 == $posb) $pose = stripos($s, '.jpg', $posb3+1) + 4;
								
								}	
							}
						}	
					}	
					if ($posb != 500 and $pose) {
						$len = $pose-$posb-1;
						$im = 0;
						$im = substr($s, $posb+1, $len);
						if (!substr_count($im, "http")) {							
							$pe = strpos($url, "//");
							if ($pe) $pe = $pe + 2;
							$pe = strpos($url, "/", $pe);
							$a = substr($url, 0, $pe);							
							if (substr($im, 0 ,1) != "/") $im = '/'.$im;
							if (substr($im, 0 ,2) == "//") {
								$im = substr($im, 2);
								$im = trim($im);		
								$im = str_replace(' ', '%20',$im);
								return $im;
							}	
							$im = $a.$im;
							$im = str_replace ("../", "", $im);
							$im = str_replace ("./", "", $im);
						} else {
							$pe = strpos($im, "//");
							if ($pe) $pe = $pe + 2;
							$pe = strpos($im, "/", $pe);
							if (substr($im, $pe+1, 1) == ".") {
								$im = str_replace ("../", "", $im);
								$im = str_replace ("./", "", $im);
							}
						}
					}
				}	
			}							
		}
		$im = trim($im);		
		$im = str_replace(' ', '%20',$im);
		
	/* заменить в ссылке на фото слово john на sam	*/	
	 $im = str_replace ("john", "sam", $im);
	
		return $im;
	}
	
	public function checkException($cod, $masex, $nex) {
		$yes = 0;
		for ($i=0; $i<$nex; $i++) {
			if ($masex[$i] == $cod) {
				$yes = 1;
				break;
			}
		}
		return $yes;
	}
	
	public function ftp($file_tmp, $file_name, $form_id) {
		$err = 0;		
		$file_tmp = "./uploads/" . $form_id . '.xml';		
		$err = $this->loadfile($file_tmp, $file_name, $form_id);
		
		if ($err == 3) {
			$err = 0;		
			$file_name = $form_id . '.csv';
			$file_tmp = "./uploads/" . $form_id . '.csv';
			$err = $this->loadfile($file_tmp, $file_name, $form_id);
		}	
		return $err;
	}
	
	public function loadfile($file_tmp, $file_name, $form_id) {
		$row_product = array();
		$data = array();
		$masatt = array();
		$seo_data = array();
		$row = array();
		$row1 = array();
		$row2 = array();
		$rows = array();
		$rows1 = array();
		$rows2 = array();
		$rows3 = array();
		$rows4 = array();
		$f = htmlspecialchars($file_name);
		$file_extension = substr($f, strpos($f,'.'));
		$st = '';
	
		if($file_extension != '.xml' and $file_extension != '.XML' and $file_extension != '.csv' and $file_extension != '.CSV') return 1;
		else {		
			if (!file_exists($file_tmp)) return 3;
			$file_xml = @fopen($file_tmp,"r");
			if ($file_extension == '.xml' or $file_extension == '.XML') {
				for ($i=0; $i < 3; $i++) {
					$st = fgets ($file_xml, 256);
					$res = substr_count($st, "office");				
				}
			} else $res = 1;
			
			if (!$res) return 4;	
		} 
		$path = "./uploads/";	
		if (!is_dir($path)) return 26;
		
		$rows = $this->getSuppler_SEO($form_id);
		$seo_data = array();
		$seo_data['prod_photo'] = '';
		if (isset($rows[0]['prod_photo']))
		$seo_data['prod_photo'] = $this->symbol($rows[0]['prod_photo']);
		$seo_data['prod_h1'] = '';
		if (isset($rows[0]['prod_h1']))
		$seo_data['prod_h1'] = $this->symbol($rows[0]['prod_h1']);	
		$seo_data['prod_title'] = '';
		if (isset($rows[0]['prod_title']))
		$seo_data['prod_title'] = $this->symbol($rows[0]['prod_title']);		
		$seo_data['prod_meta_desc'] = '';
		if (isset($rows[0]['prod_meta_desc']))
		$seo_data['prod_meta_desc'] = $this->symbol($rows[0]['prod_meta_desc']);		
		$seo_data['prod_desc'] = '';
		if (isset($rows[0]['prod_desc']))
		$seo_data['prod_desc'] = $this->symbol($rows[0]['prod_desc']);
		if (isset($rows[0]['prod_keyword']))
		$seo_data['prod_keyword'] = $this->symbol($rows[0]['prod_keyword']);
		if (isset($rows[0]['prod_url']))
		$seo_data['prod_url'] = $this->symbol($rows[0]['prod_url']);
		$seo_data['cat_title'] = '';
		if (isset($rows[0]['cat_title']))
		$seo_data['cat_title'] = $this->symbol($rows[0]['cat_title']);		
		$seo_data['cat_meta_desc'] = '';
		if (isset($rows[0]['cat_meta_desc']))
		$seo_data['cat_meta_desc'] = $this->symbol($rows[0]['cat_meta_desc']);		
		$seo_data['cat_desc'] = '';
		if (isset($rows[0]['cat_desc']))
		$seo_data['cat_desc'] = $this->symbol($rows[0]['cat_desc']);		
		$seo_data['manuf_title'] = '';
		if (isset($rows[0]['manuf_title']))
		$seo_data['manuf_title'] = $this->symbol($rows[0]['manuf_title']);		
		$seo_data['manuf_meta_desc'] = '';
		if (isset($rows[0]['manuf_meta_desc']))
		$seo_data['manuf_meta_desc'] = $this->symbol($rows[0]['manuf_meta_desc']);		
		$seo_data['manuf_desc'] = '';
		if (isset($rows[0]['manuf_desc']))
		$seo_data['manuf_desc'] = $this->symbol($rows[0]['manuf_desc']);
		$seo_data['seo_1'] = '';
		if (isset($rows[0]['seo_1']))
		$seo_data['seo_1'] = $this->symbol($rows[0]['seo_1']);
		$seo_data['seo_2'] = '';
		if (isset($rows[0]['seo_2']))
		$seo_data['seo_2'] = $this->symbol($rows[0]['seo_2']);
		$seo_data['seo_3'] = '';
		if (isset($rows[0]['seo_3']))
		$seo_data['seo_3'] = $this->symbol($rows[0]['seo_3']);
		$seo_data['seo_4'] = '';
		if (isset($rows[0]['seo_4']))
		$seo_data['seo_4'] = $this->symbol($rows[0]['seo_4']);
		$seo_data['seo_5'] = '';
		if (isset($rows[0]['seo_5']))
		$seo_data['seo_5'] = $this->symbol($rows[0]['seo_5']);
		$seo_data['seo_6'] = '';
		if (isset($rows[0]['seo_6']))
		$seo_data['seo_6'] = $this->symbol($rows[0]['seo_6']);		
		$seo_data['seo_7'] = '';
		if (isset($rows[0]['seo_7']))
		$seo_data['seo_7'] = $this->symbol($rows[0]['seo_7']);
		$seo_data['seo_8'] = '';
		if (isset($rows[0]['seo_8']))
		$seo_data['seo_8'] = $this->symbol($rows[0]['seo_8']);
		$seo_data['seo_9'] = '';
		if (isset($rows[0]['seo_9']))
		$seo_data['seo_9'] = $this->symbol($rows[0]['seo_9']);
		$seo_data['seo_10'] = '';
		if (isset($rows[0]['seo_10']))
		$seo_data['seo_10'] = $this->symbol($rows[0]['seo_10']);
		$seo_data['seo_11'] = '';
		if (isset($rows[0]['seo_11']))
		$seo_data['seo_11'] = $this->symbol($rows[0]['seo_11']);
		$seo_data['seo_12'] = '';
		if (isset($rows[0]['seo_12']))
		$seo_data['seo_12'] = $this->symbol($rows[0]['seo_12']);		
		$seo_data['seo_13'] = '';
		if (isset($rows[0]['seo_13']))
		$seo_data['seo_13'] = $this->symbol($rows[0]['seo_13']);
		$seo_data['seo_14'] = '';
		if (isset($rows[0]['seo_14']))
		$seo_data['seo_14'] = $this->symbol($rows[0]['seo_14']);
		$seo_data['seo_15'] = '';
		if (isset($rows[0]['seo_15']))
		$seo_data['seo_15'] = $this->symbol($rows[0]['seo_15']);
		$seo_data['seo_16'] = '';
		if (isset($rows[0]['seo_16']))
		$seo_data['seo_16'] = $this->symbol($rows[0]['seo_16']);
		$seo_data['seo_17'] = '';
		if (isset($rows[0]['seo_17']))
		$seo_data['seo_17'] = $this->symbol($rows[0]['seo_17']);		
		$seo_data['seo_18'] = '';
		if (isset($rows[0]['seo_18']))
		$seo_data['seo_18'] = $this->symbol($rows[0]['seo_18']);
		$seo_data['seo_19'] = '';
		if (isset($rows[0]['seo_19']))
		$seo_data['seo_19'] = $this->symbol($rows[0]['seo_19']);
		$seo_data['seo_20'] = '';
		if (isset($rows[0]['seo_20']))
		$seo_data['seo_20'] = $this->symbol($rows[0]['seo_20']);

		$seo = array();
				
		$rows = $this->getMySuppler($form_id);
		
		if (empty($rows) or !isset($rows[0]['suppler_id'])) return 27;
		
			$id		  = $rows[0]['suppler_id'];
			$rate     = $rows[0]['rate'];
			$ratep     = $rows[0]['ratep'];
			$photo_att = $rows[0]['ratek'];
			$ccod      = $rows[0]['cod'];
			$related  = $rows[0]['related'];
			$lang 	  = $rows[0]['sort_order'];
			$iitem     = $rows[0]['item'];
			$ccat      = $rows[0]['cat'];			
			$qu       = $rows[0]['qu'];
			$pprice    = $rows[0]['price'];
			$pqu    	= $rows[0]['qu'];
			$ddescrip  = $rows[0]['descrip'];
			$ppic_ext  = $rows[0]['pic_ext'];
			$mmanuf    = $rows[0]['manuf'];
			$warranty = $rows[0]['warranty'];
			$sku2 	  = $rows[0]['sku2'];
			$ad       = $rows[0]['ad'];
			
			$st_status   = $rows[0]['status'];
			$my_cat   = $rows[0]['my_cat'];
			$my_qu    = $rows[0]['my_qu'];
			$my_price = $rows[0]['my_price'];
			$my_descrip = $this->symbol($rows[0]['my_descrip']);
			$my_manuf = $rows[0]['my_manuf'];
			$my_photo  = $rows[0]['my_photo'];
			$cheap    = $rows[0]['cheap'];
			$my_mark  = $rows[0]['my_mark'];
			$weight  = $rows[0]['weight'];
			$length  = $rows[0]['length'];
			$width  = $rows[0]['width'];
			$height  = $rows[0]['height'];
			$parent  = $rows[0]['parent'];
			$hide  = $rows[0]['hide'];
			$newphoto = $rows[0]['newphoto'];
			$addopt = $rows[0]['addopt'];
			$addseo = $rows[0]['addseo'];
			$ignore_margin = $rows[0]['importseo'];
			$updte  = $rows[0]['updte'];
			$pmanuf  = $rows[0]['pmanuf'];
			$upattr = $rows[0]['upattr'];
			$upopt = $rows[0]['upopt'];
			$upname = $rows[0]['upname'];
			$myplus = $rows[0]['myplus'];			
			$cprice = $rows[0]['cprice'];
			$minus = $rows[0]['minus'];
			$chcode = $rows[0]['chcode'];
			$sorder = $rows[0]['sorder'];
			$spec = $rows[0]['spec'];
			$upurl = $rows[0]['upurl'];
			$ref = $rows[0]['ref'];
			$ref1 = $rows[0]['ref1'];
			$store = $rows[0]['addattr'];
			$exsame = $rows[0]['exsame'];
			$parss = $rows[0]['parss'];
			$points = $rows[0]['points'];
			$places = $rows[0]['places'];
			$parsi = $rows[0]['parsi'];
			$pointi = $rows[0]['pointi'];
			$placei = $rows[0]['placei'];
			$parsc = $rows[0]['parsc'];
			$pointc = $rows[0]['pointc'];
			$placec = $rows[0]['placec'];
			$parsp = $rows[0]['parsp'];
			$pointp = $rows[0]['pointp'];			
			$placep = $rows[0]['placep'];
			$parsd = $rows[0]['parsd'];
			$pointd = $rows[0]['pointd'];
			$placed = $rows[0]['placed'];
			$parsm = $rows[0]['parsm'];
			$pointm = $rows[0]['pointm'];
			$placem = $rows[0]['placem'];
			$parsk = $rows[0]['parsk'];
			$parsq = $rows[0]['parsq'];
			$pointq = $rows[0]['pointq'];
			$placeq = $rows[0]['placeq'];
			$kmenu = $rows[0]['kmenu'];
			$bprice = $rows[0]['bprice'];
			$catcreate = $rows[0]['catcreate'];
			$stay	 = $rows[0]['stay'];
			$joen	 = $rows[0]['joen'];
			$off	 = $rows[0]['off'];
			$umanuf  = $rows[0]['umanuf'];
			$onn	 = $rows[0]['onn'];
			$refer  = $rows[0]['refer'];
			$disc  = $rows[0]['disc'];
			$upc  = $rows[0]['upc'];
			$ean  = $rows[0]['ean'];
			$mpn  = $rows[0]['mpn'];
			$newurl  = $rows[0]['newurl'];
			$ddata  = $rows[0]['ddata'];
			$bonus  = $rows[0]['bonus'];
			$ddesc  = $rows[0]['ddesc'];
			$qu_discount = $rows[0]['qu_discount'];
			$photo_desc  = $rows[0]['plusopt'];
			$idcat  = $rows[0]['idcat'];
			$termin  = $rows[0]['termin'];
			$t_status  = $rows[0]['t_status'];
			$t_ref  = $rows[0]['t_ref'];
			$t_ref1  = $rows[0]['t_ref1'];
			$onoff  = $rows[0]['onoff'];
			$main  = $rows[0]['main'];
			$zero  = $rows[0]['zero'];
			$day = gmmktime(0, 0, 0, gmdate('m'), gmdate('d'), gmdate('Y'));
			$dform = (int)gmdate('d', $day);
			$metka  = $rows[0]['metka'];
			$jpt  = $rows[0]['jopt'];
			$optsku  = $rows[0]['optsku'];
			$newproduct  = $rows[0]['newproduct'];			
			$upOptionFoto = $rows[0]['opt_fotos'];    // Включить фото в опциях
			$opt_prices  = $rows[0]['opt_prices'];    // Цена в опциях: 0-не пересчитывать, 1 - пересчитывать
			$usd         = $rows[0]['usd'];          // Для модуля Валюта плюс
			if (empty($usd)) $usd = 0;
			$sleep  = $rows[0]['sleep'];
			$ffile	= $rows[0]['ffile'];
			$serie	= $rows[0]['serie'];
			$rprice	= $rows[0]['rprice'];
			$subfolder	= $rows[0]['subfolder'];
			$delimiter	= $rows[0]['delimiter'];
			$skuprefix	= $rows[0]['skuprefix'];			
			
			$yml = 0;
			if ($ad == 11) $yml = 1;
			
			$la = $this->config->get('config_language_id');
			$catcreate = 0;
			$ddata = 0;
			$exsame = 0;
			$ks = -1;
			$summa_options = 0;
			$nozero_index = 0;
			$mas_nozero = array();
			$savei = 1;
			$jopt = 0;
			if ($ad == 5) $catcreate = 1;			
			if ($ad == 6) $ddata = 1;
			if ($ad == 7) $ddata = 2;
			if ($ad == 8) $exsame = 1;			
			
			$cod = $ccod;
			$item = $iitem;
			$cat = $ccat;
			$manuf = $mmanuf;
			$price = $pprice;
			$descrip = $ddescrip;
			$qu = $pqu;			
			$pic_ext = $ppic_ext;			
			
		$np = substr_count($rows[0]['pic_ext'], ",");				
		$np = $np + 1;
		$ns = substr_count($rows[0]['warranty'], ",");
		$ns = $ns + 1;	
			
		$rows  = $this->getSupplerData($form_id);

		if (empty($rows) and !$ddata) return 21;
		
		$cat_ext = array();
		$category_id = array();
		$pic_int = array();
		$cat_plus = array();
		$max = 0;
		foreach ($rows as $value) {
			$max++;
			$cat_ext[$max] = trim($value['cat_ext']);
			$category_id[$max] = $value['category_id'];
			$pic_int[$max] = trim($value['pic_int']);
			$cat_plus[$max] = trim($value['cat_plus']);
		}			
	
		$rows  = $this->getSupplerAttributes($form_id);
		
		$attr_point = array();
		$tags = array();
		$attr_ext = array();
		$attribute_id = array();
		$filter_group_id = array();
		$filters = array();
		$max_attr = 0;		
		if ($rows) {			
			foreach ($rows as $value) {
				$max_attr++;				
				$attr_ext[$max_attr] = $value['attr_ext'];
				$attr_point[$max_attr] = $value['attr_point'];
				$attribute_id[$max_attr] = $value['attribute_id'];
				$tags[$max_attr] = $value['tags'];
				$filter_group_id[$max_attr]= $value['filter_group_id'];
			}
		}		
		
		$langs = $this->getAllLanguages();
		
		$rows  = $this->getSupplerOptions($form_id);
	
		$option_id = array();
		$option_idd = array();
		$opt = array();
		$opt_point = array();
		$ko = array();
		$po = array();
		$prro = array();
		$we = array();
		$art = array();
		$foto = array();
		$option_required = array();
		$opt_pref = array();
		$opt_margin = array();
		$option_type = array();
		$max_opt = 0;		
		if ($rows) {			
			foreach ($rows as $value) {		
				$max_opt++;				
				$option_id[$max_opt] = $value['option_id'];
				$option_idd[$max_opt] = $value['option_id'];
				$opt[$max_opt] = $value['opt'];
				$opt_point[$max_opt] = $value['opt_point'];
				$ko[$max_opt] = $value['ko'];
				$po[$max_opt] = $value['po'];
				$prro[$max_opt] = $value['pr'];
				$we[$max_opt] = $value['we'];
				$art[$max_opt] = $value['art'];
				$foto[$max_opt] = $value['foto'];
				$option_required[$max_opt] = $value['option_required'];
				$opt_pref[$max_opt] = $value['opt_pref'];
				$opt_margin[$max_opt] = $value['opt_margin'];
				$row = $this->getOptionsType($value['option_id']);
				if (empty($row)) $row['type'] = 'select';
				$option_type[$max_opt] = $row['type'];				
			}	
		}

		$rows  = $this->getSupplerPrice($form_id);
	
		$nomkol = array();
		$ident = array();
		$mratek = array();
		$param = array();
		$point = array();
		$noprice = array();
		$paramnp = array();
		$pointnp = array();
		$baseprice = array();
		$nompoint = 1;
		$max_site = 0;
		if ($rows) {			
			foreach ($rows as $value) {								
				$nomkol[$max_site] = $value['nom'];
				$ident[$max_site] = $this->getName($value['ident']);
				$mratek[$max_site] = str_replace(',', '.', $value['mratek']);
				$param[$max_site] = $value['param'];
				$point[$max_site] = $value['point'];
				$noprice[$max_site] = $value['noprice'];
				$paramnp[$max_site] = $value['paramnp'];
				$pointnp[$max_site] = $value['pointnp'];
				$baseprice[$max_site] = $value['baseprice'];				
				$max_site++;
			}	
		}				
		
		if (!empty ($rate) and !preg_match('/^[0-9.,Ee+-]+$/', $rate)) return 7;
		if (empty ($rate)) $rate = 1;	
		$rate = str_replace(',','.',$rate);	
		if (!empty ($ratep) and !preg_match('/^[0-9.,Ee+-]+$/', $ratep)) return 7;
		if (empty ($ratep)) $ratep = 1;	
		$ratep = str_replace(',','.',$ratep);		
		if (empty ($cod)) return 8;
		if (empty ($item)) return 16;
		if (empty ($price)) return 19;	
		if (empty ($pic_ext) and empty ($parsk) and ($ad == 1 or $ad == 3)) return 13;
		if (!empty ($weight) and !preg_match('/^[0-9]+$/', $weight)) return 18;
		if ((!empty ($length) and !preg_match('/^[0-9]+$/', $length)) or
			(!empty ($width) and !preg_match('/^[0-9]+$/', $width)) or
			(!empty ($height) and !preg_match('/^[0-9]+$/', $height))) return 11;
		if (!empty ($related) and !preg_match('/^[0-9]+$/', $related)) return 12;
		if (!empty ($myplus) and !preg_match('/^[0-9]+$/', $myplus)) return 9;
		if ($optsku and empty($newproduct) and ($ad == 1 or $ad == 3)) return 28;
		if ($optsku and $joen > 2) return 29;
		if (empty($cat) and ($ad == 1 or $ad == 3)) return 30;			
		if (!empty($warranty) and !preg_match('/^[0-9,&lt;&gt;]+$/', $warranty)) return 15;
		if ((!empty($parss) and !preg_match('/^[0-9]+$/', $parss)) or 
			(!empty($parsi) and !preg_match('/^[0-9]+$/', $parsi)) or 
			(!empty($parsc) and !preg_match('/^[0-9]+$/', $parsc)) or
			(!empty($parsp) and !preg_match('/^[0-9]+$/', $parsp)) or
			(!empty($parsd) and !preg_match('/^[0-9]+$/', $parsd)) or
			(!empty($parsm) and !preg_match('/^[0-9]+$/', $parsm)) or
			(!empty($parsq) and !preg_match('/^[0-9]+$/', $parsq)) or
			(!empty($parsk) and !preg_match('/^[0-9]+$/', $parsk))) return 14;
				
		for ($i = 1; $i <= $max; $i++) {
			if (empty($category_id[$i]) and !$catcreate and $ad != 6 and $ad != 7) return 25;			
			if (empty($pic_int[$i]) and $ad != 6 and $ad != 7) return 22;
		}
		
		$file_sos    = "./uploads/sos.tmp"; 
		$was_timelimit = 0;
		if (!file_exists ($file_sos)) {
		
			$path = "./uploads/report.tmp";
			if (file_exists($path)) @unlink ($path);
		
			$path = "./uploads/errors.tmp";
			if (file_exists($path)) @unlink ($path);
			
			$path = "./uploads/ex.xml";
			if (file_exists($path)) @unlink ($path);
		} else $was_timelimit = 1;
		
		$file_total    = "./uploads/total.tmp"; 
		if (file_exists ($file_total)) {			
			$total = @fopen($file_total,'r+');
			$mmm = fgets($total, 100);
			$m = explode(" " , $mmm);	
			if (isset($m[0])) $total_add = (int)$m[0];
			else $total_add = 0;
			if (isset($m[1])) $total_up = (int)$m[1];
			else $total_up = 0;
			if (empty($total_add)) $total_add = 0;
			if (empty($total_up)) $total_up = 0;
			@fclose($total);
		} else {
			$total = @fopen($file_total,'w+');
			if (!$total) { @fclose($total); return;}
			chmod($file_total, 0777);
			$total_add = 0;
			$total_up = 0;
		}
		
		$row = array();
		$old_sku = 'FF30884Rjklr07754';			
		$oldprice = 0;
		$firstprice = 0;
		$old_product_id = 0;
		$same_column = 0;
		$semicolon = 0;
		$was_timelimit = 0;

		$was_timelimit = 0;
		$file_sos    = "./uploads/sos.tmp"; 
		if (file_exists ($file_sos)) {			
			$sos = @fopen($file_sos,'r+');
			$mmm = fgets($sos, 100);
			$m = explode(" " , $mmm);	
			$row_count = (int)$m[0];
			if ($row_count) $was_timelimit = 1;
			$old_sku = '';
			if (isset($m[1])) $old_sku = $m[1];
			if (empty($row_count)) $row_count = 0;
			@fclose($sos);
		} else {
			$sos = @fopen($file_sos,'w+');
			if (!$sos) { @fclose($sos); return 5;}
			chmod($file_sos, 0777);
			$row_count = 0;		
		}
		
		$except = 0;
		$path = "./uploads/exception.xml";
		if (file_exists($path)) {
			$except = 1;
			$file_con  = "./uploads/exception.xml"; 
			$con = @fopen($file_con,'r');			
			if (!$con) return 25;
						
			$st = '';
			$nex = 0;			
			$masex = array();	
			while (!feof($con)) {		
				while (!@feof($con) and !substr_count($st, "<Row")){
					$st = @fgets($con, 65534);
				}	
				if (@feof($con)) break;					
				
				$m = '';
				while (1) {						
					$st = @fgets($con, 65534);
					$m = $m.$st;
					if (@feof($con)) break;				
					if (substr_count($st, "</Row>"))  break;		
					if (substr_count($st, "<Cell") and substr_count($st, "</Cell")) break;	
										
					$st = @fgets($con, 65534);
					$m = $m.$st;
					if (@feof($con)) break;				
					if (substr_count($st, "</Row>"))  break;
					if (substr_count($st, "</Cell"))  break;
				}
				$posb = stripos($m, "String");
				if (!$posb) $posb = stripos($m, "Number");
					
				if (!$posb) break;
				$posb = $posb;
				$posb = stripos($m, ">", $posb)+1;
				$pose = stripos($m, "</Data", $posb);
				if (!$pose) $pose = stripos($m, "</ss:Data", $posb);
		
				if ($pose > $posb) {						
					$len = $pose - $posb;
					$m = substr($m, $posb, $len);
					$masex[$nex] = $m;
					$nex++;		
				}			
			}
			@fclose($con);		
		}

		$change_attribute = 0;
		$path = "./uploads/attribute.xml";
		if (file_exists($path)) {
			$change_attribute = 1;
			$file_con  = "./uploads/attribute.xml"; 
			$con = @fopen($file_con,'r');			
			if ($con) {
				$st = '';			
				$k = -1;
				while (!feof($con)) {
					$k++;
					while (!@feof($con) and !substr_count($st, "<Row")) {
						$st = @fgets($con, 65534);
					}	
					if (@feof($con)) break;

					for ($j=1; $j<2003; $j++) { $row[$j] = NULL;}	
					$i = -1;
					$br = 0;
					$ext = 1;			
					while ($ext) {			
						$st = @fgets($con, 65534);
						if (@feof($con)) break;				
						if (substr_count($st, "</Row>"))  break;
								
						if (!substr_count($st, "<Cell")) {
				
							if (substr_count($st, "</Data")) $pose = strpos($st, "</Data"); 
								else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data"); 
										else $pose = strlen($st) - 1;
							if ($pose and $br) $row[$i] = $row[$i].preg_replace('| +|', ' ', substr($st, 0, $pose));					
							continue;
					
						} else {					
							$i++;
							$p = strpos($st, "Index=");
							if ($p != 0) {							
								$pe = strpos($st, '"', $p+7);
								$ii = substr ($st, $p+7, $pe-$p-7)-1;
								if ($ii>$i) {
									for ($ll=$i; $ll<$ii; $ll++) {
										$masatt[$k][$ll] = '';
									}
									$i = $ii;
								}	
							}					
							$br = 0;
						$a = ">";
						$posb1 = strpos($st, "String");
						if ($posb1 === false) $posb1 = 999;
						$posb2 = strpos($st, "Number");
						if ($posb2 === false) $posb2 = 999;													
						$posb3 = strpos($st, "HRef=");
						if ($posb3 === false) $posb3 = 999;
						$posb4 = strpos($st, "Boolean");
						if ($posb4 === false) $posb4 = 999;
							
						if ($posb1 < $posb2) $posb = $posb1;
						else $posb = $posb2;
						if ($posb4 < $posb) $posb = $posb4;
							
						if ($posb3 < $posb) {
							$posb = $posb3;
							$a = '"';						
						}	
							if ($posb != 999)	{					
								$posb = strpos($st, $a , $posb) +1;
								if ($posb < 0) continue;
								$pose = 0;
								if ($a != '"') {						
									if (substr_count($st, "</Data")) $pose = strpos($st, "</Data", $posb); 
									else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data", $posb); 
								} else $pose = strpos($st, $a, $posb); 
								if (!$pose) {
									$br = 1;
									$row[$i] = substr($st, $posb);
									continue;
								}	
								if ($pose and $pose > $posb) {						
									$len = $pose - $posb;
									$row[$i] = substr($st, $posb, $len);		
								} 
							} else continue;
						}
						$masatt[$k][$i] = $row[$i];		
					}		
				}
				@fclose($con);
			}
		}	

		if ($exsame) {
			$path = "./uploads/ex.xml";			
			if (!file_exists($path)) {
				$file_ex    = "./uploads/ex.xml";					
				$ex = @fopen($file_ex,'w+');			
				if (!$ex) return 3;
				$this->StartEx($ex);			
				
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="100"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="400"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="400"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
				$st = ' <Column ss:AutoFitWidth="0" ss:Width="80"/>'."\n";
				@fputs($ex, $st);
	
				$st = '<Row>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product in Store</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Product in Price-list</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Main SKU in Store</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">SKU in Price-list</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name in Store</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Name in Price-list</Data></Cell>'."\n";
				@fputs($ex, $st);			
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price in Store</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = ' <Cell ss:StyleID="s20"><Data ss:Type="String">Price in Price-list</Data></Cell>'."\n";
				@fputs($ex, $st);
				$st = '</Row>'."\n";
				@fputs($ex, $st);
				@fclose($ex);
			} else {				
				$file_ex  = "./uploads/ex.xml";		
				$ex = @fopen($file_ex,'r+');					
				$offcet = 0;
				$seek = 0;
				while (!@feof($ex)) {						
					$st = @fgets($ex, 2048);
					$offcet = $offcet + strlen($st);
					if (substr_count($st, "<Row")) $seek = $offcet - strlen($st);
				}
				ftruncate($ex, $seek);	
				@fclose($ex);				
			}	
		}
		$table_sku = 1;
	//	$table_sku = $this->getTable();
	
		if (!@rewind($file_xml)) return 3;
	
		if ($row_count) {
			$i = 0;
			if ($file_extension == '.csv' or $file_extension == '.CSV') {
				while (!@feof($file_xml) and ($i < $row_count)) {
					$st = @fgetcsv($file_xml, 65534, $delimiter);
					$i++;
				}	
			} else {	
				while (!@feof($file_xml) and ($i < $row_count)) {
					$st = @fgets($file_xml, 65534);
					if (substr_count($st, "<Row")) $i++; 
				}
			}	
		}

		if (@feof($file_xml) and ($row_count > 0)) return 6;
		if (@feof($file_xml) and ($row_count = 0)) return 17;
	
		while (!feof($file_xml)) {
			for ($j=1; $j<2048; $j++) { $row[$j] = NULL;}
			
			if ($file_extension == '.csv' or $file_extension == '.CSV') {
				$data = @fgetcsv($file_xml, 65534, $delimiter);
				if (@feof($file_xml)) break;
				$num = count($data);
				for ($c=0; $c < $num; $c++) {
					$row[$c+1] = $data[$c];
				}
			} else {
				while (!@feof($file_xml) and !substr_count($st, "<Row")) {
					$st = @fgets($file_xml, 65534);
				}	
				if (@feof($file_xml)) break;
				
				$i = 0;
				$br = 0;
				$ext = 1;
				
				while ($ext) {			
					$st = @fgets($file_xml, 65534);
					if (@feof($file_xml)) break;
					if (substr_count($st, "</Row>"))  break;
								
					if (!substr_count($st, "<Cell")) {
				
						if (substr_count($st, "</Data")) $pose = strpos($st, "</Data"); 
							else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data"); 
									else $pose = strlen($st) - 1;
						if ($pose and $br) $row[$i] = $row[$i].preg_replace('| +|', ' ', substr($st, 0, $pose));					
						continue;
					
					} else {					
						$p = strpos($st, "Index=");
						if ($p != 0) {
							$pe = strpos($st, '"', $p+7);
							$i = substr ($st, $p+7, $pe-$p-7) + 0;
						} else $i ++;
					
						$br = 0;
						$a = ">";
						$posb1 = strpos($st, "String");
						if ($posb1 === false) $posb1 = 999;
						$posb2 = strpos($st, "Number");
						if ($posb2 === false) $posb2 = 999;													
						$posb3 = strpos($st, "HRef=");
						if ($posb3 === false) $posb3 = 999;
						$posb4 = strpos($st, "Boolean");
						if ($posb4 === false) $posb4 = 999;
							
						if ($posb1 < $posb2) $posb = $posb1;
						else $posb = $posb2;
						if ($posb4 < $posb) $posb = $posb4;
							
						if ($posb3 < $posb) {
							$posb = $posb3;
							$a = '"';						
						}	
						if ($posb != 999)	{					
							$posb = strpos($st, $a , $posb) +1;
							if ($posb < 0) continue;
							$pose = 0;
							if ($a != '"') {						
								if (substr_count($st, "</Data")) $pose = strpos($st, "</Data", $posb); 
								else if (substr_count($st, "</ss:Data")) $pose = strpos($st, "</ss:Data", $posb); 
							} else $pose = strpos($st, $a, $posb); 
							if (!$pose) {
								$br = 1;
								$row[$i] = substr($st, $posb);
								continue;
							}	
							if ($pose and $pose > $posb) {						
								$len = $pose - $posb;
								$row[$i] = substr($st, $posb, $len);		
							} 
						} else continue;
					}
				}
			}			
	
			$pname = "";
			$ht = "";
			$flag_add_up = 0;
			$parsed = "";
			$cod = $ccod;
			$item = $iitem;
			$cat = $ccat;
			$manuf = $mmanuf;
			$price = $pprice;
			$descrip = $ddescrip;
			$qu = $pqu;			
			$pic_ext = $ppic_ext;			
			
			if ($cheap and $ad != 2 and empty($bprice) and !$ddata and !$catcreate) {				
				$err = " Please, set the column number, containing the purchase price in price-list" . "\n";
				$this->adderr($err);					
				continue;
			}
			if (!empty($bprice) and !$ddata) {   // указана колонка, а цены закупки нет
				if (empty($row[$bprice])) {
					$row_count = (int)$this->putsos($row_count, 1);
					if ($row_count < 0) return 5;
					$err = " The Product passed: Row ~= " . $row_count . " Purchase price not found in price-list in column: " . $bprice . "\n";
					$this->adderr($err);
					continue;
				}
			}
			if (!preg_match('/^[0-9]+$/', $cod) and !empty($cod) and !$catcreate) {
				if (empty($row[$parss])) {
					$row_count = (int)$this->putsos($row_count, 1);
					if ($row_count < 0) return 5;
					$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parss."\n";
					$this->adderr($err);					
					continue;
				}
				$url = $this->checkurl($row[$parss]);
				if ($url == -1) {
					$err = " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parss]. " in column = ".$parss."\n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, 1);
					if ($row_count < 0) return 5;
					continue;
				}
				
				$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
				if (strlen($ht) > 2048)  $parsed = $parss;
				else {
					$parsed = '';
					$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, 1);
					if ($row_count < 0) return 5;
					continue;
				}
	
				$in = $this->ParsCode($ht, $ccod, $points, $places);
				
				if (empty($in) or strlen($in) > 64) {
					$err = " The Product passed: Row ~= " . $row_count . " parsing sku fail, sku = " . $in . " \n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, 1);
					if ($row_count < 0) return 5;
					continue;
				}
				$cod = 'cod';				
				$row[$cod] = $in;
			}
	/***********************/			
			if (!preg_match('/^[0-9,]+$/', $cat) and !empty($cat) and !$catcreate) {
				if (empty($row[$parsc])) {
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parsc."\n";
					$this->adderr($err);						
					continue;
				}
				$url = $this->checkurl($row[$parsc]);
				if ($url == -1) {
					$err =  " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parsc]. " in column = ".$parsc."\n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					continue;
				}
				if (strlen($ht) < 1024 or $parsed != $parsc) {
					$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
					if (strlen($ht) > 2048) $parsed = $parsc;
					else {
						$parsed = '';
						$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						continue;
					}	
				}
				$in = $this->ParsCategory($ht, $ccat, $pointc, $placec);
					
				if (empty($in) or strlen($in) > 100 or strlen($in) < 2) {
					$err = " The Product passed: Row ~= " . $row_count . " parsing product category fail, category = ". $this->symbol($in) . " \n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					$cat = 'cat';
					$row[$cat] = '';
				} else {
					$cat = 'cat';
					$row[$cat] = $in;
				}	
			}	
		/**************/
			$price_parsed = 0;
			if (!preg_match('/^[0-9,()=]+$/', $price) and !empty($price) and !$catcreate) {
				if (empty($row[$parsp])) {
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parsp."\n";
					$this->adderr($err);					
					continue;
				}
				$url = $this->checkurl($row[$parsp]);
				if ($url == -1) {
					$err = " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parsp]. " in column = ".$parsp."\n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					continue;
				}
				if (strlen($ht) < 1024 or $parsed != $parsp) {
					$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);					
					if (strlen($ht) > 2048) $parsed = $parsp;
					else {
						$parsed = '';
						$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						continue;
					}						
				}
				
				$in = $this->ParsPrice($ht, $pprice, $pointp, $placep);

				if (empty($in) or strlen($in) > 40 or !preg_match('/^[0-9,.]+$/', $in)) {
					$err = " The Product passed: Row ~= " . $row_count . " parsing product price fail, price = " . $in . " \n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					continue;
				}
				$price = 'price';
				$row[$price] = $in;
				$price_parsed = 1;				
				
			}
			/**************/
			if (!preg_match('/^[0-9,]+$/', $qu) and !empty($qu) and !$ddata and !$catcreate) {
				if (empty($row[$parsq])) {
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parsq."\n";
					$this->adderr($err);					
					continue;
				}
				$url = $this->checkurl($row[$parsq]);
				if ($url == -1) {
					$err = " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parsq]. " in column = ".$parsq."\n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;
					continue;
				}
				if (strlen($ht) < 1024 or $parsed != $parsq) {
					$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);					
					if (strlen($ht) > 2048) $parsed = $parsq;
					else {
						$parsed = '';
						$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						continue;
					}						
				}
				
				$in = $this->ParsQu($ht, $pqu, $pointq, $placeq);

				if ($in == '' or strlen($in) > 60) {
					$err = " The Product passed: Row ~= " . $row_count . " parsing product quantity fail, quantity = " . $in . " \n";
					$this->adderr($err);
					$row_count = (int)$this->putsos($row_count, $row[$cod]);
					if ($row_count < 0) return 5;					
				}
				$qu = 'qu';
				$row[$qu] = $in;
			}
			
			if (empty($row[$cod]) and empty($row[$sku2]) and !$catcreate and !$ddata and !$yml) {
				$row_count = (int)$this->putsos($row_count, 1);
				$err = " The Product passed: Row ~= " . $row_count . " SKU not found in price-list \n";
				$this->adderr($err);
				continue;				
			}
			
			if (!empty($skuprefix)) {
				if (!empty($row[$cod])) $row[$cod] = $skuprefix.$row[$cod];
				if (!empty($row[$sku2])) $row[$sku2] = $skuprefix.$row[$sku2];
			}	
		
			//  Форматирование текста в описании, можно закоментировать ненужное:	
			if (preg_match('/^[0-9,]+$/', $descrip) and !$ddata and !$catcreate) {
				$dd = explode(",", $descrip);
				$d = '';
				for ($j=0; $j<20; $j++) {
					if (!isset($dd[$j])) break;
					if (!empty($row[$dd[$j]])) $d = $d . $row[$dd[$j]] . "<br />";
				}
				if (!empty($d)) $d = substr($d, 0, strlen($d)-6);
				$descrip = 'descrip';
				$row[$descrip] = $d;
				$row[$descrip] = $this->symbol($row[$descrip]);
				$row[$descrip] = str_replace('&quot;', '"', $row[$descrip]);
	
				//   Delete all tags html 
				//  $row[$descrip]  = strip_tags($row[$descrip]);
						
				$url = 'http://mysite.com/aaaaa';	// пусть так и будет		
		//		$row[$descrip] = strip_tags($row[$descrip], '<u><a><span><h1><h2><h3><h4><ol><img><p><em><i><br><li><ul><tbody><table><tr><td><dd><dt><b><strong><iframe>');
				if (substr_count($row[$descrip], "<img") and $photo_desc) $this->descImage($row[$descrip], $row_count, $url, $sleep, $ffile);	
				
				$row[$descrip] = str_replace('&#10;&#10;', '<br /><br />', $row[$descrip]);
				$row[$descrip] = str_replace('&amp;#10;&amp;#10;', '<br /><br />', $row[$descrip]); 
				$row[$descrip] = str_replace('&#10;', '<br />', $row[$descrip]);
				$row[$descrip] = str_replace('&amp;#10;', '<br />', $row[$descrip]);				
				$row[$descrip] = str_replace('<p></p>', '', $row[$descrip]);
				$row[$descrip] = str_replace('<p> </p>', '', $row[$descrip]);				
				$row[$descrip] = str_replace('<p>&nbsp;</p>', '', $row[$descrip]);
				$row[$descrip] = str_replace('Size="8"', 'size="0"', $row[$descrip]);
				$row[$descrip] = str_replace('Size="9"', 'size="0"', $row[$descrip]);
				$row[$descrip] = str_replace('Size="10"', 'size="2"', $row[$descrip]);
				$row[$descrip] = str_replace('Size="11"', 'size="3"', $row[$descrip]);
				$row[$descrip] = str_replace('Size="12"', 'size="3"', $row[$descrip]);
				$row[$descrip] = str_replace("\r", '', $row[$descrip]);
				$row[$descrip] = str_replace("\n", '', $row[$descrip]);
								
						
				// Разделить текст на строки
				//	$row[$descrip] = str_replace('. ', '.<br />', $row[$descrip]);
				//	$row[$descrip] = str_replace('! ', '!<br />', $row[$descrip]);
					
				// Удалить из описания слово "Описание"
				//	$row[$descrip] = str_replace('Описание', '', $row[$descrip]);
				//	$row[$descrip] = str_replace('Description', '', $row[$descrip]);
			
			}
	
			$report = '';
			$row_count = (int)$this->putsos($row_count, $row[$cod]);
			if ($row_count < 0) return 5;
			
			$mprice = array();		
			$aprice = array();
			if (preg_match('/^[0-9,]+$/', $spec)) {				
				$aprice = explode("," , $spec);				
			}
		
			if (!preg_match('/[^0-9,()=]+$/', $price)) {				
				$mprice = explode("," , $price);
				$price = $mprice[0];					
			}
			
			$c = count($aprice);
			if ($c and is_numeric($price)) {
				for ($j=0; $j<$c; $j++) {
					if (!empty($aprice[$j])) {
						$ap = $aprice[$j];
						break;
					}
				}	
				if (empty($row[$price]) and !empty($row[$ap])) $price = $ap;
				if (!empty($row[$price]) and !empty($row[$ap]) and $row[$ap] > $row[$price]) {
					$c = $row[$price];
					$row[$price] = $row[$ap];
					$row[$ap] = $c;
				}	
			}
			
			if (isset($row[$price]) and !empty($row[$price]) and preg_match('/[()*:<>=]/', $row[$price]) and $ad != 2 and $ad != 12 and $ad != 13 and !$catcreate and !$yml and $row[$cod] != "end") {
				$err = " The Product passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Cell 'price' contains a formula or illegal text". "\n";
				$this->adderr($err);
				continue;
			}
			$rrc = 0;
			if (!empty($row[$rprice])) {
				$row[$price] = $this->convertPrice($row[$rprice]);
				$rrc = 1;				
			} elseif (!empty($row[$price])) $row[$price] = $this->convertPrice($row[$price]);								
						
			if (empty($row[$price]) and $ad != 2 and $ad != 12 and $ad != 13 and !$catcreate and !$yml and $row[$cod] != "end") {
				$err = " The Product passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Invalid price. Column = " . $price . "\n";
				$this->adderr($err);
				continue;
			}
			
			if ($except) {
				if ($this->checkException($row[$cod], $masex, $nex)) continue;					
			}
			
			if ($ddata) {
				if (!empty($cat)) {
					if (substr_count($cat, ",")) {
						$cats = explode(",", $cat);
						$cat = $cats[0];
					}
					if (!empty($row[$cat])) {
						$pic_int = '';
						$cat_plus = '';
						$category_id = 0;
						$name = $this->getName($row[$cat]);
						if (empty($name)) continue;
						$rows = $this->getCategoryIDbyName1($name, $store);
						if (!empty($rows)) $category_id = $rows[0]['category_id'];

						if ($ddata == 2 and !empty($name)) {
							$app = $this->TransLit($name);
							$app = strtolower($app);
							$nom = strlen($app);
							if ($nom > 20) $app = substr($app, 0, 20);
							if ($nom < 2) $app = rand(0, 999999999);
							$app = $app . "-folder";
							$app = $this->MetaURL($app);
							$path = "../image/data/" .$app."/";	
							if (!is_dir($path)) @mkdir($path, 0755);
							$pic_int = $app;
						}

						$rows = $this->getDataForm($name, $form_id);
						if (empty($rows)) {	
							$this->db->query("INSERT INTO " . DB_PREFIX . "suppler_data SET `form_id` = '" . (int)$form_id . "', `cat_ext` = '" . $this->db->escape($name) . "', `category_id` = '" . $category_id . "', `pic_int` = '" . $pic_int . "', `cat_plus` = '" . $cat_plus . "'");
						} else {
							$nom_id = $rows[0]['nom_id'];
							if ($category_id)
								$this->db->query("UPDATE " . DB_PREFIX . "suppler_data SET `category_id` = '" . $category_id . "' WHERE `nom_id` = '" . (int)$nom_id . "'");
							if ($ddata == 2 and empty($rows[0]['pic_int']))
								$this->db->query("UPDATE " . DB_PREFIX . "suppler_data SET `pic_int` = '" . $pic_int . "' WHERE `nom_id` = '" . (int)$nom_id . "'");
						}				
					} else {
						$err = " Category missing: Row ~= " . $row_count . " SKU = " . $row[$cod] . " \n";
						$this->adderr($err);
					}
				}	
				continue;
			}
			
			$flag = 0;
			$i = 1;
			$text_cat = "";
			$catmany = array();
			$refers = array();
			$catdescs = array();
			$caturls = array();
			$catmd = array();
			$catmk = array();
			$catmt = array();
			$catmh = array();
			if (isset($catmany)) unset($catmany);
			for ($l=0; $l<100; $l++) {
				$catmany[$l] = NULL;
				$refers[$l] = NULL;
				$catdescs[$l] = NULL;
				$caturls[$l] = NULL;
				$catmd[$l] = NULL;
				$catmk[$l] = NULL;
				$catmt[$l] = NULL;
				$catmh[$l] = NULL;
			}
			$cats = explode(",", $cat);
			if (isset($cats[0]) and preg_match('/^[0-9]+$/', $cats[0])) {
				$cat = $cats[0];
				$j = 0;
				foreach ($cats as $c) {
					if (!empty($c) and preg_match('/^[0-9]+$/', $c) and isset($row[$c])) {
						$row[$c] = trim($row[$c]);
						if (!empty($row[$c])) {
							$catmany[$j] = $this->getName($row[$c]);
							if (isset($row[$c+33])) $refers[$j] = trim($row[$c+33]);
							if (isset($row[$c+53])) $catdescs[$j] = trim($row[$c+53]);
							if (isset($row[$c+73])) $caturls[$j] = trim($row[$c+73]);
							if (isset($row[$c+93])) $catmd[$j] = trim($row[$c+93]);
							if (isset($row[$c+113])) $catmk[$j] = trim($row[$c+113]);
							if (isset($row[$c+133])) $catmt[$j] = trim($row[$c+133]);
							if (isset($row[$c+153])) $catmh[$j] = trim($row[$c+153]);
							$j++;
						}	
					}	
				}
			}
	
			if (!empty($row[$cat])) {
				$text_cat = $this->getName($row[$cat]);
				if (!$idcat) {
					for ($i=1; $i<=$max; $i++) {
						if (strtolower($text_cat) == strtolower($this->getName($cat_ext[$i]))) {
							$savei = $i;
							$flag = 1;
							break;
						}
					}
				} else {
					for ($i=1; $i<=$max; $i++) {
						if ($category_id[$i] == (int)$row[$cat]) {
							$savei = $i;
							$flag = 1;
							break;
						}
					}
				}	
			}
			
			if ($yml and !$flag) $i = $savei;

			if (!$flag and ($parent == 4 or $parent == 6) and $row[$cod] != "end") {
				$err = " The Product passed: Row ~= " . $row_count . " Category " . $this->symbol($text_cat) . " not found on page 'Category and margin' \n";
				$this->adderr($err);
				continue;				
			}
			
			if ($catcreate) {
				$row_product[0]['date_added'] = date('Y-m-d H:i:s');				
				$this->putNewProduct($row_product, 0, $a, 1, 1, $langs, 1, 1, 0, $catmany, $catcreate, $catdescs, $caturls, $catmd, $catmk, $catmt, $catmh, $newurl, $refers, $seo_data, $store, 0, 0, 0, 0, 0, $usd);				
				continue;
			}
			
			if ($joen == 4 and empty($my_manuf) and (!isset($row[$manuf]) or empty($row[$manuf])) and $row[$cod] != "end") {
				$err = " The Product passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Manufacturer not found in column ". $manuf . "\n";
				$this->adderr($err);
				continue;
			}
			
			if ($joen == 4) {
				$manuf_id = 0;
				if (isset($row[$manuf]) and !empty ($row[$manuf])) {
					$name = $this->getName($row[$manuf]);
					$rows  = $this->getManufacturerID($name, $store);
					if (!empty($rows)) $manuf_id = $rows[0]['manufacturer_id'];				
				} else {
					if ($my_manuf) $manuf_id = $my_manuf;				
				}
			}
			
			if (!empty($cod)) $row[$cod] = trim($row[$cod]);
			if (!empty($sku2)) $row[$sku2] = trim($row[$sku2]);
	
			$rows = '';
			$sku = '';
			$o_optsku = '';
			if ($yml and empty($row[$cod]) and $old_sku != 'FF30884Rjklr07754') $row[$cod] = $old_sku;
			if ($optsku) {
				if (!empty($row[$cod])) {					
					$o_optsku = $row[$cod];							
					$rows  = $this->getOptionSKU($o_optsku);					
					if (!empty($rows)) {					
						$product_id = $rows[0]['product_id'];						
						$o_option_id = $rows[0]['option_id'];
						$o_option_value_id = $rows[0]['option_value_id'];
						$rows  = $this->getProductsByID($product_id);						
						if (!empty($rows)) $sku = $rows[0]['sku'];					
					} else {
						$rows  = $this->getProductBySKU($o_optsku, $store);
						if (!empty($rows)) $sku = $rows[0]['sku'];									
					}	
					if (!$sku and !empty($row[$newproduct])) {
						$sku = $old_sku;
						if (!empty($table_sku)) {
							$rows = $this->getProduct($sku, $store);
							if (!empty($rows)) $sku = $rows[0]['sku'];
						} else {
							$rows  = $this->getProductBySKU($sku, $store);							
						}	
					}
					if (($old_sku == 'FF30884Rjklr07754' and !$sku) or (!$sku and empty($row[$newproduct]))) {
						if (!empty($table_sku)) {
							$rows = $this->getProduct($o_optsku, $store);
							if (!empty($rows)) $sku = $rows[0]['sku'];
						} else {
							$rows  = $this->getProductBySKU($o_optsku, $store);
							if (!empty($rows)) $sku = $o_optsku;
						}	
					}					
				}	
			}
			if (empty($sku)) {
				if (!empty($row[$cod])) {					
					if (!empty($table_sku)) {
						$rows = $this->getProduct($row[$cod], $store);
						if (!empty($rows)) {
							if ($joen == 3) {
								$yes = 0;
								for ($l=0; $l<900; $l++) {
									if (!isset($rows[$l]['product_id'])) break;
									$p = strrpos($rows[$l]['model'], "-");
									if (!$p) $p = strrpos($rows[$l]['model'], "~");
									$nom = substr($rows[$l]['model'], $p+1, 2);							
									if ((int)$id == (int)$nom) { $yes = 1; break; }							
								}	
								if ($yes) {
									$product_id = $rows[$l]['product_id'];
									$rows  = $this->getProductsByID($product_id);
									if (!empty($rows)) $sku = $rows[0]['sku'];
								} else $rows = '';
							} else {
								if ($joen == 4 and $manuf_id) {
									$yes = 0;
									for ($l=0; $l<900; $l++) {
										if (!isset($rows[$l]['product_id'])) break;
										if ($rows[$l]['manufacturer_id'] == $manuf_id) { $yes = 1; break; }
									}	
									if ($yes) {
										$product_id = $rows[$l]['product_id'];
										$rows  = $this->getProductsByID($product_id);
										if (!empty($rows)) $sku = $rows[0]['sku'];
									} else $rows = '';	
								} else if (!empty($rows)) $sku = $rows[0]['sku'];
							}
						}	
					} else {
						$rows  = $this->getProductBySKU($row[$cod], $store);
						if (!empty($rows)) {
							if ($joen == 3) {
								$yes = 0;
								for ($l=0; $l<900; $l++) {
									if (!isset($rows[$l]['product_id'])) break;
									$p = strrpos($rows[$l]['model'], "-");
									if (!$p) $p = strrpos($rows[$l]['model'], "~");
									$nom = substr($rows[$l]['model'], $p+1, 2);							
									if ((int)$id == (int)$nom) { $yes = 1; break; }							
								}	
								if ($yes) {
									$product_id = $rows[$l]['product_id'];
									$rows  = $this->getProductsByID($product_id);
									if (!empty($rows)) $sku = $rows[0]['sku'];
								} else $rows = '';
							} else {
								if ($joen == 4 and $manuf_id) {
									$yes = 0;
									for ($l=0; $l<900; $l++) {
										if (!isset($rows[$l]['product_id'])) break;
										if ($rows[$l]['manufacturer_id'] == $manuf_id) { $yes = 1; break; }
									}	
									if ($yes) {
										$product_id = $rows[$l]['product_id'];
										$rows  = $this->getProductsByID($product_id);
										if (!empty($rows)) $sku = $rows[0]['sku'];
									} else $rows = '';	
								} else $sku = $row[$cod];
							}	
						}	
					}
				}	
				if (!empty($row[$sku2])) {
					if (empty($rows)) {
						if (!empty($table_sku)) {
							$rows = $this->getProduct($row[$sku2], $store);
							if (!empty($rows)) {
								if ($joen == 3) {
									$yes = 0;
									for ($l=0; $l<900; $l++) {
										if (!isset($rows[$l]['product_id'])) break;
										$p = strrpos($rows[$l]['model'], "-");
										if (!$p) $p = strrpos($rows[$l]['model'], "~");
										$nom = substr($rows[$l]['model'], $p+1, 2);							
										if ((int)$id == (int)$nom) { $yes = 1; break; }							
									}	
									if ($yes) {
										$product_id = $rows[$l]['product_id'];
										$rows  = $this->getProductsByID($product_id);
										if (!empty($rows)) $sku = $rows[0]['sku'];
									} else $rows = '';								
								} else {
									if ($joen == 4 and $manuf_id) {
										$yes = 0;
										for ($l=0; $l<900; $l++) {
											if (!isset($rows[$l]['product_id'])) break;
											if ($rows[$l]['manufacturer_id'] == $manuf_id) { $yes = 1; break; }
										}	
										if ($yes) {
											$product_id = $rows[$l]['product_id'];
											$rows  = $this->getProductsByID($product_id);
											if (!empty($rows)) $sku = $rows[0]['sku'];
										} else $rows = '';	
									} else if (!empty($rows)) $sku =  $rows[0]['sku'];
								}
							}	
						} else {
							$rows  = $this->getProductBySKU($row[$sku2], $store);
							if (!empty($rows)) {
								if ($joen == 3) {
									$yes = 0;
									for ($l=0; $l<900; $l++) {
										if (!isset($rows[$l]['product_id'])) break;
										$p = strrpos($rows[$l]['model'], "-");
										if (!$p) $p = strrpos($rows[$l]['model'], "~");
										$nom = substr($rows[$l]['model'], $p+1, 2);							
										if ((int)$id == (int)$nom) { $yes = 1; break; }							
									}	
									if ($yes) {
										$product_id = $rows[$l]['product_id'];
										$rows  = $this->getProductsByID($product_id);
										if (!empty($rows)) $sku = $rows[0]['sku'];
									} else $rows = '';
								} else {
									if ($joen == 4 and $manuf_id) {
										$yes = 0;
										for ($l=0; $l<900; $l++) {
											if (!isset($rows[$l]['product_id'])) break;
											if ($rows[$l]['manufacturer_id'] == $manuf_id) { $yes = 1; break; }
										}	
										if ($yes) {
											$product_id = $rows[$l]['product_id'];
											$rows  = $this->getProductsByID($product_id);
											if (!empty($rows)) $sku = $rows[0]['sku'];
										} else $rows = '';	
									} else $sku = $row[$sku2];
								}	
							}	
						}	
					} else {
						if ($joen == 1) {
							$row1 = '';
							if (!empty($row[$cod])) $row1 = $this->getskuDescription($row[$cod], $store);
							if (!empty($row1)) $this->addSkuToTable($row[$sku2], $row1['sku_id'], $store);
							else {
								if (!empty($row[$cod])) {								
									$last_sku_id = 0;
									$this->addSkuToTable($row[$cod], $last_sku_id, $store);			
									$this->putsku($rows[0]['product_id'], $last_sku_id);
									$this->addSkuToTable($row[$sku2], $last_sku_id, $store);
									$sku = $rows[0]['sku'];
								}
							}					
						}					
					}					
				}
			}
			
			if (!empty($rows) and !empty($sku) and !empty($row[$sku2]) and $stay) $rows[0]['sku'] = $row[$sku2];
				
			if (!empty($row[$cod]) and (!empty($sku) or (empty($sku) and substr_count($row[$cod], "end"))) and $old_sku != $sku and $old_sku != 'FF30884Rjklr07754' and $max_opt and ($upopt or $yml))	{	
				if ($old_product_id) {
					$final_price =  0;				
					$f = 0;
					$rows1 = $this->getProductAllOptionValue($old_product_id);
					if (!$optsku and !$semicolon) {
						if (!empty($rows1)) {
							for ($j=0; $j<=900; $j++) {
								if (!isset($rows1[$j]['price'])) break;	
								for ($l=0; $l<=900; $l++) {
									if (!isset($rows1[$l]['price'])) break;
									if ($j != $l and $rows1[$j]['option_id'] == $rows1[$l]['option_id'] and 
										$rows1[$j]['option_value_id'] == $rows1[$l]['option_value_id'] and
										$rows1[$j]['option_value_id'] != 'del' and $rows1[$l]['option_value_id'] != 'del') {		
										if ($rows1[$j]['quantity'] >= $rows1[$l]['quantity']) {
											$product_option_value_id = $rows1[$l]['product_option_value_id'];
											$rows1[$l]['option_value_id'] = 'del';
										} else {
											$product_option_value_id = $rows1[$j]['product_option_value_id'];
											$rows1[$j]['option_value_id'] = 'del';
										}	
										
										$f++;		
										$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_option_value_id = '" . $product_option_value_id . "'");
										
									}
								}
								
							}
						}
					}
					if ($f) $rows1 = $this->getProductAllOptionValue($old_product_id);	
					if (!empty($rows1)) {	
						if ($upopt == 2 and isset($mas_nozero) and $nozero_index) {	
							for ($j=0; $j<=900; $j++) {
								if (!isset($rows1[$j]['price'])) break;								
								$f = 0;
								for ($k=0; $k<900; $k++) {
									if (!isset($mas_nozero[$k]['prod_id'])) break;	
									if ($rows1[$j]['product_option_value_id'] == $mas_nozero[$k]['prod_id']) {
										$f = 1;
										break;
									}
								}
								if (!$f) {	
									$rows1[$j]['quantity'] = 0;
									$this->db->query("UPDATE `" . DB_PREFIX . "product_option_value` SET `quantity` = '" . 0 . "' WHERE `product_option_value_id` = '" . $rows1[$j]['product_option_value_id'] ."'");
								}								
							}
						}
												
						$min_price_opt = 999999999999;
						$summa = 0;	
						$baseprice = 0;
						$table = DB_PREFIX . "product";
						$tname = "base_price";
						if ($this->getColumnName($table, $tname) and $usd and $uu) $baseprice = 1;
						for ($j=0; $j<=900; $j++) {
							if (!isset($rows1[$j]['price'])) break;
							$summa = $summa + (int)$rows1[$j]['quantity'];	
							if ($baseprice) $rows1[$j]['price'] = $rows1[$j]['base_price'];
					
							if ($rows1[$j]['price_prefix'] == '+') $rows1[$j]['price'] = $oldprice + $rows1[$j]['price'];
							if ($rows1[$j]['price_prefix'] == '-') $rows1[$j]['price'] = $oldprice - $rows1[$j]['price'];
						if ($rows1[$j]['price_prefix'] == '%') $rows1[$j]['price'] = $oldprice*(1+$rows1[$j]['price']/100);
						if ($rows1[$j]['price_prefix'] == '#') $rows1[$j]['price'] = $oldprice*(1-$rows1[$j]['price']/100);
						if ($rows1[$j]['price_prefix'] == '*') $rows1[$j]['price'] = $oldprice*$rows1[$j]['price'];	
							if ($min_price_opt > (float)$rows1[$j]['price'] and $rows1[$j]['quantity'] and $rows1[$j]['price'] > 0) $min_price_opt = (float)$rows1[$j]['price'];

						}
	
						if (!$same_column) $min_price_opt = $firstprice;
						
						$e = 0;
						if ($min_price_opt != 999999999999) {
							if ($my_price == 1) $e = 1;
							if ($my_price == 2 and (float)$oldprice < (float)$min_price_opt) $e = 1;
							if ($my_price == 3 and (float)$oldprice > (float)$min_price_opt) $e = 1;
							if (!$oldprice) $e = 1;
						}	
	
						if ($jopt) $summa = $summa - $summa_options;
						
						if ($ad != 4 and $ad != 12 and $ad != 14 and $minus) {
							$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `quantity` = '" . $summa . "' WHERE `product_id` = '" . $old_product_id ."'");
						}
						
						if ($e and $opt_prices) $final_price = $min_price_opt;
						else $final_price = $oldprice;
						
						if (!$final_price) {
							$err =  " Price not updated: Row ~= " . $row_count . " SKU = " . $old_sku . " Zero price counted" . " \n";
							$this->adderr($err);
						} else {						
							if ($e and $ad != 2 and $ad != 12 and $ad != 13 and $final_price < 999999999999) {
								$this->db->query("UPDATE `" . DB_PREFIX . "product` SET `price` = '" . $final_price . "' WHERE `product_id` = '" . $old_product_id ."'");
							}
						}	
						if ($opt_prices and $ad != 2 and $ad != 12 and $ad != 13 and $final_price < 999999999999) {
							for ($j=0; $j<=900; $j++) {				
								$popt = 0;
								if (!isset($rows1[$j]['price'])) break;						
								$popt = (float)$rows1[$j]['price'] - (float)$final_price;
								$prefix = '+';
								if ($popt<0) $prefix = '-';							
								$popt = abs($popt);
								$popt = $this->convertPrice($popt);
								if ($rows1[$j]['price'] != 0 and $rows1[$j]['quantity'] != 0) {		
									$this->upOptionPlus($rows1[$j]['product_option_value_id'], $popt, $prefix);
								}
							}

							if ($baseprice) $this->db->query("UPDATE `" . DB_PREFIX . "product` SET `base_price` = '" . $final_price . "' WHERE `product_id` = '" . $old_product_id . "'");							
					
							if ($jopt) {
								$rows2 = $this->getAllGroups($old_product_id);
								if (!empty($rows2)) {
									for ($j=0; $j<=900; $j++) {				
										$popt = 0;	
										if (!isset($rows2[$j]['price'])) break;
										$prefix = $rows2[$j]['price_prefix'];
										if ($rows2[$j]['price_prefix'] == '=' and $opt_prices) {
											$popt = (float)$rows2[$j]['price'] - (float)$final_price;
											$prefix = '+';
											if ($popt<0) $prefix = '-';							
											$popt = abs($popt);
											$popt = $this->convertPrice($popt);				
											if ($rows2[$j]['price'] != 0 and $rows2[$j]['quantity'] != 0) {		
												$query = $this->db->query("UPDATE " . DB_PREFIX . "relatedoptions SET `price` = '" . $popt . "', `price_prefix` = '" .$prefix . "' WHERE `relatedoptions_id` = '" . (int)$rows2[$j]['relatedoptions_id'] . "'");
											}	
										}	
									}	
								}
							}
						} elseif ($ad != 2 and $ad != 12 and $ad != 13) {
							for ($j=0; $j<=900; $j++) {									
								if (!isset($rows1[$j]['price'])) break;								
								$prefix = '=';								
								$popt = $this->convertPrice($rows1[$j]['price']);
								$this->upOptionPlus($rows1[$j]['product_option_value_id'], $popt, $prefix);				
							}
						}					
					}
				}
				unset($rows1);
				unset($rows2);
			}

			if (!empty($rows)) {
				if ($old_product_id != $rows[0]['product_id']) $old_product_id = $rows[0]['product_id'];
			}	

			if (!empty($sku)) $row[$cod] = $sku;
				else if (empty($row[$cod]) and isset($row[$sku2]) and !empty($row[$sku2])) $row[$cod] = $row[$sku2];
			
			$row_product  = $rows;			
			
			if ($ad == 9) {
				if (empty($rows)) {
					$err = " New product. Row ~= " . $row_count . " SKU = " . $row[$cod] . " \n";
					$this->adderr($err);
					continue;
				} else continue;	
			}

			if (preg_match('/^[a-zA-Zа-яА-Я _-]+$/', $row[$price]) and $ad != 2 and $ad != 12 and $ad != 13) {			
				$err = " The row passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Invalid price of product \n";
				$this->adderr($err);
				continue;
			}
			
			$product_found = 0;
			$zero_prod = 0;
			$off_prod = 0;
			if (!empty($rows)) $product_found = 1;
			if (empty($rows) and $ad == 2) continue;
			if (empty($rows) and $ad == 4) continue;
			if ($ad == 15) {
				if (isset($rows[0]['price']) and $rows[0]['price'] != 0 and $rows[0]['price'] != '') continue;
				if (!isset($rows[0]['price'])) continue;
			}	
	
			if ($product_found and $ad != 3) {
				if ($exsame) continue;
			
		/**************/		
				if (!preg_match('/^[0-9]+$/', $manuf) and !empty($manuf) and $umanuf) {
					if (empty($row[$parsm])) {
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parsm."\n";
						$this->adderr($err);						
						continue;
					}
					$url = $this->checkurl($row[$parsm]);
					if ($url == -1) {
						$err = " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parsm]. " in column = ".$parsm."\n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						continue;
					}
					if (strlen($ht) < 1024 or $parsed != $parsm) {
						$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) > 2048) $parsed = $parsm;
						else {
							$parsed = "";
							$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
							$this->adderr($err);
							$row_count = (int)$this->putsos($row_count, $row[$cod]);
							if ($row_count < 0) return 5;
							continue;
						}	
					}
					$in = $this->ParsManufacturer($ht, $mmanuf, $pointm, $placem);					
					if (empty($in) or strlen($in) > 100 ) {
						$err = " The Product passed: Row ~= " . $row_count . " parsing manufacturer fail, manufacturer = " . $this->symbol($in) . " \n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						$manuf = 'manuf';
						$row[$manuf] = '';
					} else {
						$manuf = 'manuf';
						$row[$manuf] = $in;
					}	
				}
		/**************/
		
				$equ = 0;
				$ismain = 0;
				$p = strrpos($row_product[0]['model'], "-");
				if (!$p) {
					$p = strrpos($row_product[0]['model'], "~");
					if ($p) $ismain = 1;
				}	
				if ($p)	$papka = substr($row_product[0]['model'], $p-1, 1);
				else $papka = 0;				
				
				$nom = substr($row_product[0]['model'], $p+1, 2);
				if ((int)$id == (int)$nom) $equ = 1;
		
				
				if ($ismain and !$main and $ad != 10 and $row_product[0]['quantity']) {
					$err = " The Product passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . ", because it does not belong to the main supplier \n";
					$this->adderr($err);
					continue;
				}						
				
				$newstatus = 0;					
				$quantity = '0';
				$empt = 0;
				$this->getQuantity($row, $qu, $my_qu, $quantity, $newstatus, $empt);
				if (empty($newstatus)) $newstatus = 0;
				if (!$empt) $quantity = '';
				
				if (!$quantity and preg_match('/^[0-9]+$/', $my_qu)) {
					$quantity = $my_qu;
					if ($ad != 4 and $ad != 12 and $ad != 14) $report = $report."Quantity set by default ";
				}				
				
				$qu_d = array();  // Расчет скидок по процентам от количества
				if (!empty($qu_discount) and substr_count($qu_discount, "=")) {				
					$pj = explode(",", $qu_discount);
					for ($j=0; $j<20; $j++) {		
						if (!isset($pj[$j])) break;
						if (!substr_count($pj[$j], "=")) break;		
						$p = strpos($pj[$j], '=');						
						$q = substr($pj[$j], 0, $p);	
						$q = trim($q)+1-1;
						$q = round($q, 0);
						if (!preg_match('/^[0-9]+$/', $q)) break;	
						$per = substr($pj[$j], $p+1);	
						$per = trim($per)+1.11-1.11;
						$per = $this->convertPrice($per);
						if (!preg_match('/^[0-9.]+$/', $per)) break;
						$qu_d['quantity'][$j] = $q;
						$qu_d['percent'][$j] = $per;
					}
				}
				
				$kon_price = 0;
				$new_price = 0;
				$plus = 0;
				$rate_ident = 1;
				$mas = array();
				$identificator = array();	
				if ($cheap and $ad != 2 and $ad != 12 and $ad != 13 and !$yml and $row_product[0]['sku']) {
					if ($ad == 4 or $quantity or $ad == 10 or $equ) {
						if (!$refer) {							
							$k = 0;
							for ($l=0; $l<$max_site; $l++) {
								$rate_ident = 1;
								if ($mratek[$l]) $rate_ident = $mratek[$l];
								if (!empty($row[$nomkol[$l]])) {
									$url = $this->checkurl($row[$nomkol[$l]]);
									if ($url != -1) {
										$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);				
										if (strlen($ht) > 1024) {
										
											$this->saveRef($row_product[0]['product_id'], $ident[$l], $url);
											
											$pr = $this->ParsPrice($ht, $param[$l], $point[$l], $placep);
											if (!empty($pr)) $pr = $pr*$rate_ident;
											else {
												$err = " Row ~= " . $row_count . " Site: " . $this->symbol($ident[$l]) . " url = ". $url. " parsing fail \n";
												$this->adderr($err);
											}
											$parsedprice = 0;
											if ($pr) $parsedprice = $pr;
											$this->db->query("UPDATE `" . DB_PREFIX . "suppler_ref` SET `price` = '" . $parsedprice . "' WHERE `product_id` = '" .(int)$row_product[0]['product_id'] . "' and `ident` = '" . $ident[$l] ."'");
											
											if (!empty($pr) and $pr > $row_product[0]['price']/2) {
												if (!empty($noprice[$l])) {
													$nopr = $this->ParsName($ht, $paramnp[$l], $pointnp[$l], 1);
													if (empty($nopr) or !substr_count($nopr, $noprice[$l])) {
														$mas[$k] = $this->convertPrice($pr);							
														$identificator[$k] = $ident[$l];
														$k++;
													}
												} else {
													$mas[$k] = $this->convertPrice($pr);								
													$identificator[$k] = $ident[$l];
													$k++;
												}	
											}											
										} else {
											$err = " Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
											$this->adderr($err);
										}
									}
								}	
							}
						} else {
							$rows = $this->getReferens($row_product[0]['product_id']);								
							if (!empty($rows)) {								
								$k = 0;
								foreach ($rows as $r) {	
									$ht = $this->curl_get_contents($r['url'], 0, $sleep, $ffile);
									if (strlen($ht) > 1024) {
										$ff = 0;
										for ($l=0; $l<$max_site; $l++) {
											if ($r['ident'] == $ident[$l]) {
												$ff = 1;
												break;
											}	
										}
										if ($ff) {
											if ($mratek[$l]) $rate_ident = $mratek[$l];
											$pr = $this->ParsPrice($ht, $param[$l], $point[$l], $placep);
											if (!empty($pr)) $pr = $pr*$rate_ident;
											else {
												$err = " Row ~= " . $row_count . " Site: " . $this->symbol($ident[$l]) . " url = ". $r['url']. " parsing fail \n";
												$this->adderr($err);
											}
											if (!empty($pr) and $pr > $row_product[0]['price']/2) {		
												if (!empty($noprice[$l])) {
													$nopr = $this->ParsName($ht, $paramnp[$l], $pointnp[$l], 1);
													if (empty($nopr) or !substr_count($nopr, $noprice[$l])) {
														$mas[$k] = $this->convertPrice($pr);
														$k++;												
													}
												} else {
													$mas[$k] = $this->convertPrice($pr);
													$k++;						
												}
											}
										}	
									} else {
										$err = " Row ~= " . $row_count . " url = ". $r['url']. " Site no answer \n";
										$this->adderr($err);
									}	
								}
							}
						}
						$l = 100;
						if (count($mas)) {
							$min = 1000000000;
							for ($j=0; $j<$k; $j++) {
								if ($mas[$j] <= $min) {
									$min = $mas[$j];
									$l = $j;
								}	
							}
							$sum = 0;
							for ($j=0; $j<$k; $j++) {
								$sum = $sum + $mas[$j];
							}	
							$sum = $sum/$j;
							$maxp = 0;
							$m = 100;
							for ($j=0; $j<$k; $j++) {
								if ($mas[$j] >= $maxp) {
									$maxp = $mas[$j];
									$m = $j;
								}	
							}
							$optimal = $sum;
							if (count($mas) == 2) $optimal = ($mas[0]+$mas[1])/2;
							if (count($mas) > 2) {
								$optimal = 0;
								for ($j=0; $j<$k; $j++) {
									$w = 3;
									if ($j==$l) $w = 1;									
									if ($j==$m) $w = 2;
									$optimal = $optimal + $mas[$j] * $w;	
								}
								$optimal = $optimal/($j*3-3);							
							}	
							$submin = 1000000000;
							$mas[$l] = 999999999;
							for ($j=0; $j<$k; $j++) {
								if ($mas[$j] <= $submin) $submin = $mas[$j];
							}
							if ($submin > 999999998) $submin = $min;
							$po = strpos($onn, '%');
							if ($po) $onnn = substr($onn, 0, $po);
							else $onnn = $onn;
							switch ($cheap) {			
								case 1:									
									if ($po) $new_price = $min - $min*$onnn/100;
									else $new_price = $min - $onnn;
									break;
								case 2:									
									if ($po) $new_price = $sum - $sum*$onnn/100;
									else $new_price = $sum - $onnn;		
									break;
								case 3:									
									if ($po) $new_price = $maxp - $maxp*$onnn/100;
									else $new_price = $maxp - $onnn;
									break;
								case 4:									
									if ($po) $new_price = $optimal - $optimal*$onnn/100;
									else $new_price = $optimal - $onnn;
									break;
								case 5:									
									if ($po) $new_price = $min + $min*$onnn/100;
									else $new_price = $min + $onnn;
									break;
								case 6:									
									if ($po) $new_price = $sum + $sum*$onnn/100;
									else $new_price = $sum + $onnn;		
									break;
								case 7:									
									if ($po) $new_price = $maxp + $maxp*$onnn/100;
									else $new_price = $maxp + $onnn;
									break;
								case 8:									
									if ($po) $new_price = $optimal + $optimal*$onnn/100;
									else $new_price = $optimal + $onnn;
									break;			
							}
							if (!$price_parsed) $pr = $row[$price]*$rate;  // сначала, умножаем на курс	
							else $pr = $row[$price]*$ratep;							
						
							$plus = 0;
							$prr = $pr;
							if ($ad == 4 or $quantity or $ad == 10 or $equ) {
								if (!$flag and $my_price != 4 and !$cprice and (empty($myplus) or !preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus]))) {
									$rows = $this->getProductCategory($row_product[0]['product_id']);
									if (!isset($rows) or empty($rows)) {							
										$err = " The Product missing: Row ~= " . $row_count . " SKU = " . $row[$cod] . " error in database: unknown category \n";
										$this->adderr($err);
										$ff = 0;
										continue;
									}
									if (!empty($rows)) {
										$cat_id = $rows[0]['category_id'];
										foreach ($rows as $value) {
											if ($cat_id < $value['category_id']) $cat_id = $value['category_id'];
											if (isset($value['main_category']) and $value['main_category'] == 1) {
												$cat_id = $value['category_id'];
												break;
											}	
										}
										$rows = $this->getMargin($form_id, $cat_id);
									} else $rows = '';	

									if (empty($rows) and !$ignore_margin and !$rrc) {
										if (!$yml) {
											$err =  " Can not calculate margin. Row ~= " . $row_count . " SKU = " . $row[$cod] . " Margin is not set on page Category and Margin" . " \n";
											$this->adderr($err);
										}						
									} else {
										$text = '';
										if (!empty($rows)) $text = $rows[0]['cat_plus'];							
										if (!empty($text)) {
											if (preg_match('/^[-0-9,.+]+$/', $text)) {
												$plus = str_replace(',','.',$text);
											} else {
												$pj = explode(",", $text);
												for ($j=0; $j<600; $j++) {
													if (!isset($pj[$j])) break;
													if (!substr_count($pj[$j], "(")) continue;
													if (!substr_count($pj[$j], ")")) continue;
													$pj[$j] = str_replace('(','',$pj[$j]);		
													$p = strpos($pj[$j], ')');
													if (!$p) continue;
													$d = substr($pj[$j], 0, $p);
													$p12 = explode("-", $d);
													$p1 = trim($p12[0]);
													$p2 = trim($p12[1]);
													if ($pr >= $p1 and $pr <= $p2) {
														$plus = substr($pj[$j], $p+1);			
														$plus = trim($plus);
														break;
													}
												}	
											}
											if (!empty($plus) and !$ignore_margin and !$rrc) $report = $report."Margin added success. ";
										}
									}
								} else {
									if (!empty($myplus) and $my_price != 4 and preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus])) {
										$plus = str_replace(',','.',$row[$myplus]);							
									} else {
										if ((empty($cat_plus[$i]) or $cat_plus[$i] == 0) and $my_price != 4 and $cprice) {
											if (!$price_parsed) $a = $rate;
											else $a = $ratep;
											$doll = $pr/$a + 0.01 - 0.01;	// переведем цену в доллары					
					
						// Таблица наценок. Зависит от цены товара в долларах. $m - множитель 
			
											if ($doll > 500.00) $m = 1.01;   // 1%
											if ($doll <= 500.00) $m = 1.05;  // 5%
											if ($doll <= 200.00) $m = 1.06;
											if ($doll <= 100.00) $m = 1.1;			
											if ($doll <= 50.00) $m = 1.07;	
											if ($doll <= 30.00) $m = 1.15;
											if ($doll <= 20.00) $m = 1.2;
											if ($doll <= 10.00) $m = 1.35;
											if ($doll <= 5.00) $m = 1.4;
											if ($doll <= 4.00) $m = 1.5;
											if ($doll <= 3.00) $m = 1.6;
											if ($doll <= 2.00) $m = 1.7;
											if ($doll <= 1.40) $m = 1.8;
											if ($doll <= 1.20) $m = 1.9;
											if ($doll <= 1.00) $m = 2.0;	// 100 процентов				
					
											$plus = 100*((float)$m-1);
											$report = $report."Margin set by formula. ";
								
										} else {
											if (!empty($cat_plus[$i])) {
												if (preg_match('/^[-0-9,.+]+$/', $cat_plus[$i])) {
													$plus = str_replace(',','.',$cat_plus[$i]);
												} else {
													$pj = explode(",", $cat_plus[$i]);
													for ($j=0; $j<600; $j++) {
														if (!isset($pj[$j])) break;
														if (!substr_count($pj[$j], "(")) continue;
														if (!substr_count($pj[$j], ")")) continue;
														$pj[$j] = str_replace('(','',$pj[$j]);		
														$p = strpos($pj[$j], ')');
														if (!$p) continue;
														$d = substr($pj[$j], 0, $p);
														$p12 = explode("-", $d);
														$p1 = trim($p12[0]);
														$p2 = trim($p12[1]);
														if ($pr >= $p1 and $pr <= $p2) {
															$plus = substr($pj[$j], $p+1);
															$plus = trim($plus);
															break;
														}
													}	
												}
												if (!empty($plus) and !$ignore_margin and !$rrc) $report = $report."Margin added success ";
											}	
										}
									}
								}					
							}		
							if ($ignore_margin or $rrc) $plus = 0;							
							if (!substr_count($plus, "+")) $pr = $pr + $pr * $plus/100;
							else {
								$pl = explode("+", $plus);									
								if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + $pr * $pl[0]/100;
								if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];								
							}						
														
							$rows = $this->getBasePrice($row_product[0]['product_id']);
							if (empty($rows)) {	
								$this->db->query("INSERT INTO `" . DB_PREFIX . "suppler_base_price` SET `product_id` = '" . (int)$row_product[0]['product_id'] . "', `bmin` = '" . $min . "', `bav` = '" . $sum . "', `bmax` = '" . $maxp . "'");
							} else {
								$this->db->query("UPDATE `" . DB_PREFIX . "suppler_base_price` SET `bmin` = '" . $min . "', `bav` = '" . $sum . "', `bmax` = '" . $maxp . "' WHERE `product_id` = '" . (int)$row_product[0]['product_id'] . "'");
							}	
							
							if (!preg_replace('/[^0-9]/','',$bprice) or !isset($row[$bprice])) $bpr = 0;
							else $bpr = strip_tags($row[$bprice]);
							$bpr = $this->convertPrice($bpr);
							$bpr = 	$bpr*$rate;
							$bprr = $bpr;
							$bdprr = $bpr;
							if (!empty($disc)) $bdprr = $bpr - $bpr*$disc/100;							
							if (!empty($disc)) $pr = $pr - $pr*$disc/100;
							
							if ($pr > $new_price) {								
								if (!empty($disc)) $bpr = $bpr - $bpr*$disc/100;								
								if ($bpr > $new_price) {
									switch ($kmenu) {
										case '0': $new_price = $row_product[0]['price'];
											break;
										case '1': $zero_prod = 1;
												$new_price = $row_product[0]['price'];
											break;
										case '2': $off_prod = 1;
												$new_price = $row_product[0]['price'];
											break;
										case '3': $new_price = $bpr*1.01;
											break;
										case '4': 
											if ($po) $new_price = $min - $min*$onnn/100;
											else $new_price = $min - $onnn;											
											break;
										case '5': 
											if ($po) $new_price = $submin - $submin*$onnn/100;
											else $new_price = $submin - $onnn;											
											break;
										case '6': $new_price = 0;
											break;		
									}		
								}
							}							
							
							$percent_to_price = 0;
							if ($pr) $percent_to_price = 100*($new_price-$pr)/$pr;
							$percent_to_bprice = 0;
							if ($bprr) $percent_to_bprice = 100*($new_price-$bprr)/$bprr;
							$percent_to_bdprice = 0;
							if ($bdprr) $percent_to_bdprice = 100*($new_price-$bdprr)/$bdprr;
	
							$this->db->query("UPDATE `" . DB_PREFIX . "suppler_base_price` SET `optimal` = '" . $optimal . "', `market_percent_to_price` = '" . $percent_to_price . "', `market_percent_to_bprice` = '" . $percent_to_bprice . "', `market_percent_to_bdprice` = '" . $percent_to_bdprice . "' WHERE `product_id` = '" . (int)$row_product[0]['product_id'] . "'");
							
						} else {
							switch ($zero) {
								case '0': $new_price = 0;
									break;
								case '1': $zero_prod = 1;
										  $new_price = 0;
									break;
								case '2': $off_prod = 1;
										  $new_price = 0;
									break;
							}
						}	
					}		
				}
	
				unset($mas);
				unset($identificator);
	
				if ($new_price) $kon_price = 1;		
				if (!$new_price and $ad != 2 and $ad != 12 and $ad != 13) {			
					$plus = 0;					
					if (!$price_parsed) $row[$price] = $row[$price]*$rate;  // сначала, умножаем на курс	
					else $row[$price] = $row[$price]*$ratep;
					if ($ad == 4 or $quantity or $ad == 10 or $equ or $yml) {
						if (!$flag and $my_price != 4 and !$cprice and (empty($myplus) or !preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus]))) {
							$rows = $this->getProductCategory($row_product[0]['product_id']);
							if (empty($rows) and !$yml) {							
								$err = " The Product missing: Row ~= " . $row_count . " SKU = " . $row[$cod] . " error in database: unknown Category \n";
								$this->adderr($err);
								continue;
							}	
							if (!empty($rows)) {
								$cat_id = $rows[0]['category_id'];
								foreach ($rows as $value) {
									if ($cat_id < $value['category_id']) $cat_id = $value['category_id'];
									if (isset($value['main_category']) and $value['main_category'] == 1) {
										$cat_id = $value['category_id'];
										break;
									}	
								}
								$rows = $this->getMargin($form_id, $cat_id);
							} else $rows = '';							

							if (empty($rows) and !$ignore_margin and !$rrc) {							
								if (!$yml) {
									$err =  " Can not calculate margin. Row ~= " . $row_count . " SKU = " . $row[$cod] . " Margin is not set on page Category and Margin" . " \n";
									$this->adderr($err);
								}					
							} else {
								$text = '';
								if (!empty($rows)) $text = $rows[0]['cat_plus'];	
								if (!empty($text)) {
									if (preg_match('/^[-0-9,.+]+$/', $text)) {
										$plus = str_replace(',','.',$text);
									} else {
										$pj = explode(",", $text);
										for ($j=0; $j<600; $j++) {
											if (!isset($pj[$j])) break;
											if (!substr_count($pj[$j], "(")) continue;
											if (!substr_count($pj[$j], ")")) continue;
											$pj[$j] = str_replace('(','',$pj[$j]);		
											$p = strpos($pj[$j], ')');
											if (!$p) continue;
											$d = substr($pj[$j], 0, $p);
											$p12 = explode("-", $d);
											$p1 = trim($p12[0]);
											$p2 = trim($p12[1]);
											if ($row[$price] >= $p1 and $row[$price] <= $p2) {
												$plus = substr($pj[$j], $p+1);			
												$plus = trim($plus);
												break;
											}
										}	
									}
									if (!empty($plus) and !$ignore_margin and !$yml and !$rrc) $report = $report."Margin added success ";	
								}
							}
						} else {
							if (!empty($myplus) and $my_price != 4 and preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus])) {
								$plus = str_replace(',','.',$row[$myplus]);							
							} else {
								if ((empty($cat_plus[$i]) or $cat_plus[$i] == 0) and $my_price != 4 and $cprice) {
									if (!$price_parsed) $a = $rate;
									else $a = $ratep;
									$doll = $row[$price]/$a + 0.01 - 0.01;	// переведем цену в доллары					
					
				// Таблица наценок. Зависит от цены товара в долларах. $m - множитель 
			
									if ($doll > 500.00) $m = 1.01;   // 1%
									if ($doll <= 500.00) $m = 1.05;  // 5%
									if ($doll <= 200.00) $m = 1.06;
									if ($doll <= 100.00) $m = 1.1;			
									if ($doll <= 50.00) $m = 1.07;	
									if ($doll <= 30.00) $m = 1.15;
									if ($doll <= 20.00) $m = 1.2;
									if ($doll <= 10.00) $m = 1.35;
									if ($doll <= 5.00) $m = 1.4;
									if ($doll <= 4.00) $m = 1.5;
									if ($doll <= 3.00) $m = 1.6;
									if ($doll <= 2.00) $m = 1.7;
									if ($doll <= 1.40) $m = 1.8;
									if ($doll <= 1.20) $m = 1.9;
									if ($doll <= 1.00) $m = 2.0;	// 100 процентов				
					
									$plus = 100*((float)$m-1);
									if (!$yml) $report = $report."Margin set by formula ";
								
								} else {
									if (isset($cat_plus[$i]) and !empty($cat_plus[$i])) {
										if (preg_match('/^[-0-9,.+]+$/', $cat_plus[$i])) {
											$plus = str_replace(',','.',$cat_plus[$i]);
										} else {
											$pj = explode(",", $cat_plus[$i]);
											for ($j=0; $j<600; $j++) {
												if (!isset($pj[$j])) break;
												if (!substr_count($pj[$j], "(")) continue;
												if (!substr_count($pj[$j], ")")) continue;
												$pj[$j] = str_replace('(','',$pj[$j]);		
												$p = strpos($pj[$j], ')');
												if (!$p) continue;
												$d = substr($pj[$j], 0, $p);
												$p12 = explode("-", $d);
												$p1 = trim($p12[0]);
												$p2 = trim($p12[1]);
												if ($row[$price] >= $p1 and $row[$price] <= $p2) {
													$plus = substr($pj[$j], $p+1);
													$plus = trim($plus);
													break;
												}
											}	
										}
										if (!empty($plus) and !$ignore_margin and !$yml and !$rrc) $report = $report."Margin added success ";
									}	
								}
							}
						}					
					}			
					if ($ignore_margin or $rrc) $plus = 0;	
	
					if (!substr_count($plus, "+")) $new_price = $row[$price] + ($row[$price] * $plus/100);			
					else {
						$pl = explode("+", $plus);	
						$f = 0;
						if (isset($pl[0]) and !empty($pl[0])) {
							$new_price = $row[$price] + ($row[$price] * $pl[0]/100);
							$f = 1;
						}
						if (isset($pl[1]) and !empty($pl[1]) and $f) $new_price = $new_price + $pl[1];
						if (isset($pl[1]) and !empty($pl[1]) and !$f) $new_price = $row[$price] + $pl[1];
					}		
				}								
				
				if ($yml and $row[$price]) $yml_price = $this->convertPrice($row[$price]);
				if ($row_product[0]['price'] != 0 and !$usd) $old_price = $row_product[0]['price'];
				else $old_price = $new_price;
				
				$n = $this->convertPrice($new_price); 	// округление цены до копеек, 2 цифры после запятой
				if (!$new_price and $ad != 10 and !$yml) $report = $report."Price not updated ";
	
				if ($yml and isset($yml_price) and $yml_price and isset($ymlnp) and !$ymlnp and $plus) {
					$n = $yml_price+($yml_price*$plus/100);	
					$n = $this->convertPrice($n);
					$ymlnp = 1;
				}
				
				$price_changed = 0;	
	
				if ($ismain and $row_product[0]['quantity'] and !$equ and !$main) $report = $report."Price and quantity not updated, see, Main Supplier ";
	
				if ((!$row_product[0]['quantity'] and $my_price != 4 and $quantity and $new_price and $ad != 2 and $ad != 12  and $ad != 13) or $ad == 10 or ($yml and $n) or ($equ and $ad != 2 and $ad != 12 and $ad != 13 and $new_price and $my_price == 1 and $quantity != '')) {
					$row_product[0]['price'] = $n;
					$price_changed = 1;
					if ($n) $report = $report."Price updated ";				
				} else {				
					if (($my_price == 1 and $quantity and $new_price and $ad != 2 and $ad != 12 and $ad != 13 and (!$ismain or ($ismain and $main and $equ))) or ($equ and $quantity != '' and $my_price == 1 and $new_price and $ad != 2 and $ad != 12 and $ad != 13) or ($yml and $n)) {	
						$row_product[0]['price'] = $n;
						$price_changed = 1;
						if ($n) $report = $report."Price updated ";
					} else { 
						if ($kon_price and $my_price != 4 and (!$ismain or ($ismain and $main and $equ))) { // Цена установлена по конкурентам							
							$rows = $this->getBasePrice($row_product[0]['product_id']);
							if (!empty($rows) and isset($row[$bprice]) and !empty($row[$bprice])) {
								$old_bprice = $rows[0]['bprice'];
								$pr = $this->convertPrice($row[$bprice]);
								$new_bprice = $pr*$rate;								
								if (($my_price == 2 and $new_bprice and $new_bprice > $old_bprice and $quantity and $ad != 2 and $ad != 12) or ($my_price == 2 and $new_bprice and $new_bprice > $old_bprice and $ad == 10) or  ($equ and $ad != 2 and $ad != 12)){
									$row_product[0]['price'] = $n;
									$price_changed = 1;
									if ($n) $report = $report."Price updated ";
								} else {
									if (($my_price == 3 and $new_bprice and $new_bprice < $old_bprice and $quantity and $ad != 2 and $ad != 12) or ($my_price == 3 and $new_bprice and $new_bprice < $old_bprice and $ad == 10) or ($equ and $ad != 2 and $ad != 12)) {
										$row_product[0]['price'] = $n;
										$price_changed = 1;
										if ($n) $report = $report."Price updated ";
									}								
								}
							}
						} else {					
							if ((($my_price == 2 and $new_price and $new_price > $old_price and ($quantity or $yml) and (!$ismain or ($ismain and $main and $equ))) or ($my_price == 2 and $new_price and $new_price > $old_price and ($ad == 10 or ($equ and $quantity != '')))) and $ad != 2 and $ad != 12 and $ad != 13) {
								$row_product[0]['price'] = $n;
								$price_changed = 1;
								if ($n) $report = $report."Price updated ";
							} else {
								if ((($my_price == 3 and $new_price and $new_price < $old_price and ($quantity or $yml)   and (!$ismain or ($ismain and $main and $equ))) or ($my_price == 3 and $new_price and $new_price < $old_price and ($ad == 10 or ($equ and $quantity != '')))) and $ad != 2 and $ad != 12 and $ad != 13) {
									$row_product[0]['price'] = $n;
									$price_changed = 1;
									if ($n) $report = $report."Price updated ";															
								}
							}
						}						
					}
				}
				if (!$row_product[0]['price'] and !$yml) {
					$err =  " The Product passed: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Zero price" . " \n";
					$this->adderr($err);
					continue;
				}
				
				// Обновление акционных цен
				$ff = 0;
				if (((!empty($aprice) and $quantity and (!$ismain or ($ismain and $main and $equ))) or (!empty($aprice) and ($ad == 10 or ($equ and $quantity != '')))) and $ad != 2 and $ad != 12 and $ad != 13)  {
					$this->deleteActionPrice($row_product[0]['product_id']);
					for ($j=0; $j<40; $j++) {
						if (!isset($aprice[$j])) break;
						if (empty($aprice[$j])) continue;
						$data['product_id'] = $row_product[0]['product_id'];
						$data['customer_group_id'] = $j+1;
						$data['priority'] = 1;
						$pr = $this->convertPrice($row[$aprice[$j]]);						
						if (!preg_match('/^[0-9.Ee+-]+$/', $pr)) $pr = '';
						else $pr = $pr*$rate;
						if (round($pr, 0) >= round($new_price, 0)) $pr = '';
						if ($pr and $chcode) {
							if (!substr_count($plus, "+")) $pr = $pr + ($pr * $plus/100);			
							else {
								$pl = explode("+", $plus);									
								if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + ($pr * $pl[0]/100);				
								if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];							
							}
						}
						$data['price'] = $this->convertPrice($pr);
						$day = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));
						$data['date_start'] = date('Y-m-d', $day);
						$plus_days = mktime(0, 0, 0, date('m'), date('d')+10, date('Y')); // +10 - акция на 10 дней
						$data['date_end'] = date('Y-m-d', $plus_days);
						if ($pr) {
							$uu = '';
							if (isset($row[$usd])) $uu = $row[$usd];
							$this->putActionPrice($data, $usd, $uu);
							$ff = 1;
						}
					}	
				}
				if ($ff) $report = $report."Special price updated ";
				
				// Скидочные цены, скидки
				$ff = 0;
				if (((count($mprice) > 1 and count($qu_d) == 0 and $quantity and (!$ismain or ($ismain and $main and $equ))) or (count($mprice) > 1  and count($qu_d) == 0 and ($ad == 10 or ($equ and $quantity != '')))) and $ad != 2 and $ad != 12 and $ad != 13) {		
					$this->deleteWholesale($row_product[0]['product_id']);
					for ($j=1; $j<40; $j++) {
						if (!isset($mprice[$j])) break;
						if (empty($mprice[$j])) continue;						
						$data['product_id'] = $row_product[0]['product_id'];
						$data['customer_group_id'] = $j;
						$data['priority'] = 1;			
						if (substr_count($mprice[$j], ')')) $mm = explode(')', $mprice[$j]);
						else $mm[0] = $mprice[$j].'(col';
						for ($k=0; $k<count($mm); $k++) {
							$m = explode('(', $mm[$k]);							
							if (count($m) < 2) continue;
							$pr = $row[$m[0]];
							if ($m[1] == 'col') $q = 1;
							else {
								if (substr_count($m[1], '=')) $q = str_replace('=', '', $m[1]);
								else $q = $row[$m[1]];								
							}
							$pr = $this->convertPrice($pr);						
							if (!preg_match('/^[0-9.Ee+-]+$/', $pr)) $pr = '';
							else $pr = $pr*$rate;
							if (round($pr, 0) >= round($new_price, 0)) $pr = '';
							if ($pr and $chcode) {
								if (!substr_count($plus, "+")) $pr = $pr + ($pr * $plus/100);			
								else {
									$pl = explode("+", $plus);									
									if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + ($pr * $pl[0]/100);				
									if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];							
								}
							}
							$data['price'] = $this->convertPrice($pr);
							$data['quantity'] = $q;
							$day = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));
							$data['date_start'] = date('Y-m-d', $day);
							$plus_days = mktime(0, 0, 0, date('m'), date('d')+10, date('Y')); // +10 это скидка на 10 дней
							$data['date_end'] = date('Y-m-d', $plus_days);
							if ($pr) {
								$uu = '';
								if (isset($row[$usd])) $uu = $row[$usd];
								$this->putWholesale($data, $usd, $uu);
								$ff = 1;
							}	
						}	
					}
				} else {
					if ((count($mprice) > 0 and count($qu_d) > 0 and (!$ismain or ($ismain and $main and $equ) or ($equ and $quantity != ''))) and $ad != 2 and $ad != 12 and $ad != 13) {		
						$this->deleteWholesale($row_product[0]['product_id']);
						for ($j=1; $j<40; $j++) {							
							$data['product_id'] = $row_product[0]['product_id'];
							$data['customer_group_id'] = $j;							
							$data['priority'] = 1;
							
							for ($k=0; $k<40; $k++) {
								if (!isset($qu_d['quantity'][$k])) break;
								$pr = $this->convertPrice($row[$mprice[0]]);
								$pr = $pr-$pr*$qu_d['percent'][$k]/100;								
								$data['price'] = $this->convertPrice($pr);
								$data['quantity'] = $qu_d['quantity'][$k];
								$day = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));
								$data['date_start'] = date('Y-m-d', $day);
								$plus_days = mktime(0, 0, 0, date('m'), date('d')+10, date('Y')); // +10 скидка на 10 дней
								$data['date_end'] = date('Y-m-d', $plus_days);
								if ($data['price']) {
									$uu = '';
									if (isset($row[$usd])) $uu = $row[$usd];
									$this->putWholesale($data, $usd, $uu);
									$ff = 1;
								}
							}
						}
					}
				}	
				unset($qu_d);
				
				if ($ff) $report = $report."Wholesale price updated ";
				
				if ((!empty($bonus) and preg_match('/^[0-9,]+$/', $bonus) and (!$ismain or ($ismain and $main and $equ) or $ad == 10 or ($equ and $quantity != ''))) and $ad != 2 and $ad != 12 and $ad != 13) { // бонусы
					$bb = explode(',', $bonus);					
					for ($j=0; $j<count($bb); $j++) {
						if ($j == 0) {							
							if (preg_match('/^[0-9]+$/', $bb[0]) and $row[$bb[0]] == '0') $this->deleteBonus0($row_product[0]['product_id']);
							else if (!empty($row[$bb[$j]])) $this->Bonus0($row_product[0]['product_id'], $row[$bb[0]]);
						} else {
							if (preg_match('/^[0-9]+$/', $bb[$j]) and $row[$bb[$j]] == '0') 
								$this->deleteBonus1($j, $row_product[0]['product_id']);
								
							if (preg_match('/^[0-9]+$/', $bb[$j]) and !empty($row[$bb[$j]]) and $row[$bb[$j]] != '0') 
								$this->Bonus1($j, $row_product[0]['product_id'], $row[$bb[$j]]);
							
						}	
					}	
				}				
	
				$quantity_changed = 0;
				if ($quantity == '0' and $equ and $ad != 4 and $ad != 12 and $ad != 14) {
					$row_product[0]['quantity'] = 0;
					$quantity_changed = 1;
					$report = $report."Quantity was set at zero ";
				}	
				
				if ((($quantity and ($price_changed or $ad == 2 or $my_price == 4)) or $ad == 10 or ($quantity and $yml)) and $ad != 4 and $ad != 12 and $ad != 14) {
					$row_product[0]['quantity'] = $quantity;
					$quantity_changed = 1;
					if ($yml and isset($yesno) and !$yesno and isset($ymlqu) and !$ymlqu) {
						$report = $report."Quantity updated ";
						$ymlqu = 1;
					}	
					if (!$yml) $report = $report."Quantity updated ";	
				}
		
				if ($price_changed or ($ad == 2 and $quantity_changed)) {
					$p = strrpos($row_product[0]['model'], "-");
					if (!$p) $p = strrpos($row_product[0]['model'], "~");
					if ($p)	$a = substr($row_product[0]['model'], $p+1);
					if ($p and is_numeric($a))	$nom = substr($row_product[0]['model'], 0, $p);
					else $nom = $row_product[0]['model'];
					if (!$main) $nom = $nom."-";
					else $nom = $nom."~";
					$l = strlen($id);
					if ($l < 2) $nom = $nom."0";
					$nom = $nom.$id;
					if ($ad != 12) {
						if (substr_count($row_product[0]['model'], "Series")) $nom = $nom.' '.'Series'; // Серии
						$row_product[0]['model'] = $nom;
						if (!$equ) $report = $report. "Supplier has been changed ";
					}	
				}
				
				$row_product[0]['hide'] = $row_product[0]['status'];				
				if ($quantity_changed and $new_price and $onoff) $row_product[0]['hide'] = 1;
				if ($onoff and (($ad == 2 and $quantity_changed) or $ad == 10)) $row_product[0]['hide'] = 1;
				if ($onoff and (($ad == 4 and $price_changed) or $ad == 10)) $row_product[0]['hide'] = 1;
				if ($off_prod == 1) $row_product[0]['hide'] = 0;		
				
				if ($old_sku != $row[$cod] or (isset($product_new) and $product_new)) {
					$summa_product_options = 0;
					$oldprice = $new_price;
				//	$oldprice = $old_price;
					$firstprice = $row_product[0]['price'];
					if (isset($mas_prod_opt_val_id)) unset($mas_prod_opt_val_id);
					$mas_prod_opt_val_id = array();
					$ymlnp = 0;
					$ymldsc = 0;
					$ymlatt = 0;
					$ymlqu = 0;
					$yml_price = 0;
					$summa_options = 0;
					if (isset($same_opt)) {
						unset($same_opt);					
						$same_opt = array();
					}	
					$ks = -1;
					if (isset($mas_nozero)) unset($mas_nozero);
					$mas_nozero = array();
					$nozero_index = 0;
				}
				$opt_val = array();
				$data_option = array();
				$mas_opt = array();				
				$yes_option = 0;								
				if ($yml) $upopt = 2;
				if ($max_opt and $upopt and (!$ismain or ($ismain and $main and $equ) or $equ)) {					
					$jj = 1;
					for ($j = 1; $j <= $max_opt; $j++) {						
						if (empty($opt[$j])) continue;
						$i1 = 0;
						if (!$option_idd[$j]) {
							if (preg_match('/^[0-9]+$/', $opt[$j]) and $opt[$j] > 2) {
								$name_option = $row[$opt[$j]-1];
								if ($yml) $name_option = $row[$opt[$j]+1];
							} else $name_option = $row[$parsi-1];
							if (!empty($name_option)) {
								$name_option = $this->getName($name_option);
								$option_id[$j] = $this->createOption($name_option, $langs);
							}
						}
						
						if (!$option_id[$j] and !$optsku) continue;
						if (!isset($ko[$j])) continue;
		
						if (preg_match('/^[0-9]+$/', $opt[$j])) {
							$row[$opt[$j]] = $this->symbol($row[$opt[$j]]);	
							$row[$opt[$j]] = str_replace("&quot;", "+-=6", $row[$opt[$j]]);	
							$opt_val = explode(";" , $row[$opt[$j]]);
						}
						$opt_ko = array();
						$opt_po = array();
						$opt_we = array();
						$opt_art = array();
						$opt_pr = array();
						$opt_foto = array();
						if (isset($maso)) unset($maso);
						if (isset($masp)) unset($masp);
						$maso = array();
						$masp = array();
						
						if (empty($ko[$j])) {
							$err =  ' The "Quantity" field is not filled in the "Options" page '." \n";
							$this->adderr($err);
							break;
						}
						$row[$ko[$j]] = $this->symbol($row[$ko[$j]]);
						if (isset($row[$ko[$j]])) {
							if (substr_count($row[$ko[$j]], ';')) $opt_ko = explode(";" , $row[$ko[$j]]);
							else $opt_ko = explode("," , $row[$ko[$j]]);
						}
						if (isset($row[$po[$j]])) {
							if (substr_count($row[$po[$j]], ';')) $opt_po = explode(";" , $row[$po[$j]]);
							else $opt_po = explode("," , $row[$po[$j]]);
						}										
						if (preg_match('/^[0-9]+$/', $prro[$j])) {
							if (substr_count($row[$prro[$j]], ';')) $opt_pr = explode(";" , $row[$prro[$j]]);
							else $opt_pr = explode("," , $row[$prro[$j]]);						
						}		
							
						$p = explode("," , $pprice);
						if ($p[0] == $prro[$j] or $prro[$j] == '') $same_column = 1;						
						if (!empty($row[$art[$j]])) $semicolon = 1;

						if (isset($row[$we[$j]])) {
							if (substr_count($row[$we[$j]], ';')) $opt_we = explode(";" , $row[$we[$j]]);
							else $opt_we = explode("," , $row[$we[$j]]);
						}
						if (isset($row[$art[$j]])) {
							if (substr_count($row[$art[$j]], ';')) $opt_art = explode(";" , $row[$art[$j]]);
							else $opt_art = explode("," , $row[$art[$j]]);
						}
						if (isset($row[$art[$j]])) {
							if (substr_count($row[$art[$j]], ';')) $opt_art = explode(";" , $row[$art[$j]]);
							else $opt_art = explode("," , $row[$art[$j]]);
						}
						if (isset($row[$foto[$j]])) $opt_foto = explode(";" , $row[$foto[$j]]);
		
						if (($opt[$j] and !preg_match('/^[0-9]+$/', $opt[$j])) or ($prro[$j] and !preg_match('/^[0-9]+$/', $prro[$j]))) {
							if (isset($row[$parsi]) and !empty($row[$parsi])) {	
								$url = $this->checkurl($row[$parsi]);		
								if ($url != -1) {																
									if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
									if (strlen($ht) > 1024) {
										$parsed = $parsi;										
										$this->ParsOptions($ht, $opt[$j], $opt_point[$j], $prro[$j], $maso, $masp);
									}		
									if ($maso == '') {
										$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Error in parameter parsing this option: ". $this->symbol($opt[$j]) . " price: " . $this->symbol($prro[$j]) . " Link: " . $row[$parsi] ." \n";
										$this->adderr($err);
										continue;
									} else {		
										if (isset($opt_val)) unset($opt_val);
										if (isset($opt_pr)) unset($opt_pr);
										for ($l=0; $l<900; $l++) {	
											if (!isset($maso[$l])) break;		
											if ($maso[$l]) $opt_val[$l] = $maso[$l];
											if ($masp[$l]) $opt_pr[$l] = $masp[$l];
											if (empty($prro[$j])) $opt_pr[$l] = '';
										}
									}							
								} else {
									$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Error link for parsing options in column: ". $parsi . " \n";
									$this->adderr($err);
									continue;
								}
							} else {
								$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Empty link for parsing options in column: ". $parsi . " \n";
								$this->adderr($err);
								continue;
							}	
						}
						for ($l=0; $l<200; $l++) {
							if (isset($option_foto)) unset($option_foto);
							$option_foto = array();
							$option_foto[0] = 0;
							if (isset($opt_foto[$l]) and !empty($opt_foto[$l])) {								
								$af = explode(',', $opt_foto[$l]);							
								for ($x=0; $x<count($af); $x++) {		
									$url = $af[$x];									
									$url = $this->checkurl($url);	
									$pic_addr = '';
									$a = strlen($url)-6;
									$en = substr($url, $a);
									if (!substr_count($url, "/") and (stripos($en, '.jpg') or stripos($en, '.png') or stripos($en, '.jpeg') or stripos($en, '.gif') or stripos($en, '.bmp'))) {			
	
										$ise = ".jpg";
										$nom = stripos($url, ".jpg");
										if (!$nom) {
											$nom = strrpos($url, ".jpeg");
											if ($nom) $ise = ".jpeg";
										}
										if (!$nom) {
											$nom = strrpos($url, ".png");
											if ($nom) $ise = ".png";
										}	
										if (!$nom) {
											$nom = strrpos($url, ".PNG");
											if ($nom) $ise = ".png";
										}
										if (!$nom) {
											$nom = strrpos($url, ".gif");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".GIF");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".bmp");
											if ($nom) $ise = ".bmp";
										}
										if (!$nom) {
											$nom = strrpos($url, ".BMP");
											if ($nom) $ise = ".bmp";
										}
				
										$a = strlen($url);
										if (!$nom or $a - $nom > 5) {
											$se = $ise;
											$nom = $a;
										} else $se = substr($url, $nom);
										$app = substr($url, 0, $nom);
										$nom = strpos($app, ".");
										$app = substr($app, $nom);
										$app = $this->TransLit($app);							
										$app = $this->MetaURL($app);

										$try = "../image/data/temp/".$url;
										if (file_exists($try)) {						
											if (!empty ($pic_int[$i]))	{
												$spath = "../image/data/" .$pic_int[$i]."/";
												if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
												else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
												$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
												if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
												else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;			
											} else {
												$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
												$this->adderr($err);
												break;
											}		
											if (!is_dir($spath)) {
												if (!@mkdir($spath, 0755)) {								
													$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
													$this->adderr($err);
													break;
												}
											}								
											if (!is_dir($path)) @mkdir($path, 0755);								
											$path = $path.$app.$se;	
											$a = @copy ($try, $path);
											if (!$a) {
												$err =  " Can not copy file from: " . $try . " to: " . $path . " Set chmod 0755 or 0777 for folder: " . $spath . " \n";
												$this->adderr($err);
												break;
											}											
										} else {
											$err =  " Photo not found: Row ~= " . $row_count . " SKU = " . $row[$cod] . " folder: " . $try . " \n";
											$this->adderr($err);
											$pic_addr = '';
										}								
									} else {	
										$ise = ".jpg";
										$nom = stripos($url, ".jpg");
											if (!$nom) {
												$nom = strrpos($url, ".jpeg");
												if ($nom) $ise = ".jpeg";
											}
										if (!$nom) {
											$nom = strrpos($url, ".png");
											if ($nom) $ise = ".png";
										}	
										if (!$nom) {
											$nom = strrpos($url, ".PNG");
											if ($nom) $ise = ".png";
										}
										if (!$nom) {
											$nom = strrpos($url, ".gif");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".GIF");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".bmp");
											if ($nom) $ise = ".bmp";
										}
										if (!$nom) {
											$nom = strrpos($url, ".BMP");
											if ($nom) $ise = ".bmp";
										}
				
										$a = strlen($url);
										if (!$nom or $a - $nom > 5) {
											$se = $ise;
											$nom = $a;
										} else $se = substr($url, $nom);	
										$app = '';
										if (!empty($seo_data['prod_photo'])) {
											$data['name'] = '';
											if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
											$data['category'] = '';
											if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
											$data['manufacturer'] = '';
											if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = trim($row[$manuf]);
											$data['model'] = '';
											if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
											$data['brand'] = '';
											if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
											$data['sku'] = '';
											if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
											$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
											$app = $this->TransLit($app);
											$app = strtolower($app);
										}
										if (empty($app)) {
											$app = substr($url, 0, $nom);
											$nom = strpos($app, ".");
											$app = substr($app, $nom+7);
											$app = $this->TransLit($app);
											$nom = strlen($app);
											if ($nom > 250) $app = substr($app, $nom-250, 250);
											if ($nom < 2) $app = rand(0, 999999999);								
											$app = $this->MetaURL($app);
										}								
								
										if (!empty ($pic_int[$i]))	{
											$spath = "../image/data/" .$pic_int[$i]."/";
											if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
											else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
											$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
											if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
											else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
										} else {
											$path = "../image/data/photo/";											
											$pic_addr = "data/photo/".$app.$se;											
										}
										if ((!isset($spath) or empty($spath)) and !$idcat) {
											$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Set, please, folder for photo on the page 'Category and margin'  \n";
											$this->adderr($err);
											break;
										}	
										if (!is_dir($path)) {
											if (!@mkdir($path, 0755)) {								
												$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $path. ", create it manually \n";
												$this->adderr($err);
												break;
											}
										}
										$path = $path.$app.$se;										
										if (!file_exists($path)) {
											$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);	
											if (!$this->isPicture($pict)) {
												$err =  " Download photo for Option, fails. Row ~= " . $row_count ." Url = ". $url . " Column = " . $foto[$j] . " \n";
												$this->adderr($err);
												$pic_addr = '';
											} else {
												$bytes = @file_put_contents($path, $pict);
												if (!$bytes) {
													$bytes = @file_put_contents($spath, $pict);
													$pic_addr = $spic_addr;
												}	
											} 
										}
									}	
									$option_foto[$x] = $pic_addr;				
								}	
							}
							$e = 0;
							if ((empty($opt_val[$l]) and !isset($opt_val[$l+1]) and !$optsku) or ($optsku and $l > 0) or (isset($row[$art[$j]]) and !isset($opt_art[$l]))) break;			
							
							$data_option['op_val_id'] = 0;
							$opt_val[$l] = trim($opt_val[$l]);
							$opt_val[$l] = str_replace("+-=6", "&quot;", $opt_val[$l]);
							if ($option_id[$j]) {
								$rows = $this->getOptionsById($option_id[$j]);	
								if (!empty($rows) and isset($opt_val[$l]) and !empty($opt_val[$l])) {	
									foreach ($rows as $r) {		
										if ((string)$r['name'] == $opt_val[$l]) {	
											$e = 1;											
											$data_option['op_val_id'] = $r['option_value_id'];
											break;
										}	
									}
								}							
							}	
							if (!$e and $option_id[$j]) {
								if ($addopt and !empty($opt_val[$l])) {
									$this->addValue($option_id[$j], $ovid, $option_foto[0], $upOptionFoto);
									$this->addValueDescription($option_id[$j], $ovid, $opt_val[$l], $langs);								
									$data_option['op_val_id'] = $ovid;
									$report = $report." Option value ".$opt_val[$l]." has been added";
								}
							}
						
							if ($e and $upOptionFoto == '1' and !empty($option_foto[0])) {
								$this->upOptionFoto($option_id[$j], $data_option['op_val_id'], $option_foto[0]);
								$option_foto[0] = '';
							}	
							
							if (isset($opt_val[$l])) $data_option['opt'] = $opt_val[$l];
	
							$data_option['ko'] = 0;
							$data_option['koj'] = 0;
							if (isset($opt_ko[$l])) {
								$opt_ko[$l] = trim($opt_ko[$l]);
								$quop = 0;
								$newstatusop = 0;
								$emptop = 0;
								$row1[1] = $opt_ko[$l];
								$this->getQuantity($row1, 1, $my_qu, $quop, $newstatusop, $emptop);				
								
								$data_option['ko'] = $quop;
								$data_option['koj'] = $quop;
							}	
												
							if (!$optsku) {
								$pp = 0;
								for ($u=0; $u<$ks+1; $u++) {	
									if (isset($same_opt[$u]['opt']) and !empty($same_opt[$u]['opt']) and $same_opt[$u]['opt'] == $data_option['opt']) {	
										$same_opt[$u]['ko'] = $same_opt[$u]['ko']+$data_option['ko'];
										$pp = 1;
										break;
									}
								}
							
								if (!$pp and !empty($data_option['opt'])) {
									$ks++;								
									$same_opt[$ks]['opt'] = $data_option['opt'];								
									$same_opt[$ks]['ko'] = $data_option['ko'];
								} elseif (isset($same_opt[$u]['ko'])) $data_option['ko'] = $same_opt[$u]['ko'];
							}
	
							$data_option['optsku'] = '';						
							if (isset($opt_art[$l])) $data_option['optsku'] = $opt_art[$l];							
							elseif ($optsku) $data_option['optsku'] = $o_optsku;
							
							$data_option['pr'] = '';
							$data_option['pr_prefix'] = '=';
							if (empty($prro[$j])) $data_option['pr_prefix'] = '+';
							if (isset($opt_pr[$l]) and !empty($prro[$j])) {
								$opt_pr[$l] = trim($opt_pr[$l]);
								$e = substr($opt_pr[$l], strlen($opt_pr[$l])-1, 1);	
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') {
									$data_option['pr_prefix'] = $e;								
									$b = substr($opt_pr[$l], 0, strlen($opt_pr[$l])-1);									
								} else {
									$b = $opt_pr[$l];								
									$e = '=';
									$data_option['pr_prefix'] = $e;								
								}	
							
								if (!empty($opt_pref[$j])) {
									$data_option['pr_prefix'] =  $opt_pref[$j];
									$e = $opt_pref[$j];									
								}	
								if (preg_match('/^[0-9.,Ee+-]+$/', $b)) {
									$data_option['pr'] = str_replace("," , ".", $b);							
									if ($e == '=' and !$same_column) $data_option['pr'] = $data_option['pr']*$rate;
									if ($opt_margin[$j] and $plus and $e == '=' and !$same_column) $data_option['pr'] = $data_option['pr']+($data_option['pr']*$plus/100);
									if ($opt_margin[$j] and $plus and $e == '=' and $same_column) $data_option['pr'] = $row_product[0]['price'];
									$data_option['pr'] = $this->convertPrice($data_option['pr']);											
								}	
							}
														
							$data_option['po'] = 0;
							$data_option['po_prefix'] = '=';
							if (isset($opt_po[$l])) {
								$opt_po[$l] = trim($opt_po[$l]);
								$e = substr($opt_po[$l], strlen($opt_po[$l])-1, 1);
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') 
								{	
						 	        $data_option['po_prefix'] = $e;							
									$b = substr($opt_po[$l], 0, strlen($opt_po[$l])-1);									
							    } else $b = substr($opt_po[$l], 0, strlen($opt_po[$l]));						
							    if (preg_match('/^[0-9.,Ee+-]+$/', $b)) $data_option['po'] = str_replace("," , ".", $b);
															
							}						
							
							$data_option['we'] = 0;
							$data_option['we_prefix'] = '=';
							if (isset($opt_we[$l])) {
								$opt_we[$l] = trim($opt_we[$l]);
								$e = substr($opt_we[$l], strlen($opt_we[$l])-1, 1);
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') 
								{ 	
							      $data_option['we_prefix'] = $e;								
								  $b = substr($opt_we[$l], 0, strlen($opt_we[$l])-1);
								} else  $b = substr($opt_we[$l], 0, strlen($opt_we[$l])); 
								if (preg_match('/^[0-9.,Ee+-]+$/', $b)) $data_option['we'] = str_replace("," , ".", $b);		
							}							
							
							if (!$yes_option) $report = $report." Product options updated ";						
							$yes_option = 1;							
							$data_option['option_required'] = $option_required[$j];
							$uu = 0;
							if (isset($row[$usd])) $uu = $row[$usd];
							$prod_opt_val_id = 0;
							$this->upProductOption($row_product[0]['product_id'], $option_id[$j], $data_option, $minus, $ad, $option_type[$j], $my_price, $usd, $uu, $option_foto, $prod_opt_val_id, $upOptionFoto, $mas_prod_opt_val_id);
							
							for ($i1=0; $i1<900; $i1++) {
								if (!isset($mas_prod_opt_val_id[$i1]['prod_id'])) break;
								$mas_nozero[$nozero_index]['prod_id'] = $mas_prod_opt_val_id[$i1]['prod_id'];				
								$nozero_index++;								
							}
							
							if ($option_type[$j] == 'select' or $option_type[$j] == 'radio' or $option_type[$j] == 'image' or $option_type[$j] == 'checkbox') {
								$mas_opt[$jj][$l][0] = $row_product[0]['product_id'];
								$mas_opt[$jj][$l][1] = $option_id[$j];
								$mas_opt[$jj][$l][2] = $data_option['op_val_id'];
								if (!$data_option['op_val_id'] and isset($mas_prod_opt_val_id[0]['val_id'])) $mas_opt[$jj][$l][2] = $mas_prod_opt_val_id[0]['val_id'];
								$mas_opt[$jj][$l][3] = $ko[$j];
								$mas_opt[$jj][$l][4] = $data_option['koj'];							
								$mas_opt[$jj][$l][5] = $data_option['pr'];							
								$mas_opt[$jj][$l][6] = $data_option['we_prefix'];							
								$mas_opt[$jj][$l][7] = $data_option['we'];
								$mas_opt[$jj][$l][8] = $data_option['optsku'];
								$mas_opt[$jj][$l][9] = $data_option['pr_prefix'];
		
								if (isset($summa_product_options)) $summa_product_options = $summa_product_options+$data_option['ko'];
	
								$jj++;
							}
						}	
					}
					if (!isset($i1)) $i1 = 0;
				
						if ($optsku and $i1 > 1) {
							for ($l=0; $l<900; $l++) {
								for ($j=1; $j<=$jj; $j++) {
									if (!isset($mas_opt[$j][$l][0])) continue;
									for ($ii=0; $ii<900; $ii++) {
										if (!isset($mas_prod_opt_val_id[$ii]['val_id'])) break;
										if ($mas_opt[$j][$l][8] == $mas_prod_opt_val_id[$ii]['optsku'] and 
											$mas_opt[$j][$l][1] == $mas_prod_opt_val_id[$ii]['opt'] and !empty($mas_prod_opt_val_id[$ii]['val_id'])) {
											
											$mas_opt[$j][$l][2] = $mas_prod_opt_val_id[$ii]['val_id'];
											$mas_prod_opt_val_id[$ii]['val_id'] = 0;
										}
									}	
								}						
							}
						}
						unset($mas_prod_opt_val_id);
						for ($l=0; $l<900; $l++) {
							$gr_data = array();
							$n = 0; $a = ''; $b = '';	
							for ($j=1; $j<=$jj; $j++) {
								if (!isset($mas_opt[$j][$l][0])) continue;
								$m = 0;
								for ($k=1; $k<=$jj; $k++) {
									if (!isset($mas_opt[$k][$l][0])) continue;
									if (!empty($mas_opt[$j][$l][2]) and $mas_opt[$j][$l][3] == $mas_opt[$k][$l][3] and $j != $k and $a != $mas_opt[$j][$l][1] and $b != $mas_opt[$j][$l][2]) {								
										$a = $mas_opt[$j][$l][1];
										$b = $mas_opt[$j][$l][2];
										$n++;
										$m++;
										$gr_data[$n][0] = $l;
										$gr_data[$n][1] = $row_product[0]['product_id'];
										$gr_data[$n][2] = $mas_opt[$j][$l][1];
										$gr_data[$n][3] = $mas_opt[$j][$l][2];
										$gr_data[$n][4] = $mas_opt[$j][$l][4];
										$gr_data[$n][5] = $mas_opt[$j][$l][5];
										$gr_data[$n][6] = $mas_opt[$j][$l][6];
										$gr_data[$n][7] = $mas_opt[$j][$l][7];
										$gr_data[$n][8] = $mas_opt[$j][$l][8];
										$gr_data[$n][9] = $mas_opt[$j][$l][9];
									}
								}
							}
	
							if ($n>1) {
								$jopt = 1;
								$summa_options = $summa_options + $gr_data[1][4]*($n-1);
								$this->jOption($gr_data, $ad);
								unset($gr_data);							
							}
						}
				
				}
				unset($mas_opt);				
				
				if ($yes_option and (!$ismain or ($ismain and $main and $equ))) {
					if ($jopt ) {					
						$row_product[0]['quantity'] = $summa_options;						
						if (!$summa_options) $row_product[0]['quantity'] = $quantity + 0;
					} else $row_product[0]['quantity'] = $quantity;		
				}				
				
				if ($sorder and isset($row[$sorder]) and !empty($row[$sorder]) and $price_changed and $quantity != '')
					$row_product[0]['sort_order'] = $row[$sorder];
				elseif (($price_changed or $yes_option or $quantity_changed) and $quantity and $row_product[0]['sort_order'] > 999) $row_product[0]['sort_order'] = $row_product[0]['sort_order'] - 1000;
				
				$stat = $row_product[0]['stock_status_id'];
				if ($newstatus) $stat = $newstatus;
				if (!empty($termin) and !empty($row[$termin]) and !empty($t_status) and (!$ismain or ($ismain and $main and $equ))) {
					$term = (int)trim($row[$termin]);
					$pj = explode(",", $t_status);
					for ($j=0; $j<20; $j++) {		
						if (!isset($pj[$j])) break;
						if (!substr_count($pj[$j], "=")) break;		
						$p = strpos($pj[$j], '=');						
						$q = substr($pj[$j], 0, $p);						
						$q = (int)trim($q);						
						if ($q == $term) {
							$stat = substr($pj[$j], $p+1);
							if (!preg_match('/^[0-9]+$/', $stat)) break;
							$stat = (int)trim($stat);
						}					
					}				
				}
				if ($ad != 4 and $ad != 12) $row_product[0]['stock_status_id'] = $stat;
				
				if ($yml) {
					$updte = 2;
					$upname = 1;					
				}
				
				$yes = 0;
				$rating_old =0;
				$l_old = 0;				
				$row_product[0]['description'] = '';
				$rows = $this->getProductDesc($row_product[0]['product_id']);				
				if (!empty($rows)) {					
					$row_product[0]['item'] = $rows[0]['name'];					
					$row_product[0]['description'] = $rows[0]['description'];
					if (substr_count($rows[0]['description'], "<br")) $rating_old++;
					if (substr_count($rows[0]['description'], "<strong")) $rating_old++;
					if (substr_count($rows[0]['description'], "<em")) $rating_old++;					
					if (substr_count($rows[0]['description'], "<b")) $rating_old++;
					if (substr_count($rows[0]['description'], "<li")) $rating_old++;
					$l_old = strlen($rows[0]['description']);					
				}	
				if (($updte > 1 or $upname or $upurl) and $ad != 2 and $ad != 4){
					$text = "";
					$pname = "";					
					if ($descrip == 'descrip' and $updte > 1) {
						$d = $row[$descrip];
						$rating_new =0;						
						if (substr_count($d, "<br")) $rating_new++;
						if (substr_count($d, "<strong")) $rating_new++;
						if (substr_count($d, "<em")) $rating_new++;						
						if (substr_count($d, "<b")) $rating_new++;
						if (substr_count($d, "<li")) $rating_new++;
						$l_new = strlen($d);						
						if ($l_old > $l_new) $rating_old++;
						if ($l_old < $l_new) $rating_new++;
							
						if ($updte == 3 and (empty($row_product[0]['description']) or $rating_new > $rating_old)) {		
							$row_product[0]['description'] = $d;
							$yes = 1;
						}
						if ($updte == 2 and !empty($row[$descrip])) {
							if ($yml) {															
								if (!empty($d) and !empty($rows[0]['description']) and !substr_count($rows[0]['description'], $d)) $row_product[0]['description'] = $rows[0]['description']. "<br />" . $d;
								else $row_product[0]['description'] = $d;
							} else {
								if ($ddesc) {
									if ($ddesc == 1) {
										$dd = $row_product[0]['description'];
										$row_product[0]['description'] = $d . "<br />" . $dd;
									}
									if ($ddesc == 2) $row_product[0]['description'] = $row_product[0]['description'] . "<br />" . $d;
								} else $row_product[0]['description'] = $d;
							}	
							$yes = 1;	
						}						
					}
					if (!empty($descrip) and $descrip != 'descrip' and isset($row[$parsd]) and !$yml) {					
						$url = $this->checkurl($row[$parsd]);
						if ($url != -1) {							
							if ($updte > 1) {												
								if (strlen($ht) < 1024 or $parsed != $parsd) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
								if (strlen($ht) > 1024) {
									$parsed = $parsd;									
									$text = $this->ParsDescription($ht, $descrip, $pointd, $placed, $row_count, $url, $sleep, $ffile, $photo_desc);
									if (strlen($text) < 10) $text = '';
								} else {
									$parsed = '';
									$err =  " Parsing description error: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
									$this->adderr($err);										
								}
							}	
						}	
					}					
					
					if (preg_match('/^[0-9,]+$/', $item) and $upname )  {	
						$a = '';
						if (substr_count($item, ",")) {
							$items = explode(",", $item);
							for ($j=0; $j<10; $j++) {
								if (!isset($items[$j])) break;
								if (!empty($row[$items[$j]])) $a = $a . " " . $row[$items[$j]];
							}							
						} else $a = $row[$item];
						if (!empty($a)) {
							$row_product[0]['item'] = trim($this->getName($a));
							if (!$yml or ($yml and $upname)) $report = $report."Product name updated ";
						} else 	if (!$yml) $report = $report."Product name has not been updated ";
					}
					
					if (!empty($item) and !preg_match('/^[0-9,]+$/', $item) and ($upname or $upurl) and isset($row[$parsi])) {
						$url = $this->checkurl($row[$parsi]);
						if ($url != -1) {							
							if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
							if (strlen($ht) > 1024) {
								$parsed = $parsi;
								$pname = $this->ParsName($ht, $item, $pointi, $placei);
								if (strlen($pname) < 2) {
									$err =  " Parsing Product Name error: Row ~= " . $row_count . " url = ". $url. " Product Name has not been updated \n";
									$this->adderr($err);
									$pname = "";
								}	
							} else {									
								$err =  " Parsing Product Name error: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
								$this->adderr($err);								
							}	
											
							if (!empty($pname)) {
								$row_product[0]['item'] = $pname;
								$report = $report."Product name parsed and updated ";
							} else $report = $report."Product name has not been parsed ";
						}					
					}						
					
					if (!empty($my_descrip) and empty($text) and !$yes and !$yml) {
						if (!empty($my_descrip)) $row_product[0]['description'] = $my_descrip;						
						$report = $report."Description set by default ";
					} else {
						if (empty($my_descrip) and empty($text) and !$yes and !$yml) {
							$row_product[0]['description'] = '';
							$report = $report."No Description ";
						} else {						
							if (!$yes and !empty($text) and !$yml) {											
								if ($ddesc == 1) $text = $text . "<br />" . $row_product[0]['description'];
								if ($ddesc == 2) $text = $row_product[0]['description'] . "<br />". $text;			
							}
							if (!empty($text) and !$yml) {
								$rating_new =0;						
								if (substr_count($text, "<br")) $rating_new++;
								if (substr_count($text, "<strong")) $rating_new++;
								if (substr_count($text, "<em")) $rating_new++;							
								if (substr_count($text, "<b")) $rating_new++;
								$l_new = strlen($text);
								if ($l_old > $l_new) $rating_old++;
								else $rating_new++;
						
								if ($updte == 3 and ($rating_new > $rating_old or empty($row_product[0]['description']))) {
									$row_product[0]['description'] = $text;
									$report = $report."Description parsed and updated ";
								}								
								if ($updte == 2) {
									$row_product[0]['description'] = $text;
									$report = $report."Description parsed and updated ";
								}	
							} else {
								if ($yml and isset($ymldsc) and !$ymldsc) {
									$report = $report."Description updated ";
									$ymldsc = 1;
								}
								if (!$yml) $report = $report."Description updated ";
							}	
						}					
					}
				}
	
				$pictures = array();
				$pi = explode(",", $pic_ext);
				if (!empty($parsk) and !preg_match('/^[0-9,]+$/', $pic_ext)) $pictures[0] = $parsk;					
				else $pictures = $pi;				
	
				$nojpg = 0;				
				if ($newphoto > 1 and $ad != 2 and $ad != 4) {
					if ($newphoto == 4) $this->deleteProductImage($row_product[0]['product_id']);
					for ($k=0; $k<$np; $k++) {
						if (!isset($pictures[$k])) break;		
						$pic = $pictures[$k];		
						if (isset($row[$pic]) and !empty ($row[$pic])) {
							$url = $row[$pic];
							if (substr_count($url, "/")) $url = $this->checkurl($url);	
							if ($url == -1) continue;								
							$url = str_replace("&#45;", "-", $url);
							$url = str_replace("&amp;", "&", $url);			
						} else {
							if ($k == 0) {
								$url = $this->checkurl($my_photo);
								$url = str_replace("&#45;", "-", $url);
								$url = str_replace("&amp;", "&", $url);
							} else continue;
						}	
						$rout = 0;
						$a = strlen($url)-6;
						$en = substr($url, $a);
						if (!substr_count($url, "/") and (stripos($en, '.jpg') or stripos($en, '.png') or stripos($en, '.jpeg') or stripos($en, '.gif') or stripos($en, '.bmp'))) {	
							$ise = ".jpg";
							$nom = stripos($url, ".jpg");
							if (!$nom) {
								$nom = strrpos($url, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($url, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($url, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($url, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($url, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($url);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($url, $nom);
							$app = '';
							if (!empty($seo_data['prod_photo'])) {
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = trim($row[$manuf]);
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}	
							if (empty($app)) {
								$app = substr($url, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom);
								$app = $this->TransLit($app);							
								$app = $this->MetaURL($app);
							}

							$try = "../image/data/temp/".$url;
							if (file_exists($try)) {						
								if (!empty ($pic_int[$i]))	{
									$spath = "../image/data/" .$pic_int[$i]."/";
									if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
									else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
									$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
									if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
									else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;
								} else {
									$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
									$this->adderr($err);
									continue;
								}		
								if (!is_dir($spath)) {
									if (!@mkdir($spath, 0755)) {								
										$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
										$this->adderr($err);
										continue;
									}
								}								
								if (!is_dir($path)) @mkdir($path, 0755);								
								$path = $path.$app.$se;	
								$a = @copy ($try, $path);
								if (!$a) {
									$err =  " Can not copy file from: " . $try . " to: " . $path . " Set chmod 0755 or 0777 for folder: " . $spath . " \n";
									$this->adderr($err);
								}	
								if ($a) {								
									$met = 0;		
									if ((!$yml and ($k == 0 and $newphoto != 6)) or ($yml and empty($row_product[0]['image']))) { 	   	
									    $row_product[0]['image'] = $pic_addr;
										$met = 1;
									}
									$rout = 1;
									if ((!$yml and ($k>0 or $newphoto == 6)) or (!$met and $yml and !empty($row_product[0]['image']) and $newphoto == 6)) {
										$rows = $this->getProductImage($row_product[0]['product_id']);
										$e = 1;										
										foreach ($rows as $p) {
											if ($p['image'] == $pic_addr) $e = 0;
										}	
										if ($e and !empty($pic_addr)) $this->addPicture($row_product[0]['product_id'], $pic_addr, $k);				
									}	
								} else if ($k==0 and $newphoto != 6 and $my_photo) $url = $this->checkurl($my_photo);
							} else {
								$err =  " Photo not found: Row ~= " . $row_count . " SKU = " . $row[$cod] . " folder: " . $try . " \n";
								$this->adderr($err);								
							}	
						}
						
						if ($rout) $report = $report."Photo updated ";	
					
						if (!$rout) {
							$pars = 0;
							$a = strlen($url)-6;
							$en = substr($url, $a);						
							
							if (substr_count($url, "/") and strlen($url) > 12 and !stripos($en, '.jpg') and !stripos($en, '.png') and !stripos($en, '.jpeg') and !stripos($en, '.gif') and !stripos($en, '.bmp') and $url != -1 and $k == 0 and $parsk) $pars = 1;
							
							$save = $row_product[0]['image'];														
							if ($pars) {									
								$fname = "photo";
								$marks = explode(",", $my_mark);								
								for ($j=0; $j<20; $j++) {
									if (!isset($marks[$j])) break;
									if (!empty($marks[$j])) {
										$fname = $marks[$j];
									} else {						
										if (isset($row[$manuf]) and !empty($row[$manuf])) {
											$fname = trim($row[$manuf]);											
											$fname = substr($fname, 0, 16);
										}
									}										
									$nojpg = 1;							
									$seeks = explode(",", $warranty);
									if (!isset($seeks[$j]) or empty($seeks[$j])) break;								
									$seek = $seeks[$j];															
									
									if (strlen($ht) < 1024 or $parsed != $parsk) {	
										$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);	
										if (strlen($ht) > 1024) $parsed = $parsk;
										else {
											$parsed = '';
											$err =  " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
											$this->adderr($err);												
											break;
										}	
									}									
									$key = '';														
									$urlp = $this->ParsPic($ht, $url, $key, $seek, $fname, $pic_ext);		
									$urlp = $this->checkurl($urlp);
									if ($urlp == -1) {
										$err =  " Photo not parsed: Row ~= " . $row_count . " url = ". $urlp. " Photo number " . $j . " \n";
										$this->adderr($err);
										continue;								
									}							
		
									$ise = ".jpg";
									$nom = stripos($urlp, ".jpg");
									if (!$nom) {
										$nom = strrpos($urlp, ".jpeg");
										if ($nom) $ise = ".jpeg";
									}
									if (!$nom) {
										$nom = strrpos($urlp, ".png");
										if ($nom) $ise = ".png";
									}	
									if (!$nom) {
										$nom = strrpos($urlp, ".PNG");
										if ($nom) $ise = ".png";
									}
									if (!$nom) {
										$nom = strrpos($urlp, ".gif");
										if ($nom) $ise = ".gif";
									}
									if (!$nom) {
										$nom = strrpos($urlp, ".GIF");
										if ($nom) $ise = ".gif";
									}
									if (!$nom) {
										$nom = strrpos($urlp, ".bmp");
										if ($nom) $ise = ".bmp";
									}
									if (!$nom) {
										$nom = strrpos($urlp, ".BMP");
										if ($nom) $ise = ".bmp";
									}
				
									$a = strlen($urlp);
									if (!$nom or $a - $nom > 5) {
										$se = $ise;
										$nom = $a;
									} else $se = substr($urlp, $nom);
	
									$app = '';
									if (!empty($seo_data['prod_photo'])) {
										$data['name'] = '';
										if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
										$data['category'] = '';
										if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
										$data['manufacturer'] = '';
										if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = trim($row[$manuf]);
										$data['model'] = '';
										if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
										$data['brand'] = '';
										if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
										$data['sku'] = '';
										if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
										$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
										$app = $this->TransLit($app);
										$app = strtolower($app);
									}
									if (empty($app)) {
										$app = substr($urlp, 0, $nom);
										$nom = strpos($app, ".");
										$app = substr($app, $nom+7);
										$app = $this->TransLit($app);
										$nom = strlen($app);										
										if ($nom > 250) $app = substr($app, $nom-250, 250);
										if ($nom < 2) $app = rand(0, 999999999);									
										$app = $this->MetaURL($app);
									}
	
									if (!empty ($pic_int[$i]))	{
										$spath = "../image/data/" .$pic_int[$i]."/";
										if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
										else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
										$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
										if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
										else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
									} else {
										$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
										$this->adderr($err);
										continue;
									}
									
									if (!is_dir($spath)) {
										if (!@mkdir($spath, 0755)) {								
											$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
											$this->adderr($err);
											continue;
										}
									}
									if (!is_dir($path)) @mkdir($path, 0755);
									$path = $path.$app.$se;								
									if ($j == 0 and $newphoto != 6) $row_product[0]['image'] = $pic_addr;
									if (!file_exists($path)) {											
										$pict = $this->curl_get_contents($urlp, 1, $sleep, $ffile);
										if (!$this->isPicture($pict)) {
											if ($j == 0) $row_product[0]['image'] = $save;							
											$err =  " Download photo fails. Row ~= " . $row_count ." Url = ". $urlp . " \n";
											$this->adderr($err);											
										} else {	
											if ($newphoto == 2 or $newphoto == 4 or $newphoto == 6) {
												$bytes = @file_put_contents($path, $pict);
												if (!$bytes) {
													$bytes = @file_put_contents($spath, $pict);
													$pic_addr = $spic_addr;
												}												
											}
											if ($newphoto == 3) {
												$yes = 0;
												$temp = "../image/data/temp/temp".$se;
												$bytes = @file_put_contents($temp, $pict);
												if ($bytes and @getimagesize($temp)) {
													$sizen = @getimagesize($temp);
													$vol = filesize($temp);
													$pn = $vol/$sizen[0]/$sizen[1];
													$pn = round($pn, 2);												
													$old = "../image/".$save;
													if (file_exists($old) and @getimagesize($old)) {
														$sizeo = @getimagesize($old);
														$vol = filesize($old);
														$po = $vol/$sizeo[0]/$sizeo[1];
														$po = round($po, 2);
														$maxn = $sizen[0];
														if ($maxn < $sizen[1]) $maxn = $sizen[1];
														$maxo = $sizeo[0];
														if ($maxo < $sizeo[1]) $maxo = $sizeo[1];
														$rn = $maxn/$maxo + sqrt($pn/$po);
														$ro = $maxo/$maxn + sqrt($po/$pn);
														if ($rn >= $ro) $yes = 1;
													} else $yes = 1;
														
													if ($yes) {
														$a = @copy ($temp, $path);
														if (!$a) {
															$a = @copy ($temp, $spath);
															$pic_addr = $spic_addr;
														}	
													} else if ($j == 0) $row_product[0]['image'] = $save;
														
												} else {														
													$err =  " Please, create folder image/data/temp" . "\n";
													$this->adderr($err);
													if ($j == 0) $row_product[0]['image'] = $save;
												}
											}
											if ($j>0 or $newphoto == 6) {
												if ($bytes) {
													$rows = $this->getProductImage($row_product[0]['product_id']);
													$e = 1;
													if (!empty ($rows)) {	
														foreach ($rows as $p) {
															if ($p['image'] == $pic_addr) $e = 0;
														}
													}	
													if ($e and !empty($pic_addr)) $this->addPicture($row_product[0]['product_id'], $pic_addr, $j);
												}
											} else {												
												if (!$bytes) {											
													$row_product[0]['image'] = $save;									
													$err =  " Photo has not been updated  Url: ". $urlp . " Row = ".$row_count." Folder: ". $path . " is bad \n";
													$this->adderr($err);
												} else $report = $report."Photo updated ";
											}	
										}
									} else {		
										if ($j>0 or $newphoto == 6) {
											$rows = $this->getProductImage($row_product[0]['product_id']);
											$e = 1;
											if (!empty ($rows)) {	
												foreach ($rows as $p) {
													if ($p['image'] == $pic_addr) $e = 0;
												}
											}
											if ($e and !empty($pic_addr)) {
												$this->addPicture($row_product[0]['product_id'], $pic_addr, $j);
												$report = $report."Additional photo added ";
											} 	
										} else $row_product[0]['image'] = $pic_addr;									
									}		
								}
							} else {							
								$ise = ".jpg";
								$nom = stripos($url, ".jpg");
								if (!$nom) {
									$nom = strrpos($url, ".jpeg");
									if ($nom) $ise = ".jpeg";
								}
								if (!$nom) {
									$nom = strrpos($url, ".png");
									if ($nom) $ise = ".png";
								}	
								if (!$nom) {
									$nom = strrpos($url, ".PNG");
									if ($nom) $ise = ".png";
								}
								if (!$nom) {
									$nom = strrpos($url, ".gif");
									if ($nom) $ise = ".gif";
								}
								if (!$nom) {
									$nom = strrpos($url, ".GIF");
									if ($nom) $ise = ".gif";
								}
								if (!$nom) {
									$nom = strrpos($url, ".bmp");
									if ($nom) $ise = ".bmp";
								}
								if (!$nom) {
									$nom = strrpos($url, ".BMP");
									if ($nom) $ise = ".bmp";
								}
				
								$a = strlen($url);
								if (!$nom or $a - $nom > 5) {
									$se = $ise;
									$nom = $a;
								} else $se = substr($url, $nom);
								$app = '';
								if (!empty($seo_data['prod_photo'])) {
									$data['name'] = '';
									if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
									$data['category'] = '';
									if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
									$data['manufacturer'] = '';
									if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = trim($row[$manuf]);
									$data['model'] = '';
									if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
									$data['brand'] = '';
									if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
									$data['sku'] = '';
									if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
									$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
									$app = $this->TransLit($app);
									$app = strtolower($app);
								}
								if (empty($app)) {
									$app = substr($url, 0, $nom);
									$nom = strpos($app, ".");
									$app = substr($app, $nom+7);
									$app = $this->TransLit($app);
									$nom = strlen($app);
									if ($nom > 250) $app = substr($app, $nom-250, 250);
									if ($nom < 2) $app = rand(0, 999999999);									
									$app = $this->MetaURL($app);
								}
								
								if ($newphoto != 5) {
									if (!empty ($pic_int[$i]))	{
										$spath = "../image/data/" .$pic_int[$i]."/";
										if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
										else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
										$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
										if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
										else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
									} else {
										if (!$yml) {
											$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
											$this->adderr($err);
											continue;
										} else {
											$path = "../image/data/photo/";											
											$pic_addr = "data/photo/".$app.$se;
										}	
									}
									if ((!isset($spath) or empty($spath)) and !$idcat) {
										$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Set, please, folder for photo on the page 'Category and margin'  \n";
										$this->adderr($err);
										continue;
									}
									if (!is_dir($path)) {
										if (!@mkdir($path, 0755)) {								
											$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $path. ", create it manually \n";
											$this->adderr($err);
											break;
										}
									}
								} else {
									$pic_addr = '';
									if (!empty($url)) {										
										$link = $this->symbol($url);													
										if (substr_count($link, "data/")) {
											$nom = strpos($link, "data/");		
											$link = substr($link, $nom);
											$pic_addr = $link;		
										}
									}	
								}	
							}
							
							if (!$pars) {	
								if ($newphoto != 5) $path = $path.$app.$se;	
								$pyml = 0;
								if (($k == 0 and !$yml and $newphoto != 6) or ($yml and empty($row_product[0]['image']))) {
									if ($newphoto == 5) {
										$pic_addr = str_replace("%25%20", " ", $pic_addr);
										$pic_addr = str_replace("%20", " ", $pic_addr);
										$pa = "../image/" . $pic_addr;
										if (file_exists($pa)) {
											$row_product[0]['image'] = $pic_addr;
											$pyml = 1;
										}
									} else {	
										$row_product[0]['image'] = $pic_addr;
										$pyml = 1;
									}	
								}	
								if (!file_exists($path) and $newphoto != 5) {
									$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);
									if (!$this->isPicture($pict)) {
										if ($k == 0) $row_product[0]['image'] = $save;									
										if (!$yml) {
											$err =  " Download photo fails. Row ~= " . $row_count ." Url = ". $url . " Column = " . $pic . " \n";
											$this->adderr($err);
										}	
									} else {
										if ($newphoto == 2 or $newphoto == 4 or $newphoto == 6) {
											$bytes = @file_put_contents($path, $pict);
											if (!$bytes) {
												$bytes = @file_put_contents($spath, $pict);
												$pic_addr = $spic_addr;
											}	
										} 
										if ($newphoto == 3) {
											$yes = 0;
											$temp = "../image/data/temp/temp".$se;
											$bytes = @file_put_contents($temp, $pict);
											if ($bytes and @getimagesize($temp)) {
												$sizen = @getimagesize($temp);
												$vol = filesize($temp);
												$pn = $vol/$sizen[0]/$sizen[1];
												$pn = round($pn, 2);												
												$old = "../image/".$save;
												if (file_exists($old) and @getimagesize($old)) {
													$sizeo = @getimagesize($old);
													$vol = filesize($old);
													$po = $vol/$sizeo[0]/$sizeo[1];
													$po = round($po, 2);
													$maxn = $sizen[0];
													if ($maxn < $sizen[1]) $maxn = $sizen[1];
													$maxo = $sizeo[0];
													if ($maxo < $sizeo[1]) $maxo = $sizeo[1];
													$rn = $maxn/$maxo + sqrt($pn/$po);
													$ro = $maxo/$maxn + sqrt($po/$pn);
													if ($rn >= $ro) $yes = 1;
												} else $yes = 1;
												
												if ($yes) {
													$a = @copy ($temp, $path);
													if (!$a) {
														$a = @copy ($temp, $spath);
														$pic_addr = $spic_addr;
													}	
												} else if ($k == 0) $row_product[0]['image'] = $save;
													
											} else {														
												$err =  " Please. create folder image/data/temp" . "\n";
												$this->adderr($err);
												if ($k == 0) $row_product[0]['image'] = $save;
											}
										}
										if ((!$yml and ($k>0 or $newphoto == 6)) or ($yml and !$pyml)) {
											if ($bytes) {
												$rows = $this->getProductImage($row_product[0]['product_id']);
												$e = 1;
												if (!empty ($rows)) {	
													foreach ($rows as $p) {
														if ($p['image'] == $pic_addr) $e = 0;
													}
												}	
												if ($e and !empty($pic_addr)) $this->addPicture($row_product[0]['product_id'], $pic_addr, $k);
											}
										} else {
											if (!$bytes) {
												$row_product[0]['image'] = $save;										
												$err =  " Photo has not been updated  Url: ". $url . " Row = ".$row_count." Folder: ". $path . " ist schlecht \n";
												$this->adderr($err);
											} else $report = $report."Photo updated ";
										}	
									}
								} else {		
									if ((!$yml and ($k>0 or $newphoto == 6)) or ($yml and !$pyml)) {	
										$rows = $this->getProductImage($row_product[0]['product_id']);
										$e = 1;
										if (!empty ($rows)) {	
											foreach ($rows as $p) {
												if ($p['image'] == $pic_addr) $e = 0;
											}
										}
										if ($newphoto == 5) {
											$pa = "../image/" . $pic_addr;
											if (!file_exists($pa)) $pic_addr = '';										
										}
										if ($e and !empty($pic_addr)) $this->addPicture($row_product[0]['product_id'], $pic_addr, $k);
									} else {
										$report = $report."Main photo replaced \n";
									}
								}								
							}				
						}				
					}
				}				
				
				$row_product[0]['category_id'] = '';
				if ($flag) $row_product[0]['category_id'] = $category_id[$i];					
				else if (!$yml) $row_product[0]['category_id'] = $my_cat;
	
				$row_product[0]['manufacturer_id'] = 0;
				$name = '';
				$row_product[0]['manuf_name'] = '';
				
				if (isset($row[$manuf]) and !empty ($row[$manuf])) $name = $this->getName($row[$manuf]);
				else {
					if ($my_manuf) {
						$rows = $this->getManufacturerName($my_manuf);
						if (!empty($rows)) $name = $rows[0]['name'];
					}	
				}				
				$row_product[0]['manuf_name'] = $name;
				
				if ($umanuf and $name) {
					$rows  = $this->getManufacturerID($name, $store);
					if(!empty($rows) and $rows[0]['manufacturer_id'] != 0) {
						$row_product[0]['manufacturer_id'] = $rows[0]['manufacturer_id'];
						$report = $report." Manufacturer updated \n";
					} else {
						if ($ad != 2 and $ad != 4) {
							$data['name'] = $name;
							$data['sort_order'] = '0';						
							$this->addManufacturer($data, $langs, $last_id, $seo_data, $store);
							$row_product[0]['manufacturer_id'] = $last_id;
							$report = $report."Manufacturer ".$this->symbol($name)." created and updated \n";						
						}
					}
				}				
				
				$yesno = 0;				
				if ($max_attr and $upattr and $ad != 2 and $ad != 4) {					
					$fl =0;
					$er = 0;
					$delfilter = 0;
					for ($j = 1; $j <= $max_attr; $j++) {
						$attname = '';
						$attvalue = '';
						if (isset($data)) unset($data);
						$data = array();
						$r = 0;
						$at = $attribute_id[$j];
						$col = explode(",", $attr_ext[$j]);
						if (!empty($col[0]) and preg_match('/^[0-9]+$/', $col[0])) {
							
							if (!$fl and $upattr == 1) {								
								$this->deleteAttribute($row_product[0]['product_id']);
								$fl = 1;
							}
							if (($at == 0 and !empty($row[$col[0]-1]) and !$yml) or ($at == 0 and !empty($row[$col[0]+1]) and $yml)) {
								
								if (!$yml) $attname = $this->getName($row[$col[0]-1]);
								else $attname = $this->getName($row[$col[0]+1]);
								if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $attvalue);
								$rows = $this->getAttributeID($attname);
							
								if (isset($rows[0]['attribute_id'])) $at = $rows[0]['attribute_id'];
	
								if (!$at and ($upattr == 1 or $upattr == 2 or $upattr == 5)) {
									$data['text1'] = $attname;								
									$data['text2'] = '';
									if (isset($col[1]) and !empty($col[1])) $data['text2'] = $this->getName($row[$col[1]-1]);
									$data['text3'] = '';
									if (isset($col[2]) and !empty($col[2])) $data['text3'] = $this->getName($row[$col[2]-1]);
									$this->createAttribute($data, $attID, $langs);
									$at = $attID;
									if ($at == 1.2) {
										$er = 1;
										break;
									}	
								} 
								if (!$at) continue;
							}
							if ($upattr == 4 and $at) {
								$rows = $this->getAttributeById($row_product[0]['product_id'], $at, $lang);
								if (empty($rows)) continue;
							}
							if (isset($row[$col[0]]) and $row[$col[0]] != '') {
								$t = $this->symbol($row[$col[0]]);
								if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);						
								$t = trim($t);
								$data['text1'] = $t;
								$t = '';
								if (isset($col[1]) and $row[$col[1]] != '') {
									$t = $this->symbol($row[$col[1]]);
									if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);
									$t = trim($t);
								}								
								$data['text2'] = $t;
								$t = '';
								if (isset($col[2]) and $row[$col[2]] != '') {
									$t = $this->symbol($row[$col[2]]);
									if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);
									$t = trim($t);
								}								
								$data['text3'] = $t;
								$data['product_id'] = $row_product[0]['product_id'];
								$data['attribute_id'] = $at;
								$this->putAttributeById($data, $upattr, $langs);
								$yesno = 1;
							}	
							if ($attribute_id[$j] and $filter_group_id[$j] and !empty($data)) {
								if (!$delfilter and $upattr == 1) {
									$this->deleteFilterProduct($row_product[0]['product_id']);
									$delfilter = 1;
								}	
								$filters = array();
								$this->CreateFilter($data, $filter_group_id[$j], $langs, $filters);
								if (!empty($filters)) $this->AttributeToFilter($row_product[0]['product_id'], $filters);				
							}	
						} else {											
							if (isset($row[$parsi])) $url = $this->checkurl($row[$parsi]);
							else $url = -1;
							if ($url != -1) {	
								if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);	
								if (strlen($ht) > 1024) {
									$parsed = $parsi;
									$text = array();
									$this->ParsAttribute($ht, $attr_ext[$j], $attr_point[$j], $text, $row_count, $url, $sleep, $ffile, $photo_att);
								} else {
									$parsed = '';
									$text = '';										
								}														
								if (!empty ($text)) {
									if (!$fl and $upattr == 1) {
										$this->deleteAttribute($row_product[0]['product_id']);
										$fl = 1;
									}				
									foreach ($text as $t) {
										if (empty ($t['name']) or $t['val'] == '') continue;
										if (isset($at) and !empty($at) and $t['name'] == 'noname') {
											$rows = $this->getAttributeName($at);
											$t['name'] = $rows[0]['name'];
										}
										if ($change_attribute) $this->changeAtt($masatt, $r, $t['name'], $attvalue);
										if (strlen((string)$t['name']) > 256) {
											$err =  " Attribute name: ". $t['name'] . " is too large. I cat it. \n";
											$this->adderr($err);
											$t['name'] = mb_substr($t['name'], 0, 256);
										}										
										$rows = $this->getAttributeID($t['name']);										
										if (isset($rows[0]['attribute_id'])) $at = $rows[0]['attribute_id'];
										else {
											if ($upattr == 1 or $upattr == 2 or $upattr == 5) {
												$data['text1'] = $t['name'];
												$data['text2'] = '';
												$data['text3'] = '';
												$this->createAttribute($data, $attID, $langs);
												$at = $attID;												
												if ($at) $report = $report." Attribute: ". $t['name'] . " created \n";
											} else continue;
										}
										if ($upattr == 4 and $at) {
											$rows = $this->getAttributeById($row_product[0]['product_id'], $at, $lang);
											if (empty($rows)) continue;
										}
										
										if ($change_attribute) $this->changeAtt($masatt, $r, $t['name'], $t['val']);	
										$data['product_id'] = $row_product[0]['product_id'];							
										$data['text1'] = $t['val'];
										$data['text2'] = '';
										$data['text3'] = '';
										$data['attribute_id'] = $at;
										$this->putAttributeById($data, $upattr, $langs);
										$yesno = 1;
									}
								} else {
									$err =  "Row ~= " . $row_count . " SKU = " . $row[$cod] . " Attribute parse error \n";
									$this->adderr($err);
								}							
							}
						} 						
					}
					if ($er) {
						$err =  "Language 2 or 3 is not provided in the Store \n";
						$this->adderr($err);
					}	
				}
				if ($yesno and !$yml and $upattr != 5) $report = $report." Attribute updated \n";
				if ($yml and $yesno and isset($ymlatt) and !$ymlatt) {
					$report = $report." Attribute updated \n";
					$ymlatt = 1;
				}			

				if ($ad != 2 and $ad != 4) $row_product[0]['subtract'] = $minus;
				
				$row_product[0]['upc'] = "";				
				if (isset($row[$upc]) and $ad != 2 and $ad != 4) $row_product[0]['upc'] = $this->symbol($row[$upc]);
				$row_product[0]['ean'] = "";				
				if (isset($row[$ean]) and $ad != 2 and $ad != 4) $row_product[0]['ean'] = $this->symbol($row[$ean]);
				$row_product[0]['mpn'] = "";				
				if (isset($row[$mpn]) and $ad != 2 and $ad != 4) $row_product[0]['mpn'] = $this->symbol($row[$mpn]);
				$row_product[0]['ref'] = "";				
				if (isset($row[$ref]) and $ad != 2 and $ad != 4) $row_product[0]['ref'] = $row[$ref];
				$row_product[0]['ref1'] = "";				
				if (isset($row[$ref1]) and $ad != 2 and $ad != 4) $row_product[0]['ref1'] = $row[$ref1];
				$row_product[0]['seo_h1'] = 0;
				if (isset($row[38]) and $ad != 2 and $ad != 4) $row_product[0]['seo_h1'] = $this->getName($row[38]);
				$row_product[0]['seo_title'] = 0;
				if (isset($row[39]) and $ad != 2 and $ad != 4) $row_product[0]['seo_title'] = $this->getName($row[39]);
				$row_product[0]['meta_keyword'] = 0;
				if (isset($row[40]) and $ad != 2 and $ad != 4) $row_product[0]['meta_keyword'] = $this->getName($row[40]);
				$row_product[0]['meta_description'] = 0;
				if (isset($row[41]) and $ad != 2 and $ad != 4) $row_product[0]['meta_description'] = $this->symbol($row[41]);
				$row_product[0]['tag'] = 0;
				if (isset($row[42]) and $ad != 2 and $ad != 4) $row_product[0]['tag'] = $this->getName($row[42]);
				$row_product[0]['url'] = '';
				if (isset($row[43]) and $ad != 2 and $ad != 4) $row_product[0]['url'] = $row[43];

				if ($ad != 4 and $ad != 2) {					
					if (isset($row[$weight])) {					
						$a = trim($row[$weight]);
						if (!empty($a) and $a != '0') $row_product[0]['weight'] = $this->convertWeight($a);
						elseif ($a == '0') $row_product[0]['weight'] = '0';
					}					
					if (isset($row[$length])) {					
						$a = trim($row[$length]);
						if (!empty($a) and $a != '0') $row_product[0]['length'] = $this->convertWeight($a);
						elseif ($a == '0') $row_product[0]['length'] = '0';
					}					
					if (isset($row[$width])) {					
						$a = trim($row[$width]);
						if (!empty($a) and $a != '0') $row_product[0]['width'] = $this->convertWeight($a);
						elseif ($a == '0') $row_product[0]['width'] = '0';
					}					
					if (isset($row[$height])) {					
						$a = trim($row[$height]);
						if (!empty($a) and $a != '0') $row_product[0]['height'] = $this->convertWeight($a);
						elseif ($a == '0') $row_product[0]['height'] = '0';
					}
				}
				if ($ad != 2 and $ad != 12 and $ad != 13) {
					$row_product[0]['bprice'] = 0;					
					if (isset($row[$bprice])) {
						$pr = strip_tags($row[$bprice]);
						$pr = $this->convertPrice($pr);
						if (!empty($pr)) {
							$row_product[0]['bprice'] = $pr;
							$row_product[0]['bpack'] = 1;
							$row_product[0]['brate'] = $rate;
							$row_product[0]['bsuppler'] = $id;
							if (!substr_count($plus, "+")) $row_product[0]['bdisc'] = $row[$price]*$rate * $plus/100;
							else {
								$pl = explode("+", $plus);	
								$f = 0;
								if (isset($pl[0]) and !empty($pl[0])) {
									$row_product[0]['bdisc'] = $row[$price]*$rate * $pl[0]/100;
									$f = 1;
								}
								if (isset($pl[1]) and !empty($pl[1]) and $f) $row_product[0]['bdisc'] = $row_product[0]['bdisc'] + $pl[1];
								if (isset($pl[1]) and !empty($pl[1]) and !$f) $row_product[0]['bdisc'] = $pl[1];
							} 
						}	
					}
				}
				if ($zero_prod  and $ad != 4 and $ad != 12 and $ad != 14) $row_product[0]['quantity'] = 0;
				
				$row_product[0]['date_modified'] = date('Y-m-d H:i:s');
				
				if (isset($row[$serie]) and !empty($row[$serie])) {
					$rows = $this->getProductBySKU($row[$serie], $store);
					if (isset($rows) and !empty($rows)) {
						$serie_id = $rows[0]['product_id'];
						$this->putSerie($row_product[0]['product_id'], $serie_id);
					}	
				}

				if( $this->config->get( 'mfilter_plus_version' ) ) {        // mfilter
					require_once DIR_SYSTEM . 'library/mfilter_plus.php';     
					Mfilter_Plus::getInstance( $this )->updateProduct( $row_product[0]['product_id'] );
				}
				
				$this->putProductBySKU($row[$cod], $row_product, $updte, $upname, $max_attr, $attr_ext, $row, $tags, $addseo, $upurl, $umanuf, $seo_data, $store, $parent, $t_ref, $t_ref1, $metka, $yml, $usd, $catmany, $idcat);

				if (!$flag_add_up and $old_sku != $row[$cod] or (isset($product_new) and $product_new)) {
					$total_up++;
					$this->puttotal($total_add, $total_up);
					$flag_add_up = 1;					
				}
				
				if (!empty($related) and $ad != 2 and $ad != 4) {
					$related_val = explode(";" , $row[$related]);
					foreach ($related_val as $val) {						
						$rows = $this->getProductBySKU($val, $store);
						if (isset($rows) and !empty($rows)) {
							$related_id = $rows[0]['product_id'];
							$rows = $this->getRalated($row_product[0]['product_id'], $related_id);
							if (isset($rows) and empty($rows)) $this->addRelated($row_product[0]['product_id'], $related_id);

							$rows = $this->getRalated($related_id, $row_product[0]['product_id']);
							if (isset($rows) and empty($rows)) $this->addRelated($related_id, $row_product[0]['product_id']);
							
						}	
					}
				}
				$product_new = 0;
	/*****************************************************************************************/	
					
			} elseif ((!$product_found and !$optsku) or (!$product_found and $optsku and empty($row[$newproduct]))) {
				$row_product = array();
				if ($ad == 0 or $ad == 2 or $ad == 4) {						
					$err = " Row ~= " . $row_count . " SKU = " . $row[$cod] . " not found in the Store. " . " \n";
					$this->adderr($err);	
					continue;
				}	
				
		/**************/		
				if (!preg_match('/^[0-9]+$/', $manuf) and !empty($manuf) and $pmanuf) {
					if (empty($row[$parsm])) {
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						$err = " The Product passed: Row ~= " . $row_count . " Empty link in column = ".$parsm."\n";
						$this->adderr($err);						
						continue;
					}
					$url = $this->checkurl($row[$parsm]);
					if ($url == -1) {
						$err = " The Product passed: Row ~= " . $row_count . " Incorrect link = ".$row[$parsm]. " in column = ".$parsm."\n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						if ($row_count < 0) return 5;
						continue;
					}
					if (strlen($ht) < 1024 or $parsed != $parsm) {
						$ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) > 2048) $parsed = $parsm;
						else {
							$parsed = "";
							$err = " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
							$this->adderr($err);
							$row_count = (int)$this->putsos($row_count, $row[$cod]);
							if ($row_count < 0) return 5;
							continue;
						}	
					}
					$in = $this->ParsManufacturer($ht, $mmanuf, $pointm, $placem);					
					if (empty($in) or strlen($in) > 100 ) {
						$err = " The Product passed: Row ~= " . $row_count . " parsing manufacturer fail, manufacturer = " . $this->symbol($in) . " \n";
						$this->adderr($err);
						$row_count = (int)$this->putsos($row_count, $row[$cod]);
						$manuf = 'manuf';
						$row[$manuf] = '';
					} else {
						$manuf = 'manuf';
						$row[$manuf] = $in;
					}	
				}
		/**************/		
				
				$row_product[0]['cat_name'] = $text_cat;
				$row_product[0]['category_id'] = '';				
				
				if (preg_match('/^[0-9]+$/', $text_cat) and $idcat) {
					$rows = $this->getCategoryStore((int)$text_cat, $store);
					if (!empty($rows)) {
						$row_product[0]['category_id'] = (int)$text_cat;
						$report = $report."Category set by ID ";
						$pic_int[$i] = "photo";
					}	
				}
				
				if ($flag) {
					$row_product[0]['category_id'] = $category_id[$i];
					$catmany[0] = $category_id[$i];
				} else {
					if (!$idcat and !$yml) {
						$row_product[0]['category_id'] = $my_cat;
						$catmany[0] = $my_cat;
						$report = $report."Category set by default ";
					}	
				}
				
				$row_product[0]['manufacturer_id'] = '0';
				$name = '';
				$row_product[0]['manuf_name'] = '';
				
				if (isset($row[$manuf]) and !empty ($row[$manuf])) $name = $this->getName($row[$manuf]);
				else {
					if ($my_manuf) {
						$rows = $this->getManufacturerName($my_manuf);
						if (!empty($rows)) $name = $rows[0]['name'];
					}	
				}				
				
				$row_product[0]['manuf_name'] = $name;
				
				$rows  = $this->getManufacturerID($name, $store);				
				
				if(!empty($rows) and $rows[0]['manufacturer_id'] != 0) {
					$row_product[0]['manufacturer_id'] = $rows[0]['manufacturer_id'];
				} else {
					if (($pmanuf and $name and ($ad == 1 or $ad == 3) and $row_product[0]['category_id'] != '') or ($pmanuf and $name and $yml)) {
						$data['name'] = $name;
						$data['sort_order'] = '0';						
						$this->addManufacturer($data, $langs, $last_id, $seo_data, $store);
						$row_product[0]['manufacturer_id'] = $last_id;
						$report = $report."Manufacturer ". $this->symbol($name)." created ";
					} else {
						if ($my_manuf and ($ad == 1 or $ad == 3)) {
							$row_product[0]['manufacturer_id'] = $my_manuf;
							$report = $report."Manufacturer set by default";											
						} else {
							if ($ad == 1 or $ad == 3) {							
								$err = " Warning. Row ~= " . $row_count . " SKU = " . $row[$cod] . " Manufacturer: '". $this->symbol($name). "' not found \n";
								$this->adderr($err);
							}	
						}						
					}
				}

				$max_id = $this->getMaxID();
				$max_model = $max_id['max(product_id)'];				
				$max_model = $max_model + 1;
				if (!$main) $max_model = $max_model."-";
				else $max_model = $max_model."~";
				$l = strlen($id);
				if ($l < 2) $max_model = $max_model."0";
				$max_model = $max_model.$id;
				
				$row_product[0]['model'] = $max_model;				 
				$row_product[0]['sku'] = $row[$cod];
				$row_product[0]['lang'] = $lang;
	
				if ($exsame and isset($row[$cod]) and !empty($row[$cod])) {
					$a = '';
					if (preg_match('/^[0-9,]+$/', $item)) {
						$items = explode(",", $item);
						for ($j=0; $j<10; $j++) {
							if (!isset($items[$j])) break;
							$a = $a . " " . $row[$items[$j]];
						}
						$row[$item] = $this->getName($a);
					} else $row[$item] = $this->getName($row[$item]);
					
					if (!empty($item) and preg_match('/^[0-9,]+$/', $item)) $pname = $row[$item];
					else {
						if (!empty($item) and !preg_match('/^[0-9,]+$/', $item) and empty($pname) and isset($row[$parsi]) and !empty($row[$item])) {
							$pname = "";
							$url = $this->checkurl($row[$parsi]);
							if ($url != -1) {							
								if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
								if (strlen($ht) > 1024) {
									$parsed = $parsi;
									$pname = $this->ParsName($ht, $row[$item], $pointi, $placei);
									if (strlen($pname) < 2) {
										$err =  " Parsing Product Name error: Row ~= " . $row_count . " url = ". $url. " \n";
										$this->adderr($err);
										$pname = "";
									}	
								} else {									
									$err =  " Parsing Product Name error: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
									$this->adderr($err);								
								}							
							}					
						}					
					}
	
					if (!empty($pname))
					$this->Same('', $row[$cod], $pname, $row_product[0]['category_id'], $row_product[0]['manufacturer_id'], $row[$price], $store);
					
					continue;
				}
	
				if ($ad == 0 or $ad == 2) continue;
					
				if ($catcreate and empty($catmany)) {					
					$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create category(s) \n";
					$this->adderr($err);
					continue;
				}
				
				if (!preg_match('/^[0-9]+$/', $text_cat) and $idcat) {
					$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . "  Category_ID not found in price-list \n";
					$this->adderr($err);
					continue;
				}	

				if (!$row_product[0]['category_id'] and !$catcreate and !$yml) {				
					$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Category: '".$this->symbol($text_cat)."' not found in your settings (see page 'Category and margin')\n";
					$this->adderr($err);
					continue;
				}
				
				if (empty($row[$cat]) and empty($my_cat) and !$yml) {					
					$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Product category not found in price-list\n";
					$this->adderr($err);
					continue;
				}				
				
				if (empty($pic_ext) and empty($my_photo) and empty($parsk)) {					
					$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Please, set picture column \n";
					$this->adderr($err);
					continue;				
				}
	
				$text =	'';
				$pname = '';
				$yes = 0;
				$row_product[0]['description'] = '';
				if ($descrip == 'descrip') {					
					if (!empty($row[$descrip])) {
						$row_product[0]['description'] = $this->symbol($row[$descrip]);
						$yes = 1;
						if (!$yml) $report = $report."Description found in price-list and added ";
					} else {
						if (!empty($my_descrip)) {
						  $row_product[0]['description'] = $this->symbol($my_descrip);
						  $yes = 1;
						  if (!$yml) $report = $report."Description set by default ";
						}
					}	
				}

				
				if (preg_match('/^[0-9,]+$/', $item)) {
					$a = '';
					if (substr_count($item, ",")) {
						$items = explode(",", $item);
						for ($j=0; $j<10; $j++) {
							if (!isset($items[$j])) break;
							if (!empty($row[$items[$j]])) $a = $a . " " . $row[$items[$j]];
						}						
					} else $a = $row[$item];
				    if (!empty($a)) $pname = trim($this->getName($a));					
				}
				if ($descrip != 'descrip' and isset($row[$parsd]) and (!$optsku or empty($row[$newproduct]))) {			
					$url = $this->checkurl($row[$parsd]);
					if ($url != -1) {							
						if (strlen($ht) < 1024 or $parsed != $parsd) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) > 1024) {
							$parsed = $parsd;							
							$text = $this->ParsDescription($ht, $descrip, $pointd, $placed, $row_count, $url, $sleep, $ffile, $photo_desc);
							if (strlen($text) < 10) $text = '';			
						} else {
							$parsed = '';
							$err =  " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
							$this->adderr($err);										
						}					
					}
				}	
				if (!preg_match('/^[0-9,]+$/', $item) and isset($row[$parsi]) and (!$optsku or empty($row[$newproduct]))) {
					$url = $this->checkurl($row[$parsi]);
					if ($url != -1) {							
						if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) > 1024) {
							$parsed = $parsi;
							$pname = $this->ParsName($ht, $item, $pointi, $placei);
							if (strlen($pname) < 2) {
								$err =  " Parsing Product Name error: Row ~= " . $row_count . " url = ". $url. " Check your settings \n";
								$this->adderr($err);								
								continue;
							}	
						} else {
							$parsed = '';
							$err =  " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
							$this->adderr($err);										
						}						
					}								
				}

				if (!empty($pname)) $row_product[0]['item'] = $pname;
				elseif (!$yml and (!$optsku or empty($row[$newproduct]))) {
					$err =  " The Product passed: Row ~= " . $row_count . " SKU = ". $row[$cod] . " Product name not found in price-list \n";
					$this->adderr($err);					
					continue;
				}
				if ($descrip != 'descrip') {
					if (!empty($my_descrip) and empty($text)) {
						$row_product[0]['description'] = $this->symbol($my_descrip);		
						if (!$yml) $report = $report."Description set by default ";						
					} else {
						if (!empty($text)) $row_product[0]['description'] = $text;
						if (!$yml and $row_product[0]['description']) $report = $report."Description parsed and added ";					
					}					
				}
				
				if (empty($my_descrip) and !$yes and empty($text)) {
					$row_product[0]['description'] = "";
					if (!$yml) $report = $report."No Description ";
				}
				
				$p = strpos($max_model, "-");
				if (!$p) $p = strpos($max_model, "~");
				$papka = substr($max_model, $p-1, 1);
				$row_product[0]['image'] = '';	
				
				$photo_default = 0;		
				$nojpg = 0;
				$pictures = array();
				$pi = explode(",", $pic_ext);
				if (!empty($parsk)) {
					$pictures[0] = $parsk;
					$m = 0;
					for ($l=1; $l<$np; $l++) {
						if (!isset($pi[$m])) break;							
						$pictures[$l] = $pi[$m];
						$m++;
					}
				} else $pictures = $pi;
	
				$enn = 0;
			$q = -1;			
			$npic = count($pictures);
			for ($n=0; $n<$npic; $n++) {
				$nolink = 0;
				$q++;
				$pic = $pictures[$n];

				if (!empty ($row[$pic]) and (!$optsku or empty($row[$newproduct]))) {
					if (!substr_count($row[$pic], "/")) $nolink = 1;
					$url = $row[$pic];
					if (!$nolink) $url = $this->checkurl($row[$pic]);					
					if ($url == -1) {
						if ($n == $npic-1) {
							if ($my_photo) {
								$url = $my_photo;
								$photo_default = 1;
								$nolink = 0;									
								break;
							} else {						
								if (!$yml) {
									$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] ." Invalid picture link\n";
									$this->adderr($err);							
									$enn = 1;
								}	
								break;
							}	
						} else if (!$yml) continue;
					}

					$a = strlen($url)-6;
					$en = substr($url, $a);
					if (substr_count($url, "/") and strlen($url) > 12 and !stripos($en, '.jpg') and !stripos($en, '.png') and !stripos($en, '.jpeg') and !stripos($en, '.gif') and !stripos($en, '.bmp') and $url != -1 and $parsk) {
					
						$fname = "photo";
						$marks = explode(",", $my_mark);
						if (isset($marks[0]) and !empty($marks[0])) {													
							$fname = $marks[0];
						} else {						
							if (isset($row[$manuf]) and !empty($row[$manuf])) {
								$fname = $row[$manuf];							
								$fname = substr($fname, 0, 16);
							}
						}							
					
						if ((empty ($row[$manuf]) or !isset($row[$manuf])) and (!isset($my_mark) or empty($my_mark))) {	
							if ($my_photo) {
								$url = $my_photo;
								$photo_default = 1;
								$nolink = 0;								
								break;		
							} else {									
								$err =  " Photo can not be found: Row ~= " . $row_count . " SKU = " . $row[$cod] ." Please, set  Manufacturer or keyword \n";
								$this->adderr($err);							
								$enn = 2;
								break;								
							}
						}							
						$nojpg = 1;
						$seeks = explode(",", $warranty);
						$seek = $seeks[0];	
						if (strlen($ht) < 1024 or $parsed != $parsk) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) > 1024) {
							$parsed = $parsk;								
							$key = '';
							$url = $this->ParsPic($ht, $url, $key, $seek, $fname, $pic_ext);							
							if ($this->checkurl($url) == -1) {
								if (empty($my_photo)) {
									$err =  " Parsing main photo error: Row ~= " . $row_count . " url = ". $url. " Check your settings \n";
									$this->adderr($err);
									$enn = 3;
									break;	
								} else {													
									$url = $my_photo;
									$photo_default = 1;
									$nolink = 0;									
									break;
								}	
							}	
						} else {							
							$err =  " The Product passed: Row ~= " . $row_count . " url = ". $url. " Site no answer \n";
							$this->adderr($err);
							$row_count = (int)$this->putsos($row_count, $row[$cod]);
							if ($row_count < 0) return 5;
							$enn = 4;
							break;							
						}										
	
						if (!$url) {
							$row_product[0]['image'] = '';							
							if (!empty($my_photo)) {
								$url = $my_photo;
								$photo_default = 1;
								$nolink = 0;								
								break;
							} else {					
								$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] ." Photo not found on the site: " . $url." Check your setting field in form: 'location photo'"." keywords = ".$this->symbol($fname)." seek = ".$seek."\n";
								$this->adderr($err);								
								$enn = 5;
								break;
							}
						}							
					} else {						
						if (strlen($url) < 5) {	
							$row_product[0]['image'] = '';							
							if (!empty($my_photo)) {
								$url = $my_photo;
								if ((strlen($url) < 3) or (!stristr($url, '.jpg') and !stristr($url, '.png') and !stristr($url, '.jpeg') and !stristr($url, '.gif') and !stripos($en, '.bmp'))) {
									if (!$yml) {
										$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Default link: " . $url. " too short "." \n";
										$this->adderr($err);
									}	
									break;
								}
								$photo_default = 1;
								$nolink = 0;
							} else {					
								if (!$yml) {
									$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Link: " . $url. " too short "." \n";
									$this->adderr($err);								
									$enn = 6;
								}	
								break;
							}	
						}
					}					
					$rout = 0;
					$try = "";					
					if (!$nolink) $url = $this->checkurl($url);		
					if ($url != -1) {
						if ($nolink) {	
							$ise = ".jpg";
							$nom = stripos($url, ".jpg");
							if (!$nom) {
								$nom = strrpos($url, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($url, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($url, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($url, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($url, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($url);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($url, $nom);	
							$app = '';
							if (!empty($seo_data['prod_photo'])) {								
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = $row_product[0]['manuf_name'];
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}
							if (empty($app)) {
								$app = substr($url, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom);
								$app = $this->TransLit($app);							
								$app = $this->MetaURL($app);
							}
							$try = "../image/data/temp/".$url;
	
							if (file_exists($try)) {						
								if (!empty ($pic_int[$i]))	{
									$spath = "../image/data/" .$pic_int[$i]."/";
									if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
									else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
									$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
									if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
									else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
								} else {
									$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count . " Product passed" ." \n";
									$this->adderr($err);
									$enn = 7;
									break;
								}		
								if (!is_dir($spath)) {
									if (!@mkdir($spath, 0755)) {								
										$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
										$this->adderr($err);
										continue;
									}
								}								
								
								if (!is_dir($path)) @mkdir($path, 0755);
								$path = $path.$app.$se;
								$a = @copy ($try, $path);
								if (!$a) {
									$err =  " Can not copy file from: " . $try . " to: " . $path . " Set chmod 0755 or 0777 for folder: " . $spath . " \n";
									$this->adderr($err);
								}	
								$row_product[0]['image'] = $pic_addr;			
								$rout = 1;
								break;
							} else {
								if ($n == $npic-1) {
									if ($my_photo) {
										$url = $my_photo;
										$photo_default = 1;
										$nolink = 0;
										break;
									} else {
										$enn = 9;																		
										break;
									}
								} else continue;
							}	
						}					
						if (!$rout) {
							$ise = ".jpg";
							$nom = stripos($url, ".jpg");
							if (!$nom) {
								$nom = strrpos($url, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($url, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($url, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($url, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($url, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($url);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($url, $nom);
							$app = '';
							if (!empty($seo_data['prod_photo'])) {
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = $row_product[0]['manuf_name'];
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}
							if (empty($app)) {
								$app = substr($url, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom+7);
								$app = $this->TransLit($app);
								$nom = strlen($app);
								if ($nom > 250) $app = substr($app, $nom-250, 250);
								if ($nom < 2) $app = rand(0, 999999999);							
								$app = $this->MetaURL($app);
							}
							if ($newphoto != 5) {
								if (!empty ($pic_int[$i]))	{
									$spath = "../image/data/" .$pic_int[$i]."/";
									if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
									else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
									$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
									if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
									else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
								} else {
									$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." The product passed"." \n";
									$this->adderr($err);
									$enn = 10;
									break;
								}		
								if (!is_dir($spath)) {
									if (!@mkdir($spath, 0755)) {								
										$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
										$this->adderr($err);
										continue;
									}
								}
								if (!is_dir($path)) @mkdir($path, 0755);		
								$path = $path.$app.$se;	
							} else 	{
								$pic_addr = '';
								if (!empty($url)) {										
									$link = $this->symbol($url);													
									if (substr_count($link, "data/")) {
										$nom = strpos($link, "data/");		
										$link = substr($link, $nom);
										$pic_addr = $link;		
									}
								}	
							}
							if ($newphoto == 5) {
								$pic_addr = str_replace("%25%20", " ", $pic_addr);
								$pic_addr = str_replace("%20", " ", $pic_addr);
								$pa = "../image/" . $pic_addr;
								if (file_exists($pa)) $row_product[0]['image'] = $pic_addr;
								else {
									if ($n == $npic-1) {
										if (!$yml) {
											$err =  " Main photo not found. Path: ". $pic_addr . " Row ~= " . $row_count . " SKU = " . $row[$cod] . " Product passed \n";
											$this->adderr($err);
											$enn = 12;
										}	
										break;
									} else continue;
								}	
							} else $row_product[0]['image'] = $pic_addr;
							if (!file_exists($path) and $newphoto != 5) {
								$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);								
								if (!$this->isPicture($pict)) {	
									if ($n == $npic-1) {
										if ($my_photo) {											
											$photo_default = 1;
											$nolink = 0;
											if (!$yml) {
												$err =  " Download main photo fails. Url: ". $url . " Row ~= " . $row_count . " SKU = " . $row[$cod] . " I'll try insert default photo \n";
												$this->adderr($err);
												$url = $my_photo;
												$enn = 12;
											}	
											break;
										} else {
											if (!$yml) {
												$err =  " Download main photo fails. Url: ". $url . " Row ~= " . $row_count . " SKU = " . $row[$cod] . " Product passed \n";
												$this->adderr($err);												
											}	
											break;
										}
									} else continue;	
									
								} else {
									$bytes = @file_put_contents($path, $pict);
									if (!$bytes) {
										$bytes = @file_put_contents($spath, $pict);
										$row_product[0]['image'] = $spic_addr;
									}

									if (!$bytes) {
										if ($n == $npic-1) {
											if (!$yml) {
												$err =  " The Product has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Link in price-list: ". $row[$pic]. " patch = ".$path." url = ".$url." is not available \n";
												$this->adderr($err);
											}	
											if ($my_photo) {
												$url = $my_photo;
												$photo_default = 1;
												$nolink = 0;
												break;
											} else {
												$enn = 13;
												break;
											}
										} else continue;
									}
									break;
								}	
							} else break;
						}
					}
				} else {
					if ($n == $npic-1 and (!$optsku or empty($row[$newproduct]))) {
						if ($my_photo) {
							$url = $my_photo;
							$photo_default = 1;
							$nolink = 0;
							break;
						} else {
							$enn = 14;
							break;
						}
					}
				}
				if (!empty($parsk)) break;
			}	// new
			
			$pictures_new = array();
			if ($q > 0) {
				$npic = $npic-$q;
				for ($l=0; $l<16; $l++) {
					if (!isset($pictures[$l+$q])) break;
					$pictures_new[$l] = $pictures[$l+$q];					
				}
			} else 	$pictures_new = $pictures;
		
				if ($enn and (!$optsku or empty($row[$newproduct])) and !$yml) {
					if ($enn == 12 and $my_photo) {
						$url = $my_photo;
						$photo_default = 1;
						$err =  " Main photo not found. " . " Row ~= " . $row_count . " SKU = " . $row[$cod] . " It used the default photo \n";
						$this->adderr($err);
					} else {
						$err =  " Main photo not found. " . " Row ~= " . $row_count . " SKU = " . $row[$cod] . " err = " . $enn . " Product passed \n";
						$this->adderr($err);
						continue;
					}	
				}
				
				if ($photo_default and (!$optsku or empty($row[$newproduct])) and !$yml) {
					if ($my_photo) {					
						$url = $my_photo;											
						$ff = $url;										
						$ff = strrchr($ff, "/");					
						$nom = stripos($ff, ".");
						$sb = substr($ff, 1, $nom-1);
						$se = substr($ff, $nom);
						$pic_name = $sb.$se;
						$spath = "../image/data/photo/";
						$path = "../image/data/photo/";
						$spic_addr = "data/photo/".$pic_name;
						$pic_addr = "data/photo/".$pic_name;
						
						if (!is_dir($spath)) {
							if (!@mkdir($spath, 0755)) {								
								$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
								$this->adderr($err);
								continue;
							}
						}
						if (!is_dir($path)) @mkdir($path, 0755);
						$path = $path.$pic_name;					
						$row_product[0]['image'] = $pic_addr;
						if (!file_exists($path)) {
							$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);
							if (!$this->isPicture($pict)) {								
								$err =  " Download default photo fails. Url: ". $url . " Row ~= " . $row_count . " SKU = " . $row[$cod] ." \n";
								$this->adderr($err);
								continue;
							}
							$bytes = @file_put_contents($path, $pict);
							if (!$bytes) {
								$bytes = @file_put_contents($spath, $pict);
								$row_product[0]['image'] = $spic_addr;
							}
							if (!$bytes) {								
								$err =  " Defaul photo has not been added: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Default link: ". $row[$pic]. " patch = ".$path." url = ".$url." is not available \n";
								$this->adderr($err);								
								continue;
							}
						}						
					} else {						
						$err =  " Any photo not found: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Default photo expected \n";
						$this->adderr($err);
						continue;
					}	
				}	
	
				if ($photo_default > 0 and (!$optsku or empty($row[$newproduct])) and !$yml) $report = $report."Photo set by default ";				
				
				$row_product[0]['weight'] = '0';
				$row_product[0]['length'] = '0';
				$row_product[0]['width'] = '0';
				$row_product[0]['height'] = '0';
				if (isset($row[$weight])) {						
					$a = trim($row[$weight]);
					if (!empty($a) and $a != '0') $row_product[0]['weight'] = $this->convertWeight($a);
					elseif ($a == '0') $row_product[0]['weight'] = '0';
				}					
				if (isset($row[$length])) {					
					$a = trim($row[$length]);
					if (!empty($a) and $a != '0') $row_product[0]['length'] = $this->convertWeight($a);
					elseif ($a == '0') $row_product[0]['length'] = '0';
				}					
				if (isset($row[$width])) {					
					$a = trim($row[$width]);
					if (!empty($a) and $a != '0') $row_product[0]['width'] = $this->convertWeight($a);
					elseif ($a == '0') $row_product[0]['width'] = '0';
				}					
				if (isset($row[$height])) {					
					$a = trim($row[$height]);
					if (!empty($a) and $a != '0') $row_product[0]['height'] = $this->convertWeight($a);
					elseif ($a == '0') $row_product[0]['height'] = '0';
				}				
				
				if (isset($row[$sorder]))
					$row_product[0]['sort_order'] = $row[$sorder];
				else $row_product[0]['sort_order'] = 0;					
				
				$row_product[0]['quantity'] = 0;
				$quantity = 0;
				$newstatus = 0;
				$empt = 0;
				$this->getQuantity($row, $qu, $my_qu, $quantity, $newstatus, $empt);
				
				if (!$empt) $quantity = '';
				$row_product[0]['quantity'] = $quantity;
				
				if (empty($newstatus)) $newstatus = 0;
				
				if (!$row_product[0]['quantity'] and preg_match('/^[0-9]+$/', $my_qu)) {
					$row_product[0]['quantity'] = $my_qu;
					if (!$yml) $report = $report."Quantity set by default ";
				} else {	
					if (!$row_product[0]['quantity'] and !$yml) $report = $report."Quantity = 0 ";				
					else if ($row_product[0]['quantity'] > 0 and !$yml) $report = $report."Quantity found ";
				}
				
				$row_product[0]['hide'] = 1;
				if (!$hide) $row_product[0]['hide'] = 0;
				if ($off_prod == 1) $row_product[0]['hide'] = 0;

				$qu_d = array();  // Расчет скидок по процентам от количества
				if (!empty($qu_discount) and substr_count($qu_discount, "=")) {				
					$pj = explode(",", $qu_discount);
					for ($j=0; $j<20; $j++) {		
						if (!isset($pj[$j])) break;
						if (!substr_count($pj[$j], "=")) break;		
						$p = strpos($pj[$j], '=');						
						$q = substr($pj[$j], 0, $p);	
						$q = trim($q)+1-1;
						$q = round($q, 0);
						if (!preg_match('/^[0-9]+$/', $q)) break;	
						$per = substr($pj[$j], $p+1);	
						$per = trim($per)+1.11-1.11;
						$per = $this->convertPrice($per);
						if (!preg_match('/^[0-9.Ee+-]+$/', $per)) break;
						$qu_d['quantity'][$j] = $q;
						$qu_d['percent'][$j] = $per;
					}
				}
				
				$plus = 0;
				$new_price = 0;				
				if (!$price_parsed) $row[$price] = $row[$price]*$rate;  // сначала, умножаем на курс	
				else $row[$price] = $row[$price]*$ratep;
								
				if (!$flag and !$cprice and $my_cat and (empty($myplus) or !preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus]))) {								
					$rows = $this->getMargin($id, $my_cat);					
					if (!isset($rows) or empty($rows)) {						
						$err =  " Can not calculate margin. Row ~= " . $row_count . " SKU = " . $row[$cod] . " Margin is not set on page Category and Margin" . " \n";
						$this->adderr($err);				
					} else {					
						$plus = $rows[0]['cat_plus'];
						$report = $report."Margin set by default category ";
					}
				} else {
					if (!empty($myplus) and preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus])) {	
						$plus = str_replace(',','.',$row[$myplus]);
						$report = $report."Margin set manualy ";
					} else {
						if ($cprice and $cat_plus[$i] == 0 and (empty($myplus) or !preg_match('/^[-0-9,.Ee+]+$/', $row[$myplus]))) {
							if (!$price_parsed) $a = $rate;
							else $a = $ratep;
							$doll = $row[$price]/$a + 0.01 - 0.01;	// переведем цену в доллары					
					
				// Таблица наценок. Зависит от цены товара в долларах. $m - множитель 
		
							if ($doll > 500.00) $m = 1.01;   // 1%
							if ($doll <= 500.00) $m = 1.05;  // 5%
							if ($doll <= 200.00) $m = 1.06;
							if ($doll <= 100.00) $m = 1.1;			
							if ($doll <= 50.00) $m = 1.07;	
							if ($doll <= 30.00) $m = 1.15;
							if ($doll <= 20.00) $m = 1.2;
							if ($doll <= 10.00) $m = 1.35;
							if ($doll <= 5.00) $m = 1.4;
							if ($doll <= 4.00) $m = 1.5;
							if ($doll <= 3.00) $m = 1.6;
							if ($doll <= 2.00) $m = 1.7;
							if ($doll <= 1.40) $m = 1.8;
							if ($doll <= 1.20) $m = 1.9;
							if ($doll <= 1.00) $m = 2.0;	// 100 процентов				
					
							$plus = 100*((float)$m-1);
							$report = $report."Margin set by formula ";
								
						} else {				
							if (isset($cat_plus[$i]) and !empty($cat_plus[$i])) {		
								if (preg_match('/^[-0-9,.Ee+]+$/', $cat_plus[$i])) {
									$plus = str_replace(',','.',$cat_plus[$i]);
								} else {
									$pj = explode(",", $cat_plus[$i]);
									for ($j=0; $j<600; $j++) {
										if (!isset($pj[$j])) break;
										if (!substr_count($pj[$j], "(")) continue;
										if (!substr_count($pj[$j], ")")) continue;
										$pj[$j] = str_replace('(','',$pj[$j]);		
										$p = strpos($pj[$j], ')');
										if (!$p) continue;
										$d = substr($pj[$j], 0, $p);
										$p12 = explode("-", $d);
										$p1 = trim($p12[0]);
										$p2 = trim($p12[1]);
										if ($row[$price] >= $p1 and $row[$price] <= $p2) {
											$plus = substr($pj[$j], $p+1);
											$plus = trim($plus);
											break;
										}
									}	
								}
							if (!empty($plus) and !$yml) $report = $report."Margin added success ";
							}	
						}
					}
				}
				if ($ignore_margin or $rrc) $plus = 0;				
				if (!substr_count($plus, "+")) $new_price = $row[$price] + ($row[$price] * $plus/100);
				else {
					$pl = explode("+", $plus);	
					$f = 0;
					if (isset($pl[0]) and !empty($pl[0])) {
						$new_price = $row[$price] + ($row[$price] * $pl[0]/100);
						$f = 1;
					}
					if (isset($pl[1]) and !empty($pl[1]) and $f) $new_price = $new_price + $pl[1];
					if (isset($pl[1]) and !empty($pl[1]) and !$f) $new_price = $row[$price] + $pl[1];
				}			
				
				if ($plus == 0 and !$yml) $report = $report."Margin = 0 ";
				$row_product[0]['price'] = $this->convertPrice($new_price);
				$old_price = $row_product[0]['price'];				
				
				$row_product[0]['date_added'] = date('Y-m-d H:i:s');
				$row_product[0]['date_available'] = date('Y-m-d H:i:s');				
				$row_product[0]['shipping'] = 1;
				
				$stat = $st_status;
				if ($newstatus) $stat = $newstatus;
				if (!empty($termin) and !empty($row[$termin]) and !empty($t_status)) {
					$term = (int)trim($row[$termin]);
					$pj = explode(",", $t_status);
					for ($j=0; $j<20; $j++) {		
						if (!isset($pj[$j])) break;
						if (!substr_count($pj[$j], "=")) break;		
						$p = strpos($pj[$j], '=');						
						$q = substr($pj[$j], 0, $p);						
						$q = (int)trim($q);						
						if ($q == $term) {
							$stat = substr($pj[$j], $p+1);
							if (!preg_match('/^[0-9]+$/', $stat)) break;
							$stat = (int)trim($stat);
						}					
					}				
				}
				if ($ad != 4) $row_product[0]['stock_status_id'] = $stat;
	
				$row_product[0]['bprice'] = 0;
				if (isset($row[$bprice])) {
					$pr = strip_tags($row[$bprice]);
					$pr = $this->convertPrice($pr);
					if (!empty($pr)) {
						$row_product[0]['bprice'] = $pr;
						$row_product[0]['bpack'] = 1;
						$row_product[0]['brate'] = $rate;
						$row_product[0]['bsuppler'] = $id;
						if (!substr_count($plus, "+")) $row_product[0]['bdisc'] = $row[$price]*$rate * $plus/100;
						else {
							$pl = explode("+", $plus);	
							$f = 0;
							if (isset($pl[0]) and !empty($pl[0])) {
								$row_product[0]['bdisc'] = $row[$price]*$rate * $pl[0]/100;
								$f = 1;
							}
							if (isset($pl[1]) and !empty($pl[1]) and $f) $row_product[0]['bdisc'] = $row_product[0]['bdisc'] + $pl[1];
							if (isset($pl[1]) and !empty($pl[1]) and !$f) $row_product[0]['bdisc'] = $pl[1];
						}	
					}	
				}				
				
				$row_product[0]['subtract'] = $minus;
				$row_product[0]['upc'] = "";				
				if (isset($row[$upc])) $row_product[0]['upc'] = $this->symbol($row[$upc]);
				$row_product[0]['ean'] = "";				
				if (isset($row[$ean])) $row_product[0]['ean'] = $this->symbol($row[$ean]);
				$row_product[0]['mpn'] = "";				
				if (isset($row[$mpn])) $row_product[0]['mpn'] = $this->symbol($row[$mpn]);
				$row_product[0]['ref'] = "";				
				if (isset($row[$ref])) $row_product[0]['ref'] = $row[$ref];
				$row_product[0]['ref1'] = "";				
				if (isset($row[$ref1])) $row_product[0]['ref1'] = $row[$ref1];
				$row_product[0]['seo_h1'] = 0;
				if (isset($row[38])) $row_product[0]['seo_h1'] = $this->getName($row[38]);
				$row_product[0]['seo_title'] = 0;
				if (isset($row[39])) $row_product[0]['seo_title'] = $this->getName($row[39]);
				$row_product[0]['meta_keyword'] = 0;
				if (isset($row[40])) $row_product[0]['meta_keyword'] = $this->getName($row[40]);
				$row_product[0]['meta_description'] = 0;
				if (isset($row[41])) $row_product[0]['meta_description'] = $this->symbol($row[41]);
				$row_product[0]['tag'] = 0;
				if (isset($row[42])) $row_product[0]['tag'] = $this->getName($row[42]);
				$row_product[0]['url'] = '';
				if (isset($row[43])) $row_product[0]['url'] = $row[43];
				
				if ($zero_prod) $row_product[0]['quantity'] = 0;				
				
				$report = $report."Product added ";
				
				if (!$optsku or empty($row[$newproduct])) {
					$this->putNewProduct($row_product, $parent, $last_product_id, $attr_ext, $max_attr, $langs, $row, $tags, $addseo, $catmany, $catcreate, $catdescs, $caturls, $catmd, $catmk, $catmt, $catmh, $newurl, $refers, $seo_data, $store, $off, $idcat, $t_ref,  $t_ref1, $metka, $usd);

					$product_new = 1;
					if (!$flag_add_up) {
						$report = $report."Product added ";
						$total_add++;
						$this->puttotal($total_add, $total_up);
						$flag_add_up = 1;					
					}
				}
				
				if (!isset($last_product_id) or !$last_product_id) {					
					if (!$optsku or empty($row[$newproduct])) {
						$err =  " Database write error Row ~= " . $row_count . " SKU = " . $row[$cod] . " \n";
						$this->adderr($err);
						continue;
					} else {
						$err =  " No product to add Option Row ~= " . $row_count . " SKU = " . $row[$cod] . " \n";
						$this->adderr($err);
						continue;
					}	
				}
				
				$old_product_id = $last_product_id;
				$last_sku_id = 0;			

				if (isset($row[$serie]) and !empty($row[$serie])) {
					$rows = $this->getProductBySKU($row[$serie], $store);
					if (isset($rows) and !empty($rows)) {
						$serie_id = $rows[0]['product_id'];
						$this->putSerie($last_product_id, $serie_id);
					}	
				}
				
				$er = 0;				
				if ($max_attr and $upattr and $upattr != 4 and (!$optsku or empty($row[$newproduct]))) {					
					for ($j = 1; $j <= $max_attr; $j++) {
						$attname = '';
						$attvalue = '';
						if (isset($data)) unset($data);
						$data = array();
						$r = 0;
						$at = $attribute_id[$j];
						$col = explode(",", $attr_ext[$j]);
						if (!empty($col[0]) and preg_match('/^[0-9]+$/', $col[0])) {
							if (($at == 0 and !empty($row[$col[0]-1]) and !$yml) or ($at == 0 and !empty($row[$col[0]+1]) and $yml)){
								
								if (!$yml) $attname = $this->getName($row[$col[0]-1]);
								else $attname = $this->getName($row[$col[0]+1]);
								if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $attvalue);
								$rows = $this->getAttributeID($attname);
							
								if (isset($rows[0]['attribute_id'])) $at = $rows[0]['attribute_id'];
								if (!$at and ($upattr == 1 or $upattr == 2 or $upattr == 5)) {
									$data['text1'] = $attname;
									$data['text2'] = '';
									if (isset($col[1]) and !empty($col[1])) $data['text2'] = $this->getName($row[$col[1]-1]);
									$data['text3'] = '';
									if (isset($col[2]) and !empty($col[2])) $data['text3'] = $this->getName($row[$col[2]-1]);
									$this->createAttribute($data, $attID, $langs);
									$at = $attID;
									if ($at == 1.2) {
										$er = 1;
										break;
									}								
								}
								if (!$at) continue;
							}					
							if (isset($row[$col[0]]) and $row[$col[0]] != '') {
								$t = $this->symbol($row[$col[0]]);
								if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);						
								$data['text1'] = $t;
								$t = '';
								if (isset($col[1]) and $row[$col[1]] != '') {
									$t = $this->symbol($row[$col[1]]);
									if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);					
								}								
								$data['text2'] = $t;
								$t = '';
								if (isset($col[2]) and $row[$col[2]] != '') {
									$t = $this->symbol($row[$col[2]]);
									if ($change_attribute) $this->changeAtt($masatt, $r, $attname, $t);					
								}								
								$data['text3'] = $t;
								$data['product_id'] = $last_product_id;
								$data['attribute_id'] = $at;
								$this->putAttributeById($data, $upattr, $langs);								
							}
							if ($attribute_id[$j] and $filter_group_id[$j] and !empty($data)) {
								$filters = array();
								$this->CreateFilter($data, $filter_group_id[$j], $langs, $filters);
								if (!empty($filters)) $this->AttributeToFilter($last_product_id, $filters);				
							}
						} else {											
							if (isset($row[$parsi])) $url = $this->checkurl($row[$parsi]);
							else $url = -1;
							if ($url != -1) {	
								if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
								if (strlen($ht) > 1024) {
									$parsed = $parsi;
									$text = array();
									$this->ParsAttribute($ht, $attr_ext[$j], $attr_point[$j], $text, $row_count, $url, $sleep, $ffile, $photo_att);
								} else {
									$parsed = '';
									$text = '';										
								}	
														
								if (!empty ($text)) {
									foreach ($text as $t) {
										if (empty ($t['name']) or $t['val'] == '') continue;
										if (isset($at) and !empty($at) and $t['name'] == 'noname') {
											$rows = $this->getAttributeName($at);
											$t['name'] = $rows[0]['name'];
										}
										if ($change_attribute) $this->changeAtt($masatt, $r, $t['name'], $attvalue);
										if (strlen((string)$t['name']) > 256) {
											$err =  " Attribute name: ". $t['name'] . " is too large. I cat it. \n";
											$this->adderr($err);
											$t['name'] = mb_substr($t['name'], 0, 256);
										}										
										$rows = $this->getAttributeID($t['name']);										
										if (empty($rows)) {
										    if ($upattr == 1 or $upattr == 2 or $upattr == 5) {							
												$data['text1'] = $t['name'];
												$data['text2'] = '';
												$data['text3'] = '';
												$this->createAttribute($data, $attID, $langs);
												$at = $attID;											
												if (!$at) $report = $report." Attribute: ". $t['name'] . " created \n";
											} else continue;	
										} else 	$at = $rows[0]['attribute_id'];
										
										if ($change_attribute) $this->changeAtt($masatt, $r, $t['name'], $t['val']);
										$data['product_id'] = $last_product_id;										
										$data['text1'] = $t['val'];
										$data['text2'] = '';
										$data['text3'] = '';
										$data['attribute_id'] = $at;										
										$this->putAttributeById($data, $upattr, $langs);								
									}
								} else {
									$err =  "Row ~= " . $row_count . " SKU = " . $row[$cod] . " Attribute parse error \n";
									$this->adderr($err);
								}								
							}
						} 						
					}
					if ($er) {
						$err =  "Language 2 or 3 is not provided in the Store \n";
						$this->adderr($err);
					}	
				}
				
				
				$summa_options = 0;
				if (($old_sku != $row[$cod] and !$optsku) or ($optsku and empty($row[$newproduct]))) {
					$summa_product_options = 0;
					$oldprice = $row_product[0]['price'];
					$firstprice = $row_product[0]['price'];
					if (isset($mas_prod_opt_val_id)) unset($mas_prod_opt_val_id);
					$mas_prod_opt_val_id = array();
					$summa_options = 0;
					if (isset($same_opt)) {
						unset($same_opt);					
						$same_opt = array();
					}	
					$ks = -1;
					if (isset($mas_nozero)) unset($mas_nozero);
					$mas_nozero = array();
					$nozero_index = 0;
				}	
				$opt_val = array();
				$data_option = array();
				$mas_opt = array();
				$yes_option = 0;				
				if ($max_opt and $upopt) {
					$jj = 1;
					for ($j = 1; $j <= $max_opt; $j++) {
						if (empty($opt[$j])) continue;
						$i1 = 0;
						if (!$option_idd[$j]) {
							if (preg_match('/^[0-9]+$/', $opt[$j]) and $opt[$j] > 2) {
								$name_option = $row[$opt[$j]-1];
								if ($yml) $name_option = $row[$opt[$j]+1];
							} else $name_option = $row[$parsi-1];
							if (!empty($name_option)) {
								$name_option = $this->getName($name_option);
								$option_id[$j] = $this->createOption($name_option, $langs);
							}							
						}
						
						if (!$option_id[$j]) continue;
						if (!isset($ko[$j])) continue;
						
						if (preg_match('/^[0-9]+$/', $opt[$j])) {
							$row[$opt[$j]] = $this->symbol($row[$opt[$j]]);	
							$row[$opt[$j]] = str_replace("&quot;", "+-=6", $row[$opt[$j]]);
							$opt_val = explode(";" , $row[$opt[$j]]);
						}
						$opt_ko = array();
						$opt_po = array();
						$opt_we = array();
						$opt_art = array();
						$opt_pr = array();
						$opt_foto = array();
						if (isset($maso)) unset($maso);
						if (isset($masp)) unset($masp);
						$maso = array();
						$masp = array();
						
						if (empty($ko[$j])) {
							$err =  ' The "Quantity" field is not filled in the "Options" page '." \n";
							$this->adderr($err);
							break;
						}
						$row[$ko[$j]] = $this->symbol($row[$ko[$j]]);
						if (isset($row[$ko[$j]])) {
							if (substr_count($row[$ko[$j]], ';')) $opt_ko = explode(";" , $row[$ko[$j]]);
							else $opt_ko = explode("," , $row[$ko[$j]]);
						}
						if (isset($row[$po[$j]])) {
							if (substr_count($row[$po[$j]], ';')) $opt_po = explode(";" , $row[$po[$j]]);
							else $opt_po = explode("," , $row[$po[$j]]);
						}										
						if (preg_match('/^[0-9]+$/', $prro[$j])) {
							if (substr_count($row[$prro[$j]], ';')) $opt_pr = explode(";" , $row[$prro[$j]]);
							else $opt_pr = explode("," , $row[$prro[$j]]);						
						}		
							
						$p = explode("," , $pprice);
						if ($p[0] == $prro[$j] or $prro[$j] == '') $same_column = 1;						
						if (!empty($row[$art[$j]])) $semicolon = 1;

						if (isset($row[$we[$j]])) {
							if (substr_count($row[$we[$j]], ';')) $opt_we = explode(";" , $row[$we[$j]]);
							else $opt_we = explode("," , $row[$we[$j]]);
						}
						if (isset($row[$art[$j]])) {
							if (substr_count($row[$art[$j]], ';')) $opt_art = explode(";" , $row[$art[$j]]);
							else $opt_art = explode("," , $row[$art[$j]]);
						}
						if (isset($row[$art[$j]])) {
							if (substr_count($row[$art[$j]], ';')) $opt_art = explode(";" , $row[$art[$j]]);
							else $opt_art = explode("," , $row[$art[$j]]);
						}
						if (isset($row[$foto[$j]])) $opt_foto = explode(";" , $row[$foto[$j]]);
						
						if (($opt[$j] and !preg_match('/^[0-9]+$/', $opt[$j])) or ($prro[$j] and !preg_match('/^[0-9]+$/', $prro[$j]))) {
							if (isset($row[$parsi]) and !empty($row[$parsi])) {
								$url = $this->checkurl($row[$parsi]);
								if ($url != -1) {									
									if (strlen($ht) < 1024 or $parsed != $parsi) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
									if (strlen($ht) > 1024) {
										$parsed = $parsi;										
										$this->ParsOptions($ht, $opt[$j], $opt_point[$j], $prro[$j], $maso, $masp);
									}
									if ($maso == '') {
										$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Error in parameter parsing this option: ". $this->symbol($opt[$j]) . " price: " . $this->symbol($prro[$j]) . " Link: " . $row[$parsi] ." \n";
										$this->adderr($err);
										continue;
									} else {
										if (isset($opt_val)) unset($opt_val);
										if (isset($opt_pr)) unset($opt_pr);
										for ($l=0; $l<900; $l++) {	
											if (!isset($maso[$l])) break;			
											if ($maso[$l]) $opt_val[$l] = $maso[$l];
											if ($masp[$l]) $opt_pr[$l] = $masp[$l];
											if (empty($prro[$j])) $opt_pr[$l] = '';
										}
									}	
								} else {
									$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Error link for parsing options in column: ". $parsi . " \n";
									$this->adderr($err);
									continue;
								}
							} else {
								$err =  " Row ~= " . $row_count . " SKU = " . $row[$cod] ." Empty link for parsing options in column: ". $parsi . " \n";
								$this->adderr($err);
								continue;
							}
						}
						for ($l=0; $l<200; $l++) {
							if (isset($option_foto)) unset($option_foto);
							$option_foto = array();
							$option_foto[0] = 0;
							if (isset($opt_foto[$l]) and !empty($opt_foto[$l])) {								
								$af = explode(',', $opt_foto[$l]);							
								for ($x=0; $x<count($af); $x++) {	
									$url = $af[$x];									
									$url = $this->checkurl($url);	
									$pic_addr = '';
									$a = strlen($url)-6;
									$en = substr($url, $a);
									if (!substr_count($url, "/") and (stripos($en, '.jpg') or stripos($en, '.png') or stripos($en, '.jpeg') or stripos($en, '.gif') or stripos($en, '.bmp'))) {			
	
										$ise = ".jpg";
										$nom = stripos($url, ".jpg");
										if (!$nom) {
											$nom = strrpos($url, ".jpeg");
											if ($nom) $ise = ".jpeg";
										}
										if (!$nom) {
											$nom = strrpos($url, ".png");
											if ($nom) $ise = ".png";
										}	
										if (!$nom) {
											$nom = strrpos($url, ".PNG");
											if ($nom) $ise = ".png";
										}
										if (!$nom) {
											$nom = strrpos($url, ".gif");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".GIF");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".bmp");
											if ($nom) $ise = ".bmp";
										}
										if (!$nom) {
											$nom = strrpos($url, ".BMP");
											if ($nom) $ise = ".bmp";
										}
				
										$a = strlen($url);
										if (!$nom or $a - $nom > 5) {
											$se = $ise;
											$nom = $a;
										} else $se = substr($url, $nom);
										$app = substr($url, 0, $nom);
										$nom = strpos($app, ".");
										$app = substr($app, $nom);
										$app = $this->TransLit($app);							
										$app = $this->MetaURL($app);

										$try = "../image/data/temp/".$url;
										if (file_exists($try)) {						
											if (!empty ($pic_int[$i]))	{
												$spath = "../image/data/" .$pic_int[$i]."/";
												if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
												else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
												$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
												if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
												else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;			
											} else {
												$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
												$this->adderr($err);
												break;
											}		
											if (!is_dir($spath)) {
												if (!@mkdir($spath, 0755)) {								
													$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
													$this->adderr($err);
													break;
												}
											}								
											if (!is_dir($path)) @mkdir($path, 0755);								
											$path = $path.$app.$se;	
											$a = @copy ($try, $path);
											if (!$a) {
												$err =  " Can not copy file from: " . $try . " to: " . $path . " Set chmod 0755 or 0777 for folder: " . $spath . " \n";
												$this->adderr($err);
												break;
											}											
										} else {
											$err =  " Photo not found: Row ~= " . $row_count . " SKU = " . $row[$cod] . " folder: " . $try . " \n";
											$this->adderr($err);
											$pic_addr = '';
										}								
									} else {	
										$ise = ".jpg";
										$nom = stripos($url, ".jpg");
										if (!$nom) {
											$nom = strrpos($url, ".jpeg");
											if ($nom) $ise = ".jpeg";
										}
										if (!$nom) {
											$nom = strrpos($url, ".png");
											if ($nom) $ise = ".png";
										}	
										if (!$nom) {
											$nom = strrpos($url, ".PNG");
											if ($nom) $ise = ".png";
										}
										if (!$nom) {
											$nom = strrpos($url, ".gif");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".GIF");
											if ($nom) $ise = ".gif";
										}
										if (!$nom) {
											$nom = strrpos($url, ".bmp");
											if ($nom) $ise = ".bmp";
										}
										if (!$nom) {
											$nom = strrpos($url, ".BMP");
											if ($nom) $ise = ".bmp";
										}
				
										$a = strlen($url);
										if (!$nom or $a - $nom > 5) {
											$se = $ise;
											$nom = $a;
										} else $se = substr($url, $nom);	
										$app = '';
										if (!empty($seo_data['prod_photo'])) {
											$data['name'] = '';
											if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
											$data['category'] = '';
											if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
											$data['manufacturer'] = '';
											if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = trim($row[$manuf]);
											$data['model'] = '';
											if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
											$data['brand'] = '';
											if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
											$data['sku'] = '';
											if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
											$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
											$app = $this->TransLit($app);
											$app = strtolower($app);
										}
										if (empty($app)) {
											$app = substr($url, 0, $nom);
											$nom = strpos($app, ".");
											$app = substr($app, $nom+7);
											$app = $this->TransLit($app);
											$nom = strlen($app);
											if ($nom > 250) $app = substr($app, $nom-250, 250);
											if ($nom < 2) $app = rand(0, 999999999);								
											$app = $this->MetaURL($app);
										}								
								
										if (!empty ($pic_int[$i]))	{
											$spath = "../image/data/" .$pic_int[$i]."/";
											if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
											else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
											$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
											if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
											else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
										} else {
											$path = "../image/data/photo/";											
											$pic_addr = "data/photo/".$app.$se;											
										}
										if ((!isset($spath) or empty($spath)) and !$idcat) {
											$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Set, please, folder for photo on the page 'Category and margin'  \n";
											$this->adderr($err);
											break;
										}	
										if (!is_dir($path)) {
											if (!@mkdir($path, 0755)) {								
												$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $path. ", create it manually \n";
												$this->adderr($err);
												break;
											}
										}
										$path = $path.$app.$se;										
										if (!file_exists($path)) {
											$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);	
											if (!$this->isPicture($pict)) {
												$err =  " Download photo for Option, fails. Row ~= " . $row_count ." Url = ". $url . " Column = " . $foto[$j] . " \n";
												$this->adderr($err);
												$pic_addr = '';
											} else {
												$bytes = @file_put_contents($path, $pict);
												if (!$bytes) {
													$bytes = @file_put_contents($spath, $pict);
													$pic_addr = $spic_addr;
												}	
											} 
										}
									}	
									$option_foto[$x] = $pic_addr;				
								}	
							}
							$e = 0;
							if ((empty($opt_val[$l]) and !isset($opt_val[$l+1]) and !$optsku) or ($optsku and $l > 0) or (isset($row[$art[$j]]) and !isset($opt_art[$l]))) break;
							
							$data_option['op_val_id'] = 0;
							$opt_val[$l] = trim($opt_val[$l]);
							$opt_val[$l] = str_replace("+-=6", "&quot;", $opt_val[$l]);
							if ($option_id[$j]) {
								$rows = $this->getOptionsById($option_id[$j]);	
								if (!empty($rows) and isset($opt_val[$l]) and !empty($opt_val[$l])) {
					
									foreach ($rows as $r) {									
										if ((string)$r['name'] == $opt_val[$l]) {	
											$e = 1;
											$data_option['op_val_id'] = $r['option_value_id'];
											break;
										}	
									}
								}
							}	
							if (!$e and $option_id[$j]) {
								if ($addopt and !empty($opt_val[$l])) {									
									$this->addValue($option_id[$j], $ovid, $option_foto[0], $upOptionFoto);	
									$this->addValueDescription($option_id[$j], $ovid, $opt_val[$l], $langs);							
									$data_option['op_val_id'] = $ovid;
									$report = $report." Option value ".$opt_val[$l]." has been added";
								} else {									
									$err =  " The Option value: '". $this->symbol($opt_val[$l]) . "' not found in the Store.  Row ~= " . $row_count . " SKU = " . $row[$cod] . " Please, set this Option value \n";
									$this->adderr($err);
									continue;
								}
							}
						
							if ($e and $upOptionFoto == '1' and !empty($option_foto[0])) {
								$this->upOptionFoto($option_id[$j], $data_option['op_val_id'], $option_foto[0]);
								$option_foto[0] = '';
							}	
							
							if (isset($opt_val[$l])) $data_option['opt'] = $opt_val[$l];
	
							$data_option['ko'] = 0;
							$data_option['koj'] = 0;
							if (isset($opt_ko[$l])) {
								$opt_ko[$l] = trim($opt_ko[$l]);
								$quop = 0;
								$newstatusop = 0;
								$emptop = 0;
								$row1[1] = $opt_ko[$l];
								$this->getQuantity($row1, 1, $my_qu, $quop, $newstatusop, $emptop);				
								
								$data_option['ko'] = $quop;
								$data_option['koj'] = $quop;
							}	
												
							if (!$optsku) {
								$pp = 0;
								for ($u=0; $u<$ks+1; $u++) {	
									if (isset($same_opt[$u]['opt']) and !empty($same_opt[$u]['opt']) and $same_opt[$u]['opt'] == $data_option['opt']) {	
										$same_opt[$u]['ko'] = $same_opt[$u]['ko']+$data_option['ko'];
										$pp = 1;
										break;
									}
								}
							
								if (!$pp and !empty($data_option['opt'])) {
									$ks++;								
									$same_opt[$ks]['opt'] = $data_option['opt'];								
									$same_opt[$ks]['ko'] = $data_option['ko'];
								} elseif (isset($same_opt[$u]['ko'])) $data_option['ko'] = $same_opt[$u]['ko'];
							}
							
							$data_option['optsku'] = '';						
							if (isset($opt_art[$l])) $data_option['optsku'] = $opt_art[$l];							
							elseif ($optsku) $data_option['optsku'] = $o_optsku;
							
							$data_option['pr'] = '';
							$data_option['pr_prefix'] = '=';
							if (empty($prro[$j])) $data_option['pr_prefix'] = '+';
							if (isset($opt_pr[$l]) and !empty($prro[$j])) {
								$opt_pr[$l] = trim($opt_pr[$l]);
								$e = substr($opt_pr[$l], strlen($opt_pr[$l])-1, 1);
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') {
									$data_option['pr_prefix'] = $e;								
									$b = substr($opt_pr[$l], 0, strlen($opt_pr[$l])-1);									
								} else {
									$b = $opt_pr[$l];								
									$e = '=';
									$data_option['pr_prefix'] = $e;								
								}	
							
								if (!empty($opt_pref[$j])) {
									$data_option['pr_prefix'] =  $opt_pref[$j];
									$e = $opt_pref[$j];									
								}	
								if (preg_match('/^[0-9.,Ee+-]+$/', $b)) {
									$data_option['pr'] = str_replace("," , ".", $b);							
									if ($e == '=' and !$same_column) $data_option['pr'] = $data_option['pr']*$rate;
									if ($opt_margin[$j] and $plus and $e == '=' and !$same_column) $data_option['pr'] = $data_option['pr']+($data_option['pr']*$plus/100);
									if ($opt_margin[$j] and $plus and $e == '=' and $same_column) $data_option['pr'] = $row_product[0]['price'];
									$data_option['pr'] = $this->convertPrice($data_option['pr']);
											
								}	
							}							
							
							$data_option['po'] = 0;
							$data_option['po_prefix'] = '=';
							if (isset($opt_po[$l])) {
								$opt_po[$l] = trim($opt_po[$l]);
								$e = substr($opt_po[$l], strlen($opt_po[$l])-1, 1);
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') 
								{	
						 	        $data_option['po_prefix'] = $e;							
									$b = substr($opt_po[$l], 0, strlen($opt_po[$l])-1);									
							    } else $b = substr($opt_po[$l], 0, strlen($opt_po[$l]));						
							    if (preg_match('/^[0-9.,Ee+-]+$/', $b)) $data_option['po'] = str_replace("," , ".", $b);
							}	
						
							
							$data_option['we'] = 0;
							$data_option['we_prefix'] = '=';
							if (isset($opt_we[$l])) {
								$opt_we[$l] = trim($opt_we[$l]);
								$e = substr($opt_we[$l], strlen($opt_we[$l])-1, 1);
								if ($e == '+' or $e == '-' or $e == '=' or $e == '%' or $e == '*' or $e == '#') 
								{ 	
							      $data_option['we_prefix'] = $e;								
								  $b = substr($opt_we[$l], 0, strlen($opt_we[$l])-1);
								} else  $b = substr($opt_we[$l], 0, strlen($opt_we[$l])); 
								if (preg_match('/^[0-9.,Ee+-]+$/', $b)) $data_option['we'] = str_replace("," , ".", $b);		
							}							
							
							if ($j == 1 and $l == 0 ) $report = $report."Product options created ";	
							$yes_option = 1;
							$data_option['option_required'] = $option_required[$j];
							$uu = 0;
							if (isset($row[$usd])) $uu = $row[$usd];
							$prod_opt_val_id = 0;
							$this->upProductOption($last_product_id, $option_id[$j], $data_option, $minus, $ad, $option_type[$j], $my_price, $usd, $uu, $option_foto, $prod_opt_val_id, $upOptionFoto, $mas_prod_opt_val_id);
							
							for ($i1=0; $i1<900; $i1++) {
								if (!isset($mas_prod_opt_val_id[$i1]['prod_id'])) break;
								$mas_nozero[$nozero_index]['prod_id'] = $mas_prod_opt_val_id[$i1]['prod_id'];				
								$nozero_index++;								
							}
							
							if ($option_type[$j] == 'select' or $option_type[$j] == 'radio' or $option_type[$j] == 'image' or $option_type[$j] == 'checkbox') {
								$mas_opt[$jj][$l][0] = $last_product_id;
								$mas_opt[$jj][$l][1] = $option_id[$j];
								$mas_opt[$jj][$l][2] = $data_option['op_val_id'];
								if (!$data_option['op_val_id'] and isset($mas_prod_opt_val_id[0]['val_id'])) $mas_opt[$jj][$l][2] = $mas_prod_opt_val_id[0]['val_id'];
								$mas_opt[$jj][$l][3] = $ko[$j];
								$mas_opt[$jj][$l][4] = $data_option['ko'];							
								$mas_opt[$jj][$l][5] = $data_option['pr'];							
								$mas_opt[$jj][$l][6] = $data_option['we_prefix'];							
								$mas_opt[$jj][$l][7] = $data_option['we'];
								$mas_opt[$jj][$l][8] = $data_option['optsku'];
								$mas_opt[$jj][$l][9] = $data_option['pr_prefix'];

								if (isset($summa_product_options)) $summa_product_options = $summa_product_options+$data_option['ko'];
	
								$jj++;
							}	
						}	
					}
					if (!isset($i1)) $i1 = 0;
				
						if ($optsku and $i1 > 1) {
							for ($l=0; $l<900; $l++) {
								for ($j=1; $j<=$jj; $j++) {
									if (!isset($mas_opt[$j][$l][0])) continue;
									for ($ii=0; $ii<900; $ii++) {
										if (!isset($mas_prod_opt_val_id[$ii]['val_id'])) break;
										if ($mas_opt[$j][$l][8] == $mas_prod_opt_val_id[$ii]['optsku'] and 
											$mas_opt[$j][$l][1] == $mas_prod_opt_val_id[$ii]['opt'] and !empty($mas_prod_opt_val_id[$ii]['val_id'])) {
											
											$mas_opt[$j][$l][2] = $mas_prod_opt_val_id[$ii]['val_id'];
											$mas_prod_opt_val_id[$ii]['val_id'] = 0;
										}
									}	
								}						
							}
						}
						unset($mas_prod_opt_val_id);
						for ($l=0; $l<900; $l++) {	
							$gr_data = array();
							$n = 0; $a = ''; $b = '';		
							for ($j=1; $j<=$jj; $j++) {
								if (!isset($mas_opt[$j][$l][0])) continue;
								$m = 0;
								for ($k=1; $k<=$jj; $k++) {
									if (!isset($mas_opt[$k][$l][0])) continue;
									if (!empty($mas_opt[$j][$l][2]) and $mas_opt[$j][$l][3] == $mas_opt[$k][$l][3] and $j != $k and $a != $mas_opt[$j][$l][1] and $b != $mas_opt[$j][$l][2]) {								
										$a = $mas_opt[$j][$l][1];
										$b = $mas_opt[$j][$l][2];
										$n++;
										$m++;
										$gr_data[$n][0] = $l;
										$gr_data[$n][1] = $last_product_id;
										$gr_data[$n][2] = $mas_opt[$j][$l][1];
										$gr_data[$n][3] = $mas_opt[$j][$l][2];
										$gr_data[$n][4] = $mas_opt[$j][$l][4];
										$gr_data[$n][5] = $mas_opt[$j][$l][5];
										$gr_data[$n][6] = $mas_opt[$j][$l][6];
										$gr_data[$n][7] = $mas_opt[$j][$l][7];
										$gr_data[$n][8] = $mas_opt[$j][$l][8];
										$gr_data[$n][9] = $mas_opt[$j][$l][9];
									}
								}					
							}			
							
							if ($n>1) {
								$jopt = 1;
								$summa_options = $summa_options + $gr_data[1][4];
								$this->jOption($gr_data, $ad);
								unset($gr_data);							
							}
						}
							
				}
				unset($mas_opt);
				
				if ($yes_option and $jopt) $row_product[0]['quantity'] = $summa_options;
				
				$this->db->query("UPDATE " . DB_PREFIX . "product SET `quantity` = '" . $row_product[0]['quantity'] . "' WHERE `product_id` = '" . $last_product_id . "'");
		
				// Добавление акционных цен
				$ff = 0;
				if (!empty($aprice) and empty($row[$newproduct])) {
					for ($j=0; $j<40; $j++) {
						if (!isset($aprice[$j])) break;
						if (empty($aprice[$j])) continue;
						$data['product_id'] = $last_product_id;
						$data['customer_group_id'] = $j+1;
						$data['priority'] = 1;
						$pr = $this->convertPrice($row[$aprice[$j]]);						
						if (!preg_match('/^[0-9.Ee+-]+$/', $pr)) $pr = '';
						else $pr = $pr*$rate;
						if (round($pr, 0) >= round($new_price, 0)) $pr = '';
						if ($pr and $chcode) {
							if (!substr_count($plus, "+")) $pr = $pr + ($pr * $plus/100);			
							else {
								$pl = explode("+", $plus);									
								if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + ($pr * $pl[0]/100);				
								if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];							
							}
						}
						$data['price'] = $this->convertPrice($pr);
						$data['date_start'] = "2000-01-01";
						$data['date_end'] = "2040-01-01";
						if ($pr) {							
							$uu = '';
							if (isset($row[$usd])) $uu = $row[$usd];
							$this->putActionPrice($data, $usd, $uu);
							$ff = 1;
						}
					}	
				}
				if ($ff) $report = $report."Special price added ";

				$ff = 0;
				if (count($mprice) > 1 and count($qu_d) == 0 and empty($row[$newproduct])) {   // Скидочные цены, скидки
					for ($j=1; $j<40; $j++) {
						if (!isset($mprice[$j])) break;
						if (empty($mprice[$j])) continue;						
						$data['product_id'] = $last_product_id;
						$data['customer_group_id'] = $j;
						$data['priority'] = 1;			
						if (substr_count($mprice[$j], ')')) $mm = explode(')', $mprice[$j]);
						else $mm[0] = $mprice[$j].'(col';
						for ($k=0; $k<count($mm); $k++) {
							$m = explode('(', $mm[$k]);							
							if (count($m) < 2) continue;
							$pr = $row[$m[0]];
							if ($m[1] == 'col') $q = 1;
							else {
								if (substr_count($m[1], '=')) $q = str_replace('=', '', $m[1]);
								else $q = $row[$m[1]];								
							}
							$pr = $this->convertPrice($pr);						
							if (!preg_match('/^[0-9.Ee+-]+$/', $pr)) $pr = '';
							else $pr = $pr*$rate;
							if (round($pr, 0) >= round($new_price, 0)) $pr = '';
							if ($pr and $chcode) {
								if (!substr_count($plus, "+")) $pr = $pr + ($pr * $plus/100);			
								else {
									$pl = explode("+", $plus);									
									if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + ($pr * $pl[0]/100);				
									if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];							
								}
							}
							$data['price'] = $this->convertPrice($pr);
							$data['quantity'] = $q;
							$day = mktime(0, 0, 0, date('m'), date('d')-1, date('Y'));
							$data['date_start'] = date('Y-m-d', $day);
							$plus_days = mktime(0, 0, 0, date('m'), date('d')+10, date('Y')); // +10 это скидка на 10 дней
							$data['date_end'] = date('Y-m-d', $plus_days);
							if ($pr) {
								$uu = '';
								if (isset($row[$usd])) $uu = $row[$usd];
								$this->putWholesale($data, $usd, $uu);
								$ff = 1;
							}	
						}	
					}	
				} else {
					if (count($mprice) > 0 and count($qu_d) > 0 and $ad != 2 and empty($row[$newproduct])) {
						for ($j=1; $j<40; $j++) {							
							$data['product_id'] = $last_product_id;
							$data['customer_group_id'] = $j;
							$data['priority'] = 1;
							for ($k=0; $k<40; $k++) {
								if (!isset($qu_d['quantity'][$k])) break;
								$pr = $this->convertPrice($row[$mprice[0]]);						
								if (!preg_match('/^[0-9.Ee+-]+$/', $pr)) $pr = '';
								else $pr = $pr*$rate;
								if (round($pr, 0) >= round($new_price, 0)) $pr = '';
								if ($pr and $chcode) {
									if (!substr_count($plus, "+")) $pr = $pr + ($pr * $plus/100);			
									else {
										$pl = explode("+", $plus);									
										if (isset($pl[0]) and !empty($pl[0])) $pr = $pr + ($pr * $pl[0]/100);				
										if (isset($pl[1]) and !empty($pl[1])) $pr = $pr + $pl[1];							
									}
								}
								$pr = $pr-$pr*$qu_d['percent'][$k]/100;
								$data['price'] = $this->convertPrice($pr);
								$data['quantity'] = $qu_d['quantity'][$k];
								$data['date_start'] = "2000-01-01";
								$data['date_end'] = "2040-01-01";
								if ($data['price']) {
									$uu = '';
									if (isset($row[$usd])) $uu = $row[$usd];
									$this->putWholesale($data, $usd, $uu);
									$ff = 1;
								}
							}
						}
					}
				}	
				unset($qu_d);
				
				if( $this->config->get( 'mfilter_plus_version' ) ) {       // mfilter
					require_once DIR_SYSTEM . 'library/mfilter_plus.php';     
					Mfilter_Plus::getInstance( $this )->updateProduct( $last_product_id );
				} 
				
				if ($ff) $report = $report."Wholesale price added ";

				if (!empty($bonus) and preg_match('/^[0-9,]+$/', $bonus)) { // бонусы
					$bb = explode(',', $bonus);					
					for ($j=0; $j<count($bb); $j++) {
						if ($j == 0) {							
							if (preg_match('/^[0-9]+$/', $bb[0]) and !empty($row[$bb[$j]])) $this->Bonus0($last_product_id, $row[$bb[0]]);
						} else {							
							if (preg_match('/^[0-9]+$/', $bb[$j]) and !empty($row[$bb[$j]])) $this->Bonus1($j, $last_product_id, $row[$bb[$j]]);
						}	
					}	
				}						
				
				for ($k=1; $k<=$npic; $k++) {		
					if (!isset($pictures_new[$k])) break;
					$nn = $pictures_new[$k];
					if (isset($row[$nn]) and !empty ($row[$nn])) {
						$nolink = 0;
						if (!substr_count($row[$nn], "/")) $nolink = 1;
						$url = $row[$nn];
						if (!$nolink) $url = $this->checkurl($row[$nn]);
						if ($url == -1) continue;
						if ($nolink) {
							$url = $row[$nn];
							$ise = ".jpg";
							$nom = stripos($url, ".jpg");
							if (!$nom) {
								$nom = strrpos($url, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($url, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($url, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($url, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($url, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($url);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($url, $nom);
							$app = '';
							if (!empty($seo_data['prod_photo'])) {
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = $row_product[0]['manuf_name'];
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}
							if (empty($app)) {
								$app = substr($url, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom);
								$app = $this->TransLit($app);							
								$app = $this->MetaURL($app);
							}
	
							$try = "../image/data/temp/".$url;
							if (file_exists($try)) {						
								if (!empty ($pic_int[$i]))	{
									$spath = "../image/data/" .$pic_int[$i]."/";
									if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
									else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
									$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
									if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
									else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;				
								} else {
									$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." \n";
									$this->adderr($err);
									continue;
								}		
								if (!is_dir($spath)) {
									if (!@mkdir($spath, 0755)) {								
										$err =  " Additional photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
										$this->adderr($err);
										continue;
									}
								}								
								if (!is_dir($path)) @mkdir($path, 0755);
								$path = $path.$app.$se;
								$a = @copy ($try, $path);
								if (!$a) {
									$err =  " Can not copy file from: " . $try . " to: " . $path . " Set chmod 0755 or 0777 for folder: " . $spath . " \n";
									$this->adderr($err);
								}	
								if ($a) {
									$rows = $this->getProductImage($last_product_id);
									$e = 1;										
									foreach ($rows as $p) {
										if ($p['image'] == $pic_addr) $e = 0;
									}	
									if ($e and !empty($pic_addr)) $this->addPicture($last_product_id, $pic_addr, $k);						
								}
							} else {
								$err =  " Photo not found: Row ~= " . $row_count . " SKU = " . $row[$cod] . " folder: " . $try . " \n";
								$this->adderr($err);
								continue;
							}
						} else {						
							$ise = ".jpg";
							$nom = stripos($url, ".jpg");
							if (!$nom) {
								$nom = strrpos($url, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($url, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($url, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($url, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($url, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($url, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($url);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($url, $nom);
							$app = '';
							if (!empty($seo_data['prod_photo'])) {
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = $row_product[0]['manuf_name'];
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}
							if (empty($app)) {
								$app = substr($url, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom+7);
								$app = $this->TransLit($app);
								$nom = strlen($app);
								if ($nom > 250) $app = substr($app, $nom-250, 250);
								if ($nom < 2) $app = rand(0, 999999999);						
								$app = $this->MetaURL($app);
							}
							
							if ($newphoto != 5) {
								if (!empty ($pic_int[$i]))	{
									$spath = "../image/data/" .$pic_int[$i]."/";
									if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
									else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
									$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
									if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
									else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;		
								} else {
									$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." The product passed"." \n";
									$this->adderr($err);
									continue;
								}		
								if (!is_dir($spath)) {
									if (!@mkdir($spath, 0755)) {								
										$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
										$this->adderr($err);
										continue;
									}
								}
								if (!is_dir($path)) @mkdir($path, 0755);					
								$path = $path.$app.$se;
								
							} else 	{
								$pic_addr = '';
								if (!empty($url)) {									
									$link = $this->symbol($url);																	
									if (substr_count($link, "data/")) {
										$nom = strpos($link, "data/");		
										$link = substr($link, $nom);
										$pic_addr = $link;		
									}
								}	
							}
							
							if (!file_exists($path) and $newphoto != 5) {
								$pict = $this->curl_get_contents($url, 1, $sleep, $ffile);
								if (!$this->isPicture($pict)) {								
									$err =  " Download additional photo fails. Url: ". $url . " Row ~= " . $row_count . " SKU = " . $row[$cod] ." \n";
									$this->adderr($err);
									continue;
								}
								$bytes = @file_put_contents($path, $pict);
								if (!$bytes) {
									$bytes = @file_put_contents($spath, $pict);
									$pic_addr = $spic_addr;
								}	
								if ($bytes) $this->addPicture($last_product_id, $pic_addr, $k);	
							} else {
								$rows = $this->getProductImage($last_product_id);
								$e = 1;
								if (!empty ($rows)) {	
									foreach ($rows as $p) {
										if ($p['image'] == $pic_addr) $e = 0;
									}
								}
								if ($newphoto == 5) {
									$pa = "../image/" . $pic_addr;
									if (!file_exists($pa)) $pic_addr = '';										
								}
								if ($e and !empty($pic_addr)) $this->addPicture($last_product_id, $pic_addr, $k);										
							}			
						}
					}
				}
				if ($nojpg) {
					if (!empty($parsk) and isset($row[$parsk])) {
						$url = $this->checkurl($row[$parsk]);					
						if (strlen($ht) < 1024 or $parsed != $parsk) $ht = $this->curl_get_contents($url, 0, $sleep, $ffile);
						if (strlen($ht) < 1024) {										
							$err =  " Parsing additional photo error: Row ~= " . $row_count . " url = ". $url. " Check your settings \n";
							$this->adderr($err);										
							continue;
						}
					}
					$parsed = $parsk;
					for ($k=1; $k<=$ns; $k++) {						
						if (!isset($seeks[$k]) or empty($seeks[$k])) break;						
						$fname = "photo";
						if (isset($marks[$k]) and !empty($marks[$k])) {												
							$fname = $marks[$k];
						} else {						
							if (isset($row[$manuf]) and !empty($row[$manuf])) {
								$fname = $row[$manuf];								
								$fname = substr($fname, 0, 16);
							}
						}						
						$key = '';						 
						$urlp = $this->ParsPic($ht, $url, $key, $seeks[$k], $fname, $pic_ext);		
						if ($urlp) {				
							$ise = ".jpg";
							$nom = stripos($urlp, ".jpg");
							if (!$nom) {
								$nom = strrpos($urlp, ".jpeg");
								if ($nom) $ise = ".jpeg";
							}
							if (!$nom) {
								$nom = strrpos($urlp, ".png");
								if ($nom) $ise = ".png";
							}	
							if (!$nom) {
								$nom = strrpos($urlp, ".PNG");
								if ($nom) $ise = ".png";
							}
							if (!$nom) {
								$nom = strrpos($urlp, ".gif");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($urlp, ".GIF");
								if ($nom) $ise = ".gif";
							}
							if (!$nom) {
								$nom = strrpos($urlp, ".bmp");
								if ($nom) $ise = ".bmp";
							}
							if (!$nom) {
								$nom = strrpos($urlp, ".BMP");
								if ($nom) $ise = ".bmp";
							}
				
							$a = strlen($urlp);
							if (!$nom or $a - $nom > 5) {
								$se = $ise;
								$nom = $a;
							} else $se = substr($urlp, $nom);
							$app = '';
							if (!empty($seo_data['prod_photo'])) {
								$data['name'] = '';
								if (isset($row_product[0]['item']) and !empty($row_product[0]['item'])) $data['name'] = $row_product[0]['item'];
								$data['category'] = '';
								if (isset($text_cat) and !empty($text_cat)) $data['category'] = trim($text_cat);
								$data['manufacturer'] = '';
								if (isset($row[$manuf]) and !empty($row[$manuf])) $data['manufacturer'] = $row_product[0]['manuf_name'];
								$data['model'] = '';
								if (isset($row_product[0]['model']) and !empty($row_product[0]['model'])) $data['model'] = $row_product[0]['model'];
								$data['brand'] = '';
								if (isset($row[$ref]) and !empty($row[$ref])) $data['brand'] = $this->getName($row[$ref]);
								$data['sku'] = '';
								if (isset($row[$cod]) and !empty($row[$cod])) $data['sku'] = trim($row[$cod]);
								$app = $this->namePhoto($store, $data, $seo_data['prod_photo']);
								$app = $this->TransLit($app);
								$app = strtolower($app);
							}
							if (empty($app)) {
								$app = substr($urlp, 0, $nom);
								$nom = strpos($app, ".");
								$app = substr($app, $nom+7);
								$app = $this->TransLit($app);
								$nom = strlen($app);
								if ($nom > 250) $app = substr($app, $nom-250, 250);
								if ($nom < 2) $app = rand(0, 999999999);								
								$app = $this->MetaURL($app);
							}
	
							if (!empty ($pic_int[$i]))	{
								$spath = "../image/data/" .$pic_int[$i]."/";
								if (!$subfolder) $path = "../image/data/" .$pic_int[$i]."/";
								else $path = "../image/data/" .$pic_int[$i]."/".$papka."/";
								$spic_addr = "data/".$pic_int[$i]."/".$app.$se;
								if (!$subfolder) $pic_addr = "data/".$pic_int[$i]."/".$app.$se;
								else $pic_addr = "data/".$pic_int[$i]."/".$papka."/".$app.$se;		
							} else {
								$err =  " Please, set folder for photo on page 'Category and margin'  for Category '" .$this->symbol($catmany[0])."' Row ~= " . $row_count ." The product passed"." \n";
								$this->adderr($err);
								continue;
							}		
							if (!is_dir($spath)) {
								if (!@mkdir($spath, 0755)) {								
									$err =  " Photo has not been write: Row ~= " . $row_count . " SKU = " . $row[$cod] . " Can not create folder: " . $spath. ", create it manually \n";
									$this->adderr($err);
									continue;
								}
							}
							if (!is_dir($path)) @mkdir($path, 0755);
							$path = $path.$app.$se;							
							if (!file_exists($path)) {					
								$pict = $this->curl_get_contents($urlp, 1, $sleep, $ffile);
								if (!$this->isPicture($pict)) break;									
								$bytes = @file_put_contents($path, $pict);
								if (!$bytes) {
									$bytes = @file_put_contents($spath, $pict);
									$pic_addr = $spic_addr;
								}	
								if ($bytes) $this->addPicture($last_product_id, $pic_addr, $k);
							} else {
								$rows = $this->getProductImage($last_product_id);
								$e = 1;
								if (!empty ($rows)) {	
									foreach ($rows as $p) {
										if ($p['image'] == $pic_addr) $e = 0;
									}
								}
								if ($e and !empty($pic_addr)) $this->addPicture($last_product_id, $pic_addr, $k);										
							}					
						} // !er				
					} // end for picture
				}	
			
				if (!empty($related)) {
					$related_val = explode(";" , $row[$related]);
					foreach ($related_val as $val) {						
						$rows = $this->getProductBySKU($val, $store);
						if (isset($rows) and !empty($rows[0]['product_id'])) {
							$related_id = $rows[0]['product_id'];
							$rows = $this->getRalated($last_product_id, $related_id);
							if (isset($rows) and empty($rows)) $this->addRelated($last_product_id, $related_id);			
												
							$rows = $this->getRalated($related_id, $last_product_id);
							if (isset($rows) and empty($rows)) $this->addRelated($related_id, $last_product_id);
						
						}	
					}
				}				
			}			
			
			if (!empty($report)) $this->addReport($report, $row_count, $row[$cod]);
			$old_sku = $row[$cod];
		}		
		if ($exsame) $this->EndEx(8);

		$this->cache->delete('seo_pro'); 
	
		if ($usd) {	
			$table = DB_PREFIX . "product_option_value";
			$tname = "base_price";
			if ($this->getColumnName($table, $tname))
			@file_get_contents(HTTP_CATALOG."index.php?route=wgi/currency_plus&type=product");	
		}
		
		$path = "./uploads/total.tmp";
		if (file_exists($path)) unlink ($path);
		
		$path = "./uploads/sos.tmp";
		if (file_exists($path)) unlink ($path);
				
		$path = "./uploads/schema.tmp";
		if (file_exists($path)) unlink ($path);
				
		$path = "./uploads/attribute.tmp";
		if (file_exists($path)) unlink ($path);
				
		$path = "./uploads/manufacturer.tmp";
		if (file_exists($path)) unlink ($path);
		
		return '0;'.$total_add.';'.$total_up;
	}	
}
?>