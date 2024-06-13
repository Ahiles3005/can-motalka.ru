<?php 
    //setting
    $hlp = 'class="helpis"';
    $cls_hel = null;
    $cls_tab = 'class="htabs"';
    $text_error_param = ' error_param';
    $text_color_red = ' color_red';
    $cls_blue = ' class="color_blue"';
    $text_dbl_fv = 'dbl_fv';
    $text_dbl_base = 'dbl_base';
    $maxlen_sep = '1';
    //otlad
    $coun_i = 0;
    $coun_p = 0;
    //for seo_url
    $dbl = '-dbl';
    $flag_otlad = false;
    //
    $show_link_slider = false;
    if(isset($for_otlad['show_link_slider'])) {
        $show_link_slider = true;
    }
?>
<?php echo $header; ?>
<div id="content"><!-- id="content" -->
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
    <?php $it = 1; ?>
    <?php if ($error_warning) { ?>
    <div tabindex="<?php echo $it; ?>" class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
<div class="box"><!-- class="box" -->
  <div class="heading">
    <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    <div class="buttons">
    <button type="submit" name="primenit" form="form" class="button_pr"><?php echo $button_aple; ?></button>
    <a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
  </div>
  <div class="content div_form"><!-- class="content" --> 
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" class="form-horizontal">
    <!-- start module -->
        <div <?php echo $cls_tab; ?> id="tabs">
        <?php foreach($tab_nav as $key => $val) { ?>
            <a href="#<?php echo $val['href']; ?>" class="linc" id="<?php echo $key; ?>"><?php echo $val['txt']; ?></a>
        <?php } ?>
        <span class="ssuu">
            <?php if($success) { ?>
            <span title="<?php echo $legnd_close_success; ?>" class="success filtr" onclick="this.remove();"><?php echo $success; ?></span>
            <?php } ?>
        </span>
        </div>
    <div class="tab-content"><!-- tab-content -->
    <!-- #general -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group" id="set_main"><!-- group_main-set_main -->
            <div class="sett_main temes">
                <label class="control-label" for="themes_filter"><?php echo $legnd_themes; ?>
                  <select name="filter_vier_setting[themes]" id="themes_filter" class="form-control select_fv">
                    <?php foreach($themes as $k => $theme) { ?>
                    <?php $selec = null; if(isset($filter_vier_setting['themes']) && ($filter_vier_setting['themes'] == $theme)) { $selec = 'selected="selected"'; } ?>    
                       <option value="<?php echo $theme; ?>" <?php echo $selec; ?>><?php echo $theme; ?></option> 
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main checks">
                <label class="control-label" for="select_checks"><?php echo $legnd_select_checks; ?>   
                  <select name="filter_vier_setting[select_checks]" id="select_checks" class="form-control select_fv">
                    <?php foreach($select_checks as $k => $select_check) { ?>
                    <?php $selec = null; if(isset($filter_vier_setting['select_checks']) && ($filter_vier_setting['select_checks'] == $select_check)) { $selec = ' selected="selected"'; } ?>
                       <option style="background: transparent url(/catalog/view/theme/default/image/filter_vier/<?php echo $select_check; ?>.png) no-repeat scroll 0px 0px; background-position: right; background-size: 40px;" value="<?php echo $select_check; ?>" <?php echo $selec; ?>><?php echo $select_check; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main mobil_versi">
                <label class="control-label" for="mobil_versi">
                    <span <?php echo $hlp; ?> title="<?php echo $help_mobil_versi; ?>"><?php echo $legnd_mobil_versi; ?></span>
                  <select name="filter_vier_setting[mobil_versi]" id="mobil_versi" class="form-control select_fv">
                    <?php foreach($mobil_versis as $k => $mobil_versi) { ?>
                    <?php $selec = null; if(isset($filter_vier_setting['mobil_versi']) && ($filter_vier_setting['mobil_versi'] == $mobil_versi)) { $selec = 'selected="selected"'; } ?>    
                       <option value="<?php echo $mobil_versi; ?>" <?php echo $selec; ?>><?php echo $mobil_versi; ?></option> 
                    <?php } ?>
                  </select>
                </label>
            </div>
            <div class="sett_main">
                <label class=" control-label" for="clear_cache">
                    <span <?php echo $hlp; ?> title="<?php echo $help_clear_cache; ?>">
                        <input type="submit" name="clear_cache" id="clear_cache" value="<?php echo $legnd_clear_cache; ?>" />
                    </span>
                </label>
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
        <?php $set_main = array('scroll_item','sort_quant','gua_qv_now','null_count','html_tag','sub_cats','scrollis'); ?>
        <?php foreach($set_main as $pole) { ?>
        <div class="sett_main">
            <label class="control-label">
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
            </label>
        </div>
        <?php } ?>
        <div class="sett_main">
        <?php $set_main = array('sort_name','sort_model','sort_price','sort_price_desc','sort_rating_desc','sort_viewed_desc','sort_date_added_desc','sort_quantity_desc'); ?>
            <label class="control-label" for="sort_default">
                <span <?php echo $hlp; ?> title="<?php echo $help_sort_default; ?>"><?php echo $legnd_sort_default; ?></span>
              <select name="filter_vier_setting[sort_default]" class="form-control select_fv" id="sort_default">
                <option value="0">---</option>
              <?php foreach($set_main as $pole) { ?>
                <?php $selec = null; if(isset($filter_vier_setting['sort_default']) && ($filter_vier_setting['sort_default'] == $pole)) { $selec = 'selected="selected"'; } ?>
                   <option value="<?php echo $pole; ?>" <?php echo $selec; ?>><?php echo ${'legnd_'.$pole}; ?></option> 
                <?php } ?>
              </select>
            </label>
        </div>
    </div><!-- end group_main -->
    <div class="clear"></div>
    <div id="block_filter_vier"><!-- block_filter_vier -->
    <!-- categorys -->
    <?php if(!empty($view_categorys)) { ?>
    <div class="block-param category">
        <fieldset>
            <legend><?php echo $legnd_cats; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][cats]" type="text" value="<?php echo isset($filter_vier_setting['view_posit']['cats']) ? $filter_vier_setting['view_posit']['cats'] : null; ?>" />
            </div>    
            <div class="status">
                <?php $chec = null; if(isset($filter_vier_setting['cats']['status'])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[cats][status]" value="1" <?php echo $chec; ?> /> 
                <?php echo $text_status; ?>
                <span class="gran"></span>
                <?php $count = null; if(isset($filter_vier_setting['cats']['count'])) { $count = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[cats][count]" value="1" <?php echo $count; ?> />
                <?php echo $text_count; ?>
                <span class="gran"></span>
                <?php $pozit_pop = null; if(isset($filter_vier_setting['cats']['pozit_pop'])) { $pozit_pop = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[cats][pozit_pop]" value="1" <?php echo $pozit_pop; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_pozit_pop; ?>"><?php echo $legnd_pozit_pop; ?></span>
                <span class="gran"></span>
                <span  class="helpis color_gr" <?php //echo $hlp; ?>  title="<?php echo $legnd_null_position; ?>">
                <?php $chec = null; if(isset($filter_vier_setting['cats']['null_position'])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[cats][null_position]; ?>]" value="1" <?php echo $chec; ?> /></span>
            </div>
            <div class="block_check"><a onclick="$('#block_cat').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('#block_cat').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a></div>
            <p class="posit_site">
                <span>
                    <?php echo $text_sort; ?>
                    <?php $sort = null; if(isset($filter_vier_setting['cats']['sort'])) { $sort = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[cats][sort]" value="1" <?php echo $sort; ?> />
                </span>
            </p>
        <div class="scrolis">
        <ul class="block-category" id="block_cat">
        <?php $it = 1; foreach($view_categorys as $key => $category) { $coun_p++; ?>
            <li class="group_attr">
            <?php $chec = null; 
                if(isset($filter_vier_setting['cats']['view']) && in_array($category['category_id'], $filter_vier_setting['cats']['view'])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[cats][view][<?php echo $category['category_id']; ?>]" value="<?php echo $category['category_id']; ?>" <?php echo $chec; ?> />
            <?php echo $category['name']; ?> (<span class="count <?php echo ($category['total_product'] > 0) ? 'p1' : 'p0'; ?>"><?php echo $category['total_product']; ?></span>)
                <input tabindex="<?php echo $it++; ?>" class="sort_order" name="filter_vier_setting[cats][sort_order][<?php echo $category['category_id']; ?>]" type="text" value="<?php echo isset($filter_vier_setting['cats']['sort_order'][$category['category_id']]) ? $filter_vier_setting['cats']['sort_order'][$category['category_id']] : null; ?>" />
            </li>
            <?php if(isset($category['children'])) { ?>
                <ul>
                    <?php foreach($category['children'] as $categor) { ?>
                    <?php $coun_p++; ?>
                        <li class="group_attr1">
                        <?php $chec = null; 
                            if(isset($filter_vier_setting['cats']['view']) && in_array($categor['category_id'], $filter_vier_setting['cats']['view'])) { $chec = ' checked="checked"';} ?>
                            <input type="checkbox" name="filter_vier_setting[cats][view][<?php echo $categor['category_id']; ?>]" value="<?php echo $categor['category_id']; ?>" <?php echo $chec; ?> />
                        <?php echo $categor['name']; ?> (<span class="count <?php echo ($categor['total_product'] > 0) ? 'p1' : 'p0'; ?>"><?php echo $categor['total_product']; ?></span>)
                            <input class="sort_order" tabindex="<?php echo $it++; ?>" name="filter_vier_setting[cats][sort_order][<?php echo $categor['category_id']; ?>]" type="text" value="<?php echo isset($filter_vier_setting['cats']['sort_order'][$categor['category_id']]) ? $filter_vier_setting['cats']['sort_order'][$categor['category_id']] : null; ?>" />
                        </li>
                        <?php if(isset($categor['children'])) { ?>
                            <ul>
                                <?php foreach($categor['children'] as $catego) { ?>
                                <?php $coun_p++; ?>
                                    <li class="group_attr2">
                                    <?php $chec = null; 
                                    if(isset($filter_vier_setting['cats']['view']) && in_array($catego['category_id'], $filter_vier_setting['cats']['view'])) { $chec = ' checked="checked"';} ?>
                                        <input type="checkbox" name="filter_vier_setting[cats][view][<?php echo $catego['category_id']; ?>]" value="<?php echo $catego['category_id']; ?>" <?php echo $chec; ?> />
                                    <?php echo $catego['name']; ?> (<span class="count <?php echo ($catego['total_product'] > 0) ? 'p1' : 'p0'; ?>"><?php echo $catego['total_product']; ?></span>)
                                        <input class="sort_order" tabindex="<?php echo $it++; ?>" name="filter_vier_setting[cats][sort_order][<?php echo $catego['category_id']; ?>]" type="text" value="<?php echo isset($filter_vier_setting['cats']['sort_order'][$catego['category_id']]) ? $filter_vier_setting['cats']['sort_order'][$catego['category_id']] : null; ?>" />
                                    </li>
                                    <?php if(isset($catego['children'])) { ?>
                                        <ul>
                                            <?php foreach($catego['children'] as $categ) { ?>
                                            <?php $coun_p++; ?>
                                                <li class="group_attr3">
                                                <?php $chec = null; 
                                                    if(isset($filter_vier_setting['cats']['view']) && in_array($categ['category_id'], $filter_vier_setting['cats']['view'])) { $chec = ' checked="checked"';} ?>
                                                    <input type="checkbox" name="filter_vier_setting[cats][view][<?php echo $categ['category_id']; ?>]" value="<?php echo $categ['category_id']; ?>" <?php echo $chec; ?> />
                                                <?php echo $categ['name']; ?> (<span class="count <?php echo ($categ['total_product'] > 0) ? 'p1' : 'p0'; ?>"><?php echo $categ['total_product']; ?></span>)
                                                    <input class="sort_order" tabindex="<?php echo $it++; ?>"  name="filter_vier_setting[cats][sort_order][<?php echo $categ['category_id']; ?>]" type="text" value="<?php echo isset($filter_vier_setting['cats']['sort_order'][$categ['category_id']]) ? $filter_vier_setting['cats']['sort_order'][$categ['category_id']] : null; ?>" />
                                                </li>
                                                
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    <?php } ?>
                </ul>
            <?php } ?>
        <?php }?>
        </ul>
        </div>
        <div class="block_check">
            <a onclick="$('#block_cat').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('#block_cat').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
        </div>
        </fieldset>
    </div>    
    <?php } ?>
    <!-- /categorys -->
    <!-- attributes -->
    <?php if(!empty($view_attributes)) { ?>
    <div class="block-param">
        <fieldset>
            <?php $pz = 'attrb'; ?>
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_gen_text_id; ?>">
                    <input type="submit" name="gen_text_id" id="gen_text_id" value="<?php echo $legnd_gen_text_id; ?>" />
                </span>
                <span class="gran"></span>
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
                <?php $arr_set = array('status','inout','count'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /> 
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
                    <td class="gran color_blue"><?php echo $text_slider;?></td>
                    <td class="gran"><?php echo $legnd_button_attrib;?></td>
                    <td class="gran"><span <?php echo $hlp; ?> title="<?php echo $legnd_null_position; ?>" class="helpis color_gr"></span></td>
                </tr>
        <?php foreach($view_attributes as $attributes) {
                    if(isset($attributes['attribute_group_id'])) {
                        $coun_p++; ?>
                <tr class="group_attr jir">
                    <td colspan="3" >
                    <?php echo $attributes['name_group']; ?>
                    <span class="gran">
                    <?php $chec_button = null; if(isset($filter_vier_setting['attrb']['group_view']) && in_array($attributes['attribute_group_id'], $filter_vier_setting['attrb']['group_view'])) { $chec_button = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][group_view][<?php echo $attributes['attribute_group_id']; ?>]" value="<?php echo $attributes['attribute_group_id']; ?>" <?php echo $chec_button; ?> /><span> <?php echo $legnd_group_view;?></span>
                    </span>
                    </td>
                    <td class="gran color_gr"><?php $chec = null; if(isset($filter_vier_setting['attrb']['group_view']['null_position']) && in_array($attributes['attribute_group_id'], $filter_vier_setting['attrb']['group_view']['null_position'])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][group_view][null_position][<?php echo $attributes['attribute_group_id']; ?>]" value="<?php echo $attributes['attribute_group_id']; ?>" <?php echo $chec; ?> />
                    </td>
                </tr>
            <?php } ?>
            <?php foreach($attributes['attrb'] as $attr) { ?>
            <?php $coun_p++; ?>
                <tr>
                    <td class="check_attr"><?php $chec = null; if(isset($filter_vier_setting['attrb']['view']) && in_array($attr['attribute_id'], $filter_vier_setting['attrb']['view'])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][view][<?php echo $attr['attribute_id']; ?>]" value="<?php echo $attr['attribute_id']; ?>" <?php echo $chec; ?> /> <?php echo $attr['name_attr']; ?>
                    </td>
                    <td class="gran color_blue"><?php $chec_slider = null; if(isset($filter_vier_setting['attrb']['slider']) && in_array($attr['attribute_id'], $filter_vier_setting['attrb']['slider'])) { $chec_slider = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][slider][<?php echo $attr['attribute_id']; ?>]" value="<?php echo $attr['attribute_id']; ?>" <?php echo $chec_slider; ?> />
                    </td>
                    <td class="gran"><?php $chec_button = null; if(isset($filter_vier_setting['attrb']['button']) && in_array($attr['attribute_id'], $filter_vier_setting['attrb']['button'])) { $chec_button = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][button][<?php echo $attr['attribute_id']; ?>]" value="<?php echo $attr['attribute_id']; ?>" <?php echo $chec_button; ?> />
                    </td>
                    <td class="gran color_gr"><?php $chec = null; if(isset($filter_vier_setting['attrb']['null_position']) && in_array($attr['attribute_id'], $filter_vier_setting['attrb']['null_position'])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[attrb][null_position][<?php echo $attr['attribute_id']; ?>]" value="<?php echo $attr['attribute_id']; ?>" <?php echo $chec; ?> />
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
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','inout','count','button'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php if($set == 'button') { ?>
                <span  class="sort_order">
                    <?php echo ${'text_'.$set}; ?>
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                    <span class="gran"></span>
                    <span <?php echo $hlp; ?> title="<?php echo $legnd_null_position; ?>" class="helpis color_gr"></span>
                </span>
                <?php } else { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> />
                <?php echo ${'text_'.$set}; ?>
                <span class="gran"></span>
                <?php } ?>
            <?php } ?>
            </div>
            <div class="block_check">
                <a onclick="$('.optinz').find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$('.optinz').find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
            </div>
            <div class="scrolis">
            <table class="tbl_param max_width">
        <?php foreach($view_options as $options) { ?>
        <?php $coun_p++; ?>
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
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','inout','count','slider'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /> 
                <?php echo ${'text_'.$set}; ?>
                <?php if($set == 'slider') { ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$set}; ?>"></span>
                <?php } else { ?>
                <span class="gran"></span>
                <?php } ?>
            <?php } ?>
            </div>
            <div class="params ram_dash">
            <?php $set_main = array('jq_ui','del_symbol'); ?>
            <?php foreach($set_main as $pole) { ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                <span class="gran"></span>
            <?php } ?>
            </div>
            <div class="params ram_dash">
            <p class="group_attr">
                <?php echo $help_price_step; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pz}; ?>"></span>
            </p>
                <p> <?php echo $help_price_separ; ?> - ;</p>
                <input class="input-price" type="text" name="filter_vier_setting[<?php echo $pz; ?>][view]" value="<?php echo isset($filter_vier_setting[$pz]['view']) ? $filter_vier_setting[$pz]['view'] : null; ?>" /> <span><?php echo $config_currency; ?></span>   
            </div>
        </fieldset>
    </div>
    <!-- /price -->
    <!-- manufacted -->
    <div class="block-param">
        <fieldset>
            <?php $pz = 'manufs'; ?>
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','inout','count','image','null_position'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php if($set == 'null_position') { ?>
                <span  class="sort_order">
                    <span <?php echo $hlp; ?> title="<?php echo $legnd_null_position; ?>" class="helpis color_gr">
                    <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_setting[<?php echo $pz; ?>][<?php echo $set; ?>]" value="1" <?php echo $chec; ?> /></span>
                </span>
                <?php } else { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
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
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','count'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
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
            <legend><?php echo ${'legnd_'.$pz}; ?></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','count'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
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
            <legend><?php echo ${'legnd_'.$pz}; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pz}; ?>"></span></legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $pz; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$pz]) ? $filter_vier_setting['view_posit'][$pz] : null; ?>" />
            </div>
            <div class="status">
            <?php $arr_set = array('status','count'); ?>
            <?php foreach($arr_set as $set) { ?>
                <?php $chec = null; if(isset($filter_vier_setting[$pz][$set])) { $chec = ' checked="checked"';} ?>
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
    <?php $key_param = 'chc'; ?>
        <fieldset>
            <legend><?php echo ${'legnd_'.$key_param}; ?>
                <span <?php echo $hlp, $cls_hel; ?> title="<?php  echo ${'help_'.$key_param}; ?>"></span>
            </legend>
            <div class="posit_site">
                <?php echo $legnd_sort_filter; ?>
                <input class="input_center input_width_30" name="filter_vier_setting[view_posit][<?php echo $key_param; ?>]" type="text" value="<?php echo isset($filter_vier_setting['view_posit'][$key_param]) ? $filter_vier_setting['view_posit'][$key_param] : null; ?>" />
            </div>
            <div class="status">
                <?php $chec = null; if(isset($filter_vier_setting[$key_param]['status'])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_setting[<?php echo $key_param; ?>][status]" value="1" <?php echo $chec; ?> /> 
                <?php echo $text_status; ?>
            </div>
        </fieldset>
        <p class="group_attr">
        <?php $pole = 'mini_sel'; ?>
            <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
            <?php $chek = null; if(isset($filter_vier_setting[$pole])) { $chek = ' checked="checked"';} ?>
            <input type="checkbox" name="filter_vier_setting[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
        </p>        
    </div>
    <!-- /choice -->
    </div><!-- end block_filter_vier -->
        <div class="clear"></div>
        <div class="form-group" id="fv_poles"><!-- fv_poles -->
            <div class="name_group_main"><?php echo $legnd_setting_poles; ?><span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_setting_poles; ?>"></span></div>
            <?php $set_poles = array('stock_status','rating','reward','discount','mini_description','date_end','manufacturer','special','nalog','mult_store'); ?>
            <?php foreach($set_poles as $k => $pole) { ?>
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
    <!-- layout setting -->
    <table id="module" class="list">
        <thead>
          <tr>
            <td class="left"><?php echo $entry_layout; ?></td>
            <td class="left"><?php echo $entry_position; ?></td>
            <td class="left"><?php echo $entry_status; ?></td>
            <td class="right"><?php echo $entry_sort_order; ?></td>
            <td></td>
          </tr>
        </thead>
        <?php $module_row = 0; ?>
        <?php $arr_position = array('column_left', 'column_right', 'content_top', 'content_bottom'); ?>
        <?php foreach ($modules as $module) { ?>
        <tbody id="module-row<?php echo $module_row; ?>">
          <tr>
            <td class="left">
                <select name="filter_vier_module[<?php echo $module_row; ?>][layout_id]">
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
                <select class="posit" name="filter_vier_module[<?php echo $module_row; ?>][position]">
            <?php foreach($arr_position as $posit) { $selec = null; if($module['position'] == $posit) { $selec = ' selected="selected"';} ?>
                    <option class="posit" value="<?php echo $posit; ?>" <?php echo $selec; ?>><?php echo ${'text_'.$posit}; ?></option>
            <?php } ?>
                </select>
            </td>
            <td class="left">
                <select name="filter_vier_module[<?php echo $module_row; ?>][status]">
                    <?php if ($module['status']) { ?>
                    <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                    <option value="0"><?php echo $text_disabled; ?></option>
                    <?php } else { ?>
                    <option value="1"><?php echo $text_enabled; ?></option>
                    <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                    <?php } ?>
                </select>
            </td>
            <td class="right"><input type="text" name="filter_vier_module[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
            <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
          </tr>
        </tbody>
        <?php $module_row++; ?>
        <?php } ?>
        <tfoot>
          <tr>
            <td colspan="4"></td>
            <td class="left"><a onclick="addModule();" class="button"><?php echo $button_add_module; ?></a></td>
          </tr>
        </tfoot>
      </table>
    <!-- end layout setting -->
    </div>
    <!-- end #general -->
    <!-- #tab-meta_tags -->
    <div class="tab-pane" id="tab-meta_tags">
        <div class="form-group" id="meta_tags"><!-- meta_tags -->
  <?php $set_cpu = array('meta_tags','link_pages','h_head','h_descript','h_descript_base','h_descript_base_plus','no_price','no_gua_qv_now','redir_url','del_host','url_js','not_found_404','noindex_rel','noindex_page','noindex_all'); // ?>
            <?php foreach($set_cpu as $pole) { ?>
            <div class="sett_main">
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
        </div><!-- / meta_tags -->
        <div <?php echo $cls_tab; ?> id="language"><!-- description -->
        <?php foreach ($languages as $language) { ?>
            <a href="#language<?php echo $language['language_id']; ?>">
                <img src="<?php echo $language['src_img']; ?>" title="<?php echo $language['name']; ?>" />
            <?php echo $language['name']; ?>
            </a>
        <?php } ?>
        </div>
        <div class="tab-content">
            <?php foreach ($languages as $language) { ?>
            <div id="language<?php echo $language['language_id']; ?>">
                <table class="form">
                    <tr>
                        <td>
                            <p class="discr"><?php echo $entry_description; ?>:</p>
                        </td>
                        <td><textarea name="description[<?php echo $language['language_id']; ?>][description]" placeholder="<?php echo $entry_description; ?>" id="description<?php echo $language['language_id']; ?>"><?php echo isset($description[$language['language_id']]) ? $description[$language['language_id']]['description'] : ''; ?>
                        </textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="zaglav"><?php echo $help_zaglav_discript; ?></p>
                            <?php //echo $help_discript; ?>
                            <div class="form-group opis_mark"><?php echo $help_discript; ?></div>
                        </td>
                    </tr>
                </table>
                <label class="discr">Language:<span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_leave_blank; ?>"></span></label>
                <div class="form-group">
                    <table class="tbl_lang max_width">
                    <?php $cls_mt = null; 
                            foreach($legend_discript as $k_l => $v_l) {
                                if($k_l == 'legend_devide_title') { $cls_mt = ' class="color_blue"'; ?>
                        <tr>
                            <td colspan="2" class="div_form"><label class="discr">meta-tags<span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_leave_blank; ?>"></span></label></td>
                        </tr>
                        <?php } ?>
                        <tr<?php echo $cls_mt ?>>
                            <td class="text_lang"><?php echo $v_l; ?></td>
                            <td class="value_lang"><input type="text" name="lang[<?php echo $language['language_id']; ?>][<?php echo $k_l; ?>]" value="<?php echo isset($lang_description[$language['language_id']][$k_l]) ? $lang_description[$language['language_id']][$k_l] : ''; ?>" /></td>
                        </tr>
                    <?php } ?>  
                    </table>
                </div>
            </div>
            <?php } ?>
        </div><!-- / description -->
    </div><!-- end #tab-meta_tags -->
    <div class="tab-pane" id="tab-hand_links"><!-- #tab-hand_links -->
        <div class="form-group">
            <table id="tbl_hand_links" class="max_width">
                <thead>
                    <tr class="group_attr jir">
                        <td class="width_30pr text-center"><span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_hand_links; ?>"><?php echo $text_links; ?></span></td>
                        <td class="width_70pr text-center">
                            <?php $pole = 'add_hand_links'; ?><!-- add_hand_links -->
                            <span <?php echo $hlp, $cls_hel; ?> title="<?php echo ${'help_'.$pole}; ?>">
                                <input type="submit" name="<?php echo $pole; ?>" id="<?php echo $pole; ?>" value="<?php echo $text_zapis; ?>" />
                            </span><!-- /add_hand_links -->
                        </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id="th_pole">
                <?php $c_l = (count($poles_landing) + 1); $c_l_2 = ($c_l - 2); ?>
                <?php $kl = 0; foreach($hand_links as $val) {  ?>
                    <tr id="pole_row_<?php echo $kl; ?>">
                        <?php $tabin = null;
                            $class_error = null;
                            $zhach = trim($val['link']);
                            if(in_array($zhach, $duble_hand_links)) {
                                $class_error = $text_error_param;
                                $tabin = $it++;
                            }
                        ?>
                        <td>
                        <input class="max_width<?php echo $class_error; ?>" tabindex="<?php echo $tabin; ?>" name="hand_links[<?php echo $kl; ?>][link]" type="text" value="<?php echo $zhach; ?>" /></td>
                        <td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea class="max_width" name="hand_links[<?php echo $kl; ?>][<?php echo $pol; ?>][<?php echo $lang_id; ?>]"><?php echo isset($val[$pol][$lang_id]) ? $val[$pol][$lang_id] : ''; ?></textarea></td>
                                <?php } else { ?>
                                    <td class="jir"><?php echo $pol; ?></td>
                                    <td class="max_width"><input class="max_width" name="hand_links[<?php echo $kl; ?>][<?php echo $pol; ?>][<?php echo $lang_id; ?>]" type="text" value="<?php echo $val[$pol][$lang_id]; ?>" /></td>
                                <?php } ?>
                                </tr>
                        <?php } ?>
                            </table>
                        <?php } ?>
                        </td>
                        <td class="text-center"><a class="button" onclick="$('#pole_row_<?php echo $kl; ?>').remove();"><?php echo $button_remove; ?></a></td>
                    </tr>
                <?php $kl++; } ?>
                </tbody>
                <tfoot>
                    <tr>
                      <td colspan="2"></td>
                      <td class="text-center"><a class="button" onclick="addPole();"><?php echo $button_add; ?></a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div><!-- end #tab-hand_links -->
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
    <div class="tab-pane" id="tab-seo_url"><!-- #seo_url -->
        <div class="form-group"><!-- filter_vier_seo_url -->
            <div class="sett_main"><!-- seo_url -->
                <label class="control-label" for="input_seo_url">
                    <span <?php echo $hlp; ?> title="<?php echo $help_seo_url; ?>"><?php echo $legnd_seo_url; ?></span>
                    <?php $chek = null; if(isset($filter_vier_seo_url) && !empty($filter_vier_seo_url)) { $chek = ' checked="checked"';} ?>
                    <input class="" id="input_seo_url" type="checkbox" name="filter_vier_seo_url" value="1" <?php echo $chek; ?> />
                </label>
            </div><!-- /seo_url -->
            <div class="sett_main ram_dash"><!-- after_slash -->
                <?php $pole = 'after_slash'; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div><!-- / after_slash -->
            <div class="sett_main"><!-- lang_translit -->
                <label class="control-label" for="lang_translit">
                <span <?php echo $hlp; ?> title="<?php echo $help_lang_translit; ?>"><?php echo $legnd_lang_translit; ?></span>   
                  <select name="filter_vier_cpu[lang_translit]" id="lang_translit" class="select_fv">
                    <?php foreach($languages as $colum) {
                            $selec = null; 
                            if(isset($filter_vier_cpu['lang_translit']) && ($filter_vier_cpu['lang_translit'] == $colum['language_id'])) { $selec = ' selected="selected"'; } ?>
                       <option value="<?php echo $colum['language_id']; ?>" <?php echo $selec; ?>><?php echo $colum['code']; ?></option>
                    <?php } ?>
                  </select>
                </label>
            </div><!-- /lang_translit -->
            <!-- separators -->
             <?php $class_error = null; if($error_class_separators) {$class_error = $text_error_param;} ?>
            <div class="sett_main posit<?php echo $class_error; ?>">
                <label class="control-label" for="input_separators">
                    <span <?php echo $hlp; ?> title="<?php echo $help_separators; ?>"><?php echo $legnd_separators; ?></span>
                    <?php $value_separ = null; if(isset($filter_vier_cpu['separators']) && !empty($filter_vier_cpu['separators'])) {$value_separ = $filter_vier_cpu['separators'];} ?>
                    <input class="input_center input_width_40" id="input_separators" type="text" name="filter_vier_cpu[separators]" value="<?php echo $value_separ; ?>" />
                </label>
            </div><!-- /separators -->
            <div class="sett_main ram_dash"><!-- gen_transl -->
            <label class=" control-label" for="gen_transl">
                <?php $pole = 'del_tire'; ?>
                <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($filter_vier_cpu[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="filter_vier_cpu[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                <span <?php echo $hlp; ?> title="<?php echo $help_gen_transl; ?>">
                    <input type="submit" name="gen_transl" id="gen_transl" value="<?php echo $legnd_gen_transl; ?>" />
                </span>
            </label>
            </div><!-- /gen_transl -->
            <div class="sett_main"><!-- add_transl -->
            <label class=" control-label" for="add_transl">
                <span <?php echo $hlp; ?> title="<?php echo $help_add_transl; ?>">
                    <input type="submit" name="add_transl" id="add_transl" value="<?php echo $legnd_add_transl; ?>" />
                </span>
            </label>
            </div><!-- /add_transl -->
            <div class="sett_main"><!-- clear_table -->
            <label class=" control-label" for="add_clear_table">
                <span <?php echo $hlp; ?> title="<?php echo $help_clear_table; ?>">
                    <input type="submit" name="clear_table" id="clear_table" value="<?php echo $legnd_clear_table; ?>" />
                </span>
            </label>
            </div><!-- /clear_table -->
            <div class="sett_main ram_dash color_blue"><!-- for_otlad -->
                <?php $pole = 'show_link_slider'; ?>
                <label class="control-label">
                    <span <?php echo $hlp; ?> title="<?php echo ${'help_'.$pole}; ?>"><?php //echo ${'legnd_'.$pole}; ?></span>
                    <?php $chek = null; if(isset($for_otlad[$pole])) { $chek = ' checked="checked"';} ?>
                    <input type="checkbox" name="for_otlad[<?php echo $pole; ?>]" value="1" <?php echo $chek; ?> />
                </label>
            </div><!-- / for_otlad -->
        </div><!-- /filter_vier_seo_url -->
        <div class="name_group_main"><?php echo $help_edit_transl; ?></div>
    <div class="clear"></div>
    <?php $afocus = null; $id_af = ' id="iaf" '; $txt_afocus = 'autofocus'.$id_af; $stab_it = $it; $fun_it = null; $txt_fun_it = ' onkeydown="return fokuse(event);" '; ?>
    <!-- seo attributes -->
    <?php if(!empty($seo_attributes)) { ?>
    <div class="block-param">
        <?php $main_key = 'attrb';  ?>
        <fieldset>
            <legend>
                <span class="jir"><?php echo $legnd_attrb; ?></span>
                <span class="gran"></span>
                <?php $chec = null; if(isset($filter_vier_cpu['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_cpu[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php foreach($seo_attributes as $attribute) { ?>
                <?php $main_id = $attribute['attribute_id']; $key_id = 0;
                    $flg_slider = null; if(isset($filter_vier_setting['attrb']['slider'][$main_id])) $flg_slider = $cls_blue;
                    $fl_ti = false; $tabin = null;
                    $class_error = null; 
                    if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $fl_ti = true;} 
                    $class_error_b = null; 
                    if(isset($duble_url[$text_dbl_base][$main_key][$main_id][$key_id])) {$class_error_b = $text_color_red; $fl_ti = true;} 
                    $otlad = null;
                    if($fl_ti) {
                        $tabin = $it++;
                        $otlad = ($flag_otlad)? $dbl: null;
                        //if($tabin === $stab_it) {$afocus = $txt_afocus;}
                        //if(empty($duble_url)) {$fun_it = $txt_fun_it;}, $fun_it
                    }
                ?>
                <tr class="group_attr jir">
                    <td <?php echo $flg_slider ?>>
                        <?php echo $attribute['name_attr']; ?>
                    </td>
                    <td class="transl<?php echo $class_error; ?>">
                    <?php 
                    if($gen_transl) {
                        $key_value = isset($attribute['translit']) ? $attribute['translit'] : null;
                    }
                    else {
                        $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                    }
                    $key_value = trim($key_value);//input_transl
                    $coun_i++; ?>
                        <input class="<?php echo $class_error_b; ?>" tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" <?php //echo $afocus; ?>/>
                    </td>
                </tr>
                <?php $es_sl = ($flg_slider) ? $show_link_slider : true; ?>
            <?php if($es_sl && isset($attribute['param'])) {
                    foreach($attribute['param'] as $key => $val) {
                        $key_id = $val['text_id']; if(empty($key_id) || (strlen($val['name_text']) == 0)) continue; ?>
                <tr>
                    <td>
                        <?php echo $val['name_text']; ?>
                    </td>
                    <?php $class_error = null; $tabin = null; $otlad = null; if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $tabin = $it++; $otlad = ($flag_otlad)? $dbl: null; } ?>
                    <td class="transl<?php echo $class_error; ?>">
                    <?php
                        if($gen_transl) {
                            $key_value = isset($val['translit']) ? $val['translit'] : null;
                        }
                        else {
                            $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                        }
                        $key_value = trim($key_value);// class="input_transl"
                        $coun_i++; ?>
                        <input tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" />
                    </td>
                </tr>
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
                <?php $chec = null; if(isset($filter_vier_cpu['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                <input type="checkbox" name="filter_vier_cpu[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php  foreach($seo_options as $options) { ?>
                <?php if(isset($options['group_id'])) { ?>
                <tr class="group_attr jir">
                    <td>
                        <?php echo $options['name_group']; ?>
                    </td>
                    <?php $main_id = $options['group_id']; $key_id = 0;
                        $class_error = null; $fl_ti = false; $tabin = null; if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $fl_ti = true; }
                        $class_error_b = null; if(isset($duble_url[$text_dbl_base][$main_key][$main_id][$key_id])) {$class_error_b = $text_color_red; $fl_ti = true; }
                        $otlad = null; if($fl_ti) {$tabin = $it++; $otlad = ($flag_otlad)? $dbl: null;} ?>
                    <td class="transl<?php echo $class_error; ?>">
                    <?php
                        if($gen_transl) {
                            $key_value = isset($options['translit']) ? $options['translit'] : null;
                        }
                        else {
                            $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                        }
                        $key_value = trim($key_value);
                        $coun_i++; ?>
                        <input class="<?php echo $class_error_b; ?>" tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" />
                    </td>
                </tr>
                <?php } ?>
                <?php if(isset($options['param'])) { ?>
                    <?php foreach($options['param'] as $option) { ?>
                 <tr>
                    <td>
                        <?php echo $option['name_option']; ?>
                    </td>
                    <?php $key_id = $option['option_value_id'];
                        $class_error = null; $tabin = null; $otlad = null; if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $tabin = $it++; $otlad = ($flag_otlad)? $dbl: null;} ?>
                    <td class="transl<?php echo $class_error; ?>">
                    <?php 
                        if($gen_transl) {
                            $key_value = isset($option['translit']) ? $option['translit'] : null;
                        }
                        else {
                            $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                        }
                        $key_value = trim($key_value);// class="input_transl"
                        $coun_i++; ?>
                        <input tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" />
                    </td>
                </tr>   
                    <?php } ?>
                <?php } ?>
            <?php }  ?>
            </table>
            </div>
        </fieldset>
    </div>
    <?php } ?>
    <!-- /seo options -->
    <!-- seo manufs -->
    <?php if($manufs_translit) { ?>
    <?php $main_key = 'manufs'; $main_id = 1; $key_id = 0; ?>
    <div class="block-param">
        <fieldset>
            <legend>
                <table class="tbl_seo max_width">
                    <tr class="group_attr jir">
                        <td>
                            <?php echo $legnd_manufs; ?>
                        </td>
                        <?php $fl_ti = false; $tabin = null;
                            $class_error = null; 
                            if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $fl_ti = true;} 
                            $class_error_b = null; 
                            if(isset($duble_url[$text_dbl_base][$main_key][$main_id][$key_id])) {$class_error_b = $text_color_red; $fl_ti = true;} 
                            $otlad = null;
                            if($fl_ti) {
                                $tabin = $it++;
                                $otlad = ($flag_otlad)? $dbl: null;
                                //if($tabin === $stab_it) {$afocus = $txt_afocus;}
                                //var_dump($duble_url);
                                //if(empty($duble_url)) { $fun_it = $txt_fun_it;}, $fun_it
                            } 
                        ?>
                        <td class="transl<?php echo $class_error; ?>">
                    <?php if($gen_transl) {
                            $key_value = $manufs_translit;
                        }
                        else {
                            $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                        }
                        $key_value = trim($key_value);//input_transl
                        $coun_i++; ?>
                            <input class="<?php echo $class_error_b; ?>" tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" <?php //echo $afocus; ?>/>
                        </td>
                        <td class="gran">
                        <?php $chec = null; if(isset($filter_vier_cpu['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                            <input type="checkbox" name="filter_vier_cpu[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                            <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
                        </td>
                    </tr>
                </table>
            </legend>
            <div class="scrolis">
            <table class="tbl_seo max_width">
            <?php foreach($seo_manufs as $brand) { // class="group_attr jir" ?>
                <tr>
                    <td>
                        <?php echo $brand['name']; ?>
                    </td>
                    <?php $key_id = $brand['manufacturer_id'];
                        $class_error = null; $tabin = null; $otlad = null; if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $tabin = $it++; $otlad = ($flag_otlad)? $dbl: null; } ?>
                    <td class="transl<?php echo $class_error; ?>">
                    <?php 
                        if($gen_transl) {
                            $key_value = isset($brand['translit']) ? $brand['translit'] : null;
                        }
                        else {
                            $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                        }
                        $key_value = trim($key_value);// class="input_transl"
                        $coun_i++; ?>
                        <input tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value, $otlad; ?>" <?php //echo $afocus; ?>/>
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
            if(${$main_key.'_translit'}) {
                $main_id = 1; $key_id = 0; if($gen_transl){$key_value = ${$main_key.'_translit'};} $txt_legend = ${'legnd_'.$main_key};?>
        <div class="block-param">
            <fieldset>
                <legend>
                    <table class="tbl_seo max_width">
                        <tr class="group_attr jir">
                            <td>
                                <?php echo $txt_legend; ?>
                            </td>
                            <?php $fl_ti = false; $tabin = null;
                                $class_error = null; 
                                if(isset($duble_url[$text_dbl_fv][$main_key][$main_id][$key_id])) {$class_error = $text_error_param; $fl_ti = true;} 
                                $class_error_b = null; 
                                if(isset($duble_url[$text_dbl_base][$main_key][$main_id][$key_id])) {$class_error_b = $text_color_red; $fl_ti = true;} 
                                if($fl_ti) {
                                    $tabin = $it++; 
                                } 
                            ?>
                            <td class="transl<?php echo $class_error; ?>">
                        <?php if(!$gen_transl) {
                                $key_value = (isset($filter_vier_transl[$main_key][$main_id][$key_id])) ? $filter_vier_transl[$main_key][$main_id][$key_id] : null;
                            }
                            $key_value = trim($key_value);//input_transl
                            $coun_i++; ?>
                                <input class="<?php echo $class_error_b; ?>" tabindex="<?php echo $tabin; ?>" name="transl[<?php echo $main_key; ?>][<?php echo $main_id; ?>][<?php echo $key_id; ?>]" type="text" value="<?php echo $key_value; ?>" <?php //echo $afocus; ?>/>
                            </td>
                            <td class="gran">
                            <?php $chec = null; if(isset($filter_vier_cpu['canonic_view'][$main_key])) { $chec = ' checked="checked"';} ?>
                                <input type="checkbox" name="filter_vier_cpu[canonic_view][<?php echo $main_key; ?>]" value="1" <?php echo $chec; ?> />
                                <span <?php echo $hlp, $cls_hel; ?> title="<?php echo $help_canonic_view; ?>"></span>
                            </td>
                        </tr>
                    </table>
                </legend>
            </fieldset>
        </div>
        <?php }
        } ?>
    <!-- /seo 'qnts','nows','prs','psp' -->
    <!-- div class="block-param">
        <div><?php echo 'count_param - '. $coun_p.' * 3 = '.($coun_p3 = $coun_p*3); ?></div>
        <div><?php echo 'count_SEO - '. $coun_i; ?></div>
        <div><?php echo 'count_ALL = '. ($coun_p + $coun_i).' ('.($coun_i + $coun_p3).')'; ?></div>
        <div><span><?php echo ' sec: '.(microtime(true) - $sec); ?></span></div>
    </div -->
    </div><!-- end #seo_url -->
    </div><!-- / tab-content -->
    <!-- end module -->
    <div class="clear"></div>
    </form>
    </div><!-- end class="content"-->
  </div><!-- end class="box" -->
</div><!-- end id="content" -->
<script type="text/javascript">
    $(function() {
        $('.linc').on('click', function(){
            var linc = this.id;
            sessionStorage.sestemp=linc;        
        });
        var n_list = sessionStorage.sestemp;
        $('#tabs a').eq(n_list).click();
    });
</script>
<script>
    var kl = <?php echo $kl; ?>;
    function addPole() {
        var lang_id;
        var pol;
        html = '<tr id="pole_row_'+kl+'">';
        html += '<td><input  class="max_width" name="hand_links['+kl+'][link]" type="text" value="" /></td>';
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
        html += '<td></td>';
        html += '</tr><tr>';
        html += '<td colspan="2"><textarea class="max_width" name="hand_links['+kl+']['+pol+']['+lang_id+']"></textarea></td>';
                <?php }else { ?>
        html += '<td class="jir">'+pol+'</td>';
        html += '<td class="max_width"><input class="max_width" name="hand_links['+kl+']['+pol+']['+lang_id+']" type="text" value="" /></td>';
                <?php } ?>
        html += '</tr>';
        <?php } ?>
        html += '</table>';
        <?php } ?>
        html += '</td>';
        html += '<td class="text-center"><a class="button" onclick="$(\'#pole_row_'+kl+'\').remove();" title="<?php echo $button_remove; ?>"><?php echo $button_remove; ?></a></td>';
        html += '</tr>';
        
	$('#th_pole').append(html);
	kl++;
}
</script>
<script type="text/javascript" src="view/javascript/jquery/tooltip/tooltipster.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.helpis').tooltipster({
            theme: 'tooltipster-borderless',
            //minWidth: 160,
            maxWidth: 360
            
        });
    });
</script>
<script type="text/javascript">
$('#tabs a').tabs(); 
$('#language a').tabs();
</script>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript">
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('description<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
<?php } ?>
</script>
<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;
function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="filter_vier_module[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select class="posit" name="filter_vier_module[' + module_row + '][position]">';
                <?php foreach($arr_position as $posit) { ?>
    html += '       <option class="posit" value="<?php echo $posit; ?>"><?php echo ${'text_'.$posit}; ?></option>';
                <?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="filter_vier_module[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="filter_vier_module[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}
//--></script>
<?php echo $footer; ?>