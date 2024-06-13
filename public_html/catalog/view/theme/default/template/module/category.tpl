<?php if ($header) { ?>
<div class="hm-area"><span>Звонок<br />бесплатный. Круглосуточно</span><a href="tel:<?php echo $contacts_telephone; ?>" class="phone"><?php echo $contacts_telephone; ?></a></div>
<div class="hm"><span></span></div>
<div class="hm-cls"></div>
<div class="hm-overlay"></div>
<div class="hm-box">
<a href="tel:<?php echo $contacts_telephone; ?>" class="phone"><?php echo $contacts_telephone; ?></a>
<?php if ($contacts_mobile_telephone) { ?><a href="tel:<?php echo $contacts_mobile_telephone; ?>" class="phone"><?php echo $contacts_mobile_telephone; ?></a><?php } ?>
	<ul class="box-category">
    <?php foreach ($categories as $category) { ?>
    <?php if ($category['category_id'] == $category_id) { ?>
	<li class="active"><a href="<?php echo $category['href']; ?>" class="active"><?php echo $category['name']; ?></a>
    <?php } else { ?>
	<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a>
    <?php } ?>
    <?php if ($category['children']) { ?>
      <a href="<?php echo $category['href']; ?>" class="category-button"></a>
	  <ul>
	  <?php if ($category['thumb']) { ?>
	  <li class="image"><a href="<?php echo $category['href']; ?>" title="<?php echo $category['name']; ?>"><img src="<?php echo $category['thumb']; ?>" alt="<?php echo $category['name']; ?>"></a>
	  <div class="description" style="width:<?php echo $width; ?>px;"><?php echo $category['description']; ?></div></li>
	  <?php } ?>
	  <?php foreach ($category['children'] as $child) { ?>
	  <?php if ($child['category_id'] == $child_id) { ?>
	  <li class="active" <?php if ($child['child_thumb']) { ?>style="background-image:url('<?php echo $child['child_thumb']; ?>')"<?php } ?>><a href="<?php echo $child['href']; ?>" class="active"><?php echo $child['name']; ?></a>
	  <?php } else { ?>
	  <li <?php if ($child['child_thumb']) { ?>style="background-image:url('<?php echo $child['child_thumb']; ?>')"<?php } ?>><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a>
      <?php } ?>
	  <?php if($child['child2_id']){ ?>
	    <a href="<?php echo $child['href']; ?>" class="category-button"></a>
	    <ul>
		<?php if ($child['child_thumb']) { ?>
		<li class="image"><a href="<?php echo $child['href']; ?>" title="<?php echo $child['name']; ?>"><img src="<?php echo $child['child_thumb']; ?>" alt="<?php echo $child['name']; ?>"></a>
		<div class="description" style="width:<?php echo $width; ?>px;"><?php echo $child['child_description']; ?></div></li>
		<?php } ?>
		<?php foreach ($child['child2_id'] as $child2) { ?>
		<?php if ($child2['category_id'] == $child2_id) { ?>
		<li class="active"><a href="<?php echo $child2['href']; ?>" class="active"><?php echo $child2['name']; ?></a>
		<?php } else { ?>
		<li><a href="<?php echo $child2['href']; ?>"><?php echo $child2['name']; ?></a>
		<?php } ?>
		<?php if($child2['child3_id']){ ?>
		  <a href="<?php echo $child2['href']; ?>" class="category-button"></a>
		  <ul>
		  <?php if ($child2['child2_thumb']) { ?>
		  <li class="image"><a href="<?php echo $child2['href']; ?>" title="<?php echo $child2['name']; ?>"><img src="<?php echo $child2['child2_thumb']; ?>" alt="<?php echo $child2['name']; ?>"></a>
		  <div class="description" style="width:<?php echo $width; ?>px;"><?php echo $child2['child2_description']; ?></div></li>
		  <?php } ?>
		  <?php foreach ($child2['child3_id'] as $child3) { ?>
		  <?php if ($child3['category_id'] == $child3_id) { ?>
		  <li class="active"><a href="<?php echo $child3['href']; ?>" class="active"><?php echo $child3['name']; ?></a></li>
		  <?php } else { ?>
		  <li><a href="<?php echo $child3['href']; ?>"><?php echo $child3['name']; ?></a></li>
		  <?php } ?>
		  <?php } ?>
		  </ul>
		<?php } ?>
		</li>
        <?php } ?>
        </ul>
      <?php } ?>
      </li>
      <?php } ?>
      </ul>
    <?php } ?>
    </li>
  <?php } ?>
  <?php if ($informations) { ?>
		<?php foreach ($informations as $information) { ?>
			<li class="info"><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
		<?php } ?>
  <?php } ?>
  <li class="info"><a href="/otzyvy/">Отзывы</a></li>
  <li class="info"><a href="/manuals/">Инструкции</a></li>
  <li class="info"><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
  </ul>
</div>
<script type="text/javascript" >$(".hm").click(function(){$('.hm span').addClass('active');$('.hm-box').css({'transform':'scale(1)','opacity':'1'});$('html').css({'overflow-y':'hidden'});$('.hm-overlay, .hm-cls').fadeIn('slow');return false});$('.hm-cls, .hm-overlay').click(function(){$('.hm-box').css({'transform':'scale(0)','opacity':'0'});$('html').css({'overflow-y':'visible'});$('.hm span').removeClass('active');$('.hm-overlay, .hm-cls').fadeOut('slow')});</script>
<?php } ?>