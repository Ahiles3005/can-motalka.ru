<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/report.png" alt="" /> <?php echo $heading_title; ?></h1>
    </div>
    <div class="contentes">
      <table class="form">
        <tr>
          <td><?php echo $entry_date_start; ?>
            <input type="text" name="filter_date_start" value="<?php echo $filter_date_start; ?>" id="date-start" size="12" /></td>
          <td><?php echo $entry_date_end; ?>
            <input type="text" name="filter_date_end" value="<?php echo $filter_date_end; ?>" id="date-end" size="12" /></td>
          <td><?php echo $entry_status; ?>
            <select name="filter_order_status_id">
              <option value="0"><?php echo $text_all_status; ?></option>
              <?php foreach ($order_statuses as $order_status) { ?>
              <?php if ($order_status['order_status_id'] == $filter_order_status_id) { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td> 
		<td><?php echo $entry_supp; ?>
	    <input type="text" name="filter_model" value="0" id="data_model" size="3" /></td>  <!--*suppler*-->
 
          <td style="text-align: right;"><a onclick="filter();" class="button"><?php echo $button_filter; ?></a></td>
        </tr>
      </table>
      <table class="list">
        <thead>
          <tr>
            <td class="left"><?php echo $column_name; ?></td>
            <td class="left"><?php echo $column_model; ?></td>
            <td class="right"><?php echo $column_quantity; ?></td>
            <td class="right"><?php echo $column_total; ?></td> 
		   <td class="right"><?php echo $column_profit; ?></td> <!--*suppler*-->
 
          </tr>
        </thead>
        <tbody>
          <?php $summa = 0.0; $profit = 0.0; if ($products) { ?>  <!--*suppler*-->
          <?php foreach ($products as $product) { ?>
          <tr>
            <td class="left"><?php echo $product['name']; ?></td>
            <td class="left"><?php echo $product['model']; ?></td>
            <td class="right"><?php echo $product['quantity']; ?></td>
            
		<td class="right"><?php echo $product["total"]; $s = $product["total"]; $s = trim(preg_replace ("/[^0-9.]/","",$s)); $s = preg_replace("| +|", "", $s); $s = (float)str_replace(",",".",$s); $summa = $summa+$s; ?></td>
			<td class="right"><?php echo $product["profit"]; $profit = $profit+$product["profit"]; ?></td>

		<td class="right"><?php $p = $product["bprice"]*$product["quantity"]; $d = $s-$p; if ($p == 0) $d = 0; $profit = $profit+$d; echo $d; ?></td>  <!--*suppler*-->
          </tr>
          <?php } ?>		
          <tr>		
            <td colspan="4" class="right"><b><?php echo $text_total."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $summa; ?></b> </td>
            <td colspan="4" class="right"><b><?php echo $text_total."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . (int)$profit; ?></b> </td>
          </tr> <!--*suppler*-->
 
          <?php } else { ?>
          <tr>
            <td class="center" colspan="4"><?php echo $text_no_results; ?></td>
          </tr>
          <?php } ?>
        </tbody>
		<tfoot>
          <tr>
            <td class="left"><?php echo $column_name; ?></td>
            <td class="left"><?php echo $column_model; ?></td>
            <td class="right"><?php echo $column_quantity; ?></td>
            <td class="right"><?php echo $column_total; ?></td>
          </tr>
        </tfoot>
      </table>
      <div class="pagination"><?php echo $pagination; ?></div>
    </div>
	<div class="foot_heading">
      <h1><img src="view/image/report.png" alt="" /> <?php echo $heading_title; ?></h1>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
function filter() {
	url = 'index.php?route=report/product_purchased&token=<?php echo $token; ?>';
	
	var filter_date_start = $('input[name=\'filter_date_start\']').attr('value');
	
	if (filter_date_start) {
		url += '&filter_date_start=' + encodeURIComponent(filter_date_start);
	}

	var filter_date_end = $('input[name=\'filter_date_end\']').attr('value');
	
	if (filter_date_end) {
		url += '&filter_date_end=' + encodeURIComponent(filter_date_end);
	}
	
	var filter_order_status_id = $('select[name=\'filter_order_status_id\']').attr('value');
	
	if (filter_order_status_id != 0) {
		url += '&filter_order_status_id=' + encodeURIComponent(filter_order_status_id);
	}
		var filter_model = $('input[name=\'filter_model\']').attr('value');	
	if (filter_model) {
		url += '&filter_model=' + encodeURIComponent(filter_model);
	} /*suppler*/
 

	location = url;
}
//--></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	$('#date-start').datepicker({dateFormat: 'yy-mm-dd'});
	
	$('#date-end').datepicker({dateFormat: 'yy-mm-dd'});
});
//--></script> 
<?php echo $footer; ?>