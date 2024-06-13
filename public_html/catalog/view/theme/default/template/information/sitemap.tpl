<?php echo $header; ?>
<div class="rast-heading" style="background-image:url('/image/data/rast-bg-min.jpg')"><h1><?php echo $heading_title; ?></h1></div>
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <div class="main-content">
  <div class="sitemap-info">
    <div class="left">
      <ul>
        <?php foreach ($categories as $category_1) { ?>
        <li><a href="<?php echo $category_1['href']; ?>" class="first"><?php echo $category_1['name']; ?></a>
          <?php if ($category_1['children']) { ?>
          <ul>
            <?php foreach ($category_1['children'] as $category_2) { ?>
            <li><a href="<?php echo $category_2['href']; ?>" class="second"><?php echo $category_2['name']; ?></a>
              <?php if ($category_2['children']) { ?>
              <ul>
                <?php foreach ($category_2['children'] as $category_3) { ?>
                <li><a href="<?php echo $category_3['href']; ?>" class="last"><?php echo $category_3['name']; ?></a></li>
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
    </div>
    <div class="right">
      <ul>
        <li><a href="<?php echo $cart; ?>" class="first"><?php echo $text_cart; ?></a></li>
        <li><a href="<?php echo $checkout; ?>" class="first"><?php echo $text_checkout; ?></a></li>
        <li><a href="<?php echo $search; ?>" class="first"><?php echo $text_search; ?></a></li>
        <li><span class="first"><?php echo $text_information; ?></span>
          <ul>
            <?php foreach ($informations as $information) { ?>
            <li><a href="<?php echo $information['href']; ?>" class="second"><?php echo $information['title']; ?></a></li>
            <?php } ?>
			<li><a href="/manuals/" class="second">Инструкции</a></li>
            <li><a href="<?php echo $contact; ?>" class="second"><?php echo $text_contact; ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>