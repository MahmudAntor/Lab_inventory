$(document).ready(function(e) {  
        $('.edit').on('click',function(){
            $('#productModal').modal();
			//$('#box').css('visibility','visible');
			var id = $(this).data('id');	
			$.ajax({
				url: "include/all_products.php",
				type: "POST",
				data:{ "id":id},
				dataType:"json",
				success: function(data) {
					$('#entry_id').val(data.entry_id);
					$('#p_name').val(data.p_name);
					$('#Quantity').val(data.Quantity);
					//$('#pro_price').val(data.product_price);
					$('#Last Update Date').val(data.Last Update Date);
					$('#Admin_name').val(data.Admin_name);
				}
			});
					$('#pro_sub').on('click',function(){
					var name = $('#p_name').val();
					var des = $('#Quantity').val();
					//var price = $('#pro_price').val();
					var date = $('#Last Update Date').val();
					var A_name = $('#Admin_name').val();	
					$.ajax({
						url: "include/edit.php",
						type: "POST",
						data:{ "entry_id":id,"p_name":name,"Quantity":des,"Last Update Date":date,"Admin_name":A_name},
						success: function(response) {
							if(response=="1"){	
								 alert("Successfully Updated!");	
								 setTimeout(function() { location.reload() },1000);
							}
						                             }
					      });
				    });
		  });
		  
		  $('.del').on('click',function(){
			var id = $(this).data('id'),
		    index = $(this).index('.del') + 1;
			$('#del_id').val(id);
			var chk=$('#del_id').val();
			$.ajax({
				url: "include/delete2.php",
				type: "POST",
				data:{ "del_id":chk},
				success: function(response) {
					//alert(response);
					if(response=="1"){	
					    //alert(response);
						$('#tbl_product').find('tr:eq(' + index + ')').remove();	
					}
				}
			});
		});
		
});
