<?php
		$VERSION = VERSION;
		$VERSION = str_replace(".", "", $VERSION);
		
		if( strlen($VERSION) == 3 )
		{
			$VERSION .= '0';
		}
		elseif( strlen($VERSION) > 4 )
		{
			$VERSION = substr($VERSION, 0, 4);
		}
		
		if( !empty($this->request->get['socnetauth2close']) )
		{
			$this->session->data['socnetauth2_confirmdata_show'] = 0;
		}
 ?>
<?php echo $header; ?><?php if( $VERSION >= 1520 ) { ?>
</div>		
<div class="rast-heading">
<div class="breadcrumb">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div class="h1"><h1><?php echo $heading_title; ?></h1></div></div>	
<div class="wrapper">
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php } ?>
<?php	
/* start socnetauth2 */
	if( $this->config->get('socnetauth2_status') )
	{
		if( !$this->customer->isLogged() ) 
		{			
			$http = 'http://';
			if( ( isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ) || 
			!empty($_SERVER['HTTPS']) )
			{
				$http = 'https://';
			}
	
			$this->session->data['socnetauth2_lastlink'] = $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$this->session->data['socnetauth2_lastlink'] = str_replace("checkout/login", "checkout/checkout", $this->session->data['socnetauth2_lastlink']);

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
	
				$socnetauth2_confirm_block = str_replace("#frame_url#", $this->url->link( 'account/socnetauth2/frame', '', 'SSL' ), $socnetauth2_confirm_block);
	
				echo $socnetauth2_confirm_block;
			}
			
			/* start 2105 */
			$socnetauth2_code = unserialize( $this->config->get('socnetauth2_account_code_'.$this->config->get('socnetauth2_account_format')) );
			$socnetauth2_code = html_entity_decode($socnetauth2_code[ $this->config->get("config_language_id") ]);
			
			$socnetauth2_shop_folder = '';
			if( $this->config->get('socnetauth2_shop_folder') )
				$socnetauth2_shop_folder = '/'.$this->config->get('socnetauth2_shop_folder');
			
			$redirect_url = $http.$_SERVER['HTTP_HOST'].$socnetauth2_shop_folder.'/socnetauth2/loginza.php';
			$redirect_url = urlencode($redirect_url);
			
			$socnetauth2_code = str_replace("#redirect_url#", $redirect_url, $socnetauth2_code);
			/* end 2105 */
			 
			$socnetauth2_label = '';
			
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
								'<div class="account_socnetauth2_'.$this->config->get('socnetauth2_account_format').'_header">'.$socnetauth2_label[ $this->config->get('config_language_id') ]."</div>", 
								$socnetauth2_code );
			}
			else
			{
				$socnetauth2_code = str_replace("#socnetauth2_label#", "", $socnetauth2_code );
			}
			
			$SOCNETAUTH2_CODE = $socnetauth2_code;
		} 
	}
/* end socnetauth2 */ ?>
<div id="content" class="no-bg"><?php echo $content_top; ?>
  <?php if( $VERSION <= 1513 ) { ?>
  <?php if ($success) { ?>
  <div class="success"><?php echo $success; ?></div>
  <?php } ?>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php } ?>
  <div class="login-content">
    <div class="left">
	<h2><?php echo $text_register; ?></h2>
      <h3><?php echo $text_new_customer; ?></h3>
        <p><?php echo $text_register_account; ?></p>
		<?php if( $VERSION >= 1520 ) { ?>
        <a href="<?php echo $register; ?>" class="btns c-button"><?php echo $text_register; ?></a>
		<?php } else { ?>
        <a href="<?php echo $register; ?>" class="btns c-button"><span><?php echo $text_register; ?></span></a></div>
		<?php } ?>
    </div>
    <div class="right">
      <h2><?php echo $text_returning_customer; ?></h2>
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" <?php if( $VERSION <= 1513 ) { ?>id="login" <?php } ?>>	
		
<? /* start socnetauth2 code */ ?>
<?php if( $this->config->get('socnetauth2_status') && 
		  $this->config->get('socnetauth2_account_format')=='kvadrat' ) { ?>
		<table>
		<tr>
		<td>
<?php } ?>
<? /* end socnetauth2 code */ ?> 

          <div class="mail"><input type="text" name="email" value="<?php if( $VERSION >= 1530 ) echo $email; ?>" placeholder="<?php echo $entry_email; ?>" /></div>
          <div class="pass"><input type="password" name="password" value="<?php if( $VERSION >= 1530 ) echo $password; ?>" placeholder="<?php echo $entry_password; ?>" /></div>
          
		  <?php if( $VERSION >= 1520 ) { ?>
          <input type="submit" value="<?php echo $button_login; ?>" class="btns c-button" />
		  <?php } else { ?>
          <a onclick="$('#login').submit();" class="btns c-button"><span><?php echo $button_login; ?></span></a>
		  <?php } ?>
		  <a href="<?php echo $forgotten; ?>" class="forgotten"><?php echo $text_forgotten; ?></a>
          <?php if ($redirect) { ?>
          <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
          <?php } ?>
		  
		  
<? /* start socnetauth code */ ?>			
<?php if( $this->config->get('socnetauth2_status') && 
		  $this->config->get('socnetauth2_account_format')=='kvadrat' ) { ?>

		  </td>
		  <td>
				<?php echo $SOCNETAUTH2_CODE; ?>
		  </td>
		   </tr>
		</table>
<?php } ?>
<? /* end socnetauth2 code */ ?>
		
		
<? /* start socnetauth2 code */ ?>
<?php if( $this->config->get('socnetauth2_status') && 
		  ($this->config->get('socnetauth2_account_format')=='bline' || 
		   $this->config->get('socnetauth2_account_format')=='lline'
		  ) ) { ?>
		  
		  <?php echo $SOCNETAUTH2_CODE; ?>
		  
<?php } ?>
<? /* end socnetauth2 code */ ?> 
		
      </form>
	  
    </div>
  </div>
  <?php echo $content_bottom; ?></div>
<script type="text/javascript"><!--
$('#login input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#login').submit();
	}
});
//--></script>   
<?php echo $footer; ?>