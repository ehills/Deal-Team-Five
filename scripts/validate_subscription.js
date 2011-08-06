$(document).ready(function() {
	
	function displayResponse(msg) {
		$('#subscribeForm').hide();
		$('#mainContainer').append(msg); 
		$('#load').fadeIn(2000); 	
	};
	
	submitHandler: function formSubmit(form) {
		
		var form_data = {
				email: $('#email').val(),
				ajax: '1'
		};

		$.ajax({
			url: "index.php?/welcome/subscribe",
			type: 'POST',
			data: form_data,
			success: function(msg) {
				displayResponse(msg);
			}
		});
		
		return false;
	}

	//validate subscribe form on ready and submit
	$("#subscribeForm").validate({
		rules: {
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			email: { 
				email: "Please enter a valid email address.",
				required: "Please enter an email address."
			}
		},
		submitHandler: formSubmit
	});
});