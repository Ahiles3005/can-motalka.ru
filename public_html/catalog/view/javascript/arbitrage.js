$(document).ready(function () {
	$('.arbitrage').load('index.php?route=information/arbitrage/getArbitrages');

	$('.arbitrage .pagination a').live('click', function () {
		$('.arbitrage').fadeOut('slow');

		$('.arbitrage').load(this.href);

		$('.arbitrage').fadeIn('slow');

		return false;
	});

	$('.button-feedback-arbitrage').live('click', function () {
		var wait = $(this).data('wait');
		$.ajax({
			url: 'index.php?route=information/arbitrage/write',
			type: 'post',
			dataType: 'json',
			data: '&author='+encodeURIComponent($('input[name=\'author_feedback_arbitrage\']').val())+'&description='+encodeURIComponent($('textarea[name=\'description_feedback_arbitrage\']').val())+'&rating='+encodeURIComponent($('input[name=\'rating_feedback_arbitrage\']:checked').val() ? $('input[name=\'rating_feedback_arbitrage\']:checked').val() : '')+'&captcha='+encodeURIComponent($('input[name=\'captcha_feedback_arbitrage\']').val()),
			beforeSend: function () {
				$('.success, .attention').remove();
				$(this).attr('disabled', true);
				$('.feedback-title-arbitrage').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" />'+wait+'</div>');

			},
			complete: function () {
				$(this).attr('disabled', false);
				$('.attention').remove();
			},
			success: function (data) {
				if (data['error']) {
					$('.feedback-arbitrage .error').remove();

					if (data['error']['author']) {
						$('.author_feedback_arbitrage').after('<span class="error">'+data['error']['author']+'</span>');
					}

					if (data['error']['description']) {
						$('.description_feedback_arbitrage').after('<span class="error">'+data['error']['description']+'</span>');
					}

					if (data['error']['rating']) {
						$('.rating_feedback_arbitrage').after('<span class="error">'+data['error']['rating']+'</span>');
					}

					if (data['error']['captcha']) {
						$('.captcha_feedback_arbitrage').after('<span class="error">'+data['error']['captcha']+'</span>');
					}
				}

				if (data['success']) {
					$('.feedback-arbitrage').after('<div class="success">'+data['success']+'</div>');
					setTimeout(function(){$('.feedback-arbitrage input, .feedback-arbitrage textarea').val('')},2500);
					setTimeout(function(){$('.success').fadeOut('slow')},4500);
				}

			}
		});
	});
});