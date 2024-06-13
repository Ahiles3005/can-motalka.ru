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
        <a href="<?php echo $add ?>" class="button"><?php echo $button_text_insert; ?></a><a href="#" onClick="$('#form').attr('action','<?php echo $copy ?>');$('#form').submit();return false;" class="button"><?php echo $button_text_copy; ?></a><a href="#" onClick="$('#form').attr('action','<?php echo $delete ?>');$('#form').submit();return false;" class="button"><?php echo $button_text_delete; ?></a>
      </div>
    </div>
    <div class="content">
      <?php if (empty($patterns)){ ?>
        <center><?php echo $text_list_empty; ?></center>
      <?php }else{ ?>
        <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
          <table class="list">
            <thead>
              <tr>
                <td style="text-align: center;" class="left" width="1">
                  <input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);">
                </td>
                <td class="left"><?php echo $text_pattern_name ?></td>
                <td class="left"><?php echo $text_bg_type ?></td>
                <td class="right"><?php echo $text_action ?></td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($patterns as $key => $pattern): ?>
              <tr style="cursor:pointer;">
                <td style="text-align: center;" class="left">
                <input type="checkbox" class="chk<?php echo $pattern['id']; ?>" name="selected[]" value="<?php echo $pattern['id']; ?>" />
                </td>
                <td class="left" onClick="window.location.href='<?php echo $pattern['edit_link']; ?>';"><?php echo $pattern['pattern_name'] ?></td>
                <td class="left" onClick="window.location.href='<?php echo $pattern['edit_link']; ?>';"><?php echo $pattern_types[$pattern['bg_type']-1]; ?></td>
                <td class="right">
                  [ <a href="<?php echo $pattern['edit_link']; ?>"><?php echo $button_text_edit ?></a> ]
                  [ <a href="<?php echo $pattern['view_link']; ?>" onClick="view_template(this); return false;"><?php echo $text_view ?></a> ]
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </form>
      <?php } ?>
    </div>
  </div>
  <script>
    var win;
    function view_template(href){
      win = window.open($(href).attr('href')).focus();
    }
    $(document).ready(function() {
      $('.clear_cache').click(function(event) {
        event.preventDefault();
        $.ajax({url:$(this).attr('href'),type:'GET'});
        $(this).addClass('gray');
      });
    });
  </script>
<?php echo $footer; ?>


