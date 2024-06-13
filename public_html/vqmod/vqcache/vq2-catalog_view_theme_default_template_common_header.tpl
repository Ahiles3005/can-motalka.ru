<!DOCTYPE html>
				<html prefix='og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# product: http://ogp.me/ns/product#'
			 dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>"><head><meta charset="UTF-8" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NCGKNDX');</script>
<!-- End Google Tag Manager -->
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE"><title><?php echo $title; ?></title><meta property="og:type" content="website"><meta property="og:site_name" content="Can-Motalka"><meta property="og:locale" content="ru_RU"><meta property="og:title" content="<?php echo $title; ?>" /><base href="<?php echo $base; ?>" /><?php if ($robots) { ?><meta name="robots" content="<?php echo $robots; ?>" /><?php } ?><?php if ($description) { ?><meta name="description" content="<?php echo $description; ?>" /><meta property="og:description" content="<?php echo $description; ?>" /><?php } ?><?php if($_SERVER['REQUEST_URI']=='/' || $_SERVER['REQUEST_URI']==false) { ?><meta property="og:url" content="<?php echo $home; ?>"><meta property="og:image" content="<?php echo $home; ?>image/data/og/og_home.jpg" /><?php } else { ?><?php if ($ogimage) { ?><meta property="og:image" content="<?php echo $ogimage; ?>" /><?php } ?><?php } ?><?php if ($ogurl) { ?><meta property="og:url" content="<?php echo $ogurl; ?>" /><?php } ?><?php if ($keywords) { ?><meta name="keywords" content="<?php echo $keywords; ?>" /><?php } ?><?php foreach ($links as $link) { ?><link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" /><?php } ?><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"><link rel="apple-touch-icon" sizes="57x57" href="/image/web-favicons/apple-touch-icon-57x57.png"><link rel="apple-touch-icon" sizes="60x60" href="/image/web-favicons/apple-touch-icon-60x60.png"><link rel="apple-touch-icon" sizes="72x72" href="/image/web-favicons/apple-touch-icon-72x72.png"><link rel="apple-touch-icon" sizes="76x76" href="/image/web-favicons/apple-touch-icon-76x76.png"><link rel="apple-touch-icon" sizes="114x114" href="/image/web-favicons/apple-touch-icon-114x114.png"><link rel="apple-touch-icon" sizes="120x120" href="/image/web-favicons/apple-touch-icon-120x120.png"><link rel="apple-touch-icon" sizes="144x144" href="/image/web-favicons/apple-touch-icon-144x144.png"><link rel="apple-touch-icon" sizes="152x152" href="/image/web-favicons/apple-touch-icon-152x152.png"><link rel="apple-touch-icon" sizes="180x180" href="/image/web-favicons/apple-touch-icon-180x180.png"><link rel="icon" type="image/png" href="/image/web-favicons/favicon-32x32.png" sizes="32x32"><link rel="icon" type="image/png" href="/image/web-favicons/android-chrome-192x192.png" sizes="192x192"><link rel="icon" type="image/png" href="/image/web-favicons/favicon-96x96.png" sizes="96x96"><link rel="icon" type="image/png" href="/image/web-favicons/favicon-16x16.png" sizes="16x16"><link rel="manifest" href="/image/web-favicons/manifest.json"><link rel="shortcut icon" type="image/x-icon" href="/image/web-favicons/favicon.ico"><meta name="apple-mobile-web-app-title" content="null"><meta name="application-name" content="null"><meta name="msapplication-TileColor" content="#00a300"><meta name="msapplication-TileImage" content="/image/web-favicons/mstile-144x144.png"><meta name="msapplication-config" content="/image/web-favicons/browserconfig.xml"><meta name="theme-color" content="#ffffff"><link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/style.css?v=<?php echo time();?>" /><?php $detect = new Mobile_Detect(); { ?><?php if ($detect->isMobile() || $detect->isTablet()){ ?><link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/style-m.css?v=<?php echo time();?>" /><?php } else { ?><?php } ?><?php foreach ($styles as $style) { ?><link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" /><?php } ?><script src="catalog/view/javascript/common.js?v=<?php echo time();?>"></script><?php foreach ($scripts as $script) { ?><script src="<?php echo $script; ?>"></script><?php } ?>
<?php
if ( maxsite_testIE() ) {
  echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie7-9.css" />';
}
?><?php
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];
if ( $url == '/obshaya-instrukciya/' ) {
  echo "<meta name='robots' content='noindex, nofollow' />";
}
?>

<?php
if ( maxsite_test1011IE() ) {
  echo '<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/ie1011.css" />';
}
?>
<?php if ($stores) { ?>
<script type="text/javascript"><!--
$(document).ready(function() {
<?php foreach ($stores as $store) { ?>
$('body').prepend('<iframe src="<?php echo $store; ?>" style="display: none;"></iframe>');
<?php } ?>
});
//--></script>
<?php } ?>
<?php if ($detect->isMobile() || $detect->isTablet()){ ?><?php } else { ?><style>::-webkit-scrollbar-button{background-image:url();background-repeat:no-repeat;width:6px;height:0}::-webkit-scrollbar-track{background-color:#f1f1f1;box-shadow:0 0 3px #ccc inset}::-webkit-scrollbar-thumb{-webkit-border-radius:5px;border-radius:5px;background-color:green;box-shadow:0 1px 1px #fff inset;background-image:url(../image/59610063.png);background-position:center;background-repeat:no-repeat}::-webkit-resizer{background-image:url();background-repeat:no-repeat;width:7px;height:0}::-webkit-scrollbar{width:11px}</style><?php } ?>
<?php echo $google_analytics; ?>
</head>

<?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?><?php } else { ?>
				<?php if(!empty($css_phone)){ ?>
				<div class="header-banner" style="<?php if ($phone_img) { ?>background-image:url(<?php echo $phone_img; ?>);background-size:cover;background-repeat:no-repeat;<?php } ?> <?php if ($extra_img1) { ?>background-image:url(<?php echo $extra_img1; ?>) !important;background-size:50px !important;background-repeat:repeat !important;<?php } ?> <?php if ($extra_text1) { ?>background-color:<?php echo $extra_text1; ?>;<?php } ?><?php if(!empty($phone_img || $extra_img1 || $extra_text1)){ ?><?php } else { ?>background: -webkit-linear-gradient(90deg,hsla(112.28,55.8%,35.49%,1) 0%,hsla(112.28,55.8%,35.49%,0) 100%),-webkit-linear-gradient(35deg,hsla(112.28,65.44%,44.54%,1) 100%,hsla(112.28,65.44%,44.54%,0) 78%);background: linear-gradient(360deg,hsla(112.28,55.8%,35.49%,1) 0%,hsla(112.28,55.8%,35.49%,0) 100%),linear-gradient(55deg,hsla(112.28,65.44%,44.54%,1) 100%,hsla(112.28,65.44%,44.54%,0) 78%)<?php } ?>">
				<div class="banner-content">
					<div <?php if ($extra_text1_css) { ?><?php } else { ?>style="flex-basis:100%;"<?php } ?>><p <?php if ($extra_text0) { ?>style="color:<?php echo $extra_text0; ?>"<?php } ?>><?php echo $css_phone; ?></p><?php if ($extra_text3) { ?><p <?php if ($extra_text0) { ?>style="color:<?php echo $extra_text0; ?>"<?php } ?>><?php echo $extra_text3; ?></p><?php } ?></div>
					<?php if ($extra_text1_css) { ?><div><a href="<?php echo $extra_text2; ?>" style="<?php if ($extra_text2_css) { ?>background:<?php echo $extra_text2_css; ?>;<?php } else { ?>background:#0F0F0F;<?php } ?> <?php if ($extra_text3_css) { ?>color:<?php echo $extra_text3_css; ?>;<?php } ?>"><?php echo $extra_text1_css; ?></a></div><?php } ?>
				</div>
				</div>
<style>
#scrollfix{top:175px}#fixpan,#header{top:50px}.rast-heading{margin:226px 0 0}.header-banner{width:100%;height:50px;position:absolute;top:0;left:0;z-index:2222;margin:0}.header-banner div.banner-content{width:1200px;margin:0 auto;height:100%;display:flex;flex-direction:row;align-items:center;justify-content:center;flex-wrap:wrap}.header-banner div.banner-content div{flex-basis:70%;height:100%;text-align:left}.header-banner div.banner-content div+div{flex-basis:30%;text-align:left}.header-banner div.banner-content div>p{margin:0;padding:8px 0 0 0;font-size:18px;line-height:20px;font-weight:700;color:#fff;text-shadow:0 0 5px rgba(0,0,0,.3)}.header-banner div.banner-content div>p+p{padding:0;line-height:13px;font-size:13px;font-weight:500}.header-banner div.banner-content div>a{line-height:50px;margin:0;padding:8px 25px;border-radius:8px;color:#fff;font-size:16px;font-weight:500}.header-banner div.banner-content div>a:hover{box-shadow:inset 0 -35px 0 0 rgba(0,0,0,.3)}@media screen and (max-width:1400px){.header-banner div.banner-content{width:1200px}}@media screen and (min-width:1401px){.header-banner div.banner-content{width:1300px}}@media screen and (min-width:1421px){.header-banner div.banner-content{width:1400px}}@media screen and (max-width:767px){.header-banner div.banner-content{width:100%}.header-banner div.banner-content div>p{font-size:1.4em;line-height:1.2}.header-banner div.banner-content div>p+p{line-height:1;font-size:1em}.header-banner div.banner-content div>a{padding:8px 20px;color:#fff;font-size:1.2em}.rast-heading{margin:50px 0 2em}#fixpan,#header{top:0}.header-banner{top:45px;height:auto;padding:0 10px 10px 10px;z-index:1000}.home-page h1{margin:5.8em auto 1em}}
</style>
<script>
$(document).ready(function(){
$(window).scroll(function(e){$el=$('#scrollfix');if($(this).scrollTop()>175){$el.css({'position':'fixed','top':'0','border-bottom':'1px solid #aaa'});$('#scrollfix > div .phone').css({'opacity':'1'});}if($(this).scrollTop()<175){$el.css({'position':'absolute','top':'175px','border-bottom':'1px solid transparent'});$('#scrollfix > div .phone').css({'opacity':'0'})}});
});
</script>
<?php } else { ?>
<script>
$(document).ready(function(){
$(window).scroll(function(e){$el=$('#scrollfix');if($(this).scrollTop()>125){$el.css({'position':'fixed','top':'0','border-bottom':'1px solid #aaa'});$('#scrollfix > div .phone').css({'opacity':'1'});}if($(this).scrollTop()<125){$el.css({'position':'absolute','top':'125px','border-bottom':'1px solid transparent'});$('#scrollfix > div .phone').css({'opacity':'0'})}});
});
</script>
<?php } ?>	
<?php } ?>				
				
				
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NCGKNDX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="landing-modal-overlay" data-overlay=""></div>
<?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?><?php } else { ?><div id="fixpan">
<div>
<?php if ($detect->isMobile() && !$detect->isTablet()){ ?>
<?php } else { ?>
<p class="slogan">Производство и продажа приборов для самостоятельного увеличения пробега по всей России</p>
<div class="rightpan"><?php echo $cart; ?></div>
<?php } ?>
</div>
</div>
<?php } ?>
<div id="header" <?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?>style="display:none"<?php } else { ?><?php } ?>>
<div>
<a class="logo" href="<?php echo $home; ?>" title="<?php echo $name; ?>"><img src="/image/data/logo.png" alt="крутилка спидометра моталка спидометра"></a>
<?php if ($detect->isMobile() && !$detect->isTablet()){ ?><?php } else { ?><div class="phone"><div class="work-time">Ежедневно<br />с 8.00 до 23.00</div><?php if (($contacts_display == 'header') || ($contacts_display == 'header_footer')) { ?><div><?php echo $contacts_telephone; ?><span>Звонок бесплатный. Круглосуточно</span></div><?php if ($contacts_mobile_telephone) { ?><div><?php echo $contacts_mobile_telephone; ?><span>Viber, Whatsapp</span></div><?php } ?><?php } ?></div><?php } ?>
</div>
</div>
<?php if($_SERVER['REQUEST_URI']=='/zakaz/' || $_SERVER['REQUEST_URI']==false) { ?><?php } else { ?>
<?php if ($detect->isMobile() || $detect->isTablet()){ ?>
<?php foreach ($modules as $module) { ?>
<?php echo $module; ?>
<?php } ?>
<?php } else { ?>
<div id="scrollfix">
<div>

<? if($use_megamenu) {?>
<nav id="menu" class="megamenu-menu navbar">
<ul class="nav navbar-nav">
<?php foreach ($items as $item) { ?>
<?php if ($item['children']) { ?>
<li class="dropdown">
<a href="<?php echo $item['href']; ?>" <?php if($item['use_target_blank'] == 1) { echo 'target="_blank" ';}?>class="a<?php echo md5($item['name']); ?> <?php if($item['use_target_blank'] == 0) { echo 'dropdown-toggle dropdown-img" ';}?>  <?if($item['thumb']){?> style="background-image: url('<?=$item['thumb']?>');background-size: 25px;background-repeat: no-repeat;background-position: 8px center;padding-left: 40px;"<?}?>><?php echo $item['name']; ?></a>	
<?if($item['type']=="category"){?>
<?if($item['subtype']=="simple"){?>
<div class="dropdown-menu megamenu-type-category-simple">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<ul class="list-unstyled megamenu-haschild">
<?php foreach ($children as $child) { ?>
<li class="<?if(count($child['children'])){?> megamenu-issubchild<?}?> megamenu-issubchild-item"><a href="<?php echo $child['href']; ?>" class="simple-header"><?php echo $child['name']; ?></a>
<?if(count($child['children'])){?>
<ul class="list-unstyled megamenu-ischild megamenu-ischild-simple">
<?php foreach ($child['children'] as $subchild) { ?>
<li><a href="<?php echo $subchild['href']; ?>"><?php echo $subchild['name']; ?></a></li>				
<?}?>
</ul>
<?}?>				
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>	
<?}?>
<?if($item['type']=="category"){?>
<?if($item['subtype']=="full"){?>
<div class="dropdown-menu megamenu-type-category-full megamenu-bigblock">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<?if($item['add_html']){?>
<div style="" class="menu-add-html">
<?=$item['add_html'];?>
</div>
<?}?>
<ul class="list-unstyled megamenu-haschild">
<?php foreach ($children as $child) { ?>
<li class="megamenu-parent-block<?if(count($child['children'])){?> megamenu-issubchild<?}?>"><a class="megamenu-parent-title" href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
<?if(count($child['children'])){?>
<ul class="list-unstyled megamenu-ischild">
<?php foreach ($child['children'] as $subchild) { ?>
<li><a href="<?php echo $subchild['href']; ?>"><?php echo $subchild['name']; ?></a></li>				
<?}?>
</ul>
<?}?>				
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>	
<?}?>
<?if($item['type']=="category"){?>
<?if($item['subtype']=="full_image"){?>
<div class="dropdown-menu megamenu-type-category-full-image megamenu-bigblock">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<?if($item['add_html']){?>
<div style="" class="menu-add-html">
<?=$item['add_html'];?>
</div>
<?}?>
<script>
            (function($) {
                $(function() {
                    $('#columns-ul').autocolumnlist({
                        columns: 5,
                        classname: 'col'
                    });
                })
            })(jQuery)
</script>
<ul id="columns-ul" class="list-unstyled megamenu-haschild">
<?php foreach ($children as $child) { ?>
<li class="megamenu-parent-block<?if(count($child['children'])){?> megamenu-issubchild<?}?>">
<a class="megamenu-parent-img" href="<?php echo $child['href']; ?>"><img src="<?php echo $child['thumb']; ?>" alt="" title=""/>
<span><?php echo $child['name']; ?></span></a>
<?if(count($child['children'])){?>
<ul class="list-unstyled megamenu-ischild">
<?php foreach ($child['children'] as $subchild) { ?>
<li><a href="<?php echo $subchild['href']; ?>"><?php echo $subchild['name']; ?></a></li>				
<?}?>
</ul>
<?}?>				
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>	
<?}?>
<?if($item['type']=="html"){?>
<div class="dropdown-menu megamenu-type-html">
<div class="dropdown-inner">
<ul class="list-unstyled megamenu-haschild">
<li class="megamenu-parent-block<?if(count($child['children'])){?> megamenu-issubchild<?}?>">
<div class="megamenu-html-block">				
<?=$item['html']?>
</div>
</li>
</ul>
</div>            
</div>
<?}?>
<?if($item['type']=="manufacturer"){?>
<div class="dropdown-menu megamenu-type-manufacturer <?if($item['add_html']){?>megamenu-bigblock<?}?>">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<?if($item['add_html']){?>
<div style="" class="menu-add-html">
<?=$item['add_html'];?>
</div>
<?}?>
<ul class="list-unstyled megamenu-haschild <?if($item['add_html']){?>megamenu-blockwithimage<?}?>">
<?php foreach ($children as $child) { ?>
<li class="megamenu-parent-block">
<a class="megamenu-parent-img" href="<?php echo $child['href']; ?>"><img src="<?php echo $child['thumb']; ?>" alt="" title="" /></a>
<a class="megamenu-parent-title" href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>
<?if($item['type']=="information"){?>
<div class="dropdown-menu megamenu-type-information <?if($item['add_html']){?>megamenu-bigblock<?}?>">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<?if($item['add_html']){?>
<div style="" class="menu-add-html">
<?=$item['add_html'];?>
</div>
<?}?>
<ul class="list-unstyled megamenu-haschild <?if($item['add_html']){?>megamenu-blockwithimage<?}?>">
<?php foreach ($children as $child) { ?>
<li class=""><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>
<?if($item['type']=="product"){?>
<div class="dropdown-menu megamenu-type-product <?if($item['add_html']){?>megamenu-bigblock<?}?>">
<div class="dropdown-inner">
<?php foreach (array_chunk($item['children'], ceil(count($item['children']) / 1)) as $children) { ?>
<?if($item['add_html']){?>
<div style="" class="menu-add-html">
<?=$item['add_html'];?>
</div>
<?}?>
<ul class="list-unstyled megamenu-haschild <?if($item['add_html']){?>megamenu-blockwithimage<?}?>">
<?php foreach ($children as $child) { ?>
<li class="megamenu-parent-block">
<a class="megamenu-parent-img" href="<?php echo $child['href']; ?>"><img src="<?php echo $child['thumb']; ?>" alt="" title="" /></a>
<a class="megamenu-parent-title" href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
<div class="dropprice">
<?if($child['special']){?><span><?}?><?php echo $child['price']; ?><?if($child['special']){?></span><?}?><?php echo $child['special']; ?>
</div>				
</li>
<?php } ?>
</ul>
<?php } ?>
</div>            
</div>
<?}?>
<?if($item['type']=="auth"){?>
<div class="dropdown-menu megamenu-type-auth">
<div class="dropdown-inner">
<ul class="list-unstyled megamenu-haschild">
<li class="megamenu-parent-block<?if(count($child['children'])){?> megamenu-issubchild<?}?>">
<div class="megamenu-html-block">				
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="auth_login">
<label class="control-label" for="input-email"><?php echo $entry_email; ?></label>
<input type="text" name="email" value="" placeholder="<?php echo $entry_email; ?>" id="input-email" class="form-control" />
</div>  
<div class="auth_pass">
<label class="control-label" for="input-password"><?php echo $entry_password; ?></label>
<input type="password" name="password" value="" placeholder="<?php echo $entry_password; ?>" id="input-password" class="form-control" />
</div>	
<div class="auth_links">
<a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a>
<a href="<?php echo $register; ?>"><?php echo $text_register; ?></a>
</div>	
<input type="submit" value="<?php echo $button_login; ?>" class="button" />
</form>
</div>
</li>
</ul>
</div>            
</div>
<?}?>
</li>
<?php } else { ?>
<li><a href="<?php echo $item['href']; ?>"><?php echo $item['name']; ?></a></li>
<?php } ?>
<?php } ?>		
</ul>
</nav>
<?}?>
<?php if ($categories && !$use_megamenu) { ?>

<div id="menu">
<ul>
<?php foreach ($categories as $category) { ?>
<li class="dropdown"><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
<?php if ($category['children']) { ?>
<div class="dropdown-block">
<?php for ($i = 0; $i < count($category['children']);) { ?>
<ul>
<?php $j = $i + ceil(count($category['children']) / $category['column']); ?>
<?php for (; $i < $j; $i++) { ?>
<?php if (isset($category['children'][$i])) { ?>
<li class="dropdown-level">
<?php $levels_2 = $this->model_catalog_category->getCategories($category['children'][$i]['category_id']); ?>
<?php if($levels_2) {  ?>
<a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?><span class="parent"></span></a>
<div class="dropdown-block-level">
<ul>
<?php foreach ($levels_2 as $level_2) { ?>
<li><a href="<?php echo $this->url->link('product/category', 'path='.$category['category_id'].'_' . $category['children'][$i]['category_id'] . '_' . $level_2['category_id']); ?>"><?php echo $level_2['name']; ?></a></li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<a href="<?php echo $category['children'][$i]['href']; ?>"><?php echo $category['children'][$i]['name']; ?></a>
<?php } ?>
</li>
<?php } ?>
<?php } ?>
</ul>
<?php } ?>
</div>
<?php } ?>
</li>
<?php } ?>
<?php echo $menu; ?>
</ul>
</div>
<?php } ?><?php } ?>
<?php if ($detect->isMobile() || $detect->isTablet()){ ?><?php } else { ?><span class="phone"><?php echo $contacts_telephone; ?><span>Звонок бесплатный. Круглосуточно</span></span><?php } ?>
</div>
</div>
<?php } ?><!--End-detection-->
<?php } ?><!--End-Mobile_Detect-->
<?php
if ( maxsite_testIE() ) {
  echo '<div class="ie-mess">Похоже, Вы используете устаревшую версию браузера. Пожалуйста, обновите браузер, чтобы воспользоваться всеми функциями сайта!</div>';
}
?>
<div class="clear"></div>
<div id="notification"></div>
<div id="wrapper">