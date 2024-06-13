<span itemscope itemtype='http://schema.org/Store'>
	<meta itemprop='name' content='<?php echo $this->config->get('schemaorg_home_name'); ?>'>
	<meta itemprop='logo' content='<?php echo $logo; ?>'>
	<link itemprop='url' href='<?php echo $base; ?>' >
	<meta itemprop='description' content='<?php echo $this->config->get('schemaorg_home_description'); ?>' >
	<span itemprop='address' itemscope itemtype='http://schema.org/PostalAddress'>
		<meta itemprop='addressCountry' content='<?php echo $this->config->get('schemaorg_home_addresscountry'); ?>'>
		<meta itemprop='addressLocality' content='<?php echo $this->config->get('schemaorg_home_addresslocality'); ?>'>
		<meta itemprop='streetAddress' content='<?php echo $this->config->get('schemaorg_home_streetaddress'); ?>'>
	</span>
	<meta itemprop='telephone' content='<?php echo $this->config->get('schemaorg_home_telephone'); ?>'>
	<meta itemprop='email' content='<?php echo $this->config->get('schemaorg_home_email'); ?>'>
	<meta itemprop='openingHours' content='<?php echo $this->config->get('schemaorg_home_openinghours_days'); ?> <?php echo $this->config->get('schemaorg_home_openinghours_time'); ?>'>
</span>