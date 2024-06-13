</div>
<?php $detect = new Mobile_Detect(); { ?>
<div id="footer">
<?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?><?php } else { ?><div class="columns">
<?php if ($informations) { ?>
<?php if ($detect->isMobile() && !$detect->isTablet()){ ?>
<?php } else { ?>
<div class="column first">
<h3><?php echo $text_information; ?></h3>
<ul>
<li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
<li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
<li><a href="/manuals/">Инструкции</a></li>
<?php foreach ($informations as $information) { ?><li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li><?php } ?>
</ul>
</div>
<?php } ?>
<?php } ?>
<?php if ($contact_display) { ?>
<div class="column">
<h3><?php echo $text_address; ?></h3>
<div class="address-box">
<?php if ($contact_telephone) { ?><div class="phone"><?php echo $contact_telephone; ?></div><p style="color:#171717;margin:0">Звонок бесплатный. Круглосуточно</p><?php } ?>
<?php if ($contact_mobile_telephone) { ?><div class="phone-additional"><?php echo $contact_mobile_telephone; ?></div><?php } ?>
<?php if ($contact_address) { ?><div class="address"><?php echo $contact_address; ?></div><?php } ?>
<?php if ($contact_email) { ?><div class="email-address"><?php echo $contact_email; ?></div><?php } ?>
<?php if ($contact_fax) { ?><div class="fax"><?php echo $contact_fax; ?></div><?php } ?>
</div>
</div>
<?php } ?>
</div><?php } ?>
<div id="footer-bottom"><div class="<?php echo $powered_copyright; ?>"><div class="year"><?php echo $powered; ?></div><div class="pays"><?php echo $text_pays; ?></div></div></div>

<!--MICRODATA-->
<?php if($_SERVER['REQUEST_URI']=='/' || $_SERVER['REQUEST_URI']==false) { ?>
<span itemscope itemtype='https://schema.org/Store'>
<meta itemprop='name' content='<?php echo $this->config->get('schemaorg_home_name'); ?>'>
<meta itemprop='logo' content='<?php echo $home; ?>image/data/logo.png'>
<link itemprop='url' href='<?php echo $home; ?>' >
<meta itemprop='description' content='<?php echo $this->config->get('schemaorg_home_description'); ?>' >
<span itemprop='address' itemscope itemtype='https://schema.org/PostalAddress'>
<meta itemprop='addressCountry' content='<?php echo $this->config->get('schemaorg_home_addresscountry'); ?>'>
<meta itemprop='addressLocality' content='<?php echo $this->config->get('schemaorg_home_addresslocality'); ?>'>
<meta itemprop='streetAddress' content='<?php echo $this->config->get('schemaorg_home_streetaddress'); ?>'>
</span>
<span itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
<img itemprop="image" src="/image/data/logo.png" style="display:none" />
<meta itemprop="width" content="auto">
<meta itemprop="height" content="auto">
</span>
<meta itemprop='telephone' content='<?php echo $this->config->get('schemaorg_home_telephone'); ?>'>
<meta itemprop='email' content='<?php echo $this->config->get('schemaorg_home_email'); ?>'>
<meta itemprop='openingHours' content='<?php echo $this->config->get('schemaorg_home_openinghours_days'); ?> <?php echo $this->config->get('schemaorg_home_openinghours_time'); ?>'>
</span>
<?php } ?>
<!--MICRODATA-->

</div>
<?php if ($webme_18yo_status) { ?>
<div id="webme_18yo_modal_container"></div>
<script>
	$(function() {
		$('#webme_18yo_modal_container').load('index.php?route=module/webme_18yo/modal');
	});
	</script>
<?php } ?>
<?php
date_default_timezone_set('Europe/Moscow');
$hours_range = array('21','22','23','00','01','02','03','04','05','06','07','08');
$ct = date('H');
$in_range = false;
$link_attr = '';
if(in_array($ct,$hours_range)) {
	$in_range = true;
	$link_attr = 'cback_off';
}
?>
<div id="cback-form-overlay" data-overlay=""></div>
<a href="javascript:void(0);" data-modal="cback-id" class="cback-form-open" id="popup__toggle" onclick="return false;"><div class="circlephone" style="transform-origin: center;"></div><div class="circle-fill" style="transform-origin: center;"></div><div class="img-circle" style="transform-origin: center;"><div class="img-circleblock <?php echo $link_attr;?>" style="transform-origin: center;"></div></div></a>
<div id="cback-id" class="cback-form-box">
<div class="title">Вам перезвонить?</div>
<div id="cback-form">
<p class="cdesc">Оставьте телефон и мы скоро Вам перезвоним.</p>

<form method="get" name="form-1">
<input name="title" type="hidden" value="Заказ обратного звонка">
<input class="input-medium focused name-field" name="name" type="text" value="" autocomplete="off" placeholder="Ваше имя">
<input autocomplete="off" class="input-medium focused phone-field" id="cph" name="tell" data-mask="+7 (___) ___ ____" placeholder="+7 (___) ___ ____" type="text" value="" />
<input class="feedback btn btn-block btn-large btn-success" name="send" type="button" value="Отправить">	
<p class="policy">Отправляя данные вы принимаете <a href="/politika-konfidencialnosti/">Условия соглашения</a></p>
</form>

</div>
<div class="cback-form-cls"></div>
</div>
<?php if ($detect->isMobile() && !$detect->isTablet()){ ?><?php } else { ?><div class="goTop"></div><?php } ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/zoom.css?v=<?php echo time();?>" /><script src="catalog/view/javascript/cloud-zoom.1.0.2.js"></script><script src="catalog/view/javascript/jquery/prettyPhoto/jquery.prettyPhoto.js"></script><script src="catalog/view/javascript/jquery/cback-form/am.js"></script><script src="catalog/view/javascript/jquery/cback-form/jgrowl.js"></script>
<?php } ?>
<script>
$('.accordion-item .heading').on('click', function(e) {
    e.preventDefault();
    if($(this).closest('.accordion-item').hasClass('active')) {
        $('.accordion-item').removeClass('active');
    } else {
        $('.accordion-item').removeClass('active');
        $(this).closest('.accordion-item').addClass('active');
    }
    var $content = $(this).next();
    $content.slideToggle(100);
    $('.accordion-item .acc-content').not($content).slideUp('fast');
});
$(function(){$('#cph, #cph2, #cph3, #checkout_customer_main_telephone').mask("+0 (000) 000-00-00", {placeholder: "+_ (___) ___ __ __"});});
</script>
<?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?>
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/css/suggestions.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@20.3.0/dist/js/jquery.suggestions.min.js"></script>

<script>
    $("#checkout_customer_main_address_1").suggestions({
        token: "1bddab4faa34a5abb376822e6227ed911a851fae",
        type: "ADDRESS",
        /* Вызывается, когда пользователь выбирает одну из подсказок */
        onSelect: function(suggestion) {
            console.log(suggestion);
        }
    });
</script>
<?php } else { ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'lIjXUTGG0k';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<?php } ?>
			<?php 
			if($tag_params) echo $tag_params;
			if($remarketing_code) echo $remarketing_code;
			?>

<script type='text/javascript'>
$('a.ozon,a.ali').click(function() {

    $.ajax({
        url: 'index.php?route=common/footer/click_counter',
        type: 'post',
        data: 'href=' + $(this).attr('href'),
        dataType: 'json',
        success: function(json) {
            console.log(json);
        }
    });

});
</script>

</body>
</html>