<?php 
    //setting
    $hlp = 'data-toggle="tooltip"';
    $cls_hel = ' class="helpis"';
    $cls_tab = 'class="nav nav-tabs"';
    $text_error_param = 'error_param';
    $text_color_red = 'color_red';
    $cls_blue = 'class="color_blue"';
    $maxlen_sep = '1';
    $flag_breadcrumbs = true;
    //$text_dbl_fv = 'dbl_fv';
    //$text_dbl_base = 'dbl_base';
    //otlad
    //for seo_url
    //$dbl = '-dbl';
    //$flag_otlad = false;
    //
    $show_link_slider = false;
    if(isset($for_otlad['show_link_slider'])) {
        $show_link_slider = true;
    }
    //save_popup
    $save_popup = true;
    $ajax_err = true;
?>
<?php echo $header; ?><?php if(!$versi_cms1) {echo $column_left;} ?>
<div id="content"><!-- id="content" -->
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <div class="page-header">
    <div id="parent_blok">
        <div id="loader_img"></div>
        <div id="popup_save"></div>
    </div>
    <div class="container-fluid">
      <div class="pull-right">
        <?php if($bloc_bott) { ?>
        <span id="primenit" <?php echo $hlp; ?> title="<?php echo $button_aple; ?>" class="btn btn-info"><i class="fa fa-undo"></i></span>
        <button type="submit" name="save" form="form" <?php echo $hlp; ?> title="<?php echo $button_save; ?>" class="btn btn-primary knopi"><i class="fa fa-save"></i></button>
        <?php } ?>
        <a href="<?php echo $cancel; ?>" <?php echo $hlp; ?> title="<?php echo $button_cancel; ?>" class="btn btn-default knopi"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
    </div>
  </div>
  <div class="container-fluid"><!-- class="container-fluid" 2 -->
  <?php $it = 1; ?>
    <div id="error_warning">
    <?php if ($error_warning) { ?>
        <?php if($versi_cms1) { ?>
        <div tabindex="<?php echo $it; ?>" class="warning"><?php echo $error_warning; ?>
            <button type="button" class="close">&times;</button>
        </div>
        <?php } else { ?>
        <div tabindex="<?php echo $it; ?>" class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
    <?php } ?>
    </div>
    <div class="panel panel-default div_panel"><!-- class="panel panel-default" -->
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            <div id="ssuu">
            <?php if($success) { ?>
                <?php if($versi_cms1) { ?>
                <span title="<?php echo $legnd_close_success; ?>" <?php echo $hlp; ?> class="success filtr" onclick="this.remove();"><?php echo $success; ?></span>
                <?php } else { ?>
                <div class="seo_infa alert alert-success" style="margin-bottom:0px; padding:5px 17px; min-width:160px;"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
                    <button type="button" class="close" data-dismiss="alert">&nbsp;&times;</button>
                </div>
                <?php } ?>
            <?php } ?>
            </div>
      </div>
    <div class="panel-body div_form"><!-- class="panel-body" -->
    <!-- start module -->
    <?php if($shabl != 'seo_url') { ?>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" class="form-horizontal">
    <?php } ?>
        <ul <?php echo $cls_tab; ?> id="tabs">
        <?php foreach($tab_nav as $key => $val) { ?>
            <?php $cls_act = null;
                $suff = null; $blok = null;
                if(($shabl == 'base') && ($key === 0)) {$cls_act = 'class="active"';}
                elseif($shabl == $val['id']) {$cls_act = 'class="active"';$suff = '_';}
                if(in_array($val['id'], $arr_tab)) {$blok = '_';}
            ?>
            <li id="<?php echo $val['id'],$suff; ?>" <?php echo $cls_act; ?>><a href="#<?php echo $val['href']; ?>" data-toggle="tab" class="linc<?php echo $suff,$blok; ?>" id="<?php echo $key; ?>"><?php echo $val['txt']; ?></a></li>
        <?php } ?>
            
        </ul>
    <div class="tab-content"><!-- tab-content -->
    <?php if($shabl == 'seo_url') { ?>
    <div id="tab-<?php echo $shabl; ?>"><!-- #seo_url -->
        <div class="form-group"><!-- filter_vier_seo_url -->
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" class="form-horizontal">
            <div class="sett_main"><!-- seo_url -->
                <?php $pole = 'seo_url'; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_url_set[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_url_set[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div><!-- / seo_url -->
            <div class="sett_main ram_dash"><!-- after_slash -->
                <?php $pole = 'after_slash'; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_url_set[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_url_set[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div><!-- / after_slash -->
            <div class="sett_main"><!-- lang_translit -->
                <label class="control-label" for="lang_translit">
                <span <?php echo $hlp; ?> title="<?php echo $help_lang_translit; ?>"><?php echo $legnd_lang_translit; ?></span>   
                  <select name="filter_vier_url_set[lang_translit]" id="lang_translit" class="select_fv">
                    <?php foreach($languages as $colum) {
                            $selec = null; 
                            if(isset($filter_vier_url_set['lang_translit']) && ($filter_vier_url_set['lang_translit'] == $colum['language_id'])) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $colum['language_id']; ?>" <?php echo $selec; ?>><?php echo $colum['code']; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div><!-- /lang_translit -->
            <!-- separators -->
             <?php $class_error = null; if($error_class_separators) {$class_error = $text_error_param;} ?>
            <div id="error_class_separators" class="sett_main posit <?php echo $class_error; ?>">
                <label class="control-label" for="input_separators">
                    <span <?php echo $hlp; ?> title="<?php echo $help_separators; ?>"><?php echo $legnd_separators; ?></span>
                    <?php $value_separ = null; if(isset($filter_vier_url_set['separators']) && !empty($filter_vier_url_set['separators'])) {$value_separ = $filter_vier_url_set['separators'];} ?>
                    <input class="input_center input_width_40" id="input_separators" type="text" name="filter_vier_url_set[separators]" value="<?php echo $value_separ; ?>" />
                </label>
            </div><!-- /separators -->
            <div class="sett_main ram_dash"><!-- gen_transl -->
                <label class=" control-label" for="gen_transl">
                    <?php $pole = 'del_tire'; ?>
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                        <?php $chek = null; if(isset($filter_vier_url_set[$pole])) { $chek = ' checked="checked"';} ?>
                        <input type="checkbox" name="filter_vier_url_set[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                    <?php $pole = 'gen_transl'; ?>
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>">
                        <input type="submit" name="<?php echo $pole; ?>" id="<?php echo $pole; ?>" value="<?php echo ${'legnd_'.$pole}; ?>" />
                    </span>
                </label>
            </div><!-- /gen_transl -->
            <div class="sett_main"><!-- add_transl ram_dash -->
                    <?php $pole = 'add_transl'; ?>
                    <span id="<?php echo $pole; ?>1" class="button_submit bg_grey"><?php echo ${'legnd_'.$pole}; ?></span>
                    <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span>
            </div><!-- /add_transl -->
            <div class="sett_main"><!-- clear_table -->
                <?php $pole = 'clear_table'; ?>
                <span id="<?php echo $pole; ?>1" class="button_submit bg_grey"><?php echo ${'legnd_'.$pole}; ?></span>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span>
            </div><!-- /clear_table -->
          </form>  
        </div><!-- /filter_vier_seo_url -->
        <div class="name_group_main"><?php echo $help_edit_transl; ?></div>
        <div class="clear"></div>
    <!-- seo attributes -->
    <div id="block_seo_url"><!-- block_seo_url -->
    <?php if(!empty($seo_attributes)) { ?>
    <div class="block-param">
        <?php $main_key = 'attrb';  ?>
        <fieldset>
            <legend>
                <span class="jir"><?php echo $legnd_attrb; ?></span>
                <span class="gran"></span>
                <?php $chec = null; if(isset($filter_vier_url_set['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                <input form="form" type="checkbox" name="filter_vier_url_set[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
                <span class="gran"></span>
                <span class="ram_dash color_blue"><!-- for_otlad -->
                    <?php $pole = 'show_link_slider'; ?>
                    <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php //echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($for_otlad[$pole])) { $chek = ' checked="checked"';} ?>
                    <input form="form" type="checkbox" name="for_otlad[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </span><!-- / for_otlad -->
                <span class="gran"></span>
                <span class="ram_dash"><!-- add_group_trans -->
                    <?php $pole = 'add_group_trans'; ?>
                    <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php //echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($for_otlad[$pole])) { $chek = ' checked="checked"';} ?>
                    <input form="form" type="checkbox" name="for_otlad[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </span><!-- / add_group_trans -->
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php foreach($seo_attributes as $attributes) { ?>
                <tr class="group_attr">
                    <td colspan="2" class="color_white"><?php echo $attributes['name_group']; ?></td>
                </tr>
                <?php foreach($attributes['attrb'] as $attribute) { ?>
                    <?php $main_id = $attribute['attribute_id'];
                        $flg_slider = null; if($attrb_slider && in_array($main_id, $attrb_slider)) $flg_slider = $cls_blue; ?>
                    <tr class="group_attr jir">
                        <td <?php echo $flg_slider ?>>
                            <?php echo $attribute['name_attr']; ?>
                        </td>
                        <td class="transl">
                            <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][0]" type="text" value="<?php echo $attribute['translit']; ?>" />
                        </td>
                    </tr>
                    <?php $es_sl = ($flg_slider) ? $show_link_slider : true;
                        if($es_sl && isset($attribute['param'])) {
                            foreach($attribute['param'] as $val) { 
                                $key_id = $val['text_id'];
                                //if(empty($key_id) || (strlen($val['name_text']) == 0)) continue; ?>
                    <tr>
                        <td>
                            <?php echo $val['name_text']; ?>
                        </td>
                        <td class="transl">
                            <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $val['translit']; ?>" />
                        </td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>
            </table>
            </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /seo attributes -->
    <!-- seo options -->
    <?php if(!empty($seo_options)) { ?>
    <div class="block-param">
        <?php $main_key = 'optv';  ?>
        <fieldset>
            <legend>
                <span class="jir"><?php echo $legnd_optv; ?></span>
                <span class="gran"></span>
                <?php $chec = null; if(isset($filter_vier_url_set['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                <input form="form" type="checkbox" name="filter_vier_url_set[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php  foreach($seo_options as $options) { 
                    if(isset($options['group_id'])) { 
                        $main_id = $options['group_id'];
                ?>
                <tr class="group_attr jir">
                    <td>
                        <?php echo $options['name_group']; ?>
                    </td>
                    <td class="transl">
                        <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][0]" type="text" value="<?php echo $options['translit']; ?>" />
                    </td>
                </tr>
                <?php } ?>
                <?php //if(isset($options['param'])) {
                        foreach($options['param'] as $option) { ?>
                 <tr>
                    <td>
                        <?php echo $option['name_option']; ?>
                    </td>
                    <td class="transl">
                        <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $option['option_value_id']; ?>]" type="text" value="<?php echo $option['translit']; ?>" />
                    </td>
                </tr>   
                    <?php } ?>
                <?php //} ?>
            <?php }  ?>
            </table>
            </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /seo options -->
    <!-- seo manufs -->
    <?php $main_key = 'manufs';
        if(${'stat_'.$main_key}) {
        ?>
    <?php  $main_id = 1; ?>
    <div class="block-param">
        <fieldset>
            <legend>
                <table class="tbl_seo max_width">
                    <tr class="jir">
                        <td>
                            <?php echo $legnd_manufs; ?>
                        </td>
                        <td class="transl">
                            <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][0]" type="text" value="<?php echo ${$main_key.'_translit'}; ?>" />
                        </td>
                        <td class="gran">
                        <?php $chec = null; if(isset($filter_vier_url_set['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                            <input form="form" type="checkbox" name="filter_vier_url_set[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                            <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
                        </td>
                    </tr>
                </table>
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php foreach($seo_manufs as $brand) { ?>
                <tr>
                    <td>
                        <?php echo $brand['name']; ?>
                    </td>
                    <td class="transl">
                        <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $brand['manufacturer_id']; ?>]" type="text" value="<?php echo $brand['translit']; ?>" />
                    </td>
                </tr>
            <?php } ?>
            </table>
            </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /seo manufs -->
    <!-- seo 'qnts','nows','prs','psp' -->
    <?php $arr_block = array('qnts','nows','prs','psp'); ?>
    <?php foreach($arr_block as $main_key) {
            if(${'stat_'.$main_key}) {
                $main_id = 1; $key_id = 0; ?>
        <div class="block-param">
            <fieldset>
                <legend>
                    <table class="tbl_seo max_width">
                        <tr class="jir">
                            <td>
                                <?php echo ${'legnd_'.$main_key}; ?>
                            </td>
                            <td class="transl">
                                <input class="transl" tabindex="" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo ${$main_key.'_translit'}; ?>" />
                            </td>
                            <td class="gran">
                            <?php $chec = null; if(isset($filter_vier_url_set['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                                <input form="form" type="checkbox" name="filter_vier_url_set[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
                            </td>
                        </tr>
                    </table>
                </legend>
            </fieldset>
        </div>
            <?php }
            } 
            ?><!-- /seo 'qnts','nows','prs','psp' -->
        </div><!-- end block_seo_url -->
        <div class="clear"></div>
    </div><!-- end #seo_url -->
    <?php } elseif($shabl == 'hand_links') { ?>
    <div id="tab-<?php echo $shabl; ?>"><!-- #tab-hand_links -->
        <div class="form-group">
            <?php $pole = 'alias'; ?>
            <div class="sett_main ram_dash">
                <label class="control-label" for="input_<?php echo $pole; ?>">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <input class="input_width_100" id="input_<?php echo $pole; ?>" type="text" name="filter_vier_hl[<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_hl[$pole]) ? $filter_vier_hl[$pole] : null; ?>" />
                </label>
                <span id="primenit" <?php echo $hlp; ?> title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></span>
            </div>
        </div>
        <div class="form-group">
            <table id="tbl_hand_links" class="max_width tbl_hand_links">
                <thead>
                    <tr class="group_attr jir">
                        <td class="width_30pr text-center"><span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_hand_links; ?>">
                            <a href="<?php echo $href_sort; ?>" class="link <?php echo $sotr_order; ?>"><?php echo $text_links; ?></a></span>
                            <span data-toggle="tooltip" title="<?php echo $button_reset; ?>" class="seo_infa"><a class="color_white" href="<?php echo $action; ?>"> -- </a></span>
                        </td>
                        <td class="width_70pr text-center"></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <td colspan="2" id="blok_filter">
                        <div class="pole_filter">
                        <?php foreach($poles_filter as $pole) { ?>
                            <label class="control-label" for="input-<?php echo $pole; ?>"><?php echo ${'list_'.$pole}; ?></label>
                            <input type="text" autocomplete="off" name="filter_<?php echo $pole; ?>" value="<?php echo ${'filter_'.$pole}; ?>" id="input-<?php echo $pole; ?>" class="form-control" />
                        <?php } ?>
                        <button type="button" id="button-filter" class="btn btn-primary"><i class="fa fa-filter"></i> <?php echo $button_filter; ?></button>
                        <button type="button" id="button-reset" class="btn btn-warning"><i class="fa fa-eraser"></i> <?php echo $button_reset; ?></button>
                        </div>
                      </td>
                      <td class="text-center"><button type="button" onclick="redHandLinks(0);" <?php echo $hlp; ?> title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                    </tr>
                </tbody>
                <tbody id="tb_pole_red">
                </tbody>
                <tfoot id="th_pole">
                <?php $c_l = $poles_landing_count['c_l']; $c_l_2 = $poles_landing_count['c_l_2']; ?>
                <?php foreach($hand_links as $val) { ?>
                    <tr id="polerow_<?php echo $val['id']; ?>" class="bloc_pole">
                        <td class="links">
                        <div id="id_<?php echo $val['id']; ?>" class="linkz max_width imt_input"><?php echo $val['link']; ?></div></td>
                        <td class="meta_data">
                        <?php foreach ($languages as $language) {
                                $lang_id = $language['language_id'];
                        ?>
                            <table>
                            <?php foreach($poles_landing as $k => $pol) { ?>
                                <tr>
                                <?php if($k === 0) { ?>
                                    <td class="group_attr" rowspan="<?php echo $c_l; ?>"><img src="<?php echo $language['src_img']; ?>" alt="<?php echo $language['name']; ?>" /></td>
                                <?php } ?>
                                <?php if($k === $c_l_2) { ?>
                                    <td class="jir bord_bot"><?php echo $entry_description; ?></td>
                                    <td class="max_width"><div id="<?php echo 'hand_links_'.$val['id'].'_'.$pol.'_'.$lang_id; ?>" class="max_width imt_textarea"><?php echo isset($val[$pol][$lang_id]) ? $val[$pol][$lang_id] : ''; ?></div></td>
                                </tr>
                                <tr>
                                <?php } else { ?>
                                    <td class="jir"><?php echo $pol; ?></td>
                                    <td class="max_width"><div id="<?php echo 'hand_links_'.$val['id'].'_'.$pol.'_'.$lang_id; ?>" class="max_width imt_input" ><?php echo isset($val[$pol][$lang_id]) ? $val[$pol][$lang_id] : ''; ?></div></td>
                                <?php } ?>
                                </tr>
                            <?php } ?>
                            </table>
                        <?php } ?>
                        </td>
                        <td class="text-center uprav">
                            <button type="button" onclick="edit_h_l(<?php echo $val['id']; ?>, true)" <?php echo $hlp; ?> title="<?php echo $button_copy; ?>" class="btn btn-success"><i class="fa fa-copy"></i></button>
                            <div class="pading_10"></div>
                            <button type="button" onclick="edit_h_l(<?php echo $val['id']; ?>, false)" <?php echo $hlp; ?> title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                            <div class="pading_10"></div>
                            <button type="button" onclick="del_h_l(<?php echo $val['id']; ?>)" <?php echo $hlp; ?> title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
                </tfoot>
            </table>
        </div>
        <div class="row">
          <?php if($versi_cms1) { ?>
          <div class="pagination"><?php echo $pagination; ?></div>
          <?php } else { ?>
          <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
          <div class="col-sm-6 text-right"><?php echo $results; ?></div>
          <?php } ?>
        </div>
    </div><!-- end #tab-hand_links -->
    <?php } elseif($shabl == 'lic') { ?>
    <div id="tab-<?php echo $shabl; ?>">
        <div class="form-group">
            <div class="sett_main">
                <span><?php echo $legnd_lic; ?><span class="color_red">*</span></span>
                <input class="width_300" type="text" value="" name="lic_key" />
                <input type="submit" name="add_key" value="<?php echo $bott_lic; ?>" />
            </div>
        </div>
        <div class="form-group">
            <div class="sett_main">
                <span><?php echo $legnd_get_key; ?></span>
                <input type="submit" name="get_key" value="<?php echo $bott_get_key; ?>" />
            </div>
        </div>
    </div>
    <?php } elseif($shabl == 'base') { ?>
    <div class="tab-pane active" id="tab-general"><!-- #general -->
      <div class="form-group" id="set_main"><!-- group_main-set_main -->
        <div class="sett_main">
            <label class="control-label" for="input_status"><?php echo $entry_status; ?>
              <select name="filter_vier_status" id="input_status" class="form-control select_fv1">
                <?php if($filter_vier_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php }  ?>
              </select>
           </label>
        </div>
        <!-- temes -->
        <div class="sett_main">
            <label class="control-label" for="themes_filter"><?php echo $legnd_themes; ?>
              <select name="filter_vier_setting[themes]" id="themes_filter" class="form-control select_fv1">
                <?php foreach($themes as $theme) {
                        $selec = null; if(isset($filter_vier_setting['themes']) && ($filter_vier_setting['themes'] == $theme)) { $selec = 'selected="selected"'; } ?>
                   <option value="<?php echo $theme; ?>" <?php echo $selec; ?>><?php echo $theme; ?></option> 
                <?php } ?>
              </select>
            </label>
        </div>
        <!-- checks -->
        <div class="sett_main">
            <label class="control-label" for="select_checks"><?php echo $legnd_select_checks; ?>   
              <select name="filter_vier_setting[select_checks]" id="select_checks" class="form-control select_fv1">
                <?php foreach($select_checks as $select_check) {
                        $selec = null; if(isset($filter_vier_setting['select_checks']) && ($filter_vier_setting['select_checks'] == $select_check)) { $selec = ' selected="selected"'; } ?>
                   <option value="<?php echo $select_check; ?>" <?php echo $selec; ?>><?php echo $select_check; ?></option>
                <?php } ?>
              </select>
            </label>
        </div>
        <div class="sett_main">
            <?php $pole = 'skin_slider'; ?>
            <label class="control-label" for="<?php echo $pole; ?>">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <select name="filter_vier_setting[<?php echo $pole; ?>]" id="<?php echo $pole; ?>" class="form-control select_fv1">
                <?php foreach($skin_sliders as $slider) {
                        $selec = null; if(isset($filter_vier_setting[$pole]) && ($filter_vier_setting[$pole] == $slider)) { $selec = 'selected="selected"'; } ?>
                   <option value="<?php echo $slider; ?>" <?php echo $selec; ?>><?php echo $slider; ?></option> 
                <?php } ?>
                </select>
            </label>
        </div>
        <div class="sett_main">
            <?php $pole = 'button'; ?>
            <label class="control-label" for="<?php echo $pole; ?>">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <select name="filter_vier_setting[<?php echo $pole; ?>]" id="<?php echo $pole; ?>" class="form-control select_fv1">
                <?php foreach($buttons as $butt) {
                        $selec = null; if(isset($filter_vier_setting[$pole]) && ($filter_vier_setting[$pole] == $butt)) { $selec = 'selected="selected"'; } ?>
                   <option value="<?php echo $butt; ?>" <?php echo $selec; ?>><?php echo $butt; ?></option>
                <?php } ?>
                </select>
            </label>
        </div>
        <!--  mobil_versi -->
        <div class="sett_main">
            <label class="control-label" for="mobil_versi">
                <span <?php echo $hlp; ?> title="<?php echo $help_mobil_versi; ?>"><?php echo $legnd_mobil_versi; ?></span>
              <select name="filter_vier_setting[mobil_versi]" id="mobil_versi" class="form-control select_fv1">
                <?php foreach($mobil_versis as $mobil_versi) {
                        $selec = null; if(isset($filter_vier_setting['mobil_versi']) && ($filter_vier_setting['mobil_versi'] == $mobil_versi)) { $selec = 'selected="selected"'; } ?>    
                   <option value="<?php echo $mobil_versi; ?>" <?php echo $selec; ?>><?php echo $mobil_versi; ?></option> 
                <?php } ?>
              </select>
            </label>
        </div>
        <div class="sett_main">
            <?php $pole = 'ajax_filter'; ?>
            <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </label>
        </div>
        <div class="sett_main">
            <?php $pole = 'clear_cache'; ?>
            <span id="<?php echo $pole; ?>1" class="button_submit bg_grey"><?php echo ${'legnd_'.$pole}; ?></span>
            <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span>
        </div>
    </div><!-- group_main-set_main -->
    <div class="clear"></div>
    <div class="form-group" id="group_main"><!-- group_main -->
        <div class="sett_main cache">
            <label class="control-label" for="input_cache">
                <span <?php echo $hlp; ?> title="<?php echo $help_cache; ?>"><?php echo $legnd_cache; ?></span>
                <?php $chek = null; if(isset($filter_vier_cache) && !empty($filter_vier_cache)) { $chek = ' checked="checked"';} ?>
                <input class="" id="input_cache" type="checkbox" name="filter_vier_cache" value="1" <?php echo $chek; ?> />
            </label>
        </div>
        <div class="sett_main posit">
            <label class="control-label" for="input_position">
                <span <?php echo $hlp; ?> title="<?php echo $help_position; ?>"><?php echo $legnd_position; ?></span>
                <input class="input_center input_width_30" id="input_position" type="text" name="filter_vier_setting[position]" value="<?php echo isset($filter_vier_setting['position']) ? $filter_vier_setting['position'] : null; ?>" />
            </label>
        </div>
        <?php $set_main = array('scroll_item','sort_quant','gua_qv_now','null_count','sub_cats','scrollis');
            foreach($set_main as $pole) { ?>
        <div class="sett_main">
            <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </label>
        </div>
        <?php } ?>
        <div class="sett_main">
        <?php $set_main = array('sort_name','sort_model','sort_price','sort_price_desc','sort_rating_desc','sort_viewed_desc','sort_date_added_desc','sort_quantity_desc','sort_random'); ?>
            <label class="control-label" for="sort_default">
                <span <?php echo $hlp; ?> title="<?php echo $help_sort_default; ?>"><?php echo $legnd_sort_default; ?></span>
              <select name="filter_vier_setting[sort_default]" class="form-control select_fv" id="sort_default">
                <option value="0">---</option>
              <?php foreach($set_main as $pole) {
                    $selec = null; if(isset($filter_vier_setting['sort_default']) && ($filter_vier_setting['sort_default'] == $pole)) { $selec = 'selected="selected"'; } ?>
                   <option value="<?php echo $pole; ?>" <?php echo $selec; ?>><?php echo ${'legnd_'.$pole}; ?></option> 
                <?php } ?>
              </select>
            </label>
        </div>
    </div><!-- end group_main -->
    <div class="clear"></div>
    <div id="block_filter_vier"><!-- block_filter_vier -->
    <!-- attributes -->
    <?php if(!empty($view_attributes)) { ?>
    <div class="block-param">
        <fieldset>
            <?php $pz = 'attrb'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="text_center marg_5_0">
                <?php $pole = 'gen_text_id'; ?>
                <span id="<?php echo $pole; ?>1" class="button_submit bg_green" style="color: indianred;"><?php echo ${'legnd_'.$pole}; ?></span>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span>
                <span class="gran"></span>
                <?php $pole = 'html_tag'; ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>" style="color: #000;"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </div>
            <div class="status">
                <?php $arr_set = array('inout','count');
                    foreach($arr_set as $set) {
                        $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <?php if($set == 'inout') { ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span>
                <?php } ?>
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
            <?php } ?>
                <?php echo $legnd_attr_sep; ?>
                <span <?php echo $hlp; ?> title="<?php echo $help_attr_sep; ?>" class="helpis"></span>
                <input class="input_center input_width_30" name="filter_vier_setting[<?php echo $pz; ?>][separ]" type="text" maxlength="<?php echo $maxlen_sep; ?>" value="<?php echo isset($filter_vier_setting[$pz]['separ']) ? $filter_vier_setting[$pz]['separ'] : null; ?>" />
            </div>
            <div class="block_check">
                <a onclick="$('.check_attr').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('.check_attr').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
            </div>
            <div class="scrolis">
            <table class="tbl_param max_width">
                <tr class="jir">
                    <td class="text_right">
                        <?php if($flag_diap) { ?>
                        <?php echo $legnd_diap_mark; ?><span <?php echo $hlp; ?> title="<?php echo $help_diap_mark; ?>" class="helpis"></span>
                        <input class="input_center input_width_30" name="filter_vier_setting[attrb][diap_mark]" type="text" maxlength="<?php echo $maxlen_sep; ?>" value="<?php echo isset($filter_vier_setting['attrb']['diap_mark']) ? $filter_vier_setting['attrb']['diap_mark'] : null; ?>" />
                        <?php  ?>
                        <br />
                        <?php echo $legnd_diap_step; ?><span <?php echo $hlp; ?> title="<?php echo $help_diap_step; ?>" class="helpis"></span>
                        <input class="input_width_100" name="filter_vier_setting[attrb][diap_step]" type="text" value="<?php echo isset($filter_vier_setting['attrb']['diap_step']) ? $filter_vier_setting['attrb']['diap_step'] : null; ?>" />
                        <?php  ?>
                        <?php } ?>
                    </td>
                    <td class="gran color_blue"><?php echo $text_slider;?><span <?php echo $hlp; ?> title="<?php echo $help_slider_attrb; ?>" class="helpis"></span></td>
                    <td class="gran"><?php echo $legnd_button_attrib;?></td>
                    <td class="gran"><span <?php echo $hlp; ?> title="<?php echo $legnd_null_position; ?>" class="helpis color_gr"></span></td>
                </tr>      
        <?php foreach($view_attributes as $attributes) {
                $grp_id = $attributes['group_id']; ?>
                <tr class="group_attr jir">
                    <td colspan="3">
                    <?php echo $attributes['name_group']; ?>
                    <span class="gran">
                    <?php $chec_button = null; if(isset($filter_vier_setting['attrb']['group_view']) && in_array($grp_id, $filter_vier_setting['attrb']['group_view'])) { $chec_button = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][group_view][]" value="<?php echo $grp_id; ?>" <?php echo $chec_button; ?> /><span> <?php echo $legnd_group_view;?></span>
                    </span>
                    </td>
                    <td class="gran color_gr"><?php $chec = null; if(isset($filter_vier_setting['attrb']['group_view']['null_position']) && in_array($grp_id, $filter_vier_setting['attrb']['group_view']['null_position'])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][group_view][null_position][]" value="<?php echo $grp_id; ?>" <?php echo $chec; ?> />
                    </td>
                </tr>
            <?php foreach($attributes['attrb'] as $attr) { ?>
            <?php $attr_id = $attr['attribute_id']; ?>
                <tr>
                    <td class="check_attr"><?php $chec = null; if(isset($filter_vier_setting['attrb']['view']) && in_array($attr_id, $filter_vier_setting['attrb']['view'])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][view][]" value="<?php echo $attr_id; ?>" <?php echo $chec; ?> /> <?php echo $attr['name_attr']; ?>
                    </td>
                    <td class="gran color_blue"><?php $chec_slider = null; if($attrb_slider && in_array($attr_id, $attrb_slider)) { $chec_slider = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][slider][]" value="<?php echo $attr_id; ?>" <?php echo $chec_slider; ?> />
                    </td>
                    <td class="gran"><?php $chec_button = null; if(in_array($attr_id, $attrb_button)) { $chec_button = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][button][]" value="<?php echo $attr_id; ?>" <?php echo $chec_button; ?> />
                    </td>
                    <td class="gran color_gr"><?php $chec = null; if(in_array($attr_id, $attrb_null_position)) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][null_position][]" value="<?php echo $attr_id; ?>" <?php echo $chec; ?> />
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </table>
        </div>
        <div class="block_check">
            <a onclick="$('.check_attr').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('.check_attr').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
        </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /attributes -->
    <!-- options -->
    <?php if(!empty($view_options)) { ?>
    <div class="block-param">
        <fieldset>
            <?php $pz = 'optv'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('inout','count','button');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <?php if($set == 'inout') { ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span>
                <?php } ?>
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
            <?php } ?>
                <span  class="sort_order">
                    <span <?php echo $hlp; ?> title="<?php echo $legnd_null_position; ?>" class="helpis color_gr"></span>
                </span>
            </div>
            <div class="block_check">
                <a onclick="$('.optinz').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('.optinz').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
            </div>
            <div class="scrolis">
            <table class="tbl_param max_width">
        <?php foreach($view_options as $options) { ?>
                <tr class="group_attr jir">
                    <td class="optinz">
                    <?php $chec = null; if(isset($filter_vier_setting[$pz]['view']) && in_array($options['option_id'], $filter_vier_setting[$pz]['view'])) { $chec = ' checked="checked"';} ?>
                        <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][view][<?php echo $options['option_id']; ?>]" value="<?php echo $options['option_id']; ?>" <?php echo $chec; ?> /> <?php echo $options['name_group']; ?>
                    </td>
                    <td class="gran">
                    <?php $chec_img = null; if(isset($filter_vier_setting[$pz]['image']) && in_array($options['option_id'], $filter_vier_setting[$pz]['image'])) { $chec_img = ' checked="checked"';} ?>
                        <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][image][<?php echo $options['option_id']; ?>]" value="<?php echo $options['option_id']; ?>" <?php echo $chec_img; ?> />
                <?php echo $text_image; ?>
                    </td>
                    <td class="gran color_gr">
                    <?php $chec = null; if(isset($filter_vier_setting[$pz]['null_position']) && in_array($options['option_id'], $filter_vier_setting[$pz]['null_position'])) { $chec = ' checked="checked"';} ?>
                        <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][null_position][<?php echo $options['option_id']; ?>]" value="<?php echo $options['option_id']; ?>" <?php echo $chec; ?> />
                    </td>
                </tr>
        <?php } ?>
            </table>
            </div>
            <div class="block_check">
                <a onclick="$('.optinz').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('.optinz').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
            </div>
            <div class="params">
                <span class="jir"><?php echo $legnd_img_wh; ?></span>
                <input class="input_center input_width_30" name="filter_vier_setting[<?php echo $pz; ?>][img_wh]" type="text" value="<?php echo isset($filter_vier_setting[$pz]['img_wh']) ? $filter_vier_setting[$pz]['img_wh'] : null; ?>" />
            </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /options -->
    <!-- price -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'prs'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('inout','count','slider','null_position');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';}
                    if($set == 'inout') { ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span><?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
                <?php } elseif($set == 'null_position') { ?>
                <span  class="sort_order">
                    <span <?php echo $hlp; ?> title="<?php echo ${'legnd_'.$set}; ?>" class="helpis color_gr">
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /></span>
                </span>
                <?php } else { ?>
                    <?php $sld = null; if($set == 'slider') { $sld = $cls_blue; } ?>
                <span <?php echo $sld; ?>><input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /></span>
                <?php echo ${'text_'.$set};
                    if($sld) { ?>
                    <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span>
                    <?php }?>
                <span class="gran"></span>
                <?php } ?>
            <?php } ?>
            </div>
            <div class="params">
                <div class="text-right">
            <?php $set_main = array('del_symbol');
                foreach($set_main as $pole) { ?>
                <span class="gran"></span>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            <?php } ?>
                </div>
            </div>
            <?php $pole = 'step_slider'; ?>
            <div id="<?php echo $pole; ?>" class="params ram_dash">
                <p class="group_attr"><?php echo ${'legnd_'.$pole}; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span></p>
                <input class="input_width_100" type="text" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_setting[$pz][$pole]) ? $filter_vier_setting[$pz][$pole] : null; ?>"/> <span><?php echo $config_currency; ?></span>
                <span class="gran"></span>
                <?php $pole = 'grid_slider'; ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pz][$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </div>
            <?php $pole = 'step_prs'; ?>
            <div id="<?php echo $pole; ?>" class="params ram_dash">
                <p class="group_attr"><?php echo ${'legnd_'.$pole}; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span></p>
                <input class="input-price" type="text" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_setting[$pz][$pole]) ? $filter_vier_setting[$pz][$pole] : null; ?>"/> <span><?php echo $config_currency; ?></span>
            </div>
        </fieldset>
        <script>
            var defol_sld = <?php echo (isset($filter_vier_setting[$pz]['slider'])) ? 'true' : 'false'; ?>;
            var $check_slider = $("input[name='filter_vier_setting[prs][slider]']");
            function videBloc(flag) {
                var $step_slider = $("#step_slider")
                    ,$step_prs = $("#step_prs");
                if(flag) {
                    $step_slider.css({"display":"block"});
                    $step_prs.css({"display":"none"});
                }
                else {
                    $step_slider.css({"display":"none"});
                    $step_prs.css({"display":"block"});
                }
            }
            videBloc(defol_sld);
            $check_slider.on('click', function() {
                videBloc($check_slider.is(':checked'));
            });
        </script>
    </div>
    <!-- /price -->
    <!-- manufacted -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'manufs'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('inout','count','image','null_position');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';}
                    if($set == 'inout') { ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span><?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
                <?php } elseif($set == 'null_position') { ?>
                <span  class="sort_order">
                    <span <?php echo $hlp; ?> title="<?php echo ${'legnd_'.$set}; ?>" class="helpis color_gr">
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /></span>
                </span>
                <?php } else { ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
                <?php } ?>
            <?php } ?>
            </div>
            <div class="params">
                <span class="jir"><?php echo $legnd_img_wh; ?></span>
                <input class="input_center input_width_30" name="filter_vier_setting[<?php echo $pz; ?>][img_wh]" type="text" value="<?php echo isset($filter_vier_setting[$pz]['img_wh']) ? $filter_vier_setting[$pz]['img_wh'] : null; ?>" />
            </div>
        </fieldset>
    </div>
    <!-- /manufacted -->
    <!-- quantity -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'qnts'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('count');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /> 
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
            <?php } ?>
            </div>
            <p class="group_attr">
                <?php echo $legnd_is_quant; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_is_quant; ?>"></span>
                <?php $quant = null; if(isset($filter_vier_setting['qnts']['quant'])) { $quant = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[qnts][quant]" value="1" <?php echo $quant; ?> />
            </p> 
        </fieldset>
    </div>
    <!-- /quantity -->
    <!-- nows -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'nows'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"></span><?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('count');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /> 
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
            <?php } ?>
            </div>
            <p class="group_attr">
                <?php echo $help_news_text; ?>
            </p>
            <p class="params">
                <input class="input_right" type="text" name="filter_vier_setting[<?php echo $pz; ?>][day]" value="<?php echo isset($filter_vier_setting[$pz]['day']) ? $filter_vier_setting[$pz]['day'] : null; ?>" />
                <span><?php echo $help_news_day; ?></span>
            </p>
        </fieldset>
    </div>
    <!-- /nows -->
    <!-- psp -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'psp'; ?>
            <legend><div><?php echo ${'legnd_'.$pz}; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pz}; ?>"></span>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /> 
                    <?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <div class="status">
            <?php $arr_set = array('count');
                foreach($arr_set as $set) {
                    $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /> 
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
            <?php } ?>
            </div>
        </fieldset>
    </div>
    <!-- /psp -->
    <!-- choice -->
    <div class="block-param">
    <?php $pz = 'chc'; ?>
        <fieldset>
            <legend><div><?php echo ${'legnd_'.$pz}; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pz}; ?>"></span>
                <span class="status_blok">
                    <span class="gran"></span>
                    <?php $pole = 'status'; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$pole])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $pole; ?>]" value="1" <?php echo $chec; ?> /> 
                    <?php echo ${'text_'.$pole}; ?>
                   <span class="blok_right">
                       <span class="gran"></span>
                       <?php $pole = 'view_posit'; ?>
                       <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                       <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting[$pole][$pz]) ? $filter_vier_setting[$pole][$pz] : null; ?>" />
                    </span> 
                </span>
            </div></legend>
            <p class="group_attr">
        <?php $pole = 'mini_sel'; ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </p> 
        </fieldset>     
    </div>
    <!-- /choice -->
    </div><!-- end block_filter_vier -->
        <div class="clear"></div>
        <div class="form-group" id="fv_poles"><!-- fv_poles -->
            <div class="name_group_main"><?php echo $legnd_setting_poles; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_setting_poles; ?>"></span></div>
            <?php $set_poles = array('stock_status','rating','reward','discount','plus_sort_name','mini_description','date_end','manufacturer','special','nalog','mult_store','fix_sticker_bestseller','fix_product_series','fix_base_special','fix_bulk_special','fix_attrtool','fix_unit'); ?>
            <?php foreach($set_poles as $pole) { ?>
            <div class="set_poles">
                <label class="ram_dot">
                    <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $check = null; if(isset($filter_vier_setting['poles'][$pole])) { $check = ' checked="checked"';} ?>
                    - <input type="checkbox" name="filter_vier_setting[poles][<?php echo $pole; ?>]" value="1" <?php echo $check; ?> />
                </label>
            </div>                    
            <?php } ?>
        </div><!-- end fv_poles -->
        <div class="clear"></div>
    <?php if($versi_cms1) { ?>
    <!-- layout_setting -->
    <table id="module" class="list">
        <thead>
          <tr>
            <td class="left"><?php echo $entry_layout; ?></td>
            <td class="left"><?php echo $entry_position; ?></td>
            <td class="left"><?php echo $entry_status; ?></td>
            <td class="text_center"><?php echo $entry_sort_order; ?></td>
            <td class="uprav"></td>
          </tr>
        </thead>
        <?php $module_row = 0; ?>
        <?php $arr_position = array('column_left', 'column_right', 'content_top', 'content_bottom'); ?>
        <?php foreach ($modules as $module) { ?>
        <tbody id="module-row<?php echo $module_row; ?>">
          <tr>
            <td class="left">
                <select class="form-control" name="filter_vier_module[<?php echo $module_row; ?>][layout_id]">
                <?php foreach ($layouts as $layout) { ?>
                    <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                    <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                    <?php } ?>
                <?php } ?>
                </select>
            </td>
            <td class="left">
                <select class="posit form-control" name="filter_vier_module[<?php echo $module_row; ?>][position]">
            <?php foreach($arr_position as $posit) { $selec = null; if($module['position'] == $posit) { $selec = ' selected="selected"';} ?>
                    <option class="posit" value="<?php echo $posit; ?>" <?php echo $selec; ?>><?php echo ${'text_'.$posit}; ?></option>
            <?php } ?>
                </select>
            </td>
            <td class="left">
                <select class="form-control" name="filter_vier_module[<?php echo $module_row; ?>][status]">
                    <?php if ($module['status']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td class="right"><input class="text_center form-control" type="text" name="filter_vier_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" /></td>
            <td class="text_center"><button type="button" onclick="$('#module-row<?php echo $module_row; ?>').remove();" <?php echo $hlp; ?> title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
          </tr>
        </tbody>
        <?php $module_row++; ?>
        <?php } ?>
        <tfoot>
          <tr>
            <td colspan="4"></td>
            <td class="text_center">
            <button type="button" onclick="addModule();" <?php echo $hlp; ?> title="<?php echo $button_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
            </td>
          </tr>
        </tfoot>
      </table>
      <script type="text/javascript">
        var module_row = <?php echo $module_row; ?>;
        function addModule() {	
        	html  = '<tbody id="module-row' + module_row + '">';
        	html += '  <tr>';
        	html += '    <td class="left"><select class="form-control" name="filter_vier_module[' + module_row + '][layout_id]">';
        	<?php foreach ($layouts as $layout) { ?>
        	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>';
        	<?php } ?>
        	html += '    </select></td>';
        	html += '    <td class="left"><select class="posit form-control" name="filter_vier_module[' + module_row + '][position]">';
                        <?php foreach($arr_position as $posit) { ?>
            html += '       <option class="posit" value="<?php echo $posit; ?>"><?php echo ${'text_'.$posit}; ?></option>';
                        <?php } ?>
        	html += '    </select></td>';
        	html += '    <td class="left"><select class="form-control" name="filter_vier_module[' + module_row + '][status]">';
            html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
            html += '      <option value="0"><?php echo $text_disabled; ?></option>';
            html += '    </select></td>';
        	html += '    <td class="right"><input class="text_center form-control" type="text" name="filter_vier_module[' + module_row + '][sort_order]" value="" /></td>';
            html += '<td class="text_center"><button type="button" onclick="$(\'#module-row' + module_row + '\').remove();" <?php echo $hlp; ?> title="<?php echo $button_remove; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
        	html += '  </tr>';
        	html += '</tbody>';
        	
        	$('#module tfoot').before(html);
        	
        	module_row++;
        }
    </script>
    <!-- end layout_setting -->
    <?php } ?>
    </div><!-- end #general -->
    <div class="tab-pane" id="tab-langs"><!-- #tab-langs -->
        <label class="discr">Language:<span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_leave_blank; ?>"></span></label>
        <ul <?php echo $cls_tab; ?> id="lang_data"><!-- description -->
        <?php foreach ($languages as $language) { ?>
        <li><a href="#language_data<?php echo $language['language_id']; ?>" data-toggle="tab">
                <img src="<?php echo $language['src_img']; ?>" title="<?php echo $language['name']; ?>" />
            <?php echo $language['name']; ?>
            </a>
        </li>
        <?php } ?>
        </ul>
        <div class="tab-content">
            <?php foreach($languages as $language) { ?>
            <div class="tab-pane" id="language_data<?php echo $language['language_id']; ?>">
                <div class="form-group">
                    <table class="tbl_lang max_width">
                    <?php foreach($_legend_discript as $k_l => $v_l) { ?>
                        <tr>
                            <td class="text_lang"><?php echo $v_l; ?></td>
                            <td class="value_lang"><input type="text" name="lang[<?php echo $language['language_id']; ?>][<?php echo $k_l; ?>]" value="<?php echo isset($lang_description[$language['language_id']][$k_l]) ? $lang_description[$language['language_id']][$k_l] : ''; ?>" /></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
    </div><!-- / #tab-langs -->
    <div class="tab-pane" id="tab-meta_tags"><!-- #tab-meta_tags -->
        <div class="form-group">
            <?php $set_cpu = array('meta_tags','redir_url','del_host','url_js','not_found_404','noindex_rel','noindex_rel_nopp','noindex_page','noindex_sort_lim','noindex_all'); ?>
            <?php foreach($set_cpu as $pole) { ?> 
            <div class="sett_main <?php echo $pole; ?>">
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div>
            <?php } ?>
            <div class="sett_main">
                <?php $pole = 'noindex' ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <input class="input_center input_width_30" type="text" name="filter_vier_cpu[<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_cpu[$pole]) ? $filter_vier_cpu[$pole] : null; ?>"/>
                </label>
            </div>
            <div class="sett_main">
                <?php $pole = 'robot_text'; $value = isset($filter_vier_cpu[$pole]) ? trim($filter_vier_cpu[$pole]) : ''; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <input class="input_center input_width_100" type="text" name="filter_vier_cpu[<?php echo $pole; ?>]" value="<?php echo $value; ?>"/>
                </label>
            </div>
            <div class="sett_main">
                <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo $help_canonical; ?>"><?php echo $legnd_canonical; ?></span>   
                  <select name="filter_vier_cpu[canonical]" class="select_fv">
                    <?php foreach($arr_canonical as $k => $coun) {
                            $selec = null;
                            if(isset($filter_vier_cpu['canonical']) && ($filter_vier_cpu['canonical'] == $k)) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $k; ?>" <?php echo $selec; ?>><?php echo $coun; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main">
                <?php $pole = 'seo_page' ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <input class="input_center input_width_100" type="text" name="filter_vier_cpu[<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_cpu[$pole]) ? $filter_vier_cpu[$pole] : null; ?>"/>
                </label>
            </div>
            <?php $pole = 'set_filter_to_base'; ?>
            <div class="sett_main <?php echo $pole; ?>">
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div>
        </div>
        <div class="form-group">
        <?php $set_cpu = array('link_pages','h_head','pole_h1','h_descript','h_descript_base','pole_descript','h_descript_base_plus','no_price','no_gua_qv_now','no_param_opis','no_param_meta','str_to_lower'); ?>
        <?php foreach($set_cpu as $pole) { ?>
            <?php if($pole == 'pole_descript') { ?>
            <div class="sett_main h_descript_base" id="<?php echo $pole; ?>">
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $value = isset($filter_vier_cpu[$pole]) ? trim($filter_vier_cpu[$pole]) : ''; ?>
                    <input class="input_width_100" type="text" name="filter_vier_cpu[<?php echo $pole; ?>]" value="<?php echo $value; ?>"/>
                </label>
            </div>
            <?php } else { ?>    
            <div class="sett_main <?php echo $pole; ?>">
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div>
            <?php } ?>
        <?php } ?>
            <script>
                var defol_pole = <?php echo (isset($filter_vier_cpu['h_descript_base'])) ? 'true' : 'false'; ?>;
                var $check_pole = $("input[name='filter_vier_cpu[h_descript_base]']");
                function videPole(flag) {
                    var $pole = $("#pole_descript"),$pole1 = $(".h_descript_base");
                    if(flag) {
                        $pole.css({"display":"inline-block","margin-left":"0"});
                        $pole1.css({"background":"#c5d5cd","margin-right":"0"});
                    }
                    else {
                        $pole.css({"display":"none"});
                        $pole1.css({"background":"none"});
                    }
                }
                videPole(defol_pole);
                $check_pole.on('click', function() {
                    videPole($check_pole.is(':checked'));
                });
            </script>
        </div>
        <?php if($flag_breadcrumbs) { ?>
        <div class="form-group bg_brown">
            <?php $arr_breadcrumbs = array('breadcrumbs','no_param_breadcrumbs','str_to_lower_breadcrumbs','breadcrumbs_str_url'); ?>
            <?php foreach($arr_breadcrumbs as $pole) { ?>
            <div class="sett_main">
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div>
            <?php } ?>
            <div class="sett_main">
                <?php $pole = 'breads_devide_in_pos' ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <input class="input_center input_width_30" type="text" name="filter_vier_cpu[<?php echo $pole; ?>]" value="<?php echo isset($filter_vier_cpu[$pole]) ? $filter_vier_cpu[$pole] : null; ?>"/>
                </label>
            </div>
        </div>
        <?php } ?>
        <ul <?php echo $cls_tab; ?> id="language">
        <?php foreach($languages as $language) { $lang_id = $language['language_id']; ?>
        <li><a href="#language<?php echo $lang_id; ?>" data-toggle="tab">
                <img src="<?php echo $language['src_img']; ?>" title="<?php echo $language['name']; ?>" />
            <?php echo $language['name']; ?>
            </a>
        </li>
        <?php } ?>
        </ul>
        <div class="tab-content">
            <?php foreach($languages as $language) { $lang_id = $language['language_id']; ?>
            <div class="tab-pane" id="language<?php echo $lang_id; ?>">
                <label class="discr">meta-tags:<span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_leave_blank; ?>"></span></label>
                <div class="form-group">
                    <table class="tbl_lang max_width">
                    <?php foreach($legend_discript as $k_l => $v_l) { // class="color_blue" ?>
                        <tr>
                            <td class="text_lang"><?php echo $v_l; ?></td>
                            <td class="value_lang"><input type="text" name="lang[<?php echo $lang_id; ?>][<?php echo $k_l; ?>]" value="<?php echo isset($lang_description[$lang_id][$k_l]) ? $lang_description[$lang_id][$k_l] : ''; ?>" /></td>
                        </tr>
                    <?php } ?>
                    </table>
                </div>
                <!-- description -->
                <?php foreach($arr_opis as $pole) { ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="description<?php echo $lang_id.'_'.$pole; ?>">
                    <p class="discr"><?php echo $text_shablon.' '.${'text_'.$pole}; ?>:<span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_desc_'.$pole}; ?>"></span></p>
                    </label>
                    <div class="col-sm-10">
                        <div><button class="btn-primary redakt" id="bot_<?php echo $lang_id.'_'.$pole; ?>" onclick="edit_redakt(<?php echo $lang_id; ?>, '<?php echo $pole; ?>')" type="button"><i class="fa fa-pencil"></i></button><span class="jir"> - <?php echo $text_visual_editor; ?></span></div>
                        <textarea name="description[<?php echo $lang_id; ?>][description][<?php echo $pole; ?>]" id="description<?php echo $lang_id.'_'.$pole; ?>" class="form-control textarea_edit"><?php echo isset($description[$lang_id]['description'][$pole]) ? $description[$lang_id]['description'][$pole] : ''; ?></textarea>
                    </div>
                </div>
                <?php } ?>
                <div class="form-group">
                    <?php $pole = 'mark_description'; ?>
                    <label class="col-sm-2 control-label" for="<?php echo $pole.$lang_id; ?>"><?php echo $text_markers; ?>:</label>
                    <div class="col-sm-10">
                        <textarea name="mark_description[<?php echo $lang_id; ?>]" id="mark_description<?php echo $lang_id; ?>" class="form-control"><?php echo isset($mark_description[$lang_id]) ? $mark_description[$lang_id] : ''; ?></textarea>
                    </div>
                    <div class="col-sm-2 control-label"></div>
                    <div class="col-sm-10">
                        <div class="opis_mark"><?php echo $help_discript; ?></div>
                    </div>
                </div>
                <!-- / description -->
            </div>
            <?php } ?>
        </div>
    </div><!-- end #tab-meta_tags -->
    <div class="tab-pane" id="tab-site_map"><!-- #tab-site_map -->
        <div class="form-group">
            <div class="sett_main">
                <?php $pole = 'site_map'; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div>
            <div class="sett_main">
                <?php $pole = 'sm_http'; $arr_sm = array('http','https'); ?>
                <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>   
                  <select name="filter_vier_cpu[<?php echo $pole; ?>]" class="select_fv">
                    <?php foreach($arr_sm as $val) {
                            $selec = null;
                            if(isset($filter_vier_cpu[$pole]) && ($filter_vier_cpu[$pole] == $val)) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $val; ?>" <?php echo $selec; ?>><?php echo $val; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main">
                <?php $pole = 'sm_changefreq'; $arr_sm = array('always','hourly','daily','weekly','monthly','yearly','never'); ?>
                <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>   
                  <select name="filter_vier_cpu[<?php echo $pole; ?>]" class="select_fv">
                    <?php foreach($arr_sm as $val) {
                            $selec = null;
                            if(isset($filter_vier_cpu[$pole]) && ($filter_vier_cpu[$pole] == $val)) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $val; ?>" <?php echo $selec; ?>><?php echo $val; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main">
                <?php $pole = 'sm_priority'; $arr_sm = array('0.1','0.2','0.3','0.4','0.5','0.6','0.7','0.8','0.9','1.0'); ?>
                <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>   
                  <select name="filter_vier_cpu[<?php echo $pole; ?>]" class="select_fv">
                    <?php foreach($arr_sm as $val) {
                            $selec = null; 
                            if(isset($filter_vier_cpu[$pole]) && ($filter_vier_cpu[$pole] == $val)) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $val; ?>" <?php echo $selec; ?>><?php echo $val; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div>
        </div>
    </div><!-- end #tab-site_map -->
    <?php } ?><!-- end #all -->
    </div><!-- / tab-content -->
    <!-- end module -->
    <?php if($shabl != 'seo_url') { ?>
    </form><!-- form -->
    <?php } ?>
    </div><!-- end class="panel-body" -->
    </div><!-- end class="panel panel-default" -->
    <div class="jir clear avtor"><a href="https://liveopencart.ru/vier" target="_blank"><?php echo $text_avtor; ?> Vier</a></div>
    <div id="go_top">^</div>
  </div><!-- end class="container-fluid" 2 -->
  <!-- div class="text-center">FilterVier</div -->
</div><!-- end id="content" -->
<?php if($shabl != 'lic') { ?>
<script>
    //setting
    var token = '<?php echo $token; ?>';
    var ajax_token = '<?php echo $ajax_token; ?>';
    var ajax_redir = '<?php echo $ajax_redir; ?>';
    var ajax_put = '<?php echo $ajax_put; ?>';
    var error_param = '<?php echo $text_error_param; ?>';
    var color_red = '<?php echo $text_color_red; ?>';
    var text_popup = '<?php echo $text_popup; ?>';
    var button_save = '<?php echo $button_save; ?>';
    var text_saved = '<?php echo $text_saved; ?>';
    var button_cancel = '<?php echo $button_cancel; ?>';
    
    $(function() {
		$(window).scroll(function() {
			if($(this).scrollTop() > 100) {
				$('#go_top').fadeIn();
			} else {
				$('#go_top').fadeOut();
			}
		});
		$('#go_top').click(function() {
            animTop(0);
		});
	});
    function animTop(top) {
        $('html, body').animate({scrollTop: top},500);
        return false;
    }
        
    function successPole(text) {
        <?php if($versi_cms1) { ?>
            return '<span title="<?php echo $legnd_close_success; ?>" class="success filtr" onclick="this.remove();">'+text+'</span>';
        <?php } else { ?>
            return '<div class="seo_infa alert alert-success" style="margin-bottom:0px; padding:5px 17px; min-width:160px;"><i class="fa fa-check-circle"></i> '+text+'<button type="button" class="close" data-dismiss="alert">&nbsp;&times;</button></div>';
        <?php } ?>
    }
    function errorPole(text) {
        <?php if($versi_cms1) { ?>
            return '<div tabindex="1" class="warning">'+text+'<button type="button" class="close">&times;</button></div>';
        <?php } else { ?>
            return '<div tabindex="1" class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> '+text+'<button type="button" class="close" data-dismiss="alert">&times;</button></div>';
        <?php } ?>
    }
    function popupBlock() {
        return '<div class="text_center popup_blok"><div class="text_popup">'+text_popup+'</div><div class="pole_botton"><table class="max_width"><tr><td><span id="save_data" class="button_submit bg_grey">'+button_save+'</span></td><td><span id="no_data" class="button_submit bg_grey">'+text_saved+'</span></td><td><span id="cancel_data" class="button_submit bg_grey">'+button_cancel+'</span></td></tr></table></div></div>';
    }
    
    function showLoadImg() {
        $("#parent_blok").css('display','block');
        $("#loader_img").show();
    }
    function hideLoadImg() {
        $("#parent_blok").css('display','none');
        $("#loader_img").hide();  
    }
    function showPopupBlok() {
        $("#parent_blok").css({"display":"block"});
        $("#popup_save").css({"display":"block"}).html(popupBlock());
    }
    function hidePopupBlok() {
        $("#parent_blok").css({"display":"none"});
        $("#popup_save").css({"display":"none"});
    }
    function preparPost() {
        var txt_post = "[name^='filter_vier_'], [name^='description'], [name^='lang'], [name^='mark_description']";
        return $(txt_post).serialize();
    }
    function popupSave(tab_link) {
        <?php if(($shabl == 'hand_links') || !$save_popup) { ?>
        hidePopupBlok();
        showLoadImg();
        redir_tab(tab_link);
        <?php } else { ?>
        showPopupBlok();
        $('#cancel_data').on('click', function(){
            tab_link = '';
            hidePopupBlok();
            if(sessionStorage.sestemp) {
                var id = sessionStorage.sestemp;
                $('.linc_').parent().removeClass('active');
                $('.linc__').parent().addClass('active');
                <?php if($shabl == 'base') { ?>
                $('#'+id).parent().addClass('active');
                <?php } else {  ?>
                $('#'+id).parent().removeClass('active');
                <?php } ?>
            }
            else {
                var id = '0';
                $('#'+id).parent().addClass('active');
                $('.linc_').parent().removeClass('active');
            }
        });
        $('#save_data').on('click', function(){
            if(tab_link) {
                $("#popup_save").css({"display":"none"});
                var post_data = {};
                post_data[tab_link] = preparPost();
                ajs_post(post_data);
            }
        });
        $('#no_data').on('click', function(){
            if(tab_link) {
                hidePopupBlok();
                showLoadImg();
                redir_tab(tab_link);
            }
        });
        <?php } ?>
    }
    function clearPoleAll() {
        $('#ssuu').empty();
        $('#error_warning').empty();
        $(".linkz").removeClass(error_param).removeAttr('tabindex');
        $("input.transl").removeClass(error_param).removeClass(color_red).removeAttr('tabindex');
        $("#error_class_separators").removeClass(error_param);
    }
    function redir_tab(tab_url) {
        if(tab_url === undefined) return;
        var file = ((tab_url == 'base') || (tab_url == '')) ? '' : '/'+tab_url;
        var url_set = ajax_redir+file+ajax_token;
        location.assign(url_set);
    }
    function ajs_post(post_data) {
        clearPoleAll();
        $.ajax({
            type: 'POST'
            ,url: ajax_put
            ,async: true
            ,dataType: 'json'
            ,cache: false
            ,data: post_data
            ,beforeSend: function(){
                showLoadImg();
            }
            ,success: function(data) {
                if(data.clear) {
                    $(data.clear).empty();
                }
                else if(data.error_warning) {
                    $('#error_warning').html(errorPole(data.error_warning));
                    if(data.duble_hand_links) {
                        var it = '<?php echo $it; ?>';
                        $.each(data.duble_hand_links,function(key, data) {
                            $("#id_"+key).addClass(error_param).attr('tabindex', ++it);
                        });
                    }
                    if(data.error_class_separators) {
                        $("#error_class_separators").addClass(error_param);
                    }
                    if(data.duble_url) {
                        var it = '<?php echo $it; ?>';
                        $.each(data.duble_url,function(key, data) {
                            if(key == 'dbl_fv') {
                                for(var i = 0; i < data.length; i++) {
                                    $("input[name='transl"+data[i]).attr('tabindex', ++it).addClass(error_param);
                                }
                            }
                            if(key == 'dbl_base') {
                                for(var i = 0; i < data.length; i++) {
                                    $("input[name='transl"+data[i]).attr('tabindex', ++it).addClass(color_red);
                                }
                            }
                        });
                    }
                }
                if(data.succ) {
                    $('#ssuu').html(successPole(data.succ));
                }
                if(data.redir) {
                    redir_tab(data.redir);
                }
                else if(data.redir_time) {
                    setTimeout(function(){
                        redir_tab(data.redir_time);
                    },800);
                }
            }
            ,complete: function(){
                hideLoadImg();
            }
            <?php if($ajax_err) { ?>
            ,error: function(jqXHR, textStatus) {
                var text_error = '';
                text_error += 'code: '+jqXHR.readyState;
                text_error += (jqXHR.status) ? ', status: '+jqXHR.status : '';
                text_error += (textStatus) ? ', textStatus: '+textStatus : '';
                text_error += (jqXHR.responseText) ? ', "responseText:" '+jqXHR.responseText : '';
                $('#error_warning').html(errorPole('ERROR!!! '+text_error));
            }
            <?php } ?>
        });
    }
    
    $(function() {
        var tab_link = null;
        $('#primenit').on('click', function(){
            var post_data = {};
            post_data["primenit"] = preparPost();
            ajs_post(post_data);
        });
        <?php foreach($arr_tab as $tab) {
            echo '$("#'.$tab.'").on("click", function(){ tab_link = "'.$tab.'"; popupSave(tab_link);});';
        } ?>
        <?php if(in_array($shabl, $arr_tab)) {
            echo '$(".linc").on("click", function(){ var tab_link = "base"; popupSave(tab_link); });';
        } ?>
        $('.knopi').on('click', function(){
            if(sessionStorage.sestemp) {
                sessionStorage.removeItem('sestemp');
            }
        });
    });
    <?php if($shabl == 'base') { ?>
    $(function() {
        //var n_list = 0;
        if(!sessionStorage.sestemp) {
            $('.linc').on('click', function(){
                var linc = this.id;
                sessionStorage.sestemp=linc;
            });
            var n_list = sessionStorage.sestemp;
        }
        else {
            var n_list = sessionStorage.sestemp;
            $('.linc').on('click', function(){
                var linc = this.id;
                sessionStorage.sestemp=linc;
            });
            n_list = sessionStorage.sestemp;
        }
        $('#tabs a').eq(n_list).click();
    });
    <?php } elseif(in_array($shabl, $arr_tab)) { ?>
        $('.linc').on('click', function(){
            sessionStorage.sestemp = this.id;
        });
    <?php } ?>
</script>
    <?php if($shabl == 'seo_url') { ?>
    <script>
        $('#clear_table1').on('click', function() {
            var post_data = 'clear_table';
            ajs_post(post_data);
        });
        $('#add_transl1').on('click', function() {
            var post_data = {};
            <?php if($control_pusto) { ?>
            var form_pole = $("[name^='transl']").serialize();
            <?php } else { ?>
            var form_pole = $(':text[name^="transl"]').filter(function() {return this.value;}).serialize();
            <?php } ?>
            var post_data = {"add_transl" : form_pole};
            ajs_post(post_data);
        });
    </script>
    <?php } elseif($shabl == 'hand_links') { ?>
    <script>
        var filter_url = '<?php echo $filter_url; ?>';
        function popupBlock2(text_popup, button_yes, button_cancel) {
        return '<div class="text_center popup_blok"><div class="text_popup">'+text_popup+'</div><div class="pole_botton"><table class="max_width"><tr><td><span id="action_yes" class="button_submit bg_grey">'+button_yes+'</span></td><td></td><td><span id="action_cancel" class="button_submit bg_grey">'+button_cancel+'</span></td></tr></table></div></div>';
    }
        function add_hand_links(id) {
            var linkz = $('#pole_row_'+id+' .linkz').val();
            if(linkz.length) {
                var form_pole = $("form [name^='hand_links']").serialize();
                var post_data = {};
                var pole = 'add_hand_links';
                if(id) {
                    pole = 'up_hand_links';
                }
                post_data[pole] = form_pole;
                ajax_token +=filter_url;
                ajs_post(post_data);
            }
            else {
                $('#error_warning').html(errorPole('!!! empty link'));
            }
            animTop(100);
        }
        function removPole(id) {
            $('#pole_row_'+id).remove();
            clearPoleAll();
        }
        
        function edit_hand_links(lang_id, id) {
            var id_textarea = 'hand_links_'+id+'_'+lang_id,
                $id_textarea = $('#'+id_textarea),
                bott_id = '#bot_'+lang_id+'_'+id,
                $bott_id = $(bott_id);
            $id_textarea.toggleClass("open_red");
            $bott_id.toggleClass("btn-primary btn-warning");
            $(bott_id+' + span').toggleClass("color_red");
            <?php if($ckeditor) { ?>
                if(!del_redakt_ckedit($id_textarea)) {
                    ckeditorInit(id_textarea, token);
                }
            <?php } else { ?>
                if("destroy" in $($id_textarea)) {
                    var text_textarea = '';
                    if($id_textarea.summernote('isEmpty')) {}
                    text_textarea = $id_textarea.destroy().text();
                    if(!text_textarea) {
                        text_textarea = $id_textarea.val();
                    }
                    //var shpr = /<p><br><\/p>/g;$id_textarea.val(text_textarea.replace(shpr, ''));
                    $id_textarea.val(text_textarea);
                	} 
                    else {
                        //rezerv
                        //reset
                        $id_textarea.summernote('destroy');
                	}
                    initSummernote('#'+id_textarea+'.open_red');
            <?php } ?>
        }
        
        function redHandLinks(id) {
            var lang_id;
            var pol;
            html = '<tr id="pole_row_'+id+'" class="bg_pole_grey">';
            html += '<td><input tabindex="" class="linkz max_width" name="hand_links['+id+'][link]" type="text" value="" /></td>';
            html += '<td>';
            <?php foreach ($languages as $language) { ?>
            lang_id = '<?php echo $language['language_id']; ?>';
            html += '<table>';
            <?php foreach($poles_landing as $k => $pol) { ?>
            pol = '<?php echo $pol; ?>';
            html += '<tr>';
                    <?php if($k === 0) { ?>
            html += '<td class="group_attr" rowspan="<?php echo $c_l; ?>"><img src="<?php echo $language['src_img']; ?>" alt="<?php echo $language['name']; ?>" /></td>';
                    <?php } ?>
                    <?php if($k === $c_l_2) { ?>
            html += '<td class="jir bord_bot"><?php echo $entry_description; ?></td>';
            html += '<td><button id="bot_'+lang_id+'_'+id+'" class="btn-primary redakt" onclick="edit_hand_links('+lang_id+','+id+')" type="button"><i class="fa fa-pencil"></i></button><span> - <?php echo $text_visual_editor; ?></span></td>';
            html += '</tr><tr>';
            html += '<td colspan="2"><textarea class="max_width hand_links" id="hand_links_'+id+'_'+lang_id+'" name="hand_links['+id+']['+pol+']['+lang_id+']" tabindex=""></textarea></td>';
                    <?php }else { ?>
            html += '<td class="jir">'+pol+'</td>';
            html += '<td class="max_width"><input tabindex="" class="max_width" name="hand_links['+id+']['+pol+']['+lang_id+']" type="text" value="" /></td>';
                    <?php } ?>
            html += '</tr>';
            <?php } ?>
            html += '</table>';
            <?php } ?>
            html += '</td>';
            html += '<td class="text-center">';
            html += '<button type="button" onclick="add_hand_links('+id+')" <?php echo $hlp; ?> rel="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>';
            html += '<div class="pading_10"></div>';
            html += '<button type="button" onclick="removPole('+id+')"" <?php echo $hlp; ?> rel="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-warning"><i class="fa fa-reply"></i></button>';
            html += '</td>';
            html += '</tr>';
            
            $('#tb_pole_red').empty().prepend(html);
        }
        <?php if($versi_cms1) { ?>
        /*
        $(document).on('mouseover', '[rel="tooltip"]', function(event) {
            $(this).tooltipster({
                multiple:true,
                theme: 'tooltipster-borderless'
                ,maxWidth: 360
            });
        });
        */
        <?php } else { ?>
        $(function() {
            $('body').tooltip({
                selector: "[rel=tooltip]",
                placement: "top"
            });
        });
        <?php } ?>

        function edit_h_l(id, flag_copy) {
            clearPoleAll();
            if(id) {
                var id_r = id;
                if(flag_copy) {
                    id_r = 0;
                }
                redHandLinks(id_r);
                var lang_id;
                var pol;
                $('input[name="hand_links['+id_r+'][link]"]').val($('#id_'+id).text()).focus();
                <?php foreach($languages as $language) { ?>
                    lang_id = '<?php echo $language['language_id']; ?>';
                        <?php foreach($poles_landing as $k => $pol) { ?>
                        pol = '<?php echo $pol; ?>';
                            <?php if($k === $c_l_2) { ?>
                        $('textarea[name="hand_links['+id_r+']['+pol+']['+lang_id+']"]').val($('#hand_links_'+id+'_'+pol+'_'+lang_id).text());
                            <?php }else { ?>
                        $('input[name="hand_links['+id_r+']['+pol+']['+lang_id+']"]').val($('#hand_links_'+id+'_'+pol+'_'+lang_id).text());
                            <?php }  ?>
                        
                        <?php } ?>
                <?php } ?>
            }
            animTop(200);
        }
        
        function del_h_l(id) {
            var text_popup = '<?php echo $text_remove; ?>', button_yes = '<?php echo $button_yes; ?>', button_cancel = '<?php echo $button_cancel; ?>';
            showPopupBlok2(text_popup, button_yes, button_cancel);
            $('#action_cancel').on('click', function(){
                hidePopupBlok();
            });
            $('#action_yes').on('click', function(){
                hidePopupBlok();
                if(id) {
                    $('#polerow_'+id).remove();
                    var post_data = {};
                    var pole = 'del_hand_links';
                    post_data[pole] = id;
                    ajax_token +=filter_url;
                    ajs_post(post_data);
                    animTop(130);
                }
            });
        }
        function showPopupBlok2(text_popup, button_yes, button_cancel) {
            $("#parent_blok").css({"display":"block"});
            $("#popup_save").css({"display":"block"}).html(popupBlock2(text_popup, button_yes, button_cancel));
        }
        //filter
        var url_filter = '<?php echo $url_filter; ?>';
        var count_req = 2;
        $('#button-filter').on('click', function() {
        	var url = url_filter;
            var filter_link = $('input[name="filter_link"]').val();
        	if(filter_link.length > count_req) {
        		url += '&filter_link=' + encodeURIComponent(filter_link);
                location.assign(url);
        	}
        });
        $('#button-reset').on('click', function() {
        	location.assign(url_filter);
        });
        $(function() {
            $('input[name="filter_link"]').autocomplete({
                source: function(request, response) {
                    <?php if($versi_cms1) { ?>
                    var request = request.term;
                    <?php } ?>
                    if(request.length > count_req) {
                        $.ajax({
                			url: '<?php echo $ajax_autocomplete; ?>'+'&filter_link='+encodeURIComponent(request),
                			dataType: 'json',
                			success: function(json) {
                				response($.map(json, function(item) {
                					return {
                						label: item['link'],
                						value: item['id']
                					}
                				}));
                			}
                		});
                    }
            	},
                <?php if($versi_cms1) { ?>
                //delay: 2000,
                //minLength: 3,
                //autoFocus: false,
                select: function(event, ui) {
                    $('input[name="filter_link"]').val(ui.item.label);
                    return false;
                },
                focus: function(event, ui) {
                    //$('input[name="filter_link"]').val(ui.item.label);
                    return false;
                }    
                <?php } else { ?>
            	select: function(item) {
            		$('input[name="filter_link"]').val(item['label']);
            	}
                <?php } ?>
            });
        });
    </script>
    <?php } elseif($shabl == 'base') { ?>
    <script>
        $('#clear_cache1').on('click', function() {
            var post_data = 'clear_cache';
            ajs_post(post_data);
        });
        $('#gen_text_id1').on('click', function() {
            $('#ssuu').empty();
            var attr_id = [];
            $("input[name='filter_vier_setting[attrb][view][]']:checked").each(function() {
                    attr_id.push($(this).val());
                }
            );
            if(attr_id.length) {
                var post_data = 'checks_attr='+JSON.stringify(attr_id);
                var separ = $("input[name='filter_vier_setting[attrb][separ]']").val();
                if(separ) {
                    post_data += '&separ='+separ;
                }
                var html_tag = $("input[name='filter_vier_setting[html_tag]']:checked").val();
                if(html_tag) {
                    post_data += '&html_tag='+html_tag;
                }
                <?php if($flag_diap) { ?>
                    var diap_mark = $("input[name='filter_vier_setting[attrb][diap_mark]']").val();
                    post_data += '&diap_mark='+diap_mark;
                    var diap_step = $("input[name='filter_vier_setting[attrb][diap_step]']").val();
                    post_data += '&diap_step='+diap_step;
                <?php } ?>
                ajs_post(post_data);
            }
        });
        
        function edit_redakt(lang_id, pole) {
            var id_textarea = 'description'+lang_id+'_'+pole,
                $id_textarea = $('#'+id_textarea),
                bott_id = '#bot_'+lang_id+'_'+pole,
                $bott_id = $(bott_id);
            $id_textarea.toggleClass("open_red");
            $bott_id.toggleClass("btn-primary btn-warning");
            $(bott_id+' + span').toggleClass("color_red");
            <?php if($ckeditor) { ?>
                if(!del_redakt_ckedit($id_textarea)) {
                    ckeditorInit(id_textarea, token);
                }
            <?php } else { ?>
                if("destroy" in $($id_textarea)) {
                    var text_textarea = '';
                    if($id_textarea.summernote('isEmpty')) {}
                    text_textarea = $id_textarea.destroy().text();
                    if(!text_textarea) {
                        text_textarea = $id_textarea.val();
                    }
                    //var shpr = /<p><br><\/p>/g;$id_textarea.val(text_textarea.replace(shpr, ''));
                    $id_textarea.val(text_textarea);
                	} 
                    else {
                        //rezerv
                        //reset
                        $id_textarea.summernote('destroy');
                	}
                    initSummernote('#'+id_textarea+'.open_red');
            <?php } ?>
        }
        $('#language a:first').tab('show');
        $('#lang_data a:first').tab('show');
    </script>
    <?php } ?>
    <?php if(($shabl == 'base') || ($shabl == 'hand_links')) { ?>
    <script>
    <?php if($ckeditor) { ?>
        function del_redakt_ckedit(el) {
            var result = false;
            $(el).each(function(index, element) {
                var ckredactor = CKEDITOR.instances[$(element).attr("id")];
                if(ckredactor) {
                    result = ckredactor;
                    ckredactor.destroy();
                    ckredactor = null;
                }
            });
            return result;
        }
    <?php } else { ?>
        function initSummernote(elem_id) {
            <?php if($file_summer) { ?>
            $(elem_id).each(function() {
                $(elem_id).summernote({
                    <?php if($file_lang) { ?>
                    lang: '<?php echo $file_lang; ?>',
                    <?php } ?>
        			disableDragAndDrop: true,
        			height: 300,
        			emptyPara: '',
                    //focus: true,
        			codemirror: {
        				mode: 'text/html',
        				htmlMode: true,
        				lineNumbers: true,
        				theme: 'monokai'
        			},			
        			fontsize: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '24', '30', '36', '48' , '64'],
        			toolbar: [
        				['style', ['style']],
        				['font', ['bold', 'underline', 'clear']],
        				['fontname', ['fontname']],
        				['fontsize', ['fontsize']],
        				['color', ['color']],
        				['para', ['ul', 'ol', 'paragraph']],
        				['table', ['table']],
        				['insert', ['link', 'image', 'video']],
        				['view', ['fullscreen', 'codeview', 'help']]
        			],
        			popover: {
                   		image: [
        					['custom', ['imageAttributes']],
        					['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
        					['float', ['floatLeft', 'floatRight', 'floatNone']],
        					['remove', ['removeMedia']]
        				],
        			},			
        			buttons: {
            			image: function() {
        					var ui = $.summernote.ui;
        					var button = ui.button({
        						contents: '<i class="note-icon-picture fa fa-image" />',
                                tooltip: $.summernote.lang['<?php echo $file_lang ? $file_lang : 'en-US'; ?>'].image.image,
        						click: function () {
        							$('#modal-image').remove();
        							$.ajax({
        								url: 'index.php?route=common/filemanager'+ajax_token,
        								dataType: 'html',
        								beforeSend: function() {
        									$('#button-image i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
        									$('#button-image').prop('disabled', true);
        								},
        								complete: function() {
        									$('#button-image i').replaceWith('<i class="fa fa-upload"></i>');
        									$('#button-image').prop('disabled', false);
        								},
        								success: function(html) {
        									$('body').append('<div id="modal-image" class="modal">' + html + '</div>');
        									
        									$('#modal-image').modal('show');
        									
        									$('#modal-image').delegate('a.thumbnail', 'click', function(e) {
        										e.preventDefault();
        										
        										$(elem_id).summernote('insertImage', $(this).attr('href'));
        																	
        										$('#modal-image').modal('hide');
        									});
        								}
        							});						
        						}
        					});
        					return button.render();
        				}
          			}
                });
            });
            <?php } else { ?>
            $(elem_id).summernote({
                height: 300
                ,focus: true
                //,placeholder: ''
                <?php if($file_lang) { ?>
                ,lang: '<?php echo $file_lang; ?>'
                <?php } ?>
            });
            <?php } ?>
        }
    <?php } ?>
    </script>
    <?php } ?>
    <?php if($versi_cms1) { ?>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltipster({
                theme: 'tooltipster-borderless',
                //minWidth: 160,
                maxWidth: 360
            });
        });
        $('body').on('click', '.close', function(e) {
            $(this).parent().remove();
        });
    </script>
    <?php } ?>
<?php } ?>
<?php echo $footer; ?>