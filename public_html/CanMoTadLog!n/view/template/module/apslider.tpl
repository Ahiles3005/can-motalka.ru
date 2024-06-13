<?php echo $header; ?>

<div id="preloader"></div>
<div id="apslider">

	<!-- BLOCK ERROR -->
	<?php if ($error_warning) { echo '<div class="warning">' . $error_warning . '</div>'; } ?> 
	<?php if ($error_size)    { echo '<div class="warning">' . $error_size    . '</div>'; } ?>
	<?php if ($error_slider)  { echo '<div class="warning">' . $error_slider  . '</div>'; } ?>

	<header>

		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $breadcrumb) { 
				echo $breadcrumb['separator'] . '<a href="' . $breadcrumb['href'] . '">' . $breadcrumb['text'] . '</a>'; 
			} ?>
		</div>

		<div class="buttons">
			<a onclick="apply(); return false;"  class="button"><?php echo  $button_apply;  ?></a>
			<a onclick="$('#form').submit();"    class="button"><?php echo  $button_save;   ?></a>
			<a href="<?php echo $cancel; ?>"     class="button"><?php echo  $button_cancel; ?></a>
		</div>

	</header>

	<section>
		<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">

			<div class="basic_content">

			<?php $slider = 0; $slider_item = 0; ?>

				<div class="box-left">
					<nav>
						<ul>
							<?php $i = 0; foreach ($apslider_item as $menu) { ?>

							<li id="slider_<?php echo $i; ?>">
								<a class="name" href="#slider_cnontent_<?php echo $i; ?>"> <?php echo $text_slider .' 	'. $i; ?></a>
								<a class="tooltip set"  href="#slider_settings_<?php echo $i; ?>"  title="<?php echo $text_settings; ?>"></a>
								<a class="tooltip delate"  href="#" onClick="$('#tooltip, #slider_<?php echo $i; ?>, #slider_cnontent_<?php echo $i; ?>, #slider_settings_<?php echo $i; ?>').remove(); return false;" title="<?php echo $remove_slider; ?>"></a>
							</li>

							<?php $i++; } ?>
						</ul>			
					</nav>
					<span> <a onclick="add_slider(); return false;"> <?php echo $text_add_slider; ?> </a> </span>
				</div>

				<div class="box-right">

					<?php foreach ($apslider_item as $slider_block) { ?>
					<div id="slider_cnontent_<?php echo $slider; ?>">

						<?php foreach ($slider_block as $item){ ?>
						<div id="slider_item_<?php echo $slider_item; ?>" class="slide_row">
							
							<!-- BASIC BLOCK -->
							<table>	
								<tr><th colspan="4"><?php echo $text_basic_block; ?></th></tr>

								<tr>
									<td class="image_slide"> <?php echo $text_image; ?></td>
									<td class="link"> <?php echo $text_link; ?>		   </td>
									<td class="actions"> <?php echo $text_actions; ?>  </td>
								</tr>

								<tr>
									<td>
										<div class="image">
											<img src="<?php echo $item['thumb']; ?>" alt="" id="thumb_<?php echo $slider_item; ?>" />
											<input type="hidden" id="image_<?php echo $slider_item; ?>" value="<?php echo isset($item['image']) ? $item['image'] : ''; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][image]"><br>
											<a onClick="image_upload('image_<?php echo $slider_item; ?>', 'thumb_<?php echo $slider_item; ?>');" > <?php echo $text_browse; ?></a> &nbsp;&nbsp;|&nbsp;&nbsp;
											<a onClick="$('#thumb_<?php echo $slider_item; ?>').attr('src', '<?php echo $no_image; ?>'); $('#image_<?php echo $slider_item; ?>').attr('value', '');"> <?php echo $text_clear; ?></a>
										</div>
									</td>

									<td> 
										<?php foreach ($languages as $language) { ?>

										<p class="lang"> 
											<input class="w100" type="text" value="<?php echo isset($item['link'][$language['language_id']]) ? $item['link'][$language['language_id']] : ''; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][link][<?php echo $language['language_id']; ?>]">
											<span class="code"><?php echo $language['code']; ?></span>
										</p>
										<?php } ?>
									</td>

									<td class="actions">
										<span>
											<input <?php echo ($item['link_to'] == 'slide' || $item['link_to'] != 'btn') ? 'checked="checked"' : ''; ?> value="slide" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][link_to]" id="action_slide_<?php echo $slider_item; ?>" type="radio">
											<label for="action_slide_<?php echo $slider_item; ?>"><?php echo $text_clickable_slider; ?></label>
										</span>

										<span>
											<input <?php echo ($item['link_to'] == 'btn') ? 'checked="checked"' : ''; ?> value="btn" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][link_to]" id="action_btn_<?php echo $slider_item; ?>" type="radio">
											<label for="action_btn_<?php echo $slider_item; ?>"><?php echo $text_clickable_button; ?></label>
										</span>
									</td>

								</tr>

							</table>
							
							<!-- TEXT BLOCK -->
							<table>

								<tr>
									<th colspan="4">
										<?php echo $text_text_block; ?> 
										<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup> 
									</th>
								</tr>

								<tr>
									<td class="text_title"><?php echo $text_title; ?>       </td>
									<td class="text_descr"><?php echo $text_description; ?> </td>
									<td class="btn_title"><?php echo $text_title_btn; ?>    </td>
								</tr>
								<tr>
									<td>
										<?php foreach ($languages as $language) { ?>
										<p class="lang"> 
											<textarea cols="15" rows="4" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][text_title][<?php echo $language['language_id']; ?>]"><?php echo isset($item['text_title'][$language['language_id']]) ? $item['text_title'][$language['language_id']]  : ''; ?></textarea>
											<span class="code"><?php echo $language['code']; ?></span>
										</p>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($languages as $language) { ?>
										<p class="lang"> 
											<textarea cols="30" rows="4" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][text_descr][<?php echo $language['language_id']; ?>]"><?php echo isset($item['text_descr'][$language['language_id']]) ? $item['text_descr'][$language['language_id']]  : ''; ?></textarea>
											<span class="code"><?php echo $language['code']; ?></span>
										</p>
										<?php } ?>
									</td>

									<td>
										<?php foreach ($languages as $language) { ?>
										<p class="lang">
											<input class="w100" type="text" value="<?php echo isset($item['btn_title'][$language['language_id']]) ? $item['btn_title'][$language['language_id']] : ''; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_title][<?php echo $language['language_id']; ?>]">
											<span class="code"><?php echo $language['code']; ?></span>
										</p>
										<?php } ?>
									</td>
								</tr>

								<tr>
									<td colspan="3"><?php echo $text_align; ?></td>
								</tr>
								
								<tr>
									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][title_alig]">
											<option <?php echo ($item['title_alig'] == 'left'   ) ? 'selected' : ''; ?> value="left"   > <?php echo $text_align_left; ?>   </option>
											<option <?php echo ($item['title_alig'] == 'center' ) ? 'selected' : ''; ?> value="center" > <?php echo $text_align_center; ?> </option>
											<option <?php echo ($item['title_alig'] == 'right'  ) ? 'selected' : ''; ?> value="right"  > <?php echo $text_align_right; ?>  </option>
											<option <?php echo ($item['title_alig'] == 'justify') ? 'selected' : ''; ?> value="justify"> <?php echo $text_align_justify; ?></option>
										</select> 
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][descr_alig]">
											<option <?php echo ($item['descr_alig'] == 'left'   ) ? 'selected' : ''; ?> value="left"   > <?php echo $text_align_left; ?>   </option>
											<option <?php echo ($item['descr_alig'] == 'center' ) ? 'selected' : ''; ?> value="center" > <?php echo $text_align_center; ?> </option>
											<option <?php echo ($item['descr_alig'] == 'right'  ) ? 'selected' : ''; ?> value="right"  > <?php echo $text_align_right; ?>  </option>
											<option <?php echo ($item['descr_alig'] == 'justify') ? 'selected' : ''; ?> value="justify"> <?php echo $text_align_justify; ?></option>
										</select> 
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_alig]">
											<option <?php echo ($item['btn_alig'] == 'left'   ) ? 'selected' : ''; ?> value="left"   > <?php echo $text_align_left; ?>   </option>
											<option <?php echo ($item['btn_alig'] == 'center' ) ? 'selected' : ''; ?> value="center" > <?php echo $text_align_center; ?> </option>
											<option <?php echo ($item['btn_alig'] == 'right'  ) ? 'selected' : ''; ?> value="right"  > <?php echo $text_align_right; ?>  </option>
											<option <?php echo ($item['btn_alig'] == 'justify') ? 'selected' : ''; ?> value="justify"> <?php echo $text_align_justify; ?></option>
										</select> 
									</td>																		

								</tr>

							</table>

							<!-- SIZE TEXT ELEMENT -->
							<table>	
								<tr>
									<th colspan="7">
										<?php echo $text_size_element; ?>
										<sup> <a class="tooltip" href="#" title='<?php echo $text_info_element; ?>'> ? </a></sup>
									</th>
								</tr>

								<tr>
									<td class="text_element"> <?php echo $text_desktop; ?> </td>
									<td>  ≥ 1200px </td>
									<td>  ≥ 992px  </td>
									<td>  ≥ 768px  </td>
									<td>  ≥ 560px  </td>
									<td>  ≥ 450px  </td>
									<td>  ≥ 320px  </td>
								</tr>

								<tr>
									<td class="text_element"><?php echo $text_width_block; ?></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width1200]" value="<?php echo isset($item['box_width1200']) ? $item['box_width1200'] : ''; ?>" >
									</td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width992]"  value="<?php echo isset($item['box_width992']) ? $item['box_width992'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width768]"  value="<?php echo isset($item['box_width768']) ? $item['box_width768'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width560]"  value="<?php echo isset($item['box_width560']) ? $item['box_width560'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width450]"  value="<?php echo isset($item['box_width450']) ? $item['box_width450'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][box_width320]"  value="<?php echo isset($item['box_width320']) ? $item['box_width320'] : ''; ?>" ></td>
								</tr>

								<tr>
									<td class="text_element"><?php echo $text_width_btn; ?></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width1200]" value="<?php echo isset($item['btn_width1200']) ? $item['btn_width1200'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width992]"  value="<?php echo isset($item['btn_width992']) ? $item['btn_width992'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width768]"  value="<?php echo isset($item['btn_width768']) ? $item['btn_width768'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width560]"  value="<?php echo isset($item['btn_width560']) ? $item['btn_width560'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width450]"  value="<?php echo isset($item['btn_width450']) ? $item['btn_width450'] : ''; ?>" ></td>
									<td><input type="text" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_width320]"  value="<?php echo isset($item['btn_width320']) ? $item['btn_width320'] : ''; ?>" ></td>
								</tr>

								<tr>
									<td class="text_element"><?php echo $text_show_block; ?></td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width1200]" id="">
											<option <?php echo ($item['show_width1200'] == 1) ? 'selected' : ''; ?> value="1" > <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width1200'] == 0) ? 'selected' : ''; ?> value="0" > <?php echo $text_off_show;?> </option>
										</select>
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width992]" id="">
											<option <?php echo ($item['show_width992'] == 1) ? 'selected' : ''; ?> value="1"> <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width992'] == 0) ? 'selected' : ''; ?> value="0"> <?php echo $text_off_show;?> </option>
										</select>
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width768]" id="">
											<option <?php echo ($item['show_width768'] == 1) ? 'selected' : ''; ?> value="1"> <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width768'] == 0) ? 'selected' : ''; ?> value="0"> <?php echo $text_off_show;?> </option>
										</select>
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width560]" id="">
											<option <?php echo ($item['show_width560'] == 1) ? 'selected' : ''; ?> value="1"> <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width560'] == 0) ? 'selected' : ''; ?> value="0"> <?php echo $text_off_show;?> </option>
										</select>
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width450]" id="">
											<option <?php echo ($item['show_width450'] == 1) ? 'selected' : ''; ?> value="1"> <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width450'] == 0) ? 'selected' : ''; ?> value="0"> <?php echo $text_off_show;?> </option>
										</select>
									</td>

									<td>
										<select name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][show_width320]" id="">
											<option <?php echo ($item['show_width320'] == 1) ? 'selected' : ''; ?> value="1"> <?php echo $text_no_show; ?> </option>
											<option <?php echo ($item['show_width320'] == 0) ? 'selected' : ''; ?> value="0"> <?php echo $text_off_show;?> </option>
										</select>
									</td>

								</tr>

							</table>

							<!-- ADDIT SETTINGS -->	
							<table>

								<tr>
									<th colspan="4">
										<?php echo $text_addit_settings; ?> 
										<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup> 
									</th>
								</tr>

								<tr>
									<td class="text_position">  <?php echo $text_block_position; ?> </td>
									<td class="item_bg">        <?php echo $text_bg_color; ?>       </td>
									<td class="title_color">    <?php echo $text_color_title; ?>    </td>
									<td class="descr_color">    <?php echo $text_color_descr; ?>    </td>
									<td class="btn_color">      <?php echo $text_color_btn; ?>      </td>
									<td class="color_text_btn"> <?php echo $text_color_text_btn; ?> </td>
								</tr>

								<tr>
									<td>

										<div class="slider_position">

											<?php foreach($positions as $position) { 

												if     ($position == 'top_left')    echo '<div class="top">'; 
												elseif ($position == 'center_left') echo '<div class="center">';
												elseif ($position == 'bottom_left') echo '<div class="bottom">';  

												?>

												<span>
													<input <?php echo ($position == $item['text_position'] ) ? 'checked="checked"' : ''; ?> value="<?php echo $position; ?>" id="<?php echo $position . $slider .'_'. $slider_item ; ?>" type="radio" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][text_position]">
													<label for="<?php echo $position . $slider .'_'. $slider_item; ?>"></label>
												</span>

												<?php } ?>

											</div> <!-- top, center, bottom -->

										</div> <!-- slider position -->

									</td>

									<td> <input class="color" value="<?php echo isset($item['bg_descr']) ? $item['bg_descr'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][bg_descr]"></td>

									<td> <input class="color" value="<?php echo isset($item['title_color']) ? $item['title_color'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][title_color]"> </td>

									<td> <input class="color" value="<?php echo isset($item['descr_color']) ? $item['descr_color'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][descr_color]"> </td>

									<td class="bt_td_col">
										<?php echo $text_basic_color; ?>
										<p class="bt_col"><input class="color" value="<?php echo isset($item['btn_color']) ? $item['btn_color'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_color]"></p>

										<?php echo $text_hover_color; ?>
										<p class="bt_col"><input class="color" value="<?php echo isset($item['btn_hover']) ? $item['btn_hover'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][btn_hover]"></p>
									</td>

									<td class="bt_td_col">
										<?php echo $text_basic_color; ?>
										<p class="bt_col"><input class="color" value="<?php echo isset($item['colortext_btn']) ? $item['colortext_btn'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][colortext_btn]"></p>

										<?php echo $text_hover_color; ?>
										<p class="bt_col"><input class="color" value="<?php echo isset($item['colortext_hover']) ? $item['colortext_hover'] : '#FFFFFF'; ?>" name="apslider_item[<?php echo $slider; ?>][<?php echo $slider_item; ?>][colortext_hover]"></p>
									</td>

								</tr>

							</table>

							<a class="del_slide" href="#" data-slider="<?php echo $slider; ?>" onClick="$('#slider_item_<?php echo $slider_item; ?>').remove(); return false;" ><?php echo $text_remove_slide; ?></a>

						</div> <!-- slider item -->
						<?php $slider_item++; } ?>

						<a class="add_slide" data-slider="<?php echo $slider; ?>" ><?php echo $text_add_slide; ?></a>

					</div> <!-- slider contant-->
					<?php $slider++; } ?>

					<!-- SETTINGS  BOX-->
					<?php $slider_setings = 0; 
					foreach($apslider_module as $setting) { ?>

					<div id="slider_settings_<?php echo $slider_setings; ?>" class="slide_row">
						<input type="hidden" name="apslider_module[<?php echo $slider_setings; ?>][slider_id]" value="<?php echo $slider_setings; ?>">
						<table>
							<tr colspan="6">
								<th><?php echo $text_basic_settings; ?></th>
							</tr>
							<tr>
								<td <?php if ($error_size) { ?> class="err" <?php } ?>><?php echo $text_slider_size; ?><br> <sup><?php echo $text_w_h; ?></sup> </td>
								<td><?php echo $text_positon; ?></td>
								<td><?php echo $text_layout; ?></td>
								<td><?php echo $text_slider_status; ?></td>
								<td><?php echo $text_sort_order; ?></td>
							</tr>
							<tr>

								<td>
									<input value="<?php echo isset($setting['width']) ? $setting['width'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][width]"  type="text" size="5"> x 
									<input value="<?php echo isset($setting['height']) ? $setting['height'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][height]" type="text" size="5">
								</td>
		
								<td>
									<select name="apslider_module[<?php echo $slider_setings; ?>][position]">
										<option <?php echo ($setting['position'] == 'content_top') ? 'selected' : ''; ?> value="content_top"> 
											<?php echo $text_content_top; ?>
										</option>	
										<option <?php echo ($setting['position'] == 'content_bottom') ? 'selected' : ''; ?> value="content_bottom"> 
											<?php echo $text_content_bottom; ?> 
										</option>
										<option <?php echo ($setting['position'] == 'column_left') ? 'selected' : ''; ?> value="column_left"> 
											<?php echo $text_column_left; ?>    
										</option>
										<option <?php echo ($setting['position'] == 'column_right') ? 'selected' : ''; ?> value="column_right"> 
											<?php echo $text_column_right; ?>   
										</option>
									</select>
								</td>

								<td>
									<select name="apslider_module[<?php echo $slider_setings; ?>][layout_id]">
										<?php foreach ($layouts as $layout) { ?>
										<option <?php echo ($setting['layout_id'] == $layout['layout_id']) ? 'selected' : ''; ?> value="<?php echo $layout['layout_id']; ?>"><?php echo $layout['name']; ?></option>
										<?php } ?>
									</select>
								</td>

								<td class="radio">
									<span>
										<input <?php echo ($setting['status'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][status]" id="status_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="status_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['status'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][status]" id="status_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="status_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td>
									<input value="<?php echo isset($setting['sort_order']) ? $setting['sort_order'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][sort_order]" type="text" size="3">
								</td>

							</tr>
						</table>

						<!-- HEIGHT  SLIDER / PARALLAX -->
						<table>
							<tr>
								<th>
									<?php echo $text_slider_parallax; ?>
									<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup>
								</th>
							</tr>
							<tr>
								<td><?php echo $text_desktop_size; ?> ≥ 1200px</td>
								<td><?php echo $text_desktop_size; ?> ≥ 992px</td>
								<td><?php echo $text_desktop_size; ?> ≥ 768px</td>
								<td><?php echo $text_desktop_size; ?> ≥ 560px</td>
								<td><?php echo $text_desktop_size; ?> ≥ 450px</td>
								<td><?php echo $text_desktop_size; ?> ≥ 320px</td>
							</tr>
							<tr>

								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][max_1200]" value="<?php echo isset($setting['max_1200']) ? $setting['max_1200'] : ''; ?>">
								</td>

								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][max_992]" value="<?php echo isset($setting['max_992']) ? $setting['max_992'] : ''; ?>">
								</td>

								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][max_768]" value="<?php echo isset($setting['max_768']) ? $setting['max_768'] : ''; ?>">
								</td>

								<td>
									<input type="number"  name="apslider_module[<?php echo $slider_setings; ?>][max_560]" value="<?php echo isset($setting['max_560']) ? $setting['max_560'] : ''; ?>">
								</td>
								
								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][max_450]" value="<?php echo isset($setting['max_450']) ? $setting['max_450'] : ''; ?>">
								</td>

								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][max_320]" value="<?php echo isset($setting['max_320']) ? $setting['max_320'] : ''; ?>">
								</td>

							</tr>
						</table>
	
						<!-- SETTINGS SLIDER BOX -->
						<table>
							<tr>
								<th><?php echo $text_sr_settings; ?></th>
							</tr>

							<tr>
								<td class="parallax"><?php echo $text_parallax; ?>      </td>
								<td class="parallax"><?php echo $text_speed_parallax; ?></td>
								<td><?php echo $text_type;      ?> </td>
								<td><?php echo $text_timeout;   ?>  <br> <sup><?php echo $text_second; ?></sup> </td>
								<td><?php echo $text_autoplay;  ?> </td>
								<td><?php echo $text_lazy_load; ?> </td>
							</tr>

							<tr>

								<td class="radio parallax">
									<span>
										<input <?php echo ($setting['parallax'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][parallax]" id="parallax_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="parallax_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['parallax'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][parallax]" id="parallax_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="parallax_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td class="parallax">
									<input type="number" value="<?php echo isset($setting['parallax_speed']) ? $setting['parallax_speed'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][parallax_speed]">
								</td>
								
								<td>
									<select name="apslider_module[<?php echo $slider_setings; ?>][animation]">
										<?php foreach ($animations as $animation) { ?>
										<option value="<?php echo $animation; ?>" <?php echo ($setting['animation'] == $animation) ? 'selected' : ''; ?>><?php echo $animation; ?></option>
										<?php } ?>
									</select>
								</td>

								<td>
									<input value="<?php echo isset($setting['timeout']) ? $setting['timeout'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][timeout]"  type="number">
								</td>

								<td class="radio">
									<span>
										<input <?php echo ($setting['auto_play'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][auto_play]" id="play_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="play_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['auto_play'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][auto_play]" id="play_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="play_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td class="radio">
									<span>
										<input <?php echo ($setting['lazy_load'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][lazy_load]" id="lazy_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="lazy_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['lazy_load'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][lazy_load]" id="lazy_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="lazy_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

							</tr>
						</table>
						
						<!-- SETTINGS NAV -->
						<table>

							<tr>
								<th> <?php echo $text_nav; ?> </th>
							</tr>

							<tr>
								<td><?php echo $text_arrow; ?>         </td>
								<td><?php echo $text_point; ?>         </td>
								<td><?php echo $text_position_point; ?></td>
								<td><?php echo $text_color_point; ?>   </td>
							</tr>

							<tr>

								<td class="radio">
									<span>
										<input <?php echo ($setting['arrow'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][arrow]" id="arrow_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="arrow_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['arrow'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][arrow]" id="arrow_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="arrow_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td class="radio">
									<span>
										<input <?php echo ($setting['point'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][point]" id="dot_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="dot_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['point'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][point]" id="dot_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="dot_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>
								
								<td>
									<select name="apslider_module[<?php echo $slider_setings; ?>][point_possition]">
										<option value="left"   <?php echo ($setting['point_possition'] == 'left')   ? 'selected' : ''; ?>>  <?php echo $text_align_left; ?> </option>
										<option value="center" <?php echo ($setting['point_possition'] == 'center') ? 'selected' : ''; ?>>  <?php echo $text_align_center ?> </option>
										<option value="right"  <?php echo ($setting['point_possition'] == 'right')  ? 'selected' : ''; ?>>  <?php echo $text_align_right; ?> </option>
									</select>
								</td>

								<td>
									<input name="apslider_module[<?php echo $slider_setings; ?>][point_color]" type="text" class="color" value="<?php echo isset($setting['point_color']) ? $setting['point_color'] : '#FFFFFF' ;?>">
								</td>
								
							</tr>
						</table>
						
						<!-- SETTINGS PROGRESS BAR  -->
						<table>	
							<tr>
								<th> <?php echo $text_settings_bar; ?> </th>
							</tr>
							<tr>
								<td> <?php echo $text_bar; ?> </td>
								<td> <?php echo $text_position_bar; ?></td>
								<td> <?php echo $text_substrate_color; ?></td>
								<td> <?php echo $text_progress_color; ?></td>
								<td> <?php echo $text_thickness;?></td>
							</tr>
							<tr>
								<td class="radio">
									<span>
										<input <?php echo ($setting['progress'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][progress]" id="progress_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="progress_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['progress'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][progress]" id="progress_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="progress_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td>
									<select name="apslider_module[<?php echo $slider_setings; ?>][progress_pos]">
										<option value="top" <?php echo ($setting['progress_pos'] == 'top') ? 'selected' : ''; ?>>  
											<?php echo $text_top_progress; ?>
										</option>
										<option value="bottom"<?php echo ($setting['progress_pos'] == 'bottom') ? 'selected' : ''; ?>> 
											<?php echo $text_bottom_progress; ?>
										</option>
									</select>
								</td>

								<td>
									<input value="<?php echo $setting['progress_bg'] ? $setting['progress_bg'] : '#EEEEEE'; ?>" name="apslider_module[<?php echo $slider_setings; ?>][progress_bg]" class="color" type="text">
								</td>
								<td>
									<input value="<?php echo $setting['progress_status'] ? $setting['progress_status'] : '#CCCCCC'; ?>" name="apslider_module[<?php echo $slider_setings; ?>][progress_status]" class="color" type="text">
								</td>
								<td>
									<input type="number" name="apslider_module[<?php echo $slider_setings; ?>][line_height]" value="<?php echo $setting['line_height'] ? $setting['line_height'] : 4 ; ?>">
								</td>
							</tr>
						</table>
						
						<!-- SETTINGS FULL MOD -->
						<table>
							<tr>
								<th><?php echo $text_full_settings; ?></th>
							</tr>
							<tr>
								<td><?php echo $text_full; ?></td>
								<td><?php echo $text_selector; ?><br> <sup><?php echo $text_element; ?></sup></td>
								<td><?php echo $text_substrate; ?></td>
								<td><?php echo $text_margin;?>  <br> <sup><?php echo $text_t_b; ?></sup></td>
							</tr>
							<tr>
								<td class="radio">
									<span>
										<input <?php echo ($setting['full'] == 1) ? 'checked="checked"' : ''; ?> value="1" name="apslider_module[<?php echo $slider_setings; ?>][full]" id="full_on_<?php echo $slider_setings; ?>" type="radio">
										<label for="full_on_<?php echo $slider_setings; ?>"><?php echo $text_on; ?></label>
									</span>
									<span>
										<input <?php echo ($setting['full'] == 0) ? 'checked="checked"' : ''; ?> value="0" name="apslider_module[<?php echo $slider_setings; ?>][full]" id="full_off_<?php echo $slider_setings; ?>" type="radio">
										<label for="full_off_<?php echo $slider_setings; ?>"><?php echo $text_off; ?></label>
									</span>
								</td>

								<td><input type="text" value="<?php echo isset($setting['selector']) ? $setting['selector'] : ''; ?>" name="apslider_module[<?php echo $slider_setings; ?>][selector]"></td>

								<td><select name="apslider_module[<?php echo $slider_setings; ?>][substrate]" >
									<option <?php echo ($setting['substrate'] == 1) ? 'selected' : ''; ?> value="1"><?php echo $text_add_substrate; ?></option>
									<option <?php echo ($setting['substrate'] == 0) ? 'selected' : ''; ?> value="0"><?php echo $text_not_substrate; ?></option>		
								</select></td>

								<td>
									<input size="4" type="text" name="apslider_module[<?php echo $slider_setings; ?>][margin_top]" value="<?php echo isset($setting['margin_top']) ? $setting['margin_top'] : ''; ?>"> x 
									<input size="4" type="text" name="apslider_module[<?php echo $slider_setings; ?>][margin_bottom]" value="<?php echo isset($setting['margin_bottom']) ? $setting['margin_bottom'] : ''; ?>">
								</td>
							</tr>
						</table>

					</div> <!-- slider settings-->
					<?php $slider_setings++; } ?>

				</div> <!--  box right  -->

			</div> <!-- sliser cnontent -->
		</section>
	</form>

</div> <!-- basic content -->
</div> <!-- slideshow -->

<?php echo $footer; ?>

<script type="text/javascript">

	/*
	** Preloader 
	*/

	$(window).on('load', function () {
		var preloader = $('#preloader');
		setTimeout( function() {
			preloader.fadeOut('slow');
		}, 500);
	});


	/*
	** Color picter js plugin 
	*/

	var colors = jsColorPicker('input.color', {	
		customBG: '#f9f9f9',
		readOnly: false,
		
		init: function(elm, colors) {
			elm.style.backgroundColor = elm.value;
			elm.style.color = colors.rgbaMixCustom.luminance > 0.22 ? '#555' : '#fff';
		},

		margin: {left: -80, top: 5},
		multipleInstances: false,
		size: 2,
		draggable: true,
	});

	/*
	** Function add new image 
	** GET image src & thumb src
	*/

	function image_upload(field, thumb) {
		$('#dialog').remove();

		$('#apslider').prepend('<div id="dialog" style="padding: 3px 0px 0px 0px;"><iframe src="index.php?route=common/filemanager&token=<?php echo $token; ?>&field=' + encodeURIComponent(field) + '" style="padding:0; margin: 0; display: block; width: 100%; height: 100%;" frameborder="no" scrolling="auto"></iframe></div>');

		$('#dialog').dialog({
			title: '<?php echo $text_image_manager; ?>',
			close: function (event, ui) {
				if ($('#' + field).attr('value')) {
					$.ajax({
						url: 'index.php?route=common/filemanager/image&token=<?php echo $token; ?>&image=' + encodeURIComponent($('#' + field).attr('value')),
						dataType: 'text',
						success: function(data) {
							$('#' + thumb).replaceWith('<img src="' + data + '" alt="" id="' + thumb + '" />');
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
	}

	var right_block  = $('.box-right .add_slide'), 
		slider_item  = <?php echo $slider_item; ?>,
		slider_block = <?php echo $slider; ?>,
		navbar 		 = $('.box-left nav ul'),
		right  		 = $('.box-right');

	/*
	** Function create new item
	** Return new item in html content
	** Takes slide item ID - var slider_block
	*/

	function add_item (slider) {

		html  = '<div id="slider_item_' + slider_item + '" class="slide_row">';

		// BASIC BLOCK
		html += 	'<table>';
		html += 		'<tr><th colspan="4"><?php echo $text_basic_block; ?></th></tr>';
		html +=			'<tr>';
		html +=				'<td class="image_slide"> <?php echo $text_image; ?></td>';
		html +=				'<td class="link"> <?php echo $text_link; ?>	    </td>';
		html +=			    '<td class="actions"> <?php echo $text_actions; ?>  </td>';
		html += 		'</tr>';
		html += 		'<tr>';
		html +=	 			'<td>';
		html +=	 				'<div class="image">';
		html +=					'<img src="<?php echo $no_image; ?>" alt="" id="thumb_'+ slider_item +'" />';
		html +=	 				'<input type="hidden" id="image_'+slider_item+'" value="" name="apslider_item['+ slider +']['+slider_item+'][image]"><br>';
		html +=					'<a onClick="image_upload(\'image_'+ slider_item +'\', \'thumb_'+ slider_item +'\');" > <?php echo $text_browse; ?></a>';
		html +=					'&nbsp;&nbsp;|&nbsp;&nbsp;';
		html +=					'<a onClick="$(\'#thumb_'+ slider_item +'\').attr(\'src\', \'<?php echo $no_image; ?>\'); $(\'#image_'+ slider_item +'\').attr(\'value\', \'\');"> <?php echo $text_clear; ?></a>';
		html +=	 				'</div';
		html +=	 			'</td>';
		html +=				'<td>';	
								<?php foreach ($languages as $language) { ?>
		html += 				'<p class="lang">';
		html += 					'<input class="w100" type="text" name="apslider_item['+ slider +']['+ slider_item +'][link][<?php echo $language["language_id"]; ?>]">'; 
		html += 					'<span class="code"><?php echo $language["code"]; ?></span>';
		html += 				'</p>';				
								<?php } ?>
		html +=				'</td>';	
		html += 			'<td class="actions">';
		html +=					'<span>';
		html += 					'<input value="slide" checked="checked" name="apslider_item['+ slider +']['+ slider_item +'][link_to]" id="action_slide_'+slider_item+'" type="radio">';
		html += 					'<label for="action_slide_'+slider_item+'"><?php echo $text_clickable_slider; ?></label>';
		html += 				'</span>';						
		html += 				'<span>';				
		html += 					'<input value="btn" name="apslider_item['+ slider +']['+ slider_item +'][link_to]" id="action_btn_'+slider_item+'" type="radio">';
		html += 					'<label for="action_btn_'+slider_item+'"><?php echo $text_clickable_button; ?></label>';	
		html += 				'</span>';					
		html += 			'</td>';
		html +=			'<tr>';						
		html += 	'</table>';
		
		// TEXT BLOCK
		html += '<table>';
		html += 	'<tr>';
		html +=			'<th colspan="4">';
		html +=				'<?php echo $text_text_block; ?>'; 
		html +=				'<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup>';
		html +=			'</th>';
		html +=		'</tr>';
		html +=		'<tr>';
		html +=			'<td class="text_title"><?php echo $text_title; ?>       </td>';
		html +=			'<td class="text_descr"><?php echo $text_description; ?> </td>';
		html +=			'<td class="btn_title"><?php echo $text_title_btn; ?>    </td>';
		html +=		'</tr>';
		html +=		'<tr>';
		html +=			'<td>'
							<?php foreach ($languages as $language) { ?>
		html +=				'<p class="lang">'; 
		html +=					'<input class="w100" type="text" name="apslider_item['+ slider +']['+ slider_item +'][text_title][<?php echo $language["language_id"]; ?>]">';
		html +=					'<span class="code"><?php echo $language["code"]; ?></span>';
		html +=				'</p>';
							<?php } ?>
		html +=			'</td>';
		html +=			'<td>';
							<?php foreach ($languages as $language) { ?>
		html +=				'<p class="lang">'; 
		html +=					'<textarea cols="30" rows="4" name="apslider_item['+ slider +']['+ slider_item +'][text_descr][<?php echo $language["language_id"]; ?>]"></textarea>';
		html += 				'<span class="code"><?php echo $language["code"]; ?></span>';
		html +=				'</p>';
							<?php } ?>
		html +=			'</td>';
		html += 		'<td>';
							<?php foreach ($languages as $language) { ?>
		html +=				'<p class="lang">';
		html +=					'<input class="w100" type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_title][<?php echo $language["language_id"]; ?>]">';
		html +=					'<span class="code"><?php echo $language["code"]; ?></span>';
		html +=				'</p>';
							<?php } ?>				
		html +=			'</td>'
		html += 	'</tr>';
		html += 	'<tr> <td colspan="3"><?php echo $text_align; ?></td> </tr>'	
		html += 	'<tr>';
		html +=			'<td>';
		html +=				'<select name="apslider_item['+ slider +']['+ slider_item +'][title_alig]">';
		html +=					'<option value="left"> <?php echo $text_align_left; ?>   </option>';
		html +=					'<option value="center"> <?php echo $text_align_center; ?> </option>';
		html +=					'<option value="right"> <?php echo $text_align_right; ?>  </option>';
		html +=					'<option selected value="justify"> <?php echo $text_align_justify; ?></option>';
		html +=				'</select>'; 
		html +=			'</td>';
		html +=			'<td>';
		html += 			'<select name="apslider_item['+ slider +']['+ slider_item +'][descr_alig]">';
		html +=					'<option value="left"  > <?php echo $text_align_left; ?>   </option>';
		html +=     			'<option value="center"> <?php echo $text_align_center; ?> </option>';
		html +=					'<option value="right" > <?php echo $text_align_right; ?>  </option>';
		html +=					'<option selected value="justify"> <?php echo $text_align_justify; ?></option>';
		html +=				'</select>'; 
		html +=			'</td>';
		html +=			'<td>';
		html += 			'<select name="apslider_item['+ slider +']['+ slider_item +'][btn_alig]">';
		html +=					'<option value="left"   > <?php echo $text_align_left; ?>   </option>';
		html +=					'<option value="center" > <?php echo $text_align_center; ?> </option>';
		html +=					'<option value="right"  > <?php echo $text_align_right; ?>  </option>';
		html +=					'<option selected value="justify"> <?php echo $text_align_justify; ?></option>';
		html +=				'</select>'; 
		html +=			'</td>';	
		html +=		'</table>';

		// SIZE BLOCK ELEMENT 
		html +=		'<table>';	
		html +=			'<tr>';
		html +=				'<th colspan="7">';
		html +=					'<?php echo $text_size_element; ?>';
		html +=					'<sup> <a class="tooltip" href="#" title="<?php echo $text_info_element; ?>"> ? </a></sup>';
		html +=				'</th>';
		html += 		'</tr>';
		html +=			'<tr>';
		html +=				'<td class="text_element"> <?php echo $text_desktop; ?> </td>';
		html +=				'<td>  ≥ 1200px </td>';
		html +=				'<td>  ≥ 992px  </td>';
		html +=				'<td>  ≥ 768px  </td>';
		html +=				'<td>  ≥ 560px  </td>';
		html +=				'<td>  ≥ 450px  </td>';
		html +=				'<td>  ≥ 320px  </td>';
		html +=			'</tr>';
		html +=			'<tr>';
		html +=				'<td class="text_element"><?php echo $text_width_block; ?></td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width1200]" value=""> </td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width992]"  value=""> </td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width768]"  value=""> </td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width560]"  value=""> </td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width450]"  value=""> </td>';
		html +=				'<td> <input type="text" name="apslider_item['+ slider +']['+ slider_item +'][box_width320]"  value=""> </td>';
		html +=			'</tr>';
		html +=			'<tr>';
		html +=				'<td class="text_element"><?php echo $text_width_btn; ?></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width1200]" value=""></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width992]"  value=""></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width768]"  value=""></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width560]"  value=""></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width450]"  value=""></td>';
		html +=				'<td><input type="text" name="apslider_item['+ slider +']['+ slider_item +'][btn_width320]"  value=""></td>';
		html +=			'</tr>';
		html +=			'<tr>';
		html +=				'<td class="text_element"><?php echo $text_show_block; ?></td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width1200]" >';
		html +=						'<option value="1" > <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width992]">';
		html +=						'<option value="1"> <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width768]">';
		html +=						'<option value="1"> <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width560]">';
		html +=						'<option value="1"> <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width450]">';
		html +=						'<option value="1"> <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=				'<td>';
		html +=					'<select name="apslider_item['+ slider +']['+ slider_item +'][show_width320]">';
		html +=						'<option value="1"> <?php echo $text_no_show; ?> </option>';
		html +=						'<option selected value="0"> <?php echo $text_off_show;?> </option>';
		html +=					'</select>';
		html +=				'</td>';
		html +=			'</tr>';
		html +=		'</table>';

		// ADDITIONAL SETTINGS
		html += 	'<table>';
		html += 		'<tr>';
		html +=				'<th colspan="4">';
		html +=					'<?php echo $text_addit_settings; ?>';
		html +=					'<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup>';
		html +=				'</th>';
		html +=			'</tr>';
		html +=			'<tr>';
		html +=				'<td class="text_position">  <?php echo $text_block_position; ?> </td>';
		html += 			'<td class="item_bg">        <?php echo $text_bg_color; ?>       </td>';
		html +=				'<td class="title_color">    <?php echo $text_color_title; ?>    </td>';
		html +=				'<td class="descr_color">    <?php echo $text_color_descr; ?>    </td>';
		html +=				'<td class="btn_color">      <?php echo $text_color_btn; ?>      </td>';
		html +=				'<td class="color_text_btn"> <?php echo $text_color_text_btn; ?> </td>';
		html +=			'</tr>';
		html +=			'<tr>';
		html +=				'<td>';
		html +=					'<div class="slider_position">';
									<?php foreach($positions as $position) { ?>
		html +=						'<?php if ($position == "top_left")    echo "<div class=\"top\">"    ?>'; 
		html +=						'<?php if ($position == "center_left") echo "<div class=\"center\">" ?>';
		html +=						'<?php if ($position == "bottom_left") echo "<div class=\"bottom\">" ?>';  
		html +=         			'<span>';
		html +=							'<input <?php echo ($position == "bottom_right") ? "checked=\'checked\'" : ""; ?> value="<?php echo $position; ?>" id="<?php echo $position; ?>'+slider+'_'+slider_item+'" type="radio" name="apslider_item['+ slider +']['+ slider_item +'][text_position]">';
		html +=							'<label for="<?php echo $position; ?>'+slider+'_'+slider_item+'"></label>';
		html +=						'</span>';
									<?php } ?>
		html +=					'</div>';
		html +=				'</td>';
		html +=				'<td> <input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][bg_descr]">       </td>'
		html +=				'<td> <input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][title_color]">   </td>';
		html +=				'<td> <input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][descr_color]">   </td>';
		html +=	 			'<td class="bt_td_col">';
		html +=					'<?php echo $text_basic_color; ?>'; 
		html +=					'<p class="bt_col"><input class="color" value="#FFFFFF"" name="apslider_item['+ slider +']['+ slider_item +'][btn_color]"></p>';
		html +=					'<?php echo $text_hover_color; ?>';
		html +=					'<p class="bt_col"><input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][btn_hover]"></p>';
		html +=				'</td>';
		html +=				'<td class="bt_td_col">';
		html +=					'<?php echo $text_basic_color; ?>';
		html +=					'<p class="bt_col"><input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][colortext_btn]"></p>';
		html +=					'<?php echo $text_hover_color; ?>';
		html +=					'<p class="bt_col"><input class="color" value="#FFFFFF" name="apslider_item['+ slider +']['+ slider_item +'][colortext_hover]"></p>';
		html +=				'</td>';
		html +=			'</tr>';
		html +=		'</table>';
		
		html += 	'<a class="del_slide" href="#" onclick="$(\'#slider_item_'+ slider_item +'\').remove(); return false;" >Удалить слайд</a>';
		html += '</div>';

		slider_item ++;
		return html;
	}

	/*
	** Function create new slider 
	** and call function add_item()
	*/

	function add_slider () {

		var menu_id = 'menu_id' + slider_block;

		// CREATE NEW ITEM IN THE MENU
		nav  = '<li id="slider_'+ slider_block +'">';
		nav += 	'<a id="'+ menu_id +'" class="name " href="#slider_cnontent_'+ slider_block +'"> <?php echo $text_slider; ?>  ' + slider_block + '</a>';
		nav += 	'<a class="tooltip set" href="#slider_settings_'+ slider_block +'" title="<?php echo $text_settings; ?>"></a>';
		nav += 	'<a class="tooltip delate"  href="#" onClick="$(\'#tooltip, #slider_'+ slider_block +', #slider_cnontent_'+ slider_block +', #slider_settings_'+ slider_block +'\').remove(); return false;" title="<?php echo $remove_slider; ?>"></a>';
		nav += '</li>';

		// SETTINGS
		new_slider  = '<div id="slider_cnontent_'+ slider_block +'">';
		new_slider +=  	add_item(slider_block); // Function create new item
		new_slider += 	'<a class="add_slide" data-slider="'+ slider_block +'" ><?php echo $text_add_slide; ?></a>';
		new_slider += '</div>';

		new_slider += '<div id="slider_settings_'+ slider_block +'" class="slide_row">';
		new_slider += '<input type="hidden" name="apslider_module['+ slider_block +'][slider_id]" value="'+ slider_block +'">';

		// BASIC SETTINGS
		new_slider += 	'<table>';
		new_slider += 		'<tr> <th><?php echo $text_basic_settings; ?></th> </tr>';
		new_slider +=  		'<tr>';
		new_slider +=			'<td> <?php echo $text_slider_size; ?><br> <sup><?php echo $text_w_h; ?></sup> </td>';
		new_slider +=			'<td> <?php echo $text_positon; ?>		 </td>';
		new_slider +=			'<td> <?php echo $text_layout; ?>		 </td>';
		new_slider +=			'<td> <?php echo $text_slider_status; ?> </td>';				
		new_slider +=			'<td> <?php echo $text_sort_order; ?>	 </td>';					
		new_slider +=		'</tr>';	
		new_slider +=		'<tr>';
		new_slider +=			'<td>';		
		new_slider +=				'<input name="apslider_module['+ slider_block +'][width]"  type="text" size="4"> x ';				
		new_slider +=				'<input name="apslider_module['+ slider_block +'][height]" type="text" size="4">';		
		new_slider +=			'</td>';
		new_slider +=			'<td>';		
		new_slider +=				'<select name="apslider_module['+ slider_block +'][position]">';	
		new_slider +=					'<option value="content_top">    <?php echo $text_content_top;    ?> </option>';
		new_slider +=					'<option value="content_bottom"> <?php echo $text_content_bottom; ?> </option>';		
		new_slider +=					'<option value="column_left">    <?php echo $text_column_left;    ?> </option>';
		new_slider +=					'<option value="column_right">   <?php echo $text_column_right;   ?> </option>';
		new_slider +=				'</select>';
		new_slider +=			'</td>';
		new_slider +=			'<td>';
		new_slider +=				'<select name="apslider_module['+ slider_block +'][layout_id]">';
										<?php foreach ($layouts as $layout) { ?>
		new_slider += 					'<option value="<?php echo $layout["layout_id"]; ?>"><?php echo $layout["name"]; ?></option>';
										<?php } ?>
		new_slider += 				'</select>';
		new_slider += 			'</td>';
		new_slider += 			'<td class="radio">';
		new_slider += 				'<span>';
		new_slider += 					'<input checked="checked" value="1" name="apslider_module['+ slider_block +'][status]" id="status_on_'+ slider_block +'" type="radio">';
		new_slider += 					'<label for="status_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider += 				'</span>';
		new_slider += 				'<span>';
		new_slider += 					'<input value="0" name="apslider_module['+ slider_block +'][status]" id="status_off_'+ slider_block +'" type="radio">';
		new_slider += 					'<label for="status_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider += 				'</span>';
		new_slider += 			'</td>';
		new_slider += 			'<td> <input name="apslider_module['+ slider_block +'][sort_order]" type="text" size="3"> </td>';
		new_slider += 		'</tr>';
		new_slider += 	'</table>';

		// HEIGHT AND PARALLAX SLIDER
		new_slider +=	'<table>';
		new_slider +=		'<tr>';
		new_slider +=			'<th>';
		new_slider +=				'<?php echo $text_slider_parallax; ?>';
		new_slider +=				'<sup> <a class="tooltip" href="#" title="<?php echo $text_no_setup_required; ?>"> <?php echo $text_optional; ?> </a></sup>';
		new_slider +=			'</th>';
		new_slider +=		'</tr>';
		new_slider +=		'<tr>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 1200px</td>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 992px </td>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 768px </td>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 560px </td>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 450px </td>';
		new_slider +=			'<td><?php echo $text_desktop_size; ?> ≥ 320px </td>';
		new_slider +=		'</tr>';			
		new_slider +=		'<tr>';
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_1200]" value=""> </td>';
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_992]"  value=""> </td>';
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_768]"  value=""> </td>';
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_560]"  value=""> </td>';		
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_450]"  value=""> </td>';
		new_slider +=			'<td> <input type="number" name="apslider_module['+ slider_block +'][max_320]"  value=""> </td>';
		new_slider +=		'</tr>';
		new_slider +=	'</table>';

		// BOX SLIDER SETTINGS 
		new_slider += 		'<table>';
		new_slider +=			'<tr>';
		new_slider +=				'<th colspan="6"><?php echo $text_sr_settings; ?></th>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td class="parallax"><?php echo $text_parallax; ?></td>';
		new_slider +=				'<td class="parallax"><?php echo $text_speed_parallax; ?></td>';
		new_slider +=				'<td><?php echo $text_type; ?></td>';
		new_slider +=				'<td><?php echo $text_timeout; ?> <br> <sup><?php echo $text_second; ?></sup> </td>';
		new_slider +=				'<td><?php echo $text_autoplay;?>   </td>';
		new_slider +=				'<td><?php echo $text_lazy_load; ?> </td>';
		new_slider +=			'</tr>';
		new_slider +=        	'<tr>';
		new_slider += 				'<td class="radio parallax">';
		new_slider +=				'<span>';
		new_slider +=					'<input value="1" name="apslider_module['+ slider_block +'][parallax]" id="parallax_on_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="parallax_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=				'</span>';
		new_slider +=				'<span>';
		new_slider +=					'<input checked="checked" value="0" name="apslider_module['+ slider_block +'][parallax]" id="parallax_off_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="parallax_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=				'</span>';
		new_slider +=			'</td>';
		new_slider +=			'<td class="parallax">';
		new_slider +=				'<input type="number" value="5" name="apslider_module['+ slider_block +'][parallax_speed]">';
		new_slider +=			'</td>';					
		new_slider +=			'<td>';
		new_slider +=			'<select name="apslider_module['+ slider_block +'][animation]">';
									<?php foreach ($animations as $animation) { ?>
		new_slider +=				'<option value="<?php echo $animation; ?>" <?php echo ($animation == "fade") ? "selected" : ""; ?>><?php echo $animation; ?></option>';
									<?php } ?>
		new_slider +=			'</select>';
		new_slider +=			'</td>';
		new_slider +=			'<td>';
		new_slider +=				'<input value="25" name="apslider_module['+ slider_block +'][timeout]"  type="number">';
		new_slider +=			'</td>';
		new_slider +=			'<td class="radio">';
		new_slider +=				'<span>';
		new_slider +=					'<input value="1" name="apslider_module['+ slider_block +'][auto_play]" id="play_on_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="play_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=				'</span>';
		new_slider +=				'<span>';
		new_slider +=					'<input checked="checked"  value="0" name="apslider_module['+ slider_block +'][auto_play]" id="play_off_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="play_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=				'</span>';
		new_slider +=			'</td>';
		new_slider +=			'<td class="radio">';
		new_slider +=				'<span>';
		new_slider +=					'<input checked="checked" value="1" name="apslider_module['+ slider_block +'][lazy_load]" id="lazy_on_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="lazy_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=				'</span>';
		new_slider +=				'<span>';
		new_slider +=					'<input value="0" name="apslider_module['+ slider_block +'][lazy_load]" id="lazy_off_'+ slider_block +'" type="radio">';
		new_slider +=					'<label for="lazy_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=				'</span>';
		new_slider +=			'</td>';
		new_slider +=			'</tr>';
		new_slider +=		'</table>';

		// NAVIGATION SETTINGS
		new_slider += 		'<table>';
		new_slider +=			'<tr> <th> <?php echo $text_nav; ?> </th> </tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td><?php echo $text_arrow; ?>         </td>';
		new_slider +=				'<td><?php echo $text_point; ?>         </td>';
		new_slider +=				'<td><?php echo $text_position_point; ?></td>';
		new_slider +=				'<td><?php echo $text_color_point; ?>   </td>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td class="radio">';
		new_slider +=					'<span>';
		new_slider +=						'<input checked="checked" value="1" name="apslider_module['+ slider_block +'][arrow]" id="arrow_on_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="arrow_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=					'</span>';
		new_slider +=					'<span>';
		new_slider +=						'<input value="0" name="apslider_module['+ slider_block +'][arrow]" id="arrow_off_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="arrow_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=					'</span>';
		new_slider +=				'</td>';
		new_slider +=				'<td class="radio">';
		new_slider +=					'<span>';
		new_slider +=						'<input value="1" name="apslider_module['+ slider_block +'][point]" id="dot_on_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="dot_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=					'</span>';
		new_slider +=					'<span>';
		new_slider +=						'<input checked="checked" value="0" name="apslider_module['+ slider_block +'][point]" id="dot_off_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="dot_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=					'</span>';
		new_slider +=				'</td>';					
		new_slider +=				'<td>';
		new_slider +=					'<select name="apslider_module['+ slider_block +'][point_possition]">';
		new_slider +=						'<option value="left">            <?php echo $text_align_left;  ?> </option>';
		new_slider +=						'<option value="center" selected> <?php echo $text_align_center;?> </option>';
		new_slider +=						'<option value="right">           <?php echo $text_align_right; ?> </option>';
		new_slider +=					'</select>';
		new_slider +=				'</td>';
		new_slider +=				'<td> <input name="apslider_module['+ slider_block +'][point_color]" type="text" class="color" value="#EEEEEE"> </td>';
		new_slider +=			'</tr>';
		new_slider +=		'</table>';

		// SETTING PROGRESS BAR
		new_slider += 		'<table>';
		new_slider +=			'<tr>';
		new_slider +=				'<th> <?php echo $text_settings_bar; ?> </th>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td> <?php echo $text_bar; ?> </td>';
		new_slider +=				'<td> <?php echo $text_position_bar; ?></td>';
		new_slider +=				'<td> <?php echo $text_substrate_color; ?></td>';
		new_slider +=				'<td> <?php echo $text_progress_color; ?></td>';
		new_slider +=				'<td> <?php echo $text_thickness;?></td>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td class="radio">';
		new_slider +=					'<span>';
		new_slider +=						'<input value="1" name="apslider_module['+ slider_block +'][progress]" id="progress_on_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="progress_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=					'</span>';
		new_slider +=					'<span>';
		new_slider +=						'<input checked="checked" value="0" name="apslider_module['+ slider_block +'][progress]" id="progress_off_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="progress_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=					'</span>';
		new_slider +=				'</td>';
		new_slider +=				'<td>';
		new_slider +=					'<select name="apslider_module['+ slider_block +'][progress_pos]">';
		new_slider +=						'<option value="top">';  
		new_slider +=							'<?php echo $text_top_progress; ?>';
		new_slider +=						'</option>';
		new_slider +=						'<option value="bottom" selected>'; 
		new_slider +=							'<?php echo $text_bottom_progress; ?>';
		new_slider +=						'</option>';
		new_slider +=					'</select>';
		new_slider +=				'</td>';
		new_slider +=				'<td><input value="#EEEEEE" name="apslider_module['+ slider_block +'][progress_bg]" class="color" type="text"></td>';
		new_slider +=				'<td><input value="#CCCCCC" name="apslider_module['+ slider_block +'][progress_status]" class="color" type="text"></td>';
		new_slider +=				'<td><input type="number"   name="apslider_module['+ slider_block +'][line_height]" value="4"> </td>';
		new_slider +=			'</tr>';
		new_slider +=		'</table>'; 

		// SETTING FULL SCREEN MODE
		new_slider +=		'<table>';
		new_slider +=			'<tr>';
		new_slider +=				'<th><?php echo $text_full_settings; ?></th>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td><?php echo $text_full; ?></td>';
		new_slider +=				'<td><?php echo $text_selector; ?><br> <sup><?php echo $text_element; ?></sup></td>';
		new_slider +=				'<td><?php echo $text_substrate; ?></td>';
		new_slider +=				'<td><?php echo $text_margin;?>  <br> <sup><?php echo $text_t_b; ?></sup></td>';
		new_slider +=			'</tr>';
		new_slider +=			'<tr>';
		new_slider +=				'<td class="radio">';
		new_slider +=					'<span>';
		new_slider +=						'<input value="1" name="apslider_module['+ slider_block +'][full]" id="full_on_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="full_on_'+ slider_block +'"><?php echo $text_on; ?></label>';
		new_slider +=					'</span>';
		new_slider +=					'<span>';
		new_slider +=						'<input checked="checked" value="0" name="apslider_module['+ slider_block +'][full]" id="full_off_'+ slider_block +'" type="radio">';
		new_slider +=						'<label for="full_off_'+ slider_block +'"><?php echo $text_off; ?></label>';
		new_slider +=					'</span>';
		new_slider +=				'</td>';
		new_slider +=				'<td><input type="text" value="" name="apslider_module['+ slider_block +'][selector]"></td>';
		new_slider +=				'<td>'; 
		new_slider += 					'<select name="apslider_module['+ slider_block +'][substrate]">';
		new_slider +=						'<option selected value="1"><?php echo $text_add_substrate; ?></option>';
		new_slider +=						'<option value="0"><?php echo $text_not_substrate; ?></option>';		
		new_slider +=					'</select>';
		new_slider += 				'</td>';
		new_slider +=				'<td>';
		new_slider +=					'<input size="4" type="text" name="apslider_module['+ slider_block +'][margin_top]" value=""> x ';
		new_slider +=					'<input size="4" type="text" name="apslider_module['+ slider_block +'][margin_bottom]" value="">';
		new_slider +=				'</td>';
		new_slider +=			'</tr>';
		new_slider +=		'</table>';

		new_slider += '</div>';

		right.append(new_slider);
		navbar.append(nav);

		slider_block++;

		jsColorPicker('input.color', { size:2 });
		$('a.tooltip').tooltip();
		$('nav li a').slider_tabs(menu_id);

	}


	// Function Create new item
	$(document).on('click', '.add_slide',  function (){

		var slider_id = $(this).data('slider'),
		item = $('#slider_cnontent_'+ slider_id +' .add_slide');

		if (item.length > 0){
			item.before(add_item(slider_id));
		} else {
			$('#slider_cnontent_'+ slider_id +'').append(add_item(slider_id));
		}

		jsColorPicker('input.color', { size:2 });

	});


	/*
	** Tabs plugin
	** Accepted ID new create tabs
	** Gets ID for the tab clicks 
	*/	

	$.fn.slider_tabs = function(click_tab) {

		var tabs = this;

		tabs.each(function () {
			var id = $(this).attr('href');

			$(id).hide();
			$(this).on('click', function(){

				visivle_box = $(id).filter(':visible').attr('id');

				tabs.each(function(){
					var box = $(this).attr('href');

					if (box != '#'+visivle_box){ $(box).hide(); }
					$(this).removeClass('active');
				});

				$(this).addClass('active');

				var show_block = $(this).attr('href');
				$(show_block).show();

				return false;
			});	
		});

		if (click_tab) {
			$('#'+click_tab).click();
		} else {
			tabs.first().click();
		}
		
	}

	// DELETE WARNING IN 2500ms 
	$(function(){ 
	var warn = $('#apslider .warning');
	if(warn.length > 0){
		setTimeout(
			function() {
				warn.slideUp("slow");
			}, 2500
		);
	}
	});


	/* 
	** Tooltip plugin
	** Create dynamic tooltip from title
	*/

	$.fn.tooltip = function() {

		var tooltip = this;

		tooltip.mouseover ( function() {

			var title = $.data(this, 'title', $(this).attr('title'));

			$(this).removeAttr('title');

			html  = '<div id="tooltip"><i></i>'  + title + '</div>';
			$('body').append(html);
		})

		.mousemove( function (mouse) { 
			$('#tooltip').css({'left':mouse.pageX+25 , 'top':mouse.pageY-10});
		})

		.mouseout(  function() {
			$(this).attr('title', $.data(this, 'title'));
			$('#tooltip').remove();
		});

	};

	// Сall the plugins

	$('a.tooltip').tooltip();
	$('nav li a').slider_tabs();

	// Fixed menu

	var fixed = $('.box-left').offset().top;

	$(window).scroll(function () {
		var pos   = $(this).scrollTop();
		if (pos >= fixed ){
			$('.box-left').css({'position' : 'relative', 'top' : (pos + 15) - fixed  });
		} else {
			$('.box-left').attr('style', '');
		}
	});

	/*
	** Ajax saving 
	** Return saving status 
	*/

	function apply() {

		$.ajax({
			type: 'POST',
			url:  $('#form').attr('action'),
			data: $('#form').serialize(),
			dataType: 'text',
			success: function(data) {

				if($(data).find('.error').length > 0) {
					$("#form").submit();
				} else {
					$('.success,.warning').remove();
					$(data).find('.success,.warning').clone().appendTo('#apslider');
					setTimeout(
						function() {
							$('.success,.warning').slideUp("slow");
						}, 2500);
				}	

			}
		});
	}

	$('body').on('click', '.delate', function() { $('.name').last().click(); });
	$('#footer a').before('<?php echo $text_creator; ?>');

</script>
