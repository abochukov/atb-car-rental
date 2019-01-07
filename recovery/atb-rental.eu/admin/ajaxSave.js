$(document).ready(function(){
	/*
	
	$('#saver').click(function() {
		
		//$('#waiting').show(0);
		$('#message').hide(0);
		
		$.ajax({
			type : 'POST',
			url : 'save.php',
			dataType : 'json',
			data: {
				date: $('#datepicker').val(),
				text: $('#event').val(),
			},
			
			success : function(data){
				$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);
				if(data.error === false) {
					$('#thanks').css('display', 'block');
				}
			},
			
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#message').removeClass().addClass('error').text('There was an error.').show(500);

			}
			
		});
		
		return false;
	});
	*/
	
	
	$(document).on('submit','#ss',function (e) {
		e.preventDefault();
		var ed = tinyMCE.get('event');
		var text = ed.getContent();
		var date = $('#datepicker').val();

		 //console.log(date);
		$.ajax({
			type:       'POST',
			cache:      false,
			dataType : 'json',
			url:        'save.php',
			data: {
				date: date,
				text: text,
			},
			success:    function(){
						
						
			}
		});
    return false;
		
	});
	
});