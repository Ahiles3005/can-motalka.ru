<style>
.widget_account_icons_links
{
	padding-left: 5px;
	padding-right: 5px;
	padding-top: 15px;
	float: left;
}
</style>
<div class="box">
  <div class="box-heading"><?php echo $heading_title; ?></div>
  <div class="box-content">
      <?php if (!$logged) { ?>
	<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	<table>
		<tr>
			<td><?php echo $entry_email; ?></td>
		</tr>
		<tr>
			<td><input type="text" name="email" value=""></td>
		</tr>
		<tr>
			<td><?php echo $entry_password; ?></td>
		</tr>
		<tr>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="<?php echo $text_login; ?>" class="button" />
			</td>
		</tr>
	</table>
	
	
<?php if( $socnetauth2_widget_format == 'kvadrat' ) { ?>
<br>
<div class="content widget_account_socnetauth_kvadrat_content">		
		<div class="widget_account_kvadrat_right">
		
		<?php if( $count_socnets <= 2  ) { ?>
		<table>
			<tr>
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[0]) ) { 
				?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[0]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[0]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[1]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[1]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[1]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
		</table>
		<?php } elseif( $count_socnets <= 4  ) {?>
		<table>
			<tr>
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[0]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[0]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[0]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[1]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[1]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[1]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
			<tr>
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[2]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[2]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[2]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[3]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[3]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[3]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
		</table>
		<?php } elseif( $count_socnets <= 6  ) {?>
		<table>
			<tr>
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[0]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[0]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[0]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[1]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[1]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[1]['short']; ?>45.png"></a><?php } ?></td>
			
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[2]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[2]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[2]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
			<tr>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[3]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[3]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[3]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[4]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[4]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[4]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[5]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[5]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[5]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
		</table>
		<?php } else {?>
		<table>
			<tr>
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[0]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[0]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[0]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[1]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[1]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[1]['short']; ?>45.png"></a><?php } ?></td>
			
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[2]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[2]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[2]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[3]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[3]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[3]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
			<tr>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[4]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[4]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[4]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[5]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[5]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[5]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[6]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[6]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[6]['short']; ?>45.png"></a><?php } ?></td>
				
				<td style="padding: 5px;"><?php if( !empty($socnetauth2_socnets[7]) ) { ?><a class="socnetauth2_buttons" 
				href="<?php echo $socnetauth2_socnets[7]['link']; ?>"
				><img src="/socnetauth2/icons/<?php echo $socnetauth2_socnets[7]['short']; ?>45.png"></a><?php } ?></td>
			</tr>
		</table>
		<?php } ?>
		
		
		</div>
</div>			
<? } ?>		
<? if( $socnetauth2_widget_format == 'lline' ) { ?>  
		<div class="widget_account_lline_links" style="text-align: center; padding-top: 10px;">
		
				<?php foreach( $socnetauth2_socnets as $socnet) { ?>
				<a class="socnetauth2_buttons" 
				href="<?php echo $socnet['link']; ?>"
				><img src="<?php echo $socnetauth2_shop_folder; 
				?>/socnetauth2/icons/<?php echo $socnet['short']; ?>16.png"></a>
				<?php } ?>
		</div>		  
<? } ?>	
<? if( $socnetauth2_widget_format == 'bline' ) { ?>  
		<div class="widget_account_bline_links" style="text-align: center; padding-top: 10px;">
				<?php foreach( $socnetauth2_socnets as $socnet) { ?>
				<a class="socnetauth2_buttons" 
				href="<?php echo $socnet['link']; ?>"
				><img src="<?php echo $socnetauth2_shop_folder; 
				?>/socnetauth2/icons/<?php echo $socnet['short']; ?>45.png"></a>
				<?php } ?>
		</div>		  
<? } ?>	
	</form>
    <ul>
      <li><a href="<?php echo $login; ?>"><?php echo $text_login; ?></a> / <a href="<?php echo $register; ?>"><?php echo $text_register; ?></a></li>
      <li><a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a></li>
    </ul>
    <?php } ?>
    
	<?php if ($logged) { ?>
    <ul>
      <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
      <li><a href="<?php echo $edit; ?>"><?php echo $text_edit; ?></a></li>
      <li><a href="<?php echo $password; ?>"><?php echo $text_password; ?></a></li>
      <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
      <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
      <li><a href="<?php echo $download; ?>"><?php echo $text_download; ?></a></li>
      <li><a href="<?php echo $return; ?>"><?php echo $text_return; ?></a></li>
      <li><a href="<?php echo $transaction; ?>"><?php echo $text_transaction; ?></a></li>
      <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
      <li><a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a></li>
    </ul>
    <?php } ?>
  </div>
</div>