$(document).ready(function(e) {  //  document.ready
    $(".pm").on("change", function() {
        $.ajax({
            url: "include/payment.php",
            type: "POST",
            data: {
                "payment_method": $(this).val()
            },
			dataType:"json",
            success: function(data) {
				$('.pd').html(data.discount);
            }
        });

    });
});;