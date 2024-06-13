<div class="box">
<div class="box-content">
<div class="box-news">
<h2><?php echo $heading_title; ?></h2>
<div class="box-news-items">
<?php foreach ($news as $article) { ?>
<div>
<div class="left">
<?php if ($article['thumb']) { ?>
<div class="image"><a href="<?php echo $article['href']; ?>"><img src="<?php echo $article['thumb']; ?>" title="<?php echo $article['name']; ?>" alt="<?php echo $article['name']; ?>" /><span><?php echo $article['name']; ?></span></a></div>
<?php } else { ?>
<div class="image"><a href="<?php echo $article['href']; ?>"><img src="<?php echo $article['no_image']; ?>" title="<?php echo $article['name']; ?>" alt="<?php echo $article['name']; ?>" /><span><?php echo $article['name']; ?></span></a></div>
<?php } ?>
</div>
<div class="right">
<div class="data-news"><span class="date-available"><?php echo $article['date_available']; ?></span></div>
<p class="description"><?php echo $article['description']; ?></p>
</div>
<div class="info-block">
<div class="viewed" title=""><?php echo $article['viewed']; ?></div>
</div>		  
</div>
<?php } ?>
</div>
<a href="/blog/" class="all-news">Все статьи</a>
</div>
</div>
</div>