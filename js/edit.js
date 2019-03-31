$(document).ready(function(e) {  //  document.ready
      $("#c_name").hide();
	  $("#c_num").hide();
      $c_id=$('#c_id').text();
	  $('#customer_id').val($c_id);  
		$(document).on("click", "#ed_can", function(){
				  location.reload(true);
		});
		$(document).on('click',"#c_edit",function(){
			$("#c_name").show();
			$("#c_name2").hide();
			$("#c_num").show();
			$("#c_num2").hide();
			
		$(document).on("click", "#ed_btn", function(){
		      var i=$('#c_name').val();
			  var j=$('#c_num').val();
			  $.ajax({
				url: "include/edit.php",
				type: "POST",
				data:{ "customer_id":$('#customer_id').val(),"customer_name":i,"customer_contact":j},
				success: function(response) {
					if(response=="1"){
						alert("Updated Successfully!");
						setTimeout(function() { location.reload() },1000);
					}
				}
			});
		  });
		});
		
		
		$(".edit").click(function(){
			$("#content").animate({marginRight:"0px"});
               $("#box2").animate({marginRight:"0px"});
			   var id = $(this).data('id');	
			$.ajax({
				url: "include/product.php",
				type: "POST",
				data:{ "id":id},
				dataType:"json",
				success: function(data) {
					$('#pro_id').val(data.product_id);
					$('#pro_name').val(data.product_name);
					$('#pro_des').val(data.product_des);
					$('#pro_price').val(data.product_price);
					$('#pro_dis').val(data.product_discount);
					$('#pro_cost').val(data.product_cost);
				}
			});
					$('#pro_sub').on('click',function(){
					var name = $('#pro_name').val();
					var des = $('#pro_des').val();
					var price = $('#pro_price').val();
					var dis = $('#pro_dis').val();
					var cost = $('#pro_cost').val();	
					$.ajax({
						url: "include/pro_edit.php",
						type: "POST",
						data:{ "pro_id":id,"pro_name":name,"pro_des":des,"pro_price":price,"pro_dis":dis,"pro_cost":cost},
						success: function(response) {
							if(response=="1"){	
								 alert("Successfully Updated!");	
								 setTimeout(function() { location.reload() },1000);
							}
						                             }
					      });
				    });
					$(document).on("click", "#pro_can", function(){
				            $("#box2").animate({marginRight:"-350px"});
							$("#content").animate({marginRight:"264.5px"});
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
