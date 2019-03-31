$(document).ready(function(e) {  //  document.ready
    $(".btn").on("click",function() {
		var cst=$(".customer").val();
        $.ajax({
            url: "include/customer.php",
            type: "POST",
            data: {
                "customer": cst
            },
			dataType:"json",
            success: function(data) {
				$('#c_name').html(data.customer_name);
				$('#c_contact').html(data.customer_contact);
            }
        });
    });
});
