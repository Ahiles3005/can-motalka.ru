
<form method="post" action="<?php echo $action; ?>" id="wform" >

			<?php foreach($PARAMS as $key=>$val) { ?>
			
            <?php if( $is_log ) { echo $key; } ?> <input <?php if( $is_log ) { ?> type="text" <?php } else { ?> type="hidden" <?php } ?> name="<?php echo $key; ?>" value="<?php echo $val; ?>"/><?php if( $is_log ) { echo "<br>"; } ?>
			<?php } ?>
			
<?php if( $is_log ) { ?>
<hr>
Параметры для формирования чека (Receipt)<br>
<?php echo $Receipt_text; ?>
<?php } ?>


			<?php if( $is_log ) { echo '<hr>Чтобы автоматически работал переход в оплату, отключите "Режим отладки" в настройках модуля Робокасса 20 способов'; } ?>
</form>

<?php if( !$is_log ) { ?>
<script>
document.getElementById('wform').submit();
</script>
<?php } else { ?>
<input type="button" value="Перейти к оплате" onclick="document.getElementById('wform').submit();">
<?php } ?>