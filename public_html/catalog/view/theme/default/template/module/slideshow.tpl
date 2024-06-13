<?php $detect = new Mobile_Detect(); { ?></div><?php if ($detect->isMobile() && !$detect->isTablet() ){ ?><?php } else { ?>
<div class="slider-block" style="height:550px">
<div class="camera_wrap camera_emboss pattern_1" id="camera_wrap">
<?php foreach ($banners as $banner) { ?>
<div data-src="<?php echo $banner['image']; ?>" data-link="<?php echo $banner['link']; ?>" data-fx="<?php echo $banner['color']; ?>" data-time="<?php echo $banner['fontcolor']; ?>" data-transPeriod="<?php echo $banner['align_top']; ?>">
<?php echo html_entity_decode($banner['title'], ENT_QUOTES, 'UTF-8'); ?>
</div>
<?php } ?>
</div>
</div>
<script>jQuery(function(){ jQuery('#camera_wrap').camera({ autoplay: true, mobileAutoAdvance: false, height : 'auto', loader: 'pie', pieDiameter	: 40, piePosition : 'leftBottom', pagination: true, thumbnails: false, hover: true, opacityOnGrid: false, loaderColor	: '#358D28', loaderBgColor : '#fff', loaderPadding : 2, navigationHover	: false, playPause : false, time : 12000, transPeriod : 800, imagePath: '../image/data/slider-folder/' });});</script><?php } ?><?php } ?>