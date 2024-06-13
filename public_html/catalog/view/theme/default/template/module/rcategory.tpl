<script>$(document).ready(function() {
$('.colorbox').colorbox({overlayClose:true,opacity:0.7,width:"1050px",height:"85%",top:"50px",fixed:true,rel:"colorbox"});
});</script>
<?php if(!empty($rcatproducts)){ ?>
	<?php if (($setting['position'] == 'content_top') || ($setting['position'] == 'content_bottom')){ ?>
		<div class="box">
			<h2><?php echo $heading_title; ?></h2>
			<div class="box-content">
				<p id="rhtabs-<?php echo $module ?>" class="rhtabs"><span>Из категории:</span>
					<?php foreach ($rcatproducts as $rcatproduct) { ?>
						<?php if(!empty($rcatproduct['rproducts'])) { ?>
							<a href="#rcategory-<?php echo $rcatproduct['rcategory_id'] ?>-<?php echo $module ?>" ><?php echo $rcatproduct['rcategory_name'] ?></a>
						<?php } ?>
					<?php } ?>
				</p>
				<?php foreach ($rcatproducts as $rcatproduct) { ?>
					<?php if(!empty($rcatproduct['rproducts'])) { ?>
						<div id="rcategory-<?php echo $rcatproduct['rcategory_id'] ?>-<?php echo $module ?>" class="box-product<?php echo $setting['use_carousel'] ? ' owl-carousel' : '' ?>">
							<?php foreach ($rcatproduct['rproducts'] as $product) { ?>
								<div>
									<?php if ($product['thumb']) { ?>
										<div class="image">	
										<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
										<a href="<?php echo $product['href']; ?>"><img <?php if($setting['use_carousel']) { ?>data-<?php } ?>src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" class="lazyOwl" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>
									<?php } else { ?>
										<div class="image">	
										<?php !$product['special'] ? $price_free_delivery = preg_replace("#[^\d]#", "", $product['price']) : $price_free_delivery = preg_replace("#[^\d]#", "", $product['special']); if($price_free_delivery >= 5000) { ?><div class="free-delivery">Бесплатная доставка</div><?php } else { ?><?php } ?>
										<a href="<?php echo $product['href']; ?>"><img <?php if($setting['use_carousel']) { ?>data-<?php } ?>src="<?php echo $product['no_image']; ?>" alt="<?php echo $product['name']; ?>" class="lazyOwl" /></a><div class="stickers"><?php echo $product['sale']; ?><?php echo $product['new']; ?><?php echo $product['popular']; ?></div></div>									
									<?php } ?>
									<div class="name"><a href="<?php echo $product['href']; ?>"><?php if( strlen( $product['name'] ) < 235 ) { echo $product['name']; } else { echo mb_substr( $product['name'],0,235,'utf-8' ).""; } ?></a></div>
									
									<!-- Категория и производитель -->
      <div class="attr">
      <?php if ($product['brandlink']==1) { ?>
      <div><span>Бренд:</span> <a href="<?php echo $product['manufacturer_link']; ?>"><?php echo $product['manufacturer']; ?></a></div>
      <?php } ?>	  
      <?php if ($product['catname']==1) { ?>
      <div><span>Категория:</span> <?php echo $product['category_name']; ?></div>
      <?php } ?>
	  </div>
									<!-- Категория и производитель -->									
									
									<?php if ($product['price']) { ?>
										<div class="price">
											<?php if (!$product['special']) { ?>
												<?php echo $product['price']; ?>
											<?php } else { ?>
												<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
											<?php } ?>
										</div>
									<?php } ?>
									<div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btns c-button" /></div>
								</div>
							<?php } ?>

							<?php if($setting['show_link']['status']) { ?>
								<?php if($setting['use_carousel']) { ?>
									<div class="rcategory_path" style="position:relative;"><?php echo $rcatproduct['goto_rcategory'] ?></div>
								<?php } else { ?>
									<div class="rcategory_path"><?php echo $rcatproduct['goto_rcategory'] ?></div>
								<?php } ?>
							<?php } ?>
						</div>							
					<?php } ?>
				<?php } ?>
			</div>
		</div>

		<script type="text/javascript"><!--
			$('#rhtabs-<?php echo $module ?> a').tabs();
			<?php if($setting['use_carousel']) { ?>
				$(document).ready(function() { 
					<?php foreach ($rcatproducts as $rcatproduct) { ?>
						$("#rcategory-<?php echo $rcatproduct['rcategory_id'] ?>-<?php echo $module ?>").owlCarousel({
							lazyLoad : true
						});	
					<?php } ?> 
				});
			<?php } ?>
		//--></script>

	<?php } else { ?>
	
		<div class="box">
			<div class="box-heading"><?php echo $heading_title; ?></div>
			<div class="box-content <?php echo $setting['use_carousel'] ? 'jcarousel' : '' ?>">
				<<?php echo $setting['use_carousel'] ? 'ul' : 'div' ?> class="box-product">
					<?php foreach ($rcatproducts as $rcatproduct) { ?>
						<?php foreach ($rcatproduct['rproducts'] as $product) { ?>
							<<?php echo $setting['use_carousel'] ? 'li' : 'div' ?>>
								<?php if ($product['thumb']) { ?>
									<div class="image"><a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" /></a></div>
								<?php } ?>
								<div class="name"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></div>
								<?php if ($product['price']) { ?>
									<div class="price">
										<?php if (!$product['special']) { ?>
											<?php echo $product['price']; ?>
										<?php } else { ?>
											<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
										<?php } ?>
									</div>
								<?php } ?>
								<?php if ($product['rating']) { ?>
									<div class="rating"><img src="catalog/view/theme/default/image/stars-<?php echo $product['rating']; ?>.png" alt="<?php echo $product['reviews']; ?>" /></div>
								<?php } ?>
								<div class="cart"><input type="button" value="<?php echo $button_cart; ?>" onclick="addToCart('<?php echo $product['product_id']; ?>');" class="button" /></div>
							</<?php echo $setting['use_carousel'] ? 'li' : 'div' ?>>
						<?php } ?>
					<?php } ?>
				</<?php echo $setting['use_carousel'] ? 'ul' : 'div' ?>>
			</div>
		</div>
		<?php if($setting['use_carousel']) { ?>
			<script type="text/javascript"><!--
				<?php if($setting['use_carousel']) { ?>
				$('.jcarousel ul').jcarousel({
					wrap: 'both',
					animation: 1500,
					vertical: true,
					easing: 'easeInOutBack',
					scroll: 1,
					//auto: true,
				});
				<?php } ?>
			//--></script>		
		<?php } ?>
	<?php } ?>
<?php } ?>
