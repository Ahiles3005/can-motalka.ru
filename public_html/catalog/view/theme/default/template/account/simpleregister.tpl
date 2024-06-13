<?php 
$simple_page = 'simpleregister';
include $simple->tpl_header();
include $simple->tpl_static();
?>
<div class="simple-content">
    <p class="simpleregister-have-account"><?php echo $text_account_already; ?></p>
	
		<?php	/* start socnetauth2 */
		if( !empty($this->request->get['socnetauth2close']) )
		{
			$this->session->data['socnetauth2_confirmdata_show'] = 0;
		}
		$SOCNETAUTH2_CODE = '';
	if( $this->config->get('socnetauth2_status') )
	{
	
		$http = 'http://';
		if( ( isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ) || 
		  !empty($_SERVER['HTTPS']) )
		{
			$http = 'https://';
		}
	
		$this->session->data['socnetauth2_lastlink'] = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$this->session->data['socnetauth2_lastlink'] = str_replace("checkout/login", "checkout/checkout", $this->session->data['socnetauth2_lastlink']);

		if( !$this->customer->isLogged() ) 
		{			
			if( !empty($this->session->data['socnetauth2_confirmdata']) && 
				!empty($this->session->data['socnetauth2_confirmdata_show']) )
			{
				$data = unserialize( $this->session->data['socnetauth2_confirmdata'] );
				$socnetauth2_confirm_block = $this->config->get('socnetauth2_confirm_block');
				$socnetauth2_confirm_block = str_replace("#divframe_height#", (300-(32*(5-(count(unserialize($this->session->data['socnetauth2_confirmdata'])))))), $socnetauth2_confirm_block );
	
				$socnetauth2_confirm_block = str_replace("#frame_height#", (320-(32*(5-(count(unserialize($this->session->data['socnetauth2_confirmdata'])))))), $socnetauth2_confirm_block);
	
				if( strstr($this->session->data['socnetauth2_lastlink'], "?") )
				$socnetauth2_confirm_block = str_replace("#lastlink#", $this->session->data['socnetauth2_lastlink'].'&socnetauth2close=1', $socnetauth2_confirm_block);
				else
				$socnetauth2_confirm_block = str_replace("#lastlink#", $this->session->data['socnetauth2_lastlink'].'?socnetauth2close=1', $socnetauth2_confirm_block);
	
				$socnetauth2_confirm_block = str_replace("#frame_url#", $this->url->link( 'account/socnetauth2/frame' ), $socnetauth2_confirm_block);
	
				echo $socnetauth2_confirm_block;
			}

			/* start 2105 */
			$socnetauth2_code = unserialize( $this->config->get('socnetauth2_reg_code_'.$this->config->get('socnetauth2_account_format')) );
			$socnetauth2_code = html_entity_decode($socnetauth2_code[ $this->config->get("config_language_id") ]);
			
			$socnetauth2_shop_folder = '';
			if( $this->config->get('socnetauth2_shop_folder') )
				$socnetauth2_shop_folder = '/'.$this->config->get('socnetauth2_shop_folder');
			
			$redirect_url = $http.$_SERVER['HTTP_HOST'].$socnetauth2_shop_folder.'/socnetauth2/loginza.php';
			$redirect_url = urlencode($redirect_url);
			
			$socnetauth2_code = str_replace("#redirect_url#", $redirect_url, $socnetauth2_code);
			/* end 2105 */
			 
			$socnetauth2_label = '';
			
			if( 
				$this->config->get('socnetauth2_label') && !is_array( $this->config->get('socnetauth2_label') ) &&
				stristr($this->config->get('socnetauth2_label'), '{' ) != false &&
				stristr($this->config->get('socnetauth2_label'), '}' ) != false &&
				stristr($this->config->get('socnetauth2_label'), ';' ) != false &&
				stristr($this->config->get('socnetauth2_label'), ':' ) != false
			)
			{
				$socnetauth2_label = unserialize($this->config->get('socnetauth2_label'));
			}
			else
			{
				$socnetauth2_label = $this->config->get('socnetauth2_label');
			}
	
	
			if( !empty($socnetauth2_label[ $this->config->get('config_language_id') ]) )
			{
				$socnetauth2_code = str_replace("#socnetauth2_label#", 
								'<div class="simplereg_socnetauth2_'.$this->config->get('socnetauth2_simplereg_format').'_header">'.$socnetauth2_label[ $this->config->get('config_language_id') ]."</div>", 
								$socnetauth2_code );
			}
			else
			{
				$socnetauth2_code = str_replace("#socnetauth2_label#", "", $socnetauth2_code );
			}
			
			$SOCNETAUTH2_CODE = $socnetauth2_code;
			echo $SOCNETAUTH2_CODE;
		} 
	}
/* end socnetauth2 */ ?>
		
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="simpleregister">
        <div class="simpleregister">
            <?php
                $first_field = reset($customer_fields); 
                $first_field_header = !empty($first_field) && $first_field['type'] == 'header'; 
                $i = 0;
                $j = 0;
            ?>
            <?php if ($first_field_header) { ?>
                <?php echo $first_field['tag_open'] ?><?php echo $first_field['label'] ?><?php echo $first_field['tag_close'] ?>
            <?php } ?>
                <div class="simpleregister-block-content">
                <table class="simplecheckout-customer">
                    <?php foreach ($customer_fields as $field) { ?>
                        <?php if ($field['type'] == 'hidden') { continue; } ?>
                        <?php if ($j == 0 && $simple_registration_view_customer_type) { ?>
                            <tr>

                                <td class="simplecheckout-customer-right">
                                    <?php if ($simple_type_of_selection_of_group == 'select') { ?>
                                    <select name="customer_group_id" onchange="$('#simpleregister').submit();">
                                        <?php foreach ($customer_groups as $id => $name) { ?>
                                        <option value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'selected="selected"' : '' ?>><?php echo $name ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } else { ?>
                                        <?php foreach ($customer_groups as $id => $name) { ?>
                                        <label><input type="radio" name="customer_group_id" onchange="$('#simpleregister').submit();" value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'checked="checked"' : '' ?>><?php echo $name ?></label><br>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $j++; ?>
                        <?php } ?>
                        <?php $i++ ?>
                        <?php if ($field['type'] == 'header') { ?>
                        <?php if ($i == 1) { ?>
                            <?php continue; ?>
                        <?php } else { ?>
                        </table>
                        </div>
                        <?php echo $field['tag_open'] ?><?php echo $field['label'] ?><?php echo $field['tag_close'] ?>
                        <div class="simpleregister-block-content">
                        <table class="simplecheckout-customer">
                        <?php } ?>
                        <?php } else { ?>
                            <tr>

                                <td class="simplecheckout-customer-right">
                                    <?php echo $simple->html_field($field) ?>
                                    <?php if (!empty($field['error']) && $simple_create_account) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php if ($field['id'] == 'main_email') { ?>
                            <?php if ($simple_registration_view_email_confirm) { ?>
                            <tr>

                                <td class="simplecheckout-customer-right">
                                    <input name="email_confirm" id="email_confirm" type="text" value="<?php echo $email_confirm ?>">
                                    <span class="simplecheckout-error-text" id="email_confirm_error" <?php if (!($email_confirm_error && $simple_create_account)) { ?>style="display:none;"<?php } ?>><?php echo $error_email_confirm; ?></span>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr <?php echo $simple_registration_generate_password ? 'style="display:none;"' : '' ?>>

                                <td class="simplecheckout-customer-right">
                                    <input type="password" name="password" placeholder="<?php echo $entry_password ?>" value="<?php echo $password ?>">
                                    <?php if ($error_password && $simple_create_account) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $error_password; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php if ($simple_registration_password_confirm) { ?>
                            <tr <?php echo $simple_registration_generate_password ? 'style="display:none;"' : '' ?>>

                                <td class="simplecheckout-customer-right">
                                    <input type="password" name="password_confirm" value="<?php echo $password_confirm ?>">
                                    <?php if ($error_password_confirm && $simple_create_account) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $error_password_confirm; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($simple_registration_subscribe == 2) { ?>
                        <tr>
                          <td class="simplecheckout-customer-left"><?php echo $entry_newsletter; ?></td>
                          <td class="simplecheckout-customer-right">
                            <label><input type="radio" name="subscribe" value="1" <?php if ($subscribe) { ?>checked="checked"<?php } ?> /><?php echo $text_yes; ?></label>
                            <label><input type="radio" name="subscribe" value="0" <?php if (!$subscribe) { ?>checked="checked"<?php } ?> /><?php echo $text_no; ?></label>
                          </td>
                        </tr>
                    <?php } ?>
                    <?php if ($simple_registration_captcha) { ?>
                        <tr>

                            <td class="simplecheckout-customer-right">
                                <input type="text" name="captcha" value="" placeholder="<?php echo $entry_captcha ?>" />
                                <?php if ($error_captcha && $simple_create_account) { ?>
                                    <span class="simplecheckout-error-text"><?php echo $error_captcha; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>

                          <td class="simplecheckout-customer-right"><img src="index.php?<?php echo $simple->tpl_joomla_route() ?>route=product/product/captcha" alt="" id="captcha" /></td>
                        </tr>
                    <?php } ?>
                </table>				
                <span>* - Поля, обязательные для заполнения</span>
				<?php if ($simple_registration_agreement_checkbox) { ?><label><input type="checkbox" name="agree" value="1" <?php if ($agree == 1) { ?>checked="checked"<?php } ?> /><?php echo $text_agree; ?></label>&nbsp;<?php } ?><a onclick="$('#simple_create_account').val(1);$('#simpleregister').submit();" class="btns c-button"><span>Зарегистрировать</span></a>
				<?php foreach ($customer_fields as $field) { ?>
                    <?php if ($field['type'] != 'hidden') { continue; } ?>
                    <?php echo $simple->html_field($field) ?>
                <?php } ?>
                <input type="hidden" name="simple_create_account" id="simple_create_account" value="">
            </div>
        </div>
    </form>
</div>
<?php include $simple->tpl_footer() ?>