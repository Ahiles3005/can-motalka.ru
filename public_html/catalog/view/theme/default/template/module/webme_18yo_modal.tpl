
<script type="text/javascript"><!--
$(function() {
	$('#af_18_board').dialog({
		closeOnEscape: false,
		height: 240,
		width: 500,
		modal: false,
		resizable: false,
	});
	$('.ui-dialog-titlebar').remove();
});
//--></script>
<!-- AF_18yo_modal_window start /-->
<style type="text/css">
.ui-dialog{position:fixed!important;width:100%!important;height:100px!important;left:0!important;top:auto!important;bottom:0}#af_18_board_buttons,#af_18_board_info{position:relative;text-align:left;padding:20px;min-width:350px}#af_18_board{padding:0;width:100%!important;min-height:auto!important;height:100%!important;background:#fff;box-shadow:0 -2px 15px 0 rgba(0,0,0,.3)}#af_18_board>div{width:1300px;height:100%;display:flex;margin:0 auto;flex-direction:row;align-items:center;flex-wrap:wrap}#af_18_board_info{flex-basis:70%;font-size:14px;font-weight:300;color:#777}#af_18_board_buttons{flex-basis:29%}#btn_no,#btn_yes{display:inline-block;vertical-align:middle;width:100px;padding:10px 0;margin:0 10px 0 0;text-align:center;font-size:14px;font-weight:400;color:#358D28;border:2px solid #358D28;border-radius:22px;transition:all .2s linear;cursor:pointer}#btn_no{width:50px}#btn_no:hover,#btn_yes:hover{background:#358D28;color:#fff}@media screen and (max-width:767px){.ui-dialog{bottom:45px;z-index:9999!important;height:auto!important}#af_18_board>div{width:100%}#af_18_board_info{padding:1em;min-width:auto;font-size:.9em}#af_18_board_buttons{min-width:auto}#btn_no,#btn_yes{display:block;width:90%;font-size:1em;padding:5px 0;border:1px solid #FE504F;margin:0 0 10px}}
</style>
<div id="af_18_board" title="<?php echo $webme_18yo_header; ?>">
<div>
<div id="af_18_board_info"><?php echo $message; ?></div>
	<div id="af_18_board_buttons">
		<div id="btn_yes">Ok</div>
		<div id="btn_no">X</div>
		<div style="clear:both;">
	</div>
</div>
</div>
<script type="text/javascript"><!--
$('#btn_yes, #btn_no').click(function(){
	$.ajax({
		url: '<?php echo $action; ?>',
		type: 'POST',
		data: '18yo_agree=18yo_agree',
		dataType: 'json',
		success: function(data) {
			if (data.success) {
				$('#af_18_board').dialog('close');
			} else {
				alert(data.error);
			}
		}
	});
});
//--></script>
<!-- AF_18yo_modal_window end /-->