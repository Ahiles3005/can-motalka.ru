<?php if($this->config->get('schemaorg_status')==1){ ?>
	<?php if($products){ ?>
		<span itemtype="http://schema.org/ItemList" itemscope>
			<?php foreach($products as $product ){ ?>
				<span itemtype="http://schema.org/Product" itemprop="itemListElement" itemscope>
					<meta itemprop="name" content="<?php echo htmlspecialchars($product['name'], ENT_QUOTES); ?>">
					<link itemprop="url" href="<?php echo $product['href']; ?>">
					<?php if($product['rating']){ ?>
						<span itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
							<meta itemprop="reviewCount" content="<?php echo preg_replace("/[^0-9]/", "", $product['reviews']); ?>">
							<meta itemprop="ratingValue" content="<?php echo $product['rating']; ?>">
							<meta itemprop="bestRating" content="5">
							<meta itemprop="worstRating" content="1">
						</span>
					<?php } ?>
					<?php if($product['thumb']){ ?>
						<meta itemprop="image" content="<?php echo $product['thumb']; ?>">
					<?php } ?>
					<?php if($this->config->get('schemaorg_island')==1){ ?>
						<span itemscope itemprop="offers" itemtype="http://schema.org/Offer">
							<meta itemprop="price" content="<?php echo rtrim(preg_replace("/[^0-9\.]/", "", ($product['special'] ? $product['special'] : $product['price'])), '.'); ?>">
							<meta itemprop="priceCurrency" content="<?php echo $this->currency->getCode(); ?>">
						</span>
						<?php if(!empty($product['description'])){ ?>
							<meta itemprop="description" content="<?php echo str_replace("\"", "&quot;", utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8') ), " \t\n\r"), 0, 500) . '..'); ?>">
						<?php } ?>
					<?php } ?>
					<?php if($this->config->get('schemaorg_island')==2){ ?>
						<?php if(!empty($product['description'])){ ?>
							<meta itemprop="description" content="<?php echo str_replace("\"", "&quot;", utf8_substr(trim(strip_tags(html_entity_decode($product['description'], ENT_QUOTES, 'UTF-8') ), " \t\n\r"), 0, 500) . '..'); ?>">
						<?php } ?>
					<?php } ?>
				</span>
			<?php } ?>
		</span>
	<?php } ?>
<?php } ?>