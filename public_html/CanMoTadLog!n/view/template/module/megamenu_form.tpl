<?php echo $header; ?>
<script type="text/javascript" src="/admin/view/javascript/megamenu/megamenu.js?v1"></script>
<link rel="stylesheet" href="/admin/view/stylesheet/megamenu.css?v1">
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($error) { ?>
  <div class="warning"><?php echo $error; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/product.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons">
	  
	  <a onclick="$('#form-megamenu').submit();" class="button"><?php echo $button_save; ?></a>
	  <a href="<?php echo $cancel; ?>" class="button"><?php echo $button_cancel; ?></a>
	  
	  
	  
	  </div>
    </div>
    <div class="content">
      <div id="tabs" class="htabs">
	  <a href="#tab-general"><?php echo $tab_general; ?></a>
	  <a href="#tab-category_options" class="show_elements show_elements_category">Подкатегории</a>
	  <a href="#tab-html_options" class="show_elements show_elements_html">Текст</a>
	  <a href="#tab-manufacturer_options" class="show_elements show_elements_manufacturer">Производители</a>
	  <a href="#tab-information_options" class="show_elements show_elements_information">Информационные статьи</a>
	  <a href="#tab-product_options" class="show_elements show_elements_product">Товары</a>
	  <a href="#tab-add_html" class="show_elements show_elements_add_html"><?php echo $tab_add_html; ?></a>
      <a href="#tab-link_options" class="show_elements show_elements_link">target _blank</a>
  
	  </div>
	  
	  
	  
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-megamenu">
	    <div id="tab-product_options">
		  <table class="form">
		         <tr>
                <td><?php echo $text_product_width; ?></td>
                <td> <input type="text" name="product_width" value="<?=isset($product_width)?$product_width:50?>" placeholder="<?php echo $text_product_width; ?>" id="input-product_width" class="form-control" /></td>
              </tr>
			         <tr>
                <td><?php echo $text_product_height; ?></td>
                <td>
                    <input type="text" name="product_height" value="<?=isset($product_height)?$product_height:50?>" placeholder="<?php echo $text_product_height; ?>" id="input-product_height" class="form-control" />
                        </td>
              </tr>
			  
			  <tr>
              <td><?php echo $text_product; ?></td>
              <td> <input type="text" name="product" value="" id="input-product"/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div id="product-product" class="scrollbox">
                  <?php $class = 'odd'; ?>
                  <?php foreach ($products_list_sel as $products_list) { ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                  <div id="product-item<?php echo $products_list['product_id']; ?>" class="<?php echo $class; ?>"> <?php echo $products_list['name']; ?><img src="view/image/delete.png" alt="" />
                    <input type="hidden" name="products_list[]" value="<?php echo $products_list['product_id']; ?>" />
                  </div>
                  <?php } ?>
                </div></td>
            </tr>
			  
			  
		  </table>
        </div>
		
		
	  	  <div id="tab-information_options">
		  
		  <table class="form">
		  	    
                       <tr>
              <td valign=top><?php echo $text_information; ?></td>
              <td><div class="scrollbox" style="height:auto;">
                  <?php $class = 'odd'; ?>
                  <?php foreach($informations_list as $information){ ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>

                  <div class="<?php echo $class; ?>">
           
                   <input type="checkbox" name="informations_list[]" <?if(isset($informations_list_selected[$information['information_id']])){?> checked=checked <?}?> value="<?=$information['information_id']?>"/> <?=$information['title']?> 
                  
                 
                  </div>
                  <?php } ?>
                </div>
               </td>
            </tr> 
		   </table>
        </div>
	  
	  <div id="tab-manufacturer_options">
		  <table class="form">
		  	    
                       <tr>
              <td valign=top><?php echo $text_manufacturer; ?></td>
              <td><div class="scrollbox" style="height:auto;">
                  <?php $class = 'odd'; ?>
                  <?php foreach($manufacturers_list as $manufacturer){ ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>

                  <div class="<?php echo $class; ?>">
           
                     <input type="checkbox" name="manufacturers_list[]" <?if(isset($manufacturers_list_selected[$manufacturer['manufacturer_id']])){?> checked=checked <?}?> value="<?=$manufacturer['manufacturer_id']?>"/> <?=$manufacturer['name']?> 
                  
                 
                  </div>
                  <?php } ?>
                </div>
               </td>
            </tr> 
		   </table>
        </div>
        
        
        
        
         <div id="tab-link_options">
		  <table class="form">
		  
		   <tr>
                <td><?php echo $text_link_options; ?></td>
                <td><input type="checkbox" id="input-use_target_blank" name="use_target_blank" <?if($use_target_blank){?> checked=checked <?}?> value="1"/></td>
              </tr>
		    
			  
            
            </table>
          </div> 
         
        	
        
        
		
	   <div id="tab-html_options">
		  <table class="form">
		  
		<tr>
                <td colspan=2>  <div id="language_html" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#language_html<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div></td>
              </tr>
		   
		   <tr>
                <td colspan=2>
				 <?php foreach ($languages as $language) { ?>
				   <div id="language_html<?php echo $language['language_id']; ?>">
            <table class="form" style="margin:0;">
              <tr>
                <td valign=top><?php echo $text_html_description; ?></td>
                <td>
				  <textarea name="megamenu[<?php echo $language['language_id']; ?>][html]" placeholder="<?php echo $text_html_description; ?>" id="input-html_description<?php echo $language['language_id']; ?>"><?php echo isset($megamenu[$language['language_id']]['html']) ? $megamenu[$language['language_id']]['html'] : ''; ?></textarea>
				</td>
              </tr>
			  
            
            </table>
          </div>
				<?}?>
				</td>
              </tr>
	  	  
	   </table>
        </div>
	  <div id="tab-add_html">
		  <table class="form">
		  
		   <tr>
                <td><?php echo $text_add_html; ?></td>
                <td><input type="checkbox" id="input-use_add_html" name="use_add_html" <?if($use_add_html){?> checked=checked <?}?> value="1"/></td>
              </tr>
		    <tr>
                <td colspan=2>  <div id="language_add_html" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#language_add_html<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div></td>
              </tr>
		   
		   <tr>
                <td colspan=2>
				 <?php foreach ($languages as $language) { ?>
				   <div id="language_add_html<?php echo $language['language_id']; ?>">
            <table class="form" style="margin:0;">
              <tr>
                <td valign=top><?php echo $text_html_description; ?></td>
                <td>
				 <textarea name="megamenu[<?php echo $language['language_id']; ?>][add_html]" placeholder="<?php echo $text_html_description; ?>" id="input-add_html_description<?php echo $language['language_id']; ?>"><?php echo isset($megamenu[$language['language_id']]['add_html']) ? $megamenu[$language['language_id']]['add_html'] : ''; ?></textarea>
				</td>
              </tr>
			  
            
            </table>
          </div>
				<?}?>
				</td>
              </tr>
		   
		   
		  
	   </table>
        </div>
        
        
       
			
		   
		   
		  
        
        
        
	  
	    <div id="tab-category_options">
		  <table class="form">
               <tr>
                <td><span class="required">*</span> <?php echo $text_variant_category; ?></td>
                <td>   <select name="variant_category" id="input-variant_category" class="form-control">
			  
				<option value="0">-</option>
				<option value="simple" <?if($variant_category=="simple"){?> selected=selected <?}?>><?php echo $variant_category_simple; ?></option>
				<option value="full" <?if($variant_category=="full"){?> selected=selected <?}?>><?php echo $variant_category_full; ?></option>
				<option value="full_image" <?if($variant_category=="full_image"){?> selected=selected <?}?>><?php echo $variant_category_full_image; ?></option>
				
		
			  </select></td>
              </tr>
			  
			       <tr>
                <td><?php echo $text_category_show_subcategory; ?></td>
                <td> 
                      <input type="checkbox" id="input-category_show_subcategory" name="category_show_subcategory" <?if($category_show_subcategory){?> checked=checked <?}?> value="1"/>
                   </td>
              </tr>
			  
			    
                       <tr>
              <td valign=top><?php echo $text_category; ?></td>
              <td><div class="scrollbox" style="height:auto;width:65%;">
                  <?php $class = 'odd'; ?>
                  <?php foreach($categories_list as $category){ ?>
                  <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>

                  <div class="<?php echo $class; ?>">
           
                    <input type="checkbox" name="categories_list[]" <?if(isset($categories_list_selected[$category['category_id']])){?> checked=checked <?}?> value="<?=$category['category_id']?>"/>
                    <?=$category['name']?> 
                 
                  </div>
                  <?php } ?>
                </div>
               </td>
            </tr> 
		
			  
            
            </table>
        </div>
	  
	  
	  
	  
	  
	  
        <div id="tab-general">
          <div id="language" class="htabs">
            <?php foreach ($languages as $language) { ?>
            <a href="#language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
            <?php } ?>
          </div>
          <?php foreach ($languages as $language) { ?>
          <div id="language<?php echo $language['language_id']; ?>">
            <table class="form" style="margin:0;">
              <tr>
                <td><span class="required">*</span> <?php echo $text_title; ?></td>
                <td>  <input type="text" name="megamenu[<?php echo $language['language_id']; ?>][title]" value="<?php echo isset($megamenu[$language['language_id']]) ? $megamenu[$language['language_id']]['title'] : ''; ?>" placeholder="<?php echo $text_title; ?>" id="input-title<?php echo $language['language_id']; ?>" class="form-control" /></td>
              </tr>
			  
            
            </table>
          </div>
          <?php } ?>
		   <table class="form">
              <tr>
                <td><?php echo $text_link; ?></td>
                <td> <input type="text" name="link" value="<?php echo isset($link) ? $link : ''; ?>" placeholder="<?php echo $text_link; ?>" id="input-link" class="form-control" /></td>
              </tr>
			  
			     <tr>
                <td><span class="required">*</span> <?php echo $text_type; ?></td>
                <td>
				 <select name="menu_type" id="input-menu_type" class="form-control">
				<option value="0">-</option>
				<option value="category" <?if($menu_type=="category"){?> selected=selected <?}?>><?php echo $text_type_category; ?></option>
				<option value="html" <?if($menu_type=="html"){?> selected=selected <?}?>><?php echo $text_type_html; ?></option>
				<option value="manufacturer" <?if($menu_type=="manufacturer"){?> selected=selected <?}?>><?php echo $text_type_manufacturer; ?></option>
				<option value="information" <?if($menu_type=="information"){?> selected=selected <?}?>><?php echo $text_type_information; ?></option>
				<option value="product" <?if($menu_type=="product"){?> selected=selected <?}?>><?php echo $text_type_product; ?></option>
				<option value="auth" <?if($menu_type=="auth"){?> selected=selected <?}?>><?php echo $text_type_auth; ?></option>
                <option value="link" <?if($menu_type=="link"){?> selected=selected <?}?>><?php echo $text_type_link; ?></option>
				
		
			  </select>
				</td>
              </tr>
			   <tr>
                <td><?php echo $text_status; ?></td>
                <td>
					  <select name="status" id="input-status" class="form-control">
				<?php if ($status) { ?>
				<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
				<option value="0"><?php echo $text_disabled; ?></option>
				<?php } else { ?>
				<option value="1"><?php echo $text_enabled; ?></option>
				<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
				<?php } ?>
			  </select>
				</td>
              </tr>
			  
			  
			    
              <tr>
                <td><?php echo $text_sort_order; ?></td>
                <td>  <input type="text" name="sort_order" value="<?php echo isset($sort_order) ? $sort_order : '0'; ?>" placeholder="<?php echo $sort_order; ?>" id="input-sort_order" class="form-control" /></td>
              </tr>
			   <tr>
                <td valign=top><?php echo $text_thumb; ?></td>
                <td> 
				 
				 <div class="image">
				 <img src="<?php echo $thumb; ?>" alt="" id="thumb" />
                    <input type="hidden" name="image" value="<?php echo isset($thumb_hidden) ? $thumb_hidden : ''; ?>" id="input-image" />
                    <br />
                    <a onclick="image_upload('input-image', 'thumb');">Обзор</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('#thumb').attr('src', '<?php echo $placeholder_thumb; ?>'); $('#input-image').attr('value', '');">Очистить</a>
					</div>
			
				
				</td>
              </tr>
			  
            
            </table>
        </div>
       
      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="view/javascript/ckeditor/ckeditor.js"></script> 
<script type="text/javascript"><!--
<?php foreach ($languages as $language) { ?>
CKEDITOR.replace('input-add_html_description<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});
CKEDITOR.replace('input-html_description<?php echo $language['language_id']; ?>', {
	filebrowserBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashBrowseUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserImageUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>',
	filebrowserFlashUploadUrl: 'index.php?route=common/filemanager&token=<?php echo $token; ?>'
});

<?php } ?>
//--></script> 
<script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
					dataType: 'text',
					success: function(text) {					
						$('#' + thumb).replaceWith('<img src="' + text + '" alt="" id="' + thumb + '" />');
					}
				});
			}
		},	
		bgiframe: false,
		width: 800,
		height: 400,
		resizable: false,
		modal: false
	});
};
//--></script> 
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs(); 
$('#language a').tabs(); 
$('#language_html a').tabs();
$('#language_add_html a').tabs();


$('input[name=\'product\']').autocomplete({
	delay: 500,
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=catalog/product/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {		
				response($.map(json, function(item) {
					return {
						label: item.name,
						value: item.product_id
					}
				}));
			}
		});
	}, 
	select: function(event, ui) {
		$('#product-item' + ui.item.value).remove();
		
		$('#product-product').append('<div id="product-item' + ui.item.value + '">' + ui.item.label + '<img src="view/image/delete.png" alt="" /><input type="hidden" name="products_list[]" value="' + ui.item.value + '" /></div>');

		$('#product-product div:odd').attr('class', 'odd');
		$('#product-product div:even').attr('class', 'even');
				
		return false;
	},
	focus: function(event, ui) {
      return false;
   }
});

$('#product-product div img').live('click', function() {
	$(this).parent().remove();
	
	$('#product-product div:odd').attr('class', 'odd');
	$('#product-product div:even').attr('class', 'even');	
});

//--></script> 


<?php echo $footer; ?>