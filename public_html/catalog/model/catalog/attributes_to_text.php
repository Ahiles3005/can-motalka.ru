<?php
 class ModelCatalogAttributesToText extends Model{public function getText($ac4fa5c252c5b54cdd52f851bc6c2e4b1,$a7bcc036263cdc4cd4ed7d120246b38c3){$adbf94ccfa2838362ff09754c02334abb="";$this->load->model('catalog/product');$a9d004b55561e94d62de835cfd36c7164=$this->model_catalog_product->getProductAttributes($ac4fa5c252c5b54cdd52f851bc6c2e4b1);$a8d989193b9d4e1a71cfd9cb41cd8b001=array();foreach($a9d004b55561e94d62de835cfd36c7164 as $a22d71ab3a1fa7a076781836f14dea9b7){foreach($a22d71ab3a1fa7a076781836f14dea9b7['attribute']as $a9580199cf240d9477304c8b7ee3d4d75){if(isset($a7bcc036263cdc4cd4ed7d120246b38c3['attributes'][$a9580199cf240d9477304c8b7ee3d4d75['attribute_id']])){if($a7bcc036263cdc4cd4ed7d120246b38c3['attributes'][$a9580199cf240d9477304c8b7ee3d4d75['attribute_id']]['show']==1){$a8d989193b9d4e1a71cfd9cb41cd8b001[]=$a9580199cf240d9477304c8b7ee3d4d75['text'];}else if($a7bcc036263cdc4cd4ed7d120246b38c3['attributes'][$a9580199cf240d9477304c8b7ee3d4d75['attribute_id']]['show']==2&&in_array($a9580199cf240d9477304c8b7ee3d4d75['text'],explode(',',$a7bcc036263cdc4cd4ed7d120246b38c3['attributes'][$a9580199cf240d9477304c8b7ee3d4d75['attribute_id']]['replace']))){$a8d989193b9d4e1a71cfd9cb41cd8b001[]=$a9580199cf240d9477304c8b7ee3d4d75['name'];}}}}if($a8d989193b9d4e1a71cfd9cb41cd8b001){$a5214420f3f86d365beed4481d73e0328=isset($a7bcc036263cdc4cd4ed7d120246b38c3['attributes_separator'])?$a7bcc036263cdc4cd4ed7d120246b38c3['attributes_separator']:"/";$adbf94ccfa2838362ff09754c02334abb=implode($a8d989193b9d4e1a71cfd9cb41cd8b001,$a5214420f3f86d365beed4481d73e0328);}if(isset($a7bcc036263cdc4cd4ed7d120246b38c3['attributes_cut'])){$a548294ff76f713479dc96285c656b701=strlen($adbf94ccfa2838362ff09754c02334abb)>$a7bcc036263cdc4cd4ed7d120246b38c3['attributes_cut']?'..':'';$adbf94ccfa2838362ff09754c02334abb=utf8_substr($adbf94ccfa2838362ff09754c02334abb,0,$a7bcc036263cdc4cd4ed7d120246b38c3['attributes_cut']).$a548294ff76f713479dc96285c656b701;}return $adbf94ccfa2838362ff09754c02334abb;}}
