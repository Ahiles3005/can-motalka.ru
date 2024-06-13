<?php /* robokassa metka */ ?>
<div class="buttons">
  <div class="right">
    <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button" />
  </div>
</div>

<form action="<?php echo $action; ?>" method="POST" id="robokassa_form">
<?php foreach($PARAMS as $key=>$val) { ?>
<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $val; ?>">
<?php } ?>
</form>

<script>
$('#button-confirm').on('click', function() {
	$.ajax({
		url: 'index.php?route=payment/robokassa/preorder&INDEX=<?php echo $INDEX; ?>',
		dataType: 'json',
		success: function(json) 
		{
			//alert(json.link);
			//return;
			
			if( json.error )
			{
				alert( json.error );
			}
			else
			{
				json.link = json.link.replace("&amp;", "&");
				
				location = json.link;
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
});
</script>