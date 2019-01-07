$(document).ready(function(){
	
	
	$("#add").on('submit',(function(e) {
		e.preventDefault();
		
		//$('#waiting').show(0);
		$('#message').hide(0);

		var selected = $('#select1 option:selected');
		alert (selected);

		$.ajax({
			type : 'POST',
			url : 'add_pharm.php',
			dataType : 'json',
			data: {
				country: $('#select1').val(),
				pharm: $('#pharm').val(),
			},
			
			success : function(data){
				alert(pharm);
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