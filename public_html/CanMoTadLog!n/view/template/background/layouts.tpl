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
        <a href="#" onClick="$('#form').submit();return false;" class="button"><?php echo $button_text_save; ?></a><a href="<?php echo $cancel ?>" class="button"><?php echo $button_text_cancel; ?></a>
      </div>
    </div>
    <div class="content">
      <form action="<?php echo $save; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tbody>
            <?php if ($combined) { ?>
            <?php foreach ($combined as $key => $layout): ?>
            <tr>
              <td class="left"><?php echo $layout['name']; ?></td>
              <td class="left">
                <select name="layout<?php echo $key ?>">
                <option value="0"><?php echo $text_not_selected ?></option>
                <?php foreach ($patterns as $key2 => $pattern): ?>
                <option value="<?php echo $pattern['id'] ?>"<?php echo ($pattern['id'] == $layout['pattern_id'])? ' selected="selected"':''; ?>><?php echo $pattern['pattern_name'] ?></option>
                <?php endforeach ?>
                </select>
              </td>
            </tr>
            <?php endforeach ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="3"><?php echo $text_list_empty; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
<script>
  $(document).ready(function() {
    $('.clear_cache').click(function(event) {
      event.preventDefault();
      $.ajax({url:$(this).attr('href'),type:'GET'});
      $(this).addClass('gray');
    });
  });
</script>
<?php echo $footer; ?>



