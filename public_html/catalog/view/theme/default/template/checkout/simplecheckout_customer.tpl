<div class="simplecheckout-block-heading-first" <?php echo $simple_customer_hide_if_logged ? 'style="display:none"' : '' ?>>
    <?php echo $text_checkout_customer ?>
    <?php if ($simple_customer_view_login) { ?>
    <span class="simplecheckout-block-heading-button">
        <a href="<?php echo $default_login_link ?>" <?php if (!$is_mobile) { ?>onclick="simple_login_open();return false;"<?php } ?> id="simplecheckout_customer_login"><?php echo $text_checkout_customer_login ?></a>
    </span>
    <?php } ?>
</div>  

<?php /* start socnetauth2 */
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
			$socnetauth2_code = unserialize( $this->config->get('socnetauth2_checkout_code_'.$this->config->get('socnetauth2_account_format')) );
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
								'<div class="simple_socnetauth2_'.$this->config->get('socnetauth2_simple_format').'_header">'.$socnetauth2_label[ $this->config->get('config_language_id') ]."</div>", 
								$socnetauth2_code );
			}
			else
			{
				$socnetauth2_code = str_replace("#socnetauth2_label#", "", $socnetauth2_code );
			}
			
			$SOCNETAUTH2_CODE = $socnetauth2_code;
		} 
	} 
	?><?php echo $SOCNETAUTH2_CODE; ?>
<?php /* end socnetauth2 */ ?>


<div class="simplecheckout-block-content" <?php echo $simple_customer_hide_if_logged ? 'style="display:none"' : '' ?>>
    <?php if ($simple_customer_registered) { ?>
        <div class="success" id="customer_registered" style="text-align:left;"><?php echo $simple_customer_registered ?></div>
    <?php } ?>
    <?php if ($text_you_will_be_registered) { ?>
        <div class="you-will-be-registered"><?php echo $text_you_will_be_registered ?></div>
    <?php } ?>
    <?php if ($simple_customer_view_address_select && !empty($addresses)) { ?>
        <div class="simplecheckout-customer-address">
        <span><?php echo $text_select_address ?>:</span>&nbsp;
        <select name='customer_address_id' id="customer_address_id" reload='address_changed'>
            <option value="0" <?php echo $customer_address_id == 0 ? 'selected="selected"' : '' ?>><?php echo $text_add_new ?></option>
            <?php foreach($addresses as $address) { ?>
                <option value="<?php echo $address['address_id'] ?>" <?php echo $customer_address_id == $address['address_id'] ? 'selected="selected"' : '' ?>><?php echo $address['firstname']; ?> <?php echo !empty($address['lastname']) ? ' '.$address['lastname'] : ''; ?><?php echo !empty($address['address_1']) ? ', '.$address['address_1'] : ''; ?><?php echo !empty($address['city']) ? ', '.$address['city'] : ''; ?></option>
            <?php } ?>
        </select>
        </div>
    <?php } ?>
    <input type="hidden" name="<?php echo Simple::SET_CHECKOUT_CUSTOMER ?>[address_id]" id="customer_address_id" value="<?php echo $customer_address_id ?>" />
    <?php $split_previous = false; ?>
    <?php $user_choice = false; ?>
    <div class="simplecheckout-customer-block">
    <table class="<?php echo $simple_customer_two_column ? 'simplecheckout-customer-two-column-left' : 'simplecheckout-customer-one-column' ?>">
        <?php $email_field_exists = false; ?>
        <?php $i = 0; ?>
        <?php $geo_selector_used = false; ?>
        <?php foreach ($checkout_customer_fields as $field) { ?>
            <?php if ($i == 0 && !$customer_logged && $simple_customer_action_register == Simple::REGISTER_USER_CHOICE) { ?>
                <tr>
                    <td class="simplecheckout-customer-right reg-site">
					<span class="reg-site"><?php echo $entry_register; ?></span>
                      <label><input type="radio" name="register" value="1" <?php echo $register == 1 ? 'checked="checked"' : ''; ?> reload="customer_register" /><?php echo $text_yes ?></label>&nbsp;
                      <label><input type="radio" name="register" value="0" <?php echo $register == 0 ? 'checked="checked"' : ''; ?> reload="customer_not_register" /><?php echo $text_no ?></label>
                    </td>
                </tr>
                <?php $user_choice = true; ?>
            <?php $i++ ?>
            <?php } ?>
            <?php if ($field['type'] == 'hidden') { ?>
                <?php continue; ?>
            <?php } elseif ($field['type'] == 'header') { ?>
            <tr class="simple_table_row" <?php echo !empty($field['place']) ? 'place="'.$field['place'].'"' : '' ?>>
                <td colspan="2" <?php echo $user_choice && $split_previous ? 'class="simple-header-right"' : ''; ?>>
                    <?php echo $field['tag_open'] ?><?php echo $field['label'] ?><?php echo $field['tag_close'] ?>
                </td>
            </tr>
            <?php } elseif ($field['type'] == 'split') { ?>
                </table>
                <table class="<?php echo $simple_customer_two_column ? 'simplecheckout-customer-two-column-right' : 'simplecheckout-customer-one-column' ?>">
                <?php $split_previous = true; ?>
            <?php } else { ?>
                <?php if ((($user_choice && $i == 1) || (!$user_choice && $i == 0)) && $simple_customer_view_customer_type) { ?>
                    <tr>
                        <td class="simplecheckout-customer-right">
						<span class="simplecheckout-required">*</span>
                            <?php if ($simple_type_of_selection_of_group == 'select') { ?>
                            <select name="customer_group_id" reload="group_changed">
                                <?php foreach ($customer_groups as $id => $name) { ?>
                                <option value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'selected="selected"' : '' ?>><?php echo $name ?></option>
                                <?php } ?>
                            </select>
                            <?php } else { ?>
                                <?php foreach ($customer_groups as $id => $name) { ?>
                                <label><input type="radio" name="customer_group_id" reload="group_changed" value="<?php echo $id ?>" <?php echo $id == $customer_group_id ? 'checked="checked"' : '' ?>><?php echo $name ?></label><br>
                                <?php } ?>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    <?php $split_previous = false; ?>
                <?php } ?>
                <?php if ($field['id'] == 'main_email') { ?>
                    <?php if (!$customer_logged) { ?>
                        <?php if (!$simple_customer_action_register &&  !$simple_customer_view_email && !$simple_customer_view_customer_type) { continue; } ?>
                        <?php $split_previous = false; ?>
                        <?php if (!($simple_customer_view_email == Simple::EMAIL_NOT_SHOW && ($simple_customer_action_register == Simple::REGISTER_NO || ($simple_customer_action_register == Simple::REGISTER_USER_CHOICE && !$register)))) { ?>
                        <?php $email_field_exists = true; ?>
                        <tr>
                            <td class="simplecheckout-customer-right">
                                <?php if ($field['required']) { ?>
                                    <span class="simplecheckout-required" <?php echo ($simple_customer_view_email == Simple::EMAIL_SHOW_AND_NOT_REQUIRED && ($simple_customer_action_register == Simple::REGISTER_NO || ($simple_customer_action_register == Simple::REGISTER_USER_CHOICE && !$register))) ? ' style="display:none"' : '' ?>>*</span>
                                <?php } ?>								
                                <?php echo $simple->html_field($field) ?>
                                <?php if (!empty($field['error']) && $simple_show_errors) { ?>
                                    <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php if ($simple_customer_view_email_confirm) { ?>
                        <tr>
                            <td class="simplecheckout-customer-right">
                                <?php if ($field['required']) { ?>
                                    <span class="simplecheckout-required" <?php echo ($simple_customer_view_email == Simple::EMAIL_SHOW_AND_NOT_REQUIRED && ($simple_customer_action_register == Simple::REGISTER_NO || ($simple_customer_action_register == Simple::REGISTER_USER_CHOICE && !$register))) ? ' style="display:none"' : '' ?>>*</span>
                                <?php } ?>
                                <?php echo $entry_email_confirm ?>							
                                <input name="email_confirm" id="email_confirm" type="text" value="<?php echo $email_confirm ?>">
                                <span class="simplecheckout-error-text" id="email_confirm_error" <?php if (!($email_confirm_error && $simple_show_errors)) { ?>style="display:none;"<?php } ?>><?php echo $error_email_confirm; ?></span>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php if ($simple_customer_action_register == Simple::REGISTER_YES || ($simple_customer_action_register == Simple::REGISTER_USER_CHOICE && $register)) { ?>
                            <tr id="password_row" <?php echo $simple_customer_generate_password ? ' style="display:none;"' : '' ?> <?php echo $simple_customer_generate_password ? 'autogenerate="1"' : '' ?>>
                                <td class="simplecheckout-customer-right">
								<span class="simplecheckout-required">*</span>
                                    <input <?php echo !empty($error_password) ? 'class="simplecheckout-red-border"' : '' ?> type="password" name="password" value="<?php echo $password ?>">
                                    <?php if (!empty($error_password) && $simple_show_errors) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $error_password; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php if ($simple_customer_view_password_confirm) { ?>
                            <tr id="confirm_password_row" <?php echo $simple_customer_generate_password ? ' style="display:none;"' : '' ?> <?php echo $simple_customer_generate_password ? 'autogenerate="1"' : '' ?>>
                                <td class="simplecheckout-customer-right">
								<span class="simplecheckout-required">*</span>
                                    <input <?php echo !empty($error_password_confirm) ? 'class="simplecheckout-red-border"' : '' ?> type="password" name="password_confirm" value="<?php echo $password_confirm ?>">
                                    <?php if (!empty($error_password_confirm) && $simple_show_errors) { ?>
                                        <span class="simplecheckout-error-text"><?php echo $error_password_confirm; ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($customer_logged) { continue; } ?>
                <?php } else { ?>
                    <tr class="simple_table_row <?php echo !empty($field['selector']) ? ' simple-geo-selector-customer' : '' ?>" <?php echo !empty($field['place']) ? 'place="'.$field['place'].'"' : '' ?><?php echo !empty($field['selector']) ? ' style="display:none;"' : '' ?>>
                        <td class="simplecheckout-customer-right">
                            <?php if ($field['required']) { ?>
                                <span class="simplecheckout-required">*</span>
                            <?php } ?>						
                            <?php echo $simple->html_field($field) ?>
                            <?php if (!empty($field['error']) && $simple_show_errors) { ?>
                                <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $split_previous = false; ?>
                    <?php $geo_selector_used = $geo_selector_used || !empty($field['selector']); ?>
                <?php } ?>
                <?php $i++; ?>
            <?php } ?>
        <?php } ?>
        <?php if ($geo_selector_used) { ?>
            <tr id="simple_geo_selector_customer">
                <td colspan="2" style="text-align:center;">
                    <a onclick="simplecheckout_show_selector('customer');"><?php echo $text_show_selector ?></a>
                </td>
            </tr>
        <?php } ?>
        <?php if ($simple_customer_action_subscribe == Simple::SUBSCRIBE_USER_CHOICE && $email_field_exists) { ?>
            <tr id="subscribe_row"<?php echo $simple_customer_action_register == Simple::REGISTER_USER_CHOICE && !$register && !$simple_customer_view_email ? ' style="display:none;"' : '' ?>>
                <td class="simplecheckout-customer-right newsletter">
				<span class="newsletter"><?php echo $entry_newsletter; ?></span>
                  <label><input type="radio" name="subscribe" value="1" <?php echo $subscribe == 1 ? 'checked="checked"' : ''; ?> /><?php echo $text_yes ?></label>&nbsp;
                  <label><input type="radio" name="subscribe" value="0" <?php echo $subscribe == 0 ? 'checked="checked"' : ''; ?> /><?php echo $text_no ?></label>
                </td>
            </tr>
        <?php } ?>
		<tr><td class="desc">Фамилия, Имя, Отчество и телефон нужны нам для оформления посылки. Так же мы свяжемся с Вами для подтверждения заказа. После отправки Вам придет смс с трек-номером посылки.</td></tr>
    </table>
    <?php foreach ($checkout_customer_fields as $field) { ?>
        <?php if ($field['type'] == 'hidden') { ?>
        <?php echo $simple->html_field($field) ?>
        <?php } ?>
    <?php } ?>
    </div>
</div>

<?php if ($simple_show_shipping_address) { ?>
<div class="simplecheckout-customer-same-address">
<?php if ($simple_show_shipping_address_same_show) { ?>
    <label><input type="checkbox" name="shipping_address_same" id="shipping_address_same" value="1" <?php if ($shipping_address_same) { ?>checked="checked"<?php } ?> reload="address_same">&nbsp;<?php echo $entry_address_same ?></label>
<?php } ?>
</div>
<?php if (!$shipping_address_same) { ?>
<div class="simplecheckout-block-heading simplecheckout-shipping-address" <?php echo $simple_address_hide_if_logged ? 'style="display:none"' : '' ?>>
    <?php echo $text_checkout_shipping_address ?>
</div>  
<div class="simplecheckout-block-content simplecheckout-shipping-address" <?php echo $simple_address_hide_if_logged ? 'style="display:none"' : '' ?>>
    <?php if ($simple_shipping_view_address_select && !empty($addresses)) { ?>
        <div class="simplecheckout-customer-address">
        <span><?php echo $text_select_address ?>:</span>&nbsp;
        <select name='shipping_address_id' id="shipping_address_id" reload='address_changed'>
            <option value="0" <?php echo $shipping_address_id == 0 ? 'selected="selected"' : '' ?>><?php echo $text_add_new ?></option>
            <?php foreach($addresses as $address) { ?>
                <option value="<?php echo $address['address_id'] ?>" <?php echo $shipping_address_id == $address['address_id'] ? 'selected="selected"' : '' ?>><?php echo $address['firstname']; ?> <?php echo !empty($address['lastname']) ? ' '.$address['lastname'] : ''; ?><?php echo !empty($address['address_1']) ? ', '.$address['address_1'] : ''; ?><?php echo !empty($address['city']) ? ', '.$address['city'] : ''; ?></option>
            <?php } ?>
        </select>
        </div>
    <?php } ?>
    <input type="hidden" name="<?php echo Simple::SET_CHECKOUT_ADDRESS ?>[address_id]" id="shipping_address_id" value="<?php echo $shipping_address_id ?>" />
    <div class="simplecheckout-customer-block">
    <table class="<?php echo $simple_customer_two_column ? 'simplecheckout-customer-two-column-left' : 'simplecheckout-customer-one-column' ?>">
        <?php $geo_selector_used = false; ?>
        <?php foreach ($checkout_address_fields as $field) { ?>
            <?php if ($field['type'] == 'hidden') { ?>
                <?php continue; ?>
            <?php } elseif ($field['type'] == 'header') { ?>
            <tr class="simple_table_row" <?php echo !empty($field['place']) ? 'place="'.$field['place'].'"' : '' ?>>
                <td colspan="2">
                    <?php echo $field['tag_open'] ?><?php echo $field['label'] ?><?php echo $field['tag_close'] ?>
                </td>
            </tr>
            <?php } elseif ($field['type'] == 'split') { ?>
                </table>
                <table class="<?php echo $simple_customer_two_column ? 'simplecheckout-customer-two-column-right' : 'simplecheckout-customer-one-column' ?>">
            <?php } else { ?>
            <tr class="simple_table_row <?php echo !empty($field['selector']) ? ' simple-geo-selector-address' : '' ?>" <?php echo !empty($field['place']) ? 'place="'.$field['place'].'"' : '' ?><?php echo !empty($field['selector']) ? ' style="display:none;"' : '' ?>>
                <td class="simplecheckout-customer-right">
                    <?php if ($field['required']) { ?>
                        <span class="simplecheckout-required">*</span>
                    <?php } ?>				
                    <?php echo $simple->html_field($field) ?>
                    <?php if (!empty($field['error']) && $simple_show_errors) { ?>
                        <span class="simplecheckout-error-text"><?php echo $field['error']; ?></span>
                    <?php } ?>
                </td>
            </tr>
            <?php $geo_selector_used = $geo_selector_used || !empty($field['selector']); ?>
            <?php } ?>
        <?php } ?>
        <?php if ($geo_selector_used) { ?>
            <tr id="simple_geo_selector_address">
                <td colspan="2" style="text-align:center;">
                    <a onclick="simplecheckout_show_selector('address');"><?php echo $text_show_selector ?></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php foreach ($checkout_address_fields as $field) { ?>
        <?php if ($field['type'] == 'hidden') { ?>
        <?php echo $simple->html_field($field) ?>
        <?php } ?>
    <?php } ?>
    </div>
</div>
<?php } ?>
<?php } ?>
<?php if ($simple_debug) print_r($customer); ?>
<?php if ($simple_debug) print_r($comment); ?>