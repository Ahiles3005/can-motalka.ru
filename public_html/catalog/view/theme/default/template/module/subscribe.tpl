<h4><?php echo $heading_title; ?></h4>
<div class="subscribe<?php echo $module; ?> subscribe-box">
	<input type="text" name="subscribe_email<?php echo $module; ?>" value="" placeholder="<?php echo $text_enter_email; ?>" />
	<div class="send-subscribe"><input type="button" value="" onclick="addSubscribe(<?php echo $module; ?>);" /></div>
	<span class="policy">Отправляя данные, вы соглашаетесь на <a href="/politika-konfidencialnosti/">обработку персональных данных</a>.</span>
</div>