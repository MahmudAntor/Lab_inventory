$(document).ready(function(e) {  //  document.ready
    $(".btn").on("click",function() {
		var cnt=$(".count").val();
        $.ajax({
            url: "include/count.php",
            type: "POST",
            data: {
                "count": cnt
            },
			dataType:"json",
            success: function(data) {
				$('.yo').html(data.Items);
				
            }
        });
    });
});
