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
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <label for="prstKey">Ключ доступа:</label><br>
        <input type="text" name="prstKey" id="prstKey" size="80" value="<?=$setting['prstKey']?>"/>
        <br>
        <br>

       <?/**/?>

        <label for="prstMsg">Текст сообщения о заказе:</label><br>
        <textarea name="prstMsg" id="prstMsg" cols="80" rows="12"><?=$setting['prstMsg']?></textarea>
        <div>#USERNAME#, #PHONE#, #ORDER_NUM#</div>
          <hr>

          <h3>Подтверждения заказа</h3>
          <label for="sendConfirmCode">Отправлять код подтверждения заказа:</label>
          <input type="checkbox" name="sendConfirmCode" id="sendConfirmCode" size="80" value="1" <?=$setting['sendConfirmCode']==1 ? 'checked' : '' ?> />
          <br>
          <label for="sendConfirmCodeEmail">Почта куда отправлять уведомление о подтверждение заказа:</label><br>
          <input type="text" name="sendConfirmCodeEmail" id="sendConfirmCodeEmail" size="80" value="<?=$setting['sendConfirmCodeEmail']?>"/>
          <hr>
      </form>
        <h3>Тестовое сообщение</h3>
          <div data-action="<?=$testLink?>" data-method="post" data-enctype="multipart/form-data" id="prstTestSmsForm">
              <label for="prstTel">Номер телефона:</label><br>
              <input type="text" name="prstTel" id="prstTel" size="80" value="">
              <br>
              <br>
          </div>
          <a href="#" class="button" id="prstTestSmsBtn">Отправить СМС</a>
      </div>



  </div>
    <script>

        $('#prstTestSmsBtn').on("click", function(e){
            e.preventDefault();
            var $form = $('#prstTestSmsForm');
            $.ajax({
                url: $form.data("action"),
                type: $form.data("method"),
                data: {
                    "prstTel" : $("#prstTel").val()
                },
                success: function(res){
                    console.log(res);
                }
            });
            // $('#prstTestSmsForm').submit
        });
    </script>

  <?php echo $footer; ?>