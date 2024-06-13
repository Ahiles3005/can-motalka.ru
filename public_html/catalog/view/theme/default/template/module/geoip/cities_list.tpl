<link rel="stylesheet" type="text/css" href="catalog/view/javascript/jquery/jscrollpane/jquery.jscrollpane.css" />
<script type="text/javascript" src="catalog/view/javascript/jquery/jscrollpane/jquery.mousewheel.js"></script>
<script type="text/javascript" src="catalog/view/javascript/jquery/jscrollpane/jquery.jscrollpane.min.js"></script>
<h2><?php echo $text_choose_region; ?></h2>
<div class="geoip-block">
    <input class="geoip-popup-input" type="text" placeholder="<?php echo $text_search_placeholder; ?>">
</div>
<div class="border"></div>
	<div class="pad15">
<?php foreach ($columns as $column) { ?>
    <?php foreach ($column as $id => $title) { ?>
        <div class="i">
            <a class="choose-city" data-id="<?php echo $id; ?>">
                <?php echo $title; ?>
            </a>
        </div>
    <?php } ?>
<?php } ?>
	</div>