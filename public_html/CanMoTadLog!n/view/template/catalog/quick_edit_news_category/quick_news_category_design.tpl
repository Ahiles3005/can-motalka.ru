<div>
<table class="form">
  <tr>
	<td style="width: 50px;">
	  <?php if ($news_category_image['image']) { ?>
		<img src="<?php echo $news_category_image; ?>" />
	  <?php } else { ?>
		<img src="<?php echo $news_category_no_image; ?>" />
	  <?php } ?>
	</td>
    <td><b><?php echo $news_category_name; ?></b></td>
  </tr>
</table>
<form action="POST" id="design-form">
  <table class="list">
    <thead>
      <tr>
        <td class="left"><?php echo $entry_store; ?></td>
        <td class="left"><?php echo $entry_layout; ?></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="left"><?php echo $text_default; ?></td>
        <td class="left">
		  <select name="news_category_layout[0][layout_id]">
            <option value=""></option>
            <?php foreach ($layouts as $layout) { ?>
              <?php if (isset($news_category_layout[0]) && $news_category_layout[0] == $layout['layout_id']) { ?>
                <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
              <?php } else { ?>
                <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
		</td>
      </tr>
    </tbody>
    <?php foreach ($stores as $store) { ?>
    <tbody>
      <tr>
        <td class="left"><?php echo $store['name']; ?></td>
        <td class="left">
		  <select name="news_category_layout[<?php echo $store['store_id']; ?>][layout_id]">
            <option value=""></option>
            <?php foreach ($layouts as $layout) { ?>
              <?php if (isset($news_category_layout[$store['store_id']]) && $news_category_layout[$store['store_id']] == $layout['layout_id']) { ?>
                <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
              <?php } else { ?>
                <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
              <?php } ?>
            <?php } ?>
          </select>
		</td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</form>
</div>
