<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/banner.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $generator_products; ?>" class="button"><?php echo $button_generator_products; ?></a><a href="<?php echo $generator_manufacturers; ?>" class="button"><?php echo $button_generator_manufacturers; ?></a><a href="<?php echo $generator_information; ?>" class="button"><?php echo $button_generator_information; ?></a><a href="<?php echo $generator_news_categories; ?>" class="button"><?php echo $button_generator_news_categories; ?></a><a href="<?php echo $generator_news; ?>" class="button"><?php echo $button_generator_news; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_seo_manager; ?></a></div>
    </div>
    <div class="contentes">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr class="hidden">
            <td><?php echo $entry_source_language;?></td>
            <td>
              <select name="source_language_code" id="source_language_code">
                <?php foreach ($languages as $language) { ?>
				  <?php if ($language['code'] == $source_language_code) { ?>
				    <option value="<?php echo $language['code']; ?>" selected="selected"><?php echo $language['name']; ?></option>   
                  <?php } else { ?>
                    <option value="<?php echo $language['code']; ?>"><?php echo $language['name']; ?></option>
                  <?php } ?>
                <?php } ?>
              </select>
            </td>
          </tr>
		</table>
		<div class="box">
		  <div class="heading">
		    <h1><?php echo $heading_seo_url; ?></h1>
            <div class="buttons"><button type="submit" name="categories" value="categories"><?php echo $button_generate; ?></button><button type="submit" name="save_templates_categories" value="save_templates_categories"><?php echo $button_save_templates; ?></button></div>
          </div>
          <div class="contents">
		    <table class="list over">
			  <thead>
				<tr>
				  <td class="left"><?php echo $column_template; ?></td>
				  <td class="left"><?php echo $column_overwrite; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="left">
					<input type="text" id="categories_template" name="categories_template" value="<?php echo $categories_template; ?>" size="100">
					<span class="help"><?php echo $text_category_tags; ?></span>
				  </td>
				  <td class="left">
					<select name="overwrite_categories">
					  <option value="dont_overwrite"><?php echo $text_no_overwrite; ?></option>
					  <option value="overwrite"><?php echo $text_overwrite; ?></option>
					</select>
					<span class="help"><?php echo $text_warning_overwrite; ?></span>
				  </td>
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
		<div class="box left-manager">
		  <div class="heading">
		    <h1><?php echo $heading_meta_h1; ?></h1>
            <div class="buttons"><button type="submit" name="meta_h1_categories_delete" value="meta_h1_categories_delete"><?php echo $button_delete; ?></button><button type="submit" name="meta_h1_categories" value="meta_h1_categories"><?php echo $button_generate; ?></button><button type="submit" name="save_templates_categories" value="save_templates_categories"><?php echo $button_save_templates; ?></button></div>
          </div>
          <div class="contents">
		    <table class="list over">
			  <thead>
				<tr>
				  <td class="left"><?php echo $column_template; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="left">
					<input type="text" id="template_meta_h1_categories" name="template_meta_h1_categories" value="<?php echo $template_meta_h1_categories;?>" size="100">
					<span class="help"><?php echo $text_meta_h1_categories_tags; ?></span>
				  </td>
				</tr>
				<tr>
				  <td class="left">
					<span class="help"><?php echo $text_warning_h1; ?></span>
				  </td>				
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
		<div class="box right-manager">
		  <div class="heading">
		    <h1><?php echo $heading_meta_title; ?></h1>
            <div class="buttons"><button type="submit" name="meta_title_categories_delete" value="meta_title_categories_delete"><?php echo $button_delete; ?></button><button type="submit" name="meta_title_categories" value="meta_title_categories"><?php echo $button_generate; ?></button><button type="submit" name="save_templates_categories" value="save_templates_categories"><?php echo $button_save_templates; ?></button></div>
          </div>
          <div class="contents">
		    <table class="list over">
			  <thead>
				<tr>
				  <td class="left"><?php echo $column_template; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="left">
					<input type="text" id="template_meta_title_categories" name="template_meta_title_categories" value="<?php echo $template_meta_title_categories; ?>" size="100">
					<span class="help"><?php echo $text_meta_title_categories_tags; ?></span>
				  </td>
				</tr>
				<tr>
				  <td class="left">
					<span class="help"><?php echo $text_warning_title; ?></span>
				  </td>				
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
		<div class="box left-manager">
		  <div class="heading">
		    <h1><?php echo $heading_meta_keywords; ?></h1>
            <div class="buttons"><button type="submit" name="meta_keywords_categories_delete" value="meta_keywords_categories_delete"><?php echo $button_delete; ?></button><button type="submit" name="meta_keywords_categories" value="meta_keywords_categories"><?php echo $button_generate; ?></button><button type="submit" name="save_templates_categories" value="save_templates_categories"><?php echo $button_save_templates; ?></button></div>
          </div>
          <div class="contents">
		    <table class="list over">
			  <thead>
				<tr>
				  <td class="left"><?php echo $column_template; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="left">
					<input type="text" id="template_meta_keywords_categories" name="template_meta_keywords_categories" value="<?php echo $template_meta_keywords_categories;?>" size="100">
					<span class="help"><?php echo $text_meta_keywords_categories_tag; ?></span>
				  </td>
				</tr>
				<tr>
				  <td class="left">
					<span class="help"><?php echo $text_warning_keywords; ?></span>
				  </td>				
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>
		<div class="box right-manager">
		  <div class="heading">
		    <h1><?php echo $heading_meta_description; ?></h1>
            <div class="buttons"><button type="submit" name="meta_description_categories_delete" value="meta_description_categories_delete"><?php echo $button_delete; ?></button><button type="submit" name="meta_description_categories" value="meta_description_categories"><?php echo $button_generate; ?></button><button type="submit" name="save_templates_categories" value="save_templates_categories"><?php echo $button_save_templates; ?></button></div>
          </div>
          <div class="contents">
		    <table class="list over">
			  <thead>
				<tr>
				  <td class="left"><?php echo $column_template; ?></td>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="left">
					<input type="text" id="template_meta_description_categories" name="template_meta_description_categories" value="<?php echo $template_meta_description_categories; ?>" size="100">
					<span class="help"><?php echo $text_categories_meta_description; ?></span>
				  </td>
				</tr>
				<tr>
				  <td class="left">
					<span class="help"><?php echo $text_warning_description; ?></span>
				  </td>				
				</tr>
			  </tbody>
			</table>
		  </div>
		</div>		
      </form>
    </div>
	<div class="foot_heading">
      <h1><img src="view/image/banner.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a href="<?php echo $generator_products; ?>" class="button"><?php echo $button_generator_products; ?></a><a href="<?php echo $generator_manufacturers; ?>" class="button"><?php echo $button_generator_manufacturers; ?></a><a href="<?php echo $generator_information; ?>" class="button"><?php echo $button_generator_information; ?></a><a href="<?php echo $generator_news_categories; ?>" class="button"><?php echo $button_generator_news_categories; ?></a><a href="<?php echo $generator_news; ?>" class="button"><?php echo $button_generator_news; ?></a><a href="<?php echo $cancel; ?>" class="button"><?php echo $button_seo_manager; ?></a></div>
    </div>
  </div>
</div>
<?php echo $footer; ?>