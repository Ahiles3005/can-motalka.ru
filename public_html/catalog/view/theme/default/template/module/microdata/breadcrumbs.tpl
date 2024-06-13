<?php if($this->config->get('schemaorg_status')==1){ ?>
	<?php if(!empty($breadcrumbs)){ ?>
		<?php foreach($breadcrumbs as $i=> $breadcrumb){ ?>
			<?php if($i+1<count($breadcrumbs)){ ?>
				<span itemscope itemtype="https://schema.org/BreadcrumbList">
					<link itemprop="url" href="<?php echo $breadcrumb['href']; ?>"><meta itemprop="title" content="<?php echo preg_replace("/<i.*?\/i>/i", "", $breadcrumb['text']); ?>">
				</span>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>