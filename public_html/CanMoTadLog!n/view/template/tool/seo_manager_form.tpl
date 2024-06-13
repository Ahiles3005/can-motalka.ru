<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1 class="seo-manager-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="rem"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td><span class="required">*</span> <?php echo $entry_query; ?></td>
            <td><input type="text" name="query" value="<?php echo $query; ?>" size="50" />
              <?php if ($error_query) { ?>
              <span class="error"><?php echo $error_query; ?></span>
              <?php } ?></td>
          </tr>
		  <tr>
            <td><?php echo $entry_keyword; ?></td>
            <td><input type="text" name="keyword" value="<?php echo $keyword; ?>" size="50" /></td>
          </tr>
        </table>
      </form>
    </div>
	<div class="foot_heading">
      <h1 class="seo-manager-page"><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a href="<?php echo $cancel; ?>" class="rem"><?php echo $button_cancel; ?></a></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>