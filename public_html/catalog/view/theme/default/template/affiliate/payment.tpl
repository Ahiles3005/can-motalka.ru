<?php echo $header; ?>
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>
  <h1><?php echo $heading_title; ?></h1>
  <div class="main-content">
  <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <h2><?php echo $text_your_payment; ?></h2>
    <div class="content">
      <table class="form">
        <tbody>
          <tr>
            <td><?php echo $entry_tax; ?></td>
            <td><input type="text" name="tax" value="<?php echo $tax; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_payment; ?></td>
            <td><?php if ($payment == 'cheque') { ?>
              <input type="radio" name="payment" value="cheque" id="cheque" checked="checked" />
              <?php } else { ?>
              <input type="radio" name="payment" value="cheque" id="cheque" />
              <?php } ?>
              <label for="cheque"><?php echo $text_cheque; ?></label>
              <?php if ($payment == 'paypal') { ?>
              <input type="radio" name="payment" value="paypal" id="paypal" checked="checked" />
              <?php } else { ?>
              <input type="radio" name="payment" value="paypal" id="paypal" />
              <?php } ?>
              <label for="paypal"><?php echo $text_paypal; ?></label>
              <?php if ($payment == 'bank') { ?>
              <input type="radio" name="payment" value="bank" id="bank" checked="checked" />
              <?php } else { ?>
              <input type="radio" name="payment" value="bank" id="bank" />
              <?php } ?>
              <label for="bank"><?php echo $text_bank; ?></label></td>
          </tr>
        </tbody>
        <tbody id="payment-cheque" class="payment">
          <tr>
            <td><?php echo $entry_cheque; ?></td>
            <td><input type="text" name="cheque" value="<?php echo $cheque; ?>" /></td>
          </tr>
        </tbody>
        <tbody class="payment" id="payment-paypal">
          <tr>
            <td><?php echo $entry_paypal; ?></td>
            <td><input type="text" name="paypal" value="<?php echo $paypal; ?>" /></td>
          </tr>
        </tbody>
        <tbody id="payment-bank" class="payment">
          <tr>
            <td><?php echo $entry_bank_name; ?></td>
            <td><input type="text" name="bank_name" value="<?php echo $bank_name; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_bank_branch_number; ?></td>
            <td><input type="text" name="bank_branch_number" value="<?php echo $bank_branch_number; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_bank_swift_code; ?></td>
            <td><input type="text" name="bank_swift_code" value="<?php echo $bank_swift_code; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_bank_account_name; ?></td>
            <td><input type="text" name="bank_account_name" value="<?php echo $bank_account_name; ?>" /></td>
          </tr>
          <tr>
            <td><?php echo $entry_bank_account_number; ?></td>
            <td><input type="text" name="bank_account_number" value="<?php echo $bank_account_number; ?>" /></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="buttons">
      <div class="left"><a href="<?php echo $back; ?>" class="button"><?php echo $button_back; ?></a></div>
      <div class="right"><input type="submit" value="<?php echo $button_continue; ?>" class="button" /></div>
    </div>
  </form>
  </div>
  <div class="bottom"></div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('input[name=\'payment\']').bind('change', function() {
	$('.payment').hide();
	
	$('#payment-' + this.value).show();
});

$('input[name=\'payment\']:checked').trigger('change');
//--></script> 
<?php echo $footer; ?> 