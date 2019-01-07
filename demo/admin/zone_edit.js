$(document).ready(function(){
	
	
	$('#target_btn').click(function() {
		
		var check1 = $('input:checkbox[name=1]:checked').val();
		var check2 = $('input:checkbox[name=2]:checked').val();
		var check3 = $('input:checkbox[name=3]:checked').val();
		var check4 = $('input:checkbox[name=4]:checked').val();
		var check5 = $('input:checkbox[name=5]:checked').val();
		var check6 = $('input:checkbox[name=6]:checked').val();
		var check7 = $('input:checkbox[name=7]:checked').val();
		var check8 = $('input:checkbox[name=8]:checked').val();
		var check9 = $('input:checkbox[name=28]:checked').val();
		var check10 = $('input:checkbox[name=29]:checked').val();
		var check11 = $('input:checkbox[name=30]:checked').val();
		var check12 = $('input:checkbox[name=31]:checked').val();
		var check13 = $('input:checkbox[name=32]:checked').val();

		var check14 = $('input:checkbox[name=20]:checked').val();
		var check15 = $('input:checkbox[name=21]:checked').val();
		var check16 = $('input:checkbox[name=22]:checked').val();
		var check17 = $('input:checkbox[name=33]:checked').val();
		var check18 = $('input:checkbox[name=34]:checked').val();
		var check19 = $('input:checkbox[name=35]:checked').val();
		var check20 = $('input:checkbox[name=36]:checked').val();
		var check21 = $('input:checkbox[name=37]:checked').val();

		var check22 = $('input:checkbox[name=13]:checked').val();
		var check23 = $('input:checkbox[name=14]:checked').val();
		var check24 = $('input:checkbox[name=15]:checked').val();
		var check25 = $('input:checkbox[name=16]:checked').val();
		var check26 = $('input:checkbox[name=17]:checked').val();
		var check27 = $('input:checkbox[name=18]:checked').val();
		var check28 = $('input:checkbox[name=19]:checked').val();
		var check29 = $('input:checkbox[name=39]:checked').val();
		var check30 = $('input:checkbox[name=40]:checked').val();
		var check31 = $('input:checkbox[name=41]:checked').val();
		var check32 = $('input:checkbox[name=42]:checked').val();
		var check33 = $('input:checkbox[name=43]:checked').val();

		var check34 = $('input:checkbox[name=9]:checked').val();
		var check35 = $('input:checkbox[name=10]:checked').val();
		var check36 = $('input:checkbox[name=11]:checked').val();
		var check37 = $('input:checkbox[name=12]:checked').val();
		var check38 = $('input:checkbox[name=44]:checked').val();
		var check39 = $('input:checkbox[name=45]:checked').val();
		var check40 = $('input:checkbox[name=46]:checked').val();
		var check41 = $('input:checkbox[name=47]:checked').val();
		var check42 = $('input:checkbox[name=48]:checked').val();

		var check43 = $('input:checkbox[name=23]:checked').val();
		var check44 = $('input:checkbox[name=24]:checked').val();
		var check45 = $('input:checkbox[name=25]:checked').val();
		var check46 = $('input:checkbox[name=26]:checked').val();
		var check47 = $('input:checkbox[name=27]:checked').val();
		var check48 = $('input:checkbox[name=49]:checked').val();
		var check49 = $('input:checkbox[name=50]:checked').val();
		var check50 = $('input:checkbox[name=51]:checked').val();
		var check51 = $('input:checkbox[name=52]:checked').val();
		var check52 = $('input:checkbox[name=53]:checked').val();
		
	

          
		//$('#waiting').show(0);
		$('#message').hide(0);


		
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
			url : 'zoneedit_save.php',
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
				check19: check19,
				check20: check20,
				check21: check21,
				check22: check22,
				check23: check23,
				check24: check24,
				check25: check25,
				check26: check26,
				check27: check27,
				check28: check28,
				check29: check29,
				check30: check30,
				check31: check31,
				check32: check32,
				check33: check33,
				check34: check34,
				check35: check35,
				check36: check36,
				check37: check37,
				check38: check38,
				check39: check39,
				check40: check40,
				check41: check41,
				check42: check42,
				check43: check43,
				check44: check44,
				check45: check45,
				check46: check46,
				check47: check47,
				check48: check48,
				check49: check49,
				check50: check50,
				check51: check51,
				check52: check52,
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
