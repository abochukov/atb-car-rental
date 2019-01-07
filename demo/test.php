<html>
    <head><title></title>
    </head>
    <body>
    <form method="POST" action="" name="mainForm">
    <table>
        <tr>
            <td> Filter by: </td>
            <td>
                <div id="first">
                   <select id="first_dropdown">
                      <option value="1">All</option>
                      <option value="2">Degree</option>
                      <option value="3">City</option>
                   </select>
            </td>
         </tr>
         <tr>
            <td>&nbsp</td>
            <td>
               <div id="second">
                  <select id="second_dropdown">

                  </select>
               </div>
            </td>
         </tr>
      </table>
   </form>
</body>
</html>

    <script src = "https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#first_dropdown').change(function(){
            /*
            $.ajax({
                'type' : 'post',
                'url' : 'getDropdownOptions.php',
                'data': 'first=' + $(this).val(),
                'success' : function(data) {
                    $('#second_dropdown').html(data);
                }
            });
			*/

            var als = $(this).val();

            $.ajax({					
				type: 'POST',				
				url: 'getDropdownOptions.php',				
				dataType : 'json',
				data: {							
					first: als
				},						
						
				success : function(data){
					alert(data);
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#message').removeClass().addClass('error').text('There was an error.').show(500);
				}
			});	
            return false;
          });
        });
    </script>
