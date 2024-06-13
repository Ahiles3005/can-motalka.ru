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
      <div class="buttons"><a href="#" onClick="$('#form').submit();return false;" class="button"><?php echo $button_text_save; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_text_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $save; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tbody>
            <?php if ($categories) { ?>
            <?php foreach ($categories as $category) { ?>
            <tr>
              <td class="left"><?php echo $category['name']; ?></td>
              <td class="left">
                <select name="category<?php echo $category['category_id'] ?>" id="category<?php echo $category['category_id'] ?>" data-parent-id="<?php echo $category['parent_id'];?>" data-id="<?php echo $category['category_id'];?>">
                  <option value="0"><?php echo $text_not_selected ?></option>
                  <?php foreach ($patterns as $key => $value): ?>
                  <option value="<?php echo $value['pattern_id'] ?>" <?php echo ($value['pattern_id'] == $category['pattern_id'])?'selected="selected"':''; ?>><?php echo $value['pattern_name'] ?></option>
                  <?php endforeach ?>
                </select>
                <a href="#" class="button use_for_child" data-id="<?php echo $category['category_id'] ?>"><?php echo $text_use_for_child ?></a>
              </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
  <script>
  function add_for_parent(elem){
    alert(parseInt($(elem).attr('data-id')));
  }
  $(document).ready(function() {
    $('.use_for_child').click(function(event) {
      var elem = $('#category'+$(this).attr('data-id'));
      $('select[data-parent-id='+$(elem).attr('data-id')+']').val($(elem).val());
      return false;
    });
    $('.clear_cache').click(function(event) {
      event.preventDefault();
      $.ajax({url:$(this).attr('href'),type:'GET'});
      $(this).addClass('gray');
    });
  });
  </script>
<?php echo $footer; ?>