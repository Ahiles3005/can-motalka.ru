<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <?php if ($error) { ?>
  <div class="warning"><?php echo $error; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1 class="madule-page"><?php echo $heading_title; ?></h1>
    </div>
    <div class="contentes">
      <table class="list">
        <tbody>
          <?php if ($extensions) { ?>
          <?php foreach ($extensions as $extension) { ?>
          <tr>
            <td class="left"><?php echo $extension['name']; ?></td>
            <td class="right">
			  <?php foreach ($extension['action'] as $action) { ?>
			    <?php if ($this->config->get('config_buttons_apply') == 0) { ?>
                  [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
			    <?php } else { ?>
			      <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a>
			    <?php } ?>
              <?php } ?>
			</td>
          </tr>
          <?php } ?>
          <?php } else { ?>
          <tr>
            <td class="center" colspan="8"><?php echo $text_no_results; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
	<div class="foot_heading">
      <h1 class="madule-page"><?php echo $heading_title; ?></h1>
    </div>
  </div>
</div>
<?php echo $footer; ?>