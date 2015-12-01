jQuery(document).ready(function($) {
	$('.tt-form').on('submit', function(event) {
		event.preventDefault();
		var form = $(this);
		var submit = form.find('input[type=submit]');
		var submit_val = $(submit).val();
		console.log(form)
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			data: {
				action: "contact_form_send_message",
				form_data: form.serialize()
			},
			success: function(response) {
				console.log(response);
				if (response === '1') {
					
				} else {
					
				}
			}
		});

		return false;
	});
});