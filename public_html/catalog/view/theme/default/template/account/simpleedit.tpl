<?php 
$simple_page = 'simpleedit';
include $simple->tpl_header();
include $simple->tpl_static();
?>
<div class="simple-content">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="simpleedit">
        <div class="simpleregister edit-simpleregister">
            <?php
                $first_field = reset($customer_fields); 
                $first_field_header = !empty($first_field) && $first_field['type'] == 'header'; 
                $i = 0;
            ?>
            <?php if ($first_field_header) { ?>
                <?php echo $first_field['tag_open'] ?><?php echo $first_field['label'] ?><?php echo $first_field['tag_close'] ?>
            <?php } ?>
                <div class="simpleregister-block-content">
                    <?php foreach ($customer_fields as $field) { ?>
                        <?php if ($field['type'] == 'hidden') { continue; } ?>
                        <?php $i++ ?>
                        <?php if ($field['type'] == 'header') { ?>
                        <?php if ($i == 1) { ?>
                            <?php continue; ?>
                        <?php } else { ?>
                        <?php echo $field['tag_open'] ?><?php echo $field['label'] ?><?php echo $field['tag_close'] ?>
                        <div class="simpleregister-block-content">
                        <?php } ?>
                        <?php } else { ?>
                                    <div class="other-fields">
                                    <?php if ($field['required']) { ?>
                                        <span class="simplecheckout-required">*</span>
                                    <?php } ?>								
                                    <?php echo $simple->html_field($field) ?>
                                    <?php if (!empty($field['error']) && $simple_edit_account) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                                    <?php } ?>
                                    </div>
                        <?php } ?>
                        <?php if ($field['id'] == 'main_email') { ?>
                            <?php if ($simple_account_view_customer_type) { ?>
                                    <?php if ($simple_type_of_selection_of_group == 'select') { ?>
                                    <select name="customer_group_id" onchange="$('#simpleedit').submit();">
                                        <?php foreach ($customer_groups as $id => $name) { ?>
                                        <option value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'selected="selected"' : '' ?>><?php echo $name ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } else { ?>
                                        <?php foreach ($customer_groups as $id => $name) { ?>
                                        <label><input type="radio" name="customer_group_id" onchange="$('#simpleedit').submit();" value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'checked="checked"' : '' ?>><?php echo $name ?></label><br>
                                        <?php } ?>
                                    <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>      
                <?php foreach ($customer_fields as $field) { ?>
                    <?php if ($field['type'] != 'hidden') { continue; } ?>
                    <?php echo $simple->html_field($field) ?>
                <?php } ?>
                <input type="hidden" name="simple_edit_account" id="simple_edit_account" value="">
        <div class="simpleregister-button-block">
			<a href="<?php echo $back; ?>" class="button btn back"><?php echo $button_back; ?></a>
			<a onclick="$('#simple_edit_account').val(1);$('#simpleedit').submit();" class="button btn">Сохранить</a>
        </div>				
            </div>
        </div>
    </form>
</div>
<?php include $simple->tpl_footer() ?>