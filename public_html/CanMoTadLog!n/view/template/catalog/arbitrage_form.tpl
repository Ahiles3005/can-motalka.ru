<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
		<?php } ?>
	</div>
	<?php if ($error_warning) { ?>
	<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/module.png" alt="" /> <?php echo $heading_title; ?></h1>
			<div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
		</div>
		<div class="content">
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
				<table class="form">
					<tr>
						<td> <?php echo $entry_date_added; ?></td>
						<td><input type="text" name="date_added" value="<?php echo $date_added; ?>" size="12" class="date" /></td>
					</tr>
					<tr>
						<td><?php echo $entry_rating; ?></td>
						<td><b class="rating"><?php echo $entry_bad; ?></b>&nbsp;
							<?php if ($rating == 0) { ?>
							<input style="display: none;" type="radio" name="rating" value="0" checked />
							<?php } ?>
							<?php if ($rating == 1) { ?>
							<input type="radio" name="rating" value="1" checked />
							<?php } else { ?>
							<input type="radio" name="rating" value="1" />
							<?php } ?>
							&nbsp;
							<?php if ($rating == 2) { ?>
							<input type="radio" name="rating" value="2" checked />
							<?php } else { ?>
							<input type="radio" name="rating" value="2" />
							<?php } ?>
							&nbsp;
							<?php if ($rating == 3) { ?>
							<input type="radio" name="rating" value="3" checked />
							<?php } else { ?>
							<input type="radio" name="rating" value="3" />
							<?php } ?>
							&nbsp;
							<?php if ($rating == 4) { ?>
							<input type="radio" name="rating" value="4" checked />
							<?php } else { ?>
							<input type="radio" name="rating" value="4" />
							<?php } ?>
							&nbsp;
							<?php if ($rating == 5) { ?>
							<input type="radio" name="rating" value="5" checked />
							<?php } else { ?>
							<input type="radio" name="rating" value="5" />
							<?php } ?>
							&nbsp; <b class="rating"><?php echo $entry_good; ?></b>
							<?php if ($error_rating) { ?>
							<span class="error"><?php echo $error_rating; ?></span>
							<?php } ?>
						</td>
					</tr>
					<tr>
						<td><?php echo $entry_status; ?></td>
						<td><select name="status">
								<?php if ($status) { ?>
								<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
								<option value="0"><?php echo $text_disabled; ?></option>
								<?php } else { ?>
								<option value="1"><?php echo $text_enabled; ?></option>
								<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
								<?php } ?>
							</select></td>
					</tr>
				</table>
				<div id="languages" class="htabs">
					<?php foreach ($languages as $language) { ?>
					<a href="#language<?php echo $language['language_id']; ?>"><img src="view/image/flags/<?php echo $language['image']; ?>" title="<?php echo $language['name']; ?>" /> <?php echo $language['name']; ?></a>
					<?php } ?>
				</div>
				<?php foreach ($languages as $language) { ?>
				<div id="language<?php echo $language['language_id']; ?>">
					<table class="form">
						<tr>
							<td><span class="required">*</span> <?php echo $entry_author; ?></td>
							<td><input type="text" name="arbitrage_description[<?php echo $language['language_id']; ?>][author]" size="100" value="<?php echo isset($arbitrage_description[$language['language_id']]) ? $arbitrage_description[$language['language_id']]['author'] : ''; ?>" />
								<?php if (isset($error_author[$language['language_id']])) { ?>
								<span class="error"><?php echo $error_author[$language['language_id']]; ?></span>
								<?php } ?></td>
						</tr>
						<tr>
							<td><span class="required">*</span> <?php echo $entry_description; ?></td>
							<td><textarea name="arbitrage_description[<?php echo $language['language_id']; ?>][description]" cols="60" rows="8"><?php echo isset($arbitrage_description[$language['language_id']]) ? $arbitrage_description[$language['language_id']]['description'] : ''; ?></textarea>
								<?php if (isset($error_description[$language['language_id']])) { ?>
								<span class="error"><?php echo $error_description[$language['language_id']]; ?></span>
								<?php } ?></td>
						</tr>
					</table>
				</div>
				<?php } ?>
			</form>
		</div>
	</div>
</div>
<?php echo $footer; ?>

<script type="text/javascript"><!--
			$('#tabs a').tabs();
			$('#languages a').tabs();
//--></script>
<script type="text/javascript"><!--
			$('.date').datepicker({dateFormat: 'yy-mm-dd'});
//--></script>
