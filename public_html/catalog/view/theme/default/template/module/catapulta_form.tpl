<div class="catapulta">
	<h2 class="catapulta-title"><?php echo $heading_title; ?></h2>
	<?php if(isset($error_warning)) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if($stock_status) { ?>
		<?php if(isset($text_customer)) { ?>
			<?php echo $text_customer; ?>
		<?php } else { ?>
			<?php if($phone_text) { ?>
			<span><?php echo $phone_text; ?></span>
			<?php } ?>
			<input type="text" name="catapulta_contact" value="" placeholder="Телефон" data-phone-mask="<?php echo $phone_mask; ?>" />
			<span class="contact_error"></span>
			<a class= "catapulta-send" data-wait="<?php echo $text_wait; ?>"><?php echo $button_send; ?></a>
		<?php } ?>
	<?php } ?>
</div>