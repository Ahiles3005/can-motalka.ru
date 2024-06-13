<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/info-pages.css?v=<?php echo time();?>" />
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
<div class="info-pages">
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="info-content"><?php echo $content_top; ?>
<div class="info_page"><?php echo $description; ?></div>
</div>
<script>
function youTubes_makeDynamic() {
var $ytIframes = $('iframe[src*="youtube.com"]');
$ytIframes.each(function (i,e) {
var $ytFrame = $(e);
var ytKey; var tmp = $ytFrame.attr('src').split(/\//); tmp = tmp[tmp.length - 1]; tmp = tmp.split('?'); ytKey = tmp[0];
var $ytLoader = $('<div class="ytLoader">');
$ytLoader.append($('<img class="cover" src="https://i.ytimg.com/vi/'+ytKey+'/hqdefault.jpg">'));
$ytLoader.append($('<div class="play-container"><a href="javascript:void(0);"class="playBut"></a></div>'));
$ytLoader.data('$ytFrame',$ytFrame);
$ytFrame.replaceWith($ytLoader);
$ytLoader.click(function () {
var $ytFrame = $ytLoader.data('$ytFrame');
$ytFrame.attr('src',$ytFrame.attr('src')+'?autoplay=1');
$ytLoader.replaceWith($ytFrame);
});
});
};
$(document).ready(function () {youTubes_makeDynamic()});
</script>
<style type="text/css">.ytLoader{width:100%;position:relative;overflow:hidden;text-align:center}.play-container{position:absolute;top:0;left:0;width:100%;height:100%;text-align:center;z-index:2}.circle{stroke:#358D28;stroke-dasharray:650;stroke-dashoffset:650;-webkit-transition:all .5s ease-in-out;opacity:.3}.playBut{position:absolute;top:0;left:0;right:0;bottom:0;width:100%;height:100%;margin:auto;display:block;transition:all .5s ease}
</style>
</div>
<div>
<div class="bottom"></div>
<?php echo $content_bottom; ?></div>

<style type="text/css">
.info-pages .info-content {
    padding: 50px;
}
</style>

<script>$(function(){$('.in-moscow a').on('click',function(e){$('html,body').stop().animate({scrollTop:$('#razgruz').offset().top},600);e.preventDefault()})});</script>
<div class="footer-form">
<form action="" id="f_success" method="get" name="form-4">
<div class="title"><p>Остались вопросы?</span></p></div>

<div class="form"><input name="title" type="hidden" value="Заказ обратного звонка" /> <input autocomplete="off" class="input-medium focused name-field" name="name" placeholder="Ваше имя" type="text" value="" /> <input autocomplete="off" class="input-medium focused phone-field" id="cph3" name="tell" data-mask="+7 (___) ___ ____" placeholder="+7 (___) ___ ____" type="text" value="" /> <input class="feedback btn btn-block btn-large btn-success" name="send" type="button" value=">" /></div>

<div class="desc"><p>Оставьте заявку и получите бесплатную консультацию нашего специалиста</p></div>

<p class="policy">Отправляя данные вы принимаете <a href="/politika-konfidencialnosti/">Условия соглашения</a></p>
</form>
</div>
<?php echo $footer; ?>