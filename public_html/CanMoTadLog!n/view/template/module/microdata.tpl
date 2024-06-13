<?php echo $header; ?>
<div id='content'>
	<ul class='breadcrumb'>
		<?php foreach ($breadcrumbs as $breadcrumb) { ?>
			<li><a href='<?php echo $breadcrumb['href']; ?>'><?php echo $breadcrumb['text']; ?></a></li>
		<?php } ?>
	</ul>
	<?php if ($error_warning) { ?>
		<div class='warning'><?php echo $error_warning; ?></div>
	<?php } ?>
	<div class='box'>
		<div class='heading'>
			<h1><?php echo $heading_title; ?></h1>
			<div class='buttons'>
				<a onclick='$("#form").submit();' class='btn btn-success'><?php echo $button_save; ?></a>
				<a onclick='location = "<?php echo $cancel; ?>";' class='btn btn-danger'><?php echo $button_cancel; ?></a>
			</div>
		</div>
		<div class='content'>   
			<form action='<?php echo $action; ?>' method='post' enctype='multipart/form-data' id='form'>                     
					<div id='tab-microdata' class='htabs'>
						<a href='#tab-schemaorg'><?php echo $tab_schemaorg; ?></a>
						<a href='#tab-opengraph'><?php echo $tab_opengraph; ?></a>
						<a href='#tab-twittercard'><?php echo $tab_twittercard; ?></a>
						<a href='#tab-info'><?php echo $tab_info; ?></a>							
					</div>
					<div id='tab-schemaorg' class='htabs-content'>
						<div id='tab-schemaorg-tabs' class='htabs'>
							<a href='#tab-schemaorg-demo'><?php echo $tab_schemaorg_demo; ?></a>
							<a href='#tab-schemaorg-home'><?php echo $tab_schemaorg_home; ?></a>
							<a href='#tab-schemaorg-prod'><?php echo $tab_schemaorg_prod; ?></a>
						</div>
						<div id='tab-schemaorg-demo' class='htabs-content'>
							<table class='form'>
								<tr>
									<td colspan='4' style='text-align:center; width:auto'><img src='view/image/microdata/rdf.jpg' alt=''></td>
								</tr>
								<tr>
									<td colspan='2' style='text-align:center; width:auto'><img src='view/image/microdata/island-type-1.jpg' alt=''></td>
									<td colspan='2' style='text-align:center'><img src='view/image/microdata/island-type-2.jpg' alt=''></td>
								</tr>
								<tr>
									<td colspan='2' style='text-align:center; width:auto'><img src='view/image/microdata/island-type-3.jpg' alt=''></td>
									<td colspan='2' style='text-align:center'><img src='view/image/microdata/island-type-4.jpg' alt=''></td>
								</tr>
							</table>
						</div>
						<div id='tab-schemaorg-home' class='htabs-content'>
							<table class='form'>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_status; ?></td>
									<td>
										<select name='schemaorg_home_status'>
											<option value='1'<?php if($schemaorg_home_status == '1') echo 'selected="selected"';?>><?php echo $text_enabled; ?></option>
											<option value='2'<?php if($schemaorg_home_status == '2') echo 'selected="selected"';?><?php if($schemaorg_home_status == '') echo 'selected="selected"';?>><?php echo $text_disabled; ?></option>
										</select>
									</td>
									<td style='padding-left:40px; color:#E16E6E!important'><?php echo $text_home_title; ?></td>
								</tr>
							</table>
							
							<table class='form'>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_name; ?></td>
									<td><input type='text' name='schemaorg_home_name' placeholder='<?php echo $text_name_placeholder; ?>' value='<?php echo $schemaorg_home_name; ?>' /></td>
									<td style='padding-left:40px'><?php echo $text_addresscountry; ?></td>
									<td><input type='text' name='schemaorg_home_addresscountry' placeholder='<?php echo $text_addresscountry_placeholder; ?>' value='<?php echo $schemaorg_home_addresscountry; ?>' /></td>
								</tr>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_description; ?></td>
									<td><input type='text' name='schemaorg_home_description' placeholder='<?php echo $text_description_placeholder; ?>' value='<?php echo $schemaorg_home_description; ?>' /></td>
									<td style='padding-left:40px'><?php echo $text_addresslocality; ?></td>
									<td><input type='text' name='schemaorg_home_addresslocality' placeholder='<?php echo $text_addresslocality_placeholder; ?>' value='<?php echo $schemaorg_home_addresslocality; ?>' /></td>
								</tr>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_telephone; ?></td>
									<td><input type='text' name='schemaorg_home_telephone' placeholder='<?php echo $text_telephone_placeholder; ?>' value='<?php echo $schemaorg_home_telephone; ?>' /></td>
									<td style='padding-left:40px'><?php echo $text_streetaddress; ?></td>
									<td><input type='text' name='schemaorg_home_streetaddress' placeholder='<?php echo $text_streetaddress_placeholder; ?>' value='<?php echo $schemaorg_home_streetaddress; ?>' /></td>
								</tr>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_email; ?></td>
									<td><input type='text' name='schemaorg_home_email' placeholder='<?php echo $text_email_placeholder; ?>' value='<?php echo $schemaorg_home_email; ?>' /></td>
									<td style='padding-left:40px'><?php echo $text_openinghours; ?></td>
									<td>
										<input style='width:186px' type='text' name='schemaorg_home_openinghours_days' placeholder='<?php echo $text_openinghours_days_placeholder; ?>' value='<?php echo $schemaorg_home_openinghours_days; ?>' />
										<input style='width:90px'type='text' name='schemaorg_home_openinghours_time' placeholder='<?php echo $text_openinghours_time_placeholder; ?>' value='<?php echo $schemaorg_home_openinghours_time; ?>' />
									</td>
								</tr>
							</table>							
						</div>
						<div id='tab-schemaorg-prod' class='htabs-content'>
							<table class='form'>
								<tr>
									<td style='padding-left:45px; width:auto'><?php echo $text_status; ?></td>
									<td>
										<select name='schemaorg_status'>
											<option value='1'<?php if($schemaorg_status == '1') echo 'selected="selected"';?>><?php echo $text_enabled; ?></option>
											<option value='2'<?php if($schemaorg_status == '2') echo 'selected="selected"';?><?php if($schemaorg_status == '') echo 'selected="selected"';?>><?php echo $text_disabled; ?></option>
										</select>
									</td>
									<td style='padding-left:40px'><?php echo $text_island_type; ?></td>
									<td>
										<select name='schemaorg_island' style='width:300px'>
											<option value='1'<?php if($schemaorg_island == '1') echo 'selected="selected"';?>><?php echo $text_island_1; ?></option>
											<option value='2'<?php if($schemaorg_island == '2') echo 'selected="selected"';?><?php if($schemaorg_island == '') echo 'selected="selected"';?>><?php echo $text_island_2; ?></option>
											<option value='3'<?php if($schemaorg_island == '3') echo 'selected="selected"';?><?php if($schemaorg_island == '') echo 'selected="selected"';?>><?php echo $text_island_3; ?></option>
										</select>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div id='tab-opengraph' class='htabs-content'>   
						<table class='form'>
							<tr>
								<td style='padding-left:45px; width:auto'><?php echo $text_status; ?></td>
								<td>
									<select name='opengraph_status'>
										<option value='1'<?php if($opengraph_status == '1') echo 'selected="selected"';?>><?php echo $text_enabled; ?></option>
										<option value='2'<?php if($opengraph_status == '2') echo 'selected="selected"';?><?php if($opengraph_status == '') echo 'selected="selected"';?>><?php echo $text_disabled; ?></option>
									</select>
								</td>
								<td></td>
								<td></td>
							</tr>	
							<tr>
								<td colspan='2' style='text-align:center; width:auto'><img src='view/image/microdata/fbog-1.jpg' alt=''></td>
								<td colspan='2' style='text-align:center'><img src='view/image/microdata/fbog-2.jpg' alt=''></td>
							</tr>
						</table>
					</div>
					<div id='tab-twittercard' class='htabs-content'>   
						<table class='form'>
							<tr>
								<td style='padding-left:45px; width:auto'><?php echo $text_status; ?></td>
								<td>
									<select name='twittercard_status'>
										<option value='1'<?php if($twittercard_status == '1') echo 'selected="selected"';?>><?php echo $text_enabled; ?></option>
										<option value='2'<?php if($twittercard_status == '2') echo 'selected="selected"';?><?php if($twittercard_status == '') echo 'selected="selected"';?>><?php echo $text_disabled; ?></option>
									</select>
								</td>
								<td style='padding-left:40px'><?php echo $text_twitter_site; ?></td>
								<td>
									<input type='text' name='twitter_site' placeholder='<?php echo $text_twitter_place; ?>' value='<?php echo $twitter_site; ?>' />
								</td>
							</tr>
							<tr>
								<td style='padding-left:45px; width:auto'></td>
								<td></td>
								<td style='padding-left:40px'><?php echo $text_twitter_creator; ?></td>
								<td>
									<input type='text' name='twitter_creator' placeholder='<?php echo $text_twitter_place; ?>' value='<?php echo $twitter_creator; ?>' />
								</td>
							</tr>	
							<tr>
								<td colspan='2' style='text-align:center; width:auto'><img src='view/image/microdata/twittercard-1.jpg' alt=''></td>
								<td colspan='2' style='text-align:center'><img src='view/image/microdata/twittercard-2.jpg' alt=''></td>
							</tr>
						</table>
					</div>
					<div id='tab-info' class='htabs-content'>   
						<table class='form'>
							<tr>
								<td><?php echo $text_modul; ?></td>
								<td colspan='2'><?php echo $text_microdata; ?></td>							
							</tr>	
							<tr>
								<td><?php echo $text_autor; ?></td>
								<td colspan='2'><a><?php echo $text_dariygray; ?></a></td>	
							</tr>
							<tr>
								<td><?php echo $text_contacts; ?></td>
								<td><?php echo $text_email; ?> <a href='mailto:dariy.gray@gmail.com' title='<?php echo $text_send_email; ?>'>dariy.gray@gmail.com</a></td>
								<td><?php echo $text_skype; ?> <a href='skype:DariyGRAY?chat' title='<?php echo $text_send_skype; ?>'><?php echo $text_dariygray; ?></a></td>
							</tr>
						</table>
					</div>
			</form>
		</div>
	</div><div class='created'><i>Created by</i> <?php echo $text_dariygray; ?></div>
</div>
<script type='text/javascript'>$('#tab-microdata a').tabs();$('#tab-schemaorg-tabs a').tabs();</script>
<?php echo $footer; ?>