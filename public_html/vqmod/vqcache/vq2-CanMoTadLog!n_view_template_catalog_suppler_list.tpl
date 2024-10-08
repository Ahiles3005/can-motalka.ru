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

			
			<div>
				<form>
					<p>
						<select name="item" onChange="this.form.action = this.options[this.selectedIndex].value;"> 
							<option disabled selected>Выберите пункт</option> 
							<option value="/vqmod/php/errors.php" STYLE="color:#CC3333">Посмотреть фаил ошибок</option>
							<option value="/vqmod/php/report.php" STYLE="color:#0000ff">Посмотреть фаил загрузок</option>
							<option value="/vqmod/php/sos.php">Посмотреть фаил sos</option>
							<option value="/CanMoTadLog!n/uploads/ex.xml">Посмотреть фаил ex</option>
						</select><input type="submit" value="Ок">
					</p>
   
				</form>
			</div>
			
			
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" alt="" /> <?php echo $heading_title; ?></h1>
      
			
			<div class="buttons"><a onclick="location = '<?php echo $insert; ?>'" class="button"  id="supplerbutton1"><?php echo $button_insert; ?></a><a  onclick="$('#form').submit();" class="button"  id="supplerbutton2"><?php echo $button_delete; ?></a></div>
			
			
    </div>
    <div class="content">
      <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
          <thead>
            <tr>
              <td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
              <td class="left"><?php if ($sort == 'name') { ?>
                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                <?php } ?></td>
              <td class="right"><?php if ($sort == 'sort_order') { ?>
                <a href="<?php echo $sort_sort_order; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_scode;; ?></a>
                <?php } else { ?>
                <a href="<?php echo $sort_sort_order; ?>"><?php echo $column_scode; ?></a>
                <?php } ?></td>			  
              <td class="right"><?php echo $column_load; ?></td>
			  <td class="right"><?php echo $column_action; ?></td>
            </tr>
          </thead>
          <tbody>
            <?php if ($supplers) { ?>
            <?php foreach ($supplers as $suppler) { ?>
            <tr>
              <td style="text-align: center;"><?php if ($suppler['selected']) { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $suppler['form_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" value="<?php echo $suppler['form_id']; ?>" />
                <?php } ?></td>
              <td class="left"><?php echo $suppler['name']; ?></td>
              <td class="right"><?php $c=$suppler['suppler_id']; if ($c<10) {$c=' 0'.$c;} echo $c; ?></td>			  
			  <td class="right"><?php foreach ($suppler['action'] as $action) { ?>
				[ <a href="<?php echo $action['load']; ?>"><?php echo $suppler['form_id'] . '.xml/csv'; ?></a> ]                
                <?php } ?></td>			  
              <td class="right"><?php foreach ($suppler['action'] as $action) { ?>
				[ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]                
                <?php } ?></td>
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
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>