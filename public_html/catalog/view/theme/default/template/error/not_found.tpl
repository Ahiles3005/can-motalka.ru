<?php
header ("HTTP/1.1 404 Not Found");
?>
<?php echo $header; ?>
<link rel="stylesheet" href="catalog/view/javascript/jquery/circle-bg/circle-bg.css?v=<?php echo time();?>">
</div>
</div>
<div class="rast-heading">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div class="h1"><h1>404 - этой страницы тут нет...</h1></div>
</div>
<div id="wrapper">
<div id="container">
<div class="page_404">
<canvas id="pixie"></canvas>

<div class="block">
<p class="title-l">Ошибка могла возникнуть по разным причинам:</p>

<ul class="orange-circle">
<li>Возможно, Вы неправильно ввели адрес в адресной строке браузера</li>
<li>Эта страница устарела, либо удалена</li>
<li>Произошла ошибка на сервере, которую мы скоро исправим.</li>
</ul>

<p class="sp2">Вы можете посетить другие разделы сайта, воспользовавшись основным меню. Или перейти на <a href="/">главную страницу</a> сайта</p>

<p class="title-l">А также:</p>

<ul class="orange-circle">
<li><a href="<?php echo $contact; ?>">Узнать наши контакты</a></li>
<li><a href="/dostavka-i-oplata/">Узнать о доставке и оплате</a></li>
<li><a href="/motalki/">Перейти в каталог</a></li>
<li><a href="/manuals/">Почитать инструкции</a></li>
<li><a href="/video-obzor/">Посмотреть видео</a></li>
<li><a href="javascript:void(0);" data-modal="cback-id" class="open-cback-form">Заказать обратный звонок</a></li>
</ul>

</div>
</div>
</div>
<script src="catalog/view/javascript/jquery/circle-bg/circle-bg.js" type="text/javascript"></script>

<?php echo $footer; ?>