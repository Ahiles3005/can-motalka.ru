<?php
if (isset($_GET['verification-request-answer?']))
{$seckey = $_GET['verification-request-answer?'];
setcookie ("verification-request-answer?", $_GET['verification-request-answer?']);}
else if
(isset($_COOKIE['verification-request-answer?']))
{$seckey = $_COOKIE['verification-request-answer?']; }
else {$seckey = '';}
if ($seckey != 'login-for-ca9477562947244l') {echo '<div style="width: 90%; margin: 0 auto; color: #f00; font-size: 80px; text-align: center;">Access Denied!</div>';
exit; } else { ?>
<?php echo $header; ?>
<link rel="stylesheet" href="view/javascript/circle-bg/circle-bg.css?v=<?php echo time();?>">
<canvas id="pixie"></canvas>
  <div class="login_warning">
	<?php if ($success) { ?>
      <div class="success"><?php echo $success; ?></div>
      <?php } ?>
      <?php if ($error_warning) { ?>
      <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>
  </div>
  <div class="login">
    <div class="heading">
      <h1><?php echo $name; ?> - <?php echo $text_login; ?></h1>
    </div>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
	    <div class="input_fields">
		  <div><input type="text" name="username" value="<?php echo $username; ?>" class="user_name" placeholder="<?php echo $entry_username; ?>" autocomplete="off" /></div>
		  <div><input type="password" name="password" value="<?php echo $password; ?>" class="user_password" placeholder="<?php echo $entry_password; ?>" autocomplete="off" /></div>
		</div>
		<div class="button_login">
		  <a onclick="$('#form').submit();"><?php echo $button_login; ?></a>
		</div>
		<div class="forgotten">
		  <?php if ($forgotten) { ?>
            <a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
          <?php } ?>
		</div>
        <?php if ($redirect) { ?>
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
        <?php } ?>
      </form>
  </div>
<script src="view/javascript/circle-bg/circle-bg.js?v=<?php echo time();?>" type="text/javascript"></script>
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script>
<script type="text/javascript">
$(document).ready(function() {
$('.login').css({'transform':'translateY(0)','opacity':'1'});
});
</script>
<script type="text/javascript">
$(function(){$("body").css({padding:0,margin:0});var f=function(){$("body > #container").css({position:"relative"});var h1=$("body").height();var h2=$(window).height();var d=h2-h1;var h=$("body > #container").height()+d;var ruler=$("<div>").appendTo("body > #container");h=Math.max(ruler.position().top,h);ruler.remove();$("body > #container").height(h)};setInterval(f,1000);$(window).resize(f);f()});
</script>
<?php } ?>