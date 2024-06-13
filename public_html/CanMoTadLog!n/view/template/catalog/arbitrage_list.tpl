<?php echo $header; ?>
<div id="content">
<div class="breadcrumb">
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
	<?php if ($module_install) { ?>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
	<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1 class="review-page"><?php echo $heading_title; ?></h1>
			<div class="buttons"><a onclick="location = '<?php echo $insert; ?>'" class="button"><?php echo $button_insert; ?></a><a onclick="$('form').submit();" class="button"><?php echo $button_delete; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="list">
					<thead>
						<tr>
							<td width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
							<td class="left"><?php if ($sort == 'author') { ?>
								<a href="<?php echo $sort_author; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_author; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_author; ?>"><?php echo $column_author; ?></a>
								<?php } ?></td>
							<td class="left"><?php if ($sort == 'status') { ?>
								<a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
								<?php } ?></td>
							<td class="left"><?php if ($sort == 'date_added') { ?>
								<a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
								<?php } ?></td>
							<td class="left"><?php if ($sort == 'rating') { ?>
								<a href="<?php echo $sort_rating; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_rating; ?></a>
								<?php } else { ?>
								<a href="<?php echo $sort_rating; ?>"><?php echo $column_rating; ?></a>
								<?php } ?></td>
							<td class="right"><?php echo $column_action; ?></td>
						</tr>
					</thead>
					<tbody>
						<?php if ($arbitrages) { ?>
						<?php foreach ($arbitrages as $arbitrage) { ?>
						<tr>
							<td style="text-align: center;"><?php if ($arbitrage['selected']) { ?>
								<input type="checkbox" name="selected[]" value="<?php echo $arbitrage['arbitrage_id']; ?>" checked="checked" />
								<?php } else { ?>
								<input type="checkbox" name="selected[]" value="<?php echo $arbitrage['arbitrage_id']; ?>" />
								<?php } ?></td>
							<td class="left"><?php echo $arbitrage['author']; ?></td>
							<td class="left"><?php echo $arbitrage['status']; ?></td>
							<td class="left"><?php echo $arbitrage['date_added']; ?></td>
							<td class="left"><?php echo $arbitrage['rating']; ?></td>
							<td class="right">
								<?php foreach ($arbitrage['action'] as $action) { ?>
								[ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
								<?php } ?></td>
						</tr>
						<?php } ?>
						<?php } else { ?>
						<tr>
							<td class="center" colspan="6"><?php echo $text_no_results; ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</form>
			<div class="pagination"><?php echo $pagination; ?></div>
		</div>
	</div>
	<?php } else { ?>
	<div class="box">
		<div class="heading">
			<h1 class="review-page"><?php echo $heading_title; ?></h1>
		</div>
		<div class="content">
			<div class="warning"><?php echo $text_module_not_exists; ?></div>
		</div>
	</div>
	<?php } ?>
</div>
<?php echo $footer; ?>
