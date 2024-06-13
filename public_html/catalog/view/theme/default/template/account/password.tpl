<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/simple.css" />
</div>
<div class="rast-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div id="wrapper">
<?php echo $content_top; ?>
<div class="simple-content">
        <div class="simpleregister edit-simpleregister">
                <div class="simpleregister-block-content">		
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">  
<div class="other-fields">
			<span class="simplecheckout-required">*</span>
			<input type="password" name="password" value="<?php echo $password; ?>" placeholder="<?php echo $entry_password; ?>" />
            <?php if ($error_password) { ?>
            <span class="simplecheckout-error-text"><?php echo $error_password; ?></span>
            <?php } ?>
</div>
<div class="other-fields">
			<span class="simplecheckout-required">*</span>
			<input type="password" name="confirm" value="<?php echo $confirm; ?>" placeholder="<?php echo $entry_confirm; ?>" />
            <?php if ($error_confirm) { ?>
            <span class="simplecheckout-error-text"><?php echo $error_confirm; ?></span>
            <?php } ?>
</div>
<a href="<?php echo $back; ?>" class="button red">Отменить</a>
<input type="submit" value="Сохранить" class="button" />
  </form>
                </div>  
        </div>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>