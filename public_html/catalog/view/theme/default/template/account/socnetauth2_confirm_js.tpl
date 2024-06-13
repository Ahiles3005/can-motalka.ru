<div id="socnetauth2_confirm_block" style="display: none"></div>
<script>

$(document).ready(function() {
    $.ajax({
        url: 'index.php?route=account/socnetauth2/getConfirmCode',
        dataType: 'html',
		data: {
			'lastlink': '<?php echo $lastlink; ?>'
		},
        success: function(html) {
		
			if( html )
			{
				$('#socnetauth2_confirm_block').html(html);
				$('#socnetauth2_confirm_block').show();
			}
			else
			{ 
				$('#socnetauth2_confirm_block').hide();
			}
		},
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});
</script>