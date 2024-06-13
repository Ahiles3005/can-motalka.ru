$(document).ready(function () {
	$('.catapulta-send').live('click', function () {
		var wait = $(this).data('wait');
		$.ajax({
			url: 'index.php?route=module/catapulta/write',
			type: 'post',
			dataType: 'json',
			data: 'contact='+encodeURIComponent($('input[name=\'catapulta_contact\']').val())+'&product_id='+$('input[name=\'product_id\']').val(),
			beforeSend: function () {
				$('.success, .attention').remove();
				$(this).attr('disabled', true);
				$('.catapulta-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" />'+wait+'</div>');

				$.colorbox.resize();
			},
			complete: function () {
				$(this).attr('disabled', false);
				$('.attention').remove();

				$.colorbox.resize();
			},
			success: function (data) {
				if (data['error']) {
					$('.catapulta .error').remove();
					$('.catapulta input[type="text"]').addClass('tel-error');

					if (data['error']['contact']) {
						$('.catapulta .contact_error').after('<span class="error">'+data['error']['contact']+'</span>');
					}
				}

				if (data['success']) {
					$('.catapulta').after(data['success']);
					//$('.catapulta').remove();
				}

				$.colorbox.resize();
			}
		});
	});
$("#cboxOverlay, #colorbox").on("mousewheel DOMMouseScroll",function(l){var e=l.originalEvent,o=e.wheelDelta||-e.detail;this.scrollTop+=30*(0>o?1:-1),l.preventDefault()});
$(".c-catapulta").click(function(){$('#colorbox').addClass('cat-box')});
});

function addToCatapulta() {
	$.colorbox({
		scrolling: false,
		fixed: true,
		overlayClose: true,
		opacity: 0.7,
		href: 'index.php?route=module/catapulta/getForm',
		data: 'product_id='+$('input[name=\'product_id\']').val(),
		onComplete: function () {
			var phone_mask = $('input[name=\'catapulta_contact\']').data('phoneMask');

			if (phone_mask) {
				$('input[name=\'catapulta_contact\']').mask(phone_mask);
			}
		}
	});
}