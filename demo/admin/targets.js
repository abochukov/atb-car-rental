$(document).ready(function(){
	
	
	$('#target_btn').click(function() {
		
		//$('#waiting').show(0);
		$('#message').hide(0);
		
		var userid = $('#userid').val();

		//var a1= $('#1').val();
		var a1 = $('#1').val();
		var a2 = $('#2').val();
		var a3 = $('#3').val();
		var a4 = $('#4').val();
		var a5 = $('#5').val();
		var a6 = $('#6').val();
		var a7 = $('#7').val();
		var a8 = $('#8').val();
		var a9 = $('#28').val();
		var a10 = $('#29').val();
		var a11 = $('#30').val();
		var a12 = $('#31').val();
		var a13 = $('#32').val();

		/*
		sum_special_visibility = eval(a1) + eval(a2) + eval(a3) + eval(a4) + eval(a5) + eval(a6) + eval(a7) + eval(a8) + eval(a9) + eval(a10) + eval(a11) + eval(a12) + eval(a13) ;
		alert (sum_special_visibility);
		*/

		var b1 = $('#20').val();
		var b2 = $('#21').val();
		var b3 = $('#22').val();
		var b4 = $('#33').val();
		var b5 = $('#34').val();
		var b6 = $('#35').val();
		var b7 = $('#36').val();
		var b8 = $('#37').val();

		var c1 = $('#13').val();
		var c2 = $('#14').val();
		var c3 = $('#15').val();
		var c4 = $('#16').val();
		var c5 = $('#17').val();
		var c6 = $('#18').val();
		var c7 = $('#19').val();
		var c8 = $('#39').val();
		var c9 = $('#40').val();
		var c10 = $('#41').val();
		var c11 = $('#42').val();
		var c12 = $('#43').val();

		var d1 = $('#9').val();
		var d2 = $('#10').val();
		var d3 = $('#11').val();
		var d4 = $('#12').val();
		var d5 = $('#44').val();
		var d6 = $('#45').val();
		var d7 = $('#46').val();
		var d8 = $('#47').val();
		var d9 = $('#48').val();

		var e1 = $('#23').val();
		var e2 = $('#24').val();
		var e3 = $('#25').val();
		var e4 = $('#26').val();
		var e5 = $('#27').val();
		var e6 = $('#49').val();
		var e7 = $('#50').val();
		var e8 = $('#51').val();
		var e9 = $('#52').val();
		var e10 = $('#53').val();



		

		//console.log(a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13);
		
		//$('form').each(function() { this.reset() });

		$.ajax({
			type : 'POST',
			url : 'target_save.php',
			dataType : 'json',
			data: {
				userid: userid,
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
				b1: b1,
				b2: b2,
				b3: b3,
				b4: b4,
				b5: b5,
				b6: b6,
				b7: b7,
				b8: b8,
				c1: c1,
				c2: c2,
				c3: c3,
				c4: c4,
				c5: c5,
				c6: c6,
				c7: c7,
				c8: c8,
				c9: c9,
				c10: c10,
				c11: c11,
				c12: c12,
				d1: d1,
				d2: d2,
				d3: d3,
				d4: d4,
				d5: d5,
				d6: d6,
				d7: d7,
				d8: d8,
				d9: d9,
				e1: e1,
				e2: e2,
				e3: e3,
				e4: e4,
				e5: e5,
				e6: e6,
				e7: e7,
				e8: e8,
				e9: e9,
				e10: e10,

			},
			
			success : function(data){
				//alert(sum_special_visibility);
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
