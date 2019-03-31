$(document).ready(function(e) {  //  document.ready
    $(".btn").on("click",function() {
        $.ajax({
            url: "include/dates.php",
            type: "POST",
            data: {
                from_date:$(".from_date").val(),
				to_date:$(".to_date").val()
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
	                trHTML += '<tr><td>' + row.invoice_id + '</td><td>' + row.customer_id + '</td></tr>';
						});
					$('#tbl_product').append(trHTML);
					}
					 
            }
        });
    });
});
