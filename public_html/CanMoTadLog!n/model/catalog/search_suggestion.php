<?php
 class ModelCatalogSearchSuggestion extends Model{public function getNewModules(){$this->load->model('design/layout');$a4aaf98a5b359cf828f97462a5f79a3ce=$this->model_design_layout->getLayouts();$aba328a6662809c408518f7f66709974c=count($a4aaf98a5b359cf828f97462a5f79a3ce);$ac848e058187d39356ce79bf909729828=array();for($a9991f91b14d2a44dcb1eafccb473317c=0;$a9991f91b14d2a44dcb1eafccb473317c<$aba328a6662809c408518f7f66709974c;$a9991f91b14d2a44dcb1eafccb473317c++){$ac848e058187d39356ce79bf909729828[$a9991f91b14d2a44dcb1eafccb473317c]=array('layout_id'=>$a4aaf98a5b359cf828f97462a5f79a3ce[$a9991f91b14d2a44dcb1eafccb473317c]['layout_id'],'position'=>'content_bottom','status'=>1,'sort_order'=>0);}return $ac848e058187d39356ce79bf909729828;}public function getDefaultOptions(){return array('key'=>'a2f9f6b882d05b6f9b2ad36e7f97c87e','search_order'=>'name','search_order_dir'=>'asc','search_logic'=>'and','search_limit'=>7,'search_cache'=>1,'search_css'=>'.ui-autocomplete .ui-menu-item, 
.ui-autocomplete .ui-menu-item div,
.ui-autocomplete .ui-menu-item span {
  margin: 0;	
  padding: 0;
  border: 0;
  text-align:left;
  overflow: hidden;
}
.ui-autocomplete .ui-menu-item span {
  margin-right: 5px;	
}
.ui-autocomplete .ui-menu-item .label {
  font-weight: bold;	
}
.ui-autocomplete  .image img {
  border: 1px solid #E7E7E7;
}
.ui-autocomplete  .price-old {
  margin-right: 2px;
  color: #F00;
  text-decoration: line-through;
}
.ui-autocomplete  .price-new {
  font-weight: bold;
}
.ui-autocomplete {
  z-index: 99 !important;
}','search_where'=>array('name'=>1,'tags'=>1,'description'=>1),'search_field'=>array('image'=>array('sort'=>0,'show'=>1,'width'=>40,'height'=>40,'location'=>'inline','css'=>'float: left;
margin: 0 5px 0 0;'),'name'=>array('sort'=>1,'show'=>1,'css'=>'color: #38B0E3;
font-weight: bold;
text-decoration: none;
height: 20px;'),'price'=>array('sort'=>2,'show'=>1,'show_field_name'=>1),'manufacturer'=>array('sort'=>3,'show_field_name'=>1,'location'=>'inline'),'model'=>array('sort'=>4,'show_field_name'=>1,'location'=>'inline'),'sku'=>array('sort'=>5,'show_field_name'=>1,'location'=>'inline'),'upc'=>array('sort'=>6,'show_field_name'=>1,'location'=>'inline'),'ean'=>array('sort'=>7,'show_field_name'=>1,'location'=>'inline'),'jan'=>array('sort'=>8,'show_field_name'=>1,'location'=>'inline'),'isbn'=>array('sort'=>9,'show_field_name'=>1,'location'=>'inline'),'mpn'=>array('sort'=>10,'show_field_name'=>1,'location'=>'inline'),'quantity'=>array('sort'=>11,'show_field_name'=>1,'location'=>'inline'),'description'=>array('sort'=>12,'cut'=>50,),'attributes'=>array('sort'=>13,'cut'=>50,'separator'=>' / ','show_field_name'=>1),'rating'=>array('sort'=>14,'show_field_name'=>1)));}}
