$(document).ready(function(e) {  //  document.ready
    $(".btn").on("click",function() {
        $.ajax({
            url: "include/search.php",
            type: "POST",
            data: {
                product_name:$(".p_name").val(),
				product_price:$(".p_price").val()
            },
			dataType:"json",
            success: function(response) {
				//$('#i_id').html(data.invoice_id);
				//$('#c_id').html(data.customer_id);
				//alert(data);
                $("#tbl_product").find("tr:gt(0)").remove();
				if(response.length!=0){
					var trHTML = '';
					$.each(response,function(index,row){
	                trHTML += '<tr><td>' + row.product_id + '</td><td>' + row.product_name + '</td><td>' + row.product_des+ '</td><td>' + row.product_price+ '</td><td>' + row.product_discount+ '</td><td>' + row.product_cost+'</td></tr>';
						});
					$('#tbl_product').append(trHTML);
					}
					 
            }
        });
    });
});
