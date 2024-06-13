function getURLVar(key) {
	var value = [];
	
	var query = String(document.location).split('?');
	
	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			
			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}
		
		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
		setTimeout(function(){$('.success, .attention').fadeOut('slow')},4000);
	}
	
$(".open-landing-modal").click(function(){$('#landing-modal-overlay').fadeIn(300);var iddiv=$(this).attr("data-modal");$('#'+iddiv).css({'transform':'translatex(0)'});$('.close-landing-modal').fadeIn('slow');$('html').addClass('overflow');$('#landing-modal-overlay').attr('data-overlay',iddiv);return false});$('#landing-modal-overlay, .close-landing-modal').click(function(){var iddiv=$("#landing-modal-overlay").attr('data-overlay');$('#landing-modal-overlay').delay(300).fadeOut(300);$('#'+iddiv).css({'transform':'translatex(-100%)'});$('.close-landing-modal').fadeOut('fast');$('html').removeClass('overflow')});
$(".open-cache-modal").click(function(){$('#cache-modal-overlay').fadeIn(300);var iddiv=$(this).attr("data-modal");$('#'+iddiv).css({'transform':'scale(1)','opacity':'1'});$('#cache-modal-overlay').attr('data-overlay',iddiv);return false});$('#cache-modal-overlay, .close-cache-modal').click(function(){var iddiv=$("#cache-modal-overlay").attr('data-overlay');$('#cache-modal-overlay').delay(300).fadeOut(300);$('#'+iddiv).css({'transform':'scale(0)','opacity':'0'})});
});