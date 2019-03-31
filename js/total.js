$(document).ready(function(e) {  //  document.ready
        $.ajax({
            url: "include/total.php",
            type: "POST",
			dataType:"json",
            success: function(response) {
				//$('#i_id').html(data.invoice_id);
				//$('#c_id').html(data.customer_id);
				//alert(data);
               
				if(response.length!=0){
					var trHTML = '';
					$.each(response,function(index,row){
	                trHTML += '<tr><td>' + row.product_id + '</td><td>' + row.product_name + '</td><td>' + row.Total+'</td></tr>';
						});
					$('#tbl_product').append(trHTML);
					}
					 
            }
        });
});
