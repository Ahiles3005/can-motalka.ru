</div>
<div id="footer"><?php echo $text_footer; ?></div>
<link rel="stylesheet" type="text/css" href="view/stylesheet/jquery.formstyler.css?v=<?php echo time();?>" />
<script type="text/javascript" src="view/javascript/jquery.formstyler.min.js"></script>
<script type="text/javascript">(function($){$(function(){$('input[type=radio]').styler();$('input[type=checkbox], select').styler('destroy');})})(jQuery);</script>
<script type="text/javascript"><!--
$("a.tooltip, span.tooltip, img.tooltip, div.tooltip").tooltip({
	track: true, 
    delay: 0, 
    showURL: false, 
    showBody: " - ", 
    fade: 250 
});
//--></script>
<?php if ($this->config->get('config_clicking_image') == 1) { ?>
<script type="text/javascript"><!--
$('.image').click(function(){
	var job = $(this).find("a:contains('<?php echo $this->language->get('text_browse'); ?>')").attr('onclick');
	if (job.length != 0) eval(job);
});
$('.image').hover(function(){
	var link = $(this).find("a:contains('<?php echo $this->language->get('text_browse'); ?>')");
	if (link.length != 0) {
		$(this).css('cursor', 'pointer');
	}
});
//--></script>
<?php } ?>
</body></html>