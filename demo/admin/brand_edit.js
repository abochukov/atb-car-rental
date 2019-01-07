$(document).ready(function(){
	
	
	$('#zone_btns').click(function() {

		//$('#waiting').show(0);

		var check1 = $('input:checkbox[name=1]:checked').val();
		var check2 = $('input:checkbox[name=2]:checked').val();
		var check3 = $('input:checkbox[name=3]:checked').val();
		var check4 = $('input:checkbox[name=4]:checked').val();
		var check5 = $('input:checkbox[name=5]:checked').val();
		var check6 = $('input:checkbox[name=6]:checked').val();
		var check7 = $('input:checkbox[name=7]:checked').val();
		var check8 = $('input:checkbox[name=8]:checked').val();
		var check9 = $('input:checkbox[name=9]:checked').val();
		var check10 = $('input:checkbox[name=10]:checked').val();
		var check11 = $('input:checkbox[name=11]:checked').val();
		var check12 = $('input:checkbox[name=12]:checked').val();
		var check13 = $('input:checkbox[name=13]:checked').val();
		var check14 = $('input:checkbox[name=14]:checked').val();
		var check15 = $('input:checkbox[name=15]:checked').val();
		var check16 = $('input:checkbox[name=16]:checked').val();
		var check17 = $('input:checkbox[name=17]:checked').val();
		var check18 = $('input:checkbox[name=18]:checked').val();

		var active1 = $('.21:checkbox:checked').val();
		var active2 = $('.22:checkbox:checked').val();
		var active3 = $('.23:checkbox:checked').val();
		var active4 = $('.24:checkbox:checked').val();
		var active5 = $('.25:checkbox:checked').val();
		var active6 = $('.26:checkbox:checked').val();
		var active7 = $('.27:checkbox:checked').val();
		var active8 = $('.28:checkbox:checked').val();
		var active9 = $('.29:checkbox:checked').val();
		var active10 = $('.30:checkbox:checked').val();
		var active11 = $('.31:checkbox:checked').val();
		var active12 = $('.32:checkbox:checked').val();
		var active13 = $('.33:checkbox:checked').val();
		var active14 = $('.34:checkbox:checked').val();
		var active15 = $('.35:checkbox:checked').val();
		var active16 = $('.36:checkbox:checked').val();
		var active17 = $('.37:checkbox:checked').val();
		var active18 = $('.38:checkbox:checked').val();


		//var userid = $('#userid').val();
		//var a1= $('#1').val();
		var a1 = $('#1').val();
		var a2 = $('#2').val();
		var a3 = $('#3').val();
		var a4 = $('#4').val();
		var a5 = $('#5').val();
		var a6 = $('#6').val();
		var a7 = $('#7').val();
		var a8 = $('#8').val();
		var a9 = $('#9').val();
		var a10 = $('#10').val();
		var a11 = $('#11').val();
		var a12 = $('#12').val();
		var a13 = $('#13').val();
		var a14 = $('#14').val();
		var a15 = $('#15').val();
		var a16 = $('#16').val();
		var a17 = $('#17').val();
		var a18 = $('#18').val();

		
		//$('form').each(function() { this.reset() });
		$.ajax({
			type : 'POST',
			url : 'brandedit_save.php',
			dataType : 'json',
			data: {
				//userid: userid,
				a1: a1,
				a2: a2,
				a3: a3,
				a4: a4,
				a5: a5,
				a6: a6,
				a7: a7,
				a8: a8,
				a9: a9,
				a10: a10,
				a11: a11,
				a12: a12,
				a13: a13,
				a14: a14,
				a15: a15,
				a16: a16,
				a17: a17,
				a18: a18,
				check1: check1,
				check2: check2,
				check3: check3,
				check4: check4,
				check5: check5,
				check6: check6,
				check7: check7,
				check8: check8,
				check9: check9,
				check10: check10,
				check11: check11,
				check12: check12,
				check13: check13,
				check14: check14,
				check15: check15,
				check16: check16,
				check17: check17,
				check18: check18,
				active1: active1,
				active2: active2,
				active3: active3,
				active4: active4,
				active5: active5,
				active6: active6,
				active7: active7,
				active8: active8,
				active9: active9,
				active10: active10,
				active11: active11,
				active12: active12,
				active13: active13,
				active14: active14,
				active15: active15,
				active16: active16,
				active17: active17,
				active18: active18,
				
				
			},
			
			success : function(data){
				alert("Успешно направени корекции");

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
