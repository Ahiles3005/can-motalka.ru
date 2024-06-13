<style>	
#socnetauth2overlay {

			height:100%;
			width:100%;
			position:fixed;
			left:0;
			top:0;
			z-index:99999 !important;
			background-color:black;
			
			filter: alpha(opacity=75);
			-khtml-opacity: 0.75;
			-moz-opacity: 0.75
			opacity: 0.75;
}

#socnetauth2box
{
	background: #fff;
	z-index:999990 !important;
	border-radius: 15px;
	padding-bottom: 57px; 
	padding: 15px; 
	top: 50px; 
	left: 368px; 
	position: fixed; 
	width: 500px; 
	
}

</style>
<div id="socnetauth2overlay" style="opacity: 0.5; cursor: pointer;"></div>
<div id="socnetauth2box" class="" style="height: <?php echo $divframe_height; ?>px;"
>


<iframe src="<?php echo $frame_url; ?>" style="border: 0px; width: 500px; height: <?php echo $frame_height; ?>px;"></iframe> 

<a href="<?php echo $lastlink; ?>"
	style="text-decoration: none; font-size: 30px; position: absolute; top:15px; right: 20px;">X</a>
</div>

<script>
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
function possocnetauth22Window()
{
	if( !getCookie('socnetauth2_confirmdata') )
		return;
		
	if( $(window).width() > 500 )
	{
		var left = ($(window).width() - 500)/2;
	}
	else
	{
		var left = 5;
		var wid = $(window).width() - 10;
		
		$('#socnetauth2box iframe').css('width', wid+'px');
		$('#socnetauth2box').css('width', wid+'px');
	}
	
	var top =  ($(window).height() - <?php echo $frame_height; ?>)/2;
	
	$('#socnetauth2box').css("left", left+'px');
	$('#socnetauth2box').css("top", top+'px');
}

possocnetauth22Window();
</script>