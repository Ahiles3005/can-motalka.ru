<?php echo $header; ?>
<style>
.form-control, textarea {
	width: 500px;
}

#payment_objects .form-control {
	width: 200px;
}

</style>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { 
	foreach($error_warning as $err) {
  ?>
  <div class="warning"><?php echo $err; ?></div>
  <?php } } ?>
  <?php if ($success) { 
  ?>
  <div class="success"><?php echo $success; ?></div>
  <?php }  ?>
  
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#robokassa_stay').attr('value', '0'); $('#form').submit();" class="button"><span><?php echo $button_save_and_go; ?></span></a><a onclick="$('#robokassa_stay').attr('value', '1'); $('#form').submit();" class="button"><span><?php echo $button_save_and_stay; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
      <form  autocomplete="off"   action="<?php echo $action; ?>" method="post"  autocomplete="off" enctype="multipart/form-data" id="form">
	  <input type="hidden" name="robokassa_stay" id="robokassa_stay" value="0">
	  <input type="hidden" name="current_store_id" id="current_store_id" value="0">
	  
	  <div class="htabs" id="tabs">
		<a href="#tab-general" style="display: inline;" <?php if( empty($current_store_id) ) { ?> class="selected" <?php } ?> 
		 onclick="$('#current_store_id').attr('value', '0');" 
		><?php echo $tab_general; ?></a>
		<?php foreach($stores as $store) { ?>
			<a href="#tab-general-<?php echo $store['store_id']; ?>" 
				onclick="$('#current_store_id').attr('value', '<?php echo $store['store_id']; ?>');" 
				style="display: inline;"
				id="tab-<?php echo $store['store_id']; ?>"
				 <?php if( $current_store_id == $store['store_id'] ) { ?> class="selected" <?php } ?> 
				><?php echo $store['name']; ?></a>
		<?php } ?>
		
		<a href="#tab-instruction" style="display: inline;"
		onclick="$('#current_store_id').attr('value', '0');" 
		><?php echo $tab_instruction; ?></a>
		
		<?php /* kin insert metka: u1 */ ?>
		<?php if( !empty( $robokassa_shop_login ) ) { ?>
		<a href="#tab-generation" style="display: inline;"
		onclick="$('#current_store_id').attr('value', '0');" 
		><?php echo $tab_generation; ?></a>
		<?php } ?>
		<?php /* end kin metka */ ?>
		
		<a href="#tab-support" style="display: inline;"
		onclick="$('#current_store_id').attr('value', '0');" 
		><?php echo $tab_support; ?></a>
	  </div>
	  <div id="tab-general" style="display: block;">
	  <?php /* start 0105 */ ?>
	  <table width=100%>
	  <tr>
		<td width=70% valign=top>
	  <?php /* end 0105 */ ?>
        <table class="form">
		  <tr>
			<td colspan=2>
				<b><?php echo $notice; ?></b>
			</td>
		  </tr>
		  
          <tr>
            <td width=200><?php echo $entry_version; ?></td>
            <td>1.66</td>
          </tr>
          <tr>
            <td width=200><?php echo $entry_status; ?></td>
            <td><select name="robokassa_status">
                <?php if ($robokassa_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_shop_login; ?></td>
            <td><input type="text" name="robokassa_shop_login" autocomplete="off" value="<?php echo $robokassa_shop_login; ?>" />
				<?php echo $text_login_notice; ?>
			</td>
          </tr>
		  <?php /* start update: a1 */ ?>
          <tr>
            <td><?php echo $entry_password1; ?></td>
            <td><input type="text" autocomplete="off"  name="robokassa_p1" /> <?php if($robokassa_password1) echo $text_saved; ?>
			
			<div>
				<?php echo $text_password_notice; ?>
			</div>
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_password2; ?></td>
            <td><input type="text"  autocomplete="off"  name="robokassa_p2" /> <?php if($robokassa_password2) echo $text_saved; ?></td>
          </tr>
		  <tr>
            <td><?php echo $entry_result_url; ?>:</td>
            <td><?php echo $HTTPS_CATALOG; ?>index.php?route=payment/robokassa/result</td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_algoritm; ?></td>
            <td><b>MD5</b></td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_result_method; ?></td>
            <td>POST</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_success_url; ?></td>
            <td><?php echo $HTTPS_CATALOG; ?>index.php?route=checkout/robosuccess</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_success_method; ?></td>
            <td>POST</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_fail_url; ?></td>
            <td><?php echo $HTTPS_CATALOG; ?>index.php?route=payment/robokassa/fail</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_fail_method; ?></td>
            <td>POST</td>
          </tr>
          
		  
		  
		  <tr>
            <td><?php echo $entry_test_mode; ?></td>
            <td><select name="robokassa_test_mode">
                <?php if ($robokassa_test_mode) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			  <?php /* start update: a1 */ ?> 
			  <div><?php echo $text_mode_notice; ?></div>
			  <?php /* end update: a1 */ ?>
			  </td>
          </tr>
		  
		  
		
		<?php /* start metka-kkt */ ?>
          <tr>
            <td><?php echo $entry_kkt_mode; ?></td>
            <td><select name="robokassa_kkt_mode" onchange="showKktBlock(this.value);">
                <?php if ($robokassa_kkt_mode) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			   <div style="font-weight: normal;"><?php echo $entry_kkt_mode_notice; ?></div>
			  </td>
          </tr>
		</table>
		
	  <?php /* start 0105 */ ?>
	  </td>
	  <td valign=top>
		<div style="border: 1px #ccc solid; margin-left: 20px; text-align: center; font-size: 16px;" >
			<div style="background-color: #FF802B; color: #fff;padding: 10px;">СКИДКА!</div>
			<div style="padding: 10px;"><a href="https://partner.robokassa.ru/Reg/Register?culture=ru" 
			target=_blank>Зарегистрируйтесь</a> в Робокассе с промо-кодом:
			<div style="text-align: center; padding: 5px;"
			><b style="font-size: 18px; color: red;">softpodkluch</b></div>
			<div>и получите тариф Базовый (вместо Стартовый)</div>
			
			<div><a href="https://www.robokassa.ru/ru/NewTariff.aspx"
			target=_blank>(Ссылка на тарифы)</a></div><br>
			<div>
			Комиссии в тарифе Базовый - <b>НИЖЕ</b>. <br>
			В частности при приеме оплаты
			картами Вы заплатите комиссию <b>2.9% вместо 3.9%</b>
			(в тарифе Стартовый).
			</div>
			<br>
			<a href="https://partner.robokassa.ru/Reg/Register?culture=ru" 
			target=_blank>Ссылка на форму регистрации</a>
			<br><br>
			<b>Внимание!</b>
			<ul style="text-align: left;">
				<li>Предложение действует только для тех кто будет регистрироваться в Робокассе как юр.лицо (включая ИП).</li>
				<li>Промо-код можно ввести только при регистрации аккаунта (а не магазина). После регистрации аккаунта промо-код уже подключить нельзя. <b>Но можно зарегистрировать другой аккаунт.</b> и указать промо-код там.</li>
				<li>Тариф Базовый будет действовать первые <b>3 месяца</b> работы (далее тариф может быть 
			пересмотрен в зависимости от Вашего оборота)</li>
			</ul>
			</div>
		</div>
	  </td>
	  </tr>
	  </table>
	  <?php /* end 0105 */ ?>
		
		
		<div id="kkt_block">
		<table class="form">
          <tr>
            <td><?php echo $entry_kkt_sno; ?></td>
            <td><select name="robokassa_kkt_sno">
                <option value="osn" 
				<?php if ($robokassa_kkt_sno == 'osn') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_osn; ?></option>
				
                <option value="usn_income" 
				<?php if ($robokassa_kkt_sno == 'usn_income') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_usn_income; ?></option>
				
                <option value="usn_income_outcome" 
				<?php if ($robokassa_kkt_sno == 'usn_income_outcome') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_usn_income_outcome; ?></option>
				
                <option value="envd" 
				<?php if ($robokassa_kkt_sno == 'envd') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_envd; ?></option>
				
                <option value="esn" 
				<?php if ($robokassa_kkt_sno == 'esn') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_esn; ?></option>
				
                <option value="patent" 
				<?php if ($robokassa_kkt_sno == 'patent') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_sno_patent; ?></option>
				
				
              </select>
			  </td>
          </tr>
		
		
          <tr>
            <td><?php echo $entry_kkt_tax; ?></td>
            <td><select name="robokassa_kkt_tax">
                
                <option value="none" 
				<?php if ($robokassa_kkt_tax == 'none') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_none; ?></option>
				
                <option value="vat0" 
				<?php if ($robokassa_kkt_tax == 'vat0') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_vat0; ?></option>
				
                <option value="vat10" 
				<?php if ($robokassa_kkt_tax == 'vat10') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_vat10; ?></option>
				
                <option value="vat18" 
				<?php if ($robokassa_kkt_tax == 'vat18') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_vat18; ?></option>
				
                <option value="vat110" 
				<?php if ($robokassa_kkt_tax == 'vat110') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_vat110; ?></option>
				
                <option value="vat118" 
				<?php if ($robokassa_kkt_tax == 'vat118') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_tax_vat118; ?></option>
				
              </select>
			  </td>
          </tr>
		  </table>
		  
		<div id="pay_block2">
		  <table class="form">
          <tr>
            <td><?php echo $entry_kkt_payment_method; ?></td>
            <td>
		  <select name="robokassa_kkt_payment_method" class="form-control">
                
                <option value="full_prepayment" 
				<?php if ($robokassa_kkt_payment_method == 'full_prepayment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_full_prepayment; ?></option>
                
                <option value="prepayment" 
				<?php if ($robokassa_kkt_payment_method == 'prepayment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_prepayment; ?></option>
                
                <option value="advance" 
				<?php if ($robokassa_kkt_payment_method == 'advance') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_advance; ?></option>
                
                <option value="full_payment" 
				<?php if ($robokassa_kkt_payment_method == 'full_payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_full_payment; ?></option>
                
                <option value="partial_payment" 
				<?php if ($robokassa_kkt_payment_method == 'partial_payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_partial_payment; ?></option>
                
                <option value="credit" 
				<?php if ($robokassa_kkt_payment_method == 'credit') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_credit; ?></option>
                
                <option value="credit_payment" 
				<?php if ($robokassa_kkt_payment_method == 'credit_payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_method_credit_payment; ?></option>
              </select>
		
			  </td>
          </tr>
		   
          <tr>
            <td><?php echo $entry_kkt_payment_object; ?></td>
            <td>
		  <select name="robokassa_kkt_payment_object" class="form-control"
			  onchange="changeKktObject(this.value);"
			  >
				
                <option value="commodity" 
				<?php if ($robokassa_kkt_payment_object == 'commodity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_commodity; ?></option>
				
                <option value="" disabled
				>-----------------</option>
				
                <option value="different" 
				<?php if ($robokassa_kkt_payment_object == 'different') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_different; ?></option>
				
                <option value="" disabled
				>-----------------</option>
				
                <option value="excise" 
				<?php if ($robokassa_kkt_payment_object == 'excise') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_excise; ?></option>
				
                <option value="job" 
				<?php if ($robokassa_kkt_payment_object == 'job') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_job; ?></option>
				 
				
                <option value="service" 
				<?php if ($robokassa_kkt_payment_object == 'service') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_service; ?></option>
				
                <option value="gambling_bet" 
				<?php if ($robokassa_kkt_payment_object == 'gambling_bet') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_bet; ?></option>
				
                <option value="gambling_prize" 
				<?php if ($robokassa_kkt_payment_object == 'gambling_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_prize; ?></option> 
				
                <option value="lottery" 
				<?php if ($robokassa_kkt_payment_object == 'lottery') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery; ?></option> 
				
                <option value="lottery_prize" 
				<?php if ($robokassa_kkt_payment_object == 'lottery_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery_prize; ?></option> 
				
                <option value="intellectual_activity" 
				<?php if ($robokassa_kkt_payment_object == 'intellectual_activity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_intellectual_activity; ?></option> 
				
                <option value="payment" 
				<?php if ($robokassa_kkt_payment_object == 'payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_payment; ?></option> 
				
                <option value="agent_commission" 
				<?php if ($robokassa_kkt_payment_object == 'agent_commission') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_agent_commission; ?></option> 
				
                <option value="composite" 
				<?php if ($robokassa_kkt_payment_object == 'composite') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_composite; ?></option> 
				
                <option value="another" 
				<?php if ($robokassa_kkt_payment_object == 'another') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_another; ?></option> 
				
                <option value="property_right" 
				<?php if ($robokassa_kkt_payment_object == 'property_right') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_property_right; ?></option> 
				
                <option value="non-operating_gain" 
				<?php if ($robokassa_kkt_payment_object == 'non-operating_gain') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_non_operating_gain; ?></option> 
				
                <option value="insurance_premium" 
				<?php if ($robokassa_kkt_payment_object == 'insurance_premium') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_insurance_premium; ?></option> 
				
                <option value="sales_tax" 
				<?php if ($robokassa_kkt_payment_object == 'sales_tax') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_sales_tax; ?></option> 
				
                <option value="resort_fee" 
				<?php if ($robokassa_kkt_payment_object == 'resort_fee') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_resort_fee; ?></option> 
				
              </select>
			  <div><?php echo $entry_kkt_payment_object_notice; ?></div>
			  </td>
          </tr> 
		  </table>
		<div id="block_payment_object">
			<table class="form">
			 <tr>
            <td><?php echo $entry_kkt_default_payment_object; ?></td>
            <td> 
			  <select name="robokassa_kkt_default_payment_object" class="form-control"
			  
			  >
				
                <option value="commodity" 
				<?php if ($robokassa_kkt_default_payment_object == 'commodity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_commodity; ?></option>
				
				
                <option value="excise" 
				<?php if ($robokassa_kkt_default_payment_object == 'excise') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_excise; ?></option>
				
                <option value="job" 
				<?php if ($robokassa_kkt_default_payment_object == 'job') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_job; ?></option>
				 
				
                <option value="service" 
				<?php if ($robokassa_kkt_default_payment_object == 'service') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_service; ?></option>
				
                <option value="gambling_bet" 
				<?php if ($robokassa_kkt_default_payment_object == 'gambling_bet') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_bet; ?></option>
				
                <option value="gambling_prize" 
				<?php if ($robokassa_kkt_default_payment_object == 'gambling_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_prize; ?></option> 
				
                <option value="lottery" 
				<?php if ($robokassa_kkt_default_payment_object == 'lottery') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery; ?></option> 
				
                <option value="lottery_prize" 
				<?php if ($robokassa_kkt_default_payment_object == 'lottery_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery_prize; ?></option> 
				
                <option value="intellectual_activity" 
				<?php if ($robokassa_kkt_default_payment_object == 'intellectual_activity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_intellectual_activity; ?></option> 
				
                <option value="payment" 
				<?php if ($robokassa_kkt_default_payment_object == 'payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_payment; ?></option> 
				
                <option value="agent_commission" 
				<?php if ($robokassa_kkt_default_payment_object == 'agent_commission') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_agent_commission; ?></option> 
				
                <option value="composite" 
				<?php if ($robokassa_kkt_default_payment_object == 'composite') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_composite; ?></option> 
				
                <option value="another" 
				<?php if ($robokassa_kkt_default_payment_object == 'another') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_another; ?></option> 
				
                <option value="property_right" 
				<?php if ($robokassa_kkt_default_payment_object == 'property_right') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_property_right; ?></option> 
				
                <option value="non-operating_gain" 
				<?php if ($robokassa_kkt_default_payment_object == 'non-operating_gain') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_non_operating_gain; ?></option> 
				
                <option value="insurance_premium" 
				<?php if ($robokassa_kkt_default_payment_object == 'insurance_premium') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_insurance_premium; ?></option> 
				
                <option value="sales_tax" 
				<?php if ($robokassa_kkt_default_payment_object == 'sales_tax') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_sales_tax; ?></option> 
				
                <option value="resort_fee" 
				<?php if ($robokassa_kkt_default_payment_object == 'resort_fee') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_resort_fee; ?></option> 
				
              </select>
			  <div><?php echo $entry_kkt_payment_object_notice; ?></div>
			</td>
		</tr>
		</table>
		<table class="list" id="payment_objects">
			<thead>
         	<tr>
				  <td class="left"><b><?php echo $entry_kkt_col_object; ?></b></td> 
				  <td class="left"><b><?php echo $entry_kkt_col_name; ?></b></td> 
				  <td class="left"><b><?php echo $entry_kkt_col_price; ?></b></td> 
				  <td class="left"><b><?php echo $entry_kkt_col_category; ?></b></td> 
				  <td class="left"><b><?php echo $entry_kkt_col_manufacturer; ?></b></td> 
				  <td class="left"><b><?php echo $entry_kkt_col_status; ?></b></td> 
				  <td></td>
				</tr>
			</thead>
          <?php $payment_objects_row = 0; ?>
				<?php foreach( $robokassa_kkt_payment_objects as $object ) { ?>
          <tbody id="payment_objects-row<?php echo $payment_objects_row; ?>">
				<tr>
				<td class="left"><select name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; 
				?>][object]" class="form-control"  style="width: 200px;"
				>
                <option value="commodity" 
				<?php if ($object['object'] == 'commodity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_commodity; ?></option>
                <option value="excise" 
				<?php if ($object['object'] == 'excise') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_excise; ?></option>
				
                <option value="job" 
				<?php if ($object['object'] == 'job') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_job; ?></option>
				 
				
                <option value="service" 
				<?php if ($object['object'] == 'service') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_service; ?></option>
				
                <option value="gambling_bet" 
				<?php if ($object['object'] == 'gambling_bet') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_bet; ?></option>
				
                <option value="gambling_prize" 
				<?php if ($object['object'] == 'gambling_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_gambling_prize; ?></option> 
				
                <option value="lottery" 
				<?php if ($object['object'] == 'lottery') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery; ?></option> 
				
                <option value="lottery_prize" 
				<?php if ($object['object'] == 'lottery_prize') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_lottery_prize; ?></option> 
				
                <option value="intellectual_activity" 
				<?php if ($object['object'] == 'intellectual_activity') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_intellectual_activity; ?></option> 
				
                <option value="payment" 
				<?php if ($object['object'] == 'payment') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_payment; ?></option> 
				
                <option value="agent_commission" 
				<?php if ($object['object'] == 'agent_commission') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_agent_commission; ?></option> 
				
                <option value="composite" 
				<?php if ($object['object'] == 'composite') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_composite; ?></option> 
				
                <option value="another" 
				<?php if ($object['object'] == 'another') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_another; ?></option> 
				
                <option value="property_right" 
				<?php if ($object['object'] == 'property_right') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_property_right; ?></option> 
				
                <option value="non-operating_gain" 
				<?php if ($object['object'] == 'non-operating_gain') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_non_operating_gain; ?></option> 
				
                <option value="insurance_premium" 
				<?php if ($object['object'] == 'insurance_premium') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_insurance_premium; ?></option> 
				
                <option value="sales_tax" 
				<?php if ($object['object'] == 'sales_tax') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_sales_tax; ?></option> 
				
                <option value="resort_fee" 
				<?php if ($object['object'] == 'resort_fee') { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_kkt_payment_object_resort_fee; ?></option> 
				
				</select>
			  </td>
				<td>
					<?php echo $text_name; ?><br>
					<input type="text" 
					name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; ?>][name]"
					class="form-control" value="<?php echo $object['name']; ?>" />
					<select name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row;  
					?>][name_type]" class="form-control">
						<option value="exact"
							<?php if($object['name_type'] == 'exact') { ?> selected <?php } ?>
						><?php echo $text_exact; ?></option>
						<option value="include"
							<?php if($object['name_type'] == 'include') { ?> selected <?php } ?>
						><?php echo $text_include; ?></option>
					</select>
					
					<hr>
					<?php echo $text_model; ?><br>
					
					<input type="text" 
					name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; ?>][model]"
					class="form-control" value="<?php echo $object['model']; ?>" />
					<select name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row;  
					?>][model_type]" class="form-control">
						<option value="exact"
							<?php if($object['model_type'] == 'exact') { ?> selected <?php } ?>
						><?php echo $text_exact; ?></option>
						<option value="include"
							<?php if($object['model_type'] == 'include') { ?> selected <?php } ?>
						><?php echo $text_include; ?></option>
					</select>
				</td>
				<td><?php echo $text_from; ?><br>
					<input type="text" 
					name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; ?>][from_price]"
					class="form-control" value="<?php echo $object['from_price']; ?>" /> <br>
					<?php echo $text_to; ?><br>
					<input type="text" 
					name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; ?>][to_price]"
					class="form-control" value="<?php echo $object['to_price']; ?>" /> 
				</td> 
				<td>
				
					  <input type="text" 
					  name="category" 
					  value="" 
					  id="input-category<?php echo $payment_objects_row; ?>" class="form-control filter_category" />
					  <div id="filter-category<?php echo $payment_objects_row; ?>" class="well well-sm" 
					  style="height: 150px; overflow: auto;">
						<?php if( !empty($object['filter_category']) ) { 
						foreach ($object['filter_category'] as $filter_category) { ?>
						<div id="filter-category<?php echo $payment_objects_row; ?>-<?php echo $filter_category['category_id']; ?>"
						><?php echo $filter_category['name']; ?><img src="view/image/delete.png" alt=""  onclick="$(this).parent().remove();" />
						  <input type="hidden" name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; 
						  ?>][filter_category][]" value="<?php echo $filter_category['category_id']; ?>" />
						</div>
						<?php } } ?>
					  </div>
				</td>
				<td>
				
					  <input type="text" 
					  name="manufacturer" 
					  value="" 
					  id="input-manufacturer<?php echo $payment_objects_row; ?>" class="form-control filter_manufacturer" />
					  <div id="filter-manufacturer<?php echo $payment_objects_row; ?>" class="well well-sm" 
					  style="height: 150px; overflow: auto;">
						<?php if( !empty($object['filter_manufacturer']) ) { 
						foreach ($object['filter_manufacturer'] as $filter_manufacturer) { ?>
						<div id="filter-manufacturer<?php echo $payment_objects_row; ?>-<?php echo $filter_manufacturer['manufacturer_id']; ?>"
						> <?php echo $filter_manufacturer['name']; ?><img src="view/image/delete.png" alt=""  onclick="$(this).parent().remove();" />
						  <input type="hidden" name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; 
						  ?>][filter_manufacturer][]" value="<?php echo $filter_manufacturer['manufacturer_id']; ?>" />
						</div>
						<?php } } ?>
					  </div>
				</td>
				<td>
					<select name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; ?>][status]" 
						class="form-control">
						<?php if ($object['status']) { ?>
						<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
						<option value="0"><?php echo $text_disabled; ?></option>
						<?php } else { ?>
						<option value="1"><?php echo $text_enabled; ?></option>
						<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
						<?php } ?>
					</select>
					<input type="text" 
					name="robokassa_kkt_payment_objects[<?php echo $payment_objects_row; 
					?>][sort_order]"
					class="form-control" value="<?php echo $object['sort_order']; ?>" />
				</td>
				<td><a 
				class="button"
				href="javascript: $('#payment_objects-row<?php echo $payment_objects_row; ?>').remove();"
				><span><?php echo $button_remove; ?></span></a>
				</td>
			</tr>
		  
			</tbody>
                <?php $payment_objects_row++; ?>
				<?php } ?>
				<tfoot>
				<tr>
					<td colspan=9 class="right">
						<a href="javascript: addPaymentObject();" 
						title="<?php echo $button_add; ?>" class="button"
						><span><?php echo $button_add; ?></span></a>
					</td>
				</tr>
				</tfoot>
		</table>
			  <div><?php echo $entry_kkt_payment_object_notice2; ?></div>
		
		
		</div>
				
				<script>
				function changeKktObject(value)
				{
					if( value == 'different' )
					{
						$('#block_payment_object').show();
					}
					else
					{
						$('#block_payment_object').hide();
					}
				}
				
				changeKktObject('<?php echo $robokassa_kkt_payment_object; ?>');
				</script>
		  
		  
		</div>
		</div>
		<table class="form">
		<?php /* end metka-kkt */ ?>
		
		  
		<?php /* start 2709 */ ?>
		  <tr>
			<td>
				<?php echo $entry_icons; ?>
			</td>
			<td>
			  <select name="robokassa_icons"
			onchange="if(  this.value == 1 ) $('#icons_block').show(); else $('#icons_block').hide();"
			  >
                <?php if ($robokassa_icons) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			</td>
		 </tr>
		 </table>
		 <div  id="icons_block" 
			<?php if( !$robokassa_icons ) { ?> style="display: none;" <?php } ?>>
		  
			<script>
				function show_hide_inname_block(value)
				{
					if( value == 'inname' ) {
						$('#inname_block').show();
					} 
					else
					{
						$('#inname_block').hide();
					}
					
				}
			</script>
		 <table class="form">
		 <tr>
			<td>
				<?php echo $entry_icons_size; ?>
			</td>
			<td>
			  <input type="text" name="robokassa_icons_width"
				value="<?php echo $robokassa_icons_width; ?>" 
				style="width: 50px; float: left;"
				><span style="float: left; padding: 5px;"> x </span><input type="text" 
				name="robokassa_icons_height" value="24" 
				value="<?php echo $robokassa_icons_height; ?>" 
				style="width: 50px; float: left;">
				
			</td>
		 </tr>
		 
			<tr>
			<td>
				<?php echo $entry_icons_format; ?>
			</td>
			<td>
			  
			  <table>
			  <tr>
				<td valign=top style="padding-right: 15px;"><input type="radio" name="robokassa_icons_format" 
				value="inname" 
					id="robokassa_icons_format_inname"
					<?php if( $robokassa_icons_format == 'inname' ) { ?> checked <?php } ?>
					onclick="show_hide_inname_block('inname')"
					>
				</td>
				<td>
					<label for="robokassa_icons_format_inname" style="font-weight: normal;"
					><?php echo $entry_icons_format_inname; ?></label><br><br>
				</td>
			  </tr>
			  <tr>
				<td valign=top style="padding-right: 15px;"><input type="radio" name="robokassa_icons_format" 
				value="inimage" 
					id="robokassa_icons_format_inimage"
					<?php if( $robokassa_icons_format == 'inimage' ) { ?> checked <?php } ?>
					onclick="show_hide_inname_block('inimage')"
					>
				</td>
				<td>
					<label for="robokassa_icons_format_inimage" style="font-weight: normal;"
					><?php echo $entry_icons_format_inimage; ?></label><br><br>
				</td>
			  </tr>
			  </table>
				
			</td>
		 </tr>
			
		 </table>
		 <div class="form-group " id="inname_block" 
				<?php if( $robokassa_icons_format != 'inname' ) { 
				?> style="display: none;" <?php } ?>
				>
			 <table class="form">
			  <tr>
				<td>
					<?php echo $entry_icons_html; ?>
				</td>
				<td>
					<textarea rows=7 cols=50 class="form-control" 
							name="robokassa_icons_html"
							><?php 
								if( !empty($robokassa_icons_html) )
									echo $robokassa_icons_html; 
							?></textarea>
				</td>
			 </tr>
			 </table>
		  </div>
		 </div>
		  
		  
			   
		<table class="form"> 
		<?php /* end 2709 */ ?>
		
		  
		  
          <tr>
            <td><?php echo $entry_paynotify; ?></td>
            <td><select name="robokassa_paynotify"
			
			  <?php /* start 0106 */ ?>
			  onchange="if( this.value == 1 ) $('#block_paynotify').show(); else $('#block_paynotify').hide(); "
			  <?php /* end 0106 */ ?>
			>
                <?php if ($robokassa_paynotify) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
          <tr>
            <td><?php echo $entry_paynotify_email; ?></td>
            <td><input type="text" name="robokassa_paynotify_email" value="<?php echo $robokassa_paynotify_email; ?>" /></td>
          </tr>
		  </table>
		  
		
		<?php /* start 0106 */ ?>
		
		<div id="block_paynotify"
		<?php if( empty($robokassa_paynotify) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		  <table class="form">
          <tr>
            <td><?php echo $entry_paynotify_subject; ?></td>
            <td>
			<input type="text" name="robokassa_paynotify_subject" class="form-control" 
			  value="<?php echo $robokassa_paynotify_subject; ?>" />
			</td>
          </tr>
          <tr>
            <td><?php echo $entry_paynotify_message; ?></td>
            <td>
			<textarea name="robokassa_paynotify_message" class="form-control" 
			  rows=10  cols=50 
			  ><?php echo $robokassa_paynotify_message; 
			  ?></textarea>
			</td>
          </tr>
		</table>
		</div> 
		<?php /* end 0106 */ ?>
		
		  
		  <table class="form">
          <tr>
            <td><?php echo $entry_sms_status; ?></td>
            <td><select name="robokassa_sms_status" <?php /* start 0106 */ ?>
			  onchange="if( this.value == 1 ) $('#block_smsnotify').show(); else $('#block_smsnotify').hide(); "
			  <?php /* end 0106 */ ?>
			  >
                <?php if ($robokassa_sms_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			  <p><?php echo $entry_sms_instruction; ?></p>
			  
			  </td>
          </tr>
		  </table>
		<?php /* start 0106 */ ?>
		<div id="block_smsnotify"
		<?php if( empty($robokassa_sms_status) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		<?php /* end 0106 */ ?>
		<table class="form">
          <tr>
            <td><?php echo $entry_sms_phone; ?></td>
            <td><input type="text" name="robokassa_sms_phone" value="<?php echo $robokassa_sms_phone; ?>" /></td>
          </tr> 
          <tr>
            <td><?php echo $entry_sms_message; ?></td>
            <td><textarea cols=50 rows=7 name="robokassa_sms_message"
			><?php echo $robokassa_sms_message; ?></textarea></td>
          </tr>
		</table>  
		</div>
		  
		<table class="form">
          <tr>
            <td><?php echo $entry_dopcost; ?></td>
            <td><input type="text" name="robokassa_dopcost" id="robokassa_dopcosttype_text"
				size=20 value="<?php echo $robokassa_dopcost; ?>"
			>&nbsp;<select name="robokassa_dopcosttype" id="robokassa_dopcosttype_select" 
					onchange="changeDopcost()">
					<option value="int" <?php if($robokassa_dopcosttype == 'int') { ?> selected <?php } ?>
					><?php echo $text_dopcost_int; ?></option>
					
					<option value="percent" <?php if($robokassa_dopcosttype == 'percent') { ?> selected <?php } ?>
					><?php echo $text_dopcost_percent; ?></option>
					
					<option value="comission" <?php if($robokassa_dopcosttype == 'comission') { ?> selected <?php } ?>
					><?php echo $text_dopcost_comission; ?></option>
				</select></td>
          </tr>
			<script>
				function changeDopcost()
				{	
					var e = document.getElementById("robokassa_dopcosttype_select");
					
					if( e.selectedIndex == 2 )
					{
						document.getElementById("robokassa_dopcosttype_text").disabled = true;
						document.getElementById("robokassa_dopcosttype_text").value = "";
					}
					else
					{
						document.getElementById("robokassa_dopcosttype_text").disabled = false;
					}
				}
				
				changeDopcost();
			</script>
		  
		  <tr>
            <td><?php echo $entry_dopcostname; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_dopcostname[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_dopcostname[$language['code']]) ? $robokassa_dopcostname[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
          <tr>
            <td><?php echo $entry_script; ?></td>
            <td>
				<p><input type="radio" name="robokassa_confirm_status" value="before" id="robokassa_confirm_status_before"
				<?php if( $robokassa_confirm_status == 'before' ) { ?> checked <?php } ?>
				onclick="show_hide_block('before', 0)"
				><label for="robokassa_confirm_status_before"><?php echo $entry_script_before; ?></label></p>
				
				<p><input type="radio" name="robokassa_confirm_status" value="after" id="robokassa_confirm_status_after"
				<?php if( $robokassa_confirm_status == 'after' ) { ?> checked <?php } ?>
				onclick="show_hide_block('after', 0)"
				><label for="robokassa_confirm_status_after"><?php echo $entry_script_after; ?></label></p>			
			
				<p><input type="radio" name="robokassa_confirm_status" value="premod" id="robokassa_confirm_status_premod"
				<?php if( $robokassa_confirm_status == 'premod' ) { ?> checked <?php } ?>
				onclick="show_hide_block('premod', 0)"
				><label for="robokassa_confirm_status_premod"><?php echo $entry_script_premod; ?></label></p>
			
			</td>
          </tr>
		  </table>
		  
		  <table id="block_before0"  class="form" width=100%>
		  <tr>
            <td width=200><?php echo $entry_confirm_notify; ?></td>
            <td><select name="robokassa_confirm_notify">
                <?php if ($robokassa_confirm_notify) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_confirm_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_confirm_comment[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_confirm_comment[$language['code']]) ? $robokassa_confirm_comment[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_order_comment; ?><br><br><?php echo $entry_order_comment_notice; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_order_comment[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_order_comment[$language['code']]) ? $robokassa_order_comment[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td width=200><?php echo $entry_preorder_status; ?></td>
            <td><select name="robokassa_preorder_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_preorder_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td width=200><?php echo $entry_clear_order; ?></td>
            <td><select name="robokassa_clear_order">
                <?php if ($robokassa_clear_order) { ?>
                <option value="1" selected="selected"><?php echo $entry_clear_order_yes; ?></option>
                <option value="0"><?php echo $entry_clear_order_no; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $entry_clear_order_yes; ?></option>
                <option value="0" selected="selected"><?php echo $entry_clear_order_no; ?></option>
                <?php } ?>
                
				
              </select>
			  <div><?php echo $entry_clear_order_notice; ?></div>
			 </td>
          </tr>
		  </table>
		  
		  <div id="block_after0"></div>
		  
		  <div id="block_premod0">
		  <table class="form" width=100%>
		  <tr>
            <td><?php echo $entry_order_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_order_comment[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_order_comment[$language['code']]) ? $robokassa_premod_order_comment[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_confirm_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_confirm_comment[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_confirm_comment[$language['code']]) ? $robokassa_premod_confirm_comment[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td width=200><?php echo $entry_preorder_status; ?></td>
            <td><select name="robokassa_premod_preorder_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_premod_preorder_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_hide_order_comment; ?>
			<br><br><?php echo $entry_order_comment_notice; ?>
			
			</td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_hide_order_comment[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_hide_order_comment[$language['code']]) ? $robokassa_premod_hide_order_comment[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		<?php /* start 0106 */ ?>
		  <tr>
            <td><?php echo $entry_premod_paynotify; ?></td>
            <td>
				<select name="robokassa_premod_paynotify" 
			  class="form-control" 
			  onchange="if( this.value == 1 ) $('#block_premod_paynotify').show(); else $('#block_premod_paynotify').hide(); "
			  >
                <?php if ($robokassa_premod_paynotify ) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			</td>
          </tr>
		  </table>
		
		<div id="block_premod_paynotify"
		<?php if( empty($robokassa_premod_paynotify) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		  <table class="form"> 
		  <tr>
            <td><?php echo $entry_premod_paynotify_subject; ?></td>
            <td>
				<input type="text" name="robokassa_premod_paynotify_subject" 
			  class="form-control" 
			  value="<?php echo $robokassa_premod_paynotify_subject; ?>" />
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_premod_paynotify_message; ?></td>
            <td>
				<textarea name="robokassa_premod_paynotify_message" class="form-control" 
				rows=10  cols=50 
			  ><?php echo $robokassa_premod_paynotify_message; 
			  ?></textarea>
			</td>
          </tr>
		</table>
		</div>
		
		<?php /* end 0106 */ ?>
		
		  
		</div>
		  <table class="form">
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_type; ?></td>
            <td><select name="robokassa_premod_success_page_type" id="robokassa_premod_success_page_type"
			
				onchange="show_success_page_block()">
                <?php if ($robokassa_premod_success_page_type == 'common') { ?>
                <option value="common" selected="selected"><?php echo $text_premod_success_page_type_common; ?></option>
                <option value="custom"><?php echo $text_premod_success_page_type_custom; ?></option>
                <?php } else { ?>
                <option value="common"><?php echo $text_premod_success_page_type_common; ?></option>
                <option value="custom" selected="selected"><?php echo $text_premod_success_page_type_custom; ?></option>
                <?php } ?>
              </select>
			  <div id="success_page_notice"
			  style="display: none;"><?php echo $entry_premod_success_page_notice; ?></div>
			  
			  </td>
          </tr>
		  </table>
		  
		  <div id="block_success_page" style="display: none;">
		  <table class="form" width=100%>
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_header; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <input type="text" style="width: 300px";
			  name="robokassa_premod_success_page_header[<?php echo $language['code']; ?>]"
			  value="<?php echo isset($robokassa_premod_success_page_header[$language['code']]) ? $robokassa_premod_success_page_header[$language['code']] : '';
			  ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
		   </tr>
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_text; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_success_page_text[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_success_page_text[$language['code']]) ? $robokassa_premod_success_page_text[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
		   </tr>
		   </table>
		  </div>
		  
			<script>
				function show_success_page_block()
				{	
					var e = document.getElementById("robokassa_premod_success_page_type");
					
					if( e.selectedIndex == 0 )
					{
						document.getElementById("block_success_page").style.display = 'none';	
						document.getElementById("success_page_notice").style.display = 'none';
					
					}
					else
					{
						document.getElementById("block_success_page").style.display = 'block';
						document.getElementById("success_page_notice").style.display = 'block';
					
					}
				}
				
				show_success_page_block();
			</script>
		  
		  
		  
		<table class="form">	
		  <tr>
            <td><?php echo $entry_order_status; ?></td>
            <td><select name="robokassa_order_status_id">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_order_status_id) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>	  
		  <tr>
            <td><?php echo $entry_geo_zone; ?></td>
            <td><select name="robokassa_geo_zone_id">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $robokassa_geo_zone_id) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_commission; ?></td>
            <td>
				<p><input type="radio" name="robokassa_commission" value="j" id="robokassa_commission_j"
				<?php if( $robokassa_commission == 'j' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_j"><?php echo $text_commission_j; ?></label></p>
				
				<p><input type="radio" name="robokassa_commission" value="customer" id="robokassa_commission_customer"
				<?php if( $robokassa_commission == 'customer' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_customer"><?php echo $text_commission_customer; ?></label></p>
				
				<p><input type="radio" name="robokassa_commission" value="shop" id="robokassa_commission_shop"
				<?php if( $robokassa_commission == 'shop' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_shop"><?php echo $text_commission_shop; ?></label></p>
			
			</td>
          </tr>
		  
		  <!-- /* kin insert metka: d1 */ -->
		  <tr>
            <td><?php echo $entry_robokassa_desc; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_desc[<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_desc[$language['code']]) ? $robokassa_desc[$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <!-- /* end kin metka: d1 */ -->
		  
		  
		  
		  
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input type="text" name="robokassa_sort_order" value="<?php echo $robokassa_sort_order; ?>" size="1" /></td>
          </tr>
		  
		  
		  <?php /* kin insert metka: a4 */ ?>
          <tr>
            <td><?php echo $entry_currency; ?></td>
            <td><select name="robokassa_currency">
					<?php foreach( $opencart_currencies as $currency=>$val ) { ?>
					<option value="<?php echo $currency; ?>" <?php if( ($robokassa_currency && $currency==$robokassa_currency) || (!$robokassa_currency && $currency=='RUB' ) ) { ?> selected <?php } ?> ><?php echo $currency; ?></option>
					<?php } ?>
				</select>
				<p><i><?php echo $text_currency_notice; ?></i></p>
			</td>
          </tr>
		  <?php /* end kin metka: a4 */ ?>
		  	  
		  <?php /* kin insert metka: g1 */ ?>
          <tr>
            <td><?php echo $entry_hide_noname; ?></td>
            <td><select name="robokassa_hide_noname">
                <?php if ($robokassa_hide_noname) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  <?php /* end kin metka: g1 */ ?>
          <tr>
            <td><?php echo $entry_interface_language; ?></td>
            <td><select name="robokassa_interface_language" id="robokassa_interface_language" onchange="show_hide_lang_block(this.value, 0)">
                <option value="ru" 
				<?php if( $robokassa_interface_language == 'ru' ) { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_interface_language_ru; ?></option>
                <option value="en"
				<?php if( $robokassa_interface_language == 'en' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_en; ?></option>
                <option value="detect"
				<?php if( $robokassa_interface_language == 'detect' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_detect; ?></option>
              </select></td>
          </tr>
		  
		  
		  
		  
		  
		  </table>
		  
		  
		  <table class="form" id="lang_block0"  width=100%>
          <tr>
            <td width="200"><?php echo $entry_default_language; ?></td>
            <td><select name="robokassa_default_language">
			
			<option value="ru" 
				<?php if( $robokassa_default_language == 'ru' ) { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_interface_language_ru; ?></option>
                <option value="en"
				<?php if( $robokassa_default_language == 'en' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_en; ?></option>
              </select></td>
          </tr>
		  </table>
		  
		  
		  
		  <table class="form" width=100%>	
		  
		  
          <tr>
            <td width="200"><?php echo $entry_okrugl; ?></td>
            <td>
				<select class="form-control"  name="robokassa_okrugl">
				  <option value="" 
				  <?php if (!$robokassa_okrugl) { ?> selected="selected" <?php } ?>
				  ><?php echo $entry_okrugl_no; ?></option>
				  <option value="round" 
				  <?php if ($robokassa_okrugl == 'round') { ?> selected="selected" <?php } ?>
				  ><?php echo $entry_okrugl_round; ?></option>
				  <option value="ceil" 
				  <?php if ($robokassa_okrugl == 'ceil') { ?> selected="selected" <?php } ?>
				  ><?php echo $entry_okrugl_ceil; ?></option>
				  <option value="floor" 
				  <?php if ($robokassa_okrugl == 'floor') { ?> selected="selected" <?php } ?>
				  ><?php echo $entry_okrugl_floor; ?></option>
				  
				</select></td>
          </tr>
		   
          <tr>
            <td width="200"><?php echo $entry_log; ?></td>
            <td><select name="robokassa_log">
                <?php if ($robokassa_log) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <tr>
            <td colspan=2><b><?php echo $entry_methods; ?></b></td>           
          </tr>
		  <?php if( !$robokassa_shop_login ) { ?>
		  <tr>
            <td colspan=2><b><font color=red><?php echo $entry_no_methods; ?></font></b></td>           
          </tr>
		  <?php } elseif( !$currencies ) { ?>
		  <tr>
            <td colspan=2><?php echo $entry_no_robokass_methods; ?></td>
          </tr>
		  <?php } else { ?>
		   <tr>
            <td colspan=2>
				<div><?php echo $text_img_notice; ?></div><br>
			
				<style>
					.methods td, .methods th
					{
						border: 1px dotted #ccc;
					}
					
					.methods					
					{
						border: 1px dotted #ccc;
					}
				</style>
				<table cellpadding=5 cellspacing=0 class="methods">
					<tr>
						<th valign=top>#</th>
						<th valign=top><?php echo $methods_col1; ?></th>
						<th valign=top><?php echo $methods_col2; ?></th>
						<th valign=top><?php echo $methods_col3; ?></th>
						<th valign=top><?php echo $methods_col4; ?></th>
						<th valign=top><?php echo $methods_col5; ?></th>
					</tr>
					<?php for($i=0; $i<20; $i++) { ?>
					<tr>
						<td>#<?php echo ($i+1); ?>
						<input type="hidden" name="robokassa<?php echo $i; ?>_sort_order" value="<?php 
						if($i!=0) echo $i/10; 
						else echo "0.01"; 
						?>">
						</td>
						<td>
						
						<?php foreach ($languages as $language) { ?>
						<input type="text" size=60 name="robokassa_methods[<?php echo $i; ?>][<?php echo $language['code']; ?>]"
						value="<?php 
						if( !empty($robokassa_methods[$i][$language['code']]) )
						echo $robokassa_methods[$i][$language['code']]; ?>"
						
						id="text_robokassa_<?php echo $language['code']; 
						?>_0_<?php echo $i; ?>" 
						
						>&nbsp;<img src="view/image/flags/<?php echo $language['image']; ?>" 
						title="<?php echo $language['name']; ?>" /><br /><br>
						<?php } ?>
						
						</td>
						<td>
						
						<select name="robokassa_currencies[<?php echo $i; ?>]"
						onchange="show_img(<?php echo $i; ?>, this.value, 0)"
						>
							<option value="0"><?php echo $select_currency; ?></option>
						<?php foreach($currencies as $key=>$val) { ?>
							<option value="<?php echo $key; ?>" <?php 
							if( $robokassa_currencies[$i]==$key ) { ?>selected<?php }?>
							><?php echo $val; ?></option>
						<?php } ?>
						
						<?php /* start update: a3 */ ?>
							<option value="robokassa" <?php 
							if( $robokassa_currencies[$i]=='robokassa' ) { ?> selected <?php } ?>
							><?php echo $text_robokassa_method; ?></option>
						<?php /* end update: a3 */ ?>
						
						</select></td>
						<td>
						
						
						<input type="text" size=20 name="robokassa_minprice[<?php echo $i; ?>]"
						value="<?php 
						if( !empty($robokassa_minprice[$i]) )
						echo $robokassa_minprice[$i]; ?>"
												
						>
						</td>
						
						<td>
						
						
						<input type="text" size=20 name="robokassa_maxprice[<?php echo $i; ?>]"
						value="<?php 
						if( !empty($robokassa_maxprice[$i]) )
						echo $robokassa_maxprice[$i]; ?>"
												
						>
						</td>
						
						
						<td>
							<div id="img0_<?php echo $i; ?>" style="display: <?php 
								if( !empty($robokassa_currencies[$i]) ) echo 'block'; else echo 'none';?>;">
								
								<img src="<?php echo $robokassa_images[$i]['thumb']; ?>" 
								id="thumb0_<?php echo $i; ?>">
								<input type="hidden" 
								name="robokassa_images[]" 
								id="image0_<?php echo $i; ?>"
								value="<?php echo $robokassa_images[$i]['value']; ?>">
								<br>
								<a onclick="image_upload('image0_<?php echo $i; ?>', 'thumb0_<?php echo $i; ?>');"
								><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a 
								onclick="$('#thumb0_<?php echo $i; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image0_<?php echo $i; ?>').attr('value', '');"
								><?php echo $text_clear; ?></a>
								
							</div>
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>           
          </tr>
		  <?php } ?>
        </table>
		</div>
		
		<!-- ////////////////////////////////////////////////////////////////// -->
		
		<?php foreach($stores as $STORE) { ?>
	  <div id="tab-general-<?php echo $STORE['store_id']; ?>" style="display: none;">
        <table class="form">
		  <tr>
			<td colspan=2>
				<b><?php echo $notice; ?></b>
			</td>
		  </tr>
          <tr>
            <td width=200><?php echo $entry_status; ?></td>
            <td><select name="robokassa_status_store[<?php echo $STORE['store_id']; ?>]">
                <?php if( $robokassa_status_store[ $STORE['store_id'] ] ) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_shop_login; ?></td>
            <td><input type="text" name="robokassa_shop_login_store[<?php echo $STORE['store_id']; ?>]" 
			value="<?php echo $robokassa_shop_login_store[ $STORE['store_id'] ]; ?>" /></td>
          </tr>
		  <?php /* start update: a1 */ ?>
          <tr>
            <td><?php echo $entry_password1; ?></td>
            <td><input type="text" name="robokassa_p1_store[<?php echo $STORE['store_id']; ?>]" 
			/> <?php if( $robokassa_password1_store[ $STORE['store_id'] ] ) echo $text_saved; ?>
			<div>
				<?php echo $text_password_notice; ?>
			</div>
			
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_password2; ?></td>
            <td><input type="text" name="robokassa_p2_store[<?php echo $STORE['store_id']; ?>]" 
			/> <?php if($robokassa_password2_store[ $STORE['store_id'] ] ) echo $text_saved; ?></td>
          </tr>
		  
		  <?php /* end update: a1 */ ?>
		  <tr>
            <td><?php echo $entry_result_url; ?>:</td>
            <td><?php echo $STORE['url']; ?>index.php?route=payment/robokassa/result</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_result_method; ?></td>
            <td>POST</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_success_url; ?></td>
            <td><?php echo $STORE['url']; ?>index.php?route=checkout/success</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_success_method; ?></td>
            <td>POST</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_fail_url; ?></td>
            <td><?php echo $STORE['url']; ?>index.php?route=payment/robokassa/fail</td>
          </tr>
          
		  <tr>
            <td><?php echo $entry_fail_method; ?></td>
            <td>POST</td>
          </tr>
          
		  
		  
		  <tr>
            <td><?php echo $entry_test_mode; ?></td>
            <td><select name="robokassa_test_mode_store[<?php echo $STORE['store_id']; ?>]">
                <?php if ($robokassa_test_mode_store[ $STORE['store_id'] ]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			  <?php /* start update: a1 */ ?> 
			  <div><?php echo $text_mode_notice; ?></div>
			  <?php /* end update: a1 */ ?>
			  </td>
          </tr>
		  
		  
		  
          <tr>
            <td><?php echo $entry_icons; ?></td>
            <td><select name="robokassa_icons_store[<?php echo $STORE['store_id']; ?>]">
                <?php if ($robokassa_icons_store[ $STORE['store_id'] ]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
		  
          <tr>
            <td><?php echo $entry_paynotify; ?></td>
            <td><select name="robokassa_paynotify_store[<?php echo $STORE['store_id']; ?>]"
			  <?php /* start 0106 */ ?>
			  onchange="if( this.value == 1 ) $('#block_paynotify<?php echo $STORE['store_id'];
			  ?>').show(); else $('#block_paynotify<?php echo $STORE['store_id']; ?>').hide(); "
			  <?php /* end 0106 */ ?>
			  
			
			>
                <?php if ($robokassa_paynotify_store[$STORE['store_id']]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
          <tr>
            <td><?php echo $entry_paynotify_email; ?></td>
            <td><input type="text" name="robokassa_paynotify_email_store[<?php echo $STORE['store_id']; ?>]" 
			value="<?php echo $robokassa_paynotify_email_store[$STORE['store_id']]; ?>" /></td>
          </tr>
		</table>  
		  
		  
		<?php /* start 0106 */ ?>
		<div id="block_paynotify<?php echo $STORE['store_id']; ?>"
		<?php if( empty($robokassa_paynotify_store[ $STORE['store_id'] ]) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		<table class="form">
          <tr>
            <td><?php echo $entry_paynotify_subject; ?></td>
            <td><input type="text" name="robokassa_paynotify_subject_store[<?php echo $STORE['store_id']; ?>]" class="form-control" 
			  value="<?php echo $robokassa_paynotify_subject_store[ $STORE['store_id'] ]; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_paynotify_message; ?></td>
            <td><textarea name="robokassa_paynotify_message_store[<?php echo $STORE['store_id']; 
			  ?>]" class="form-control" rows=10 cols=50
			  ><?php echo $robokassa_paynotify_message_store[ $STORE['store_id'] ]; 
			  ?></textarea></td>
          </tr>
		</table>
		</div>
		
		<table class="form">  
          <tr>
            <td><?php echo $entry_sms_status; ?></td>
            <td><select name="robokassa_sms_status_store[<?php echo $STORE['store_id']; ?>]"
			  <?php /* start 0106 */ ?>
			  onchange="if( this.value == 1 ) $('#block_smsnotify<?php echo $STORE['store_id']; ?>').show(); else $('#block_smsnotify<?php echo $STORE['store_id']; ?>').hide(); "
			  <?php /* end 0106 */ ?>
			  >
                <?php if ($robokassa_sms_status_store[$STORE['store_id']]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			  <p><?php echo $entry_sms_instruction; ?></p>
			  
			  </td>
          </tr>
		  </table>
		<div id="block_smsnotify"
		<?php if( empty($robokassa_sms_status_store[ $STORE['store_id'] ]) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		<table class="form">
          <tr>
            <td><?php echo $entry_sms_phone; ?></td>
            <td><input type="text" name="robokassa_sms_phone_store[<?php echo $STORE['store_id']; ?>]" 
			value="<?php echo $robokassa_sms_phone_store[$STORE['store_id']]; ?>" /></td>
          </tr>
		  
		  
          <tr>
            <td><?php echo $entry_sms_message; ?></td>
            <td><textarea cols=50 rows=7 name="robokassa_sms_message_store[<?php echo $STORE['store_id']; ?>]"
			><?php echo $robokassa_sms_message_store[$STORE['store_id']]; ?></textarea></td>
          </tr>
		  </table>
		  </div>
		  
		<table class="form">
          <tr>
            <td><?php echo $entry_dopcost; ?></td>
            <td><input type="text" size=20 name="robokassa_dopcost_store[<?php echo $STORE['store_id']; ?>]" 
			value="<?php echo $robokassa_dopcost_store[$STORE['store_id']]; ?>"
			>&nbsp;<select name="robokassa_dopcosttype_store[<?php echo $STORE['store_id']; ?>]">
					<option value="int" <?php if($robokassa_dopcosttype_store[$STORE['store_id']] == 'int') 
					{ ?> selected <?php } ?>
					><?php echo $text_dopcost_int; ?></option>
					
					<option value="percent" <?php if($robokassa_dopcosttype_store[$STORE['store_id']] == 'percent') 
					{ ?> selected <?php } ?>
					><?php echo $text_dopcost_percent; ?></option>
				</select></td>
          </tr>
		  
		  
		  <tr>
            <td><?php echo $entry_dopcostname; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_dopcostname_store[<?php echo $STORE['store_id']; 
			  ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_dopcostname_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_dopcostname_store[$STORE['store_id']][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td> 
          </tr>
		  
          <tr>
            <td><?php echo $entry_script; ?></td>
            <td>
				<p><input type="radio" name="robokassa_confirm_status_store[<?php echo $STORE['store_id']; ?>]" 
				value="before" id="robokassa_confirm_status_before_<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_confirm_status_store[ $STORE['store_id'] ] == 'before' ) { ?> checked <?php } ?>
				onclick="show_hide_block('before', <?php echo $STORE['store_id']; ?>)"
				><label for="robokassa_confirm_status_before_<?php echo $STORE['store_id']; ?>"><?php echo $entry_script_before; ?></label></p>
				
				<p><input type="radio" name="robokassa_confirm_status_store[<?php echo $STORE['store_id']; ?>]" 
				value="after" id="robokassa_confirm_status_after_<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_confirm_status_store[ $STORE['store_id'] ] == 'after' ) { ?> checked <?php } ?>
				onclick="show_hide_block('after', <?php echo $STORE['store_id']; ?>)"
				><label for="robokassa_confirm_status_after_<?php echo $STORE['store_id']; ?>"
				><?php echo $entry_script_after; ?></label></p>			
			
				<p><input type="radio" name="robokassa_confirm_status_store[<?php echo $STORE['store_id']; ?>]"
				value="premod" id="robokassa_confirm_status_premod_<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_confirm_status_store[ $STORE['store_id'] ] == 'premod' ) { ?> checked <?php } ?>
				onclick="show_hide_block('premod', <?php echo $STORE['store_id']; ?>)"
				><label for="robokassa_confirm_status_premod_<?php echo $STORE['store_id']; ?>"
				><?php echo $entry_script_premod; ?></label></p>
			
			</td>
          </tr>
		  </table>
		  
		  <table id="block_before<?php echo $STORE['store_id']; ?>" class="form" width=100%>
		  <tr>
            <td width=200><?php echo $entry_confirm_notify; ?></td>
            <td><select name="robokassa_confirm_notify_store[<?php echo $STORE['store_id']; ?>]">
                <?php if ($robokassa_confirm_notify_store[ $STORE['store_id'] ]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_confirm_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_confirm_comment_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_confirm_comment_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_confirm_comment_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_order_comment; ?><br><br><?php echo $entry_order_comment_notice; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_order_comment_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_order_comment_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_order_comment_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td width=200><?php echo $entry_preorder_status; ?></td>
            <td><select name="robokassa_preorder_status_id_store[<?php echo $STORE['store_id']; ?>]">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_preorder_status_id_store[ $STORE['store_id'] ]) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  </table>
		  
		  <div id="block_after<?php echo $STORE['store_id']; ?>" ></div>	
		  
		  <div id="block_premod<?php echo $STORE['store_id']; ?>" >
		  <table class="form" width=100%>
		  <tr>
            <td><?php echo $entry_order_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_order_comment_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_order_comment_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_premod_order_comment_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_confirm_comment; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_confirm_comment_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_confirm_comment_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_premod_confirm_comment_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <tr>
            <td width=200><?php echo $entry_preorder_status; ?></td>
            <td><select name="robokassa_premod_preorder_status_id_store[<?php echo $STORE['store_id']; ?>]">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_premod_preorder_status_id_store[ $STORE['store_id'] ]) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_hide_order_comment; ?>
			<br><br><?php echo $entry_order_comment_notice; ?>
			
			</td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_hide_order_comment_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_hide_order_comment_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_premod_hide_order_comment_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_premod_paynotify; ?></td>
            <td>
			<select name="robokassa_premod_paynotify_store[<?php echo $STORE['store_id']; ?>]" 
			  class="form-control" 
			  
			  onchange="if( this.value == 1 ) $('#block_premod_paynotify<?php echo $STORE['store_id']; ?>').show(); else $('#block_premod_paynotify<?php echo $STORE['store_id']; ?>').hide(); "
			 
			  >
                <?php if ($robokassa_premod_paynotify_store[ $STORE['store_id'] ]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
			</td>
          </tr>
		  
		</table>  
		  
		<?php /* start 0106 */ ?>
		 
		
		<div id="block_premod_paynotify<?php echo $STORE['store_id']; ?>"
		<?php if( empty($robokassa_premod_paynotify_store[ $STORE['store_id'] ]) ) { ?>
		style="display: none;"
		<?php } ?>
		>
		  <table class="form">
		  <tr>
            <td><?php echo $entry_premod_paynotify_subject; ?></td>
            <td>
			  <input type="text" name="robokassa_premod_paynotify_subject_store[<?php echo $STORE['store_id']; ?>]" class="form-control" 
			  value="<?php echo $robokassa_premod_paynotify_subject_store[ $STORE['store_id'] ]; ?>" />
			
			</td>
          </tr>
		  <tr>
            <td><?php echo $entry_premod_paynotify_message; ?></td>
            <td>
			  <textarea name="robokassa_premod_paynotify_message_store[<?php echo $STORE['store_id']; 
			  ?>]" class="form-control" rows=10 cols=50
			  ><?php echo $robokassa_premod_paynotify_message_store[ $STORE['store_id'] ]; 
			  ?></textarea>
			</td>
          </tr>
		</table>
		</div>
		
		<?php /* end 0106 */ ?>
		
		  <table class="form">
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_type; ?></td>
            <td><select name="robokassa_premod_success_page_type_store[<?php echo $STORE['store_id']; ?>]" 
				id="robokassa_premod_success_page_type<?php echo $STORE['store_id']; ?>"
				onchange="show_success_page_block<?php echo $STORE['store_id']; ?>()"
				>
                <?php if ($robokassa_premod_success_page_type_store[ $STORE['store_id'] ] == 'common') { ?>
                <option value="common" selected="selected"><?php echo $text_premod_success_page_type_common; ?></option>
                <option value="custom"><?php echo $text_premod_success_page_type_custom; ?></option>
                <?php } else { ?>
                <option value="common"><?php echo $text_premod_success_page_type_common; ?></option>
                <option value="custom" selected="selected"><?php echo $text_premod_success_page_type_custom; ?></option>
                <?php } ?>
              </select>
			  <div id="success_page_notice<?php echo $STORE['store_id']; ?>"
			  style="display: none;"><?php echo $entry_premod_success_page_notice; ?></div>
			</td>
          </tr>
		  </table>
		  
		  <div id="block_success_page<?php echo $STORE['store_id']; ?>" style="display: none;">
		  <table class="form" width=100%>
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_header; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <input type="text" style="width: 300px";
			  name="robokassa_premod_success_page_header_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  value="<?php echo isset($robokassa_premod_success_page_header_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_premod_success_page_header_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
		   </tr>
		  <tr>
            <td width=200><?php echo $entry_premod_success_page_text; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_premod_success_page_text_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_premod_success_page_text_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_premod_success_page_text_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
		   </tr>
		   </table>
		  </div>
		</div>
		  
			<script>
				function show_success_page_block<?php echo $STORE['store_id']; ?>()
				{	
					var e = document.getElementById("robokassa_premod_success_page_type<?php echo $STORE['store_id']; ?>");
					
					if( e.selectedIndex == 'common' )
					{
						document.getElementById("block_success_page<?php echo $STORE['store_id']; ?>").style.display = 'none';
						document.getElementById("success_page_notice<?php echo $STORE['store_id']; ?>").style.display = 'none';
					}
					else
					{
						document.getElementById("block_success_page<?php echo $STORE['store_id']; ?>").style.display = 'block';
						document.getElementById("success_page_notice<?php echo $STORE['store_id']; ?>").style.display = 'block';
					}
				}
				
				show_success_page_block<?php echo $STORE['store_id']; ?>();
			</script>
		  
		  
		<table class="form">		  
		  <tr>
            <td><?php echo $entry_order_status; ?></td>
            <td><select name="robokassa_order_status_id_store[<?php echo $STORE['store_id']; ?>]">
                <?php foreach ($order_statuses as $order_status) { ?>
                <?php if ($order_status['order_status_id'] == $robokassa_order_status_id_store[ $STORE['store_id'] ]) { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_geo_zone; ?></td>
            <td><select name="robokassa_geo_zone_id_store[<?php echo $STORE['store_id']; ?>]">
                <option value="0"><?php echo $text_all_zones; ?></option>
                <?php foreach ($geo_zones as $geo_zone) { ?>
                <?php if ($geo_zone['geo_zone_id'] == $robokassa_geo_zone_id_store[ $STORE['store_id'] ]) { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>" selected="selected"><?php echo $geo_zone['name']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $geo_zone['geo_zone_id']; ?>"><?php echo $geo_zone['name']; ?></option>
                <?php } ?>
                <?php } ?>
              </select></td>
          </tr>
		  <tr>
            <td><?php echo $entry_commission; ?></td>
            <td>
				<p><input type="radio" name="robokassa_commission_store[<?php echo $STORE['store_id']; ?>]" value="j" id="robokassa_commission_j<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_commission_store[ $STORE['store_id'] ] == 'j' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_j<?php echo $STORE['store_id']; ?>"><?php echo $text_commission_j; ?></label></p>
				
				<p><input type="radio" name="robokassa_commission_store[<?php echo $STORE['store_id']; ?>]" value="customer" 
				id="robokassa_commission_customer<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_commission_store[ $STORE['store_id'] ] == 'customer' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_customer<?php echo $STORE['store_id']; ?>"><?php echo $text_commission_customer; ?></label></p>
				
				<p><input type="radio" name="robokassa_commission_store[<?php echo $STORE['store_id']; ?>]" value="shop" 
				id="robokassa_commission_shop<?php echo $STORE['store_id']; ?>"
				<?php if( $robokassa_commission_store[ $STORE['store_id'] ] == 'shop' ) { ?> checked <?php } ?>
				>
				<label for="robokassa_commission_shop<?php echo $STORE['store_id']; ?>"><?php echo $text_commission_shop; ?></label></p>
			
			</td>
          </tr>
		  
		  <!-- /* kin insert metka: d1 */ -->
		  <tr>
            <td><?php echo $entry_robokassa_desc; ?></td>
            <td>
			<?php foreach ($languages as $language) { ?>
              <textarea cols=50 rows=7 
			  name="robokassa_desc_store[<?php echo $STORE['store_id']; ?>][<?php echo $language['code']; ?>]"
			  ><?php echo isset($robokassa_desc_store[ $STORE['store_id'] ][$language['code']]) ? $robokassa_desc_store[ $STORE['store_id'] ][$language['code']] : '';
			  ?></textarea><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /><br />
			  <?php } ?>
			</td>
          </tr>
		  <!-- /* end kin metka: d1 */ -->
		  
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input type="text" name="robokassa_sort_order_store[<?php echo $STORE['store_id']; ?>]" 
			value="<?php echo $robokassa_sort_order_store[ $STORE['store_id'] ]; ?>" size="1" /></td>
          </tr>
		  
		  
		  <?php /* kin insert metka: a4 */ ?>
          <tr>
            <td><?php echo $entry_currency; ?></td>
            <td><select name="robokassa_currency_store[<?php echo $STORE['store_id']; ?>]">
					<?php foreach( $opencart_currencies as $currency=>$val ) { ?>
					<option value="<?php echo $currency; ?>" <?php if( (!empty($robokassa_currency_store[ $STORE['store_id'] ]) && $currency==$robokassa_currency_store[ $STORE['store_id'] ]) || (!$robokassa_currency_store[ $STORE['store_id'] ] && $currency=='RUB' ) ) { ?> selected <?php } ?> ><?php echo $currency; ?></option>
					<?php } ?>
				</select>
				<p><i><?php echo $text_currency_notice; ?></i></p>
			</td>
          </tr>
		  <?php /* end kin metka: a4 */ ?>
		  
		  
		  <tr>
            <td><?php echo $entry_hide_noname; ?></td>
            <td><select name="robokassa_hide_noname_store[<?php echo $STORE['store_id']; ?>]">
                <?php if (  !empty($robokassa_hide_noname_store[ $STORE['store_id'] ])  ) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
		  
          <tr>
            <td><?php echo $entry_interface_language; ?></td>
            <td><select name="robokassa_interface_language_store[<?php echo $STORE['store_id']; ?>]" 
			id="robokassa_interface_language<?php echo $STORE['store_id']; ?>" 
			onchange="show_hide_lang_block(this.value, <?php echo $STORE['store_id']; ?>)">
                <option value="ru" 
				<?php if( $robokassa_interface_language_store[ $STORE['store_id'] ] == 'ru' ) { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_interface_language_ru; ?></option>
                <option value="en"
				<?php if( $robokassa_interface_language_store[ $STORE['store_id'] ] == 'en' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_en; ?></option>
                <option value="detect"
				<?php if( $robokassa_interface_language_store[ $STORE['store_id'] ] == 'detect' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_detect; ?></option>
              </select></td>
          </tr>
		  
		  
		  
		  
		  </table>
		  
		  
		  <table class="form" id="lang_block<?php echo $STORE['store_id']; ?>"  width=100%>
          <tr>
            <td width="200"><?php echo $entry_default_language; ?></td>
            <td><select name="robokassa_default_language_store[<?php echo $STORE['store_id']; ?>]">
			
			<option value="ru" 
				<?php if( $robokassa_default_language_store[ $STORE['store_id'] ] == 'ru' ) { ?>
				selected="selected"
				<?php } ?>
				><?php echo $entry_interface_language_ru; ?></option>
                <option value="en"
				<?php if( $robokassa_default_language_store[ $STORE['store_id'] ] == 'en' ) { ?>
				selected="selected"
				<?php } ?>><?php echo $entry_interface_language_en; ?></option>
              </select></td>
          </tr>
		  </table>
		  
		  
		  
		  <table class="form" width=100%>	
          <tr>
            <td width="200"><?php echo $entry_log; ?></td>
            <td><select name="robokassa_log_store[<?php echo $STORE['store_id']; ?>]">
                <?php if ($robokassa_log_store[ $STORE['store_id'] ]) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  <tr>
            <td colspan=2><b><?php echo $entry_methods; ?></b></td>           
          </tr>
		  <?php if( empty( $robokassa_shop_login_store[$STORE['store_id']] ) ) { ?>
		  <tr>
            <td colspan=2><b><font color=red><?php echo $entry_no_methods; ?></font></b></td>           
          </tr>
		  <?php } elseif( empty( $currencies_store[$STORE['store_id']] ) ) { ?>
		  <tr>
            <td colspan=2><?php echo $entry_no_robokass_methods; ?></td>
          </tr>
		  <?php } else { ?>
		   <tr>
            <td colspan=2>
				<div><?php echo $text_img_notice; ?></div><br>
			
				<style>
					.methods td, .methods th
					{
						border: 1px dotted #ccc;
					}
					
					.methods					
					{
						border: 1px dotted #ccc;
					}
				</style>
				<table cellpadding=5 cellspacing=0 class="methods">
					<tr>
						<th valign=top>#</th>
						<th valign=top><?php echo $methods_col1; ?></th>
						<th valign=top><?php echo $methods_col2; ?></th>
						<th valign=top><?php echo $methods_col3; ?></th>
						<th valign=top><?php echo $methods_col4; ?></th>
						<th valign=top><?php echo $methods_col5; ?></th>
					</tr>
					<?php for($i=0; $i<20; $i++) { ?>
					<tr>
						<td>#<?php echo ($i+1); ?>
						<input type="hidden" name="robokassa<?php echo $i; ?>_sort_order_store[<?php echo $STORE['store_id']; 
						?>]"
						 
						value="<?php 
						if($i!=0) echo $i/10; 
						else echo "0.01"; 
						?>">
						</td>
						<td>
						
						<?php foreach ($languages as $language) { ?>
						<input type="text" size=60 
						name="robokassa_methods_store[<?php echo $STORE['store_id']; ?>][<?php echo $i; ?>][<?php echo $language['code']; ?>]"
						
						id="text_robokassa_<?php echo $language['code']; ?>_<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>" 
						
						value="<?php 
						if( !empty($robokassa_methods_store[$STORE['store_id']][$i][$language['code']]) )
						echo $robokassa_methods_store[$STORE['store_id']][$i][$language['code']]; ?>"
						>&nbsp;<img src="view/image/flags/<?php echo $language['image']; ?>" 
						title="<?php echo $language['name']; ?>" /><br /><br>
						<?php } ?>
						
						</td>
						<td><select name="robokassa_currencies_store[<?php echo $STORE['store_id']; ?>][<?php echo $i; ?>]"
						onchange="show_img(<?php echo $i; ?>, this.value, <?php echo $STORE['store_id']; ?>)"
						>
							<option value="0"><?php echo $select_currency; ?></option>
						<?php foreach($currencies as $key=>$val) { ?>
							<option value="<?php echo $key; ?>" <?php 
							if( $robokassa_currencies_store[$STORE['store_id']][$i]==$key ) { ?>selected<?php }?>
							><?php echo $val; ?></option>
						<?php } ?>
						
						<?php /* start update: a3 */ ?>
							<option value="robokassa" <?php 
							if( $robokassa_currencies_store[$STORE['store_id']][$i]=='robokassa' ) { ?> selected <?php } ?>
							><?php echo $text_robokassa_method; ?></option>
						<?php /* end update: a3 */ ?>
						
						</select></td>
						
						<td>
						
						
						<input type="text" size=20 name="robokassa_minprice_store[<?php echo $STORE['store_id']; ?>][<?php echo $i; ?>]"
						value="<?php 
						if( !empty($robokassa_minprice_store[$STORE['store_id']][$i]) )
						echo $robokassa_minprice_store[$STORE['store_id']][$i]; ?>"
												
						>
						</td>
						
						<td>
						
						
						<input type="text" size=20 name="robokassa_maxprice_store[<?php echo $STORE['store_id']; ?>][<?php echo $i; ?>]"
						value="<?php 
						if( !empty($robokassa_maxprice_store[$STORE['store_id']][$i]) )
						echo $robokassa_maxprice_store[$STORE['store_id']][$i]; ?>"
												
						>
						</td>
						
						<td>
							<div id="img<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>" style="display: <?php 
								if( !empty($robokassa_currencies_store[$STORE['store_id']][$i]) ) echo 'block'; else echo 'none';?>;">
								
								<img src="<?php echo $robokassa_images_store[$STORE['store_id']][$i]['thumb']; ?>" 
								id="thumb<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>">
								<input type="hidden" 
								name="robokassa_images_store[<?php echo $STORE['store_id']; ?>][]" 
								id="image<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>"
								value="<?php echo $robokassa_images_store[$STORE['store_id']][$i]['value']; ?>">
								<br>
								<a onclick="image_upload('image<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>', 'thumb<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>');"
								><?php echo $text_browse; ?></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a 
								onclick="$('#thumb<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image<?php echo $STORE['store_id']; ?>_<?php echo $i; ?>').attr('value', '');"
								><?php echo $text_clear; ?></a>
								
							</div>
						</td>
					</tr>
					<?php } ?>
				</table>
			</td>           
          </tr>
		  <?php } ?>
        </table>
		</div>
		<?php } ?>
		<!-- /////////////////////////////////////////////////// -->
		
		<div id="tab-instruction" style="display: none;">
			<a target=_blank 
				href="http://softpodkluch.ru/faq/robokassa_instruction.html"
			>http://softpodkluch.ru/faq/robokassa_instruction.html</a>
		</div>
		
      </form>
		<?php /* kin insert metka: u1 */ ?>
		<?php if( !empty( $robokassa_shop_login ) ) { ?>
		<div id="tab-generation" style="display: none;">
			<table class="form">
			<tr>
				<td><?php echo $entry_generate_order_id; ?></td>
				<td><input type="text" id="generate_order_id" value=""
				
				 onblur="getOrderSum(this.value);">
					<div id="error_generate_order_id" style="display: none;"
					><font color=red><b><?php echo $error_generate_order_id; ?></b></font></div>
					
					<div id="error_order_id" style="display: none;"
					><font color=red><b><?php echo $error_order_id; ?></b></font></div>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_generate_sum; ?></td>
				<td><input type="text" id="generate_sum" value="">
					<div id="error_generate_sum" style="display: none;"
					><font color=red><b><?php echo $error_generate_sum; ?></b></font></div></td>
			</tr>
			<?php if( !empty($stores) ) { ?>
			<tr>
				<td><?php echo $entry_generate_store; ?></td>
				<td>
					<select id="generate_store">
						<option value="0"
							><?php echo $text_default_store; ?></option>
						<?php foreach($stores as $store) { ?>
							<option value="<?php echo $store['store_id']; ?>"
							><?php echo $store['name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<?php } else { ?>
				<input type="hidden" id="generate_store" value="">
			<?php } ?>
			<tr>
				<td><?php echo $entry_generate_email; ?></td>
				<td>
					<input type="text" id="generate_email" value="">
					<div id="error_generate_email" style="display: none;"
					><font color=red><b><?php echo $error_generate_email; ?></b></font></div>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_generate_currency; ?></td>
				<td>
					<select id="generate_currency" >
						<option value="0"><?php echo $select_currency; ?></option>
						<?php foreach($currencies as $key=>$val) { ?>
							<option value="<?php echo $key; ?>"
							
							<?php if( strstr($val, 'Банковская карта') ) 
								echo 'selected'; ?>
							<?php /* end 1611 */ ?>
							
							
							><?php echo $val; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><?php echo $entry_generate_culture; ?></td>
				<td>
					<select id="generate_culture" >
						<option value="ru"><?php echo $entry_generate_culture_ru; ?></option>
						<option value="en"><?php echo $entry_generate_culture_en; ?></option>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<a onclick="getLink()" class="button">
					<span><?php echo $button_generate; ?></span></a>
				</td>
			</tr>
			</table>
			<div id="generated_link"></div>
		</div>
		<?php } ?>
		<?php /* end kin metka */ ?>
		
		<div id="tab-support" style="display: none;">
			<p><?php echo $text_frame; ?></p>
			
			<a target=_blank 
				href="http://softpodkluch.ru/faq/robokassa.html"
			>http://softpodkluch.ru/faq/robokassa.html</a>
			
			<?php echo $text_contact; ?>
		</div>
	<?php /* kin insert metka: u1 */ ?>
	<script>
		function getLink()
		{
			var stop = 0;
			if( !document.getElementById('generate_order_id').value )
			{
				document.getElementById('error_generate_order_id').style.display='block';
				stop = 1;
			}
			else
			{
				document.getElementById('error_generate_order_id').style.display='none';
			}
			
			/* step metka-kkt2 
			if( !document.getElementById('generate_sum').value )
			{
				document.getElementById('error_generate_sum').style.display='block';
				stop = 1;
			}
			else
			{
				document.getElementById('error_generate_sum').style.display='none';
			}
			end metka-kkt2 */
			
			if( !document.getElementById('generate_email').value )
			{
				document.getElementById('error_generate_email').style.display='block';
				stop = 1;
			}
			else
			{
				document.getElementById('error_generate_email').style.display='none';
			}
			
			if( stop == 1 )
			{
				return;
			}
			
			$.ajax({
					url: 'index.php?route=payment/robokassa/getlink&token=<?php echo $token; ?>',
					dataType: 'html',	
					data: { 
						OutSum: document.getElementById('generate_sum').value,  
						StoreId: document.getElementById('generate_store').value,  
						InvId: document.getElementById('generate_order_id').value, 
						Email: document.getElementById('generate_email').value, 
						IncCurrLabel: document.getElementById('generate_currency').value, 
						Culture: document.getElementById('generate_culture').value				
					},
					success: function(html) {
						if( html == 'ERRORorder' )
						{
							document.getElementById('error_order_id').style.display='block';
							document.getElementById('generated_link').innerHTML = '';
						}
						else
						{
							document.getElementById('error_order_id').style.display='none';
							/* start 1611 */
							html += "<br><br><div><a class='button' onclick='copyToClipboard(\""+html+"\");'><span><?php echo $text_copy_to_clipboard; ?></span></a></div>";
							/* end 1611 */
							
							document.getElementById('generated_link').innerHTML = html;
						}
					},
					error: function(xhr, ajaxOptions, thrownError) {
						//alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
					}
			});	
		}
	</script>
	<?php /* end kin metka */ ?>
	<script>
	
	var all_images = new Array();
	var all_images2 = new Array();
	var all_names = new Array();
	<?php foreach($all_images as $key=>$val) { ?>
	all_images["<?php echo $key; ?>"] = "<?php echo $val['value']; ?>";
	all_images2["<?php echo $key; ?>"] = "<?php echo $val['thumb']; ?>";
	<?php } ?>
	
	<?php if( !empty($currencies) ) { ?>
	<?php foreach($currencies as $key=>$val) { ?>
	all_names["<?php echo $key; ?>"] = "<?php echo $val; ?>";
	<?php } ?>
	all_names["robokassa"] = "<?php echo $text_robokassa_method; ?>";
	<?php } ?>
	
	function show_img(ID, value, STORE_ID)
	{
		$('#thumb'+STORE_ID+'_' + ID).replaceWith('<img src="' + all_images2[value] + '" alt="" id="thumb'+STORE_ID+'_' + ID + '" />');
		
		$('#image'+STORE_ID+'_' + ID).attr('value', all_images[value]);
		
		if( value!=0 )
		{
			document.getElementById('img'+STORE_ID+'_'+ID).style.display = 'block';
			
			<?php foreach ($languages as $language) { ?>
			$('#text_robokassa_<?php echo $language['code']; ?>_'+STORE_ID+'_'+ID).attr('value', all_names[value]);
			<?php } ?>
		}
		else
		document.getElementById('img'+STORE_ID+'_'+ID).style.display = 'none';
	}
	
	function show_hide_lang_block( value, STORE_ID )
	{
		if( value=='detect' )
		{
			document.getElementById('lang_block'+STORE_ID).style.display = 'block';
		}
		else
		{
			document.getElementById('lang_block'+STORE_ID).style.display = 'none';
		}
	}
	
	show_hide_lang_block( document.getElementById('robokassa_interface_language').value, '0' );
	
	
	<?php foreach($stores as $store) { ?>
	show_hide_lang_block( document.getElementById('robokassa_interface_language').value, '<?php echo $store['store_id'];?>' );
	<?php } ?>
	
	
	function show_hide_block( value, STORE_ID )
	{
		if( value=='before' )
		{
			document.getElementById('block_before'+STORE_ID).style.display = 'block';
			document.getElementById('block_after'+STORE_ID).style.display = 'none';
			document.getElementById('block_premod'+STORE_ID).style.display = 'none';
		}
		else if( value=='after' )
		{
			document.getElementById('block_before'+STORE_ID).style.display = 'none';
			document.getElementById('block_after'+STORE_ID).style.display = 'block';
			document.getElementById('block_premod'+STORE_ID).style.display = 'none';
		}
		else
		{
			document.getElementById('block_before'+STORE_ID).style.display = 'none';
			document.getElementById('block_after'+STORE_ID).style.display = 'none';
			document.getElementById('block_premod'+STORE_ID).style.display = 'block';
		}
	}
	
	//alert(document.getElementById('robokassa_confirm_status').value);
	
	show_hide_block( '<?php echo $robokassa_confirm_status; ?>', 0 );
	<?php foreach($stores as $store) { ?>
	show_hide_block( '<?php echo $robokassa_confirm_status_store[ $store['store_id'] ]; ?>', '<?php echo $store['store_id'];?>' );
	<?php } ?>
$('#tabs a').tabs(); 
<?php if($current_store_id) { ?>
$('#tab-<?php echo $current_store_id; ?>').click();
<?php } ?>
	</script>
    </div>
  </div>
  <script type="text/javascript"><!--
function image_upload(field, thumb) {
	$('#dialog').remove();
	
	$('#content').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '&directory=robokassa_icons" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');
	
	$('#dialog').dialog({
		title: '<?php echo $text_image_manager; ?>',
		close: function (event, ui) {
			if ($('#' + field).attr('value')) {
				$.ajax({
					url: 'index.php?route=payment/robokassa/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
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
<script>
		function showKktBlock(value)
		{
			if( value == 1 ) 
			{
				$('#kkt_block').show();
			}
			else
			{
				$('#kkt_block').hide();
			}
			
		}
		
		showKktBlock(<?php echo $robokassa_kkt_mode; ?>);
		
		
		function getOrderSum(value)
		{
			$('#error_order_id').hide();
			$('#error_generate_order_id').hide();
			$('#error_generate_sum').hide();
			
			$.ajax({
				url: 'index.php?route=payment/robokassa/getOrderSum&token=<?php echo $token; ?>&order_id='+value,
				dataType: 'json',
				success: function(json) {
					
					if( json )
					{
						if( json.error )
						{
							if( json.error == 'order' )
							{
								$('#error_order_id').show();
							}
							else if( json.error == 'order_id' )
							{
								$('#error_generate_order_id').show();
							}
							
							$('#generate_sum').val( '' );
							$('#generate_email').val( '' );
							
						}
						else
						{
							$('#generate_sum').val( json.sum );
							$('#generate_email').val( json.email );
						}
					}
					else
					{
						$('#generate_sum').val( '' );
						$('#generate_email').val( '' );
					}
					
					$('#generate_sum').attr("disable", "");
					$('#generate_email').attr("disable", "");
				},
				beforeSend: function() {
					
					
					$('#generate_sum').attr("disable", "disabled");
					$('#generate_email').attr("disable", "disabled");
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});	
			
			
			
		}
		
		
		function copyToClipboard(text) {
			var $temp = $("<input>")
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
		}
		
		
/* start 1112 */
		

function filterautocomplete(filter_row)
{
	filter_row = filter_row.toString();
	var res = filter_row.replace(" ", "");
	// Category
	$('#input-category'+filter_row).autocomplete({
		'source': function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/category/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {
					response($.map(json, function(item) {
						return {
							label: item['name'],
							value: item['category_id']
						}
					}));
				}
			});
		},
		select: function(event, ui) {
	
			//$('#filter-category'+res+'-' + item['value']).remove();
			$('#filter-category'+filter_row).append('<div id="filter-category' + filter_row +'">' + ui.item.label + ' <img src="view/image/delete.png" alt=""  onclick="$(this).parent().remove();" /> <input type="hidden" name="robokassa_kkt_payment_objects['+filter_row+'][filter_category][]" value="' + ui.item.value + '" /></div>');
		
		}
	});
	
	// manufacturer
	$('#input-manufacturer'+filter_row).autocomplete({
		'source': function(request, response) {
			$.ajax({
				url: 'index.php?route=catalog/manufacturer/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request.term),
				dataType: 'json',
				success: function(json) {
					response($.map(json, function(item) {
						return {
							label: item['name'],
							value: item['manufacturer_id']
						}
					}));
				}
			});
		},
		select: function(event, ui) {
			//$('input[name=\'manufacturer\']').val('');

			//$('#filter-manufacturer'+filter_row+'-' + item['value']).remove();

			$('#filter-manufacturer'+filter_row).append('<div id="filter-manufacturer' + filter_row +'">' + ui.item.label + ' <img src="view/image/delete.png" alt=""  onclick="$(this).parent().remove();" /> <input type="hidden" name="robokassa_kkt_payment_objects['+filter_row+'][filter_manufacturer][]" value="' + ui.item.value + '" /></div>');
		}
	});
	
	
	
	
	
}



<?php if( !empty($robokassa_kkt_payment_objects) ) {  
foreach($robokassa_kkt_payment_objects as $i=>$object) { ?>
filterautocomplete(<?php echo $i; ?>);
<?php } } ?>

var payment_objects_row = <?php echo $payment_objects_row; ?>;

function addPaymentObject()
{
	html  = '';

	html += '<tbody id="payment_objects-row'+payment_objects_row+'">';
	html += '<tr>';
	html += '<td class="left"><select style="width: 200px;" name="robokassa_kkt_payment_objects['+payment_objects_row+'][object]" class="form-control" ';
	html += '>';
	html += '<option value="commodity"  ';
	html += '><?php echo $entry_kkt_payment_object_commodity; ?></option>';
	html += '<option value="excise"  ';
	html += '><?php echo $entry_kkt_payment_object_excise; ?></option>';
				
	html += '<option value="job"  ';
	html += '><?php echo $entry_kkt_payment_object_job; ?></option>';
				 
				
	html += '<option value="service"  ';
	html += '><?php echo $entry_kkt_payment_object_service; ?></option>';
				
	html += '<option value="gambling_bet"  ';
	html += '><?php echo $entry_kkt_payment_object_gambling_bet; ?></option>';
				
	html += '<option value="gambling_prize"  ';
	html += '><?php echo $entry_kkt_payment_object_gambling_prize; ?></option> ';
				
	html += '<option value="lottery"  ';
	html += '><?php echo $entry_kkt_payment_object_lottery; ?></option> ';
				
	html += '<option value="lottery_prize"  ';
	html += '><?php echo $entry_kkt_payment_object_lottery_prize; ?></option> ';
				
	html += '<option value="intellectual_activity"  ';
	html += '><?php echo $entry_kkt_payment_object_intellectual_activity; ?></option> ';
				
	html += '<option value="payment"  ';
	html += '><?php echo $entry_kkt_payment_object_payment; ?></option> ';
				
	html += '<option value="agent_commission"  ';
	html += '><?php echo $entry_kkt_payment_object_agent_commission; ?></option> ';
				
	html += '<option value="composite"  ';
	html += '><?php echo $entry_kkt_payment_object_composite; ?></option> ';
				
	html += '<option value="another"  ';
	html += '><?php echo $entry_kkt_payment_object_another; ?></option> ';
				
	html += '<option value="property_right"  ';
	html += '><?php echo $entry_kkt_payment_object_property_right; ?></option> ';
				
	html += '<option value="non-operating_gain"  ';
	html += '><?php echo $entry_kkt_payment_object_non_operating_gain; ?></option> ';
				
	html += '<option value="insurance_premium"  ';
	html += '><?php echo $entry_kkt_payment_object_insurance_premium; ?></option> ';
				
	html += '<option value="sales_tax"  ';
	html += '><?php echo $entry_kkt_payment_object_sales_tax; ?></option> ';
				
	html += '<option value="resort_fee"  ';
	html += '><?php echo $entry_kkt_payment_object_resort_fee; ?></option> ';
				
	html += '</select>';
	html += '</td>';
	html += '<td>';
	
	
	html += '<?php echo $text_name; ?><br>';
					
	
	html += '<input type="text" ';
	html += 'name="robokassa_kkt_payment_objects['+payment_objects_row+'][name]"';
	html += 'class="form-control"  />';
	html += '<select name="robokassa_kkt_payment_objects['+payment_objects_row+'][name_type]" class="form-control">';
	html += '<option value="exact" ';
	html += '><?php echo $text_exact; ?></option>';
	html += '<option value="include" ';
	html += '><?php echo $text_include; ?></option>';
	html += '</select>';
	
	html += '<hr><?php echo $text_model; ?><br>';
					
	html += '<input type="text" ';
	html += 'name="robokassa_kkt_payment_objects['+payment_objects_row+'][model]"';
	html += 'class="form-control"  />';
	html += '<select name="robokassa_kkt_payment_objects['+payment_objects_row+'][model_type]" class="form-control">';
	html += '<option value="exact"';
	html += '><?php echo $text_exact; ?></option>';
	html += '<option value="include"';
	html += '><?php echo $text_include; ?></option>';
	html += '</select>';
	
	html += '</td>';
	html += '<td><?php echo $text_from; ?><br>'; 
	html += '<input type="text" ';
	html += 'name="robokassa_kkt_payment_objects['+payment_objects_row+'][from_price]"';
	html += 'class="form-control"  /> <br>';
	html += '<?php echo $text_to; ?><br>';
	html += '<input type="text" ';
	html += 'name="robokassa_kkt_payment_objects['+payment_objects_row+'][to_price]"';
	html += 'class="form-control" /> ';
	html += '</td> ';
	html += '<td>';
				
	html += '<input type="text" ';
	html += 'name="category"  ';
	html += 'id="input-category'+payment_objects_row+'" class="form-control filter_category" />';
	html += '<div id="filter-category'+payment_objects_row+'" class="well well-sm" ';
	html += 'style="height: 150px; overflow: auto;"> ';
	html += '</div>';
	html += '</td>';
	html += '<td>';
				
	html += '<input type="text" ';
	html += 'name="manufacturer"  ';
	html += 'id="input-manufacturer'+payment_objects_row+'" class="form-control filter_manufacturer" />';
	html += '<div id="filter-manufacturer'+payment_objects_row+'" class="well well-sm" ';
	html += 'style="height: 150px; overflow: auto;"> ';
	html += '</div>';
	html += '</td>';
				
	html += '<td>';
	html += '<select name="robokassa_kkt_payment_objects['+payment_objects_row+'][status]" ';
	html += 'class="form-control">';
	html += '<option value="1"><?php echo $text_enabled; ?></option>';
	html += ' <option value="0" selected="selected"><?php echo $text_disabled; ?></option>';

	html += '</select>';
	html += ' <input type="text" ';
	html += ' name="robokassa_kkt_payment_objects['+payment_objects_row+'][sort_order]"';
	html += ' class="form-control"   />';
	html += '</td>';
	html += '<td><a href="javascript: $(\'#payment_objects-row<?php 
	echo $payment_objects_row; ?>\').remove();"   class="button"><span><?php echo $button_remove; ?></span></a></td>';
				
	html += '</tr>';
		  
	html += '</tbody>';
			
	$('#payment_objects').append(html);
	
	filterautocomplete(payment_objects_row);
	
	payment_objects_row++;
}
/* end 1112 */
</script>
</div>
<?php echo $footer; ?> 