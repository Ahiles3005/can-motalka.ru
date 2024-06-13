<?php 
$simple_page = 'simpleaddress';
include $simple->tpl_header();
include $simple->tpl_static();
?>
<div class="simple-content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="simpleaddress">
        <div class="simpleregister edit-simpleaddress">
            <?php
                $first_field = reset($address_fields); 
                $first_field_header = !empty($first_field) && $first_field['type'] == 'header'; 
                $i = 0;
            ?>
            <?php if ($first_field_header) { ?>
                <?php echo $first_field['tag_open'] ?><?php echo $first_field['label'] ?><?php echo $first_field['tag_close'] ?>
            <?php } ?>
                <div class="simpleregister-block-content">
                    <?php foreach ($address_fields as $field) { ?>
                        <?php if ($field['type'] == 'hidden') { continue; } ?>
                        <?php $i++ ?>
                        <?php if ($field['type'] == 'header') { ?>
                        <?php if ($i == 1) { ?>
                            <?php continue; ?>
                        <?php } else { ?>
                        <?php echo $field['tag_open'] ?><?php echo $field['label'] ?><?php echo $field['tag_close'] ?>

                        <?php } ?>
                        <?php } else { ?>
   					<div class="other-fields">
                                    <?php if ($field['required']) { ?>
                                        <span class="simplecheckout-required">*</span>
                                    <?php } ?>								
                                    <?php echo $simple->html_field($field) ?>
                                    <?php if (!empty($field['error']) && $simple_edit_address) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                                    <?php } ?>
   					</div>
                        <?php } ?>
                    <?php } ?>      
					<div class="newsletter">
						<span><?php echo $entry_default ?></span>
                            <label><input type="radio" name="default" value="1" <?php echo $default ? ' checked="checked"' : '' ?>><?php echo $text_yes ?></label>
                            <label><input type="radio" name="default" value="0" <?php echo !$default ? ' checked="checked"' : '' ?>><?php echo $text_no ?></label>
   					</div>
                <?php foreach ($address_fields as $field) { ?>
                    <?php if ($field['type'] != 'hidden') { continue; } ?>
                    <?php echo $simple->html_field($field) ?>
                <?php } ?>
                <input type="hidden" name="simple_edit_address" id="simple_edit_address" value="1">
        <div class="simpleregister-button-block buttons">
            <a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a>
            <a onclick="$('#simpleaddress').submit();" class="button">Сохранить</a>
        </div>				
            </div>
        </div>
    </form>
</div>
<?php include $simple->tpl_footer() ?>