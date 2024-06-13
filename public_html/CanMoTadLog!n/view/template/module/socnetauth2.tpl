<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
      <div class="buttons">
	  
	  <a onclick="document.getElementById('stay_field').value='0'; $('#form').submit();" class="button"
	  ><span><?php echo $button_save_and_go; ?></span></a>
	  <a onclick="set_tab(); document.getElementById('stay_field').value='1'; $('#form').submit();" class="button"
	  ><span><?php echo $button_save_and_stay; ?></span></a>
	  
	  <a onclick="location = '<?php echo $cancel; ?>';" class="button"
	  ><span><?php echo $button_cancel; ?></span></a>
	  
	  </div>
    <div class="heading">
      <h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
    </div>	  
	  <style>
	  .clist 
	  {
		border-top:  1px #ccc solid;
		border-left:  1px #ccc solid;
	  }
	  
	  .clist td
	  {
		padding: 5px;
		border-right: 1px #ccc solid;
		border-bottom: 1px #ccc solid;
	  }
	  
	  .plus
	  {
		background: green;
		text-align: center;
	  }
	  
	  .minus
	  {
		background: #F58C6C;
		text-align: center;
	  }
	  
	  .vopros
	  {
		text-align: center;
	  }
	  </style>
	  
	<script>
		function set_tab()
		{
			if( $('#link-tab-general').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-general';
			}
			
			if( $('#link-tab-vkontakte').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-vkontakte';
			}
			
			if( $('#link-tab-facebook').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-facebook';
			}
			
			if( $('#link-tab-twitter').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-twitter';
			}
			
			if( $('#link-tab-odnoklassniki').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-odnoklassniki';
			}
			/* start metka: a1 */
			if( $('#link-tab-gmail').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-gmail';
			}
			
			if( $('#link-tab-mailru').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-mailru';
			}
			/* end metka: a1 */
			
			
			/* start 1811 */
			if( $('#link-tab-steam').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-steam';
			}
			if( $('#link-tab-yandex').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-yandex';
			} 
			
			
			if( $('#link-tab-instagram').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-instagram';
			} 
			/* end 1811 */
			
			if( $('#link-tab-dobor').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-dobor';
			}
			
			if( $('#link-tab-design').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-design';
			}
			
			if( $('#link-tab-support').attr('class') == 'selected' )
			{
				document.getElementById('hiddentab').value = 'link-tab-support';
			}
		}
		
	$.fn.tabs = function() {
	var selector = this;
	
	this.each(function() {
		var obj = $(this); 
		
		$(obj.attr('href')).hide();
		
		$(obj).click(function() {
			$(selector).removeClass('selected');
			
			$(selector).each(function(i, element) {
				$($(element).attr('href')).hide();
			});
			
			$(this).addClass('selected');
			
			$($(this).attr('href')).show();
			
			return false;
		});
	});

	$(this).show();
	
	$(this).first().click();
};
	</script>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
		<input type="hidden" id="stay_field" name="stay" value="1">
		<input type="hidden" id="hiddentab" name="tab" value="<?php echo $tab; ?>">
		
		
		<?php /* start 1505 */ ?>
		<input type="hidden" id="hiddentab2" name="tab2" value="<?php echo $tab2; ?>">
		<?php /* end 1505 */ ?>
		
		<div id="tabs" class="htabs">
			<a href="#tab-general" style="font-size:11px;font-weight:500" id="link-tab-general"><?php echo $tab_general; ?></a>
			
			<a href="#tab-design" style="font-size:11px;font-weight:500"   id="link-tab-design"><?php echo $tab_design; ?></a>
			
		    <a href="#tab-vkontakte" style="font-size:11px;font-weight:500" id="link-tab-vkontakte"><?php echo $tab_vkontakte; ?></a>
		    <a href="#tab-facebook" style="font-size:11px;font-weight:500" id="link-tab-facebook"><?php echo $tab_facebook; ?></a>
		    <a href="#tab-twitter" style="font-size:11px;font-weight:500" id="link-tab-twitter"><?php echo $tab_twitter; ?></a>
		    <a href="#tab-odnoklassniki" style="font-size:11px;font-weight:500" id="link-tab-odnoklassniki"><?php echo $tab_odnoklassniki; ?></a>
			<?php /* start metka: a1 */ ?>
		    <a href="#tab-gmail" style="font-size:11px;font-weight:500" id="link-tab-gmail"><?php echo $tab_gmail; ?></a>
		    <a href="#tab-mailru" style="font-size:11px;font-weight:500" id="link-tab-gmail"><?php echo $tab_mailru; ?></a>
			<?php /* end metka: a1 */ ?>
			<?php /* start 1811 */ ?>
			<a href="#tab-yandex" style="font-size:11px;font-weight:500" id="link-tab-yandex"><?php echo $tab_yandex; ?></a>
		    <a href="#tab-steam" style="font-size:11px;font-weight:500" id="link-tab-steam"><?php echo $tab_steam; ?></a>
			<?php /* end 1811 */ ?>
			
			<?php /* start 0207 */ ?>
			<a href="#tab-instagram" style="font-size:11px;font-weight:500" id="link-tab-instagram"><?php echo $tab_instagram; ?></a>
			<?php /* end 0207 */ ?>
           
			
			<a href="#tab-dobor" style="font-size:11px;font-weight:500" id="link-tab-dobor"><?php echo $tab_dobor; ?></a>
			<a href="#tab-support" style="font-size:11px;font-weight:500" id="link-tab-support"><?php echo $tab_support; ?></a>
		</div>
      
	  
	  <div id="tab-general">
	  
        <table class="form">
		<tr>
			<td><?php echo $entry_version; ?></td>
			<td>2.78
			</td>
		</tr>
		<tr>
			<td><?php echo $entry_status; ?></td>
			<td><select name="socnetauth2_status">
                  <?php if ( $socnetauth2_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
		</tr>
		<tr>
			<td><?php echo $entry_protokol; ?></td>
			<td>
				<select name="socnetauth2_protokol" class="form-control">
					<option value="http"
					<?php if( $socnetauth2_protokol=='http' ) { ?> selected <?php } ?>
					>http://</option>
					<option value="https"
					<?php if( $socnetauth2_protokol=='https' ) { ?> selected <?php } ?>
					>https://</option>
					<option value="detect"
					<?php if( $socnetauth2_protokol=='detect' ) { ?> selected <?php } ?>
					><?php echo $entry_protokol_detect; ?></option>
				</select></td>
		</tr>
		</table>
		
		<table class="form">
		<tr>
			<td><?php echo $entry_save_to_addr; ?></td>
			<td>
				<select name="socnetauth2_save_to_addr">
					<option value="customer_addr"
					<?php if( $socnetauth2_save_to_addr=='customer_addr' ) { ?> selected <?php } ?>
					><?php echo $text_customer_addr; ?></option>
					<option value="customer_only"
					<?php if( $socnetauth2_save_to_addr=='customer_only' ) { ?> selected <?php } ?>
					><?php echo $text_customer_only; ?></option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td><?php echo $entry_default_country; ?></td>
			<td>
				<select name="socnetauth2_default_country" class="form-control">
					<option value="0"><?php echo $text_no_country; ?></option>
					<?php foreach ($countries as $country) { ?>
					<?php if ($country['country_id'] == $socnetauth2_default_country) { ?>
					<option value="<?php echo $country['country_id']; ?>" selected="selected"
						><?php echo $country['name']; ?></option>
					<?php } else { ?>
					<option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
					<?php } ?>
					<?php } ?>
				</select>
				<?php echo $entry_default_country_notice; ?>
			</td>
		</tr>
		
		<tr>
			<td><?php echo $entry_shop_folder; ?></td>
			<td>
				<input type="text" name="socnetauth2_shop_folder" 
						value="<?php echo $socnetauth2_shop_folder; ?>" />
			</td>
		</tr>
		
		<tr>
			<td><?php echo $entry_email_auth; ?></td>
			<td>
				<p><input type="radio" name="socnetauth2_email_auth" value="none" 
					   id="socnetauth2_email_auth_none"
					   <?php if( $socnetauth2_email_auth == 'none' ) { ?> checked <?php } ?>
					   
					   >
					   <label for="socnetauth2_email_auth_none">
						<?php echo $entry_email_auth_none; ?>
					   </label></p>
				<p><input type="radio" name="socnetauth2_email_auth" value="confirm" 
					   id="socnetauth2_email_auth_confirm"
					   <?php if( $socnetauth2_email_auth == 'confirm' ) { ?> checked <?php } ?>
					   >
					   <label for="socnetauth2_email_auth_confirm">
						<?php echo $entry_email_auth_confirm; ?>
					   </label></p>
				<p><input type="radio" name="socnetauth2_email_auth" value="noconfirm" 
					   id="socnetauth2_email_auth_noconfirm"
					   <?php if( $socnetauth2_email_auth == 'noconfirm' ) { ?> checked <?php } ?>
					   >
					   <label for="socnetauth2_email_auth_noconfirm">
						<?php echo $entry_email_auth_noconfirm; ?>
					   </label></p>
			
			</td>
		</tr>
		
			
		<?php /* start 0902 * / ?>
		
            <tr>
				<td><?php echo $entry_addpass; ?></td>
				<td><select name="socnetauth2_addpass" class="form-control" >
                  <?php if ( $socnetauth2_addpass ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<p><?php echo $entry_addpass_notice; ?></p></td>
			</tr>
		<?php /* end 0902 */ ?>
			
			
			
			<?php /* start kin update: r1 */ ?>
			
            <tr>
				<td><?php echo $entry_vkontakte_retargeting; ?></td>
				<td><a href="<?php echo $vkontakte_retargeting; ?>"><?php echo $text_download_link; ?></a></td>
			</tr>
            <tr>
				<td><?php echo $entry_facebook_retargeting; ?></td>
				<td><a href="<?php echo $facebook_retargeting; ?>"><?php echo $text_download_link; ?></a></td>
			</tr>
			
			
			<?php /* end kin update: r1 */ ?>
		<tr>
			<td colspan=2><b><?php echo $entry_admin_header; ?></b></td>
		</tr>
		<tr>
			<td><?php echo $entry_admin_customer; ?></td>
			<td><input type="checkbox" name="socnetauth2_admin_customer" value="1"
				<?php if($socnetauth2_admin_customer) { ?> checked <?php } ?>
			></td>
		</tr>		
		<tr>
			<td><?php echo $entry_admin_customer_list; ?></td>
			<td><input type="checkbox" name="socnetauth2_admin_customer_list" value="1"
				<?php if($socnetauth2_admin_customer_list) { ?> checked <?php } ?>
			></td>
		</tr>		
		<tr>
			<td><?php echo $entry_admin_order; ?></td>
			<td><input type="checkbox" name="socnetauth2_admin_order" value="1"
				<?php if($socnetauth2_admin_order) { ?> checked <?php } ?>
			></td>
		</tr>		
		<tr>
			<td><?php echo $entry_admin_order_list; ?></td>
			<td><input type="checkbox" name="socnetauth2_admin_order_list" value="1"
				<?php if($socnetauth2_admin_order_list) { ?> checked <?php } ?>
			></td>
		</tr>		
		
		</table>
	  </div>
	  
	  
	  
	  
	  <div id="tab-vkontakte">
		<p>Инструкция по интергации с ВКонтакте по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-vkontakte" target=_blank>https://softpodkluch.ru/socnetauth2-vkontakte</a>
		</p>
		
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_vkontakte_status; ?></td>
				<td>
				<select name="socnetauth2_vkontakte_status">
                  <?php if ( $socnetauth2_vkontakte_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
            <tr>
				<td><?php echo $entry_vkontakte_agent; ?></td>
				<td>
				<select name="socnetauth2_vkontakte_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_vkontakte_agent_extension').show(); } else { $('#block_vkontakte_agent_extension').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_vkontakte_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_vkontakte_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_vkontakte_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_vkontakte_agent_loginza; ?></option>
                </select>
				<div><?php echo $entry_vkontakte_agent_notice; ?></div>
				</td>
			</tr>
            <tr>
				<td><?php echo $entry_vkontakte_customer_group_id; ?></td>
				<td><select name="socnetauth2_vkontakte_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_vkontakte_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_vkontakte_debug"  >
                  <?php if ( $socnetauth2_vkontakte_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				
				<div><?php echo $text_debug_notice; ?></div>
				</td>
			</tr>
		<?php /* end r3 */ ?>
			<?php /* end kin update: n1 */ ?>
		</table>
		
		<?php /* start 0207 */ ?>
		<div id="block_vkontakte_agent_extension"
		<?php if ( $socnetauth2_vkontakte_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="vkontakte_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_vkontakte_appid; ?></td>
              <td class="left"><?php echo $entry_vkontakte_appsecret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="vkontakte_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_vkontakte_appid"  
				value="<?php echo $socnetauth2_vkontakte_appid; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_vkontakte_appsecret"  
				value="<?php echo $socnetauth2_vkontakte_appsecret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $vkontakte_req_row = 0; ?>
          <?php foreach ($socnetauth2_vkontakte_req as $req) { ?>
          <tbody id="vkontakte_req-row<?php echo $vkontakte_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_vkontakte_req[<?php echo $vkontakte_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_vkontakte_req[<?php echo $vkontakte_req_row; 
				 ?>][appid]"  
				value="<?php echo $req['appid']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_vkontakte_req[<?php echo $vkontakte_req_row; 
				 ?>][appsecret]"  
				value="<?php echo $req['appsecret']; ?>" />
			  </td>
			  <td><a onclick="$('#vkontakte_req-row<?php echo $vkontakte_req_row; 
				 ?>').remove();"  class="button"
				 ><span><?php echo $button_remove; ?></span></a></td>
			</tr> 
          </tbody>
          <?php $vkontakte_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addVkontakteReq();" class="button"
			  ><span><?php echo $button_add; ?></span></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var vkontakte_req_row = <?php echo $vkontakte_req_row; ?>;
		
		function addVkontakteReq()
		{
			html = '';
			
			html += '<tbody id="vkontakte_req-row'+vkontakte_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_vkontakte_req['+vkontakte_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_vkontakte_req['+vkontakte_req_row+'][appid]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_vkontakte_req['+vkontakte_req_row+'][appsecret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#vkontakte_req-row'+vkontakte_req_row+'\').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#vkontakte_req tfoot').before(html);
			
			vkontakte_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
		
		
		
	  </div>
	  <div id="tab-facebook">	
		<p>Инструкция по интергации с Facebook по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-facebook" target=_blank>https://softpodkluch.ru/socnetauth2-facebook</a>
		</p>
	
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_facebook_status; ?></td>
				<td>
				<select name="socnetauth2_facebook_status">
                  <?php if ( $socnetauth2_facebook_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_facebook_agent; ?></td>
				<td>
				
				<select name="socnetauth2_facebook_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_facebook_agent_extension').show(); $('#block_facebook_agent_notice').show(); } else { $('#block_facebook_agent_extension').hide(); $('#block_facebook_agent_notice').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_facebook_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_facebook_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_facebook_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_facebook_agent_loginza; ?></option>
                </select>
				<div
				id="block_facebook_agent_notice"
		<?php if ( $socnetauth2_facebook_agent == 'loginza' ) { ?> 
		style="display: none;" <?php } ?>
				><?php echo $entry_facebook_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_facebook_customer_group_id; ?></td>
				<td><select name="socnetauth2_facebook_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_facebook_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
		<?php /* start r3 */ ?>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_facebook_debug"  >
                  <?php if ( $socnetauth2_facebook_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td>
			</tr>
		<?php /* end r3 */ ?>
			<?php /* end kin update: n1 */ ?>
			
		</table>
	  
		<?php /* start 0207 */ ?>
		<div id="block_facebook_agent_extension"
		<?php if ( $socnetauth2_facebook_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="facebook_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_facebook_appid; ?></td>
              <td class="left"><?php echo $entry_facebook_appsecret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="facebook_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_facebook_appid"  
				value="<?php echo $socnetauth2_facebook_appid; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_facebook_appsecret"  
				value="<?php echo $socnetauth2_facebook_appsecret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $facebook_req_row = 0; ?>
          <?php foreach ($socnetauth2_facebook_req as $req) { ?>
          <tbody id="facebook_req-row<?php echo $facebook_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_facebook_req[<?php echo $facebook_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_facebook_req[<?php echo $facebook_req_row; 
				 ?>][appid]"  
				value="<?php echo $req['appid']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_facebook_req[<?php echo $facebook_req_row; 
				 ?>][appsecret]"  
				value="<?php echo $req['appsecret']; ?>" />
			  </td>
			  <td><a onclick="$('#facebook_req-row<?php echo $facebook_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $facebook_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addfacebookReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var facebook_req_row = <?php echo $facebook_req_row; ?>;
		
		function addfacebookReq()
		{
			html = '';
			
			html += '<tbody id="facebook_req-row'+facebook_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_facebook_req['+facebook_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_facebook_req['+facebook_req_row+'][appid]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_facebook_req['+facebook_req_row+'][appsecret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#facebook_req-row'+facebook_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#facebook_req tfoot').before(html);
			
			facebook_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
	  </div>
	  <div id="tab-twitter">
		<p>Инструкция по интергации с Twitter по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-twitter" target=_blank>https://softpodkluch.ru/socnetauth2-twitter</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_twitter_status; ?></td>
				<td>
				<select name="socnetauth2_twitter_status">
                  <?php if ( $socnetauth2_twitter_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_twitter_agent; ?></td>
				<td>
				<select name="socnetauth2_twitter_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_twitter_agent_extension').show(); $('#block_twitter_agent_notice').show(); } else { $('#block_twitter_agent_extension').hide(); $('#block_twitter_agent_notice').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_twitter_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_twitter_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_twitter_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_twitter_agent_loginza; ?></option>
                </select>
				<div
				id="block_twitter_agent_notice"
		<?php if ( $socnetauth2_twitter_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
				><?php echo $entry_twitter_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_twitter_customer_group_id; ?></td>
				<td><select name="socnetauth2_twitter_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_twitter_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
		<?php /* start r3 */ ?>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_twitter_debug"  >
                  <?php if ( $socnetauth2_twitter_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td>
			</tr>
		<?php /* end r3 */ ?>
			<?php /* end kin update: n1 */ ?>
		</table>
	  
	  
		<?php /* start 0207 */ ?>
		<div id="block_twitter_agent_extension"
		<?php if ( $socnetauth2_twitter_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="twitter_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_twitter_consumer_key; ?></td>
              <td class="left"><?php echo $entry_twitter_consumer_secret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="twitter_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_twitter_consumer_key"  
				value="<?php echo $socnetauth2_twitter_consumer_key; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_twitter_consumer_secret"  
				value="<?php echo $socnetauth2_twitter_consumer_secret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $twitter_req_row = 0; ?>
          <?php foreach ($socnetauth2_twitter_req as $req) { ?>
          <tbody id="twitter_req-row<?php echo $twitter_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_twitter_req[<?php echo $twitter_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_twitter_req[<?php echo $twitter_req_row; 
				 ?>][consumer_key]"  
				value="<?php echo $req['consumer_key']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_twitter_req[<?php echo $twitter_req_row; 
				 ?>][consumer_secret]"  
				value="<?php echo $req['consumer_secret']; ?>" />
			  </td>
			  <td><a onclick="$('#twitter_req-row<?php echo $twitter_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $twitter_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addtwitterReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var twitter_req_row = <?php echo $twitter_req_row; ?>;
		
		function addtwitterReq()
		{
			html = '';
			
			html += '<tbody id="twitter_req-row'+twitter_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_twitter_req['+twitter_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_twitter_req['+twitter_req_row+'][consumer_key]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_twitter_req['+twitter_req_row+'][consumer_secret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#twitter_req-row'+twitter_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#twitter_req tfoot').before(html);
			
			twitter_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
		
		
	  </div>
	  <div id="tab-odnoklassniki">
		<p>Инструкция по интергации с Одноклассниками по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-odnoklassniki" target=_blank>https://softpodkluch.ru/socnetauth2-odnoklassniki</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_odnoklassniki_status; ?></td>
				<td>
				<select name="socnetauth2_odnoklassniki_status">
                  <?php if ( $socnetauth2_odnoklassniki_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_odnoklassniki_agent; ?></td>
				<td>
				<select name="socnetauth2_odnoklassniki_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_odnoklassniki_agent_extension').show(); $('#block_odnoklassniki_agent_notice').show(); } else { $('#block_odnoklassniki_agent_extension').hide(); $('#block_odnoklassniki_agent_notice').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_odnoklassniki_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_odnoklassniki_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_odnoklassniki_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_odnoklassniki_agent_loginza; ?></option>
                </select>
				<div
				id="block_odnoklassniki_agent_notice"
		<?php if ( $socnetauth2_odnoklassniki_agent == 'loginza' ) { ?> 
		style="display: none;" <?php } ?>
				><?php echo $entry_odnoklassniki_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_odnoklassniki_customer_group_id; ?></td>
				<td><select name="socnetauth2_odnoklassniki_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_odnoklassniki_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
			<?php /* end kin update: n1 */ ?>
			
		<?php /* start r3 */ ?>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_odnoklassniki_debug"  >
                  <?php if ( $socnetauth2_odnoklassniki_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td>
			</tr>
		<?php /* end r3 */ ?>
		</table>
	  
		<?php /* start 0207 */ ?>
		<div id="block_odnoklassniki_agent_extension"
		<?php if ( $socnetauth2_odnoklassniki_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="odnoklassniki_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_odnoklassniki_application_id; ?></td>
              <td class="left"><?php echo $entry_odnoklassniki_public_key; ?></td>
              <td class="left"><?php echo $entry_odnoklassniki_secret_key; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="odnoklassniki_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_odnoklassniki_application_id"  
				value="<?php echo $socnetauth2_odnoklassniki_application_id; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_odnoklassniki_public_key"  
				value="<?php echo $socnetauth2_odnoklassniki_public_key; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_odnoklassniki_secret_key"  
				value="<?php echo $socnetauth2_odnoklassniki_secret_key; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $odnoklassniki_req_row = 0; ?>
          <?php foreach ($socnetauth2_odnoklassniki_req as $req) { ?>
          <tbody id="odnoklassniki_req-row<?php echo $odnoklassniki_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_odnoklassniki_req[<?php echo $odnoklassniki_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_odnoklassniki_req[<?php echo $odnoklassniki_req_row; 
				 ?>][application_id]"  
				value="<?php echo $req['application_id']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_odnoklassniki_req[<?php echo $odnoklassniki_req_row; 
				 ?>][public_key]"  
				value="<?php echo $req['public_key']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_odnoklassniki_req[<?php echo $odnoklassniki_req_row; 
				 ?>][secret_key]"  
				value="<?php echo $req['secret_key']; ?>" />
			  </td>
			  <td><a onclick="$('#odnoklassniki_req-row<?php echo $odnoklassniki_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $odnoklassniki_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addodnoklassnikiReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var odnoklassniki_req_row = <?php echo $odnoklassniki_req_row; ?>;
		
		function addodnoklassnikiReq()
		{
			html = '';
			
			html += '<tbody id="odnoklassniki_req-row'+odnoklassniki_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_odnoklassniki_req['+odnoklassniki_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_odnoklassniki_req['+odnoklassniki_req_row+'][application_id]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_odnoklassniki_req['+odnoklassniki_req_row+'][public_key]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_odnoklassniki_req['+odnoklassniki_req_row+'][secret_key]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#odnoklassniki_req-row'+odnoklassniki_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#odnoklassniki_req tfoot').before(html);
			
			odnoklassniki_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
	  </div>
	  
	  <?php /* start metka: a1 */ ?>
	  <div id="tab-gmail">
		<p>Инструкция по интергации с Gmail по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-gmail" target=_blank>https://softpodkluch.ru/socnetauth2-gmail</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_gmail_status; ?></td>
				<td>
				<select name="socnetauth2_gmail_status">
                  <?php if ( $socnetauth2_gmail_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_gmail_agent; ?></td>
				<td>
				<select name="socnetauth2_gmail_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_gmail_agent_extension').show(); } else { $('#block_gmail_agent_extension').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_gmail_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_gmail_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_gmail_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_gmail_agent_loginza; ?></option>
                </select>
				<div><?php echo $entry_gmail_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_gmail_customer_group_id; ?></td>
				<td><select name="socnetauth2_gmail_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_gmail_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_gmail_debug"  >
                  <?php if ( $socnetauth2_gmail_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td>
			</tr>
			<?php /* end kin update: n1 */ ?>
			
		</table>
		
		<?php /* start 0207 */ ?>
		<div id="block_gmail_agent_extension"
		<?php if ( $socnetauth2_gmail_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="gmail_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_gmail_client_id; ?></td>
              <td class="left"><?php echo $entry_gmail_client_secret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="gmail_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_gmail_client_id"  
				value="<?php echo $socnetauth2_gmail_client_id; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_gmail_client_secret"  
				value="<?php echo $socnetauth2_gmail_client_secret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $gmail_req_row = 0; ?>
          <?php foreach ($socnetauth2_gmail_req as $req) { ?>
          <tbody id="gmail_req-row<?php echo $gmail_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_gmail_req[<?php echo $gmail_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_gmail_req[<?php echo $gmail_req_row; 
				 ?>][client_id]"  
				value="<?php echo $req['client_id']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_gmail_req[<?php echo $gmail_req_row; 
				 ?>][client_secret]"  
				value="<?php echo $req['client_secret']; ?>" />
			  </td>
			  <td><a onclick="$('#gmail_req-row<?php echo $gmail_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $gmail_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addgmailReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var gmail_req_row = <?php echo $gmail_req_row; ?>;
		
		function addgmailReq()
		{
			html = '';
			
			html += '<tbody id="gmail_req-row'+gmail_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_gmail_req['+gmail_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_gmail_req['+gmail_req_row+'][client_id]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_gmail_req['+gmail_req_row+'][client_secret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#gmail_req-row'+gmail_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#gmail_req tfoot').before(html);
			
			gmail_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
	  </div>
	  
	  
	  <div id="tab-mailru"><p>Инструкция по интергации с Mail.ru по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-mailru" target=_blank>https://softpodkluch.ru/socnetauth2-mailru</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_mailru_status; ?></td>
				<td>
				<select name="socnetauth2_mailru_status">
                  <?php if ( $socnetauth2_mailru_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_mailru_agent; ?></td>
				<td>
				<select name="socnetauth2_mailru_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_mailru_agent_extension').show(); } else { $('#block_mailru_agent_extension').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_mailru_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_mailru_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_mailru_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_mailru_agent_loginza; ?></option>
                </select>
				<div><?php echo $entry_mailru_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_mailru_customer_group_id; ?></td>
				<td><select name="socnetauth2_mailru_customer_group_id">
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_mailru_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td>
			</tr>
			<tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_mailru_debug"  >
                  <?php if ( $socnetauth2_mailru_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td>
			</tr>
			<?php /* end kin update: n1 */ ?>
			
		</table>
	  
		<?php /* start 0207 */ ?>
		<div id="block_mailru_agent_extension"
		<?php if ( $socnetauth2_mailru_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="mailru_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_mailru_id; ?></td>
              <td class="left"><?php echo $entry_mailru_private; ?></td>
              <td class="left"><?php echo $entry_mailru_secret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="mailru_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_mailru_id"  
				value="<?php echo $socnetauth2_mailru_id; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_mailru_private"  
				value="<?php echo $socnetauth2_mailru_private; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_mailru_secret"  
				value="<?php echo $socnetauth2_mailru_secret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $mailru_req_row = 0; ?>
          <?php foreach ($socnetauth2_mailru_req as $req) { ?>
          <tbody id="mailru_req-row<?php echo $mailru_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_mailru_req[<?php echo $mailru_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_mailru_req[<?php echo $mailru_req_row; 
				 ?>][mailru_id]"  
				value="<?php echo $req['mailru_id']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_mailru_req[<?php echo $mailru_req_row; 
				 ?>][mailru_private]"  
				value="<?php echo $req['mailru_private']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_mailru_req[<?php echo $mailru_req_row; 
				 ?>][mailru_secret]"  
				value="<?php echo $req['mailru_secret']; ?>" />
			  </td>
			  <td><a onclick="$('#mailru_req-row<?php echo $mailru_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $mailru_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addmailruReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var mailru_req_row = <?php echo $mailru_req_row; ?>;
		
		function addmailruReq()
		{
			html = '';
			
			html += '<tbody id="mailru_req-row'+mailru_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_mailru_req['+mailru_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_mailru_req['+mailru_req_row+'][mailru_id]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_mailru_req['+mailru_req_row+'][mailru_private]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_mailru_req['+mailru_req_row+'][mailru_secret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#mailru_req-row'+mailru_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#mailru_req tfoot').before(html);
			
			mailru_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
		
		
	  </div>
	  <?php /* end metka: a1 */ ?>
	  
	<?php /* start 1811 */ ?>
	  <div id="tab-yandex" class="tab-pane">
	  <p>Инструкция по интергации с Яндексом по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-yandex" target=_blank
		>https://softpodkluch.ru/socnetauth2-yandex</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_yandex_status; ?></td>
				<td>
			  <select name="socnetauth2_yandex_status" class="form-control">
                  <?php if ( $socnetauth2_yandex_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_debug; ?></td>
				<td>
				<select name="socnetauth2_yandex_debug" class="form-control">
                  <?php if ( $socnetauth2_yandex_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div>
				</td>
			</tr>  
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_yandex_agent; ?></td>
				<td>
				<select name="socnetauth2_yandex_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('.block_yandex_agent_extension').show(); } else { $('.block_yandex_agent_extension').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_yandex_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_yandex_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_yandex_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_yandex_agent_loginza; ?></option>
                </select>
				<div><?php echo $entry_yandex_agent_notice; ?></div>
				</td>
			</tr>
			</table>
		<div class="block_yandex_agent_extension"
		<?php if ( $socnetauth2_yandex_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		>
		<table class="form">
		<?php /* end 1405 */ ?> 
            <tr>
				<td><?php echo $entry_yandex_rights; ?></td>
				<td>
			   <div><input type="checkbox" name="socnetauth2_yandex_rights_email"
			   value="1" <?php if( $socnetauth2_yandex_rights_email ) { ?> checked <?php } ?> 
			   id="socnetauth2_yandex_rights_email"
			   ><label for="socnetauth2_yandex_rights_email"
			   ><?php echo $entry_yandex_rights_email; ?></label></div>
			   
			   <div><input type="checkbox" name="socnetauth2_yandex_rights_info"
			   value="1" <?php if( $socnetauth2_yandex_rights_info ) { ?> checked <?php } ?> 
			   id="socnetauth2_yandex_rights_info"
			   ><label for="socnetauth2_yandex_rights_info"
			   ><?php echo $entry_yandex_rights_info; ?></label></div>
				</td>
			</tr>     
		<?php /* start 1405 */ ?>
		</table>
		</div>
		<table class="form">
		<?php /* end 1405 */ ?>
            <tr>
				<td><?php echo $entry_yandex_customer_group_id; ?></td>
				<td>
				<select name="socnetauth2_yandex_customer_group_id" class="form-control" >
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_yandex_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
				</td>
			</tr>    
		</table>
		
		
		<?php /* start 0207 */ ?>
		<div class="block_yandex_agent_extension"
		<?php if ( $socnetauth2_yandex_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="yandex_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_yandex_client_id; ?></td>
              <td class="left"><?php echo $entry_yandex_client_secret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="yandex_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_yandex_client_id"  
				value="<?php echo $socnetauth2_yandex_client_id; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_yandex_client_secret"  
				value="<?php echo $socnetauth2_yandex_client_secret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $yandex_req_row = 0; ?>
          <?php foreach ($socnetauth2_yandex_req as $req) { ?>
          <tbody id="yandex_req-row<?php echo $yandex_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_yandex_req[<?php echo $yandex_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_yandex_req[<?php echo $yandex_req_row; 
				 ?>][client_id]"  
				value="<?php echo $req['client_id']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_yandex_req[<?php echo $yandex_req_row; 
				 ?>][client_secret]"  
				value="<?php echo $req['client_secret']; ?>" />
			  </td>
			  <td><a onclick="$('#yandex_req-row<?php echo $yandex_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $yandex_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addyandexReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var yandex_req_row = <?php echo $yandex_req_row; ?>;
		
		function addyandexReq()
		{
			html = '';
			
			html += '<tbody id="yandex_req-row'+yandex_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_yandex_req['+yandex_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_yandex_req['+yandex_req_row+'][client_id]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_yandex_req['+yandex_req_row+'][client_secret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#yandex_req-row'+yandex_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#yandex_req tfoot').before(html);
			
			yandex_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
		
	  </div>
	

	  <div id="tab-steam" class="tab-pane">
	  <p>Инструкция по интергации со Steam по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-steam" target=_blank
		>https://softpodkluch.ru/socnetauth2-steam</a>
		</p>
        <table class="form">
          <tbody>
            <tr>
				<td><?php echo $entry_steam_status; ?></td>
				<td>
			  <select name="socnetauth2_steam_status" class="form-control">
                  <?php if ( $socnetauth2_steam_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				</td>
			</tr>   
            <tr>
				<td><?php echo $entry_debug; ?></td>
				<td><select name="socnetauth2_steam_debug" class="form-control">
                  <?php if ( $socnetauth2_steam_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div>
				</td>
			</tr>    
			
		<?php /* start 1405 */ ?>
            <tr>
				<td><?php echo $entry_steam_agent; ?></td>
				<td>
				<select name="socnetauth2_steam_agent" class="form-control"
				onchange="if( this.value == 'extension' ) { $('#block_steam_agent_extension').show(); } else { $('#block_steam_agent_extension').hide(); }"
				>
					<option value="extension" 
					  <?php if ( $socnetauth2_steam_agent == 'extension' ) { ?>
						selected="extension"
					  <?php } ?>
					><?php echo $entry_steam_agent_extension; ?></option>
					<option value="loginza" 
					  <?php if ( $socnetauth2_steam_agent == 'loginza' ) { ?>
						selected="loginza"
					  <?php } ?>
					><?php echo $entry_steam_agent_loginza; ?></option>
                </select>
				<div><?php echo $entry_steam_agent_notice; ?></div>
				</td>
			</tr> 
            <tr>
				<td><?php echo $entry_steam_customer_group_id; ?></td>
				<td>
				<select name="socnetauth2_steam_customer_group_id" class="form-control" >
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_steam_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
				</td>
			</tr>      
		</table>
		
		<?php /* start 0207 */ ?>
		<div id="block_steam_agent_extension"
		<?php if ( $socnetauth2_steam_agent == 'loginza' ) { ?> style="display: none;" <?php } ?>
		> 
		
		<table id="steam_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_steam_api_key; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="steam_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_steam_api_key"  
				value="<?php echo $socnetauth2_steam_api_key; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $steam_req_row = 0; ?>
          <?php foreach ($socnetauth2_steam_req as $req) { ?>
          <tbody id="steam_req-row<?php echo $steam_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_steam_req[<?php echo $steam_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_steam_req[<?php echo $steam_req_row; 
				 ?>][api_key]"  
				value="<?php echo $req['api_key']; ?>" />
			  </td>
			  <td><a onclick="$('#steam_req-row<?php echo $steam_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $steam_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="2"></td>
              <td class="left"><a onclick="addsteamReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var steam_req_row = <?php echo $steam_req_row; ?>;
		
		function addsteamReq()
		{
			html = '';
			
			html += '<tbody id="steam_req-row'+steam_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_steam_req['+steam_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_steam_req['+steam_req_row+'][api_key]"  />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#steam_req-row'+steam_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			$('#steam_req tfoot').before(html);
			
			steam_req_row++;
		}
		</script>
		</div>
		<?php /* end 0207 */ ?>
		
	  </div>
	
	
	<?php /* start 0207 */ ?>
	  <div id="tab-instagram" class="tab-pane">
	  <input type="hidden" name="socnetauth2_instagram_agent" 
	  value="extension">
	  <p>Инструкция по интергации с instagram.com по ссылке:<br>
		<a href="https://softpodkluch.ru/socnetauth2-instagram" target=_blank
		>https://softpodkluch.ru/socnetauth2-instagram</a>
		</p>
		<table class="form">
		<tr>
			<td><?php echo $entry_instagram_status; ?></td>
			<td> <select name="socnetauth2_instagram_status" class="form-control">
                  <?php if ( $socnetauth2_instagram_status ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td> 
		</tr>	
		<tr>
			<td><?php echo $entry_debug; ?></td>
			<td><select name="socnetauth2_instagram_debug" class="form-control">
                  <?php if ( $socnetauth2_instagram_debug ) { ?>
					<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
					<option value="0" ><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
					<option value="1"><?php echo $text_enabled; ?></option>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select>
				<div><?php echo $text_debug_notice; ?></div></td> 
		</tr>
		<tr>
			<td><?php echo $entry_instagram_customer_group_id; ?></td>
			<td><select name="socnetauth2_instagram_customer_group_id" class="form-control" >
                    <?php foreach ($customer_groups as $customer_group) { ?>
                    <?php if ($customer_group['customer_group_id'] == $socnetauth2_instagram_customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?></option>
                    <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select></td> 
		</tr> 
		</table>
		<?php /* start 0207 */ ?>
		<div id="block_instagram_agent_extension"
		> 
		
		<table id="instagram_req" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $col_domain; ?></td>
              <td class="left"><?php echo $entry_instagram_client_id; ?></td>
              <td class="left"><?php echo $entry_instagram_client_secret; ?></td>
              <td></td>
            </tr>
          </thead>
          <tbody id="instagram_req-row">
            <tr>
              <td class="left">
				  <?php echo $text_default_domain; ?>
			  </td>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_instagram_client_id"  
				value="<?php echo $socnetauth2_instagram_client_id; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_instagram_client_secret"  
				value="<?php echo $socnetauth2_instagram_client_secret; ?>" />
			  </td>
			  <td></td>
			</tr>
          <?php $instagram_req_row = 0; ?>
          <?php foreach ($socnetauth2_instagram_req as $req) { ?>
          <tbody id="instagram_req-row<?php echo $instagram_req_row; ?>">
            <tr>
              <td class="left">
				<input type="text" class="form-control" name="socnetauth2_instagram_req[<?php echo $instagram_req_row; 
				 ?>][domain]"  
				value="<?php echo $req['domain']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_instagram_req[<?php echo $instagram_req_row; 
				 ?>][client_id]"  
				value="<?php echo $req['client_id']; ?>" />
			  </td>
              <td class="left">
				<input type="text" class="form-control" 
				name="socnetauth2_instagram_req[<?php echo $instagram_req_row; 
				 ?>][client_secret]"  
				value="<?php echo $req['client_secret']; ?>" />
			  </td>
			  <td><a onclick="$('#instagram_req-row<?php echo $instagram_req_row; 
				 ?>').remove();" class="button"><?php echo $button_remove; ?></a></td>
			</tr> 
          </tbody>
          <?php $instagram_req_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="left"><a onclick="addinstagramReq();" class="button"
			  ><?php echo $button_add; ?></a></td>
            </tr>
          </tfoot>
        </table>
		<script>
		var instagram_req_row = <?php echo $instagram_req_row; ?>;
		
		function addinstagramReq()
		{
			html = '';
			
			html += '<tbody id="instagram_req-row'+instagram_req_row+'">';
			html += '<tr>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" name="socnetauth2_instagram_req['+instagram_req_row+'][domain]"   />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += ' name="socnetauth2_instagram_req['+instagram_req_row+'][client_id]"  />';
			html += '</td>';
			html += '<td class="left">';
			html += '<input type="text" class="form-control" ';
			html += 'name="socnetauth2_instagram_req['+instagram_req_row+'][client_secret]"   />';
			html += '</td>';
			html += '<td class="left"><a onclick="$(\'#instagram_req-row'+instagram_req_row+'\').remove();" class="button"><?php echo $button_remove; ?></a></td>';
			html += '</tr> ';
			html += '</tbody>';
			
			
			$('#instagram_req tfoot').before(html);
			
			instagram_req_row++;
		}
		</script>
		</div>
	  </div>
	  
	<?php /* end 1811 */ ?>
	  
	  <div id="tab-dobor">
        <table class="form">
		<tr> 
			<td colspan=2><b><?php echo $entry_confirm_data; ?></b></td>
		</tr>
		<tr>
			<td><?php echo $entry_dobortype; ?></td>
			<td>
				<select name="socnetauth2_dobortype">
					<option value="one"
						<?php if( $socnetauth2_dobortype == 'one' ) { ?> selected <?php } ?>
					><?php   echo $entry_dobortype_one; ?></option>
					<option value="every"
						<?php if( $socnetauth2_dobortype == 'every' ) { ?> selected <?php } ?>
					><?php echo $entry_dobortype_every; ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?php echo $entry_is_close_disabled; ?></td>
			<td><input type="checkbox" class="form-control" 
				name="socnetauth2_is_close_disabled"  
				value="1" 
				<?php if( !empty($socnetauth2_is_close_disabled) ) { ?> checked <?php } ?>
				/>
			</td>
		</tr>
		
		<tr>
			<td><?php echo $entry_confirm_firstname; ?></td>
			<td><select name="socnetauth2_confirm_firstname_status">
                  <?php if ( $socnetauth2_confirm_firstname_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_firstname_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                </select>
				<input type="checkbox" name="socnetauth2_confirm_firstname_required" value="1"
				id="socnetauth2_confirm_firstname_required"
				<?php if( $socnetauth2_confirm_firstname_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_firstname_required"><?php echo $text_required;?></label>
				
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_firstname_hideifhas" value="1"
				id="socnetauth2_confirm_firstname_hideifhas"
				<?php if( $socnetauth2_confirm_firstname_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_firstname_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
				
		</tr>
		<tr>
			<td><?php echo $entry_confirm_lastname; ?></td>
			<td><select name="socnetauth2_confirm_lastname_status">
                <?php if ( $socnetauth2_confirm_lastname_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_lastname_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_lastname_required" value="1"
				id="socnetauth2_confirm_lastname_required"
				<?php if( $socnetauth2_confirm_lastname_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_lastname_required"><?php echo $text_required;?></label>
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_lastname_hideifhas" value="1"
				id="socnetauth2_confirm_lastname_hideifhas"
				<?php if( $socnetauth2_confirm_lastname_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_lastname_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
				
		</tr>
		<tr>
			<td><?php echo $entry_confirm_email; ?></td>
			<td><select name="socnetauth2_confirm_email_status">
                <?php if ( $socnetauth2_confirm_email_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_email_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                </select>
				<input type="checkbox" name="socnetauth2_confirm_email_required" value="1"
				id="socnetauth2_confirm_email_required"
				<?php if( $socnetauth2_confirm_email_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_email_required"><?php echo $text_required;?></label>
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_email_hideifhas" value="1"
				id="socnetauth2_confirm_email_hideifhas"
				<?php if( $socnetauth2_confirm_email_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_email_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_phone; ?></td>
			<td><select name="socnetauth2_confirm_telephone_status">
                 <?php if ( $socnetauth2_confirm_telephone_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_telephone_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_telephone_required" value="1"
				id="socnetauth2_confirm_telephone_required"
				<?php if( $socnetauth2_confirm_telephone_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_telephone_required"><?php echo $text_required;?></label>
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_telephone_hideifhas" value="1"
				id="socnetauth2_confirm_telephone_hideifhas"
				<?php if( $socnetauth2_confirm_telephone_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_telephone_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<?php /* start 1409 */ ?>
		<tr>
			<td><?php echo $entry_telephone_mask; ?></td>
			<td>
				<input type="text"  class="form-control"
				name="socnetauth2_telephone_mask" 
				value="<?php echo $socnetauth2_telephone_mask; ?>" >
				<div><?php echo $entry_telephone_mask_notice; ?></div>
			</td>
		</tr>
		<?php /* end 1409 */ ?>
		<tr>
			<td><?php echo $entry_confirm_company; ?></td>
			<td><select name="socnetauth2_confirm_company_status">
                 <?php if ( $socnetauth2_confirm_company_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_company_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_company_required" value="1"
				id="socnetauth2_confirm_company_required"
				<?php if( $socnetauth2_confirm_company_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_company_required"><?php echo $text_required;?></label>
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_company_hideifhas" value="1"
				id="socnetauth2_confirm_company_hideifhas"
				<?php if( $socnetauth2_confirm_company_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_company_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_postcode; ?></td>
			<td><select name="socnetauth2_confirm_postcode_status">
                 <?php if ( $socnetauth2_confirm_postcode_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_postcode_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_postcode_required" value="1"
				id="socnetauth2_confirm_postcode_required"
				<?php if( $socnetauth2_confirm_postcode_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_postcode_required"><?php echo $text_required;?></label>
				
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_postcode_hideifhas" value="1"
				id="socnetauth2_confirm_postcode_hideifhas"
				<?php if( $socnetauth2_confirm_postcode_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_postcode_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_country; ?></td>
			<td><select name="socnetauth2_confirm_country_status">
                 <?php if ( $socnetauth2_confirm_country_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_country_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_country_required" value="1"
				id="socnetauth2_confirm_country_required"
				<?php if( $socnetauth2_confirm_country_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_country_required"><?php echo $text_required;?></label>
				
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_country_hideifhas" value="1"
				id="socnetauth2_confirm_country_hideifhas"
				<?php if( $socnetauth2_confirm_country_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_country_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_zone; ?></td>
			<td><select name="socnetauth2_confirm_zone_status">
                 <?php if ( $socnetauth2_confirm_zone_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_zone_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_zone_required" value="1"
				id="socnetauth2_confirm_zone_required"
				<?php if( $socnetauth2_confirm_zone_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_zone_required"><?php echo $text_required;?></label>
				
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_zone_hideifhas" value="1"
				id="socnetauth2_confirm_zone_hideifhas"
				<?php if( $socnetauth2_confirm_zone_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_zone_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_city; ?></td>
			<td><select name="socnetauth2_confirm_city_status">
                 <?php if ( $socnetauth2_confirm_city_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_city_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_city_required" value="1"
				id="socnetauth2_confirm_city_required"
				<?php if( $socnetauth2_confirm_city_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_city_required"><?php echo $text_required;?></label>
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_city_hideifhas" value="1"
				id="socnetauth2_confirm_city_hideifhas"
				<?php if( $socnetauth2_confirm_city_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_city_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				</td>
		</tr>
		<tr>
			<td><?php echo $entry_confirm_address_1; ?></td>
			<td><select name="socnetauth2_confirm_address_1_status">
                 <?php if ( $socnetauth2_confirm_address_1_status == 1  ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" selected="selected" ><?php echo $text_confirm_none; ?></option>
					<option value="2" ><?php echo $text_confirm_allways; ?></option>
                  <?php } elseif( $socnetauth2_confirm_address_1_status == 2 ) { ?>
					<option value="0"><?php echo $text_confirm_disable; ?></option>
					<option value="1" ><?php echo $text_confirm_none; ?></option>
					<option value="2" selected="selected" ><?php echo $text_confirm_allways; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected"><?php echo $text_confirm_disable; ?></option>
					<option value="1"><?php echo $text_confirm_none; ?></option>
					<option value="2"><?php echo $text_confirm_allways; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_address_1_required" value="1"
				id="socnetauth2_confirm_address_1_required"
				<?php if( $socnetauth2_confirm_address_1_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_address_1_required"><?php echo $text_required;?></label>
				
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_address_1_hideifhas" value="1"
				id="socnetauth2_confirm_address_1_hideifhas"
				<?php if( $socnetauth2_confirm_address_1_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_address_1_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
			</td>
		</tr>
		
		<tr>
			<td><?php echo $entry_confirm_group; ?></td>
			<td><select  class="form-control" name="socnetauth2_confirm_group_status">
                 <?php if ( $socnetauth2_confirm_group_status == 1  ) { ?>
					<option value="0"><?php echo $text_disabled; ?></option>
					<option value="1" selected="selected" ><?php echo $text_enabled; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
					<option value="1"><?php echo $text_enabled; ?></option>
				  
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_group_required" value="1"
				id="socnetauth2_confirm_group_required"
				<?php if( $socnetauth2_confirm_group_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_group_required"><?php echo $text_required;?></label>
				<?php /* start 1007 */ ?>
				<input type="checkbox" name="socnetauth2_confirm_group_hideifhas" value="1"
				id="socnetauth2_confirm_group_hideifhas"
				<?php if( $socnetauth2_confirm_group_hideifhas ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_group_hideifhas"><?php echo $text_hideifhas;?></label>
				<?php /* end 1007 */ ?>
				
			</td>
		</tr>
		
		
		
		<?php /* start 1303 */ ?>
		
		<tr>
			<td><?php echo $entry_agree; ?></td>
			<td><select  class="form-control" name="socnetauth2_confirm_agree_status">
					<option value="0"><?php echo $entry_agree_no; ?></option>
					
                 <?php foreach( $informations as $inf  ) { ?>
					<option value="<?php echo $inf['information_id']; ?>" 
					<?php if( $inf['information_id'] == $socnetauth2_confirm_agree_status ) { 
					?> selected="selected" <?php } ?>
					><?php echo $inf['title']; ?></option>
				  <?php } ?>
                 </select>
				<input type="checkbox" name="socnetauth2_confirm_agree_required" value="1"
				id="socnetauth2_confirm_agree_required"
				<?php if( $socnetauth2_confirm_agree_required ) { ?>
				checked
				<?php } ?>
				><label for="socnetauth2_confirm_agree_required"><?php echo $text_required;?></label>
			</td>
		</tr>
		<?php /* end 1303 */ ?>
		
		<?php /* start 2505 */ ?>
		<tr>
			<td><?php echo $entry_confirm_newsletter; ?></td>
			<td> <select  class="form-control" name="socnetauth2_confirm_newsletter">
                 <?php if ( $socnetauth2_confirm_newsletter == 1  ) { ?>
					<option value="0"><?php echo $text_disabled; ?></option>
					<option value="1" selected="selected" ><?php echo $text_enabled; ?></option>
				  <?php } else { ?>
					<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
					<option value="1"><?php echo $text_enabled; ?></option>
				  
				  <?php } ?>
                 </select>
			</td>
		</tr>
		<?php /* end 1303 */ ?>
		
		</table>
	  </div>
	  <!-- /////////////////////////////////////////////////////////////////////////////// -->
	 
	  
	  <?php /* start 1505 */ ?>
	  <style>
		.vtabs {
			width: 190px;
			padding: 10px 0px;
			min-height: 300px;
			float: left;
			display: block;
			border-right: 1px solid #DDDDDD;
		}
		
		.vtabs a.selected {
			padding-right: 15px;
			background: #FFFFFF;
		}
		
		.vtabs a, .vtabs span {
			display: block;
			float: left;
			width: 160px;
			margin-bottom: 5px;
			clear: both;
			border-top: 1px solid #DDDDDD;
			border-left: 1px solid #DDDDDD;
			border-bottom: 1px solid #DDDDDD;
			background: #F7F7F7;
			padding: 6px 14px 7px 15px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
			font-weight: bold;
			text-align: right;
			text-decoration: none;
			color: #000000;
		}
		
		.vtabs-content {
			margin-left: 205px;
		}
	  </style>
	  <div id="tab-design">
		<div class="vtabs">
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('general'); $('.design_options').hide(); $('#tab-design-general').show();" 
			<?php if( $tab2 == 'general' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_general; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('account'); $('.design_options').hide(); $('#tab-design-account').show();" 
			<?php if( $tab2 == 'account' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_account; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('checkout'); $('.design_options').hide(); $('#tab-design-checkout').show();" 
			<?php if( $tab2 == 'checkout' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_checkout; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('reg'); $('.design_options').hide(); $('#tab-design-reg').show();" 
			<?php if( $tab2 == 'reg' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_reg; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('icons'); $('.design_options').hide(); $('#tab-design-icons').show();" 
			<?php if( $tab2 == 'icons' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_icons; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('widget'); $('.design_options').hide(); $('#tab-design-widget').show();" 
			<?php if( $tab2 == 'widget' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_widget; ?></a>
			
            <a onclick="$('.vtabs a').removeClass('selected'); $(this).addClass('selected'); $('#hiddentab2').val('popup'); $('.design_options').hide(); $('#tab-design-popup').show();" 
			<?php if( $tab2 == 'popup' ) { ?>class="selected" <?php } ?>
			 style="cursor: pointer;"
			><?php echo $tab_design_popup; ?></a>
        </div>
		<div class="vtabs-content">
				<div id="tab-design-general" class="design_options"
				 <?php if( $tab2 != 'general' ) { ?> style="display: none;" <?php } ?>
				>
					<h2><?php echo $tab_design_general; ?></h2>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_design_notice; ?>
						</td>
						<td>
							<?php echo $entry_design_notice_text; ?>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_general_css; ?>
						</td>
						<td>
							<textarea class="form-control" rows=10 style="width: 100%;"
							name="socnetauth2_design_general_css"
							><?php echo $socnetauth2_design_general_css; ?></textarea>
						</td>	
					</tr>
					</table>
				</div>
			
				<div id="tab-design-account" class="design_options"
				 <?php if( $tab2 != 'account' ) { ?> style="display: none;" <?php } ?>>
					<h2><?php echo $tab_design_account; ?></h2>
					
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_status; ?>
						</td>
						<td>
							<select name="socnetauth2_design_account_status" class="form-control" >
							  <?php if ( $socnetauth2_design_account_status ) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0" ><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_html; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_account_html"
							><?php echo $socnetauth2_design_account_html; ?></textarea>
							<div><?php echo $entry_design_html_tags; ?></div>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_css; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_account_css"
							><?php echo $socnetauth2_design_account_css; ?></textarea>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_header; ?>
						</td>
						<td>
							<?php foreach ($languages as $language) { ?>
							<p>
								<input type="text"  class="form-control" style="width: 100%;"
								name="socnetauth2_design_account_header[<?php echo $language['language_id']; ?>]" 
								value="<?php if( !empty($socnetauth2_design_account_header[ $language['language_id'] ]) ) 
									echo $socnetauth2_design_account_header[ $language['language_id'] ]; ?>" >&nbsp;<img 
								src="<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							</p>
							<?php } ?>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_format; ?>
						</td>
						<td>
							<table class="format_table" cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td width=33%><input type="radio" name="socnetauth2_account_format" value="kvadrat"
								<?php if( $socnetauth2_account_format == 'kvadrat' ) { 
								?> checked <?php } ?> 
								id="socnetauth2_account_format_kvadrat"
								><label for="socnetauth2_account_format_kvadrat"
								><?php echo $text_format_kvadrat; ?></label></td>
								
								<td width=33%><input type="radio" name="socnetauth2_account_format" value="bline"
								<?php if( $socnetauth2_account_format == 'bline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_account_format_bline"
								><label for="socnetauth2_account_format_bline"><?php echo $text_format_bline; ?></label></td>
								
								<td><input type="radio" name="socnetauth2_account_format" value="lline"
								<?php if( $socnetauth2_account_format == 'lline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_account_format_lline"
								><label for="socnetauth2_account_format_lline"
								><?php echo $text_format_lline; ?></label></td>
							</tr>
							<tr>
								<td valign=top><img src="view/image/socnetauth2/kvadrat.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/bline.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/lline.png" style="border: 1px #ededed solid;"></td>
							</tr>
							<tr>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
									
								</td>
								<td valign=top><br>
								<b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_header"&gt;{header}&lt;/div&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
								</td>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div&gt;
&lt;div class="sna_header" style="float: left; padding-right: 15px;"&gt;{header} &lt;/div&gt;<br>
&lt;div class="sna_icons" style="float: left; padding-top: 7px;"&gt;{icons}&lt;/div&gt;<br>
&lt;br style="clear: both;"&gt;
&lt;/div&gt;</td>
							</tr>
							</table>
						</td>	
					</tr>
					</table>
				</div>
				<div id="tab-design-checkout" class="design_options"
				 <?php if( $tab2 != 'checkout' ) { ?> style="display: none;" <?php } ?>>
					
					<h2><?php echo $tab_design_checkout; ?></h2>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_status; ?>
						</td>
						<td>
							<select name="socnetauth2_design_checkout_status" class="form-control" >
							  <?php if ( $socnetauth2_design_checkout_status ) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0" ><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_html; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_checkout_html"
							><?php echo $socnetauth2_design_checkout_html; ?></textarea>
							<div><?php echo $entry_design_html_tags; ?></div>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_css; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_checkout_css"
							><?php echo $socnetauth2_design_checkout_css; ?></textarea>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_header; ?>
						</td>
						<td>
							<?php foreach ($languages as $language) { ?>
							<p>
								<input type="text"  class="form-control"  style="width: 100%;"
								name="socnetauth2_design_checkout_header[<?php echo $language['language_id']; ?>]" 
								value="<?php if( !empty($socnetauth2_design_checkout_header[ $language['language_id'] ]) ) 
									echo $socnetauth2_design_checkout_header[ $language['language_id'] ]; ?>" >&nbsp;<img 
								src="<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							</p>
							<?php } ?>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_format; ?>
						</td>
						<td>
							
							<table class="format_table" cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td width=33%><input type="radio" name="socnetauth2_checkout_format" value="kvadrat"
								<?php if( $socnetauth2_checkout_format == 'kvadrat' ) { 
								?> checked <?php } ?> 
								id="socnetauth2_checkout_format_kvadrat"
								><label for="socnetauth2_checkout_format_kvadrat"
								><?php echo $text_format_kvadrat; ?></label></td>
								
								<td width=33%><input type="radio" name="socnetauth2_checkout_format" value="bline"
								<?php if( $socnetauth2_checkout_format == 'bline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_checkout_format_bline"
								><label for="socnetauth2_checkout_format_bline"><?php echo $text_format_bline; ?></label></td>
								
								<td><input type="radio" name="socnetauth2_checkout_format" value="lline"
								<?php if( $socnetauth2_checkout_format == 'lline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_checkout_format_lline"
								><label for="socnetauth2_checkout_format_lline"
								><?php echo $text_format_lline; ?></label></td>
							</tr>
							<tr>
								<td valign=top><img src="view/image/socnetauth2/kvadrat.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/bline.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/lline.png" style="border: 1px #ededed solid;"></td>
							</tr>
							<tr>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
									
								</td>
								<td valign=top><br>
								<b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_header"&gt;{header}&lt;/div&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
								</td>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div&gt;
&lt;div class="sna_header" style="float: left; padding-right: 15px;"&gt;{header} &lt;/div&gt;<br>
&lt;div class="sna_icons" style="float: left; padding-top: 7px;"&gt;{icons}&lt;/div&gt;<br>
&lt;br style="clear: both;"&gt;
&lt;/div&gt;</td>
							</tr>
							</table>
						</td>	
					</tr>
					</table>
				</div>
				<div id="tab-design-reg" class="design_options"
				 <?php if( $tab2 != 'reg' ) { ?> style="display: none;" <?php } ?>>
					<h2><?php echo $tab_design_reg; ?></h2>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_status; ?>
						</td>
						<td>
							<select name="socnetauth2_design_reg_status" class="form-control" >
							  <?php if ( $socnetauth2_design_reg_status ) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0" ><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_html; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_reg_html"
							><?php echo $socnetauth2_design_reg_html; ?></textarea>
							<div><?php echo $entry_design_html_tags; ?></div>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_css; ?>
						</td>
						<td>
							<textarea class="form-control" rows=3 style="width: 100%;"
							name="socnetauth2_design_reg_css"
							><?php echo $socnetauth2_design_reg_css; ?></textarea>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_header; ?>
						</td>
						<td>
							<?php foreach ($languages as $language) { ?>
							<p>
								<input type="text"  class="form-control"  style="width: 100%;"
								name="socnetauth2_design_reg_header[<?php echo $language['language_id']; ?>]" 
								value="<?php if( !empty($socnetauth2_design_reg_header[ $language['language_id'] ]) ) 
									echo $socnetauth2_design_reg_header[ $language['language_id'] ]; ?>" >&nbsp;<img 
								src="<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							</p>
							<?php } ?>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_format; ?>
						</td>
						<td>
							<table class="format_table" cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td width=33%><input type="radio" name="socnetauth2_reg_format" value="kvadrat"
								<?php if( $socnetauth2_reg_format == 'kvadrat' ) { 
								?> checked <?php } ?> 
								id="socnetauth2_reg_format_kvadrat"
								><label for="socnetauth2_reg_format_kvadrat"
								><?php echo $text_format_kvadrat; ?></label></td>
								
								<td width=33%><input type="radio" name="socnetauth2_reg_format" value="bline"
								<?php if( $socnetauth2_reg_format == 'bline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_reg_format_bline"
								><label for="socnetauth2_reg_format_bline"><?php echo $text_format_bline; ?></label></td>
								
								<td><input type="radio" name="socnetauth2_reg_format" value="lline"
								<?php if( $socnetauth2_reg_format == 'lline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_reg_format_lline"
								><label for="socnetauth2_reg_format_lline"
								><?php echo $text_format_lline; ?></label></td>
							</tr>
							<tr>
								<td valign=top><img src="view/image/socnetauth2/kvadrat.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/bline.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/lline.png" style="border: 1px #ededed solid;"></td>
							</tr>
							<tr>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
									
								</td>
								<td valign=top><br>
								<b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_header"&gt;{header}&lt;/div&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
								</td>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div&gt;
&lt;div class="sna_header" style="float: left; padding-right: 15px;"&gt;{header} &lt;/div&gt;<br>
&lt;div class="sna_icons" style="float: left; padding-top: 7px;"&gt;{icons}&lt;/div&gt;<br>
&lt;br style="clear: both;"&gt;
&lt;/div&gt;</td>
							</tr>
							</table>
						</td>	
					</tr>
					</table>
					
				</div>
				<div id="tab-design-icons" class="design_options"
				 <?php if( $tab2 != 'icons' ) { ?> style="display: none;" <?php } ?>>
					<h2><?php echo $tab_design_icons; ?></h2>
					<div><?php echo $text_count_icons; ?> <select id="count_icons"
					onchange="$('.count_icons_blocks').hide(); $('#count_icons_block'+this.value).show();"
					>
					<?php for($i=1; $i<10; $i++) { ?>
						<option value="<?php echo $i; ?>"
						<?php if( $i == $count_icons ) { ?> selected <?php } ?>
						><?php echo $i; ?></option>
					<?php } ?>
					</select> <?php echo $text_current_count_icons; ?><?php echo $count_icons; ?></div><br>
					<div><?php echo $text_count_icons_notice; ?></div>
					
					
					<?php for($i=1; $i<10; $i++) { ?>
					<div id="count_icons_block<?php echo $i; ?>" class="count_icons_blocks"
					<?php if( $i!=$count_icons ) { ?> style="display: none;" <?php } ?>
					>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_bline_html[$i]; ?>
						</td>
						<td>
							<textarea class="form-control" rows=<?php echo $i+6; ?> style="width: 100%;"
							name="socnetauth2_bline_html[<?php echo $i ?>]"
							><?php echo $socnetauth2_bline_html[$i]; ?></textarea>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_lline_html[$i]; ?>
						</td>
						<td>
							<textarea class="form-control" rows=<?php echo $i+6; ?> style="width: 100%;"
							name="socnetauth2_lline_html[<?php echo $i ?>]"
							><?php echo $socnetauth2_lline_html[$i]; ?></textarea>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_kvadrat_html[$i]; ?>
						</td>
						<td>
							<textarea class="form-control" rows=<?php echo $i+6; ?> style="width: 100%;"
							name="socnetauth2_kvadrat_html[<?php echo $i ?>]"
							><?php echo $socnetauth2_kvadrat_html[$i]; ?></textarea>
						</td>	
					</tr>
					</table>
					</div>
					
					<?php } ?>
				</div>
				
				<div id="tab-design-widget" class="design_options"
					<?php if( $tab2 != 'widget' ) { ?> style="display: none;" <?php } ?>>
					<h2><?php echo $tab_design_widget; ?></h2>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_widget_notice; ?>
						</td>
						<td>
							<?php echo $entry_widget_notice_text; ?> 
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_status; ?>
						</td>
						<td>
							<select name="socnetauth2_design_widget_status" class="form-control" >
							  <?php if ( $socnetauth2_design_widget_status ) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0" ><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_widget_after; ?>
						</td>
						<td>
							<select  class="form-control" name="socnetauth2_widget_after">
								<option value="hide"
								<?php if( $socnetauth2_widget_after=='hide' ) { ?> selected <?php } ?>
								><?php echo $text_widget_after_hide; ?></option>
								<option value="show"
								<?php if( $socnetauth2_widget_after=='show' ) { ?> selected <?php } ?>
								><?php echo $text_widget_after_show; ?></option>
							</select>
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_design_widget_name; ?>
						</td>
						<td>
							<?php foreach ($languages as $language) { ?>
							<p>
								<input type="text"  class="form-control" style="width: 50%;"
								name="socnetauth2_widget_name[<?php echo $language['language_id']; ?>]" 
								value="<?php if( !empty($socnetauth2_widget_name[ $language['language_id'] ]) ) 
									echo $socnetauth2_widget_name[ $language['language_id'] ]; ?>" >&nbsp;<img 
								src="<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							</p>
							<?php } ?>
						</td>	
					</tr>
					
					<tr>
						<td>
							<?php echo $entry_design_widget_format; ?>
						</td>
						<td>
							<table class="format_table" cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td width=33%><input type="radio" name="socnetauth2_widget_format" value="kvadrat"
								<?php if( $socnetauth2_widget_format == 'kvadrat' ) { 
								?> checked <?php } ?> 
								id="socnetauth2_widget_format_kvadrat"
								><label for="socnetauth2_widget_format_kvadrat"
								><?php echo $text_format_kvadrat; ?></label></td>
								
								<td width=33%><input type="radio" name="socnetauth2_widget_format" value="bline"
								<?php if( $socnetauth2_widget_format == 'bline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_widget_format_bline"
								><label for="socnetauth2_widget_format_bline"><?php echo $text_format_bline; ?></label></td>
								
								<td><input type="radio" name="socnetauth2_widget_format" value="lline"
								<?php if( $socnetauth2_widget_format == 'lline' ) { 
								?> checked <?php } ?>
								id="socnetauth2_widget_format_lline"
								><label for="socnetauth2_widget_format_lline"
								><?php echo $text_format_lline; ?></label></td>
							</tr>
							<tr>
								<td valign=top><img src="view/image/socnetauth2/kvadrat.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/bline.png" style="border: 1px #ededed solid;"></td>
								<td valign=top><img src="view/image/socnetauth2/lline.png" style="border: 1px #ededed solid;"></td>
							</tr>
							<tr>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
									
								</td>
								<td valign=top><br>
								<b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div class="sna_header"&gt;{header}&lt;/div&gt;<br>
&lt;div class="sna_icons"&gt;{icons}&lt;/div&gt;
								</td>
								<td valign=top><br><b><?php echo $text_recomendation_code; ?></b><br>
								&lt;style&gt;{style}&lt;/style&gt;<br>
&lt;div&gt;
&lt;div class="sna_header" style="float: left; padding-right: 15px;"&gt;{header} &lt;/div&gt;<br>
&lt;div class="sna_icons" style="float: left; padding-top: 7px;"&gt;{icons}&lt;/div&gt;<br>
&lt;br style="clear: both;"&gt;
&lt;/div&gt;</td>
							</tr>
							</table>
						</td>	
					</tr>
					</table>
					
					
					
					
	  <br><br>
	   <table id="module" class="list">
          <thead>
            <tr>
              <td class="left"><?php echo $entry_widget_layout; ?></td>
              <td class="left"><?php echo $entry_widget_position; ?></td>
              <td class="left"><?php echo $entry_widget_status; ?></td>
              <td class="right"><?php echo $entry_widget_sort_order; ?></td>
              <td></td>
            </tr>
          </thead>
          <?php $module_row = 0; ?>
          <?php foreach ($socnetauth2_modules as $module) { ?>
          <tbody id="module-row<?php echo $module_row; ?>">
            <tr>
              <td class="left"><select name="socnetauth2_modules[<?php echo $module_row; ?>][layout_id]">
                  <?php foreach ($layouts as $layout) { ?>
                  <?php if ($layout['layout_id'] == $module['layout_id']) { ?>
                  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
                  <?php } else { ?>
                  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
                  <?php } ?>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="socnetauth2_modules[<?php echo $module_row; ?>][position]">
                  <?php if ($module['position'] == 'content_top') { ?>
                  <option value="content_top" selected="selected"><?php echo $text_content_top; ?></option>
                  <?php } else { ?>
                  <option value="content_top"><?php echo $text_content_top; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'content_bottom') { ?>
                  <option value="content_bottom" selected="selected"><?php echo $text_content_bottom; ?></option>
                  <?php } else { ?>
                  <option value="content_bottom"><?php echo $text_content_bottom; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'column_left') { ?>
                  <option value="column_left" selected="selected"><?php echo $text_column_left; ?></option>
                  <?php } else { ?>
                  <option value="column_left"><?php echo $text_column_left; ?></option>
                  <?php } ?>
                  <?php if ($module['position'] == 'column_right') { ?>
                  <option value="column_right" selected="selected"><?php echo $text_column_right; ?></option>
                  <?php } else { ?>
                  <option value="column_right"><?php echo $text_column_right; ?></option>
                  <?php } ?>
                </select></td>
              <td class="left"><select name="socnetauth2_modules[<?php echo $module_row; ?>][status]">
                  <?php if ($module['status']) { ?>
                  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                  <option value="0"><?php echo $text_disabled; ?></option>
                  <?php } else { ?>
                  <option value="1"><?php echo $text_enabled; ?></option>
                  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                  <?php } ?>
                </select></td>
              <td class="right"><input type="text" name="socnetauth2_modules[<?php echo $module_row; ?>][sort_order]" value="<?php echo $module['sort_order']; ?>" size="3" /></td>
              <td class="left"><a onclick="$('#module-row<?php echo $module_row; ?>').remove();" class="button"
			  ><span><?php echo $button_remove; ?></span></a></td>
            </tr>
          </tbody>
          <?php $module_row++; ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="4"></td>
              <td class="left"><a onclick="addModule();" class="button"><span><?php echo $button_add_module; ?></span></a></td>
            </tr>
          </tfoot>
        </table>
				</div>
				
				<div id="tab-design-popup" class="design_options"
					<?php if( $tab2 != 'popup' ) { ?> style="display: none;" <?php } ?>>
					<h2><?php echo $tab_design_popup; ?></h2>
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_popup_notice; ?>
						</td>
						<td>
							<?php echo $entry_popup_notice_text; ?> 
						</td>	
					</tr>
					<tr>
						<td>
							<?php echo $entry_mobile_control; ?>
						</td>
						<td>
							<select name="socnetauth2_mobile_control" class="form-control" >
							  <?php if ( $socnetauth2_mobile_control ) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0" ><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected" ><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select>
						</td>	
					</tr>
					</table>
								
								
					<table class="form">
					<tr>
						<td>
							<?php echo $entry_popup_name; ?>
						</td>
						<td>
							<?php foreach ($languages as $language) { ?>
							<p>
							<input type="text" name="socnetauth2_popup_name[<?php echo $language['language_id']; ?>]" value="<?php if( !empty($socnetauth2_popup_name[ $language['language_id'] ]) ) echo $socnetauth2_popup_name[ $language['language_id'] ]; ?>" style="width: 300px;"
							>&nbsp;<img src="<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" align="top" />
							</p>
							<?php } ?>
						</td>
					</tr>
					</table>
					<br><br>
					<table id="popup" class="list">
					  <thead>
						<tr>
						  <td class="left"><?php echo $entry_widget_layout; ?></td>
						  <td class="left"><?php echo $entry_widget_status; ?></td>
						  <td></td>
						</tr>
					  </thead>
					  <?php $popup_row = 0; ?>
					  <?php foreach ($socnetauth2_popups as $popup) { ?>
					  <tbody id="popup-row<?php echo $popup_row; ?>">
						<tr>
						  <td class="left"><select name="socnetauth2_popups[<?php echo $popup_row; ?>][layout_id]">
							  <?php foreach ($layouts as $layout) { ?>
							  <?php if ($layout['layout_id'] == $popup['layout_id']) { ?>
							  <option value="<?php echo $layout['layout_id']; ?>" selected="selected"><?php echo $layout['name']; ?></option>
							  <?php } else { ?>
							  <option value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
							  <?php } ?>
							  <?php } ?>
							</select></td>
						  <td class="left"><select name="socnetauth2_popups[<?php echo $popup_row; ?>][status]">
							  <?php if ($popup['status']) { ?>
							  <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
							  <option value="0"><?php echo $text_disabled; ?></option>
							  <?php } else { ?>
							  <option value="1"><?php echo $text_enabled; ?></option>
							  <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
							  <?php } ?>
							</select></td>
						  <td class="left"><a onclick="$('#popup-row<?php echo $popup_row; ?>').remove();" class="button"
						  ><span><?php echo $button_remove; ?></span></a></td>
						</tr>
					  </tbody>
					  <?php $popup_row++; ?>
					  <?php } ?>
					  <tfoot>
						<tr>
						  <td colspan="2"></td>
						  <td class="left"><a onclick="addPopup();" class="button"><span><?php echo $button_add_module; ?></span></a></td>
						</tr>
					  </tfoot>
					</table>
					
				</div>
		</div>
	  </div>
	  <?php /* end 1505 */ ?>
	  
	  
	  
	  
	  
	  <div id="tab-support">
	  
			<p><?php echo $text_frame; ?></p>
			<iframe width=100% height=700 src="https://softpodkluch.ru/faq/socnetauth2.html" border=0 frameborder="0" style="border: 1px #ccc solid;"></iframe>
			<?php echo $text_contact; ?>
	  </div>
      </form>
<script type="text/javascript"><!--
$('#tabs a').tabs(); 



$('#<?php echo $tab; ?>').click();

</script>

<script type="text/javascript"><!--
var module_row = <?php echo $module_row; ?>;

function addModule() {	
	html  = '<tbody id="module-row' + module_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="socnetauth2_modules[' + module_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="socnetauth2_modules[' + module_row + '][position]">';
	html += '      <option value="content_top"><?php echo $text_content_top; ?></option>';
	html += '      <option value="content_bottom"><?php echo $text_content_bottom; ?></option>';
	html += '      <option value="column_left"><?php echo $text_column_left; ?></option>';
	html += '      <option value="column_right"><?php echo $text_column_right; ?></option>';
	html += '    </select></td>';
	html += '    <td class="left"><select name="socnetauth2_modules[' + module_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="right"><input type="text" name="socnetauth2_modules[' + module_row + '][sort_order]" value="" size="3" /></td>';
	html += '    <td class="left"><a onclick="$(\'#module-row' + module_row + '\').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#module tfoot').before(html);
	
	module_row++;
}

var popup_row = <?php echo $popup_row; ?>;

function addPopup() {	
	html  = '<tbody id="popup-row' + popup_row + '">';
	html += '  <tr>';
	html += '    <td class="left"><select name="socnetauth2_popups[' + popup_row + '][layout_id]">';
	<?php foreach ($layouts as $layout) { ?>
	html += '      <option value="<?php echo $layout['layout_id']; ?>"><?php echo addslashes($layout['name']); ?></option>';
	<?php } ?>
	html += '    </select></td>';
	html += '    <td class="left"><select name="socnetauth2_popups[' + popup_row + '][status]">';
    html += '      <option value="1" selected="selected"><?php echo $text_enabled; ?></option>';
    html += '      <option value="0"><?php echo $text_disabled; ?></option>';
    html += '    </select></td>';
	html += '    <td class="left"><a onclick="$(\'#popup-row' + popup_row + '\').remove();" class="button"><span><?php echo $button_remove; ?></span></a></td>';
	html += '  </tr>';
	html += '</tbody>';
	
	$('#popup tfoot').before(html);
	
	popup_row++;
}
//--></script> 

    </div>
  </div>
</div>
<?php echo $footer; ?>