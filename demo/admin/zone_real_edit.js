$(document).ready(function(){
	
	
	$('#target_btn').click(function() {
		
		var check1 = $('input:checkbox[name=1]:checked').val();
		var check2 = $('input:checkbox[name=2]:checked').val();
		var check3 = $('input:checkbox[name=3]:checked').val();
		var check4 = $('input:checkbox[name=4]:checked').val();
		var check5 = $('input:checkbox[name=5]:checked').val();
		
          
		//$('#waiting').show(0);
		$('#message').hide(0);


		var a1 = $('#1').val();
		var a2 = $('#2').val();
		var a3 = $('#3').val();
		var a4 = $('#4').val();
		var a5 = $('#5').val();
		

		$.ajax({
			type : 'POST',
			url : 'zone_real_edit_save.php',
			dataType : 'json',
			data: {
				//userid: userid,
				a1: a1,
				a2: a2,
				a3: a3,
				a4: a4,
				a5: a5,
				check1: check1,
				check2: check2,
				check3: check3,
				check4: check4,
				check5: check5,
				

			},
			
			success : function(data){
				alert("Успешно направени промени!");
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
