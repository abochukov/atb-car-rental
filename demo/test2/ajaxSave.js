$(document).ready(function(){
	
	
	$('#add').click(function() {

		//$('#waiting').show(0);
		$('#message').hide(0);
		
		var namee = $.map($('.namee'),function(el,idx) {
			return $(el).text()
		})
		/*
		$('.codepharm').each(function(){
            var mydata = $(this).val();
        	console.log(mydata); 
        });
		*/
		var codepharm = new Array();
		$("input[name=codepharm]").each(function() {
		   codepharm.push($(this).val());
		});

		var codecity = new Array();
		$("input[name=codecity]").each(function() {
		   codecity.push($(this).val());
		});
		

		//alert('as');

		$.ajax({
			type : 'POST',
			url : 'save.php',
			dataType : 'json',
			data: {
				namee: namee,
				codepharm: codepharm,
				codecity: codecity,			
			},
			
			success : function(data){
				$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').text(data.msg).show(500);
				alert("success");
				if(data.error === false) {
					//$('#thanks').css('display', 'block');
					//url = "result.php";
					//$( location ).attr("href", url);
			
				}
			},
			
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				$('#message').removeClass().addClass('error').text('There was an error.').show(500);
				alert('error');
			}
			
		});
		
		return false;
	});

});


