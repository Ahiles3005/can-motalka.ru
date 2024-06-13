<?php echo $header; ?>
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
<div id="wrapper" style="position:relative">
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="main-content white">
  <div class="news-info">
  <div class="info-news"><span class="viewed"><?php echo $viewed; ?></span><span class="date-available"><?php echo $date_available; ?></span><?php if ($tags) { ?>,<?php } ?>
  <?php if ($tags) { ?>
  <div class="tags">
    <?php for ($i = 0; $i < count($tags); $i++) { ?>
    <?php if ($i < (count($tags) - 1)) { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } else { ?>
    <a href="<?php echo $tags[$i]['href']; ?>"><?php echo $tags[$i]['tag']; ?></a>
    <?php } ?>
    <?php } ?>
  </div>
  <?php } ?>
  </div>
  <?php if ($products || ($ozon || $ali)) { ?>
    <div class="related-box-product news-product">
	  <?php foreach ($products as $product) { ?>
		<div>
		  <?php if ($product['thumb']) { ?>
			<div class="image-related"><?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 3500) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
		  <?php } else { ?>
			<div class="image-related"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
		  <?php } ?>
		  <div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' )."..."; } ?></a></div>	  
		  
		  <?php if ($product['price']) { ?>
			<div class="price-related">
			  <?php if (!$product['special']) { ?>
			  <?php echo $product['price']; ?>
			  <?php } else { ?>
			  <span class="price-old-related"><?php echo $product['price']; ?></span> <span class="price-new-related"><?php echo $product['special']; ?></span>
			  <?php } ?>
			</div>
		  <?php } ?>
		  <div class="cart-related">
			<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button"><?php echo $button_cart; ?></a>
		  </div>
		</div>
	  <?php } ?>
<div class="my_floating_buttons">
		<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" />
		<?php if ($ozon) { ?>
			<a href="<?php echo $ozon; ?>" class="btns prod-cart ozon" target="_blank" rel="noopener noreferrer" style="margin:1rem !important">Заказать на OZON</a>
		<?php } else if (isset($products[0]['ozon']) && !empty($products[0]['ozon'])) { ?>
			<a href="<?php echo $product['ozon']; ?>" class="btns prod-cart ozon" target="_blank" rel="noopener noreferrer" style="margin:1rem !important">Заказать на OZON</a>
		<?php } ?>
		<?php if ($ali) { ?>
			<a href="<?php echo $ali; ?>" class="btns prod-cart ali" target="_blank" rel="noopener noreferrer" style="margin:1rem !important">Заказать на AliExpress</a>
		<?php } else if (isset($products[0]['ali']) && !empty($products[0]['ali'])) { ?>
			<a href="<?php echo $product['ali']; ?>" class="btns prod-cart ali" target="_blank" rel="noopener noreferrer" style="margin:1rem !important">Заказать на AliExpress</a>
		<?php } ?>

</div>
	</div>
	<script>$(window).scroll(function(e){$el=$('.related-box-product');if($(this).scrollTop()>300){$el.css({'position':'fixed','top':'50px'});$('.news-info').css({'padding':'111px 0 0 0'});}if($(this).scrollTop()<300){$el.css({'position':'relative','top':'auto'});$('.news-info').css({'padding':'0'})}});</script>
  <?php } ?>  
	  <div class="description news-desc">
		<?php echo $description; ?>
	  </div>
  </div>
  <?php if ($related_news) { ?>
  <h2>Рекомендуем почитать:</h2>
  <div id="news" style="width:100%">
    <div class="news-items">
	  <?php foreach ($related_news as $related_article) { ?>
<div>
<?php if ($related_article['thumb']) { ?>
          <div class="image"><a href="<?php echo $related_article['href']; ?>"><img src="<?php echo $related_article['thumb']; ?>" alt="<?php echo $related_article['name']; ?>" /></a></div>
<?php } else { ?>
		  <div class="image"><a href="<?php echo $related_article['href']; ?>"><img src="<?php echo $related_article['no_image']; ?>" alt="<?php echo $related_article['name']; ?>" /></a></div>
<?php } ?>
<div class="infos">
<div class="name"><a href="<?php echo $related_article['href']; ?>"><?php echo $related_article['name']; ?></a></div>
<div class="left">
<p class="description"><?php echo $related_article['description_list']; ?></p>
</div>
<div class="right">
<p class="data-news"><?php echo $related_article['date_available']; ?></p>
<p class="viewed"><?php echo $related_article['viewed']; ?></p>
<?php if ($this->config->get('news_comments') == 0) { ?><?php } else { ?><p class="comments"><?php echo $related_article['news_comments']; ?></p><?php } ?>
</div>
</div>		  
</div>
	  <?php } ?>
	  </div>
    </div>
  <?php } ?>
  <?php if ($this->config->get('news_comments') == 0) { ?>
    <?php if ($news_comments) { ?>
      <div id="tab-news-comments" class="tab-content">
		
		<?php if ($guest_news_comment) { ?>
		<h3 id="news-comment-title"><?php echo $text_write; ?></h3>
	<div id="addreview">
	<div class="form-data">
	<input type="text" name="name" value="<?php echo $customer_name; ?>" placeholder="Ваше имя" autocomplete="off" />

    <textarea name="text" cols="40" rows="8" placeholder="Ваш отзыв"></textarea>
	
	</div>
	<div class="form-data2">

    <input type="text" name="captcha" value="" class="w50" placeholder="Код с картинки" autocomplete="off" />
    <img src="index.php?route=product/product/captcha" alt="" id="captcha" />
	<a id="button-review" class="button">Добавить</a>
	</div>
	</div>
	<div id="news-comment"></div>
		<?php } else { ?>
 		  
		<?php } ?>
	  </div>
    <?php } ?>
  <?php } ?>
  </div>
  
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('#news-comment .pagination a').live('click', function() {
	$('#news-comment').fadeOut('slow');
		
	$('#news-comment').load(this.href);
	
	$('#news-comment').fadeIn('slow');
	
	return false;
});			

$('#news-comment').load('index.php?route=news/news/news_comments&news_id=<?php echo $news_id; ?>');

$('#button-review').on('click', function() {
	$.ajax({
		url: 'index.php?route=news/news/write&news_id=<?php echo $news_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#news-comment-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#news-comment-title').after('<div class="warning">' + data['error'] + '</div>');
				setTimeout(function(){$('.warning').css({'left':'-400px','opacity':'0'})},4500);
			}
			
			if (data['success']) {
				$('#news-comment-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'captcha\']').val('');
                var img_src = $("img#captcha").attr("src").replace(/\&rnd=\d*/gi,"");
                var d = Math.floor((Math.random()*10000)+1);
                $("img#captcha").attr("src", img_src+"&rnd="+d);
				setTimeout(function(){$('.success').css({'left':'-400px','opacity':'0'})},4500);
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox"
	});
});
//--></script> 
<script><!--
$('#tabs a').tabs();
//--></script>
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
<style type="text/css">.ytLoader{width:100%;position:relative;overflow:hidden;text-align:center}.play-container{position:absolute;top:0;left:0;width:100%;height:100%;text-align:center;z-index:2}.circle{stroke:#358D28;stroke-dasharray:650;stroke-dashoffset:650;-webkit-transition:all .5s ease-in-out;opacity:.3}.playBut{position:absolute;top:0;left:0;right:0;bottom:0;width:100%;height:100%;margin:auto;display:block;-webkit-transition:all .5s ease}
</style>
</div>
<div class="footer-form">
<form action="" id="f_success" method="get" name="form-4">
<div class="title"><p>Остались вопросы?</span></p></div>

<div class="form"><input name="title" type="hidden" value="Заказ обратного звонка" /> <input autocomplete="off" class="input-medium focused name-field" name="name" placeholder="Ваше имя" type="text" value="" /> <input autocomplete="off" class="input-medium focused phone-field" id="cph3" name="tell" data-mask="+7 (___) ___ ____" placeholder="+7 (___) ___ ____" type="text" value="" /> <input class="feedback btn btn-block btn-large btn-success" name="send" type="button" value=">" /></div>

<div class="desc"><p>Оставьте заявку и получите бесплатную консультацию нашего специалиста</p></div>

<p class="policy">Отправляя данные вы принимаете <a href="/politika-konfidencialnosti/">Условия соглашения</a></p>
</form>
</div>
<?php echo $footer; ?>