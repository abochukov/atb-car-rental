$(document).ready(function(){
	
	
	$('#reg_profile').click(function() {
		
		//$('#waiting').show(0);
		$('#message').hide(0);
		
		//$('form').each(function() { this.reset() });

		$.ajax({
			type : 'POST',
			url : 'register_profile.php',
			dataType : 'json',
			data: {
				user: $('#user').val(),
				first_name: $('#first_name').val(),
				last_name: $('#last_name').val(),
				email: $('#email').val(),
				password: $('#password').val(),
				check: $('input:radio[name=r1]:checked').val(),

			},
			
			success : function(data){
				//alert(id);
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

	/* DELETE USER*/

		$(".del").click(function() {			

		$.ajax({
			type: 'POST',
			url: 'delete.php',
			cache: false,
			dataType: 'json',
			data: { 
				//user: $('#user').val(),
			//	"id=" + $(this).attr("id"), 
				id: $(this).attr('id')
			},
			
			success : function(data){
				
				$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);
				/*
				if(data.error === false) {
					$('#thanks').css('display', 'block');
				}
				*/
			},
			
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#message').removeClass().addClass('error').text('There was an error.').show(500);

			}
			
		});

		return false;
		
	});
});
