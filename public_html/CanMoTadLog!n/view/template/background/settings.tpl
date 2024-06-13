<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><a href="<?php echo $link_patterns; ?>"><img alt="<?php echo $text_patterns; ?>" title="<?php echo $text_patterns; ?>" src="view/image/order.png" /></a>
        <a href="<?php echo $link_layouts; ?>"><img alt="<?php echo $text_design_layout; ?>" title="<?php echo $text_design_layout; ?>" src="view/image/layout.png" /></a>
        <a href="<?php echo $link_categories; ?>"><img alt="<?php echo $text_categories; ?>" title="<?php echo $text_categories; ?>" src="view/image/category.png" /></a>
        <a href="<?php echo $link_settings; ?>"><img alt="<?php echo $text_settings; ?>" title="<?php echo $text_settings; ?>" src="view/image/setting.png" /></a>
        <a href="<?php echo $link_clear_cache; ?>" class="clear_cache"><img alt="<?php echo $text_cache_count; ?>" title="<?php echo $text_cache_count; ?>" src="view/image/clear.png" /></a>
        <?php echo $heading_title; ?></h1> 
      <div class="buttons">
        <a href="#" onClick="$('#form').submit();return false;" class="button"><?php echo $button_text_save; ?></a>
        <a href="#" class="button"><?php echo $button_text_cancel; ?></a>
      </div>
    </div>
    <div class="content">
    <form action="<?php echo $save ?>" method="post" enctype="multipart/form-data" id="form">
      <table class="form">
        <tr>
          <td><?php echo $text_setting_mgr_on; ?></td>
          <td><?php if ($bg_mgr_on) { ?>
                <input type="radio" name="bg_mgr_on" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_on" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_on" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_on" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td></td>
        </tr>
        <tr class="s_css">
          <td><?php echo $text_setting_css_input_method ?></td>
          <td>
            <select name="bg_mgr_css_input_method" id="bg_mgr_css_input_method">
              <option value="1"<?php echo ($bg_mgr_css_input_method == '1')?' selected="selected"':''; ?>><?php echo $text_setting_css_input_method_1; ?></option>
              <option value="2"<?php echo ($bg_mgr_css_input_method == '2')?' selected="selected"':''; ?>><?php echo $text_setting_css_input_method_2; ?></option>
            </select>
          </td>
          <td></td>
        </tr>
        <tr class="bg_mgr_css_cache s_css">
          <td><?php echo $text_setting_enable_css_cache; ?></td>
          <td><?php if ($bg_mgr_enable_css_cache) { ?>
                <input type="radio" name="bg_mgr_enable_css_cache" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_css_cache" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_enable_css_cache" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_css_cache" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td></td>
        </tr>
        <tr class="s_js">
          <td><?php echo $text_setting_js_input_method ?></td>
          <td>
            <select name="bg_mgr_js_input_method" id="bg_mgr_js_input_method">
              <option value="1"<?php echo ($bg_mgr_js_input_method == '1')?' selected="selected"':''; ?>><?php echo $text_setting_js_input_method_1; ?></option>
              <option value="2"<?php echo ($bg_mgr_js_input_method == '2')?' selected="selected"':''; ?>><?php echo $text_setting_js_input_method_2; ?></option>
            </select>
          </td>
          <td></td>
        </tr>
        <tr class="bg_mgr_js_cache s_js">
          <td><?php echo $text_setting_enable_js_cache; ?></td>
          <td><?php if ($bg_mgr_enable_js_cache) { ?>
                <input type="radio" name="bg_mgr_enable_js_cache" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_js_cache" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_enable_js_cache" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_js_cache" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td></td>
        </tr>
        <tr>
          <td><?php echo $text_setting_inherit_product_patterns; ?></td>
          <td><?php if ($bg_mgr_inherit_product_patterns) { ?>
                <input type="radio" name="bg_mgr_inherit_product_patterns" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_inherit_product_patterns" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_inherit_product_patterns" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_inherit_product_patterns" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td></td>
        </tr>
          <td><?php echo $text_setting_include_base64; ?></td>
          <td><?php if ($bg_mgr_include_base64) { ?>
                <input type="radio" name="bg_mgr_include_base64" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_include_base64" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_include_base64" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_include_base64" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td></td>
        </tr>
        <tr>
          <td><?php echo $text_setting_enable_db_cache; ?></td>
          <td><?php if ($bg_mgr_enable_db_cache) { ?>
                <input type="radio" name="bg_mgr_enable_db_cache" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_db_cache" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="bg_mgr_enable_db_cache" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="bg_mgr_enable_db_cache" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
                <td><?php echo $text_setting_warn_info; ?></td>
        </tr>
        <tr>
          <td><?php echo $text_setting_container_id; ?></td>
          <td>
            <input type="text" name="bg_mgr_container_id" id="bg_mgr_container_id" value="<?php echo $bg_mgr_container_id; ?>">
          </td>
          <td></td>
        </tr>
        <tr>
          <td><?php echo $text_setting_image_dir; ?></td>
          <td>
            <input type="text" name="bg_mgr_image_dir" id="bg_mgr_image_dir" value="<?php echo $bg_mgr_image_dir; ?>">
          </td>
          <td></td>
        </tr>
        <tr>
          <td><?php echo $text_setting_fix_code; ?></td>
          <td colspan="2">
            <textarea name="bg_mgr_fix_code" rows="15" style="width:100%;"><?php echo $bg_mgr_fix_code; ?></textarea>
          </td>
        </tr>
      </table>
    </form>
    <style>
      .s_css{
        background-color:#fff4d9;border-left:5px solid #ffd166;
      }
      .s_js{
        background-color:#f4ffed;border-left:5px solid #b1db95;
      }
    </style>
    <script> 
      function init_form(){
        if ($('#bg_mgr_css_input_method').val() == '1') {
          $('.bg_mgr_css_cache').hide();
        }else{
          $('.bg_mgr_css_cache').show();
        }
        if ($('#bg_mgr_js_input_method').val() == '1') {
          $('.bg_mgr_js_cache').hide();
        }else{
          $('.bg_mgr_js_cache').show();
        }
      }
      $(document).ready(function() {
        init_form();
        $('#bg_mgr_css_input_method, #bg_mgr_js_input_method').change(function(event) {
          init_form();
        });
        $('.clear_cache').click(function(event) {
          event.preventDefault();
          $.ajax({url:$(this).attr('href'),type:'GET'});
          $(this).addClass('gray');
        });
      });

    </script>
    </div>
  </div>
<?php echo $footer; ?>



