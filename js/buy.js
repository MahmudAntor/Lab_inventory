$(document).ready(function(e) {  //  document.ready
    $(".btn").on("click",function() {
        $.ajax({
            url: "include/buy.php",
            type: "POST",
			dataType:"json",
			data:{buy:$(".buy").val()},
            success: function(response) {
				//$('#i_id').html(data.invoice_id);
				//$('#c_id').html(data.customer_id);
				//alert(data);
               $("#chk").find("tr:gt(0)").remove();
				if(response.length!=0){
					var trHTML = '';
					$.each(response,function(index,row){
						
	                trHTML += '<tr><td>' + row.product_name + '</td></tr>';
						});
					$('#chk').append(trHTML);
					}
					 
            }
        });
    });
});
