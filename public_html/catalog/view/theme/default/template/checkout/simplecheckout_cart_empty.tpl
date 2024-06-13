<?php 
$simple_page = '';
include $simple->tpl_header();
include $simple->tpl_static();
?>
<div class="page_404">

<div class="block">
<p class="title-l">В корзине совершенно пусто</p>

<p class="sp2">Вы можете посетить другие разделы сайта, воспользовавшись основным меню. Или перейти на <a href="/">главную страницу</a> сайта</p>

<p class="title-l">А также:</p>

<ul class="orange-circle">
<li><a href="/motalki/">Перейти в каталог</a></li>
<li><a href="/video-obzor/">Посмотреть видео</a></li>
<li><a href="/manuals/">Почитать инструкции</a></li>
<li><a href="/contact/">Узнать наши контакты</a></li>
<li><a href="/dostavka-i-oplata/">Узнать о доставке и оплате</a></li>
<li><a href="javascript:void(0);" data-modal="cback-id" class="open-cback-form">Заказать обратный звонок</a></li>
</ul>

</div>
</div>
<div class="cart-empty-btn"><a href="<?php echo $continue; ?>" class="button">На главную</a></div>
<style>#fixpan, #header, #menu, #footer .columns {display:none}#footer{padding:0}.rast-heading{margin:0}.to_order{display:none!important}.breadcrumb{margin:0 20px 0}.page_404{min-height:450px;height:auto}.page_404 .breadcrumb{position:relative)}.page_404 .block{position:relative;width:60%;min-height:300px;height:auto;margin:30px 0;padding:30px;background:rgba(255,255,255,.8);z-index:1;overflow:hidden}.page_404 .block a{color:#000;text-decoration:underline}.page_404 .block a:hover{color:#358D28}.page_404 .block p,.page_404 .block ul{position:relative}.page_404 .block:before{position:absolute;font-family:Montserrat, sans-serif;content:"empty";top:-120px;left:-50px;width:100%;height:100%;font-size:230px;color:rgba(150,150,150,.2)}</style>

<?php include $simple->tpl_footer() ?>