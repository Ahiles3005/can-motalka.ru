<?php echo $header; ?>
</div>
<div class="rast-heading"><div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>
<div class="wrapper">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content" class="no-bg"><?php echo $content_top; ?>
  <div class="main-content">
  <?php if ($categories) { ?>
  <p>
    <?php foreach ($categories as $category) { ?>
    <a href="index.php?route=product/manufacturer#<?php echo $category['name']; ?>" class="abcd"><?php echo $category['name']; ?></a>
    <?php } ?>
  </p>
  <?php foreach ($categories as $category) { ?>
  <div class="manufacturer-list">
    <div class="manufacturer-heading"><?php echo $category['name']; ?><a id="<?php echo $category['name']; ?>"></a></div>
    <div class="manufacturer-content">
      <?php if ($category['manufacturer']) { ?>
      <?php for ($i = 0; $i < count($category['manufacturer']);) { ?>
      <ul>
        <?php $j = $i + ceil(count($category['manufacturer']) / 4); ?>
        <?php for (; $i < $j; $i++) { ?>
        <?php if (isset($category['manufacturer'][$i])) { ?>
        <li>
          <?php if($category['manufacturer'][$i]['image']) { ?>
            <a href="<?php echo $category['manufacturer'][$i]['href']; ?>"><img src="<?php  echo $category['manufacturer'][$i]['image']; ?> " alt="<?php echo $category['manufacturer'][$i]['name']; ?>" title="<?php echo $category['manufacturer'][$i]['name']; ?>" /></a>
		  <?php } ?>
		  <br />
          <a href="<?php echo $category['manufacturer'][$i]['href']; ?>"><?php echo $category['manufacturer'][$i]['name']; ?></a>
		</li>
        <?php } ?>
        <?php } ?>
      </ul>
      <?php } ?>
      <?php } ?>
    </div>
  </div>
  <?php } ?>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php } ?>
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>