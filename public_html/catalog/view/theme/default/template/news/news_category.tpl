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
<div id="news">
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" style="box-shadow: none"><?php echo $content_top; ?>
    <div class="product-filter">
    <div class="limit"><span>Показывать на страницу: </span>
      <select onchange="location = this.value;">
        <?php foreach ($limits as $limits) { ?>
        <?php if ($limits['value'] == $limit) { ?>
        <option value="<?php echo $limits['href']; ?>" selected="selected"><?php echo $limits['text']; ?></option>
        <?php } else { ?>
        <option value="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></option>
        <?php } ?>
        <?php } ?>
      </select>
    </div>
  </div>

  <?php if ($thumb || $description) { ?>
  <div class="category-info">
    <?php if ($thumb) { ?>
    <div class="image"><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" /></div>
    <?php } ?>
    <?php if ($description) { ?>
    <?php echo $description; ?>
    <?php } ?>
  </div>
  <?php } ?>
  <?php if ($news_categories) { ?>
  <?php if ($view_subcategory == 'images') { ?>
    <div class="box-category">
	  <div class="box-heading-subcategory"><?php echo $text_refine; ?></div>
      <div class="box-subcategory">
	    <?php foreach ($news_categories as $news_category) { ?>
		  <div style="width: <?php echo $sub_width; ?>px;">
		    <?php if ($news_category['thumb']) { ?>
			  <div class="image"><a href="<?php echo $news_category['href']; ?>"><img src="<?php echo $news_category['thumb']; ?>" alt="<?php echo $news_category['name']; ?>" /></a></div>
		    <?php } else { ?>
			  <div class="image"><a href="<?php echo $news_category['href']; ?>"><img src="<?php echo $news_category['no_image']; ?>" alt="<?php echo $news_category['name']; ?>" /></a></div>
		    <?php } ?>
		    <div class="name"><a href="<?php echo $news_category['href']; ?>"><?php echo $news_category['name']; ?></a></div>
			<div class="description-box"><?php echo $news_category['description']; ?></div>
		  </div>
	    <?php } ?>
	  </div>
    </div>
  <?php } ?>
  <?php if ($view_subcategory == 'default') { ?>
    <div class="category-list">
	  <div class="box-category">
	    <div class="box-heading-subcategory"><?php echo $text_refine; ?></div>
        <?php if (count($news_categories) <= 5) { ?>
          <ul>
            <?php foreach ($news_categories as $news_category) { ?>
              <li><a href="<?php echo $news_category['href']; ?>"><?php echo $news_category['name']; ?></a></li>
            <?php } ?>
		  </ul>
	    <?php } else { ?>
		  <?php for ($i = 0; $i < count($news_categories);) { ?>
		    <ul>
			  <?php $j = $i + ceil(count($news_categories) / 4); ?>
			  <?php for (; $i < $j; $i++) { ?>
			    <?php if (isset($news_categories[$i])) { ?>
				  <li><a href="<?php echo $news_categories[$i]['href']; ?>"><?php echo $news_categories[$i]['name']; ?></a></li>
			    <?php } ?>
			  <?php } ?>
		    </ul>
		  <?php } ?>
	    <?php } ?>
	  </div>
	</div>
  <?php } ?>
  <?php } ?>
<?php if ($news) { ?>
<div class="news-items">
<?php foreach ($news as $article) { ?>
<div>
<?php if ($article['thumb']) { ?>
        <div class="image"><a href="<?php echo $article['href']; ?>"><img src="<?php echo $article['thumb']; ?>" alt="<?php echo $article['name']; ?>" /></a></div>
<?php } else { ?>
	    <div class="image"><a href="<?php echo $article['href']; ?>"><img src="<?php echo $article['no_image']; ?>" alt="<?php echo $article['name']; ?>" /></a></div>
<?php } ?>
<div class="infos">
<div class="name"><a href="<?php echo $article['href']; ?>"><?php echo $article['name']; ?></a></div>
<div class="left">
<p class="description"><?php echo $article['description_list']; ?></p>
</div>
<div class="right">
<p class="data-news"><?php echo $article['date_available']; ?></p>
<p class="viewed"><?php echo $article['viewed']; ?></p>
<?php if ($this->config->get('news_comments') == 0) { ?><?php } else { ?><p class="comments"><?php echo $article['news_comments']; ?></p><?php } ?>
</div>
</div>		  
</div>
<?php } ?>
</div>

  <div class="pagination"><?php echo $pagination; ?></div>
  <?php } ?>
  <?php if (!$news_categories && !$news) { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  </div>
  <div class="bottom"></div>
  </div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.product-list > div').each(function(index, element) {
			html  = '';			
			
			var image = $(element).find('.image').html();
			
			if (image != null) { 
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="data-news" style="width: <?php echo $width; ?>px;">' + $(element).find('.data-news').html() + '</div>';			
			html += '  <div class="description-list top">' + $(element).find('.description-list').html() + '</div>';
			html += '  <div class="description-grid">' + $(element).find('.description-grid').html() + '</div>';
						
			$(element).html(html);
		});	
		
		$('.poshytips').poshytip({
			className: 'tip-twitter',
			showTimeout: 1,
			alignTo: 'target',
			alignX: 'center',
			offsetY: 5,
			allowTipHover: false
		});
		
		//$('.display').html('<img align="absmiddle" src="catalog/view/theme/default/image/icon/list-icon-active.png">&nbsp;<a onclick="display(\'grid\');"><img align="absmiddle" src="catalog/view/theme/default/image/icon/grid-icon.png" title="<?php echo $text_grid; ?>"></a>');
		
		$.totalStorage('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > div').each(function(index, element) {
			html = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) {
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '<div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="data-news">' + $(element).find('.data-news').html() + '</div>';
			html += '  <div class="description-list top">' + $(element).find('.description-list').html() + '</div>';
			html += '  <div class="description-grid">' + $(element).find('.description-grid').html() + '</div>';
			
			$(element).html(html);
		});	
		
		$('.poshytips').poshytip({
			className: 'tip-twitter',
			showTimeout: 1,
			alignTo: 'target',
			alignX: 'center',
			offsetY: 5,
			allowTipHover: false
		});
					
		//$('.display').html('<a onclick="display(\'list\');"><img align="absmiddle" src="catalog/view/theme/default/image/icon/list-icon.png" title="<?php echo $text_list; ?>"></a>&nbsp;<img align="absmiddle" src="catalog/view/theme/default/image/icon/grid-icon-active.png">');

		$.totalStorage('display', 'grid');
	}
}

view = $.totalStorage('display');

if (view) {
	display(view);
} else {
	display('list');
}
//--></script> 
<?php echo $footer; ?>