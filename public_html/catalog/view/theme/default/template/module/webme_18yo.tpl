<?php echo $header; ?>
<div id="content">
	<div style="margin-top:100px; text-align:center;">
		<?php echo $message; ?>
		<div style="margin-top:20px;">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="18yo_form">
				<input type="hidden" name="18yo_agree" value="18yo_agree">
				<input type="submit" value="<?php echo $button_agree;?>" > <input type="button" value="<?php echo $button_disagree;?>" onclick="location.href='<?php echo $disagreement_link; ?>';" >
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>