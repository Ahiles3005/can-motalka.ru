<?php echo $header; ?>
</div>
<div class="rast-heading <?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?>z-heading<?php } else { ?><?php } ?>">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div class="h1"><h1><?php echo $heading_title; ?></h1></div></div><?php $detect = new Mobile_Detect(); { ?><?php if ($detect->isMobile() && !$detect->isTablet()){ ?><a class="to_order" href="#simplecheckout_customer">Оформить</a>
<script type="text/javascript">
$(document).ready(function() {
$(window).scroll(function(){if($(this).scrollTop()>250){$('.to_order').fadeOut('fast')}else{$('.to_order').fadeIn('fast')}});$('.to_order').click(function(){$("html, body").animate({scrollTop: $($(this).attr("href")).offset().top - 20},{duration: 800,});return false})
});
</script>
<?php } else { ?><?php } ?><?php } ?>
<div class="wrapper">
<div id="content" class="no-bg"><?php echo $content_top; ?>
    <?php if (isset($error_warning)) { ?> 
        <?php if ($error_warning) { ?>
            <div class="warning"><?php echo $error_warning; ?></div>
        <?php } ?>
    <?php } ?>
    
