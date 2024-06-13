<section id="reviews">
<h2><?php echo $heading_title; ?></h2>
<?php if (isset($position) && $position == 'column'){ ?><?php } ?>			
<div id="reviewscroller_<?php echo $module; ?>" class="scroller" style="max-width:1200px;margin:0 auto">
<?php if ($reviews) { ?>
	<ul class="jcarousel-skin-opencart scroller">
		<?php foreach ($reviews as $review) { ?>
			<li>
					<?php if ($show_image =='1') { ?><a style="" href="<?php echo $review['href']; ?>"><img src="<?php echo $review['image']; ?>"></a><?php } ?>
					<p><span class="review-t"><?php echo $review['text']; ?></span><?php if ($show_nick =='1') { ?><span class="author"><?php echo $review['author']; ?></span><?php } ?><?php if ($show_date =='1') { ?><span class="date"><?php echo $review['date']; ?></span><?php } ?><?php if ($show_rate =='1') { ?><img src="catalog/view/theme/default/image/stars-<?php echo $review['rating']; ?>.png" class="rating" /><?php } ?></p>
			</li>
		<?php } ?>
	</ul>
<?php } else { echo $no_reviews; }?>
</div>
<?php if ($show_link =='1') { ?><a class="show_link load-more-button buttons" href="<?php echo $all_reviews; ?>"><?php echo $text_seeall; ?></a><?php } ?>
<script type="text/javascript">
jQuery.easing['Effect']=function(p,t,b,c,d){
t /= d;
	t--;
	return -c * (t*t*t*t - 1) + b;
};
</script>
<script><!--
function mycarousel_initCallback(carousel)
{
	<?php if ($disableauto) {?>
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });
	<?php } ?>
	
	<?php if ($hoverpause) {?>
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });<?php } ?>
};
//--></script>

<script><!--
$('#reviewscroller_<?php echo $module; ?> ul').jcarousel({
vertical: false,
initCallback: mycarousel_initCallback,
visible: <?php $detect = new Mobile_Detect(); { ?><?php if ($detect->isMobile() || $detect->isTablet()){ ?>1<?php } else { ?><?php echo $visible; ?><?php } ?><?php } ?>,
scroll: <?php echo $scroll; ?>,
auto: <?php echo $autoscroll; ?>,
//easing: 'Effect',
animation: <?php echo $animationspeed; ?>,
<?php echo $type; ?>
});
//--></script>
<script>
jQuery(document).ready(function(){
jQuery('.spoiler-body_<?php echo $module; ?>').hide()
jQuery('.spoiler-exp_<?php echo $module; ?>').click(function(){
jQuery(this).next().fadeToggle()
jQuery(this).hide()
})
})
</script>
</section>