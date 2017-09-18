$(document).ready( function(){

	$('input[name=phone]').mask("+7 (999) 999?-9999");

	$('.ordercall-link').click(function(){
		$(this).parent().find('.overlay').show();
	});

	$('.close').click(function(){
		$(this).closest('.overlay').hide();
	});

	$('.order_form').on( 'submit', function(){

		var form = $(this);

		$.ajax({
			type: form.attr("method"),
			url: form.attr("action"),
			data: form.serialize(),
			success: function(data){
				if(data){
					form.find('.message.ok').text(data.data).show();
				}else{
					form.find('.message.error').show();
				}
			},
			error: function(data) {
				form.find('.message.error').show();
			},
			dataType: 'json'
		});
		return false;
	});

});
