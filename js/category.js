$(document).ready(function(e) {  //  document.ready
    
        $.ajax({
            url: "include/category.php",
            type: "POST",
			dataType:"json",
			data:{number:$(".number").val()},
            success: function(response) {
				//$('#i_id').html(data.invoice_id);
				//$('#c_id').html(data.customer_id);
				//alert(data);
               
				if(response.length!=0){
					var trHTML = '';
					$.each(response,function(index,row){
	                trHTML += '<tr><td>'+row.invoice_id+'</td><td>'+ row.customer_id + '</td><td>' + row.customer_name + '</td><td>' + row.customer_contact + '</td><td>' + row.Category + '</td></tr>';
						});
					$('#tbl_product').append(trHTML);
					}
					 
            }
        });
  
});
