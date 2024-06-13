<?php if($this->config->get('schemaorg_status') == 1){ ?> 
	<span itemscope itemtype="http://schema.org/Product">
		<meta itemprop="name" content="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>">
		<link itemprop="url" href="<?php echo $url; ?>">
		<?php if(!empty($model)){ ?>
			<meta itemprop="model" content="<?php echo htmlspecialchars($model, ENT_QUOTES); ?>">
		<?php } ?>
		<?php if(!empty($manufacturer)){ ?>
			<meta itemprop="brand" content="<?php echo htmlspecialchars($manufacturer, ENT_QUOTES); ?>">
		<?php } ?>
		<span itemscope itemprop="offers" itemtype="http://schema.org/Offer">
			<meta itemprop="price" content="<?php echo rtrim(preg_replace("/[^0-9\.]/", "", ($special ? $special : $price)), '.'); ?>">
			<meta itemprop="priceCurrency" content="<?php echo $priceCurrency; ?>">
			<link itemprop="availability" href="http://schema.org/<?php echo (($availability) ? 'InStock' : 'OutOfStock') ?>" />
		</span>
		<?php if($rating){ ?>
			<span itemscope itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
				<meta itemprop="reviewCount" content="<?php echo $reviewCount; ?>">
				<meta itemprop="ratingValue" content="<?php echo $ratingValue; ?>">
				<meta itemprop="bestRating" content="5">
				<meta itemprop="worstRating" content="1">
			</span>
		<?php } ?>
		<?php if($thumb){ ?>
			<meta itemprop="image" content="<?php echo $image; ?>">
		<?php } ?>
		<?php if(!empty($description)){ ?>
			<meta itemprop="description" content="<?php echo str_replace("\"", "&quot;", utf8_substr(trim(strip_tags(html_entity_decode($description, ENT_QUOTES, 'UTF-8') ), " \t\n\r"), 0, 555) . '..'); ?>">
		<?php } ?>
		<?php if(!empty($attribute_groups)){ ?>
			<span itemprop="propertiesList" itemscope itemtype="http://schema.org/ItemList">
				<?php foreach ($attribute_groups as $attribute_group){ ?>
					<span itemprop="itemListElement" itemscope itemtype="http://schema.org/NameValueStructure">
						<?php foreach ($attribute_group['attribute'] as $attribute){ ?>
							<meta itemprop="name" content="<?php echo $attribute['name']; ?>">
							<meta itemprop="value" content="<?php echo preg_replace("/<a.*?\/a>/i", "", $attribute['text']); ?>">
						<?php } ?>
					</span>
				<?php } ?>
			</span>
		<?php } ?>
	</span>
<?php } ?>