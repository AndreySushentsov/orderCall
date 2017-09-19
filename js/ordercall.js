$(document).ready(function () {
	$('input[name=phone]').mask("+7 (999) 999?-9999");

	$('.ordercall-link').click(function (e) {
		e.preventDefault();
		$(this).parent().find('.overlay').show();
	});

	$('.close').click(function (e) {
		e.preventDefault();
		$(this).closest('.overlay').hide();
	});

	$('.order_form').on('submit', function (e) {
		e.preventDefault();
		var form = $(this);

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			dataType:'html',
			success: function (response) {
				if (response.data){
					form.find('.message.ok').text(response.data).show();
				}
				else {
					form.find('.message.error').show();
				}
			},
			error: function () {
				form.find('.message.error').show();
			},
			dataType: 'json'
		});
	});
});
