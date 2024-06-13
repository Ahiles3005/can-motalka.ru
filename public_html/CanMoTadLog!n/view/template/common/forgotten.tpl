<?php echo $header; ?>
<div id="content">
<link rel="stylesheet" href="view/javascript/circle-bg/circle-bg.css?v=<?php echo time();?>">
<canvas id="pixie"></canvas>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="login forgotten">
    <div class="heading">
      <h1><?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#forgotten').submit();" class="button"><?php echo $button_reset; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="forgotten">
        <p><?php echo $text_email; ?></p>
        <table class="form">
          <tr>
            <td><?php echo $entry_email; ?></td>
            <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('.login').css({'transform':'translateY(0)','opacity':'1'});
});
</script>
<script src="view/javascript/circle-bg/circle-bg.js" type="text/javascript"></script>