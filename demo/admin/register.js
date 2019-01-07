$(document).ready(function(){
	
	
	$('#edit_profile').click(function() {
		
		//$('#waiting').show(0);
		$('#message').hide(0);
		
		//$('form').each(function() { this.reset() });
		
		$.ajax({
			type : 'POST',
			url : 'edit_profile_save.php',
			dataType : 'json',
			data: {
				user: $('#user').val(),
				first_name: $('#first_name').val(),
				last_name: $('#last_name').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				description: $('#description').val(),
				check: $('input[name="r1"]:checked').val(),

			},
			
			success : function(data){
				alert('Успешно направени промени!');
				$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);

				if(data.error === false) {
					

					//$('#thanks').css('display', 'block');
										/*
					var href = $(this).attr('href', url);

					// Delay setting the location for one second
					setTimeout(function() {window.location = href}, 3000);
					return false;
					*/
				}
			},
			
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#message').removeClass().addClass('error').text('There was an error.').show(500);
				alert('fail');
			}
			
		});
		
		return false;
	});

});


