//tabs
$.fn.tabs=function(){var selector=this;this.each(function(){var obj=$(this);$(obj.attr('href')).hide();obj.click(function(){$(selector).removeClass('selected');$(this).addClass('selected');$($(this).attr('href')).fadeIn();$(selector).not(this).each(function(i,element){$($(element).attr('href')).hide()});return false})});$(this).show();$(this).first().click()};
//end-tabs
//pretty-photo
$(document).ready(function(){$("a[data-gal^='prettyPhoto']").prettyPhoto({animation_speed:'fast',autoplay_slideshow:false,deeplinking:false,social_tools:false,opacity:0.95,show_title:false,allow_resize:true,allow_expand:false,theme:'light_rounded',modal:false})});
//end-pretty-photo