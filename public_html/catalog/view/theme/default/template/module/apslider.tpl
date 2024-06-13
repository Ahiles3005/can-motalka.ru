
<div class="contant_slider">
	<div id="ap_slder<?php echo $module; ?>" class="owl-carousel owl-theme">
	<?php 
		$i = 0; 
		foreach ($slider as $item) { 
			switch ($item['text_position']) {
				case 'top_left'      : $text_position = 'top_left';      break;
				case 'top_center'    : $text_position = 'top_center';    break;
				case 'top_right'     : $text_position = 'top_right';     break;
				case 'center_left'   : $text_position = 'center_left';   break;
				case 'center_center' : $text_position = 'center_center'; break;
				case 'center_right'  : $text_position = 'center_right';  break;
				case 'bottom_left'   : $text_position = 'bottom_left';   break;
				case 'bottom_center' : $text_position = 'bottom_center'; break;
				case 'bottom_right'  : $text_position = 'bottom_right';  break; 
			} 
	?>

	<div class="item slide_<?php echo $i; ?>">
	<?php if ($item['link_to'] == 'slide' ) { ?> <a href="<?php echo $item['link']; ?>"> <?php } ?>
		<img alt="" <?php echo ($lazy_load) ? 'class="lazyOwl img-responsive" data-src="'. $item['thumb'] . '"' : 'src="' . $item['thumb'] . '" class="img-responsive"'; ?>>
		<div class="apslder_text_box <?php echo $text_position; ?>">
			<?php if($item['text_title']) { ?> <h2><?php echo $item['text_title']; ?></h2> <?php } ?>
			<?php if($item['text_descr']) { ?> <div class="apslder_desc"> <?php echo $item['text_descr']; ?> </div> <?php } ?>
			<?php if($item['link_to'] == 'btn' && $item['btn_title']) { ?> <a class="apslder_btn" href="<?php echo $item['link']; ?>"> <?php echo $item['btn_title']; ?> </a> <?php } ?>
		</div>
	<?php if ($item['link_to'] == 'slide' ) { ?> </a> <?php }?>
	</div>
	
	<?php $i++; } ?>
	</div>
</div>

<script>
$(function() {

var margin_top = <?php echo $margin_top ? $margin_top : 0 ?>;

<?php if ($full) { ?>	
	var linking   = $('<?php echo $selector; ?>');
	<?php if ($substrate) { ?>
	var height  = linking.offset().top + linking.outerHeight(true) + margin_top;

	html = '<div id="substrate<?php echo $module; ?>"></div>';
	linking.after(html);
	$('#ap_slder<?php echo $module; ?>').detach().appendTo($('body'));
	$('#ap_slder<?php echo $module; ?>').css({ 'position' : 'absolute', 'top' : height, 'left' : 0 });
	<?php } else { ?>
	var height  = linking.offset().top + margin_top;
	$('body').append($('#ap_slder<?php echo $module; ?>'));
	$('#ap_slder<?php echo $module; ?>').css({ 'position' : 'absolute', 'top' : height, 'left' : 0, 'z-index' : -1 });
	<?php } ?>

	<?php if ($parallax) { ?>
	var stop = true, element;

		$(document).scroll(function () {
			
			var	offsetHeight = $('#ap_slder<?php echo $module; ?>').offset().top, scrollHeight = $(this).scrollTop(), sliderHeight = $('#ap_slder<?php echo $module; ?>').height(), imgHeight = $('#ap_slder<?php echo $module; ?> img').height(), hStart = offsetHeight - scrollHeight, hEnd = (offsetHeight + sliderHeight) - scrollHeight;		
					
				if (hStart < 0 && hEnd > 0) {
					var maxScroll = imgHeight - sliderHeight, imgScroll = (hStart*-1) / <?php echo $parallax_speed ? $parallax_speed : 5; ?>; 
						
					if (stop == true) {
						$('.owl-carousel').each(function () {
							var hElement = $(this).offset().top;

							if (hElement == offsetHeight) {
								element = $(this).attr('id'); 
								stop = false;
							}
						});
					}

					if (maxScroll > (hStart*-1)) {
						$('#'+ element +' .item img').css({
							'-moz-transform'	: 'translate3d(0, -'+ imgScroll+'px, 0)',
							'-ms-transform'	    : 'translate3d(0, -'+ imgScroll+'px, 0)',
							'-webkit-transform' : 'translate3d(0, -'+ imgScroll+'px, 0)',
							'transform'	        : 'translate3d(0, -'+ imgScroll+'px, 0)',
						});
					}
				}  

				if (hStart > 0) {

					$('#'+ element +' .item img').css({
						'-moz-transform'	: 'translate3d(0, 0, 0)',
						'-ms-transform'	    : 'translate3d(0, 0, 0)',
						'-webkit-transform' : 'translate3d(0, 0, 0)',
						'transform'	        : 'translate3d(0, 0, 0)'
					});
				}
		});
	<?php } ?>

<?php } ?>
 
	$('#ap_slder<?php echo $module; ?>').owlCarousel({
		theme: 'owl-apslider',
		responsive: true,
		responsiveBaseWidth: '#ap_slder<?php echo $module; ?>',
		singleItem: true,
		autoPlay: <?php echo $auto_play ? ($timeout * 1000) : 'false'; ?>,
		transitionStyle: '<?php echo $animation; ?>',
		lazyLoad: <?php echo $lazy_load ? 'true' : 'false'; ?>,
		pagination: <?php echo $point ? 'true' : 'false'; ?>,
		navigation: <?php echo $arrow ? 'true' : 'false'; ?>,
		stopOnHover : true,
		navigationText: ['', ''],
		<?php if ($progress) { ?>
		afterInit : progressBar,
	    afterMove : moved,
	    startDragging : pauseOnDragging
	    <?php } ?>
	});

<?php if ($progress) { ?>

	var time  = <?php echo $timeout; ?>, $progressBar, $bar, $elem, isPause, tick, percentTime;

	function progressBar (elem) {
		$elem = elem;

		if ($('#ap_slder<?php echo $module; ?> .item').length == 1) { return false; }
	
	    buildProgressBar();
	    start();
	}

	function buildProgressBar(){
		var position = '<?php echo $progress_pos ?>';

	    $progressBar = $("<div>", { id:"ap_progress" });
	    $bar         = $("<div>",{ id:"ap_bar" });

	    if (position == 'top') { $progressBar.append($bar).prependTo($elem);
		} else { $progressBar.append($bar).appendTo($elem);}
	}

	function start() { percentTime = 0; isPause = false; tick = setInterval(interval, 9); };

	function interval() {
    	if(isPause === false) {

        	percentTime += 1 / time;
        	$bar.css({ width: percentTime+"%" });
	
        	if(percentTime >= 100){ $elem.trigger('owl.next'); }
      	}
    }

	function pauseOnDragging(){ isPause = true; }   
	function moved(){ clearTimeout(tick); start(); }

	$elem.on('mouseover',function(){ isPause = true; });
	$elem.on('mouseout', function(){ isPause = false; });

<?php } ?>
});	

</script>

<style>#ap_slder<?php echo $module; ?> #ap_bar {background:<?php echo $progress_status ?>; height:<?php echo $line_height ?>px;} #ap_slder<?php echo $module; ?> #ap_progress {background: <?php echo $progress_bg; ?>}<?php if ($point) { ?>#ap_slder<?php echo $module; ?> .owl-pagination {text-align: <?php echo $point_possition; ?> !important}#ap_slder<?php echo $module; ?> .owl-pagination span {background:<?php echo $point_color; ?> !important}<?php } ?><?php $i = 0; foreach($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {background: <?php echo $item['bg_descr'] ?>;}#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box h2 {color: <?php echo $item['title_color'] ?>; text-align:<?php echo $item['title_alig'] ?>;}#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box .apslder_desc {color: <?php echo $item['descr_color'] ?>; text-align:<?php echo $item['descr_alig'] ?>;}<?php if ($item['link_to'] == 'btn' && $item['btn_title']) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box .apslder_btn:hover{ background: <?php echo $item['btn_hover'] ? $item['btn_hover'] : '#fff'?>; color:<?php echo $item['colortext_hover'] ? $item['colortext_hover'] : '' ?>;}#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box .apslder_btn {color: <?php echo $item['colortext_btn'] ?>; background: <?php echo $item['btn_color'] ?>; text-align: <?php echo $item['btn_alig'] ?>;}<?php } $i++;} ?> @media(min-width: 320px) {<?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width320']) { ?> width:<?php echo $item['box_width320'] ?>; <?php } ?>display: <?php echo $item['show_width320'] ? 'block' : 'none' ?>;}<?php if ($item['btn_width320']) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width:<?php echo $item['btn_width320']; ?> } <?php } ?><?php $i++; } ?>#ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height:<?php echo $max_320; ?>px }}@media(min-width: 450px) {<?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width450']) { ?> width: <?php echo $item['box_width450'] ?>; <?php } ?>display: <?php echo $item['show_width450'] ? 'block' : 'none' ?>;}<?php if ($item['btn_width450']) { ?> #ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width: <?php echo $item['btn_width450']; ?> } <?php } ?><?php $i++; } ?>#ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height: <?php echo $max_450; ?>px }}@media(min-width: 560px) {<?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width560']) { ?> width: <?php echo $item['box_width560'] ?>; <?php } ?>display: <?php echo $item['show_width560'] ? 'block' : 'none' ?>;  }<?php if ($item['btn_width560']) { ?> #ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width: <?php echo $item['btn_width560']; ?> } <?php } ?><?php $i++; } ?>#ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height: <?php echo $max_560; ?>px}}@media(min-width: 768px){ <?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width768']) { ?> width: <?php echo $item['box_width768'] ?>; <?php } ?>display: <?php echo $item['show_width768'] ? 'block' : 'none' ?>;}<?php if ($item['btn_width768']) { ?> #ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width: <?php echo $item['btn_width768']; ?> } <?php } ?><?php $i++; } ?>#ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height: <?php echo $max_768; ?>px }}@media(min-width: 992px) {<?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width992']) { ?> width: <?php echo $item['box_width992'] ?>; <?php } ?>display: <?php echo $item['show_width992'] ? 'block' : 'none' ?>;  }<?php if ($item['btn_width992']) { ?> #ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width: <?php echo $item['btn_width992']; ?> } <?php } ?><?php $i++; } ?>#ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height: <?php echo $max_992; ?>px }}@media(min-width: 1200px) {<?php $i = 0; foreach ($slider as $item) { ?>#ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_text_box {<?php if ($item['box_width1200']) { ?> width: <?php echo $item['box_width1200'] ?>; <?php } ?>display: <?php echo $item['show_width1200'] ? 'block' : 'none' ?>;  }<?php if ($item['btn_width1200']) { ?> #ap_slder<?php echo $module; ?> .slide_<?php echo $i; ?> .apslder_btn { width: <?php echo $item['btn_width1200']; ?> } <?php } ?><?php $i++; } ?> #ap_slder<?php echo $module; ?>, #substrate<?php echo $module; ?>, #ap_slder<?php echo $module; ?> .item {height: <?php echo $max_1200; ?>px}}<?php if ($full) { ?> #substrate<?php echo $module; ?> { margin-bottom: <?php echo $margin_bottom ? $margin_bottom : 0 ?>px; margin-top: <?php echo $margin_top ? $margin_top : 0 ?>px; } <?php } ?></style>
