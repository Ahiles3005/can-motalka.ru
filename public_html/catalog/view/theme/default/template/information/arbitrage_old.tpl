<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="catalog/view/theme/default/stylesheet/info-pages.css" />
</div>
<div class="rast-heading" style="background-image:url('/image/data/otzyvy-bg.jpg')"><h1><?php echo $heading_title; ?></h1></div>
<div class="otzyvy-bg">
<div class="breadcrumb" id="arbitrage">
<div>
<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
<?php echo $breadcrumb['separator']; ?><?php if($i+1<count($breadcrumbs)) { ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> <?php } else { ?><?php echo $breadcrumb['text']; ?><?php } ?>
<?php } ?>
</div>
</div>
<div class="wrapper">
<div id="content" class="otzyvy-content"><?php echo $content_top; ?>
<div class="feedback-arbitrage">
<div class="arb-content">
<h2><?php echo $text_write; ?></h2>
<input type="text" name="author_feedback_arbitrage" value="" placeholder="<?php echo $entry_author; ?>" />
<textarea name="description_feedback_arbitrage" placeholder="<?php echo $entry_description; ?>"></textarea>
<div class="arb-rating">
<span class="stars"><?php echo $entry_rating; ?></span>
<div id="rating-updated" class="icon-large-stars-0">
<input type="radio" name="rating_feedback_arbitrage" value="1" class="rating-hide" />
<input type="radio" name="rating_feedback_arbitrage" value="2" class="rating-hide" />
<input type="radio" name="rating_feedback_arbitrage" value="3" class="rating-hide" />
<input type="radio" name="rating_feedback_arbitrage" value="4" class="rating-hide" />
<input type="radio" name="rating_feedback_arbitrage" value="5" class="rating-hide" />
</div>
</div>
<div class="captcha">
<input type="text" name="captcha_feedback_arbitrage" value="" placeholder="<?php echo $entry_captcha; ?>" />
<img src="index.php?route=information/arbitrage/captcha&id=<?php echo $rand; ?>" alt="captcha" />
</div>
<a class="button-feedback-arbitrage button" data-wait="<?php echo $text_wait; ?>"><?php echo $button_send; ?></a>
</div>
</div>	
<div class="arbitrage"></div>
<?php echo $content_bottom; ?>
</div>
</div>
<?php echo $footer; ?>
<script>
    jQuery('.rating-hide').hover(
            function(){
                var stars = jQuery(this).val();
                jQuery('#rating-updated').attr('class','icon-large-stars-'+ stars);
            },
            function(){
                var start = jQuery('input:radio[name=rating_feedback_arbitrage]:checked').val()
                if(typeof  start == 'undefined' ){start = 0; }
                    jQuery('#rating-updated').attr('class','icon-large-stars-'+ start)
            })
    jQuery('.rating-hide').click(function(){
        jQuery('.rating-hide').each(function(){
            jQuery(this).attr( 'checked', false )
        });
        jQuery(this).attr( 'checked', true );
    });
</script>	
<script>
$(window).scroll(function(e){$el=$('.feedback-arbitrage');if($(this).scrollTop()>780){$('.feedback-arbitrage').addClass('inactive')}if($(this).scrollTop()<620){$('.feedback-arbitrage').removeClass('inactive')}});
</script>	