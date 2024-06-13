<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/info-pages.css" />
</div>
<div class="rast-heading">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><span itemprop="name"><?php echo $breadcrumb['text']; ?></span></a> <?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
<?php } ?>
</div>
</div>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
<?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
<?php if($key+1<count($breadcrumbs)) { ?> {
    "@type": "ListItem",
    "position": <?php echo $key+1; ?>,
    "name": "<?php echo $breadcrumb['text']; ?>",
    "item": "<?php echo $breadcrumb['href']; ?>"
  },<?php } else { ?> {
    "@type": "ListItem",
    "position": <?php echo $key+1; ?>,
    "name": "<?php echo $breadcrumb['text']; ?>"
<?php } ?>
<?php } ?>
}]
}
</script>
<div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div class="info-pages contact-page">
<?php if ($cmap) { ?>
<div style="width:100%;height:430px;position:relative">
<div class="load-map">Загрузка карты...</div>
		<?php echo html_entity_decode($cmap); ?>
</div>
<?php } ?>
<?php if ($address || $telephone || $mobi_telephone || $store_email) { ?>
<div class="l960" itemscope itemtype="https://schema.org/Store">
<h2><span itemprop="name"><?php echo $store; ?></span><br />Контактные данные</h2>
<meta itemprop='logo' content='<?php echo $home; ?>image/data/logo.png'>
<table>
<tbody>
		<?php if ($address) { ?>
		<tr>
		<td><?php echo $text_address; ?></td>
        <td itemprop="address"><?php echo $address; ?></td>
		</tr>
		<?php } ?>
        <?php if ($telephone) { ?>
		<tr>
        <td><?php echo $text_telephone; ?></td>
        <td itemprop="telephone" ><?php echo $telephone; ?></td>
		</tr>
        <?php } ?>
		<?php if ($mobi_telephone) { ?>
		<tr>
        <td><?php echo $text_mobi_telephone; ?></td>
        <td itemprop="telephone" ><?php echo $mobi_telephone; ?></td>
		</tr>
        <?php } ?>
		<?php if ($store_email) { ?>
		<tr>
		<td><?php echo $text_email; ?></td>
        <td itemprop="email" ><?php echo $store_email; ?></td>
		</tr>
		<?php } ?>
</tbody>
</table>
</div>
<?php } ?>
<?php if ($compinfo) { ?>
<div class="l960">	
		<?php echo html_entity_decode($compinfo); ?>
</div>
<?php } ?>
<?php if ($contactem) { ?>
<h2>Описание проезда</h2>		
		<div class="l960"><p class="sp2"><?php echo html_entity_decode($contactem); ?></p></div>
<?php } ?>
<h2><?php echo $text_contact; ?></h2>
<div class="l960">	
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<?php if ($error_email || $error_name || $error_enquiry || $error_captcha) { ?><div id="error">Проверьте форму на ошибки</div><?php } ?>
    <div class="contact-form">
    <div>
	<input type="text" name="name" autocomplete="off" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" />
    <?php if ($error_name) { ?>
    <span class="error"><?php echo $error_name; ?></span>
    <?php } ?>
	</div>
	<div>
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email; ?>" />
    <?php if ($error_email) { ?>
    <span class="error"><?php echo $error_email; ?></span>
    <?php } ?>
	</div>
    <div>
    <textarea name="enquiry" placeholder="<?php echo $entry_enquiry; ?>" class="limit"><?php echo $enquiry; ?></textarea>
	<span id="charsLeft"></span>
    <?php if ($error_enquiry) { ?>
    <span class="error"><?php echo $error_enquiry; ?></span>
    <?php } ?>
	</div>
	<div class="last">
	<img src="index.php?route=information/contact/captcha" alt="" /><input type="text" name="captcha" value="<?php echo $captcha; ?>" autocomplete="off" placeholder="<?php echo $entry_captcha; ?>" />
    <?php if ($error_captcha) { ?>
    <span class="error"><?php echo $error_captcha; ?></span>
    <?php } ?>
	</div>
    <input type="submit" value="Отправить" class="btns c-button" />
    <p class="policy text-center">Отправляя данные вы принимаете <a href="/politika-konfidencialnosti/">Условия соглашения</a></p>
    </div>
</form>
</div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="info-content"><?php echo $content_top; ?>
</div>
</div>
<script type="text/javascript">
(function($){$.fn.extend({limit:function(limit,element){var interval,f;var self=$(this);$(this).focus(function(){interval=window.setInterval(substring,100)});$(this).blur(function(){clearInterval(interval);substring()});substringFunction="function substring(){ var val = $(self).val();var length = val.length;if(length > limit){$(self).val($(self).val().substring(0,limit));}";if(typeof element!='undefined')substringFunction+="if($(element).html() != limit-length){$(element).html((limit-length<=0)?'0':limit-length);}";substringFunction+="}";eval(substringFunction);substring()}})})(jQuery);
$(document).ready(function(){				
$('textarea.limit').limit('3000','#charsLeft');			
});
<?php if ($error_email || $error_name || $error_enquiry || $error_captcha) { ?>$(function(){
  $('html, body').animate({
    scrollTop: $('#error').offset().top
  }, 2000);
});<?php } ?>
</script>
<?php echo $footer; ?>